import time

from textual import on, work
from textual.app import App, ComposeResult
from textual.containers import VerticalScroll
from textual.worker import get_current_worker
from textual.widgets import Button, Static


class ItemGroup(VerticalScroll):

    def on_mount(self) -> None:
        self.add_items()

    @work(thread=True)
    async def add_items(self) -> None:
        worker = get_current_worker()
        for i in range(100):
            if worker.is_cancelled:
                return
            self.app.call_from_thread(self.mount, Static(f"Item {i}"))
            time.sleep(0.01)


class TestApp(App[None]):
    def compose(self) -> ComposeResult:
        yield Button("Call again")
        yield ItemGroup()

    @on(Button.Pressed)
    def renew_option_list(self) -> None:
        self.query_one(ItemGroup).remove()
        self.mount(ItemGroup())


if __name__ == "__main__":
    TestApp().run()
