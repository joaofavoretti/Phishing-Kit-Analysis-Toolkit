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
$esbc_genesis_view = new esbc_genesis_view();

// Run the page
$esbc_genesis_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$esbc_genesis_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$esbc_genesis->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fesbc_genesisview = currentForm = new ew.Form("fesbc_genesisview", "view");

// Form_CustomValidate event
fesbc_genesisview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fesbc_genesisview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$esbc_genesis->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $esbc_genesis_view->ExportOptions->render("body") ?>
<?php
	foreach ($esbc_genesis_view->OtherOptions as &$option)
		$option->render("body");
?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $esbc_genesis_view->showPageHeader(); ?>
<?php
$esbc_genesis_view->showMessage();
?>
<form name="fesbc_genesisview" id="fesbc_genesisview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($esbc_genesis_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $esbc_genesis_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="esbc_genesis">
<input type="hidden" name="modal" value="<?php echo (int)$esbc_genesis_view->IsModal ?>">
<table class="table ew-view-table">
<?php if ($esbc_genesis->GENESIS_INDEX->Visible) { // GENESIS_INDEX ?>
	<tr id="r_GENESIS_INDEX">
		<td class="<?php echo $esbc_genesis_view->TableLeftColumnClass ?>"><span id="elh_esbc_genesis_GENESIS_INDEX"><?php echo $esbc_genesis->GENESIS_INDEX->caption() ?></span></td>
		<td data-name="GENESIS_INDEX"<?php echo $esbc_genesis->GENESIS_INDEX->cellAttributes() ?>>
<span id="el_esbc_genesis_GENESIS_INDEX">
<span<?php echo $esbc_genesis->GENESIS_INDEX->viewAttributes() ?>>
<?php echo $esbc_genesis->GENESIS_INDEX->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($esbc_genesis->GENESIS_NAME->Visible) { // GENESIS_NAME ?>
	<tr id="r_GENESIS_NAME">
		<td class="<?php echo $esbc_genesis_view->TableLeftColumnClass ?>"><span id="elh_esbc_genesis_GENESIS_NAME"><?php echo $esbc_genesis->GENESIS_NAME->caption() ?></span></td>
		<td data-name="GENESIS_NAME"<?php echo $esbc_genesis->GENESIS_NAME->cellAttributes() ?>>
<span id="el_esbc_genesis_GENESIS_NAME">
<span<?php echo $esbc_genesis->GENESIS_NAME->viewAttributes() ?>>
<?php echo $esbc_genesis->GENESIS_NAME->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($esbc_genesis->GENESIS_TEXT->Visible) { // GENESIS_TEXT ?>
	<tr id="r_GENESIS_TEXT">
		<td class="<?php echo $esbc_genesis_view->TableLeftColumnClass ?>"><span id="elh_esbc_genesis_GENESIS_TEXT"><?php echo $esbc_genesis->GENESIS_TEXT->caption() ?></span></td>
		<td data-name="GENESIS_TEXT"<?php echo $esbc_genesis->GENESIS_TEXT->cellAttributes() ?>>
<span id="el_esbc_genesis_GENESIS_TEXT">
<span<?php echo $esbc_genesis->GENESIS_TEXT->viewAttributes() ?>>
<?php echo $esbc_genesis->GENESIS_TEXT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($esbc_genesis->Create_Date->Visible) { // Create_Date ?>
	<tr id="r_Create_Date">
		<td class="<?php echo $esbc_genesis_view->TableLeftColumnClass ?>"><span id="elh_esbc_genesis_Create_Date"><?php echo $esbc_genesis->Create_Date->caption() ?></span></td>
		<td data-name="Create_Date"<?php echo $esbc_genesis->Create_Date->cellAttributes() ?>>
<span id="el_esbc_genesis_Create_Date">
<span<?php echo $esbc_genesis->Create_Date->viewAttributes() ?>>
<?php echo $esbc_genesis->Create_Date->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
<?php if (!$esbc_genesis_view->IsModal) { ?>
<?php if (!$esbc_genesis->isExport()) { ?>
<?php if (!isset($esbc_genesis_view->Pager)) $esbc_genesis_view->Pager = new PrevNextPager($esbc_genesis_view->StartRec, $esbc_genesis_view->DisplayRecs, $esbc_genesis_view->TotalRecs, $esbc_genesis_view->AutoHidePager) ?>
<?php if ($esbc_genesis_view->Pager->RecordCount > 0 && $esbc_genesis_view->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($esbc_genesis_view->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" href="<?php echo $esbc_genesis_view->pageUrl() ?>start=<?php echo $esbc_genesis_view->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($esbc_genesis_view->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" href="<?php echo $esbc_genesis_view->pageUrl() ?>start=<?php echo $esbc_genesis_view->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $esbc_genesis_view->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($esbc_genesis_view->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" href="<?php echo $esbc_genesis_view->pageUrl() ?>start=<?php echo $esbc_genesis_view->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($esbc_genesis_view->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" href="<?php echo $esbc_genesis_view->pageUrl() ?>start=<?php echo $esbc_genesis_view->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $esbc_genesis_view->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<div class="clearfix"></div>
<?php } ?>
<?php } ?>
</form>
<?php
$esbc_genesis_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$esbc_genesis->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$esbc_genesis_view->terminate();
?>
