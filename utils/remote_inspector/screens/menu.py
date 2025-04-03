from textual import log, on, work
from textual.app import App, ComposeResult
from textual.containers import Horizontal, VerticalScroll, Vertical, Container, VerticalGroup, Center
from textual.message import Message
from textual.reactive import reactive
from textual.screen import Screen
from textual.widget import Widget
from textual.worker import Worker, get_current_worker
from textual.widgets import Header, Footer, LoadingIndicator, OptionList, Static, TextArea, ListView, ListItem, Label, Collapsible, Markdown, Input, Button, DirectoryTree

class MenuScreen(Screen):
    DEFAULT_CSS = """
    MenuScreen {
        align: center middle;
    }

    Input {
        max-width: 40;
        margin-bottom: 1;
    }
    """

    class Search(Message):
        def __init__(self, directory: str, sample_name: str):
            super().__init__()
            self.directory = directory
            self.sample_name = sample_name

    @on(Button.Pressed)
    def handleButtonPressed(self, message: Button.Pressed) -> None:
        directory = self.query_one("#directory", Input).value
        name = self.query_one("#name", Input).value
        self.post_message(MenuScreen.Search(directory, name))

    def compose(self) -> ComposeResult:
        yield Header()
        yield Footer()
        with Center():
            yield Input(value="2024-09-25-11-phishstats", id="directory", placeholder="Directory")
            yield Input(value="033227850ebde674", id="name", placeholder="Sample Name")
            yield Button(label="Inspect")
