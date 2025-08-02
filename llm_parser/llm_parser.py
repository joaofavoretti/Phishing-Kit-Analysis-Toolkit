import asyncio
import json
from pathlib import Path
from pydantic import BaseModel
from openai import OpenAI, LengthFinishReasonError

MODEL_INSTRUCTIONS = """
I collected a sequence of bytecode execution logs from Chrome after attempting to navigate to a known phishing URL. Each log entry follows one of the formats below:

```
SWITCH-<url>
LOAD-<url>
CALL-<object_name>.<function_name>
SET-<object_name>.<property_name>
GET-<object_name>.<property_name>
```

Each operation has the following meaning:
- SWITCH: Indicates that window.origin was changed to <url>, i.e., the browser redirected to this URL.
- LOAD: Indicates that resources were loaded from <url> (e.g., HTML, JavaScript, CSS).
- CALL: A function <function_name> was called on object <object_name>.
- SET: A property <property_name> was set on object <object_name>.
- GET: A property <property_name> was accessed (read) from object <object_name>.

Phishing websites may perform fingerprinting by executing CALL, SET, or GET operations on specific objects and properties to collect information about the user or environment. If certain fingerprint criteria are matched, the phishing site may then redirect the user to a benign URL (e.g., https://www.google.com/, https://www.facebook.com/) to avoid suspicion.

Important:
You are not expected to detect the phishing URL itself. Your goal is to identify the behavioral pattern described above.

Definitions:
Benign redirection: Any SWITCH operation pointing to a well-known, safe domain (e.g., Google, Facebook).
Be conservative when determining what counts as "benign" — for example, https://malicious.github.io/ or https://phishing.weebly.com/ should not be considered benign, even though they are hosted on legitimate services.

Your Task:
Given a sequence of logs:
1. Identify whether there is evidence of fingerprinting behavior — i.e., CALL, SET, or GET operations involving objects or properties typically used for fingerprinting.
2. Determine if this fingerprinting is followed by a benign redirection (a SWITCH to a known safe domain).
3. If both fingerprinting and a benign redirection are present in the sample, conclude that the log sequence expresses the intended phishing behavior.

Be conservative when deciding whether an operation is related to fingerprinting — only consider known, clear indicators of such behavior.
"""

class FinalResult(BaseModel):
    express_behavior: bool
    benign_url: str | None
    fingerprint_operations: list[str] | None

class Step(BaseModel):
    explanation: str
    output: str

class Reasoning(BaseModel):
    steps: list[Step]
    final_answer: FinalResult

class LLMParser:
    def __init__(self, logText: str):
        self.logText = logText
        self.client = OpenAI()

    def run(self) -> Reasoning | None:
        try:
            print("Trying to parse with gpt-4o-mini")
            response = self.client.beta.chat.completions.parse(
                model="gpt-4o-mini",
                temperature=0.2,
                messages=[
                    {"role": "user", "content": MODEL_INSTRUCTIONS},
                    {"role": "user", "content": self.logText},
                ],
                response_format=Reasoning,
            )
        except LengthFinishReasonError:
            print("Error with gpt-4o-mini, trying gpt-4o")
            response = self.client.beta.chat.completions.parse(
                model="gpt-4o",
                temperature=0.2,
                messages=[
                    {"role": "user", "content": MODEL_INSTRUCTIONS},
                    {"role": "user", "content": self.logText},
                ],
                response_format=Reasoning,
            )


        return response.choices[0].message.parsed

if __name__ == '__main__':
    with open("samples/out_clean.txt", "r") as file:
        logText = file.read()

    parser = LLMParser(logText)
    result = parser.run()

    if result is None:
        print("No result")
    else:
        print(result.model_dump_json(indent=2))
