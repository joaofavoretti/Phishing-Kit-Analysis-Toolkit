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
$esbc_genesis_list = new esbc_genesis_list();

// Run the page
$esbc_genesis_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$esbc_genesis_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$esbc_genesis->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fesbc_genesislist = currentForm = new ew.Form("fesbc_genesislist", "list");
fesbc_genesislist.formKeyCountName = '<?php echo $esbc_genesis_list->FormKeyCountName ?>';

// Form_CustomValidate event
fesbc_genesislist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fesbc_genesislist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fesbc_genesislistsrch = currentSearchForm = new ew.Form("fesbc_genesislistsrch");

// Filters
fesbc_genesislistsrch.filterList = <?php echo $esbc_genesis_list->getFilterList() ?>;
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$esbc_genesis->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($esbc_genesis_list->TotalRecs > 0 && $esbc_genesis_list->ExportOptions->visible()) { ?>
<?php $esbc_genesis_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($esbc_genesis_list->ImportOptions->visible()) { ?>
<?php $esbc_genesis_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($esbc_genesis_list->SearchOptions->visible()) { ?>
<?php $esbc_genesis_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($esbc_genesis_list->FilterOptions->visible()) { ?>
<?php $esbc_genesis_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$esbc_genesis_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$esbc_genesis->isExport() && !$esbc_genesis->CurrentAction) { ?>
<form name="fesbc_genesislistsrch" id="fesbc_genesislistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($esbc_genesis_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fesbc_genesislistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="esbc_genesis">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($esbc_genesis_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->Phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($esbc_genesis_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->Phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $esbc_genesis_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($esbc_genesis_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->Phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($esbc_genesis_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->Phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($esbc_genesis_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->Phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($esbc_genesis_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->Phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $esbc_genesis_list->showPageHeader(); ?>
<?php
$esbc_genesis_list->showMessage();
?>
<?php if ($esbc_genesis_list->TotalRecs > 0 || $esbc_genesis->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($esbc_genesis_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> esbc_genesis">
<form name="fesbc_genesislist" id="fesbc_genesislist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($esbc_genesis_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $esbc_genesis_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="esbc_genesis">
<input type="hidden" name="exporttype" id="exporttype" value="">
<div id="gmp_esbc_genesis" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($esbc_genesis_list->TotalRecs > 0 || $esbc_genesis->isGridEdit()) { ?>
<table id="tbl_esbc_genesislist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$esbc_genesis_list->RowType = ROWTYPE_HEADER;

// Render list options
$esbc_genesis_list->renderListOptions();

// Render list options (header, left)
$esbc_genesis_list->ListOptions->render("header", "left");
?>
<?php if ($esbc_genesis->GENESIS_INDEX->Visible) { // GENESIS_INDEX ?>
	<?php if ($esbc_genesis->sortUrl($esbc_genesis->GENESIS_INDEX) == "") { ?>
		<th data-name="GENESIS_INDEX" class="<?php echo $esbc_genesis->GENESIS_INDEX->headerCellClass() ?>"><div id="elh_esbc_genesis_GENESIS_INDEX" class="esbc_genesis_GENESIS_INDEX"><div class="ew-table-header-caption"><?php echo $esbc_genesis->GENESIS_INDEX->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GENESIS_INDEX" class="<?php echo $esbc_genesis->GENESIS_INDEX->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $esbc_genesis->SortUrl($esbc_genesis->GENESIS_INDEX) ?>',1);"><div id="elh_esbc_genesis_GENESIS_INDEX" class="esbc_genesis_GENESIS_INDEX">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $esbc_genesis->GENESIS_INDEX->caption() ?></span><span class="ew-table-header-sort"><?php if ($esbc_genesis->GENESIS_INDEX->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($esbc_genesis->GENESIS_INDEX->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($esbc_genesis->GENESIS_NAME->Visible) { // GENESIS_NAME ?>
	<?php if ($esbc_genesis->sortUrl($esbc_genesis->GENESIS_NAME) == "") { ?>
		<th data-name="GENESIS_NAME" class="<?php echo $esbc_genesis->GENESIS_NAME->headerCellClass() ?>"><div id="elh_esbc_genesis_GENESIS_NAME" class="esbc_genesis_GENESIS_NAME"><div class="ew-table-header-caption"><?php echo $esbc_genesis->GENESIS_NAME->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GENESIS_NAME" class="<?php echo $esbc_genesis->GENESIS_NAME->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $esbc_genesis->SortUrl($esbc_genesis->GENESIS_NAME) ?>',1);"><div id="elh_esbc_genesis_GENESIS_NAME" class="esbc_genesis_GENESIS_NAME">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $esbc_genesis->GENESIS_NAME->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($esbc_genesis->GENESIS_NAME->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($esbc_genesis->GENESIS_NAME->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($esbc_genesis->Create_Date->Visible) { // Create_Date ?>
	<?php if ($esbc_genesis->sortUrl($esbc_genesis->Create_Date) == "") { ?>
		<th data-name="Create_Date" class="<?php echo $esbc_genesis->Create_Date->headerCellClass() ?>"><div id="elh_esbc_genesis_Create_Date" class="esbc_genesis_Create_Date"><div class="ew-table-header-caption"><?php echo $esbc_genesis->Create_Date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Create_Date" class="<?php echo $esbc_genesis->Create_Date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $esbc_genesis->SortUrl($esbc_genesis->Create_Date) ?>',1);"><div id="elh_esbc_genesis_Create_Date" class="esbc_genesis_Create_Date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $esbc_genesis->Create_Date->caption() ?></span><span class="ew-table-header-sort"><?php if ($esbc_genesis->Create_Date->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($esbc_genesis->Create_Date->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$esbc_genesis_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($esbc_genesis->ExportAll && $esbc_genesis->isExport()) {
	$esbc_genesis_list->StopRec = $esbc_genesis_list->TotalRecs;
} else {

	// Set the last record to display
	if ($esbc_genesis_list->TotalRecs > $esbc_genesis_list->StartRec + $esbc_genesis_list->DisplayRecs - 1)
		$esbc_genesis_list->StopRec = $esbc_genesis_list->StartRec + $esbc_genesis_list->DisplayRecs - 1;
	else
		$esbc_genesis_list->StopRec = $esbc_genesis_list->TotalRecs;
}
$esbc_genesis_list->RecCnt = $esbc_genesis_list->StartRec - 1;
if ($esbc_genesis_list->Recordset && !$esbc_genesis_list->Recordset->EOF) {
	$esbc_genesis_list->Recordset->moveFirst();
	$selectLimit = $esbc_genesis_list->UseSelectLimit;
	if (!$selectLimit && $esbc_genesis_list->StartRec > 1)
		$esbc_genesis_list->Recordset->move($esbc_genesis_list->StartRec - 1);
} elseif (!$esbc_genesis->AllowAddDeleteRow && $esbc_genesis_list->StopRec == 0) {
	$esbc_genesis_list->StopRec = $esbc_genesis->GridAddRowCount;
}

// Initialize aggregate
$esbc_genesis->RowType = ROWTYPE_AGGREGATEINIT;
$esbc_genesis->resetAttributes();
$esbc_genesis_list->renderRow();
while ($esbc_genesis_list->RecCnt < $esbc_genesis_list->StopRec) {
	$esbc_genesis_list->RecCnt++;
	if ($esbc_genesis_list->RecCnt >= $esbc_genesis_list->StartRec) {
		$esbc_genesis_list->RowCnt++;

		// Set up key count
		$esbc_genesis_list->KeyCount = $esbc_genesis_list->RowIndex;

		// Init row class and style
		$esbc_genesis->resetAttributes();
		$esbc_genesis->CssClass = "";
		if ($esbc_genesis->isGridAdd()) {
		} else {
			$esbc_genesis_list->loadRowValues($esbc_genesis_list->Recordset); // Load row values
		}
		$esbc_genesis->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$esbc_genesis->RowAttrs = array_merge($esbc_genesis->RowAttrs, array('data-rowindex'=>$esbc_genesis_list->RowCnt, 'id'=>'r' . $esbc_genesis_list->RowCnt . '_esbc_genesis', 'data-rowtype'=>$esbc_genesis->RowType));

		// Render row
		$esbc_genesis_list->renderRow();

		// Render list options
		$esbc_genesis_list->renderListOptions();
?>
	<tr<?php echo $esbc_genesis->rowAttributes() ?>>
<?php

// Render list options (body, left)
$esbc_genesis_list->ListOptions->render("body", "left", $esbc_genesis_list->RowCnt);
?>
	<?php if ($esbc_genesis->GENESIS_INDEX->Visible) { // GENESIS_INDEX ?>
		<td data-name="GENESIS_INDEX"<?php echo $esbc_genesis->GENESIS_INDEX->cellAttributes() ?>>
<span id="el<?php echo $esbc_genesis_list->RowCnt ?>_esbc_genesis_GENESIS_INDEX" class="esbc_genesis_GENESIS_INDEX">
<span<?php echo $esbc_genesis->GENESIS_INDEX->viewAttributes() ?>>
<?php echo $esbc_genesis->GENESIS_INDEX->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($esbc_genesis->GENESIS_NAME->Visible) { // GENESIS_NAME ?>
		<td data-name="GENESIS_NAME"<?php echo $esbc_genesis->GENESIS_NAME->cellAttributes() ?>>
<span id="el<?php echo $esbc_genesis_list->RowCnt ?>_esbc_genesis_GENESIS_NAME" class="esbc_genesis_GENESIS_NAME">
<span<?php echo $esbc_genesis->GENESIS_NAME->viewAttributes() ?>>
<?php echo $esbc_genesis->GENESIS_NAME->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($esbc_genesis->Create_Date->Visible) { // Create_Date ?>
		<td data-name="Create_Date"<?php echo $esbc_genesis->Create_Date->cellAttributes() ?>>
<span id="el<?php echo $esbc_genesis_list->RowCnt ?>_esbc_genesis_Create_Date" class="esbc_genesis_Create_Date">
<span<?php echo $esbc_genesis->Create_Date->viewAttributes() ?>>
<?php echo $esbc_genesis->Create_Date->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$esbc_genesis_list->ListOptions->render("body", "right", $esbc_genesis_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$esbc_genesis->isGridAdd())
		$esbc_genesis_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$esbc_genesis->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($esbc_genesis_list->Recordset)
	$esbc_genesis_list->Recordset->Close();
?>
<?php if (!$esbc_genesis->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$esbc_genesis->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($esbc_genesis_list->Pager)) $esbc_genesis_list->Pager = new PrevNextPager($esbc_genesis_list->StartRec, $esbc_genesis_list->DisplayRecs, $esbc_genesis_list->TotalRecs, $esbc_genesis_list->AutoHidePager) ?>
<?php if ($esbc_genesis_list->Pager->RecordCount > 0 && $esbc_genesis_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($esbc_genesis_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" href="<?php echo $esbc_genesis_list->pageUrl() ?>start=<?php echo $esbc_genesis_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($esbc_genesis_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" href="<?php echo $esbc_genesis_list->pageUrl() ?>start=<?php echo $esbc_genesis_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $esbc_genesis_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($esbc_genesis_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" href="<?php echo $esbc_genesis_list->pageUrl() ?>start=<?php echo $esbc_genesis_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($esbc_genesis_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" href="<?php echo $esbc_genesis_list->pageUrl() ?>start=<?php echo $esbc_genesis_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $esbc_genesis_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($esbc_genesis_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $esbc_genesis_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $esbc_genesis_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $esbc_genesis_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($esbc_genesis_list->TotalRecs > 0 && (!$esbc_genesis_list->AutoHidePageSizeSelector || $esbc_genesis_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="esbc_genesis">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->Phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="10"<?php if ($esbc_genesis_list->DisplayRecs == 10) { ?> selected<?php } ?>>10</option>
<option value="20"<?php if ($esbc_genesis_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="50"<?php if ($esbc_genesis_list->DisplayRecs == 50) { ?> selected<?php } ?>>50</option>
<option value="ALL"<?php if ($esbc_genesis->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php
	foreach ($esbc_genesis_list->OtherOptions as &$option)
		$option->render("body", "bottom");
?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($esbc_genesis_list->TotalRecs == 0 && !$esbc_genesis->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php
	foreach ($esbc_genesis_list->OtherOptions as &$option) {
		$option->ButtonClass = "";
		$option->render("body", "");
	}
?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$esbc_genesis_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$esbc_genesis->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$esbc_genesis_list->terminate();
?>
