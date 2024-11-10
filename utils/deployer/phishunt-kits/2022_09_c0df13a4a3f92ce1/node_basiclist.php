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
$node_basic_list = new node_basic_list();

// Run the page
$node_basic_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$node_basic_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$node_basic->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fnode_basiclist = currentForm = new ew.Form("fnode_basiclist", "list");
fnode_basiclist.formKeyCountName = '<?php echo $node_basic_list->FormKeyCountName ?>';

// Form_CustomValidate event
fnode_basiclist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fnode_basiclist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fnode_basiclist.lists["x_NODE_SIGNER"] = <?php echo $node_basic_list->NODE_SIGNER->Lookup->toClientList() ?>;
fnode_basiclist.lists["x_NODE_SIGNER"].options = <?php echo JsonEncode($node_basic_list->NODE_SIGNER->options(FALSE, TRUE)) ?>;

// Form object for search
var fnode_basiclistsrch = currentSearchForm = new ew.Form("fnode_basiclistsrch");

// Filters
fnode_basiclistsrch.filterList = <?php echo $node_basic_list->getFilterList() ?>;
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$node_basic->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($node_basic_list->TotalRecs > 0 && $node_basic_list->ExportOptions->visible()) { ?>
<?php $node_basic_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($node_basic_list->ImportOptions->visible()) { ?>
<?php $node_basic_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($node_basic_list->SearchOptions->visible()) { ?>
<?php $node_basic_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($node_basic_list->FilterOptions->visible()) { ?>
<?php $node_basic_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$node_basic_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$node_basic->isExport() && !$node_basic->CurrentAction) { ?>
<form name="fnode_basiclistsrch" id="fnode_basiclistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($node_basic_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fnode_basiclistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="node_basic">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($node_basic_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->Phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($node_basic_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->Phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $node_basic_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($node_basic_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->Phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($node_basic_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->Phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($node_basic_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->Phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($node_basic_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->Phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $node_basic_list->showPageHeader(); ?>
<?php
$node_basic_list->showMessage();
?>
<?php if ($node_basic_list->TotalRecs > 0 || $node_basic->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($node_basic_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> node_basic">
<form name="fnode_basiclist" id="fnode_basiclist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($node_basic_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $node_basic_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="node_basic">
<input type="hidden" name="exporttype" id="exporttype" value="">
<div id="gmp_node_basic" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($node_basic_list->TotalRecs > 0 || $node_basic->isGridEdit()) { ?>
<table id="tbl_node_basiclist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$node_basic_list->RowType = ROWTYPE_HEADER;

// Render list options
$node_basic_list->renderListOptions();

// Render list options (header, left)
$node_basic_list->ListOptions->render("header", "left");
?>
<?php if ($node_basic->ESBC_INDEX->Visible) { // ESBC_INDEX ?>
	<?php if ($node_basic->sortUrl($node_basic->ESBC_INDEX) == "") { ?>
		<th data-name="ESBC_INDEX" class="<?php echo $node_basic->ESBC_INDEX->headerCellClass() ?>"><div id="elh_node_basic_ESBC_INDEX" class="node_basic_ESBC_INDEX"><div class="ew-table-header-caption"><?php echo $node_basic->ESBC_INDEX->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ESBC_INDEX" class="<?php echo $node_basic->ESBC_INDEX->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $node_basic->SortUrl($node_basic->ESBC_INDEX) ?>',1);"><div id="elh_node_basic_ESBC_INDEX" class="node_basic_ESBC_INDEX">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $node_basic->ESBC_INDEX->caption() ?></span><span class="ew-table-header-sort"><?php if ($node_basic->ESBC_INDEX->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($node_basic->ESBC_INDEX->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($node_basic->NODE_NAME->Visible) { // NODE_NAME ?>
	<?php if ($node_basic->sortUrl($node_basic->NODE_NAME) == "") { ?>
		<th data-name="NODE_NAME" class="<?php echo $node_basic->NODE_NAME->headerCellClass() ?>"><div id="elh_node_basic_NODE_NAME" class="node_basic_NODE_NAME"><div class="ew-table-header-caption"><?php echo $node_basic->NODE_NAME->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NODE_NAME" class="<?php echo $node_basic->NODE_NAME->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $node_basic->SortUrl($node_basic->NODE_NAME) ?>',1);"><div id="elh_node_basic_NODE_NAME" class="node_basic_NODE_NAME">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $node_basic->NODE_NAME->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($node_basic->NODE_NAME->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($node_basic->NODE_NAME->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($node_basic->NODE_PW->Visible) { // NODE_PW ?>
	<?php if ($node_basic->sortUrl($node_basic->NODE_PW) == "") { ?>
		<th data-name="NODE_PW" class="<?php echo $node_basic->NODE_PW->headerCellClass() ?>"><div id="elh_node_basic_NODE_PW" class="node_basic_NODE_PW"><div class="ew-table-header-caption"><?php echo $node_basic->NODE_PW->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NODE_PW" class="<?php echo $node_basic->NODE_PW->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $node_basic->SortUrl($node_basic->NODE_PW) ?>',1);"><div id="elh_node_basic_NODE_PW" class="node_basic_NODE_PW">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $node_basic->NODE_PW->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($node_basic->NODE_PW->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($node_basic->NODE_PW->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($node_basic->NODE_ENODE->Visible) { // NODE_ENODE ?>
	<?php if ($node_basic->sortUrl($node_basic->NODE_ENODE) == "") { ?>
		<th data-name="NODE_ENODE" class="<?php echo $node_basic->NODE_ENODE->headerCellClass() ?>"><div id="elh_node_basic_NODE_ENODE" class="node_basic_NODE_ENODE"><div class="ew-table-header-caption"><?php echo $node_basic->NODE_ENODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NODE_ENODE" class="<?php echo $node_basic->NODE_ENODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $node_basic->SortUrl($node_basic->NODE_ENODE) ?>',1);"><div id="elh_node_basic_NODE_ENODE" class="node_basic_NODE_ENODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $node_basic->NODE_ENODE->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($node_basic->NODE_ENODE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($node_basic->NODE_ENODE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($node_basic->NODE_ACCOUNT_ID->Visible) { // NODE_ACCOUNT_ID ?>
	<?php if ($node_basic->sortUrl($node_basic->NODE_ACCOUNT_ID) == "") { ?>
		<th data-name="NODE_ACCOUNT_ID" class="<?php echo $node_basic->NODE_ACCOUNT_ID->headerCellClass() ?>"><div id="elh_node_basic_NODE_ACCOUNT_ID" class="node_basic_NODE_ACCOUNT_ID"><div class="ew-table-header-caption"><?php echo $node_basic->NODE_ACCOUNT_ID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NODE_ACCOUNT_ID" class="<?php echo $node_basic->NODE_ACCOUNT_ID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $node_basic->SortUrl($node_basic->NODE_ACCOUNT_ID) ?>',1);"><div id="elh_node_basic_NODE_ACCOUNT_ID" class="node_basic_NODE_ACCOUNT_ID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $node_basic->NODE_ACCOUNT_ID->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($node_basic->NODE_ACCOUNT_ID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($node_basic->NODE_ACCOUNT_ID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($node_basic->NODE_SIGNER->Visible) { // NODE_SIGNER ?>
	<?php if ($node_basic->sortUrl($node_basic->NODE_SIGNER) == "") { ?>
		<th data-name="NODE_SIGNER" class="<?php echo $node_basic->NODE_SIGNER->headerCellClass() ?>"><div id="elh_node_basic_NODE_SIGNER" class="node_basic_NODE_SIGNER"><div class="ew-table-header-caption"><?php echo $node_basic->NODE_SIGNER->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NODE_SIGNER" class="<?php echo $node_basic->NODE_SIGNER->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $node_basic->SortUrl($node_basic->NODE_SIGNER) ?>',1);"><div id="elh_node_basic_NODE_SIGNER" class="node_basic_NODE_SIGNER">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $node_basic->NODE_SIGNER->caption() ?></span><span class="ew-table-header-sort"><?php if ($node_basic->NODE_SIGNER->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($node_basic->NODE_SIGNER->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($node_basic->Create_Date->Visible) { // Create_Date ?>
	<?php if ($node_basic->sortUrl($node_basic->Create_Date) == "") { ?>
		<th data-name="Create_Date" class="<?php echo $node_basic->Create_Date->headerCellClass() ?>"><div id="elh_node_basic_Create_Date" class="node_basic_Create_Date"><div class="ew-table-header-caption"><?php echo $node_basic->Create_Date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Create_Date" class="<?php echo $node_basic->Create_Date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $node_basic->SortUrl($node_basic->Create_Date) ?>',1);"><div id="elh_node_basic_Create_Date" class="node_basic_Create_Date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $node_basic->Create_Date->caption() ?></span><span class="ew-table-header-sort"><?php if ($node_basic->Create_Date->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($node_basic->Create_Date->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$node_basic_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($node_basic->ExportAll && $node_basic->isExport()) {
	$node_basic_list->StopRec = $node_basic_list->TotalRecs;
} else {

	// Set the last record to display
	if ($node_basic_list->TotalRecs > $node_basic_list->StartRec + $node_basic_list->DisplayRecs - 1)
		$node_basic_list->StopRec = $node_basic_list->StartRec + $node_basic_list->DisplayRecs - 1;
	else
		$node_basic_list->StopRec = $node_basic_list->TotalRecs;
}
$node_basic_list->RecCnt = $node_basic_list->StartRec - 1;
if ($node_basic_list->Recordset && !$node_basic_list->Recordset->EOF) {
	$node_basic_list->Recordset->moveFirst();
	$selectLimit = $node_basic_list->UseSelectLimit;
	if (!$selectLimit && $node_basic_list->StartRec > 1)
		$node_basic_list->Recordset->move($node_basic_list->StartRec - 1);
} elseif (!$node_basic->AllowAddDeleteRow && $node_basic_list->StopRec == 0) {
	$node_basic_list->StopRec = $node_basic->GridAddRowCount;
}

// Initialize aggregate
$node_basic->RowType = ROWTYPE_AGGREGATEINIT;
$node_basic->resetAttributes();
$node_basic_list->renderRow();
while ($node_basic_list->RecCnt < $node_basic_list->StopRec) {
	$node_basic_list->RecCnt++;
	if ($node_basic_list->RecCnt >= $node_basic_list->StartRec) {
		$node_basic_list->RowCnt++;

		// Set up key count
		$node_basic_list->KeyCount = $node_basic_list->RowIndex;

		// Init row class and style
		$node_basic->resetAttributes();
		$node_basic->CssClass = "";
		if ($node_basic->isGridAdd()) {
		} else {
			$node_basic_list->loadRowValues($node_basic_list->Recordset); // Load row values
		}
		$node_basic->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$node_basic->RowAttrs = array_merge($node_basic->RowAttrs, array('data-rowindex'=>$node_basic_list->RowCnt, 'id'=>'r' . $node_basic_list->RowCnt . '_node_basic', 'data-rowtype'=>$node_basic->RowType));

		// Render row
		$node_basic_list->renderRow();

		// Render list options
		$node_basic_list->renderListOptions();
?>
	<tr<?php echo $node_basic->rowAttributes() ?>>
<?php

// Render list options (body, left)
$node_basic_list->ListOptions->render("body", "left", $node_basic_list->RowCnt);
?>
	<?php if ($node_basic->ESBC_INDEX->Visible) { // ESBC_INDEX ?>
		<td data-name="ESBC_INDEX"<?php echo $node_basic->ESBC_INDEX->cellAttributes() ?>>
<span id="el<?php echo $node_basic_list->RowCnt ?>_node_basic_ESBC_INDEX" class="node_basic_ESBC_INDEX">
<span<?php echo $node_basic->ESBC_INDEX->viewAttributes() ?>>
<?php echo $node_basic->ESBC_INDEX->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($node_basic->NODE_NAME->Visible) { // NODE_NAME ?>
		<td data-name="NODE_NAME"<?php echo $node_basic->NODE_NAME->cellAttributes() ?>>
<span id="el<?php echo $node_basic_list->RowCnt ?>_node_basic_NODE_NAME" class="node_basic_NODE_NAME">
<span<?php echo $node_basic->NODE_NAME->viewAttributes() ?>>
<?php echo $node_basic->NODE_NAME->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($node_basic->NODE_PW->Visible) { // NODE_PW ?>
		<td data-name="NODE_PW"<?php echo $node_basic->NODE_PW->cellAttributes() ?>>
<span id="el<?php echo $node_basic_list->RowCnt ?>_node_basic_NODE_PW" class="node_basic_NODE_PW">
<span<?php echo $node_basic->NODE_PW->viewAttributes() ?>>
<?php echo $node_basic->NODE_PW->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($node_basic->NODE_ENODE->Visible) { // NODE_ENODE ?>
		<td data-name="NODE_ENODE"<?php echo $node_basic->NODE_ENODE->cellAttributes() ?>>
<span id="el<?php echo $node_basic_list->RowCnt ?>_node_basic_NODE_ENODE" class="node_basic_NODE_ENODE">
<span<?php echo $node_basic->NODE_ENODE->viewAttributes() ?>>
<?php echo $node_basic->NODE_ENODE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($node_basic->NODE_ACCOUNT_ID->Visible) { // NODE_ACCOUNT_ID ?>
		<td data-name="NODE_ACCOUNT_ID"<?php echo $node_basic->NODE_ACCOUNT_ID->cellAttributes() ?>>
<span id="el<?php echo $node_basic_list->RowCnt ?>_node_basic_NODE_ACCOUNT_ID" class="node_basic_NODE_ACCOUNT_ID">
<span<?php echo $node_basic->NODE_ACCOUNT_ID->viewAttributes() ?>>
<?php echo $node_basic->NODE_ACCOUNT_ID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($node_basic->NODE_SIGNER->Visible) { // NODE_SIGNER ?>
		<td data-name="NODE_SIGNER"<?php echo $node_basic->NODE_SIGNER->cellAttributes() ?>>
<span id="el<?php echo $node_basic_list->RowCnt ?>_node_basic_NODE_SIGNER" class="node_basic_NODE_SIGNER">
<span<?php echo $node_basic->NODE_SIGNER->viewAttributes() ?>>
<?php echo $node_basic->NODE_SIGNER->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($node_basic->Create_Date->Visible) { // Create_Date ?>
		<td data-name="Create_Date"<?php echo $node_basic->Create_Date->cellAttributes() ?>>
<span id="el<?php echo $node_basic_list->RowCnt ?>_node_basic_Create_Date" class="node_basic_Create_Date">
<span<?php echo $node_basic->Create_Date->viewAttributes() ?>>
<?php echo $node_basic->Create_Date->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$node_basic_list->ListOptions->render("body", "right", $node_basic_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$node_basic->isGridAdd())
		$node_basic_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$node_basic->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($node_basic_list->Recordset)
	$node_basic_list->Recordset->Close();
?>
<?php if (!$node_basic->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$node_basic->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($node_basic_list->Pager)) $node_basic_list->Pager = new PrevNextPager($node_basic_list->StartRec, $node_basic_list->DisplayRecs, $node_basic_list->TotalRecs, $node_basic_list->AutoHidePager) ?>
<?php if ($node_basic_list->Pager->RecordCount > 0 && $node_basic_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($node_basic_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" href="<?php echo $node_basic_list->pageUrl() ?>start=<?php echo $node_basic_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($node_basic_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" href="<?php echo $node_basic_list->pageUrl() ?>start=<?php echo $node_basic_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $node_basic_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($node_basic_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" href="<?php echo $node_basic_list->pageUrl() ?>start=<?php echo $node_basic_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($node_basic_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" href="<?php echo $node_basic_list->pageUrl() ?>start=<?php echo $node_basic_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $node_basic_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($node_basic_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $node_basic_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $node_basic_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $node_basic_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($node_basic_list->TotalRecs > 0 && (!$node_basic_list->AutoHidePageSizeSelector || $node_basic_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="node_basic">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->Phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="10"<?php if ($node_basic_list->DisplayRecs == 10) { ?> selected<?php } ?>>10</option>
<option value="20"<?php if ($node_basic_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="50"<?php if ($node_basic_list->DisplayRecs == 50) { ?> selected<?php } ?>>50</option>
<option value="ALL"<?php if ($node_basic->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php
	foreach ($node_basic_list->OtherOptions as &$option)
		$option->render("body", "bottom");
?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($node_basic_list->TotalRecs == 0 && !$node_basic->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php
	foreach ($node_basic_list->OtherOptions as &$option) {
		$option->ButtonClass = "";
		$option->render("body", "");
	}
?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$node_basic_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$node_basic->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$node_basic_list->terminate();
?>
