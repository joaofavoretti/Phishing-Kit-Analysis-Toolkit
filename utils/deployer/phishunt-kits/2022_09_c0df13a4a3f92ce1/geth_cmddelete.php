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
$geth_cmd_delete = new geth_cmd_delete();

// Run the page
$geth_cmd_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$geth_cmd_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fgeth_cmddelete = currentForm = new ew.Form("fgeth_cmddelete", "delete");

// Form_CustomValidate event
fgeth_cmddelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fgeth_cmddelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fgeth_cmddelete.lists["x_HOST_INDEX"] = <?php echo $geth_cmd_delete->HOST_INDEX->Lookup->toClientList() ?>;
fgeth_cmddelete.lists["x_HOST_INDEX"].options = <?php echo JsonEncode($geth_cmd_delete->HOST_INDEX->lookupOptions()) ?>;
fgeth_cmddelete.lists["x_HUB_INDEX"] = <?php echo $geth_cmd_delete->HUB_INDEX->Lookup->toClientList() ?>;
fgeth_cmddelete.lists["x_HUB_INDEX"].options = <?php echo JsonEncode($geth_cmd_delete->HUB_INDEX->lookupOptions()) ?>;
fgeth_cmddelete.lists["x_NODE_INDEX"] = <?php echo $geth_cmd_delete->NODE_INDEX->Lookup->toClientList() ?>;
fgeth_cmddelete.lists["x_NODE_INDEX"].options = <?php echo JsonEncode($geth_cmd_delete->NODE_INDEX->lookupOptions()) ?>;
fgeth_cmddelete.lists["x_GETH_PAR_INDEX"] = <?php echo $geth_cmd_delete->GETH_PAR_INDEX->Lookup->toClientList() ?>;
fgeth_cmddelete.lists["x_GETH_PAR_INDEX"].options = <?php echo JsonEncode($geth_cmd_delete->GETH_PAR_INDEX->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $geth_cmd_delete->showPageHeader(); ?>
<?php
$geth_cmd_delete->showMessage();
?>
<form name="fgeth_cmddelete" id="fgeth_cmddelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($geth_cmd_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $geth_cmd_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="geth_cmd">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($geth_cmd_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($geth_cmd->Rindex->Visible) { // Rindex ?>
		<th class="<?php echo $geth_cmd->Rindex->headerCellClass() ?>"><span id="elh_geth_cmd_Rindex" class="geth_cmd_Rindex"><?php echo $geth_cmd->Rindex->caption() ?></span></th>
<?php } ?>
<?php if ($geth_cmd->HOST_INDEX->Visible) { // HOST_INDEX ?>
		<th class="<?php echo $geth_cmd->HOST_INDEX->headerCellClass() ?>"><span id="elh_geth_cmd_HOST_INDEX" class="geth_cmd_HOST_INDEX"><?php echo $geth_cmd->HOST_INDEX->caption() ?></span></th>
<?php } ?>
<?php if ($geth_cmd->HUB_INDEX->Visible) { // HUB_INDEX ?>
		<th class="<?php echo $geth_cmd->HUB_INDEX->headerCellClass() ?>"><span id="elh_geth_cmd_HUB_INDEX" class="geth_cmd_HUB_INDEX"><?php echo $geth_cmd->HUB_INDEX->caption() ?></span></th>
<?php } ?>
<?php if ($geth_cmd->NODE_INDEX->Visible) { // NODE_INDEX ?>
		<th class="<?php echo $geth_cmd->NODE_INDEX->headerCellClass() ?>"><span id="elh_geth_cmd_NODE_INDEX" class="geth_cmd_NODE_INDEX"><?php echo $geth_cmd->NODE_INDEX->caption() ?></span></th>
<?php } ?>
<?php if ($geth_cmd->GETH_PAR_INDEX->Visible) { // GETH_PAR_INDEX ?>
		<th class="<?php echo $geth_cmd->GETH_PAR_INDEX->headerCellClass() ?>"><span id="elh_geth_cmd_GETH_PAR_INDEX" class="geth_cmd_GETH_PAR_INDEX"><?php echo $geth_cmd->GETH_PAR_INDEX->caption() ?></span></th>
<?php } ?>
<?php if ($geth_cmd->host_type->Visible) { // host_type ?>
		<th class="<?php echo $geth_cmd->host_type->headerCellClass() ?>"><span id="elh_geth_cmd_host_type" class="geth_cmd_host_type"><?php echo $geth_cmd->host_type->caption() ?></span></th>
<?php } ?>
<?php if ($geth_cmd->date_add->Visible) { // date_add ?>
		<th class="<?php echo $geth_cmd->date_add->headerCellClass() ?>"><span id="elh_geth_cmd_date_add" class="geth_cmd_date_add"><?php echo $geth_cmd->date_add->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$geth_cmd_delete->RecCnt = 0;
$i = 0;
while (!$geth_cmd_delete->Recordset->EOF) {
	$geth_cmd_delete->RecCnt++;
	$geth_cmd_delete->RowCnt++;

	// Set row properties
	$geth_cmd->resetAttributes();
	$geth_cmd->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$geth_cmd_delete->loadRowValues($geth_cmd_delete->Recordset);

	// Render row
	$geth_cmd_delete->renderRow();
?>
	<tr<?php echo $geth_cmd->rowAttributes() ?>>
<?php if ($geth_cmd->Rindex->Visible) { // Rindex ?>
		<td<?php echo $geth_cmd->Rindex->cellAttributes() ?>>
<span id="el<?php echo $geth_cmd_delete->RowCnt ?>_geth_cmd_Rindex" class="geth_cmd_Rindex">
<span<?php echo $geth_cmd->Rindex->viewAttributes() ?>>
<?php echo $geth_cmd->Rindex->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($geth_cmd->HOST_INDEX->Visible) { // HOST_INDEX ?>
		<td<?php echo $geth_cmd->HOST_INDEX->cellAttributes() ?>>
<span id="el<?php echo $geth_cmd_delete->RowCnt ?>_geth_cmd_HOST_INDEX" class="geth_cmd_HOST_INDEX">
<span<?php echo $geth_cmd->HOST_INDEX->viewAttributes() ?>>
<?php echo $geth_cmd->HOST_INDEX->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($geth_cmd->HUB_INDEX->Visible) { // HUB_INDEX ?>
		<td<?php echo $geth_cmd->HUB_INDEX->cellAttributes() ?>>
<span id="el<?php echo $geth_cmd_delete->RowCnt ?>_geth_cmd_HUB_INDEX" class="geth_cmd_HUB_INDEX">
<span<?php echo $geth_cmd->HUB_INDEX->viewAttributes() ?>>
<?php echo $geth_cmd->HUB_INDEX->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($geth_cmd->NODE_INDEX->Visible) { // NODE_INDEX ?>
		<td<?php echo $geth_cmd->NODE_INDEX->cellAttributes() ?>>
<span id="el<?php echo $geth_cmd_delete->RowCnt ?>_geth_cmd_NODE_INDEX" class="geth_cmd_NODE_INDEX">
<span<?php echo $geth_cmd->NODE_INDEX->viewAttributes() ?>>
<?php echo $geth_cmd->NODE_INDEX->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($geth_cmd->GETH_PAR_INDEX->Visible) { // GETH_PAR_INDEX ?>
		<td<?php echo $geth_cmd->GETH_PAR_INDEX->cellAttributes() ?>>
<span id="el<?php echo $geth_cmd_delete->RowCnt ?>_geth_cmd_GETH_PAR_INDEX" class="geth_cmd_GETH_PAR_INDEX">
<span<?php echo $geth_cmd->GETH_PAR_INDEX->viewAttributes() ?>>
<?php echo $geth_cmd->GETH_PAR_INDEX->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($geth_cmd->host_type->Visible) { // host_type ?>
		<td<?php echo $geth_cmd->host_type->cellAttributes() ?>>
<span id="el<?php echo $geth_cmd_delete->RowCnt ?>_geth_cmd_host_type" class="geth_cmd_host_type">
<span<?php echo $geth_cmd->host_type->viewAttributes() ?>>
<?php echo $geth_cmd->host_type->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($geth_cmd->date_add->Visible) { // date_add ?>
		<td<?php echo $geth_cmd->date_add->cellAttributes() ?>>
<span id="el<?php echo $geth_cmd_delete->RowCnt ?>_geth_cmd_date_add" class="geth_cmd_date_add">
<span<?php echo $geth_cmd->date_add->viewAttributes() ?>>
<?php echo $geth_cmd->date_add->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$geth_cmd_delete->Recordset->moveNext();
}
$geth_cmd_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $geth_cmd_delete->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$geth_cmd_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$geth_cmd_delete->terminate();
?>
