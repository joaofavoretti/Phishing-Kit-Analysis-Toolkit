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
$esbc_geth_par_list = new esbc_geth_par_list();

// Run the page
$esbc_geth_par_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$esbc_geth_par_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$esbc_geth_par->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fesbc_geth_parlist = currentForm = new ew.Form("fesbc_geth_parlist", "list");
fesbc_geth_parlist.formKeyCountName = '<?php echo $esbc_geth_par_list->FormKeyCountName ?>';

// Form_CustomValidate event
fesbc_geth_parlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fesbc_geth_parlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fesbc_geth_parlistsrch = currentSearchForm = new ew.Form("fesbc_geth_parlistsrch");

// Filters
fesbc_geth_parlistsrch.filterList = <?php echo $esbc_geth_par_list->getFilterList() ?>;
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$esbc_geth_par->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($esbc_geth_par_list->TotalRecs > 0 && $esbc_geth_par_list->ExportOptions->visible()) { ?>
<?php $esbc_geth_par_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($esbc_geth_par_list->ImportOptions->visible()) { ?>
<?php $esbc_geth_par_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($esbc_geth_par_list->SearchOptions->visible()) { ?>
<?php $esbc_geth_par_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($esbc_geth_par_list->FilterOptions->visible()) { ?>
<?php $esbc_geth_par_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$esbc_geth_par_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$esbc_geth_par->isExport() && !$esbc_geth_par->CurrentAction) { ?>
<form name="fesbc_geth_parlistsrch" id="fesbc_geth_parlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($esbc_geth_par_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fesbc_geth_parlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="esbc_geth_par">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($esbc_geth_par_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->Phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($esbc_geth_par_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->Phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $esbc_geth_par_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($esbc_geth_par_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->Phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($esbc_geth_par_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->Phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($esbc_geth_par_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->Phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($esbc_geth_par_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->Phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $esbc_geth_par_list->showPageHeader(); ?>
<?php
$esbc_geth_par_list->showMessage();
?>
<?php if ($esbc_geth_par_list->TotalRecs > 0 || $esbc_geth_par->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($esbc_geth_par_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> esbc_geth_par">
<form name="fesbc_geth_parlist" id="fesbc_geth_parlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($esbc_geth_par_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $esbc_geth_par_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="esbc_geth_par">
<input type="hidden" name="exporttype" id="exporttype" value="">
<div id="gmp_esbc_geth_par" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($esbc_geth_par_list->TotalRecs > 0 || $esbc_geth_par->isGridEdit()) { ?>
<table id="tbl_esbc_geth_parlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$esbc_geth_par_list->RowType = ROWTYPE_HEADER;

// Render list options
$esbc_geth_par_list->renderListOptions();

// Render list options (header, left)
$esbc_geth_par_list->ListOptions->render("header", "left");
?>
<?php if ($esbc_geth_par->GETH_INDEX->Visible) { // GETH_INDEX ?>
	<?php if ($esbc_geth_par->sortUrl($esbc_geth_par->GETH_INDEX) == "") { ?>
		<th data-name="GETH_INDEX" class="<?php echo $esbc_geth_par->GETH_INDEX->headerCellClass() ?>"><div id="elh_esbc_geth_par_GETH_INDEX" class="esbc_geth_par_GETH_INDEX"><div class="ew-table-header-caption"><?php echo $esbc_geth_par->GETH_INDEX->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GETH_INDEX" class="<?php echo $esbc_geth_par->GETH_INDEX->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $esbc_geth_par->SortUrl($esbc_geth_par->GETH_INDEX) ?>',1);"><div id="elh_esbc_geth_par_GETH_INDEX" class="esbc_geth_par_GETH_INDEX">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $esbc_geth_par->GETH_INDEX->caption() ?></span><span class="ew-table-header-sort"><?php if ($esbc_geth_par->GETH_INDEX->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($esbc_geth_par->GETH_INDEX->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($esbc_geth_par->HOST_TYPE->Visible) { // HOST_TYPE ?>
	<?php if ($esbc_geth_par->sortUrl($esbc_geth_par->HOST_TYPE) == "") { ?>
		<th data-name="HOST_TYPE" class="<?php echo $esbc_geth_par->HOST_TYPE->headerCellClass() ?>"><div id="elh_esbc_geth_par_HOST_TYPE" class="esbc_geth_par_HOST_TYPE"><div class="ew-table-header-caption"><?php echo $esbc_geth_par->HOST_TYPE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HOST_TYPE" class="<?php echo $esbc_geth_par->HOST_TYPE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $esbc_geth_par->SortUrl($esbc_geth_par->HOST_TYPE) ?>',1);"><div id="elh_esbc_geth_par_HOST_TYPE" class="esbc_geth_par_HOST_TYPE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $esbc_geth_par->HOST_TYPE->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($esbc_geth_par->HOST_TYPE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($esbc_geth_par->HOST_TYPE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($esbc_geth_par->GETH_PATH->Visible) { // GETH_PATH ?>
	<?php if ($esbc_geth_par->sortUrl($esbc_geth_par->GETH_PATH) == "") { ?>
		<th data-name="GETH_PATH" class="<?php echo $esbc_geth_par->GETH_PATH->headerCellClass() ?>"><div id="elh_esbc_geth_par_GETH_PATH" class="esbc_geth_par_GETH_PATH"><div class="ew-table-header-caption"><?php echo $esbc_geth_par->GETH_PATH->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GETH_PATH" class="<?php echo $esbc_geth_par->GETH_PATH->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $esbc_geth_par->SortUrl($esbc_geth_par->GETH_PATH) ?>',1);"><div id="elh_esbc_geth_par_GETH_PATH" class="esbc_geth_par_GETH_PATH">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $esbc_geth_par->GETH_PATH->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($esbc_geth_par->GETH_PATH->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($esbc_geth_par->GETH_PATH->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$esbc_geth_par_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($esbc_geth_par->ExportAll && $esbc_geth_par->isExport()) {
	$esbc_geth_par_list->StopRec = $esbc_geth_par_list->TotalRecs;
} else {

	// Set the last record to display
	if ($esbc_geth_par_list->TotalRecs > $esbc_geth_par_list->StartRec + $esbc_geth_par_list->DisplayRecs - 1)
		$esbc_geth_par_list->StopRec = $esbc_geth_par_list->StartRec + $esbc_geth_par_list->DisplayRecs - 1;
	else
		$esbc_geth_par_list->StopRec = $esbc_geth_par_list->TotalRecs;
}
$esbc_geth_par_list->RecCnt = $esbc_geth_par_list->StartRec - 1;
if ($esbc_geth_par_list->Recordset && !$esbc_geth_par_list->Recordset->EOF) {
	$esbc_geth_par_list->Recordset->moveFirst();
	$selectLimit = $esbc_geth_par_list->UseSelectLimit;
	if (!$selectLimit && $esbc_geth_par_list->StartRec > 1)
		$esbc_geth_par_list->Recordset->move($esbc_geth_par_list->StartRec - 1);
} elseif (!$esbc_geth_par->AllowAddDeleteRow && $esbc_geth_par_list->StopRec == 0) {
	$esbc_geth_par_list->StopRec = $esbc_geth_par->GridAddRowCount;
}

// Initialize aggregate
$esbc_geth_par->RowType = ROWTYPE_AGGREGATEINIT;
$esbc_geth_par->resetAttributes();
$esbc_geth_par_list->renderRow();
while ($esbc_geth_par_list->RecCnt < $esbc_geth_par_list->StopRec) {
	$esbc_geth_par_list->RecCnt++;
	if ($esbc_geth_par_list->RecCnt >= $esbc_geth_par_list->StartRec) {
		$esbc_geth_par_list->RowCnt++;

		// Set up key count
		$esbc_geth_par_list->KeyCount = $esbc_geth_par_list->RowIndex;

		// Init row class and style
		$esbc_geth_par->resetAttributes();
		$esbc_geth_par->CssClass = "";
		if ($esbc_geth_par->isGridAdd()) {
		} else {
			$esbc_geth_par_list->loadRowValues($esbc_geth_par_list->Recordset); // Load row values
		}
		$esbc_geth_par->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$esbc_geth_par->RowAttrs = array_merge($esbc_geth_par->RowAttrs, array('data-rowindex'=>$esbc_geth_par_list->RowCnt, 'id'=>'r' . $esbc_geth_par_list->RowCnt . '_esbc_geth_par', 'data-rowtype'=>$esbc_geth_par->RowType));

		// Render row
		$esbc_geth_par_list->renderRow();

		// Render list options
		$esbc_geth_par_list->renderListOptions();
?>
	<tr<?php echo $esbc_geth_par->rowAttributes() ?>>
<?php

// Render list options (body, left)
$esbc_geth_par_list->ListOptions->render("body", "left", $esbc_geth_par_list->RowCnt);
?>
	<?php if ($esbc_geth_par->GETH_INDEX->Visible) { // GETH_INDEX ?>
		<td data-name="GETH_INDEX"<?php echo $esbc_geth_par->GETH_INDEX->cellAttributes() ?>>
<span id="el<?php echo $esbc_geth_par_list->RowCnt ?>_esbc_geth_par_GETH_INDEX" class="esbc_geth_par_GETH_INDEX">
<span<?php echo $esbc_geth_par->GETH_INDEX->viewAttributes() ?>>
<?php echo $esbc_geth_par->GETH_INDEX->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($esbc_geth_par->HOST_TYPE->Visible) { // HOST_TYPE ?>
		<td data-name="HOST_TYPE"<?php echo $esbc_geth_par->HOST_TYPE->cellAttributes() ?>>
<span id="el<?php echo $esbc_geth_par_list->RowCnt ?>_esbc_geth_par_HOST_TYPE" class="esbc_geth_par_HOST_TYPE">
<span<?php echo $esbc_geth_par->HOST_TYPE->viewAttributes() ?>>
<?php echo $esbc_geth_par->HOST_TYPE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($esbc_geth_par->GETH_PATH->Visible) { // GETH_PATH ?>
		<td data-name="GETH_PATH"<?php echo $esbc_geth_par->GETH_PATH->cellAttributes() ?>>
<span id="el<?php echo $esbc_geth_par_list->RowCnt ?>_esbc_geth_par_GETH_PATH" class="esbc_geth_par_GETH_PATH">
<span<?php echo $esbc_geth_par->GETH_PATH->viewAttributes() ?>>
<?php echo $esbc_geth_par->GETH_PATH->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$esbc_geth_par_list->ListOptions->render("body", "right", $esbc_geth_par_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$esbc_geth_par->isGridAdd())
		$esbc_geth_par_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$esbc_geth_par->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($esbc_geth_par_list->Recordset)
	$esbc_geth_par_list->Recordset->Close();
?>
<?php if (!$esbc_geth_par->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$esbc_geth_par->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($esbc_geth_par_list->Pager)) $esbc_geth_par_list->Pager = new PrevNextPager($esbc_geth_par_list->StartRec, $esbc_geth_par_list->DisplayRecs, $esbc_geth_par_list->TotalRecs, $esbc_geth_par_list->AutoHidePager) ?>
<?php if ($esbc_geth_par_list->Pager->RecordCount > 0 && $esbc_geth_par_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($esbc_geth_par_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" href="<?php echo $esbc_geth_par_list->pageUrl() ?>start=<?php echo $esbc_geth_par_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($esbc_geth_par_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" href="<?php echo $esbc_geth_par_list->pageUrl() ?>start=<?php echo $esbc_geth_par_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $esbc_geth_par_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($esbc_geth_par_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" href="<?php echo $esbc_geth_par_list->pageUrl() ?>start=<?php echo $esbc_geth_par_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($esbc_geth_par_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" href="<?php echo $esbc_geth_par_list->pageUrl() ?>start=<?php echo $esbc_geth_par_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $esbc_geth_par_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($esbc_geth_par_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $esbc_geth_par_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $esbc_geth_par_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $esbc_geth_par_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($esbc_geth_par_list->TotalRecs > 0 && (!$esbc_geth_par_list->AutoHidePageSizeSelector || $esbc_geth_par_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="esbc_geth_par">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->Phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="10"<?php if ($esbc_geth_par_list->DisplayRecs == 10) { ?> selected<?php } ?>>10</option>
<option value="20"<?php if ($esbc_geth_par_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="50"<?php if ($esbc_geth_par_list->DisplayRecs == 50) { ?> selected<?php } ?>>50</option>
<option value="ALL"<?php if ($esbc_geth_par->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php
	foreach ($esbc_geth_par_list->OtherOptions as &$option)
		$option->render("body", "bottom");
?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($esbc_geth_par_list->TotalRecs == 0 && !$esbc_geth_par->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php
	foreach ($esbc_geth_par_list->OtherOptions as &$option) {
		$option->ButtonClass = "";
		$option->render("body", "");
	}
?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$esbc_geth_par_list->showPageFooter();
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
$esbc_geth_par_list->terminate();
?>
