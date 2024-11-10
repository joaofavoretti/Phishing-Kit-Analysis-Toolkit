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
$log_block_list = new log_block_list();

// Run the page
$log_block_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$log_block_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$log_block->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var flog_blocklist = currentForm = new ew.Form("flog_blocklist", "list");
flog_blocklist.formKeyCountName = '<?php echo $log_block_list->FormKeyCountName ?>';

// Form_CustomValidate event
flog_blocklist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
flog_blocklist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var flog_blocklistsrch = currentSearchForm = new ew.Form("flog_blocklistsrch");

// Filters
flog_blocklistsrch.filterList = <?php echo $log_block_list->getFilterList() ?>;
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$log_block->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($log_block_list->TotalRecs > 0 && $log_block_list->ExportOptions->visible()) { ?>
<?php $log_block_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($log_block_list->ImportOptions->visible()) { ?>
<?php $log_block_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($log_block_list->SearchOptions->visible()) { ?>
<?php $log_block_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($log_block_list->FilterOptions->visible()) { ?>
<?php $log_block_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$log_block_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$log_block->isExport() && !$log_block->CurrentAction) { ?>
<form name="flog_blocklistsrch" id="flog_blocklistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($log_block_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="flog_blocklistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="log_block">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($log_block_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->Phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($log_block_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->Phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $log_block_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($log_block_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->Phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($log_block_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->Phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($log_block_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->Phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($log_block_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->Phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $log_block_list->showPageHeader(); ?>
<?php
$log_block_list->showMessage();
?>
<?php if ($log_block_list->TotalRecs > 0 || $log_block->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($log_block_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> log_block">
<form name="flog_blocklist" id="flog_blocklist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($log_block_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $log_block_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="log_block">
<input type="hidden" name="exporttype" id="exporttype" value="">
<div id="gmp_log_block" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($log_block_list->TotalRecs > 0 || $log_block->isGridEdit()) { ?>
<table id="tbl_log_blocklist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$log_block_list->RowType = ROWTYPE_HEADER;

// Render list options
$log_block_list->renderListOptions();

// Render list options (header, left)
$log_block_list->ListOptions->render("header", "left");
?>
<?php if ($log_block->height_block->Visible) { // height_block ?>
	<?php if ($log_block->sortUrl($log_block->height_block) == "") { ?>
		<th data-name="height_block" class="<?php echo $log_block->height_block->headerCellClass() ?>"><div id="elh_log_block_height_block" class="log_block_height_block"><div class="ew-table-header-caption"><?php echo $log_block->height_block->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="height_block" class="<?php echo $log_block->height_block->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $log_block->SortUrl($log_block->height_block) ?>',1);"><div id="elh_log_block_height_block" class="log_block_height_block">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $log_block->height_block->caption() ?></span><span class="ew-table-header-sort"><?php if ($log_block->height_block->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($log_block->height_block->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($log_block->time_mined->Visible) { // time_mined ?>
	<?php if ($log_block->sortUrl($log_block->time_mined) == "") { ?>
		<th data-name="time_mined" class="<?php echo $log_block->time_mined->headerCellClass() ?>"><div id="elh_log_block_time_mined" class="log_block_time_mined"><div class="ew-table-header-caption"><?php echo $log_block->time_mined->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="time_mined" class="<?php echo $log_block->time_mined->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $log_block->SortUrl($log_block->time_mined) ?>',1);"><div id="elh_log_block_time_mined" class="log_block_time_mined">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $log_block->time_mined->caption() ?></span><span class="ew-table-header-sort"><?php if ($log_block->time_mined->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($log_block->time_mined->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($log_block->size->Visible) { // size ?>
	<?php if ($log_block->sortUrl($log_block->size) == "") { ?>
		<th data-name="size" class="<?php echo $log_block->size->headerCellClass() ?>"><div id="elh_log_block_size" class="log_block_size"><div class="ew-table-header-caption"><?php echo $log_block->size->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="size" class="<?php echo $log_block->size->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $log_block->SortUrl($log_block->size) ?>',1);"><div id="elh_log_block_size" class="log_block_size">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $log_block->size->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($log_block->size->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($log_block->size->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($log_block->gasused->Visible) { // gasused ?>
	<?php if ($log_block->sortUrl($log_block->gasused) == "") { ?>
		<th data-name="gasused" class="<?php echo $log_block->gasused->headerCellClass() ?>"><div id="elh_log_block_gasused" class="log_block_gasused"><div class="ew-table-header-caption"><?php echo $log_block->gasused->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="gasused" class="<?php echo $log_block->gasused->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $log_block->SortUrl($log_block->gasused) ?>',1);"><div id="elh_log_block_gasused" class="log_block_gasused">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $log_block->gasused->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($log_block->gasused->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($log_block->gasused->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($log_block->nonce->Visible) { // nonce ?>
	<?php if ($log_block->sortUrl($log_block->nonce) == "") { ?>
		<th data-name="nonce" class="<?php echo $log_block->nonce->headerCellClass() ?>"><div id="elh_log_block_nonce" class="log_block_nonce"><div class="ew-table-header-caption"><?php echo $log_block->nonce->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nonce" class="<?php echo $log_block->nonce->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $log_block->SortUrl($log_block->nonce) ?>',1);"><div id="elh_log_block_nonce" class="log_block_nonce">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $log_block->nonce->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($log_block->nonce->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($log_block->nonce->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($log_block->tx_num->Visible) { // tx_num ?>
	<?php if ($log_block->sortUrl($log_block->tx_num) == "") { ?>
		<th data-name="tx_num" class="<?php echo $log_block->tx_num->headerCellClass() ?>"><div id="elh_log_block_tx_num" class="log_block_tx_num"><div class="ew-table-header-caption"><?php echo $log_block->tx_num->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="tx_num" class="<?php echo $log_block->tx_num->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $log_block->SortUrl($log_block->tx_num) ?>',1);"><div id="elh_log_block_tx_num" class="log_block_tx_num">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $log_block->tx_num->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($log_block->tx_num->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($log_block->tx_num->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($log_block->hash_parent->Visible) { // hash_parent ?>
	<?php if ($log_block->sortUrl($log_block->hash_parent) == "") { ?>
		<th data-name="hash_parent" class="<?php echo $log_block->hash_parent->headerCellClass() ?>"><div id="elh_log_block_hash_parent" class="log_block_hash_parent"><div class="ew-table-header-caption"><?php echo $log_block->hash_parent->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="hash_parent" class="<?php echo $log_block->hash_parent->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $log_block->SortUrl($log_block->hash_parent) ?>',1);"><div id="elh_log_block_hash_parent" class="log_block_hash_parent">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $log_block->hash_parent->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($log_block->hash_parent->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($log_block->hash_parent->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($log_block->miner->Visible) { // miner ?>
	<?php if ($log_block->sortUrl($log_block->miner) == "") { ?>
		<th data-name="miner" class="<?php echo $log_block->miner->headerCellClass() ?>"><div id="elh_log_block_miner" class="log_block_miner"><div class="ew-table-header-caption"><?php echo $log_block->miner->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="miner" class="<?php echo $log_block->miner->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $log_block->SortUrl($log_block->miner) ?>',1);"><div id="elh_log_block_miner" class="log_block_miner">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $log_block->miner->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($log_block->miner->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($log_block->miner->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$log_block_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($log_block->ExportAll && $log_block->isExport()) {
	$log_block_list->StopRec = $log_block_list->TotalRecs;
} else {

	// Set the last record to display
	if ($log_block_list->TotalRecs > $log_block_list->StartRec + $log_block_list->DisplayRecs - 1)
		$log_block_list->StopRec = $log_block_list->StartRec + $log_block_list->DisplayRecs - 1;
	else
		$log_block_list->StopRec = $log_block_list->TotalRecs;
}
$log_block_list->RecCnt = $log_block_list->StartRec - 1;
if ($log_block_list->Recordset && !$log_block_list->Recordset->EOF) {
	$log_block_list->Recordset->moveFirst();
	$selectLimit = $log_block_list->UseSelectLimit;
	if (!$selectLimit && $log_block_list->StartRec > 1)
		$log_block_list->Recordset->move($log_block_list->StartRec - 1);
} elseif (!$log_block->AllowAddDeleteRow && $log_block_list->StopRec == 0) {
	$log_block_list->StopRec = $log_block->GridAddRowCount;
}

// Initialize aggregate
$log_block->RowType = ROWTYPE_AGGREGATEINIT;
$log_block->resetAttributes();
$log_block_list->renderRow();
while ($log_block_list->RecCnt < $log_block_list->StopRec) {
	$log_block_list->RecCnt++;
	if ($log_block_list->RecCnt >= $log_block_list->StartRec) {
		$log_block_list->RowCnt++;

		// Set up key count
		$log_block_list->KeyCount = $log_block_list->RowIndex;

		// Init row class and style
		$log_block->resetAttributes();
		$log_block->CssClass = "";
		if ($log_block->isGridAdd()) {
		} else {
			$log_block_list->loadRowValues($log_block_list->Recordset); // Load row values
		}
		$log_block->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$log_block->RowAttrs = array_merge($log_block->RowAttrs, array('data-rowindex'=>$log_block_list->RowCnt, 'id'=>'r' . $log_block_list->RowCnt . '_log_block', 'data-rowtype'=>$log_block->RowType));

		// Render row
		$log_block_list->renderRow();

		// Render list options
		$log_block_list->renderListOptions();
?>
	<tr<?php echo $log_block->rowAttributes() ?>>
<?php

// Render list options (body, left)
$log_block_list->ListOptions->render("body", "left", $log_block_list->RowCnt);
?>
	<?php if ($log_block->height_block->Visible) { // height_block ?>
		<td data-name="height_block"<?php echo $log_block->height_block->cellAttributes() ?>>
<span id="el<?php echo $log_block_list->RowCnt ?>_log_block_height_block" class="log_block_height_block">
<span<?php echo $log_block->height_block->viewAttributes() ?>>
<?php echo $log_block->height_block->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($log_block->time_mined->Visible) { // time_mined ?>
		<td data-name="time_mined"<?php echo $log_block->time_mined->cellAttributes() ?>>
<span id="el<?php echo $log_block_list->RowCnt ?>_log_block_time_mined" class="log_block_time_mined">
<span<?php echo $log_block->time_mined->viewAttributes() ?>>
<?php echo $log_block->time_mined->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($log_block->size->Visible) { // size ?>
		<td data-name="size"<?php echo $log_block->size->cellAttributes() ?>>
<span id="el<?php echo $log_block_list->RowCnt ?>_log_block_size" class="log_block_size">
<span<?php echo $log_block->size->viewAttributes() ?>>
<?php echo $log_block->size->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($log_block->gasused->Visible) { // gasused ?>
		<td data-name="gasused"<?php echo $log_block->gasused->cellAttributes() ?>>
<span id="el<?php echo $log_block_list->RowCnt ?>_log_block_gasused" class="log_block_gasused">
<span<?php echo $log_block->gasused->viewAttributes() ?>>
<?php echo $log_block->gasused->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($log_block->nonce->Visible) { // nonce ?>
		<td data-name="nonce"<?php echo $log_block->nonce->cellAttributes() ?>>
<span id="el<?php echo $log_block_list->RowCnt ?>_log_block_nonce" class="log_block_nonce">
<span<?php echo $log_block->nonce->viewAttributes() ?>>
<?php echo $log_block->nonce->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($log_block->tx_num->Visible) { // tx_num ?>
		<td data-name="tx_num"<?php echo $log_block->tx_num->cellAttributes() ?>>
<span id="el<?php echo $log_block_list->RowCnt ?>_log_block_tx_num" class="log_block_tx_num">
<span<?php echo $log_block->tx_num->viewAttributes() ?>>
<?php echo $log_block->tx_num->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($log_block->hash_parent->Visible) { // hash_parent ?>
		<td data-name="hash_parent"<?php echo $log_block->hash_parent->cellAttributes() ?>>
<span id="el<?php echo $log_block_list->RowCnt ?>_log_block_hash_parent" class="log_block_hash_parent">
<span<?php echo $log_block->hash_parent->viewAttributes() ?>>
<?php echo $log_block->hash_parent->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($log_block->miner->Visible) { // miner ?>
		<td data-name="miner"<?php echo $log_block->miner->cellAttributes() ?>>
<span id="el<?php echo $log_block_list->RowCnt ?>_log_block_miner" class="log_block_miner">
<span<?php echo $log_block->miner->viewAttributes() ?>>
<?php echo $log_block->miner->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$log_block_list->ListOptions->render("body", "right", $log_block_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$log_block->isGridAdd())
		$log_block_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$log_block->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($log_block_list->Recordset)
	$log_block_list->Recordset->Close();
?>
<?php if (!$log_block->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$log_block->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($log_block_list->Pager)) $log_block_list->Pager = new PrevNextPager($log_block_list->StartRec, $log_block_list->DisplayRecs, $log_block_list->TotalRecs, $log_block_list->AutoHidePager) ?>
<?php if ($log_block_list->Pager->RecordCount > 0 && $log_block_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($log_block_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" href="<?php echo $log_block_list->pageUrl() ?>start=<?php echo $log_block_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($log_block_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" href="<?php echo $log_block_list->pageUrl() ?>start=<?php echo $log_block_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $log_block_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($log_block_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" href="<?php echo $log_block_list->pageUrl() ?>start=<?php echo $log_block_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($log_block_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" href="<?php echo $log_block_list->pageUrl() ?>start=<?php echo $log_block_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $log_block_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($log_block_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $log_block_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $log_block_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $log_block_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($log_block_list->TotalRecs > 0 && (!$log_block_list->AutoHidePageSizeSelector || $log_block_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="log_block">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->Phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="10"<?php if ($log_block_list->DisplayRecs == 10) { ?> selected<?php } ?>>10</option>
<option value="20"<?php if ($log_block_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="50"<?php if ($log_block_list->DisplayRecs == 50) { ?> selected<?php } ?>>50</option>
<option value="ALL"<?php if ($log_block->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php
	foreach ($log_block_list->OtherOptions as &$option)
		$option->render("body", "bottom");
?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($log_block_list->TotalRecs == 0 && !$log_block->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php
	foreach ($log_block_list->OtherOptions as &$option) {
		$option->ButtonClass = "";
		$option->render("body", "");
	}
?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$log_block_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$log_block->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$log_block_list->terminate();
?>
