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
$esbc_ini_view = new esbc_ini_view();

// Run the page
$esbc_ini_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$esbc_ini_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$esbc_ini->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fesbc_iniview = currentForm = new ew.Form("fesbc_iniview", "view");

// Form_CustomValidate event
fesbc_iniview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fesbc_iniview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$esbc_ini->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $esbc_ini_view->ExportOptions->render("body") ?>
<?php
	foreach ($esbc_ini_view->OtherOptions as &$option)
		$option->render("body");
?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $esbc_ini_view->showPageHeader(); ?>
<?php
$esbc_ini_view->showMessage();
?>
<form name="fesbc_iniview" id="fesbc_iniview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($esbc_ini_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $esbc_ini_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="esbc_ini">
<input type="hidden" name="modal" value="<?php echo (int)$esbc_ini_view->IsModal ?>">
<table class="table ew-view-table">
<?php if ($esbc_ini->BC_INDEX->Visible) { // BC_INDEX ?>
	<tr id="r_BC_INDEX">
		<td class="<?php echo $esbc_ini_view->TableLeftColumnClass ?>"><span id="elh_esbc_ini_BC_INDEX"><?php echo $esbc_ini->BC_INDEX->caption() ?></span></td>
		<td data-name="BC_INDEX"<?php echo $esbc_ini->BC_INDEX->cellAttributes() ?>>
<span id="el_esbc_ini_BC_INDEX">
<span<?php echo $esbc_ini->BC_INDEX->viewAttributes() ?>>
<?php echo $esbc_ini->BC_INDEX->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($esbc_ini->HOSTNAME->Visible) { // HOSTNAME ?>
	<tr id="r_HOSTNAME">
		<td class="<?php echo $esbc_ini_view->TableLeftColumnClass ?>"><span id="elh_esbc_ini_HOSTNAME"><?php echo $esbc_ini->HOSTNAME->caption() ?></span></td>
		<td data-name="HOSTNAME"<?php echo $esbc_ini->HOSTNAME->cellAttributes() ?>>
<span id="el_esbc_ini_HOSTNAME">
<span<?php echo $esbc_ini->HOSTNAME->viewAttributes() ?>>
<?php echo $esbc_ini->HOSTNAME->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($esbc_ini->BCS_ROOTNAME->Visible) { // BCS_ROOTNAME ?>
	<tr id="r_BCS_ROOTNAME">
		<td class="<?php echo $esbc_ini_view->TableLeftColumnClass ?>"><span id="elh_esbc_ini_BCS_ROOTNAME"><?php echo $esbc_ini->BCS_ROOTNAME->caption() ?></span></td>
		<td data-name="BCS_ROOTNAME"<?php echo $esbc_ini->BCS_ROOTNAME->cellAttributes() ?>>
<span id="el_esbc_ini_BCS_ROOTNAME">
<span<?php echo $esbc_ini->BCS_ROOTNAME->viewAttributes() ?>>
<?php echo $esbc_ini->BCS_ROOTNAME->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($esbc_ini->HOST_IP->Visible) { // HOST_IP ?>
	<tr id="r_HOST_IP">
		<td class="<?php echo $esbc_ini_view->TableLeftColumnClass ?>"><span id="elh_esbc_ini_HOST_IP"><?php echo $esbc_ini->HOST_IP->caption() ?></span></td>
		<td data-name="HOST_IP"<?php echo $esbc_ini->HOST_IP->cellAttributes() ?>>
<span id="el_esbc_ini_HOST_IP">
<span<?php echo $esbc_ini->HOST_IP->viewAttributes() ?>>
<?php echo $esbc_ini->HOST_IP->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($esbc_ini->HOST_PW->Visible) { // HOST_PW ?>
	<tr id="r_HOST_PW">
		<td class="<?php echo $esbc_ini_view->TableLeftColumnClass ?>"><span id="elh_esbc_ini_HOST_PW"><?php echo $esbc_ini->HOST_PW->caption() ?></span></td>
		<td data-name="HOST_PW"<?php echo $esbc_ini->HOST_PW->cellAttributes() ?>>
<span id="el_esbc_ini_HOST_PW">
<span<?php echo $esbc_ini->HOST_PW->viewAttributes() ?>>
<?php echo $esbc_ini->HOST_PW->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($esbc_ini->HOST_OWNER->Visible) { // HOST_OWNER ?>
	<tr id="r_HOST_OWNER">
		<td class="<?php echo $esbc_ini_view->TableLeftColumnClass ?>"><span id="elh_esbc_ini_HOST_OWNER"><?php echo $esbc_ini->HOST_OWNER->caption() ?></span></td>
		<td data-name="HOST_OWNER"<?php echo $esbc_ini->HOST_OWNER->cellAttributes() ?>>
<span id="el_esbc_ini_HOST_OWNER">
<span<?php echo $esbc_ini->HOST_OWNER->viewAttributes() ?>>
<?php echo $esbc_ini->HOST_OWNER->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($esbc_ini->NODENAME_ARRAY->Visible) { // NODENAME_ARRAY ?>
	<tr id="r_NODENAME_ARRAY">
		<td class="<?php echo $esbc_ini_view->TableLeftColumnClass ?>"><span id="elh_esbc_ini_NODENAME_ARRAY"><?php echo $esbc_ini->NODENAME_ARRAY->caption() ?></span></td>
		<td data-name="NODENAME_ARRAY"<?php echo $esbc_ini->NODENAME_ARRAY->cellAttributes() ?>>
<span id="el_esbc_ini_NODENAME_ARRAY">
<span<?php echo $esbc_ini->NODENAME_ARRAY->viewAttributes() ?>>
<?php echo $esbc_ini->NODENAME_ARRAY->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($esbc_ini->PW_ARRAY->Visible) { // PW_ARRAY ?>
	<tr id="r_PW_ARRAY">
		<td class="<?php echo $esbc_ini_view->TableLeftColumnClass ?>"><span id="elh_esbc_ini_PW_ARRAY"><?php echo $esbc_ini->PW_ARRAY->caption() ?></span></td>
		<td data-name="PW_ARRAY"<?php echo $esbc_ini->PW_ARRAY->cellAttributes() ?>>
<span id="el_esbc_ini_PW_ARRAY">
<span<?php echo $esbc_ini->PW_ARRAY->viewAttributes() ?>>
<?php echo $esbc_ini->PW_ARRAY->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($esbc_ini->MYSQL_OWNER->Visible) { // MYSQL_OWNER ?>
	<tr id="r_MYSQL_OWNER">
		<td class="<?php echo $esbc_ini_view->TableLeftColumnClass ?>"><span id="elh_esbc_ini_MYSQL_OWNER"><?php echo $esbc_ini->MYSQL_OWNER->caption() ?></span></td>
		<td data-name="MYSQL_OWNER"<?php echo $esbc_ini->MYSQL_OWNER->cellAttributes() ?>>
<span id="el_esbc_ini_MYSQL_OWNER">
<span<?php echo $esbc_ini->MYSQL_OWNER->viewAttributes() ?>>
<?php echo $esbc_ini->MYSQL_OWNER->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($esbc_ini->MYSQL_PW->Visible) { // MYSQL_PW ?>
	<tr id="r_MYSQL_PW">
		<td class="<?php echo $esbc_ini_view->TableLeftColumnClass ?>"><span id="elh_esbc_ini_MYSQL_PW"><?php echo $esbc_ini->MYSQL_PW->caption() ?></span></td>
		<td data-name="MYSQL_PW"<?php echo $esbc_ini->MYSQL_PW->cellAttributes() ?>>
<span id="el_esbc_ini_MYSQL_PW">
<span<?php echo $esbc_ini->MYSQL_PW->viewAttributes() ?>>
<?php echo $esbc_ini->MYSQL_PW->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($esbc_ini->FTP_OWNER->Visible) { // FTP_OWNER ?>
	<tr id="r_FTP_OWNER">
		<td class="<?php echo $esbc_ini_view->TableLeftColumnClass ?>"><span id="elh_esbc_ini_FTP_OWNER"><?php echo $esbc_ini->FTP_OWNER->caption() ?></span></td>
		<td data-name="FTP_OWNER"<?php echo $esbc_ini->FTP_OWNER->cellAttributes() ?>>
<span id="el_esbc_ini_FTP_OWNER">
<span<?php echo $esbc_ini->FTP_OWNER->viewAttributes() ?>>
<?php echo $esbc_ini->FTP_OWNER->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($esbc_ini->FTP_PW->Visible) { // FTP_PW ?>
	<tr id="r_FTP_PW">
		<td class="<?php echo $esbc_ini_view->TableLeftColumnClass ?>"><span id="elh_esbc_ini_FTP_PW"><?php echo $esbc_ini->FTP_PW->caption() ?></span></td>
		<td data-name="FTP_PW"<?php echo $esbc_ini->FTP_PW->cellAttributes() ?>>
<span id="el_esbc_ini_FTP_PW">
<span<?php echo $esbc_ini->FTP_PW->viewAttributes() ?>>
<?php echo $esbc_ini->FTP_PW->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($esbc_ini->NETWORKID->Visible) { // NETWORKID ?>
	<tr id="r_NETWORKID">
		<td class="<?php echo $esbc_ini_view->TableLeftColumnClass ?>"><span id="elh_esbc_ini_NETWORKID"><?php echo $esbc_ini->NETWORKID->caption() ?></span></td>
		<td data-name="NETWORKID"<?php echo $esbc_ini->NETWORKID->cellAttributes() ?>>
<span id="el_esbc_ini_NETWORKID">
<span<?php echo $esbc_ini->NETWORKID->viewAttributes() ?>>
<?php echo $esbc_ini->NETWORKID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($esbc_ini->BC_PORT_BASE->Visible) { // BC_PORT_BASE ?>
	<tr id="r_BC_PORT_BASE">
		<td class="<?php echo $esbc_ini_view->TableLeftColumnClass ?>"><span id="elh_esbc_ini_BC_PORT_BASE"><?php echo $esbc_ini->BC_PORT_BASE->caption() ?></span></td>
		<td data-name="BC_PORT_BASE"<?php echo $esbc_ini->BC_PORT_BASE->cellAttributes() ?>>
<span id="el_esbc_ini_BC_PORT_BASE">
<span<?php echo $esbc_ini->BC_PORT_BASE->viewAttributes() ?>>
<?php echo $esbc_ini->BC_PORT_BASE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($esbc_ini->HTTP_PORT->Visible) { // HTTP_PORT ?>
	<tr id="r_HTTP_PORT">
		<td class="<?php echo $esbc_ini_view->TableLeftColumnClass ?>"><span id="elh_esbc_ini_HTTP_PORT"><?php echo $esbc_ini->HTTP_PORT->caption() ?></span></td>
		<td data-name="HTTP_PORT"<?php echo $esbc_ini->HTTP_PORT->cellAttributes() ?>>
<span id="el_esbc_ini_HTTP_PORT">
<span<?php echo $esbc_ini->HTTP_PORT->viewAttributes() ?>>
<?php echo $esbc_ini->HTTP_PORT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($esbc_ini->RPCPORT_BASE->Visible) { // RPCPORT_BASE ?>
	<tr id="r_RPCPORT_BASE">
		<td class="<?php echo $esbc_ini_view->TableLeftColumnClass ?>"><span id="elh_esbc_ini_RPCPORT_BASE"><?php echo $esbc_ini->RPCPORT_BASE->caption() ?></span></td>
		<td data-name="RPCPORT_BASE"<?php echo $esbc_ini->RPCPORT_BASE->cellAttributes() ?>>
<span id="el_esbc_ini_RPCPORT_BASE">
<span<?php echo $esbc_ini->RPCPORT_BASE->viewAttributes() ?>>
<?php echo $esbc_ini->RPCPORT_BASE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($esbc_ini->Create_Date->Visible) { // Create_Date ?>
	<tr id="r_Create_Date">
		<td class="<?php echo $esbc_ini_view->TableLeftColumnClass ?>"><span id="elh_esbc_ini_Create_Date"><?php echo $esbc_ini->Create_Date->caption() ?></span></td>
		<td data-name="Create_Date"<?php echo $esbc_ini->Create_Date->cellAttributes() ?>>
<span id="el_esbc_ini_Create_Date">
<span<?php echo $esbc_ini->Create_Date->viewAttributes() ?>>
<?php echo $esbc_ini->Create_Date->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($esbc_ini->HOST_TYPE->Visible) { // HOST_TYPE ?>
	<tr id="r_HOST_TYPE">
		<td class="<?php echo $esbc_ini_view->TableLeftColumnClass ?>"><span id="elh_esbc_ini_HOST_TYPE"><?php echo $esbc_ini->HOST_TYPE->caption() ?></span></td>
		<td data-name="HOST_TYPE"<?php echo $esbc_ini->HOST_TYPE->cellAttributes() ?>>
<span id="el_esbc_ini_HOST_TYPE">
<span<?php echo $esbc_ini->HOST_TYPE->viewAttributes() ?>>
<?php echo $esbc_ini->HOST_TYPE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($esbc_ini->HOST_ROOTID->Visible) { // HOST_ROOTID ?>
	<tr id="r_HOST_ROOTID">
		<td class="<?php echo $esbc_ini_view->TableLeftColumnClass ?>"><span id="elh_esbc_ini_HOST_ROOTID"><?php echo $esbc_ini->HOST_ROOTID->caption() ?></span></td>
		<td data-name="HOST_ROOTID"<?php echo $esbc_ini->HOST_ROOTID->cellAttributes() ?>>
<span id="el_esbc_ini_HOST_ROOTID">
<span<?php echo $esbc_ini->HOST_ROOTID->viewAttributes() ?>>
<?php echo $esbc_ini->HOST_ROOTID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
<?php if (!$esbc_ini_view->IsModal) { ?>
<?php if (!$esbc_ini->isExport()) { ?>
<?php if (!isset($esbc_ini_view->Pager)) $esbc_ini_view->Pager = new PrevNextPager($esbc_ini_view->StartRec, $esbc_ini_view->DisplayRecs, $esbc_ini_view->TotalRecs, $esbc_ini_view->AutoHidePager) ?>
<?php if ($esbc_ini_view->Pager->RecordCount > 0 && $esbc_ini_view->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($esbc_ini_view->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" href="<?php echo $esbc_ini_view->pageUrl() ?>start=<?php echo $esbc_ini_view->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($esbc_ini_view->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" href="<?php echo $esbc_ini_view->pageUrl() ?>start=<?php echo $esbc_ini_view->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $esbc_ini_view->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($esbc_ini_view->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" href="<?php echo $esbc_ini_view->pageUrl() ?>start=<?php echo $esbc_ini_view->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($esbc_ini_view->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" href="<?php echo $esbc_ini_view->pageUrl() ?>start=<?php echo $esbc_ini_view->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $esbc_ini_view->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<div class="clearfix"></div>
<?php } ?>
<?php } ?>
</form>
<?php
$esbc_ini_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$esbc_ini->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$esbc_ini_view->terminate();
?>
