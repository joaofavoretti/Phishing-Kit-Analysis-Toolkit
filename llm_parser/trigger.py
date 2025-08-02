from typing import List
import pydantic
from llm_parser import LLMParser
import json
import csv
from remote_parser import SamplePath, RemoteParser, path_t, date_t
from sample_parser import SampleParser
from gdrive_sync import GDriveSync
import os

LOCAL_RESULT_DIR = "./results"

REMOTE_FOLDER_ID = "1Wt7lnChWYi2Lf1mgPtD1HcMPB8jA-1jk"
REMOTE_FOLDER_NAME = '/ITA/Mestrado/Crawled Data/LLM Result Data/'

# How many instructions to consider from each log
NUMBER_OF_INSTRUCTIONS = 1500

TOO_BIG = 1000000

drive = GDriveSync(rootFolderId=REMOTE_FOLDER_ID, rootFolderPath=REMOTE_FOLDER_NAME)

analysed_hashes = set()

result = {}

if not os.path.exists(LOCAL_RESULT_DIR):
    os.makedirs(LOCAL_RESULT_DIR)

class RemoteParserHandlers:
    @staticmethod
    def llmParseSample(samplePath: path_t, date: date_t):
        global analysed_hashes

        print(f"Parsing sample {samplePath} ({date})")
        sample = SampleParser(samplePath)

        if sample.name in analysed_hashes:
            print(f"Sample {sample.name} ({date}) already analysed")
            return

        if len(analysed_hashes) > TOO_BIG:
            analysed_hashes = set()

        logs = sorted(sample.getLogs(), key=lambda x: x.name)[1:]
        
        if len(logs) == 0:
            print(f"Sample {sample.name} has no logs")
            return

        instructions = [instruction for log in logs for instruction in log.extract_instruction_sequence()]
        instructions = instructions[:NUMBER_OF_INSTRUCTIONS]
        logText = "\n".join(instructions)

        llm = LLMParser(logText) 
        res = llm.run()

        if res is None:
            print(f"Sample {sample.name} ({date}) has no response")
            return
    
        print(f"Sample {sample.name} ({date}) has response:")
        print(res.model_dump_json(indent=2))
        
        result[sample.name] = res.model_dump() 
        analysed_hashes.add(sample.name)

    @staticmethod
    def saveResult(folderPath: path_t, date: date_t):
        if len(result.keys()) == 0:
            return

        i = 1
        while os.path.exists(os.path.join(LOCAL_RESULT_DIR, f"{date}_{i}.json")):
            i += 1

        resultPath = os.path.join(LOCAL_RESULT_DIR, f"{date}_{i}.json")

        print("Saving result...")
        with open(resultPath, "w") as f:
            json.dump(result, f, indent=2)

        drive.uploadFile(resultPath)

        result.clear()


if __name__ == '__main__':
        minDate = os.environ.get("MIN_DATE", "2024-09-25")
        maxDate = os.environ.get("MAX_DATE", "2024-09-26")
        parser = RemoteParser(minDate=minDate, maxDate=maxDate, tmpDir="/app/tmp")

        parser.addSampleStep(RemoteParserHandlers.llmParseSample)
        parser.addLateGroupStep(RemoteParserHandlers.saveResult)

        parser.run()


