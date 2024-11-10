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
$basic_acc_view = new basic_acc_view();

// Run the page
$basic_acc_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$basic_acc_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$basic_acc->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fbasic_accview = currentForm = new ew.Form("fbasic_accview", "view");

// Form_CustomValidate event
fbasic_accview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fbasic_accview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fbasic_accview.lists["x_type"] = <?php echo $basic_acc_view->type->Lookup->toClientList() ?>;
fbasic_accview.lists["x_type"].options = <?php echo JsonEncode($basic_acc_view->type->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$basic_acc->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $basic_acc_view->ExportOptions->render("body") ?>
<?php
	foreach ($basic_acc_view->OtherOptions as &$option)
		$option->render("body");
?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $basic_acc_view->showPageHeader(); ?>
<?php
$basic_acc_view->showMessage();
?>
<form name="fbasic_accview" id="fbasic_accview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($basic_acc_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $basic_acc_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="basic_acc">
<input type="hidden" name="modal" value="<?php echo (int)$basic_acc_view->IsModal ?>">
<table class="table ew-view-table">
<?php if ($basic_acc->acc_addr->Visible) { // acc_addr ?>
	<tr id="r_acc_addr">
		<td class="<?php echo $basic_acc_view->TableLeftColumnClass ?>"><span id="elh_basic_acc_acc_addr"><?php echo $basic_acc->acc_addr->caption() ?></span></td>
		<td data-name="acc_addr"<?php echo $basic_acc->acc_addr->cellAttributes() ?>>
<span id="el_basic_acc_acc_addr">
<span<?php echo $basic_acc->acc_addr->viewAttributes() ?>>
<?php echo $basic_acc->acc_addr->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($basic_acc->acc_name->Visible) { // acc_name ?>
	<tr id="r_acc_name">
		<td class="<?php echo $basic_acc_view->TableLeftColumnClass ?>"><span id="elh_basic_acc_acc_name"><?php echo $basic_acc->acc_name->caption() ?></span></td>
		<td data-name="acc_name"<?php echo $basic_acc->acc_name->cellAttributes() ?>>
<span id="el_basic_acc_acc_name">
<span<?php echo $basic_acc->acc_name->viewAttributes() ?>>
<?php echo $basic_acc->acc_name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($basic_acc->type->Visible) { // type ?>
	<tr id="r_type">
		<td class="<?php echo $basic_acc_view->TableLeftColumnClass ?>"><span id="elh_basic_acc_type"><?php echo $basic_acc->type->caption() ?></span></td>
		<td data-name="type"<?php echo $basic_acc->type->cellAttributes() ?>>
<span id="el_basic_acc_type">
<span<?php echo $basic_acc->type->viewAttributes() ?>>
<?php echo $basic_acc->type->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($basic_acc->balance->Visible) { // balance ?>
	<tr id="r_balance">
		<td class="<?php echo $basic_acc_view->TableLeftColumnClass ?>"><span id="elh_basic_acc_balance"><?php echo $basic_acc->balance->caption() ?></span></td>
		<td data-name="balance"<?php echo $basic_acc->balance->cellAttributes() ?>>
<span id="el_basic_acc_balance">
<span<?php echo $basic_acc->balance->viewAttributes() ?>>
<?php echo $basic_acc->balance->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($basic_acc->txcount->Visible) { // txcount ?>
	<tr id="r_txcount">
		<td class="<?php echo $basic_acc_view->TableLeftColumnClass ?>"><span id="elh_basic_acc_txcount"><?php echo $basic_acc->txcount->caption() ?></span></td>
		<td data-name="txcount"<?php echo $basic_acc->txcount->cellAttributes() ?>>
<span id="el_basic_acc_txcount">
<span<?php echo $basic_acc->txcount->viewAttributes() ?>>
<?php echo $basic_acc->txcount->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($basic_acc->dateadd->Visible) { // dateadd ?>
	<tr id="r_dateadd">
		<td class="<?php echo $basic_acc_view->TableLeftColumnClass ?>"><span id="elh_basic_acc_dateadd"><?php echo $basic_acc->dateadd->caption() ?></span></td>
		<td data-name="dateadd"<?php echo $basic_acc->dateadd->cellAttributes() ?>>
<span id="el_basic_acc_dateadd">
<span<?php echo $basic_acc->dateadd->viewAttributes() ?>>
<?php echo $basic_acc->dateadd->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
<?php if (!$basic_acc_view->IsModal) { ?>
<?php if (!$basic_acc->isExport()) { ?>
<?php if (!isset($basic_acc_view->Pager)) $basic_acc_view->Pager = new PrevNextPager($basic_acc_view->StartRec, $basic_acc_view->DisplayRecs, $basic_acc_view->TotalRecs, $basic_acc_view->AutoHidePager) ?>
<?php if ($basic_acc_view->Pager->RecordCount > 0 && $basic_acc_view->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($basic_acc_view->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" href="<?php echo $basic_acc_view->pageUrl() ?>start=<?php echo $basic_acc_view->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($basic_acc_view->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" href="<?php echo $basic_acc_view->pageUrl() ?>start=<?php echo $basic_acc_view->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $basic_acc_view->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($basic_acc_view->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" href="<?php echo $basic_acc_view->pageUrl() ?>start=<?php echo $basic_acc_view->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($basic_acc_view->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" href="<?php echo $basic_acc_view->pageUrl() ?>start=<?php echo $basic_acc_view->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $basic_acc_view->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<div class="clearfix"></div>
<?php } ?>
<?php } ?>
</form>
<?php
$basic_acc_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$basic_acc->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$basic_acc_view->terminate();
?>
