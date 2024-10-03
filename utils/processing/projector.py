from dataset_embedding import DatasetEmbedding, DomainInstructionBlock
from dataset_parser import DatasetParser, WebsiteSample
from clusterizer import Clusterizer
from datetime import datetime
from dateutil import parser
import os
import re

class Projector:
    def __init__(self, targetDate: datetime, dir: str):
        self.targetDate = targetDate
        self.dir = dir

    def preprocess(self):
        hashes = set()

        dailySamples = sorted(os.listdir(self.dir))
        removedHashes = 0
        for dailySample in dailySamples:
            dailySamplePath = os.path.join(self.dir, dailySample)

            for logSample in os.listdir(dailySamplePath):
                logHash = logSample.split(".")[0]
                
                if logHash in hashes:
                    print(f"Repeated hash ({logHash}) found in {dailySamplePath}")
                    os.remove(os.path.join(dailySamplePath, logSample))
                    removedHashes += 1
                    continue

                hashes.add(logHash)

        print(f"Removed {removedHashes} repeated hashes")

    def fit(self, targetDate: datetime):
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

        print("Saving vectors")
        cluster.save(dir)
        print("Saving the data.json")
        cluster.exportJson(f'{dir}/data.json')

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
    projector = Projector(parser.parse("2024-09-29"), "/home/joaof/files/downloaded-phishing-logs")
    projector.preprocess()

