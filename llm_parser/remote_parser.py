from gdrive_sync import GDriveSync 
from sample_parser import SampleParser
from typing import List, Union, Callable
from dateutil import parser
import logging
from urllib.parse import urlparse
import shutil
import csv
import os
import re

path_t = str
date_t = str 

ConditionHandler = Callable[[date_t], bool]
GroupStepHandler = Callable[[path_t, date_t], None]
SampleStepHandler = Callable[[path_t, date_t], None]

class SamplePath:
    def __init__(self, sampleDir: str, sampleHash):
        self.sampleDir = sampleDir
        self.sampleHash = sampleHash

    def __str__(self):
        return f"SamplePath(sampleDir={self.sampleDir}, sampleHash={self.sampleHash})"

    def __repr__(self):
        return self.__str__()

class RemoteParser:
    def __init__(self, samplePaths: Union[List[SamplePath], None] = None, minDate: Union[date_t, None] = None, maxDate: Union[date_t, None] = None, tmpDir: path_t = "/archive/tmp/tmp.Wt6YunKLtq/"):
        assert isinstance(samplePaths, list) or samplePaths is None, "samplePaths must be a list or None"
        assert isinstance(minDate, str) or minDate is None, "minDate must be a string or None"
        assert isinstance(maxDate, str) or maxDate is None, "maxDate must be a string or None"
        assert isinstance(tmpDir, str), "tmpDir must be a string"

        # Assert that the user gave a list of samples or a date range
        if samplePaths is None and minDate is None:
            raise ValueError("Either samplePaths must be provided or a date range must be specified")

        self.samplePaths = samplePaths
        self.minDate = minDate
        self.maxDate = maxDate

        if not os.path.exists(tmpDir):
            os.makedirs(tmpDir)

        self.tmpDir = tmpDir

        self.conditionHandlers: List[ConditionHandler] = []
        self.groupStepHandlers: List[GroupStepHandler] = []
        self.lateGroupStepHandlers: List[GroupStepHandler] = []
        self.sampleStepHandlers: List[SampleStepHandler] = []

    def addSampleStep(self, handler: SampleStepHandler):
        self.sampleStepHandlers.append(handler)

    def addGroupStep(self, handler: GroupStepHandler):
        self.groupStepHandlers.append(handler)

    def addLateGroupStep(self, handler: GroupStepHandler):
        self.lateGroupStepHandlers.append(handler)

    def addCondition(self, handler: ConditionHandler):
        self.conditionHandlers.append(handler)

    def _isValidDate(self, date: date_t) -> bool:
        for handler in self.conditionHandlers:
            if not handler(date):
                return False

        return True

    def _getDownloadedFolderPaths(self, date: date_t) -> List[path_t]:
        folders = os.listdir(self.tmpDir)
        folderPaths: List[path_t] = []
        for folder in folders:
            if re.match(r"\d{4}-\d{2}-\d{2}-*", folder) \
                and re.match(r"(\d{4}-\d{2}-\d{2})-.*", folder).group(1) == date:
                folderPaths.append(os.path.join(self.tmpDir, folder))

        return folderPaths

    def _download(self, date: date_t) -> List[path_t]:
        folderPaths = self._getDownloadedFolderPaths(date)

        if len(folderPaths) == 0:
            GDriveSync().downloadFrom(dateInit=date, dateEnd=date, destination=self.tmpDir)
            folderPaths = self._getDownloadedFolderPaths(date)

        return folderPaths

    def shouldRunOnSpecificSamples(self):
        return self.samplePaths != None

    def runOnSpecificSamples(self):
        if self.samplePaths is None:
            return

        l = len(self.samplePaths)
        for i, remotePath in enumerate(self.samplePaths):
            print(f"({i + 1}/{l})Processing sample {remotePath.sampleHash} ({remotePath.sampleDir})")
            GDriveSync().downloadSample(remotePath.sampleDir, remotePath.sampleHash, self.tmpDir)
            samplePath = os.path.join(self.tmpDir, f"{remotePath.sampleHash}.tar.gz")
            for handler in self.sampleStepHandlers:
                handler(samplePath, "-".join(remotePath.sampleDir.split('-')[0:3]))
                os.remove(samplePath)

    def runOnDateRange(self):
        dateEntries = GDriveSync().listDates(fromDate=self.minDate, targetDate=self.maxDate)
        
        for date in sorted(dateEntries):
            print(f"Processing date {date}") 

            if not self._isValidDate(date):
                continue 

            folderPaths = self._download(date)

            for folderPath in folderPaths:
                # Previous Group Step Handlers
                for handler in self.groupStepHandlers:
                    handler(folderPath, date)

                # Sample Step Handlers
                numSamples = len(os.listdir(folderPath))
                for i, sample in enumerate(os.listdir(folderPath)):
                    print(f'({os.path.basename(folderPath)}) Processing sample {i+1}/{numSamples}', end='                    \r')

                    samplePath = os.path.join(folderPath, sample)
                    for handler in self.sampleStepHandlers:
                        handler(samplePath, date)

                print()

                # Late Group Step Handlers
                for handler in self.lateGroupStepHandlers:
                    handler(folderPath, date)

            for folderPath in folderPaths:
                shutil.rmtree(folderPath)

    def run(self):
        if self.shouldRunOnSpecificSamples():
            self.runOnSpecificSamples()
        else:
            self.runOnDateRange()


class RemoteParserHandlers:
    @staticmethod
    def checkDate(date: date_t):
        logging.info(f"Checking date: {date}")
        return date == '2024-09-25' or date == '2024-09-26'

    @staticmethod
    def printDownloadedFolder(folderPath: path_t, date: date_t):
        logging.info(f"Downloaded folder: {folderPath}")
        print(folderPath)

    @staticmethod
    def printSamplePath(samplePath: path_t, date: date_t):
        print(f"Sample file: {samplePath} (date: {date})")

    @staticmethod
    def printNumberOfLogs(samplePath: path_t, date: date_t):
        try:
            sample = SampleParser(samplePath)
        except:
            return 

        print(f'Sample Name: {sample.name}')
        print(f"Number of logs: {len(sample.getLogs())}")

if __name__ == '__main__':
    logging.basicConfig(level=logging.ERROR)

    # Example usage
    samplePaths = [
        SamplePath("2025-01-09-09-phishstats", "34458ac7da32292f"),
        SamplePath("2025-01-14-23-phishstats", "d1968b30ef8fb8d6"),
        SamplePath("2025-01-14-23-phishtank", "7fe8cd73dc6fdbcb"),
        SamplePath("2025-01-14-02-phishstats", "18118e9c85ea72bf"),
        SamplePath("2025-02-26-13-phishstats", "d69b9ed47d39bb42"),
        SamplePath("2025-02-15-18-phishstats", "5ee575760577ade1"),
        SamplePath("2025-02-16-12-phishstats", "7d1596577da6ae5d"),
    ]

    parser = RemoteParser(samplePaths=samplePaths, tmpDir='/archive/tmp/tmp.Wt6YunKLtq/')

    parser.addSampleStep(RemoteParserHandlers.printSamplePath)

    parser.run()

    # parser.addCondition(RemoteParserHandlers.checkDate)
    # parser.addGroupStep(RemoteParserHandlers.printDownloadedFolder)
    # parser.addSampleStep(RemoteParserHandlers.printNumberOfLogs)
    #
    # parser.run()


        

