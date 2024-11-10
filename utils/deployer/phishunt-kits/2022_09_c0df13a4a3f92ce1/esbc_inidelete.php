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
$esbc_ini_delete = new esbc_ini_delete();

// Run the page
$esbc_ini_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$esbc_ini_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fesbc_inidelete = currentForm = new ew.Form("fesbc_inidelete", "delete");

// Form_CustomValidate event
fesbc_inidelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fesbc_inidelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $esbc_ini_delete->showPageHeader(); ?>
<?php
$esbc_ini_delete->showMessage();
?>
<form name="fesbc_inidelete" id="fesbc_inidelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($esbc_ini_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $esbc_ini_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="esbc_ini">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($esbc_ini_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($esbc_ini->HOSTNAME->Visible) { // HOSTNAME ?>
		<th class="<?php echo $esbc_ini->HOSTNAME->headerCellClass() ?>"><span id="elh_esbc_ini_HOSTNAME" class="esbc_ini_HOSTNAME"><?php echo $esbc_ini->HOSTNAME->caption() ?></span></th>
<?php } ?>
<?php if ($esbc_ini->BCS_ROOTNAME->Visible) { // BCS_ROOTNAME ?>
		<th class="<?php echo $esbc_ini->BCS_ROOTNAME->headerCellClass() ?>"><span id="elh_esbc_ini_BCS_ROOTNAME" class="esbc_ini_BCS_ROOTNAME"><?php echo $esbc_ini->BCS_ROOTNAME->caption() ?></span></th>
<?php } ?>
<?php if ($esbc_ini->HOST_IP->Visible) { // HOST_IP ?>
		<th class="<?php echo $esbc_ini->HOST_IP->headerCellClass() ?>"><span id="elh_esbc_ini_HOST_IP" class="esbc_ini_HOST_IP"><?php echo $esbc_ini->HOST_IP->caption() ?></span></th>
<?php } ?>
<?php if ($esbc_ini->HOST_OWNER->Visible) { // HOST_OWNER ?>
		<th class="<?php echo $esbc_ini->HOST_OWNER->headerCellClass() ?>"><span id="elh_esbc_ini_HOST_OWNER" class="esbc_ini_HOST_OWNER"><?php echo $esbc_ini->HOST_OWNER->caption() ?></span></th>
<?php } ?>
<?php if ($esbc_ini->MYSQL_OWNER->Visible) { // MYSQL_OWNER ?>
		<th class="<?php echo $esbc_ini->MYSQL_OWNER->headerCellClass() ?>"><span id="elh_esbc_ini_MYSQL_OWNER" class="esbc_ini_MYSQL_OWNER"><?php echo $esbc_ini->MYSQL_OWNER->caption() ?></span></th>
<?php } ?>
<?php if ($esbc_ini->FTP_OWNER->Visible) { // FTP_OWNER ?>
		<th class="<?php echo $esbc_ini->FTP_OWNER->headerCellClass() ?>"><span id="elh_esbc_ini_FTP_OWNER" class="esbc_ini_FTP_OWNER"><?php echo $esbc_ini->FTP_OWNER->caption() ?></span></th>
<?php } ?>
<?php if ($esbc_ini->NETWORKID->Visible) { // NETWORKID ?>
		<th class="<?php echo $esbc_ini->NETWORKID->headerCellClass() ?>"><span id="elh_esbc_ini_NETWORKID" class="esbc_ini_NETWORKID"><?php echo $esbc_ini->NETWORKID->caption() ?></span></th>
<?php } ?>
<?php if ($esbc_ini->BC_PORT_BASE->Visible) { // BC_PORT_BASE ?>
		<th class="<?php echo $esbc_ini->BC_PORT_BASE->headerCellClass() ?>"><span id="elh_esbc_ini_BC_PORT_BASE" class="esbc_ini_BC_PORT_BASE"><?php echo $esbc_ini->BC_PORT_BASE->caption() ?></span></th>
<?php } ?>
<?php if ($esbc_ini->HTTP_PORT->Visible) { // HTTP_PORT ?>
		<th class="<?php echo $esbc_ini->HTTP_PORT->headerCellClass() ?>"><span id="elh_esbc_ini_HTTP_PORT" class="esbc_ini_HTTP_PORT"><?php echo $esbc_ini->HTTP_PORT->caption() ?></span></th>
<?php } ?>
<?php if ($esbc_ini->RPCPORT_BASE->Visible) { // RPCPORT_BASE ?>
		<th class="<?php echo $esbc_ini->RPCPORT_BASE->headerCellClass() ?>"><span id="elh_esbc_ini_RPCPORT_BASE" class="esbc_ini_RPCPORT_BASE"><?php echo $esbc_ini->RPCPORT_BASE->caption() ?></span></th>
<?php } ?>
<?php if ($esbc_ini->Create_Date->Visible) { // Create_Date ?>
		<th class="<?php echo $esbc_ini->Create_Date->headerCellClass() ?>"><span id="elh_esbc_ini_Create_Date" class="esbc_ini_Create_Date"><?php echo $esbc_ini->Create_Date->caption() ?></span></th>
<?php } ?>
<?php if ($esbc_ini->HOST_TYPE->Visible) { // HOST_TYPE ?>
		<th class="<?php echo $esbc_ini->HOST_TYPE->headerCellClass() ?>"><span id="elh_esbc_ini_HOST_TYPE" class="esbc_ini_HOST_TYPE"><?php echo $esbc_ini->HOST_TYPE->caption() ?></span></th>
<?php } ?>
<?php if ($esbc_ini->HOST_ROOTID->Visible) { // HOST_ROOTID ?>
		<th class="<?php echo $esbc_ini->HOST_ROOTID->headerCellClass() ?>"><span id="elh_esbc_ini_HOST_ROOTID" class="esbc_ini_HOST_ROOTID"><?php echo $esbc_ini->HOST_ROOTID->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$esbc_ini_delete->RecCnt = 0;
$i = 0;
while (!$esbc_ini_delete->Recordset->EOF) {
	$esbc_ini_delete->RecCnt++;
	$esbc_ini_delete->RowCnt++;

	// Set row properties
	$esbc_ini->resetAttributes();
	$esbc_ini->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$esbc_ini_delete->loadRowValues($esbc_ini_delete->Recordset);

	// Render row
	$esbc_ini_delete->renderRow();
?>
	<tr<?php echo $esbc_ini->rowAttributes() ?>>
<?php if ($esbc_ini->HOSTNAME->Visible) { // HOSTNAME ?>
		<td<?php echo $esbc_ini->HOSTNAME->cellAttributes() ?>>
<span id="el<?php echo $esbc_ini_delete->RowCnt ?>_esbc_ini_HOSTNAME" class="esbc_ini_HOSTNAME">
<span<?php echo $esbc_ini->HOSTNAME->viewAttributes() ?>>
<?php echo $esbc_ini->HOSTNAME->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($esbc_ini->BCS_ROOTNAME->Visible) { // BCS_ROOTNAME ?>
		<td<?php echo $esbc_ini->BCS_ROOTNAME->cellAttributes() ?>>
<span id="el<?php echo $esbc_ini_delete->RowCnt ?>_esbc_ini_BCS_ROOTNAME" class="esbc_ini_BCS_ROOTNAME">
<span<?php echo $esbc_ini->BCS_ROOTNAME->viewAttributes() ?>>
<?php echo $esbc_ini->BCS_ROOTNAME->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($esbc_ini->HOST_IP->Visible) { // HOST_IP ?>
		<td<?php echo $esbc_ini->HOST_IP->cellAttributes() ?>>
<span id="el<?php echo $esbc_ini_delete->RowCnt ?>_esbc_ini_HOST_IP" class="esbc_ini_HOST_IP">
<span<?php echo $esbc_ini->HOST_IP->viewAttributes() ?>>
<?php echo $esbc_ini->HOST_IP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($esbc_ini->HOST_OWNER->Visible) { // HOST_OWNER ?>
		<td<?php echo $esbc_ini->HOST_OWNER->cellAttributes() ?>>
<span id="el<?php echo $esbc_ini_delete->RowCnt ?>_esbc_ini_HOST_OWNER" class="esbc_ini_HOST_OWNER">
<span<?php echo $esbc_ini->HOST_OWNER->viewAttributes() ?>>
<?php echo $esbc_ini->HOST_OWNER->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($esbc_ini->MYSQL_OWNER->Visible) { // MYSQL_OWNER ?>
		<td<?php echo $esbc_ini->MYSQL_OWNER->cellAttributes() ?>>
<span id="el<?php echo $esbc_ini_delete->RowCnt ?>_esbc_ini_MYSQL_OWNER" class="esbc_ini_MYSQL_OWNER">
<span<?php echo $esbc_ini->MYSQL_OWNER->viewAttributes() ?>>
<?php echo $esbc_ini->MYSQL_OWNER->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($esbc_ini->FTP_OWNER->Visible) { // FTP_OWNER ?>
		<td<?php echo $esbc_ini->FTP_OWNER->cellAttributes() ?>>
<span id="el<?php echo $esbc_ini_delete->RowCnt ?>_esbc_ini_FTP_OWNER" class="esbc_ini_FTP_OWNER">
<span<?php echo $esbc_ini->FTP_OWNER->viewAttributes() ?>>
<?php echo $esbc_ini->FTP_OWNER->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($esbc_ini->NETWORKID->Visible) { // NETWORKID ?>
		<td<?php echo $esbc_ini->NETWORKID->cellAttributes() ?>>
<span id="el<?php echo $esbc_ini_delete->RowCnt ?>_esbc_ini_NETWORKID" class="esbc_ini_NETWORKID">
<span<?php echo $esbc_ini->NETWORKID->viewAttributes() ?>>
<?php echo $esbc_ini->NETWORKID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($esbc_ini->BC_PORT_BASE->Visible) { // BC_PORT_BASE ?>
		<td<?php echo $esbc_ini->BC_PORT_BASE->cellAttributes() ?>>
<span id="el<?php echo $esbc_ini_delete->RowCnt ?>_esbc_ini_BC_PORT_BASE" class="esbc_ini_BC_PORT_BASE">
<span<?php echo $esbc_ini->BC_PORT_BASE->viewAttributes() ?>>
<?php echo $esbc_ini->BC_PORT_BASE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($esbc_ini->HTTP_PORT->Visible) { // HTTP_PORT ?>
		<td<?php echo $esbc_ini->HTTP_PORT->cellAttributes() ?>>
<span id="el<?php echo $esbc_ini_delete->RowCnt ?>_esbc_ini_HTTP_PORT" class="esbc_ini_HTTP_PORT">
<span<?php echo $esbc_ini->HTTP_PORT->viewAttributes() ?>>
<?php echo $esbc_ini->HTTP_PORT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($esbc_ini->RPCPORT_BASE->Visible) { // RPCPORT_BASE ?>
		<td<?php echo $esbc_ini->RPCPORT_BASE->cellAttributes() ?>>
<span id="el<?php echo $esbc_ini_delete->RowCnt ?>_esbc_ini_RPCPORT_BASE" class="esbc_ini_RPCPORT_BASE">
<span<?php echo $esbc_ini->RPCPORT_BASE->viewAttributes() ?>>
<?php echo $esbc_ini->RPCPORT_BASE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($esbc_ini->Create_Date->Visible) { // Create_Date ?>
		<td<?php echo $esbc_ini->Create_Date->cellAttributes() ?>>
<span id="el<?php echo $esbc_ini_delete->RowCnt ?>_esbc_ini_Create_Date" class="esbc_ini_Create_Date">
<span<?php echo $esbc_ini->Create_Date->viewAttributes() ?>>
<?php echo $esbc_ini->Create_Date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($esbc_ini->HOST_TYPE->Visible) { // HOST_TYPE ?>
		<td<?php echo $esbc_ini->HOST_TYPE->cellAttributes() ?>>
<span id="el<?php echo $esbc_ini_delete->RowCnt ?>_esbc_ini_HOST_TYPE" class="esbc_ini_HOST_TYPE">
<span<?php echo $esbc_ini->HOST_TYPE->viewAttributes() ?>>
<?php echo $esbc_ini->HOST_TYPE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($esbc_ini->HOST_ROOTID->Visible) { // HOST_ROOTID ?>
		<td<?php echo $esbc_ini->HOST_ROOTID->cellAttributes() ?>>
<span id="el<?php echo $esbc_ini_delete->RowCnt ?>_esbc_ini_HOST_ROOTID" class="esbc_ini_HOST_ROOTID">
<span<?php echo $esbc_ini->HOST_ROOTID->viewAttributes() ?>>
<?php echo $esbc_ini->HOST_ROOTID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$esbc_ini_delete->Recordset->moveNext();
}
$esbc_ini_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $esbc_ini_delete->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$esbc_ini_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$esbc_ini_delete->terminate();
?>
