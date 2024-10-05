from dataset_parser import WebsiteSample, DatasetParser, FlattenInstructionBlock
from gensim.models.doc2vec import Doc2Vec, TaggedDocument
from sentence_transformers import SentenceTransformer
from log_parser import DomainInstructionBlock
from typing import List
from enum import Enum
import numpy as np
import hashlib
import pickle
import os


class DatasetEmbedding:
    class TransformMode(Enum):
        DOC2VEC = "doc2vec"
        SBERT = "sbert"

    FIT_MODE_MAP = {
        TransformMode.DOC2VEC: "_doc2vec_fit",
        TransformMode.SBERT: "_sbert_fit"
    }

    TRANSFORM_MODE_MAP = {
        TransformMode.DOC2VEC: "_doc2vec_transform",
        TransformMode.SBERT: "_sbert_transform"
    }

    def __init__(self, mode: TransformMode, dbPath: str = './dedb/'):
        """
        :param mode: The mode to transform the data. It can be either "doc2vec" or "sbert"
        :param flatten: If true, then each instruction block will be represented as a single vector.
            If false, each website sample will be represented by a matrix (n_instruction_blocks, n_features)
        """
        self.dbPath = dbPath
        self.saveDb = dbPath is not None

        self.mode = mode

    def _doc2vec_fit(self, flattenInstructionBlocks: List[FlattenInstructionBlock]) -> Doc2Vec:
        data = [TaggedDocument(words=ib.instructions.split(), tags=[ib.hash, ib.index, ib.category.name]) for ib in flattenInstructionBlocks]
        
        assert len(data) == len(flattenInstructionBlocks), f"Data and flattenInstructionBlocks have different lengths: {len(data)} != {len(flattenInstructionBlocks)}"

        model = Doc2Vec(vector_size=128, window=32, min_count=1, workers=4, epochs=40, dm=0, dbow_words=1)
        model.build_vocab(data)
        model.train(data, total_examples=model.corpus_count, epochs=model.epochs)

        return model

    def _doc2vec_transform(self, flattenInstructionBlocks: List[FlattenInstructionBlock]) -> tuple[np.ndarray, np.ndarray]:
        if type(self.model) != Doc2Vec:
            raise ValueError("Model is not a Doc2Vec model somehow")

        instructions = [TaggedDocument(words=ib.instructions.split(), tags=[ib.category.name, f'{ib.hash}_{ib.index}']) for ib in flattenInstructionBlocks]

        X = np.array([self.model.infer_vector(ib.words) for ib in instructions])
        y = np.array([[ib.category.value, f'{ib.hash}_{ib.index}'] for ib in flattenInstructionBlocks])

        assert type(X) == np.ndarray
        assert len(X) == len(y), f"X and y have different lengths: {len(X)} != {len(y)}"
        assert len(flattenInstructionBlocks) == len(y), f"flattenInstructionBlocks and y have different lengths: {len(flattenInstructionBlocks)} != {len(y)}"
        assert len(flattenInstructionBlocks) == len(X), f"flattenInstructionBlocks and X have different lengths: {len(flattenInstructionBlocks)} != {len(X)}"

        return X, y
    
    def _sbert_fit(self, flattenInstructionBlocks: List[FlattenInstructionBlock]) -> SentenceTransformer:
        model = SentenceTransformer('stsb-roberta-large')
        return model

    def _sbert_transform(self, flattenInstructionBlocks: List[FlattenInstructionBlock]) -> tuple[np.ndarray, np.ndarray]:
        if type(self.model) != SentenceTransformer:
            raise ValueError("Model is not a SentenceTransformer model somehow")

        instructions = [ib.instructions for ib in flattenInstructionBlocks]

        X = self.model.encode(instructions, convert_to_numpy=True)
        y = np.array([[ib.category.value, f'{ib.hash}_{ib.index}'] for ib in flattenInstructionBlocks])

        assert type(X) == np.ndarray
        assert len(X) == len(y), f"X and y have different lengths: {len(X)} != {len(y)}"
        assert len(flattenInstructionBlocks) == len(y), f"flattenInstructionBlocks and y have different lengths: {len(flattenInstructionBlocks)} != {len(y)}"
        assert len(flattenInstructionBlocks) == len(X), f"flattenInstructionBlocks and X have different lengths: {len(flattenInstructionBlocks)} != {len(X)}"

        return X, y

    def _getModelHash(self, dataset: DatasetParser) -> str:
        hash = dataset.getDatasetHash()
        hash.update(self.mode.name.encode())
        return hash.hexdigest()[:16]
    
    # Yes, it is the same as _getModelHash, but it is used for the embedding saving
    def _getEmbeddingHash(self, dataset: DatasetParser) -> str:
        hash = dataset.getDatasetHash()
        hash.update(self.mode.name.encode())
        return hash.hexdigest()[:16]

    def _getModelHashPath(self, hash: str) -> str:
        if not self.saveDb:
            raise ValueError("dbPath is not set")

        assert self.dbPath is not None, "dbPath is not set"

        modelHashFilename = f"{hash}_model.pkl"
        return os.path.join(self.dbPath, modelHashFilename)
    
    def _getEmbeddingHashPath(self, hash: str) -> str:
        if not self.saveDb:
            raise ValueError("dbPath is not set")

        assert self.dbPath is not None, "dbPath is not set"

        embeddingHashFilename = f"{hash}_embedding.pkl"
        return os.path.join(self.dbPath, embeddingHashFilename)

    def _isModelSaved(self, hash: str) -> bool:
        if not self.saveDb:
            raise ValueError("dbPath is not set")
        
        modelHashPath = self._getModelHashPath(hash)
        return os.path.exists(modelHashPath)
    
    def _isEmbeddingSaved(self, hash: str) -> bool:
        if not self.saveDb:
            raise ValueError("dbPath is not set")
        
        embeddingHashPath = self._getEmbeddingHashPath(hash)
        return os.path.exists(embeddingHashPath)

    def _loadModel(self, hash: str):
        if not self.saveDb:
            raise ValueError("dbPath is not set")

        modelHashPath = self._getModelHashPath(hash)

        if not os.path.exists(modelHashPath):
            raise FileNotFoundError(f"Model hash {hash} not found")

        with open(modelHashPath, "rb") as f:
            return pickle.load(f)

    def _loadEmbedding(self, hash: str) -> DatasetParser:
        if not self.saveDb:
            raise ValueError("dbPath is not set")

        embeddingHashPath = self._getEmbeddingHashPath(hash)
        
        if not os.path.exists(embeddingHashPath):
            raise FileNotFoundError(f"Embedding hash {hash} not found")
 
        with open(embeddingHashPath, "rb") as f:
            return pickle.load(f)

    def _saveModel(self, hash: str, model):
        assert self.saveDb, "dbPath is not set"
        assert self.dbPath is not None, "dbPath is not set"

        modelHashPath = self._getModelHashPath(hash)

        if not os.path.exists(self.dbPath):
            os.makedirs(self.dbPath)

        with open(modelHashPath, "wb") as f:
            pickle.dump(model, f)

    def _saveEmbedding(self, hash: str, dataset: DatasetParser):
        assert self.saveDb, "dbPath is not set"
        assert self.dbPath is not None, "dbPath is not set"

        embeddingHashPath = self._getEmbeddingHashPath(hash)

        if not os.path.exists(self.dbPath):
            os.makedirs(self.dbPath)

        with open(embeddingHashPath, "wb") as f:
            pickle.dump(dataset, f)

    def fit(self, dataset: DatasetParser) -> 'DatasetEmbedding':

        modelHash = self._getModelHash(dataset)

        if self.saveDb and self._isModelSaved(modelHash):
            print(f"Loading model from {modelHash}")
            self.model = self._loadModel(modelHash)
        else:
            print(f"Training model for {modelHash}")
            flattenInstructionBlocks = dataset.flatten()
            
            fit_method = getattr(self, DatasetEmbedding.FIT_MODE_MAP[self.mode])
            self.model = fit_method(flattenInstructionBlocks)

            if self.saveDb:
                self._saveModel(modelHash, self.model)

        return self

    def transform(self, dataset: DatasetParser) -> DatasetParser:
        if not self.model:
            raise ValueError("Model is not trained yet")

        embeddingHash = self._getEmbeddingHash(dataset)

        if self.saveDb and self._isEmbeddingSaved(embeddingHash):
            print(f"Loading embedding from {embeddingHash}")
            dataset = self._loadEmbedding(embeddingHash)
            return dataset
        else:
            flattenInstructionBlocks = dataset.flatten()
            transform_method = getattr(self, DatasetEmbedding.TRANSFORM_MODE_MAP[self.mode])
            X, y = transform_method(flattenInstructionBlocks)
            dataset.setIbEmbeddings(X, y)

            if self.saveDb:
                self._saveEmbedding(embeddingHash, dataset)

        return dataset

    def save(self, dataset: DatasetParser, dirPath: str):
        """
        Save the embeddings and labels as a .tsv file
        """
        
        X, y = dataset.getIbEmbeddings(flatten=True)

        if not os.path.exists(dirPath):
            os.makedirs(dirPath)

        with open(os.path.join(dirPath, "vectors.tsv"), "w") as f:
            for x in X:
                f.write("\t".join(map(str, x)) + "\n")

        with open(os.path.join(dirPath, "metadata.tsv"), "w") as f:
            f.write("CATEGORY\tID\n")
            for category, id in y:
                f.write(f"{category}\t{id}\n")


MALICIOUS_LOGFILES_DIR = [
    "/archive/files/eval-phishing-pages/out/phishtank/"
]

OUT_DIR = "/home/joao/my/ita/mestrado/clustering-phishing-kit/utils/out/embeddings-doc2vec"

if __name__ == '__main__':
    dataset = DatasetParser(dbPath='./dpdb/')
    dataset.fit(MALICIOUS_LOGFILES_DIR, WebsiteSample.Category.MALICIOUS)

    def filterOut(ib: DomainInstructionBlock):
        BLACKLISTED_DOMAINS = ["EMPTY", "about:blank", "chrome://headless/headless_command.html", "chrome://headless/headless_command.js", "?"]

        if ib.domain in BLACKLISTED_DOMAINS:
            return True

        return False

    dataset.preprocess(filterOut)

    embedding = DatasetEmbedding(DatasetEmbedding.TransformMode.SBERT, dbPath='./dedb/')
    embedding.fit(dataset)
    dataset = embedding.transform(dataset)
    embedding.save(dataset, OUT_DIR)

