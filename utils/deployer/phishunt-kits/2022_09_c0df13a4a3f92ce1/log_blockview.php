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
$log_block_view = new log_block_view();

// Run the page
$log_block_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$log_block_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$log_block->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var flog_blockview = currentForm = new ew.Form("flog_blockview", "view");

// Form_CustomValidate event
flog_blockview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
flog_blockview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$log_block->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $log_block_view->ExportOptions->render("body") ?>
<?php
	foreach ($log_block_view->OtherOptions as &$option)
		$option->render("body");
?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $log_block_view->showPageHeader(); ?>
<?php
$log_block_view->showMessage();
?>
<form name="flog_blockview" id="flog_blockview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($log_block_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $log_block_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="log_block">
<input type="hidden" name="modal" value="<?php echo (int)$log_block_view->IsModal ?>">
<table class="table ew-view-table">
<?php if ($log_block->height_block->Visible) { // height_block ?>
	<tr id="r_height_block">
		<td class="<?php echo $log_block_view->TableLeftColumnClass ?>"><span id="elh_log_block_height_block"><?php echo $log_block->height_block->caption() ?></span></td>
		<td data-name="height_block"<?php echo $log_block->height_block->cellAttributes() ?>>
<span id="el_log_block_height_block">
<span<?php echo $log_block->height_block->viewAttributes() ?>>
<?php echo $log_block->height_block->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($log_block->time_mined->Visible) { // time_mined ?>
	<tr id="r_time_mined">
		<td class="<?php echo $log_block_view->TableLeftColumnClass ?>"><span id="elh_log_block_time_mined"><?php echo $log_block->time_mined->caption() ?></span></td>
		<td data-name="time_mined"<?php echo $log_block->time_mined->cellAttributes() ?>>
<span id="el_log_block_time_mined">
<span<?php echo $log_block->time_mined->viewAttributes() ?>>
<?php echo $log_block->time_mined->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($log_block->hash->Visible) { // hash ?>
	<tr id="r_hash">
		<td class="<?php echo $log_block_view->TableLeftColumnClass ?>"><span id="elh_log_block_hash"><?php echo $log_block->hash->caption() ?></span></td>
		<td data-name="hash"<?php echo $log_block->hash->cellAttributes() ?>>
<span id="el_log_block_hash">
<span<?php echo $log_block->hash->viewAttributes() ?>>
<?php echo $log_block->hash->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($log_block->size->Visible) { // size ?>
	<tr id="r_size">
		<td class="<?php echo $log_block_view->TableLeftColumnClass ?>"><span id="elh_log_block_size"><?php echo $log_block->size->caption() ?></span></td>
		<td data-name="size"<?php echo $log_block->size->cellAttributes() ?>>
<span id="el_log_block_size">
<span<?php echo $log_block->size->viewAttributes() ?>>
<?php echo $log_block->size->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($log_block->acc_from->Visible) { // acc_from ?>
	<tr id="r_acc_from">
		<td class="<?php echo $log_block_view->TableLeftColumnClass ?>"><span id="elh_log_block_acc_from"><?php echo $log_block->acc_from->caption() ?></span></td>
		<td data-name="acc_from"<?php echo $log_block->acc_from->cellAttributes() ?>>
<span id="el_log_block_acc_from">
<span<?php echo $log_block->acc_from->viewAttributes() ?>>
<?php echo $log_block->acc_from->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($log_block->acc_to->Visible) { // acc_to ?>
	<tr id="r_acc_to">
		<td class="<?php echo $log_block_view->TableLeftColumnClass ?>"><span id="elh_log_block_acc_to"><?php echo $log_block->acc_to->caption() ?></span></td>
		<td data-name="acc_to"<?php echo $log_block->acc_to->cellAttributes() ?>>
<span id="el_log_block_acc_to">
<span<?php echo $log_block->acc_to->viewAttributes() ?>>
<?php echo $log_block->acc_to->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($log_block->gasused->Visible) { // gasused ?>
	<tr id="r_gasused">
		<td class="<?php echo $log_block_view->TableLeftColumnClass ?>"><span id="elh_log_block_gasused"><?php echo $log_block->gasused->caption() ?></span></td>
		<td data-name="gasused"<?php echo $log_block->gasused->cellAttributes() ?>>
<span id="el_log_block_gasused">
<span<?php echo $log_block->gasused->viewAttributes() ?>>
<?php echo $log_block->gasused->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($log_block->nonce->Visible) { // nonce ?>
	<tr id="r_nonce">
		<td class="<?php echo $log_block_view->TableLeftColumnClass ?>"><span id="elh_log_block_nonce"><?php echo $log_block->nonce->caption() ?></span></td>
		<td data-name="nonce"<?php echo $log_block->nonce->cellAttributes() ?>>
<span id="el_log_block_nonce">
<span<?php echo $log_block->nonce->viewAttributes() ?>>
<?php echo $log_block->nonce->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($log_block->extradata->Visible) { // extradata ?>
	<tr id="r_extradata">
		<td class="<?php echo $log_block_view->TableLeftColumnClass ?>"><span id="elh_log_block_extradata"><?php echo $log_block->extradata->caption() ?></span></td>
		<td data-name="extradata"<?php echo $log_block->extradata->cellAttributes() ?>>
<span id="el_log_block_extradata">
<span<?php echo $log_block->extradata->viewAttributes() ?>>
<?php echo $log_block->extradata->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($log_block->tx_num->Visible) { // tx_num ?>
	<tr id="r_tx_num">
		<td class="<?php echo $log_block_view->TableLeftColumnClass ?>"><span id="elh_log_block_tx_num"><?php echo $log_block->tx_num->caption() ?></span></td>
		<td data-name="tx_num"<?php echo $log_block->tx_num->cellAttributes() ?>>
<span id="el_log_block_tx_num">
<span<?php echo $log_block->tx_num->viewAttributes() ?>>
<?php echo $log_block->tx_num->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($log_block->hash_parent->Visible) { // hash_parent ?>
	<tr id="r_hash_parent">
		<td class="<?php echo $log_block_view->TableLeftColumnClass ?>"><span id="elh_log_block_hash_parent"><?php echo $log_block->hash_parent->caption() ?></span></td>
		<td data-name="hash_parent"<?php echo $log_block->hash_parent->cellAttributes() ?>>
<span id="el_log_block_hash_parent">
<span<?php echo $log_block->hash_parent->viewAttributes() ?>>
<?php echo $log_block->hash_parent->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($log_block->miner->Visible) { // miner ?>
	<tr id="r_miner">
		<td class="<?php echo $log_block_view->TableLeftColumnClass ?>"><span id="elh_log_block_miner"><?php echo $log_block->miner->caption() ?></span></td>
		<td data-name="miner"<?php echo $log_block->miner->cellAttributes() ?>>
<span id="el_log_block_miner">
<span<?php echo $log_block->miner->viewAttributes() ?>>
<?php echo $log_block->miner->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
<?php if (!$log_block_view->IsModal) { ?>
<?php if (!$log_block->isExport()) { ?>
<?php if (!isset($log_block_view->Pager)) $log_block_view->Pager = new PrevNextPager($log_block_view->StartRec, $log_block_view->DisplayRecs, $log_block_view->TotalRecs, $log_block_view->AutoHidePager) ?>
<?php if ($log_block_view->Pager->RecordCount > 0 && $log_block_view->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($log_block_view->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" href="<?php echo $log_block_view->pageUrl() ?>start=<?php echo $log_block_view->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($log_block_view->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" href="<?php echo $log_block_view->pageUrl() ?>start=<?php echo $log_block_view->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $log_block_view->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($log_block_view->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" href="<?php echo $log_block_view->pageUrl() ?>start=<?php echo $log_block_view->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($log_block_view->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" href="<?php echo $log_block_view->pageUrl() ?>start=<?php echo $log_block_view->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $log_block_view->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<div class="clearfix"></div>
<?php } ?>
<?php } ?>
</form>
<?php
$log_block_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$log_block->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$log_block_view->terminate();
?>
