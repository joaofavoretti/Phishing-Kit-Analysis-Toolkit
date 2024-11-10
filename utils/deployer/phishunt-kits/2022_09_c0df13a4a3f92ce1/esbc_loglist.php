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
$esbc_log_list = new esbc_log_list();

// Run the page
$esbc_log_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$esbc_log_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$esbc_log->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fesbc_loglist = currentForm = new ew.Form("fesbc_loglist", "list");
fesbc_loglist.formKeyCountName = '<?php echo $esbc_log_list->FormKeyCountName ?>';

// Form_CustomValidate event
fesbc_loglist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fesbc_loglist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fesbc_loglist.lists["x_LOG_ESBC_ID"] = <?php echo $esbc_log_list->LOG_ESBC_ID->Lookup->toClientList() ?>;
fesbc_loglist.lists["x_LOG_ESBC_ID"].options = <?php echo JsonEncode($esbc_log_list->LOG_ESBC_ID->lookupOptions()) ?>;

// Form object for search
var fesbc_loglistsrch = currentSearchForm = new ew.Form("fesbc_loglistsrch");

// Filters
fesbc_loglistsrch.filterList = <?php echo $esbc_log_list->getFilterList() ?>;
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$esbc_log->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($esbc_log_list->TotalRecs > 0 && $esbc_log_list->ExportOptions->visible()) { ?>
<?php $esbc_log_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($esbc_log_list->ImportOptions->visible()) { ?>
<?php $esbc_log_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($esbc_log_list->SearchOptions->visible()) { ?>
<?php $esbc_log_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($esbc_log_list->FilterOptions->visible()) { ?>
<?php $esbc_log_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$esbc_log_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$esbc_log->isExport() && !$esbc_log->CurrentAction) { ?>
<form name="fesbc_loglistsrch" id="fesbc_loglistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($esbc_log_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fesbc_loglistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="esbc_log">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($esbc_log_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->Phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($esbc_log_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->Phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $esbc_log_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($esbc_log_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->Phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($esbc_log_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->Phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($esbc_log_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->Phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($esbc_log_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->Phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $esbc_log_list->showPageHeader(); ?>
<?php
$esbc_log_list->showMessage();
?>
<?php if ($esbc_log_list->TotalRecs > 0 || $esbc_log->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($esbc_log_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> esbc_log">
<form name="fesbc_loglist" id="fesbc_loglist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($esbc_log_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $esbc_log_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="esbc_log">
<input type="hidden" name="exporttype" id="exporttype" value="">
<div id="gmp_esbc_log" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($esbc_log_list->TotalRecs > 0 || $esbc_log->isGridEdit()) { ?>
<table id="tbl_esbc_loglist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$esbc_log_list->RowType = ROWTYPE_HEADER;

// Render list options
$esbc_log_list->renderListOptions();

// Render list options (header, left)
$esbc_log_list->ListOptions->render("header", "left");
?>
<?php if ($esbc_log->LOG_INDEX->Visible) { // LOG_INDEX ?>
	<?php if ($esbc_log->sortUrl($esbc_log->LOG_INDEX) == "") { ?>
		<th data-name="LOG_INDEX" class="<?php echo $esbc_log->LOG_INDEX->headerCellClass() ?>"><div id="elh_esbc_log_LOG_INDEX" class="esbc_log_LOG_INDEX"><div class="ew-table-header-caption"><?php echo $esbc_log->LOG_INDEX->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LOG_INDEX" class="<?php echo $esbc_log->LOG_INDEX->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $esbc_log->SortUrl($esbc_log->LOG_INDEX) ?>',1);"><div id="elh_esbc_log_LOG_INDEX" class="esbc_log_LOG_INDEX">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $esbc_log->LOG_INDEX->caption() ?></span><span class="ew-table-header-sort"><?php if ($esbc_log->LOG_INDEX->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($esbc_log->LOG_INDEX->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($esbc_log->LOG_ESBC_ID->Visible) { // LOG_ESBC_ID ?>
	<?php if ($esbc_log->sortUrl($esbc_log->LOG_ESBC_ID) == "") { ?>
		<th data-name="LOG_ESBC_ID" class="<?php echo $esbc_log->LOG_ESBC_ID->headerCellClass() ?>"><div id="elh_esbc_log_LOG_ESBC_ID" class="esbc_log_LOG_ESBC_ID"><div class="ew-table-header-caption"><?php echo $esbc_log->LOG_ESBC_ID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LOG_ESBC_ID" class="<?php echo $esbc_log->LOG_ESBC_ID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $esbc_log->SortUrl($esbc_log->LOG_ESBC_ID) ?>',1);"><div id="elh_esbc_log_LOG_ESBC_ID" class="esbc_log_LOG_ESBC_ID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $esbc_log->LOG_ESBC_ID->caption() ?></span><span class="ew-table-header-sort"><?php if ($esbc_log->LOG_ESBC_ID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($esbc_log->LOG_ESBC_ID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($esbc_log->LOG_MEMO->Visible) { // LOG_MEMO ?>
	<?php if ($esbc_log->sortUrl($esbc_log->LOG_MEMO) == "") { ?>
		<th data-name="LOG_MEMO" class="<?php echo $esbc_log->LOG_MEMO->headerCellClass() ?>"><div id="elh_esbc_log_LOG_MEMO" class="esbc_log_LOG_MEMO"><div class="ew-table-header-caption"><?php echo $esbc_log->LOG_MEMO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LOG_MEMO" class="<?php echo $esbc_log->LOG_MEMO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $esbc_log->SortUrl($esbc_log->LOG_MEMO) ?>',1);"><div id="elh_esbc_log_LOG_MEMO" class="esbc_log_LOG_MEMO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $esbc_log->LOG_MEMO->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($esbc_log->LOG_MEMO->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($esbc_log->LOG_MEMO->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($esbc_log->Create_Date->Visible) { // Create_Date ?>
	<?php if ($esbc_log->sortUrl($esbc_log->Create_Date) == "") { ?>
		<th data-name="Create_Date" class="<?php echo $esbc_log->Create_Date->headerCellClass() ?>"><div id="elh_esbc_log_Create_Date" class="esbc_log_Create_Date"><div class="ew-table-header-caption"><?php echo $esbc_log->Create_Date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Create_Date" class="<?php echo $esbc_log->Create_Date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $esbc_log->SortUrl($esbc_log->Create_Date) ?>',1);"><div id="elh_esbc_log_Create_Date" class="esbc_log_Create_Date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $esbc_log->Create_Date->caption() ?></span><span class="ew-table-header-sort"><?php if ($esbc_log->Create_Date->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($esbc_log->Create_Date->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$esbc_log_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($esbc_log->ExportAll && $esbc_log->isExport()) {
	$esbc_log_list->StopRec = $esbc_log_list->TotalRecs;
} else {

	// Set the last record to display
	if ($esbc_log_list->TotalRecs > $esbc_log_list->StartRec + $esbc_log_list->DisplayRecs - 1)
		$esbc_log_list->StopRec = $esbc_log_list->StartRec + $esbc_log_list->DisplayRecs - 1;
	else
		$esbc_log_list->StopRec = $esbc_log_list->TotalRecs;
}
$esbc_log_list->RecCnt = $esbc_log_list->StartRec - 1;
if ($esbc_log_list->Recordset && !$esbc_log_list->Recordset->EOF) {
	$esbc_log_list->Recordset->moveFirst();
	$selectLimit = $esbc_log_list->UseSelectLimit;
	if (!$selectLimit && $esbc_log_list->StartRec > 1)
		$esbc_log_list->Recordset->move($esbc_log_list->StartRec - 1);
} elseif (!$esbc_log->AllowAddDeleteRow && $esbc_log_list->StopRec == 0) {
	$esbc_log_list->StopRec = $esbc_log->GridAddRowCount;
}

// Initialize aggregate
$esbc_log->RowType = ROWTYPE_AGGREGATEINIT;
$esbc_log->resetAttributes();
$esbc_log_list->renderRow();
while ($esbc_log_list->RecCnt < $esbc_log_list->StopRec) {
	$esbc_log_list->RecCnt++;
	if ($esbc_log_list->RecCnt >= $esbc_log_list->StartRec) {
		$esbc_log_list->RowCnt++;

		// Set up key count
		$esbc_log_list->KeyCount = $esbc_log_list->RowIndex;

		// Init row class and style
		$esbc_log->resetAttributes();
		$esbc_log->CssClass = "";
		if ($esbc_log->isGridAdd()) {
		} else {
			$esbc_log_list->loadRowValues($esbc_log_list->Recordset); // Load row values
		}
		$esbc_log->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$esbc_log->RowAttrs = array_merge($esbc_log->RowAttrs, array('data-rowindex'=>$esbc_log_list->RowCnt, 'id'=>'r' . $esbc_log_list->RowCnt . '_esbc_log', 'data-rowtype'=>$esbc_log->RowType));

		// Render row
		$esbc_log_list->renderRow();

		// Render list options
		$esbc_log_list->renderListOptions();
?>
	<tr<?php echo $esbc_log->rowAttributes() ?>>
<?php

// Render list options (body, left)
$esbc_log_list->ListOptions->render("body", "left", $esbc_log_list->RowCnt);
?>
	<?php if ($esbc_log->LOG_INDEX->Visible) { // LOG_INDEX ?>
		<td data-name="LOG_INDEX"<?php echo $esbc_log->LOG_INDEX->cellAttributes() ?>>
<span id="el<?php echo $esbc_log_list->RowCnt ?>_esbc_log_LOG_INDEX" class="esbc_log_LOG_INDEX">
<span<?php echo $esbc_log->LOG_INDEX->viewAttributes() ?>>
<?php echo $esbc_log->LOG_INDEX->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($esbc_log->LOG_ESBC_ID->Visible) { // LOG_ESBC_ID ?>
		<td data-name="LOG_ESBC_ID"<?php echo $esbc_log->LOG_ESBC_ID->cellAttributes() ?>>
<span id="el<?php echo $esbc_log_list->RowCnt ?>_esbc_log_LOG_ESBC_ID" class="esbc_log_LOG_ESBC_ID">
<span<?php echo $esbc_log->LOG_ESBC_ID->viewAttributes() ?>>
<?php echo $esbc_log->LOG_ESBC_ID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($esbc_log->LOG_MEMO->Visible) { // LOG_MEMO ?>
		<td data-name="LOG_MEMO"<?php echo $esbc_log->LOG_MEMO->cellAttributes() ?>>
<span id="el<?php echo $esbc_log_list->RowCnt ?>_esbc_log_LOG_MEMO" class="esbc_log_LOG_MEMO">
<span<?php echo $esbc_log->LOG_MEMO->viewAttributes() ?>>
<?php echo $esbc_log->LOG_MEMO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($esbc_log->Create_Date->Visible) { // Create_Date ?>
		<td data-name="Create_Date"<?php echo $esbc_log->Create_Date->cellAttributes() ?>>
<span id="el<?php echo $esbc_log_list->RowCnt ?>_esbc_log_Create_Date" class="esbc_log_Create_Date">
<span<?php echo $esbc_log->Create_Date->viewAttributes() ?>>
<?php echo $esbc_log->Create_Date->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$esbc_log_list->ListOptions->render("body", "right", $esbc_log_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$esbc_log->isGridAdd())
		$esbc_log_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$esbc_log->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($esbc_log_list->Recordset)
	$esbc_log_list->Recordset->Close();
?>
<?php if (!$esbc_log->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$esbc_log->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($esbc_log_list->Pager)) $esbc_log_list->Pager = new PrevNextPager($esbc_log_list->StartRec, $esbc_log_list->DisplayRecs, $esbc_log_list->TotalRecs, $esbc_log_list->AutoHidePager) ?>
<?php if ($esbc_log_list->Pager->RecordCount > 0 && $esbc_log_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($esbc_log_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" href="<?php echo $esbc_log_list->pageUrl() ?>start=<?php echo $esbc_log_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($esbc_log_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" href="<?php echo $esbc_log_list->pageUrl() ?>start=<?php echo $esbc_log_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $esbc_log_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($esbc_log_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" href="<?php echo $esbc_log_list->pageUrl() ?>start=<?php echo $esbc_log_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($esbc_log_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" href="<?php echo $esbc_log_list->pageUrl() ?>start=<?php echo $esbc_log_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $esbc_log_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($esbc_log_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $esbc_log_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $esbc_log_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $esbc_log_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($esbc_log_list->TotalRecs > 0 && (!$esbc_log_list->AutoHidePageSizeSelector || $esbc_log_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="esbc_log">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->Phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="10"<?php if ($esbc_log_list->DisplayRecs == 10) { ?> selected<?php } ?>>10</option>
<option value="20"<?php if ($esbc_log_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="50"<?php if ($esbc_log_list->DisplayRecs == 50) { ?> selected<?php } ?>>50</option>
<option value="ALL"<?php if ($esbc_log->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php
	foreach ($esbc_log_list->OtherOptions as &$option)
		$option->render("body", "bottom");
?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($esbc_log_list->TotalRecs == 0 && !$esbc_log->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php
	foreach ($esbc_log_list->OtherOptions as &$option) {
		$option->ButtonClass = "";
		$option->render("body", "");
	}
?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$esbc_log_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$esbc_log->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$esbc_log_list->terminate();
?>
