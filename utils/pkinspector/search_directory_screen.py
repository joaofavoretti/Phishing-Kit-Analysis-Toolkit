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

DEFAULT_DIRECTORIES = [
    '/archive/files/phishunt-phishing-kits/',
    '/home/joao/my/repos/zphisher/zphisher-phishing-kits/',
]

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
            self.post_message(self.DirectorySelected(path))

    @on(OptionList.OptionSelected)
    def handleOptionSelected(self, event: OptionList.OptionSelected) -> None:
        index = event.option_index
        option_list = event.option_list
        option = option_list.get_option_at_index(index)
        path = str(option.prompt)
        self.post_message(self.DirectorySelected(path))

    def compose(self) -> ComposeResult:
        yield Input(placeholder="Enter base directory")
        yield OptionList(*DEFAULT_DIRECTORIES)

