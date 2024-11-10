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
$esbc_node_basic_view = new esbc_node_basic_view();

// Run the page
$esbc_node_basic_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$esbc_node_basic_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$esbc_node_basic->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fesbc_node_basicview = currentForm = new ew.Form("fesbc_node_basicview", "view");

// Form_CustomValidate event
fesbc_node_basicview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fesbc_node_basicview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fesbc_node_basicview.lists["x_HUB_INDEX"] = <?php echo $esbc_node_basic_view->HUB_INDEX->Lookup->toClientList() ?>;
fesbc_node_basicview.lists["x_HUB_INDEX"].options = <?php echo JsonEncode($esbc_node_basic_view->HUB_INDEX->lookupOptions()) ?>;
fesbc_node_basicview.lists["x_NODE_SIGNER"] = <?php echo $esbc_node_basic_view->NODE_SIGNER->Lookup->toClientList() ?>;
fesbc_node_basicview.lists["x_NODE_SIGNER"].options = <?php echo JsonEncode($esbc_node_basic_view->NODE_SIGNER->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$esbc_node_basic->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $esbc_node_basic_view->ExportOptions->render("body") ?>
<?php
	foreach ($esbc_node_basic_view->OtherOptions as &$option)
		$option->render("body");
?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $esbc_node_basic_view->showPageHeader(); ?>
<?php
$esbc_node_basic_view->showMessage();
?>
<form name="fesbc_node_basicview" id="fesbc_node_basicview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($esbc_node_basic_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $esbc_node_basic_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="esbc_node_basic">
<input type="hidden" name="modal" value="<?php echo (int)$esbc_node_basic_view->IsModal ?>">
<table class="table ew-view-table">
<?php if ($esbc_node_basic->NODE_INDEX->Visible) { // NODE_INDEX ?>
	<tr id="r_NODE_INDEX">
		<td class="<?php echo $esbc_node_basic_view->TableLeftColumnClass ?>"><span id="elh_esbc_node_basic_NODE_INDEX"><?php echo $esbc_node_basic->NODE_INDEX->caption() ?></span></td>
		<td data-name="NODE_INDEX"<?php echo $esbc_node_basic->NODE_INDEX->cellAttributes() ?>>
<span id="el_esbc_node_basic_NODE_INDEX">
<span<?php echo $esbc_node_basic->NODE_INDEX->viewAttributes() ?>>
<?php echo $esbc_node_basic->NODE_INDEX->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($esbc_node_basic->HUB_INDEX->Visible) { // HUB_INDEX ?>
	<tr id="r_HUB_INDEX">
		<td class="<?php echo $esbc_node_basic_view->TableLeftColumnClass ?>"><span id="elh_esbc_node_basic_HUB_INDEX"><?php echo $esbc_node_basic->HUB_INDEX->caption() ?></span></td>
		<td data-name="HUB_INDEX"<?php echo $esbc_node_basic->HUB_INDEX->cellAttributes() ?>>
<span id="el_esbc_node_basic_HUB_INDEX">
<span<?php echo $esbc_node_basic->HUB_INDEX->viewAttributes() ?>>
<?php echo $esbc_node_basic->HUB_INDEX->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($esbc_node_basic->NODE_NAME->Visible) { // NODE_NAME ?>
	<tr id="r_NODE_NAME">
		<td class="<?php echo $esbc_node_basic_view->TableLeftColumnClass ?>"><span id="elh_esbc_node_basic_NODE_NAME"><?php echo $esbc_node_basic->NODE_NAME->caption() ?></span></td>
		<td data-name="NODE_NAME"<?php echo $esbc_node_basic->NODE_NAME->cellAttributes() ?>>
<span id="el_esbc_node_basic_NODE_NAME">
<span<?php echo $esbc_node_basic->NODE_NAME->viewAttributes() ?>>
<?php echo $esbc_node_basic->NODE_NAME->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($esbc_node_basic->NODE_PW->Visible) { // NODE_PW ?>
	<tr id="r_NODE_PW">
		<td class="<?php echo $esbc_node_basic_view->TableLeftColumnClass ?>"><span id="elh_esbc_node_basic_NODE_PW"><?php echo $esbc_node_basic->NODE_PW->caption() ?></span></td>
		<td data-name="NODE_PW"<?php echo $esbc_node_basic->NODE_PW->cellAttributes() ?>>
<span id="el_esbc_node_basic_NODE_PW">
<span<?php echo $esbc_node_basic->NODE_PW->viewAttributes() ?>>
<?php echo $esbc_node_basic->NODE_PW->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($esbc_node_basic->NODE_ENODE->Visible) { // NODE_ENODE ?>
	<tr id="r_NODE_ENODE">
		<td class="<?php echo $esbc_node_basic_view->TableLeftColumnClass ?>"><span id="elh_esbc_node_basic_NODE_ENODE"><?php echo $esbc_node_basic->NODE_ENODE->caption() ?></span></td>
		<td data-name="NODE_ENODE"<?php echo $esbc_node_basic->NODE_ENODE->cellAttributes() ?>>
<span id="el_esbc_node_basic_NODE_ENODE">
<span<?php echo $esbc_node_basic->NODE_ENODE->viewAttributes() ?>>
<?php echo $esbc_node_basic->NODE_ENODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($esbc_node_basic->NODE_ACC40->Visible) { // NODE_ACC40 ?>
	<tr id="r_NODE_ACC40">
		<td class="<?php echo $esbc_node_basic_view->TableLeftColumnClass ?>"><span id="elh_esbc_node_basic_NODE_ACC40"><?php echo $esbc_node_basic->NODE_ACC40->caption() ?></span></td>
		<td data-name="NODE_ACC40"<?php echo $esbc_node_basic->NODE_ACC40->cellAttributes() ?>>
<span id="el_esbc_node_basic_NODE_ACC40">
<span<?php echo $esbc_node_basic->NODE_ACC40->viewAttributes() ?>>
<?php echo $esbc_node_basic->NODE_ACC40->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($esbc_node_basic->NODE_SIGNER->Visible) { // NODE_SIGNER ?>
	<tr id="r_NODE_SIGNER">
		<td class="<?php echo $esbc_node_basic_view->TableLeftColumnClass ?>"><span id="elh_esbc_node_basic_NODE_SIGNER"><?php echo $esbc_node_basic->NODE_SIGNER->caption() ?></span></td>
		<td data-name="NODE_SIGNER"<?php echo $esbc_node_basic->NODE_SIGNER->cellAttributes() ?>>
<span id="el_esbc_node_basic_NODE_SIGNER">
<span<?php echo $esbc_node_basic->NODE_SIGNER->viewAttributes() ?>>
<?php echo $esbc_node_basic->NODE_SIGNER->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($esbc_node_basic->Create_Date->Visible) { // Create_Date ?>
	<tr id="r_Create_Date">
		<td class="<?php echo $esbc_node_basic_view->TableLeftColumnClass ?>"><span id="elh_esbc_node_basic_Create_Date"><?php echo $esbc_node_basic->Create_Date->caption() ?></span></td>
		<td data-name="Create_Date"<?php echo $esbc_node_basic->Create_Date->cellAttributes() ?>>
<span id="el_esbc_node_basic_Create_Date">
<span<?php echo $esbc_node_basic->Create_Date->viewAttributes() ?>>
<?php echo $esbc_node_basic->Create_Date->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
<?php if (!$esbc_node_basic_view->IsModal) { ?>
<?php if (!$esbc_node_basic->isExport()) { ?>
<?php if (!isset($esbc_node_basic_view->Pager)) $esbc_node_basic_view->Pager = new PrevNextPager($esbc_node_basic_view->StartRec, $esbc_node_basic_view->DisplayRecs, $esbc_node_basic_view->TotalRecs, $esbc_node_basic_view->AutoHidePager) ?>
<?php if ($esbc_node_basic_view->Pager->RecordCount > 0 && $esbc_node_basic_view->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($esbc_node_basic_view->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" href="<?php echo $esbc_node_basic_view->pageUrl() ?>start=<?php echo $esbc_node_basic_view->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($esbc_node_basic_view->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" href="<?php echo $esbc_node_basic_view->pageUrl() ?>start=<?php echo $esbc_node_basic_view->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $esbc_node_basic_view->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($esbc_node_basic_view->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" href="<?php echo $esbc_node_basic_view->pageUrl() ?>start=<?php echo $esbc_node_basic_view->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($esbc_node_basic_view->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" href="<?php echo $esbc_node_basic_view->pageUrl() ?>start=<?php echo $esbc_node_basic_view->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $esbc_node_basic_view->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<div class="clearfix"></div>
<?php } ?>
<?php } ?>
</form>
<?php
$esbc_node_basic_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$esbc_node_basic->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$esbc_node_basic_view->terminate();
?>
