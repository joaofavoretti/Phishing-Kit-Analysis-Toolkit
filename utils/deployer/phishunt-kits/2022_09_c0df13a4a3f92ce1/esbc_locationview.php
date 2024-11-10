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
$esbc_location_view = new esbc_location_view();

// Run the page
$esbc_location_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$esbc_location_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$esbc_location->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fesbc_locationview = currentForm = new ew.Form("fesbc_locationview", "view");

// Form_CustomValidate event
fesbc_locationview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fesbc_locationview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$esbc_location->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $esbc_location_view->ExportOptions->render("body") ?>
<?php
	foreach ($esbc_location_view->OtherOptions as &$option)
		$option->render("body");
?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $esbc_location_view->showPageHeader(); ?>
<?php
$esbc_location_view->showMessage();
?>
<form name="fesbc_locationview" id="fesbc_locationview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($esbc_location_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $esbc_location_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="esbc_location">
<input type="hidden" name="modal" value="<?php echo (int)$esbc_location_view->IsModal ?>">
<table class="table ew-view-table">
<?php if ($esbc_location->L_index->Visible) { // L_index ?>
	<tr id="r_L_index">
		<td class="<?php echo $esbc_location_view->TableLeftColumnClass ?>"><span id="elh_esbc_location_L_index"><?php echo $esbc_location->L_index->caption() ?></span></td>
		<td data-name="L_index"<?php echo $esbc_location->L_index->cellAttributes() ?>>
<span id="el_esbc_location_L_index">
<span<?php echo $esbc_location->L_index->viewAttributes() ?>>
<?php echo $esbc_location->L_index->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($esbc_location->VPS->Visible) { // VPS ?>
	<tr id="r_VPS">
		<td class="<?php echo $esbc_location_view->TableLeftColumnClass ?>"><span id="elh_esbc_location_VPS"><?php echo $esbc_location->VPS->caption() ?></span></td>
		<td data-name="VPS"<?php echo $esbc_location->VPS->cellAttributes() ?>>
<span id="el_esbc_location_VPS">
<span<?php echo $esbc_location->VPS->viewAttributes() ?>>
<?php echo $esbc_location->VPS->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($esbc_location->VPS_URL->Visible) { // VPS_URL ?>
	<tr id="r_VPS_URL">
		<td class="<?php echo $esbc_location_view->TableLeftColumnClass ?>"><span id="elh_esbc_location_VPS_URL"><?php echo $esbc_location->VPS_URL->caption() ?></span></td>
		<td data-name="VPS_URL"<?php echo $esbc_location->VPS_URL->cellAttributes() ?>>
<span id="el_esbc_location_VPS_URL">
<span<?php echo $esbc_location->VPS_URL->viewAttributes() ?>>
<?php echo $esbc_location->VPS_URL->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($esbc_location->L_Name->Visible) { // L_Name ?>
	<tr id="r_L_Name">
		<td class="<?php echo $esbc_location_view->TableLeftColumnClass ?>"><span id="elh_esbc_location_L_Name"><?php echo $esbc_location->L_Name->caption() ?></span></td>
		<td data-name="L_Name"<?php echo $esbc_location->L_Name->cellAttributes() ?>>
<span id="el_esbc_location_L_Name">
<span<?php echo $esbc_location->L_Name->viewAttributes() ?>>
<?php echo $esbc_location->L_Name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($esbc_location->L_Lat->Visible) { // L_Lat ?>
	<tr id="r_L_Lat">
		<td class="<?php echo $esbc_location_view->TableLeftColumnClass ?>"><span id="elh_esbc_location_L_Lat"><?php echo $esbc_location->L_Lat->caption() ?></span></td>
		<td data-name="L_Lat"<?php echo $esbc_location->L_Lat->cellAttributes() ?>>
<span id="el_esbc_location_L_Lat">
<span<?php echo $esbc_location->L_Lat->viewAttributes() ?>>
<?php echo $esbc_location->L_Lat->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($esbc_location->L_Lon->Visible) { // L_Lon ?>
	<tr id="r_L_Lon">
		<td class="<?php echo $esbc_location_view->TableLeftColumnClass ?>"><span id="elh_esbc_location_L_Lon"><?php echo $esbc_location->L_Lon->caption() ?></span></td>
		<td data-name="L_Lon"<?php echo $esbc_location->L_Lon->cellAttributes() ?>>
<span id="el_esbc_location_L_Lon">
<span<?php echo $esbc_location->L_Lon->viewAttributes() ?>>
<?php echo $esbc_location->L_Lon->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($esbc_location->Create_Date->Visible) { // Create_Date ?>
	<tr id="r_Create_Date">
		<td class="<?php echo $esbc_location_view->TableLeftColumnClass ?>"><span id="elh_esbc_location_Create_Date"><?php echo $esbc_location->Create_Date->caption() ?></span></td>
		<td data-name="Create_Date"<?php echo $esbc_location->Create_Date->cellAttributes() ?>>
<span id="el_esbc_location_Create_Date">
<span<?php echo $esbc_location->Create_Date->viewAttributes() ?>>
<?php echo $esbc_location->Create_Date->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
<?php if (!$esbc_location_view->IsModal) { ?>
<?php if (!$esbc_location->isExport()) { ?>
<?php if (!isset($esbc_location_view->Pager)) $esbc_location_view->Pager = new PrevNextPager($esbc_location_view->StartRec, $esbc_location_view->DisplayRecs, $esbc_location_view->TotalRecs, $esbc_location_view->AutoHidePager) ?>
<?php if ($esbc_location_view->Pager->RecordCount > 0 && $esbc_location_view->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($esbc_location_view->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" href="<?php echo $esbc_location_view->pageUrl() ?>start=<?php echo $esbc_location_view->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($esbc_location_view->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" href="<?php echo $esbc_location_view->pageUrl() ?>start=<?php echo $esbc_location_view->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $esbc_location_view->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($esbc_location_view->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" href="<?php echo $esbc_location_view->pageUrl() ?>start=<?php echo $esbc_location_view->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($esbc_location_view->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" href="<?php echo $esbc_location_view->pageUrl() ?>start=<?php echo $esbc_location_view->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $esbc_location_view->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<div class="clearfix"></div>
<?php } ?>
<?php } ?>
</form>
<?php
$esbc_location_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$esbc_location->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$esbc_location_view->terminate();
?>
