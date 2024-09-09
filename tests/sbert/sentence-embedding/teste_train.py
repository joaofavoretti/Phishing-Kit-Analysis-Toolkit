# Train the model with a sentence dataset that has no label
# The model will learn the embeddings of the sentences

from datasets import load_dataset
from sentence_transformers import SentenceTransformer
from sentence_transformers.losses import CosineSimilarityLoss

sentences = [
    "I love my dog",
    "I love my cat",
    "You love my dog!",
]


