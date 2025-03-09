from urllib.parse import urlparse
from typing import Union, List, Dict
from enum import Enum
import numpy as np
import logging
import os
import re

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


class DomainInstructionBlock:
    def __init__(self, domain:str, instructions:str):
        
        assert type(instructions) == str
        assert type(domain) == str

        self.domain = domain
        self.instructions = instructions
        self.vector:np.ndarray|None = None

    def exportJson(self):
        ret = {}

        ret["domain"] = self.domain
        ret["instructions"] = self.instructions
        
        # if self.vector is not None:
        #     ret["vector"] = self.vector.tolist()

        return ret


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
        return f"SET-{obj}.{key}={value}"

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
        return f"CALL-{obj}.{method}({params})"

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

    def extract_instruction_blocks(self) -> Dict:
        """
            Each domain in the log file loads a piece of code.
            That code can be execute in different times throughout the program lifecycle.
            This function extracts list of instructions that are executed at different times, for each domain
        """
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
                    
                    # Filtering all the GET instruction that happen because of CALL instructions
                    if inst_type == InstructionType.CALL and len(blocks[last_executed_domain][-1]) > 0:
                        last_ret = blocks[last_executed_domain][-1][-1]
                        if last_ret['type'] == InstructionType.GET.name:
                            if last_ret['obj'] == ret['obj'] and last_ret['key'] == ret['method']:
                                blocks[last_executed_domain][-1].pop()

                    blocks[last_executed_domain][-1].append(ret)
                    
        return blocks

    # category: FILE, DOMAIN, DEFAULT
    def stringify_instruction_blocks(self, instruction_blocks, filehash, category="DEFAULT", output_filename=None):
        output = ""
        res = ""

        output += f"<<FILEHASH>> {filehash}\n"
        for domain, blocks in instruction_blocks.items():

            if category != "FILE":
                output += f"<<DOMAIN>> {domain if len(domain) > 0 else 'EMPTY'}\n"
            
            if category == "DOMAIN":
                res = ""

            for block in blocks:

                if category == "DEFAULT":
                    res = ""

                for instruction in block:
                    inst_type = instruction['type']
                    inst_formatter = getattr(self, self.INSTRUCTION_FORMATTER_MAP[InstructionType[inst_type]])

                    ret = inst_formatter(**{k: v for k, v in instruction.items() if k != 'type'})
                    if ret is not None:
                        res += f"{ret} "

                if category == "DEFAULT" and len(res) > 0:
                    output += f"{res}\n"

            if category == "DOMAIN" and len(res) > 0:
                output += f"{res}\n"

        if category == "FILE" and len(res) > 0:
            output += f"{res}\n"
        
        if output_filename is None:
            return output
        
        with open(output_filename, 'a') as f:
            f.write(output)

    # Only implementation: Category=DOMAIN
    def parse_instruction_blocks(self, instruction_blocks) -> List[DomainInstructionBlock]:
        parsed_instruction_blocks: List[DomainInstructionBlock] = []

        for domain, blocks in instruction_blocks.items():
            instructions = []
            for block in blocks:
                for instruction in block:
                    inst_type = instruction['type']
                    inst_formatter = getattr(self, self.INSTRUCTION_FORMATTER_MAP[InstructionType[inst_type]])

                    ret = inst_formatter(**{k: v for k, v in instruction.items() if k != 'type'})
                    if ret is not None:
                        instructions.append(ret)

            if len(instructions) > 0:
                parsed_instruction_blocks.append(DomainInstructionBlock(domain, ' '.join(instructions)))

        return parsed_instruction_blocks

    def extract_instruction_sequence(self) -> List[str]:
        sequence: List[str] = []

        with open(self.filename, 'r') as f:
            instructions = f.readlines()

            for instruction in instructions:
                inst_type = self._instruction_type(instruction)
                if inst_type is None: continue

                inst_parser = getattr(self, self.INSTRUCTION_PARSER_MAP[inst_type])
                parser_ret = inst_parser(instruction)
                if parser_ret is None: continue
                parser_ret['type'] = inst_type.name

                if inst_type in OPERATIONS_SET:
                    inst_formatter = getattr(self, self.INSTRUCTION_FORMATTER_MAP[inst_type])
                    formatter_ret = inst_formatter(**{k: v for k, v in parser_ret.items() if k != 'type'})
                    if formatter_ret is not None:
                        sequence.append(formatter_ret)
                    
        return sequence


MALICIOUS_LOGFILES_DIR = [
    "/archive/files/eval-phishing-pages/out/phishtank"
]

BENIGN_LOGFILES_DIR = []


if __name__ == "__main__":
    # parser = LogParser("../samples/sample-1.log")
    # blocks = parser.extract_instruction_blocks()
    # parsed_instruction_blocks = parser.parse_instruction_blocks(blocks)

    parser = LogParser("/home/joao/my/ita/mestrado/clustering-phishing-kit/reproduction/rods-with-laser-beams/fingerprintjs-demo.log")
    sequence = parser.extract_instruction_sequence()
    with open("/home/joao/my/ita/mestrado/clustering-phishing-kit/reproduction/rods-with-laser-beams/fingerprintjs-demo-sequence.txt", 'w') as f:
        f.write('\n'.join(sequence))


