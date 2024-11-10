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
$geth_cmd_edit = new geth_cmd_edit();

// Run the page
$geth_cmd_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$geth_cmd_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fgeth_cmdedit = currentForm = new ew.Form("fgeth_cmdedit", "edit");

// Validate form
fgeth_cmdedit.validate = function() {
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
		<?php if ($geth_cmd_edit->Rindex->Required) { ?>
			elm = this.getElements("x" + infix + "_Rindex");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $geth_cmd->Rindex->caption(), $geth_cmd->Rindex->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($geth_cmd_edit->HOST_INDEX->Required) { ?>
			elm = this.getElements("x" + infix + "_HOST_INDEX");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $geth_cmd->HOST_INDEX->caption(), $geth_cmd->HOST_INDEX->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($geth_cmd_edit->HUB_INDEX->Required) { ?>
			elm = this.getElements("x" + infix + "_HUB_INDEX");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $geth_cmd->HUB_INDEX->caption(), $geth_cmd->HUB_INDEX->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($geth_cmd_edit->NODE_INDEX->Required) { ?>
			elm = this.getElements("x" + infix + "_NODE_INDEX");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $geth_cmd->NODE_INDEX->caption(), $geth_cmd->NODE_INDEX->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($geth_cmd_edit->GETH_PAR_INDEX->Required) { ?>
			elm = this.getElements("x" + infix + "_GETH_PAR_INDEX");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $geth_cmd->GETH_PAR_INDEX->caption(), $geth_cmd->GETH_PAR_INDEX->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($geth_cmd_edit->host_type->Required) { ?>
			elm = this.getElements("x" + infix + "_host_type");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $geth_cmd->host_type->caption(), $geth_cmd->host_type->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($geth_cmd_edit->geth_path->Required) { ?>
			elm = this.getElements("x" + infix + "_geth_path");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $geth_cmd->geth_path->caption(), $geth_cmd->geth_path->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($geth_cmd_edit->node_root->Required) { ?>
			elm = this.getElements("x" + infix + "_node_root");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $geth_cmd->node_root->caption(), $geth_cmd->node_root->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($geth_cmd_edit->node_acc40->Required) { ?>
			elm = this.getElements("x" + infix + "_node_acc40");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $geth_cmd->node_acc40->caption(), $geth_cmd->node_acc40->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($geth_cmd_edit->node_port->Required) { ?>
			elm = this.getElements("x" + infix + "_node_port");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $geth_cmd->node_port->caption(), $geth_cmd->node_port->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($geth_cmd_edit->hostip->Required) { ?>
			elm = this.getElements("x" + infix + "_hostip");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $geth_cmd->hostip->caption(), $geth_cmd->hostip->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($geth_cmd_edit->node_rpcport->Required) { ?>
			elm = this.getElements("x" + infix + "_node_rpcport");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $geth_cmd->node_rpcport->caption(), $geth_cmd->node_rpcport->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($geth_cmd_edit->bootnode_enode->Required) { ?>
			elm = this.getElements("x" + infix + "_bootnode_enode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $geth_cmd->bootnode_enode->caption(), $geth_cmd->bootnode_enode->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($geth_cmd_edit->bootnode_ip->Required) { ?>
			elm = this.getElements("x" + infix + "_bootnode_ip");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $geth_cmd->bootnode_ip->caption(), $geth_cmd->bootnode_ip->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($geth_cmd_edit->bootnode_port->Required) { ?>
			elm = this.getElements("x" + infix + "_bootnode_port");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $geth_cmd->bootnode_port->caption(), $geth_cmd->bootnode_port->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($geth_cmd_edit->date_add->Required) { ?>
			elm = this.getElements("x" + infix + "_date_add");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $geth_cmd->date_add->caption(), $geth_cmd->date_add->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_date_add");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($geth_cmd->date_add->errorMessage()) ?>");

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
fgeth_cmdedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fgeth_cmdedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fgeth_cmdedit.lists["x_HOST_INDEX"] = <?php echo $geth_cmd_edit->HOST_INDEX->Lookup->toClientList() ?>;
fgeth_cmdedit.lists["x_HOST_INDEX"].options = <?php echo JsonEncode($geth_cmd_edit->HOST_INDEX->lookupOptions()) ?>;
fgeth_cmdedit.lists["x_HUB_INDEX"] = <?php echo $geth_cmd_edit->HUB_INDEX->Lookup->toClientList() ?>;
fgeth_cmdedit.lists["x_HUB_INDEX"].options = <?php echo JsonEncode($geth_cmd_edit->HUB_INDEX->lookupOptions()) ?>;
fgeth_cmdedit.lists["x_NODE_INDEX"] = <?php echo $geth_cmd_edit->NODE_INDEX->Lookup->toClientList() ?>;
fgeth_cmdedit.lists["x_NODE_INDEX"].options = <?php echo JsonEncode($geth_cmd_edit->NODE_INDEX->lookupOptions()) ?>;
fgeth_cmdedit.lists["x_GETH_PAR_INDEX"] = <?php echo $geth_cmd_edit->GETH_PAR_INDEX->Lookup->toClientList() ?>;
fgeth_cmdedit.lists["x_GETH_PAR_INDEX"].options = <?php echo JsonEncode($geth_cmd_edit->GETH_PAR_INDEX->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $geth_cmd_edit->showPageHeader(); ?>
<?php
$geth_cmd_edit->showMessage();
?>
<form name="fgeth_cmdedit" id="fgeth_cmdedit" class="<?php echo $geth_cmd_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($geth_cmd_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $geth_cmd_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="geth_cmd">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$geth_cmd_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($geth_cmd->Rindex->Visible) { // Rindex ?>
	<div id="r_Rindex" class="form-group row">
		<label id="elh_geth_cmd_Rindex" class="<?php echo $geth_cmd_edit->LeftColumnClass ?>"><?php echo $geth_cmd->Rindex->caption() ?><?php echo ($geth_cmd->Rindex->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $geth_cmd_edit->RightColumnClass ?>"><div<?php echo $geth_cmd->Rindex->cellAttributes() ?>>
<span id="el_geth_cmd_Rindex">
<span<?php echo $geth_cmd->Rindex->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($geth_cmd->Rindex->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="geth_cmd" data-field="x_Rindex" name="x_Rindex" id="x_Rindex" value="<?php echo HtmlEncode($geth_cmd->Rindex->CurrentValue) ?>">
<?php echo $geth_cmd->Rindex->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($geth_cmd->HOST_INDEX->Visible) { // HOST_INDEX ?>
	<div id="r_HOST_INDEX" class="form-group row">
		<label id="elh_geth_cmd_HOST_INDEX" for="x_HOST_INDEX" class="<?php echo $geth_cmd_edit->LeftColumnClass ?>"><?php echo $geth_cmd->HOST_INDEX->caption() ?><?php echo ($geth_cmd->HOST_INDEX->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $geth_cmd_edit->RightColumnClass ?>"><div<?php echo $geth_cmd->HOST_INDEX->cellAttributes() ?>>
<span id="el_geth_cmd_HOST_INDEX">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="geth_cmd" data-field="x_HOST_INDEX" data-value-separator="<?php echo $geth_cmd->HOST_INDEX->displayValueSeparatorAttribute() ?>" id="x_HOST_INDEX" name="x_HOST_INDEX"<?php echo $geth_cmd->HOST_INDEX->editAttributes() ?>>
		<?php echo $geth_cmd->HOST_INDEX->selectOptionListHtml("x_HOST_INDEX") ?>
	</select>
</div>
<?php echo $geth_cmd->HOST_INDEX->Lookup->getParamTag("p_x_HOST_INDEX") ?>
</span>
<?php echo $geth_cmd->HOST_INDEX->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($geth_cmd->HUB_INDEX->Visible) { // HUB_INDEX ?>
	<div id="r_HUB_INDEX" class="form-group row">
		<label id="elh_geth_cmd_HUB_INDEX" for="x_HUB_INDEX" class="<?php echo $geth_cmd_edit->LeftColumnClass ?>"><?php echo $geth_cmd->HUB_INDEX->caption() ?><?php echo ($geth_cmd->HUB_INDEX->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $geth_cmd_edit->RightColumnClass ?>"><div<?php echo $geth_cmd->HUB_INDEX->cellAttributes() ?>>
<span id="el_geth_cmd_HUB_INDEX">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="geth_cmd" data-field="x_HUB_INDEX" data-value-separator="<?php echo $geth_cmd->HUB_INDEX->displayValueSeparatorAttribute() ?>" id="x_HUB_INDEX" name="x_HUB_INDEX"<?php echo $geth_cmd->HUB_INDEX->editAttributes() ?>>
		<?php echo $geth_cmd->HUB_INDEX->selectOptionListHtml("x_HUB_INDEX") ?>
	</select>
</div>
<?php echo $geth_cmd->HUB_INDEX->Lookup->getParamTag("p_x_HUB_INDEX") ?>
</span>
<?php echo $geth_cmd->HUB_INDEX->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($geth_cmd->NODE_INDEX->Visible) { // NODE_INDEX ?>
	<div id="r_NODE_INDEX" class="form-group row">
		<label id="elh_geth_cmd_NODE_INDEX" for="x_NODE_INDEX" class="<?php echo $geth_cmd_edit->LeftColumnClass ?>"><?php echo $geth_cmd->NODE_INDEX->caption() ?><?php echo ($geth_cmd->NODE_INDEX->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $geth_cmd_edit->RightColumnClass ?>"><div<?php echo $geth_cmd->NODE_INDEX->cellAttributes() ?>>
<span id="el_geth_cmd_NODE_INDEX">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="geth_cmd" data-field="x_NODE_INDEX" data-value-separator="<?php echo $geth_cmd->NODE_INDEX->displayValueSeparatorAttribute() ?>" id="x_NODE_INDEX" name="x_NODE_INDEX"<?php echo $geth_cmd->NODE_INDEX->editAttributes() ?>>
		<?php echo $geth_cmd->NODE_INDEX->selectOptionListHtml("x_NODE_INDEX") ?>
	</select>
</div>
<?php echo $geth_cmd->NODE_INDEX->Lookup->getParamTag("p_x_NODE_INDEX") ?>
</span>
<?php echo $geth_cmd->NODE_INDEX->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($geth_cmd->GETH_PAR_INDEX->Visible) { // GETH_PAR_INDEX ?>
	<div id="r_GETH_PAR_INDEX" class="form-group row">
		<label id="elh_geth_cmd_GETH_PAR_INDEX" for="x_GETH_PAR_INDEX" class="<?php echo $geth_cmd_edit->LeftColumnClass ?>"><?php echo $geth_cmd->GETH_PAR_INDEX->caption() ?><?php echo ($geth_cmd->GETH_PAR_INDEX->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $geth_cmd_edit->RightColumnClass ?>"><div<?php echo $geth_cmd->GETH_PAR_INDEX->cellAttributes() ?>>
<span id="el_geth_cmd_GETH_PAR_INDEX">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="geth_cmd" data-field="x_GETH_PAR_INDEX" data-value-separator="<?php echo $geth_cmd->GETH_PAR_INDEX->displayValueSeparatorAttribute() ?>" id="x_GETH_PAR_INDEX" name="x_GETH_PAR_INDEX"<?php echo $geth_cmd->GETH_PAR_INDEX->editAttributes() ?>>
		<?php echo $geth_cmd->GETH_PAR_INDEX->selectOptionListHtml("x_GETH_PAR_INDEX") ?>
	</select>
</div>
<?php echo $geth_cmd->GETH_PAR_INDEX->Lookup->getParamTag("p_x_GETH_PAR_INDEX") ?>
</span>
<?php echo $geth_cmd->GETH_PAR_INDEX->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($geth_cmd->host_type->Visible) { // host_type ?>
	<div id="r_host_type" class="form-group row">
		<label id="elh_geth_cmd_host_type" for="x_host_type" class="<?php echo $geth_cmd_edit->LeftColumnClass ?>"><?php echo $geth_cmd->host_type->caption() ?><?php echo ($geth_cmd->host_type->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $geth_cmd_edit->RightColumnClass ?>"><div<?php echo $geth_cmd->host_type->cellAttributes() ?>>
<span id="el_geth_cmd_host_type">
<input type="text" data-table="geth_cmd" data-field="x_host_type" name="x_host_type" id="x_host_type" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($geth_cmd->host_type->getPlaceHolder()) ?>" value="<?php echo $geth_cmd->host_type->EditValue ?>"<?php echo $geth_cmd->host_type->editAttributes() ?>>
</span>
<?php echo $geth_cmd->host_type->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($geth_cmd->geth_path->Visible) { // geth_path ?>
	<div id="r_geth_path" class="form-group row">
		<label id="elh_geth_cmd_geth_path" for="x_geth_path" class="<?php echo $geth_cmd_edit->LeftColumnClass ?>"><?php echo $geth_cmd->geth_path->caption() ?><?php echo ($geth_cmd->geth_path->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $geth_cmd_edit->RightColumnClass ?>"><div<?php echo $geth_cmd->geth_path->cellAttributes() ?>>
<span id="el_geth_cmd_geth_path">
<textarea data-table="geth_cmd" data-field="x_geth_path" name="x_geth_path" id="x_geth_path" cols="35" rows="4" placeholder="<?php echo HtmlEncode($geth_cmd->geth_path->getPlaceHolder()) ?>"<?php echo $geth_cmd->geth_path->editAttributes() ?>><?php echo $geth_cmd->geth_path->EditValue ?></textarea>
</span>
<?php echo $geth_cmd->geth_path->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($geth_cmd->node_root->Visible) { // node_root ?>
	<div id="r_node_root" class="form-group row">
		<label id="elh_geth_cmd_node_root" for="x_node_root" class="<?php echo $geth_cmd_edit->LeftColumnClass ?>"><?php echo $geth_cmd->node_root->caption() ?><?php echo ($geth_cmd->node_root->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $geth_cmd_edit->RightColumnClass ?>"><div<?php echo $geth_cmd->node_root->cellAttributes() ?>>
<span id="el_geth_cmd_node_root">
<textarea data-table="geth_cmd" data-field="x_node_root" name="x_node_root" id="x_node_root" cols="35" rows="4" placeholder="<?php echo HtmlEncode($geth_cmd->node_root->getPlaceHolder()) ?>"<?php echo $geth_cmd->node_root->editAttributes() ?>><?php echo $geth_cmd->node_root->EditValue ?></textarea>
</span>
<?php echo $geth_cmd->node_root->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($geth_cmd->node_acc40->Visible) { // node_acc40 ?>
	<div id="r_node_acc40" class="form-group row">
		<label id="elh_geth_cmd_node_acc40" for="x_node_acc40" class="<?php echo $geth_cmd_edit->LeftColumnClass ?>"><?php echo $geth_cmd->node_acc40->caption() ?><?php echo ($geth_cmd->node_acc40->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $geth_cmd_edit->RightColumnClass ?>"><div<?php echo $geth_cmd->node_acc40->cellAttributes() ?>>
<span id="el_geth_cmd_node_acc40">
<input type="text" data-table="geth_cmd" data-field="x_node_acc40" name="x_node_acc40" id="x_node_acc40" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($geth_cmd->node_acc40->getPlaceHolder()) ?>" value="<?php echo $geth_cmd->node_acc40->EditValue ?>"<?php echo $geth_cmd->node_acc40->editAttributes() ?>>
</span>
<?php echo $geth_cmd->node_acc40->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($geth_cmd->node_port->Visible) { // node_port ?>
	<div id="r_node_port" class="form-group row">
		<label id="elh_geth_cmd_node_port" for="x_node_port" class="<?php echo $geth_cmd_edit->LeftColumnClass ?>"><?php echo $geth_cmd->node_port->caption() ?><?php echo ($geth_cmd->node_port->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $geth_cmd_edit->RightColumnClass ?>"><div<?php echo $geth_cmd->node_port->cellAttributes() ?>>
<span id="el_geth_cmd_node_port">
<input type="text" data-table="geth_cmd" data-field="x_node_port" name="x_node_port" id="x_node_port" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($geth_cmd->node_port->getPlaceHolder()) ?>" value="<?php echo $geth_cmd->node_port->EditValue ?>"<?php echo $geth_cmd->node_port->editAttributes() ?>>
</span>
<?php echo $geth_cmd->node_port->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($geth_cmd->hostip->Visible) { // hostip ?>
	<div id="r_hostip" class="form-group row">
		<label id="elh_geth_cmd_hostip" for="x_hostip" class="<?php echo $geth_cmd_edit->LeftColumnClass ?>"><?php echo $geth_cmd->hostip->caption() ?><?php echo ($geth_cmd->hostip->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $geth_cmd_edit->RightColumnClass ?>"><div<?php echo $geth_cmd->hostip->cellAttributes() ?>>
<span id="el_geth_cmd_hostip">
<input type="text" data-table="geth_cmd" data-field="x_hostip" name="x_hostip" id="x_hostip" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($geth_cmd->hostip->getPlaceHolder()) ?>" value="<?php echo $geth_cmd->hostip->EditValue ?>"<?php echo $geth_cmd->hostip->editAttributes() ?>>
</span>
<?php echo $geth_cmd->hostip->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($geth_cmd->node_rpcport->Visible) { // node_rpcport ?>
	<div id="r_node_rpcport" class="form-group row">
		<label id="elh_geth_cmd_node_rpcport" for="x_node_rpcport" class="<?php echo $geth_cmd_edit->LeftColumnClass ?>"><?php echo $geth_cmd->node_rpcport->caption() ?><?php echo ($geth_cmd->node_rpcport->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $geth_cmd_edit->RightColumnClass ?>"><div<?php echo $geth_cmd->node_rpcport->cellAttributes() ?>>
<span id="el_geth_cmd_node_rpcport">
<input type="text" data-table="geth_cmd" data-field="x_node_rpcport" name="x_node_rpcport" id="x_node_rpcport" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($geth_cmd->node_rpcport->getPlaceHolder()) ?>" value="<?php echo $geth_cmd->node_rpcport->EditValue ?>"<?php echo $geth_cmd->node_rpcport->editAttributes() ?>>
</span>
<?php echo $geth_cmd->node_rpcport->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($geth_cmd->bootnode_enode->Visible) { // bootnode_enode ?>
	<div id="r_bootnode_enode" class="form-group row">
		<label id="elh_geth_cmd_bootnode_enode" for="x_bootnode_enode" class="<?php echo $geth_cmd_edit->LeftColumnClass ?>"><?php echo $geth_cmd->bootnode_enode->caption() ?><?php echo ($geth_cmd->bootnode_enode->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $geth_cmd_edit->RightColumnClass ?>"><div<?php echo $geth_cmd->bootnode_enode->cellAttributes() ?>>
<span id="el_geth_cmd_bootnode_enode">
<textarea data-table="geth_cmd" data-field="x_bootnode_enode" name="x_bootnode_enode" id="x_bootnode_enode" cols="35" rows="4" placeholder="<?php echo HtmlEncode($geth_cmd->bootnode_enode->getPlaceHolder()) ?>"<?php echo $geth_cmd->bootnode_enode->editAttributes() ?>><?php echo $geth_cmd->bootnode_enode->EditValue ?></textarea>
</span>
<?php echo $geth_cmd->bootnode_enode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($geth_cmd->bootnode_ip->Visible) { // bootnode_ip ?>
	<div id="r_bootnode_ip" class="form-group row">
		<label id="elh_geth_cmd_bootnode_ip" for="x_bootnode_ip" class="<?php echo $geth_cmd_edit->LeftColumnClass ?>"><?php echo $geth_cmd->bootnode_ip->caption() ?><?php echo ($geth_cmd->bootnode_ip->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $geth_cmd_edit->RightColumnClass ?>"><div<?php echo $geth_cmd->bootnode_ip->cellAttributes() ?>>
<span id="el_geth_cmd_bootnode_ip">
<input type="text" data-table="geth_cmd" data-field="x_bootnode_ip" name="x_bootnode_ip" id="x_bootnode_ip" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($geth_cmd->bootnode_ip->getPlaceHolder()) ?>" value="<?php echo $geth_cmd->bootnode_ip->EditValue ?>"<?php echo $geth_cmd->bootnode_ip->editAttributes() ?>>
</span>
<?php echo $geth_cmd->bootnode_ip->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($geth_cmd->bootnode_port->Visible) { // bootnode_port ?>
	<div id="r_bootnode_port" class="form-group row">
		<label id="elh_geth_cmd_bootnode_port" for="x_bootnode_port" class="<?php echo $geth_cmd_edit->LeftColumnClass ?>"><?php echo $geth_cmd->bootnode_port->caption() ?><?php echo ($geth_cmd->bootnode_port->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $geth_cmd_edit->RightColumnClass ?>"><div<?php echo $geth_cmd->bootnode_port->cellAttributes() ?>>
<span id="el_geth_cmd_bootnode_port">
<input type="text" data-table="geth_cmd" data-field="x_bootnode_port" name="x_bootnode_port" id="x_bootnode_port" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($geth_cmd->bootnode_port->getPlaceHolder()) ?>" value="<?php echo $geth_cmd->bootnode_port->EditValue ?>"<?php echo $geth_cmd->bootnode_port->editAttributes() ?>>
</span>
<?php echo $geth_cmd->bootnode_port->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($geth_cmd->date_add->Visible) { // date_add ?>
	<div id="r_date_add" class="form-group row">
		<label id="elh_geth_cmd_date_add" for="x_date_add" class="<?php echo $geth_cmd_edit->LeftColumnClass ?>"><?php echo $geth_cmd->date_add->caption() ?><?php echo ($geth_cmd->date_add->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $geth_cmd_edit->RightColumnClass ?>"><div<?php echo $geth_cmd->date_add->cellAttributes() ?>>
<span id="el_geth_cmd_date_add">
<input type="text" data-table="geth_cmd" data-field="x_date_add" name="x_date_add" id="x_date_add" placeholder="<?php echo HtmlEncode($geth_cmd->date_add->getPlaceHolder()) ?>" value="<?php echo $geth_cmd->date_add->EditValue ?>"<?php echo $geth_cmd->date_add->editAttributes() ?>>
<?php if (!$geth_cmd->date_add->ReadOnly && !$geth_cmd->date_add->Disabled && !isset($geth_cmd->date_add->EditAttrs["readonly"]) && !isset($geth_cmd->date_add->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fgeth_cmdedit", "x_date_add", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $geth_cmd->date_add->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$geth_cmd_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $geth_cmd_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $geth_cmd_edit->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$geth_cmd_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$geth_cmd_edit->terminate();
?>
