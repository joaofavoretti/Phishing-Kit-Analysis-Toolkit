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
$esbc_user_delete = new esbc_user_delete();

// Run the page
$esbc_user_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$esbc_user_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fesbc_userdelete = currentForm = new ew.Form("fesbc_userdelete", "delete");

// Form_CustomValidate event
fesbc_userdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fesbc_userdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $esbc_user_delete->showPageHeader(); ?>
<?php
$esbc_user_delete->showMessage();
?>
<form name="fesbc_userdelete" id="fesbc_userdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($esbc_user_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $esbc_user_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="esbc_user">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($esbc_user_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($esbc_user->USER_INDEX->Visible) { // USER_INDEX ?>
		<th class="<?php echo $esbc_user->USER_INDEX->headerCellClass() ?>"><span id="elh_esbc_user_USER_INDEX" class="esbc_user_USER_INDEX"><?php echo $esbc_user->USER_INDEX->caption() ?></span></th>
<?php } ?>
<?php if ($esbc_user->USER_NAME->Visible) { // USER_NAME ?>
		<th class="<?php echo $esbc_user->USER_NAME->headerCellClass() ?>"><span id="elh_esbc_user_USER_NAME" class="esbc_user_USER_NAME"><?php echo $esbc_user->USER_NAME->caption() ?></span></th>
<?php } ?>
<?php if ($esbc_user->USER_PW->Visible) { // USER_PW ?>
		<th class="<?php echo $esbc_user->USER_PW->headerCellClass() ?>"><span id="elh_esbc_user_USER_PW" class="esbc_user_USER_PW"><?php echo $esbc_user->USER_PW->caption() ?></span></th>
<?php } ?>
<?php if ($esbc_user->USER_EMAIL->Visible) { // USER_EMAIL ?>
		<th class="<?php echo $esbc_user->USER_EMAIL->headerCellClass() ?>"><span id="elh_esbc_user_USER_EMAIL" class="esbc_user_USER_EMAIL"><?php echo $esbc_user->USER_EMAIL->caption() ?></span></th>
<?php } ?>
<?php if ($esbc_user->USER_LEVEL->Visible) { // USER_LEVEL ?>
		<th class="<?php echo $esbc_user->USER_LEVEL->headerCellClass() ?>"><span id="elh_esbc_user_USER_LEVEL" class="esbc_user_USER_LEVEL"><?php echo $esbc_user->USER_LEVEL->caption() ?></span></th>
<?php } ?>
<?php if ($esbc_user->Create_Date->Visible) { // Create_Date ?>
		<th class="<?php echo $esbc_user->Create_Date->headerCellClass() ?>"><span id="elh_esbc_user_Create_Date" class="esbc_user_Create_Date"><?php echo $esbc_user->Create_Date->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$esbc_user_delete->RecCnt = 0;
$i = 0;
while (!$esbc_user_delete->Recordset->EOF) {
	$esbc_user_delete->RecCnt++;
	$esbc_user_delete->RowCnt++;

	// Set row properties
	$esbc_user->resetAttributes();
	$esbc_user->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$esbc_user_delete->loadRowValues($esbc_user_delete->Recordset);

	// Render row
	$esbc_user_delete->renderRow();
?>
	<tr<?php echo $esbc_user->rowAttributes() ?>>
<?php if ($esbc_user->USER_INDEX->Visible) { // USER_INDEX ?>
		<td<?php echo $esbc_user->USER_INDEX->cellAttributes() ?>>
<span id="el<?php echo $esbc_user_delete->RowCnt ?>_esbc_user_USER_INDEX" class="esbc_user_USER_INDEX">
<span<?php echo $esbc_user->USER_INDEX->viewAttributes() ?>>
<?php echo $esbc_user->USER_INDEX->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($esbc_user->USER_NAME->Visible) { // USER_NAME ?>
		<td<?php echo $esbc_user->USER_NAME->cellAttributes() ?>>
<span id="el<?php echo $esbc_user_delete->RowCnt ?>_esbc_user_USER_NAME" class="esbc_user_USER_NAME">
<span<?php echo $esbc_user->USER_NAME->viewAttributes() ?>>
<?php echo $esbc_user->USER_NAME->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($esbc_user->USER_PW->Visible) { // USER_PW ?>
		<td<?php echo $esbc_user->USER_PW->cellAttributes() ?>>
<span id="el<?php echo $esbc_user_delete->RowCnt ?>_esbc_user_USER_PW" class="esbc_user_USER_PW">
<span<?php echo $esbc_user->USER_PW->viewAttributes() ?>>
<?php echo $esbc_user->USER_PW->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($esbc_user->USER_EMAIL->Visible) { // USER_EMAIL ?>
		<td<?php echo $esbc_user->USER_EMAIL->cellAttributes() ?>>
<span id="el<?php echo $esbc_user_delete->RowCnt ?>_esbc_user_USER_EMAIL" class="esbc_user_USER_EMAIL">
<span<?php echo $esbc_user->USER_EMAIL->viewAttributes() ?>>
<?php echo $esbc_user->USER_EMAIL->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($esbc_user->USER_LEVEL->Visible) { // USER_LEVEL ?>
		<td<?php echo $esbc_user->USER_LEVEL->cellAttributes() ?>>
<span id="el<?php echo $esbc_user_delete->RowCnt ?>_esbc_user_USER_LEVEL" class="esbc_user_USER_LEVEL">
<span<?php echo $esbc_user->USER_LEVEL->viewAttributes() ?>>
<?php echo $esbc_user->USER_LEVEL->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($esbc_user->Create_Date->Visible) { // Create_Date ?>
		<td<?php echo $esbc_user->Create_Date->cellAttributes() ?>>
<span id="el<?php echo $esbc_user_delete->RowCnt ?>_esbc_user_Create_Date" class="esbc_user_Create_Date">
<span<?php echo $esbc_user->Create_Date->viewAttributes() ?>>
<?php echo $esbc_user->Create_Date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$esbc_user_delete->Recordset->moveNext();
}
$esbc_user_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $esbc_user_delete->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$esbc_user_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$esbc_user_delete->terminate();
?>
