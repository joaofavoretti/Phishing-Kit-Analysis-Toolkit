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
$esbc_contract_list = new esbc_contract_list();

// Run the page
$esbc_contract_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$esbc_contract_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$esbc_contract->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fesbc_contractlist = currentForm = new ew.Form("fesbc_contractlist", "list");
fesbc_contractlist.formKeyCountName = '<?php echo $esbc_contract_list->FormKeyCountName ?>';

// Form_CustomValidate event
fesbc_contractlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fesbc_contractlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fesbc_contractlistsrch = currentSearchForm = new ew.Form("fesbc_contractlistsrch");

// Filters
fesbc_contractlistsrch.filterList = <?php echo $esbc_contract_list->getFilterList() ?>;
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$esbc_contract->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($esbc_contract_list->TotalRecs > 0 && $esbc_contract_list->ExportOptions->visible()) { ?>
<?php $esbc_contract_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($esbc_contract_list->ImportOptions->visible()) { ?>
<?php $esbc_contract_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($esbc_contract_list->SearchOptions->visible()) { ?>
<?php $esbc_contract_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($esbc_contract_list->FilterOptions->visible()) { ?>
<?php $esbc_contract_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$esbc_contract_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$esbc_contract->isExport() && !$esbc_contract->CurrentAction) { ?>
<form name="fesbc_contractlistsrch" id="fesbc_contractlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($esbc_contract_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fesbc_contractlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="esbc_contract">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($esbc_contract_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->Phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($esbc_contract_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->Phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $esbc_contract_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($esbc_contract_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->Phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($esbc_contract_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->Phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($esbc_contract_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->Phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($esbc_contract_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->Phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $esbc_contract_list->showPageHeader(); ?>
<?php
$esbc_contract_list->showMessage();
?>
<?php if ($esbc_contract_list->TotalRecs > 0 || $esbc_contract->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($esbc_contract_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> esbc_contract">
<form name="fesbc_contractlist" id="fesbc_contractlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($esbc_contract_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $esbc_contract_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="esbc_contract">
<input type="hidden" name="exporttype" id="exporttype" value="">
<div id="gmp_esbc_contract" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($esbc_contract_list->TotalRecs > 0 || $esbc_contract->isGridEdit()) { ?>
<table id="tbl_esbc_contractlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$esbc_contract_list->RowType = ROWTYPE_HEADER;

// Render list options
$esbc_contract_list->renderListOptions();

// Render list options (header, left)
$esbc_contract_list->ListOptions->render("header", "left");
?>
<?php if ($esbc_contract->con_addr->Visible) { // con_addr ?>
	<?php if ($esbc_contract->sortUrl($esbc_contract->con_addr) == "") { ?>
		<th data-name="con_addr" class="<?php echo $esbc_contract->con_addr->headerCellClass() ?>"><div id="elh_esbc_contract_con_addr" class="esbc_contract_con_addr"><div class="ew-table-header-caption"><?php echo $esbc_contract->con_addr->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="con_addr" class="<?php echo $esbc_contract->con_addr->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $esbc_contract->SortUrl($esbc_contract->con_addr) ?>',1);"><div id="elh_esbc_contract_con_addr" class="esbc_contract_con_addr">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $esbc_contract->con_addr->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($esbc_contract->con_addr->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($esbc_contract->con_addr->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($esbc_contract->con_owner->Visible) { // con_owner ?>
	<?php if ($esbc_contract->sortUrl($esbc_contract->con_owner) == "") { ?>
		<th data-name="con_owner" class="<?php echo $esbc_contract->con_owner->headerCellClass() ?>"><div id="elh_esbc_contract_con_owner" class="esbc_contract_con_owner"><div class="ew-table-header-caption"><?php echo $esbc_contract->con_owner->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="con_owner" class="<?php echo $esbc_contract->con_owner->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $esbc_contract->SortUrl($esbc_contract->con_owner) ?>',1);"><div id="elh_esbc_contract_con_owner" class="esbc_contract_con_owner">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $esbc_contract->con_owner->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($esbc_contract->con_owner->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($esbc_contract->con_owner->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($esbc_contract->date_add->Visible) { // date_add ?>
	<?php if ($esbc_contract->sortUrl($esbc_contract->date_add) == "") { ?>
		<th data-name="date_add" class="<?php echo $esbc_contract->date_add->headerCellClass() ?>"><div id="elh_esbc_contract_date_add" class="esbc_contract_date_add"><div class="ew-table-header-caption"><?php echo $esbc_contract->date_add->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="date_add" class="<?php echo $esbc_contract->date_add->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $esbc_contract->SortUrl($esbc_contract->date_add) ?>',1);"><div id="elh_esbc_contract_date_add" class="esbc_contract_date_add">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $esbc_contract->date_add->caption() ?></span><span class="ew-table-header-sort"><?php if ($esbc_contract->date_add->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($esbc_contract->date_add->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$esbc_contract_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($esbc_contract->ExportAll && $esbc_contract->isExport()) {
	$esbc_contract_list->StopRec = $esbc_contract_list->TotalRecs;
} else {

	// Set the last record to display
	if ($esbc_contract_list->TotalRecs > $esbc_contract_list->StartRec + $esbc_contract_list->DisplayRecs - 1)
		$esbc_contract_list->StopRec = $esbc_contract_list->StartRec + $esbc_contract_list->DisplayRecs - 1;
	else
		$esbc_contract_list->StopRec = $esbc_contract_list->TotalRecs;
}
$esbc_contract_list->RecCnt = $esbc_contract_list->StartRec - 1;
if ($esbc_contract_list->Recordset && !$esbc_contract_list->Recordset->EOF) {
	$esbc_contract_list->Recordset->moveFirst();
	$selectLimit = $esbc_contract_list->UseSelectLimit;
	if (!$selectLimit && $esbc_contract_list->StartRec > 1)
		$esbc_contract_list->Recordset->move($esbc_contract_list->StartRec - 1);
} elseif (!$esbc_contract->AllowAddDeleteRow && $esbc_contract_list->StopRec == 0) {
	$esbc_contract_list->StopRec = $esbc_contract->GridAddRowCount;
}

// Initialize aggregate
$esbc_contract->RowType = ROWTYPE_AGGREGATEINIT;
$esbc_contract->resetAttributes();
$esbc_contract_list->renderRow();
while ($esbc_contract_list->RecCnt < $esbc_contract_list->StopRec) {
	$esbc_contract_list->RecCnt++;
	if ($esbc_contract_list->RecCnt >= $esbc_contract_list->StartRec) {
		$esbc_contract_list->RowCnt++;

		// Set up key count
		$esbc_contract_list->KeyCount = $esbc_contract_list->RowIndex;

		// Init row class and style
		$esbc_contract->resetAttributes();
		$esbc_contract->CssClass = "";
		if ($esbc_contract->isGridAdd()) {
		} else {
			$esbc_contract_list->loadRowValues($esbc_contract_list->Recordset); // Load row values
		}
		$esbc_contract->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$esbc_contract->RowAttrs = array_merge($esbc_contract->RowAttrs, array('data-rowindex'=>$esbc_contract_list->RowCnt, 'id'=>'r' . $esbc_contract_list->RowCnt . '_esbc_contract', 'data-rowtype'=>$esbc_contract->RowType));

		// Render row
		$esbc_contract_list->renderRow();

		// Render list options
		$esbc_contract_list->renderListOptions();
?>
	<tr<?php echo $esbc_contract->rowAttributes() ?>>
<?php

// Render list options (body, left)
$esbc_contract_list->ListOptions->render("body", "left", $esbc_contract_list->RowCnt);
?>
	<?php if ($esbc_contract->con_addr->Visible) { // con_addr ?>
		<td data-name="con_addr"<?php echo $esbc_contract->con_addr->cellAttributes() ?>>
<span id="el<?php echo $esbc_contract_list->RowCnt ?>_esbc_contract_con_addr" class="esbc_contract_con_addr">
<span<?php echo $esbc_contract->con_addr->viewAttributes() ?>>
<?php echo $esbc_contract->con_addr->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($esbc_contract->con_owner->Visible) { // con_owner ?>
		<td data-name="con_owner"<?php echo $esbc_contract->con_owner->cellAttributes() ?>>
<span id="el<?php echo $esbc_contract_list->RowCnt ?>_esbc_contract_con_owner" class="esbc_contract_con_owner">
<span<?php echo $esbc_contract->con_owner->viewAttributes() ?>>
<?php echo $esbc_contract->con_owner->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($esbc_contract->date_add->Visible) { // date_add ?>
		<td data-name="date_add"<?php echo $esbc_contract->date_add->cellAttributes() ?>>
<span id="el<?php echo $esbc_contract_list->RowCnt ?>_esbc_contract_date_add" class="esbc_contract_date_add">
<span<?php echo $esbc_contract->date_add->viewAttributes() ?>>
<?php echo $esbc_contract->date_add->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$esbc_contract_list->ListOptions->render("body", "right", $esbc_contract_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$esbc_contract->isGridAdd())
		$esbc_contract_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$esbc_contract->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($esbc_contract_list->Recordset)
	$esbc_contract_list->Recordset->Close();
?>
<?php if (!$esbc_contract->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$esbc_contract->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($esbc_contract_list->Pager)) $esbc_contract_list->Pager = new PrevNextPager($esbc_contract_list->StartRec, $esbc_contract_list->DisplayRecs, $esbc_contract_list->TotalRecs, $esbc_contract_list->AutoHidePager) ?>
<?php if ($esbc_contract_list->Pager->RecordCount > 0 && $esbc_contract_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($esbc_contract_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" href="<?php echo $esbc_contract_list->pageUrl() ?>start=<?php echo $esbc_contract_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($esbc_contract_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" href="<?php echo $esbc_contract_list->pageUrl() ?>start=<?php echo $esbc_contract_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $esbc_contract_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($esbc_contract_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" href="<?php echo $esbc_contract_list->pageUrl() ?>start=<?php echo $esbc_contract_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($esbc_contract_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" href="<?php echo $esbc_contract_list->pageUrl() ?>start=<?php echo $esbc_contract_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $esbc_contract_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($esbc_contract_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $esbc_contract_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $esbc_contract_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $esbc_contract_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($esbc_contract_list->TotalRecs > 0 && (!$esbc_contract_list->AutoHidePageSizeSelector || $esbc_contract_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="esbc_contract">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->Phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="10"<?php if ($esbc_contract_list->DisplayRecs == 10) { ?> selected<?php } ?>>10</option>
<option value="20"<?php if ($esbc_contract_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="50"<?php if ($esbc_contract_list->DisplayRecs == 50) { ?> selected<?php } ?>>50</option>
<option value="ALL"<?php if ($esbc_contract->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php
	foreach ($esbc_contract_list->OtherOptions as &$option)
		$option->render("body", "bottom");
?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($esbc_contract_list->TotalRecs == 0 && !$esbc_contract->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php
	foreach ($esbc_contract_list->OtherOptions as &$option) {
		$option->ButtonClass = "";
		$option->render("body", "");
	}
?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$esbc_contract_list->showPageFooter();
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
$esbc_contract_list->terminate();
?>
