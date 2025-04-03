from textual import log, on, work
from textual.app import App, ComposeResult
from textual.containers import Horizontal, VerticalScroll, Vertical
from textual.message import Message
from textual.reactive import reactive
from textual.widget import Widget
from textual.worker import Worker, get_current_worker
from textual.widgets import Header, Footer, LoadingIndicator, OptionList, Static, TextArea, ListView, ListItem, Label, Collapsible, Markdown, Input, Button, DirectoryTree

from screens.menu import MenuScreen
from screens.sample_loading import SampleLoadingScreen
from screens.sample_display import SampleDisplayScreen

class RemoteInspector(App):
    TITLE = "Remote Inspector"

    def on_mount(self) -> None:
        self.theme = "gruvbox"
        self.push_screen(MenuScreen())

    @on(SampleDisplayScreen.Quit)
    def handleQuit(self, message: SampleDisplayScreen.Quit) -> None:
        self.pop_screen()
        self.push_screen(MenuScreen())

    @on(SampleLoadingScreen.Loaded)
    def handleSampleLoaded(self, message: SampleLoadingScreen.Loaded) -> None:
        log.info(f"Sample Loaded: {message.sample.name}")
        self.pop_screen()
        self.push_screen(SampleDisplayScreen(message.sample))
        
    @on(MenuScreen.Search)
    def handleSearchSample(self, message: MenuScreen.Search) -> None:
        log.info(f"Search Sample: {message.directory} {message.sample_name}")
        self.push_screen(SampleLoadingScreen(message.directory, message.sample_name))

    def compose(self) -> ComposeResult:
        yield Static()

if __name__ == "__main__":
    RemoteInspector().run()
