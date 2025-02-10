from sklearn.metrics import adjusted_rand_score, normalized_mutual_info_score, fowlkes_mallows_score, homogeneity_completeness_v_measure
from dataset_embedding import DatasetEmbedding, DomainInstructionBlock
from dataset_parser import DatasetParser, WebsiteSample
from gdrive_sync import GDriveSync, Entry
from typing import List, Set, Union, Dict, Tuple
from clusterizer import Clusterizer
from datetime import datetime
from dateutil import parser
import numpy as np
import pickle
import shutil
import json
import time
import os
import re

GROUND_TRUTH_FILE = "/home/joao/my/ita/mestrado/clustering-phishing-kit/utils/metrics/phishing-kit-manual-analysis/same_phishing_kit.json"

class ClusterizerConfiguration:
    def __init__(self, alg: Clusterizer.Algorithm, algParameters: Dict[str, Union[str, int, float]], mode: DatasetEmbedding.TransformMode, strategy: Clusterizer.RepresentantStrategy, strategyParameters: Dict[str, Union[str, int, float]]):
        self.alg = alg
        self.algParameters = algParameters
        self.mode = mode
        self.strategy = strategy
        self.strategyParameters = strategyParameters

class Measurer:
    def __init__(self, configurations: List[ClusterizerConfiguration], dataset: DatasetParser, groundTruthPath: str):
        self.configurations = configurations
        self.dataset = dataset
        self.groundTruthPath = groundTruthPath

    def _getGroundTruthSamplesNames(self) -> List[str]:
        samplesNames:List[str] = []
        with open(self.groundTruthPath, 'r') as f:
            data = json.load(f)

        for entry in data:
            samplesNames += entry["kits"]
        
        assert len(samplesNames) == len(set(samplesNames)), "There are duplicated samples in the ground truth file."

        return sorted(samplesNames)

    def _getClusterizerResultSamplesNames(self, clusterizerResult) -> List[str]:
        samplesNames:List[str] = []
        for cluster in clusterizerResult:
            samplesNames += cluster

        assert len(samplesNames) == len(set(samplesNames)), "There are duplicated samples in the clusterizer result."

        return sorted(samplesNames)

    def _getSamplesNamesIntersection(self, groundTruthSamplesNames:List[str], clusterizerResultSamplesNames:List[str]) -> List[str]:
        return sorted(list(set(groundTruthSamplesNames).intersection(set(clusterizerResultSamplesNames))))

    def _getGroundTruthLabels(self, samplesNames:List[str]) -> np.ndarray:
        labels = np.full(len(samplesNames), -1)
        with open(self.groundTruthPath, 'r') as f:
            data = json.load(f)

        for i, entry in enumerate(data):
            for sample in entry["kits"]:
                try:
                    labels[samplesNames.index(sample)] = i
                except ValueError:
                    continue
        
        return labels

    def _getClusterizerResultLabels(self, samplesNames:List[str], clusterizerResult:Dict[str, List[str]]) -> np.ndarray:
        labels = np.full(len(samplesNames), -1)
        for i, list_samples in clusterizerResult.items():
            for sample in list_samples:
                try:
                    labels[samplesNames.index(sample)] = i
                except ValueError:
                    continue
        
        return labels

    def _getMetrics(self, clusterizerResult:Dict[str, List[str]]):
        groundTruthSamplesNames = self._getGroundTruthSamplesNames()
        clusterizerResultSamplesNames = self._getClusterizerResultSamplesNames(clusterizerResult)
        samplesNames = self._getSamplesNamesIntersection(groundTruthSamplesNames, clusterizerResultSamplesNames)

        assert len(samplesNames) > 0, "There are no samples in common between the ground truth and the clusterizer result."

        groundTruthLabels = self._getGroundTruthLabels(samplesNames)
        clusterizerResultLabels = self._getClusterizerResultLabels(samplesNames, clusterizerResult)
        
        ari = adjusted_rand_score(groundTruthLabels, clusterizerResultLabels)
        nmi = normalized_mutual_info_score(groundTruthLabels, clusterizerResultLabels)
        fms = fowlkes_mallows_score(groundTruthLabels, clusterizerResultLabels)
        hcv = homogeneity_completeness_v_measure(groundTruthLabels, clusterizerResultLabels)

        return ari, nmi, fms, hcv

    def _printOutput(self, configuration:ClusterizerConfiguration, ari, nmi, fms, hcv):
        print(f"Configuration: {configuration.__dict__}")
        print(f"Adjusted Rand Index: {ari}")
        print(f"Normalized Mutual Information: {nmi}")
        print(f"Fowlkes-Mallows Score: {fms}")
        print(f"Homogeneity: {hcv[0]}")
        print(f"Completeness: {hcv[1]}")
        print(f"V-Measure: {hcv[2]}")
        print()

    def _writeOutput(self, outputFilepath:str, configuration:ClusterizerConfiguration, ari, nmi, fms, hcv):
        data = {
            "configuration": configuration.__dict__,
            "metrics": {
                "ari": ari,
                "nmi": nmi,
                "fms": fms,
                "hcv": {
                    "homogeneity": hcv[0],
                    "completeness": hcv[1],
                    "v-measure": hcv[2]
                }
            }
        }

        try:
            with open(outputFilepath, 'r') as f:
                results = json.load(f)
        except FileNotFoundError:
            results = []

        results.append(data)

        with open(outputFilepath, 'w') as f:
            json.dump(results, f, indent=4)

    def measure(self, outputFilepath:Union[str,None]=None):
        for configuration in self.configurations:
            clusterizer = Clusterizer(configuration.alg, configuration.algParameters, configuration.mode, configuration.strategy, configuration.strategyParameters)
            clusterizer.fit(self.dataset)
            clusterizerResult = clusterizer.getClusters()

            ari, nmi, fms, hcv = self._getMetrics(clusterizerResult)

            if outputFilepath:
                self._writeOutput(outputFilepath, configuration, ari, nmi, fms, hcv)
            else:
                self._printOutput(configuration, ari, nmi, fms, hcv)

        return

if __name__ == '__main__':
    LOG_FILES_DIR = ["/archive/files/eval-phishing-pages/out/phishtank/"]
    dataset = DatasetParser(dbPath='./dpdb/', lookup=None)
    dataset.fit(LOG_FILES_DIR, WebsiteSample.Category.UNLABELED)
    def _filterOut(ib: DomainInstructionBlock):
        BLACKLISTED_DOMAINS = ["", "about:blank", "chrome://headless/headless_command.html", "chrome://headless/headless_command.js", "?"]

        if ib.domain in BLACKLISTED_DOMAINS:
            return True

        return False
    dataset.preprocess(_filterOut) 

    clusterizerConfiguration = ClusterizerConfiguration(
        alg=Clusterizer.Algorithm.DBSCAN,
        algParameters={
            "eps": 0.5,
        },
        mode=DatasetEmbedding.TransformMode.SBERT,
        strategy=Clusterizer.RepresentantStrategy.PRECLUSTER_SEQUENCE_LEVENSHTEIN_DECAY,
        strategyParameters={
            "alpha": 0.3,
            "dbscan_eps": 0.5,
        }
    )

    measurer = Measurer([clusterizerConfiguration], dataset, GROUND_TRUTH_FILE)

    measurer.measure("./measurer_results.json")


