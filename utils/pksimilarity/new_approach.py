# Will calulate two by two similarity
import copydetect
import logging
import json
import pickle
from zss import Node, distance, simple_distance
from sklearn.cluster import DBSCAN
import numpy as np
import os
import sys
from tqdm import tqdm
import time

# Testing samples
SIMILAR = [
    '/home/joaof/files/phishunt-phishing-kits-subsample/2020_10_91222696a821189c',
    '/home/joaof/files/phishunt-phishing-kits-subsample/2021_12_be1b325d0e9113e4',
]

NOT_SIMILAR = [
    '/home/joaof/files/phishunt-phishing-kits-subsample/2020_10_91222696a821189c',
    '/home/joaof/files/phishunt-phishing-kits-subsample/2021_07_3ecb935b97157ef7',
]

# Phishing Kit Directory
PKDIR = '/home/joaof/files/phishunt-phishing-kits/'

def get_number_of_files(path):
    if not os.path.isdir(path):
        return 0

    samplesNumberOfFiles = {}

    for sample in os.listdir(path):
        if not os.path.isdir(os.path.join(path, sample)):
            continue
        
        for _, _, files in os.walk(os.path.join(path, sample)):
            samplesNumberOfFiles[sample] = samplesNumberOfFiles.get(sample, 0) + len(files)

    return samplesNumberOfFiles

number_of_files_dp = get_number_of_files(PKDIR)

def get_tree(path):
    def build_tree(current_path, rootDir = False):
        nodeName = os.path.basename(current_path)
        if rootDir:
            nodeName = 'root'
        node = Node(nodeName)

        if os.path.isdir(current_path):
            for item in sorted(os.listdir(current_path)):
                item_path = os.path.join(current_path, item)
                node.addkid(build_tree(item_path))

        return node

    return build_tree(path, True)
    
def get_distance_matrix(rootDir):
    number_of_samples = len(os.listdir(rootDir))
    distance_matrix = np.zeros((number_of_samples, number_of_samples))

    print(f'[{time.ctime()}] Started calculating distance matrix')

    for i in range(0, number_of_samples):
        sample1 = get_tree(os.path.join(rootDir, sorted(os.listdir(rootDir))[i]))
        for j in range(i+1, number_of_samples):
            print(f'[{time.ctime()}] i={i}/{number_of_samples} j={j}/{number_of_samples} ({sorted(os.listdir(rootDir))[j]})', end='             \r')
            sample2 = get_tree(os.path.join(rootDir, sorted(os.listdir(rootDir))[j]))
            distance_matrix[i][j] = simple_distance(sample1, sample2)
            distance_matrix[j][i] = distance_matrix[i][j]

    return distance_matrix

if __name__ == '__main__':

    if os.path.isfile('dm.pkl'):
        with open('dm.pkl', 'rb') as f:
            distance_matrix = pickle.load(f)
    else:
        distance_matrix = get_distance_matrix(PKDIR)

        with open('dm.pkl', 'wb') as f:
            pickle.dump(distance_matrix, f)
        
    clustering = DBSCAN(eps=0.5, min_samples=1, metric='precomputed').fit(distance_matrix);

    labels = clustering.labels_
    clusters = {}
    for idx, label in enumerate(labels):
        if label not in clusters:
            clusters[label] = []
        clusters[label].append(sorted(os.listdir(PKDIR))[idx])

    clusters = [v for k, v in clusters.items() if len(v) > 1]

    with open('clusters.json', 'w') as f:
        json.dump(clusters, f, indent=4)
