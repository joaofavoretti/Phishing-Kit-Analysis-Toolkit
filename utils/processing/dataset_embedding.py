
from gensim.models.doc2vec import Doc2Vec, TaggedDocument
from sentence_transformers import SentenceTransformer
from log_parser import DomainInstructionBlock
from typing import List
from enum import Enum
import numpy as np
import os
from dataset_parser import WebsiteSample, DatasetParser, FlattenInstructionBlock


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

    def __init__(self, mode: TransformMode, flatten: bool = False):
        """
        :param mode: The mode to transform the data. It can be either "doc2vec" or "sbert"
        :param flatten: If true, then each instruction block will be represented as a single vector.
            If false, each website sample will be represented by a matrix (n_instruction_blocks, n_features)
        """

        self.mode = mode
        self.flatten = flatten

    def _doc2vec_fit(self, flattenInstructionBlocks: List[FlattenInstructionBlock]) -> Doc2Vec:
        data = [TaggedDocument(words=ib.instructions.split(), tags=[ib.hash, ib.index, ib.category.name]) for ib in flattenInstructionBlocks]
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

        return X, y
            
    def fit(self, dataset: DatasetParser) -> 'DatasetEmbedding':
        flattenInstructionBlocks = dataset.flatten()
        
        fit_method = getattr(self, DatasetEmbedding.FIT_MODE_MAP[self.mode])
        self.model = fit_method(flattenInstructionBlocks)

        return self

    def transform(self, dataset: DatasetParser) -> tuple[np.ndarray|list, np.ndarray]:
        if not self.model:
            raise ValueError("Model is not trained yet")

        flattenInstructionBlocks = dataset.flatten()

        transform_method = getattr(self, DatasetEmbedding.TRANSFORM_MODE_MAP[self.mode])
        X, y = transform_method(flattenInstructionBlocks)

        if not self.flatten:
            X, y = dataset.unflatten(X, y)

        return X, y

    def save(self, X: np.ndarray, y: np.ndarray, dirPath: str):
        """
        Save the embeddings and labels as a .tsv file
        """

        if not self.flatten:
            raise ValueError("Cannot save unflattened vector saving")

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
    "/archive/files/eval-phishing-pages/out/tmp-phishtank/"
]

OUT_DIR = "/home/joao/my/ita/mestrado/2-clustering-phishing-kit/utils/out/embeddings-doc2vec"

if __name__ == '__main__':
    dataset = DatasetParser().fit(MALICIOUS_LOGFILES_DIR, WebsiteSample.Category.MALICIOUS)

    def filterOut(ib: DomainInstructionBlock):
        BLACKLISTED_DOMAINS = ["EMPTY", "about:blank", "chrome://headless/headless_command.html", "chrome://headless/headless_command.js", "?"]

        if ib.domain in BLACKLISTED_DOMAINS:
            return True

        return False

    dataset.preprocess(filterOut)

    embedding = DatasetEmbedding(DatasetEmbedding.TransformMode.DOC2VEC, flatten=True)
    embedding.fit(dataset)

    X, y = embedding.transform(dataset)

    assert type(X) == np.ndarray
    embedding.save(X, y, OUT_DIR)

