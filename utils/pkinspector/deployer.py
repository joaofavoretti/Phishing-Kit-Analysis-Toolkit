from typing import List, cast
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
        self.port = self._getFreePort(base_port)
        self.php_config = php_config
        self.addr = self._getHostAddrs()

        if not self._isValidKit(kit):
            raise ValueError(f'Kit {kit} is not available')
        self.kit = kit
        self.kit_path = os.path.join(self.kits_dir, kit)


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

    @staticmethod
    def listAvailableKits(kits_dir) -> List[str]:
        return os.listdir(kits_dir)

    def deploy(self):
        self.docker = DockerClient()

        p = self.docker.run(
            'php:8.2-apache',
            detach=True,
            workdir='/home',
            volumes=[(self.kit_path, '/var/www/html', 'ro'), (self.php_config, '/usr/local/etc/php', 'ro')],
            publish=[(self.port, '80')],
        )

        self.p = cast(ValidContainer, p)

    def getAddr(self) -> str:
        return f'http://{self.addr}:{self.port}/'

    def getPort(self) -> str:
        return str(self.port)

    def getKit(self) -> str:
        return self.kit

    def stop(self):
        self.docker.stop(self.p)
        self.docker.remove(self.p)

if __name__ == '__main__':
    kits = Deployer.listAvailableKits(os.getcwd())
    deployer = Deployer('badoo')
    deployer.deploy()

