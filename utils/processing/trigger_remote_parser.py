from remote_parser import RemoteParser, date_t, path_t
from sample_parser import SampleParser
from urllib.parse import urlparse
import logging
import csv
import os

DOMAIN_WHITELIST_PATH = './tranco-1m.csv'
# FINGERPRINT_WORDLIST_PATH = '../../reproduction/rods-with-laser-beams/fingerprintjs-demo-sequence-l.txt'
FINGERPRINT_WORDLIST_PATH = './fingerprints.txt'

RESULT_EXECUTION_SEQUENCE = './results/execution_sequence.csv'
RESULT_FINGERPRINT_USAGE = './results/fingerprint_usage.csv'
RESULT_PHISHING_KIT = './results/phishing_kit.csv'

for path in [RESULT_EXECUTION_SEQUENCE, RESULT_FINGERPRINT_USAGE, RESULT_PHISHING_KIT]:
    if not os.path.exists(os.path.dirname(path)):
        os.makedirs(os.path.dirname(path))

    if os.path.exists(path):
        os.remove(path)

if not os.path.exists(RESULT_EXECUTION_SEQUENCE):
    with open(RESULT_EXECUTION_SEQUENCE, 'w') as f:
        writer = csv.writer(f)
        writer.writerow(['Date', 'SampleHash', 'SampleDir',  'Domain'])

if not os.path.exists(RESULT_FINGERPRINT_USAGE):
    with open(RESULT_FINGERPRINT_USAGE, 'w') as f:
        writer = csv.writer(f)
        writer.writerow(['Date', 'SampleHash', 'SampleDir',  'Fingerprints'])

if not os.path.exists(RESULT_PHISHING_KIT):
    with open(RESULT_PHISHING_KIT, 'w') as f:
        writer = csv.writer(f)
        writer.writerow(['Date', 'SampleHash', 'SampleDir'])


# Store the whitelist in a set
domainWhiteList = set()
with open(DOMAIN_WHITELIST_PATH, 'r') as f:
    reader = csv.reader(f)
    for row in reader:
        domainWhiteList.add(row[1])

# Store the fingerprint wordlist in a set
fingerprintWordList = []
with open(FINGERPRINT_WORDLIST_PATH, 'r') as f:
    for line in f:
        fingerprintWordList.append(line.strip())

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
    def checkBenignExecutionSequence(samplePath: path_t, date: date_t):
        try:
            sample = SampleParser(samplePath)
        except:
            return
        
        for log in sample.getLogs():
            urlsUsed = log.extract_instruction_blocks().keys()
            
            for url in urlsUsed:
                p = urlparse(url)
                domain = p.netloc
                path = p.path
                if domain in domainWhiteList and p.path == '/':
                    with open(RESULT_EXECUTION_SEQUENCE, 'a') as f:
                        writer = csv.writer(f)
                        writer.writerow([date, sample.name, sample.directory, url])
                        return

    @staticmethod
    def checkFingerprintUsage(samplePath: path_t, date: date_t):
        try: sample = SampleParser(samplePath)
        except: return

        fingerprintsUsed = set()
        for log in sample.getLogs():
            instruction_sequence = log.extract_instruction_sequence()
            for word in fingerprintWordList:
                for instruction in instruction_sequence:
                    if word in instruction:
                        fingerprintsUsed.add(word)

        if len(fingerprintsUsed) > len(fingerprintWordList) * 0.6:
            with open(RESULT_FINGERPRINT_USAGE, 'a') as f:
                writer = csv.writer(f)
                fingerprints = " ".join(list(fingerprintsUsed))
                writer.writerow([date, sample.name, sample.directory, fingerprints])

    @staticmethod
    def checkPhishingKit(samplePath: path_t, date: date_t):
        try: sample = SampleParser(samplePath)
        except: return

        if sample.hasPhishingKit:
            with open(RESULT_PHISHING_KIT, 'a') as f:
                writer = csv.writer(f)
                writer.writerow([date, sample.name, sample.directory])

if __name__ == '__main__':

    parser = RemoteParser(minDate="2025-01-01", maxDate="2025-03-01", tmpDir='/archive/tmp/tmp.Wt6YunKLtq/')

    parser.addCondition(RemoteParserHandlers.checkDate)

    parser.addGroupStep(RemoteParserHandlers.printDownloadedFolder)

    parser.addSampleStep(RemoteParserHandlers.checkBenignExecutionSequence)
    parser.addSampleStep(RemoteParserHandlers.checkFingerprintUsage)
    parser.addSampleStep(RemoteParserHandlers.checkPhishingKit)

    parser.run()
