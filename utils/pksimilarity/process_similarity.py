import json

FILE = './similarity_2.json'

import json

FILE = './similarity_2.json'

def find(parent, sample):
    if parent[sample] != sample:
        parent[sample] = find(parent, parent[sample])
    return parent[sample]

def union(parent, rank, sample1, sample2):
    root1 = find(parent, sample1)
    root2 = find(parent, sample2)
    
    if root1 != root2:
        if rank[root1] > rank[root2]:
            parent[root2] = root1
        elif rank[root1] < rank[root2]:
            parent[root1] = root2
        else:
            parent[root2] = root1
            rank[root1] += 1

if __name__ == '__main__':
    with open(FILE) as f:
        data = json.load(f)

    parent = {}
    rank = {}

    for sample in data:
        parent[sample] = sample
        rank[sample] = 0
        for similarSample in data[sample]:
            if similarSample not in parent:
                parent[similarSample] = similarSample
                rank[similarSample] = 0
            union(parent, rank, sample, similarSample)

    groups = {}
    for sample in parent:
        root = find(parent, sample)
        if root not in groups:
            groups[root] = []
        groups[root].append(sample)

    groups = [sorted(group) for group in groups.values()]
    with open('groups.json', 'w') as f:
        json.dump(groups, f, indent=4)
