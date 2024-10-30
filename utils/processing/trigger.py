from gdrive_sync import GDriveSync
from projector import Projector
from typing import Union
import datetime
import logging
import shutil
import time
import sys
import os
import re

TMP_DIR = "/home/joaof/files/downloaded-phishing-logs"
RESULTS_DIR = "/home/joaof/files/clustering-out"

SAMPLES_FOLDER_ID = '1yiXbLymyVIgnbakZzfCH1i3kOngwzAvr'  # That is the official one
SAMPLES_FOLDER = '/ITA/Mestrado/Crawled Data/Log Files/'

DATA_FOLDER_ID = '1kkNXpbHsEvKTM7KIWDz0FHFDazlXpwSM'
DATA_FOLDER = '/ITA/Mestrado/Crawled Data/Data Files/'

SamplesSync = GDriveSync(rootFolderId=SAMPLES_FOLDER_ID, rootFolderPath=SAMPLES_FOLDER)
DataSync = GDriveSync(rootFolderId=DATA_FOLDER_ID, rootFolderPath=DATA_FOLDER)

date_t = str
path_t = str

class Trigger:
    def __init__(self, initialDate="2024-09-25"):
        self.initialDate = initialDate

        logging.basicConfig(
            level=logging.DEBUG,
            format='(%(asctime)s) [%(levelname)s] %(message)s',
            filename="trigger.log"
        )

    def _getNextTargetDate(self) -> Union[date_t, None]:
        storedDates = SamplesSync.listDates(fromDate=self.initialDate)
        parsedDates = DataSync.listDates(fromDate=self.initialDate)

        newDates = sorted(list(set(storedDates) - set(parsedDates) - set([self.initialDate])))
        
        if not newDates:
            return None

        return newDates[0]

    def _getLastDataPath(self) -> path_t:
        availableResults = os.listdir(RESULTS_DIR)

        if not availableResults:
            return None

        return os.path.join(RESULTS_DIR, sorted(availableResults)[-1], 'data.json')

    def _runProjector(self, targetDate:date_t) -> path_t:
        lastDataPath = self._getLastDataPath()

        projector = Projector(dir=TMP_DIR, lookup=lastDataPath, fromDate=self.initialDate, targetDate=targetDate)

        initialTime = time.time()

        projector.fit()
        targetDateDir = os.path.join(RESULTS_DIR, targetDate)
        projector.export(targetDateDir)

        finalTime = time.time()

        logging.info(f"Execution time ({self.initialDate} to {targetDate}): {time.strftime('%H hours, %M minutes', time.gmtime(finalTime - initialTime))}")

        return targetDateDir

    def _uploadResult(self, targetOutDir:path_t):
        ret = DataSync.uploadFolder(targetOutDir)

        if ret != 0:
            logging.error(f"Error uploading {targetOutDir}. Manually check it")
            sys.exit(1)

    def _cleanUnusedResults(self, targetOutDir:path_t):
        lastResult = os.path.basename(targetOutDir)
        resultDir = os.path.dirname(targetOutDir)
        
        for result in os.listdir(resultDir):
            if result == lastResult:
                continue

            shutil.rmtree(os.path.join(resultDir, result))

    def run(self):
        while True:
            targetDate = self._getNextTargetDate()

            if not targetDate:
                logging.info("No new dates found. Sleeping for 1 day.")
                time.sleep(datetime.timedelta(days=1).total_seconds())
                continue

            logging.info(f"Running the projector from {self.initialDate} to {targetDate}")
            targetOutDir = self._runProjector(targetDate)
            self._uploadResult(targetOutDir)
            self._cleanUnusedResults(targetOutDir)

if __name__ == "__main__":
    trigger = Trigger(initialDate="2024-09-25")
    trigger.run()

