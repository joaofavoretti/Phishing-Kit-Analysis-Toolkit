import os
import json

JSON_FILE = 'same_phishing_kit.json'

if __name__ == '__main__':

    with open(JSON_FILE, 'r') as f:
        data = json.load(f)

    used_kits = set()

    for key in data:
        kits = key["kits"]
        for kit in kits:
            if kit in used_kits:
                print(kit)
            used_kits.add(kit)
