import os
import json

FILE = 'similar_phishing_kits.json'

if __name__ == '__main__':

    with open(FILE, 'r') as f:
        data = json.load(f)

    unique_pks = set()

    for group in data.values():
        unique_pks.update(group['kits'])

    print('Number of unique phishing kits:', len(unique_pks))

    analised_pks = set()
