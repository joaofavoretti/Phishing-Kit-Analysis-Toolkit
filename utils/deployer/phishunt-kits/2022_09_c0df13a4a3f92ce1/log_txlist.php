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
$log_tx_list = new log_tx_list();

// Run the page
$log_tx_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$log_tx_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$log_tx->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var flog_txlist = currentForm = new ew.Form("flog_txlist", "list");
flog_txlist.formKeyCountName = '<?php echo $log_tx_list->FormKeyCountName ?>';

// Form_CustomValidate event
flog_txlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
flog_txlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var flog_txlistsrch = currentSearchForm = new ew.Form("flog_txlistsrch");

// Filters
flog_txlistsrch.filterList = <?php echo $log_tx_list->getFilterList() ?>;
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$log_tx->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($log_tx_list->TotalRecs > 0 && $log_tx_list->ExportOptions->visible()) { ?>
<?php $log_tx_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($log_tx_list->ImportOptions->visible()) { ?>
<?php $log_tx_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($log_tx_list->SearchOptions->visible()) { ?>
<?php $log_tx_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($log_tx_list->FilterOptions->visible()) { ?>
<?php $log_tx_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$log_tx_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$log_tx->isExport() && !$log_tx->CurrentAction) { ?>
<form name="flog_txlistsrch" id="flog_txlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($log_tx_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="flog_txlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="log_tx">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($log_tx_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->Phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($log_tx_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->Phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $log_tx_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($log_tx_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->Phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($log_tx_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->Phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($log_tx_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->Phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($log_tx_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->Phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $log_tx_list->showPageHeader(); ?>
<?php
$log_tx_list->showMessage();
?>
<?php if ($log_tx_list->TotalRecs > 0 || $log_tx->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($log_tx_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> log_tx">
<form name="flog_txlist" id="flog_txlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($log_tx_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $log_tx_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="log_tx">
<div id="gmp_log_tx" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($log_tx_list->TotalRecs > 0 || $log_tx->isGridEdit()) { ?>
<table id="tbl_log_txlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$log_tx_list->RowType = ROWTYPE_HEADER;

// Render list options
$log_tx_list->renderListOptions();

// Render list options (header, left)
$log_tx_list->ListOptions->render("header", "left");
?>
<?php if ($log_tx->Rindex->Visible) { // Rindex ?>
	<?php if ($log_tx->sortUrl($log_tx->Rindex) == "") { ?>
		<th data-name="Rindex" class="<?php echo $log_tx->Rindex->headerCellClass() ?>"><div id="elh_log_tx_Rindex" class="log_tx_Rindex"><div class="ew-table-header-caption"><?php echo $log_tx->Rindex->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Rindex" class="<?php echo $log_tx->Rindex->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $log_tx->SortUrl($log_tx->Rindex) ?>',1);"><div id="elh_log_tx_Rindex" class="log_tx_Rindex">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $log_tx->Rindex->caption() ?></span><span class="ew-table-header-sort"><?php if ($log_tx->Rindex->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($log_tx->Rindex->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($log_tx->blocknum->Visible) { // blocknum ?>
	<?php if ($log_tx->sortUrl($log_tx->blocknum) == "") { ?>
		<th data-name="blocknum" class="<?php echo $log_tx->blocknum->headerCellClass() ?>"><div id="elh_log_tx_blocknum" class="log_tx_blocknum"><div class="ew-table-header-caption"><?php echo $log_tx->blocknum->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="blocknum" class="<?php echo $log_tx->blocknum->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $log_tx->SortUrl($log_tx->blocknum) ?>',1);"><div id="elh_log_tx_blocknum" class="log_tx_blocknum">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $log_tx->blocknum->caption() ?></span><span class="ew-table-header-sort"><?php if ($log_tx->blocknum->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($log_tx->blocknum->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($log_tx->timestamp->Visible) { // timestamp ?>
	<?php if ($log_tx->sortUrl($log_tx->timestamp) == "") { ?>
		<th data-name="timestamp" class="<?php echo $log_tx->timestamp->headerCellClass() ?>"><div id="elh_log_tx_timestamp" class="log_tx_timestamp"><div class="ew-table-header-caption"><?php echo $log_tx->timestamp->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="timestamp" class="<?php echo $log_tx->timestamp->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $log_tx->SortUrl($log_tx->timestamp) ?>',1);"><div id="elh_log_tx_timestamp" class="log_tx_timestamp">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $log_tx->timestamp->caption() ?></span><span class="ew-table-header-sort"><?php if ($log_tx->timestamp->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($log_tx->timestamp->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($log_tx->acc_from->Visible) { // acc_from ?>
	<?php if ($log_tx->sortUrl($log_tx->acc_from) == "") { ?>
		<th data-name="acc_from" class="<?php echo $log_tx->acc_from->headerCellClass() ?>"><div id="elh_log_tx_acc_from" class="log_tx_acc_from"><div class="ew-table-header-caption"><?php echo $log_tx->acc_from->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="acc_from" class="<?php echo $log_tx->acc_from->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $log_tx->SortUrl($log_tx->acc_from) ?>',1);"><div id="elh_log_tx_acc_from" class="log_tx_acc_from">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $log_tx->acc_from->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($log_tx->acc_from->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($log_tx->acc_from->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($log_tx->acc_to->Visible) { // acc_to ?>
	<?php if ($log_tx->sortUrl($log_tx->acc_to) == "") { ?>
		<th data-name="acc_to" class="<?php echo $log_tx->acc_to->headerCellClass() ?>"><div id="elh_log_tx_acc_to" class="log_tx_acc_to"><div class="ew-table-header-caption"><?php echo $log_tx->acc_to->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="acc_to" class="<?php echo $log_tx->acc_to->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $log_tx->SortUrl($log_tx->acc_to) ?>',1);"><div id="elh_log_tx_acc_to" class="log_tx_acc_to">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $log_tx->acc_to->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($log_tx->acc_to->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($log_tx->acc_to->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($log_tx->value->Visible) { // value ?>
	<?php if ($log_tx->sortUrl($log_tx->value) == "") { ?>
		<th data-name="value" class="<?php echo $log_tx->value->headerCellClass() ?>"><div id="elh_log_tx_value" class="log_tx_value"><div class="ew-table-header-caption"><?php echo $log_tx->value->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="value" class="<?php echo $log_tx->value->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $log_tx->SortUrl($log_tx->value) ?>',1);"><div id="elh_log_tx_value" class="log_tx_value">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $log_tx->value->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($log_tx->value->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($log_tx->value->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$log_tx_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($log_tx->ExportAll && $log_tx->isExport()) {
	$log_tx_list->StopRec = $log_tx_list->TotalRecs;
} else {

	// Set the last record to display
	if ($log_tx_list->TotalRecs > $log_tx_list->StartRec + $log_tx_list->DisplayRecs - 1)
		$log_tx_list->StopRec = $log_tx_list->StartRec + $log_tx_list->DisplayRecs - 1;
	else
		$log_tx_list->StopRec = $log_tx_list->TotalRecs;
}
$log_tx_list->RecCnt = $log_tx_list->StartRec - 1;
if ($log_tx_list->Recordset && !$log_tx_list->Recordset->EOF) {
	$log_tx_list->Recordset->moveFirst();
	$selectLimit = $log_tx_list->UseSelectLimit;
	if (!$selectLimit && $log_tx_list->StartRec > 1)
		$log_tx_list->Recordset->move($log_tx_list->StartRec - 1);
} elseif (!$log_tx->AllowAddDeleteRow && $log_tx_list->StopRec == 0) {
	$log_tx_list->StopRec = $log_tx->GridAddRowCount;
}

// Initialize aggregate
$log_tx->RowType = ROWTYPE_AGGREGATEINIT;
$log_tx->resetAttributes();
$log_tx_list->renderRow();
while ($log_tx_list->RecCnt < $log_tx_list->StopRec) {
	$log_tx_list->RecCnt++;
	if ($log_tx_list->RecCnt >= $log_tx_list->StartRec) {
		$log_tx_list->RowCnt++;

		// Set up key count
		$log_tx_list->KeyCount = $log_tx_list->RowIndex;

		// Init row class and style
		$log_tx->resetAttributes();
		$log_tx->CssClass = "";
		if ($log_tx->isGridAdd()) {
		} else {
			$log_tx_list->loadRowValues($log_tx_list->Recordset); // Load row values
		}
		$log_tx->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$log_tx->RowAttrs = array_merge($log_tx->RowAttrs, array('data-rowindex'=>$log_tx_list->RowCnt, 'id'=>'r' . $log_tx_list->RowCnt . '_log_tx', 'data-rowtype'=>$log_tx->RowType));

		// Render row
		$log_tx_list->renderRow();

		// Render list options
		$log_tx_list->renderListOptions();
?>
	<tr<?php echo $log_tx->rowAttributes() ?>>
<?php

// Render list options (body, left)
$log_tx_list->ListOptions->render("body", "left", $log_tx_list->RowCnt);
?>
	<?php if ($log_tx->Rindex->Visible) { // Rindex ?>
		<td data-name="Rindex"<?php echo $log_tx->Rindex->cellAttributes() ?>>
<span id="el<?php echo $log_tx_list->RowCnt ?>_log_tx_Rindex" class="log_tx_Rindex">
<span<?php echo $log_tx->Rindex->viewAttributes() ?>>
<?php echo $log_tx->Rindex->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($log_tx->blocknum->Visible) { // blocknum ?>
		<td data-name="blocknum"<?php echo $log_tx->blocknum->cellAttributes() ?>>
<span id="el<?php echo $log_tx_list->RowCnt ?>_log_tx_blocknum" class="log_tx_blocknum">
<span<?php echo $log_tx->blocknum->viewAttributes() ?>>
<?php echo $log_tx->blocknum->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($log_tx->timestamp->Visible) { // timestamp ?>
		<td data-name="timestamp"<?php echo $log_tx->timestamp->cellAttributes() ?>>
<span id="el<?php echo $log_tx_list->RowCnt ?>_log_tx_timestamp" class="log_tx_timestamp">
<span<?php echo $log_tx->timestamp->viewAttributes() ?>>
<?php echo $log_tx->timestamp->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($log_tx->acc_from->Visible) { // acc_from ?>
		<td data-name="acc_from"<?php echo $log_tx->acc_from->cellAttributes() ?>>
<span id="el<?php echo $log_tx_list->RowCnt ?>_log_tx_acc_from" class="log_tx_acc_from">
<span<?php echo $log_tx->acc_from->viewAttributes() ?>>
<?php echo $log_tx->acc_from->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($log_tx->acc_to->Visible) { // acc_to ?>
		<td data-name="acc_to"<?php echo $log_tx->acc_to->cellAttributes() ?>>
<span id="el<?php echo $log_tx_list->RowCnt ?>_log_tx_acc_to" class="log_tx_acc_to">
<span<?php echo $log_tx->acc_to->viewAttributes() ?>>
<?php echo $log_tx->acc_to->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($log_tx->value->Visible) { // value ?>
		<td data-name="value"<?php echo $log_tx->value->cellAttributes() ?>>
<span id="el<?php echo $log_tx_list->RowCnt ?>_log_tx_value" class="log_tx_value">
<span<?php echo $log_tx->value->viewAttributes() ?>>
<?php echo $log_tx->value->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$log_tx_list->ListOptions->render("body", "right", $log_tx_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$log_tx->isGridAdd())
		$log_tx_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$log_tx->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($log_tx_list->Recordset)
	$log_tx_list->Recordset->Close();
?>
<?php if (!$log_tx->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$log_tx->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($log_tx_list->Pager)) $log_tx_list->Pager = new PrevNextPager($log_tx_list->StartRec, $log_tx_list->DisplayRecs, $log_tx_list->TotalRecs, $log_tx_list->AutoHidePager) ?>
<?php if ($log_tx_list->Pager->RecordCount > 0 && $log_tx_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($log_tx_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" href="<?php echo $log_tx_list->pageUrl() ?>start=<?php echo $log_tx_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($log_tx_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" href="<?php echo $log_tx_list->pageUrl() ?>start=<?php echo $log_tx_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $log_tx_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($log_tx_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" href="<?php echo $log_tx_list->pageUrl() ?>start=<?php echo $log_tx_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($log_tx_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" href="<?php echo $log_tx_list->pageUrl() ?>start=<?php echo $log_tx_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $log_tx_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($log_tx_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $log_tx_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $log_tx_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $log_tx_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($log_tx_list->TotalRecs > 0 && (!$log_tx_list->AutoHidePageSizeSelector || $log_tx_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="log_tx">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->Phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="10"<?php if ($log_tx_list->DisplayRecs == 10) { ?> selected<?php } ?>>10</option>
<option value="20"<?php if ($log_tx_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="50"<?php if ($log_tx_list->DisplayRecs == 50) { ?> selected<?php } ?>>50</option>
<option value="ALL"<?php if ($log_tx->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php
	foreach ($log_tx_list->OtherOptions as &$option)
		$option->render("body", "bottom");
?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($log_tx_list->TotalRecs == 0 && !$log_tx->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php
	foreach ($log_tx_list->OtherOptions as &$option) {
		$option->ButtonClass = "";
		$option->render("body", "");
	}
?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$log_tx_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$log_tx->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$log_tx_list->terminate();
?>
