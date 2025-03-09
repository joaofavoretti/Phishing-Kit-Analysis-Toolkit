import os
import json

ALG_FILE = './alg_clusters.json'
GT_FILE = './gt_clusters.json'

MUST_BE_REMOVED = './must_be_removed.json'

if __name__ == '__main__':

    with open(ALG_FILE, 'r') as f:
        alg_clusters = json.load(f)
    with open(GT_FILE, 'r') as f:
        gt_clusters = json.load(f)


    alg_samples = set()
    for cluster in alg_clusters:
        alg_samples.update(cluster)

    gt_samples = set()
    for cluster in gt_clusters:
        gt_samples.update(cluster)

    must_be_removed = gt_samples - alg_samples
    print(must_be_removed)
    # with open(MUST_BE_REMOVED, 'w') as f:
    #     json.dump(list(must_be_removed), f)
    #
    # gt_clusters = [[elem for elem in cluster if elem not in must_be_removed] for cluster in gt_clusters]
    #
    # with open(GT_FILE, 'w') as f:
    #     json.dump(gt_clusters, f, indent=4)

