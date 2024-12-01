import os
import re
import sys
import argparse
import subprocess

PK_DIRS = '/archive/files/phishunt-phishing-kits/'

DEFAULT_STRUCTURE = {
    "name": "*",
    "dirs": [
    ],
    "files": [
        "geoplugin.class.php",
    ]
}

def find_dir_structure(dir_structure):
    print(f"Searching for directories matching the specified structure in {PK_DIRS}")
    found_kits = []

    for dir_name in sorted(os.listdir(PK_DIRS)):
        print(f"\"{dir_name}\",", end='   \r')
        dir_path = os.path.join(PK_DIRS, dir_name)
        
        if os.path.isdir(dir_path):
            for root, _, _ in os.walk(dir_path):
                if match_structure(root, dir_structure):
                    print()
                    found_kits.append(dir_name)
                    break
        
    return found_kits

def match_structure(current_path, structure):
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

def find_string():
    """
        Use more optimal `find`, `grep` and `awk` commands to search for a string in a directory
        If the string is found, return the directory name
    """
    print("Input your search string")
    string = sys.stdin.read()
    print()
    print("====")
    print("\\n".join(string.replace("\"", "\\\"").split('\n')))

    # print(f"Searching for string '{string}' in phishing kits")
    found_kits = []

    # Escape special characters
    # string = re.escape(string)

    # string = string.replace('\n', r'.*(\n).*')
    string = r'.*(\n).*'.join([re.escape(line.strip()) for line in string.split('\n')])

    string = string.replace('_', r'\_')
    string = string.replace('"', r'\"')
    string = string.replace(r'\$', r'\\\$')

    print("====")
    print(string)
    
    cmd = f"find {PK_DIRS} -type f -exec pcre2grep -l -M \"{string}\" {{}} + | awk -F'/' '{{print $5}}' | sort | uniq"
    result = subprocess.run(cmd, shell=True, capture_output=True, text=True)
    if result.stdout:
        found_kits = result.stdout.strip().split('\n')
        for kit in found_kits:
            print(f"\"{kit}\",")

    return found_kits

if __name__ == '__main__':
    parser = argparse.ArgumentParser(description='Search for phishing kits in a directory')
    parser.add_argument('--string', '-s', action='store_true', help='String to search for')
    parser.add_argument('--dir', '-d', action='store_true', help='Search for phishing kits with default structure')

    args = parser.parse_args()

    if args.string:
        find_string()

    if args.dir:
        find_dir_structure(DEFAULT_STRUCTURE)



