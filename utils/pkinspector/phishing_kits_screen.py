from textual import log, on, work, events
from textual.app import App, ComposeResult
from textual.types import NewOptionListContent
from textual.containers import Horizontal, VerticalScroll, Vertical
from textual.message import Message
from textual.reactive import reactive
from textual.screen import Screen
from textual.widget import Widget
from textual.worker import Worker, get_current_worker
from textual.widgets import Header, Footer, LoadingIndicator, OptionList, Static, TextArea, ListView, ListItem, Label, Collapsible, Markdown, Input, Button, DirectoryTree, Rule, Checkbox, Link, SelectionList
from textual.widgets.selection_list import Selection

from phishing_kit_manager import PhishingKit, PhishingKitStateManager
from deployer import Deployer
from typing import List
import os

class Browser(OptionList):
    class Selected(Message):
        def __init__(self, kitpath: str):
            super().__init__()
            self.kitpath = kitpath

    @on(OptionList.OptionSelected)
    def handleSelected(self, event: OptionList.OptionSelected) -> None:
        index = event.option_index
        option_list = event.option_list
        option = option_list.get_option_at_index(index)
        kit = str(option.prompt)
        kitpath = os.path.join(self.directory, kit)
        self.post_message(self.Selected(kitpath))

    def __init__(self, directory: str) -> None:
        super().__init__()
        self.directory = directory

    def on_mount(self) -> None:
        kits = sorted(os.listdir(self.directory))
        self.add_options(kits)

class NoDetails(Static):
    def compose(self) -> ComposeResult:
        yield Label("No details available")

class Details(Static):
    DEFAULT_CSS = """

        Label.deployed {
            color: green;
        }

        Label.undeployed {
            color: red;
        }

        .header {
            margin-top: 1;
        }

        .header Label {
            margin-top: 1;
        }

        .header .header_actions {
            align: right middle;
        }

        .url {
            align: right middle;
        }

    """

    deployed:reactive[bool] = reactive(False, recompose=True)

    properties:reactive[List[tuple]] = reactive([
        ("Static Page", 0, False),
        ("Client Side Redirection", 1, False),
        ("Server Side Redirection", 2, False),
    ], recompose=True)

    def __init__(self, kitpath: str, stateManager:PhishingKitStateManager, **kwargs):
        super().__init__(**kwargs)
        self.kitpath = kitpath
        self.kit = os.path.basename(kitpath)

        self.stateManager = stateManager
        self.stateManager.addKit(self.kit)

        self.url = self.stateManager.getURL(self.kit)
        self.deployed = self.stateManager.isDeployed(self.kit)
        _properties = self.stateManager.getProperties(self.kit)
        self.properties = self._parseProperties(_properties)

    def _parseProperties(self, properties):
        return [(property.replace('_', ' '), i, value) for i, (property, value) in enumerate(properties.items())]

    @on(Button.Pressed)
    def handleButtonPressed(self, event: Button.Pressed) -> None:
        if event.button.id == "vscode":
            os.system(f"code {self.kitpath}")
        elif event.button.id == "deploy":
            self.stateManager.deploy(self.kit)
            self.url = self.stateManager.getURL(self.kit)
            self.deployed = self.stateManager.isDeployed(self.kit) 
        elif event.button.id == "stop":
            self.stateManager.stop(self.kit)
            self.url = self.stateManager.getURL(self.kit)
            self.deployed = self.stateManager.isDeployed(self.kit) 

    @on(Input.Submitted)
    def handleInputSubmitted(self, event: Input.Submitted) -> None:
        new_property = event.value
        self.stateManager.addProperty(new_property)
        _properties = self.stateManager.getProperties(self.kit)
        self.properties = self._parseProperties(_properties)

    @on(SelectionList.SelectionToggled)
    def handleSelectionToggled(self, event: SelectionList.SelectionToggled) -> None:
        _property = self.properties[event.selection_index]
        self.stateManager.toggleProperty(self.kit, _property[0])

    def compose(self) -> ComposeResult:
        with Horizontal(classes="header"):
            with Horizontal():
                if self.deployed:
                    yield Label(f"(⭘ Online) ", classes = "deployed")
                else:
                    yield Label(f"(⭘ Offline) ", classes = "undeployed")
                yield Label(self.kit)

            with Horizontal(classes="header_actions"):
                yield Button("VSCODE", variant="primary", id="vscode")

                if self.deployed:
                    yield Button("STOP", variant="error", id="stop")
                else:
                    yield Button("DEPLOY", variant="success", id="deploy")

        yield Rule()

        if self.deployed:
            with Horizontal():
                yield Label("URL: ")
                with Horizontal(classes="url"):
                    yield Link(
                        self.url,
                        url=self.url,
                    )

            yield Rule()

        yield Input(placeholder="Enter new property")
        yield SelectionList[int](*self.properties)

class PhishingKitsScreen(Screen):
    CSS = """
        Browser {
            height: 1fr;
            dock: left;
            width: 30;
        }

        NoDetails {
            height: 1fr;
            align: center middle;
        }

        Details {
            height: 1fr;
        }

        Horizontal {
            width: 1fr;
            height: auto;
        }

        Button {
            margin-left: 1;
        }
    """

    kitpath:reactive[str|None] = reactive(None)

    def __init__(self, directory):
        super().__init__()
        self.directory = directory
        self.stateManager = PhishingKitStateManager(directory)

    @on(Browser.Selected)
    def handleSelected(self, event: Browser.Selected) -> None:
        self.kitpath = event.kitpath
    
    async def watch_kitpath(self, kitpath: str|None) -> None:
        main = self.query_one("#main")
        await main.remove()

        horizontal = self.query_one("Horizontal")

        if kitpath is None:
            horizontal.mount(NoDetails(id="main"))
        else:
            horizontal.mount(Details(kitpath, self.stateManager, id="main"))

    def on_unmount(self) -> None:
        self.stateManager.saveKits()
        self.stateManager.stopAll()

    def compose(self) -> ComposeResult:
        with Horizontal():
            yield Browser(self.directory)
            yield NoDetails(id="main")

