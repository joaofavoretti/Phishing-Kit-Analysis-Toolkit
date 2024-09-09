import sys
import os
import shutil

if __name__ == '__main__':
    vocabulary = set()
    with open('instruction_sentences.txt', 'r') as f:
        for line in f:
            for word in line.split():
                vocabulary.add(word)

    vocabulary = sorted(list(vocabulary))
    with open('vocabulary.txt', 'w') as f:
        for word in vocabulary:
            f.write(word + '\n')
