from copydetect import CopyDetector
import os
import sys
import logging
import json

PKDIR = '/archive/files/phishunt-phishing-kits-subsample/'
# TEST_DIRS = ["/archive/files/phishunt-phishing-kits-subsample/2021_08_804ab7bea19048f3", "/archive/files/phishunt-phishing-kits-subsample/2022_01_b02b63cec4319d13"] 

def precountNumberOfFiles(directory):
  import os
  import subprocess

  samplesNumberOfFiles = {}

  for sample in os.listdir(directory):
    if not os.path.isdir(os.path.join(directory, sample)):
      continue
    
    for root, _, files in os.walk(os.path.join(directory, sample)):
      samplesNumberOfFiles[sample] = samplesNumberOfFiles.get(sample, 0) + len([file for file in files if file.endswith('.php')])

  return samplesNumberOfFiles

if __name__ == '__main__':
  samplesNumberOfFiles = precountNumberOfFiles(PKDIR)

  logging.basicConfig(level=logging.ERROR)

  detector = CopyDetector(test_dirs=[PKDIR], display_t=0.5)
  detector.run()
  copiedCodeList = detector.get_copied_code_list()

  similarOccurrences = {}

  for percentFirstFile, percentSecondFile, nameFirstFile, nameSecondFile, _, _, _ in copiedCodeList:
    firstSampleName = nameFirstFile.split(PKDIR)[1].split('/')[0]
    secondSampleName = nameSecondFile.split(PKDIR)[1].split('/')[0]
  
    if percentFirstFile < 0.5 or percentSecondFile < 0.5:
      continue

    if firstSampleName == secondSampleName:
      continue

    if firstSampleName not in similarOccurrences:
      similarOccurrences[firstSampleName] = {}

    if secondSampleName not in similarOccurrences:
      similarOccurrences[secondSampleName] = {}

    firstSampleFileName = nameFirstFile.split(PKDIR)[1]
    secondSampleFileName = nameSecondFile.split(PKDIR)[1]

    if not firstSampleFileName.endswith('.php') or not secondSampleFileName.endswith('.php'):
      continue

    # similarOccurrences[firstSampleName].add(secondSampleName)
    # similarOccurrences[secondSampleName].add(firstSampleName)
    # similarOccurrences[firstSampleName].append((percentFirstFile, percentSecondFile, firstSampleFileName, secondSampleFileName))
    # similarOccurrences[secondSampleName].append((percentSecondFile, percentFirstFile, secondSampleFileName, firstSampleFileName))
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

    for key2 in similarOccurrences[key]:
      if similarOccurrences[key][key2] >= samplesNumberOfFiles[key] * 0.5:
        groups[key].add(key2)

  for key in groups:
    groups[key] = sorted(list(groups[key]))

  with open('similarity_groups.json', 'w') as f:
    json.dump(groups, f, indent=4)

