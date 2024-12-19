from deployer import Deployer
import argparse
import logging
import hashlib
import shutil
import sys
import csv
import time 
import os

KITS_DIR = '/archive/files/phishunt-phishing-kits'
OUT_DIR = '/archive/tmp/pkdeployer-out'
TMP_DIR = '/archive/tmp/pkdeployer-tmp'
URLS_FILE = '/home/joao/my/ita/mestrado/clustering-phishing-kit/utils/pkdeployer/urls.txt'

class Trigger:
    def __init__(self, kits_dir:str):
        self.kits_dir = kits_dir

    def run(self):
        len_kits = len(os.listdir(self.kits_dir))
        for i, kit in enumerate(sorted(os.listdir(self.kits_dir))):
            print(f'Kit: {kit} ({i + 1}/{len_kits})')
            deployer = Deployer(kit=kit, kits_dir=self.kits_dir)
            deployer.deploy()

            addrs = deployer.getAddr()
            with open(URLS_FILE, 'w') as f:
                for addr in addrs.values():
                    f.write(f'{addr}\n')
        
            # Analise the URLs
            current_dir = os.getcwd()
            if not os.path.exists(TMP_DIR):
                os.makedirs(TMP_DIR)
            os.chdir('../crawler')
            os.system(f'python3 analiser.py -p -f {URLS_FILE} -o {TMP_DIR}')
            os.chdir(current_dir)

            kit_dir = os.path.join(TMP_DIR, kit)
            if os.path.exists(kit_dir):
                shutil.rmtree(kit_dir)
            os.makedirs(kit_dir)

            # Unzip the files and group everything
            for out_file in os.listdir(TMP_DIR):
                if not out_file.endswith('.tar.gz'):
                    continue
                out_file_dir = os.path.join(TMP_DIR, out_file.split(".")[0])
                if os.path.exists(out_file_dir):
                    shutil.rmtree(out_file_dir)
                os.makedirs(out_file_dir)
                os.system(f'tar -xzf {os.path.join(TMP_DIR, out_file)} -C {out_file_dir}')
                for root, dirs, files in os.walk(out_file_dir):
                    for file in files:
                        if file.endswith('.log'):
                            shutil.move(os.path.join(root, file), kit_dir)
                shutil.rmtree(out_file_dir)

            # Zip the kit_dir and move it to OUT_DIR
            os.system(f'zip -r {os.path.join(OUT_DIR, kit)}.zip {kit_dir}')
            shutil.rmtree(TMP_DIR)

            # Ending
            deployer.stop()


if __name__ == '__main__':
    logging.basicConfig(
        level=logging.DEBUG,
        format='(%(asctime)s) [%(levelname)s] %(message)s',
        filename="trigger.log"
    )
    
    trigger = Trigger(kits_dir=KITS_DIR)
    trigger.run()
