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
$esbc_hub_basic_delete = new esbc_hub_basic_delete();

// Run the page
$esbc_hub_basic_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$esbc_hub_basic_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fesbc_hub_basicdelete = currentForm = new ew.Form("fesbc_hub_basicdelete", "delete");

// Form_CustomValidate event
fesbc_hub_basicdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fesbc_hub_basicdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fesbc_hub_basicdelete.lists["x_HOST_INDEX"] = <?php echo $esbc_hub_basic_delete->HOST_INDEX->Lookup->toClientList() ?>;
fesbc_hub_basicdelete.lists["x_HOST_INDEX"].options = <?php echo JsonEncode($esbc_hub_basic_delete->HOST_INDEX->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $esbc_hub_basic_delete->showPageHeader(); ?>
<?php
$esbc_hub_basic_delete->showMessage();
?>
<form name="fesbc_hub_basicdelete" id="fesbc_hub_basicdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($esbc_hub_basic_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $esbc_hub_basic_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="esbc_hub_basic">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($esbc_hub_basic_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($esbc_hub_basic->HUB_INDEX->Visible) { // HUB_INDEX ?>
		<th class="<?php echo $esbc_hub_basic->HUB_INDEX->headerCellClass() ?>"><span id="elh_esbc_hub_basic_HUB_INDEX" class="esbc_hub_basic_HUB_INDEX"><?php echo $esbc_hub_basic->HUB_INDEX->caption() ?></span></th>
<?php } ?>
<?php if ($esbc_hub_basic->HOST_INDEX->Visible) { // HOST_INDEX ?>
		<th class="<?php echo $esbc_hub_basic->HOST_INDEX->headerCellClass() ?>"><span id="elh_esbc_hub_basic_HOST_INDEX" class="esbc_hub_basic_HOST_INDEX"><?php echo $esbc_hub_basic->HOST_INDEX->caption() ?></span></th>
<?php } ?>
<?php if ($esbc_hub_basic->HUB_NAME->Visible) { // HUB_NAME ?>
		<th class="<?php echo $esbc_hub_basic->HUB_NAME->headerCellClass() ?>"><span id="elh_esbc_hub_basic_HUB_NAME" class="esbc_hub_basic_HUB_NAME"><?php echo $esbc_hub_basic->HUB_NAME->caption() ?></span></th>
<?php } ?>
<?php if ($esbc_hub_basic->Create_Date->Visible) { // Create_Date ?>
		<th class="<?php echo $esbc_hub_basic->Create_Date->headerCellClass() ?>"><span id="elh_esbc_hub_basic_Create_Date" class="esbc_hub_basic_Create_Date"><?php echo $esbc_hub_basic->Create_Date->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$esbc_hub_basic_delete->RecCnt = 0;
$i = 0;
while (!$esbc_hub_basic_delete->Recordset->EOF) {
	$esbc_hub_basic_delete->RecCnt++;
	$esbc_hub_basic_delete->RowCnt++;

	// Set row properties
	$esbc_hub_basic->resetAttributes();
	$esbc_hub_basic->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$esbc_hub_basic_delete->loadRowValues($esbc_hub_basic_delete->Recordset);

	// Render row
	$esbc_hub_basic_delete->renderRow();
?>
	<tr<?php echo $esbc_hub_basic->rowAttributes() ?>>
<?php if ($esbc_hub_basic->HUB_INDEX->Visible) { // HUB_INDEX ?>
		<td<?php echo $esbc_hub_basic->HUB_INDEX->cellAttributes() ?>>
<span id="el<?php echo $esbc_hub_basic_delete->RowCnt ?>_esbc_hub_basic_HUB_INDEX" class="esbc_hub_basic_HUB_INDEX">
<span<?php echo $esbc_hub_basic->HUB_INDEX->viewAttributes() ?>>
<?php echo $esbc_hub_basic->HUB_INDEX->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($esbc_hub_basic->HOST_INDEX->Visible) { // HOST_INDEX ?>
		<td<?php echo $esbc_hub_basic->HOST_INDEX->cellAttributes() ?>>
<span id="el<?php echo $esbc_hub_basic_delete->RowCnt ?>_esbc_hub_basic_HOST_INDEX" class="esbc_hub_basic_HOST_INDEX">
<span<?php echo $esbc_hub_basic->HOST_INDEX->viewAttributes() ?>>
<?php echo $esbc_hub_basic->HOST_INDEX->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($esbc_hub_basic->HUB_NAME->Visible) { // HUB_NAME ?>
		<td<?php echo $esbc_hub_basic->HUB_NAME->cellAttributes() ?>>
<span id="el<?php echo $esbc_hub_basic_delete->RowCnt ?>_esbc_hub_basic_HUB_NAME" class="esbc_hub_basic_HUB_NAME">
<span<?php echo $esbc_hub_basic->HUB_NAME->viewAttributes() ?>>
<?php echo $esbc_hub_basic->HUB_NAME->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($esbc_hub_basic->Create_Date->Visible) { // Create_Date ?>
		<td<?php echo $esbc_hub_basic->Create_Date->cellAttributes() ?>>
<span id="el<?php echo $esbc_hub_basic_delete->RowCnt ?>_esbc_hub_basic_Create_Date" class="esbc_hub_basic_Create_Date">
<span<?php echo $esbc_hub_basic->Create_Date->viewAttributes() ?>>
<?php echo $esbc_hub_basic->Create_Date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$esbc_hub_basic_delete->Recordset->moveNext();
}
$esbc_hub_basic_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $esbc_hub_basic_delete->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$esbc_hub_basic_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$esbc_hub_basic_delete->terminate();
?>
