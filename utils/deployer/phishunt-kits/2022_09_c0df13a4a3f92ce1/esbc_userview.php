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
$esbc_user_view = new esbc_user_view();

// Run the page
$esbc_user_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$esbc_user_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$esbc_user->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fesbc_userview = currentForm = new ew.Form("fesbc_userview", "view");

// Form_CustomValidate event
fesbc_userview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fesbc_userview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$esbc_user->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $esbc_user_view->ExportOptions->render("body") ?>
<?php
	foreach ($esbc_user_view->OtherOptions as &$option)
		$option->render("body");
?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $esbc_user_view->showPageHeader(); ?>
<?php
$esbc_user_view->showMessage();
?>
<form name="fesbc_userview" id="fesbc_userview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($esbc_user_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $esbc_user_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="esbc_user">
<input type="hidden" name="modal" value="<?php echo (int)$esbc_user_view->IsModal ?>">
<table class="table ew-view-table">
<?php if ($esbc_user->USER_INDEX->Visible) { // USER_INDEX ?>
	<tr id="r_USER_INDEX">
		<td class="<?php echo $esbc_user_view->TableLeftColumnClass ?>"><span id="elh_esbc_user_USER_INDEX"><?php echo $esbc_user->USER_INDEX->caption() ?></span></td>
		<td data-name="USER_INDEX"<?php echo $esbc_user->USER_INDEX->cellAttributes() ?>>
<span id="el_esbc_user_USER_INDEX">
<span<?php echo $esbc_user->USER_INDEX->viewAttributes() ?>>
<?php echo $esbc_user->USER_INDEX->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($esbc_user->USER_NAME->Visible) { // USER_NAME ?>
	<tr id="r_USER_NAME">
		<td class="<?php echo $esbc_user_view->TableLeftColumnClass ?>"><span id="elh_esbc_user_USER_NAME"><?php echo $esbc_user->USER_NAME->caption() ?></span></td>
		<td data-name="USER_NAME"<?php echo $esbc_user->USER_NAME->cellAttributes() ?>>
<span id="el_esbc_user_USER_NAME">
<span<?php echo $esbc_user->USER_NAME->viewAttributes() ?>>
<?php echo $esbc_user->USER_NAME->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($esbc_user->USER_PW->Visible) { // USER_PW ?>
	<tr id="r_USER_PW">
		<td class="<?php echo $esbc_user_view->TableLeftColumnClass ?>"><span id="elh_esbc_user_USER_PW"><?php echo $esbc_user->USER_PW->caption() ?></span></td>
		<td data-name="USER_PW"<?php echo $esbc_user->USER_PW->cellAttributes() ?>>
<span id="el_esbc_user_USER_PW">
<span<?php echo $esbc_user->USER_PW->viewAttributes() ?>>
<?php echo $esbc_user->USER_PW->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($esbc_user->USER_EMAIL->Visible) { // USER_EMAIL ?>
	<tr id="r_USER_EMAIL">
		<td class="<?php echo $esbc_user_view->TableLeftColumnClass ?>"><span id="elh_esbc_user_USER_EMAIL"><?php echo $esbc_user->USER_EMAIL->caption() ?></span></td>
		<td data-name="USER_EMAIL"<?php echo $esbc_user->USER_EMAIL->cellAttributes() ?>>
<span id="el_esbc_user_USER_EMAIL">
<span<?php echo $esbc_user->USER_EMAIL->viewAttributes() ?>>
<?php echo $esbc_user->USER_EMAIL->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($esbc_user->USER_LEVEL->Visible) { // USER_LEVEL ?>
	<tr id="r_USER_LEVEL">
		<td class="<?php echo $esbc_user_view->TableLeftColumnClass ?>"><span id="elh_esbc_user_USER_LEVEL"><?php echo $esbc_user->USER_LEVEL->caption() ?></span></td>
		<td data-name="USER_LEVEL"<?php echo $esbc_user->USER_LEVEL->cellAttributes() ?>>
<span id="el_esbc_user_USER_LEVEL">
<span<?php echo $esbc_user->USER_LEVEL->viewAttributes() ?>>
<?php echo $esbc_user->USER_LEVEL->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($esbc_user->Create_Date->Visible) { // Create_Date ?>
	<tr id="r_Create_Date">
		<td class="<?php echo $esbc_user_view->TableLeftColumnClass ?>"><span id="elh_esbc_user_Create_Date"><?php echo $esbc_user->Create_Date->caption() ?></span></td>
		<td data-name="Create_Date"<?php echo $esbc_user->Create_Date->cellAttributes() ?>>
<span id="el_esbc_user_Create_Date">
<span<?php echo $esbc_user->Create_Date->viewAttributes() ?>>
<?php echo $esbc_user->Create_Date->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
<?php if (!$esbc_user_view->IsModal) { ?>
<?php if (!$esbc_user->isExport()) { ?>
<?php if (!isset($esbc_user_view->Pager)) $esbc_user_view->Pager = new PrevNextPager($esbc_user_view->StartRec, $esbc_user_view->DisplayRecs, $esbc_user_view->TotalRecs, $esbc_user_view->AutoHidePager) ?>
<?php if ($esbc_user_view->Pager->RecordCount > 0 && $esbc_user_view->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($esbc_user_view->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" href="<?php echo $esbc_user_view->pageUrl() ?>start=<?php echo $esbc_user_view->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($esbc_user_view->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" href="<?php echo $esbc_user_view->pageUrl() ?>start=<?php echo $esbc_user_view->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $esbc_user_view->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($esbc_user_view->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" href="<?php echo $esbc_user_view->pageUrl() ?>start=<?php echo $esbc_user_view->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($esbc_user_view->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" href="<?php echo $esbc_user_view->pageUrl() ?>start=<?php echo $esbc_user_view->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $esbc_user_view->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<div class="clearfix"></div>
<?php } ?>
<?php } ?>
</form>
<?php
$esbc_user_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$esbc_user->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$esbc_user_view->terminate();
?>
