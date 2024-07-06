from gensim.models.doc2vec import Doc2Vec, TaggedDocument
import tqdm

OUTPUT_FILE = '/home/joao/my/ita/mestrado/2-clustering-phishing-kit/utils/output.txt'

# Read the output file
data = set()
labeled_data = []
with open(OUTPUT_FILE, 'r') as f:
    for line in f:
        if line.strip() == '':
            continue
        data.add(line.strip())
        # labeled_data.append(TaggedDocument(words=line.split(), tags=[idx]))

for idx, line in enumerate(data):
    labeled_data.append(TaggedDocument(words=line.split(), tags=[idx]))

print(labeled_data[:5])

# Initialize and train the Doc2Vec model
model = Doc2Vec(vector_size=128, window=10, min_count=1, workers=4, epochs=20, dm=0)
model.build_vocab(labeled_data)
model.train(tqdm.tqdm(labeled_data, total=model.corpus_count, desc="Training"), total_examples=model.corpus_count, epochs=model.epochs)

doc_vectors = [model.dv[idx] for idx in range(len(labeled_data))]

# Create vectors.tsv and metadata.tsv files
with open('vectors.tsv', 'w') as f:
    for vector in doc_vectors:
        f.write('\t'.join([str(x) for x in vector]) + '\n')

with open('metadata.tsv', 'w') as f:
    for idx, tagged_document in enumerate(labeled_data):
        f.write('_'.join(tagged_document.words) + '\n')