from log_parser import LogParser, for_each_log_file
from operator import itemgetter
import numpy as np
import array
from scipy.sparse import csr_matrix
from collections import defaultdict
import pickle
import csv

# WORDLIST_DIR = "/home/joao/my/ita/mestrado/eval-phishing-pages/wordlists"
MALICIOUS_LOGFILES_DIR = [
        "/home/joao/my/ita/mestrado/eval-phishing-pages/out/phishtank",
        "/home/joao/my/ita/mestrado/eval-phishing-pages/out/openphish",
        "/home/joao/my/ita/mestrado/eval-phishing-pages/out/phishstats"
]
BENIGN_LOGFILES_DIR = ["/home/joao/my/ita/mestrado/eval-phishing-pages/out/commoncrawl"]

files = [
    './samples/sample.log',
    '/home/joao/my/ita/mestrado/eval-phishing-pages/out/phishtank/a25ba87a441479ee/files/vv8-1713318667407-677-677-chrome.0.log',
    '/home/joao/my/ita/mestrado/eval-phishing-pages/out/phishtank/06f62d9a81516bbe/files/vv8-1713316948076-339-339-chrome.0.log',
    '/home/joao/my/ita/mestrado/eval-phishing-pages/out/phishtank/3e471fddc64ef712/files/vv8-1713317004474-582-582-chrome.0.log'
]

# See how sklearn implement the CountVectorizer (line 1287)
# https://github.com/scikit-learn/scikit-learn/blob/872124551/sklearn/feature_extraction/text.py#L929
class CountVectorizer:
    """
        Operates a little different than the regular CountVectorizer
        Due to the fact that the input would be very big lists. We are now
            considering the raw_documents as features counts for each document
    """

    def __init__(self):
        self.vocabulary_ = None
    
    def _make_int_array(self):
        return array.array(str("i"))

    def _count_vocab(self, raw_feature_counters: list[dict]):
        """
            Count the number of occurrences of each word in the documents
        """
        j_indices = []
        indptr = [0]
        values = self._make_int_array()

        # This is too advanced python for my own taste. Great stuff
        vocabulary = defaultdict()
        vocabulary.default_factory = vocabulary.__len__

        for raw_feature_counter in raw_feature_counters:
            feature_counter = {}
            for feature, count in raw_feature_counter.items():
                feature_idx = vocabulary[feature]
                if feature_idx not in feature_counter:
                    feature_counter[feature_idx] = 0
                feature_counter[feature_idx] += count

            j_indices.extend(feature_counter.keys())
            values.extend(feature_counter.values())
            indptr.append(len(j_indices))

        vocabulary = dict(vocabulary)

        j_indices = np.asarray(j_indices, dtype=np.int64)
        indptr = np.asarray(indptr, dtype=np.int64)
        values = np.frombuffer(values, dtype=np.intc)

        X = csr_matrix(
            (values, j_indices, indptr),
            shape=(len(indptr) - 1, len(vocabulary)),
            dtype=int,
        )

        X.sort_indices()

        return vocabulary, X

    def get_feature_names_out(self):
        return np.asarray([t for t, i in sorted(self.vocabulary_.items(), key=itemgetter(1))])

    def fit_transform(self, raw_documents):
        """
            Fit the vocabulary and return the sparse matrix
        """
        self.vocabulary_, X = self._count_vocab(raw_documents)
        return X

def main():
    props_list:list[dict] = list()

    def parse_properties(filepath, filehash):
        logparser = LogParser(filepath)

        property_count = logparser.extract_property_count()
        if "Performance.now" in property_count:
            print(property_count["Performance.now"])

        props_list.append(property_count)

    for_each_log_file(MALICIOUS_LOGFILES_DIR[2], parse_properties)()

    cv = CountVectorizer()
    X = cv.fit_transform(props_list)

    # Save the CountVectorizer object and the sparse matrix into binary file
    with open('cv.pkl', 'wb') as f:
        pickle.dump(cv, f)

    with open('X.pkl', 'wb') as f:
        pickle.dump(X, f)

    # Save the sparse matrix into a CSV file, with the labels from cv.vocabulary_
    with open('X.csv', 'w') as f:
        writer = csv.writer(f)
        writer.writerow(cv.vocabulary_.keys())
        for row in X:
            writer.writerow(row.toarray()[0])


if __name__ == "__main__":
    main()

