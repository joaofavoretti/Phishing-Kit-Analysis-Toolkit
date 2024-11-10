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
$esbc_geth_par_delete = new esbc_geth_par_delete();

// Run the page
$esbc_geth_par_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$esbc_geth_par_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fesbc_geth_pardelete = currentForm = new ew.Form("fesbc_geth_pardelete", "delete");

// Form_CustomValidate event
fesbc_geth_pardelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fesbc_geth_pardelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $esbc_geth_par_delete->showPageHeader(); ?>
<?php
$esbc_geth_par_delete->showMessage();
?>
<form name="fesbc_geth_pardelete" id="fesbc_geth_pardelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($esbc_geth_par_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $esbc_geth_par_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="esbc_geth_par">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($esbc_geth_par_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($esbc_geth_par->GETH_INDEX->Visible) { // GETH_INDEX ?>
		<th class="<?php echo $esbc_geth_par->GETH_INDEX->headerCellClass() ?>"><span id="elh_esbc_geth_par_GETH_INDEX" class="esbc_geth_par_GETH_INDEX"><?php echo $esbc_geth_par->GETH_INDEX->caption() ?></span></th>
<?php } ?>
<?php if ($esbc_geth_par->HOST_TYPE->Visible) { // HOST_TYPE ?>
		<th class="<?php echo $esbc_geth_par->HOST_TYPE->headerCellClass() ?>"><span id="elh_esbc_geth_par_HOST_TYPE" class="esbc_geth_par_HOST_TYPE"><?php echo $esbc_geth_par->HOST_TYPE->caption() ?></span></th>
<?php } ?>
<?php if ($esbc_geth_par->GETH_PATH->Visible) { // GETH_PATH ?>
		<th class="<?php echo $esbc_geth_par->GETH_PATH->headerCellClass() ?>"><span id="elh_esbc_geth_par_GETH_PATH" class="esbc_geth_par_GETH_PATH"><?php echo $esbc_geth_par->GETH_PATH->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$esbc_geth_par_delete->RecCnt = 0;
$i = 0;
while (!$esbc_geth_par_delete->Recordset->EOF) {
	$esbc_geth_par_delete->RecCnt++;
	$esbc_geth_par_delete->RowCnt++;

	// Set row properties
	$esbc_geth_par->resetAttributes();
	$esbc_geth_par->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$esbc_geth_par_delete->loadRowValues($esbc_geth_par_delete->Recordset);

	// Render row
	$esbc_geth_par_delete->renderRow();
?>
	<tr<?php echo $esbc_geth_par->rowAttributes() ?>>
<?php if ($esbc_geth_par->GETH_INDEX->Visible) { // GETH_INDEX ?>
		<td<?php echo $esbc_geth_par->GETH_INDEX->cellAttributes() ?>>
<span id="el<?php echo $esbc_geth_par_delete->RowCnt ?>_esbc_geth_par_GETH_INDEX" class="esbc_geth_par_GETH_INDEX">
<span<?php echo $esbc_geth_par->GETH_INDEX->viewAttributes() ?>>
<?php echo $esbc_geth_par->GETH_INDEX->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($esbc_geth_par->HOST_TYPE->Visible) { // HOST_TYPE ?>
		<td<?php echo $esbc_geth_par->HOST_TYPE->cellAttributes() ?>>
<span id="el<?php echo $esbc_geth_par_delete->RowCnt ?>_esbc_geth_par_HOST_TYPE" class="esbc_geth_par_HOST_TYPE">
<span<?php echo $esbc_geth_par->HOST_TYPE->viewAttributes() ?>>
<?php echo $esbc_geth_par->HOST_TYPE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($esbc_geth_par->GETH_PATH->Visible) { // GETH_PATH ?>
		<td<?php echo $esbc_geth_par->GETH_PATH->cellAttributes() ?>>
<span id="el<?php echo $esbc_geth_par_delete->RowCnt ?>_esbc_geth_par_GETH_PATH" class="esbc_geth_par_GETH_PATH">
<span<?php echo $esbc_geth_par->GETH_PATH->viewAttributes() ?>>
<?php echo $esbc_geth_par->GETH_PATH->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$esbc_geth_par_delete->Recordset->moveNext();
}
$esbc_geth_par_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $esbc_geth_par_delete->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$esbc_geth_par_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$esbc_geth_par_delete->terminate();
?>
