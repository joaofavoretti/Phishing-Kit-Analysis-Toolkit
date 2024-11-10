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
$basic_acc_delete = new basic_acc_delete();

// Run the page
$basic_acc_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$basic_acc_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fbasic_accdelete = currentForm = new ew.Form("fbasic_accdelete", "delete");

// Form_CustomValidate event
fbasic_accdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fbasic_accdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fbasic_accdelete.lists["x_type"] = <?php echo $basic_acc_delete->type->Lookup->toClientList() ?>;
fbasic_accdelete.lists["x_type"].options = <?php echo JsonEncode($basic_acc_delete->type->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $basic_acc_delete->showPageHeader(); ?>
<?php
$basic_acc_delete->showMessage();
?>
<form name="fbasic_accdelete" id="fbasic_accdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($basic_acc_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $basic_acc_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="basic_acc">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($basic_acc_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($basic_acc->acc_addr->Visible) { // acc_addr ?>
		<th class="<?php echo $basic_acc->acc_addr->headerCellClass() ?>"><span id="elh_basic_acc_acc_addr" class="basic_acc_acc_addr"><?php echo $basic_acc->acc_addr->caption() ?></span></th>
<?php } ?>
<?php if ($basic_acc->acc_name->Visible) { // acc_name ?>
		<th class="<?php echo $basic_acc->acc_name->headerCellClass() ?>"><span id="elh_basic_acc_acc_name" class="basic_acc_acc_name"><?php echo $basic_acc->acc_name->caption() ?></span></th>
<?php } ?>
<?php if ($basic_acc->type->Visible) { // type ?>
		<th class="<?php echo $basic_acc->type->headerCellClass() ?>"><span id="elh_basic_acc_type" class="basic_acc_type"><?php echo $basic_acc->type->caption() ?></span></th>
<?php } ?>
<?php if ($basic_acc->balance->Visible) { // balance ?>
		<th class="<?php echo $basic_acc->balance->headerCellClass() ?>"><span id="elh_basic_acc_balance" class="basic_acc_balance"><?php echo $basic_acc->balance->caption() ?></span></th>
<?php } ?>
<?php if ($basic_acc->txcount->Visible) { // txcount ?>
		<th class="<?php echo $basic_acc->txcount->headerCellClass() ?>"><span id="elh_basic_acc_txcount" class="basic_acc_txcount"><?php echo $basic_acc->txcount->caption() ?></span></th>
<?php } ?>
<?php if ($basic_acc->dateadd->Visible) { // dateadd ?>
		<th class="<?php echo $basic_acc->dateadd->headerCellClass() ?>"><span id="elh_basic_acc_dateadd" class="basic_acc_dateadd"><?php echo $basic_acc->dateadd->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$basic_acc_delete->RecCnt = 0;
$i = 0;
while (!$basic_acc_delete->Recordset->EOF) {
	$basic_acc_delete->RecCnt++;
	$basic_acc_delete->RowCnt++;

	// Set row properties
	$basic_acc->resetAttributes();
	$basic_acc->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$basic_acc_delete->loadRowValues($basic_acc_delete->Recordset);

	// Render row
	$basic_acc_delete->renderRow();
?>
	<tr<?php echo $basic_acc->rowAttributes() ?>>
<?php if ($basic_acc->acc_addr->Visible) { // acc_addr ?>
		<td<?php echo $basic_acc->acc_addr->cellAttributes() ?>>
<span id="el<?php echo $basic_acc_delete->RowCnt ?>_basic_acc_acc_addr" class="basic_acc_acc_addr">
<span<?php echo $basic_acc->acc_addr->viewAttributes() ?>>
<?php echo $basic_acc->acc_addr->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($basic_acc->acc_name->Visible) { // acc_name ?>
		<td<?php echo $basic_acc->acc_name->cellAttributes() ?>>
<span id="el<?php echo $basic_acc_delete->RowCnt ?>_basic_acc_acc_name" class="basic_acc_acc_name">
<span<?php echo $basic_acc->acc_name->viewAttributes() ?>>
<?php echo $basic_acc->acc_name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($basic_acc->type->Visible) { // type ?>
		<td<?php echo $basic_acc->type->cellAttributes() ?>>
<span id="el<?php echo $basic_acc_delete->RowCnt ?>_basic_acc_type" class="basic_acc_type">
<span<?php echo $basic_acc->type->viewAttributes() ?>>
<?php echo $basic_acc->type->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($basic_acc->balance->Visible) { // balance ?>
		<td<?php echo $basic_acc->balance->cellAttributes() ?>>
<span id="el<?php echo $basic_acc_delete->RowCnt ?>_basic_acc_balance" class="basic_acc_balance">
<span<?php echo $basic_acc->balance->viewAttributes() ?>>
<?php echo $basic_acc->balance->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($basic_acc->txcount->Visible) { // txcount ?>
		<td<?php echo $basic_acc->txcount->cellAttributes() ?>>
<span id="el<?php echo $basic_acc_delete->RowCnt ?>_basic_acc_txcount" class="basic_acc_txcount">
<span<?php echo $basic_acc->txcount->viewAttributes() ?>>
<?php echo $basic_acc->txcount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($basic_acc->dateadd->Visible) { // dateadd ?>
		<td<?php echo $basic_acc->dateadd->cellAttributes() ?>>
<span id="el<?php echo $basic_acc_delete->RowCnt ?>_basic_acc_dateadd" class="basic_acc_dateadd">
<span<?php echo $basic_acc->dateadd->viewAttributes() ?>>
<?php echo $basic_acc->dateadd->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$basic_acc_delete->Recordset->moveNext();
}
$basic_acc_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $basic_acc_delete->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$basic_acc_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$basic_acc_delete->terminate();
?>
