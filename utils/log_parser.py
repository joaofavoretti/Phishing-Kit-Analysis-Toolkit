from gensim.models.doc2vec import Doc2Vec, TaggedDocument
from sentence_transformers import SentenceTransformer
from urllib.parse import urlparse
from typing import Union, List
from enum import Enum
import numpy as np
import logging
import pickle
import shutil
import json
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
                    # TODO: Test this out
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
                
            parsed_instruction_blocks.append(DomainInstructionBlock(domain, ' '.join(instructions)))

        return parsed_instruction_blocks


def _vectorize_instruction_blocks_doc2vec(input_filename):
    labeled_data = []
    filehash = None
    domain = None
    data = {}
    count = 0
    with open(input_filename, 'r') as f:
        for line in f:
            if line.strip() == '':
                continue

            if line.startswith('<<FILEHASH>>'):
                filehash_t = line.strip().split('<<FILEHASH>>')[1]
                
                if filehash != filehash_t:
                    filehash = filehash_t
                    count = 0
                
                continue
                
            if line.startswith('<<DOMAIN>>'):
                domain = line.strip().split('<<DOMAIN>>')[1].strip()
                continue
                
            labeled_data.append(TaggedDocument(words=line.split(), tags=[f'{filehash}_{count}']))
            
            if filehash not in data:
                data[filehash] = {}

            data[filehash][count] = {
                "domain": domain,
                "instruction": line,
                "vector": None,
                "label": 0,
            }

            count += 1

    model = Doc2Vec(vector_size=128, window=32, min_count=1, workers=4, epochs=40, dm=0, dbow_words=1)
    model.build_vocab(labeled_data)
    model.train(labeled_data, total_examples=model.corpus_count, epochs=model.epochs)

    X = np.array([model.dv[tagged_doc.tags[0]] for tagged_doc in labeled_data])

    y = np.array([tagged_doc.tags[0] for tagged_doc in labeled_data])
    for i, tag in enumerate(y):
        [hash, count] = tag.split('_')
        data[hash][int(count)]['vector'] = [str(x) for x in X[i]]
    
    return X, labeled_data, data


def _vectorize_instruction_blocks_sbert(input_filename):
    labeled_data = []
    filehash = None
    domain = None
    data = {}
    count = 0
    with open(input_filename, 'r') as f:
        for line in f:
            if line.strip() == '':
                continue

            if line.startswith('<<FILEHASH>>'):
                filehash_t = line.strip().split('<<FILEHASH>>')[1]
                
                if filehash != filehash_t:
                    filehash = filehash_t
                    count = 0
                
                continue
                
            if line.startswith('<<DOMAIN>>'):
                domain = line.strip().split('<<DOMAIN>>')[1].strip()
                continue
                
            labeled_data.append(TaggedDocument(words=line.split(), tags=[f'{filehash}_{count}']))
            
            if filehash not in data:
                data[filehash] = {}

            data[filehash][count] = {
                "domain": domain,
                "instruction": line,
                "vector": None,
                "label": 0,
            }

            count += 1

    model = SentenceTransformer('stsb-roberta-large')
    X = model.encode([' '.join(tagged_doc.words) for tagged_doc in labeled_data])

    y = np.array([tagged_doc.tags[0] for tagged_doc in labeled_data])
    for i, tag in enumerate(y):
        [hash, count] = tag.split('_')
        data[hash][int(count)]['vector'] = [str(x) for x in X[i]]
    
    return X, labeled_data, data


def vectorize_instruction_blocks(input_filename, mode="doc2vec"):
    """
        mode: [doc2vec, sbert] 
    """

    if mode == "doc2vec":
        return _vectorize_instruction_blocks_doc2vec(input_filename)
    elif mode == "sbert":
        return _vectorize_instruction_blocks_sbert(input_filename)

    raise Exception(f"Mode {mode} not supported")


def save_vectors(X, tags, output_dir=None, labels=None):
    if output_dir is None:
        output_dir = os.getcwd()
        
    if labels is None:
        labels = np.array([0 for _ in range(X.shape[0])])

    if len(labels) != X.shape[0] and len(labels) != len(tags):
        raise Exception(f"All vectors must have the same length. Got {X.shape[0]} vectors, {len(tags)} tags and {len(labels)} labels")

    with open(os.path.join(output_dir, 'vectors.tsv'), 'w') as f:
        for i in range(X.shape[0]):
            f.write('\t'.join([str(x) for x in X[i]]) + '\n')
    
    with open(os.path.join(output_dir, 'metadata.tsv'), 'w') as f:
        f.write('TAG\tLabel\n')
        for i in range(len(tags)):
            f.write(f'{tags[i]}\t{labels[i]}\n')


def save_dict_data(data, output_file=None):
    import copy
    data_cp = copy.deepcopy(data)

    if output_file is None:
        output_file = os.path.join(os.getcwd(), 'data.json')

    BLACKLISTED_STARTS_RE = [r"http(s)?:\/\/t.co\/", r"http(s)?:\/\/bit.ly\/", r"http(s)?:\/\/tinyurl.com\/", r"http(s)?:\/\/goo.gl\/", r"http(s)?:\/\/ow.ly\/", r"http(s)?:\/\/is.gd\/", r"http(s)?:\/\/buff.ly\/", r"http(s)?:\/\/dlvr.it\/", r"http(s)?:\/\/ift.tt\/", r"http(s)?:\/\/lnkd.in\/", r"http(s)?:\/\/fb.me\/", r"http(s)?:\/\/wp.me\/", r"http(s)?:\/\/wp.me\/", r"http(s)?:\/\/dlvr.it\/"]

    # Add common library files to the blacklist and the ones that have the version as well. Like: jquery.js, jquery.min.js, jquery-3.5.1.min.js
    BLACKLISTED_FILES_RE = [r"jquery(\-\d+\.\d+\.\d+)?(\.min)?\.js", r"bootstrap(\-\d+\.\d+\.\d+)?(\.min)?\.js", r"popper(\-\d+\.\d+\.\d+)?(\.min)?\.js"]

    BLACKLISTED_DOMAINS = ["EMPTY", "about:blank", "chrome://headless/headless_command.html", "chrome://headless/headless_command.js"]

    # Remove the blacklisted domains
    for filehash, counts in data.items():
        for count, info in counts.items():
            if info['domain'] in BLACKLISTED_DOMAINS:
                del data_cp[filehash][count]
                continue

            # Uncomment here if you want to apply the blacklist based stuff to remove the libraries and shortened urls
            for start in BLACKLISTED_STARTS_RE:
                if re.search(start, info['domain']):
                    del data_cp[filehash][count]
                    continue

            for file_re in BLACKLISTED_FILES_RE:
                if re.search(file_re, info['domain']):
                    del data_cp[filehash][count]
                    continue

    with open(output_file, 'w') as f:
        json.dump(data_cp, f)


MALICIOUS_LOGFILES_DIR = [
    "/archive/files/eval-phishing-pages/out/phishtank"
]

BENIGN_LOGFILES_DIR = []


if __name__ == "__main__":

    print("Vectorizing data...")
    X, labeled_data, dict_data = vectorize_instruction_blocks('/home/joao/my/ita/mestrado/2-clustering-phishing-kit/utils/out/output2.txt', mode="sbert")
    tags = np.array([tagged_doc.tags[0] for tagged_doc in labeled_data])
    labels = np.array([1 if 'GET-Window.webdriver' in doc.words else 0 for doc in labeled_data])

    save_dict_data(dict_data)

    print("Saving vectors...")
    save_vectors(X, tags, output_dir='/home/joao/my/ita/mestrado/2-clustering-phishing-kit/utils/', labels=labels)

