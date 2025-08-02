
import json
import re
import os

RESULTS_FOLDER = '<Your Path>/llm_results/'
POSITIVE_SAMPLES = 'positive_samples.json'

if __name__ == '__main__':

    res = {}

    for result in sorted(os.listdir(RESULTS_FOLDER)):
        if result.endswith('.json') and result != POSITIVE_SAMPLES:
            with open(os.path.join(RESULTS_FOLDER, result), 'r') as f:
                data = json.load(f)

            date = re.search(r'\d{4}-\d{2}-\d{2}', result)
            if date:
                date = date.group(0)
            else:
                date = 'unknown'

            for sampleName, sampleData in data.items():
                print(f'({result}) Looking at {sampleName}', end='                   \r')

                if sampleData['final_answer']['express_behavior'] == True:
                    print() 
                    sampleData['final_answer']['date'] = date
                    # print(json.dumps(sampleData, indent=4))
                    
                    res[sampleName] = sampleData

    with open(POSITIVE_SAMPLES, 'w') as f:
        json.dump(res, f, indent=4)

