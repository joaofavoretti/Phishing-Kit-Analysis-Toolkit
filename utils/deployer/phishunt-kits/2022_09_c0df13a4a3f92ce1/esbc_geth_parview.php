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
$esbc_geth_par_view = new esbc_geth_par_view();

// Run the page
$esbc_geth_par_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$esbc_geth_par_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$esbc_geth_par->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fesbc_geth_parview = currentForm = new ew.Form("fesbc_geth_parview", "view");

// Form_CustomValidate event
fesbc_geth_parview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fesbc_geth_parview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$esbc_geth_par->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $esbc_geth_par_view->ExportOptions->render("body") ?>
<?php
	foreach ($esbc_geth_par_view->OtherOptions as &$option)
		$option->render("body");
?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $esbc_geth_par_view->showPageHeader(); ?>
<?php
$esbc_geth_par_view->showMessage();
?>
<form name="fesbc_geth_parview" id="fesbc_geth_parview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($esbc_geth_par_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $esbc_geth_par_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="esbc_geth_par">
<input type="hidden" name="modal" value="<?php echo (int)$esbc_geth_par_view->IsModal ?>">
<table class="table ew-view-table">
<?php if ($esbc_geth_par->GETH_INDEX->Visible) { // GETH_INDEX ?>
	<tr id="r_GETH_INDEX">
		<td class="<?php echo $esbc_geth_par_view->TableLeftColumnClass ?>"><span id="elh_esbc_geth_par_GETH_INDEX"><?php echo $esbc_geth_par->GETH_INDEX->caption() ?></span></td>
		<td data-name="GETH_INDEX"<?php echo $esbc_geth_par->GETH_INDEX->cellAttributes() ?>>
<span id="el_esbc_geth_par_GETH_INDEX">
<span<?php echo $esbc_geth_par->GETH_INDEX->viewAttributes() ?>>
<?php echo $esbc_geth_par->GETH_INDEX->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($esbc_geth_par->HOST_TYPE->Visible) { // HOST_TYPE ?>
	<tr id="r_HOST_TYPE">
		<td class="<?php echo $esbc_geth_par_view->TableLeftColumnClass ?>"><span id="elh_esbc_geth_par_HOST_TYPE"><?php echo $esbc_geth_par->HOST_TYPE->caption() ?></span></td>
		<td data-name="HOST_TYPE"<?php echo $esbc_geth_par->HOST_TYPE->cellAttributes() ?>>
<span id="el_esbc_geth_par_HOST_TYPE">
<span<?php echo $esbc_geth_par->HOST_TYPE->viewAttributes() ?>>
<?php echo $esbc_geth_par->HOST_TYPE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($esbc_geth_par->GETH_PATH->Visible) { // GETH_PATH ?>
	<tr id="r_GETH_PATH">
		<td class="<?php echo $esbc_geth_par_view->TableLeftColumnClass ?>"><span id="elh_esbc_geth_par_GETH_PATH"><?php echo $esbc_geth_par->GETH_PATH->caption() ?></span></td>
		<td data-name="GETH_PATH"<?php echo $esbc_geth_par->GETH_PATH->cellAttributes() ?>>
<span id="el_esbc_geth_par_GETH_PATH">
<span<?php echo $esbc_geth_par->GETH_PATH->viewAttributes() ?>>
<?php echo $esbc_geth_par->GETH_PATH->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
<?php if (!$esbc_geth_par_view->IsModal) { ?>
<?php if (!$esbc_geth_par->isExport()) { ?>
<?php if (!isset($esbc_geth_par_view->Pager)) $esbc_geth_par_view->Pager = new PrevNextPager($esbc_geth_par_view->StartRec, $esbc_geth_par_view->DisplayRecs, $esbc_geth_par_view->TotalRecs, $esbc_geth_par_view->AutoHidePager) ?>
<?php if ($esbc_geth_par_view->Pager->RecordCount > 0 && $esbc_geth_par_view->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($esbc_geth_par_view->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" href="<?php echo $esbc_geth_par_view->pageUrl() ?>start=<?php echo $esbc_geth_par_view->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($esbc_geth_par_view->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" href="<?php echo $esbc_geth_par_view->pageUrl() ?>start=<?php echo $esbc_geth_par_view->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $esbc_geth_par_view->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($esbc_geth_par_view->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" href="<?php echo $esbc_geth_par_view->pageUrl() ?>start=<?php echo $esbc_geth_par_view->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($esbc_geth_par_view->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" href="<?php echo $esbc_geth_par_view->pageUrl() ?>start=<?php echo $esbc_geth_par_view->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $esbc_geth_par_view->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<div class="clearfix"></div>
<?php } ?>
<?php } ?>
</form>
<?php
$esbc_geth_par_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$esbc_geth_par->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$esbc_geth_par_view->terminate();
?>
