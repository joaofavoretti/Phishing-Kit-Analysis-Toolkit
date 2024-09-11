import os
import sys
import shutil
import logging

LOGS_DIR = "/home/joaof/files/phishing-logs"

def main():
    logging.info("Started uploading the logs")
    # Iterate through the files
    for file in os.listdir(LOGS_DIR):
        logging.info(f"Uploading the directory: {file}")

        if not os.path.isdir(os.path.join(LOGS_DIR, file)):
            logging.info(f"Skipping the file: {file}")
            continue

        # Check if the file is not empty
        if not os.listdir(os.path.join(LOGS_DIR, file)):
            logging.info(f"Removing the empty directory: {file}")
            shutil.rmtree(os.path.join(LOGS_DIR, file))
            continue

        # Upload the file
        dirPath = os.path.join(LOGS_DIR, file)
        parentFolderId = '1yiXbLymyVIgnbakZzfCH1i3kOngwzAvr'
        os.system(f"gdrive files upload --recursive --parent {parentFolderId} {dirPath}")

        # Remove the folder
        logging.info(f"Removing the directory: {file}")
        shutil.rmtree(os.path.join(LOGS_DIR, file))

    logging.info("Finished uploading the logs")


if __name__ == "__main__":
    logging.basicConfig(
        level=logging.DEBUG,
        format='(%(asctime)s) [%(levelname)s] %(message)s',
        filename="uploader.log"
    )

    main()