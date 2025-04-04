from textual import log, on, work, events
from textual.app import App, ComposeResult
from textual.containers import Horizontal, VerticalScroll, Vertical
from textual.message import Message
from textual.reactive import reactive
from textual.screen import Screen
from textual.widget import Widget
from textual.worker import Worker, get_current_worker
from textual.widgets import Header, Footer, LoadingIndicator, OptionList, Static, TextArea, ListView, ListItem, Label, Collapsible, Markdown, Input, Button, DirectoryTree, Tabs, TabbedContent, TabPane

from sample_parser import SampleParser

from typing import List
import hashlib

class SampleDisplayScreen(Screen):
    BINDINGS = [
            ("q", "quit", "Quit Inspection"),
            ("n", "next", "Next Occurence"),
    ]

    class Quit(Message):
        def __init__(self) -> None:
            super().__init__()

    def __init__(self, sample: SampleParser) -> None:
        super().__init__()
        self.sample = sample

    def searchText(self, text: str) -> None:
        id = self.query_one(TabbedContent).active
        textArea = self.query_one(f"#{id}", TabPane).query_one(TextArea)
        cursorRow, cursorCol = textArea.cursor_location
        textAreaContent = textArea.text
        textAreaContent = textAreaContent.split("\n")
        # Find the next occurence of the text
        for i in range(cursorRow + 1, len(textAreaContent)):
            idx = textAreaContent[i].find(text)
            if idx != -1:
                # Move the cursor to the next occurence
                textArea.move_cursor((i, idx), center=True)
                break
        else:
            # If not found, move the cursor to the first occurence
            for i in range(0, cursorRow):
                if textAreaContent[i].find(text) != -1:
                    # Move the cursor to the next occurence
                    textArea.move_cursor((i, textAreaContent[i].find(text)), center=True)
                    break

    def action_next(self) -> None:
        id = self.query_one(TabbedContent).active
        input = self.query_one(f"#{id}", TabPane).query_one(Input)
        text = input.value
        self.searchText(text)


    def compose(self) -> ComposeResult:
        """Compose app with tabbed content."""
        # Footer to show keys
        yield Footer()

        with TabbedContent():
            for i, log in enumerate(sorted(self.sample.logs, key=lambda log: log.name)):
                with TabPane(log.name):
                    yield Input(placeholder="Search", id=f"search-{i}")
                    yield TextArea.code_editor("\n".join(log.extract_instruction_sequence()), read_only=True, id=f"log-{i}")

    def action_quit(self) -> None:
        self.post_message(SampleDisplayScreen.Quit())
