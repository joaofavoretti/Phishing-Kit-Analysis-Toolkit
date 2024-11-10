from textual import log
from typing import List, Dict
from deployer import Deployer
import pickle
import os

DEFAULT_PROPERTIES:List[str] = [
    "Is_Static",
    "Client_Side_Redirection",
    "Server_Side_Redirection",
]

KitName = str
Properties = Dict[str,bool]

class PhishingKit:
    def __init__(self, name:KitName, dir:str, properties:Properties):
        self.name:KitName = name
        self.dir:str = dir
        self.deployer:Deployer|None = None
        self.properties:Properties = properties

    def addProperty(self, property:str) -> None:
        self.properties[property] = False

    def isDeployed(self) -> bool:
        return self.deployer is not None

    def deploy(self) -> None:
        if self.isDeployed():
            return

        parentDir = os.path.dirname(self.dir)
        self.deployer = Deployer(self.name, 8080, parentDir)
        self.deployer.deploy()

    def stop(self) -> None:
        if self.isDeployed():
            assert self.deployer is not None
            self.deployer.stop()
            self.deployer = None

    def getURL(self) -> str:
        if self.isDeployed():
            assert self.deployer is not None
            return self.deployer.getAddr()

        return ""

class PhishingKitStateManager:
    def __init__(self, dir: str):
        self.dir = dir

        self.kits:List[PhishingKit] = self.loadKits()
        for kit in self.kits:
            kit.deployer = None

        self.currentProperties:List[str] = self._loadCurrentProperties(self.kits)

    def _loadCurrentProperties(self, kits:List[PhishingKit]) -> List[str]:
        if not kits:
            return DEFAULT_PROPERTIES

        return list(kits[0].properties.keys())

    def _getPhishingKit(self, name:KitName) -> PhishingKit|None:
        for kit in self.kits:
            if kit.name == name:
                return kit

        return None

    def _getSavingFilename(self) -> str:
        _abs = self.dir
        if os.path.isabs(self.dir):
            # _abs is the full path
            _abs = os.path.join(os.getcwd(), self.dir)
        savingName = os.path.basename(os.path.dirname(_abs))
        filename = f"{savingName}.pkl"
        os.path.join('db', filename)
        
        if not os.path.exists('db'):
            os.makedirs('db')

        log.info(f"Directory: {self.dir}")
        log.info(f"Saving kits to {filename}")
        return filename

    def saveKits(self) -> None:
        filename = self._getSavingFilename()
        with open(filename, "wb") as f:
            pickle.dump(self.kits, f)

    def loadKits(self) -> List[PhishingKit]:
        filename = self._getSavingFilename()
        if not os.path.exists(filename):
            return []

        with open(filename, "rb") as f:
            return pickle.load(f)

    def addKit(self, name:KitName) -> None:
        if self._getPhishingKit(name) is not None:
            return
        
        kit_dir = os.path.join(self.dir, name)
        properties = {prop:False for prop in self.currentProperties}
        kit = PhishingKit(name, kit_dir, properties)
        self.kits.append(kit)

    def addProperty(self, property:str) -> None:
        property = property.strip().replace(" ", "_")

        if property in self.currentProperties:
            return
        
        self.currentProperties.append(property)

        for kit in self.kits:
            kit.addProperty(property)

    def getProperties(self, name:KitName) -> Properties:
        kit = self._getPhishingKit(name)
        assert kit is not None, f"Kit {name} not found"

        return kit.properties

    def deploy(self, name:KitName) -> None:
        kit = self._getPhishingKit(name)
        assert kit is not None, f"Kit {name} not found"

        if not kit.isDeployed():
            kit.deploy()

    def isDeployed(self, name:KitName) -> bool:
        kit = self._getPhishingKit(name)
        assert kit is not None, f"Kit {name} not found"

        return kit.isDeployed()

    def stop(self, name:KitName) -> None:
        kit = self._getPhishingKit(name)
        assert kit is not None, f"Kit {name} not found"
        
        if kit.isDeployed():
            kit.stop()

    def stopAll(self) -> None:
        for kit in self.kits:
            kit.stop()

    def getURL(self, name:KitName) -> str:
        kit = self._getPhishingKit(name)
        assert kit is not None, f"Kit {name} not found"

        return kit.getURL()

    def toggleProperty(self, name:KitName, property:str) -> None:
        kit = self._getPhishingKit(name)
        assert kit is not None, f"Kit {name} not found"
        
        _property = property.strip().replace(" ", "_")

        kit.properties[_property] = not kit.properties[_property]
