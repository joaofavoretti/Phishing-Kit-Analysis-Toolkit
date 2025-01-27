import json

FIRST_FILE = 'similar_phishing_kits_filtered.json'
SECOND_FILE = 'same_phishing_kit.json'

if __name__ == '__main__':
    with open(FIRST_FILE, 'r') as f1, open(SECOND_FILE, 'r') as f2:
        first = json.load(f1)
        second = json.load(f2)

    total_entries = set()
    for entry in first.values():
        for kit in entry["kits"]:
            total_entries.add(kit)

    processed_entries = set()
    for entry in second:
        for kit in entry["kits"]:
            processed_entries.add(kit)

    print(f'Processed: {len(processed_entries)}/{len(total_entries)} ({len(total_entries) - len(processed_entries)} remaining)')
