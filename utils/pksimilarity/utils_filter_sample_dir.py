import os
import sys
import shutil
import tqdm

WHITELIST_FILE_EXTENSIONS = ['.php', '.js', '.html']
PKDIR = '/home/joaof/files/phishunt-phishing-kits/'

if __name__ == '__main__':
    for sample in tqdm.tqdm(os.listdir(PKDIR)):
        if not os.path.isdir(os.path.join(PKDIR, sample)):
            continue
    
        for root, dirs, files in os.walk(os.path.join(PKDIR, sample)):
            for file in files:
                if not any(file.endswith(ext) for ext in WHITELIST_FILE_EXTENSIONS):
                    filepath = os.path.join(root, file)
                    os.remove(filepath)