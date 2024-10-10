from sklearn.metrics.pairwise import cosine_similarity, cosine_distances
from dataset_embedding import DatasetEmbedding, DomainInstructionBlock
from sklearn.decomposition import PCA, IncrementalPCA
from dataset_parser import DatasetParser, WebsiteSample
from scipy.stats import gmean
from sklearn.cluster import DBSCAN, HDBSCAN, OPTICS
from dateutil import parser
from typing import List
from enum import Enum
import numpy as np
import json
import os
import re


class EmbeddedDomainInstructionBlock(DomainInstructionBlock):
    def __init__(self,
                 domain: str, 
                 instructions: str,
                 vector: np.ndarray
                 ):
        super().__init__(domain, instructions)
        self.vector = vector

    def export(self):
        return {
            "domain": self.domain,
            "instructions": self.instructions,
            "vector": self.vector.tolist()
        }


class CategorizedWebsiteSample(WebsiteSample):
    def __init__(self,
                 filehash: str,
                 category: WebsiteSample.Category,
                 embedded_instruction_blocks: List[EmbeddedDomainInstructionBlock],
                 cluster: int,
                 ):
        super().__init__(filehash, category)
        self.embedded_instruction_blocks = embedded_instruction_blocks
        self.cluster = cluster

    def export(self):
        return {
            "filehash": self.filehash,
            "category": self.category.name,
            "instruction_blocks": [ib.export() for ib in self.embedded_instruction_blocks],
            "cluster": self.cluster
        }


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

    class RepresentantStrategy(Enum):
        # The representant strategy will, for each sample, select a representant
        #  vector from the sample. The representant vector will be the vector
        #  that is the most similar from any other vector of any other sample.
        # Ex: There is a vector that represent antibot.js, and there is another
        #  that has the exact same antibot.js file. Then, this vector will be choosen.
        MOST_SIMILAR = "most_similar"

        # The average strategy will, for each sample, use all the vectors
        #   from the sample, averaging them.
        AVERAGE = "average"

        # The weighted average strategy will calculate the minimum distance from each vector
        #   of the sample from all the others in the dataset. Then, it will use this distances
        #   as a weight to calculate the average vector. It will use the inverse shifted sigmoid
        #   function to translate the distance into the weight
        WEIGHTED_AVERAGE = 'WEIGHTED_AVERAGE'

        # The transpose strategy will, for each sample, use all the vectors
        #   create a square matrix by multiplying the vectors by their transpose.
        # Then, the matrix will be flattened and used as the representant vector.
        TRANSPOSE = "transpose"

        DIFFERENT_TRANPOSE = "DIFFERENT_TRANSPOSE"

        # https://math.stackexchange.com/questions/690972/distance-or-similarity-between-matrices-that-are-not-the-same-size
        # The RV Coeff strategy will, for each sample, use all the vectors
        #  from the sample, to calculate the distance between different sized
        #  matrices.
        RV = "rv"

        # The dCov Coeff strategy will, for each sample, use all the vectors
        #  from the sample, to calculate the distance between different sized
        #  matrices.
        DCOV = "dcov"

        MIN_DISTANCE = "MIN_DISTANCE"
        WEIGHTED_DISTANCE = "WEIGHTED_DISTANCE"

    class StrategyMetric(Enum):
        COSINE = "cosine"
        PRECOMPUTED = "precomputed"

    REPRESENTANT_STRATEGY_MAP = {
        # Vector summarization strategies
        RepresentantStrategy.MOST_SIMILAR: "_most_similar_transform",
        RepresentantStrategy.AVERAGE: "_average_transform",
        RepresentantStrategy.WEIGHTED_AVERAGE: "_weighted_average_transform",
        RepresentantStrategy.TRANSPOSE: "_transpose_transform",
        RepresentantStrategy.DIFFERENT_TRANPOSE: "_different_transpose_transform",

        # Distance Matrix strategies
        RepresentantStrategy.RV: "_rv_transform",
        RepresentantStrategy.DCOV: "_dcov_transform",
        RepresentantStrategy.MIN_DISTANCE: "_min_distance_transform",
        RepresentantStrategy.WEIGHTED_DISTANCE: "_weighted_distance_transform"
    }
    
    REPRESENTANT_STRATEGY_METRIC = {
        RepresentantStrategy.MOST_SIMILAR: StrategyMetric.COSINE,    # Means that it deals with vectors for each s
        RepresentantStrategy.AVERAGE: StrategyMetric.COSINE,
        RepresentantStrategy.WEIGHTED_AVERAGE: StrategyMetric.COSINE,
        RepresentantStrategy.TRANSPOSE: StrategyMetric.COSINE,
        RepresentantStrategy.DIFFERENT_TRANPOSE: StrategyMetric.COSINE,

        RepresentantStrategy.RV: StrategyMetric.PRECOMPUTED,         # Means that it deals with distance matrix
        RepresentantStrategy.DCOV: StrategyMetric.PRECOMPUTED,
        RepresentantStrategy.MIN_DISTANCE: StrategyMetric.PRECOMPUTED,
        RepresentantStrategy.WEIGHTED_DISTANCE: StrategyMetric.PRECOMPUTED
    }

    def __init__(self,
                 alg: Algorithm,
                 mode: DatasetEmbedding.TransformMode,
                 strategy: RepresentantStrategy,
                 ):
        
        assert isinstance(alg, Clusterizer.Algorithm), f"Expected {Clusterizer.Algorithm}, got {type(alg)}"
        assert isinstance(mode, DatasetEmbedding.TransformMode), f"Expected {DatasetEmbedding.TransformMode}, got {type(mode)}"
        assert isinstance(strategy, Clusterizer.RepresentantStrategy), f"Expected {Clusterizer.RepresentantStrategy}, got {type(strategy)}"

        self.alg = alg
        self.mode = mode
        self.strategy = strategy
    
    def _rv_transform(self, X: List[List[np.ndarray]]) -> np.ndarray:
        raise Exception("Sorry! Not implemented yet")

    def _dcov_transform(self, X: List[List[np.ndarray]]) -> np.ndarray:
        raise Exception("Sorry! Not implemented yet")

    def _min_distance_transform(self, X: List[List[np.ndarray]]) -> np.ndarray:
        """
        X is compose of a list of matrices. Each matrix is a differently sized list of vectors.
        This algorithm will return a distance matrix that for each pair of samples will return
        The maximum distance between all the vector distances of the pair
        """

        # Create a zero out matrix
        n_samples = len(X)
        distMatrix = np.zeros((n_samples, n_samples))

        for i in range(n_samples):
            for j in range(i+1, n_samples):
                # Calculate the distance between the two samples
                subDistMatrix = cosine_distances(X[i], X[j])

                dist = np.min(subDistMatrix)

                distMatrix[i, j] = dist
                distMatrix[j, i] = dist

        return distMatrix

    def _weighted_distance_transform(self, X: List[List[np.ndarray]]) -> np.ndarray:
        """
        X is compose of a list of matrices. Each matrix is a differently sized list of vectors.
        This algorithm will return a distance matrix that for each pair of samples will return
        The maximum distance between all the vector distances of the pair
        """

        # Create a zero out matrix
        n_samples = len(X)
        distMatrix = np.zeros((n_samples, n_samples))

        for i in range(n_samples):
            for j in range(i+1, n_samples):
                # Calculate the distance between the two samples
                subDistMatrix = cosine_distances(X[i], X[j])
                # subDistMatrix = self._shifted_sigmoid_function(subDistMatrix)
                subDistMatrix = self._strange_function2(subDistMatrix)
                # minSubDistances = np.min(subDistMatrix, axis=1)

                dist = gmean(subDistMatrix.flatten())

                distMatrix[i, j] = dist
                distMatrix[j, i] = dist

        return distMatrix

    def _transpose_transform(self, X: List[List[np.ndarray]]) -> np.ndarray:
        assert isinstance(X, list), f"Expected {list}, got {type(X)}"

        # Create the transposed vectors
        new_X = []
        X_len = len(X)
        for i, sample in enumerate(X):
            print(f"Transforming sample {i}/{X_len}", end="                  \r")
            
            sample = np.array(sample)
            matrix = np.matmul(sample.transpose(), sample)
            new_sample = matrix.flatten()
            new_X.append(new_sample)

        # Calculate the PCA to reduce the dimensionality to 1024
        print("Calculating PCA")
        n_components=min(256, len(new_X), len(new_X[0]))
        pca = IncrementalPCA(n_components=n_components, batch_size=n_components)
        new_X = pca.fit_transform(new_X)

        return np.array(new_X)

    def _different_transpose_transform(self, X: List[List[np.ndarray]]) -> np.ndarray:
        # Different tranpose by calculating the PCA of X before the transpose calculation
        assert isinstance(X, list), f"Expected {list}, got {type(X)}"
        
        new_X = []
        X_len = len(X)
        for i, sample in enumerate(X):
            print(f"Transforming sample {i}/{X_len}", end="                  \r")
            
            sample = np.array(sample)
            matrix = np.matmul(sample.transpose(), sample)
            
            new_sample = matrix.flatten()
            new_X.append(new_sample)

        return np.array(new_X)

    def _average_transform(self, X: List[List[np.ndarray]]) -> np.ndarray:
        assert isinstance(X, list), f"Expected {list}, got {type(X)}"

        new_X = [np.mean(np.array(sample), axis=0) for sample in X]

        return np.array(new_X)

    def _most_similar_transform(self, X: List[List[np.ndarray]]) -> np.ndarray:
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

    def _shifted_sigmoid_function(self, x: np.ndarray) -> np.ndarray:
        k = 10
        return 1 / (1 + np.exp(-k*(x-0.5)))

    def _strange_function(self, x: np.ndarray) -> np.ndarray:
        k = 1.6
        x0 = 1.2
        return 1 / (1 + (((1 - x) * x0) / (x * (1 - x0))) ** k)

    def _strange_function2(self, x: np.ndarray) -> np.ndarray:
        # Set the min to be 0.01 and the max to be 0.99
        x = np.clip(x, 0.01, 0.99)

        k = 15.0
        x0 = 0.4
        return 10 / (1 + np.exp(-k*(np.log(x/(1-x)) - np.log(x0/(1-x0)))))

    def _weighted_average_transform(self, X: List[List[np.ndarray]]) -> np.ndarray:
        assert isinstance(X, list), f"Expected {list}, got {type(X)}"

        # Create a flatten array with all the vectors from X
        flatten_X = []
        for sample in X:
            flatten_X.extend(sample)
        flatten_X = np.array(flatten_X)

        # This is the variable that will hold the choosen representant vector for each smaple
        new_X = []

        # For each sample, calculate a similarity matrix between the the vectors from the sample and all the vectors
        current_index = 0
        for i, sample in enumerate(X):
            print(f"Transforming sample {i}/{len(X)}", end="                  \r")
            similarity_matrix = cosine_similarity(sample, flatten_X)

            # Number of vectors from the current smaple
            n_vectors = len(sample)

            # Zero out the "square" that belongs to the vectors in the sample against themselves
            similarity_matrix[current_index:current_index+n_vectors, current_index:current_index+n_vectors] = 0.0

            # For each line in the similarity matrix, obtain the maximum values in each row
            max_values = np.max(similarity_matrix, axis=1)

            # Calculate the weights for each vector in the sample
            weights = self._strange_function2(max_values)

            # Calculate the weighted average
            new_sample = np.average(sample, axis=0, weights=weights)
            
            # Append the choosen representant vector to the new_X list
            new_X.append(new_sample)

            # Update the current index
            current_index += n_vectors
       
        return np.array(new_X)

    def _dbscan_fit(self, X: np.ndarray):
        assert isinstance(X, np.ndarray), f"Expected {np.ndarray}, got {type(X)}"

        print("Fitting DBSCAN")
        model = DBSCAN(eps=0.05, min_samples=1, metric=Clusterizer.REPRESENTANT_STRATEGY_METRIC[self.strategy].value, n_jobs=-1)

        model.fit(X)

        return model
    
    def _hdbscan_fit(self, X: np.ndarray):
        assert isinstance(X, np.ndarray), f"Expected {np.ndarray}, got {type(X)}"

        model = HDBSCAN(min_cluster_size=1, metric=Clusterizer.REPRESENTANT_STRATEGY_METRIC[self.strategy].value)

        model.fit(X)

        return model

    def _optics_fit(self, X: np.ndarray):
        assert isinstance(X, np.ndarray), f"Expected {np.ndarray}, got {type(X)}"

        model = OPTICS(min_samples=1, metric=Clusterizer.REPRESENTANT_STRATEGY_METRIC[self.strategy].value)

        model.fit(X)

        return model

    def fit(self, dataset: DatasetParser) -> 'Clusterizer':
        assert isinstance(dataset, DatasetParser), f"Expected {DatasetParser}, got {type(dataset)}"

        embedding = DatasetEmbedding(self.mode, dbPath='./dedb/')
        embedding.fit(dataset)
        dataset = embedding.transform(dataset)
        X, y = dataset.getIbEmbeddings()
        assert isinstance(X, list), f"Expected {list}, got {type(X)}"
        assert isinstance(y, np.ndarray), f"Expected {np.ndarray}, got {type(y)}"

        self.dataset = dataset

        strategy_method = getattr(self, Clusterizer.REPRESENTANT_STRATEGY_MAP[self.strategy])
        # In general, obj could be a list of vectors that represent each samples
        #   or a distance matrix. However, I am not sure about the idea of a distance matrix
        #   therefore it is not impmlemented yet.
        # The main problem of a distance matrix is that it makes the life harder in a classification system
        # For now, this generic result can only be X transformed
        metric: Clusterizer.StrategyMetric = Clusterizer.REPRESENTANT_STRATEGY_METRIC[self.strategy]

        if metric == Clusterizer.StrategyMetric.PRECOMPUTED:
            # obj = Distance Matrix
            obj = strategy_method(X)

        else:
            obj = strategy_method(X)

            dataset.setWsEmbeddings(obj, y)

        alg_method = getattr(self, Clusterizer.ALGORITHM_MAP[self.alg])
        self.model = alg_method(obj)

        labels = self.model.labels_
        dataset.setWsLabels(labels, y)
        
        return self

    def _saveWs(self, dirPath: str):
        X, y = self.dataset.getWsEmbeddings()
        labels, yLabels = self.dataset.getWsLabels()

        with open(f"{dirPath}/vectors.tsv", "w") as f:
            for x in X:
                f.write("\t".join(map(str, x)) + "\n")

        with open(f"{dirPath}/metadata.tsv", "w") as f:
            f.write("HASH\tCATEGORY\tCLUSTER\n")
            for i in range(len(y)):

                # Just a note to myself
                if yLabels[i][1] != y[i][1]:
                    raise Exception(f"Stupid Developer!! getWsEmbeddings and getWsLabels do not return the samples in the same order")

                f.write(f"{y[i][1]}\t{y[i][0]}\t{labels[i]}\n")

    def _saveIb(self, dirPath: str):
        X, y = self.dataset.getIbEmbeddings(flatten=True)
        labels, yLabels = self.dataset.getIbLabels(flatten=True)

        with open(f"{dirPath}/vectors.tsv", "w") as f:
            for x in X:
                f.write("\t".join(map(str, x)) + "\n")

        with open(f"{dirPath}/metadata.tsv", "w") as f:
            f.write("HASH\tCATEGORY\tCLUSTER\n")
            for i in range(len(y)):
                if yLabels[i][1] != y[i][1]:
                    raise Exception(f"Stupid Developer!! getIbEmbeddings and getIbLabels do not return the samples in the same order")

                f.write(f"{y[i][1]}\t{y[i][0]}\t{labels[i]}\n")

    def save(self, dirPath: str):
        """
            Save the vectors and labels as .tsv files
        """

        if not os.path.exists(dirPath):
            os.makedirs(dirPath)

        metric: Clusterizer.StrategyMetric = Clusterizer.REPRESENTANT_STRATEGY_METRIC[self.strategy]

        if metric == Clusterizer.StrategyMetric.PRECOMPUTED:
            self._saveIb(dirPath)
        else:
            self._saveWs(dirPath)

    def exportJson(self, filePath: str):
        """
            Save the dataset as a .json file with information
            about the clusters in it.
        """

        assert isinstance(filePath, str), f"Expected {str}, got {type(filePath)}"
        
        json_website_samples = []
        for category, websiteSamples in self.dataset.websiteSamples.items():
            for websiteSample in websiteSamples:
                json_website_samples.append(websiteSample.exportJson())

        # Save the result
        with open(filePath, "w") as f:
            f.write(json.dumps(json_website_samples, indent=2))


MALICIOUS_LOGFILES_DIR = [
    # "/archive/files/eval-phishing-pages/out/tmp-phishtank/"
    "/archive/files/eval-phishing-pages/out/phishtank/"
    # "/home/joao/my/ita/mestrado/clustering-phishing-kit/utils/experiments/same-urls/exp3/out"
]

OUT_DIR = "."

if __name__ == '__main__':
    dataset = DatasetParser(dbPath='./dpdb/')
    dataset.fit(MALICIOUS_LOGFILES_DIR, WebsiteSample.Category.MALICIOUS)

    def _filterOut(ib: DomainInstructionBlock):
        BLACKLISTED_DOMAINS = ["", "about:blank", "chrome://headless/headless_command.html", "chrome://headless/headless_command.js", "?"]

        if ib.domain in BLACKLISTED_DOMAINS:
            return True

        return False

    dataset.preprocess(_filterOut)

    cluster = Clusterizer(Clusterizer.Algorithm.DBSCAN, DatasetEmbedding.TransformMode.SBERT, Clusterizer.RepresentantStrategy.WEIGHTED_DISTANCE)
    cluster.fit(dataset)

    print("Saving vectors")
    cluster.save(OUT_DIR)
    print("Saving the data.json")
    cluster.exportJson(f'{OUT_DIR}/data2.json')

