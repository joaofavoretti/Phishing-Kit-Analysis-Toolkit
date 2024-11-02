from textual import log, on, work
from textual.app import App, ComposeResult
from textual.containers import Horizontal, VerticalScroll, Vertical
from textual.message import Message
from textual.reactive import reactive
from textual.widget import Widget
from textual.worker import Worker, get_current_worker
from textual.widgets import Header, Footer, LoadingIndicator, OptionList, Static, TextArea, ListView, ListItem, Label, Collapsible, Markdown, Input, Button, DirectoryTree

from search_directory_screen import SearchDirectoryScreen
from phishing_kits_screen import PhishingKitsScreen

DEFAULT_DIRECTORY = '/archive/files/phishing-kits/'

class InspectorApp(App):
    TITLE = "Phishing Kit Inspector"
    CSS_PATH = "inspector.tcss"

    def on_mount(self) -> None:
        # self.push_screen(SearchDirectoryScreen())
        self.push_screen(PhishingKitsScreen(DEFAULT_DIRECTORY))

    @on(SearchDirectoryScreen.DirectorySelected)
    def handleDirectorySelected(self, event: SearchDirectoryScreen.DirectorySelected) -> None:
        directory = event.path
        self.pop_screen()
        self.push_screen(PhishingKitsScreen(directory))

    def compose(self) -> ComposeResult:
        yield Static()

if __name__ == "__main__":
    app = InspectorApp()
    app.run()

