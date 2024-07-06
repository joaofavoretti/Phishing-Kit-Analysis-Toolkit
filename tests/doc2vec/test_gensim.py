from gensim.models.doc2vec import Doc2Vec, TaggedDocument

# Sample labeled data (replace with your own dataset)
labeled_data = [
    TaggedDocument(words=['document', 'text', 'goes', 'here'], tags=[0]),
    TaggedDocument(words=['another', 'document', 'for', 'classification'], tags=[1]),
    # Add more tagged documents with labels...
]

print(labeled_data)

# Initialize and train the Doc2Vec model
model = Doc2Vec(vector_size=100, window=5, min_count=1, workers=4, epochs=10)
model.build_vocab(labeled_data)
model.train(labeled_data, total_examples=model.corpus_count, epochs=model.epochs)

doc_vectors = [model.dv[idx] for idx in range(len(labeled_data))]

print(doc_vectors)