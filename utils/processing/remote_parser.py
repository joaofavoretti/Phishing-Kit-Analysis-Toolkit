from gdrive_sync import GDriveSync 
from sample_parser import SampleParser
from typing import List, TypeAlias, Union, Callable, NewType
from dateutil import parser
import logging
from urllib.parse import urlparse
import csv
import os
import re

path_t: TypeAlias = str
date_t: TypeAlias = str 

ConditionHandler = Callable[[date_t], bool]
GroupStepHandler = Callable[[path_t, date_t], None]
SampleStepHandler = Callable[[path_t, date_t], None]

class RemoteParser:
    def __init__(self, minDate: date_t = "2024-09-25", maxDate: Union[date_t, None] = None, tmpDir: path_t = "/archive/tmp/"):
        self.minDate = minDate
        self.maxDate = maxDate
        self.tmpDir = tmpDir

        self.conditionHandlers: List[ConditionHandler] = []
        self.groupStepHandlers: List[GroupStepHandler] = []
        self.sampleStepHandlers: List[SampleStepHandler] = []

    def addSampleStep(self, handler: SampleStepHandler):
        self.sampleStepHandlers.append(handler)

    def addGroupStep(self, handler: GroupStepHandler):
        self.groupStepHandlers.append(handler)

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

    def run(self):
        dateEntries = GDriveSync().listDates(fromDate=self.minDate, targetDate=self.maxDate)
        
        for date in sorted(dateEntries):
            print(f"Processing date {date}") 

            if not self._isValidDate(date):
                continue 

            folderPaths = self._download(date)
            for folderPath in folderPaths:
                for handler in self.groupStepHandlers:
                    handler(folderPath, date)

            for folderPath in folderPaths:
                numSamples = len(os.listdir(folderPath))
                for i, sample in enumerate(os.listdir(folderPath)):
                    print(f'({os.path.basename(folderPath)}) Processing sample {i+1}/{numSamples}', end='                    \r')

                    samplePath = os.path.join(folderPath, sample)
                    for handler in self.sampleStepHandlers:
                        handler(samplePath, date)

                print()

        return

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
    def printNumberOfLogs(samplePath: path_t, date: date_t):
        try:
            sample = SampleParser(samplePath)
        except:
            return 

        print(f'Sample Name: {sample.name}')
        print(f"Number of logs: {len(sample.getLogs())}")

if __name__ == '__main__':
    logging.basicConfig(level=logging.ERROR)

    parser = RemoteParser(minDate="2024-09-25", maxDate="2024-09-25", tmpDir='/archive/tmp/tmp.Wt6YunKLtq/')

    parser.addCondition(RemoteParserHandlers.checkDate)
    parser.addGroupStep(RemoteParserHandlers.printDownloadedFolder)
    parser.addSampleStep(RemoteParserHandlers.printNumberOfLogs)

    parser.run()


        

