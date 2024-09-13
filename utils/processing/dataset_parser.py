from log_parser import LogParser, DomainInstructionBlock
from tempfile import mkdtemp
from typing import List, Dict
from enum import Enum
import numpy as np
import shutil
import os
import re

PATH = str

# I have no idea how I once did this, but that
# is useful to iterate through a directory of tar.gz'd log files
def for_each_log_file(logs_dir, func, debug=True):
    def wrapper(*args, **kwargs):

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
    def __init__(self):
        self.sources: Dict[WebsiteSample.Category, List[PATH]] = {}
        self.websiteSamples: Dict[WebsiteSample.Category, List[WebsiteSample]] = {}

    def fit(self, dir: PATH|List[PATH], category: WebsiteSample.Category) -> 'DatasetParser':
        if isinstance(dir, PATH):
            dir = [dir]

        if category not in self.sources:
            self.sources[category] = []

        self.sources[category] += dir

        # This is something I am not sure of
        # Initially I would like to use the self.sources variable to fit all at once
        #   but I would need a two-stage fit function, which I found no solution for that
        # I could do it all in the transform function, but I could not use a "preprocess"
        #  function to filter the data before transforming it
        for path in dir:
            websiteSamples = self._loadDataFromDir(path, category)

            if category not in self.websiteSamples:
                self.websiteSamples[category] = []

            self.websiteSamples[category] += websiteSamples

        return self

    def _get_nof_ibs(self) -> int:
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
        for category, samples in self.websiteSamples.items():
            for sample in samples:
                for i, ib in enumerate(sample.instruction_blocks):
                    flatten_instruction_blocks.append(FlattenInstructionBlock(ib.instructions, sample.filehash, i, sample.category))

        return flatten_instruction_blocks

    def unflatten(self, X:np.ndarray, y:np.ndarray) -> tuple[list, np.ndarray]:
        """
        This function receive a list of vectors and transform it 
        into a list of matrices (n_instruction_blocks, n_features) for each website sample
        The new labels will be the category and filehash of the website sample

        :param X: The list of embeddings calculated
        :param y: The list of labels for each instruction block (category, filehash_index)
        """

        unflatten_X = []
        unflatten_y = []

        for i, (category, filehash_index) in enumerate(y):
            filehash, _ = filehash_index.split("_")
            
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
    datasetParser = DatasetParser()

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


