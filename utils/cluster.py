from gensim.models.doc2vec import Doc2Vec, TaggedDocument
from sklearn.metrics.pairwise import cosine_similarity, cosine_distances
from sklearn.preprocessing import StandardScaler
from sklearn.cluster import DBSCAN
from urllib.parse import urlparse
from tempfile import mkdtemp
from typing import Union
from enum import Enum
import numpy as np
import logging
import pickle
import shutil
import json
import os
import re

# DATA_FILE = '/home/joao/my/ita/mestrado/2-clustering-phishing-kit/utils/data.json'
DATA_FILE = '/archive/Downloads/data.json'

def import_data(file):
    import copy

    with open(file, 'r') as f:
        data = json.load(f)

    # data_cp = copy.deepcopy(data)

    for filehash, segments in data.items():
        for idx, info in segments.items():
            info['vector'] = np.array(info['vector'], dtype=np.float32)

    hashes = [filehash for filehash in data.keys()]
    segmented_data = [[info['vector'] for info in segment.values()] for segment in data.values()]
    flat_data = np.array([info['vector'] for segment in data.values() for info in segment.values()], dtype=np.float32)

    # dm = cosine_similarity(flat_data, flat_data)
    # np.fill_diagonal(dm, 0.0)  # Replace diagonal values with 0.0

    choosen_hashes = []
    choosen_segments = []

    num_samples = len(segmented_data)
    total_segments_count = 0
    for i in range(num_samples):
        print(f"Processing {i+1}/{num_samples}", end="                  \r")
        num_segments = len(segmented_data[i])
        current_segments = flat_data[total_segments_count:total_segments_count+num_segments]

        if num_segments == 0:
            continue

        # current_segments_distances = dm[total_segments_count:total_segments_count+num_segments, :]
        current_segments_distances = cosine_similarity(flat_data[total_segments_count:total_segments_count+num_segments], flat_data)
       
        diag_indices = np.diag_indices(num_segments)
        diag_indices = (diag_indices[0], diag_indices[1] + total_segments_count)
        current_segments_distances[diag_indices] = 0.0

        max_similarity_indices = np.unravel_index(np.argmax(current_segments_distances), current_segments_distances.shape)
        most_similar_vector_x = current_segments[max_similarity_indices[0]]

        choosen_hashes.append(hashes[i])
        choosen_segments.append(most_similar_vector_x)

        total_segments_count += num_segments
    print()

    return np.array(choosen_segments, dtype=np.float32), np.array(choosen_hashes)

print("Running cluster.py")

print("Getting Data")
X, y = import_data(DATA_FILE)

with open('vectors2.tsv', 'w') as f:
    for i in range(X.shape[0]):
        f.write('\t'.join([str(x) for x in X[i]]) + '\n')

from sklearn.cluster import DBSCAN

print("Clustering samples")
# Create an instance of DBSCAN
dbscan = DBSCAN(eps=0.05, min_samples=1, metric='cosine')

dbscan.fit(X)

# Get the labels assigned by DBSCAN
labels = dbscan.labels_

print("Exporting labels")
with open('metadata2.tsv', 'w') as f:
    f.write('hash\tlabel\n')
    for i in range(y.shape[0]):
        f.write(y[i] + '\t' + str(labels[i]) + '\n')

# for i in range(y.shape[0]):
#     data[y[i]]['label'] = str(labels[i])
#
# with open('data.json', 'w') as f:
#     json.dump(data, f)

