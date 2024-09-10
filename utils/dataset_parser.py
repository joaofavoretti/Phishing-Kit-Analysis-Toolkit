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

    def add_instruction_blocks(self, instruction_blocks:List[DomainInstructionBlock]):
        self.instruction_blocks += instruction_blocks

    def set_category(self, category: Category):
        self.category = category


class DatasetParser:
    """
    TODO
    [ ] Filter the data by domain or filename
    [ ] Create the embeddings for the dataset
    [ ] Retrieve the embeddings
    [ ] Save the embeddings
    """

    class TransformMode(Enum):
        DOC2VEC = "doc2vec"
        SBERT = "sbert"

    TRANSFORM_MODE_MAP = {
        TransformMode.DOC2VEC: "_doc2vec_transform",
        TransformMode.SBERT: "_sbert_transform"
    }

    def __init__(self):
        self.sources: Dict[WebsiteSample.Category, List[PATH]] = {}
        self.websiteSamples: Dict[WebsiteSample.Category, List[WebsiteSample]] = {}

    def fit(self, dir: PATH|List[PATH], category: WebsiteSample.Category) -> 'DatasetParser'
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

    def preprocess(self, filterOutHandler) -> 'DatasetParser':
        for category, samples in self.websiteSamples.items():
            for sample in samples:
                sample.instruction_blocks = list(filter(lambda ib: not filterOutHandler(ib), sample.instruction_blocks))

                if len(sample.instruction_blocks) == 0:
                    self.websiteSamples[category].remove(sample)

            if len(self.websiteSamples[category]) == 0:
                del self.websiteSamples[category]

        return self

    def transform(self, mode: TransformMode = TransformMode.SBERT, flatten: bool = False) -> np.ndarray:
        """
        :param mode: The mode to transform the data. It can be either "doc2vec" or "sbert"
        :param flatten: If true, then each instruction block will be represented as a single vector.
            If false, each website sample will be represented by a matrix (n_instruction_blocks, n_features)
        """


        return np.array([])



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


MALICIOUS_LOGFILES_DIR = [
    "/archive/files/eval-phishing-pages/out/tmp-phishtank"
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

    # X, y = datasetParser.get_embeddings()


