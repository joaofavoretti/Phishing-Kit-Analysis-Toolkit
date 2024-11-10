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
$basic_token_list = new basic_token_list();

// Run the page
$basic_token_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$basic_token_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$basic_token->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fbasic_tokenlist = currentForm = new ew.Form("fbasic_tokenlist", "list");
fbasic_tokenlist.formKeyCountName = '<?php echo $basic_token_list->FormKeyCountName ?>';

// Form_CustomValidate event
fbasic_tokenlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fbasic_tokenlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fbasic_tokenlist.lists["x_type"] = <?php echo $basic_token_list->type->Lookup->toClientList() ?>;
fbasic_tokenlist.lists["x_type"].options = <?php echo JsonEncode($basic_token_list->type->options(FALSE, TRUE)) ?>;

// Form object for search
var fbasic_tokenlistsrch = currentSearchForm = new ew.Form("fbasic_tokenlistsrch");

// Filters
fbasic_tokenlistsrch.filterList = <?php echo $basic_token_list->getFilterList() ?>;
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$basic_token->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($basic_token_list->TotalRecs > 0 && $basic_token_list->ExportOptions->visible()) { ?>
<?php $basic_token_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($basic_token_list->ImportOptions->visible()) { ?>
<?php $basic_token_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($basic_token_list->SearchOptions->visible()) { ?>
<?php $basic_token_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($basic_token_list->FilterOptions->visible()) { ?>
<?php $basic_token_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$basic_token_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$basic_token->isExport() && !$basic_token->CurrentAction) { ?>
<form name="fbasic_tokenlistsrch" id="fbasic_tokenlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($basic_token_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fbasic_tokenlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="basic_token">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($basic_token_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->Phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($basic_token_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->Phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $basic_token_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($basic_token_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->Phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($basic_token_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->Phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($basic_token_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->Phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($basic_token_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->Phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $basic_token_list->showPageHeader(); ?>
<?php
$basic_token_list->showMessage();
?>
<?php if ($basic_token_list->TotalRecs > 0 || $basic_token->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($basic_token_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> basic_token">
<form name="fbasic_tokenlist" id="fbasic_tokenlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($basic_token_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $basic_token_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="basic_token">
<input type="hidden" name="exporttype" id="exporttype" value="">
<div id="gmp_basic_token" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($basic_token_list->TotalRecs > 0 || $basic_token->isGridEdit()) { ?>
<table id="tbl_basic_tokenlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$basic_token_list->RowType = ROWTYPE_HEADER;

// Render list options
$basic_token_list->renderListOptions();

// Render list options (header, left)
$basic_token_list->ListOptions->render("header", "left");
?>
<?php if ($basic_token->Rindex->Visible) { // Rindex ?>
	<?php if ($basic_token->sortUrl($basic_token->Rindex) == "") { ?>
		<th data-name="Rindex" class="<?php echo $basic_token->Rindex->headerCellClass() ?>"><div id="elh_basic_token_Rindex" class="basic_token_Rindex"><div class="ew-table-header-caption"><?php echo $basic_token->Rindex->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Rindex" class="<?php echo $basic_token->Rindex->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $basic_token->SortUrl($basic_token->Rindex) ?>',1);"><div id="elh_basic_token_Rindex" class="basic_token_Rindex">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $basic_token->Rindex->caption() ?></span><span class="ew-table-header-sort"><?php if ($basic_token->Rindex->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($basic_token->Rindex->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($basic_token->type->Visible) { // type ?>
	<?php if ($basic_token->sortUrl($basic_token->type) == "") { ?>
		<th data-name="type" class="<?php echo $basic_token->type->headerCellClass() ?>"><div id="elh_basic_token_type" class="basic_token_type"><div class="ew-table-header-caption"><?php echo $basic_token->type->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="type" class="<?php echo $basic_token->type->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $basic_token->SortUrl($basic_token->type) ?>',1);"><div id="elh_basic_token_type" class="basic_token_type">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $basic_token->type->caption() ?></span><span class="ew-table-header-sort"><?php if ($basic_token->type->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($basic_token->type->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($basic_token->name->Visible) { // name ?>
	<?php if ($basic_token->sortUrl($basic_token->name) == "") { ?>
		<th data-name="name" class="<?php echo $basic_token->name->headerCellClass() ?>"><div id="elh_basic_token_name" class="basic_token_name"><div class="ew-table-header-caption"><?php echo $basic_token->name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="name" class="<?php echo $basic_token->name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $basic_token->SortUrl($basic_token->name) ?>',1);"><div id="elh_basic_token_name" class="basic_token_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $basic_token->name->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($basic_token->name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($basic_token->name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($basic_token->symble->Visible) { // symble ?>
	<?php if ($basic_token->sortUrl($basic_token->symble) == "") { ?>
		<th data-name="symble" class="<?php echo $basic_token->symble->headerCellClass() ?>"><div id="elh_basic_token_symble" class="basic_token_symble"><div class="ew-table-header-caption"><?php echo $basic_token->symble->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="symble" class="<?php echo $basic_token->symble->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $basic_token->SortUrl($basic_token->symble) ?>',1);"><div id="elh_basic_token_symble" class="basic_token_symble">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $basic_token->symble->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($basic_token->symble->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($basic_token->symble->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($basic_token->supply->Visible) { // supply ?>
	<?php if ($basic_token->sortUrl($basic_token->supply) == "") { ?>
		<th data-name="supply" class="<?php echo $basic_token->supply->headerCellClass() ?>"><div id="elh_basic_token_supply" class="basic_token_supply"><div class="ew-table-header-caption"><?php echo $basic_token->supply->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="supply" class="<?php echo $basic_token->supply->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $basic_token->SortUrl($basic_token->supply) ?>',1);"><div id="elh_basic_token_supply" class="basic_token_supply">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $basic_token->supply->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($basic_token->supply->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($basic_token->supply->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($basic_token->price->Visible) { // price ?>
	<?php if ($basic_token->sortUrl($basic_token->price) == "") { ?>
		<th data-name="price" class="<?php echo $basic_token->price->headerCellClass() ?>"><div id="elh_basic_token_price" class="basic_token_price"><div class="ew-table-header-caption"><?php echo $basic_token->price->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="price" class="<?php echo $basic_token->price->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $basic_token->SortUrl($basic_token->price) ?>',1);"><div id="elh_basic_token_price" class="basic_token_price">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $basic_token->price->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($basic_token->price->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($basic_token->price->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($basic_token->holders->Visible) { // holders ?>
	<?php if ($basic_token->sortUrl($basic_token->holders) == "") { ?>
		<th data-name="holders" class="<?php echo $basic_token->holders->headerCellClass() ?>"><div id="elh_basic_token_holders" class="basic_token_holders"><div class="ew-table-header-caption"><?php echo $basic_token->holders->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="holders" class="<?php echo $basic_token->holders->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $basic_token->SortUrl($basic_token->holders) ?>',1);"><div id="elh_basic_token_holders" class="basic_token_holders">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $basic_token->holders->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($basic_token->holders->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($basic_token->holders->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($basic_token->decimals->Visible) { // decimals ?>
	<?php if ($basic_token->sortUrl($basic_token->decimals) == "") { ?>
		<th data-name="decimals" class="<?php echo $basic_token->decimals->headerCellClass() ?>"><div id="elh_basic_token_decimals" class="basic_token_decimals"><div class="ew-table-header-caption"><?php echo $basic_token->decimals->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="decimals" class="<?php echo $basic_token->decimals->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $basic_token->SortUrl($basic_token->decimals) ?>',1);"><div id="elh_basic_token_decimals" class="basic_token_decimals">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $basic_token->decimals->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($basic_token->decimals->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($basic_token->decimals->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($basic_token->dateadd->Visible) { // dateadd ?>
	<?php if ($basic_token->sortUrl($basic_token->dateadd) == "") { ?>
		<th data-name="dateadd" class="<?php echo $basic_token->dateadd->headerCellClass() ?>"><div id="elh_basic_token_dateadd" class="basic_token_dateadd"><div class="ew-table-header-caption"><?php echo $basic_token->dateadd->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="dateadd" class="<?php echo $basic_token->dateadd->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $basic_token->SortUrl($basic_token->dateadd) ?>',1);"><div id="elh_basic_token_dateadd" class="basic_token_dateadd">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $basic_token->dateadd->caption() ?></span><span class="ew-table-header-sort"><?php if ($basic_token->dateadd->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($basic_token->dateadd->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$basic_token_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($basic_token->ExportAll && $basic_token->isExport()) {
	$basic_token_list->StopRec = $basic_token_list->TotalRecs;
} else {

	// Set the last record to display
	if ($basic_token_list->TotalRecs > $basic_token_list->StartRec + $basic_token_list->DisplayRecs - 1)
		$basic_token_list->StopRec = $basic_token_list->StartRec + $basic_token_list->DisplayRecs - 1;
	else
		$basic_token_list->StopRec = $basic_token_list->TotalRecs;
}
$basic_token_list->RecCnt = $basic_token_list->StartRec - 1;
if ($basic_token_list->Recordset && !$basic_token_list->Recordset->EOF) {
	$basic_token_list->Recordset->moveFirst();
	$selectLimit = $basic_token_list->UseSelectLimit;
	if (!$selectLimit && $basic_token_list->StartRec > 1)
		$basic_token_list->Recordset->move($basic_token_list->StartRec - 1);
} elseif (!$basic_token->AllowAddDeleteRow && $basic_token_list->StopRec == 0) {
	$basic_token_list->StopRec = $basic_token->GridAddRowCount;
}

// Initialize aggregate
$basic_token->RowType = ROWTYPE_AGGREGATEINIT;
$basic_token->resetAttributes();
$basic_token_list->renderRow();
while ($basic_token_list->RecCnt < $basic_token_list->StopRec) {
	$basic_token_list->RecCnt++;
	if ($basic_token_list->RecCnt >= $basic_token_list->StartRec) {
		$basic_token_list->RowCnt++;

		// Set up key count
		$basic_token_list->KeyCount = $basic_token_list->RowIndex;

		// Init row class and style
		$basic_token->resetAttributes();
		$basic_token->CssClass = "";
		if ($basic_token->isGridAdd()) {
		} else {
			$basic_token_list->loadRowValues($basic_token_list->Recordset); // Load row values
		}
		$basic_token->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$basic_token->RowAttrs = array_merge($basic_token->RowAttrs, array('data-rowindex'=>$basic_token_list->RowCnt, 'id'=>'r' . $basic_token_list->RowCnt . '_basic_token', 'data-rowtype'=>$basic_token->RowType));

		// Render row
		$basic_token_list->renderRow();

		// Render list options
		$basic_token_list->renderListOptions();
?>
	<tr<?php echo $basic_token->rowAttributes() ?>>
<?php

// Render list options (body, left)
$basic_token_list->ListOptions->render("body", "left", $basic_token_list->RowCnt);
?>
	<?php if ($basic_token->Rindex->Visible) { // Rindex ?>
		<td data-name="Rindex"<?php echo $basic_token->Rindex->cellAttributes() ?>>
<span id="el<?php echo $basic_token_list->RowCnt ?>_basic_token_Rindex" class="basic_token_Rindex">
<span<?php echo $basic_token->Rindex->viewAttributes() ?>>
<?php echo $basic_token->Rindex->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($basic_token->type->Visible) { // type ?>
		<td data-name="type"<?php echo $basic_token->type->cellAttributes() ?>>
<span id="el<?php echo $basic_token_list->RowCnt ?>_basic_token_type" class="basic_token_type">
<span<?php echo $basic_token->type->viewAttributes() ?>>
<?php echo $basic_token->type->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($basic_token->name->Visible) { // name ?>
		<td data-name="name"<?php echo $basic_token->name->cellAttributes() ?>>
<span id="el<?php echo $basic_token_list->RowCnt ?>_basic_token_name" class="basic_token_name">
<span<?php echo $basic_token->name->viewAttributes() ?>>
<?php echo $basic_token->name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($basic_token->symble->Visible) { // symble ?>
		<td data-name="symble"<?php echo $basic_token->symble->cellAttributes() ?>>
<span id="el<?php echo $basic_token_list->RowCnt ?>_basic_token_symble" class="basic_token_symble">
<span<?php echo $basic_token->symble->viewAttributes() ?>>
<?php echo $basic_token->symble->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($basic_token->supply->Visible) { // supply ?>
		<td data-name="supply"<?php echo $basic_token->supply->cellAttributes() ?>>
<span id="el<?php echo $basic_token_list->RowCnt ?>_basic_token_supply" class="basic_token_supply">
<span<?php echo $basic_token->supply->viewAttributes() ?>>
<?php echo $basic_token->supply->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($basic_token->price->Visible) { // price ?>
		<td data-name="price"<?php echo $basic_token->price->cellAttributes() ?>>
<span id="el<?php echo $basic_token_list->RowCnt ?>_basic_token_price" class="basic_token_price">
<span<?php echo $basic_token->price->viewAttributes() ?>>
<?php echo $basic_token->price->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($basic_token->holders->Visible) { // holders ?>
		<td data-name="holders"<?php echo $basic_token->holders->cellAttributes() ?>>
<span id="el<?php echo $basic_token_list->RowCnt ?>_basic_token_holders" class="basic_token_holders">
<span<?php echo $basic_token->holders->viewAttributes() ?>>
<?php echo $basic_token->holders->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($basic_token->decimals->Visible) { // decimals ?>
		<td data-name="decimals"<?php echo $basic_token->decimals->cellAttributes() ?>>
<span id="el<?php echo $basic_token_list->RowCnt ?>_basic_token_decimals" class="basic_token_decimals">
<span<?php echo $basic_token->decimals->viewAttributes() ?>>
<?php echo $basic_token->decimals->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($basic_token->dateadd->Visible) { // dateadd ?>
		<td data-name="dateadd"<?php echo $basic_token->dateadd->cellAttributes() ?>>
<span id="el<?php echo $basic_token_list->RowCnt ?>_basic_token_dateadd" class="basic_token_dateadd">
<span<?php echo $basic_token->dateadd->viewAttributes() ?>>
<?php echo $basic_token->dateadd->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$basic_token_list->ListOptions->render("body", "right", $basic_token_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$basic_token->isGridAdd())
		$basic_token_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$basic_token->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($basic_token_list->Recordset)
	$basic_token_list->Recordset->Close();
?>
<?php if (!$basic_token->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$basic_token->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($basic_token_list->Pager)) $basic_token_list->Pager = new PrevNextPager($basic_token_list->StartRec, $basic_token_list->DisplayRecs, $basic_token_list->TotalRecs, $basic_token_list->AutoHidePager) ?>
<?php if ($basic_token_list->Pager->RecordCount > 0 && $basic_token_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($basic_token_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" href="<?php echo $basic_token_list->pageUrl() ?>start=<?php echo $basic_token_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($basic_token_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" href="<?php echo $basic_token_list->pageUrl() ?>start=<?php echo $basic_token_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $basic_token_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($basic_token_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" href="<?php echo $basic_token_list->pageUrl() ?>start=<?php echo $basic_token_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($basic_token_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" href="<?php echo $basic_token_list->pageUrl() ?>start=<?php echo $basic_token_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $basic_token_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($basic_token_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $basic_token_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $basic_token_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $basic_token_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($basic_token_list->TotalRecs > 0 && (!$basic_token_list->AutoHidePageSizeSelector || $basic_token_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="basic_token">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->Phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="10"<?php if ($basic_token_list->DisplayRecs == 10) { ?> selected<?php } ?>>10</option>
<option value="20"<?php if ($basic_token_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="50"<?php if ($basic_token_list->DisplayRecs == 50) { ?> selected<?php } ?>>50</option>
<option value="ALL"<?php if ($basic_token->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php
	foreach ($basic_token_list->OtherOptions as &$option)
		$option->render("body", "bottom");
?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($basic_token_list->TotalRecs == 0 && !$basic_token->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php
	foreach ($basic_token_list->OtherOptions as &$option) {
		$option->ButtonClass = "";
		$option->render("body", "");
	}
?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$basic_token_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$basic_token->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$basic_token_list->terminate();
?>
