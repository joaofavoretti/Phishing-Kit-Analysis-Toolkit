import psutil
import time

def monitor_memory():
    max_memory_usage = 0

    input()
    try:
        while True:
            total_memory_usage = 0

            for process in psutil.process_iter(['name', 'memory_percent']):
                if process.status() == psutil.STATUS_ZOMBIE:
                    continue

                cmd = process.cmdline()
                if 'python3' in cmd and 'clusterizer.py' in cmd:
                    total_memory_usage += process.info['memory_percent']

            if total_memory_usage > max_memory_usage:
                max_memory_usage = total_memory_usage

            print(f"Max memory usage: {max_memory_usage:.2f}% | Current memory usage: {total_memory_usage:.2f}%", end='                 \r')

    except KeyboardInterrupt:
        print()
        print(f"Maximum memory usage: {max_memory_usage:.2f}%")

if __name__ == "__main__":
    monitor_memory()
