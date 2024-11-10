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
$esbc_location_delete = new esbc_location_delete();

// Run the page
$esbc_location_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$esbc_location_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fesbc_locationdelete = currentForm = new ew.Form("fesbc_locationdelete", "delete");

// Form_CustomValidate event
fesbc_locationdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fesbc_locationdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $esbc_location_delete->showPageHeader(); ?>
<?php
$esbc_location_delete->showMessage();
?>
<form name="fesbc_locationdelete" id="fesbc_locationdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($esbc_location_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $esbc_location_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="esbc_location">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($esbc_location_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($esbc_location->L_index->Visible) { // L_index ?>
		<th class="<?php echo $esbc_location->L_index->headerCellClass() ?>"><span id="elh_esbc_location_L_index" class="esbc_location_L_index"><?php echo $esbc_location->L_index->caption() ?></span></th>
<?php } ?>
<?php if ($esbc_location->VPS->Visible) { // VPS ?>
		<th class="<?php echo $esbc_location->VPS->headerCellClass() ?>"><span id="elh_esbc_location_VPS" class="esbc_location_VPS"><?php echo $esbc_location->VPS->caption() ?></span></th>
<?php } ?>
<?php if ($esbc_location->VPS_URL->Visible) { // VPS_URL ?>
		<th class="<?php echo $esbc_location->VPS_URL->headerCellClass() ?>"><span id="elh_esbc_location_VPS_URL" class="esbc_location_VPS_URL"><?php echo $esbc_location->VPS_URL->caption() ?></span></th>
<?php } ?>
<?php if ($esbc_location->L_Name->Visible) { // L_Name ?>
		<th class="<?php echo $esbc_location->L_Name->headerCellClass() ?>"><span id="elh_esbc_location_L_Name" class="esbc_location_L_Name"><?php echo $esbc_location->L_Name->caption() ?></span></th>
<?php } ?>
<?php if ($esbc_location->L_Lat->Visible) { // L_Lat ?>
		<th class="<?php echo $esbc_location->L_Lat->headerCellClass() ?>"><span id="elh_esbc_location_L_Lat" class="esbc_location_L_Lat"><?php echo $esbc_location->L_Lat->caption() ?></span></th>
<?php } ?>
<?php if ($esbc_location->L_Lon->Visible) { // L_Lon ?>
		<th class="<?php echo $esbc_location->L_Lon->headerCellClass() ?>"><span id="elh_esbc_location_L_Lon" class="esbc_location_L_Lon"><?php echo $esbc_location->L_Lon->caption() ?></span></th>
<?php } ?>
<?php if ($esbc_location->Create_Date->Visible) { // Create_Date ?>
		<th class="<?php echo $esbc_location->Create_Date->headerCellClass() ?>"><span id="elh_esbc_location_Create_Date" class="esbc_location_Create_Date"><?php echo $esbc_location->Create_Date->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$esbc_location_delete->RecCnt = 0;
$i = 0;
while (!$esbc_location_delete->Recordset->EOF) {
	$esbc_location_delete->RecCnt++;
	$esbc_location_delete->RowCnt++;

	// Set row properties
	$esbc_location->resetAttributes();
	$esbc_location->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$esbc_location_delete->loadRowValues($esbc_location_delete->Recordset);

	// Render row
	$esbc_location_delete->renderRow();
?>
	<tr<?php echo $esbc_location->rowAttributes() ?>>
<?php if ($esbc_location->L_index->Visible) { // L_index ?>
		<td<?php echo $esbc_location->L_index->cellAttributes() ?>>
<span id="el<?php echo $esbc_location_delete->RowCnt ?>_esbc_location_L_index" class="esbc_location_L_index">
<span<?php echo $esbc_location->L_index->viewAttributes() ?>>
<?php echo $esbc_location->L_index->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($esbc_location->VPS->Visible) { // VPS ?>
		<td<?php echo $esbc_location->VPS->cellAttributes() ?>>
<span id="el<?php echo $esbc_location_delete->RowCnt ?>_esbc_location_VPS" class="esbc_location_VPS">
<span<?php echo $esbc_location->VPS->viewAttributes() ?>>
<?php echo $esbc_location->VPS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($esbc_location->VPS_URL->Visible) { // VPS_URL ?>
		<td<?php echo $esbc_location->VPS_URL->cellAttributes() ?>>
<span id="el<?php echo $esbc_location_delete->RowCnt ?>_esbc_location_VPS_URL" class="esbc_location_VPS_URL">
<span<?php echo $esbc_location->VPS_URL->viewAttributes() ?>>
<?php echo $esbc_location->VPS_URL->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($esbc_location->L_Name->Visible) { // L_Name ?>
		<td<?php echo $esbc_location->L_Name->cellAttributes() ?>>
<span id="el<?php echo $esbc_location_delete->RowCnt ?>_esbc_location_L_Name" class="esbc_location_L_Name">
<span<?php echo $esbc_location->L_Name->viewAttributes() ?>>
<?php echo $esbc_location->L_Name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($esbc_location->L_Lat->Visible) { // L_Lat ?>
		<td<?php echo $esbc_location->L_Lat->cellAttributes() ?>>
<span id="el<?php echo $esbc_location_delete->RowCnt ?>_esbc_location_L_Lat" class="esbc_location_L_Lat">
<span<?php echo $esbc_location->L_Lat->viewAttributes() ?>>
<?php echo $esbc_location->L_Lat->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($esbc_location->L_Lon->Visible) { // L_Lon ?>
		<td<?php echo $esbc_location->L_Lon->cellAttributes() ?>>
<span id="el<?php echo $esbc_location_delete->RowCnt ?>_esbc_location_L_Lon" class="esbc_location_L_Lon">
<span<?php echo $esbc_location->L_Lon->viewAttributes() ?>>
<?php echo $esbc_location->L_Lon->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($esbc_location->Create_Date->Visible) { // Create_Date ?>
		<td<?php echo $esbc_location->Create_Date->cellAttributes() ?>>
<span id="el<?php echo $esbc_location_delete->RowCnt ?>_esbc_location_Create_Date" class="esbc_location_Create_Date">
<span<?php echo $esbc_location->Create_Date->viewAttributes() ?>>
<?php echo $esbc_location->Create_Date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$esbc_location_delete->Recordset->moveNext();
}
$esbc_location_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $esbc_location_delete->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$esbc_location_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$esbc_location_delete->terminate();
?>
