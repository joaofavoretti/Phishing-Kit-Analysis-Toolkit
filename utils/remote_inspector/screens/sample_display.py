
from textual import log, on, work
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
    ]

    class Quit(Message):
        def __init__(self) -> None:
            super().__init__()

    def __init__(self, sample: SampleParser) -> None:
        super().__init__()
        self.sample = sample

    @on(Input.Changed)
    def handleInputChanged(self, message: Input.Changed) -> None:
        id = message.input.id.split("-")[1]
        textArea = self.query_one(f"#log-{id}", TextArea)
        currentCursor = textArea.cursor_location
        textArea.move_cursor((50, currentCursor[1]), center=True)

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
