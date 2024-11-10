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
$esbc_host_basic_delete = new esbc_host_basic_delete();

// Run the page
$esbc_host_basic_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$esbc_host_basic_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fesbc_host_basicdelete = currentForm = new ew.Form("fesbc_host_basicdelete", "delete");

// Form_CustomValidate event
fesbc_host_basicdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fesbc_host_basicdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fesbc_host_basicdelete.lists["x_HOST_LOCATION"] = <?php echo $esbc_host_basic_delete->HOST_LOCATION->Lookup->toClientList() ?>;
fesbc_host_basicdelete.lists["x_HOST_LOCATION"].options = <?php echo JsonEncode($esbc_host_basic_delete->HOST_LOCATION->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $esbc_host_basic_delete->showPageHeader(); ?>
<?php
$esbc_host_basic_delete->showMessage();
?>
<form name="fesbc_host_basicdelete" id="fesbc_host_basicdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($esbc_host_basic_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $esbc_host_basic_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="esbc_host_basic">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($esbc_host_basic_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($esbc_host_basic->HOST_TYPE->Visible) { // HOST_TYPE ?>
		<th class="<?php echo $esbc_host_basic->HOST_TYPE->headerCellClass() ?>"><span id="elh_esbc_host_basic_HOST_TYPE" class="esbc_host_basic_HOST_TYPE"><?php echo $esbc_host_basic->HOST_TYPE->caption() ?></span></th>
<?php } ?>
<?php if ($esbc_host_basic->HOSTNAME->Visible) { // HOSTNAME ?>
		<th class="<?php echo $esbc_host_basic->HOSTNAME->headerCellClass() ?>"><span id="elh_esbc_host_basic_HOSTNAME" class="esbc_host_basic_HOSTNAME"><?php echo $esbc_host_basic->HOSTNAME->caption() ?></span></th>
<?php } ?>
<?php if ($esbc_host_basic->HOST_LOCATION->Visible) { // HOST_LOCATION ?>
		<th class="<?php echo $esbc_host_basic->HOST_LOCATION->headerCellClass() ?>"><span id="elh_esbc_host_basic_HOST_LOCATION" class="esbc_host_basic_HOST_LOCATION"><?php echo $esbc_host_basic->HOST_LOCATION->caption() ?></span></th>
<?php } ?>
<?php if ($esbc_host_basic->HOST_ROOTID->Visible) { // HOST_ROOTID ?>
		<th class="<?php echo $esbc_host_basic->HOST_ROOTID->headerCellClass() ?>"><span id="elh_esbc_host_basic_HOST_ROOTID" class="esbc_host_basic_HOST_ROOTID"><?php echo $esbc_host_basic->HOST_ROOTID->caption() ?></span></th>
<?php } ?>
<?php if ($esbc_host_basic->HOST_IP->Visible) { // HOST_IP ?>
		<th class="<?php echo $esbc_host_basic->HOST_IP->headerCellClass() ?>"><span id="elh_esbc_host_basic_HOST_IP" class="esbc_host_basic_HOST_IP"><?php echo $esbc_host_basic->HOST_IP->caption() ?></span></th>
<?php } ?>
<?php if ($esbc_host_basic->HOST_PW->Visible) { // HOST_PW ?>
		<th class="<?php echo $esbc_host_basic->HOST_PW->headerCellClass() ?>"><span id="elh_esbc_host_basic_HOST_PW" class="esbc_host_basic_HOST_PW"><?php echo $esbc_host_basic->HOST_PW->caption() ?></span></th>
<?php } ?>
<?php if ($esbc_host_basic->HOST_OWNER->Visible) { // HOST_OWNER ?>
		<th class="<?php echo $esbc_host_basic->HOST_OWNER->headerCellClass() ?>"><span id="elh_esbc_host_basic_HOST_OWNER" class="esbc_host_basic_HOST_OWNER"><?php echo $esbc_host_basic->HOST_OWNER->caption() ?></span></th>
<?php } ?>
<?php if ($esbc_host_basic->Create_Date->Visible) { // Create_Date ?>
		<th class="<?php echo $esbc_host_basic->Create_Date->headerCellClass() ?>"><span id="elh_esbc_host_basic_Create_Date" class="esbc_host_basic_Create_Date"><?php echo $esbc_host_basic->Create_Date->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$esbc_host_basic_delete->RecCnt = 0;
$i = 0;
while (!$esbc_host_basic_delete->Recordset->EOF) {
	$esbc_host_basic_delete->RecCnt++;
	$esbc_host_basic_delete->RowCnt++;

	// Set row properties
	$esbc_host_basic->resetAttributes();
	$esbc_host_basic->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$esbc_host_basic_delete->loadRowValues($esbc_host_basic_delete->Recordset);

	// Render row
	$esbc_host_basic_delete->renderRow();
?>
	<tr<?php echo $esbc_host_basic->rowAttributes() ?>>
<?php if ($esbc_host_basic->HOST_TYPE->Visible) { // HOST_TYPE ?>
		<td<?php echo $esbc_host_basic->HOST_TYPE->cellAttributes() ?>>
<span id="el<?php echo $esbc_host_basic_delete->RowCnt ?>_esbc_host_basic_HOST_TYPE" class="esbc_host_basic_HOST_TYPE">
<span<?php echo $esbc_host_basic->HOST_TYPE->viewAttributes() ?>>
<?php echo $esbc_host_basic->HOST_TYPE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($esbc_host_basic->HOSTNAME->Visible) { // HOSTNAME ?>
		<td<?php echo $esbc_host_basic->HOSTNAME->cellAttributes() ?>>
<span id="el<?php echo $esbc_host_basic_delete->RowCnt ?>_esbc_host_basic_HOSTNAME" class="esbc_host_basic_HOSTNAME">
<span<?php echo $esbc_host_basic->HOSTNAME->viewAttributes() ?>>
<?php echo $esbc_host_basic->HOSTNAME->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($esbc_host_basic->HOST_LOCATION->Visible) { // HOST_LOCATION ?>
		<td<?php echo $esbc_host_basic->HOST_LOCATION->cellAttributes() ?>>
<span id="el<?php echo $esbc_host_basic_delete->RowCnt ?>_esbc_host_basic_HOST_LOCATION" class="esbc_host_basic_HOST_LOCATION">
<span<?php echo $esbc_host_basic->HOST_LOCATION->viewAttributes() ?>>
<?php echo $esbc_host_basic->HOST_LOCATION->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($esbc_host_basic->HOST_ROOTID->Visible) { // HOST_ROOTID ?>
		<td<?php echo $esbc_host_basic->HOST_ROOTID->cellAttributes() ?>>
<span id="el<?php echo $esbc_host_basic_delete->RowCnt ?>_esbc_host_basic_HOST_ROOTID" class="esbc_host_basic_HOST_ROOTID">
<span<?php echo $esbc_host_basic->HOST_ROOTID->viewAttributes() ?>>
<?php echo $esbc_host_basic->HOST_ROOTID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($esbc_host_basic->HOST_IP->Visible) { // HOST_IP ?>
		<td<?php echo $esbc_host_basic->HOST_IP->cellAttributes() ?>>
<span id="el<?php echo $esbc_host_basic_delete->RowCnt ?>_esbc_host_basic_HOST_IP" class="esbc_host_basic_HOST_IP">
<span<?php echo $esbc_host_basic->HOST_IP->viewAttributes() ?>>
<?php echo $esbc_host_basic->HOST_IP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($esbc_host_basic->HOST_PW->Visible) { // HOST_PW ?>
		<td<?php echo $esbc_host_basic->HOST_PW->cellAttributes() ?>>
<span id="el<?php echo $esbc_host_basic_delete->RowCnt ?>_esbc_host_basic_HOST_PW" class="esbc_host_basic_HOST_PW">
<span<?php echo $esbc_host_basic->HOST_PW->viewAttributes() ?>>
<?php echo $esbc_host_basic->HOST_PW->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($esbc_host_basic->HOST_OWNER->Visible) { // HOST_OWNER ?>
		<td<?php echo $esbc_host_basic->HOST_OWNER->cellAttributes() ?>>
<span id="el<?php echo $esbc_host_basic_delete->RowCnt ?>_esbc_host_basic_HOST_OWNER" class="esbc_host_basic_HOST_OWNER">
<span<?php echo $esbc_host_basic->HOST_OWNER->viewAttributes() ?>>
<?php echo $esbc_host_basic->HOST_OWNER->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($esbc_host_basic->Create_Date->Visible) { // Create_Date ?>
		<td<?php echo $esbc_host_basic->Create_Date->cellAttributes() ?>>
<span id="el<?php echo $esbc_host_basic_delete->RowCnt ?>_esbc_host_basic_Create_Date" class="esbc_host_basic_Create_Date">
<span<?php echo $esbc_host_basic->Create_Date->viewAttributes() ?>>
<?php echo $esbc_host_basic->Create_Date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$esbc_host_basic_delete->Recordset->moveNext();
}
$esbc_host_basic_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $esbc_host_basic_delete->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$esbc_host_basic_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$esbc_host_basic_delete->terminate();
?>
