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
$esbc_location_edit = new esbc_location_edit();

// Run the page
$esbc_location_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$esbc_location_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fesbc_locationedit = currentForm = new ew.Form("fesbc_locationedit", "edit");

// Validate form
fesbc_locationedit.validate = function() {
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
		<?php if ($esbc_location_edit->L_index->Required) { ?>
			elm = this.getElements("x" + infix + "_L_index");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $esbc_location->L_index->caption(), $esbc_location->L_index->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($esbc_location_edit->VPS->Required) { ?>
			elm = this.getElements("x" + infix + "_VPS");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $esbc_location->VPS->caption(), $esbc_location->VPS->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($esbc_location_edit->VPS_URL->Required) { ?>
			elm = this.getElements("x" + infix + "_VPS_URL");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $esbc_location->VPS_URL->caption(), $esbc_location->VPS_URL->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($esbc_location_edit->L_Name->Required) { ?>
			elm = this.getElements("x" + infix + "_L_Name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $esbc_location->L_Name->caption(), $esbc_location->L_Name->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($esbc_location_edit->L_Lat->Required) { ?>
			elm = this.getElements("x" + infix + "_L_Lat");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $esbc_location->L_Lat->caption(), $esbc_location->L_Lat->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_L_Lat");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($esbc_location->L_Lat->errorMessage()) ?>");
		<?php if ($esbc_location_edit->L_Lon->Required) { ?>
			elm = this.getElements("x" + infix + "_L_Lon");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $esbc_location->L_Lon->caption(), $esbc_location->L_Lon->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_L_Lon");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($esbc_location->L_Lon->errorMessage()) ?>");
		<?php if ($esbc_location_edit->Create_Date->Required) { ?>
			elm = this.getElements("x" + infix + "_Create_Date");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $esbc_location->Create_Date->caption(), $esbc_location->Create_Date->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Create_Date");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($esbc_location->Create_Date->errorMessage()) ?>");

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
fesbc_locationedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fesbc_locationedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $esbc_location_edit->showPageHeader(); ?>
<?php
$esbc_location_edit->showMessage();
?>
<form name="fesbc_locationedit" id="fesbc_locationedit" class="<?php echo $esbc_location_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($esbc_location_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $esbc_location_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="esbc_location">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$esbc_location_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($esbc_location->L_index->Visible) { // L_index ?>
	<div id="r_L_index" class="form-group row">
		<label id="elh_esbc_location_L_index" class="<?php echo $esbc_location_edit->LeftColumnClass ?>"><?php echo $esbc_location->L_index->caption() ?><?php echo ($esbc_location->L_index->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $esbc_location_edit->RightColumnClass ?>"><div<?php echo $esbc_location->L_index->cellAttributes() ?>>
<span id="el_esbc_location_L_index">
<span<?php echo $esbc_location->L_index->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($esbc_location->L_index->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="esbc_location" data-field="x_L_index" name="x_L_index" id="x_L_index" value="<?php echo HtmlEncode($esbc_location->L_index->CurrentValue) ?>">
<?php echo $esbc_location->L_index->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($esbc_location->VPS->Visible) { // VPS ?>
	<div id="r_VPS" class="form-group row">
		<label id="elh_esbc_location_VPS" for="x_VPS" class="<?php echo $esbc_location_edit->LeftColumnClass ?>"><?php echo $esbc_location->VPS->caption() ?><?php echo ($esbc_location->VPS->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $esbc_location_edit->RightColumnClass ?>"><div<?php echo $esbc_location->VPS->cellAttributes() ?>>
<span id="el_esbc_location_VPS">
<input type="text" data-table="esbc_location" data-field="x_VPS" name="x_VPS" id="x_VPS" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($esbc_location->VPS->getPlaceHolder()) ?>" value="<?php echo $esbc_location->VPS->EditValue ?>"<?php echo $esbc_location->VPS->editAttributes() ?>>
</span>
<?php echo $esbc_location->VPS->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($esbc_location->VPS_URL->Visible) { // VPS_URL ?>
	<div id="r_VPS_URL" class="form-group row">
		<label id="elh_esbc_location_VPS_URL" for="x_VPS_URL" class="<?php echo $esbc_location_edit->LeftColumnClass ?>"><?php echo $esbc_location->VPS_URL->caption() ?><?php echo ($esbc_location->VPS_URL->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $esbc_location_edit->RightColumnClass ?>"><div<?php echo $esbc_location->VPS_URL->cellAttributes() ?>>
<span id="el_esbc_location_VPS_URL">
<input type="text" data-table="esbc_location" data-field="x_VPS_URL" name="x_VPS_URL" id="x_VPS_URL" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($esbc_location->VPS_URL->getPlaceHolder()) ?>" value="<?php echo $esbc_location->VPS_URL->EditValue ?>"<?php echo $esbc_location->VPS_URL->editAttributes() ?>>
</span>
<?php echo $esbc_location->VPS_URL->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($esbc_location->L_Name->Visible) { // L_Name ?>
	<div id="r_L_Name" class="form-group row">
		<label id="elh_esbc_location_L_Name" for="x_L_Name" class="<?php echo $esbc_location_edit->LeftColumnClass ?>"><?php echo $esbc_location->L_Name->caption() ?><?php echo ($esbc_location->L_Name->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $esbc_location_edit->RightColumnClass ?>"><div<?php echo $esbc_location->L_Name->cellAttributes() ?>>
<span id="el_esbc_location_L_Name">
<input type="text" data-table="esbc_location" data-field="x_L_Name" name="x_L_Name" id="x_L_Name" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($esbc_location->L_Name->getPlaceHolder()) ?>" value="<?php echo $esbc_location->L_Name->EditValue ?>"<?php echo $esbc_location->L_Name->editAttributes() ?>>
</span>
<?php echo $esbc_location->L_Name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($esbc_location->L_Lat->Visible) { // L_Lat ?>
	<div id="r_L_Lat" class="form-group row">
		<label id="elh_esbc_location_L_Lat" for="x_L_Lat" class="<?php echo $esbc_location_edit->LeftColumnClass ?>"><?php echo $esbc_location->L_Lat->caption() ?><?php echo ($esbc_location->L_Lat->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $esbc_location_edit->RightColumnClass ?>"><div<?php echo $esbc_location->L_Lat->cellAttributes() ?>>
<span id="el_esbc_location_L_Lat">
<input type="text" data-table="esbc_location" data-field="x_L_Lat" name="x_L_Lat" id="x_L_Lat" size="30" placeholder="<?php echo HtmlEncode($esbc_location->L_Lat->getPlaceHolder()) ?>" value="<?php echo $esbc_location->L_Lat->EditValue ?>"<?php echo $esbc_location->L_Lat->editAttributes() ?>>
</span>
<?php echo $esbc_location->L_Lat->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($esbc_location->L_Lon->Visible) { // L_Lon ?>
	<div id="r_L_Lon" class="form-group row">
		<label id="elh_esbc_location_L_Lon" for="x_L_Lon" class="<?php echo $esbc_location_edit->LeftColumnClass ?>"><?php echo $esbc_location->L_Lon->caption() ?><?php echo ($esbc_location->L_Lon->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $esbc_location_edit->RightColumnClass ?>"><div<?php echo $esbc_location->L_Lon->cellAttributes() ?>>
<span id="el_esbc_location_L_Lon">
<input type="text" data-table="esbc_location" data-field="x_L_Lon" name="x_L_Lon" id="x_L_Lon" size="30" placeholder="<?php echo HtmlEncode($esbc_location->L_Lon->getPlaceHolder()) ?>" value="<?php echo $esbc_location->L_Lon->EditValue ?>"<?php echo $esbc_location->L_Lon->editAttributes() ?>>
</span>
<?php echo $esbc_location->L_Lon->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($esbc_location->Create_Date->Visible) { // Create_Date ?>
	<div id="r_Create_Date" class="form-group row">
		<label id="elh_esbc_location_Create_Date" for="x_Create_Date" class="<?php echo $esbc_location_edit->LeftColumnClass ?>"><?php echo $esbc_location->Create_Date->caption() ?><?php echo ($esbc_location->Create_Date->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $esbc_location_edit->RightColumnClass ?>"><div<?php echo $esbc_location->Create_Date->cellAttributes() ?>>
<span id="el_esbc_location_Create_Date">
<input type="text" data-table="esbc_location" data-field="x_Create_Date" data-format="1" name="x_Create_Date" id="x_Create_Date" placeholder="<?php echo HtmlEncode($esbc_location->Create_Date->getPlaceHolder()) ?>" value="<?php echo $esbc_location->Create_Date->EditValue ?>"<?php echo $esbc_location->Create_Date->editAttributes() ?>>
<?php if (!$esbc_location->Create_Date->ReadOnly && !$esbc_location->Create_Date->Disabled && !isset($esbc_location->Create_Date->EditAttrs["readonly"]) && !isset($esbc_location->Create_Date->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fesbc_locationedit", "x_Create_Date", {"ignoreReadonly":true,"useCurrent":false,"format":1});
</script>
<?php } ?>
</span>
<?php echo $esbc_location->Create_Date->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$esbc_location_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $esbc_location_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $esbc_location_edit->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$esbc_location_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$esbc_location_edit->terminate();
?>
