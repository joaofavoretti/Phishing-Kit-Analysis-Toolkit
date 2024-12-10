from textual import log
from typing import List, Dict
from deployer import Deployer
import pickle
import json
import os

DEFAULT_PROPERTIES_FILE = 'default_properties.json'

KitName = str
Properties = Dict

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

    def getURL(self) -> Dict[str,str]:
        if self.isDeployed():
            assert self.deployer is not None
            return self.deployer.getAddr()

        return {}

    def toJSON(self) -> Dict:
        return {
            "name": self.name,
            "dir": self.dir,
            "properties": self.properties
        }


class PhishingKitStateManager:
    def __init__(self, dir: str):
        self.dir = dir

        self.kits:List[PhishingKit] = self.loadKits()
        for kit in self.kits:
            kit.deployer = None

        # self.verifyKits(self.kit , self.currentProperties)

    def _loadCurrentProperties(self) -> Dict:
        with open(DEFAULT_PROPERTIES_FILE, 'r') as f:
            return json.load(f)

    def verifyKits(self, kits:List[PhishingKit]) -> None:
        # TODO: Verify if the dictionary structure of the kits properties is the same as the properties structure
        if kits is None:
            return
        
        properties = self._loadCurrentProperties()

        raise NotImplementedError

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

    def _getExportingFilename(self) -> str:
        _abs = self.dir
        if os.path.isabs(self.dir):
            # _abs is the full path
            _abs = os.path.join(os.getcwd(), self.dir)
        savingName = os.path.basename(os.path.dirname(_abs))
        filename = f"{savingName}.json"
        os.path.join('db', filename)
        
        if not os.path.exists('db'):
            os.makedirs('db')

        log.info(f"Directory: {self.dir}")
        log.info(f"Exporting kits to {filename}")
        return filename

    def saveKits(self) -> None:
        filename = self._getSavingFilename()
        with open(filename, "wb") as f:
            pickle.dump(self.kits, f)

    def exportKits(self) -> None:
        filename = self._getExportingFilename()
        _kits = [kit.toJSON() for kit in self.kits]
        with open(filename, "w") as f:
            f.write(json.dumps(_kits, indent=2))

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
        properties = self._loadCurrentProperties()
        kit = PhishingKit(name, kit_dir, properties)
        self.kits.append(kit)

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

    def getURL(self, name:KitName) -> Dict[str,str]:
        kit = self._getPhishingKit(name)
        assert kit is not None, f"Kit {name} not found"

        return kit.getURL()

    def toggleProperty(self, name:KitName, property:str) -> None:
        def _toggle(d: Dict, prop: str) -> bool:
            for key, value in d.items():
                if key == prop:
                    d[key] = not d[key]
                    return True
                elif isinstance(value, dict):
                    if _toggle(value, prop):
                        return True
            return False

        kit = self._getPhishingKit(name)
        assert kit is not None, f"Kit {name} not found"

        if not _toggle(kit.properties, property):
            raise KeyError(f"Property {property} not found in kit {name}")

