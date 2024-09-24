import os
import sys
import shutil
import logging
import subprocess
import argparse

LOGS_DIR = "/archive/files/eval-phishing-pages/out/logs-dir"
DRIVE_FOLDER_ID = '1yiXbLymyVIgnbakZzfCH1i3kOngwzAvr'  # That is the official one
# DRIVE_FOLDER_ID = '15MUq7UaJ8kEBnuyyhhOTN5XESEvMi9Yk'    # That is the testing one

class Uploader:
    def __init__(self, driveFolderId=DRIVE_FOLDER_ID):
        self.dirPaths = []
        self.driveFolderId = driveFolderId

    def _getDirId(self, dirName) -> str:
        p = subprocess.Popen(f"gdrive files list --parent \"{self.driveFolderId}\" | grep {dirName} | awk '{{print $1}}'", shell=True, stdout=subprocess.PIPE)
        out, err = p.communicate()
        
        dirDriveId = out.decode("utf-8").strip()
        return dirDriveId

    def _getUploadedFiles(self, dirName, maxFiles) -> list:
        dirId = self._getDirId(dirName)

        if not dirId:
            return []

        p = subprocess.Popen(f"gdrive files list --parent '{dirId}' --max {maxFiles} | awk '{{print $2}}'", shell=True, stdout=subprocess.PIPE)
        out, err = p.communicate()

        uploadedFiles = out.decode("utf-8").split("\n")
        
        if len(uploadedFiles) == 1:
            return []

        return uploadedFiles[1:]

    def _getUploadedFilesFromDir(self, dirPath) -> list:
        dirName = os.path.basename(dirPath)
        maxFiles = len(os.listdir(dirPath))
        return self._getUploadedFiles(dirName, maxFiles)

    def _getNotUploadedFilesFromDir(self, dirPath) -> list:
        uploadedFiles = set(self._getUploadedFilesFromDir(dirPath))
        existingFiles = set(os.listdir(dirPath))

        return list(existingFiles - uploadedFiles)

    def _isFullyUploaded(self, dirPath):
        notUploadedFiles = self._getNotUploadedFilesFromDir(dirPath)

        return len(notUploadedFiles) == 0

    def _removeUploadedFiles(self, dirPath):
        uploadedFiles = self._getUploadedFilesFromDir(dirPath)
        for file in uploadedFiles:
            filePath = os.path.join(dirPath, file)
            if os.path.isfile(filePath):
                os.remove(filePath)

        if len(uploadedFiles) > 0:
            logging.info(f"Removed the uploaded files from {dirPath}")

    def _uploadDir(self, dirPath):
        # Remove the uploaded files from dirPath
        self._removeUploadedFiles(dirPath)

        dirId = self._getDirId(os.path.basename(dirPath))

        # If the directory already exists. Upload the files one by one in the existing directory
        if dirId:
            for file in os.listdir(dirPath):
                filePath = os.path.join(dirPath, file)
                ret = os.system(f"gdrive files upload --parent {dirId} {filePath}")
                if ret != 0:
                    logging.error(f"Failed to upload the file {filePath}")
                    return
        # If the directory do not exist. Upload the directory recursively all at once
        else:
            # Upload the directory
            ret = os.system(f"gdrive files upload --recursive --parent {self.driveFolderId} {dirPath}")
            if ret != 0:
                logging.error(f"Failed to upload the directory {dirPath}")
                return

        # Remove the uploaded files from dirPath
        self._removeUploadedFiles(dirPath)

        logging.info(f"Finished uploading the directory {dirPath}")

    def addDir(self, dirPath) -> None:
        if not os.path.isdir(dirPath):
            logging.error(f"The directory {dirPath} does not exist")
            sys.exit(1)

        self.dirPaths.append(dirPath)

    def runBackup(self) -> None:
        for dirPath in self.dirPaths:
            if self._isFullyUploaded(dirPath):
                logging.info(f"The directory {dirPath} has already been uploaded")
                continue

            self._uploadDir(dirPath)

        logging.info("Finished uploading all the directories")


def main():
    parser = argparse.ArgumentParser(description='Upload the logs to Google Drive')
    parser.add_argument('-d', '--directory', type=str, help='The directory to upload', required=True)
    args = parser.parse_args()

    dirPath = args.directory
    uploader = Uploader(driveFolderId=DRIVE_FOLDER_ID)

    uploader.addDir(dirPath) 
    uploader.runBackup()


if __name__ == "__main__":
    logging.basicConfig(
        level=logging.DEBUG,
        format='(%(asctime)s) [%(levelname)s] %(message)s',
        filename="uploader.log"
    )

    main()
