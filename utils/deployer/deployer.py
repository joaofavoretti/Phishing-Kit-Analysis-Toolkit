from typing import List, cast
from python_on_whales import DockerClient
from python_on_whales.components.container.cli_wrapper import ValidContainer
import os

class Deployer:
    def __init__(self, kit:str, port:str = '8080', cwd:str = os.getcwd()):

        self.cwd = cwd
        self.port = port

        if not self._isValidKit(kit):
            raise ValueError(f'Kit {kit} is not available')
        self.kit = os.path.join(cwd, 'kits', kit)

        self.php_config = os.path.join(cwd, 'config/php')

    def _isValidKit(self, kit:str) -> bool:
        return kit in self.listAvailableKits(self.cwd)

    @staticmethod
    def listAvailableKits(cwd) -> List[str]:
        kitsPath = os.path.join(cwd, 'kits')
        return os.listdir(kitsPath)

    def deploy(self):
        self.docker = DockerClient()

        p = self.docker.run(
            'php:8.2-apache',
            detach=True,
            workdir='/home',
            volumes=[(self.kit, '/var/www/html', 'ro'), (self.php_config, '/usr/local/etc/php', 'ro')],
            publish=[(self.port, '80')],
        )

        self.p = cast(ValidContainer, p)

    def getAddr(self) -> str:
        return f'http://localhost:{self.port}/'

    def stop(self):
        self.docker.stop(self.p)
        self.docker.remove(self.p)

if __name__ == '__main__':
    kits = Deployer.listAvailableKits(os.getcwd())
    deployer = Deployer('badoo')
    deployer.deploy()

