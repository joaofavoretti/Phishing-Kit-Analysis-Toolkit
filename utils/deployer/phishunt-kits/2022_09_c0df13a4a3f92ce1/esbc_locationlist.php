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
$esbc_location_list = new esbc_location_list();

// Run the page
$esbc_location_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$esbc_location_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$esbc_location->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fesbc_locationlist = currentForm = new ew.Form("fesbc_locationlist", "list");
fesbc_locationlist.formKeyCountName = '<?php echo $esbc_location_list->FormKeyCountName ?>';

// Form_CustomValidate event
fesbc_locationlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fesbc_locationlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fesbc_locationlistsrch = currentSearchForm = new ew.Form("fesbc_locationlistsrch");

// Filters
fesbc_locationlistsrch.filterList = <?php echo $esbc_location_list->getFilterList() ?>;
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$esbc_location->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($esbc_location_list->TotalRecs > 0 && $esbc_location_list->ExportOptions->visible()) { ?>
<?php $esbc_location_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($esbc_location_list->ImportOptions->visible()) { ?>
<?php $esbc_location_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($esbc_location_list->SearchOptions->visible()) { ?>
<?php $esbc_location_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($esbc_location_list->FilterOptions->visible()) { ?>
<?php $esbc_location_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$esbc_location_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$esbc_location->isExport() && !$esbc_location->CurrentAction) { ?>
<form name="fesbc_locationlistsrch" id="fesbc_locationlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($esbc_location_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fesbc_locationlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="esbc_location">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($esbc_location_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->Phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($esbc_location_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->Phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $esbc_location_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($esbc_location_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->Phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($esbc_location_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->Phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($esbc_location_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->Phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($esbc_location_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->Phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $esbc_location_list->showPageHeader(); ?>
<?php
$esbc_location_list->showMessage();
?>
<?php if ($esbc_location_list->TotalRecs > 0 || $esbc_location->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($esbc_location_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> esbc_location">
<form name="fesbc_locationlist" id="fesbc_locationlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($esbc_location_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $esbc_location_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="esbc_location">
<input type="hidden" name="exporttype" id="exporttype" value="">
<div id="gmp_esbc_location" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($esbc_location_list->TotalRecs > 0 || $esbc_location->isGridEdit()) { ?>
<table id="tbl_esbc_locationlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$esbc_location_list->RowType = ROWTYPE_HEADER;

// Render list options
$esbc_location_list->renderListOptions();

// Render list options (header, left)
$esbc_location_list->ListOptions->render("header", "left");
?>
<?php if ($esbc_location->L_index->Visible) { // L_index ?>
	<?php if ($esbc_location->sortUrl($esbc_location->L_index) == "") { ?>
		<th data-name="L_index" class="<?php echo $esbc_location->L_index->headerCellClass() ?>"><div id="elh_esbc_location_L_index" class="esbc_location_L_index"><div class="ew-table-header-caption"><?php echo $esbc_location->L_index->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="L_index" class="<?php echo $esbc_location->L_index->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $esbc_location->SortUrl($esbc_location->L_index) ?>',1);"><div id="elh_esbc_location_L_index" class="esbc_location_L_index">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $esbc_location->L_index->caption() ?></span><span class="ew-table-header-sort"><?php if ($esbc_location->L_index->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($esbc_location->L_index->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($esbc_location->VPS->Visible) { // VPS ?>
	<?php if ($esbc_location->sortUrl($esbc_location->VPS) == "") { ?>
		<th data-name="VPS" class="<?php echo $esbc_location->VPS->headerCellClass() ?>"><div id="elh_esbc_location_VPS" class="esbc_location_VPS"><div class="ew-table-header-caption"><?php echo $esbc_location->VPS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="VPS" class="<?php echo $esbc_location->VPS->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $esbc_location->SortUrl($esbc_location->VPS) ?>',1);"><div id="elh_esbc_location_VPS" class="esbc_location_VPS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $esbc_location->VPS->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($esbc_location->VPS->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($esbc_location->VPS->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($esbc_location->VPS_URL->Visible) { // VPS_URL ?>
	<?php if ($esbc_location->sortUrl($esbc_location->VPS_URL) == "") { ?>
		<th data-name="VPS_URL" class="<?php echo $esbc_location->VPS_URL->headerCellClass() ?>"><div id="elh_esbc_location_VPS_URL" class="esbc_location_VPS_URL"><div class="ew-table-header-caption"><?php echo $esbc_location->VPS_URL->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="VPS_URL" class="<?php echo $esbc_location->VPS_URL->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $esbc_location->SortUrl($esbc_location->VPS_URL) ?>',1);"><div id="elh_esbc_location_VPS_URL" class="esbc_location_VPS_URL">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $esbc_location->VPS_URL->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($esbc_location->VPS_URL->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($esbc_location->VPS_URL->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($esbc_location->L_Name->Visible) { // L_Name ?>
	<?php if ($esbc_location->sortUrl($esbc_location->L_Name) == "") { ?>
		<th data-name="L_Name" class="<?php echo $esbc_location->L_Name->headerCellClass() ?>"><div id="elh_esbc_location_L_Name" class="esbc_location_L_Name"><div class="ew-table-header-caption"><?php echo $esbc_location->L_Name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="L_Name" class="<?php echo $esbc_location->L_Name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $esbc_location->SortUrl($esbc_location->L_Name) ?>',1);"><div id="elh_esbc_location_L_Name" class="esbc_location_L_Name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $esbc_location->L_Name->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($esbc_location->L_Name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($esbc_location->L_Name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($esbc_location->L_Lat->Visible) { // L_Lat ?>
	<?php if ($esbc_location->sortUrl($esbc_location->L_Lat) == "") { ?>
		<th data-name="L_Lat" class="<?php echo $esbc_location->L_Lat->headerCellClass() ?>"><div id="elh_esbc_location_L_Lat" class="esbc_location_L_Lat"><div class="ew-table-header-caption"><?php echo $esbc_location->L_Lat->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="L_Lat" class="<?php echo $esbc_location->L_Lat->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $esbc_location->SortUrl($esbc_location->L_Lat) ?>',1);"><div id="elh_esbc_location_L_Lat" class="esbc_location_L_Lat">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $esbc_location->L_Lat->caption() ?></span><span class="ew-table-header-sort"><?php if ($esbc_location->L_Lat->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($esbc_location->L_Lat->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($esbc_location->L_Lon->Visible) { // L_Lon ?>
	<?php if ($esbc_location->sortUrl($esbc_location->L_Lon) == "") { ?>
		<th data-name="L_Lon" class="<?php echo $esbc_location->L_Lon->headerCellClass() ?>"><div id="elh_esbc_location_L_Lon" class="esbc_location_L_Lon"><div class="ew-table-header-caption"><?php echo $esbc_location->L_Lon->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="L_Lon" class="<?php echo $esbc_location->L_Lon->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $esbc_location->SortUrl($esbc_location->L_Lon) ?>',1);"><div id="elh_esbc_location_L_Lon" class="esbc_location_L_Lon">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $esbc_location->L_Lon->caption() ?></span><span class="ew-table-header-sort"><?php if ($esbc_location->L_Lon->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($esbc_location->L_Lon->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($esbc_location->Create_Date->Visible) { // Create_Date ?>
	<?php if ($esbc_location->sortUrl($esbc_location->Create_Date) == "") { ?>
		<th data-name="Create_Date" class="<?php echo $esbc_location->Create_Date->headerCellClass() ?>"><div id="elh_esbc_location_Create_Date" class="esbc_location_Create_Date"><div class="ew-table-header-caption"><?php echo $esbc_location->Create_Date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Create_Date" class="<?php echo $esbc_location->Create_Date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $esbc_location->SortUrl($esbc_location->Create_Date) ?>',1);"><div id="elh_esbc_location_Create_Date" class="esbc_location_Create_Date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $esbc_location->Create_Date->caption() ?></span><span class="ew-table-header-sort"><?php if ($esbc_location->Create_Date->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($esbc_location->Create_Date->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$esbc_location_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($esbc_location->ExportAll && $esbc_location->isExport()) {
	$esbc_location_list->StopRec = $esbc_location_list->TotalRecs;
} else {

	// Set the last record to display
	if ($esbc_location_list->TotalRecs > $esbc_location_list->StartRec + $esbc_location_list->DisplayRecs - 1)
		$esbc_location_list->StopRec = $esbc_location_list->StartRec + $esbc_location_list->DisplayRecs - 1;
	else
		$esbc_location_list->StopRec = $esbc_location_list->TotalRecs;
}
$esbc_location_list->RecCnt = $esbc_location_list->StartRec - 1;
if ($esbc_location_list->Recordset && !$esbc_location_list->Recordset->EOF) {
	$esbc_location_list->Recordset->moveFirst();
	$selectLimit = $esbc_location_list->UseSelectLimit;
	if (!$selectLimit && $esbc_location_list->StartRec > 1)
		$esbc_location_list->Recordset->move($esbc_location_list->StartRec - 1);
} elseif (!$esbc_location->AllowAddDeleteRow && $esbc_location_list->StopRec == 0) {
	$esbc_location_list->StopRec = $esbc_location->GridAddRowCount;
}

// Initialize aggregate
$esbc_location->RowType = ROWTYPE_AGGREGATEINIT;
$esbc_location->resetAttributes();
$esbc_location_list->renderRow();
while ($esbc_location_list->RecCnt < $esbc_location_list->StopRec) {
	$esbc_location_list->RecCnt++;
	if ($esbc_location_list->RecCnt >= $esbc_location_list->StartRec) {
		$esbc_location_list->RowCnt++;

		// Set up key count
		$esbc_location_list->KeyCount = $esbc_location_list->RowIndex;

		// Init row class and style
		$esbc_location->resetAttributes();
		$esbc_location->CssClass = "";
		if ($esbc_location->isGridAdd()) {
		} else {
			$esbc_location_list->loadRowValues($esbc_location_list->Recordset); // Load row values
		}
		$esbc_location->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$esbc_location->RowAttrs = array_merge($esbc_location->RowAttrs, array('data-rowindex'=>$esbc_location_list->RowCnt, 'id'=>'r' . $esbc_location_list->RowCnt . '_esbc_location', 'data-rowtype'=>$esbc_location->RowType));

		// Render row
		$esbc_location_list->renderRow();

		// Render list options
		$esbc_location_list->renderListOptions();
?>
	<tr<?php echo $esbc_location->rowAttributes() ?>>
<?php

// Render list options (body, left)
$esbc_location_list->ListOptions->render("body", "left", $esbc_location_list->RowCnt);
?>
	<?php if ($esbc_location->L_index->Visible) { // L_index ?>
		<td data-name="L_index"<?php echo $esbc_location->L_index->cellAttributes() ?>>
<span id="el<?php echo $esbc_location_list->RowCnt ?>_esbc_location_L_index" class="esbc_location_L_index">
<span<?php echo $esbc_location->L_index->viewAttributes() ?>>
<?php echo $esbc_location->L_index->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($esbc_location->VPS->Visible) { // VPS ?>
		<td data-name="VPS"<?php echo $esbc_location->VPS->cellAttributes() ?>>
<span id="el<?php echo $esbc_location_list->RowCnt ?>_esbc_location_VPS" class="esbc_location_VPS">
<span<?php echo $esbc_location->VPS->viewAttributes() ?>>
<?php echo $esbc_location->VPS->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($esbc_location->VPS_URL->Visible) { // VPS_URL ?>
		<td data-name="VPS_URL"<?php echo $esbc_location->VPS_URL->cellAttributes() ?>>
<span id="el<?php echo $esbc_location_list->RowCnt ?>_esbc_location_VPS_URL" class="esbc_location_VPS_URL">
<span<?php echo $esbc_location->VPS_URL->viewAttributes() ?>>
<?php echo $esbc_location->VPS_URL->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($esbc_location->L_Name->Visible) { // L_Name ?>
		<td data-name="L_Name"<?php echo $esbc_location->L_Name->cellAttributes() ?>>
<span id="el<?php echo $esbc_location_list->RowCnt ?>_esbc_location_L_Name" class="esbc_location_L_Name">
<span<?php echo $esbc_location->L_Name->viewAttributes() ?>>
<?php echo $esbc_location->L_Name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($esbc_location->L_Lat->Visible) { // L_Lat ?>
		<td data-name="L_Lat"<?php echo $esbc_location->L_Lat->cellAttributes() ?>>
<span id="el<?php echo $esbc_location_list->RowCnt ?>_esbc_location_L_Lat" class="esbc_location_L_Lat">
<span<?php echo $esbc_location->L_Lat->viewAttributes() ?>>
<?php echo $esbc_location->L_Lat->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($esbc_location->L_Lon->Visible) { // L_Lon ?>
		<td data-name="L_Lon"<?php echo $esbc_location->L_Lon->cellAttributes() ?>>
<span id="el<?php echo $esbc_location_list->RowCnt ?>_esbc_location_L_Lon" class="esbc_location_L_Lon">
<span<?php echo $esbc_location->L_Lon->viewAttributes() ?>>
<?php echo $esbc_location->L_Lon->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($esbc_location->Create_Date->Visible) { // Create_Date ?>
		<td data-name="Create_Date"<?php echo $esbc_location->Create_Date->cellAttributes() ?>>
<span id="el<?php echo $esbc_location_list->RowCnt ?>_esbc_location_Create_Date" class="esbc_location_Create_Date">
<span<?php echo $esbc_location->Create_Date->viewAttributes() ?>>
<?php echo $esbc_location->Create_Date->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$esbc_location_list->ListOptions->render("body", "right", $esbc_location_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$esbc_location->isGridAdd())
		$esbc_location_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$esbc_location->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($esbc_location_list->Recordset)
	$esbc_location_list->Recordset->Close();
?>
<?php if (!$esbc_location->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$esbc_location->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($esbc_location_list->Pager)) $esbc_location_list->Pager = new PrevNextPager($esbc_location_list->StartRec, $esbc_location_list->DisplayRecs, $esbc_location_list->TotalRecs, $esbc_location_list->AutoHidePager) ?>
<?php if ($esbc_location_list->Pager->RecordCount > 0 && $esbc_location_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($esbc_location_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" href="<?php echo $esbc_location_list->pageUrl() ?>start=<?php echo $esbc_location_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($esbc_location_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" href="<?php echo $esbc_location_list->pageUrl() ?>start=<?php echo $esbc_location_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $esbc_location_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($esbc_location_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" href="<?php echo $esbc_location_list->pageUrl() ?>start=<?php echo $esbc_location_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($esbc_location_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" href="<?php echo $esbc_location_list->pageUrl() ?>start=<?php echo $esbc_location_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $esbc_location_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($esbc_location_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $esbc_location_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $esbc_location_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $esbc_location_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($esbc_location_list->TotalRecs > 0 && (!$esbc_location_list->AutoHidePageSizeSelector || $esbc_location_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="esbc_location">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->Phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="10"<?php if ($esbc_location_list->DisplayRecs == 10) { ?> selected<?php } ?>>10</option>
<option value="20"<?php if ($esbc_location_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="50"<?php if ($esbc_location_list->DisplayRecs == 50) { ?> selected<?php } ?>>50</option>
<option value="ALL"<?php if ($esbc_location->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php
	foreach ($esbc_location_list->OtherOptions as &$option)
		$option->render("body", "bottom");
?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($esbc_location_list->TotalRecs == 0 && !$esbc_location->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php
	foreach ($esbc_location_list->OtherOptions as &$option) {
		$option->ButtonClass = "";
		$option->render("body", "");
	}
?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$esbc_location_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$esbc_location->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$esbc_location_list->terminate();
?>
