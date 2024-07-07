from log_parser import LogParser
import os

# The idea of this class is to receive a zip sample file and extract log information about it
# With some luck, it will no longer be needed to use the for_each_sample method in the LogParser module
class SampleParser:

    def __init__(self, filename):
        self.filename = filename

        if not self._valid_filename(filename):
            raise ValueError(f"File {self.filename} does not exist or is not a log file")

    def _valid_filename(self, filename):
        return filename.endswith('.zip') and os.path.exists(filename)

if __name__ == '__main__':
