from textual import log, on, work, events
from textual.app import App, ComposeResult
from textual.containers import Horizontal, VerticalScroll, Vertical
from textual.message import Message
from textual.reactive import reactive
from textual.screen import Screen
from textual.widget import Widget
from textual.worker import Worker, get_current_worker
from textual.widgets import Header, Footer, LoadingIndicator, OptionList, Static, TextArea, ListView, ListItem, Label, Collapsible, Markdown, Input, Button, DirectoryTree

import os

class SearchDirectoryScreen(Screen):
    
    class DirectorySelected(Message):
        def __init__(self, path: str):
            super().__init__()
            self.path = path

    def __init__(self, **kwargs):
        super().__init__(**kwargs)

    @on(Input.Submitted)
    def handleInputSubmitted(self, event: Input.Submitted) -> None:
        path = event.value
        if os.path.isdir(path):
            log.info(f"Directory selected: {path}")
            self.post_message(self.DirectorySelected(path))

    def compose(self) -> ComposeResult:
        yield Input(placeholder="Enter base directory")

