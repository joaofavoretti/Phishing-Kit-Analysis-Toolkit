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
$basic_token_view = new basic_token_view();

// Run the page
$basic_token_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$basic_token_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$basic_token->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fbasic_tokenview = currentForm = new ew.Form("fbasic_tokenview", "view");

// Form_CustomValidate event
fbasic_tokenview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fbasic_tokenview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fbasic_tokenview.lists["x_type"] = <?php echo $basic_token_view->type->Lookup->toClientList() ?>;
fbasic_tokenview.lists["x_type"].options = <?php echo JsonEncode($basic_token_view->type->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$basic_token->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $basic_token_view->ExportOptions->render("body") ?>
<?php
	foreach ($basic_token_view->OtherOptions as &$option)
		$option->render("body");
?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $basic_token_view->showPageHeader(); ?>
<?php
$basic_token_view->showMessage();
?>
<form name="fbasic_tokenview" id="fbasic_tokenview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($basic_token_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $basic_token_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="basic_token">
<input type="hidden" name="modal" value="<?php echo (int)$basic_token_view->IsModal ?>">
<table class="table ew-view-table">
<?php if ($basic_token->Rindex->Visible) { // Rindex ?>
	<tr id="r_Rindex">
		<td class="<?php echo $basic_token_view->TableLeftColumnClass ?>"><span id="elh_basic_token_Rindex"><?php echo $basic_token->Rindex->caption() ?></span></td>
		<td data-name="Rindex"<?php echo $basic_token->Rindex->cellAttributes() ?>>
<span id="el_basic_token_Rindex">
<span<?php echo $basic_token->Rindex->viewAttributes() ?>>
<?php echo $basic_token->Rindex->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($basic_token->type->Visible) { // type ?>
	<tr id="r_type">
		<td class="<?php echo $basic_token_view->TableLeftColumnClass ?>"><span id="elh_basic_token_type"><?php echo $basic_token->type->caption() ?></span></td>
		<td data-name="type"<?php echo $basic_token->type->cellAttributes() ?>>
<span id="el_basic_token_type">
<span<?php echo $basic_token->type->viewAttributes() ?>>
<?php echo $basic_token->type->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($basic_token->name->Visible) { // name ?>
	<tr id="r_name">
		<td class="<?php echo $basic_token_view->TableLeftColumnClass ?>"><span id="elh_basic_token_name"><?php echo $basic_token->name->caption() ?></span></td>
		<td data-name="name"<?php echo $basic_token->name->cellAttributes() ?>>
<span id="el_basic_token_name">
<span<?php echo $basic_token->name->viewAttributes() ?>>
<?php echo $basic_token->name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($basic_token->symble->Visible) { // symble ?>
	<tr id="r_symble">
		<td class="<?php echo $basic_token_view->TableLeftColumnClass ?>"><span id="elh_basic_token_symble"><?php echo $basic_token->symble->caption() ?></span></td>
		<td data-name="symble"<?php echo $basic_token->symble->cellAttributes() ?>>
<span id="el_basic_token_symble">
<span<?php echo $basic_token->symble->viewAttributes() ?>>
<?php echo $basic_token->symble->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($basic_token->supply->Visible) { // supply ?>
	<tr id="r_supply">
		<td class="<?php echo $basic_token_view->TableLeftColumnClass ?>"><span id="elh_basic_token_supply"><?php echo $basic_token->supply->caption() ?></span></td>
		<td data-name="supply"<?php echo $basic_token->supply->cellAttributes() ?>>
<span id="el_basic_token_supply">
<span<?php echo $basic_token->supply->viewAttributes() ?>>
<?php echo $basic_token->supply->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($basic_token->price->Visible) { // price ?>
	<tr id="r_price">
		<td class="<?php echo $basic_token_view->TableLeftColumnClass ?>"><span id="elh_basic_token_price"><?php echo $basic_token->price->caption() ?></span></td>
		<td data-name="price"<?php echo $basic_token->price->cellAttributes() ?>>
<span id="el_basic_token_price">
<span<?php echo $basic_token->price->viewAttributes() ?>>
<?php echo $basic_token->price->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($basic_token->logo->Visible) { // logo ?>
	<tr id="r_logo">
		<td class="<?php echo $basic_token_view->TableLeftColumnClass ?>"><span id="elh_basic_token_logo"><?php echo $basic_token->logo->caption() ?></span></td>
		<td data-name="logo"<?php echo $basic_token->logo->cellAttributes() ?>>
<span id="el_basic_token_logo">
<span<?php echo $basic_token->logo->viewAttributes() ?>>
<?php echo GetFileViewTag($basic_token->logo, $basic_token->logo->getViewValue()) ?>
</span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($basic_token->holders->Visible) { // holders ?>
	<tr id="r_holders">
		<td class="<?php echo $basic_token_view->TableLeftColumnClass ?>"><span id="elh_basic_token_holders"><?php echo $basic_token->holders->caption() ?></span></td>
		<td data-name="holders"<?php echo $basic_token->holders->cellAttributes() ?>>
<span id="el_basic_token_holders">
<span<?php echo $basic_token->holders->viewAttributes() ?>>
<?php echo $basic_token->holders->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($basic_token->transfers->Visible) { // transfers ?>
	<tr id="r_transfers">
		<td class="<?php echo $basic_token_view->TableLeftColumnClass ?>"><span id="elh_basic_token_transfers"><?php echo $basic_token->transfers->caption() ?></span></td>
		<td data-name="transfers"<?php echo $basic_token->transfers->cellAttributes() ?>>
<span id="el_basic_token_transfers">
<span<?php echo $basic_token->transfers->viewAttributes() ?>>
<?php echo $basic_token->transfers->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($basic_token->website->Visible) { // website ?>
	<tr id="r_website">
		<td class="<?php echo $basic_token_view->TableLeftColumnClass ?>"><span id="elh_basic_token_website"><?php echo $basic_token->website->caption() ?></span></td>
		<td data-name="website"<?php echo $basic_token->website->cellAttributes() ?>>
<span id="el_basic_token_website">
<span<?php echo $basic_token->website->viewAttributes() ?>>
<?php echo $basic_token->website->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($basic_token->contract->Visible) { // contract ?>
	<tr id="r_contract">
		<td class="<?php echo $basic_token_view->TableLeftColumnClass ?>"><span id="elh_basic_token_contract"><?php echo $basic_token->contract->caption() ?></span></td>
		<td data-name="contract"<?php echo $basic_token->contract->cellAttributes() ?>>
<span id="el_basic_token_contract">
<span<?php echo $basic_token->contract->viewAttributes() ?>>
<?php echo $basic_token->contract->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($basic_token->decimals->Visible) { // decimals ?>
	<tr id="r_decimals">
		<td class="<?php echo $basic_token_view->TableLeftColumnClass ?>"><span id="elh_basic_token_decimals"><?php echo $basic_token->decimals->caption() ?></span></td>
		<td data-name="decimals"<?php echo $basic_token->decimals->cellAttributes() ?>>
<span id="el_basic_token_decimals">
<span<?php echo $basic_token->decimals->viewAttributes() ?>>
<?php echo $basic_token->decimals->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($basic_token->dateadd->Visible) { // dateadd ?>
	<tr id="r_dateadd">
		<td class="<?php echo $basic_token_view->TableLeftColumnClass ?>"><span id="elh_basic_token_dateadd"><?php echo $basic_token->dateadd->caption() ?></span></td>
		<td data-name="dateadd"<?php echo $basic_token->dateadd->cellAttributes() ?>>
<span id="el_basic_token_dateadd">
<span<?php echo $basic_token->dateadd->viewAttributes() ?>>
<?php echo $basic_token->dateadd->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
<?php if (!$basic_token_view->IsModal) { ?>
<?php if (!$basic_token->isExport()) { ?>
<?php if (!isset($basic_token_view->Pager)) $basic_token_view->Pager = new PrevNextPager($basic_token_view->StartRec, $basic_token_view->DisplayRecs, $basic_token_view->TotalRecs, $basic_token_view->AutoHidePager) ?>
<?php if ($basic_token_view->Pager->RecordCount > 0 && $basic_token_view->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($basic_token_view->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" href="<?php echo $basic_token_view->pageUrl() ?>start=<?php echo $basic_token_view->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($basic_token_view->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" href="<?php echo $basic_token_view->pageUrl() ?>start=<?php echo $basic_token_view->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $basic_token_view->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($basic_token_view->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" href="<?php echo $basic_token_view->pageUrl() ?>start=<?php echo $basic_token_view->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($basic_token_view->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" href="<?php echo $basic_token_view->pageUrl() ?>start=<?php echo $basic_token_view->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $basic_token_view->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<div class="clearfix"></div>
<?php } ?>
<?php } ?>
</form>
<?php
$basic_token_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$basic_token->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$basic_token_view->terminate();
?>
