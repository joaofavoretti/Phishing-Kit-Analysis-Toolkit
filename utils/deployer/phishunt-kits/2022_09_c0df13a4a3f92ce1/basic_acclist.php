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
$basic_acc_list = new basic_acc_list();

// Run the page
$basic_acc_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$basic_acc_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$basic_acc->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fbasic_acclist = currentForm = new ew.Form("fbasic_acclist", "list");
fbasic_acclist.formKeyCountName = '<?php echo $basic_acc_list->FormKeyCountName ?>';

// Form_CustomValidate event
fbasic_acclist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fbasic_acclist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fbasic_acclist.lists["x_type"] = <?php echo $basic_acc_list->type->Lookup->toClientList() ?>;
fbasic_acclist.lists["x_type"].options = <?php echo JsonEncode($basic_acc_list->type->options(FALSE, TRUE)) ?>;

// Form object for search
var fbasic_acclistsrch = currentSearchForm = new ew.Form("fbasic_acclistsrch");

// Filters
fbasic_acclistsrch.filterList = <?php echo $basic_acc_list->getFilterList() ?>;
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$basic_acc->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($basic_acc_list->TotalRecs > 0 && $basic_acc_list->ExportOptions->visible()) { ?>
<?php $basic_acc_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($basic_acc_list->ImportOptions->visible()) { ?>
<?php $basic_acc_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($basic_acc_list->SearchOptions->visible()) { ?>
<?php $basic_acc_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($basic_acc_list->FilterOptions->visible()) { ?>
<?php $basic_acc_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$basic_acc_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$basic_acc->isExport() && !$basic_acc->CurrentAction) { ?>
<form name="fbasic_acclistsrch" id="fbasic_acclistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($basic_acc_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fbasic_acclistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="basic_acc">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($basic_acc_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->Phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($basic_acc_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->Phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $basic_acc_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($basic_acc_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->Phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($basic_acc_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->Phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($basic_acc_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->Phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($basic_acc_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->Phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $basic_acc_list->showPageHeader(); ?>
<?php
$basic_acc_list->showMessage();
?>
<?php if ($basic_acc_list->TotalRecs > 0 || $basic_acc->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($basic_acc_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> basic_acc">
<form name="fbasic_acclist" id="fbasic_acclist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($basic_acc_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $basic_acc_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="basic_acc">
<input type="hidden" name="exporttype" id="exporttype" value="">
<div id="gmp_basic_acc" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($basic_acc_list->TotalRecs > 0 || $basic_acc->isGridEdit()) { ?>
<table id="tbl_basic_acclist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$basic_acc_list->RowType = ROWTYPE_HEADER;

// Render list options
$basic_acc_list->renderListOptions();

// Render list options (header, left)
$basic_acc_list->ListOptions->render("header", "left");
?>
<?php if ($basic_acc->acc_addr->Visible) { // acc_addr ?>
	<?php if ($basic_acc->sortUrl($basic_acc->acc_addr) == "") { ?>
		<th data-name="acc_addr" class="<?php echo $basic_acc->acc_addr->headerCellClass() ?>"><div id="elh_basic_acc_acc_addr" class="basic_acc_acc_addr"><div class="ew-table-header-caption"><?php echo $basic_acc->acc_addr->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="acc_addr" class="<?php echo $basic_acc->acc_addr->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $basic_acc->SortUrl($basic_acc->acc_addr) ?>',1);"><div id="elh_basic_acc_acc_addr" class="basic_acc_acc_addr">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $basic_acc->acc_addr->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($basic_acc->acc_addr->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($basic_acc->acc_addr->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($basic_acc->acc_name->Visible) { // acc_name ?>
	<?php if ($basic_acc->sortUrl($basic_acc->acc_name) == "") { ?>
		<th data-name="acc_name" class="<?php echo $basic_acc->acc_name->headerCellClass() ?>"><div id="elh_basic_acc_acc_name" class="basic_acc_acc_name"><div class="ew-table-header-caption"><?php echo $basic_acc->acc_name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="acc_name" class="<?php echo $basic_acc->acc_name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $basic_acc->SortUrl($basic_acc->acc_name) ?>',1);"><div id="elh_basic_acc_acc_name" class="basic_acc_acc_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $basic_acc->acc_name->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($basic_acc->acc_name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($basic_acc->acc_name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($basic_acc->type->Visible) { // type ?>
	<?php if ($basic_acc->sortUrl($basic_acc->type) == "") { ?>
		<th data-name="type" class="<?php echo $basic_acc->type->headerCellClass() ?>"><div id="elh_basic_acc_type" class="basic_acc_type"><div class="ew-table-header-caption"><?php echo $basic_acc->type->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="type" class="<?php echo $basic_acc->type->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $basic_acc->SortUrl($basic_acc->type) ?>',1);"><div id="elh_basic_acc_type" class="basic_acc_type">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $basic_acc->type->caption() ?></span><span class="ew-table-header-sort"><?php if ($basic_acc->type->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($basic_acc->type->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($basic_acc->balance->Visible) { // balance ?>
	<?php if ($basic_acc->sortUrl($basic_acc->balance) == "") { ?>
		<th data-name="balance" class="<?php echo $basic_acc->balance->headerCellClass() ?>"><div id="elh_basic_acc_balance" class="basic_acc_balance"><div class="ew-table-header-caption"><?php echo $basic_acc->balance->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="balance" class="<?php echo $basic_acc->balance->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $basic_acc->SortUrl($basic_acc->balance) ?>',1);"><div id="elh_basic_acc_balance" class="basic_acc_balance">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $basic_acc->balance->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($basic_acc->balance->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($basic_acc->balance->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($basic_acc->txcount->Visible) { // txcount ?>
	<?php if ($basic_acc->sortUrl($basic_acc->txcount) == "") { ?>
		<th data-name="txcount" class="<?php echo $basic_acc->txcount->headerCellClass() ?>"><div id="elh_basic_acc_txcount" class="basic_acc_txcount"><div class="ew-table-header-caption"><?php echo $basic_acc->txcount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="txcount" class="<?php echo $basic_acc->txcount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $basic_acc->SortUrl($basic_acc->txcount) ?>',1);"><div id="elh_basic_acc_txcount" class="basic_acc_txcount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $basic_acc->txcount->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($basic_acc->txcount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($basic_acc->txcount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($basic_acc->dateadd->Visible) { // dateadd ?>
	<?php if ($basic_acc->sortUrl($basic_acc->dateadd) == "") { ?>
		<th data-name="dateadd" class="<?php echo $basic_acc->dateadd->headerCellClass() ?>"><div id="elh_basic_acc_dateadd" class="basic_acc_dateadd"><div class="ew-table-header-caption"><?php echo $basic_acc->dateadd->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="dateadd" class="<?php echo $basic_acc->dateadd->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $basic_acc->SortUrl($basic_acc->dateadd) ?>',1);"><div id="elh_basic_acc_dateadd" class="basic_acc_dateadd">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $basic_acc->dateadd->caption() ?></span><span class="ew-table-header-sort"><?php if ($basic_acc->dateadd->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($basic_acc->dateadd->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$basic_acc_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($basic_acc->ExportAll && $basic_acc->isExport()) {
	$basic_acc_list->StopRec = $basic_acc_list->TotalRecs;
} else {

	// Set the last record to display
	if ($basic_acc_list->TotalRecs > $basic_acc_list->StartRec + $basic_acc_list->DisplayRecs - 1)
		$basic_acc_list->StopRec = $basic_acc_list->StartRec + $basic_acc_list->DisplayRecs - 1;
	else
		$basic_acc_list->StopRec = $basic_acc_list->TotalRecs;
}
$basic_acc_list->RecCnt = $basic_acc_list->StartRec - 1;
if ($basic_acc_list->Recordset && !$basic_acc_list->Recordset->EOF) {
	$basic_acc_list->Recordset->moveFirst();
	$selectLimit = $basic_acc_list->UseSelectLimit;
	if (!$selectLimit && $basic_acc_list->StartRec > 1)
		$basic_acc_list->Recordset->move($basic_acc_list->StartRec - 1);
} elseif (!$basic_acc->AllowAddDeleteRow && $basic_acc_list->StopRec == 0) {
	$basic_acc_list->StopRec = $basic_acc->GridAddRowCount;
}

// Initialize aggregate
$basic_acc->RowType = ROWTYPE_AGGREGATEINIT;
$basic_acc->resetAttributes();
$basic_acc_list->renderRow();
while ($basic_acc_list->RecCnt < $basic_acc_list->StopRec) {
	$basic_acc_list->RecCnt++;
	if ($basic_acc_list->RecCnt >= $basic_acc_list->StartRec) {
		$basic_acc_list->RowCnt++;

		// Set up key count
		$basic_acc_list->KeyCount = $basic_acc_list->RowIndex;

		// Init row class and style
		$basic_acc->resetAttributes();
		$basic_acc->CssClass = "";
		if ($basic_acc->isGridAdd()) {
		} else {
			$basic_acc_list->loadRowValues($basic_acc_list->Recordset); // Load row values
		}
		$basic_acc->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$basic_acc->RowAttrs = array_merge($basic_acc->RowAttrs, array('data-rowindex'=>$basic_acc_list->RowCnt, 'id'=>'r' . $basic_acc_list->RowCnt . '_basic_acc', 'data-rowtype'=>$basic_acc->RowType));

		// Render row
		$basic_acc_list->renderRow();

		// Render list options
		$basic_acc_list->renderListOptions();
?>
	<tr<?php echo $basic_acc->rowAttributes() ?>>
<?php

// Render list options (body, left)
$basic_acc_list->ListOptions->render("body", "left", $basic_acc_list->RowCnt);
?>
	<?php if ($basic_acc->acc_addr->Visible) { // acc_addr ?>
		<td data-name="acc_addr"<?php echo $basic_acc->acc_addr->cellAttributes() ?>>
<span id="el<?php echo $basic_acc_list->RowCnt ?>_basic_acc_acc_addr" class="basic_acc_acc_addr">
<span<?php echo $basic_acc->acc_addr->viewAttributes() ?>>
<?php echo $basic_acc->acc_addr->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($basic_acc->acc_name->Visible) { // acc_name ?>
		<td data-name="acc_name"<?php echo $basic_acc->acc_name->cellAttributes() ?>>
<span id="el<?php echo $basic_acc_list->RowCnt ?>_basic_acc_acc_name" class="basic_acc_acc_name">
<span<?php echo $basic_acc->acc_name->viewAttributes() ?>>
<?php echo $basic_acc->acc_name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($basic_acc->type->Visible) { // type ?>
		<td data-name="type"<?php echo $basic_acc->type->cellAttributes() ?>>
<span id="el<?php echo $basic_acc_list->RowCnt ?>_basic_acc_type" class="basic_acc_type">
<span<?php echo $basic_acc->type->viewAttributes() ?>>
<?php echo $basic_acc->type->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($basic_acc->balance->Visible) { // balance ?>
		<td data-name="balance"<?php echo $basic_acc->balance->cellAttributes() ?>>
<span id="el<?php echo $basic_acc_list->RowCnt ?>_basic_acc_balance" class="basic_acc_balance">
<span<?php echo $basic_acc->balance->viewAttributes() ?>>
<?php echo $basic_acc->balance->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($basic_acc->txcount->Visible) { // txcount ?>
		<td data-name="txcount"<?php echo $basic_acc->txcount->cellAttributes() ?>>
<span id="el<?php echo $basic_acc_list->RowCnt ?>_basic_acc_txcount" class="basic_acc_txcount">
<span<?php echo $basic_acc->txcount->viewAttributes() ?>>
<?php echo $basic_acc->txcount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($basic_acc->dateadd->Visible) { // dateadd ?>
		<td data-name="dateadd"<?php echo $basic_acc->dateadd->cellAttributes() ?>>
<span id="el<?php echo $basic_acc_list->RowCnt ?>_basic_acc_dateadd" class="basic_acc_dateadd">
<span<?php echo $basic_acc->dateadd->viewAttributes() ?>>
<?php echo $basic_acc->dateadd->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$basic_acc_list->ListOptions->render("body", "right", $basic_acc_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$basic_acc->isGridAdd())
		$basic_acc_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$basic_acc->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($basic_acc_list->Recordset)
	$basic_acc_list->Recordset->Close();
?>
<?php if (!$basic_acc->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$basic_acc->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($basic_acc_list->Pager)) $basic_acc_list->Pager = new PrevNextPager($basic_acc_list->StartRec, $basic_acc_list->DisplayRecs, $basic_acc_list->TotalRecs, $basic_acc_list->AutoHidePager) ?>
<?php if ($basic_acc_list->Pager->RecordCount > 0 && $basic_acc_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($basic_acc_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" href="<?php echo $basic_acc_list->pageUrl() ?>start=<?php echo $basic_acc_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($basic_acc_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" href="<?php echo $basic_acc_list->pageUrl() ?>start=<?php echo $basic_acc_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $basic_acc_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($basic_acc_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" href="<?php echo $basic_acc_list->pageUrl() ?>start=<?php echo $basic_acc_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($basic_acc_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" href="<?php echo $basic_acc_list->pageUrl() ?>start=<?php echo $basic_acc_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $basic_acc_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($basic_acc_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $basic_acc_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $basic_acc_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $basic_acc_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($basic_acc_list->TotalRecs > 0 && (!$basic_acc_list->AutoHidePageSizeSelector || $basic_acc_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="basic_acc">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->Phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="10"<?php if ($basic_acc_list->DisplayRecs == 10) { ?> selected<?php } ?>>10</option>
<option value="20"<?php if ($basic_acc_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="50"<?php if ($basic_acc_list->DisplayRecs == 50) { ?> selected<?php } ?>>50</option>
<option value="ALL"<?php if ($basic_acc->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php
	foreach ($basic_acc_list->OtherOptions as &$option)
		$option->render("body", "bottom");
?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($basic_acc_list->TotalRecs == 0 && !$basic_acc->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php
	foreach ($basic_acc_list->OtherOptions as &$option) {
		$option->ButtonClass = "";
		$option->render("body", "");
	}
?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$basic_acc_list->showPageFooter();
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
$basic_acc_list->terminate();
?>
