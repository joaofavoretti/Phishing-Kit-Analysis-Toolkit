import json
import os
import shutil
import re
import logging
import numpy as np
from urllib.parse import urlparse
from tempfile import mkdtemp
from enum import Enum
from typing import Union

BLACKLIST_URLS = ["chrome\\://headless/headless_command.html", "about\\:blank"]

def get_domain(url):
    if url == None:
        return ''

    parsed = urlparse(url)
    return parsed.netloc

class InstructionType(Enum):
    GET = 'GET'
    DOMAIN = 'DOMAIN'
    SET = 'SET'
    CALL = 'CALL'
    EXECUTE = 'EXECUTE'
    LOAD = 'LOAD'
    
OPERATIONS_SET = set([InstructionType.GET, InstructionType.SET, InstructionType.CALL])

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

    INSTRUCTION_FORMATTER_MAP = {
        InstructionType.GET: '_format_get',
        InstructionType.SET: '_format_set',
        InstructionType.CALL: '_format_call',
        InstructionType.EXECUTE: '_format_execute',
        InstructionType.LOAD: '_format_load',
        InstructionType.DOMAIN: '_format_domain'
    }

    def __init__(self, filename):
        self.filename = filename
        
        if not self._valid_filename(filename):
            raise Exception(f"File {self.filename} does not exist")

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

    def _valid_filename(self, filename):
        return filename.endswith('.log') and os.path.exists(filename)

    def _instruction_type(self, instruction) -> Union[InstructionType, None]:
        inst_type_letter = instruction[0]

        if inst_type_letter in INSTRUCTION_INITIAL_MAP:
            return INSTRUCTION_INITIAL_MAP[inst_type_letter]

        return None

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

    def _format_get(self, ident, obj, key):
        return f"GET-{obj}.{key}"

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

    def _format_set(self, ident, obj, key, value):
        return f"SET-{obj}.{key}"

    def _parse_call(self, line):
        try:
            match = re.match(r'c(\d+):%(.*?):\{(\d+),(\w+)\}(.*)', line)

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

    def _format_call(self, ident, method, obj, params):
        return f"CALL-{obj}.{method}"

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

    def _format_execute(self, ident):
        return None

    def _parse_load(self, line):
        try:
            match = re.match(r'\$(\d+):(\d+|".*?"):(.*)', line)

            if match is None:
                raise Exception("(PARSE_LOAD) No regex match")

            [ident, source, code] = match.groups()
            
            domain = None
            if source.startswith('"') and source.endswith('"'):
                source = source[1:-1]
                source = source.replace("\\", "" , 1)
                domain = get_domain(source)

            return {
                'ident': ident,
                'source': source,
                'domain': domain,
                'code': code
            }
        except Exception as e:
            logging.info(f"(PARSE_LOAD) Error parsing line: {line}")
            logging.info(e)
            return None

    def _format_load(self, ident, source, domain, code):
        return None

    def _parse_domain(self, line):
        try:
            match = re.match(r'@"(.*?)":"(.*?)"', line) 

            if match is None:
                raise Exception("(PARSE_DOMAIN) No regex match")
                
            [url, secret] = match.groups()
            
            url = url.replace("\\", "" , 1)

            return {
                'url': url,
                'domain': get_domain(url),
                'secret': secret
            }
        except Exception as e:
            logging.info(f"(PARSE_DOMAIN) Error parsing line: {line}")
            logging.info(e)
            return None

    def _format_domain(self, url, domain, secret):
        return None

    def extract_instruction_blocks(self):
        domains = dict()
        domains['?'] = '?'

        blocks = dict()

        last_executed_domain = None

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

                ret['type'] = inst_type.name

                if inst_type == InstructionType.LOAD:
                    # TODO: Choose the way of getting the instruction sequences
                    # domains[ret['ident']] = ret['domain']
                    domains[ret['ident']] = ret['source']
                    continue

                if inst_type == InstructionType.EXECUTE:
                    last_executed_domain = domains[ret['ident']]
                    
                    if last_executed_domain not in blocks:
                        blocks[last_executed_domain] = [[]]
                    else:
                        if len(blocks[last_executed_domain][-1]) > 0:
                            blocks[last_executed_domain].append([])

                    continue

                if inst_type in OPERATIONS_SET:
                    blocks[last_executed_domain][-1].append(ret)
                    

        return blocks

    def format_instruction_block(self, instruction_block):
        res_list = []

        for block in instruction_block:
            res = ""
            for instruction in block:
                inst_type = instruction['type']
                inst_formatter = getattr(self, self.INSTRUCTION_FORMATTER_MAP[InstructionType[inst_type]])

                ret = inst_formatter(**{k: v for k, v in instruction.items() if k != 'type'})
                if ret is not None:
                    res += f"{ret} "

            res_list.append(res)

        return res_list

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

MALICIOUS_LOGFILES_DIR = [
    "/archive/files/eval-phishing-pages/out/phishtank"
]

if __name__ == "__main__":

    # sample_filename = "./samples/sample-1.log" 
    # sample_filename = "./samples/sample-2.log" 
    # sample_filename = "./samples/sample-3.log" 

    # parser = LogParser(sample_filename)
    # print(parser)
    
    # instruction_blocks = parser.extract_instruction_blocks()
    # with open('output.json', 'w') as f:
    #     json.dump(instruction_blocks, f, indent=4)
    #
    # res = {}
    # for domain, blocks in instruction_blocks.items():
    #     res[domain] = parser.format_instruction_block(blocks)
    #
    # with open('output.txt', 'w') as f:
    #     for domain, blocks in res.items():
    #         for block in blocks:
    #             f.write(f"{block}\n")
                
    res = []

    def parse_properties(filepaths, filehash, label):
        for filepath in filepaths:
            parser = LogParser(filepath)
            instruction_blocks = parser.extract_instruction_blocks()
            for domain, blocks in instruction_blocks.items():
                res.append(f"DOMAIN-{domain}")
                formatted_blocks = parser.format_instruction_block(blocks)
                for block in formatted_blocks:
                    res.append(block)

    for logfiles_dir in MALICIOUS_LOGFILES_DIR:
        for_each_log_file(logfiles_dir, parse_properties, debug=True)(label=1)

    with open('output1.txt', 'w') as f:
        for block in res:
            f.write(f"{block}\n")


