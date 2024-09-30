import os
import shutil
import argparse
import re
import logging
from enum import Enum
from typing import List
import subprocess
import argparse
from dateutil import parser

DRIVE_FOLDER_ID = '1yiXbLymyVIgnbakZzfCH1i3kOngwzAvr'  # That is the official one
DRIVE_FOLDER = '/ITA/Mestrado/Crawled Data/Log Files/'

class Entry:
    class Category(Enum):
        FOLDER = "folder"
        REGULAR = "regular"

    def __init__(self, entryId, entryName, entryType):
        self.entryId = entryId
        self.entryName = entryName
        self.entryType = Entry.Category(entryType)

# Must have rclone installed
class GDriveDownloader:
    def __init__(self,
                 # gdrive stuff (Still migrating)
                 rootFolderId=DRIVE_FOLDER_ID,
                 # rclone stuff
                 rootFolderPath=DRIVE_FOLDER,
                 remoteName="ita-drive"
                ):
        self.rootFolderId = rootFolderId
        self.rootFolderPath = rootFolderPath
        self.remoteName = remoteName

    def _parseEntryLines(self, rawEntryLines) -> List[Entry]:
        entries = []
        
        lineItems = rawEntryLines[1:]

        for line in lineItems:
            if not line:
                continue

            entryId, entryName, entryType, *_ = line.split()

            entries.append(Entry(entryId, entryName, entryType))

        return entries

    def _numberOfEntries(self, folderId):
        numberOfEntriesGuess = 100

        while True:
            p = subprocess.Popen(f"gdrive files list --parent \"{folderId}\" --max {numberOfEntriesGuess} | wc -l", shell=True, stdout=subprocess.PIPE)
            out, err = p.communicate()

            nEntries = int(out.decode("utf-8").strip()) - 1

            if nEntries == numberOfEntriesGuess:
                numberOfEntriesGuess *= 2
            else:
                numberOfEntriesGuess = nEntries
                break

        return numberOfEntriesGuess

    def listEntries(self, dirId=None) -> List[Entry]:
        if not dirId:
            dirId = self.rootFolderId

        numberOfEntries = self._numberOfEntries(dirId)
        p = subprocess.Popen(f"gdrive files list --parent \"{dirId}\" --max {numberOfEntries}", shell=True, stdout=subprocess.PIPE)
        out, err = p.communicate()

        rawEntryLines  = out.decode("utf-8").split("\n")

        entries = self._parseEntryLines(rawEntryLines)

        return entries

    def _getEntryId(self, folderId, entryName) -> str:
        p = subprocess.Popen(f"gdrive files list --parent \"{folderId}\" | grep {entryName} | awk '{{print $1}}'", shell=True, stdout=subprocess.PIPE)
        out, err = p.communicate()
        
        entryId = out.decode("utf-8").strip()
        return entryId

    def downloadFolder(self, folderName, destination = os.getcwd()):
        folderPath = os.path.join(destination, folderName)
        folderId = self._getEntryId(self.rootFolderId, folderName)

        if not folderId:
            raise ValueError(f"Folder {folderName} not found")

        if os.path.exists(folderPath):
            shutil.rmtree(folderPath)

        os.makedirs(folderPath)

        os.system(f"rclone copy {self.remoteName}:\"{self.rootFolderPath}{folderName}\" \"{folderPath}\"")

    def downloadFrom(self, dateInit = "2024-08-11", dateEnd = "2024-09-15", destination = os.getcwd()):
        dateInit = parser.parse(dateInit)
        dateEnd = parser.parse(dateEnd)

        entries = self.listEntries()
        for entry in entries:
            if not re.match(r"\d{4}-\d{2}-\d{2}-.*", entry.entryName):
                continue

            entryDateString = re.match(r"(\d{4}-\d{2}-\d{2})-.*", entry.entryName).group(1)
            entryDate = parser.parse(entryDateString)

            if dateInit <= entryDate <= dateEnd:
                logging.info(f"Downloading {entry.entryName}")
                self.downloadFolder(entry.entryName, destination)

if __name__ == "__main__":
    downloader = GDriveDownloader(rootFolderId=DRIVE_FOLDER_ID)
    entries = downloader.listEntries()
    
    downloader.downloadFrom(dateInit="2024-09-25", dateEnd="2024-09-30")

