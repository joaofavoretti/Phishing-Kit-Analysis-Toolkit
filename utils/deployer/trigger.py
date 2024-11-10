from deployer import Deployer
from typing import List
from ..processing.gdrive_sync import GDriveSync
import hashlib
import urllib.parse
import random
import socket
import time
import csv
import os

FOLDER_ID = '1FYXlL140IwlPXmtJvv9gKBvp_ljADzBX'
FOLDER_PATH = '/ITA/Mestrado/Crawled Data/Phishing Kit Data/Phishunt'
DriveSync = GDriveSync(FOLDER_ID, FOLDER_PATH)

class Trigger:
    def __init__(self, amount:int = 10, base_port:int = 8080):
        self.amount:int = amount
        self.base_port = base_port
        self.deployed: List[Deployer] = []

    def _isPortOpen(self, port:int) -> bool:
        with socket.socket(socket.AF_INET, socket.SOCK_STREAM) as s:
            return s.connect_ex(('localhost', port)) == 0

    def _getFreePort(self) -> int:
        port = self.base_port

        while self._isPortOpen(port):
            port += 1

        return port

    def _getRandomKit(self) -> str:
        kits_dir = os.path.join(os.getcwd(), 'phishunt-kits')
        kits = Deployer.listAvailableKits(kits_dir)
        return random.choice(kits)

    def deployBatch(self):
        if self.deployed:
            self.stop()

        for _ in range(self.amount):
            port = self._getFreePort()
            kit = self._getRandomKit()
            deployer = Deployer(kit, port=str(port))
            deployer.deploy()
            self.deployed.append(deployer)

    def stop(self):
        for deployer in self.deployed:
            deployer.stop()
    
    def exportDeployedUrls(self, txtpath:str):
        with open(txtpath, 'w') as f:
            for deployer in self.deployed:
                f.write(f'{deployer.getAddr()}\n')

    def _getAddrHash(self, addr:str) -> str:
        return hashlib.sha256(addr.encode()).hexdigest()[:16]

    def exportDeployedInfo(self, csvpath:str):
        if not os.path.exists(csvpath):
            with open(csvpath, 'w') as f:
                writer = csv.writer(f)
                writer.writerow(['Hash', 'Kit Name'])

        with open(csvpath, 'a') as f:
            writer = csv.writer(f)
            for deployer in self.deployed:
                writer.writerow([self._getAddrHash(deployer.getAddr()), deployer.getKit()])

    def analise(self, urlfname:str, outdir:str):
        current_dir = os.getcwd()

        urlspath = os.path.join(current_dir, urlfname)
        outdir = os.path.join(current_dir, outdir)

        if not os.path.exists(outdir):
            os.makedirs(outdir)

        os.chdir('../crawler')

        os.system(f'python3 analiser.py -p -f {urlspath} -o {outdir}')

        os.chdir(current_dir)

if __name__ == '__main__':
    trigger = Trigger()
    
    deployment_count = 80

    for i in range(deployment_count):
        print(f'[time.ctime()] Deploying batch {i+1}/{deployment_count}', end='             \r')

        trigger.deployBatch()
        trigger.exportDeployedUrls('urls.txt')
        trigger.exportDeployedInfo('info.csv')
        trigger.analise('urls.txt', './out')
        trigger.stop()

    print()

    DriveSync.uploadFolder('./out')
    DriveSync.uploadFile('./urls.txt')
    DriveSync.uploadFile('./info.csv')
