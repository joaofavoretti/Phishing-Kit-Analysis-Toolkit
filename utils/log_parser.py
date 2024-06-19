import json
import os
import shutil
import re
import logging
import numpy as np
from tempfile import mkdtemp
from enum import Enum
from typing import Union


BLACKLIST_URLS = ["chrome\\://headless/headless_command.html", "about\\:blank"]

class InstructionType(Enum):
    GET = 'GET'
    DOMAIN = 'DOMAIN'
    SET = 'SET'
    CALL = 'CALL'
    EXECUTE = 'EXECUTE'
    LOAD = 'LOAD'

INSTRUCTION_INITIAL_MAP = {
    'g': InstructionType.GET,
    '@': InstructionType.DOMAIN,
    's': InstructionType.SET,
    'c': InstructionType.CALL,
    '!': InstructionType.EXECUTE,
    '$': InstructionType.LOAD
}

class LogParser:

    INSTRUCTION_PARSER_MAP = {
        InstructionType.GET: '_parse_get',
        InstructionType.SET: '_parse_set',
        InstructionType.CALL: '_parse_call',
        InstructionType.EXECUTE: '_parse_execute',
        InstructionType.LOAD: '_parse_load',
        InstructionType.DOMAIN: '_parse_domain'
    }

    def __init__(self, filename):
        self.filename = filename
        
        if not self._valid_filename(filename):
            raise Exception(f"File {self.filename} does not exist")

    def _valid_filename(self, filename):
        return filename.endswith('.log') and os.path.exists(filename)

    def _instruction_type(self, instruction) -> Union[InstructionType, None]:
        inst_type_letter = instruction[0]

        if inst_type_letter in INSTRUCTION_INITIAL_MAP:
            return INSTRUCTION_INITIAL_MAP[inst_type_letter]

        return None

    def __str__(self):
        res = f"LogParser({self.filename})\n"

        with open(self.filename, 'r') as f:
            instructions = f.readlines()
            for instruction in instructions:
                
                inst_type = self._instruction_type(instruction)
                if inst_type is None:
                    continue

                inst_parser = getattr(self, self.INSTRUCTION_PARSER_MAP[inst_type])
                
                ret = inst_parser(instruction)

                if ret is None:
                    continue

                res += f"{inst_type}: {ret}\n"
    
        return res

    # def extract_code_segments(self, get_instructions=False):
    #     code_segments = {}
    #     code_urls = {}
    #     current_ident = None
    #     with open(self.filename, 'r') as f:
    #         lines = f.readlines()
    #         for line in lines:
    #             line_type = self._line_type(line)
    #
    #             if line_type == LINE_TYPES['UPLOAD']:
    #                 ret = self._parse_upload(line.strip())
    #
    #                 if ret is None:
    #                     print("Something really bad happened")
    #                     print(line, flush=True)
    #
    #                 ident = ret['ident']
    #
    #                 if ident not in code_urls:
    #                     code_urls[ident] = ret['url']
    #                 else:
    #                     print("extract_code_segments: Error 1. Load two codes with the same identifier")
    #
    #                 if ident not in code_segments:
    #                     code_segments[ident] = []
    #                 else:
    #                     print("extract_code_segments: Error 2 - Load two codes with the same identifier")
    #
    #                 continue 
    #             elif line_type == LINE_TYPES['EXECUTE']:
    #                 ret = self._parse_execute(line.strip())
    #
    #                 if ret is None:
    #                     print("Something really bad happened")
    #
    #                 ident = ret['ident']
    #
    #                 if ident not in code_segments:
    #                     # print(f"extract_code_segments: Error 3 - Execute without upload ({ident})")
    #                     code_segments[ident] = [[]]
    #                 else:
    #                     code_segments[ident].append([])
    #
    #                 if current_ident is not None:
    #                     code_segments[current_ident][-1].append(f"{line.strip()}[{len(code_segments[ident]) - 1}]")
    #
    #                 current_ident = ident
    #             elif line_type in OPERATIONS:
    #                 if get_instructions:
    #                     if self._line_type(line) == LINE_TYPES['GET']:
    #                         ret = self._parse_get(line.strip())
    #                         if ret is not None:
    #                             code_segments[current_ident][-1].append(f"{ret['obj']}.{ret['key']}")
    #                 else:
    #                     code_segments[current_ident][-1].append(line.strip())
    #
    #     return code_segments, code_urls
    # 
    # def extract_window_origins(self):
    #     window_origins = []
    #     with open(self.filename, 'r') as f:
    #         lines = f.readlines()
    #         for line in lines:
    #             if self._line_type(line) == LINE_TYPES['DOMAIN']:
    #                 ret = self._parse_domain(line.strip())
    #                 if ret is not None:
    #                     window_origins.append(ret['domain'])
    #     return window_origins
    #
    # def extract_code_segments_list(self, get_instructions=True, consider_wordlist=True, inwordlist=True):
    #     code_segments, _ = self.extract_code_segments(get_instructions=get_instructions)
    #     code_segments_list = []
    #     for code_list in code_segments.values():
    #         for code in code_list:
    #
    #             if len(code) == 0:
    #                 continue
    #
    #             if code[-1].startswith("!"):
    #                 code.pop()
    #
    #             ok = True
    #             if self.wordlist is not None and consider_wordlist:
    #                 ok = False
    #                 for inst in code:
    #                     if get_instructions:
    #                         for word in self.wordlist:
    #                             if word in inst:
    #                                 ok = True
    #                     else:
    #                         inst_type = self._line_type(inst)
    #                         if inst_type != LINE_TYPES['GET']:
    #                             continue
    #
    #                         ret = self._parse_get(inst)
    #
    #                         if ret is None:
    #                             continue
    #
    #                         _inst = ret['key']
    #
    #                         for word in self.wordlist:
    #                             if word in _inst:
    #                                 ok = True
    #
    #             if not (ok ^ inwordlist) and len(code) > 0:
    #                 code_segments_list.append(code)
    #
    #     return code_segments_list

    def _parse_get(self, instruction):
        try:
            match = re.match(r'g(\d+):\{(\d+),(\w+)\}:"(\w+)"', instruction)

            if match is None:
                raise Exception("(PARSE_GET) No regex match")

            [ident, _, objclass, key] = match.groups()
            return {
                'ident': ident,
                'obj': objclass,
                'key': key
            }
        except Exception as e:
            logging.info(f"(PARSE_GET) Error parsing line: {instruction}")
            logging.info(e)
            return None

    def _parse_set(self, line):
        try:
            match = re.match(r's(\d+):\{(\d+),(\w+)\}:"(\w+)":(.*?)$', line)

            if match is None:
                raise Exception("(PARSE_SET) No regex match")

            [ident, _, objclass, key, value] = match.groups()
            return {
                'ident': ident,
                'obj': objclass,
                'key': key,
                'value': value
            }
        except Exception as e:
            logging.info(f"(PARSE_SET) Error parsing line: {line}")
            logging.info(e)
            return None

    def _parse_call(self, line):
        try:
            match = re.match(r'c(\d+):%(.*):\{(\d+),(\w+)\}(.*)', line)

            if match is None:
                raise Exception("(PARSE_CALL) No regex match")

            [ident, method, _, objclass, params] = match.groups()

            if method.startswith("get"):
                return None

            return {
                'ident': ident,
                'method': method,
                'obj': objclass,
                'params': params.replace(":", "", 1)
            }

        except Exception as e:
            logging.info(f"(PARSE_CALL) Error parsing line: {line}")
            logging.info(e)
            return None

    def _parse_execute(self, line):
        try:
            match = re.match(r'!(.+)', line)

            if match is None:
                raise Exception("(PARSE_EXECUTE) No regex match")

            [ident] = match.groups()
            return {
                'ident': ident
            }
        except Exception as e:
            logging.info(f"(PARSE_EXECUTE) Error parsing line: {line}")
            logging.info(e)
            return None

    def _parse_load(self, line):
        try:
            match = re.match(r'\$(\d+):"(.*?)":(.*?)$', line)

            if match is None:
                raise Exception("(PARSE_LOAD) No regex match")

            [ident, url, code] = match.groups()

            if url.startswith('"') and url.endswith('"'):
                url = url[1:-1]

            return {
                'ident': ident,
                'url': url,
                'code': code
            }
        except Exception as e:
            logging.info(f"(PARSE_LOAD) Error parsing line: {line}")
            logging.info(e)
            return None

    def _parse_domain(self, line):
        try:
            match = re.match(r'@"(.*?)":"(.*?)"', line) 

            if match is None:
                raise Exception("(PARSE_DOMAIN) No regex match")
                
            [domain, secret] = match.groups()
            return {
                'domain': domain,
                'secret': secret
            }
        except Exception as e:
            logging.info(f"(PARSE_DOMAIN) Error parsing line: {line}")
            logging.info(e)
            return None

def get_wordlist_paths(wordlist_dir):
    wordlist_paths = []
    for root, _, files in os.walk(wordlist_dir):
        for file in files:
            if file.endswith('.txt'):
                wordlist_paths.append(os.path.join(root, file))
    return wordlist_paths

def for_each_log_file(logs_dir, func, debug=True):
    def wrapper(*args, **kwargs):

        for i, log in enumerate(os.listdir(logs_dir)):
            log_path = os.path.join(logs_dir)
            if debug:
                print(f"({i + 1}) Extracting {log_path}", end="                                               \r")
            os.chdir(logs_dir)
            filehash = log[:-7] # To account for the .tar.gz extension

            # Extract
            tmp_dir = mkdtemp()
            os.system(f"tar -xzf {log} -C {tmp_dir}")

            filepaths = []

            nof_logs = 0
            for root, _, files in os.walk(tmp_dir):
                for file in files:
                    if not file.endswith(".log"):
                        continue

                    nof_logs += 1

                    # If the second line starts with @"about\:blank", it is not wanted then skip
                    with open(os.path.join(root, file), 'r') as f:
                        lines = f.readlines()
                        if len(lines) > 1 and lines[1].startswith('@\"about:blank\"'):
                            continue

                    filepath = os.path.join(root, file)
                    filepaths.append(filepath)
            if nof_logs > 1:
                func(filepaths, filehash, *args, **kwargs)

            # Deconstruct
            shutil.rmtree(tmp_dir)

            os.chdir("..")
    return wrapper

if __name__ == "__main__":
    sample_filename = "./samples/sample-1.log" 
    # sample_filename = "/archive/files/eval-phishing-pages/out/phishtank/b68bac73e4e88409/files/vv8-1713318285915-424-424-chrome.0.log" 
    # sample_filename = "/archive/files/eval-phishing-pages/out/phishtank/be99e3e9f5e22bed/files/vv8-1713318128978-68-68-chrome.0.log"

    # parser = LogParser(sample_filename, wordlist="/home/joao/my/ita/mestrado/eval-phishing-pages/wordlists/all.txt")
    parser = LogParser(sample_filename)
    # parser = LogParser(sample_filename, wordlist="/home/joao/my/ita/mestrado/eval-phishing-pages/wordlists/fingerprints/visiblev8/bot-visiblev8.txt")

    print(parser)

    # First way of viewing the block instructions
    # Maybe it is nice to use this to reconstruct a graph of some sort
    # with open('output.json', 'w') as f:
    #     code_segments, code_urls = parser.extract_code_segments()
    #     json.dump({"code_segments": code_segments, "code_urls": code_urls}, f, indent=4)
    
    # Getting the window_origins
    # with open('output.json', 'w') as f:
        # window_origins = parser.extract_window_origins()
        # json.dump({"window_origins": window_origins}, f, indent=4)

    # Second way of viewing the block instructions
    # with open('output.json', 'w') as f:
    #     json.dump({"codesTrueegments": parser.extract_code_segments(get_instructions=False)}, f, indent=4)

    # with open('output3.json', 'w') as f:
    #     json.dump({"codesTrueegments": parser.extract_code_segments_list(get_instructions=False, inwordlist=False)}, f, indent=4)

    # Test with wordcount
    # with open('output1.json', 'w') as f:
    #     json.dump({"wordcount": parser.extract_word_count(from_code_segments=True).tolist()}, f, indent=4)

    # with open('output2.json', 'w') as f:
    #     json.dump({"opcount": parser.extract_op_count(from_code_segments=True).tolist()}, f, indent=4)


    # Test with opcount
    # with open('output_list.json', 'w') as f:
    #     json.dump({"result": parser.extract_features(from_code_segments=True, inwordlist=True).tolist()}, f, indent=4)

