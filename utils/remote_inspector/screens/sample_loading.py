from textual import log, on, work
from textual.app import App, ComposeResult
from textual.containers import Horizontal, VerticalScroll, Vertical
from textual.message import Message
from textual.reactive import reactive
from textual.screen import Screen
from textual.widget import Widget
from textual.worker import Worker, get_current_worker
from textual.widgets import Header, Footer, LoadingIndicator, OptionList, Static, TextArea, ListView, ListItem, Label, Collapsible, Markdown, Input, Button, DirectoryTree

from sample_parser import SampleParser
from gdrive_sync import GDriveSync

import os
import time
import shutil
import asyncio

DEFAULT_DESTINATION = "/archive/tmp/remote_parser/"

class SampleLoadingScreen(Screen):
    DEFAULT_CSS = """
    SampleLoadingScreen {
        align: center middle;
    }
    """

    class Loaded(Message):
        def __init__(self, sample: SampleParser) -> None:
            super().__init__()
            self.sample = sample 

    def __init__(self, directory: str, sampleName: str) -> None:
        super().__init__()
        self.directory = directory
        self.sampleName = sampleName

    @work(exclusive=True, thread=True)
    def loadSample(self) -> None:
        log.info("Starting to load the sample")
        
        try:
            GDriveSync().downloadSample(self.directory, self.sampleName, destination=DEFAULT_DESTINATION)
        except ValueError as e:
            log.info(f"Error loading the sample: {e}")
            return
  
        sampleFilename = None
        for file in os.listdir(DEFAULT_DESTINATION):
            if file.startswith(self.sampleName):
                sampleFilename = file
                break

        if sampleFilename is not None:
            samplePath = os.path.join(DEFAULT_DESTINATION, sampleFilename)
            sample = SampleParser(samplePath)
            os.remove(samplePath)
            self.post_message(SampleLoadingScreen.Loaded(sample))
            log.info(f"Sample {sample.name} loaded")

        log.info("Finished loading the sample")

    def on_mount(self) -> None:
        self.loadSample()

    def compose(self) -> ComposeResult:
        yield Header()
        yield Footer()
        yield LoadingIndicator()
