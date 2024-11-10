import os
import shutil
import sys
import random

N = 1
DIR = '/archive/files/phishunt-phishing-kits'
OUT = './phishunt-kits/'

if __name__ == '__main__':

    seleced_files = random.sample(os.listdir(DIR), N)

    for file in seleced_files: 
        shutil.copytree(os.path.join(DIR, file), os.path.join(OUT, file))
        print('Copied', file)
