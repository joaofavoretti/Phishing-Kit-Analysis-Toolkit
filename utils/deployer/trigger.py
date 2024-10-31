from deployer import Deployer

class Trigger:
    def __init__(self):
        self.deployer = Deployer()
        self.deployer.deploy()

if __name__ == '__main__':
    trigger = Trigger()
