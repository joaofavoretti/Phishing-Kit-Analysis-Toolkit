import os
from asyncio import sleep
import numpy as np
from typing import Dict, List
from collections import deque
from counter import extract_labels

METADATA_PATH = "/home/joao/my/ita/mestrado/2-clustering-phishing-kit/tests/textual/metadata.tsv"

def extract_labels(metadata_path: str) -> Dict[str, List[str]]:
    labels = {}
    with open(metadata_path, "r") as metadata_file:
        next(metadata_file)
        for line in metadata_file:
            line = line.strip()
            if not line:
                continue
            parts = line.split("\t")
            if len(parts) != 2:
                continue
            url, label = parts
            if label not in labels:
                labels[label] = []
            labels[label].append(url)
    return labels

if __name__ == "__main__":
    
    l = [(int(key), [sample.split("_")[0] for sample in value]) for key, value in extract_labels(METADATA_PATH).items()]
    # l = [(int(key), [sample for sample in value]) for key, value in extract_labels(METADATA_PATH).items()]
    l.sort(key=lambda x: int(x[0]))

    # for key, value in l:
    #     if key == 0:
    #         continue
    #     print(key)
    #     print(value)

    grouped_samples = {}
    for key, value in l:
        if key == 0:
            continue
        for v in value:
            if v not in grouped_samples:
                grouped_samples[v] = []
            grouped_samples[v].append(key)
    # print(grouped_samples)
    grouped_samples_set = set()
    possible_labels = set()
    for key, value in grouped_samples.items():
        if 3 in value:
            print(key)
            print(value)
        # grouped_samples_set.add(",".join([str(v) for v in value]))
        # for v in value:
        #     possible_labels.add(str(v))

    # for label in possible_labels:
    #     print(label)
    #     for group in grouped_samples_set:
    #         group_list = group.split(",")
    #         if label in group_list:
    #             print(group_list)
            


    # if s_value != None:
    #     for v in s_value:
    #         if v == SELECTED_SAMPLE:
    #             continue
    #         for key, value in l:
    #             if key != 0 and s_value != value and v in value:
    #                 print(key)
    #                 print(value)

        
