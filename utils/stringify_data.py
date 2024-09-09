import os
import sys
import shutil
import json
import numpy as np
from typing import Dict, List


DATA_FPATH = "/home/joao/my/ita/mestrado/2-clustering-phishing-kit/utils/out/data.json"
SENTENCES_FPATH = "/home/joao/my/ita/mestrado/2-clustering-phishing-kit/utils/out/instruction_sentences.txt"


class Segment:
    def __init__(self, domain:str, instruction:str, vector:List[str], label:int):
        self.domain = domain
        self.instruction = instruction
        self.vector = vector
        self.label = label

    def __str__(self):
        return f"Segment(domain={self.domain}, instruction={self.instruction}, vector={self.vector}, label={self.label})"


class SegmentIndex(str): pass
class FileData(Dict[SegmentIndex,Segment]): pass


class Hash(str): pass
class Data(Dict[Hash, FileData]):

    def __init__(self):
        super().__init__()

    @staticmethod
    def load(fpath: str) -> 'Data':
        read_data = json.load(open(fpath, "r"))
        data = Data()
        for hash, fileData in read_data.items():
            data[hash] = FileData()
            for segIdx, seg in fileData.items():
                # I assigned a label key to each file
                if segIdx == "label":
                    continue

                data[hash][segIdx] = Segment(seg["domain"], seg["instruction"], seg["vector"], seg["label"])

        return data

    
if __name__ == "__main__":

    data = Data.load(DATA_FPATH)
    
    with open(SENTENCES_FPATH, "w") as f:
        for hash, fileData in data.items():
            for segIdx, seg in fileData.items():
                f.write(f"{seg.instruction}")
    


            
