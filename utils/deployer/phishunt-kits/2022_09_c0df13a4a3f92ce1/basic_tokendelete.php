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
$basic_token_delete = new basic_token_delete();

// Run the page
$basic_token_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$basic_token_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fbasic_tokendelete = currentForm = new ew.Form("fbasic_tokendelete", "delete");

// Form_CustomValidate event
fbasic_tokendelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fbasic_tokendelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fbasic_tokendelete.lists["x_type"] = <?php echo $basic_token_delete->type->Lookup->toClientList() ?>;
fbasic_tokendelete.lists["x_type"].options = <?php echo JsonEncode($basic_token_delete->type->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $basic_token_delete->showPageHeader(); ?>
<?php
$basic_token_delete->showMessage();
?>
<form name="fbasic_tokendelete" id="fbasic_tokendelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($basic_token_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $basic_token_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="basic_token">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($basic_token_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($basic_token->Rindex->Visible) { // Rindex ?>
		<th class="<?php echo $basic_token->Rindex->headerCellClass() ?>"><span id="elh_basic_token_Rindex" class="basic_token_Rindex"><?php echo $basic_token->Rindex->caption() ?></span></th>
<?php } ?>
<?php if ($basic_token->type->Visible) { // type ?>
		<th class="<?php echo $basic_token->type->headerCellClass() ?>"><span id="elh_basic_token_type" class="basic_token_type"><?php echo $basic_token->type->caption() ?></span></th>
<?php } ?>
<?php if ($basic_token->name->Visible) { // name ?>
		<th class="<?php echo $basic_token->name->headerCellClass() ?>"><span id="elh_basic_token_name" class="basic_token_name"><?php echo $basic_token->name->caption() ?></span></th>
<?php } ?>
<?php if ($basic_token->symble->Visible) { // symble ?>
		<th class="<?php echo $basic_token->symble->headerCellClass() ?>"><span id="elh_basic_token_symble" class="basic_token_symble"><?php echo $basic_token->symble->caption() ?></span></th>
<?php } ?>
<?php if ($basic_token->supply->Visible) { // supply ?>
		<th class="<?php echo $basic_token->supply->headerCellClass() ?>"><span id="elh_basic_token_supply" class="basic_token_supply"><?php echo $basic_token->supply->caption() ?></span></th>
<?php } ?>
<?php if ($basic_token->price->Visible) { // price ?>
		<th class="<?php echo $basic_token->price->headerCellClass() ?>"><span id="elh_basic_token_price" class="basic_token_price"><?php echo $basic_token->price->caption() ?></span></th>
<?php } ?>
<?php if ($basic_token->holders->Visible) { // holders ?>
		<th class="<?php echo $basic_token->holders->headerCellClass() ?>"><span id="elh_basic_token_holders" class="basic_token_holders"><?php echo $basic_token->holders->caption() ?></span></th>
<?php } ?>
<?php if ($basic_token->decimals->Visible) { // decimals ?>
		<th class="<?php echo $basic_token->decimals->headerCellClass() ?>"><span id="elh_basic_token_decimals" class="basic_token_decimals"><?php echo $basic_token->decimals->caption() ?></span></th>
<?php } ?>
<?php if ($basic_token->dateadd->Visible) { // dateadd ?>
		<th class="<?php echo $basic_token->dateadd->headerCellClass() ?>"><span id="elh_basic_token_dateadd" class="basic_token_dateadd"><?php echo $basic_token->dateadd->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$basic_token_delete->RecCnt = 0;
$i = 0;
while (!$basic_token_delete->Recordset->EOF) {
	$basic_token_delete->RecCnt++;
	$basic_token_delete->RowCnt++;

	// Set row properties
	$basic_token->resetAttributes();
	$basic_token->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$basic_token_delete->loadRowValues($basic_token_delete->Recordset);

	// Render row
	$basic_token_delete->renderRow();
?>
	<tr<?php echo $basic_token->rowAttributes() ?>>
<?php if ($basic_token->Rindex->Visible) { // Rindex ?>
		<td<?php echo $basic_token->Rindex->cellAttributes() ?>>
<span id="el<?php echo $basic_token_delete->RowCnt ?>_basic_token_Rindex" class="basic_token_Rindex">
<span<?php echo $basic_token->Rindex->viewAttributes() ?>>
<?php echo $basic_token->Rindex->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($basic_token->type->Visible) { // type ?>
		<td<?php echo $basic_token->type->cellAttributes() ?>>
<span id="el<?php echo $basic_token_delete->RowCnt ?>_basic_token_type" class="basic_token_type">
<span<?php echo $basic_token->type->viewAttributes() ?>>
<?php echo $basic_token->type->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($basic_token->name->Visible) { // name ?>
		<td<?php echo $basic_token->name->cellAttributes() ?>>
<span id="el<?php echo $basic_token_delete->RowCnt ?>_basic_token_name" class="basic_token_name">
<span<?php echo $basic_token->name->viewAttributes() ?>>
<?php echo $basic_token->name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($basic_token->symble->Visible) { // symble ?>
		<td<?php echo $basic_token->symble->cellAttributes() ?>>
<span id="el<?php echo $basic_token_delete->RowCnt ?>_basic_token_symble" class="basic_token_symble">
<span<?php echo $basic_token->symble->viewAttributes() ?>>
<?php echo $basic_token->symble->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($basic_token->supply->Visible) { // supply ?>
		<td<?php echo $basic_token->supply->cellAttributes() ?>>
<span id="el<?php echo $basic_token_delete->RowCnt ?>_basic_token_supply" class="basic_token_supply">
<span<?php echo $basic_token->supply->viewAttributes() ?>>
<?php echo $basic_token->supply->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($basic_token->price->Visible) { // price ?>
		<td<?php echo $basic_token->price->cellAttributes() ?>>
<span id="el<?php echo $basic_token_delete->RowCnt ?>_basic_token_price" class="basic_token_price">
<span<?php echo $basic_token->price->viewAttributes() ?>>
<?php echo $basic_token->price->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($basic_token->holders->Visible) { // holders ?>
		<td<?php echo $basic_token->holders->cellAttributes() ?>>
<span id="el<?php echo $basic_token_delete->RowCnt ?>_basic_token_holders" class="basic_token_holders">
<span<?php echo $basic_token->holders->viewAttributes() ?>>
<?php echo $basic_token->holders->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($basic_token->decimals->Visible) { // decimals ?>
		<td<?php echo $basic_token->decimals->cellAttributes() ?>>
<span id="el<?php echo $basic_token_delete->RowCnt ?>_basic_token_decimals" class="basic_token_decimals">
<span<?php echo $basic_token->decimals->viewAttributes() ?>>
<?php echo $basic_token->decimals->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($basic_token->dateadd->Visible) { // dateadd ?>
		<td<?php echo $basic_token->dateadd->cellAttributes() ?>>
<span id="el<?php echo $basic_token_delete->RowCnt ?>_basic_token_dateadd" class="basic_token_dateadd">
<span<?php echo $basic_token->dateadd->viewAttributes() ?>>
<?php echo $basic_token->dateadd->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$basic_token_delete->Recordset->moveNext();
}
$basic_token_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $basic_token_delete->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$basic_token_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$basic_token_delete->terminate();
?>
