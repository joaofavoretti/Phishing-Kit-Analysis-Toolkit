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
$esbc_contract_delete = new esbc_contract_delete();

// Run the page
$esbc_contract_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$esbc_contract_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fesbc_contractdelete = currentForm = new ew.Form("fesbc_contractdelete", "delete");

// Form_CustomValidate event
fesbc_contractdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fesbc_contractdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $esbc_contract_delete->showPageHeader(); ?>
<?php
$esbc_contract_delete->showMessage();
?>
<form name="fesbc_contractdelete" id="fesbc_contractdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($esbc_contract_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $esbc_contract_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="esbc_contract">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($esbc_contract_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($esbc_contract->con_addr->Visible) { // con_addr ?>
		<th class="<?php echo $esbc_contract->con_addr->headerCellClass() ?>"><span id="elh_esbc_contract_con_addr" class="esbc_contract_con_addr"><?php echo $esbc_contract->con_addr->caption() ?></span></th>
<?php } ?>
<?php if ($esbc_contract->con_owner->Visible) { // con_owner ?>
		<th class="<?php echo $esbc_contract->con_owner->headerCellClass() ?>"><span id="elh_esbc_contract_con_owner" class="esbc_contract_con_owner"><?php echo $esbc_contract->con_owner->caption() ?></span></th>
<?php } ?>
<?php if ($esbc_contract->date_add->Visible) { // date_add ?>
		<th class="<?php echo $esbc_contract->date_add->headerCellClass() ?>"><span id="elh_esbc_contract_date_add" class="esbc_contract_date_add"><?php echo $esbc_contract->date_add->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$esbc_contract_delete->RecCnt = 0;
$i = 0;
while (!$esbc_contract_delete->Recordset->EOF) {
	$esbc_contract_delete->RecCnt++;
	$esbc_contract_delete->RowCnt++;

	// Set row properties
	$esbc_contract->resetAttributes();
	$esbc_contract->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$esbc_contract_delete->loadRowValues($esbc_contract_delete->Recordset);

	// Render row
	$esbc_contract_delete->renderRow();
?>
	<tr<?php echo $esbc_contract->rowAttributes() ?>>
<?php if ($esbc_contract->con_addr->Visible) { // con_addr ?>
		<td<?php echo $esbc_contract->con_addr->cellAttributes() ?>>
<span id="el<?php echo $esbc_contract_delete->RowCnt ?>_esbc_contract_con_addr" class="esbc_contract_con_addr">
<span<?php echo $esbc_contract->con_addr->viewAttributes() ?>>
<?php echo $esbc_contract->con_addr->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($esbc_contract->con_owner->Visible) { // con_owner ?>
		<td<?php echo $esbc_contract->con_owner->cellAttributes() ?>>
<span id="el<?php echo $esbc_contract_delete->RowCnt ?>_esbc_contract_con_owner" class="esbc_contract_con_owner">
<span<?php echo $esbc_contract->con_owner->viewAttributes() ?>>
<?php echo $esbc_contract->con_owner->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($esbc_contract->date_add->Visible) { // date_add ?>
		<td<?php echo $esbc_contract->date_add->cellAttributes() ?>>
<span id="el<?php echo $esbc_contract_delete->RowCnt ?>_esbc_contract_date_add" class="esbc_contract_date_add">
<span<?php echo $esbc_contract->date_add->viewAttributes() ?>>
<?php echo $esbc_contract->date_add->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$esbc_contract_delete->Recordset->moveNext();
}
$esbc_contract_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $esbc_contract_delete->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$esbc_contract_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$esbc_contract_delete->terminate();
?>
