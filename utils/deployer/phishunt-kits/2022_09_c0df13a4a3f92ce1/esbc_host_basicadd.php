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
$esbc_host_basic_add = new esbc_host_basic_add();

// Run the page
$esbc_host_basic_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$esbc_host_basic_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var fesbc_host_basicadd = currentForm = new ew.Form("fesbc_host_basicadd", "add");

// Validate form
fesbc_host_basicadd.validate = function() {
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
		<?php if ($esbc_host_basic_add->HOST_TYPE->Required) { ?>
			elm = this.getElements("x" + infix + "_HOST_TYPE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $esbc_host_basic->HOST_TYPE->caption(), $esbc_host_basic->HOST_TYPE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($esbc_host_basic_add->HOSTNAME->Required) { ?>
			elm = this.getElements("x" + infix + "_HOSTNAME");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $esbc_host_basic->HOSTNAME->caption(), $esbc_host_basic->HOSTNAME->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($esbc_host_basic_add->HOST_ROOTID->Required) { ?>
			elm = this.getElements("x" + infix + "_HOST_ROOTID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $esbc_host_basic->HOST_ROOTID->caption(), $esbc_host_basic->HOST_ROOTID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($esbc_host_basic_add->HOST_IP->Required) { ?>
			elm = this.getElements("x" + infix + "_HOST_IP");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $esbc_host_basic->HOST_IP->caption(), $esbc_host_basic->HOST_IP->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($esbc_host_basic_add->HOST_PW->Required) { ?>
			elm = this.getElements("x" + infix + "_HOST_PW");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $esbc_host_basic->HOST_PW->caption(), $esbc_host_basic->HOST_PW->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($esbc_host_basic_add->HOST_OWNER->Required) { ?>
			elm = this.getElements("x" + infix + "_HOST_OWNER");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $esbc_host_basic->HOST_OWNER->caption(), $esbc_host_basic->HOST_OWNER->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($esbc_host_basic_add->NODENAME_ARRAY->Required) { ?>
			elm = this.getElements("x" + infix + "_NODENAME_ARRAY");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $esbc_host_basic->NODENAME_ARRAY->caption(), $esbc_host_basic->NODENAME_ARRAY->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($esbc_host_basic_add->PW_ARRAY->Required) { ?>
			elm = this.getElements("x" + infix + "_PW_ARRAY");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $esbc_host_basic->PW_ARRAY->caption(), $esbc_host_basic->PW_ARRAY->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($esbc_host_basic_add->MYSQL_OWNER->Required) { ?>
			elm = this.getElements("x" + infix + "_MYSQL_OWNER");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $esbc_host_basic->MYSQL_OWNER->caption(), $esbc_host_basic->MYSQL_OWNER->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($esbc_host_basic_add->MYSQL_PW->Required) { ?>
			elm = this.getElements("x" + infix + "_MYSQL_PW");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $esbc_host_basic->MYSQL_PW->caption(), $esbc_host_basic->MYSQL_PW->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($esbc_host_basic_add->FTP_OWNER->Required) { ?>
			elm = this.getElements("x" + infix + "_FTP_OWNER");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $esbc_host_basic->FTP_OWNER->caption(), $esbc_host_basic->FTP_OWNER->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($esbc_host_basic_add->FTP_PW->Required) { ?>
			elm = this.getElements("x" + infix + "_FTP_PW");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $esbc_host_basic->FTP_PW->caption(), $esbc_host_basic->FTP_PW->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($esbc_host_basic_add->NETWORKID->Required) { ?>
			elm = this.getElements("x" + infix + "_NETWORKID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $esbc_host_basic->NETWORKID->caption(), $esbc_host_basic->NETWORKID->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_NETWORKID");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($esbc_host_basic->NETWORKID->errorMessage()) ?>");
		<?php if ($esbc_host_basic_add->BC_PORT_BASE->Required) { ?>
			elm = this.getElements("x" + infix + "_BC_PORT_BASE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $esbc_host_basic->BC_PORT_BASE->caption(), $esbc_host_basic->BC_PORT_BASE->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_BC_PORT_BASE");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($esbc_host_basic->BC_PORT_BASE->errorMessage()) ?>");
		<?php if ($esbc_host_basic_add->HTTP_PORT->Required) { ?>
			elm = this.getElements("x" + infix + "_HTTP_PORT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $esbc_host_basic->HTTP_PORT->caption(), $esbc_host_basic->HTTP_PORT->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_HTTP_PORT");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($esbc_host_basic->HTTP_PORT->errorMessage()) ?>");
		<?php if ($esbc_host_basic_add->RPCPORT_BASE->Required) { ?>
			elm = this.getElements("x" + infix + "_RPCPORT_BASE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $esbc_host_basic->RPCPORT_BASE->caption(), $esbc_host_basic->RPCPORT_BASE->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_RPCPORT_BASE");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($esbc_host_basic->RPCPORT_BASE->errorMessage()) ?>");
		<?php if ($esbc_host_basic_add->Create_Date->Required) { ?>
			elm = this.getElements("x" + infix + "_Create_Date");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $esbc_host_basic->Create_Date->caption(), $esbc_host_basic->Create_Date->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Create_Date");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($esbc_host_basic->Create_Date->errorMessage()) ?>");

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
fesbc_host_basicadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fesbc_host_basicadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $esbc_host_basic_add->showPageHeader(); ?>
<?php
$esbc_host_basic_add->showMessage();
?>
<form name="fesbc_host_basicadd" id="fesbc_host_basicadd" class="<?php echo $esbc_host_basic_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($esbc_host_basic_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $esbc_host_basic_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="esbc_host_basic">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$esbc_host_basic_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($esbc_host_basic->HOST_TYPE->Visible) { // HOST_TYPE ?>
	<div id="r_HOST_TYPE" class="form-group row">
		<label id="elh_esbc_host_basic_HOST_TYPE" for="x_HOST_TYPE" class="<?php echo $esbc_host_basic_add->LeftColumnClass ?>"><?php echo $esbc_host_basic->HOST_TYPE->caption() ?><?php echo ($esbc_host_basic->HOST_TYPE->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $esbc_host_basic_add->RightColumnClass ?>"><div<?php echo $esbc_host_basic->HOST_TYPE->cellAttributes() ?>>
<span id="el_esbc_host_basic_HOST_TYPE">
<input type="text" data-table="esbc_host_basic" data-field="x_HOST_TYPE" name="x_HOST_TYPE" id="x_HOST_TYPE" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($esbc_host_basic->HOST_TYPE->getPlaceHolder()) ?>" value="<?php echo $esbc_host_basic->HOST_TYPE->EditValue ?>"<?php echo $esbc_host_basic->HOST_TYPE->editAttributes() ?>>
</span>
<?php echo $esbc_host_basic->HOST_TYPE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($esbc_host_basic->HOSTNAME->Visible) { // HOSTNAME ?>
	<div id="r_HOSTNAME" class="form-group row">
		<label id="elh_esbc_host_basic_HOSTNAME" for="x_HOSTNAME" class="<?php echo $esbc_host_basic_add->LeftColumnClass ?>"><?php echo $esbc_host_basic->HOSTNAME->caption() ?><?php echo ($esbc_host_basic->HOSTNAME->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $esbc_host_basic_add->RightColumnClass ?>"><div<?php echo $esbc_host_basic->HOSTNAME->cellAttributes() ?>>
<span id="el_esbc_host_basic_HOSTNAME">
<input type="text" data-table="esbc_host_basic" data-field="x_HOSTNAME" name="x_HOSTNAME" id="x_HOSTNAME" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($esbc_host_basic->HOSTNAME->getPlaceHolder()) ?>" value="<?php echo $esbc_host_basic->HOSTNAME->EditValue ?>"<?php echo $esbc_host_basic->HOSTNAME->editAttributes() ?>>
</span>
<?php echo $esbc_host_basic->HOSTNAME->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($esbc_host_basic->HOST_ROOTID->Visible) { // HOST_ROOTID ?>
	<div id="r_HOST_ROOTID" class="form-group row">
		<label id="elh_esbc_host_basic_HOST_ROOTID" for="x_HOST_ROOTID" class="<?php echo $esbc_host_basic_add->LeftColumnClass ?>"><?php echo $esbc_host_basic->HOST_ROOTID->caption() ?><?php echo ($esbc_host_basic->HOST_ROOTID->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $esbc_host_basic_add->RightColumnClass ?>"><div<?php echo $esbc_host_basic->HOST_ROOTID->cellAttributes() ?>>
<span id="el_esbc_host_basic_HOST_ROOTID">
<input type="text" data-table="esbc_host_basic" data-field="x_HOST_ROOTID" name="x_HOST_ROOTID" id="x_HOST_ROOTID" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($esbc_host_basic->HOST_ROOTID->getPlaceHolder()) ?>" value="<?php echo $esbc_host_basic->HOST_ROOTID->EditValue ?>"<?php echo $esbc_host_basic->HOST_ROOTID->editAttributes() ?>>
</span>
<?php echo $esbc_host_basic->HOST_ROOTID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($esbc_host_basic->HOST_IP->Visible) { // HOST_IP ?>
	<div id="r_HOST_IP" class="form-group row">
		<label id="elh_esbc_host_basic_HOST_IP" for="x_HOST_IP" class="<?php echo $esbc_host_basic_add->LeftColumnClass ?>"><?php echo $esbc_host_basic->HOST_IP->caption() ?><?php echo ($esbc_host_basic->HOST_IP->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $esbc_host_basic_add->RightColumnClass ?>"><div<?php echo $esbc_host_basic->HOST_IP->cellAttributes() ?>>
<span id="el_esbc_host_basic_HOST_IP">
<input type="text" data-table="esbc_host_basic" data-field="x_HOST_IP" name="x_HOST_IP" id="x_HOST_IP" size="30" maxlength="16" placeholder="<?php echo HtmlEncode($esbc_host_basic->HOST_IP->getPlaceHolder()) ?>" value="<?php echo $esbc_host_basic->HOST_IP->EditValue ?>"<?php echo $esbc_host_basic->HOST_IP->editAttributes() ?>>
</span>
<?php echo $esbc_host_basic->HOST_IP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($esbc_host_basic->HOST_PW->Visible) { // HOST_PW ?>
	<div id="r_HOST_PW" class="form-group row">
		<label id="elh_esbc_host_basic_HOST_PW" for="x_HOST_PW" class="<?php echo $esbc_host_basic_add->LeftColumnClass ?>"><?php echo $esbc_host_basic->HOST_PW->caption() ?><?php echo ($esbc_host_basic->HOST_PW->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $esbc_host_basic_add->RightColumnClass ?>"><div<?php echo $esbc_host_basic->HOST_PW->cellAttributes() ?>>
<span id="el_esbc_host_basic_HOST_PW">
<input type="text" data-table="esbc_host_basic" data-field="x_HOST_PW" name="x_HOST_PW" id="x_HOST_PW" size="30" maxlength="30" placeholder="<?php echo HtmlEncode($esbc_host_basic->HOST_PW->getPlaceHolder()) ?>" value="<?php echo $esbc_host_basic->HOST_PW->EditValue ?>"<?php echo $esbc_host_basic->HOST_PW->editAttributes() ?>>
</span>
<?php echo $esbc_host_basic->HOST_PW->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($esbc_host_basic->HOST_OWNER->Visible) { // HOST_OWNER ?>
	<div id="r_HOST_OWNER" class="form-group row">
		<label id="elh_esbc_host_basic_HOST_OWNER" for="x_HOST_OWNER" class="<?php echo $esbc_host_basic_add->LeftColumnClass ?>"><?php echo $esbc_host_basic->HOST_OWNER->caption() ?><?php echo ($esbc_host_basic->HOST_OWNER->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $esbc_host_basic_add->RightColumnClass ?>"><div<?php echo $esbc_host_basic->HOST_OWNER->cellAttributes() ?>>
<span id="el_esbc_host_basic_HOST_OWNER">
<input type="text" data-table="esbc_host_basic" data-field="x_HOST_OWNER" name="x_HOST_OWNER" id="x_HOST_OWNER" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($esbc_host_basic->HOST_OWNER->getPlaceHolder()) ?>" value="<?php echo $esbc_host_basic->HOST_OWNER->EditValue ?>"<?php echo $esbc_host_basic->HOST_OWNER->editAttributes() ?>>
</span>
<?php echo $esbc_host_basic->HOST_OWNER->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($esbc_host_basic->NODENAME_ARRAY->Visible) { // NODENAME_ARRAY ?>
	<div id="r_NODENAME_ARRAY" class="form-group row">
		<label id="elh_esbc_host_basic_NODENAME_ARRAY" for="x_NODENAME_ARRAY" class="<?php echo $esbc_host_basic_add->LeftColumnClass ?>"><?php echo $esbc_host_basic->NODENAME_ARRAY->caption() ?><?php echo ($esbc_host_basic->NODENAME_ARRAY->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $esbc_host_basic_add->RightColumnClass ?>"><div<?php echo $esbc_host_basic->NODENAME_ARRAY->cellAttributes() ?>>
<span id="el_esbc_host_basic_NODENAME_ARRAY">
<input type="text" data-table="esbc_host_basic" data-field="x_NODENAME_ARRAY" name="x_NODENAME_ARRAY" id="x_NODENAME_ARRAY" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($esbc_host_basic->NODENAME_ARRAY->getPlaceHolder()) ?>" value="<?php echo $esbc_host_basic->NODENAME_ARRAY->EditValue ?>"<?php echo $esbc_host_basic->NODENAME_ARRAY->editAttributes() ?>>
</span>
<?php echo $esbc_host_basic->NODENAME_ARRAY->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($esbc_host_basic->PW_ARRAY->Visible) { // PW_ARRAY ?>
	<div id="r_PW_ARRAY" class="form-group row">
		<label id="elh_esbc_host_basic_PW_ARRAY" for="x_PW_ARRAY" class="<?php echo $esbc_host_basic_add->LeftColumnClass ?>"><?php echo $esbc_host_basic->PW_ARRAY->caption() ?><?php echo ($esbc_host_basic->PW_ARRAY->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $esbc_host_basic_add->RightColumnClass ?>"><div<?php echo $esbc_host_basic->PW_ARRAY->cellAttributes() ?>>
<span id="el_esbc_host_basic_PW_ARRAY">
<input type="text" data-table="esbc_host_basic" data-field="x_PW_ARRAY" name="x_PW_ARRAY" id="x_PW_ARRAY" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($esbc_host_basic->PW_ARRAY->getPlaceHolder()) ?>" value="<?php echo $esbc_host_basic->PW_ARRAY->EditValue ?>"<?php echo $esbc_host_basic->PW_ARRAY->editAttributes() ?>>
</span>
<?php echo $esbc_host_basic->PW_ARRAY->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($esbc_host_basic->MYSQL_OWNER->Visible) { // MYSQL_OWNER ?>
	<div id="r_MYSQL_OWNER" class="form-group row">
		<label id="elh_esbc_host_basic_MYSQL_OWNER" for="x_MYSQL_OWNER" class="<?php echo $esbc_host_basic_add->LeftColumnClass ?>"><?php echo $esbc_host_basic->MYSQL_OWNER->caption() ?><?php echo ($esbc_host_basic->MYSQL_OWNER->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $esbc_host_basic_add->RightColumnClass ?>"><div<?php echo $esbc_host_basic->MYSQL_OWNER->cellAttributes() ?>>
<span id="el_esbc_host_basic_MYSQL_OWNER">
<input type="text" data-table="esbc_host_basic" data-field="x_MYSQL_OWNER" name="x_MYSQL_OWNER" id="x_MYSQL_OWNER" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($esbc_host_basic->MYSQL_OWNER->getPlaceHolder()) ?>" value="<?php echo $esbc_host_basic->MYSQL_OWNER->EditValue ?>"<?php echo $esbc_host_basic->MYSQL_OWNER->editAttributes() ?>>
</span>
<?php echo $esbc_host_basic->MYSQL_OWNER->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($esbc_host_basic->MYSQL_PW->Visible) { // MYSQL_PW ?>
	<div id="r_MYSQL_PW" class="form-group row">
		<label id="elh_esbc_host_basic_MYSQL_PW" for="x_MYSQL_PW" class="<?php echo $esbc_host_basic_add->LeftColumnClass ?>"><?php echo $esbc_host_basic->MYSQL_PW->caption() ?><?php echo ($esbc_host_basic->MYSQL_PW->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $esbc_host_basic_add->RightColumnClass ?>"><div<?php echo $esbc_host_basic->MYSQL_PW->cellAttributes() ?>>
<span id="el_esbc_host_basic_MYSQL_PW">
<input type="text" data-table="esbc_host_basic" data-field="x_MYSQL_PW" name="x_MYSQL_PW" id="x_MYSQL_PW" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($esbc_host_basic->MYSQL_PW->getPlaceHolder()) ?>" value="<?php echo $esbc_host_basic->MYSQL_PW->EditValue ?>"<?php echo $esbc_host_basic->MYSQL_PW->editAttributes() ?>>
</span>
<?php echo $esbc_host_basic->MYSQL_PW->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($esbc_host_basic->FTP_OWNER->Visible) { // FTP_OWNER ?>
	<div id="r_FTP_OWNER" class="form-group row">
		<label id="elh_esbc_host_basic_FTP_OWNER" for="x_FTP_OWNER" class="<?php echo $esbc_host_basic_add->LeftColumnClass ?>"><?php echo $esbc_host_basic->FTP_OWNER->caption() ?><?php echo ($esbc_host_basic->FTP_OWNER->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $esbc_host_basic_add->RightColumnClass ?>"><div<?php echo $esbc_host_basic->FTP_OWNER->cellAttributes() ?>>
<span id="el_esbc_host_basic_FTP_OWNER">
<input type="text" data-table="esbc_host_basic" data-field="x_FTP_OWNER" name="x_FTP_OWNER" id="x_FTP_OWNER" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($esbc_host_basic->FTP_OWNER->getPlaceHolder()) ?>" value="<?php echo $esbc_host_basic->FTP_OWNER->EditValue ?>"<?php echo $esbc_host_basic->FTP_OWNER->editAttributes() ?>>
</span>
<?php echo $esbc_host_basic->FTP_OWNER->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($esbc_host_basic->FTP_PW->Visible) { // FTP_PW ?>
	<div id="r_FTP_PW" class="form-group row">
		<label id="elh_esbc_host_basic_FTP_PW" for="x_FTP_PW" class="<?php echo $esbc_host_basic_add->LeftColumnClass ?>"><?php echo $esbc_host_basic->FTP_PW->caption() ?><?php echo ($esbc_host_basic->FTP_PW->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $esbc_host_basic_add->RightColumnClass ?>"><div<?php echo $esbc_host_basic->FTP_PW->cellAttributes() ?>>
<span id="el_esbc_host_basic_FTP_PW">
<input type="text" data-table="esbc_host_basic" data-field="x_FTP_PW" name="x_FTP_PW" id="x_FTP_PW" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($esbc_host_basic->FTP_PW->getPlaceHolder()) ?>" value="<?php echo $esbc_host_basic->FTP_PW->EditValue ?>"<?php echo $esbc_host_basic->FTP_PW->editAttributes() ?>>
</span>
<?php echo $esbc_host_basic->FTP_PW->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($esbc_host_basic->NETWORKID->Visible) { // NETWORKID ?>
	<div id="r_NETWORKID" class="form-group row">
		<label id="elh_esbc_host_basic_NETWORKID" for="x_NETWORKID" class="<?php echo $esbc_host_basic_add->LeftColumnClass ?>"><?php echo $esbc_host_basic->NETWORKID->caption() ?><?php echo ($esbc_host_basic->NETWORKID->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $esbc_host_basic_add->RightColumnClass ?>"><div<?php echo $esbc_host_basic->NETWORKID->cellAttributes() ?>>
<span id="el_esbc_host_basic_NETWORKID">
<input type="text" data-table="esbc_host_basic" data-field="x_NETWORKID" name="x_NETWORKID" id="x_NETWORKID" size="30" placeholder="<?php echo HtmlEncode($esbc_host_basic->NETWORKID->getPlaceHolder()) ?>" value="<?php echo $esbc_host_basic->NETWORKID->EditValue ?>"<?php echo $esbc_host_basic->NETWORKID->editAttributes() ?>>
</span>
<?php echo $esbc_host_basic->NETWORKID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($esbc_host_basic->BC_PORT_BASE->Visible) { // BC_PORT_BASE ?>
	<div id="r_BC_PORT_BASE" class="form-group row">
		<label id="elh_esbc_host_basic_BC_PORT_BASE" for="x_BC_PORT_BASE" class="<?php echo $esbc_host_basic_add->LeftColumnClass ?>"><?php echo $esbc_host_basic->BC_PORT_BASE->caption() ?><?php echo ($esbc_host_basic->BC_PORT_BASE->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $esbc_host_basic_add->RightColumnClass ?>"><div<?php echo $esbc_host_basic->BC_PORT_BASE->cellAttributes() ?>>
<span id="el_esbc_host_basic_BC_PORT_BASE">
<input type="text" data-table="esbc_host_basic" data-field="x_BC_PORT_BASE" name="x_BC_PORT_BASE" id="x_BC_PORT_BASE" size="30" placeholder="<?php echo HtmlEncode($esbc_host_basic->BC_PORT_BASE->getPlaceHolder()) ?>" value="<?php echo $esbc_host_basic->BC_PORT_BASE->EditValue ?>"<?php echo $esbc_host_basic->BC_PORT_BASE->editAttributes() ?>>
</span>
<?php echo $esbc_host_basic->BC_PORT_BASE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($esbc_host_basic->HTTP_PORT->Visible) { // HTTP_PORT ?>
	<div id="r_HTTP_PORT" class="form-group row">
		<label id="elh_esbc_host_basic_HTTP_PORT" for="x_HTTP_PORT" class="<?php echo $esbc_host_basic_add->LeftColumnClass ?>"><?php echo $esbc_host_basic->HTTP_PORT->caption() ?><?php echo ($esbc_host_basic->HTTP_PORT->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $esbc_host_basic_add->RightColumnClass ?>"><div<?php echo $esbc_host_basic->HTTP_PORT->cellAttributes() ?>>
<span id="el_esbc_host_basic_HTTP_PORT">
<input type="text" data-table="esbc_host_basic" data-field="x_HTTP_PORT" name="x_HTTP_PORT" id="x_HTTP_PORT" size="30" placeholder="<?php echo HtmlEncode($esbc_host_basic->HTTP_PORT->getPlaceHolder()) ?>" value="<?php echo $esbc_host_basic->HTTP_PORT->EditValue ?>"<?php echo $esbc_host_basic->HTTP_PORT->editAttributes() ?>>
</span>
<?php echo $esbc_host_basic->HTTP_PORT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($esbc_host_basic->RPCPORT_BASE->Visible) { // RPCPORT_BASE ?>
	<div id="r_RPCPORT_BASE" class="form-group row">
		<label id="elh_esbc_host_basic_RPCPORT_BASE" for="x_RPCPORT_BASE" class="<?php echo $esbc_host_basic_add->LeftColumnClass ?>"><?php echo $esbc_host_basic->RPCPORT_BASE->caption() ?><?php echo ($esbc_host_basic->RPCPORT_BASE->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $esbc_host_basic_add->RightColumnClass ?>"><div<?php echo $esbc_host_basic->RPCPORT_BASE->cellAttributes() ?>>
<span id="el_esbc_host_basic_RPCPORT_BASE">
<input type="text" data-table="esbc_host_basic" data-field="x_RPCPORT_BASE" name="x_RPCPORT_BASE" id="x_RPCPORT_BASE" size="30" placeholder="<?php echo HtmlEncode($esbc_host_basic->RPCPORT_BASE->getPlaceHolder()) ?>" value="<?php echo $esbc_host_basic->RPCPORT_BASE->EditValue ?>"<?php echo $esbc_host_basic->RPCPORT_BASE->editAttributes() ?>>
</span>
<?php echo $esbc_host_basic->RPCPORT_BASE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($esbc_host_basic->Create_Date->Visible) { // Create_Date ?>
	<div id="r_Create_Date" class="form-group row">
		<label id="elh_esbc_host_basic_Create_Date" for="x_Create_Date" class="<?php echo $esbc_host_basic_add->LeftColumnClass ?>"><?php echo $esbc_host_basic->Create_Date->caption() ?><?php echo ($esbc_host_basic->Create_Date->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $esbc_host_basic_add->RightColumnClass ?>"><div<?php echo $esbc_host_basic->Create_Date->cellAttributes() ?>>
<span id="el_esbc_host_basic_Create_Date">
<input type="text" data-table="esbc_host_basic" data-field="x_Create_Date" data-format="1" name="x_Create_Date" id="x_Create_Date" placeholder="<?php echo HtmlEncode($esbc_host_basic->Create_Date->getPlaceHolder()) ?>" value="<?php echo $esbc_host_basic->Create_Date->EditValue ?>"<?php echo $esbc_host_basic->Create_Date->editAttributes() ?>>
<?php if (!$esbc_host_basic->Create_Date->ReadOnly && !$esbc_host_basic->Create_Date->Disabled && !isset($esbc_host_basic->Create_Date->EditAttrs["readonly"]) && !isset($esbc_host_basic->Create_Date->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fesbc_host_basicadd", "x_Create_Date", {"ignoreReadonly":true,"useCurrent":false,"format":1});
</script>
<?php } ?>
</span>
<?php echo $esbc_host_basic->Create_Date->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$esbc_host_basic_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $esbc_host_basic_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $esbc_host_basic_add->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$esbc_host_basic_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$esbc_host_basic_add->terminate();
?>
