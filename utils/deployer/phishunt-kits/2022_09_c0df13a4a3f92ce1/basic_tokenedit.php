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
$basic_token_edit = new basic_token_edit();

// Run the page
$basic_token_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$basic_token_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fbasic_tokenedit = currentForm = new ew.Form("fbasic_tokenedit", "edit");

// Validate form
fbasic_tokenedit.validate = function() {
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
		<?php if ($basic_token_edit->Rindex->Required) { ?>
			elm = this.getElements("x" + infix + "_Rindex");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $basic_token->Rindex->caption(), $basic_token->Rindex->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($basic_token_edit->type->Required) { ?>
			elm = this.getElements("x" + infix + "_type");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $basic_token->type->caption(), $basic_token->type->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($basic_token_edit->name->Required) { ?>
			elm = this.getElements("x" + infix + "_name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $basic_token->name->caption(), $basic_token->name->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($basic_token_edit->symble->Required) { ?>
			elm = this.getElements("x" + infix + "_symble");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $basic_token->symble->caption(), $basic_token->symble->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($basic_token_edit->supply->Required) { ?>
			elm = this.getElements("x" + infix + "_supply");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $basic_token->supply->caption(), $basic_token->supply->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($basic_token_edit->price->Required) { ?>
			elm = this.getElements("x" + infix + "_price");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $basic_token->price->caption(), $basic_token->price->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($basic_token_edit->logo->Required) { ?>
			felm = this.getElements("x" + infix + "_logo");
			elm = this.getElements("fn_x" + infix + "_logo");
			if (felm && elm && !ew.hasValue(elm))
				return this.onError(felm, "<?php echo JsEncode(str_replace("%s", $basic_token->logo->caption(), $basic_token->logo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($basic_token_edit->holders->Required) { ?>
			elm = this.getElements("x" + infix + "_holders");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $basic_token->holders->caption(), $basic_token->holders->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($basic_token_edit->transfers->Required) { ?>
			elm = this.getElements("x" + infix + "_transfers");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $basic_token->transfers->caption(), $basic_token->transfers->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($basic_token_edit->website->Required) { ?>
			elm = this.getElements("x" + infix + "_website");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $basic_token->website->caption(), $basic_token->website->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($basic_token_edit->contract->Required) { ?>
			elm = this.getElements("x" + infix + "_contract");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $basic_token->contract->caption(), $basic_token->contract->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($basic_token_edit->decimals->Required) { ?>
			elm = this.getElements("x" + infix + "_decimals");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $basic_token->decimals->caption(), $basic_token->decimals->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($basic_token_edit->dateadd->Required) { ?>
			elm = this.getElements("x" + infix + "_dateadd");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $basic_token->dateadd->caption(), $basic_token->dateadd->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_dateadd");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($basic_token->dateadd->errorMessage()) ?>");

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
fbasic_tokenedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fbasic_tokenedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fbasic_tokenedit.lists["x_type"] = <?php echo $basic_token_edit->type->Lookup->toClientList() ?>;
fbasic_tokenedit.lists["x_type"].options = <?php echo JsonEncode($basic_token_edit->type->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $basic_token_edit->showPageHeader(); ?>
<?php
$basic_token_edit->showMessage();
?>
<form name="fbasic_tokenedit" id="fbasic_tokenedit" class="<?php echo $basic_token_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($basic_token_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $basic_token_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="basic_token">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$basic_token_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($basic_token->Rindex->Visible) { // Rindex ?>
	<div id="r_Rindex" class="form-group row">
		<label id="elh_basic_token_Rindex" class="<?php echo $basic_token_edit->LeftColumnClass ?>"><?php echo $basic_token->Rindex->caption() ?><?php echo ($basic_token->Rindex->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $basic_token_edit->RightColumnClass ?>"><div<?php echo $basic_token->Rindex->cellAttributes() ?>>
<span id="el_basic_token_Rindex">
<span<?php echo $basic_token->Rindex->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($basic_token->Rindex->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="basic_token" data-field="x_Rindex" name="x_Rindex" id="x_Rindex" value="<?php echo HtmlEncode($basic_token->Rindex->CurrentValue) ?>">
<?php echo $basic_token->Rindex->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($basic_token->type->Visible) { // type ?>
	<div id="r_type" class="form-group row">
		<label id="elh_basic_token_type" for="x_type" class="<?php echo $basic_token_edit->LeftColumnClass ?>"><?php echo $basic_token->type->caption() ?><?php echo ($basic_token->type->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $basic_token_edit->RightColumnClass ?>"><div<?php echo $basic_token->type->cellAttributes() ?>>
<span id="el_basic_token_type">
<div class="btn-group ew-dropdown-list" role="group">
	<div class="btn-group" role="group">
		<button type="button" class="btn form-control dropdown-toggle ew-dropdown-toggle" aria-haspopup="true" aria-expanded="false"<?php if ($basic_token->type->ReadOnly) { ?> readonly<?php } else { ?>data-toggle="dropdown"<?php } ?>><?php echo $basic_token->type->ViewValue ?></button>
		<div id="dsl_x_type" data-repeatcolumn="1" class="dropdown-menu">
			<div class="ew-items" style="overflow-x: hidden;">
<?php echo $basic_token->type->radioButtonListHtml(TRUE, "x_type") ?>
			</div><!-- /.ew-items ##-->
		</div><!-- /.dropdown-menu ##-->
		<div id="tp_x_type" class="ew-template"><input type="radio" class="form-check-input" data-table="basic_token" data-field="x_type" data-value-separator="<?php echo $basic_token->type->displayValueSeparatorAttribute() ?>" name="x_type" id="x_type" value="{value}"<?php echo $basic_token->type->editAttributes() ?>></div>
	</div><!-- /.btn-group ##-->
	<?php if (!$basic_token->type->ReadOnly) { ?>
	<button type="button" class="btn btn-default ew-dropdown-clear" disabled>
		<i class="fa fa-times ew-icon"></i>
	</button>
	<?php } ?>
</div><!-- /.ew-dropdown-list ##-->
</span>
<?php echo $basic_token->type->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($basic_token->name->Visible) { // name ?>
	<div id="r_name" class="form-group row">
		<label id="elh_basic_token_name" for="x_name" class="<?php echo $basic_token_edit->LeftColumnClass ?>"><?php echo $basic_token->name->caption() ?><?php echo ($basic_token->name->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $basic_token_edit->RightColumnClass ?>"><div<?php echo $basic_token->name->cellAttributes() ?>>
<span id="el_basic_token_name">
<input type="text" data-table="basic_token" data-field="x_name" name="x_name" id="x_name" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($basic_token->name->getPlaceHolder()) ?>" value="<?php echo $basic_token->name->EditValue ?>"<?php echo $basic_token->name->editAttributes() ?>>
</span>
<?php echo $basic_token->name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($basic_token->symble->Visible) { // symble ?>
	<div id="r_symble" class="form-group row">
		<label id="elh_basic_token_symble" for="x_symble" class="<?php echo $basic_token_edit->LeftColumnClass ?>"><?php echo $basic_token->symble->caption() ?><?php echo ($basic_token->symble->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $basic_token_edit->RightColumnClass ?>"><div<?php echo $basic_token->symble->cellAttributes() ?>>
<span id="el_basic_token_symble">
<input type="text" data-table="basic_token" data-field="x_symble" name="x_symble" id="x_symble" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($basic_token->symble->getPlaceHolder()) ?>" value="<?php echo $basic_token->symble->EditValue ?>"<?php echo $basic_token->symble->editAttributes() ?>>
</span>
<?php echo $basic_token->symble->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($basic_token->supply->Visible) { // supply ?>
	<div id="r_supply" class="form-group row">
		<label id="elh_basic_token_supply" for="x_supply" class="<?php echo $basic_token_edit->LeftColumnClass ?>"><?php echo $basic_token->supply->caption() ?><?php echo ($basic_token->supply->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $basic_token_edit->RightColumnClass ?>"><div<?php echo $basic_token->supply->cellAttributes() ?>>
<span id="el_basic_token_supply">
<input type="text" data-table="basic_token" data-field="x_supply" name="x_supply" id="x_supply" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($basic_token->supply->getPlaceHolder()) ?>" value="<?php echo $basic_token->supply->EditValue ?>"<?php echo $basic_token->supply->editAttributes() ?>>
</span>
<?php echo $basic_token->supply->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($basic_token->price->Visible) { // price ?>
	<div id="r_price" class="form-group row">
		<label id="elh_basic_token_price" for="x_price" class="<?php echo $basic_token_edit->LeftColumnClass ?>"><?php echo $basic_token->price->caption() ?><?php echo ($basic_token->price->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $basic_token_edit->RightColumnClass ?>"><div<?php echo $basic_token->price->cellAttributes() ?>>
<span id="el_basic_token_price">
<input type="text" data-table="basic_token" data-field="x_price" name="x_price" id="x_price" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($basic_token->price->getPlaceHolder()) ?>" value="<?php echo $basic_token->price->EditValue ?>"<?php echo $basic_token->price->editAttributes() ?>>
</span>
<?php echo $basic_token->price->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($basic_token->logo->Visible) { // logo ?>
	<div id="r_logo" class="form-group row">
		<label id="elh_basic_token_logo" class="<?php echo $basic_token_edit->LeftColumnClass ?>"><?php echo $basic_token->logo->caption() ?><?php echo ($basic_token->logo->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $basic_token_edit->RightColumnClass ?>"><div<?php echo $basic_token->logo->cellAttributes() ?>>
<span id="el_basic_token_logo">
<div id="fd_x_logo">
<span title="<?php echo $basic_token->logo->title() ? $basic_token->logo->title() : $Language->Phrase("ChooseFile") ?>" class="btn btn-default btn-sm fileinput-button ew-tooltip<?php if ($basic_token->logo->ReadOnly || $basic_token->logo->Disabled) echo " d-none"; ?>">
	<span><?php echo $Language->Phrase("ChooseFileBtn") ?></span>
	<input type="file" title=" " data-table="basic_token" data-field="x_logo" name="x_logo" id="x_logo"<?php echo $basic_token->logo->editAttributes() ?>>
</span>
<input type="hidden" name="fn_x_logo" id= "fn_x_logo" value="<?php echo $basic_token->logo->Upload->FileName ?>">
<?php if (Post("fa_x_logo") == "0") { ?>
<input type="hidden" name="fa_x_logo" id= "fa_x_logo" value="0">
<?php } else { ?>
<input type="hidden" name="fa_x_logo" id= "fa_x_logo" value="1">
<?php } ?>
<input type="hidden" name="fs_x_logo" id= "fs_x_logo" value="65535">
<input type="hidden" name="fx_x_logo" id= "fx_x_logo" value="<?php echo $basic_token->logo->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x_logo" id= "fm_x_logo" value="<?php echo $basic_token->logo->UploadMaxFileSize ?>">
</div>
<table id="ft_x_logo" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<?php echo $basic_token->logo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($basic_token->holders->Visible) { // holders ?>
	<div id="r_holders" class="form-group row">
		<label id="elh_basic_token_holders" for="x_holders" class="<?php echo $basic_token_edit->LeftColumnClass ?>"><?php echo $basic_token->holders->caption() ?><?php echo ($basic_token->holders->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $basic_token_edit->RightColumnClass ?>"><div<?php echo $basic_token->holders->cellAttributes() ?>>
<span id="el_basic_token_holders">
<input type="text" data-table="basic_token" data-field="x_holders" name="x_holders" id="x_holders" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($basic_token->holders->getPlaceHolder()) ?>" value="<?php echo $basic_token->holders->EditValue ?>"<?php echo $basic_token->holders->editAttributes() ?>>
</span>
<?php echo $basic_token->holders->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($basic_token->transfers->Visible) { // transfers ?>
	<div id="r_transfers" class="form-group row">
		<label id="elh_basic_token_transfers" for="x_transfers" class="<?php echo $basic_token_edit->LeftColumnClass ?>"><?php echo $basic_token->transfers->caption() ?><?php echo ($basic_token->transfers->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $basic_token_edit->RightColumnClass ?>"><div<?php echo $basic_token->transfers->cellAttributes() ?>>
<span id="el_basic_token_transfers">
<input type="text" data-table="basic_token" data-field="x_transfers" name="x_transfers" id="x_transfers" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($basic_token->transfers->getPlaceHolder()) ?>" value="<?php echo $basic_token->transfers->EditValue ?>"<?php echo $basic_token->transfers->editAttributes() ?>>
</span>
<?php echo $basic_token->transfers->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($basic_token->website->Visible) { // website ?>
	<div id="r_website" class="form-group row">
		<label id="elh_basic_token_website" for="x_website" class="<?php echo $basic_token_edit->LeftColumnClass ?>"><?php echo $basic_token->website->caption() ?><?php echo ($basic_token->website->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $basic_token_edit->RightColumnClass ?>"><div<?php echo $basic_token->website->cellAttributes() ?>>
<span id="el_basic_token_website">
<textarea data-table="basic_token" data-field="x_website" name="x_website" id="x_website" cols="35" rows="4" placeholder="<?php echo HtmlEncode($basic_token->website->getPlaceHolder()) ?>"<?php echo $basic_token->website->editAttributes() ?>><?php echo $basic_token->website->EditValue ?></textarea>
</span>
<?php echo $basic_token->website->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($basic_token->contract->Visible) { // contract ?>
	<div id="r_contract" class="form-group row">
		<label id="elh_basic_token_contract" for="x_contract" class="<?php echo $basic_token_edit->LeftColumnClass ?>"><?php echo $basic_token->contract->caption() ?><?php echo ($basic_token->contract->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $basic_token_edit->RightColumnClass ?>"><div<?php echo $basic_token->contract->cellAttributes() ?>>
<span id="el_basic_token_contract">
<input type="text" data-table="basic_token" data-field="x_contract" name="x_contract" id="x_contract" size="30" maxlength="80" placeholder="<?php echo HtmlEncode($basic_token->contract->getPlaceHolder()) ?>" value="<?php echo $basic_token->contract->EditValue ?>"<?php echo $basic_token->contract->editAttributes() ?>>
</span>
<?php echo $basic_token->contract->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($basic_token->decimals->Visible) { // decimals ?>
	<div id="r_decimals" class="form-group row">
		<label id="elh_basic_token_decimals" for="x_decimals" class="<?php echo $basic_token_edit->LeftColumnClass ?>"><?php echo $basic_token->decimals->caption() ?><?php echo ($basic_token->decimals->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $basic_token_edit->RightColumnClass ?>"><div<?php echo $basic_token->decimals->cellAttributes() ?>>
<span id="el_basic_token_decimals">
<input type="text" data-table="basic_token" data-field="x_decimals" name="x_decimals" id="x_decimals" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($basic_token->decimals->getPlaceHolder()) ?>" value="<?php echo $basic_token->decimals->EditValue ?>"<?php echo $basic_token->decimals->editAttributes() ?>>
</span>
<?php echo $basic_token->decimals->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($basic_token->dateadd->Visible) { // dateadd ?>
	<div id="r_dateadd" class="form-group row">
		<label id="elh_basic_token_dateadd" for="x_dateadd" class="<?php echo $basic_token_edit->LeftColumnClass ?>"><?php echo $basic_token->dateadd->caption() ?><?php echo ($basic_token->dateadd->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $basic_token_edit->RightColumnClass ?>"><div<?php echo $basic_token->dateadd->cellAttributes() ?>>
<span id="el_basic_token_dateadd">
<input type="text" data-table="basic_token" data-field="x_dateadd" data-format="1" name="x_dateadd" id="x_dateadd" placeholder="<?php echo HtmlEncode($basic_token->dateadd->getPlaceHolder()) ?>" value="<?php echo $basic_token->dateadd->EditValue ?>"<?php echo $basic_token->dateadd->editAttributes() ?>>
<?php if (!$basic_token->dateadd->ReadOnly && !$basic_token->dateadd->Disabled && !isset($basic_token->dateadd->EditAttrs["readonly"]) && !isset($basic_token->dateadd->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fbasic_tokenedit", "x_dateadd", {"ignoreReadonly":true,"useCurrent":false,"format":1});
</script>
<?php } ?>
</span>
<?php echo $basic_token->dateadd->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$basic_token_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $basic_token_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $basic_token_edit->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$basic_token_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$basic_token_edit->terminate();
?>
