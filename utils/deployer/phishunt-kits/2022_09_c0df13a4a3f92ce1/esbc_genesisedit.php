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
$esbc_genesis_edit = new esbc_genesis_edit();

// Run the page
$esbc_genesis_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$esbc_genesis_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fesbc_genesisedit = currentForm = new ew.Form("fesbc_genesisedit", "edit");

// Validate form
fesbc_genesisedit.validate = function() {
	if (!this.validateRequired)
		return true; // Ignore validation
	var $ = jQuery, fobj = this.getForm(), $fobj = $(fobj);
	if ($fobj.find("#confirm").val() == "F")
		return true;
	var elm, felm, uelm, addcnt = 0;
	var $k = $fobj.find("#" + this.formKeyCountName); // Get key_count
	var rowcnt = ($k[0]) ? parseInt($k.val(), 10) : 1;
	var startcnt = (rowcnt == 0) ? 0 : 1; // Check rowcnt == 0 => Inline-Add
	var gridinsert = ["insert", "gridinsert"].includes($fobj.find("#action").val()) && $k[0];
	for (var i = startcnt; i <= rowcnt; i++) {
		var infix = ($k[0]) ? String(i) : "";
		$fobj.data("rowindex", infix);
		<?php if ($esbc_genesis_edit->GENESIS_INDEX->Required) { ?>
			elm = this.getElements("x" + infix + "_GENESIS_INDEX");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $esbc_genesis->GENESIS_INDEX->caption(), $esbc_genesis->GENESIS_INDEX->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($esbc_genesis_edit->GENESIS_NAME->Required) { ?>
			elm = this.getElements("x" + infix + "_GENESIS_NAME");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $esbc_genesis->GENESIS_NAME->caption(), $esbc_genesis->GENESIS_NAME->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($esbc_genesis_edit->GENESIS_TEXT->Required) { ?>
			elm = this.getElements("x" + infix + "_GENESIS_TEXT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $esbc_genesis->GENESIS_TEXT->caption(), $esbc_genesis->GENESIS_TEXT->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($esbc_genesis_edit->Create_Date->Required) { ?>
			elm = this.getElements("x" + infix + "_Create_Date");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $esbc_genesis->Create_Date->caption(), $esbc_genesis->Create_Date->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Create_Date");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($esbc_genesis->Create_Date->errorMessage()) ?>");

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
	}

	// Process detail forms
	var dfs = $fobj.find("input[name='detailpage']").get();
	for (var i = 0; i < dfs.length; i++) {
		var df = dfs[i], val = df.value;
		if (val && ew.forms[val])
			if (!ew.forms[val].validate())
				return false;
	}
	return true;
}

// Form_CustomValidate event
fesbc_genesisedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fesbc_genesisedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $esbc_genesis_edit->showPageHeader(); ?>
<?php
$esbc_genesis_edit->showMessage();
?>
<form name="fesbc_genesisedit" id="fesbc_genesisedit" class="<?php echo $esbc_genesis_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($esbc_genesis_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $esbc_genesis_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="esbc_genesis">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$esbc_genesis_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($esbc_genesis->GENESIS_INDEX->Visible) { // GENESIS_INDEX ?>
	<div id="r_GENESIS_INDEX" class="form-group row">
		<label id="elh_esbc_genesis_GENESIS_INDEX" class="<?php echo $esbc_genesis_edit->LeftColumnClass ?>"><?php echo $esbc_genesis->GENESIS_INDEX->caption() ?><?php echo ($esbc_genesis->GENESIS_INDEX->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $esbc_genesis_edit->RightColumnClass ?>"><div<?php echo $esbc_genesis->GENESIS_INDEX->cellAttributes() ?>>
<span id="el_esbc_genesis_GENESIS_INDEX">
<span<?php echo $esbc_genesis->GENESIS_INDEX->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($esbc_genesis->GENESIS_INDEX->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="esbc_genesis" data-field="x_GENESIS_INDEX" name="x_GENESIS_INDEX" id="x_GENESIS_INDEX" value="<?php echo HtmlEncode($esbc_genesis->GENESIS_INDEX->CurrentValue) ?>">
<?php echo $esbc_genesis->GENESIS_INDEX->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($esbc_genesis->GENESIS_NAME->Visible) { // GENESIS_NAME ?>
	<div id="r_GENESIS_NAME" class="form-group row">
		<label id="elh_esbc_genesis_GENESIS_NAME" for="x_GENESIS_NAME" class="<?php echo $esbc_genesis_edit->LeftColumnClass ?>"><?php echo $esbc_genesis->GENESIS_NAME->caption() ?><?php echo ($esbc_genesis->GENESIS_NAME->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $esbc_genesis_edit->RightColumnClass ?>"><div<?php echo $esbc_genesis->GENESIS_NAME->cellAttributes() ?>>
<span id="el_esbc_genesis_GENESIS_NAME">
<input type="text" data-table="esbc_genesis" data-field="x_GENESIS_NAME" name="x_GENESIS_NAME" id="x_GENESIS_NAME" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($esbc_genesis->GENESIS_NAME->getPlaceHolder()) ?>" value="<?php echo $esbc_genesis->GENESIS_NAME->EditValue ?>"<?php echo $esbc_genesis->GENESIS_NAME->editAttributes() ?>>
</span>
<?php echo $esbc_genesis->GENESIS_NAME->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($esbc_genesis->GENESIS_TEXT->Visible) { // GENESIS_TEXT ?>
	<div id="r_GENESIS_TEXT" class="form-group row">
		<label id="elh_esbc_genesis_GENESIS_TEXT" for="x_GENESIS_TEXT" class="<?php echo $esbc_genesis_edit->LeftColumnClass ?>"><?php echo $esbc_genesis->GENESIS_TEXT->caption() ?><?php echo ($esbc_genesis->GENESIS_TEXT->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $esbc_genesis_edit->RightColumnClass ?>"><div<?php echo $esbc_genesis->GENESIS_TEXT->cellAttributes() ?>>
<span id="el_esbc_genesis_GENESIS_TEXT">
<textarea data-table="esbc_genesis" data-field="x_GENESIS_TEXT" name="x_GENESIS_TEXT" id="x_GENESIS_TEXT" cols="35" rows="4" placeholder="<?php echo HtmlEncode($esbc_genesis->GENESIS_TEXT->getPlaceHolder()) ?>"<?php echo $esbc_genesis->GENESIS_TEXT->editAttributes() ?>><?php echo $esbc_genesis->GENESIS_TEXT->EditValue ?></textarea>
</span>
<?php echo $esbc_genesis->GENESIS_TEXT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($esbc_genesis->Create_Date->Visible) { // Create_Date ?>
	<div id="r_Create_Date" class="form-group row">
		<label id="elh_esbc_genesis_Create_Date" for="x_Create_Date" class="<?php echo $esbc_genesis_edit->LeftColumnClass ?>"><?php echo $esbc_genesis->Create_Date->caption() ?><?php echo ($esbc_genesis->Create_Date->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $esbc_genesis_edit->RightColumnClass ?>"><div<?php echo $esbc_genesis->Create_Date->cellAttributes() ?>>
<span id="el_esbc_genesis_Create_Date">
<input type="text" data-table="esbc_genesis" data-field="x_Create_Date" data-format="1" name="x_Create_Date" id="x_Create_Date" placeholder="<?php echo HtmlEncode($esbc_genesis->Create_Date->getPlaceHolder()) ?>" value="<?php echo $esbc_genesis->Create_Date->EditValue ?>"<?php echo $esbc_genesis->Create_Date->editAttributes() ?>>
<?php if (!$esbc_genesis->Create_Date->ReadOnly && !$esbc_genesis->Create_Date->Disabled && !isset($esbc_genesis->Create_Date->EditAttrs["readonly"]) && !isset($esbc_genesis->Create_Date->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fesbc_genesisedit", "x_Create_Date", {"ignoreReadonly":true,"useCurrent":false,"format":1});
</script>
<?php } ?>
</span>
<?php echo $esbc_genesis->Create_Date->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$esbc_genesis_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $esbc_genesis_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $esbc_genesis_edit->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$esbc_genesis_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$esbc_genesis_edit->terminate();
?>
