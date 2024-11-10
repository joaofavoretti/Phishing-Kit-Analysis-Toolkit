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
$basic_acc_add = new basic_acc_add();

// Run the page
$basic_acc_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$basic_acc_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var fbasic_accadd = currentForm = new ew.Form("fbasic_accadd", "add");

// Validate form
fbasic_accadd.validate = function() {
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
		<?php if ($basic_acc_add->acc_addr->Required) { ?>
			elm = this.getElements("x" + infix + "_acc_addr");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $basic_acc->acc_addr->caption(), $basic_acc->acc_addr->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($basic_acc_add->acc_name->Required) { ?>
			elm = this.getElements("x" + infix + "_acc_name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $basic_acc->acc_name->caption(), $basic_acc->acc_name->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($basic_acc_add->type->Required) { ?>
			elm = this.getElements("x" + infix + "_type");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $basic_acc->type->caption(), $basic_acc->type->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($basic_acc_add->balance->Required) { ?>
			elm = this.getElements("x" + infix + "_balance");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $basic_acc->balance->caption(), $basic_acc->balance->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($basic_acc_add->txcount->Required) { ?>
			elm = this.getElements("x" + infix + "_txcount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $basic_acc->txcount->caption(), $basic_acc->txcount->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($basic_acc_add->dateadd->Required) { ?>
			elm = this.getElements("x" + infix + "_dateadd");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $basic_acc->dateadd->caption(), $basic_acc->dateadd->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_dateadd");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($basic_acc->dateadd->errorMessage()) ?>");

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
fbasic_accadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fbasic_accadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fbasic_accadd.lists["x_type"] = <?php echo $basic_acc_add->type->Lookup->toClientList() ?>;
fbasic_accadd.lists["x_type"].options = <?php echo JsonEncode($basic_acc_add->type->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $basic_acc_add->showPageHeader(); ?>
<?php
$basic_acc_add->showMessage();
?>
<form name="fbasic_accadd" id="fbasic_accadd" class="<?php echo $basic_acc_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($basic_acc_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $basic_acc_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="basic_acc">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$basic_acc_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($basic_acc->acc_addr->Visible) { // acc_addr ?>
	<div id="r_acc_addr" class="form-group row">
		<label id="elh_basic_acc_acc_addr" for="x_acc_addr" class="<?php echo $basic_acc_add->LeftColumnClass ?>"><?php echo $basic_acc->acc_addr->caption() ?><?php echo ($basic_acc->acc_addr->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $basic_acc_add->RightColumnClass ?>"><div<?php echo $basic_acc->acc_addr->cellAttributes() ?>>
<span id="el_basic_acc_acc_addr">
<input type="text" data-table="basic_acc" data-field="x_acc_addr" name="x_acc_addr" id="x_acc_addr" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($basic_acc->acc_addr->getPlaceHolder()) ?>" value="<?php echo $basic_acc->acc_addr->EditValue ?>"<?php echo $basic_acc->acc_addr->editAttributes() ?>>
</span>
<?php echo $basic_acc->acc_addr->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($basic_acc->acc_name->Visible) { // acc_name ?>
	<div id="r_acc_name" class="form-group row">
		<label id="elh_basic_acc_acc_name" for="x_acc_name" class="<?php echo $basic_acc_add->LeftColumnClass ?>"><?php echo $basic_acc->acc_name->caption() ?><?php echo ($basic_acc->acc_name->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $basic_acc_add->RightColumnClass ?>"><div<?php echo $basic_acc->acc_name->cellAttributes() ?>>
<span id="el_basic_acc_acc_name">
<input type="text" data-table="basic_acc" data-field="x_acc_name" name="x_acc_name" id="x_acc_name" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($basic_acc->acc_name->getPlaceHolder()) ?>" value="<?php echo $basic_acc->acc_name->EditValue ?>"<?php echo $basic_acc->acc_name->editAttributes() ?>>
</span>
<?php echo $basic_acc->acc_name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($basic_acc->type->Visible) { // type ?>
	<div id="r_type" class="form-group row">
		<label id="elh_basic_acc_type" for="x_type" class="<?php echo $basic_acc_add->LeftColumnClass ?>"><?php echo $basic_acc->type->caption() ?><?php echo ($basic_acc->type->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $basic_acc_add->RightColumnClass ?>"><div<?php echo $basic_acc->type->cellAttributes() ?>>
<span id="el_basic_acc_type">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="basic_acc" data-field="x_type" data-value-separator="<?php echo $basic_acc->type->displayValueSeparatorAttribute() ?>" id="x_type" name="x_type"<?php echo $basic_acc->type->editAttributes() ?>>
		<?php echo $basic_acc->type->selectOptionListHtml("x_type") ?>
	</select>
</div>
</span>
<?php echo $basic_acc->type->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($basic_acc->balance->Visible) { // balance ?>
	<div id="r_balance" class="form-group row">
		<label id="elh_basic_acc_balance" for="x_balance" class="<?php echo $basic_acc_add->LeftColumnClass ?>"><?php echo $basic_acc->balance->caption() ?><?php echo ($basic_acc->balance->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $basic_acc_add->RightColumnClass ?>"><div<?php echo $basic_acc->balance->cellAttributes() ?>>
<span id="el_basic_acc_balance">
<input type="text" data-table="basic_acc" data-field="x_balance" name="x_balance" id="x_balance" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($basic_acc->balance->getPlaceHolder()) ?>" value="<?php echo $basic_acc->balance->EditValue ?>"<?php echo $basic_acc->balance->editAttributes() ?>>
</span>
<?php echo $basic_acc->balance->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($basic_acc->txcount->Visible) { // txcount ?>
	<div id="r_txcount" class="form-group row">
		<label id="elh_basic_acc_txcount" for="x_txcount" class="<?php echo $basic_acc_add->LeftColumnClass ?>"><?php echo $basic_acc->txcount->caption() ?><?php echo ($basic_acc->txcount->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $basic_acc_add->RightColumnClass ?>"><div<?php echo $basic_acc->txcount->cellAttributes() ?>>
<span id="el_basic_acc_txcount">
<input type="text" data-table="basic_acc" data-field="x_txcount" name="x_txcount" id="x_txcount" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($basic_acc->txcount->getPlaceHolder()) ?>" value="<?php echo $basic_acc->txcount->EditValue ?>"<?php echo $basic_acc->txcount->editAttributes() ?>>
</span>
<?php echo $basic_acc->txcount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($basic_acc->dateadd->Visible) { // dateadd ?>
	<div id="r_dateadd" class="form-group row">
		<label id="elh_basic_acc_dateadd" for="x_dateadd" class="<?php echo $basic_acc_add->LeftColumnClass ?>"><?php echo $basic_acc->dateadd->caption() ?><?php echo ($basic_acc->dateadd->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $basic_acc_add->RightColumnClass ?>"><div<?php echo $basic_acc->dateadd->cellAttributes() ?>>
<span id="el_basic_acc_dateadd">
<input type="text" data-table="basic_acc" data-field="x_dateadd" data-format="1" name="x_dateadd" id="x_dateadd" placeholder="<?php echo HtmlEncode($basic_acc->dateadd->getPlaceHolder()) ?>" value="<?php echo $basic_acc->dateadd->EditValue ?>"<?php echo $basic_acc->dateadd->editAttributes() ?>>
<?php if (!$basic_acc->dateadd->ReadOnly && !$basic_acc->dateadd->Disabled && !isset($basic_acc->dateadd->EditAttrs["readonly"]) && !isset($basic_acc->dateadd->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fbasic_accadd", "x_dateadd", {"ignoreReadonly":true,"useCurrent":false,"format":1});
</script>
<?php } ?>
</span>
<?php echo $basic_acc->dateadd->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$basic_acc_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $basic_acc_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $basic_acc_add->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$basic_acc_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$basic_acc_add->terminate();
?>
