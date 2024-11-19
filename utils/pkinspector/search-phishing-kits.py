import os
import sys
import shutil
import argparse
import subprocess
import re

PK_DIRS = '/archive/files/phishunt-phishing-kits/'

def find_string(string):
    """
        Use more optimal `find`, `grep` and `awk` commands to search for a string in a directory
        If the string is found, return the directory name
    """
    print(f"Searching for string '{string}' in phishing kits")
    found_kits = []

    # string = re.escape(string)
    # string = string.replace('\\', '\\\\')
    # print(string)
    # string = string.replace('\"', '\\\"')
    string = string.replace('$', '\$')
    string = string.replace('"', '\\"')

    cmd = f"find {PK_DIRS} -type f -exec grep -l \"{string}\" {{}} + | awk -F'/' '{{print $5}}' | sort | uniq"
    result = subprocess.run(cmd, shell=True, capture_output=True, text=True)
    if result.stdout:
        found_kits = result.stdout.strip().split('\n')
        for kit in found_kits:
            print(f"\"{kit}\",")

    return found_kits

if __name__ == '__main__':
    parser = argparse.ArgumentParser(description='Search for phishing kits in a directory')
    parser.add_argument('--string', '-s', type=str, help='String to search for')

    args = parser.parse_args()

    if args.string:
        kits = find_string(args.string)
        # if kits:
        #     print(f"Found {len(kits)} kits containing the string '{args.string}'")
        #     for kit in kits:
        #         print(kit)
        # else:
        #     print("No kits found")
