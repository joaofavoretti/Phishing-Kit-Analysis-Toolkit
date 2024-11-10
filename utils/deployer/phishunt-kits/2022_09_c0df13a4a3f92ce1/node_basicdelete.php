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
$node_basic_delete = new node_basic_delete();

// Run the page
$node_basic_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$node_basic_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fnode_basicdelete = currentForm = new ew.Form("fnode_basicdelete", "delete");

// Form_CustomValidate event
fnode_basicdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fnode_basicdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fnode_basicdelete.lists["x_NODE_SIGNER"] = <?php echo $node_basic_delete->NODE_SIGNER->Lookup->toClientList() ?>;
fnode_basicdelete.lists["x_NODE_SIGNER"].options = <?php echo JsonEncode($node_basic_delete->NODE_SIGNER->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $node_basic_delete->showPageHeader(); ?>
<?php
$node_basic_delete->showMessage();
?>
<form name="fnode_basicdelete" id="fnode_basicdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($node_basic_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $node_basic_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="node_basic">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($node_basic_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($node_basic->ESBC_INDEX->Visible) { // ESBC_INDEX ?>
		<th class="<?php echo $node_basic->ESBC_INDEX->headerCellClass() ?>"><span id="elh_node_basic_ESBC_INDEX" class="node_basic_ESBC_INDEX"><?php echo $node_basic->ESBC_INDEX->caption() ?></span></th>
<?php } ?>
<?php if ($node_basic->NODE_NAME->Visible) { // NODE_NAME ?>
		<th class="<?php echo $node_basic->NODE_NAME->headerCellClass() ?>"><span id="elh_node_basic_NODE_NAME" class="node_basic_NODE_NAME"><?php echo $node_basic->NODE_NAME->caption() ?></span></th>
<?php } ?>
<?php if ($node_basic->NODE_PW->Visible) { // NODE_PW ?>
		<th class="<?php echo $node_basic->NODE_PW->headerCellClass() ?>"><span id="elh_node_basic_NODE_PW" class="node_basic_NODE_PW"><?php echo $node_basic->NODE_PW->caption() ?></span></th>
<?php } ?>
<?php if ($node_basic->NODE_ENODE->Visible) { // NODE_ENODE ?>
		<th class="<?php echo $node_basic->NODE_ENODE->headerCellClass() ?>"><span id="elh_node_basic_NODE_ENODE" class="node_basic_NODE_ENODE"><?php echo $node_basic->NODE_ENODE->caption() ?></span></th>
<?php } ?>
<?php if ($node_basic->NODE_ACCOUNT_ID->Visible) { // NODE_ACCOUNT_ID ?>
		<th class="<?php echo $node_basic->NODE_ACCOUNT_ID->headerCellClass() ?>"><span id="elh_node_basic_NODE_ACCOUNT_ID" class="node_basic_NODE_ACCOUNT_ID"><?php echo $node_basic->NODE_ACCOUNT_ID->caption() ?></span></th>
<?php } ?>
<?php if ($node_basic->NODE_SIGNER->Visible) { // NODE_SIGNER ?>
		<th class="<?php echo $node_basic->NODE_SIGNER->headerCellClass() ?>"><span id="elh_node_basic_NODE_SIGNER" class="node_basic_NODE_SIGNER"><?php echo $node_basic->NODE_SIGNER->caption() ?></span></th>
<?php } ?>
<?php if ($node_basic->Create_Date->Visible) { // Create_Date ?>
		<th class="<?php echo $node_basic->Create_Date->headerCellClass() ?>"><span id="elh_node_basic_Create_Date" class="node_basic_Create_Date"><?php echo $node_basic->Create_Date->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$node_basic_delete->RecCnt = 0;
$i = 0;
while (!$node_basic_delete->Recordset->EOF) {
	$node_basic_delete->RecCnt++;
	$node_basic_delete->RowCnt++;

	// Set row properties
	$node_basic->resetAttributes();
	$node_basic->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$node_basic_delete->loadRowValues($node_basic_delete->Recordset);

	// Render row
	$node_basic_delete->renderRow();
?>
	<tr<?php echo $node_basic->rowAttributes() ?>>
<?php if ($node_basic->ESBC_INDEX->Visible) { // ESBC_INDEX ?>
		<td<?php echo $node_basic->ESBC_INDEX->cellAttributes() ?>>
<span id="el<?php echo $node_basic_delete->RowCnt ?>_node_basic_ESBC_INDEX" class="node_basic_ESBC_INDEX">
<span<?php echo $node_basic->ESBC_INDEX->viewAttributes() ?>>
<?php echo $node_basic->ESBC_INDEX->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($node_basic->NODE_NAME->Visible) { // NODE_NAME ?>
		<td<?php echo $node_basic->NODE_NAME->cellAttributes() ?>>
<span id="el<?php echo $node_basic_delete->RowCnt ?>_node_basic_NODE_NAME" class="node_basic_NODE_NAME">
<span<?php echo $node_basic->NODE_NAME->viewAttributes() ?>>
<?php echo $node_basic->NODE_NAME->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($node_basic->NODE_PW->Visible) { // NODE_PW ?>
		<td<?php echo $node_basic->NODE_PW->cellAttributes() ?>>
<span id="el<?php echo $node_basic_delete->RowCnt ?>_node_basic_NODE_PW" class="node_basic_NODE_PW">
<span<?php echo $node_basic->NODE_PW->viewAttributes() ?>>
<?php echo $node_basic->NODE_PW->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($node_basic->NODE_ENODE->Visible) { // NODE_ENODE ?>
		<td<?php echo $node_basic->NODE_ENODE->cellAttributes() ?>>
<span id="el<?php echo $node_basic_delete->RowCnt ?>_node_basic_NODE_ENODE" class="node_basic_NODE_ENODE">
<span<?php echo $node_basic->NODE_ENODE->viewAttributes() ?>>
<?php echo $node_basic->NODE_ENODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($node_basic->NODE_ACCOUNT_ID->Visible) { // NODE_ACCOUNT_ID ?>
		<td<?php echo $node_basic->NODE_ACCOUNT_ID->cellAttributes() ?>>
<span id="el<?php echo $node_basic_delete->RowCnt ?>_node_basic_NODE_ACCOUNT_ID" class="node_basic_NODE_ACCOUNT_ID">
<span<?php echo $node_basic->NODE_ACCOUNT_ID->viewAttributes() ?>>
<?php echo $node_basic->NODE_ACCOUNT_ID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($node_basic->NODE_SIGNER->Visible) { // NODE_SIGNER ?>
		<td<?php echo $node_basic->NODE_SIGNER->cellAttributes() ?>>
<span id="el<?php echo $node_basic_delete->RowCnt ?>_node_basic_NODE_SIGNER" class="node_basic_NODE_SIGNER">
<span<?php echo $node_basic->NODE_SIGNER->viewAttributes() ?>>
<?php echo $node_basic->NODE_SIGNER->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($node_basic->Create_Date->Visible) { // Create_Date ?>
		<td<?php echo $node_basic->Create_Date->cellAttributes() ?>>
<span id="el<?php echo $node_basic_delete->RowCnt ?>_node_basic_Create_Date" class="node_basic_Create_Date">
<span<?php echo $node_basic->Create_Date->viewAttributes() ?>>
<?php echo $node_basic->Create_Date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$node_basic_delete->Recordset->moveNext();
}
$node_basic_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $node_basic_delete->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$node_basic_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$node_basic_delete->terminate();
?>
