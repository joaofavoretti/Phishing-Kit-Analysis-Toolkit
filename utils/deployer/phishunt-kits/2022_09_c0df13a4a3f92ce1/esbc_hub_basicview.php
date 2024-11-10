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
$esbc_hub_basic_view = new esbc_hub_basic_view();

// Run the page
$esbc_hub_basic_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$esbc_hub_basic_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$esbc_hub_basic->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fesbc_hub_basicview = currentForm = new ew.Form("fesbc_hub_basicview", "view");

// Form_CustomValidate event
fesbc_hub_basicview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fesbc_hub_basicview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fesbc_hub_basicview.lists["x_HOST_INDEX"] = <?php echo $esbc_hub_basic_view->HOST_INDEX->Lookup->toClientList() ?>;
fesbc_hub_basicview.lists["x_HOST_INDEX"].options = <?php echo JsonEncode($esbc_hub_basic_view->HOST_INDEX->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$esbc_hub_basic->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $esbc_hub_basic_view->ExportOptions->render("body") ?>
<?php
	foreach ($esbc_hub_basic_view->OtherOptions as &$option)
		$option->render("body");
?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $esbc_hub_basic_view->showPageHeader(); ?>
<?php
$esbc_hub_basic_view->showMessage();
?>
<form name="fesbc_hub_basicview" id="fesbc_hub_basicview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($esbc_hub_basic_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $esbc_hub_basic_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="esbc_hub_basic">
<input type="hidden" name="modal" value="<?php echo (int)$esbc_hub_basic_view->IsModal ?>">
<table class="table ew-view-table">
<?php if ($esbc_hub_basic->HUB_INDEX->Visible) { // HUB_INDEX ?>
	<tr id="r_HUB_INDEX">
		<td class="<?php echo $esbc_hub_basic_view->TableLeftColumnClass ?>"><span id="elh_esbc_hub_basic_HUB_INDEX"><?php echo $esbc_hub_basic->HUB_INDEX->caption() ?></span></td>
		<td data-name="HUB_INDEX"<?php echo $esbc_hub_basic->HUB_INDEX->cellAttributes() ?>>
<span id="el_esbc_hub_basic_HUB_INDEX">
<span<?php echo $esbc_hub_basic->HUB_INDEX->viewAttributes() ?>>
<?php echo $esbc_hub_basic->HUB_INDEX->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($esbc_hub_basic->HOST_INDEX->Visible) { // HOST_INDEX ?>
	<tr id="r_HOST_INDEX">
		<td class="<?php echo $esbc_hub_basic_view->TableLeftColumnClass ?>"><span id="elh_esbc_hub_basic_HOST_INDEX"><?php echo $esbc_hub_basic->HOST_INDEX->caption() ?></span></td>
		<td data-name="HOST_INDEX"<?php echo $esbc_hub_basic->HOST_INDEX->cellAttributes() ?>>
<span id="el_esbc_hub_basic_HOST_INDEX">
<span<?php echo $esbc_hub_basic->HOST_INDEX->viewAttributes() ?>>
<?php echo $esbc_hub_basic->HOST_INDEX->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($esbc_hub_basic->HUB_NAME->Visible) { // HUB_NAME ?>
	<tr id="r_HUB_NAME">
		<td class="<?php echo $esbc_hub_basic_view->TableLeftColumnClass ?>"><span id="elh_esbc_hub_basic_HUB_NAME"><?php echo $esbc_hub_basic->HUB_NAME->caption() ?></span></td>
		<td data-name="HUB_NAME"<?php echo $esbc_hub_basic->HUB_NAME->cellAttributes() ?>>
<span id="el_esbc_hub_basic_HUB_NAME">
<span<?php echo $esbc_hub_basic->HUB_NAME->viewAttributes() ?>>
<?php echo $esbc_hub_basic->HUB_NAME->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($esbc_hub_basic->GENESIS->Visible) { // GENESIS ?>
	<tr id="r_GENESIS">
		<td class="<?php echo $esbc_hub_basic_view->TableLeftColumnClass ?>"><span id="elh_esbc_hub_basic_GENESIS"><?php echo $esbc_hub_basic->GENESIS->caption() ?></span></td>
		<td data-name="GENESIS"<?php echo $esbc_hub_basic->GENESIS->cellAttributes() ?>>
<span id="el_esbc_hub_basic_GENESIS">
<span<?php echo $esbc_hub_basic->GENESIS->viewAttributes() ?>>
<?php echo $esbc_hub_basic->GENESIS->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($esbc_hub_basic->GENESIS_FILE->Visible) { // GENESIS_FILE ?>
	<tr id="r_GENESIS_FILE">
		<td class="<?php echo $esbc_hub_basic_view->TableLeftColumnClass ?>"><span id="elh_esbc_hub_basic_GENESIS_FILE"><?php echo $esbc_hub_basic->GENESIS_FILE->caption() ?></span></td>
		<td data-name="GENESIS_FILE"<?php echo $esbc_hub_basic->GENESIS_FILE->cellAttributes() ?>>
<span id="el_esbc_hub_basic_GENESIS_FILE">
<span<?php echo $esbc_hub_basic->GENESIS_FILE->viewAttributes() ?>>
<?php echo $esbc_hub_basic->GENESIS_FILE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($esbc_hub_basic->Create_Date->Visible) { // Create_Date ?>
	<tr id="r_Create_Date">
		<td class="<?php echo $esbc_hub_basic_view->TableLeftColumnClass ?>"><span id="elh_esbc_hub_basic_Create_Date"><?php echo $esbc_hub_basic->Create_Date->caption() ?></span></td>
		<td data-name="Create_Date"<?php echo $esbc_hub_basic->Create_Date->cellAttributes() ?>>
<span id="el_esbc_hub_basic_Create_Date">
<span<?php echo $esbc_hub_basic->Create_Date->viewAttributes() ?>>
<?php echo $esbc_hub_basic->Create_Date->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
<?php if (!$esbc_hub_basic_view->IsModal) { ?>
<?php if (!$esbc_hub_basic->isExport()) { ?>
<?php if (!isset($esbc_hub_basic_view->Pager)) $esbc_hub_basic_view->Pager = new PrevNextPager($esbc_hub_basic_view->StartRec, $esbc_hub_basic_view->DisplayRecs, $esbc_hub_basic_view->TotalRecs, $esbc_hub_basic_view->AutoHidePager) ?>
<?php if ($esbc_hub_basic_view->Pager->RecordCount > 0 && $esbc_hub_basic_view->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($esbc_hub_basic_view->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" href="<?php echo $esbc_hub_basic_view->pageUrl() ?>start=<?php echo $esbc_hub_basic_view->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($esbc_hub_basic_view->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" href="<?php echo $esbc_hub_basic_view->pageUrl() ?>start=<?php echo $esbc_hub_basic_view->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $esbc_hub_basic_view->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($esbc_hub_basic_view->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" href="<?php echo $esbc_hub_basic_view->pageUrl() ?>start=<?php echo $esbc_hub_basic_view->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($esbc_hub_basic_view->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" href="<?php echo $esbc_hub_basic_view->pageUrl() ?>start=<?php echo $esbc_hub_basic_view->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $esbc_hub_basic_view->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<div class="clearfix"></div>
<?php } ?>
<?php } ?>
</form>
<?php
$esbc_hub_basic_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$esbc_hub_basic->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$esbc_hub_basic_view->terminate();
?>
