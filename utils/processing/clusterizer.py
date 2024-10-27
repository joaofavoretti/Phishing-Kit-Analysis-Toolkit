from sklearn.metrics.pairwise import cosine_similarity, cosine_distances
from dataset_embedding import DatasetEmbedding, DomainInstructionBlock
from dataset_parser import DatasetParser, WebsiteSample
from sklearn.decomposition import PCA, IncrementalPCA
from sklearn.cluster import DBSCAN, HDBSCAN, OPTICS
from scipy.sparse import lil_matrix, csr_matrix
from scipy.stats import gmean
from dateutil import parser
from typing import List
from enum import Enum
import numpy as np
import time
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

        # Was supposed to be the same as TRANSPOSE, but it calculates the PCA of the
        #   vectors before the tranpose calculation to avoid fill the memory with values
        # The problem is that it misses main characteristics of the vectors and do not generalize well
        PRE_PCA_TRANSPOSE = "PRE_PCA_TRANPOSE"

        # https://math.stackexchange.com/questions/690972/distance-or-similarity-between-matrices-that-are-not-the-same-size
        # The RV Coeff strategy will, for each sample, use all the vectors
        #  from the sample, to calculate the distance between different sized
        #  matrices.
        RV = "rv"

        # The dCov Coeff strategy will, for each sample, use all the vectors
        #  from the sample, to calculate the distance between different sized
        #  matrices.
        DCOV = "dcov"

        # For the distance between two samples with variable number of vectors
        # It calculate the minimum distance between all the cross distances
        #   between the vectors
        MIN_DISTANCE = "MIN_DISTANCE"

        # For the distance between two samples with variable number of vectors
        # It calculate a minimum distance for every vector in the sample against
        #   all the vectors in the other sample. Then, it calculates
        #   the geometric mean of all the distances transforming the distances first
        #   using a shifted sigmoid function operating in the interval [0-1]
        WEIGHTED_DISTANCE = "WEIGHTED_DISTANCE"
        
        # The idea of this algorithm is to calculate the calculate the clusters from
        #   the embeddings of each sample. Then calculate a distance matrix based on 
        #   information from the clusters of each vector from the sample.
        PRECLUSTER_AVERAGE = "PRECLUSTER_AVERAGE"

        PRECLUSTER_SEQUENCE_LEVENSHTEIN_DECAY = "PRECLUSTER_SEQUENCE_LEVENSHTEIN_DECAY"

    class StrategyMetric(Enum):
        COSINE = "cosine"
        PRECOMPUTED = "precomputed"

    REPRESENTANT_STRATEGY_MAP = {
        # Representant Vector Strategies
        RepresentantStrategy.MOST_SIMILAR: "_most_similar_transform",
        RepresentantStrategy.AVERAGE: "_average_transform",
        RepresentantStrategy.WEIGHTED_AVERAGE: "_weighted_average_transform",
        RepresentantStrategy.TRANSPOSE: "_transpose_transform",
        RepresentantStrategy.PRE_PCA_TRANSPOSE: "_pre_pca_transpose_transform",

        # Distance Matrix Strategies
        RepresentantStrategy.RV: "_rv_transform",
        RepresentantStrategy.DCOV: "_dcov_transform",
        RepresentantStrategy.MIN_DISTANCE: "_min_distance_transform",
        RepresentantStrategy.WEIGHTED_DISTANCE: "_weighted_distance_transform",
        RepresentantStrategy.PRECLUSTER_AVERAGE: "_precluster_average_transform",
        RepresentantStrategy.PRECLUSTER_SEQUENCE_LEVENSHTEIN_DECAY: "_precluster_sequence_levenshtein_decay_transform"
    }
    
    REPRESENTANT_STRATEGY_METRIC = {
        # Representant Vector Approaches
        RepresentantStrategy.MOST_SIMILAR: StrategyMetric.COSINE,
        RepresentantStrategy.AVERAGE: StrategyMetric.COSINE,
        RepresentantStrategy.WEIGHTED_AVERAGE: StrategyMetric.COSINE,
        RepresentantStrategy.TRANSPOSE: StrategyMetric.COSINE,
        RepresentantStrategy.PRE_PCA_TRANSPOSE: StrategyMetric.COSINE,

        # Distance Matrix Approaches
        RepresentantStrategy.RV: StrategyMetric.PRECOMPUTED,
        RepresentantStrategy.DCOV: StrategyMetric.PRECOMPUTED,
        RepresentantStrategy.MIN_DISTANCE: StrategyMetric.PRECOMPUTED,
        RepresentantStrategy.WEIGHTED_DISTANCE: StrategyMetric.PRECOMPUTED,
        RepresentantStrategy.PRECLUSTER_AVERAGE: StrategyMetric.PRECOMPUTED,
        RepresentantStrategy.PRECLUSTER_SEQUENCE_LEVENSHTEIN_DECAY: StrategyMetric.PRECOMPUTED
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
   
    def _weighting_sigmoid_function(self, x: np.ndarray) -> np.ndarray:
        k = 10
        return 1 / (1 + np.exp(-k*(x-0.5)))

    def _weighting_sigmoid_function_2(self, x: np.ndarray) -> np.ndarray:
        k = 1.6
        x0 = 1.2
        return 1 / (1 + (((1 - x) * x0) / (x * (1 - x0))) ** k)

    def _weighting_sigmoid_function_3(self, x: np.ndarray) -> np.ndarray:
        # Set the min to be 0.01 and the max to be 0.99
        x = np.clip(x, 0.01, 0.99)

        k = 10.0
        x0 = 0.5
        return 1 / (1 + np.exp(-k*(np.log(x/(1-x)) - np.log(x0/(1-x0)))))

    def _weighting_log_function_1(self, x: np.ndarray) -> np.ndarray:
        a = 50.0

        return np.log(a * x + 1) / np.log(a + 1)

    def _weighting_log_function_2(self, x: np.ndarray) -> np.ndarray:
        a = 10.0

        return 1 - 1 / ((x + 1) ** a)

    def _weighting_exp_function_1(self, x: np.ndarray) -> np.ndarray:
        a = 10.0

        return 1 - np.exp(-a * x)

    def _exponential_decay_weight(self, i, alpha=0.3) -> np.float16:
        """Calculate the exponential decay weight for a given position."""
        return np.float16(np.exp(-alpha * i))

    def _weighted_decay_levenshtein_distance(self, s1: np.ndarray, s2: np.ndarray) -> np.ndarray:
        """
        This is a variation of the Levenshtein Distance where the cost of 
        edits decreases as the position in the sequence increases. The idea is 
        to give more importance to the first elements of the sequences by 
        applying an exponential decay to the cost of edits as you go further 
        along the sequence.
        """
        n, m = len(s1), len(s2)
        
        # Create a distance matrix
        dp = np.zeros((n + 1, m + 1), dtype=np.float16)
        
        # Initialize the matrix with position-based weights
        for i in range(1, n + 1):
            dp[i][0] = dp[i-1][0] + self._exponential_decay_weight(i-1)
        for j in range(1, m + 1):
            dp[0][j] = dp[0][j-1] + self._exponential_decay_weight(j-1)

        # Fill in the matrix using weighted costs for insertions, deletions, and substitutions
        for i in range(1, n + 1):
            for j in range(1, m + 1):
                cost = 0 if s1[i-1] == s2[j-1] else 1
                weight = self._exponential_decay_weight(max(i-1, j-1))
                dp[i][j] = min(dp[i-1][j] + weight,            # Deletion
                               dp[i][j-1] + weight,            # Insertion
                               dp[i-1][j-1] + cost * weight)   # Substitution

        # The weighted Levenshtein distance is the value in the bottom-right corner
        weighted_distance = dp[n][m]
        
        # Normalize the weighted distance
        max_weighted_distance = sum(self._exponential_decay_weight(i) for i in range(max(n, m)))
        normalized_distance = weighted_distance / max_weighted_distance
        
        return normalized_distance

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
                # subDistMatrix = self._weighting_sigmoid_function(subDistMatrix)
                subDistMatrix = self._weighting_sigmoid_function_3(subDistMatrix)
                # minSubDistances = np.min(subDistMatrix, axis=1)

                dist = gmean(subDistMatrix.flatten())

                distMatrix[i, j] = dist
                distMatrix[j, i] = dist

        return distMatrix

    def _precluster_average_transform(self, X: List[List[np.ndarray]]) -> np.ndarray:
        """
            This algorithm will calculate the clusters from the embeddings of each sample.
            Then, it will calculate a distance matrix based on the information from the clusters
            of each vector from the sample.
        """

        flatten_X = []
        for sample in X:
            flatten_X.extend(sample)
        flatten_X = np.array(flatten_X)

        model = DBSCAN(eps=0.5, min_samples=1, n_jobs=-1)
        model.fit(flatten_X)
        labels = model.labels_

        # Transform the labels to the X structure
        y = []
        current_index = 0
        for sample in X:
            y.append(labels[current_index:current_index+len(sample)])
            current_index += len(sample)

        assert len(X) == len(y), f"Expected len(x) == len(y). Got {len(X)} == {len(y)}"

        # Create a zero out matrix
        n_samples = len(X)
        distMatrix = np.zeros((n_samples, n_samples), dtype=np.float16)

        for i in range(n_samples):
            for j in range(n_samples):
                # Calculate the distance between the two samples
                setI = set(y[i]) - {-1}
                setJ = set(y[j]) - {-1}

                intersection = setI.intersection(setJ)
                union = setI.union(setJ)

                similarity = 0.0 if len(union) == 0 else len(intersection) / len(union)

                distMatrix[i, j] = 1 - similarity
                distMatrix[j, i] = 1 - similarity

        return self._weighting_sigmoid_function_3(distMatrix)

    def _precluster_sequence_levenshtein_decay_transform(self, X: List[List[np.ndarray]]) -> np.ndarray|csr_matrix:
        """
            This algorithm will calculate the clusters from the embeddings of each sample.
            Then, it will calculate a distance matrix based on the information from the clusters
            of each vector from the sample.
        """

        print(f"[{time.ctime()}] Calculating the distance matrix")
        flatten_X = []
        for sample in X:
            flatten_X.extend(sample)
        flatten_X = np.array(flatten_X)

        print(f"[{time.ctime()}] Calculating the clusters")
        model = DBSCAN(eps=0.5, min_samples=1, n_jobs=-1)
        model.fit(flatten_X)
        labels = model.labels_

        print(f"[{time.ctime()}] Transforming the labels")
        # Transform the labels to the X structure
        y = []
        current_index = 0
        for sample in X:
            y.append(labels[current_index:current_index+len(sample)])
            current_index += len(sample)

        assert len(X) == len(y), f"Expected len(x) == len(y). Got {len(X)} == {len(y)}"

        print(f"[{time.ctime()}] Calculating the distance matrix")
        # Create a zero out matrix
        n_samples = len(X)
        distMatrix = lil_matrix((n_samples, n_samples))
        # distMatrix = np.zeros((n_samples, n_samples), dtype=np.float16)

        for i in range(n_samples):
            print(f"Calculating distance {i}/{n_samples}", end="                  \r")
            for j in range(i + 1, n_samples):
                distance = self._weighted_decay_levenshtein_distance(y[i], y[j])

                if distance == 0.0:
                    distance = 0.0001

                if distance == 1.0:
                    continue

                distMatrix[i, j] = distance
                distMatrix[j, i] = distance
        print()

        return distMatrix.tocsr()

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

    def _pre_pca_transpose_transform(self, X: List[List[np.ndarray]]) -> np.ndarray:
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
            weights = self._weighting_sigmoid_function_3(max_values)

            # Calculate the weighted average
            new_sample = np.average(sample, axis=0, weights=weights)
            
            # Append the choosen representant vector to the new_X list
            new_X.append(new_sample)

            # Update the current index
            current_index += n_vectors
       
        return np.array(new_X)

    def _dbscan_fit(self, X: np.ndarray):
        assert isinstance(X, np.ndarray) or isinstance(X, csr_matrix), f"Expected {np.ndarray} or {csr_matrix}, got {type(X)}"

        print(f"[{time.ctime()}] Fitting DBSCAN")
        model = DBSCAN(eps=0.5, min_samples=1, metric=Clusterizer.REPRESENTANT_STRATEGY_METRIC[self.strategy].value, n_jobs=-1)

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

    def _getClosestLabels(self, X: csr_matrix, labels: np.ndarray) -> np.ndarray:
        """
            The main purpose of this is to obtain the closest cluster from the cluster assigned to
            each sample in the dataset.
            For this, it will create a distance matrix between the samples and calculate the closest
        """

        assert self.strategy == Clusterizer.RepresentantStrategy.PRECLUSTER_SEQUENCE_LEVENSHTEIN_DECAY, f"Expected {Clusterizer.RepresentantStrategy.PRECLUSTER_SEQUENCE_LEVENSHTEIN_DECAY}, got {self.strategy}"

        unique_clusters = np.unique(labels)
        closest_cluster_map = {}

        # Iterate over each unique cluster
        for i in unique_clusters:
            min_avg_dist = float('inf')
            closest_cluster = None
            
            for j in unique_clusters:
                if i != j:
                    # Get pairs of samples where one is in cluster i and the other in cluster j
                    mask_i = (labels == i)
                    mask_j = (labels == j)

                    # Extract distances for pairs between clusters i and j
                    distances = X[mask_i][:, mask_j].data
                    if distances.size > 0:
                        avg_distance = distances.mean()

                        # Track the minimum average distance and the closest cluster
                        if avg_distance < min_avg_dist:
                            min_avg_dist = avg_distance
                            closest_cluster = j

            closest_cluster_map[i] = closest_cluster

        # Map the closest clusters to the original labels
        closest_clusters = np.array([closest_cluster_map[label] for label in labels])

        return closest_clusters

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

        if self.strategy == Clusterizer.RepresentantStrategy.PRECLUSTER_SEQUENCE_LEVENSHTEIN_DECAY:
            # For now, it only applies to this strategy
            closest_labels = self._getClosestLabels(obj, labels)
            dataset.setWsClosestLabels(closest_labels, y)
        
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
]

BENIGN_LOGFILES_DIR = [
    "/home/joao/my/ita/mestrado/clustering-phishing-kit/experiments/same-urls/exp3/out"
]

OUT_DIR = "."

if __name__ == '__main__':
    dataset = DatasetParser(dbPath='./dpdb/')
    dataset.fit(MALICIOUS_LOGFILES_DIR, WebsiteSample.Category.MALICIOUS)
    dataset.fit(BENIGN_LOGFILES_DIR, WebsiteSample.Category.UNLABELED)

    def _filterOut(ib: DomainInstructionBlock):
        BLACKLISTED_DOMAINS = ["", "about:blank", "chrome://headless/headless_command.html", "chrome://headless/headless_command.js", "?"]

        if ib.domain in BLACKLISTED_DOMAINS:
            return True

        return False

    dataset.preprocess(_filterOut)

    cluster = Clusterizer(Clusterizer.Algorithm.DBSCAN, DatasetEmbedding.TransformMode.SBERT, Clusterizer.RepresentantStrategy.PRECLUSTER_SEQUENCE_LEVENSHTEIN_DECAY)
    cluster.fit(dataset)

    print("Saving vectors")
    cluster.save(OUT_DIR)
    print("Saving the data.json")
    cluster.exportJson(f'{OUT_DIR}/data1.json')

