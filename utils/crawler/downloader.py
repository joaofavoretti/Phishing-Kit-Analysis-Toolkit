from abc import abstractmethod
import requests
import logging
import schedule
import time
import csv
import os
import argparse


class InvalidDownloadException(Exception):
    pass


class Downloader:
    URL = ""
    LABEL = ""

    def _getOldUrls(self, oldFilePath):
        usedUrls = set()
        if oldFilePath is not None:
            with open(oldFilePath, "r") as f:
                for line in f:
                    usedUrls.add(line.strip())
        return usedUrls

    def _clean(self, oldFilePath):
        if oldFilePath is not None:
            os.remove(oldFilePath)

    def download(self, directory):
        response = requests.get(self.URL)
        
        if response.status_code != 200:
            raise InvalidDownloadException("Failed to download file: %s" % response.status_code)

        # Get the filename
        currentDateAndHour = time.strftime("%Y-%m-%d-%H")
        fileName = f"{currentDateAndHour}-{self.LABEL}.txt"
        filePath = os.path.join(directory, fileName)
       
        # Obtain the last txt file to compare
        oldFilePath = None
        for file in os.listdir(directory):
            if file.endswith(f"{self.LABEL}.txt"):
                oldFilePath = os.path.join(directory, file)
                break

        # Parse the new content against the old one to list the new entries
        self.parse(response.content, filePath, oldFilePath)

    @abstractmethod
    def parse(self, content, filePath, oldFilePath):
        pass


class PhishTankDownloader(Downloader):
    URL = "http://data.phishtank.com/data/online-valid.csv"
    LABEL = "phishtank"

    def parse(self, content, filePath, oldFilePath):
        # Parse the old file
        usedUrls = self._getOldUrls(oldFilePath)

        # Parse content as CSV
        content = content.decode("utf-8")
        content = content.split("\n")
        reader = csv.reader(content)
        next(reader)

        hasNewEntries = False
        # Parse the rows
        with open(filePath, "w") as f:
            for row in reader:
                if len(row) == 0:
                    break

                url = row[1]

                if url in usedUrls:
                    break

                f.write(url + "\n")
                hasNewEntries = True

        # Clean the old file
        if not hasNewEntries:
            os.remove(filePath)
        else:
            self._clean(oldFilePath)

class OpenPhishDownloader(Downloader):
    URL = "https://openphish.com/feed.txt"
    LABEL = "openphish"

    def parse(self, content, filePath, oldFilePath):
        # Parse the old file
        usedUrls = self._getOldUrls(oldFilePath)

        # Parse content as CSV
        content = content.decode("utf-8")
        content = content.split("\n")

        hasNewEntries = False
        # Parse the rows
        with open(filePath, "w") as f:
            for url in content:
                if url in usedUrls:
                    break

                f.write(url + "\n")
                hasNewEntries = True

        if not hasNewEntries:
            os.remove(filePath)
        else:
            self._clean(oldFilePath)


class PhishStatsDownloader(Downloader):
    URL = "https://phishstats.info/phish_score.csv"
    LABEL = "phishstats"

    def parse(self, content, filePath, oldFilePath):
        # Parse the old file
        usedUrls = self._getOldUrls(oldFilePath)

        # Parse content as CSV
        content = content.decode("utf-8")
        content = content.split("\n")
        reader = csv.reader(content)
        
        # While line starts with #, skip it
        while True:
            line = next(reader)
            if not line[0].startswith("#"):
                break

        hasNewEntries = False
        # Parse the rows
        with open(filePath, "w") as f:
            for row in reader:
                if len(row) == 0:
                    break

                url = row[2]

                if url in usedUrls:
                    break

                f.write(url + "\n")
                hasNewEntries = True

        if not hasNewEntries:
            os.remove(filePath)
        else:
            self._clean(oldFilePath)


def main():

    parser = argparse.ArgumentParser(description='Downloader of phishing URLs from multiple sources')
    parser.add_argument('--output', '-o', type=str, help='Output directory', required=True)
    args = parser.parse_args()

    output_dir = args.output

    try:
        dwPhishTank = PhishTankDownloader()
        dwPhishTank.download(output_dir)
    except InvalidDownloadException as e:
        logging.error(f"Error while downloading PhishTank: {e}")

    try:
        dwOpenPhish = OpenPhishDownloader()
        dwOpenPhish.download(output_dir)
    except InvalidDownloadException as e:
        logging.error(f"Error while downloading OpenPhish: {e}")

    try:
        dwPhishStats = PhishStatsDownloader()
        dwPhishStats.download(output_dir)
    except InvalidDownloadException as e:
        logging.error(f"Error while downloading PhishStats: {e}")


if __name__ == '__main__':
    logging.basicConfig(
        level=logging.DEBUG,
        format='(%(asctime)s) [%(levelname)s] %(message)s',
        filename="downloader.log"
    )

    main()

