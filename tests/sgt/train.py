from sgt import SGT
import pandas as pd
import pickle

SENTENCES_FPATH = './instruction_sentences.txt'

def export_fpath(fpath) -> pd.DataFrame:
    with open(fpath, 'r') as f:
        sentences = f.readlines()

    # Create a list with the split sentences
    sentences = [[idx, s.strip().split()] for idx, s in enumerate(sentences)]
    
    # Create a df with the split sentences and indexes
    df = pd.DataFrame(sentences, columns=['id', 'sequence'])

    return df

df = export_fpath(SENTENCES_FPATH)

sgt = SGT(kappa=1,
            flatten=True,
            lengthsensitive=False,
            mode='multiprocessing')
sgt.fit_transform(df[:400])

with open('sgt_model.pkl', 'wb') as f:
    pickle.dump(sgt, f)
    
