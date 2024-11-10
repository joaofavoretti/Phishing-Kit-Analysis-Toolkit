from typing import List, cast
from python_on_whales import DockerClient, docker
from python_on_whales.components.container.cli_wrapper import ValidContainer
import urllib.parse
import hashlib
import socket
import time
import os

class Deployer:
    def __init__(self, kit:str, port:str = '8080', kits_dir:str = os.path.join(os.getcwd(), 'kits'), php_config:str = os.path.join(os.getcwd(), 'config/php')):

        self.kits_dir = kits_dir
        self.port = port
        self.php_config = php_config
        self.rnd = hashlib.sha256(str(time.time()).encode()).hexdigest()[:32]
        self.addr = self._getHostAddrs()

        if not self._isValidKit(kit):
            raise ValueError(f'Kit {kit} is not available')
        self.kit = kit
        self.kit_path = os.path.join(self.kits_dir, kit)

    def _isValidKit(self, kit:str) -> bool:
        return kit in self.listAvailableKits(self.kits_dir)
        
    def _getHostAddrs(self):
        # Create a socket object
        s = socket.socket(socket.AF_INET, socket.SOCK_DGRAM)
        
        try:
            # Connect to a remote server (Google's DNS server)
            s.connect(("8.8.8.8", 80))
            
            # Get the IP address
            ip_address = s.getsockname()[0]
        finally:
            # Close the socket
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
        params = urllib.parse.urlencode({'kit': self.kit, 'rnd': self.rnd})
        return f'http://{self.addr}:{self.port}/?{params}'

    def getPort(self) -> str:
        return self.port

    def getKit(self) -> str:
        return self.kit

    def stop(self):
        if not self.docker.container.exists(self.p):
            return
        self.docker.stop(self.p)
        self.docker.remove(self.p)

if __name__ == '__main__':
    kits = Deployer.listAvailableKits(os.getcwd())
    deployer = Deployer('badoo')
    deployer.deploy()

