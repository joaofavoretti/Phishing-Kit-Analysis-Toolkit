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
$node_basic_view = new node_basic_view();

// Run the page
$node_basic_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$node_basic_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$node_basic->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fnode_basicview = currentForm = new ew.Form("fnode_basicview", "view");

// Form_CustomValidate event
fnode_basicview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fnode_basicview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fnode_basicview.lists["x_NODE_SIGNER"] = <?php echo $node_basic_view->NODE_SIGNER->Lookup->toClientList() ?>;
fnode_basicview.lists["x_NODE_SIGNER"].options = <?php echo JsonEncode($node_basic_view->NODE_SIGNER->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$node_basic->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $node_basic_view->ExportOptions->render("body") ?>
<?php
	foreach ($node_basic_view->OtherOptions as &$option)
		$option->render("body");
?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $node_basic_view->showPageHeader(); ?>
<?php
$node_basic_view->showMessage();
?>
<form name="fnode_basicview" id="fnode_basicview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($node_basic_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $node_basic_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="node_basic">
<input type="hidden" name="modal" value="<?php echo (int)$node_basic_view->IsModal ?>">
<table class="table ew-view-table">
<?php if ($node_basic->NODE_INDEX->Visible) { // NODE_INDEX ?>
	<tr id="r_NODE_INDEX">
		<td class="<?php echo $node_basic_view->TableLeftColumnClass ?>"><span id="elh_node_basic_NODE_INDEX"><?php echo $node_basic->NODE_INDEX->caption() ?></span></td>
		<td data-name="NODE_INDEX"<?php echo $node_basic->NODE_INDEX->cellAttributes() ?>>
<span id="el_node_basic_NODE_INDEX">
<span<?php echo $node_basic->NODE_INDEX->viewAttributes() ?>>
<?php echo $node_basic->NODE_INDEX->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($node_basic->ESBC_INDEX->Visible) { // ESBC_INDEX ?>
	<tr id="r_ESBC_INDEX">
		<td class="<?php echo $node_basic_view->TableLeftColumnClass ?>"><span id="elh_node_basic_ESBC_INDEX"><?php echo $node_basic->ESBC_INDEX->caption() ?></span></td>
		<td data-name="ESBC_INDEX"<?php echo $node_basic->ESBC_INDEX->cellAttributes() ?>>
<span id="el_node_basic_ESBC_INDEX">
<span<?php echo $node_basic->ESBC_INDEX->viewAttributes() ?>>
<?php echo $node_basic->ESBC_INDEX->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($node_basic->NODE_NAME->Visible) { // NODE_NAME ?>
	<tr id="r_NODE_NAME">
		<td class="<?php echo $node_basic_view->TableLeftColumnClass ?>"><span id="elh_node_basic_NODE_NAME"><?php echo $node_basic->NODE_NAME->caption() ?></span></td>
		<td data-name="NODE_NAME"<?php echo $node_basic->NODE_NAME->cellAttributes() ?>>
<span id="el_node_basic_NODE_NAME">
<span<?php echo $node_basic->NODE_NAME->viewAttributes() ?>>
<?php echo $node_basic->NODE_NAME->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($node_basic->NODE_PW->Visible) { // NODE_PW ?>
	<tr id="r_NODE_PW">
		<td class="<?php echo $node_basic_view->TableLeftColumnClass ?>"><span id="elh_node_basic_NODE_PW"><?php echo $node_basic->NODE_PW->caption() ?></span></td>
		<td data-name="NODE_PW"<?php echo $node_basic->NODE_PW->cellAttributes() ?>>
<span id="el_node_basic_NODE_PW">
<span<?php echo $node_basic->NODE_PW->viewAttributes() ?>>
<?php echo $node_basic->NODE_PW->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($node_basic->NODE_ENODE->Visible) { // NODE_ENODE ?>
	<tr id="r_NODE_ENODE">
		<td class="<?php echo $node_basic_view->TableLeftColumnClass ?>"><span id="elh_node_basic_NODE_ENODE"><?php echo $node_basic->NODE_ENODE->caption() ?></span></td>
		<td data-name="NODE_ENODE"<?php echo $node_basic->NODE_ENODE->cellAttributes() ?>>
<span id="el_node_basic_NODE_ENODE">
<span<?php echo $node_basic->NODE_ENODE->viewAttributes() ?>>
<?php echo $node_basic->NODE_ENODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($node_basic->NODE_ACCOUNT_ID->Visible) { // NODE_ACCOUNT_ID ?>
	<tr id="r_NODE_ACCOUNT_ID">
		<td class="<?php echo $node_basic_view->TableLeftColumnClass ?>"><span id="elh_node_basic_NODE_ACCOUNT_ID"><?php echo $node_basic->NODE_ACCOUNT_ID->caption() ?></span></td>
		<td data-name="NODE_ACCOUNT_ID"<?php echo $node_basic->NODE_ACCOUNT_ID->cellAttributes() ?>>
<span id="el_node_basic_NODE_ACCOUNT_ID">
<span<?php echo $node_basic->NODE_ACCOUNT_ID->viewAttributes() ?>>
<?php echo $node_basic->NODE_ACCOUNT_ID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($node_basic->NODE_SIGNER->Visible) { // NODE_SIGNER ?>
	<tr id="r_NODE_SIGNER">
		<td class="<?php echo $node_basic_view->TableLeftColumnClass ?>"><span id="elh_node_basic_NODE_SIGNER"><?php echo $node_basic->NODE_SIGNER->caption() ?></span></td>
		<td data-name="NODE_SIGNER"<?php echo $node_basic->NODE_SIGNER->cellAttributes() ?>>
<span id="el_node_basic_NODE_SIGNER">
<span<?php echo $node_basic->NODE_SIGNER->viewAttributes() ?>>
<?php echo $node_basic->NODE_SIGNER->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($node_basic->Create_Date->Visible) { // Create_Date ?>
	<tr id="r_Create_Date">
		<td class="<?php echo $node_basic_view->TableLeftColumnClass ?>"><span id="elh_node_basic_Create_Date"><?php echo $node_basic->Create_Date->caption() ?></span></td>
		<td data-name="Create_Date"<?php echo $node_basic->Create_Date->cellAttributes() ?>>
<span id="el_node_basic_Create_Date">
<span<?php echo $node_basic->Create_Date->viewAttributes() ?>>
<?php echo $node_basic->Create_Date->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
<?php if (!$node_basic_view->IsModal) { ?>
<?php if (!$node_basic->isExport()) { ?>
<?php if (!isset($node_basic_view->Pager)) $node_basic_view->Pager = new PrevNextPager($node_basic_view->StartRec, $node_basic_view->DisplayRecs, $node_basic_view->TotalRecs, $node_basic_view->AutoHidePager) ?>
<?php if ($node_basic_view->Pager->RecordCount > 0 && $node_basic_view->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($node_basic_view->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" href="<?php echo $node_basic_view->pageUrl() ?>start=<?php echo $node_basic_view->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($node_basic_view->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" href="<?php echo $node_basic_view->pageUrl() ?>start=<?php echo $node_basic_view->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $node_basic_view->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($node_basic_view->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" href="<?php echo $node_basic_view->pageUrl() ?>start=<?php echo $node_basic_view->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($node_basic_view->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" href="<?php echo $node_basic_view->pageUrl() ?>start=<?php echo $node_basic_view->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $node_basic_view->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<div class="clearfix"></div>
<?php } ?>
<?php } ?>
</form>
<?php
$node_basic_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$node_basic->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$node_basic_view->terminate();
?>
