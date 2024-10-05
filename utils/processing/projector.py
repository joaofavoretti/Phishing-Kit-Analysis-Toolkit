from dataset_embedding import DatasetEmbedding, DomainInstructionBlock
from dataset_parser import DatasetParser, WebsiteSample
from gdrive_downloader import GDriveDownloader, Entry
from clusterizer import Clusterizer
from datetime import datetime
from dateutil import parser
from typing import List, Set
import pickle
import shutil
import os
import re

PATH = str

class Projector:
    def __init__(self, dir: str, dbPath='./pdb/', targetDate: str|None = None, fromDate: str|None = None):

        # Store the path that will handle the downloading of data
        self.dir = dir
        if not os.path.exists(self.dir):
            os.makedirs(self.dir)

        # Store the DB Path
        self.dbPath = dbPath
        self.saveDb = dbPath is not None
        if self.saveDb and not os.path.exists(self.dbPath):
            os.makedirs(self.dbPath)

        # Set that will store the used hashes for each day
        # INFO: Assumption that the hashes are gonna be stored in order
        # one day after the other. 
        self.usedHashes:Set[str] = set()
        
        # Dates of the projector
        self.targetDate = targetDate if targetDate is not None else self._getLastAvailableDate()
        self.fromDate = fromDate if fromDate is not None else self._getFirstAvailableDate()

        assert parser.parse(self.targetDate), "targetDate must be parseable"
        assert parser.parse(self.fromDate), "fromDate must be parseable"
        assert parser.parse(self.targetDate) > parser.parse(self.fromDate), "targetDate must be after fromDate"

    def _dbIsDateSaved(self, date):
        assert self.saveDb, "Cannot save the database if the dbPath is not set"
        
        dbDatePath = os.path.join(self.dbPath, f'{date}.pkl')
        return os.path.exists(dbDatePath)

    def _dbSaveDateWebsiteSamples(self, date:str, websiteSamples:List[WebsiteSample]):
        assert self.saveDb, "Cannot save the database if the dbPath is not set"
        assert os.path.exists(self.dbPath), "The database path does not exist"
        
        dbDatePath = os.path.join(self.dbPath, f'{date}.pkl')

        with open(dbDatePath, 'wb') as f:
            pickle.dump(websiteSamples, f)

    def _dbLoadDateWebsiteSamples(self, date:str) -> List[WebsiteSample]:
        assert self.saveDb, "Cannot save the database if the dbPath is not set"
        assert os.path.exists(self.dbPath), "The database path does not exist"
        
        dbDatePath = os.path.join(self.dbPath, f'{date}.pkl')

        with open(dbDatePath, 'rb') as f:
            websiteSamples = pickle.load(f)

        return websiteSamples
    
    def _getLastAvailableDate(self):
        entries = GDriveDownloader().listDates()
        return entries[-1]

    def _getFirstAvailableDate(self):
        entries = GDriveDownloader().listDates()
        return entries[0]

    def _getDownloadedFolderPaths(self, date: str) -> List[PATH]:
        folders = os.listdir(self.dir)
        folderPaths = []
        for folder in folders:
            if re.match(r"\d{4}-\d{2}-\d{2}-*", folder) \
                and re.match(r"(\d{4}-\d{2}-\d{2})-.*", folder).group(1) == date:
                folderPaths.append(os.path.join(self.dir, folder))

        return folderPaths

    def _removeDownloadedFolderPaths(self, date: str):
        folderPaths = self._getDownloadedFolderPaths(date)
        for folderPath in folderPaths:
            shutil.rmtree(folderPath)

    def _getFolderPaths(self, date: str) -> List[PATH]:
        folderPaths = self._getFolderPaths(date)

        if len(folderPaths) == 0:
            GDriveDownloader().downloadFrom(dateInit = date, dateEnd = date, destination = self.dir)
            folderPaths = self._getFolderPaths(date)

        return folderPaths

    def _getWebsiteSamplesHashes(self, websiteSamples: List[WebsiteSample]) -> Set[str]:
        return set([ws.filehash for ws in websiteSamples])

    def _updateHashes(self, wsHashes: Set[str]):
        # Check if there are repeated hashes
        repeatedHashes = self.usedHashes.intersection(wsHashes)
        assert len(repeatedHashes) == 0, f"Repeated hashes: {repeatedHashes}"

        self.usedHashes.update(wsHashes)

    def _dbSaveDateHashes(self, date:str, wsHashes: Set[str]):
        assert self.saveDb, "Cannot save the database if the dbPath is not set"
        assert os.path.exists(self.dbPath), "The database path does not exist"
        
        dbDatePath = os.path.join(self.dbPath, f'{date}-hashes.pkl')

        assert not os.path.exists(dbDatePath), "The hashes file already exists"

        with open(dbDatePath, 'wb') as f:
            pickle.dump(wsHashes, f)

    def _dbLoadDateHashes(self, date:str) -> Set[str]:
        assert self.saveDb, "Cannot save the database if the dbPath is not set"
        assert os.path.exists(self.dbPath), "The database path does not exist"
        
        dbDatePath = os.path.join(self.dbPath, f'{date}-hashes.pkl')

        assert os.path.exists(dbDatePath), "The hashes file does not exist"

        with open(dbDatePath, 'rb') as f:
            wsHashes = pickle.load(f)

        return wsHashes
    
    def _removeHashesFromFolder(self, folderPaths: List[PATH]):
        for folderPath in folderPaths:
            for sample in os.listdir(folderPath):
                sampleHash = sample.split('.')[0]
                if sampleHash in self.usedHashes:
                    samplePath = os.path.join(folderPath, sample)
                    os.remove(samplePath)

    def _setWsCategory(self, websiteSamples: List[WebsiteSample], category: WebsiteSample.Category):
        for ws in websiteSamples:
            ws.category = category
    
    def _loadDate(self, datasetParser: DatasetParser, date: str, category: WebsiteSample.Category):
        # If the date was already downloaded before
        if self._dbIsDateSaved(date):
            # If the date was already downloaded,
            #   it is not necessary to check if there is repeated hashes
            websiteSamples = self._dbLoadDateWebsiteSamples(date)
            wsHashes = self._dbLoadDateHashes(date)
            self._setWsCategory(websiteSamples, category)
            datasetParser.fitStored(websiteSamples, category)
            self._updateHashes(wsHashes)

        # If the folder was never downloaded before
        else:
            folderPaths = self._getFolderPaths(date)
            self._removeHashesFromFolder(folderPaths)

            # Fit the data
            websiteSamples = self.datasetParser.fit(folderPaths, category)
            wsHashes = self._getWebsiteSamplesHashes(websiteSamples)
            self._updateHashes(wsHashes)
            
            # Remove the downloaded data
            self._removeDownloadedFolderPaths(date)

            if self.saveDb:
                self._dbSaveDateWebsiteSamples(date, websiteSamples)
                self._dbSaveDateHashes(date, wsHashes)

    def fit(self):
        # Get the dates in the format "YYYY-MM-DD"
        dateEntries = GDriveDownloader().listDates(fromDate = self.fromDate, targetDate = self.targetDate)
        
        self.datasetParser = DatasetParser(dbPath=None)

        # Fit the training data
        # INFO: Sorted here is important because the hash calculations
        # will make sure that the next day do not contain hashes
        # from the thay prior
        for date in sorted(dateEntries):
            if date == self.targetDate:
                continue

            self._loadDate(self.datasetParser, date, WebsiteSample.Category.MALICIOUS)

        self._loadDate(self.datasetParser, self.targetDate, WebsiteSample.Category.UNLABELED)

        # Filtering the uncessary files
        def _filterOut(ib: DomainInstructionBlock):
            BLACKLISTED_DOMAINS = ["EMPTY", "about:blank", "chrome://headless/headless_command.html", "chrome://headless/headless_command.js", "?"]

            if ib.domain in BLACKLISTED_DOMAINS:
                return True

            return False

        self.datasetParser.preprocess(_filterOut)

    def old_fit(self):
        dailySamples = os.listdir(self.dir)

        targetLogFiles = []
        trainingLogFiles = []

        for dailySample in dailySamples:
            if not re.match(r"\d{4}-\d{2}-\d{2}-*", dailySample):
                continue

            dailySamplePath = os.path.join(self.dir, dailySample)

            dateString = re.match(r"(\d{4}-\d{2}-\d{2})-", dailySample).group(1)
            date = parser.parse(dateString)

            if date == self.targetDate:
                targetLogFiles.append(dailySamplePath)
            else:
                trainingLogFiles.append(dailySamplePath)

        datasetParser = DatasetParser()
        datasetParser.fit(targetLogFiles, WebsiteSample.Category.UNLABELED)
        datasetParser.fit(trainingLogFiles, WebsiteSample.Category.MALICIOUS)

        self.dataset = datasetParser

    def export(self, dir):
        cluster = Clusterizer(Clusterizer.Algorithm.DBSCAN, DatasetEmbedding.TransformMode.SBERT, Clusterizer.RepresentantStrategy.TRANSPOSE)
        cluster.fit(self.dataset)

        targetDateDir = os.path.join(dir, self.targetDate)
        print("Saving vectors")
        cluster.save(targetDateDir)
        print("Saving the data.json")
        cluster.exportJson(os.path.join(targetDateDir, "data.json"))

# Temporary function to test the clustering
def datasetFromDate(targetDate="2024-09-29", fromDate="2024-09-28"):
    logFolder = "/home/joaof/files/downloaded-phishing-logs"

    logFiles = os.listdir(logFolder)

    target = parser.parse(targetDate)
    from_ = parser.parse(fromDate)

    targetLogFiles = []
    trainingLogFiles = []

    for file in logFiles:
        if not re.match(r"\d{4}-\d{2}-\d{2}-*", file):
            continue

        logPath = os.path.join(logFolder, file)

        dateString = re.match(r"(\d{4}-\d{2}-\d{2})-", file).group(1)
        date = parser.parse(dateString)

        if date == target:
            targetLogFiles.append(logPath)
        elif from_ <= date < target:
            trainingLogFiles.append(logPath)

    datasetParser = DatasetParser()
    
    # Fitting
    datasetParser.fit(targetLogFiles, WebsiteSample.Category.UNLABELED)
    datasetParser.fit(trainingLogFiles, WebsiteSample.Category.MALICIOUS)

    # Preprocessing
    def _filterOut(ib: DomainInstructionBlock):
        BLACKLISTED_DOMAINS = ["EMPTY", "about:blank", "chrome://headless/headless_command.html", "chrome://headless/headless_command.js", "?"]

        if ib.domain in BLACKLISTED_DOMAINS:
            return True

        return False
    datasetParser.preprocess(_filterOut)

    return datasetParser


if __name__ == '__main__':
    projector = Projector("/archive/files/downloaded-phishing-logs", fromDate="2024-09-25")
    projector.fit()
    projector.export("/home/joaof/files/clustering-out")
