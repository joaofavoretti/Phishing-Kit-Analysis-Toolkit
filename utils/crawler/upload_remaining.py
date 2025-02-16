import sys
import shutil
import os

remaining_list = [
    "2024-10-13-17-phishstats",
    "2024-10-14-19-phishstats",
    "2024-10-24-20-phishstats"
]

DIR = '/home/joaof/files/phishing-logs'

for remaining in remaining_list:
    ret = os.system(f'python3 uploader.py -d {os.path.join(DIR, remaining)}')
    if ret != 0:
        print(f"Error uploading {remaining}")
        sys.exit(1)
    shutil.rmtree(os.path.join(DIR, remaining))