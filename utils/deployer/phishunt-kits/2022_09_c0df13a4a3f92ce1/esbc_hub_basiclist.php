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
$esbc_hub_basic_list = new esbc_hub_basic_list();

// Run the page
$esbc_hub_basic_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$esbc_hub_basic_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$esbc_hub_basic->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fesbc_hub_basiclist = currentForm = new ew.Form("fesbc_hub_basiclist", "list");
fesbc_hub_basiclist.formKeyCountName = '<?php echo $esbc_hub_basic_list->FormKeyCountName ?>';

// Form_CustomValidate event
fesbc_hub_basiclist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fesbc_hub_basiclist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fesbc_hub_basiclist.lists["x_HOST_INDEX"] = <?php echo $esbc_hub_basic_list->HOST_INDEX->Lookup->toClientList() ?>;
fesbc_hub_basiclist.lists["x_HOST_INDEX"].options = <?php echo JsonEncode($esbc_hub_basic_list->HOST_INDEX->lookupOptions()) ?>;

// Form object for search
var fesbc_hub_basiclistsrch = currentSearchForm = new ew.Form("fesbc_hub_basiclistsrch");

// Filters
fesbc_hub_basiclistsrch.filterList = <?php echo $esbc_hub_basic_list->getFilterList() ?>;
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$esbc_hub_basic->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($esbc_hub_basic_list->TotalRecs > 0 && $esbc_hub_basic_list->ExportOptions->visible()) { ?>
<?php $esbc_hub_basic_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($esbc_hub_basic_list->ImportOptions->visible()) { ?>
<?php $esbc_hub_basic_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($esbc_hub_basic_list->SearchOptions->visible()) { ?>
<?php $esbc_hub_basic_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($esbc_hub_basic_list->FilterOptions->visible()) { ?>
<?php $esbc_hub_basic_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$esbc_hub_basic_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$esbc_hub_basic->isExport() && !$esbc_hub_basic->CurrentAction) { ?>
<form name="fesbc_hub_basiclistsrch" id="fesbc_hub_basiclistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($esbc_hub_basic_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fesbc_hub_basiclistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="esbc_hub_basic">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($esbc_hub_basic_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->Phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($esbc_hub_basic_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->Phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $esbc_hub_basic_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($esbc_hub_basic_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->Phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($esbc_hub_basic_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->Phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($esbc_hub_basic_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->Phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($esbc_hub_basic_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->Phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $esbc_hub_basic_list->showPageHeader(); ?>
<?php
$esbc_hub_basic_list->showMessage();
?>
<?php if ($esbc_hub_basic_list->TotalRecs > 0 || $esbc_hub_basic->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($esbc_hub_basic_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> esbc_hub_basic">
<form name="fesbc_hub_basiclist" id="fesbc_hub_basiclist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($esbc_hub_basic_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $esbc_hub_basic_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="esbc_hub_basic">
<input type="hidden" name="exporttype" id="exporttype" value="">
<div id="gmp_esbc_hub_basic" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($esbc_hub_basic_list->TotalRecs > 0 || $esbc_hub_basic->isGridEdit()) { ?>
<table id="tbl_esbc_hub_basiclist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$esbc_hub_basic_list->RowType = ROWTYPE_HEADER;

// Render list options
$esbc_hub_basic_list->renderListOptions();

// Render list options (header, left)
$esbc_hub_basic_list->ListOptions->render("header", "left");
?>
<?php if ($esbc_hub_basic->HUB_INDEX->Visible) { // HUB_INDEX ?>
	<?php if ($esbc_hub_basic->sortUrl($esbc_hub_basic->HUB_INDEX) == "") { ?>
		<th data-name="HUB_INDEX" class="<?php echo $esbc_hub_basic->HUB_INDEX->headerCellClass() ?>"><div id="elh_esbc_hub_basic_HUB_INDEX" class="esbc_hub_basic_HUB_INDEX"><div class="ew-table-header-caption"><?php echo $esbc_hub_basic->HUB_INDEX->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HUB_INDEX" class="<?php echo $esbc_hub_basic->HUB_INDEX->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $esbc_hub_basic->SortUrl($esbc_hub_basic->HUB_INDEX) ?>',1);"><div id="elh_esbc_hub_basic_HUB_INDEX" class="esbc_hub_basic_HUB_INDEX">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $esbc_hub_basic->HUB_INDEX->caption() ?></span><span class="ew-table-header-sort"><?php if ($esbc_hub_basic->HUB_INDEX->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($esbc_hub_basic->HUB_INDEX->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($esbc_hub_basic->HOST_INDEX->Visible) { // HOST_INDEX ?>
	<?php if ($esbc_hub_basic->sortUrl($esbc_hub_basic->HOST_INDEX) == "") { ?>
		<th data-name="HOST_INDEX" class="<?php echo $esbc_hub_basic->HOST_INDEX->headerCellClass() ?>"><div id="elh_esbc_hub_basic_HOST_INDEX" class="esbc_hub_basic_HOST_INDEX"><div class="ew-table-header-caption"><?php echo $esbc_hub_basic->HOST_INDEX->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HOST_INDEX" class="<?php echo $esbc_hub_basic->HOST_INDEX->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $esbc_hub_basic->SortUrl($esbc_hub_basic->HOST_INDEX) ?>',1);"><div id="elh_esbc_hub_basic_HOST_INDEX" class="esbc_hub_basic_HOST_INDEX">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $esbc_hub_basic->HOST_INDEX->caption() ?></span><span class="ew-table-header-sort"><?php if ($esbc_hub_basic->HOST_INDEX->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($esbc_hub_basic->HOST_INDEX->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($esbc_hub_basic->HUB_NAME->Visible) { // HUB_NAME ?>
	<?php if ($esbc_hub_basic->sortUrl($esbc_hub_basic->HUB_NAME) == "") { ?>
		<th data-name="HUB_NAME" class="<?php echo $esbc_hub_basic->HUB_NAME->headerCellClass() ?>"><div id="elh_esbc_hub_basic_HUB_NAME" class="esbc_hub_basic_HUB_NAME"><div class="ew-table-header-caption"><?php echo $esbc_hub_basic->HUB_NAME->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HUB_NAME" class="<?php echo $esbc_hub_basic->HUB_NAME->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $esbc_hub_basic->SortUrl($esbc_hub_basic->HUB_NAME) ?>',1);"><div id="elh_esbc_hub_basic_HUB_NAME" class="esbc_hub_basic_HUB_NAME">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $esbc_hub_basic->HUB_NAME->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($esbc_hub_basic->HUB_NAME->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($esbc_hub_basic->HUB_NAME->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($esbc_hub_basic->Create_Date->Visible) { // Create_Date ?>
	<?php if ($esbc_hub_basic->sortUrl($esbc_hub_basic->Create_Date) == "") { ?>
		<th data-name="Create_Date" class="<?php echo $esbc_hub_basic->Create_Date->headerCellClass() ?>"><div id="elh_esbc_hub_basic_Create_Date" class="esbc_hub_basic_Create_Date"><div class="ew-table-header-caption"><?php echo $esbc_hub_basic->Create_Date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Create_Date" class="<?php echo $esbc_hub_basic->Create_Date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $esbc_hub_basic->SortUrl($esbc_hub_basic->Create_Date) ?>',1);"><div id="elh_esbc_hub_basic_Create_Date" class="esbc_hub_basic_Create_Date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $esbc_hub_basic->Create_Date->caption() ?></span><span class="ew-table-header-sort"><?php if ($esbc_hub_basic->Create_Date->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($esbc_hub_basic->Create_Date->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$esbc_hub_basic_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($esbc_hub_basic->ExportAll && $esbc_hub_basic->isExport()) {
	$esbc_hub_basic_list->StopRec = $esbc_hub_basic_list->TotalRecs;
} else {

	// Set the last record to display
	if ($esbc_hub_basic_list->TotalRecs > $esbc_hub_basic_list->StartRec + $esbc_hub_basic_list->DisplayRecs - 1)
		$esbc_hub_basic_list->StopRec = $esbc_hub_basic_list->StartRec + $esbc_hub_basic_list->DisplayRecs - 1;
	else
		$esbc_hub_basic_list->StopRec = $esbc_hub_basic_list->TotalRecs;
}
$esbc_hub_basic_list->RecCnt = $esbc_hub_basic_list->StartRec - 1;
if ($esbc_hub_basic_list->Recordset && !$esbc_hub_basic_list->Recordset->EOF) {
	$esbc_hub_basic_list->Recordset->moveFirst();
	$selectLimit = $esbc_hub_basic_list->UseSelectLimit;
	if (!$selectLimit && $esbc_hub_basic_list->StartRec > 1)
		$esbc_hub_basic_list->Recordset->move($esbc_hub_basic_list->StartRec - 1);
} elseif (!$esbc_hub_basic->AllowAddDeleteRow && $esbc_hub_basic_list->StopRec == 0) {
	$esbc_hub_basic_list->StopRec = $esbc_hub_basic->GridAddRowCount;
}

// Initialize aggregate
$esbc_hub_basic->RowType = ROWTYPE_AGGREGATEINIT;
$esbc_hub_basic->resetAttributes();
$esbc_hub_basic_list->renderRow();
while ($esbc_hub_basic_list->RecCnt < $esbc_hub_basic_list->StopRec) {
	$esbc_hub_basic_list->RecCnt++;
	if ($esbc_hub_basic_list->RecCnt >= $esbc_hub_basic_list->StartRec) {
		$esbc_hub_basic_list->RowCnt++;

		// Set up key count
		$esbc_hub_basic_list->KeyCount = $esbc_hub_basic_list->RowIndex;

		// Init row class and style
		$esbc_hub_basic->resetAttributes();
		$esbc_hub_basic->CssClass = "";
		if ($esbc_hub_basic->isGridAdd()) {
		} else {
			$esbc_hub_basic_list->loadRowValues($esbc_hub_basic_list->Recordset); // Load row values
		}
		$esbc_hub_basic->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$esbc_hub_basic->RowAttrs = array_merge($esbc_hub_basic->RowAttrs, array('data-rowindex'=>$esbc_hub_basic_list->RowCnt, 'id'=>'r' . $esbc_hub_basic_list->RowCnt . '_esbc_hub_basic', 'data-rowtype'=>$esbc_hub_basic->RowType));

		// Render row
		$esbc_hub_basic_list->renderRow();

		// Render list options
		$esbc_hub_basic_list->renderListOptions();
?>
	<tr<?php echo $esbc_hub_basic->rowAttributes() ?>>
<?php

// Render list options (body, left)
$esbc_hub_basic_list->ListOptions->render("body", "left", $esbc_hub_basic_list->RowCnt);
?>
	<?php if ($esbc_hub_basic->HUB_INDEX->Visible) { // HUB_INDEX ?>
		<td data-name="HUB_INDEX"<?php echo $esbc_hub_basic->HUB_INDEX->cellAttributes() ?>>
<span id="el<?php echo $esbc_hub_basic_list->RowCnt ?>_esbc_hub_basic_HUB_INDEX" class="esbc_hub_basic_HUB_INDEX">
<span<?php echo $esbc_hub_basic->HUB_INDEX->viewAttributes() ?>>
<?php echo $esbc_hub_basic->HUB_INDEX->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($esbc_hub_basic->HOST_INDEX->Visible) { // HOST_INDEX ?>
		<td data-name="HOST_INDEX"<?php echo $esbc_hub_basic->HOST_INDEX->cellAttributes() ?>>
<span id="el<?php echo $esbc_hub_basic_list->RowCnt ?>_esbc_hub_basic_HOST_INDEX" class="esbc_hub_basic_HOST_INDEX">
<span<?php echo $esbc_hub_basic->HOST_INDEX->viewAttributes() ?>>
<?php echo $esbc_hub_basic->HOST_INDEX->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($esbc_hub_basic->HUB_NAME->Visible) { // HUB_NAME ?>
		<td data-name="HUB_NAME"<?php echo $esbc_hub_basic->HUB_NAME->cellAttributes() ?>>
<span id="el<?php echo $esbc_hub_basic_list->RowCnt ?>_esbc_hub_basic_HUB_NAME" class="esbc_hub_basic_HUB_NAME">
<span<?php echo $esbc_hub_basic->HUB_NAME->viewAttributes() ?>>
<?php echo $esbc_hub_basic->HUB_NAME->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($esbc_hub_basic->Create_Date->Visible) { // Create_Date ?>
		<td data-name="Create_Date"<?php echo $esbc_hub_basic->Create_Date->cellAttributes() ?>>
<span id="el<?php echo $esbc_hub_basic_list->RowCnt ?>_esbc_hub_basic_Create_Date" class="esbc_hub_basic_Create_Date">
<span<?php echo $esbc_hub_basic->Create_Date->viewAttributes() ?>>
<?php echo $esbc_hub_basic->Create_Date->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$esbc_hub_basic_list->ListOptions->render("body", "right", $esbc_hub_basic_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$esbc_hub_basic->isGridAdd())
		$esbc_hub_basic_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$esbc_hub_basic->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($esbc_hub_basic_list->Recordset)
	$esbc_hub_basic_list->Recordset->Close();
?>
<?php if (!$esbc_hub_basic->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$esbc_hub_basic->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($esbc_hub_basic_list->Pager)) $esbc_hub_basic_list->Pager = new PrevNextPager($esbc_hub_basic_list->StartRec, $esbc_hub_basic_list->DisplayRecs, $esbc_hub_basic_list->TotalRecs, $esbc_hub_basic_list->AutoHidePager) ?>
<?php if ($esbc_hub_basic_list->Pager->RecordCount > 0 && $esbc_hub_basic_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($esbc_hub_basic_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" href="<?php echo $esbc_hub_basic_list->pageUrl() ?>start=<?php echo $esbc_hub_basic_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($esbc_hub_basic_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" href="<?php echo $esbc_hub_basic_list->pageUrl() ?>start=<?php echo $esbc_hub_basic_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $esbc_hub_basic_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($esbc_hub_basic_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" href="<?php echo $esbc_hub_basic_list->pageUrl() ?>start=<?php echo $esbc_hub_basic_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($esbc_hub_basic_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" href="<?php echo $esbc_hub_basic_list->pageUrl() ?>start=<?php echo $esbc_hub_basic_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $esbc_hub_basic_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($esbc_hub_basic_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $esbc_hub_basic_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $esbc_hub_basic_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $esbc_hub_basic_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($esbc_hub_basic_list->TotalRecs > 0 && (!$esbc_hub_basic_list->AutoHidePageSizeSelector || $esbc_hub_basic_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="esbc_hub_basic">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->Phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="10"<?php if ($esbc_hub_basic_list->DisplayRecs == 10) { ?> selected<?php } ?>>10</option>
<option value="20"<?php if ($esbc_hub_basic_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="50"<?php if ($esbc_hub_basic_list->DisplayRecs == 50) { ?> selected<?php } ?>>50</option>
<option value="ALL"<?php if ($esbc_hub_basic->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php
	foreach ($esbc_hub_basic_list->OtherOptions as &$option)
		$option->render("body", "bottom");
?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($esbc_hub_basic_list->TotalRecs == 0 && !$esbc_hub_basic->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php
	foreach ($esbc_hub_basic_list->OtherOptions as &$option) {
		$option->ButtonClass = "";
		$option->render("body", "");
	}
?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$esbc_hub_basic_list->showPageFooter();
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
$esbc_hub_basic_list->terminate();
?>
