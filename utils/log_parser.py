import json
import os
import shutil
import re
import logging
import numpy as np
from tempfile import mkdtemp

BLACKLIST_VISITED_URLS = ["chrome\\://headless/headless_command.html", "about\\:blank"]

class LogParser:
    LINE_TYPES = {
        'GET': 'GET',
        'DOMAIN': 'DOMAIN',
        'SET': 'SET',
        'CALL': 'CALL',
        'EXECUTE': 'EXECUTE',
        'UPLOAD': 'UPLOAD',
    }

    LINE_INITIALS = {
        LINE_TYPES['GET']: 'g',
        LINE_TYPES['DOMAIN']: '@',
        LINE_TYPES['SET']: 's',
        LINE_TYPES['CALL']: 'c',
        LINE_TYPES['EXECUTE']: '!',
        LINE_TYPES['UPLOAD']: '$',
    }

    OPERATIONS = [LINE_TYPES['GET'], LINE_TYPES['SET'], LINE_TYPES['CALL']]

    wordlist = None

    def __init__(self, filename, wordlist=None):
        self.filename = filename
        
        if not os.path.exists(self.filename):
            raise Exception(f"File {self.filename} does not exist")

        if wordlist is not None:
            self.wordlist = [word.strip() for word in open(wordlist, 'r').readlines()]  

    def _line_type(self, line):
        for key, value in self.LINE_INITIALS.items():

            # TODO: That is a silly hack. Treat it later
            if line.startswith("@") and line.strip().endswith("}"):
                return None

            if line.startswith(value):
                return key
        return None

    def parse_print(self) -> None:
        with open(self.filename, 'r') as f:
            lines = f.readlines()
            for line in lines:
                if self._line_type(line) == self.LINE_TYPES['GET']:
                    ret = self._parse_get(line.strip())
                    if ret is not None:
                        if self.wordlist is not None and ret['key'] not in self.wordlist:
                            continue
                        print(f"{ret['obj']}.{ret['key']}")

                elif self._line_type(line) == self.LINE_TYPES['DOMAIN']:
                    ret = self._parse_domain(line.strip())
                    if ret is not None:
                        print(f"{ret['domain']}")

    def parse_list(self, mask) -> list[str]:
        ret_list = []
        with open(self.filename, 'r') as f:
            lines = f.readlines()
            for line in lines:
                if self._line_type(line) == self.LINE_TYPES['GET']:
                    ret = self._parse_get(line.strip())
                    if ret is not None:
                        if self.wordlist is not None and ret['key'] not in self.wordlist:
                            continue
                        ret_list.append(f"{ret['obj']}.{ret['key']}")

                elif self._line_type(line) == self.LINE_TYPES['DOMAIN']:
                    ret = self._parse_domain(line.strip())
                    if ret is not None and ret['domain'] not in BLACKLIST_VISITED_URLS:
                        ret_list.append("LINK" if mask else ret['domain'])

        return ret_list

    # Ok. I like that function
    # Does not consider wordlist
    # TODO: Make it consider wordlist
    def extract_code_segments(self, get_instructions=False):
        code_segments = {}
        code_urls = {}
        current_ident = None
        with open(self.filename, 'r') as f:
            lines = f.readlines()
            for line in lines:
                line_type = self._line_type(line)

                if line_type == self.LINE_TYPES['UPLOAD']:
                    ret = self._parse_upload(line.strip())

                    if ret is None:
                        print("Something really bad happened")
                        print(line, flush=True)

                    ident = ret['ident']

                    if ident not in code_urls:
                        code_urls[ident] = ret['url']
                    else:
                        print("extract_code_segments: Error 1. Load two codes with the same identifier")

                    if ident not in code_segments:
                        code_segments[ident] = []
                    else:
                        print("extract_code_segments: Error 2 - Load two codes with the same identifier")

                    continue 
                elif line_type == self.LINE_TYPES['EXECUTE']:
                    ret = self._parse_execute(line.strip())

                    if ret is None:
                        print("Something really bad happened")

                    ident = ret['ident']

                    if ident not in code_segments:
                        # print(f"extract_code_segments: Error 3 - Execute without upload ({ident})")
                        code_segments[ident] = [[]]
                    else:
                        code_segments[ident].append([])

                    if current_ident is not None:
                        code_segments[current_ident][-1].append(f"{line.strip()}[{len(code_segments[ident]) - 1}]")

                    current_ident = ident
                elif line_type in self.OPERATIONS:
                    if get_instructions:
                        if self._line_type(line) == self.LINE_TYPES['GET']:
                            ret = self._parse_get(line.strip())
                            if ret is not None:
                                code_segments[current_ident][-1].append(f"{ret['obj']}.{ret['key']}")
                    else:
                        code_segments[current_ident][-1].append(line.strip())

        return code_segments, code_urls
    
    def extract_window_origins(self):
        window_origins = []
        with open(self.filename, 'r') as f:
            lines = f.readlines()
            for line in lines:
                if self._line_type(line) == self.LINE_TYPES['DOMAIN']:
                    ret = self._parse_domain(line.strip())
                    if ret is not None:
                        window_origins.append(ret['domain'])
        return window_origins

    def extract_code_segments_list(self, get_instructions=True, consider_wordlist=True, inwordlist=True):
        code_segments, _ = self.extract_code_segments(get_instructions=get_instructions)
        code_segments_list = []
        for code_list in code_segments.values():
            for code in code_list:

                if len(code) == 0:
                    continue

                if code[-1].startswith("!"):
                    code.pop()

                ok = True
                if self.wordlist is not None and consider_wordlist:
                    ok = False
                    for inst in code:
                        if get_instructions:
                            for word in self.wordlist:
                                if word in inst:
                                    ok = True
                        else:
                            inst_type = self._line_type(inst)
                            if inst_type != self.LINE_TYPES['GET']:
                                continue

                            ret = self._parse_get(inst)

                            if ret is None:
                                continue

                            _inst = ret['key']

                            for word in self.wordlist:
                                if word in _inst:
                                    ok = True

                if not (ok ^ inwordlist) and len(code) > 0:
                    code_segments_list.append(code)

        return code_segments_list

    # Used to create a tabular datset of properties used
    def extract_get_property_count(self):
        properties = {}
        with open(self.filename, 'r') as f:
            lines = f.readlines()
            for line in lines:
                if self._line_type(line) == self.LINE_TYPES['GET']:
                    ret = self._parse_get(line.strip())
                    if ret is not None:
                        if self.wordlist is not None and ret['key'] not in self.wordlist:
                            continue
                        
                        property = f"GET {ret['obj']}.{ret['key']}"

                        if property not in properties:
                            properties[property] = 0
                        properties[property] += 1

        return properties

    def extract_set_property_count(self):
        properties = {}
        with open(self.filename, 'r') as f:
            lines = f.readlines()
            for line in lines:
                if self._line_type(line) == self.LINE_TYPES['SET']:
                    ret = self._parse_set(line.strip())
                    if ret is not None:
                        if self.wordlist is not None and ret['key'] not in self.wordlist:
                            continue
                        
                        property = f"SET {ret['obj']}.{ret['key']}"

                        if property not in properties:
                            properties[property] = 0
                        properties[property] += 1

        return properties

    def extract_call_property_count(self):
        properties = {}
        with open(self.filename, 'r') as f:
            lines = f.readlines()
            for line in lines:
                if self._line_type(line) == self.LINE_TYPES['CALL']:
                    ret = self._parse_call(line.strip())
                    if ret is not None:
                        if self.wordlist is not None and ret['method'] not in self.wordlist:
                            continue
                        
                        call = f"CALL {ret['obj']}.{ret['method']}"

                        if call not in properties:
                            properties[call] = 0
                        properties[call] += 1

        return properties

    def extract_meta_properties_redirections(self):
        n_redirections = 0
        redirection_domains = set()
        last_redirection = None
        with open(self.filename, 'r') as f:
            lines = f.readlines()
            for line in lines:
                if self._line_type(line) == self.LINE_TYPES['DOMAIN']:
                    ret = self._parse_domain(line.strip())
                    if ret is None:
                        continue
                    
                    domain = ret['domain']
                    redirection_domains.add(domain)

                    if last_redirection != domain:
                        n_redirections += 1
                        last_redirection = domain
        
        return n_redirections, redirection_domains

    def extract_meta_properties_n_origins(self):
        origins = set()
        with open(self.filename, 'r') as f:
            lines = f.readlines()
            for line in lines:
                if self._line_type(line) == self.LINE_TYPES['DOMAIN']:
                    ret = self._parse_domain(line.strip())
                    if ret is not None:
                        origins.add(ret['domain'])

        return len(origins)

    def extract_meta_properties_n_repeats(self, line_type):
        n_repeats = 0
        with open(self.filename, 'r') as f:
            lines = f.readlines()
            for line in lines:
                if self._line_type(line) == line_type:
                    n_repeats += 1

        return n_repeats


    def extract_meta_properties(self):
        properties = {
            'n_redirections': self.extract_meta_properties_redirections()[0],
            'n_different_redirection_domains': len(self.extract_meta_properties_redirections()[1]),
            'n_different_origins': self.extract_meta_properties_n_origins(),
            'n_origin_changes': len(self.extract_window_origins()),
            'n_loads': self.extract_meta_properties_n_repeats(self.LINE_TYPES['UPLOAD']),
            'n_executes': self.extract_meta_properties_n_repeats(self.LINE_TYPES['EXECUTE']),
            'n_gets': self.extract_meta_properties_n_repeats(self.LINE_TYPES['GET']),
            'n_sets': self.extract_meta_properties_n_repeats(self.LINE_TYPES['SET']),
            'n_calls': self.extract_meta_properties_n_repeats(self.LINE_TYPES['CALL']),
            'n_instruction_blocks': len(self.extract_code_segments_list(get_instructions=False, inwordlist=False))
        }

        return properties

    def extract_word_count(self, from_code_segments=True, inwordlist=True):
        if (self.wordlist == None):
            return None

        word_count = None
        if from_code_segments:
            code_segments = self.extract_code_segments_list(get_instructions=True, consider_wordlist=True, inwordlist=inwordlist)
            word_count = np.zeros((len(code_segments), len(self.wordlist)))
            for i, code in enumerate(code_segments):
                for inst in code:
                    for j, word in enumerate(self.wordlist):
                        if word in inst:
                            word_count[i][j] += 1
        else:
            word_count = np.zeros(len(self.wordlist))
            with open(self.filename, 'r') as f:
                lines = f.readlines()
                for line in lines:
                    for i, word in enumerate(self.wordlist):
                        if word in line:
                            word_count[i] += 1

        return word_count

    def extract_op_count(self, from_code_segments=True, inwordlist=True):
        op_count = None

        if from_code_segments:
            code_segments = self.extract_code_segments_list(get_instructions=False, consider_wordlist=True, inwordlist=inwordlist)
            op_count = np.zeros((len(code_segments), len(self.OPERATIONS)))
            for i, code in enumerate(code_segments):
                for inst in code:
                    line_type = self._line_type(inst)
                    for j, op in enumerate(self.OPERATIONS):
                        if line_type == op:
                            op_count[i][j] += 1
        else:
            op_count = np.zeros(len(self.OPERATIONS))
            with open(self.filename, 'r') as f:
                lines = f.readlines()
                for line in lines:
                    line_type = self._line_type(line)
                    for i, op in enumerate(self.OPERATIONS):
                        if line_type == op:
                            op_count[i] += 1

        return op_count

    def extract_features(self, from_code_segments=True, inwordlist=True):
        word_count = self.extract_word_count(from_code_segments, inwordlist=inwordlist)
        op_count = self.extract_op_count(from_code_segments, inwordlist=inwordlist)
        
        if word_count is None or op_count is None:
            return None

        # Check if the result is an array or a matrix
        if len(word_count.shape) == 1:
            return np.concatenate((word_count, op_count))

        return np.concatenate((word_count, op_count), axis=1)

    def _parse_get(self, line):
        try:
            match = re.match(r'g(\d+):\{(\d+),(\w+)\}:"(\w+)"', line)

            if match is None:
                raise Exception("No regex match")

            ident, _, objclass, key = match.groups()
            return {
                'ident': ident,
                'obj': objclass,
                'key': key
            }
        except Exception as e:
            logging.info(f"Error parsing line: {line}")
            logging.info(e)
            return None

    def _parse_set(self, line):
        try:
            match = re.match(r's(\d+):\{(\d+),(\w+)\}:"(\w+)":(.*?)', line)

            if match is None:
                raise Exception("No regex match")

            [ident, _, objclass, key, value] = match.groups()
            return {
                'ident': ident,
                'obj': objclass,
                'key': key,
                'value': value
            }
        except Exception as e:
            logging.info(f"Error parsing line: {line}")
            logging.info(e)
            return None

    # c312579:%getRandomValues:{8312,Crypto}:{617175,Uint32Array}
    def _parse_call(self, line):
        try:
            match = re.match(r'c(\d+):%(\w+) .*:\{(\d+),(\w+)\}.*', line)

            if match is None:
                raise Exception("No regex match")

            [ident, method, _, objclass] = match.groups()
            return {
                'ident': ident,
                'method': method,
                'obj': objclass
            }

        except Exception as e:
            logging.info(f"Error parsing line: {line}")
            logging.info(e)
            return None


    def _parse_execute(self, line):
        try:
            match = re.match(r'!(.+)', line)

            if match is None:
                raise Exception("No regex match")

            [ident] = match.groups()
            return {
                'ident': ident
            }
        except Exception as e:
            logging.info(f"Error parsing line: {line}")
            logging.info(e)
            return None

    def _parse_upload(self, line):
        try:
            match = re.match(r'\$(\d+):(.*?):(.*?)', line)

            if match is None:
                raise Exception("No regex match")

            [ident, url, code] = match.groups()

            # if url has "" around it, remove them
            if url.startswith('"') and url.endswith('"'):
                url = url[1:-1]

            return {
                'ident': ident,
                'url': url,
                'code': code
            }
        except Exception as e:
            logging.info(f"Error parsing line: {line}")
            logging.info(e)
            return None

    def _parse_domain(self, line):
        try:
            match = re.match(r'@"(.*?)":".*?"', line) 

            if match is None:
                raise Exception("No regex match")
                
            [domain] = match.groups()
            return {
                'domain': domain,
            }
        except Exception as e:
            logging.info(f"Error parsing line: {line}")
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

# Code to test the classes
if __name__ == "__main__":
    sample_filename = "./samples/sample.log" 
    # sample_filename = "/archive/files/eval-phishing-pages/out/phishtank/b68bac73e4e88409/files/vv8-1713318285915-424-424-chrome.0.log" 
    # sample_filename = "/archive/files/eval-phishing-pages/out/phishtank/be99e3e9f5e22bed/files/vv8-1713318128978-68-68-chrome.0.log"

    # parser = LogParser(sample_filename, wordlist="/home/joao/my/ita/mestrado/eval-phishing-pages/wordlists/all.txt")
    # parser = LogParser(sample_filename)
    parser = LogParser(sample_filename, wordlist="/home/joao/my/ita/mestrado/eval-phishing-pages/wordlists/fingerprints/visiblev8/bot-visiblev8.txt")

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

    with open('output3.json', 'w') as f:
        json.dump({"codesTrueegments": parser.extract_code_segments_list(get_instructions=False, inwordlist=False)}, f, indent=4)

    # Test with wordcount
    # with open('output1.json', 'w') as f:
    #     json.dump({"wordcount": parser.extract_word_count(from_code_segments=True).tolist()}, f, indent=4)

    # with open('output2.json', 'w') as f:
    #     json.dump({"opcount": parser.extract_op_count(from_code_segments=True).tolist()}, f, indent=4)


    # Test with opcount
    # with open('output_list.json', 'w') as f:
    #     json.dump({"result": parser.extract_features(from_code_segments=True, inwordlist=True).tolist()}, f, indent=4)

