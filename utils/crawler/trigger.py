from datetime import datetime, timedelta
import schedule
import logging
import random
import time
import csv
import os
import sys


URL_DIR = "/home/joao/my/ita/mestrado/2-clustering-phishing-kit/utils/tmp"
UTILS_DIR = "/home/joao/my/ita/mestrado/2-clustering-phishing-kit/utils"
OUTPUT_DIR = "/home/joao/my/ita/mestrado/2-clustering-phishing-kit/out/"
AMOUNT_SCHEDULES = 5


# Possible Error: This consider that the download will be done in the same minute that the script is running
# If not, possible error when the downloader will be done in the last minute from the last hour, and the 
#   parser will be checked in the first minute from the next hour and find anything
def parse_urls():
    logging.info("Started downloading the URLs")
    # Run the downloader script
    os.system(f"python3 {UTILS_DIR}/downloader.py --output {URL_DIR}")
    
    # Check new files downloaded
    newFiles = []
    currentTime = datetime.now().strftime("%Y-%m-%d-%H")

    logging.info("Started parsing the URLs")
    # Iterate through the files
    for file in os.listdir(URL_DIR):
        if not file.endswith(".txt"):
            continue

        # Check if the file is new
        if not file.startswith(currentTime):
            continue

        # Check if thefile is not empty
        with open(f"{URL_DIR}/{file}", "r") as f:
            urls = f.readlines()
        if not urls:
            continue

        newFiles.append(os.path.join(URL_DIR, file))

    logging.info(f"Downloaded {len(newFiles)}: {newFiles}")
    for file in newFiles:
        # Extract the outputDir from the filePat
        fileName = os.path.basename(file)
        outputDirName = fileName.split(".", 1)[0]
        outputDir = os.path.join(OUTPUT_DIR, outputDirName)

        os.system(f"python3 {UTILS_DIR}/analiser.py -p -f {file} -o {outputDir}")


def schedule_random_time():
    schedule.clear("daily_parse_urls")

    # PRODUCTION: Define the start and end times to range throughout the day
    start_time = datetime.now().replace(hour=0, minute=0, second=0, microsecond=0)
    end_time = start_time + timedelta(days=1)

    # DEBUG: Define the start and end time to range through the next 10 minutes
    # start_time = datetime.now()
    # end_time = start_time + timedelta(minutes=10)

    for _ in range(AMOUNT_SCHEDULES):
        # Generate a random time between start_time and end_time
        delta = end_time - start_time
        int_delta = int(delta.total_seconds())
        random_second = random.randint(0, int_delta)
        random_time = start_time + timedelta(seconds=random_second)

        # Schedule the job at the random time
        schedule_time_str = random_time.strftime("%H:%M:%S")
        schedule.every().day.at(schedule_time_str).do(parse_urls).tag("daily_parse_urls")
        logging.info(f"Job scheduled at {schedule_time_str}")


def main() -> None:
    schedule_time = (datetime.now() + timedelta(minutes=1)).strftime("%H:%M:%S")
    logging.info(f"Random scheduling daily at {schedule_time}")
    schedule.every().day.at(schedule_time).do(schedule_random_time).tag("daily_schedule_random_time")

    while True:
        schedule.run_pending()
        time.sleep(1)


if __name__ == "__main__":
    logging.basicConfig(
        level=logging.DEBUG,
        format='(%(asctime)s) [%(levelname)s] %(message)s',
        filename="trigger.log"
    )

    main()

