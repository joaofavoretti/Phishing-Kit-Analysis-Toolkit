from log_parser import LogParser
from typing import List
import tarfile
import zipfile
import shutil
import sys
import os

class SampleParser:
    def __init__(self, path: str):
        assert os.path.exists(path), "Path does not exist"
        assert os.path.isfile(path), "Path is not a file"
        assert path.endswith(".zip") or path.endswith(".tar.gz"), "Path must be a zip or tar.gz file"
        self.path = path
        self.directory = os.path.basename(os.path.dirname(path))
        self.name = os.path.basename(path).split(".")[0]

        self.logs: List[LogParser] = self._parseSampleLogs(path)

    def _extractSample(self, path: str):
        fatherDir = os.path.dirname(path)
        outputDir = os.path.join(fatherDir, os.path.basename(path).split(".")[0])
        
        if path.endswith(".zip"):
            with zipfile.ZipFile(path, 'r') as zip_ref:
                zip_ref.extractall(path=outputDir)
        elif path.endswith(".tar.gz"):
            with tarfile.open(path, 'r:gz') as tar_ref:
                tar_ref.extractall(path=outputDir)

        return outputDir

    def hasPhishingKit(self) -> bool:
        outputDir = self._extractSample(self.path)
        ret = False
        for root, dirs, files in os.walk(outputDir):
            if "kits" in dirs:
                if len(os.listdir(os.path.join(root, "kits"))) > 1:
                    ret = True
                    break

        shutil.rmtree(outputDir)
        return ret

    def _parseSampleLogs(self, path: str) -> List[LogParser]:
        logs: List[LogParser] = []

        outputDir = self._extractSample(path)

        for root, _, files in os.walk(outputDir):
            for file in files:
                if file.endswith(".log"):
                    logs.append(LogParser(os.path.join(root, file)))

        shutil.rmtree(outputDir)

        return logs

    def getLogs(self) -> List[LogParser]:
        return self.logs


if __name__ == '__main__':
    sample = SampleParser('../samples/sample-1.zip')
    logs = sample.getLogs()
    for log in logs:
        print(log.name)
        print(log.extract_instruction_blocks().keys())


