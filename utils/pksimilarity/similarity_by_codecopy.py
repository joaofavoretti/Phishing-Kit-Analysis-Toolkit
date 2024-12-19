from copydetect import CopyDetector
import os
import sys
import logging
import json

PKDIR = '/home/joaof/files/phishunt-phishing-kits-subsample/'
MATCH_RATE = 0.9

def precountNumberOfFiles(directory):
  samplesNumberOfFiles = {}

  for sample in os.listdir(directory):
    if not os.path.isdir(os.path.join(directory, sample)):
      continue
    
    for _, _, files in os.walk(os.path.join(directory, sample)):
      samplesNumberOfFiles[sample] = samplesNumberOfFiles.get(sample, 0) + len(files)

  return samplesNumberOfFiles

if __name__ == '__main__':
  samplesNumberOfFiles = precountNumberOfFiles(PKDIR)

  logging.basicConfig(level=logging.ERROR)

  detector = CopyDetector(test_dirs=[PKDIR], display_t=MATCH_RATE)
  detector.run()
  copiedCodeList = detector.get_copied_code_list()

  similarOccurrences = {}

  for percentFirstFile, percentSecondFile, nameFirstFile, nameSecondFile, _, _, _ in copiedCodeList:
    firstSampleName = nameFirstFile.split(PKDIR)[1].split('/')[0]
    secondSampleName = nameSecondFile.split(PKDIR)[1].split('/')[0]
  
    if percentFirstFile < MATCH_RATE or percentSecondFile < MATCH_RATE:
      continue

    if firstSampleName == secondSampleName:
      continue

    if firstSampleName not in similarOccurrences:
      similarOccurrences[firstSampleName] = {}

    if secondSampleName not in similarOccurrences:
      similarOccurrences[secondSampleName] = {}

    firstSampleFilePath = nameFirstFile.split(PKDIR)[1]
    firstSampleFileName = os.path.basename(firstSampleFilePath)

    secondSampleFilePath = nameSecondFile.split(PKDIR)[1]
    secondSampleFileName = os.path.basename(secondSampleFilePath)

    # if firstSampleFileName != secondSampleFileName:
    #   continue

    # if not firstSampleFileName.endswith('.php') or not secondSampleFileName.endswith('.php'):
    #   continue

    # similarOccurrences[firstSampleName].add(secondSampleName)
    # similarOccurrences[secondSampleName].add(firstSampleName)
    
    # similarOccurrences[firstSampleName].append((firstSampleFileName, secondSampleFileName))
    # similarOccurrences[secondSampleName].append((secondSampleFileName, firstSampleFileName))
    # similarOccurrences[firstSampleName][secondSampleName] = similarOccurrences[firstSampleName].get(secondSampleName, []) + [(firstSampleFilePath, secondSampleFilePath)]
    # similarOccurrences[secondSampleName][firstSampleName] = similarOccurrences[secondSampleName].get(firstSampleName, []) + [(secondSampleFilePath, firstSampleFilePath)]

    similarOccurrences[firstSampleName][secondSampleName] = similarOccurrences[firstSampleName].get(secondSampleName, 0) + 1
    similarOccurrences[secondSampleName][firstSampleName] = similarOccurrences[secondSampleName].get(firstSampleName, 0) + 1

  with open('similarity_ocurrences.json', 'w') as f:
    json.dump(similarOccurrences, f, indent=4)

  with open('samples_number_of_files.json', 'w') as f:
    json.dump(samplesNumberOfFiles, f, indent=4)

  groups = {}

  for key in similarOccurrences:
    if key not in groups:
      groups[key] = set()

    # ADD THE MARGIN HERE TO SEE WHAT IS BEST
    for key2 in similarOccurrences[key]:
      if similarOccurrences[key][key2] >= max(samplesNumberOfFiles[key], samplesNumberOfFiles[key2]) * 0.5:
        groups[key].add((key2, (similarOccurrences[key][key2] / max(samplesNumberOfFiles[key], samplesNumberOfFiles[key2]))))

  for key in groups:
    groups[key] = sorted(list(groups[key]))

  with open('similarity_groups.json', 'w') as f:
    json.dump(groups, f, indent=4)

