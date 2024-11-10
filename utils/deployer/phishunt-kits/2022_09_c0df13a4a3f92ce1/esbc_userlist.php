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
$esbc_user_list = new esbc_user_list();

// Run the page
$esbc_user_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$esbc_user_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$esbc_user->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fesbc_userlist = currentForm = new ew.Form("fesbc_userlist", "list");
fesbc_userlist.formKeyCountName = '<?php echo $esbc_user_list->FormKeyCountName ?>';

// Form_CustomValidate event
fesbc_userlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fesbc_userlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fesbc_userlistsrch = currentSearchForm = new ew.Form("fesbc_userlistsrch");

// Filters
fesbc_userlistsrch.filterList = <?php echo $esbc_user_list->getFilterList() ?>;
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$esbc_user->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($esbc_user_list->TotalRecs > 0 && $esbc_user_list->ExportOptions->visible()) { ?>
<?php $esbc_user_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($esbc_user_list->ImportOptions->visible()) { ?>
<?php $esbc_user_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($esbc_user_list->SearchOptions->visible()) { ?>
<?php $esbc_user_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($esbc_user_list->FilterOptions->visible()) { ?>
<?php $esbc_user_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$esbc_user_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$esbc_user->isExport() && !$esbc_user->CurrentAction) { ?>
<form name="fesbc_userlistsrch" id="fesbc_userlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($esbc_user_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fesbc_userlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="esbc_user">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($esbc_user_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->Phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($esbc_user_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->Phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $esbc_user_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($esbc_user_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->Phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($esbc_user_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->Phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($esbc_user_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->Phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($esbc_user_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->Phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $esbc_user_list->showPageHeader(); ?>
<?php
$esbc_user_list->showMessage();
?>
<?php if ($esbc_user_list->TotalRecs > 0 || $esbc_user->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($esbc_user_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> esbc_user">
<form name="fesbc_userlist" id="fesbc_userlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($esbc_user_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $esbc_user_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="esbc_user">
<input type="hidden" name="exporttype" id="exporttype" value="">
<div id="gmp_esbc_user" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($esbc_user_list->TotalRecs > 0 || $esbc_user->isGridEdit()) { ?>
<table id="tbl_esbc_userlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$esbc_user_list->RowType = ROWTYPE_HEADER;

// Render list options
$esbc_user_list->renderListOptions();

// Render list options (header, left)
$esbc_user_list->ListOptions->render("header", "left");
?>
<?php if ($esbc_user->USER_INDEX->Visible) { // USER_INDEX ?>
	<?php if ($esbc_user->sortUrl($esbc_user->USER_INDEX) == "") { ?>
		<th data-name="USER_INDEX" class="<?php echo $esbc_user->USER_INDEX->headerCellClass() ?>"><div id="elh_esbc_user_USER_INDEX" class="esbc_user_USER_INDEX"><div class="ew-table-header-caption"><?php echo $esbc_user->USER_INDEX->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="USER_INDEX" class="<?php echo $esbc_user->USER_INDEX->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $esbc_user->SortUrl($esbc_user->USER_INDEX) ?>',1);"><div id="elh_esbc_user_USER_INDEX" class="esbc_user_USER_INDEX">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $esbc_user->USER_INDEX->caption() ?></span><span class="ew-table-header-sort"><?php if ($esbc_user->USER_INDEX->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($esbc_user->USER_INDEX->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($esbc_user->USER_NAME->Visible) { // USER_NAME ?>
	<?php if ($esbc_user->sortUrl($esbc_user->USER_NAME) == "") { ?>
		<th data-name="USER_NAME" class="<?php echo $esbc_user->USER_NAME->headerCellClass() ?>"><div id="elh_esbc_user_USER_NAME" class="esbc_user_USER_NAME"><div class="ew-table-header-caption"><?php echo $esbc_user->USER_NAME->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="USER_NAME" class="<?php echo $esbc_user->USER_NAME->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $esbc_user->SortUrl($esbc_user->USER_NAME) ?>',1);"><div id="elh_esbc_user_USER_NAME" class="esbc_user_USER_NAME">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $esbc_user->USER_NAME->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($esbc_user->USER_NAME->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($esbc_user->USER_NAME->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($esbc_user->USER_PW->Visible) { // USER_PW ?>
	<?php if ($esbc_user->sortUrl($esbc_user->USER_PW) == "") { ?>
		<th data-name="USER_PW" class="<?php echo $esbc_user->USER_PW->headerCellClass() ?>"><div id="elh_esbc_user_USER_PW" class="esbc_user_USER_PW"><div class="ew-table-header-caption"><?php echo $esbc_user->USER_PW->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="USER_PW" class="<?php echo $esbc_user->USER_PW->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $esbc_user->SortUrl($esbc_user->USER_PW) ?>',1);"><div id="elh_esbc_user_USER_PW" class="esbc_user_USER_PW">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $esbc_user->USER_PW->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($esbc_user->USER_PW->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($esbc_user->USER_PW->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($esbc_user->USER_EMAIL->Visible) { // USER_EMAIL ?>
	<?php if ($esbc_user->sortUrl($esbc_user->USER_EMAIL) == "") { ?>
		<th data-name="USER_EMAIL" class="<?php echo $esbc_user->USER_EMAIL->headerCellClass() ?>"><div id="elh_esbc_user_USER_EMAIL" class="esbc_user_USER_EMAIL"><div class="ew-table-header-caption"><?php echo $esbc_user->USER_EMAIL->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="USER_EMAIL" class="<?php echo $esbc_user->USER_EMAIL->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $esbc_user->SortUrl($esbc_user->USER_EMAIL) ?>',1);"><div id="elh_esbc_user_USER_EMAIL" class="esbc_user_USER_EMAIL">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $esbc_user->USER_EMAIL->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($esbc_user->USER_EMAIL->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($esbc_user->USER_EMAIL->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($esbc_user->USER_LEVEL->Visible) { // USER_LEVEL ?>
	<?php if ($esbc_user->sortUrl($esbc_user->USER_LEVEL) == "") { ?>
		<th data-name="USER_LEVEL" class="<?php echo $esbc_user->USER_LEVEL->headerCellClass() ?>"><div id="elh_esbc_user_USER_LEVEL" class="esbc_user_USER_LEVEL"><div class="ew-table-header-caption"><?php echo $esbc_user->USER_LEVEL->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="USER_LEVEL" class="<?php echo $esbc_user->USER_LEVEL->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $esbc_user->SortUrl($esbc_user->USER_LEVEL) ?>',1);"><div id="elh_esbc_user_USER_LEVEL" class="esbc_user_USER_LEVEL">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $esbc_user->USER_LEVEL->caption() ?></span><span class="ew-table-header-sort"><?php if ($esbc_user->USER_LEVEL->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($esbc_user->USER_LEVEL->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($esbc_user->Create_Date->Visible) { // Create_Date ?>
	<?php if ($esbc_user->sortUrl($esbc_user->Create_Date) == "") { ?>
		<th data-name="Create_Date" class="<?php echo $esbc_user->Create_Date->headerCellClass() ?>"><div id="elh_esbc_user_Create_Date" class="esbc_user_Create_Date"><div class="ew-table-header-caption"><?php echo $esbc_user->Create_Date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Create_Date" class="<?php echo $esbc_user->Create_Date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $esbc_user->SortUrl($esbc_user->Create_Date) ?>',1);"><div id="elh_esbc_user_Create_Date" class="esbc_user_Create_Date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $esbc_user->Create_Date->caption() ?></span><span class="ew-table-header-sort"><?php if ($esbc_user->Create_Date->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($esbc_user->Create_Date->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$esbc_user_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($esbc_user->ExportAll && $esbc_user->isExport()) {
	$esbc_user_list->StopRec = $esbc_user_list->TotalRecs;
} else {

	// Set the last record to display
	if ($esbc_user_list->TotalRecs > $esbc_user_list->StartRec + $esbc_user_list->DisplayRecs - 1)
		$esbc_user_list->StopRec = $esbc_user_list->StartRec + $esbc_user_list->DisplayRecs - 1;
	else
		$esbc_user_list->StopRec = $esbc_user_list->TotalRecs;
}
$esbc_user_list->RecCnt = $esbc_user_list->StartRec - 1;
if ($esbc_user_list->Recordset && !$esbc_user_list->Recordset->EOF) {
	$esbc_user_list->Recordset->moveFirst();
	$selectLimit = $esbc_user_list->UseSelectLimit;
	if (!$selectLimit && $esbc_user_list->StartRec > 1)
		$esbc_user_list->Recordset->move($esbc_user_list->StartRec - 1);
} elseif (!$esbc_user->AllowAddDeleteRow && $esbc_user_list->StopRec == 0) {
	$esbc_user_list->StopRec = $esbc_user->GridAddRowCount;
}

// Initialize aggregate
$esbc_user->RowType = ROWTYPE_AGGREGATEINIT;
$esbc_user->resetAttributes();
$esbc_user_list->renderRow();
while ($esbc_user_list->RecCnt < $esbc_user_list->StopRec) {
	$esbc_user_list->RecCnt++;
	if ($esbc_user_list->RecCnt >= $esbc_user_list->StartRec) {
		$esbc_user_list->RowCnt++;

		// Set up key count
		$esbc_user_list->KeyCount = $esbc_user_list->RowIndex;

		// Init row class and style
		$esbc_user->resetAttributes();
		$esbc_user->CssClass = "";
		if ($esbc_user->isGridAdd()) {
		} else {
			$esbc_user_list->loadRowValues($esbc_user_list->Recordset); // Load row values
		}
		$esbc_user->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$esbc_user->RowAttrs = array_merge($esbc_user->RowAttrs, array('data-rowindex'=>$esbc_user_list->RowCnt, 'id'=>'r' . $esbc_user_list->RowCnt . '_esbc_user', 'data-rowtype'=>$esbc_user->RowType));

		// Render row
		$esbc_user_list->renderRow();

		// Render list options
		$esbc_user_list->renderListOptions();
?>
	<tr<?php echo $esbc_user->rowAttributes() ?>>
<?php

// Render list options (body, left)
$esbc_user_list->ListOptions->render("body", "left", $esbc_user_list->RowCnt);
?>
	<?php if ($esbc_user->USER_INDEX->Visible) { // USER_INDEX ?>
		<td data-name="USER_INDEX"<?php echo $esbc_user->USER_INDEX->cellAttributes() ?>>
<span id="el<?php echo $esbc_user_list->RowCnt ?>_esbc_user_USER_INDEX" class="esbc_user_USER_INDEX">
<span<?php echo $esbc_user->USER_INDEX->viewAttributes() ?>>
<?php echo $esbc_user->USER_INDEX->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($esbc_user->USER_NAME->Visible) { // USER_NAME ?>
		<td data-name="USER_NAME"<?php echo $esbc_user->USER_NAME->cellAttributes() ?>>
<span id="el<?php echo $esbc_user_list->RowCnt ?>_esbc_user_USER_NAME" class="esbc_user_USER_NAME">
<span<?php echo $esbc_user->USER_NAME->viewAttributes() ?>>
<?php echo $esbc_user->USER_NAME->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($esbc_user->USER_PW->Visible) { // USER_PW ?>
		<td data-name="USER_PW"<?php echo $esbc_user->USER_PW->cellAttributes() ?>>
<span id="el<?php echo $esbc_user_list->RowCnt ?>_esbc_user_USER_PW" class="esbc_user_USER_PW">
<span<?php echo $esbc_user->USER_PW->viewAttributes() ?>>
<?php echo $esbc_user->USER_PW->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($esbc_user->USER_EMAIL->Visible) { // USER_EMAIL ?>
		<td data-name="USER_EMAIL"<?php echo $esbc_user->USER_EMAIL->cellAttributes() ?>>
<span id="el<?php echo $esbc_user_list->RowCnt ?>_esbc_user_USER_EMAIL" class="esbc_user_USER_EMAIL">
<span<?php echo $esbc_user->USER_EMAIL->viewAttributes() ?>>
<?php echo $esbc_user->USER_EMAIL->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($esbc_user->USER_LEVEL->Visible) { // USER_LEVEL ?>
		<td data-name="USER_LEVEL"<?php echo $esbc_user->USER_LEVEL->cellAttributes() ?>>
<span id="el<?php echo $esbc_user_list->RowCnt ?>_esbc_user_USER_LEVEL" class="esbc_user_USER_LEVEL">
<span<?php echo $esbc_user->USER_LEVEL->viewAttributes() ?>>
<?php echo $esbc_user->USER_LEVEL->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($esbc_user->Create_Date->Visible) { // Create_Date ?>
		<td data-name="Create_Date"<?php echo $esbc_user->Create_Date->cellAttributes() ?>>
<span id="el<?php echo $esbc_user_list->RowCnt ?>_esbc_user_Create_Date" class="esbc_user_Create_Date">
<span<?php echo $esbc_user->Create_Date->viewAttributes() ?>>
<?php echo $esbc_user->Create_Date->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$esbc_user_list->ListOptions->render("body", "right", $esbc_user_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$esbc_user->isGridAdd())
		$esbc_user_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$esbc_user->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($esbc_user_list->Recordset)
	$esbc_user_list->Recordset->Close();
?>
<?php if (!$esbc_user->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$esbc_user->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($esbc_user_list->Pager)) $esbc_user_list->Pager = new PrevNextPager($esbc_user_list->StartRec, $esbc_user_list->DisplayRecs, $esbc_user_list->TotalRecs, $esbc_user_list->AutoHidePager) ?>
<?php if ($esbc_user_list->Pager->RecordCount > 0 && $esbc_user_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($esbc_user_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" href="<?php echo $esbc_user_list->pageUrl() ?>start=<?php echo $esbc_user_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($esbc_user_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" href="<?php echo $esbc_user_list->pageUrl() ?>start=<?php echo $esbc_user_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $esbc_user_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($esbc_user_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" href="<?php echo $esbc_user_list->pageUrl() ?>start=<?php echo $esbc_user_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($esbc_user_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" href="<?php echo $esbc_user_list->pageUrl() ?>start=<?php echo $esbc_user_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $esbc_user_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($esbc_user_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $esbc_user_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $esbc_user_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $esbc_user_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($esbc_user_list->TotalRecs > 0 && (!$esbc_user_list->AutoHidePageSizeSelector || $esbc_user_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="esbc_user">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->Phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="10"<?php if ($esbc_user_list->DisplayRecs == 10) { ?> selected<?php } ?>>10</option>
<option value="20"<?php if ($esbc_user_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="50"<?php if ($esbc_user_list->DisplayRecs == 50) { ?> selected<?php } ?>>50</option>
<option value="ALL"<?php if ($esbc_user->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php
	foreach ($esbc_user_list->OtherOptions as &$option)
		$option->render("body", "bottom");
?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($esbc_user_list->TotalRecs == 0 && !$esbc_user->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php
	foreach ($esbc_user_list->OtherOptions as &$option) {
		$option->ButtonClass = "";
		$option->render("body", "");
	}
?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$esbc_user_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$esbc_user->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$esbc_user_list->terminate();
?>
