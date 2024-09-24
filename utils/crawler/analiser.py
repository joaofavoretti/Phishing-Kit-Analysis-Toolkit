from python_on_whales import docker
from python_on_whales.components.container.cli_wrapper import ValidContainer
from python_on_whales.exceptions import DockerException
from typing import cast
from itertools import repeat
import argparse
import multiprocessing
import concurrent.futures
import logging
import os
import hashlib

DEFAULT_BATCH_SIZE = 10

def analyze_urls(urls: list, output_dir: str):
    try:
        p = docker.run(
            "visiblev8/vv8-base:latest",
            tty=True,
            interactive=True,
            detach=True,
            workdir="/home/node",
            entrypoint="/bin/bash",
        )
    except DockerException as e:
        logging.error(f"Error while starting VV8 container: {e}")
        return

    p = cast(ValidContainer, p)

    for url in urls:
        logging.info(f"Scanning URL: \"{url}\"")

        url_hash = hashlib.sha256(url.encode()).hexdigest()
        directory_name = url_hash[:16]

        if os.path.exists(f"{output_dir}/{directory_name}.tar.gz"):
            logging.info(f"URL \"{url}\" already scanned")
            continue
        
        docker.execute(p, f"mkdir -p /home/node/files".split(" "), workdir="/home/node")
        try:
           docker.execute(
                cast(ValidContainer, p),
                f"timeout --preserve-status 10s /opt/chromium.org/chromium/chrome --no-sandbox --headless --screenshot --user-data-dir=/tmp --disable-dev-shm-usage {url}".split(" "),
                workdir="/home/node/files")
        except DockerException as e:
            logging.error(f"Error while running VV8: {e}")

        docker.execute(p, f"tar -czf {directory_name}.tar.gz files/".split(" "), workdir="/home/node")

        docker.execute(p, f"rm -rf files".split(" "), workdir="/home/node")

        docker.copy((p, f"/home/node/{directory_name}.tar.gz"), f"{output_dir}/{directory_name}.tar.gz")

        # Save the sources of the webpage
        if not os.path.exists(f"{output_dir}/{directory_name}"):
            os.makedirs(f"{output_dir}/{directory_name}")

        os.system(f"tar -xzf {output_dir}/{directory_name}.tar.gz -C {output_dir}/{directory_name}")

        os.system(f"timeout 30s python3 resources_saver.py -u \"{url}\" -o {output_dir}/{directory_name}")

        os.remove(f"{output_dir}/{directory_name}.tar.gz")

        os.system(f"tar -czf {output_dir}/{directory_name}.tar.gz -C {output_dir} {directory_name}")

        os.system(f"rm -rf {output_dir}/{directory_name}")

        logging.info(f"Finished scanning URL: \"{url}\"")

    docker.kill(p)

def main():
    parser = argparse.ArgumentParser(description='Batch VisibleV8 analysis of multiple files')
    parser.add_argument('--file', '-f', type=str, help='Text files with URLs to', required=True)
    parser.add_argument('--output', '-o', type=str, help='Output directory', required=True)
    parser.add_argument('--batch_size', '-s', type=int, help='Batch size', default=DEFAULT_BATCH_SIZE)
    parser.add_argument('--parallel', '-p', action='store_true', help='Run in parallel')
    args = parser.parse_args()

    url_file = args.file
    if not os.path.exists(url_file):
        raise FileNotFoundError(f"File {url_file} not found")

    output_dir = args.output
    if not os.path.exists(output_dir):
        os.makedirs(output_dir)

    batch_size = args.batch_size

    urls = [url.strip() for url in open(url_file, "r").readlines()]
    urls_len = len(urls)

    if args.parallel:
        print('Asdff', flush=True)
        batches = [urls[i:i+batch_size] for i in range(0, urls_len, batch_size)]
        with concurrent.futures.ProcessPoolExecutor(multiprocessing.cpu_count()) as executor:
            executor.map(analyze_urls, batches, repeat(output_dir))
    else:
        for i in range(0, urls_len, batch_size):
            batch_urls = urls[i:i+batch_size]
            batch_urls_len = len(batch_urls)

            logging.info(f"Batch {i//batch_size + 1}/{urls_len//batch_size + 1} with {batch_urls_len} URLs")

            analyze_urls(batch_urls, output_dir)

    return

if __name__ == '__main__': 
    logging.basicConfig(
        level=logging.DEBUG,
        format='(%(asctime)s) [%(levelname)s] %(message)s',
        filename="analiser.log"
    )

    main()
