from sklearn.metrics.pairwise import cosine_similarity, cosine_distances
from dataset_embedding import DatasetEmbedding, DomainInstructionBlock
from dataset_parser import DatasetParser, WebsiteSample
from sklearn.cluster import DBSCAN, HDBSCAN, OPTICS
from typing import List
from enum import Enum
import numpy as np
import os


class Clusterizer:

    class Algorithm(Enum):
        DBSCAN = "dbscan"
        HDBSCAN = "hdbscan"
        OPTICS = "optics"

    ALGORITHM_MAP = {
        Algorithm.DBSCAN: "_dbscan_fit",
        Algorithm.HDBSCAN: "_hdbscan_fit",
        Algorithm.OPTICS: "_optics_fit"
    }

    class Strategy(Enum):
        # The representant strategy will, for each sample, select a representant
        #  vector from the sample. The representant vector will be the vector
        #  that is the most similar from any other vector of any other sample.
        # Ex: There is a vector that represent antibot.js, and there is another
        #  that has the exact same antibot.js file. Then, this vector will be choosen.
        REPRESENTANT = "representant"

        # The average strategy will, for each sample, use all the vectors
        #   from the sample, averaging them.
        AVERAGE = "average"

        # https://math.stackexchange.com/questions/690972/distance-or-similarity-between-matrices-that-are-not-the-same-size
        # The RV Coeff strategy will, for each sample, use all the vectors
        #  from the sample, to calculate the distance between different sized
        #  matrices.
        RV = "rv"

        # The dCov Coeff strategy will, for each sample, use all the vectors
        #  from the sample, to calculate the distance between different sized
        #  matrices.
        DCOV = "dcov"

    STRATEGY_MAP = {
        Strategy.REPRESENTANT: "_representant_transform",
        Strategy.AVERAGE: "_average_transform",
        Strategy.RV: "_rv_transform",
        Strategy.DCOV: "_dcov_transform",
    }
    
    STRATEGY_METRIC = {
        Strategy.REPRESENTANT: "cosine",    # Means that it deals with vectors for each sample
        Strategy.AVERAGE: "cosine",
        Strategy.RV: "precomputed",         # Means that it deals with distance matrix
        Strategy.DCOV: "precomputed",
    }

    def __init__(self,
                 alg: Algorithm,
                 mode: DatasetEmbedding.TransformMode,
                 strategy: Strategy,
                 ):
        
        assert isinstance(alg, Clusterizer.Algorithm), f"Expected {Clusterizer.Algorithm}, got {type(alg)}"
        assert isinstance(mode, DatasetEmbedding.TransformMode), f"Expected {DatasetEmbedding.TransformMode}, got {type(mode)}"
        assert isinstance(strategy, Clusterizer.Strategy), f"Expected {Clusterizer.Strategy}, got {type(strategy)}"

        self.alg = alg
        self.mode = mode
        self.strategy = strategy
        self.labels = []
    
    def _rv_transform(self, X: List[List[np.ndarray]]) -> np.ndarray:
        raise Exception("Sorry! Not implemented yet")

    def _dcov_transform(self, X: List[List[np.ndarray]]) -> np.ndarray:
        raise Exception("Sorry! Not implemented yet")

    def _average_transform(self, X: List[List[np.ndarray]]) -> np.ndarray:
        assert isinstance(X, list), f"Expected {list}, got {type(X)}"

        new_X = [np.mean(np.array(sample), axis=0) for sample in X]

        return np.array(new_X)

    def _representant_transform(self, X: List[List[np.ndarray]]) -> np.ndarray:
        assert isinstance(X, list), f"Expected {list}, got {type(X)}"

        # Create a flatten array with all the vectors from X
        flatten_X = []
        for sample in X:
            flatten_X.extend(sample)
        flatten_X = np.array(flatten_X)

        # This is the variable that will hold the choosen representant vector for each smaple
        new_X = []

        # For each sample, calculate a similarity matrix between the the vectors from the sample and all the vectors
        current_index = 0   # Used to keep track of the diagonal of the similarity matrix
        for i, sample in enumerate(X):
            similarity_matrix = cosine_similarity(sample, flatten_X)

            # Number of vectors from the current smaple
            n_vectors = len(sample)

            # Diagonal indexes of the similarity matrix
            diagonal_indexes = np.diag_indices(n_vectors)
            # Shift the diagonal indexes to the correct position in the flatten similarity matrix
            diagonal_indexes = (diagonal_indexes[0], diagonal_indexes[1] + current_index)
            # Zero out the diagonal of the similarity matrix
            similarity_matrix[diagonal_indexes] = 0.0

            # Get the index of the highest value from the similarity matrix
            max_index = np.unravel_index(np.argmax(similarity_matrix), similarity_matrix.shape)

            # Append the choosen representant vector to the new_X list
            new_X.append(sample[max_index[0]])

            # Update the current index
            current_index += n_vectors

        return np.array(new_X)

    def _dbscan_fit(self, X: np.ndarray):
        assert isinstance(X, np.ndarray), f"Expected {np.ndarray}, got {type(X)}"

        model = DBSCAN(eps=0.05, min_samples=1, metric=Clusterizer.STRATEGY_METRIC[self.strategy])

        model.fit(X)

        return model
    
    def _hdbscan_fit(self, X: np.ndarray):
        assert isinstance(X, np.ndarray), f"Expected {np.ndarray}, got {type(X)}"

        model = HDBSCAN(min_cluster_size=1, metric=Clusterizer.STRATEGY_METRIC[self.strategy])

        model.fit(X)

        return model

    def _optics_fit(self, X: np.ndarray):
        assert isinstance(X, np.ndarray), f"Expected {np.ndarray}, got {type(X)}"

        model = OPTICS(min_samples=1, metric=Clusterizer.STRATEGY_METRIC[self.strategy])

        model.fit(X)

        return model

    def fit(self, dataset: DatasetParser) -> 'Clusterizer':
        assert isinstance(dataset, DatasetParser), f"Expected {DatasetParser}, got {type(dataset)}"

        embedding = DatasetEmbedding(self.mode, flatten=False)
        embedding.fit(dataset)
        X, y = embedding.transform(dataset)
        assert isinstance(X, list), f"Expected {list}, got {type(X)}"
        assert isinstance(y, np.ndarray), f"Expected {np.ndarray}, got {type(y)}"

        # Save the fit values
        self.dataset = dataset
        self.X = X
        self.y = y

        strategy_method = getattr(self, Clusterizer.STRATEGY_MAP[self.strategy])
        # In general, obj could be a list of vectors that represent each samples
        #   or a distance matrix. However, I am not sure about the idea of a distance matrix
        #   therefore it is not impmlemented yet.
        # The main problem of a distance matrix is that it makes the life harder in a classification system
        obj = strategy_method(X)
        self.obj = obj

        alg_method = getattr(self, Clusterizer.ALGORITHM_MAP[self.alg])
        self.model = alg_method(obj)
        self.labels = self.model.labels_
        
        assert len(y) == len(self.labels), f"Expected {len(y)} == {len(self.labels)}"

        return self

    def save(self, dirPath: str):
        
        if not os.path.exists(dirPath):
            os.makedirs(dirPath)

        with open(f"{dirPath}/vectors.tsv", "w") as f:
            for x in self.obj:
                f.write("\t".join(map(str, x)) + "\n")

        with open(f"{dirPath}/metadata.tsv", "w") as f:
            f.write("HASH\tCATEGORY\tCLUSTER\n")
            for i in range(len(self.y)):
                f.write(f"{self.y[i][1]}\t{self.y[i][0]}\t{self.labels[i]}\n")


MALICIOUS_LOGFILES_DIR = [
    "/archive/files/eval-phishing-pages/out/phishtank/"
]

OUT_DIR = "/home/joao/my/ita/mestrado/2-clustering-phishing-kit/utils/out/clusters-SBERT"

if __name__ == '__main__':
    dataset = DatasetParser().fit(MALICIOUS_LOGFILES_DIR, WebsiteSample.Category.MALICIOUS)

    def _filterOut(ib: DomainInstructionBlock):
        BLACKLISTED_DOMAINS = ["EMPTY", "about:blank", "chrome://headless/headless_command.html", "chrome://headless/headless_command.js", "?"]

        if ib.domain in BLACKLISTED_DOMAINS:
            return True

        return False

    dataset.preprocess(_filterOut)

    cluster = Clusterizer(Clusterizer.Algorithm.DBSCAN, DatasetEmbedding.TransformMode.SBERT, Clusterizer.Strategy.REPRESENTANT)
    cluster.fit(dataset)

    cluster.save(OUT_DIR)

