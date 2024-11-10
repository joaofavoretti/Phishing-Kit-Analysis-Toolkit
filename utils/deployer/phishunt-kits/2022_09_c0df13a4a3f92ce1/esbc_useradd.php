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
$esbc_user_add = new esbc_user_add();

// Run the page
$esbc_user_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$esbc_user_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var fesbc_useradd = currentForm = new ew.Form("fesbc_useradd", "add");

// Validate form
fesbc_useradd.validate = function() {
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
		<?php if ($esbc_user_add->USER_NAME->Required) { ?>
			elm = this.getElements("x" + infix + "_USER_NAME");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $esbc_user->USER_NAME->caption(), $esbc_user->USER_NAME->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($esbc_user_add->USER_PW->Required) { ?>
			elm = this.getElements("x" + infix + "_USER_PW");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $esbc_user->USER_PW->caption(), $esbc_user->USER_PW->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($esbc_user_add->USER_EMAIL->Required) { ?>
			elm = this.getElements("x" + infix + "_USER_EMAIL");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $esbc_user->USER_EMAIL->caption(), $esbc_user->USER_EMAIL->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($esbc_user_add->USER_LEVEL->Required) { ?>
			elm = this.getElements("x" + infix + "_USER_LEVEL");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $esbc_user->USER_LEVEL->caption(), $esbc_user->USER_LEVEL->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_USER_LEVEL");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($esbc_user->USER_LEVEL->errorMessage()) ?>");
		<?php if ($esbc_user_add->Create_Date->Required) { ?>
			elm = this.getElements("x" + infix + "_Create_Date");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $esbc_user->Create_Date->caption(), $esbc_user->Create_Date->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Create_Date");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($esbc_user->Create_Date->errorMessage()) ?>");

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
fesbc_useradd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fesbc_useradd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $esbc_user_add->showPageHeader(); ?>
<?php
$esbc_user_add->showMessage();
?>
<form name="fesbc_useradd" id="fesbc_useradd" class="<?php echo $esbc_user_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($esbc_user_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $esbc_user_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="esbc_user">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$esbc_user_add->IsModal ?>">
<!-- Fields to prevent google autofill -->
<input class="d-none" type="text" name="<?php echo Encrypt(Random()) ?>">
<input class="d-none" type="password" name="<?php echo Encrypt(Random()) ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($esbc_user->USER_NAME->Visible) { // USER_NAME ?>
	<div id="r_USER_NAME" class="form-group row">
		<label id="elh_esbc_user_USER_NAME" for="x_USER_NAME" class="<?php echo $esbc_user_add->LeftColumnClass ?>"><?php echo $esbc_user->USER_NAME->caption() ?><?php echo ($esbc_user->USER_NAME->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $esbc_user_add->RightColumnClass ?>"><div<?php echo $esbc_user->USER_NAME->cellAttributes() ?>>
<?php if (!$Security->isAdmin() && $Security->isLoggedIn() && !$esbc_user->userIDAllow("add")) { // Non system admin ?>
<span id="el_esbc_user_USER_NAME">
<span<?php echo $esbc_user->USER_NAME->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($esbc_user->USER_NAME->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="esbc_user" data-field="x_USER_NAME" name="x_USER_NAME" id="x_USER_NAME" value="<?php echo HtmlEncode($esbc_user->USER_NAME->CurrentValue) ?>">
<?php } else { ?>
<span id="el_esbc_user_USER_NAME">
<input type="text" data-table="esbc_user" data-field="x_USER_NAME" name="x_USER_NAME" id="x_USER_NAME" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($esbc_user->USER_NAME->getPlaceHolder()) ?>" value="<?php echo $esbc_user->USER_NAME->EditValue ?>"<?php echo $esbc_user->USER_NAME->editAttributes() ?>>
</span>
<?php } ?>
<?php echo $esbc_user->USER_NAME->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($esbc_user->USER_PW->Visible) { // USER_PW ?>
	<div id="r_USER_PW" class="form-group row">
		<label id="elh_esbc_user_USER_PW" for="x_USER_PW" class="<?php echo $esbc_user_add->LeftColumnClass ?>"><?php echo $esbc_user->USER_PW->caption() ?><?php echo ($esbc_user->USER_PW->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $esbc_user_add->RightColumnClass ?>"><div<?php echo $esbc_user->USER_PW->cellAttributes() ?>>
<span id="el_esbc_user_USER_PW">
<input type="text" data-table="esbc_user" data-field="x_USER_PW" name="x_USER_PW" id="x_USER_PW" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($esbc_user->USER_PW->getPlaceHolder()) ?>" value="<?php echo $esbc_user->USER_PW->EditValue ?>"<?php echo $esbc_user->USER_PW->editAttributes() ?>>
</span>
<?php echo $esbc_user->USER_PW->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($esbc_user->USER_EMAIL->Visible) { // USER_EMAIL ?>
	<div id="r_USER_EMAIL" class="form-group row">
		<label id="elh_esbc_user_USER_EMAIL" for="x_USER_EMAIL" class="<?php echo $esbc_user_add->LeftColumnClass ?>"><?php echo $esbc_user->USER_EMAIL->caption() ?><?php echo ($esbc_user->USER_EMAIL->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $esbc_user_add->RightColumnClass ?>"><div<?php echo $esbc_user->USER_EMAIL->cellAttributes() ?>>
<span id="el_esbc_user_USER_EMAIL">
<input type="text" data-table="esbc_user" data-field="x_USER_EMAIL" name="x_USER_EMAIL" id="x_USER_EMAIL" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($esbc_user->USER_EMAIL->getPlaceHolder()) ?>" value="<?php echo $esbc_user->USER_EMAIL->EditValue ?>"<?php echo $esbc_user->USER_EMAIL->editAttributes() ?>>
</span>
<?php echo $esbc_user->USER_EMAIL->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($esbc_user->USER_LEVEL->Visible) { // USER_LEVEL ?>
	<div id="r_USER_LEVEL" class="form-group row">
		<label id="elh_esbc_user_USER_LEVEL" for="x_USER_LEVEL" class="<?php echo $esbc_user_add->LeftColumnClass ?>"><?php echo $esbc_user->USER_LEVEL->caption() ?><?php echo ($esbc_user->USER_LEVEL->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $esbc_user_add->RightColumnClass ?>"><div<?php echo $esbc_user->USER_LEVEL->cellAttributes() ?>>
<span id="el_esbc_user_USER_LEVEL">
<input type="text" data-table="esbc_user" data-field="x_USER_LEVEL" name="x_USER_LEVEL" id="x_USER_LEVEL" size="30" placeholder="<?php echo HtmlEncode($esbc_user->USER_LEVEL->getPlaceHolder()) ?>" value="<?php echo $esbc_user->USER_LEVEL->EditValue ?>"<?php echo $esbc_user->USER_LEVEL->editAttributes() ?>>
</span>
<?php echo $esbc_user->USER_LEVEL->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($esbc_user->Create_Date->Visible) { // Create_Date ?>
	<div id="r_Create_Date" class="form-group row">
		<label id="elh_esbc_user_Create_Date" for="x_Create_Date" class="<?php echo $esbc_user_add->LeftColumnClass ?>"><?php echo $esbc_user->Create_Date->caption() ?><?php echo ($esbc_user->Create_Date->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $esbc_user_add->RightColumnClass ?>"><div<?php echo $esbc_user->Create_Date->cellAttributes() ?>>
<span id="el_esbc_user_Create_Date">
<input type="text" data-table="esbc_user" data-field="x_Create_Date" data-format="1" name="x_Create_Date" id="x_Create_Date" placeholder="<?php echo HtmlEncode($esbc_user->Create_Date->getPlaceHolder()) ?>" value="<?php echo $esbc_user->Create_Date->EditValue ?>"<?php echo $esbc_user->Create_Date->editAttributes() ?>>
<?php if (!$esbc_user->Create_Date->ReadOnly && !$esbc_user->Create_Date->Disabled && !isset($esbc_user->Create_Date->EditAttrs["readonly"]) && !isset($esbc_user->Create_Date->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fesbc_useradd", "x_Create_Date", {"ignoreReadonly":true,"useCurrent":false,"format":1});
</script>
<?php } ?>
</span>
<?php echo $esbc_user->Create_Date->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$esbc_user_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $esbc_user_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $esbc_user_add->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$esbc_user_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$esbc_user_add->terminate();
?>
