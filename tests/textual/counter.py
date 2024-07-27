import os
from asyncio import sleep
import numpy as np
from typing import Dict, List
from collections import deque

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
    print(sorted([int(key) for key in extract_labels(METADATA_PATH).keys()]))

