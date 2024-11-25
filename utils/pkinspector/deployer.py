from typing import List, cast, Dict
from python_on_whales import DockerClient
from python_on_whales.components.container.cli_wrapper import ValidContainer
import urllib.parse
import hashlib
import socket
import time
import os

class Deployer:
    def __init__(self, kit:str, base_port:int = 8080, kits_dir:str = os.path.join(os.getcwd(), 'kits'), php_config:str = os.path.join(os.getcwd(), 'config/php')):

        self.kits_dir = kits_dir
        self.php_config = php_config
        self.basePort = base_port
        self.addr = self._getHostAddrs()

        if not self._isValidKit(kit):
            raise ValueError(f'Kit {kit} is not available')
        self.kit = kit
        self.kitRootPath = os.path.join(self.kits_dir, kit)

        """
        {
            "folder1": {
                p: p,
                port: 8080,
                addr: 'http://localhost:8080/'
            }
        }
        """
        self.deployments:Dict[str,Dict] = {}

    def _isPortOpen(self, port:int) -> bool:
        with socket.socket(socket.AF_INET, socket.SOCK_STREAM) as s:
            return s.connect_ex(('localhost', port)) == 0

    def _getFreePort(self, base_port) -> int:
        port = base_port

        while self._isPortOpen(port):
            port += 1

        return port

    def _isValidKit(self, kit:str) -> bool:
        return kit in self.listAvailableKits(self.kits_dir)
        
    def _getHostAddrs(self):
        s = socket.socket(socket.AF_INET, socket.SOCK_DGRAM)
        
        try:
            s.connect(("8.8.8.8", 80))
            ip_address = s.getsockname()[0]
        finally:
            s.close()
        
        return ip_address

    def _getDeployableFolders(self, rootDir) -> List[str]:
        """
            I want a function that will return a list of folders that have files in it
            Recursive search
            Example:
            root/
                folder1/
                    folderX/
                    file1
                    file2
                folder2/
                    folderY/
                        folderZ/
                    file1
                    file2
                folder3/
                    folderA/
                        file1
                        file2

            Will return ['root/folder1', 'root/folder2', 'root/folder3/folderA']
        """
        if not os.path.isdir(rootDir):
            return []

        if all([os.path.isdir(os.path.join(rootDir, file)) for file in os.listdir(rootDir) if not file.startswith('.')]):
            results = [self._getDeployableFolders(os.path.join(rootDir, file)) for file in os.listdir(rootDir)]
            return [item for sublist in results for item in sublist]
        
        return [rootDir]

    @staticmethod
    def listAvailableKits(kits_dir) -> List[str]:
        return os.listdir(kits_dir)

    def _deployFolder(self, folder:str):
        port = self._getFreePort(self.basePort)

        p = self.docker.run(
            'my-php-apache-image',
            detach=True,
            workdir='/home',
            volumes=[(folder, '/var/www/html', 'rw'), (self.php_config, '/usr/local/etc/php', 'ro')],
            publish=[(port, '80')],
        )

        p = cast(ValidContainer, p)

        assert folder not in self.deployments, f"Well... I thought this would never occur"

        self.docker.execute(p, ['chown', '-R', 'www-data:www-data', '/var/www/html'])

        folder_name = folder
        i = 1
        while folder_name in self.deployments:
            folder_name = f'{folder}_{i}'

        self.deployments[folder_name] = {
            'p': p,
            'port': port,
            'addr': f'http://{self.addr}:{port}/'
        }

    def deploy(self):
        self.docker = DockerClient()

        for folder in self._getDeployableFolders(self.kitRootPath):
            self._deployFolder(folder)

    def getAddr(self) -> Dict[str,str]:
        return {folder: deployment['addr'] for folder, deployment in self.deployments.items()} 

    def getKit(self) -> str:
        return self.kit

    def stop(self):
        for deployment in self.deployments.values():
            self.docker.stop(deployment['p'])
            self.docker.remove(deployment['p'])

if __name__ == '__main__':
    kits = Deployer.listAvailableKits(os.getcwd())
    deployer = Deployer('badoo')
    deployer.deploy()

