import os
import json
from sklearn.metrics import adjusted_rand_score, normalized_mutual_info_score, fowlkes_mallows_score
from sklearn.metrics import homogeneity_completeness_v_measure, confusion_matrix
import numpy as np

RESULT_FILE = './res_clusters.json'
GROUND_TRUTH_FILE = './gt_clusters.json'

def exportLabels(labels, clusters, filename):
    assert len(labels) == len(clusters), 'Number of labels and clusters must be the same'

    with open(filename + '.tsv', 'w') as f:
        f.write('Sample\tCluster\n')
        for i in range(len(clusters)):
            f.write(str(labels[i]) + '\t' + str(clusters[i]) + '\n')


if __name__ == '__main__':
    with open(RESULT_FILE, 'r') as f:
        alg_clusters = json.load(f)
    with open(GROUND_TRUTH_FILE, 'r') as f:
        gt_clusters = json.load(f)

    labels = []
    for list_samples in alg_clusters:
        labels += list_samples
    labels = sorted(labels)

    alg_labels = np.full(len(labels), -1)
    for i, list_samples in enumerate(alg_clusters):
        for sample in list_samples:
            alg_labels[labels.index(sample)] = i

    for i, label in enumerate(alg_labels):
        if label == -1:
            print('Sample', i, 'is not assigned to any cluster in the result')

    gt_labels = np.full(len(labels), -1)
    for i, list_samples in enumerate(gt_clusters):
        for sample in list_samples:
            gt_labels[labels.index(sample)] = i

    for i, label in enumerate(gt_labels):
        if label == -1:
            print('Sample', i, 'is not assigned to any cluster in ground truth')

    exportLabels(labels, alg_labels, 'alg_clusters')
    exportLabels(labels, gt_labels, 'gt_clusters')

    ari = adjusted_rand_score(gt_labels, alg_labels)
    nmi = normalized_mutual_info_score(gt_labels, alg_labels)
    fms = fowlkes_mallows_score(gt_labels, alg_labels)
    hcv = homogeneity_completeness_v_measure(gt_labels, alg_labels)

    print('Adjusted Rand Index:', ari)
    print('Normalized Mutual Information:', nmi)
    print('Fowlkes-Mallows Score:', fms)
    print('Homogeneity:', hcv[0])
    print('Completeness:', hcv[1])
    print('V-measure:', hcv[2])

