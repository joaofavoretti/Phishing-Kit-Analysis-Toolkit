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
$esbc_genesis_delete = new esbc_genesis_delete();

// Run the page
$esbc_genesis_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$esbc_genesis_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fesbc_genesisdelete = currentForm = new ew.Form("fesbc_genesisdelete", "delete");

// Form_CustomValidate event
fesbc_genesisdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fesbc_genesisdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $esbc_genesis_delete->showPageHeader(); ?>
<?php
$esbc_genesis_delete->showMessage();
?>
<form name="fesbc_genesisdelete" id="fesbc_genesisdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($esbc_genesis_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $esbc_genesis_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="esbc_genesis">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($esbc_genesis_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($esbc_genesis->GENESIS_INDEX->Visible) { // GENESIS_INDEX ?>
		<th class="<?php echo $esbc_genesis->GENESIS_INDEX->headerCellClass() ?>"><span id="elh_esbc_genesis_GENESIS_INDEX" class="esbc_genesis_GENESIS_INDEX"><?php echo $esbc_genesis->GENESIS_INDEX->caption() ?></span></th>
<?php } ?>
<?php if ($esbc_genesis->GENESIS_NAME->Visible) { // GENESIS_NAME ?>
		<th class="<?php echo $esbc_genesis->GENESIS_NAME->headerCellClass() ?>"><span id="elh_esbc_genesis_GENESIS_NAME" class="esbc_genesis_GENESIS_NAME"><?php echo $esbc_genesis->GENESIS_NAME->caption() ?></span></th>
<?php } ?>
<?php if ($esbc_genesis->Create_Date->Visible) { // Create_Date ?>
		<th class="<?php echo $esbc_genesis->Create_Date->headerCellClass() ?>"><span id="elh_esbc_genesis_Create_Date" class="esbc_genesis_Create_Date"><?php echo $esbc_genesis->Create_Date->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$esbc_genesis_delete->RecCnt = 0;
$i = 0;
while (!$esbc_genesis_delete->Recordset->EOF) {
	$esbc_genesis_delete->RecCnt++;
	$esbc_genesis_delete->RowCnt++;

	// Set row properties
	$esbc_genesis->resetAttributes();
	$esbc_genesis->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$esbc_genesis_delete->loadRowValues($esbc_genesis_delete->Recordset);

	// Render row
	$esbc_genesis_delete->renderRow();
?>
	<tr<?php echo $esbc_genesis->rowAttributes() ?>>
<?php if ($esbc_genesis->GENESIS_INDEX->Visible) { // GENESIS_INDEX ?>
		<td<?php echo $esbc_genesis->GENESIS_INDEX->cellAttributes() ?>>
<span id="el<?php echo $esbc_genesis_delete->RowCnt ?>_esbc_genesis_GENESIS_INDEX" class="esbc_genesis_GENESIS_INDEX">
<span<?php echo $esbc_genesis->GENESIS_INDEX->viewAttributes() ?>>
<?php echo $esbc_genesis->GENESIS_INDEX->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($esbc_genesis->GENESIS_NAME->Visible) { // GENESIS_NAME ?>
		<td<?php echo $esbc_genesis->GENESIS_NAME->cellAttributes() ?>>
<span id="el<?php echo $esbc_genesis_delete->RowCnt ?>_esbc_genesis_GENESIS_NAME" class="esbc_genesis_GENESIS_NAME">
<span<?php echo $esbc_genesis->GENESIS_NAME->viewAttributes() ?>>
<?php echo $esbc_genesis->GENESIS_NAME->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($esbc_genesis->Create_Date->Visible) { // Create_Date ?>
		<td<?php echo $esbc_genesis->Create_Date->cellAttributes() ?>>
<span id="el<?php echo $esbc_genesis_delete->RowCnt ?>_esbc_genesis_Create_Date" class="esbc_genesis_Create_Date">
<span<?php echo $esbc_genesis->Create_Date->viewAttributes() ?>>
<?php echo $esbc_genesis->Create_Date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$esbc_genesis_delete->Recordset->moveNext();
}
$esbc_genesis_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $esbc_genesis_delete->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$esbc_genesis_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$esbc_genesis_delete->terminate();
?>
