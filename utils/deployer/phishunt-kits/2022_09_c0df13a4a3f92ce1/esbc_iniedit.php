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
$esbc_ini_edit = new esbc_ini_edit();

// Run the page
$esbc_ini_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$esbc_ini_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fesbc_iniedit = currentForm = new ew.Form("fesbc_iniedit", "edit");

// Validate form
fesbc_iniedit.validate = function() {
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
		<?php if ($esbc_ini_edit->BC_INDEX->Required) { ?>
			elm = this.getElements("x" + infix + "_BC_INDEX");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $esbc_ini->BC_INDEX->caption(), $esbc_ini->BC_INDEX->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($esbc_ini_edit->HOSTNAME->Required) { ?>
			elm = this.getElements("x" + infix + "_HOSTNAME");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $esbc_ini->HOSTNAME->caption(), $esbc_ini->HOSTNAME->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($esbc_ini_edit->BCS_ROOTNAME->Required) { ?>
			elm = this.getElements("x" + infix + "_BCS_ROOTNAME");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $esbc_ini->BCS_ROOTNAME->caption(), $esbc_ini->BCS_ROOTNAME->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($esbc_ini_edit->HOST_IP->Required) { ?>
			elm = this.getElements("x" + infix + "_HOST_IP");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $esbc_ini->HOST_IP->caption(), $esbc_ini->HOST_IP->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($esbc_ini_edit->HOST_PW->Required) { ?>
			elm = this.getElements("x" + infix + "_HOST_PW");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $esbc_ini->HOST_PW->caption(), $esbc_ini->HOST_PW->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($esbc_ini_edit->HOST_OWNER->Required) { ?>
			elm = this.getElements("x" + infix + "_HOST_OWNER");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $esbc_ini->HOST_OWNER->caption(), $esbc_ini->HOST_OWNER->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($esbc_ini_edit->NODENAME_ARRAY->Required) { ?>
			elm = this.getElements("x" + infix + "_NODENAME_ARRAY");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $esbc_ini->NODENAME_ARRAY->caption(), $esbc_ini->NODENAME_ARRAY->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($esbc_ini_edit->PW_ARRAY->Required) { ?>
			elm = this.getElements("x" + infix + "_PW_ARRAY");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $esbc_ini->PW_ARRAY->caption(), $esbc_ini->PW_ARRAY->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($esbc_ini_edit->MYSQL_OWNER->Required) { ?>
			elm = this.getElements("x" + infix + "_MYSQL_OWNER");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $esbc_ini->MYSQL_OWNER->caption(), $esbc_ini->MYSQL_OWNER->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($esbc_ini_edit->MYSQL_PW->Required) { ?>
			elm = this.getElements("x" + infix + "_MYSQL_PW");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $esbc_ini->MYSQL_PW->caption(), $esbc_ini->MYSQL_PW->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($esbc_ini_edit->FTP_OWNER->Required) { ?>
			elm = this.getElements("x" + infix + "_FTP_OWNER");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $esbc_ini->FTP_OWNER->caption(), $esbc_ini->FTP_OWNER->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($esbc_ini_edit->FTP_PW->Required) { ?>
			elm = this.getElements("x" + infix + "_FTP_PW");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $esbc_ini->FTP_PW->caption(), $esbc_ini->FTP_PW->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($esbc_ini_edit->NETWORKID->Required) { ?>
			elm = this.getElements("x" + infix + "_NETWORKID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $esbc_ini->NETWORKID->caption(), $esbc_ini->NETWORKID->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_NETWORKID");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($esbc_ini->NETWORKID->errorMessage()) ?>");
		<?php if ($esbc_ini_edit->BC_PORT_BASE->Required) { ?>
			elm = this.getElements("x" + infix + "_BC_PORT_BASE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $esbc_ini->BC_PORT_BASE->caption(), $esbc_ini->BC_PORT_BASE->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_BC_PORT_BASE");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($esbc_ini->BC_PORT_BASE->errorMessage()) ?>");
		<?php if ($esbc_ini_edit->HTTP_PORT->Required) { ?>
			elm = this.getElements("x" + infix + "_HTTP_PORT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $esbc_ini->HTTP_PORT->caption(), $esbc_ini->HTTP_PORT->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_HTTP_PORT");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($esbc_ini->HTTP_PORT->errorMessage()) ?>");
		<?php if ($esbc_ini_edit->RPCPORT_BASE->Required) { ?>
			elm = this.getElements("x" + infix + "_RPCPORT_BASE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $esbc_ini->RPCPORT_BASE->caption(), $esbc_ini->RPCPORT_BASE->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_RPCPORT_BASE");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($esbc_ini->RPCPORT_BASE->errorMessage()) ?>");
		<?php if ($esbc_ini_edit->Create_Date->Required) { ?>
			elm = this.getElements("x" + infix + "_Create_Date");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $esbc_ini->Create_Date->caption(), $esbc_ini->Create_Date->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Create_Date");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($esbc_ini->Create_Date->errorMessage()) ?>");
		<?php if ($esbc_ini_edit->HOST_TYPE->Required) { ?>
			elm = this.getElements("x" + infix + "_HOST_TYPE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $esbc_ini->HOST_TYPE->caption(), $esbc_ini->HOST_TYPE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($esbc_ini_edit->HOST_ROOTID->Required) { ?>
			elm = this.getElements("x" + infix + "_HOST_ROOTID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $esbc_ini->HOST_ROOTID->caption(), $esbc_ini->HOST_ROOTID->RequiredErrorMessage)) ?>");
		<?php } ?>

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
fesbc_iniedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fesbc_iniedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $esbc_ini_edit->showPageHeader(); ?>
<?php
$esbc_ini_edit->showMessage();
?>
<form name="fesbc_iniedit" id="fesbc_iniedit" class="<?php echo $esbc_ini_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($esbc_ini_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $esbc_ini_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="esbc_ini">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$esbc_ini_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($esbc_ini->BC_INDEX->Visible) { // BC_INDEX ?>
	<div id="r_BC_INDEX" class="form-group row">
		<label id="elh_esbc_ini_BC_INDEX" class="<?php echo $esbc_ini_edit->LeftColumnClass ?>"><?php echo $esbc_ini->BC_INDEX->caption() ?><?php echo ($esbc_ini->BC_INDEX->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $esbc_ini_edit->RightColumnClass ?>"><div<?php echo $esbc_ini->BC_INDEX->cellAttributes() ?>>
<span id="el_esbc_ini_BC_INDEX">
<span<?php echo $esbc_ini->BC_INDEX->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($esbc_ini->BC_INDEX->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="esbc_ini" data-field="x_BC_INDEX" name="x_BC_INDEX" id="x_BC_INDEX" value="<?php echo HtmlEncode($esbc_ini->BC_INDEX->CurrentValue) ?>">
<?php echo $esbc_ini->BC_INDEX->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($esbc_ini->HOSTNAME->Visible) { // HOSTNAME ?>
	<div id="r_HOSTNAME" class="form-group row">
		<label id="elh_esbc_ini_HOSTNAME" for="x_HOSTNAME" class="<?php echo $esbc_ini_edit->LeftColumnClass ?>"><?php echo $esbc_ini->HOSTNAME->caption() ?><?php echo ($esbc_ini->HOSTNAME->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $esbc_ini_edit->RightColumnClass ?>"><div<?php echo $esbc_ini->HOSTNAME->cellAttributes() ?>>
<span id="el_esbc_ini_HOSTNAME">
<input type="text" data-table="esbc_ini" data-field="x_HOSTNAME" name="x_HOSTNAME" id="x_HOSTNAME" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($esbc_ini->HOSTNAME->getPlaceHolder()) ?>" value="<?php echo $esbc_ini->HOSTNAME->EditValue ?>"<?php echo $esbc_ini->HOSTNAME->editAttributes() ?>>
</span>
<?php echo $esbc_ini->HOSTNAME->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($esbc_ini->BCS_ROOTNAME->Visible) { // BCS_ROOTNAME ?>
	<div id="r_BCS_ROOTNAME" class="form-group row">
		<label id="elh_esbc_ini_BCS_ROOTNAME" for="x_BCS_ROOTNAME" class="<?php echo $esbc_ini_edit->LeftColumnClass ?>"><?php echo $esbc_ini->BCS_ROOTNAME->caption() ?><?php echo ($esbc_ini->BCS_ROOTNAME->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $esbc_ini_edit->RightColumnClass ?>"><div<?php echo $esbc_ini->BCS_ROOTNAME->cellAttributes() ?>>
<span id="el_esbc_ini_BCS_ROOTNAME">
<input type="text" data-table="esbc_ini" data-field="x_BCS_ROOTNAME" name="x_BCS_ROOTNAME" id="x_BCS_ROOTNAME" size="30" maxlength="30" placeholder="<?php echo HtmlEncode($esbc_ini->BCS_ROOTNAME->getPlaceHolder()) ?>" value="<?php echo $esbc_ini->BCS_ROOTNAME->EditValue ?>"<?php echo $esbc_ini->BCS_ROOTNAME->editAttributes() ?>>
</span>
<?php echo $esbc_ini->BCS_ROOTNAME->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($esbc_ini->HOST_IP->Visible) { // HOST_IP ?>
	<div id="r_HOST_IP" class="form-group row">
		<label id="elh_esbc_ini_HOST_IP" for="x_HOST_IP" class="<?php echo $esbc_ini_edit->LeftColumnClass ?>"><?php echo $esbc_ini->HOST_IP->caption() ?><?php echo ($esbc_ini->HOST_IP->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $esbc_ini_edit->RightColumnClass ?>"><div<?php echo $esbc_ini->HOST_IP->cellAttributes() ?>>
<span id="el_esbc_ini_HOST_IP">
<input type="text" data-table="esbc_ini" data-field="x_HOST_IP" name="x_HOST_IP" id="x_HOST_IP" size="30" maxlength="16" placeholder="<?php echo HtmlEncode($esbc_ini->HOST_IP->getPlaceHolder()) ?>" value="<?php echo $esbc_ini->HOST_IP->EditValue ?>"<?php echo $esbc_ini->HOST_IP->editAttributes() ?>>
</span>
<?php echo $esbc_ini->HOST_IP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($esbc_ini->HOST_PW->Visible) { // HOST_PW ?>
	<div id="r_HOST_PW" class="form-group row">
		<label id="elh_esbc_ini_HOST_PW" for="x_HOST_PW" class="<?php echo $esbc_ini_edit->LeftColumnClass ?>"><?php echo $esbc_ini->HOST_PW->caption() ?><?php echo ($esbc_ini->HOST_PW->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $esbc_ini_edit->RightColumnClass ?>"><div<?php echo $esbc_ini->HOST_PW->cellAttributes() ?>>
<span id="el_esbc_ini_HOST_PW">
<input type="text" data-table="esbc_ini" data-field="x_HOST_PW" name="x_HOST_PW" id="x_HOST_PW" size="30" maxlength="30" placeholder="<?php echo HtmlEncode($esbc_ini->HOST_PW->getPlaceHolder()) ?>" value="<?php echo $esbc_ini->HOST_PW->EditValue ?>"<?php echo $esbc_ini->HOST_PW->editAttributes() ?>>
</span>
<?php echo $esbc_ini->HOST_PW->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($esbc_ini->HOST_OWNER->Visible) { // HOST_OWNER ?>
	<div id="r_HOST_OWNER" class="form-group row">
		<label id="elh_esbc_ini_HOST_OWNER" for="x_HOST_OWNER" class="<?php echo $esbc_ini_edit->LeftColumnClass ?>"><?php echo $esbc_ini->HOST_OWNER->caption() ?><?php echo ($esbc_ini->HOST_OWNER->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $esbc_ini_edit->RightColumnClass ?>"><div<?php echo $esbc_ini->HOST_OWNER->cellAttributes() ?>>
<span id="el_esbc_ini_HOST_OWNER">
<input type="text" data-table="esbc_ini" data-field="x_HOST_OWNER" name="x_HOST_OWNER" id="x_HOST_OWNER" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($esbc_ini->HOST_OWNER->getPlaceHolder()) ?>" value="<?php echo $esbc_ini->HOST_OWNER->EditValue ?>"<?php echo $esbc_ini->HOST_OWNER->editAttributes() ?>>
</span>
<?php echo $esbc_ini->HOST_OWNER->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($esbc_ini->NODENAME_ARRAY->Visible) { // NODENAME_ARRAY ?>
	<div id="r_NODENAME_ARRAY" class="form-group row">
		<label id="elh_esbc_ini_NODENAME_ARRAY" for="x_NODENAME_ARRAY" class="<?php echo $esbc_ini_edit->LeftColumnClass ?>"><?php echo $esbc_ini->NODENAME_ARRAY->caption() ?><?php echo ($esbc_ini->NODENAME_ARRAY->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $esbc_ini_edit->RightColumnClass ?>"><div<?php echo $esbc_ini->NODENAME_ARRAY->cellAttributes() ?>>
<span id="el_esbc_ini_NODENAME_ARRAY">
<input type="text" data-table="esbc_ini" data-field="x_NODENAME_ARRAY" name="x_NODENAME_ARRAY" id="x_NODENAME_ARRAY" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($esbc_ini->NODENAME_ARRAY->getPlaceHolder()) ?>" value="<?php echo $esbc_ini->NODENAME_ARRAY->EditValue ?>"<?php echo $esbc_ini->NODENAME_ARRAY->editAttributes() ?>>
</span>
<?php echo $esbc_ini->NODENAME_ARRAY->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($esbc_ini->PW_ARRAY->Visible) { // PW_ARRAY ?>
	<div id="r_PW_ARRAY" class="form-group row">
		<label id="elh_esbc_ini_PW_ARRAY" for="x_PW_ARRAY" class="<?php echo $esbc_ini_edit->LeftColumnClass ?>"><?php echo $esbc_ini->PW_ARRAY->caption() ?><?php echo ($esbc_ini->PW_ARRAY->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $esbc_ini_edit->RightColumnClass ?>"><div<?php echo $esbc_ini->PW_ARRAY->cellAttributes() ?>>
<span id="el_esbc_ini_PW_ARRAY">
<input type="text" data-table="esbc_ini" data-field="x_PW_ARRAY" name="x_PW_ARRAY" id="x_PW_ARRAY" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($esbc_ini->PW_ARRAY->getPlaceHolder()) ?>" value="<?php echo $esbc_ini->PW_ARRAY->EditValue ?>"<?php echo $esbc_ini->PW_ARRAY->editAttributes() ?>>
</span>
<?php echo $esbc_ini->PW_ARRAY->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($esbc_ini->MYSQL_OWNER->Visible) { // MYSQL_OWNER ?>
	<div id="r_MYSQL_OWNER" class="form-group row">
		<label id="elh_esbc_ini_MYSQL_OWNER" for="x_MYSQL_OWNER" class="<?php echo $esbc_ini_edit->LeftColumnClass ?>"><?php echo $esbc_ini->MYSQL_OWNER->caption() ?><?php echo ($esbc_ini->MYSQL_OWNER->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $esbc_ini_edit->RightColumnClass ?>"><div<?php echo $esbc_ini->MYSQL_OWNER->cellAttributes() ?>>
<span id="el_esbc_ini_MYSQL_OWNER">
<input type="text" data-table="esbc_ini" data-field="x_MYSQL_OWNER" name="x_MYSQL_OWNER" id="x_MYSQL_OWNER" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($esbc_ini->MYSQL_OWNER->getPlaceHolder()) ?>" value="<?php echo $esbc_ini->MYSQL_OWNER->EditValue ?>"<?php echo $esbc_ini->MYSQL_OWNER->editAttributes() ?>>
</span>
<?php echo $esbc_ini->MYSQL_OWNER->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($esbc_ini->MYSQL_PW->Visible) { // MYSQL_PW ?>
	<div id="r_MYSQL_PW" class="form-group row">
		<label id="elh_esbc_ini_MYSQL_PW" for="x_MYSQL_PW" class="<?php echo $esbc_ini_edit->LeftColumnClass ?>"><?php echo $esbc_ini->MYSQL_PW->caption() ?><?php echo ($esbc_ini->MYSQL_PW->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $esbc_ini_edit->RightColumnClass ?>"><div<?php echo $esbc_ini->MYSQL_PW->cellAttributes() ?>>
<span id="el_esbc_ini_MYSQL_PW">
<input type="text" data-table="esbc_ini" data-field="x_MYSQL_PW" name="x_MYSQL_PW" id="x_MYSQL_PW" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($esbc_ini->MYSQL_PW->getPlaceHolder()) ?>" value="<?php echo $esbc_ini->MYSQL_PW->EditValue ?>"<?php echo $esbc_ini->MYSQL_PW->editAttributes() ?>>
</span>
<?php echo $esbc_ini->MYSQL_PW->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($esbc_ini->FTP_OWNER->Visible) { // FTP_OWNER ?>
	<div id="r_FTP_OWNER" class="form-group row">
		<label id="elh_esbc_ini_FTP_OWNER" for="x_FTP_OWNER" class="<?php echo $esbc_ini_edit->LeftColumnClass ?>"><?php echo $esbc_ini->FTP_OWNER->caption() ?><?php echo ($esbc_ini->FTP_OWNER->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $esbc_ini_edit->RightColumnClass ?>"><div<?php echo $esbc_ini->FTP_OWNER->cellAttributes() ?>>
<span id="el_esbc_ini_FTP_OWNER">
<input type="text" data-table="esbc_ini" data-field="x_FTP_OWNER" name="x_FTP_OWNER" id="x_FTP_OWNER" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($esbc_ini->FTP_OWNER->getPlaceHolder()) ?>" value="<?php echo $esbc_ini->FTP_OWNER->EditValue ?>"<?php echo $esbc_ini->FTP_OWNER->editAttributes() ?>>
</span>
<?php echo $esbc_ini->FTP_OWNER->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($esbc_ini->FTP_PW->Visible) { // FTP_PW ?>
	<div id="r_FTP_PW" class="form-group row">
		<label id="elh_esbc_ini_FTP_PW" for="x_FTP_PW" class="<?php echo $esbc_ini_edit->LeftColumnClass ?>"><?php echo $esbc_ini->FTP_PW->caption() ?><?php echo ($esbc_ini->FTP_PW->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $esbc_ini_edit->RightColumnClass ?>"><div<?php echo $esbc_ini->FTP_PW->cellAttributes() ?>>
<span id="el_esbc_ini_FTP_PW">
<input type="text" data-table="esbc_ini" data-field="x_FTP_PW" name="x_FTP_PW" id="x_FTP_PW" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($esbc_ini->FTP_PW->getPlaceHolder()) ?>" value="<?php echo $esbc_ini->FTP_PW->EditValue ?>"<?php echo $esbc_ini->FTP_PW->editAttributes() ?>>
</span>
<?php echo $esbc_ini->FTP_PW->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($esbc_ini->NETWORKID->Visible) { // NETWORKID ?>
	<div id="r_NETWORKID" class="form-group row">
		<label id="elh_esbc_ini_NETWORKID" for="x_NETWORKID" class="<?php echo $esbc_ini_edit->LeftColumnClass ?>"><?php echo $esbc_ini->NETWORKID->caption() ?><?php echo ($esbc_ini->NETWORKID->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $esbc_ini_edit->RightColumnClass ?>"><div<?php echo $esbc_ini->NETWORKID->cellAttributes() ?>>
<span id="el_esbc_ini_NETWORKID">
<input type="text" data-table="esbc_ini" data-field="x_NETWORKID" name="x_NETWORKID" id="x_NETWORKID" size="30" placeholder="<?php echo HtmlEncode($esbc_ini->NETWORKID->getPlaceHolder()) ?>" value="<?php echo $esbc_ini->NETWORKID->EditValue ?>"<?php echo $esbc_ini->NETWORKID->editAttributes() ?>>
</span>
<?php echo $esbc_ini->NETWORKID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($esbc_ini->BC_PORT_BASE->Visible) { // BC_PORT_BASE ?>
	<div id="r_BC_PORT_BASE" class="form-group row">
		<label id="elh_esbc_ini_BC_PORT_BASE" for="x_BC_PORT_BASE" class="<?php echo $esbc_ini_edit->LeftColumnClass ?>"><?php echo $esbc_ini->BC_PORT_BASE->caption() ?><?php echo ($esbc_ini->BC_PORT_BASE->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $esbc_ini_edit->RightColumnClass ?>"><div<?php echo $esbc_ini->BC_PORT_BASE->cellAttributes() ?>>
<span id="el_esbc_ini_BC_PORT_BASE">
<input type="text" data-table="esbc_ini" data-field="x_BC_PORT_BASE" name="x_BC_PORT_BASE" id="x_BC_PORT_BASE" size="30" placeholder="<?php echo HtmlEncode($esbc_ini->BC_PORT_BASE->getPlaceHolder()) ?>" value="<?php echo $esbc_ini->BC_PORT_BASE->EditValue ?>"<?php echo $esbc_ini->BC_PORT_BASE->editAttributes() ?>>
</span>
<?php echo $esbc_ini->BC_PORT_BASE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($esbc_ini->HTTP_PORT->Visible) { // HTTP_PORT ?>
	<div id="r_HTTP_PORT" class="form-group row">
		<label id="elh_esbc_ini_HTTP_PORT" for="x_HTTP_PORT" class="<?php echo $esbc_ini_edit->LeftColumnClass ?>"><?php echo $esbc_ini->HTTP_PORT->caption() ?><?php echo ($esbc_ini->HTTP_PORT->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $esbc_ini_edit->RightColumnClass ?>"><div<?php echo $esbc_ini->HTTP_PORT->cellAttributes() ?>>
<span id="el_esbc_ini_HTTP_PORT">
<input type="text" data-table="esbc_ini" data-field="x_HTTP_PORT" name="x_HTTP_PORT" id="x_HTTP_PORT" size="30" placeholder="<?php echo HtmlEncode($esbc_ini->HTTP_PORT->getPlaceHolder()) ?>" value="<?php echo $esbc_ini->HTTP_PORT->EditValue ?>"<?php echo $esbc_ini->HTTP_PORT->editAttributes() ?>>
</span>
<?php echo $esbc_ini->HTTP_PORT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($esbc_ini->RPCPORT_BASE->Visible) { // RPCPORT_BASE ?>
	<div id="r_RPCPORT_BASE" class="form-group row">
		<label id="elh_esbc_ini_RPCPORT_BASE" for="x_RPCPORT_BASE" class="<?php echo $esbc_ini_edit->LeftColumnClass ?>"><?php echo $esbc_ini->RPCPORT_BASE->caption() ?><?php echo ($esbc_ini->RPCPORT_BASE->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $esbc_ini_edit->RightColumnClass ?>"><div<?php echo $esbc_ini->RPCPORT_BASE->cellAttributes() ?>>
<span id="el_esbc_ini_RPCPORT_BASE">
<input type="text" data-table="esbc_ini" data-field="x_RPCPORT_BASE" name="x_RPCPORT_BASE" id="x_RPCPORT_BASE" size="30" placeholder="<?php echo HtmlEncode($esbc_ini->RPCPORT_BASE->getPlaceHolder()) ?>" value="<?php echo $esbc_ini->RPCPORT_BASE->EditValue ?>"<?php echo $esbc_ini->RPCPORT_BASE->editAttributes() ?>>
</span>
<?php echo $esbc_ini->RPCPORT_BASE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($esbc_ini->Create_Date->Visible) { // Create_Date ?>
	<div id="r_Create_Date" class="form-group row">
		<label id="elh_esbc_ini_Create_Date" for="x_Create_Date" class="<?php echo $esbc_ini_edit->LeftColumnClass ?>"><?php echo $esbc_ini->Create_Date->caption() ?><?php echo ($esbc_ini->Create_Date->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $esbc_ini_edit->RightColumnClass ?>"><div<?php echo $esbc_ini->Create_Date->cellAttributes() ?>>
<span id="el_esbc_ini_Create_Date">
<input type="text" data-table="esbc_ini" data-field="x_Create_Date" data-format="1" name="x_Create_Date" id="x_Create_Date" placeholder="<?php echo HtmlEncode($esbc_ini->Create_Date->getPlaceHolder()) ?>" value="<?php echo $esbc_ini->Create_Date->EditValue ?>"<?php echo $esbc_ini->Create_Date->editAttributes() ?>>
<?php if (!$esbc_ini->Create_Date->ReadOnly && !$esbc_ini->Create_Date->Disabled && !isset($esbc_ini->Create_Date->EditAttrs["readonly"]) && !isset($esbc_ini->Create_Date->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fesbc_iniedit", "x_Create_Date", {"ignoreReadonly":true,"useCurrent":false,"format":1});
</script>
<?php } ?>
</span>
<?php echo $esbc_ini->Create_Date->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($esbc_ini->HOST_TYPE->Visible) { // HOST_TYPE ?>
	<div id="r_HOST_TYPE" class="form-group row">
		<label id="elh_esbc_ini_HOST_TYPE" for="x_HOST_TYPE" class="<?php echo $esbc_ini_edit->LeftColumnClass ?>"><?php echo $esbc_ini->HOST_TYPE->caption() ?><?php echo ($esbc_ini->HOST_TYPE->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $esbc_ini_edit->RightColumnClass ?>"><div<?php echo $esbc_ini->HOST_TYPE->cellAttributes() ?>>
<span id="el_esbc_ini_HOST_TYPE">
<input type="text" data-table="esbc_ini" data-field="x_HOST_TYPE" name="x_HOST_TYPE" id="x_HOST_TYPE" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($esbc_ini->HOST_TYPE->getPlaceHolder()) ?>" value="<?php echo $esbc_ini->HOST_TYPE->EditValue ?>"<?php echo $esbc_ini->HOST_TYPE->editAttributes() ?>>
</span>
<?php echo $esbc_ini->HOST_TYPE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($esbc_ini->HOST_ROOTID->Visible) { // HOST_ROOTID ?>
	<div id="r_HOST_ROOTID" class="form-group row">
		<label id="elh_esbc_ini_HOST_ROOTID" for="x_HOST_ROOTID" class="<?php echo $esbc_ini_edit->LeftColumnClass ?>"><?php echo $esbc_ini->HOST_ROOTID->caption() ?><?php echo ($esbc_ini->HOST_ROOTID->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $esbc_ini_edit->RightColumnClass ?>"><div<?php echo $esbc_ini->HOST_ROOTID->cellAttributes() ?>>
<span id="el_esbc_ini_HOST_ROOTID">
<input type="text" data-table="esbc_ini" data-field="x_HOST_ROOTID" name="x_HOST_ROOTID" id="x_HOST_ROOTID" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($esbc_ini->HOST_ROOTID->getPlaceHolder()) ?>" value="<?php echo $esbc_ini->HOST_ROOTID->EditValue ?>"<?php echo $esbc_ini->HOST_ROOTID->editAttributes() ?>>
</span>
<?php echo $esbc_ini->HOST_ROOTID->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$esbc_ini_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $esbc_ini_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $esbc_ini_edit->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$esbc_ini_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$esbc_ini_edit->terminate();
?>
