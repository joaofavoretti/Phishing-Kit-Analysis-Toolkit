import os
import sys
import shutil
import argparse
import subprocess
import re

PK_DIRS = '/archive/files/phishunt-phishing-kits/'

"""
DEFAULT_STRUCTURE

The root project is specified as follows:

Name can be anything
Needs to have two directories: style and system
Needs to have an index.php file

Can have more files and directories
"""
DEFAULT_STRUCTURE = {
    "name": "*",
    "dirs": [
        {
            "name": "*",
            "dirs": [
                {
                    "name": "style",
                },
                {
                    "name": "system",
                },
            ],
        }
    ],
    "files": [
        "index.php",
    ],
}

def find_dir_structure(dir_structure):
    print(f"Searching for directories matching the specified structure in {PK_DIRS}")
    found_kits = []

    for dir_name in sorted(os.listdir(PK_DIRS)):
        print(f"\"{dir_name}\",", end='   \r')
        dir_path = os.path.join(PK_DIRS, dir_name)
        if os.path.isdir(dir_path):
            if match_structure(dir_path, dir_structure):
                print()
                found_kits.append(dir_name)

    return found_kits

def match_structure(current_path, structure):
    # print(f"Checking {current_path}")
    # print(structure)

    # If 'name' is specified and not '*', check that the directory name matches
    expected_name = structure.get('name', '*')
    if expected_name != '*':
        if os.path.basename(current_path) != expected_name:
            # print(f"Expected name {expected_name} but got {os.path.basename(current_path)}")
            return False

    # Check for required files in the current directory
    for file_name in structure.get('files', []):
        file_path = os.path.join(current_path, file_name)
        if not os.path.isfile(file_path):
            return False

    # Check for required directories
    for dir_struct in structure.get('dirs', []):
        dir_name = dir_struct.get('name', '*')
        if dir_name == '*':
            # Match any subdirectory that fits the substructure
            sub_dirs = [d for d in os.listdir(current_path) if os.path.isdir(os.path.join(current_path, d))]
            matched = False
            for sub_dir in sub_dirs:
                sub_dir_path = os.path.join(current_path, sub_dir)
                if match_structure(sub_dir_path, dir_struct):
                    matched = True
                    break
            if not matched:
                return False
        else:
            dir_path = os.path.join(current_path, dir_name)
            if not os.path.isdir(dir_path):
                return False
            if not match_structure(dir_path, dir_struct):
                return False

    return True

def find_string(string):
    """
        Use more optimal `find`, `grep` and `awk` commands to search for a string in a directory
        If the string is found, return the directory name
    """
    print(f"Searching for string '{string}' in phishing kits")
    found_kits = []

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
    parser.add_argument('--dir', '-d', action='store_true', help='Search for phishing kits with default structure')

    args = parser.parse_args()

    if args.string:
        find_string(args.string)

    if args.dir:
        find_dir_structure(DEFAULT_STRUCTURE)



