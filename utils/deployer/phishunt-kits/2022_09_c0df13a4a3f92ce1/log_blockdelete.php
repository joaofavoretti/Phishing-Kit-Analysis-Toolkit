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
$log_block_delete = new log_block_delete();

// Run the page
$log_block_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$log_block_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var flog_blockdelete = currentForm = new ew.Form("flog_blockdelete", "delete");

// Form_CustomValidate event
flog_blockdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
flog_blockdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $log_block_delete->showPageHeader(); ?>
<?php
$log_block_delete->showMessage();
?>
<form name="flog_blockdelete" id="flog_blockdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($log_block_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $log_block_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="log_block">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($log_block_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($log_block->height_block->Visible) { // height_block ?>
		<th class="<?php echo $log_block->height_block->headerCellClass() ?>"><span id="elh_log_block_height_block" class="log_block_height_block"><?php echo $log_block->height_block->caption() ?></span></th>
<?php } ?>
<?php if ($log_block->time_mined->Visible) { // time_mined ?>
		<th class="<?php echo $log_block->time_mined->headerCellClass() ?>"><span id="elh_log_block_time_mined" class="log_block_time_mined"><?php echo $log_block->time_mined->caption() ?></span></th>
<?php } ?>
<?php if ($log_block->size->Visible) { // size ?>
		<th class="<?php echo $log_block->size->headerCellClass() ?>"><span id="elh_log_block_size" class="log_block_size"><?php echo $log_block->size->caption() ?></span></th>
<?php } ?>
<?php if ($log_block->gasused->Visible) { // gasused ?>
		<th class="<?php echo $log_block->gasused->headerCellClass() ?>"><span id="elh_log_block_gasused" class="log_block_gasused"><?php echo $log_block->gasused->caption() ?></span></th>
<?php } ?>
<?php if ($log_block->nonce->Visible) { // nonce ?>
		<th class="<?php echo $log_block->nonce->headerCellClass() ?>"><span id="elh_log_block_nonce" class="log_block_nonce"><?php echo $log_block->nonce->caption() ?></span></th>
<?php } ?>
<?php if ($log_block->tx_num->Visible) { // tx_num ?>
		<th class="<?php echo $log_block->tx_num->headerCellClass() ?>"><span id="elh_log_block_tx_num" class="log_block_tx_num"><?php echo $log_block->tx_num->caption() ?></span></th>
<?php } ?>
<?php if ($log_block->hash_parent->Visible) { // hash_parent ?>
		<th class="<?php echo $log_block->hash_parent->headerCellClass() ?>"><span id="elh_log_block_hash_parent" class="log_block_hash_parent"><?php echo $log_block->hash_parent->caption() ?></span></th>
<?php } ?>
<?php if ($log_block->miner->Visible) { // miner ?>
		<th class="<?php echo $log_block->miner->headerCellClass() ?>"><span id="elh_log_block_miner" class="log_block_miner"><?php echo $log_block->miner->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$log_block_delete->RecCnt = 0;
$i = 0;
while (!$log_block_delete->Recordset->EOF) {
	$log_block_delete->RecCnt++;
	$log_block_delete->RowCnt++;

	// Set row properties
	$log_block->resetAttributes();
	$log_block->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$log_block_delete->loadRowValues($log_block_delete->Recordset);

	// Render row
	$log_block_delete->renderRow();
?>
	<tr<?php echo $log_block->rowAttributes() ?>>
<?php if ($log_block->height_block->Visible) { // height_block ?>
		<td<?php echo $log_block->height_block->cellAttributes() ?>>
<span id="el<?php echo $log_block_delete->RowCnt ?>_log_block_height_block" class="log_block_height_block">
<span<?php echo $log_block->height_block->viewAttributes() ?>>
<?php echo $log_block->height_block->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($log_block->time_mined->Visible) { // time_mined ?>
		<td<?php echo $log_block->time_mined->cellAttributes() ?>>
<span id="el<?php echo $log_block_delete->RowCnt ?>_log_block_time_mined" class="log_block_time_mined">
<span<?php echo $log_block->time_mined->viewAttributes() ?>>
<?php echo $log_block->time_mined->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($log_block->size->Visible) { // size ?>
		<td<?php echo $log_block->size->cellAttributes() ?>>
<span id="el<?php echo $log_block_delete->RowCnt ?>_log_block_size" class="log_block_size">
<span<?php echo $log_block->size->viewAttributes() ?>>
<?php echo $log_block->size->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($log_block->gasused->Visible) { // gasused ?>
		<td<?php echo $log_block->gasused->cellAttributes() ?>>
<span id="el<?php echo $log_block_delete->RowCnt ?>_log_block_gasused" class="log_block_gasused">
<span<?php echo $log_block->gasused->viewAttributes() ?>>
<?php echo $log_block->gasused->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($log_block->nonce->Visible) { // nonce ?>
		<td<?php echo $log_block->nonce->cellAttributes() ?>>
<span id="el<?php echo $log_block_delete->RowCnt ?>_log_block_nonce" class="log_block_nonce">
<span<?php echo $log_block->nonce->viewAttributes() ?>>
<?php echo $log_block->nonce->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($log_block->tx_num->Visible) { // tx_num ?>
		<td<?php echo $log_block->tx_num->cellAttributes() ?>>
<span id="el<?php echo $log_block_delete->RowCnt ?>_log_block_tx_num" class="log_block_tx_num">
<span<?php echo $log_block->tx_num->viewAttributes() ?>>
<?php echo $log_block->tx_num->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($log_block->hash_parent->Visible) { // hash_parent ?>
		<td<?php echo $log_block->hash_parent->cellAttributes() ?>>
<span id="el<?php echo $log_block_delete->RowCnt ?>_log_block_hash_parent" class="log_block_hash_parent">
<span<?php echo $log_block->hash_parent->viewAttributes() ?>>
<?php echo $log_block->hash_parent->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($log_block->miner->Visible) { // miner ?>
		<td<?php echo $log_block->miner->cellAttributes() ?>>
<span id="el<?php echo $log_block_delete->RowCnt ?>_log_block_miner" class="log_block_miner">
<span<?php echo $log_block->miner->viewAttributes() ?>>
<?php echo $log_block->miner->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$log_block_delete->Recordset->moveNext();
}
$log_block_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $log_block_delete->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$log_block_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$log_block_delete->terminate();
?>
