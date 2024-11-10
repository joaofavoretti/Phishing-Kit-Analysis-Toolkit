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
$esbc_contract_edit = new esbc_contract_edit();

// Run the page
$esbc_contract_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$esbc_contract_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fesbc_contractedit = currentForm = new ew.Form("fesbc_contractedit", "edit");

// Validate form
fesbc_contractedit.validate = function() {
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
		<?php if ($esbc_contract_edit->con_addr->Required) { ?>
			elm = this.getElements("x" + infix + "_con_addr");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $esbc_contract->con_addr->caption(), $esbc_contract->con_addr->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($esbc_contract_edit->con_owner->Required) { ?>
			elm = this.getElements("x" + infix + "_con_owner");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $esbc_contract->con_owner->caption(), $esbc_contract->con_owner->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($esbc_contract_edit->con_source->Required) { ?>
			elm = this.getElements("x" + infix + "_con_source");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $esbc_contract->con_source->caption(), $esbc_contract->con_source->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($esbc_contract_edit->date_add->Required) { ?>
			elm = this.getElements("x" + infix + "_date_add");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $esbc_contract->date_add->caption(), $esbc_contract->date_add->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_date_add");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($esbc_contract->date_add->errorMessage()) ?>");

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
fesbc_contractedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fesbc_contractedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $esbc_contract_edit->showPageHeader(); ?>
<?php
$esbc_contract_edit->showMessage();
?>
<form name="fesbc_contractedit" id="fesbc_contractedit" class="<?php echo $esbc_contract_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($esbc_contract_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $esbc_contract_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="esbc_contract">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$esbc_contract_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($esbc_contract->con_addr->Visible) { // con_addr ?>
	<div id="r_con_addr" class="form-group row">
		<label id="elh_esbc_contract_con_addr" for="x_con_addr" class="<?php echo $esbc_contract_edit->LeftColumnClass ?>"><?php echo $esbc_contract->con_addr->caption() ?><?php echo ($esbc_contract->con_addr->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $esbc_contract_edit->RightColumnClass ?>"><div<?php echo $esbc_contract->con_addr->cellAttributes() ?>>
<span id="el_esbc_contract_con_addr">
<span<?php echo $esbc_contract->con_addr->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($esbc_contract->con_addr->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="esbc_contract" data-field="x_con_addr" name="x_con_addr" id="x_con_addr" value="<?php echo HtmlEncode($esbc_contract->con_addr->CurrentValue) ?>">
<?php echo $esbc_contract->con_addr->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($esbc_contract->con_owner->Visible) { // con_owner ?>
	<div id="r_con_owner" class="form-group row">
		<label id="elh_esbc_contract_con_owner" for="x_con_owner" class="<?php echo $esbc_contract_edit->LeftColumnClass ?>"><?php echo $esbc_contract->con_owner->caption() ?><?php echo ($esbc_contract->con_owner->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $esbc_contract_edit->RightColumnClass ?>"><div<?php echo $esbc_contract->con_owner->cellAttributes() ?>>
<span id="el_esbc_contract_con_owner">
<input type="text" data-table="esbc_contract" data-field="x_con_owner" name="x_con_owner" id="x_con_owner" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($esbc_contract->con_owner->getPlaceHolder()) ?>" value="<?php echo $esbc_contract->con_owner->EditValue ?>"<?php echo $esbc_contract->con_owner->editAttributes() ?>>
</span>
<?php echo $esbc_contract->con_owner->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($esbc_contract->con_source->Visible) { // con_source ?>
	<div id="r_con_source" class="form-group row">
		<label id="elh_esbc_contract_con_source" for="x_con_source" class="<?php echo $esbc_contract_edit->LeftColumnClass ?>"><?php echo $esbc_contract->con_source->caption() ?><?php echo ($esbc_contract->con_source->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $esbc_contract_edit->RightColumnClass ?>"><div<?php echo $esbc_contract->con_source->cellAttributes() ?>>
<span id="el_esbc_contract_con_source">
<textarea data-table="esbc_contract" data-field="x_con_source" name="x_con_source" id="x_con_source" cols="35" rows="4" placeholder="<?php echo HtmlEncode($esbc_contract->con_source->getPlaceHolder()) ?>"<?php echo $esbc_contract->con_source->editAttributes() ?>><?php echo $esbc_contract->con_source->EditValue ?></textarea>
</span>
<?php echo $esbc_contract->con_source->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($esbc_contract->date_add->Visible) { // date_add ?>
	<div id="r_date_add" class="form-group row">
		<label id="elh_esbc_contract_date_add" for="x_date_add" class="<?php echo $esbc_contract_edit->LeftColumnClass ?>"><?php echo $esbc_contract->date_add->caption() ?><?php echo ($esbc_contract->date_add->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $esbc_contract_edit->RightColumnClass ?>"><div<?php echo $esbc_contract->date_add->cellAttributes() ?>>
<span id="el_esbc_contract_date_add">
<input type="text" data-table="esbc_contract" data-field="x_date_add" data-format="1" name="x_date_add" id="x_date_add" placeholder="<?php echo HtmlEncode($esbc_contract->date_add->getPlaceHolder()) ?>" value="<?php echo $esbc_contract->date_add->EditValue ?>"<?php echo $esbc_contract->date_add->editAttributes() ?>>
<?php if (!$esbc_contract->date_add->ReadOnly && !$esbc_contract->date_add->Disabled && !isset($esbc_contract->date_add->EditAttrs["readonly"]) && !isset($esbc_contract->date_add->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fesbc_contractedit", "x_date_add", {"ignoreReadonly":true,"useCurrent":false,"format":1});
</script>
<?php } ?>
</span>
<?php echo $esbc_contract->date_add->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$esbc_contract_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $esbc_contract_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $esbc_contract_edit->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$esbc_contract_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$esbc_contract_edit->terminate();
?>
