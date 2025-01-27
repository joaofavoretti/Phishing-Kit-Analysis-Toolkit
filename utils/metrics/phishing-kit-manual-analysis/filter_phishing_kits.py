import json

PROPS_FILE = '/home/joao/my/ita/mestrado/clustering-phishing-kit/utils/pkinspector/phishunt-phishing-kits.json'
INFO_FILE = 'similar_phishing_kits.json'
ANOTHER_FILTER = 'same_phishing_kit.json'
OUT_FILE = 'similar_phishing_kits_filtered.json'

if __name__ == '__main__':

    with open(PROPS_FILE, 'r') as props_f, open(INFO_FILE, 'r') as info_f, open(ANOTHER_FILTER, 'r') as seen_f:
        props = json.load(props_f)
        info = json.load(info_f)
        seen = json.load(seen_f)

    props_parsed = {}
    for prop in props:
        props_parsed[prop['name']] = prop["properties"]

    seen_kits = set()
    for entry in seen:
        kits = entry['kits']
        for kit in kits:
            seen_kits.add(kit)

    out_info = {}
    i = 1
    for entry in info.values():
        kits = entry['kits']
        kits_filtered = []
        for kit in kits:
            if kit not in props_parsed:
                continue

            # If you want a raw list, then comment the following two lines
            if kit in seen_kits:
                continue

            general = props_parsed[kit]['General']

            if '403 Forbidden' in general and general['403 Forbidden'] == True:
                continue
            
            if '500 Internal Server Error' in general and general['500 Internal Server Error'] == True:
                continue

            if '404 Not Found' in general and general['404 Not Found'] == True:
                continue

            if '302 Redirect to Other Domain' in general and general['302 Redirect to Other Domain'] == True:
                continue

            kits_filtered.append(kit)

        if len(kits_filtered) > 0:
            out_info[i] = entry
            out_info[i]['kits'] = kits_filtered
            i += 1


    with open(OUT_FILE, 'w') as out_f:
        json.dump(out_info, out_f, indent=4)


