import os
from asyncio import sleep
import numpy as np
from typing import Dict, List
from collections import deque

from textual import log, on, work
from textual.app import App, ComposeResult
from textual.containers import Horizontal, VerticalScroll, Vertical
from textual.message import Message
from textual.reactive import reactive
from textual.widget import Widget
from textual.worker import Worker, get_current_worker
from textual.widgets import Header, Footer, LoadingIndicator, OptionList, Static, TextArea, ListView, ListItem, Label, Collapsible, Markdown, Input, Button


DATA_DIR = "/home/favoretti/tests/python/textual/data/malicious/"
SEGMENTS_PATH = "/home/favoretti/tests/python/textual/segments.txt"
METADATA_PATH = "/home/favoretti/tests/python/textual/metadata.tsv"
VECTORS_PATH = "/home/favoretti/tests/python/textual/vectors.tsv"

DIST_DELTA = 1
DIST_MAX = 20

class Segment:
    def __init__(self, idx, vec, insts, label, domain):
        self.idx = idx      # Index of the segment
        self.vec = vec      # Vector of the segment
        self.insts = insts  # Instructions of the segment
        self.label = label
        self.domain = domain

    def set_label(self, label):
        self.label = label

def parser_data(vectors_path:str, metadata_path:str, segments_path:str) -> Dict[str, List[Segment]]:
    # Parsing vectors
    with open(vectors_path, "r") as vectors_file:
        vectors = vectors_file.readlines()

    vectors = [vector.strip().split("\t") for vector in vectors]
    vectors = [np.array([float(x) for x in vector]) for vector in vectors]

    # Parsing Metadata
    with open(metadata_path, "r") as metadata_file:
        metadata = metadata_file.readlines()

    metadata = [meta.strip().split("\t") for meta in metadata][1:]

    # Parsing segments
    with open(segments_path, "r") as segments_file:
        segments = segments_file.readlines()

    # segments = [segment.strip() for segment in segments if not segment.startswith("<<FILEHASH>>") and not segment.startswith("<<DOMAIN>>")]
    new_segments = []
    domain = ""
    segment = ""
    for line in segments:
        if line.startswith("<<DOMAIN>>"):
            if domain:
                segments.append(domain)
            domain = line.split("<<DOMAIN>>")[1].strip()
        elif line.startswith("<<FILEHASH>>"):
            continue
        else:
            segment = line.strip()
            if segment:
                new_segments.append((domain, segment))

    segments = new_segments

    data = dict()

    if len(vectors) != len(metadata) and len(vectors) != len(segments):
        raise ValueError("The number of vectors and metadata do not match")

    for i in range(len(metadata)):
        hash = metadata[i][0].split("_")[0]
        if hash not in data:
            data[hash] = []
        data[hash].append(Segment(
            idx=metadata[i][0].split("_")[1],
            vec=vectors[i] / np.linalg.norm(vectors[i]),
            insts=segments[i][1],
            label=metadata[i][1],
            domain=segments[i][0]
        ))

    return data

def save_metadata():
    with open(METADATA_PATH, "r") as metadata_file:
        metadatas = [meta.strip().split("\t") for meta in metadata_file.readlines()][1:]

    for metadata in metadatas:
        hash = metadata[0].split("_")[0]
        idx = int(metadata[0].split("_")[1])
        label = data[hash][idx].label
        metadata[1] = label

    with open(METADATA_PATH, "w") as metadata_file:
        metadata_file.write("TAG\tLABEL\n")
        for metadata in metadatas:
            metadata_file.write(f"{metadata[0]}\t{metadata[1]}\n")

# def lcs(str1, str2):
#     m = len(str1)
#     n = len(str2)
#     dp = [[0] * (n + 1) for _ in range(m + 1)]
#     for i in range(1, m + 1):
#         for j in range(1, n + 1):
#             if str1[i - 1] == str2[j - 1]:
#                 dp[i][j] = dp[i - 1][j - 1] + 1
#             else:
#                 dp[i][j] = max(dp[i - 1][j], dp[i][j - 1])
#     
#     out = ""
#
#     i = m
#     j = n
#
#     while i > 0 and j > 0:
#         if str1[i - 1] == str2[j - 1]:
#             out += str1[i - 1]
#             i -= 1
#             j -= 1
#         elif dp[i - 1][j] > dp[i][j - 1]:
#             i -= 1
#         else:
#             j -= 1
#
#     return out[::-1]

# def LCSubStr(str1, str2):
#     m = len(str1)
#     n = len(str2)
#     dp = [[0] * (n + 1) for _ in range(m + 1)]
#     max_len = 0
#     ending_index = 0
#     for i in range(1, m + 1):
#         for j in range(1, n + 1):
#             if str1[i - 1] == str2[j - 1]:
#                 dp[i][j] = dp[i - 1][j - 1] + 1
#                 if dp[i][j] > max_len:
#                     max_len = dp[i][j]
#                     ending_index = i
#     return str1[ending_index - max_len: ending_index]

def LCSubStrVec(str1, str2):
    X = str1.split()
    Y = str2.split()
    m = len(X)
    n = len(Y)
    dp = [[0] * (n + 1) for _ in range(m + 1)]
    max_len = 0
    ending_index = 0
    for i in range(1, m + 1):
        for j in range(1, n + 1):
            if X[i - 1] == Y[j - 1]:
                dp[i][j] = dp[i - 1][j - 1] + 1
                if dp[i][j] > max_len:
                    max_len = dp[i][j]
                    ending_index = i
    return " ".join(X[ending_index - max_len: ending_index])


data = parser_data(VECTORS_PATH, METADATA_PATH, SEGMENTS_PATH)


class FileBrowser(OptionList):

    DEFAULT_CSS = """
        FileBrowser {
            height: 1fr;
            width: 30;
        }
    """

    class FileSelected(Message):

        def __init__(self, hash: str) -> None:
            super().__init__()
            self.hash = hash

    @on(OptionList.OptionSelected)
    def handleFileSelected(self, event: OptionList.OptionSelected) -> None:
        hash = self.hashes[event.option_index]
        self.post_message(self.FileSelected(hash))

    def on_mount(self) -> None:
        self.hashes = []

        for hash in data.keys():
            self.hashes.append(hash)

        self.hashes.sort()

        self.add_options(self.hashes)



class SegmentItem(Static):
    
    DEFAULT_CSS = """
        SegmentItem {
            height: auto;
            width: auto;
        }

        SegmentItem Vertical {
            height: auto;
        }
    """
    
    def __init__(self, hash:str, segment:Segment) -> None:
        super().__init__()
        self.hash = hash
        self.segment = segment

    def on_mount(self) -> None:
        self.addClosestSegments()

    @on(Input.Changed)
    def handleLabelInput(self, event: Input.Changed) -> None:
        self.segment.set_label(event.value)

    @work(thread=True, exclusive=True)
    async def addClosestSegments(self) -> None:
        worker = get_current_worker()
        
        closest = []
        for hash, segments in data.items():
            for segment in segments:
                if worker.is_cancelled:
                    return

                dist = np.linalg.norm(self.segment.vec - segment.vec)
                if dist < DIST_DELTA and dist != 0:
                    closest.append((hash, segment, dist))
        closest.sort(key=lambda x: x[2])
        closest = closest[:DIST_MAX]

        if worker.is_cancelled:
            return

        if not closest:
            return

        self.app.call_from_thread(self.mount, Static("Closest segments:"))

        for hash, segment, dist in closest:
            if worker.is_cancelled:
                return

            self.app.call_from_thread(self.mount, Static(f"[@click=select_item('{hash}')]{hash}_{segment.idx}[/] (Label: {segment.label}) - {dist:.2f}"))
            self.app.call_from_thread(self.mount, Static(f"Domain: {segment.domain}"))
            self.app.call_from_thread(self.mount, Static(f"{LCSubStrVec(self.segment.insts, segment.insts)}"))


    def compose(self) -> ComposeResult:
        with Vertical():
            yield Input(self.segment.label, placeholder="Label")
            yield Static("Instructions:")
            yield Static(f"{self.segment.insts}")
            yield Static("Domain:")
            yield Static(f"{self.segment.domain}")
            # if self.closest:
            #     yield Static("Closest segments:")
            #     for hash, segment, dist in self.closest:
            #         yield Static(f"[@click=select_item('{hash}')]{hash}_{segment.idx}[/] (Label: {segment.label}) - {dist:.2f}")
            #         yield Static(f"{lcs(self.segment.insts, segment.insts)}")



class SegmentContainer(VerticalScroll):

    def __init__(self, hash) -> None:
        super().__init__()

        self.hash = hash

    def compose(self) -> ComposeResult:
        segments = data[self.hash]

        for segment in segments:
            yield Collapsible(SegmentItem(self.hash, segment), collapsed=True, title=f"{self.hash}_{segment.idx}")


class FileAnalyser(Widget):
    DEFAULT_CSS = """
        FileAnalyser {
            height: 1fr;
        }
    """

    class BackButtonPressed(Message):
        pass

    def update(self, hash:str) -> None:
        # Update the title with the hash
        self.query(".title").last(Static).update(hash)
        
        if self.query(SegmentContainer):
            self.query_one(SegmentContainer).remove()

        self.query("#back").last(Button).disabled = len(self.app.deque) <= 1
        self.mount(SegmentContainer(hash))

    @on(Button.Pressed, "#back")
    def handleBackButton(self, event: Button.Pressed) -> None:
        self.app.deque.pop()
        self.update(self.app.deque[-1])

    def compose(self) -> ComposeResult:
        yield Button("<", id="back", disabled=True)
        yield Button("Save", id="save")
        yield Static("File Analyser", classes="title")


class ValidationApp(App):
  
    TITLE = "Validation App"
    CSS_PATH = "test.tcss"

    current_hash = None
    deque = reactive(deque())

    @on(FileBrowser.FileSelected)
    def handleFileSelected(self, event: FileBrowser.FileSelected) -> None:
        hash = event.hash
        self.deque.clear()
        self.deque.append(hash)
        self.query_one(FileAnalyser).update(hash)
        return

    @on(Button.Pressed, "#save")
    def handleSave(self, event: Button.Pressed) -> None:
        save_metadata()

    def action_select_item(self, hash:str) -> None:
        self.deque.append(hash)
        self.query_one(FileAnalyser).update(hash)

    def compose(self) -> ComposeResult:
        with Horizontal():
            yield FileBrowser()
            yield FileAnalyser()
        yield Header()
        yield Footer()


if __name__ == "__main__":
    app = ValidationApp()
    app.run()

