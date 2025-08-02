import asyncio
import json
from pathlib import Path
from openai import OpenAI

INPUT_LOGS_FILE = 'out_clean.txt'

client = OpenAI()

# instructions = """
# You are receiving a sequence of JavaScript execution trace with LOAD, CALL, SET and GET operations. It is common for phishing websites to execute fingerprinting operations before loading a well known benign url. Identify if there are such behavior. If so, extract it
# """

instructions = """
I collected the sequence of bytecode execution from Chrome after I tried to navigate to a known phishing URL. The sequence of logs obtained have the following format:

```
LOAD <url>
CALL <object_name>.<function_name>
SET <object_name>.<property_name>
GET <object_name>.<property_name>
```

The LOAD operation indicates that the resources from the URL were loaded by the browser. The CALL, SET and GET have an associated object and function/property name.

Phishing websites sometimes uses fingerprinting instructions to obtain information about the user before loading the malicious url. If the user matches some fingerprint criteria, the phishing website will redirect the user to a famous benign URL (e.g. google.com, facebook.com, etc).

Your task is to identify if the logs present a sequence of operations that indicate fingerprinting activities, followed by a LOAD operation with the root path of a bening URL.

"""

with open(INPUT_LOGS_FILE, 'r') as file:
    logs = file.read()

response = client.responses.create(
    model="gpt-4o-mini",
    temperature=0.2,
    input=[
        {"role": "user", "content": instructions},
        {"role": "user", "content": logs},
    ],
    text={
        "format": {
            "type": "json_schema",
            "name": "redirection_detection",
            "schema": {
                "type": "object",
                "properties": {
                    "express_behavior": {
                        "type": "boolean"
                    },
                    "benign_url": {
                        "type": ["string", "null"]
                    },
                    "fingerprint_operations": {
                        "type": ["array", "null"],
                        "items": {
                            "type": "string"
                        }
                    },
                },
                "required": ["express_behavior", "benign_url", "fingerprint_operations"],
                "additionalProperties": False
            },
            "strict": True
        }
    }
)

print(response.output_text)



