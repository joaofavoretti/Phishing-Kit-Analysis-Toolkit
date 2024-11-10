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
$esbc_node_basic_list = new esbc_node_basic_list();

// Run the page
$esbc_node_basic_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$esbc_node_basic_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$esbc_node_basic->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fesbc_node_basiclist = currentForm = new ew.Form("fesbc_node_basiclist", "list");
fesbc_node_basiclist.formKeyCountName = '<?php echo $esbc_node_basic_list->FormKeyCountName ?>';

// Form_CustomValidate event
fesbc_node_basiclist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fesbc_node_basiclist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fesbc_node_basiclist.lists["x_HUB_INDEX"] = <?php echo $esbc_node_basic_list->HUB_INDEX->Lookup->toClientList() ?>;
fesbc_node_basiclist.lists["x_HUB_INDEX"].options = <?php echo JsonEncode($esbc_node_basic_list->HUB_INDEX->lookupOptions()) ?>;
fesbc_node_basiclist.lists["x_NODE_SIGNER"] = <?php echo $esbc_node_basic_list->NODE_SIGNER->Lookup->toClientList() ?>;
fesbc_node_basiclist.lists["x_NODE_SIGNER"].options = <?php echo JsonEncode($esbc_node_basic_list->NODE_SIGNER->options(FALSE, TRUE)) ?>;

// Form object for search
var fesbc_node_basiclistsrch = currentSearchForm = new ew.Form("fesbc_node_basiclistsrch");

// Filters
fesbc_node_basiclistsrch.filterList = <?php echo $esbc_node_basic_list->getFilterList() ?>;
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$esbc_node_basic->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($esbc_node_basic_list->TotalRecs > 0 && $esbc_node_basic_list->ExportOptions->visible()) { ?>
<?php $esbc_node_basic_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($esbc_node_basic_list->ImportOptions->visible()) { ?>
<?php $esbc_node_basic_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($esbc_node_basic_list->SearchOptions->visible()) { ?>
<?php $esbc_node_basic_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($esbc_node_basic_list->FilterOptions->visible()) { ?>
<?php $esbc_node_basic_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$esbc_node_basic_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$esbc_node_basic->isExport() && !$esbc_node_basic->CurrentAction) { ?>
<form name="fesbc_node_basiclistsrch" id="fesbc_node_basiclistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($esbc_node_basic_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fesbc_node_basiclistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="esbc_node_basic">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($esbc_node_basic_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->Phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($esbc_node_basic_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->Phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $esbc_node_basic_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($esbc_node_basic_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->Phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($esbc_node_basic_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->Phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($esbc_node_basic_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->Phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($esbc_node_basic_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->Phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $esbc_node_basic_list->showPageHeader(); ?>
<?php
$esbc_node_basic_list->showMessage();
?>
<?php if ($esbc_node_basic_list->TotalRecs > 0 || $esbc_node_basic->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($esbc_node_basic_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> esbc_node_basic">
<form name="fesbc_node_basiclist" id="fesbc_node_basiclist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($esbc_node_basic_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $esbc_node_basic_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="esbc_node_basic">
<input type="hidden" name="exporttype" id="exporttype" value="">
<div id="gmp_esbc_node_basic" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($esbc_node_basic_list->TotalRecs > 0 || $esbc_node_basic->isGridEdit()) { ?>
<table id="tbl_esbc_node_basiclist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$esbc_node_basic_list->RowType = ROWTYPE_HEADER;

// Render list options
$esbc_node_basic_list->renderListOptions();

// Render list options (header, left)
$esbc_node_basic_list->ListOptions->render("header", "left");
?>
<?php if ($esbc_node_basic->HUB_INDEX->Visible) { // HUB_INDEX ?>
	<?php if ($esbc_node_basic->sortUrl($esbc_node_basic->HUB_INDEX) == "") { ?>
		<th data-name="HUB_INDEX" class="<?php echo $esbc_node_basic->HUB_INDEX->headerCellClass() ?>"><div id="elh_esbc_node_basic_HUB_INDEX" class="esbc_node_basic_HUB_INDEX"><div class="ew-table-header-caption"><?php echo $esbc_node_basic->HUB_INDEX->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HUB_INDEX" class="<?php echo $esbc_node_basic->HUB_INDEX->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $esbc_node_basic->SortUrl($esbc_node_basic->HUB_INDEX) ?>',1);"><div id="elh_esbc_node_basic_HUB_INDEX" class="esbc_node_basic_HUB_INDEX">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $esbc_node_basic->HUB_INDEX->caption() ?></span><span class="ew-table-header-sort"><?php if ($esbc_node_basic->HUB_INDEX->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($esbc_node_basic->HUB_INDEX->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($esbc_node_basic->NODE_NAME->Visible) { // NODE_NAME ?>
	<?php if ($esbc_node_basic->sortUrl($esbc_node_basic->NODE_NAME) == "") { ?>
		<th data-name="NODE_NAME" class="<?php echo $esbc_node_basic->NODE_NAME->headerCellClass() ?>"><div id="elh_esbc_node_basic_NODE_NAME" class="esbc_node_basic_NODE_NAME"><div class="ew-table-header-caption"><?php echo $esbc_node_basic->NODE_NAME->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NODE_NAME" class="<?php echo $esbc_node_basic->NODE_NAME->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $esbc_node_basic->SortUrl($esbc_node_basic->NODE_NAME) ?>',1);"><div id="elh_esbc_node_basic_NODE_NAME" class="esbc_node_basic_NODE_NAME">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $esbc_node_basic->NODE_NAME->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($esbc_node_basic->NODE_NAME->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($esbc_node_basic->NODE_NAME->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($esbc_node_basic->NODE_PW->Visible) { // NODE_PW ?>
	<?php if ($esbc_node_basic->sortUrl($esbc_node_basic->NODE_PW) == "") { ?>
		<th data-name="NODE_PW" class="<?php echo $esbc_node_basic->NODE_PW->headerCellClass() ?>"><div id="elh_esbc_node_basic_NODE_PW" class="esbc_node_basic_NODE_PW"><div class="ew-table-header-caption"><?php echo $esbc_node_basic->NODE_PW->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NODE_PW" class="<?php echo $esbc_node_basic->NODE_PW->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $esbc_node_basic->SortUrl($esbc_node_basic->NODE_PW) ?>',1);"><div id="elh_esbc_node_basic_NODE_PW" class="esbc_node_basic_NODE_PW">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $esbc_node_basic->NODE_PW->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($esbc_node_basic->NODE_PW->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($esbc_node_basic->NODE_PW->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($esbc_node_basic->NODE_ENODE->Visible) { // NODE_ENODE ?>
	<?php if ($esbc_node_basic->sortUrl($esbc_node_basic->NODE_ENODE) == "") { ?>
		<th data-name="NODE_ENODE" class="<?php echo $esbc_node_basic->NODE_ENODE->headerCellClass() ?>"><div id="elh_esbc_node_basic_NODE_ENODE" class="esbc_node_basic_NODE_ENODE"><div class="ew-table-header-caption"><?php echo $esbc_node_basic->NODE_ENODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NODE_ENODE" class="<?php echo $esbc_node_basic->NODE_ENODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $esbc_node_basic->SortUrl($esbc_node_basic->NODE_ENODE) ?>',1);"><div id="elh_esbc_node_basic_NODE_ENODE" class="esbc_node_basic_NODE_ENODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $esbc_node_basic->NODE_ENODE->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($esbc_node_basic->NODE_ENODE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($esbc_node_basic->NODE_ENODE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($esbc_node_basic->NODE_ACC40->Visible) { // NODE_ACC40 ?>
	<?php if ($esbc_node_basic->sortUrl($esbc_node_basic->NODE_ACC40) == "") { ?>
		<th data-name="NODE_ACC40" class="<?php echo $esbc_node_basic->NODE_ACC40->headerCellClass() ?>"><div id="elh_esbc_node_basic_NODE_ACC40" class="esbc_node_basic_NODE_ACC40"><div class="ew-table-header-caption"><?php echo $esbc_node_basic->NODE_ACC40->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NODE_ACC40" class="<?php echo $esbc_node_basic->NODE_ACC40->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $esbc_node_basic->SortUrl($esbc_node_basic->NODE_ACC40) ?>',1);"><div id="elh_esbc_node_basic_NODE_ACC40" class="esbc_node_basic_NODE_ACC40">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $esbc_node_basic->NODE_ACC40->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($esbc_node_basic->NODE_ACC40->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($esbc_node_basic->NODE_ACC40->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($esbc_node_basic->NODE_SIGNER->Visible) { // NODE_SIGNER ?>
	<?php if ($esbc_node_basic->sortUrl($esbc_node_basic->NODE_SIGNER) == "") { ?>
		<th data-name="NODE_SIGNER" class="<?php echo $esbc_node_basic->NODE_SIGNER->headerCellClass() ?>"><div id="elh_esbc_node_basic_NODE_SIGNER" class="esbc_node_basic_NODE_SIGNER"><div class="ew-table-header-caption"><?php echo $esbc_node_basic->NODE_SIGNER->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NODE_SIGNER" class="<?php echo $esbc_node_basic->NODE_SIGNER->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $esbc_node_basic->SortUrl($esbc_node_basic->NODE_SIGNER) ?>',1);"><div id="elh_esbc_node_basic_NODE_SIGNER" class="esbc_node_basic_NODE_SIGNER">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $esbc_node_basic->NODE_SIGNER->caption() ?></span><span class="ew-table-header-sort"><?php if ($esbc_node_basic->NODE_SIGNER->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($esbc_node_basic->NODE_SIGNER->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($esbc_node_basic->Create_Date->Visible) { // Create_Date ?>
	<?php if ($esbc_node_basic->sortUrl($esbc_node_basic->Create_Date) == "") { ?>
		<th data-name="Create_Date" class="<?php echo $esbc_node_basic->Create_Date->headerCellClass() ?>"><div id="elh_esbc_node_basic_Create_Date" class="esbc_node_basic_Create_Date"><div class="ew-table-header-caption"><?php echo $esbc_node_basic->Create_Date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Create_Date" class="<?php echo $esbc_node_basic->Create_Date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $esbc_node_basic->SortUrl($esbc_node_basic->Create_Date) ?>',1);"><div id="elh_esbc_node_basic_Create_Date" class="esbc_node_basic_Create_Date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $esbc_node_basic->Create_Date->caption() ?></span><span class="ew-table-header-sort"><?php if ($esbc_node_basic->Create_Date->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($esbc_node_basic->Create_Date->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$esbc_node_basic_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($esbc_node_basic->ExportAll && $esbc_node_basic->isExport()) {
	$esbc_node_basic_list->StopRec = $esbc_node_basic_list->TotalRecs;
} else {

	// Set the last record to display
	if ($esbc_node_basic_list->TotalRecs > $esbc_node_basic_list->StartRec + $esbc_node_basic_list->DisplayRecs - 1)
		$esbc_node_basic_list->StopRec = $esbc_node_basic_list->StartRec + $esbc_node_basic_list->DisplayRecs - 1;
	else
		$esbc_node_basic_list->StopRec = $esbc_node_basic_list->TotalRecs;
}
$esbc_node_basic_list->RecCnt = $esbc_node_basic_list->StartRec - 1;
if ($esbc_node_basic_list->Recordset && !$esbc_node_basic_list->Recordset->EOF) {
	$esbc_node_basic_list->Recordset->moveFirst();
	$selectLimit = $esbc_node_basic_list->UseSelectLimit;
	if (!$selectLimit && $esbc_node_basic_list->StartRec > 1)
		$esbc_node_basic_list->Recordset->move($esbc_node_basic_list->StartRec - 1);
} elseif (!$esbc_node_basic->AllowAddDeleteRow && $esbc_node_basic_list->StopRec == 0) {
	$esbc_node_basic_list->StopRec = $esbc_node_basic->GridAddRowCount;
}

// Initialize aggregate
$esbc_node_basic->RowType = ROWTYPE_AGGREGATEINIT;
$esbc_node_basic->resetAttributes();
$esbc_node_basic_list->renderRow();
while ($esbc_node_basic_list->RecCnt < $esbc_node_basic_list->StopRec) {
	$esbc_node_basic_list->RecCnt++;
	if ($esbc_node_basic_list->RecCnt >= $esbc_node_basic_list->StartRec) {
		$esbc_node_basic_list->RowCnt++;

		// Set up key count
		$esbc_node_basic_list->KeyCount = $esbc_node_basic_list->RowIndex;

		// Init row class and style
		$esbc_node_basic->resetAttributes();
		$esbc_node_basic->CssClass = "";
		if ($esbc_node_basic->isGridAdd()) {
		} else {
			$esbc_node_basic_list->loadRowValues($esbc_node_basic_list->Recordset); // Load row values
		}
		$esbc_node_basic->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$esbc_node_basic->RowAttrs = array_merge($esbc_node_basic->RowAttrs, array('data-rowindex'=>$esbc_node_basic_list->RowCnt, 'id'=>'r' . $esbc_node_basic_list->RowCnt . '_esbc_node_basic', 'data-rowtype'=>$esbc_node_basic->RowType));

		// Render row
		$esbc_node_basic_list->renderRow();

		// Render list options
		$esbc_node_basic_list->renderListOptions();
?>
	<tr<?php echo $esbc_node_basic->rowAttributes() ?>>
<?php

// Render list options (body, left)
$esbc_node_basic_list->ListOptions->render("body", "left", $esbc_node_basic_list->RowCnt);
?>
	<?php if ($esbc_node_basic->HUB_INDEX->Visible) { // HUB_INDEX ?>
		<td data-name="HUB_INDEX"<?php echo $esbc_node_basic->HUB_INDEX->cellAttributes() ?>>
<span id="el<?php echo $esbc_node_basic_list->RowCnt ?>_esbc_node_basic_HUB_INDEX" class="esbc_node_basic_HUB_INDEX">
<span<?php echo $esbc_node_basic->HUB_INDEX->viewAttributes() ?>>
<?php echo $esbc_node_basic->HUB_INDEX->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($esbc_node_basic->NODE_NAME->Visible) { // NODE_NAME ?>
		<td data-name="NODE_NAME"<?php echo $esbc_node_basic->NODE_NAME->cellAttributes() ?>>
<span id="el<?php echo $esbc_node_basic_list->RowCnt ?>_esbc_node_basic_NODE_NAME" class="esbc_node_basic_NODE_NAME">
<span<?php echo $esbc_node_basic->NODE_NAME->viewAttributes() ?>>
<?php echo $esbc_node_basic->NODE_NAME->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($esbc_node_basic->NODE_PW->Visible) { // NODE_PW ?>
		<td data-name="NODE_PW"<?php echo $esbc_node_basic->NODE_PW->cellAttributes() ?>>
<span id="el<?php echo $esbc_node_basic_list->RowCnt ?>_esbc_node_basic_NODE_PW" class="esbc_node_basic_NODE_PW">
<span<?php echo $esbc_node_basic->NODE_PW->viewAttributes() ?>>
<?php echo $esbc_node_basic->NODE_PW->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($esbc_node_basic->NODE_ENODE->Visible) { // NODE_ENODE ?>
		<td data-name="NODE_ENODE"<?php echo $esbc_node_basic->NODE_ENODE->cellAttributes() ?>>
<span id="el<?php echo $esbc_node_basic_list->RowCnt ?>_esbc_node_basic_NODE_ENODE" class="esbc_node_basic_NODE_ENODE">
<span<?php echo $esbc_node_basic->NODE_ENODE->viewAttributes() ?>>
<?php echo $esbc_node_basic->NODE_ENODE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($esbc_node_basic->NODE_ACC40->Visible) { // NODE_ACC40 ?>
		<td data-name="NODE_ACC40"<?php echo $esbc_node_basic->NODE_ACC40->cellAttributes() ?>>
<span id="el<?php echo $esbc_node_basic_list->RowCnt ?>_esbc_node_basic_NODE_ACC40" class="esbc_node_basic_NODE_ACC40">
<span<?php echo $esbc_node_basic->NODE_ACC40->viewAttributes() ?>>
<?php echo $esbc_node_basic->NODE_ACC40->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($esbc_node_basic->NODE_SIGNER->Visible) { // NODE_SIGNER ?>
		<td data-name="NODE_SIGNER"<?php echo $esbc_node_basic->NODE_SIGNER->cellAttributes() ?>>
<span id="el<?php echo $esbc_node_basic_list->RowCnt ?>_esbc_node_basic_NODE_SIGNER" class="esbc_node_basic_NODE_SIGNER">
<span<?php echo $esbc_node_basic->NODE_SIGNER->viewAttributes() ?>>
<?php echo $esbc_node_basic->NODE_SIGNER->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($esbc_node_basic->Create_Date->Visible) { // Create_Date ?>
		<td data-name="Create_Date"<?php echo $esbc_node_basic->Create_Date->cellAttributes() ?>>
<span id="el<?php echo $esbc_node_basic_list->RowCnt ?>_esbc_node_basic_Create_Date" class="esbc_node_basic_Create_Date">
<span<?php echo $esbc_node_basic->Create_Date->viewAttributes() ?>>
<?php echo $esbc_node_basic->Create_Date->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$esbc_node_basic_list->ListOptions->render("body", "right", $esbc_node_basic_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$esbc_node_basic->isGridAdd())
		$esbc_node_basic_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$esbc_node_basic->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($esbc_node_basic_list->Recordset)
	$esbc_node_basic_list->Recordset->Close();
?>
<?php if (!$esbc_node_basic->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$esbc_node_basic->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($esbc_node_basic_list->Pager)) $esbc_node_basic_list->Pager = new PrevNextPager($esbc_node_basic_list->StartRec, $esbc_node_basic_list->DisplayRecs, $esbc_node_basic_list->TotalRecs, $esbc_node_basic_list->AutoHidePager) ?>
<?php if ($esbc_node_basic_list->Pager->RecordCount > 0 && $esbc_node_basic_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($esbc_node_basic_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" href="<?php echo $esbc_node_basic_list->pageUrl() ?>start=<?php echo $esbc_node_basic_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($esbc_node_basic_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" href="<?php echo $esbc_node_basic_list->pageUrl() ?>start=<?php echo $esbc_node_basic_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $esbc_node_basic_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($esbc_node_basic_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" href="<?php echo $esbc_node_basic_list->pageUrl() ?>start=<?php echo $esbc_node_basic_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($esbc_node_basic_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" href="<?php echo $esbc_node_basic_list->pageUrl() ?>start=<?php echo $esbc_node_basic_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $esbc_node_basic_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($esbc_node_basic_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $esbc_node_basic_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $esbc_node_basic_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $esbc_node_basic_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($esbc_node_basic_list->TotalRecs > 0 && (!$esbc_node_basic_list->AutoHidePageSizeSelector || $esbc_node_basic_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="esbc_node_basic">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->Phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="10"<?php if ($esbc_node_basic_list->DisplayRecs == 10) { ?> selected<?php } ?>>10</option>
<option value="20"<?php if ($esbc_node_basic_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="50"<?php if ($esbc_node_basic_list->DisplayRecs == 50) { ?> selected<?php } ?>>50</option>
<option value="ALL"<?php if ($esbc_node_basic->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php
	foreach ($esbc_node_basic_list->OtherOptions as &$option)
		$option->render("body", "bottom");
?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($esbc_node_basic_list->TotalRecs == 0 && !$esbc_node_basic->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php
	foreach ($esbc_node_basic_list->OtherOptions as &$option) {
		$option->ButtonClass = "";
		$option->render("body", "");
	}
?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$esbc_node_basic_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$esbc_node_basic->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$esbc_node_basic_list->terminate();
?>
