from log_parser import LogParser, DomainInstructionBlock
from tempfile import mkdtemp
from typing import List, Dict
from enum import Enum
import numpy as np
import pickle
import hashlib
import shutil
import os
import re

PATH = str

# I have no idea how I once did this, but that
# is useful to iterate through a directory of tar.gz'd log files
def for_each_log_file(logs_dir, func, debug=True):
    def wrapper(*args, **kwargs):

        orig_dir = os.getcwd()
        for i, log in enumerate(os.listdir(logs_dir)):
            log_path = os.path.join(logs_dir)
            if debug:
                print(f"({i + 1}) Extracting {log_path}", end="                                               \r")
            os.chdir(logs_dir)
            filehash = log[:-7] # To account for the .tar.gz extension

            # Extract
            tmp_dir = mkdtemp()
            os.system(f"tar -xzf {log} -C {tmp_dir}")

            filepaths = []

            nof_logs = 0
            for root, _, files in os.walk(tmp_dir):
                for file in files:
                    if not file.endswith(".log"):
                        continue

                    nof_logs += 1

                    # If the second line starts with @"about\:blank", it is not wanted then skip
                    with open(os.path.join(root, file), 'r') as f:
                        lines = f.readlines()
                        if len(lines) > 1 and lines[1].startswith('@\"about:blank\"'):
                            continue

                    filepath = os.path.join(root, file)
                    filepaths.append(filepath)
            if nof_logs > 1:
                func(filepaths, filehash, *args, **kwargs)

            # Deconstruct
            shutil.rmtree(tmp_dir)

            os.chdir("..")

        os.chdir(orig_dir)
        print()

    return wrapper


class WebsiteSample:
    class Category(Enum):
        MALICIOUS = "malicious"
        BENIGN = "benign"
        UNLABELED = "unlabeled"

    def __init__(self, filehash: str, category: Category = Category.UNLABELED):
        """
        :param filehash: The hash of the file
        :param category: The category of the website (Category.MALICIOUS or Category.BENIGN) or None
        """

        self.filehash = filehash
        self.category = category
        self.instruction_blocks: List[DomainInstructionBlock] = [] 
        self.cluster:int|None = None

    def add_instruction_blocks(self, instruction_blocks:List[DomainInstructionBlock]):
        self.instruction_blocks += instruction_blocks

    def set_category(self, category: Category):
        self.category = category

    def exportJson(self):
        ret = {}

        ret["filehash"] = self.filehash
        ret["category"] = self.category.value
        ret["instruction_blocks"] = [ib.exportJson() for ib in self.instruction_blocks]

        if self.cluster is not None:
            ret["cluster"] = str(self.cluster)

        return ret


class FlattenInstructionBlock:
    def __init__ (self, instructions:str, hash:str, index:int, category:WebsiteSample.Category):
        self.instructions = instructions
        self.hash = hash
        self.index = index
        self.category = category


class DatasetParser:
    def __init__(self, dbPath:str|None=None):
        self.dbPath = dbPath
        self.saveDb = dbPath is not None

        self.sources: Dict[WebsiteSample.Category, List[PATH]] = {}
        self.websiteSamples: Dict[WebsiteSample.Category, List[WebsiteSample]] = {}

    def getDatasetHash(self):
        """
        Return a hash of the dataset based on the sorted 
        name of the files that are in it
        """

        hash = hashlib.sha256()
        for category in self.sources:
            files = sorted(self.sources[category])
            for path in files:
                hash.update(path.encode())

        return hash

    def _getDirHash(self, dir: PATH, category: WebsiteSample.Category) -> str:
        """
        Return a hash of the directory based on the sorted 
        name of the files that are in it and the category
        """

        files = os.listdir(dir)
        files.sort()

        hash = hashlib.sha256()
        for file in files:
            hash.update(file.encode())

        hash.update(category.value.encode())

        return hash.hexdigest()[:16]

    def _getDirHashPath(self, hash: str) -> str:
        if not self.saveDb:
            raise ValueError("The dbPath is not set to use _getHashPath")

        assert self.dbPath is not None, "The dbPath is not set to use _getHashPath"

        hashFilename = f"{hash}.pkl"
        return os.path.join(self.dbPath, hashFilename)

    def _isDirHashSaved(self, hash: str) -> bool:
        hashPath = self._getDirHashPath(hash)
        return os.path.exists(hashPath)

    def _loadDirHash(self, hash: str) -> List[WebsiteSample]:
        if not self.saveDb:
            raise ValueError("The dbPath is not set to use _getHashPath")

        assert self.dbPath is not None, "The dbPath is not set to use _getHashPath"

        hashPath = self._getDirHashPath(hash)

        if not os.path.exists(hashPath):
            raise FileNotFoundError(f"Hashed file {hashPath} not found")

        with open(hashPath, 'rb') as f:
            return pickle.load(f)

    def _saveDirHash(self, hash: str, samples: List[WebsiteSample]):
        if not self.saveDb:
            raise ValueError("The dbPath is not set to use _getHashPath")

        assert self.dbPath is not None, "The dbPath is not set to use _getHashPath"

        hashPath = self._getDirHashPath(hash)

        if os.path.exists(hashPath):
            raise FileExistsError(f"Hashed file {hashPath} already exists")
        
        if not os.path.exists(self.dbPath):
            os.makedirs(self.dbPath)

        print(f"Saving to {hashPath}")
        with open(hashPath, 'wb') as f:
            pickle.dump(samples, f)

    def _loadDir(self, path: PATH, category: WebsiteSample.Category) -> List[WebsiteSample]:
            dirHash = self._getDirHash(path, category)

            if self.saveDb:
                if self._isDirHashSaved(dirHash):
                    return self._loadDirHash(dirHash)
                else:
                    websiteSamples = self._loadDataFromDir(path, category)
                    self._saveDirHash(dirHash, websiteSamples)
                    return websiteSamples
            else:
                return self._loadDataFromDir(path, category)

    def fit(self, dir: PATH|List[PATH], category: WebsiteSample.Category) -> 'DatasetParser':
        if isinstance(dir, PATH):
            dir = [dir]

        if len(dir) == 0:
            return self

        if category not in self.sources:
            self.sources[category] = []

        self.sources[category] += dir

        # This is something I am not sure of
        # Initially I would like to use the self.sources variable to fit all at once
        #   but I would need a two-stage fit function, which I found no solution for that
        # I could do it all in the transform function, but I could not use a "preprocess"
        #  function to filter the data before transforming it
        for path in dir:

            print(f"Loading data from {path}")
            
            websiteSamples = self._loadDir(path, category)

            if category not in self.websiteSamples:
                self.websiteSamples[category] = []

            self.websiteSamples[category] += websiteSamples

        return self

    def _getNofIbs(self) -> int:
        """
        INFO: This function is only used to observe the preprocessing 
            changes in the available instruction blocks of data
        """
        nof_ibs = 0
        for samples in self.websiteSamples.values():
            for sample in samples:
                nof_ibs += len(sample.instruction_blocks)

        return nof_ibs

    def preprocess(self, filterOutHandler) -> 'DatasetParser':
        print(f"Preprocessing data")
        for category, samples in self.websiteSamples.items():
            for sample in samples:
                sample.instruction_blocks = list(filter(lambda ib: not filterOutHandler(ib), sample.instruction_blocks))

                if len(sample.instruction_blocks) == 0:
                    self.websiteSamples[category].remove(sample)

            if len(self.websiteSamples[category]) == 0:
                del self.websiteSamples[category]

        return self

    def _loadDataFromDir(self, dir, category: WebsiteSample.Category) -> List[WebsiteSample]:
        websiteSamples: List[WebsiteSample] = []

        def parse_properties(filepaths, filehash):
            websiteSample = WebsiteSample(filehash, category=category)
            for filepath in filepaths:
                parser = LogParser(filepath)
                instruction_blocks = parser.extract_instruction_blocks()

                parsed_instruction_blocks = parser.parse_instruction_blocks(instruction_blocks)

                websiteSample.add_instruction_blocks(parsed_instruction_blocks)

            websiteSamples.append(websiteSample)

        for_each_log_file(dir, parse_properties, debug=True)()

        return websiteSamples
    
    def flatten(self) -> List[FlattenInstructionBlock]:
        flatten_instruction_blocks = []
        self.total_instruction_blocks = 0
        for category, samples in self.websiteSamples.items():
            for sample in samples:
                for i, ib in enumerate(sample.instruction_blocks):
                    flatten_instruction_blocks.append(FlattenInstructionBlock(ib.instructions, sample.filehash, i, sample.category))
                    self.total_instruction_blocks += 1

        assert len(flatten_instruction_blocks) == self.total_instruction_blocks, f"Expected {self.total_instruction_blocks} instruction blocks, somehow got {len(flatten_instruction_blocks)}"

        return flatten_instruction_blocks

    def _getSample(self, hash, category) -> WebsiteSample|None:
        _category = WebsiteSample.Category(category)
        for samples in self.websiteSamples[_category]:
            if samples.filehash == hash:
                return samples

        return None

    def setEmbeddings(self, X:np.ndarray, y:np.ndarray):
        for i, (category, filehash_index) in enumerate(y):
            filehash, index = filehash_index.split("_")
            
            sample = self._getSample(filehash, category)

            if sample is None:
                raise ValueError(f"Sample with hash {filehash} not found")

            sample.instruction_blocks[int(index)].vector = X[i]

    def _getEmbeddingsFlatten(self) -> tuple[list, np.ndarray]:
        X = []
        y = []

        for category, samples in self.websiteSamples.items():
            for sample in samples:
                for ib_index, ib in enumerate(sample.instruction_blocks):
                    if ib.vector is None:
                        raise ValueError(f"Instruction block {sample.filehash}_{ib_index} does not have a vector")

                    X.append(ib.vector)
                    y.append((category.name, f"{sample.filehash}_{ib_index}"))

        return X, np.array(y)
       
    def _getEmbeddingsNotFlatten(self) -> tuple[list, np.ndarray]:
        X = []
        y = []

        for category, samples in self.websiteSamples.items():
            for sample in samples:
                X.append([])
                for ib_index, ib in enumerate(sample.instruction_blocks):
                    if ib.vector is None:
                        raise ValueError(f"Instruction block {sample.filehash}_{ib_index} does not have a vector")

                    X[-1].append(ib.vector)

                if len(X[-1]) == 0:
                    raise ValueError(f"Sample {sample.filehash} does not have any instruction blocks")

                y.append((category.name, sample.filehash))

        return X, np.array(y)

    def getEmbeddings(self, flatten=False) -> tuple[list, np.ndarray]:
        """
        This function will use the embedding assigned list of instructions blocks with
        its embeddings and return one of two things:

        If flatten is True, then it will return a list with all vectors from all the
        instruction block embeddings from the websiteSamples. 
        If flatten is False, then it will return a list of lists. For each sublist, it will
        contain the vectors for the instruction blocks of each websiteSample.
        """
    
        if flatten:
            return self._getEmbeddingsFlatten()

        return self._getEmbeddingsNotFlatten()

    def unflatten(self, X:np.ndarray, y:np.ndarray) -> tuple[list, np.ndarray]:
        """
        This function is not used anymore. Should use setEmbeddings and geEmbeddings

        This function receive a list of vectors and transform it 
        into a list of matrices (n_instruction_blocks, n_features) for each website sample
        The new labels will be the category and filehash of the website sample

        :param X: The list of embeddings calculated
        :param y: The list of labels for each instruction block (category, filehash_index)
        """

        unflatten_X = []
        unflatten_y = []

        for i, (category, filehash_index) in enumerate(y):
            filehash, index = filehash_index.split("_")
            
            if len(unflatten_X) == 0 or unflatten_y[-1] != (category, filehash):
                unflatten_X.append([])
                unflatten_y.append((category, filehash))

            unflatten_X[-1].append(X[i])

        return unflatten_X, np.array(unflatten_y)


MALICIOUS_LOGFILES_DIR = [
    "/archive/files/eval-phishing-pages/out/tmp-phishtank/"
]
BENIGN_LOGFILES_DIR = []
UNLABELED_LOGFILES_DIR = []

if __name__ == "__main__":
    datasetParser = DatasetParser(dbPath="./dpdb")

    datasetParser.fit(MALICIOUS_LOGFILES_DIR, WebsiteSample.Category.MALICIOUS)
    datasetParser.fit(BENIGN_LOGFILES_DIR, WebsiteSample.Category.BENIGN)
    datasetParser.fit(UNLABELED_LOGFILES_DIR, WebsiteSample.Category.UNLABELED)

    def filterOut(ib: DomainInstructionBlock):
        BLACKLISTED_STARTS_RE = [r"http(s)?:\/\/t.co\/", r"http(s)?:\/\/bit.ly\/", r"http(s)?:\/\/tinyurl.com\/", r"http(s)?:\/\/goo.gl\/", r"http(s)?:\/\/ow.ly\/", r"http(s)?:\/\/is.gd\/", r"http(s)?:\/\/buff.ly\/", r"http(s)?:\/\/dlvr.it\/", r"http(s)?:\/\/ift.tt\/", r"http(s)?:\/\/lnkd.in\/", r"http(s)?:\/\/fb.me\/", r"http(s)?:\/\/wp.me\/", r"http(s)?:\/\/wp.me\/", r"http(s)?:\/\/dlvr.it\/"]

        BLACKLISTED_FILES_RE = [r"jquery(\-\d+\.\d+\.\d+)?(\.min)?\.js", r"bootstrap(\-\d+\.\d+\.\d+)?(\.min)?\.js", r"popper(\-\d+\.\d+\.\d+)?(\.min)?\.js"]

        BLACKLISTED_DOMAINS = ["EMPTY", "about:blank", "chrome://headless/headless_command.html", "chrome://headless/headless_command.js", "?"]

        if ib.domain in BLACKLISTED_DOMAINS:
            return True

        for start in BLACKLISTED_STARTS_RE:
            if re.search(start, ib.domain):
                return True

        for file in BLACKLISTED_FILES_RE:
            if re.search(file, ib.domain):
                return True

        return False
        
    datasetParser.preprocess(filterOut)


