<?php
namespace PHPMaker2019\esbc_20181010;

// Navbar menu
$topMenu = new Menu("navbar", TRUE, TRUE);
echo $topMenu->toScript();

// Sidebar menu
$sideMenu = new Menu("menu", TRUE, FALSE);
$sideMenu->addMenuItem(19, "mci_Applications", $Language->MenuPhrase("19", "MenuText"), "", -1, "", IsLoggedIn(), FALSE, TRUE, "fa-globe", "", FALSE);
$sideMenu->addMenuItem(5, "mi_basic_token", $Language->MenuPhrase("5", "MenuText"), "basic_tokenlist.php", 19, "", IsLoggedIn() || AllowListMenu('{F9326A38-3552-47D5-B291-9AC4B94B5D18}basic_token'), FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(20, "mi_esbc_contract", $Language->MenuPhrase("20", "MenuText"), "esbc_contractlist.php", 19, "", IsLoggedIn() || AllowListMenu('{F9326A38-3552-47D5-B291-9AC4B94B5D18}esbc_contract'), FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(18, "mci_Cmaker_Overview", $Language->MenuPhrase("18", "MenuText"), "", -1, "", IsLoggedIn(), FALSE, TRUE, "fa-chain", "", FALSE);
$sideMenu->addMenuItem(7, "mi_esbc_host_basic", $Language->MenuPhrase("7", "MenuText"), "esbc_host_basiclist.php", 18, "", IsLoggedIn() || AllowListMenu('{F9326A38-3552-47D5-B291-9AC4B94B5D18}esbc_host_basic'), FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(15, "mi_esbc_node_basic", $Language->MenuPhrase("15", "MenuText"), "esbc_node_basiclist.php", 18, "", IsLoggedIn() || AllowListMenu('{F9326A38-3552-47D5-B291-9AC4B94B5D18}esbc_node_basic'), FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(1, "mi_basic_acc", $Language->MenuPhrase("1", "MenuText"), "basic_acclist.php", 18, "", IsLoggedIn() || AllowListMenu('{F9326A38-3552-47D5-B291-9AC4B94B5D18}basic_acc'), FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(9, "mi_esbc_log", $Language->MenuPhrase("9", "MenuText"), "esbc_loglist.php", 18, "", IsLoggedIn() || AllowListMenu('{F9326A38-3552-47D5-B291-9AC4B94B5D18}esbc_log'), FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(23, "mi_esbc_hub_basic", $Language->MenuPhrase("23", "MenuText"), "esbc_hub_basiclist.php", 18, "", IsLoggedIn() || AllowListMenu('{F9326A38-3552-47D5-B291-9AC4B94B5D18}esbc_hub_basic'), FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(21, "mi_geth_cmd", $Language->MenuPhrase("21", "MenuText"), "geth_cmdlist.php", 18, "", IsLoggedIn() || AllowListMenu('{F9326A38-3552-47D5-B291-9AC4B94B5D18}geth_cmd'), FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(22, "mi_esbc_geth_par", $Language->MenuPhrase("22", "MenuText"), "esbc_geth_parlist.php", 18, "", IsLoggedIn() || AllowListMenu('{F9326A38-3552-47D5-B291-9AC4B94B5D18}esbc_geth_par'), FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(25, "mi_esbc_genesis", $Language->MenuPhrase("25", "MenuText"), "esbc_genesislist.php", 18, "", IsLoggedIn() || AllowListMenu('{F9326A38-3552-47D5-B291-9AC4B94B5D18}esbc_genesis'), FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(17, "mci_History", $Language->MenuPhrase("17", "MenuText"), "", -1, "", IsLoggedIn(), FALSE, TRUE, "fa-book", "", FALSE);
$sideMenu->addMenuItem(12, "mi_log_block", $Language->MenuPhrase("12", "MenuText"), "log_blocklist.php", 17, "", IsLoggedIn() || AllowListMenu('{F9326A38-3552-47D5-B291-9AC4B94B5D18}log_block'), FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(13, "mi_log_tx", $Language->MenuPhrase("13", "MenuText"), "log_txlist.php", 17, "", IsLoggedIn() || AllowListMenu('{F9326A38-3552-47D5-B291-9AC4B94B5D18}log_tx'), FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(11, "mi_esbc_user", $Language->MenuPhrase("11", "MenuText"), "esbc_userlist.php", -1, "", IsLoggedIn() || AllowListMenu('{F9326A38-3552-47D5-B291-9AC4B94B5D18}esbc_user'), FALSE, FALSE, "fa-users", "", FALSE);
echo $sideMenu->toScript();
?>
