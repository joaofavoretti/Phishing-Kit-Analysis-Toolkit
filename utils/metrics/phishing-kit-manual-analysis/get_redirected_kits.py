import json

ANALYZED_KITS = '/home/joao/my/ita/mestrado/clustering-phishing-kit/utils/pkinspector/phishunt-phishing-kits.json'
CLUSTERED_KITS = 'redirection_phishing_kit.json'
OUT_FILE = 'redirection_lefts.json'

if __name__ == '__main__':

    with open(ANALYZED_KITS, 'r') as props_f, open(CLUSTERED_KITS, 'r') as groups_f:
        analyzedKits = json.load(props_f)
        clusteredKits = json.load(groups_f)

    analizedKitsFormatted = {}
    for pk in analyzedKits:
        analizedKitsFormatted[pk['name']] = pk["properties"]

    clusteredKitsSet = set()
    for cluster in clusteredKits:
        kits = cluster['kits']
        for kit in kits:
            clusteredKitsSet.add(kit)

    missingKits = []
    for pkName, pkProperty in analizedKitsFormatted.items():
        if pkName in clusteredKitsSet: continue

        if 'General' not in pkProperty: continue

        if '302 Redirect to Other Domain' in pkProperty['General'] and pkProperty['General']['302 Redirect to Other Domain'] == True:
            missingKits.append(pkName)
    
    with open(OUT_FILE, 'w') as out_f:
        json.dump(missingKits, out_f, indent=4)
