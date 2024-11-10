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
$esbc_contract_view = new esbc_contract_view();

// Run the page
$esbc_contract_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$esbc_contract_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$esbc_contract->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fesbc_contractview = currentForm = new ew.Form("fesbc_contractview", "view");

// Form_CustomValidate event
fesbc_contractview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fesbc_contractview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$esbc_contract->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $esbc_contract_view->ExportOptions->render("body") ?>
<?php
	foreach ($esbc_contract_view->OtherOptions as &$option)
		$option->render("body");
?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $esbc_contract_view->showPageHeader(); ?>
<?php
$esbc_contract_view->showMessage();
?>
<form name="fesbc_contractview" id="fesbc_contractview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($esbc_contract_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $esbc_contract_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="esbc_contract">
<input type="hidden" name="modal" value="<?php echo (int)$esbc_contract_view->IsModal ?>">
<table class="table ew-view-table">
<?php if ($esbc_contract->con_addr->Visible) { // con_addr ?>
	<tr id="r_con_addr">
		<td class="<?php echo $esbc_contract_view->TableLeftColumnClass ?>"><span id="elh_esbc_contract_con_addr"><?php echo $esbc_contract->con_addr->caption() ?></span></td>
		<td data-name="con_addr"<?php echo $esbc_contract->con_addr->cellAttributes() ?>>
<span id="el_esbc_contract_con_addr">
<span<?php echo $esbc_contract->con_addr->viewAttributes() ?>>
<?php echo $esbc_contract->con_addr->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($esbc_contract->con_owner->Visible) { // con_owner ?>
	<tr id="r_con_owner">
		<td class="<?php echo $esbc_contract_view->TableLeftColumnClass ?>"><span id="elh_esbc_contract_con_owner"><?php echo $esbc_contract->con_owner->caption() ?></span></td>
		<td data-name="con_owner"<?php echo $esbc_contract->con_owner->cellAttributes() ?>>
<span id="el_esbc_contract_con_owner">
<span<?php echo $esbc_contract->con_owner->viewAttributes() ?>>
<?php echo $esbc_contract->con_owner->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($esbc_contract->con_source->Visible) { // con_source ?>
	<tr id="r_con_source">
		<td class="<?php echo $esbc_contract_view->TableLeftColumnClass ?>"><span id="elh_esbc_contract_con_source"><?php echo $esbc_contract->con_source->caption() ?></span></td>
		<td data-name="con_source"<?php echo $esbc_contract->con_source->cellAttributes() ?>>
<span id="el_esbc_contract_con_source">
<span<?php echo $esbc_contract->con_source->viewAttributes() ?>>
<?php echo $esbc_contract->con_source->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($esbc_contract->date_add->Visible) { // date_add ?>
	<tr id="r_date_add">
		<td class="<?php echo $esbc_contract_view->TableLeftColumnClass ?>"><span id="elh_esbc_contract_date_add"><?php echo $esbc_contract->date_add->caption() ?></span></td>
		<td data-name="date_add"<?php echo $esbc_contract->date_add->cellAttributes() ?>>
<span id="el_esbc_contract_date_add">
<span<?php echo $esbc_contract->date_add->viewAttributes() ?>>
<?php echo $esbc_contract->date_add->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
<?php if (!$esbc_contract_view->IsModal) { ?>
<?php if (!$esbc_contract->isExport()) { ?>
<?php if (!isset($esbc_contract_view->Pager)) $esbc_contract_view->Pager = new PrevNextPager($esbc_contract_view->StartRec, $esbc_contract_view->DisplayRecs, $esbc_contract_view->TotalRecs, $esbc_contract_view->AutoHidePager) ?>
<?php if ($esbc_contract_view->Pager->RecordCount > 0 && $esbc_contract_view->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($esbc_contract_view->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" href="<?php echo $esbc_contract_view->pageUrl() ?>start=<?php echo $esbc_contract_view->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($esbc_contract_view->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" href="<?php echo $esbc_contract_view->pageUrl() ?>start=<?php echo $esbc_contract_view->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $esbc_contract_view->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($esbc_contract_view->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" href="<?php echo $esbc_contract_view->pageUrl() ?>start=<?php echo $esbc_contract_view->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($esbc_contract_view->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" href="<?php echo $esbc_contract_view->pageUrl() ?>start=<?php echo $esbc_contract_view->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $esbc_contract_view->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<div class="clearfix"></div>
<?php } ?>
<?php } ?>
</form>
<?php
$esbc_contract_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$esbc_contract->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$esbc_contract_view->terminate();
?>
