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
$esbc_node_basic_delete = new esbc_node_basic_delete();

// Run the page
$esbc_node_basic_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$esbc_node_basic_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fesbc_node_basicdelete = currentForm = new ew.Form("fesbc_node_basicdelete", "delete");

// Form_CustomValidate event
fesbc_node_basicdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fesbc_node_basicdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fesbc_node_basicdelete.lists["x_HUB_INDEX"] = <?php echo $esbc_node_basic_delete->HUB_INDEX->Lookup->toClientList() ?>;
fesbc_node_basicdelete.lists["x_HUB_INDEX"].options = <?php echo JsonEncode($esbc_node_basic_delete->HUB_INDEX->lookupOptions()) ?>;
fesbc_node_basicdelete.lists["x_NODE_SIGNER"] = <?php echo $esbc_node_basic_delete->NODE_SIGNER->Lookup->toClientList() ?>;
fesbc_node_basicdelete.lists["x_NODE_SIGNER"].options = <?php echo JsonEncode($esbc_node_basic_delete->NODE_SIGNER->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $esbc_node_basic_delete->showPageHeader(); ?>
<?php
$esbc_node_basic_delete->showMessage();
?>
<form name="fesbc_node_basicdelete" id="fesbc_node_basicdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($esbc_node_basic_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $esbc_node_basic_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="esbc_node_basic">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($esbc_node_basic_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($esbc_node_basic->HUB_INDEX->Visible) { // HUB_INDEX ?>
		<th class="<?php echo $esbc_node_basic->HUB_INDEX->headerCellClass() ?>"><span id="elh_esbc_node_basic_HUB_INDEX" class="esbc_node_basic_HUB_INDEX"><?php echo $esbc_node_basic->HUB_INDEX->caption() ?></span></th>
<?php } ?>
<?php if ($esbc_node_basic->NODE_NAME->Visible) { // NODE_NAME ?>
		<th class="<?php echo $esbc_node_basic->NODE_NAME->headerCellClass() ?>"><span id="elh_esbc_node_basic_NODE_NAME" class="esbc_node_basic_NODE_NAME"><?php echo $esbc_node_basic->NODE_NAME->caption() ?></span></th>
<?php } ?>
<?php if ($esbc_node_basic->NODE_PW->Visible) { // NODE_PW ?>
		<th class="<?php echo $esbc_node_basic->NODE_PW->headerCellClass() ?>"><span id="elh_esbc_node_basic_NODE_PW" class="esbc_node_basic_NODE_PW"><?php echo $esbc_node_basic->NODE_PW->caption() ?></span></th>
<?php } ?>
<?php if ($esbc_node_basic->NODE_ENODE->Visible) { // NODE_ENODE ?>
		<th class="<?php echo $esbc_node_basic->NODE_ENODE->headerCellClass() ?>"><span id="elh_esbc_node_basic_NODE_ENODE" class="esbc_node_basic_NODE_ENODE"><?php echo $esbc_node_basic->NODE_ENODE->caption() ?></span></th>
<?php } ?>
<?php if ($esbc_node_basic->NODE_ACC40->Visible) { // NODE_ACC40 ?>
		<th class="<?php echo $esbc_node_basic->NODE_ACC40->headerCellClass() ?>"><span id="elh_esbc_node_basic_NODE_ACC40" class="esbc_node_basic_NODE_ACC40"><?php echo $esbc_node_basic->NODE_ACC40->caption() ?></span></th>
<?php } ?>
<?php if ($esbc_node_basic->NODE_SIGNER->Visible) { // NODE_SIGNER ?>
		<th class="<?php echo $esbc_node_basic->NODE_SIGNER->headerCellClass() ?>"><span id="elh_esbc_node_basic_NODE_SIGNER" class="esbc_node_basic_NODE_SIGNER"><?php echo $esbc_node_basic->NODE_SIGNER->caption() ?></span></th>
<?php } ?>
<?php if ($esbc_node_basic->Create_Date->Visible) { // Create_Date ?>
		<th class="<?php echo $esbc_node_basic->Create_Date->headerCellClass() ?>"><span id="elh_esbc_node_basic_Create_Date" class="esbc_node_basic_Create_Date"><?php echo $esbc_node_basic->Create_Date->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$esbc_node_basic_delete->RecCnt = 0;
$i = 0;
while (!$esbc_node_basic_delete->Recordset->EOF) {
	$esbc_node_basic_delete->RecCnt++;
	$esbc_node_basic_delete->RowCnt++;

	// Set row properties
	$esbc_node_basic->resetAttributes();
	$esbc_node_basic->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$esbc_node_basic_delete->loadRowValues($esbc_node_basic_delete->Recordset);

	// Render row
	$esbc_node_basic_delete->renderRow();
?>
	<tr<?php echo $esbc_node_basic->rowAttributes() ?>>
<?php if ($esbc_node_basic->HUB_INDEX->Visible) { // HUB_INDEX ?>
		<td<?php echo $esbc_node_basic->HUB_INDEX->cellAttributes() ?>>
<span id="el<?php echo $esbc_node_basic_delete->RowCnt ?>_esbc_node_basic_HUB_INDEX" class="esbc_node_basic_HUB_INDEX">
<span<?php echo $esbc_node_basic->HUB_INDEX->viewAttributes() ?>>
<?php echo $esbc_node_basic->HUB_INDEX->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($esbc_node_basic->NODE_NAME->Visible) { // NODE_NAME ?>
		<td<?php echo $esbc_node_basic->NODE_NAME->cellAttributes() ?>>
<span id="el<?php echo $esbc_node_basic_delete->RowCnt ?>_esbc_node_basic_NODE_NAME" class="esbc_node_basic_NODE_NAME">
<span<?php echo $esbc_node_basic->NODE_NAME->viewAttributes() ?>>
<?php echo $esbc_node_basic->NODE_NAME->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($esbc_node_basic->NODE_PW->Visible) { // NODE_PW ?>
		<td<?php echo $esbc_node_basic->NODE_PW->cellAttributes() ?>>
<span id="el<?php echo $esbc_node_basic_delete->RowCnt ?>_esbc_node_basic_NODE_PW" class="esbc_node_basic_NODE_PW">
<span<?php echo $esbc_node_basic->NODE_PW->viewAttributes() ?>>
<?php echo $esbc_node_basic->NODE_PW->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($esbc_node_basic->NODE_ENODE->Visible) { // NODE_ENODE ?>
		<td<?php echo $esbc_node_basic->NODE_ENODE->cellAttributes() ?>>
<span id="el<?php echo $esbc_node_basic_delete->RowCnt ?>_esbc_node_basic_NODE_ENODE" class="esbc_node_basic_NODE_ENODE">
<span<?php echo $esbc_node_basic->NODE_ENODE->viewAttributes() ?>>
<?php echo $esbc_node_basic->NODE_ENODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($esbc_node_basic->NODE_ACC40->Visible) { // NODE_ACC40 ?>
		<td<?php echo $esbc_node_basic->NODE_ACC40->cellAttributes() ?>>
<span id="el<?php echo $esbc_node_basic_delete->RowCnt ?>_esbc_node_basic_NODE_ACC40" class="esbc_node_basic_NODE_ACC40">
<span<?php echo $esbc_node_basic->NODE_ACC40->viewAttributes() ?>>
<?php echo $esbc_node_basic->NODE_ACC40->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($esbc_node_basic->NODE_SIGNER->Visible) { // NODE_SIGNER ?>
		<td<?php echo $esbc_node_basic->NODE_SIGNER->cellAttributes() ?>>
<span id="el<?php echo $esbc_node_basic_delete->RowCnt ?>_esbc_node_basic_NODE_SIGNER" class="esbc_node_basic_NODE_SIGNER">
<span<?php echo $esbc_node_basic->NODE_SIGNER->viewAttributes() ?>>
<?php echo $esbc_node_basic->NODE_SIGNER->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($esbc_node_basic->Create_Date->Visible) { // Create_Date ?>
		<td<?php echo $esbc_node_basic->Create_Date->cellAttributes() ?>>
<span id="el<?php echo $esbc_node_basic_delete->RowCnt ?>_esbc_node_basic_Create_Date" class="esbc_node_basic_Create_Date">
<span<?php echo $esbc_node_basic->Create_Date->viewAttributes() ?>>
<?php echo $esbc_node_basic->Create_Date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$esbc_node_basic_delete->Recordset->moveNext();
}
$esbc_node_basic_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $esbc_node_basic_delete->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$esbc_node_basic_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$esbc_node_basic_delete->terminate();
?>
