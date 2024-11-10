<?php
namespace PHPMaker2019\esbc_20181010;

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	session_start(); // Init session data

// Output buffering
ob_start(); 

// Autoload
include_once "autoload.php";
?>
<?php

// Write header
WriteHeader(FALSE);

// Create page object
$geth_cmd_view = new geth_cmd_view();

// Run the page
$geth_cmd_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$geth_cmd_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$geth_cmd->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fgeth_cmdview = currentForm = new ew.Form("fgeth_cmdview", "view");

// Form_CustomValidate event
fgeth_cmdview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fgeth_cmdview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fgeth_cmdview.lists["x_HOST_INDEX"] = <?php echo $geth_cmd_view->HOST_INDEX->Lookup->toClientList() ?>;
fgeth_cmdview.lists["x_HOST_INDEX"].options = <?php echo JsonEncode($geth_cmd_view->HOST_INDEX->lookupOptions()) ?>;
fgeth_cmdview.lists["x_HUB_INDEX"] = <?php echo $geth_cmd_view->HUB_INDEX->Lookup->toClientList() ?>;
fgeth_cmdview.lists["x_HUB_INDEX"].options = <?php echo JsonEncode($geth_cmd_view->HUB_INDEX->lookupOptions()) ?>;
fgeth_cmdview.lists["x_NODE_INDEX"] = <?php echo $geth_cmd_view->NODE_INDEX->Lookup->toClientList() ?>;
fgeth_cmdview.lists["x_NODE_INDEX"].options = <?php echo JsonEncode($geth_cmd_view->NODE_INDEX->lookupOptions()) ?>;
fgeth_cmdview.lists["x_GETH_PAR_INDEX"] = <?php echo $geth_cmd_view->GETH_PAR_INDEX->Lookup->toClientList() ?>;
fgeth_cmdview.lists["x_GETH_PAR_INDEX"].options = <?php echo JsonEncode($geth_cmd_view->GETH_PAR_INDEX->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$geth_cmd->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $geth_cmd_view->ExportOptions->render("body") ?>
<?php
	foreach ($geth_cmd_view->OtherOptions as &$option)
		$option->render("body");
?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $geth_cmd_view->showPageHeader(); ?>
<?php
$geth_cmd_view->showMessage();
?>
<form name="fgeth_cmdview" id="fgeth_cmdview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($geth_cmd_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $geth_cmd_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="geth_cmd">
<input type="hidden" name="modal" value="<?php echo (int)$geth_cmd_view->IsModal ?>">
<table class="table ew-view-table">
<?php if ($geth_cmd->Rindex->Visible) { // Rindex ?>
	<tr id="r_Rindex">
		<td class="<?php echo $geth_cmd_view->TableLeftColumnClass ?>"><span id="elh_geth_cmd_Rindex"><?php echo $geth_cmd->Rindex->caption() ?></span></td>
		<td data-name="Rindex"<?php echo $geth_cmd->Rindex->cellAttributes() ?>>
<span id="el_geth_cmd_Rindex">
<span<?php echo $geth_cmd->Rindex->viewAttributes() ?>>
<?php echo $geth_cmd->Rindex->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($geth_cmd->HOST_INDEX->Visible) { // HOST_INDEX ?>
	<tr id="r_HOST_INDEX">
		<td class="<?php echo $geth_cmd_view->TableLeftColumnClass ?>"><span id="elh_geth_cmd_HOST_INDEX"><?php echo $geth_cmd->HOST_INDEX->caption() ?></span></td>
		<td data-name="HOST_INDEX"<?php echo $geth_cmd->HOST_INDEX->cellAttributes() ?>>
<span id="el_geth_cmd_HOST_INDEX">
<span<?php echo $geth_cmd->HOST_INDEX->viewAttributes() ?>>
<?php echo $geth_cmd->HOST_INDEX->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($geth_cmd->HUB_INDEX->Visible) { // HUB_INDEX ?>
	<tr id="r_HUB_INDEX">
		<td class="<?php echo $geth_cmd_view->TableLeftColumnClass ?>"><span id="elh_geth_cmd_HUB_INDEX"><?php echo $geth_cmd->HUB_INDEX->caption() ?></span></td>
		<td data-name="HUB_INDEX"<?php echo $geth_cmd->HUB_INDEX->cellAttributes() ?>>
<span id="el_geth_cmd_HUB_INDEX">
<span<?php echo $geth_cmd->HUB_INDEX->viewAttributes() ?>>
<?php echo $geth_cmd->HUB_INDEX->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($geth_cmd->NODE_INDEX->Visible) { // NODE_INDEX ?>
	<tr id="r_NODE_INDEX">
		<td class="<?php echo $geth_cmd_view->TableLeftColumnClass ?>"><span id="elh_geth_cmd_NODE_INDEX"><?php echo $geth_cmd->NODE_INDEX->caption() ?></span></td>
		<td data-name="NODE_INDEX"<?php echo $geth_cmd->NODE_INDEX->cellAttributes() ?>>
<span id="el_geth_cmd_NODE_INDEX">
<span<?php echo $geth_cmd->NODE_INDEX->viewAttributes() ?>>
<?php echo $geth_cmd->NODE_INDEX->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($geth_cmd->GETH_PAR_INDEX->Visible) { // GETH_PAR_INDEX ?>
	<tr id="r_GETH_PAR_INDEX">
		<td class="<?php echo $geth_cmd_view->TableLeftColumnClass ?>"><span id="elh_geth_cmd_GETH_PAR_INDEX"><?php echo $geth_cmd->GETH_PAR_INDEX->caption() ?></span></td>
		<td data-name="GETH_PAR_INDEX"<?php echo $geth_cmd->GETH_PAR_INDEX->cellAttributes() ?>>
<span id="el_geth_cmd_GETH_PAR_INDEX">
<span<?php echo $geth_cmd->GETH_PAR_INDEX->viewAttributes() ?>>
<?php echo $geth_cmd->GETH_PAR_INDEX->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($geth_cmd->host_type->Visible) { // host_type ?>
	<tr id="r_host_type">
		<td class="<?php echo $geth_cmd_view->TableLeftColumnClass ?>"><span id="elh_geth_cmd_host_type"><?php echo $geth_cmd->host_type->caption() ?></span></td>
		<td data-name="host_type"<?php echo $geth_cmd->host_type->cellAttributes() ?>>
<span id="el_geth_cmd_host_type">
<span<?php echo $geth_cmd->host_type->viewAttributes() ?>>
<?php echo $geth_cmd->host_type->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($geth_cmd->geth_path->Visible) { // geth_path ?>
	<tr id="r_geth_path">
		<td class="<?php echo $geth_cmd_view->TableLeftColumnClass ?>"><span id="elh_geth_cmd_geth_path"><?php echo $geth_cmd->geth_path->caption() ?></span></td>
		<td data-name="geth_path"<?php echo $geth_cmd->geth_path->cellAttributes() ?>>
<span id="el_geth_cmd_geth_path">
<span<?php echo $geth_cmd->geth_path->viewAttributes() ?>>
<?php echo $geth_cmd->geth_path->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($geth_cmd->node_root->Visible) { // node_root ?>
	<tr id="r_node_root">
		<td class="<?php echo $geth_cmd_view->TableLeftColumnClass ?>"><span id="elh_geth_cmd_node_root"><?php echo $geth_cmd->node_root->caption() ?></span></td>
		<td data-name="node_root"<?php echo $geth_cmd->node_root->cellAttributes() ?>>
<span id="el_geth_cmd_node_root">
<span<?php echo $geth_cmd->node_root->viewAttributes() ?>>
<?php echo $geth_cmd->node_root->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($geth_cmd->node_acc40->Visible) { // node_acc40 ?>
	<tr id="r_node_acc40">
		<td class="<?php echo $geth_cmd_view->TableLeftColumnClass ?>"><span id="elh_geth_cmd_node_acc40"><?php echo $geth_cmd->node_acc40->caption() ?></span></td>
		<td data-name="node_acc40"<?php echo $geth_cmd->node_acc40->cellAttributes() ?>>
<span id="el_geth_cmd_node_acc40">
<span<?php echo $geth_cmd->node_acc40->viewAttributes() ?>>
<?php echo $geth_cmd->node_acc40->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($geth_cmd->node_port->Visible) { // node_port ?>
	<tr id="r_node_port">
		<td class="<?php echo $geth_cmd_view->TableLeftColumnClass ?>"><span id="elh_geth_cmd_node_port"><?php echo $geth_cmd->node_port->caption() ?></span></td>
		<td data-name="node_port"<?php echo $geth_cmd->node_port->cellAttributes() ?>>
<span id="el_geth_cmd_node_port">
<span<?php echo $geth_cmd->node_port->viewAttributes() ?>>
<?php echo $geth_cmd->node_port->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($geth_cmd->hostip->Visible) { // hostip ?>
	<tr id="r_hostip">
		<td class="<?php echo $geth_cmd_view->TableLeftColumnClass ?>"><span id="elh_geth_cmd_hostip"><?php echo $geth_cmd->hostip->caption() ?></span></td>
		<td data-name="hostip"<?php echo $geth_cmd->hostip->cellAttributes() ?>>
<span id="el_geth_cmd_hostip">
<span<?php echo $geth_cmd->hostip->viewAttributes() ?>>
<?php echo $geth_cmd->hostip->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($geth_cmd->node_rpcport->Visible) { // node_rpcport ?>
	<tr id="r_node_rpcport">
		<td class="<?php echo $geth_cmd_view->TableLeftColumnClass ?>"><span id="elh_geth_cmd_node_rpcport"><?php echo $geth_cmd->node_rpcport->caption() ?></span></td>
		<td data-name="node_rpcport"<?php echo $geth_cmd->node_rpcport->cellAttributes() ?>>
<span id="el_geth_cmd_node_rpcport">
<span<?php echo $geth_cmd->node_rpcport->viewAttributes() ?>>
<?php echo $geth_cmd->node_rpcport->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($geth_cmd->bootnode_enode->Visible) { // bootnode_enode ?>
	<tr id="r_bootnode_enode">
		<td class="<?php echo $geth_cmd_view->TableLeftColumnClass ?>"><span id="elh_geth_cmd_bootnode_enode"><?php echo $geth_cmd->bootnode_enode->caption() ?></span></td>
		<td data-name="bootnode_enode"<?php echo $geth_cmd->bootnode_enode->cellAttributes() ?>>
<span id="el_geth_cmd_bootnode_enode">
<span<?php echo $geth_cmd->bootnode_enode->viewAttributes() ?>>
<?php echo $geth_cmd->bootnode_enode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($geth_cmd->bootnode_ip->Visible) { // bootnode_ip ?>
	<tr id="r_bootnode_ip">
		<td class="<?php echo $geth_cmd_view->TableLeftColumnClass ?>"><span id="elh_geth_cmd_bootnode_ip"><?php echo $geth_cmd->bootnode_ip->caption() ?></span></td>
		<td data-name="bootnode_ip"<?php echo $geth_cmd->bootnode_ip->cellAttributes() ?>>
<span id="el_geth_cmd_bootnode_ip">
<span<?php echo $geth_cmd->bootnode_ip->viewAttributes() ?>>
<?php echo $geth_cmd->bootnode_ip->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($geth_cmd->bootnode_port->Visible) { // bootnode_port ?>
	<tr id="r_bootnode_port">
		<td class="<?php echo $geth_cmd_view->TableLeftColumnClass ?>"><span id="elh_geth_cmd_bootnode_port"><?php echo $geth_cmd->bootnode_port->caption() ?></span></td>
		<td data-name="bootnode_port"<?php echo $geth_cmd->bootnode_port->cellAttributes() ?>>
<span id="el_geth_cmd_bootnode_port">
<span<?php echo $geth_cmd->bootnode_port->viewAttributes() ?>>
<?php echo $geth_cmd->bootnode_port->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($geth_cmd->date_add->Visible) { // date_add ?>
	<tr id="r_date_add">
		<td class="<?php echo $geth_cmd_view->TableLeftColumnClass ?>"><span id="elh_geth_cmd_date_add"><?php echo $geth_cmd->date_add->caption() ?></span></td>
		<td data-name="date_add"<?php echo $geth_cmd->date_add->cellAttributes() ?>>
<span id="el_geth_cmd_date_add">
<span<?php echo $geth_cmd->date_add->viewAttributes() ?>>
<?php echo $geth_cmd->date_add->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
<?php if (!$geth_cmd_view->IsModal) { ?>
<?php if (!$geth_cmd->isExport()) { ?>
<?php if (!isset($geth_cmd_view->Pager)) $geth_cmd_view->Pager = new PrevNextPager($geth_cmd_view->StartRec, $geth_cmd_view->DisplayRecs, $geth_cmd_view->TotalRecs, $geth_cmd_view->AutoHidePager) ?>
<?php if ($geth_cmd_view->Pager->RecordCount > 0 && $geth_cmd_view->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($geth_cmd_view->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" href="<?php echo $geth_cmd_view->pageUrl() ?>start=<?php echo $geth_cmd_view->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($geth_cmd_view->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" href="<?php echo $geth_cmd_view->pageUrl() ?>start=<?php echo $geth_cmd_view->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $geth_cmd_view->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($geth_cmd_view->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" href="<?php echo $geth_cmd_view->pageUrl() ?>start=<?php echo $geth_cmd_view->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($geth_cmd_view->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" href="<?php echo $geth_cmd_view->pageUrl() ?>start=<?php echo $geth_cmd_view->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $geth_cmd_view->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<div class="clearfix"></div>
<?php } ?>
<?php } ?>
</form>
<?php
$geth_cmd_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$geth_cmd->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$geth_cmd_view->terminate();
?>
