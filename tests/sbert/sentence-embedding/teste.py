from sentence_transformers import SentenceTransformer

model = SentenceTransformer("all-MiniLM-L6-v2")

sentences = [
        "I ate dinner.",
        "We had a three-course meal.",
        "Brad came to dinner with us.",
        "He loves fish tacos.",
        "In the end, we all felt like we ate too much.",
        "We all agreed; it was a magnificent evening."
    ]

sentence_embeddings = model.encode(sentences)
print(sentence_embeddings.shape)
print(sentence_embeddings)

sentence_similarities = model.similarity(sentence_embeddings, sentence_embeddings)
print(sentence_similarities)

