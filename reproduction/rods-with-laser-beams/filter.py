import os
import sys

FILEPATH = './fingerprintjs-demo-sequence.txt'
OUTPATH = './fingerprintjs-demo-sequence-f.txt'

if __name__ == '__main__':
    
    with open(FILEPATH, 'r') as f:
        lines = [line.strip() for line in f.readlines()]

    new_lines = []

    for line in lines:
        f_line = line

        if f_line.startswith('SET-'):
            f_line = f_line.split('=')[0]

        if f_line.startswith('CALL-'):
            method = f_line.split('(')[0].split('-')[1]
            if f'GET-{method}' in new_lines:
                new_lines.remove(f'GET-{method}')

        if f_line in new_lines:
            continue

        new_lines.append(f_line)

    with open(OUTPATH, 'w') as f:
        for line in new_lines:
            f.write(line + '\n')
    

