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
$esbc_node_basic_add = new esbc_node_basic_add();

// Run the page
$esbc_node_basic_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$esbc_node_basic_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var fesbc_node_basicadd = currentForm = new ew.Form("fesbc_node_basicadd", "add");

// Validate form
fesbc_node_basicadd.validate = function() {
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
		<?php if ($esbc_node_basic_add->HUB_INDEX->Required) { ?>
			elm = this.getElements("x" + infix + "_HUB_INDEX");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $esbc_node_basic->HUB_INDEX->caption(), $esbc_node_basic->HUB_INDEX->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($esbc_node_basic_add->NODE_NAME->Required) { ?>
			elm = this.getElements("x" + infix + "_NODE_NAME");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $esbc_node_basic->NODE_NAME->caption(), $esbc_node_basic->NODE_NAME->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($esbc_node_basic_add->NODE_PW->Required) { ?>
			elm = this.getElements("x" + infix + "_NODE_PW");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $esbc_node_basic->NODE_PW->caption(), $esbc_node_basic->NODE_PW->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($esbc_node_basic_add->NODE_ENODE->Required) { ?>
			elm = this.getElements("x" + infix + "_NODE_ENODE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $esbc_node_basic->NODE_ENODE->caption(), $esbc_node_basic->NODE_ENODE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($esbc_node_basic_add->NODE_ACC40->Required) { ?>
			elm = this.getElements("x" + infix + "_NODE_ACC40");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $esbc_node_basic->NODE_ACC40->caption(), $esbc_node_basic->NODE_ACC40->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($esbc_node_basic_add->NODE_SIGNER->Required) { ?>
			elm = this.getElements("x" + infix + "_NODE_SIGNER");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $esbc_node_basic->NODE_SIGNER->caption(), $esbc_node_basic->NODE_SIGNER->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($esbc_node_basic_add->Create_Date->Required) { ?>
			elm = this.getElements("x" + infix + "_Create_Date");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $esbc_node_basic->Create_Date->caption(), $esbc_node_basic->Create_Date->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Create_Date");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($esbc_node_basic->Create_Date->errorMessage()) ?>");

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
fesbc_node_basicadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fesbc_node_basicadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fesbc_node_basicadd.lists["x_HUB_INDEX"] = <?php echo $esbc_node_basic_add->HUB_INDEX->Lookup->toClientList() ?>;
fesbc_node_basicadd.lists["x_HUB_INDEX"].options = <?php echo JsonEncode($esbc_node_basic_add->HUB_INDEX->lookupOptions()) ?>;
fesbc_node_basicadd.lists["x_NODE_SIGNER"] = <?php echo $esbc_node_basic_add->NODE_SIGNER->Lookup->toClientList() ?>;
fesbc_node_basicadd.lists["x_NODE_SIGNER"].options = <?php echo JsonEncode($esbc_node_basic_add->NODE_SIGNER->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $esbc_node_basic_add->showPageHeader(); ?>
<?php
$esbc_node_basic_add->showMessage();
?>
<form name="fesbc_node_basicadd" id="fesbc_node_basicadd" class="<?php echo $esbc_node_basic_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($esbc_node_basic_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $esbc_node_basic_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="esbc_node_basic">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$esbc_node_basic_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($esbc_node_basic->HUB_INDEX->Visible) { // HUB_INDEX ?>
	<div id="r_HUB_INDEX" class="form-group row">
		<label id="elh_esbc_node_basic_HUB_INDEX" for="x_HUB_INDEX" class="<?php echo $esbc_node_basic_add->LeftColumnClass ?>"><?php echo $esbc_node_basic->HUB_INDEX->caption() ?><?php echo ($esbc_node_basic->HUB_INDEX->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $esbc_node_basic_add->RightColumnClass ?>"><div<?php echo $esbc_node_basic->HUB_INDEX->cellAttributes() ?>>
<span id="el_esbc_node_basic_HUB_INDEX">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="esbc_node_basic" data-field="x_HUB_INDEX" data-value-separator="<?php echo $esbc_node_basic->HUB_INDEX->displayValueSeparatorAttribute() ?>" id="x_HUB_INDEX" name="x_HUB_INDEX"<?php echo $esbc_node_basic->HUB_INDEX->editAttributes() ?>>
		<?php echo $esbc_node_basic->HUB_INDEX->selectOptionListHtml("x_HUB_INDEX") ?>
	</select>
</div>
<?php echo $esbc_node_basic->HUB_INDEX->Lookup->getParamTag("p_x_HUB_INDEX") ?>
</span>
<?php echo $esbc_node_basic->HUB_INDEX->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($esbc_node_basic->NODE_NAME->Visible) { // NODE_NAME ?>
	<div id="r_NODE_NAME" class="form-group row">
		<label id="elh_esbc_node_basic_NODE_NAME" for="x_NODE_NAME" class="<?php echo $esbc_node_basic_add->LeftColumnClass ?>"><?php echo $esbc_node_basic->NODE_NAME->caption() ?><?php echo ($esbc_node_basic->NODE_NAME->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $esbc_node_basic_add->RightColumnClass ?>"><div<?php echo $esbc_node_basic->NODE_NAME->cellAttributes() ?>>
<span id="el_esbc_node_basic_NODE_NAME">
<input type="text" data-table="esbc_node_basic" data-field="x_NODE_NAME" name="x_NODE_NAME" id="x_NODE_NAME" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($esbc_node_basic->NODE_NAME->getPlaceHolder()) ?>" value="<?php echo $esbc_node_basic->NODE_NAME->EditValue ?>"<?php echo $esbc_node_basic->NODE_NAME->editAttributes() ?>>
</span>
<?php echo $esbc_node_basic->NODE_NAME->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($esbc_node_basic->NODE_PW->Visible) { // NODE_PW ?>
	<div id="r_NODE_PW" class="form-group row">
		<label id="elh_esbc_node_basic_NODE_PW" for="x_NODE_PW" class="<?php echo $esbc_node_basic_add->LeftColumnClass ?>"><?php echo $esbc_node_basic->NODE_PW->caption() ?><?php echo ($esbc_node_basic->NODE_PW->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $esbc_node_basic_add->RightColumnClass ?>"><div<?php echo $esbc_node_basic->NODE_PW->cellAttributes() ?>>
<span id="el_esbc_node_basic_NODE_PW">
<input type="text" data-table="esbc_node_basic" data-field="x_NODE_PW" name="x_NODE_PW" id="x_NODE_PW" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($esbc_node_basic->NODE_PW->getPlaceHolder()) ?>" value="<?php echo $esbc_node_basic->NODE_PW->EditValue ?>"<?php echo $esbc_node_basic->NODE_PW->editAttributes() ?>>
</span>
<?php echo $esbc_node_basic->NODE_PW->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($esbc_node_basic->NODE_ENODE->Visible) { // NODE_ENODE ?>
	<div id="r_NODE_ENODE" class="form-group row">
		<label id="elh_esbc_node_basic_NODE_ENODE" for="x_NODE_ENODE" class="<?php echo $esbc_node_basic_add->LeftColumnClass ?>"><?php echo $esbc_node_basic->NODE_ENODE->caption() ?><?php echo ($esbc_node_basic->NODE_ENODE->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $esbc_node_basic_add->RightColumnClass ?>"><div<?php echo $esbc_node_basic->NODE_ENODE->cellAttributes() ?>>
<span id="el_esbc_node_basic_NODE_ENODE">
<input type="text" data-table="esbc_node_basic" data-field="x_NODE_ENODE" name="x_NODE_ENODE" id="x_NODE_ENODE" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($esbc_node_basic->NODE_ENODE->getPlaceHolder()) ?>" value="<?php echo $esbc_node_basic->NODE_ENODE->EditValue ?>"<?php echo $esbc_node_basic->NODE_ENODE->editAttributes() ?>>
</span>
<?php echo $esbc_node_basic->NODE_ENODE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($esbc_node_basic->NODE_ACC40->Visible) { // NODE_ACC40 ?>
	<div id="r_NODE_ACC40" class="form-group row">
		<label id="elh_esbc_node_basic_NODE_ACC40" for="x_NODE_ACC40" class="<?php echo $esbc_node_basic_add->LeftColumnClass ?>"><?php echo $esbc_node_basic->NODE_ACC40->caption() ?><?php echo ($esbc_node_basic->NODE_ACC40->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $esbc_node_basic_add->RightColumnClass ?>"><div<?php echo $esbc_node_basic->NODE_ACC40->cellAttributes() ?>>
<span id="el_esbc_node_basic_NODE_ACC40">
<input type="text" data-table="esbc_node_basic" data-field="x_NODE_ACC40" name="x_NODE_ACC40" id="x_NODE_ACC40" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($esbc_node_basic->NODE_ACC40->getPlaceHolder()) ?>" value="<?php echo $esbc_node_basic->NODE_ACC40->EditValue ?>"<?php echo $esbc_node_basic->NODE_ACC40->editAttributes() ?>>
</span>
<?php echo $esbc_node_basic->NODE_ACC40->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($esbc_node_basic->NODE_SIGNER->Visible) { // NODE_SIGNER ?>
	<div id="r_NODE_SIGNER" class="form-group row">
		<label id="elh_esbc_node_basic_NODE_SIGNER" for="x_NODE_SIGNER" class="<?php echo $esbc_node_basic_add->LeftColumnClass ?>"><?php echo $esbc_node_basic->NODE_SIGNER->caption() ?><?php echo ($esbc_node_basic->NODE_SIGNER->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $esbc_node_basic_add->RightColumnClass ?>"><div<?php echo $esbc_node_basic->NODE_SIGNER->cellAttributes() ?>>
<span id="el_esbc_node_basic_NODE_SIGNER">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="esbc_node_basic" data-field="x_NODE_SIGNER" data-value-separator="<?php echo $esbc_node_basic->NODE_SIGNER->displayValueSeparatorAttribute() ?>" id="x_NODE_SIGNER" name="x_NODE_SIGNER"<?php echo $esbc_node_basic->NODE_SIGNER->editAttributes() ?>>
		<?php echo $esbc_node_basic->NODE_SIGNER->selectOptionListHtml("x_NODE_SIGNER") ?>
	</select>
</div>
</span>
<?php echo $esbc_node_basic->NODE_SIGNER->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($esbc_node_basic->Create_Date->Visible) { // Create_Date ?>
	<div id="r_Create_Date" class="form-group row">
		<label id="elh_esbc_node_basic_Create_Date" for="x_Create_Date" class="<?php echo $esbc_node_basic_add->LeftColumnClass ?>"><?php echo $esbc_node_basic->Create_Date->caption() ?><?php echo ($esbc_node_basic->Create_Date->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $esbc_node_basic_add->RightColumnClass ?>"><div<?php echo $esbc_node_basic->Create_Date->cellAttributes() ?>>
<span id="el_esbc_node_basic_Create_Date">
<input type="text" data-table="esbc_node_basic" data-field="x_Create_Date" data-format="1" name="x_Create_Date" id="x_Create_Date" placeholder="<?php echo HtmlEncode($esbc_node_basic->Create_Date->getPlaceHolder()) ?>" value="<?php echo $esbc_node_basic->Create_Date->EditValue ?>"<?php echo $esbc_node_basic->Create_Date->editAttributes() ?>>
<?php if (!$esbc_node_basic->Create_Date->ReadOnly && !$esbc_node_basic->Create_Date->Disabled && !isset($esbc_node_basic->Create_Date->EditAttrs["readonly"]) && !isset($esbc_node_basic->Create_Date->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fesbc_node_basicadd", "x_Create_Date", {"ignoreReadonly":true,"useCurrent":false,"format":1});
</script>
<?php } ?>
</span>
<?php echo $esbc_node_basic->Create_Date->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$esbc_node_basic_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $esbc_node_basic_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $esbc_node_basic_add->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$esbc_node_basic_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$esbc_node_basic_add->terminate();
?>
