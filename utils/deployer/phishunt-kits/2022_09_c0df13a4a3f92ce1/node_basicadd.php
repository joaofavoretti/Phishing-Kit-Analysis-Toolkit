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
$node_basic_add = new node_basic_add();

// Run the page
$node_basic_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$node_basic_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var fnode_basicadd = currentForm = new ew.Form("fnode_basicadd", "add");

// Validate form
fnode_basicadd.validate = function() {
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
		<?php if ($node_basic_add->ESBC_INDEX->Required) { ?>
			elm = this.getElements("x" + infix + "_ESBC_INDEX");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $node_basic->ESBC_INDEX->caption(), $node_basic->ESBC_INDEX->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ESBC_INDEX");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($node_basic->ESBC_INDEX->errorMessage()) ?>");
		<?php if ($node_basic_add->NODE_NAME->Required) { ?>
			elm = this.getElements("x" + infix + "_NODE_NAME");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $node_basic->NODE_NAME->caption(), $node_basic->NODE_NAME->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($node_basic_add->NODE_PW->Required) { ?>
			elm = this.getElements("x" + infix + "_NODE_PW");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $node_basic->NODE_PW->caption(), $node_basic->NODE_PW->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($node_basic_add->NODE_ENODE->Required) { ?>
			elm = this.getElements("x" + infix + "_NODE_ENODE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $node_basic->NODE_ENODE->caption(), $node_basic->NODE_ENODE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($node_basic_add->NODE_ACCOUNT_ID->Required) { ?>
			elm = this.getElements("x" + infix + "_NODE_ACCOUNT_ID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $node_basic->NODE_ACCOUNT_ID->caption(), $node_basic->NODE_ACCOUNT_ID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($node_basic_add->NODE_SIGNER->Required) { ?>
			elm = this.getElements("x" + infix + "_NODE_SIGNER");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $node_basic->NODE_SIGNER->caption(), $node_basic->NODE_SIGNER->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($node_basic_add->Create_Date->Required) { ?>
			elm = this.getElements("x" + infix + "_Create_Date");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $node_basic->Create_Date->caption(), $node_basic->Create_Date->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Create_Date");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($node_basic->Create_Date->errorMessage()) ?>");

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
fnode_basicadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fnode_basicadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fnode_basicadd.lists["x_NODE_SIGNER"] = <?php echo $node_basic_add->NODE_SIGNER->Lookup->toClientList() ?>;
fnode_basicadd.lists["x_NODE_SIGNER"].options = <?php echo JsonEncode($node_basic_add->NODE_SIGNER->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $node_basic_add->showPageHeader(); ?>
<?php
$node_basic_add->showMessage();
?>
<form name="fnode_basicadd" id="fnode_basicadd" class="<?php echo $node_basic_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($node_basic_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $node_basic_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="node_basic">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$node_basic_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($node_basic->ESBC_INDEX->Visible) { // ESBC_INDEX ?>
	<div id="r_ESBC_INDEX" class="form-group row">
		<label id="elh_node_basic_ESBC_INDEX" for="x_ESBC_INDEX" class="<?php echo $node_basic_add->LeftColumnClass ?>"><?php echo $node_basic->ESBC_INDEX->caption() ?><?php echo ($node_basic->ESBC_INDEX->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $node_basic_add->RightColumnClass ?>"><div<?php echo $node_basic->ESBC_INDEX->cellAttributes() ?>>
<span id="el_node_basic_ESBC_INDEX">
<input type="text" data-table="node_basic" data-field="x_ESBC_INDEX" name="x_ESBC_INDEX" id="x_ESBC_INDEX" size="30" placeholder="<?php echo HtmlEncode($node_basic->ESBC_INDEX->getPlaceHolder()) ?>" value="<?php echo $node_basic->ESBC_INDEX->EditValue ?>"<?php echo $node_basic->ESBC_INDEX->editAttributes() ?>>
</span>
<?php echo $node_basic->ESBC_INDEX->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($node_basic->NODE_NAME->Visible) { // NODE_NAME ?>
	<div id="r_NODE_NAME" class="form-group row">
		<label id="elh_node_basic_NODE_NAME" for="x_NODE_NAME" class="<?php echo $node_basic_add->LeftColumnClass ?>"><?php echo $node_basic->NODE_NAME->caption() ?><?php echo ($node_basic->NODE_NAME->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $node_basic_add->RightColumnClass ?>"><div<?php echo $node_basic->NODE_NAME->cellAttributes() ?>>
<span id="el_node_basic_NODE_NAME">
<input type="text" data-table="node_basic" data-field="x_NODE_NAME" name="x_NODE_NAME" id="x_NODE_NAME" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($node_basic->NODE_NAME->getPlaceHolder()) ?>" value="<?php echo $node_basic->NODE_NAME->EditValue ?>"<?php echo $node_basic->NODE_NAME->editAttributes() ?>>
</span>
<?php echo $node_basic->NODE_NAME->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($node_basic->NODE_PW->Visible) { // NODE_PW ?>
	<div id="r_NODE_PW" class="form-group row">
		<label id="elh_node_basic_NODE_PW" for="x_NODE_PW" class="<?php echo $node_basic_add->LeftColumnClass ?>"><?php echo $node_basic->NODE_PW->caption() ?><?php echo ($node_basic->NODE_PW->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $node_basic_add->RightColumnClass ?>"><div<?php echo $node_basic->NODE_PW->cellAttributes() ?>>
<span id="el_node_basic_NODE_PW">
<input type="text" data-table="node_basic" data-field="x_NODE_PW" name="x_NODE_PW" id="x_NODE_PW" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($node_basic->NODE_PW->getPlaceHolder()) ?>" value="<?php echo $node_basic->NODE_PW->EditValue ?>"<?php echo $node_basic->NODE_PW->editAttributes() ?>>
</span>
<?php echo $node_basic->NODE_PW->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($node_basic->NODE_ENODE->Visible) { // NODE_ENODE ?>
	<div id="r_NODE_ENODE" class="form-group row">
		<label id="elh_node_basic_NODE_ENODE" for="x_NODE_ENODE" class="<?php echo $node_basic_add->LeftColumnClass ?>"><?php echo $node_basic->NODE_ENODE->caption() ?><?php echo ($node_basic->NODE_ENODE->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $node_basic_add->RightColumnClass ?>"><div<?php echo $node_basic->NODE_ENODE->cellAttributes() ?>>
<span id="el_node_basic_NODE_ENODE">
<input type="text" data-table="node_basic" data-field="x_NODE_ENODE" name="x_NODE_ENODE" id="x_NODE_ENODE" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($node_basic->NODE_ENODE->getPlaceHolder()) ?>" value="<?php echo $node_basic->NODE_ENODE->EditValue ?>"<?php echo $node_basic->NODE_ENODE->editAttributes() ?>>
</span>
<?php echo $node_basic->NODE_ENODE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($node_basic->NODE_ACCOUNT_ID->Visible) { // NODE_ACCOUNT_ID ?>
	<div id="r_NODE_ACCOUNT_ID" class="form-group row">
		<label id="elh_node_basic_NODE_ACCOUNT_ID" for="x_NODE_ACCOUNT_ID" class="<?php echo $node_basic_add->LeftColumnClass ?>"><?php echo $node_basic->NODE_ACCOUNT_ID->caption() ?><?php echo ($node_basic->NODE_ACCOUNT_ID->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $node_basic_add->RightColumnClass ?>"><div<?php echo $node_basic->NODE_ACCOUNT_ID->cellAttributes() ?>>
<span id="el_node_basic_NODE_ACCOUNT_ID">
<input type="text" data-table="node_basic" data-field="x_NODE_ACCOUNT_ID" name="x_NODE_ACCOUNT_ID" id="x_NODE_ACCOUNT_ID" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($node_basic->NODE_ACCOUNT_ID->getPlaceHolder()) ?>" value="<?php echo $node_basic->NODE_ACCOUNT_ID->EditValue ?>"<?php echo $node_basic->NODE_ACCOUNT_ID->editAttributes() ?>>
</span>
<?php echo $node_basic->NODE_ACCOUNT_ID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($node_basic->NODE_SIGNER->Visible) { // NODE_SIGNER ?>
	<div id="r_NODE_SIGNER" class="form-group row">
		<label id="elh_node_basic_NODE_SIGNER" for="x_NODE_SIGNER" class="<?php echo $node_basic_add->LeftColumnClass ?>"><?php echo $node_basic->NODE_SIGNER->caption() ?><?php echo ($node_basic->NODE_SIGNER->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $node_basic_add->RightColumnClass ?>"><div<?php echo $node_basic->NODE_SIGNER->cellAttributes() ?>>
<span id="el_node_basic_NODE_SIGNER">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="node_basic" data-field="x_NODE_SIGNER" data-value-separator="<?php echo $node_basic->NODE_SIGNER->displayValueSeparatorAttribute() ?>" id="x_NODE_SIGNER" name="x_NODE_SIGNER"<?php echo $node_basic->NODE_SIGNER->editAttributes() ?>>
		<?php echo $node_basic->NODE_SIGNER->selectOptionListHtml("x_NODE_SIGNER") ?>
	</select>
</div>
</span>
<?php echo $node_basic->NODE_SIGNER->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($node_basic->Create_Date->Visible) { // Create_Date ?>
	<div id="r_Create_Date" class="form-group row">
		<label id="elh_node_basic_Create_Date" for="x_Create_Date" class="<?php echo $node_basic_add->LeftColumnClass ?>"><?php echo $node_basic->Create_Date->caption() ?><?php echo ($node_basic->Create_Date->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $node_basic_add->RightColumnClass ?>"><div<?php echo $node_basic->Create_Date->cellAttributes() ?>>
<span id="el_node_basic_Create_Date">
<input type="text" data-table="node_basic" data-field="x_Create_Date" data-format="1" name="x_Create_Date" id="x_Create_Date" placeholder="<?php echo HtmlEncode($node_basic->Create_Date->getPlaceHolder()) ?>" value="<?php echo $node_basic->Create_Date->EditValue ?>"<?php echo $node_basic->Create_Date->editAttributes() ?>>
<?php if (!$node_basic->Create_Date->ReadOnly && !$node_basic->Create_Date->Disabled && !isset($node_basic->Create_Date->EditAttrs["readonly"]) && !isset($node_basic->Create_Date->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fnode_basicadd", "x_Create_Date", {"ignoreReadonly":true,"useCurrent":false,"format":1});
</script>
<?php } ?>
</span>
<?php echo $node_basic->Create_Date->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$node_basic_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $node_basic_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $node_basic_add->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$node_basic_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$node_basic_add->terminate();
?>
