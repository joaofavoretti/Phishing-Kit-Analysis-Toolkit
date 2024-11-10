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
$geth_cmd_list = new geth_cmd_list();

// Run the page
$geth_cmd_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$geth_cmd_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$geth_cmd->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fgeth_cmdlist = currentForm = new ew.Form("fgeth_cmdlist", "list");
fgeth_cmdlist.formKeyCountName = '<?php echo $geth_cmd_list->FormKeyCountName ?>';

// Form_CustomValidate event
fgeth_cmdlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fgeth_cmdlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fgeth_cmdlist.lists["x_HOST_INDEX"] = <?php echo $geth_cmd_list->HOST_INDEX->Lookup->toClientList() ?>;
fgeth_cmdlist.lists["x_HOST_INDEX"].options = <?php echo JsonEncode($geth_cmd_list->HOST_INDEX->lookupOptions()) ?>;
fgeth_cmdlist.lists["x_HUB_INDEX"] = <?php echo $geth_cmd_list->HUB_INDEX->Lookup->toClientList() ?>;
fgeth_cmdlist.lists["x_HUB_INDEX"].options = <?php echo JsonEncode($geth_cmd_list->HUB_INDEX->lookupOptions()) ?>;
fgeth_cmdlist.lists["x_NODE_INDEX"] = <?php echo $geth_cmd_list->NODE_INDEX->Lookup->toClientList() ?>;
fgeth_cmdlist.lists["x_NODE_INDEX"].options = <?php echo JsonEncode($geth_cmd_list->NODE_INDEX->lookupOptions()) ?>;
fgeth_cmdlist.lists["x_GETH_PAR_INDEX"] = <?php echo $geth_cmd_list->GETH_PAR_INDEX->Lookup->toClientList() ?>;
fgeth_cmdlist.lists["x_GETH_PAR_INDEX"].options = <?php echo JsonEncode($geth_cmd_list->GETH_PAR_INDEX->lookupOptions()) ?>;

// Form object for search
var fgeth_cmdlistsrch = currentSearchForm = new ew.Form("fgeth_cmdlistsrch");

// Filters
fgeth_cmdlistsrch.filterList = <?php echo $geth_cmd_list->getFilterList() ?>;
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$geth_cmd->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($geth_cmd_list->TotalRecs > 0 && $geth_cmd_list->ExportOptions->visible()) { ?>
<?php $geth_cmd_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($geth_cmd_list->ImportOptions->visible()) { ?>
<?php $geth_cmd_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($geth_cmd_list->SearchOptions->visible()) { ?>
<?php $geth_cmd_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($geth_cmd_list->FilterOptions->visible()) { ?>
<?php $geth_cmd_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$geth_cmd_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$geth_cmd->isExport() && !$geth_cmd->CurrentAction) { ?>
<form name="fgeth_cmdlistsrch" id="fgeth_cmdlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($geth_cmd_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fgeth_cmdlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="geth_cmd">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($geth_cmd_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->Phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($geth_cmd_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->Phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $geth_cmd_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($geth_cmd_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->Phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($geth_cmd_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->Phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($geth_cmd_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->Phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($geth_cmd_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->Phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $geth_cmd_list->showPageHeader(); ?>
<?php
$geth_cmd_list->showMessage();
?>
<?php if ($geth_cmd_list->TotalRecs > 0 || $geth_cmd->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($geth_cmd_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> geth_cmd">
<form name="fgeth_cmdlist" id="fgeth_cmdlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($geth_cmd_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $geth_cmd_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="geth_cmd">
<input type="hidden" name="exporttype" id="exporttype" value="">
<div id="gmp_geth_cmd" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($geth_cmd_list->TotalRecs > 0 || $geth_cmd->isGridEdit()) { ?>
<table id="tbl_geth_cmdlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$geth_cmd_list->RowType = ROWTYPE_HEADER;

// Render list options
$geth_cmd_list->renderListOptions();

// Render list options (header, left)
$geth_cmd_list->ListOptions->render("header", "left");
?>
<?php if ($geth_cmd->Rindex->Visible) { // Rindex ?>
	<?php if ($geth_cmd->sortUrl($geth_cmd->Rindex) == "") { ?>
		<th data-name="Rindex" class="<?php echo $geth_cmd->Rindex->headerCellClass() ?>"><div id="elh_geth_cmd_Rindex" class="geth_cmd_Rindex"><div class="ew-table-header-caption"><?php echo $geth_cmd->Rindex->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Rindex" class="<?php echo $geth_cmd->Rindex->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $geth_cmd->SortUrl($geth_cmd->Rindex) ?>',1);"><div id="elh_geth_cmd_Rindex" class="geth_cmd_Rindex">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $geth_cmd->Rindex->caption() ?></span><span class="ew-table-header-sort"><?php if ($geth_cmd->Rindex->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($geth_cmd->Rindex->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($geth_cmd->HOST_INDEX->Visible) { // HOST_INDEX ?>
	<?php if ($geth_cmd->sortUrl($geth_cmd->HOST_INDEX) == "") { ?>
		<th data-name="HOST_INDEX" class="<?php echo $geth_cmd->HOST_INDEX->headerCellClass() ?>"><div id="elh_geth_cmd_HOST_INDEX" class="geth_cmd_HOST_INDEX"><div class="ew-table-header-caption"><?php echo $geth_cmd->HOST_INDEX->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HOST_INDEX" class="<?php echo $geth_cmd->HOST_INDEX->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $geth_cmd->SortUrl($geth_cmd->HOST_INDEX) ?>',1);"><div id="elh_geth_cmd_HOST_INDEX" class="geth_cmd_HOST_INDEX">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $geth_cmd->HOST_INDEX->caption() ?></span><span class="ew-table-header-sort"><?php if ($geth_cmd->HOST_INDEX->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($geth_cmd->HOST_INDEX->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($geth_cmd->HUB_INDEX->Visible) { // HUB_INDEX ?>
	<?php if ($geth_cmd->sortUrl($geth_cmd->HUB_INDEX) == "") { ?>
		<th data-name="HUB_INDEX" class="<?php echo $geth_cmd->HUB_INDEX->headerCellClass() ?>"><div id="elh_geth_cmd_HUB_INDEX" class="geth_cmd_HUB_INDEX"><div class="ew-table-header-caption"><?php echo $geth_cmd->HUB_INDEX->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HUB_INDEX" class="<?php echo $geth_cmd->HUB_INDEX->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $geth_cmd->SortUrl($geth_cmd->HUB_INDEX) ?>',1);"><div id="elh_geth_cmd_HUB_INDEX" class="geth_cmd_HUB_INDEX">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $geth_cmd->HUB_INDEX->caption() ?></span><span class="ew-table-header-sort"><?php if ($geth_cmd->HUB_INDEX->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($geth_cmd->HUB_INDEX->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($geth_cmd->NODE_INDEX->Visible) { // NODE_INDEX ?>
	<?php if ($geth_cmd->sortUrl($geth_cmd->NODE_INDEX) == "") { ?>
		<th data-name="NODE_INDEX" class="<?php echo $geth_cmd->NODE_INDEX->headerCellClass() ?>"><div id="elh_geth_cmd_NODE_INDEX" class="geth_cmd_NODE_INDEX"><div class="ew-table-header-caption"><?php echo $geth_cmd->NODE_INDEX->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NODE_INDEX" class="<?php echo $geth_cmd->NODE_INDEX->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $geth_cmd->SortUrl($geth_cmd->NODE_INDEX) ?>',1);"><div id="elh_geth_cmd_NODE_INDEX" class="geth_cmd_NODE_INDEX">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $geth_cmd->NODE_INDEX->caption() ?></span><span class="ew-table-header-sort"><?php if ($geth_cmd->NODE_INDEX->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($geth_cmd->NODE_INDEX->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($geth_cmd->GETH_PAR_INDEX->Visible) { // GETH_PAR_INDEX ?>
	<?php if ($geth_cmd->sortUrl($geth_cmd->GETH_PAR_INDEX) == "") { ?>
		<th data-name="GETH_PAR_INDEX" class="<?php echo $geth_cmd->GETH_PAR_INDEX->headerCellClass() ?>"><div id="elh_geth_cmd_GETH_PAR_INDEX" class="geth_cmd_GETH_PAR_INDEX"><div class="ew-table-header-caption"><?php echo $geth_cmd->GETH_PAR_INDEX->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GETH_PAR_INDEX" class="<?php echo $geth_cmd->GETH_PAR_INDEX->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $geth_cmd->SortUrl($geth_cmd->GETH_PAR_INDEX) ?>',1);"><div id="elh_geth_cmd_GETH_PAR_INDEX" class="geth_cmd_GETH_PAR_INDEX">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $geth_cmd->GETH_PAR_INDEX->caption() ?></span><span class="ew-table-header-sort"><?php if ($geth_cmd->GETH_PAR_INDEX->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($geth_cmd->GETH_PAR_INDEX->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($geth_cmd->host_type->Visible) { // host_type ?>
	<?php if ($geth_cmd->sortUrl($geth_cmd->host_type) == "") { ?>
		<th data-name="host_type" class="<?php echo $geth_cmd->host_type->headerCellClass() ?>"><div id="elh_geth_cmd_host_type" class="geth_cmd_host_type"><div class="ew-table-header-caption"><?php echo $geth_cmd->host_type->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="host_type" class="<?php echo $geth_cmd->host_type->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $geth_cmd->SortUrl($geth_cmd->host_type) ?>',1);"><div id="elh_geth_cmd_host_type" class="geth_cmd_host_type">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $geth_cmd->host_type->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($geth_cmd->host_type->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($geth_cmd->host_type->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($geth_cmd->date_add->Visible) { // date_add ?>
	<?php if ($geth_cmd->sortUrl($geth_cmd->date_add) == "") { ?>
		<th data-name="date_add" class="<?php echo $geth_cmd->date_add->headerCellClass() ?>"><div id="elh_geth_cmd_date_add" class="geth_cmd_date_add"><div class="ew-table-header-caption"><?php echo $geth_cmd->date_add->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="date_add" class="<?php echo $geth_cmd->date_add->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $geth_cmd->SortUrl($geth_cmd->date_add) ?>',1);"><div id="elh_geth_cmd_date_add" class="geth_cmd_date_add">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $geth_cmd->date_add->caption() ?></span><span class="ew-table-header-sort"><?php if ($geth_cmd->date_add->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($geth_cmd->date_add->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$geth_cmd_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($geth_cmd->ExportAll && $geth_cmd->isExport()) {
	$geth_cmd_list->StopRec = $geth_cmd_list->TotalRecs;
} else {

	// Set the last record to display
	if ($geth_cmd_list->TotalRecs > $geth_cmd_list->StartRec + $geth_cmd_list->DisplayRecs - 1)
		$geth_cmd_list->StopRec = $geth_cmd_list->StartRec + $geth_cmd_list->DisplayRecs - 1;
	else
		$geth_cmd_list->StopRec = $geth_cmd_list->TotalRecs;
}
$geth_cmd_list->RecCnt = $geth_cmd_list->StartRec - 1;
if ($geth_cmd_list->Recordset && !$geth_cmd_list->Recordset->EOF) {
	$geth_cmd_list->Recordset->moveFirst();
	$selectLimit = $geth_cmd_list->UseSelectLimit;
	if (!$selectLimit && $geth_cmd_list->StartRec > 1)
		$geth_cmd_list->Recordset->move($geth_cmd_list->StartRec - 1);
} elseif (!$geth_cmd->AllowAddDeleteRow && $geth_cmd_list->StopRec == 0) {
	$geth_cmd_list->StopRec = $geth_cmd->GridAddRowCount;
}

// Initialize aggregate
$geth_cmd->RowType = ROWTYPE_AGGREGATEINIT;
$geth_cmd->resetAttributes();
$geth_cmd_list->renderRow();
while ($geth_cmd_list->RecCnt < $geth_cmd_list->StopRec) {
	$geth_cmd_list->RecCnt++;
	if ($geth_cmd_list->RecCnt >= $geth_cmd_list->StartRec) {
		$geth_cmd_list->RowCnt++;

		// Set up key count
		$geth_cmd_list->KeyCount = $geth_cmd_list->RowIndex;

		// Init row class and style
		$geth_cmd->resetAttributes();
		$geth_cmd->CssClass = "";
		if ($geth_cmd->isGridAdd()) {
		} else {
			$geth_cmd_list->loadRowValues($geth_cmd_list->Recordset); // Load row values
		}
		$geth_cmd->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$geth_cmd->RowAttrs = array_merge($geth_cmd->RowAttrs, array('data-rowindex'=>$geth_cmd_list->RowCnt, 'id'=>'r' . $geth_cmd_list->RowCnt . '_geth_cmd', 'data-rowtype'=>$geth_cmd->RowType));

		// Render row
		$geth_cmd_list->renderRow();

		// Render list options
		$geth_cmd_list->renderListOptions();
?>
	<tr<?php echo $geth_cmd->rowAttributes() ?>>
<?php

// Render list options (body, left)
$geth_cmd_list->ListOptions->render("body", "left", $geth_cmd_list->RowCnt);
?>
	<?php if ($geth_cmd->Rindex->Visible) { // Rindex ?>
		<td data-name="Rindex"<?php echo $geth_cmd->Rindex->cellAttributes() ?>>
<span id="el<?php echo $geth_cmd_list->RowCnt ?>_geth_cmd_Rindex" class="geth_cmd_Rindex">
<span<?php echo $geth_cmd->Rindex->viewAttributes() ?>>
<?php echo $geth_cmd->Rindex->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($geth_cmd->HOST_INDEX->Visible) { // HOST_INDEX ?>
		<td data-name="HOST_INDEX"<?php echo $geth_cmd->HOST_INDEX->cellAttributes() ?>>
<span id="el<?php echo $geth_cmd_list->RowCnt ?>_geth_cmd_HOST_INDEX" class="geth_cmd_HOST_INDEX">
<span<?php echo $geth_cmd->HOST_INDEX->viewAttributes() ?>>
<?php echo $geth_cmd->HOST_INDEX->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($geth_cmd->HUB_INDEX->Visible) { // HUB_INDEX ?>
		<td data-name="HUB_INDEX"<?php echo $geth_cmd->HUB_INDEX->cellAttributes() ?>>
<span id="el<?php echo $geth_cmd_list->RowCnt ?>_geth_cmd_HUB_INDEX" class="geth_cmd_HUB_INDEX">
<span<?php echo $geth_cmd->HUB_INDEX->viewAttributes() ?>>
<?php echo $geth_cmd->HUB_INDEX->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($geth_cmd->NODE_INDEX->Visible) { // NODE_INDEX ?>
		<td data-name="NODE_INDEX"<?php echo $geth_cmd->NODE_INDEX->cellAttributes() ?>>
<span id="el<?php echo $geth_cmd_list->RowCnt ?>_geth_cmd_NODE_INDEX" class="geth_cmd_NODE_INDEX">
<span<?php echo $geth_cmd->NODE_INDEX->viewAttributes() ?>>
<?php echo $geth_cmd->NODE_INDEX->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($geth_cmd->GETH_PAR_INDEX->Visible) { // GETH_PAR_INDEX ?>
		<td data-name="GETH_PAR_INDEX"<?php echo $geth_cmd->GETH_PAR_INDEX->cellAttributes() ?>>
<span id="el<?php echo $geth_cmd_list->RowCnt ?>_geth_cmd_GETH_PAR_INDEX" class="geth_cmd_GETH_PAR_INDEX">
<span<?php echo $geth_cmd->GETH_PAR_INDEX->viewAttributes() ?>>
<?php echo $geth_cmd->GETH_PAR_INDEX->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($geth_cmd->host_type->Visible) { // host_type ?>
		<td data-name="host_type"<?php echo $geth_cmd->host_type->cellAttributes() ?>>
<span id="el<?php echo $geth_cmd_list->RowCnt ?>_geth_cmd_host_type" class="geth_cmd_host_type">
<span<?php echo $geth_cmd->host_type->viewAttributes() ?>>
<?php echo $geth_cmd->host_type->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($geth_cmd->date_add->Visible) { // date_add ?>
		<td data-name="date_add"<?php echo $geth_cmd->date_add->cellAttributes() ?>>
<span id="el<?php echo $geth_cmd_list->RowCnt ?>_geth_cmd_date_add" class="geth_cmd_date_add">
<span<?php echo $geth_cmd->date_add->viewAttributes() ?>>
<?php echo $geth_cmd->date_add->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$geth_cmd_list->ListOptions->render("body", "right", $geth_cmd_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$geth_cmd->isGridAdd())
		$geth_cmd_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$geth_cmd->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($geth_cmd_list->Recordset)
	$geth_cmd_list->Recordset->Close();
?>
<?php if (!$geth_cmd->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$geth_cmd->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($geth_cmd_list->Pager)) $geth_cmd_list->Pager = new PrevNextPager($geth_cmd_list->StartRec, $geth_cmd_list->DisplayRecs, $geth_cmd_list->TotalRecs, $geth_cmd_list->AutoHidePager) ?>
<?php if ($geth_cmd_list->Pager->RecordCount > 0 && $geth_cmd_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($geth_cmd_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" href="<?php echo $geth_cmd_list->pageUrl() ?>start=<?php echo $geth_cmd_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($geth_cmd_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" href="<?php echo $geth_cmd_list->pageUrl() ?>start=<?php echo $geth_cmd_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $geth_cmd_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($geth_cmd_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" href="<?php echo $geth_cmd_list->pageUrl() ?>start=<?php echo $geth_cmd_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($geth_cmd_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" href="<?php echo $geth_cmd_list->pageUrl() ?>start=<?php echo $geth_cmd_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $geth_cmd_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($geth_cmd_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $geth_cmd_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $geth_cmd_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $geth_cmd_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($geth_cmd_list->TotalRecs > 0 && (!$geth_cmd_list->AutoHidePageSizeSelector || $geth_cmd_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="geth_cmd">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->Phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="10"<?php if ($geth_cmd_list->DisplayRecs == 10) { ?> selected<?php } ?>>10</option>
<option value="20"<?php if ($geth_cmd_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="50"<?php if ($geth_cmd_list->DisplayRecs == 50) { ?> selected<?php } ?>>50</option>
<option value="ALL"<?php if ($geth_cmd->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php
	foreach ($geth_cmd_list->OtherOptions as &$option)
		$option->render("body", "bottom");
?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($geth_cmd_list->TotalRecs == 0 && !$geth_cmd->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php
	foreach ($geth_cmd_list->OtherOptions as &$option) {
		$option->ButtonClass = "";
		$option->render("body", "");
	}
?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$geth_cmd_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$geth_cmd->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$geth_cmd_list->terminate();
?>
