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
$esbc_hub_basic_add = new esbc_hub_basic_add();

// Run the page
$esbc_hub_basic_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$esbc_hub_basic_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var fesbc_hub_basicadd = currentForm = new ew.Form("fesbc_hub_basicadd", "add");

// Validate form
fesbc_hub_basicadd.validate = function() {
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
		<?php if ($esbc_hub_basic_add->HOST_INDEX->Required) { ?>
			elm = this.getElements("x" + infix + "_HOST_INDEX");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $esbc_hub_basic->HOST_INDEX->caption(), $esbc_hub_basic->HOST_INDEX->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($esbc_hub_basic_add->HUB_NAME->Required) { ?>
			elm = this.getElements("x" + infix + "_HUB_NAME");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $esbc_hub_basic->HUB_NAME->caption(), $esbc_hub_basic->HUB_NAME->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($esbc_hub_basic_add->GENESIS->Required) { ?>
			elm = this.getElements("x" + infix + "_GENESIS");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $esbc_hub_basic->GENESIS->caption(), $esbc_hub_basic->GENESIS->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($esbc_hub_basic_add->GENESIS_FILE->Required) { ?>
			elm = this.getElements("x" + infix + "_GENESIS_FILE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $esbc_hub_basic->GENESIS_FILE->caption(), $esbc_hub_basic->GENESIS_FILE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($esbc_hub_basic_add->Create_Date->Required) { ?>
			elm = this.getElements("x" + infix + "_Create_Date");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $esbc_hub_basic->Create_Date->caption(), $esbc_hub_basic->Create_Date->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Create_Date");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($esbc_hub_basic->Create_Date->errorMessage()) ?>");

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
fesbc_hub_basicadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fesbc_hub_basicadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fesbc_hub_basicadd.lists["x_HOST_INDEX"] = <?php echo $esbc_hub_basic_add->HOST_INDEX->Lookup->toClientList() ?>;
fesbc_hub_basicadd.lists["x_HOST_INDEX"].options = <?php echo JsonEncode($esbc_hub_basic_add->HOST_INDEX->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $esbc_hub_basic_add->showPageHeader(); ?>
<?php
$esbc_hub_basic_add->showMessage();
?>
<form name="fesbc_hub_basicadd" id="fesbc_hub_basicadd" class="<?php echo $esbc_hub_basic_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($esbc_hub_basic_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $esbc_hub_basic_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="esbc_hub_basic">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$esbc_hub_basic_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($esbc_hub_basic->HOST_INDEX->Visible) { // HOST_INDEX ?>
	<div id="r_HOST_INDEX" class="form-group row">
		<label id="elh_esbc_hub_basic_HOST_INDEX" for="x_HOST_INDEX" class="<?php echo $esbc_hub_basic_add->LeftColumnClass ?>"><?php echo $esbc_hub_basic->HOST_INDEX->caption() ?><?php echo ($esbc_hub_basic->HOST_INDEX->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $esbc_hub_basic_add->RightColumnClass ?>"><div<?php echo $esbc_hub_basic->HOST_INDEX->cellAttributes() ?>>
<span id="el_esbc_hub_basic_HOST_INDEX">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="esbc_hub_basic" data-field="x_HOST_INDEX" data-value-separator="<?php echo $esbc_hub_basic->HOST_INDEX->displayValueSeparatorAttribute() ?>" id="x_HOST_INDEX" name="x_HOST_INDEX"<?php echo $esbc_hub_basic->HOST_INDEX->editAttributes() ?>>
		<?php echo $esbc_hub_basic->HOST_INDEX->selectOptionListHtml("x_HOST_INDEX") ?>
	</select>
</div>
<?php echo $esbc_hub_basic->HOST_INDEX->Lookup->getParamTag("p_x_HOST_INDEX") ?>
</span>
<?php echo $esbc_hub_basic->HOST_INDEX->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($esbc_hub_basic->HUB_NAME->Visible) { // HUB_NAME ?>
	<div id="r_HUB_NAME" class="form-group row">
		<label id="elh_esbc_hub_basic_HUB_NAME" for="x_HUB_NAME" class="<?php echo $esbc_hub_basic_add->LeftColumnClass ?>"><?php echo $esbc_hub_basic->HUB_NAME->caption() ?><?php echo ($esbc_hub_basic->HUB_NAME->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $esbc_hub_basic_add->RightColumnClass ?>"><div<?php echo $esbc_hub_basic->HUB_NAME->cellAttributes() ?>>
<span id="el_esbc_hub_basic_HUB_NAME">
<input type="text" data-table="esbc_hub_basic" data-field="x_HUB_NAME" name="x_HUB_NAME" id="x_HUB_NAME" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($esbc_hub_basic->HUB_NAME->getPlaceHolder()) ?>" value="<?php echo $esbc_hub_basic->HUB_NAME->EditValue ?>"<?php echo $esbc_hub_basic->HUB_NAME->editAttributes() ?>>
</span>
<?php echo $esbc_hub_basic->HUB_NAME->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($esbc_hub_basic->GENESIS->Visible) { // GENESIS ?>
	<div id="r_GENESIS" class="form-group row">
		<label id="elh_esbc_hub_basic_GENESIS" for="x_GENESIS" class="<?php echo $esbc_hub_basic_add->LeftColumnClass ?>"><?php echo $esbc_hub_basic->GENESIS->caption() ?><?php echo ($esbc_hub_basic->GENESIS->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $esbc_hub_basic_add->RightColumnClass ?>"><div<?php echo $esbc_hub_basic->GENESIS->cellAttributes() ?>>
<span id="el_esbc_hub_basic_GENESIS">
<textarea data-table="esbc_hub_basic" data-field="x_GENESIS" name="x_GENESIS" id="x_GENESIS" cols="35" rows="4" placeholder="<?php echo HtmlEncode($esbc_hub_basic->GENESIS->getPlaceHolder()) ?>"<?php echo $esbc_hub_basic->GENESIS->editAttributes() ?>><?php echo $esbc_hub_basic->GENESIS->EditValue ?></textarea>
</span>
<?php echo $esbc_hub_basic->GENESIS->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($esbc_hub_basic->GENESIS_FILE->Visible) { // GENESIS_FILE ?>
	<div id="r_GENESIS_FILE" class="form-group row">
		<label id="elh_esbc_hub_basic_GENESIS_FILE" for="x_GENESIS_FILE" class="<?php echo $esbc_hub_basic_add->LeftColumnClass ?>"><?php echo $esbc_hub_basic->GENESIS_FILE->caption() ?><?php echo ($esbc_hub_basic->GENESIS_FILE->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $esbc_hub_basic_add->RightColumnClass ?>"><div<?php echo $esbc_hub_basic->GENESIS_FILE->cellAttributes() ?>>
<span id="el_esbc_hub_basic_GENESIS_FILE">
<textarea data-table="esbc_hub_basic" data-field="x_GENESIS_FILE" name="x_GENESIS_FILE" id="x_GENESIS_FILE" cols="35" rows="4" placeholder="<?php echo HtmlEncode($esbc_hub_basic->GENESIS_FILE->getPlaceHolder()) ?>"<?php echo $esbc_hub_basic->GENESIS_FILE->editAttributes() ?>><?php echo $esbc_hub_basic->GENESIS_FILE->EditValue ?></textarea>
</span>
<?php echo $esbc_hub_basic->GENESIS_FILE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($esbc_hub_basic->Create_Date->Visible) { // Create_Date ?>
	<div id="r_Create_Date" class="form-group row">
		<label id="elh_esbc_hub_basic_Create_Date" for="x_Create_Date" class="<?php echo $esbc_hub_basic_add->LeftColumnClass ?>"><?php echo $esbc_hub_basic->Create_Date->caption() ?><?php echo ($esbc_hub_basic->Create_Date->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $esbc_hub_basic_add->RightColumnClass ?>"><div<?php echo $esbc_hub_basic->Create_Date->cellAttributes() ?>>
<span id="el_esbc_hub_basic_Create_Date">
<input type="text" data-table="esbc_hub_basic" data-field="x_Create_Date" data-format="1" name="x_Create_Date" id="x_Create_Date" placeholder="<?php echo HtmlEncode($esbc_hub_basic->Create_Date->getPlaceHolder()) ?>" value="<?php echo $esbc_hub_basic->Create_Date->EditValue ?>"<?php echo $esbc_hub_basic->Create_Date->editAttributes() ?>>
<?php if (!$esbc_hub_basic->Create_Date->ReadOnly && !$esbc_hub_basic->Create_Date->Disabled && !isset($esbc_hub_basic->Create_Date->EditAttrs["readonly"]) && !isset($esbc_hub_basic->Create_Date->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fesbc_hub_basicadd", "x_Create_Date", {"ignoreReadonly":true,"useCurrent":false,"format":1});
</script>
<?php } ?>
</span>
<?php echo $esbc_hub_basic->Create_Date->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$esbc_hub_basic_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $esbc_hub_basic_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $esbc_hub_basic_add->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$esbc_hub_basic_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$esbc_hub_basic_add->terminate();
?>
