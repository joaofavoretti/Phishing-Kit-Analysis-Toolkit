from typing import List
from llm_parser import LLMParser
import json
import csv
from remote_parser import SamplePath, RemoteParser, path_t, date_t
from sample_parser import SampleParser

MANUAL_CLASSIFICATION_RESULT = "manual_classification_result.csv"
RESULT_FILE = "llm_parser_result.json"

# How many instructions to use in the parse
NUMBER_OF_INSTRUCTIONS = 500

result = {}

valid_map = {}

class RemoteParserHandlers:
    @staticmethod
    def llmParseSample(samplePath: path_t, date: date_t):
        print(f"Parsing sample {samplePath} ({date})")
        sample = SampleParser(samplePath)
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
        
        if res.final_answer.express_behavior != valid_map[sample.name]:
            print("!!!!!!!!WARNINIG!!!!!!!!!")
            print(f"Sample {sample.name} ({date}) has inconsistent response")
            input("Press Enter to continue...")

        result[sample.name] = res.model_dump() 


if __name__ == '__main__':
    with open(MANUAL_CLASSIFICATION_RESULT, 'r') as f:
        reader = csv.reader(f)
        header = next(reader)
        samples: List[SamplePath] = []
        for row in reader:
            samples.append(SamplePath(row[1], row[0]))
            valid_map[row[0]] = True if row[2] == "true" else False

        # samples = samples[17:]

        parser = RemoteParser(samplePaths=samples)

        parser.addSampleStep(RemoteParserHandlers.llmParseSample)

        parser.run()

        with open(RESULT_FILE, 'w') as f:
            json.dump(result, f, indent=2)
            print(f"Results saved to {RESULT_FILE}")

