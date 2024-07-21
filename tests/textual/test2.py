import time
from asyncio import sleep
import hashlib


from textual import log, on, work
from textual.app import App, ComposeResult
from textual.containers import Horizontal, VerticalScroll, Vertical
from textual.message import Message
from textual.reactive import reactive
from textual.widget import Widget
from textual.worker import Worker, get_current_worker
from textual.widgets import Header, Footer, LoadingIndicator, OptionList, Static, TextArea, ListView, ListItem, Label, Collapsible, Markdown, Input, Button

LOG_FILENAME = "log.txt"

def add_log(message: str) -> None:
    with open(LOG_FILENAME, "a") as log_file:
        log_file.write(f"{message}\n")

class Item(Static):

    def __init__(self):
        super().__init__()
        self.creation_time = time.time()
        # Create an identifier for the item with the hash of the creation time
        self.identifier = hashlib.md5(str(self.creation_time).encode()).hexdigest()

    def on_mount(self) -> None:
        self.addItems()

    @work(thread=True, exclusive=True)
    async def addItems(self):
        worker = get_current_worker()
        for i in range(5):

            if worker.is_cancelled:
                return

            self.app.call_from_thread(self.mount, Static(f"Item {i}"))

            self.app.call_from_thread(add_log, f"Thread {self.identifier}")
            # print(f"Thread {self.identifier}")

            s = 0
            for i in range(1000000):
                s += i

class ItemGroup(VerticalScroll):
    
    # def on_mount(self) -> None:
    #     self.add_items()

    def compose(self) -> ComposeResult:

        for i in range(5):
            yield Item()


    # @work(thread=True, exclusive=True)
    # async def add_items(self):
    #     worker = get_current_worker()
    #     for i in range(100):
    #         if worker.is_cancelled:
    #             return
    #
    #         self.app.call_from_thread(self.mount, Static(f"Item {i}"))
    #
    #         s = 0
    #         for i in range(1000000):
    #             s += i


class TestApp(App):
    
    @on(Button.Pressed)
    def handleButtonPressed(self) -> None:
        self.query_one(ItemGroup).remove()
        self.mount(ItemGroup())

    def compose(self) -> ComposeResult:
        yield Header()
        yield Button("Call again")
        yield Static("Test String")
        yield ItemGroup()


if __name__ == "__main__":
    TestApp().run()


