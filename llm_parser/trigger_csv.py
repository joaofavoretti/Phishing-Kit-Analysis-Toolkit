from typing import List
import os
import pydantic
from llm_parser import LLMParser
import json
import csv
from remote_parser import SamplePath, RemoteParser, path_t, date_t
from sample_parser import SampleParser
from gdrive_sync import GDriveSync

LOCAL_RESULT_DIR = "./results"

REMOTE_FOLDER_ID = "1Wt7lnChWYi2Lf1mgPtD1HcMPB8jA-1jk"
REMOTE_FOLDER_NAME = '/ITA/Mestrado/Crawled Data/LLM Result Data/'
resultDrive = GDriveSync(rootFolderId=REMOTE_FOLDER_ID, rootFolderPath=REMOTE_FOLDER_NAME)

# How many instructions to use in the parse
NUMBER_OF_INSTRUCTIONS = 500

TOO_BIG = 1000000

analysed_hashes = set()

NUMBER_OF_RESULTS_TO_SAVE = 10
result = {}

def saveResults():
    i = 1
    while os.path.exists(os.path.join(LOCAL_RESULT_DIR, f"result_{i}.json")):
        i += 1

    resultPath = os.path.join(LOCAL_RESULT_DIR, f"result_{i}.json")

    print("Saving result...")
    with open(resultPath, "w") as f:
        json.dump(result, f, indent=2)

    resultDrive.uploadFile(resultPath)

    result.clear()


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

        if len(result) >= NUMBER_OF_RESULTS_TO_SAVE:
            saveResults()

if __name__ == '__main__':
    CSV_FILE = './filtered_samples.csv'
    with open(CSV_FILE, 'r') as f:
        reader = csv.reader(f)
        header = next(reader)
        
        assert header.index("SampleHash") != -1, "SampleHash column not found"
        assert header.index("SampleDir") != -1, "SampleDir column not found"

        sampleHashIndex = header.index("SampleHash")
        sampleDirIndex = header.index("SampleDir")

        samples: List[SamplePath] = []
        for row in reader:
            samples.append(SamplePath(row[sampleDirIndex], row[sampleHashIndex]))

        parser = RemoteParser(samplePaths=samples)

        parser.addSampleStep(RemoteParserHandlers.llmParseSample)

        parser.run()
        saveResults()

