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
$log_block_add = new log_block_add();

// Run the page
$log_block_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$log_block_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var flog_blockadd = currentForm = new ew.Form("flog_blockadd", "add");

// Validate form
flog_blockadd.validate = function() {
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
		<?php if ($log_block_add->height_block->Required) { ?>
			elm = this.getElements("x" + infix + "_height_block");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $log_block->height_block->caption(), $log_block->height_block->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_height_block");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($log_block->height_block->errorMessage()) ?>");
		<?php if ($log_block_add->time_mined->Required) { ?>
			elm = this.getElements("x" + infix + "_time_mined");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $log_block->time_mined->caption(), $log_block->time_mined->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_time_mined");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($log_block->time_mined->errorMessage()) ?>");
		<?php if ($log_block_add->hash->Required) { ?>
			elm = this.getElements("x" + infix + "_hash");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $log_block->hash->caption(), $log_block->hash->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($log_block_add->size->Required) { ?>
			elm = this.getElements("x" + infix + "_size");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $log_block->size->caption(), $log_block->size->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($log_block_add->acc_from->Required) { ?>
			elm = this.getElements("x" + infix + "_acc_from");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $log_block->acc_from->caption(), $log_block->acc_from->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($log_block_add->acc_to->Required) { ?>
			elm = this.getElements("x" + infix + "_acc_to");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $log_block->acc_to->caption(), $log_block->acc_to->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($log_block_add->gasused->Required) { ?>
			elm = this.getElements("x" + infix + "_gasused");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $log_block->gasused->caption(), $log_block->gasused->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($log_block_add->nonce->Required) { ?>
			elm = this.getElements("x" + infix + "_nonce");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $log_block->nonce->caption(), $log_block->nonce->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($log_block_add->extradata->Required) { ?>
			elm = this.getElements("x" + infix + "_extradata");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $log_block->extradata->caption(), $log_block->extradata->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($log_block_add->tx_num->Required) { ?>
			elm = this.getElements("x" + infix + "_tx_num");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $log_block->tx_num->caption(), $log_block->tx_num->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($log_block_add->hash_parent->Required) { ?>
			elm = this.getElements("x" + infix + "_hash_parent");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $log_block->hash_parent->caption(), $log_block->hash_parent->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($log_block_add->miner->Required) { ?>
			elm = this.getElements("x" + infix + "_miner");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $log_block->miner->caption(), $log_block->miner->RequiredErrorMessage)) ?>");
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
flog_blockadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
flog_blockadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $log_block_add->showPageHeader(); ?>
<?php
$log_block_add->showMessage();
?>
<form name="flog_blockadd" id="flog_blockadd" class="<?php echo $log_block_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($log_block_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $log_block_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="log_block">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$log_block_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($log_block->height_block->Visible) { // height_block ?>
	<div id="r_height_block" class="form-group row">
		<label id="elh_log_block_height_block" for="x_height_block" class="<?php echo $log_block_add->LeftColumnClass ?>"><?php echo $log_block->height_block->caption() ?><?php echo ($log_block->height_block->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $log_block_add->RightColumnClass ?>"><div<?php echo $log_block->height_block->cellAttributes() ?>>
<span id="el_log_block_height_block">
<input type="text" data-table="log_block" data-field="x_height_block" name="x_height_block" id="x_height_block" size="30" placeholder="<?php echo HtmlEncode($log_block->height_block->getPlaceHolder()) ?>" value="<?php echo $log_block->height_block->EditValue ?>"<?php echo $log_block->height_block->editAttributes() ?>>
</span>
<?php echo $log_block->height_block->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($log_block->time_mined->Visible) { // time_mined ?>
	<div id="r_time_mined" class="form-group row">
		<label id="elh_log_block_time_mined" for="x_time_mined" class="<?php echo $log_block_add->LeftColumnClass ?>"><?php echo $log_block->time_mined->caption() ?><?php echo ($log_block->time_mined->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $log_block_add->RightColumnClass ?>"><div<?php echo $log_block->time_mined->cellAttributes() ?>>
<span id="el_log_block_time_mined">
<input type="text" data-table="log_block" data-field="x_time_mined" data-format="1" name="x_time_mined" id="x_time_mined" placeholder="<?php echo HtmlEncode($log_block->time_mined->getPlaceHolder()) ?>" value="<?php echo $log_block->time_mined->EditValue ?>"<?php echo $log_block->time_mined->editAttributes() ?>>
<?php if (!$log_block->time_mined->ReadOnly && !$log_block->time_mined->Disabled && !isset($log_block->time_mined->EditAttrs["readonly"]) && !isset($log_block->time_mined->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("flog_blockadd", "x_time_mined", {"ignoreReadonly":true,"useCurrent":false,"format":1});
</script>
<?php } ?>
</span>
<?php echo $log_block->time_mined->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($log_block->hash->Visible) { // hash ?>
	<div id="r_hash" class="form-group row">
		<label id="elh_log_block_hash" for="x_hash" class="<?php echo $log_block_add->LeftColumnClass ?>"><?php echo $log_block->hash->caption() ?><?php echo ($log_block->hash->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $log_block_add->RightColumnClass ?>"><div<?php echo $log_block->hash->cellAttributes() ?>>
<span id="el_log_block_hash">
<textarea data-table="log_block" data-field="x_hash" name="x_hash" id="x_hash" cols="35" rows="4" placeholder="<?php echo HtmlEncode($log_block->hash->getPlaceHolder()) ?>"<?php echo $log_block->hash->editAttributes() ?>><?php echo $log_block->hash->EditValue ?></textarea>
</span>
<?php echo $log_block->hash->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($log_block->size->Visible) { // size ?>
	<div id="r_size" class="form-group row">
		<label id="elh_log_block_size" for="x_size" class="<?php echo $log_block_add->LeftColumnClass ?>"><?php echo $log_block->size->caption() ?><?php echo ($log_block->size->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $log_block_add->RightColumnClass ?>"><div<?php echo $log_block->size->cellAttributes() ?>>
<span id="el_log_block_size">
<input type="text" data-table="log_block" data-field="x_size" name="x_size" id="x_size" size="30" maxlength="30" placeholder="<?php echo HtmlEncode($log_block->size->getPlaceHolder()) ?>" value="<?php echo $log_block->size->EditValue ?>"<?php echo $log_block->size->editAttributes() ?>>
</span>
<?php echo $log_block->size->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($log_block->acc_from->Visible) { // acc_from ?>
	<div id="r_acc_from" class="form-group row">
		<label id="elh_log_block_acc_from" for="x_acc_from" class="<?php echo $log_block_add->LeftColumnClass ?>"><?php echo $log_block->acc_from->caption() ?><?php echo ($log_block->acc_from->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $log_block_add->RightColumnClass ?>"><div<?php echo $log_block->acc_from->cellAttributes() ?>>
<span id="el_log_block_acc_from">
<input type="text" data-table="log_block" data-field="x_acc_from" name="x_acc_from" id="x_acc_from" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($log_block->acc_from->getPlaceHolder()) ?>" value="<?php echo $log_block->acc_from->EditValue ?>"<?php echo $log_block->acc_from->editAttributes() ?>>
</span>
<?php echo $log_block->acc_from->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($log_block->acc_to->Visible) { // acc_to ?>
	<div id="r_acc_to" class="form-group row">
		<label id="elh_log_block_acc_to" for="x_acc_to" class="<?php echo $log_block_add->LeftColumnClass ?>"><?php echo $log_block->acc_to->caption() ?><?php echo ($log_block->acc_to->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $log_block_add->RightColumnClass ?>"><div<?php echo $log_block->acc_to->cellAttributes() ?>>
<span id="el_log_block_acc_to">
<input type="text" data-table="log_block" data-field="x_acc_to" name="x_acc_to" id="x_acc_to" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($log_block->acc_to->getPlaceHolder()) ?>" value="<?php echo $log_block->acc_to->EditValue ?>"<?php echo $log_block->acc_to->editAttributes() ?>>
</span>
<?php echo $log_block->acc_to->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($log_block->gasused->Visible) { // gasused ?>
	<div id="r_gasused" class="form-group row">
		<label id="elh_log_block_gasused" for="x_gasused" class="<?php echo $log_block_add->LeftColumnClass ?>"><?php echo $log_block->gasused->caption() ?><?php echo ($log_block->gasused->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $log_block_add->RightColumnClass ?>"><div<?php echo $log_block->gasused->cellAttributes() ?>>
<span id="el_log_block_gasused">
<input type="text" data-table="log_block" data-field="x_gasused" name="x_gasused" id="x_gasused" size="30" maxlength="30" placeholder="<?php echo HtmlEncode($log_block->gasused->getPlaceHolder()) ?>" value="<?php echo $log_block->gasused->EditValue ?>"<?php echo $log_block->gasused->editAttributes() ?>>
</span>
<?php echo $log_block->gasused->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($log_block->nonce->Visible) { // nonce ?>
	<div id="r_nonce" class="form-group row">
		<label id="elh_log_block_nonce" for="x_nonce" class="<?php echo $log_block_add->LeftColumnClass ?>"><?php echo $log_block->nonce->caption() ?><?php echo ($log_block->nonce->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $log_block_add->RightColumnClass ?>"><div<?php echo $log_block->nonce->cellAttributes() ?>>
<span id="el_log_block_nonce">
<input type="text" data-table="log_block" data-field="x_nonce" name="x_nonce" id="x_nonce" size="30" maxlength="30" placeholder="<?php echo HtmlEncode($log_block->nonce->getPlaceHolder()) ?>" value="<?php echo $log_block->nonce->EditValue ?>"<?php echo $log_block->nonce->editAttributes() ?>>
</span>
<?php echo $log_block->nonce->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($log_block->extradata->Visible) { // extradata ?>
	<div id="r_extradata" class="form-group row">
		<label id="elh_log_block_extradata" for="x_extradata" class="<?php echo $log_block_add->LeftColumnClass ?>"><?php echo $log_block->extradata->caption() ?><?php echo ($log_block->extradata->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $log_block_add->RightColumnClass ?>"><div<?php echo $log_block->extradata->cellAttributes() ?>>
<span id="el_log_block_extradata">
<textarea data-table="log_block" data-field="x_extradata" name="x_extradata" id="x_extradata" cols="35" rows="4" placeholder="<?php echo HtmlEncode($log_block->extradata->getPlaceHolder()) ?>"<?php echo $log_block->extradata->editAttributes() ?>><?php echo $log_block->extradata->EditValue ?></textarea>
</span>
<?php echo $log_block->extradata->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($log_block->tx_num->Visible) { // tx_num ?>
	<div id="r_tx_num" class="form-group row">
		<label id="elh_log_block_tx_num" for="x_tx_num" class="<?php echo $log_block_add->LeftColumnClass ?>"><?php echo $log_block->tx_num->caption() ?><?php echo ($log_block->tx_num->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $log_block_add->RightColumnClass ?>"><div<?php echo $log_block->tx_num->cellAttributes() ?>>
<span id="el_log_block_tx_num">
<input type="text" data-table="log_block" data-field="x_tx_num" name="x_tx_num" id="x_tx_num" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($log_block->tx_num->getPlaceHolder()) ?>" value="<?php echo $log_block->tx_num->EditValue ?>"<?php echo $log_block->tx_num->editAttributes() ?>>
</span>
<?php echo $log_block->tx_num->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($log_block->hash_parent->Visible) { // hash_parent ?>
	<div id="r_hash_parent" class="form-group row">
		<label id="elh_log_block_hash_parent" for="x_hash_parent" class="<?php echo $log_block_add->LeftColumnClass ?>"><?php echo $log_block->hash_parent->caption() ?><?php echo ($log_block->hash_parent->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $log_block_add->RightColumnClass ?>"><div<?php echo $log_block->hash_parent->cellAttributes() ?>>
<span id="el_log_block_hash_parent">
<input type="text" data-table="log_block" data-field="x_hash_parent" name="x_hash_parent" id="x_hash_parent" size="30" maxlength="80" placeholder="<?php echo HtmlEncode($log_block->hash_parent->getPlaceHolder()) ?>" value="<?php echo $log_block->hash_parent->EditValue ?>"<?php echo $log_block->hash_parent->editAttributes() ?>>
</span>
<?php echo $log_block->hash_parent->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($log_block->miner->Visible) { // miner ?>
	<div id="r_miner" class="form-group row">
		<label id="elh_log_block_miner" for="x_miner" class="<?php echo $log_block_add->LeftColumnClass ?>"><?php echo $log_block->miner->caption() ?><?php echo ($log_block->miner->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $log_block_add->RightColumnClass ?>"><div<?php echo $log_block->miner->cellAttributes() ?>>
<span id="el_log_block_miner">
<input type="text" data-table="log_block" data-field="x_miner" name="x_miner" id="x_miner" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($log_block->miner->getPlaceHolder()) ?>" value="<?php echo $log_block->miner->EditValue ?>"<?php echo $log_block->miner->editAttributes() ?>>
</span>
<?php echo $log_block->miner->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$log_block_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $log_block_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $log_block_add->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$log_block_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$log_block_add->terminate();
?>
