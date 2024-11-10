<?php
namespace PHPMaker2019\esbc_20181010;

/**
 * Table class for esbc_location
 */
class esbc_location extends DbTable
{
	protected $SqlFrom = "";
	protected $SqlSelect = "";
	protected $SqlSelectList = "";
	protected $SqlWhere = "";
	protected $SqlGroupBy = "";
	protected $SqlHaving = "";
	protected $SqlOrderBy = "";
	public $UseSessionForListSql = TRUE;

	// Column CSS classes
	public $LeftColumnClass = "col-sm-2 col-form-label ew-label";
	public $RightColumnClass = "col-sm-10";
	public $OffsetColumnClass = "col-sm-10 offset-sm-2";
	public $TableLeftColumnClass = "w-col-2";

	// Export
	public $ExportDoc;

	// Fields
	public $L_index;
	public $VPS;
	public $VPS_URL;
	public $L_Name;
	public $L_Lat;
	public $L_Lon;
	public $Create_Date;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'esbc_location';
		$this->TableName = 'esbc_location';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`esbc_location`";
		$this->Dbid = 'DB';
		$this->ExportAll = FALSE;
		$this->ExportPageBreakCount = 0; // Page break per every n record (PDF only)
		$this->ExportPageOrientation = "portrait"; // Page orientation (PDF only)
		$this->ExportPageSize = "a4"; // Page size (PDF only)
		$this->ExportExcelPageOrientation = ""; // Page orientation (PhpSpreadsheet only)
		$this->ExportExcelPageSize = ""; // Page size (PhpSpreadsheet only)
		$this->ExportWordPageOrientation = "portrait"; // Page orientation (PHPWord only)
		$this->ExportWordColumnWidth = NULL; // Cell width (PHPWord only)
		$this->DetailAdd = FALSE; // Allow detail add
		$this->DetailEdit = FALSE; // Allow detail edit
		$this->DetailView = FALSE; // Allow detail view
		$this->ShowMultipleDetails = FALSE; // Show multiple details
		$this->GridAddRowCount = 5;
		$this->AllowAddDeleteRow = TRUE; // Allow add/delete row
		$this->UserIDAllowSecurity = 0; // User ID Allow
		$this->BasicSearch = new BasicSearch($this->TableVar);

		// L_index
		$this->L_index = new DbField('esbc_location', 'esbc_location', 'x_L_index', 'L_index', '`L_index`', '`L_index`', 3, -1, FALSE, '`L_index`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->L_index->IsAutoIncrement = TRUE; // Autoincrement field
		$this->L_index->IsPrimaryKey = TRUE; // Primary key field
		$this->L_index->Sortable = TRUE; // Allow sort
		$this->L_index->DefaultErrorMessage = $Language->Phrase("IncorrectInteger");
		$this->fields['L_index'] = &$this->L_index;

		// VPS
		$this->VPS = new DbField('esbc_location', 'esbc_location', 'x_VPS', 'VPS', '`VPS`', '`VPS`', 200, -1, FALSE, '`VPS`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->VPS->Sortable = TRUE; // Allow sort
		$this->fields['VPS'] = &$this->VPS;

		// VPS_URL
		$this->VPS_URL = new DbField('esbc_location', 'esbc_location', 'x_VPS_URL', 'VPS_URL', '`VPS_URL`', '`VPS_URL`', 200, -1, FALSE, '`VPS_URL`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->VPS_URL->Sortable = TRUE; // Allow sort
		$this->fields['VPS_URL'] = &$this->VPS_URL;

		// L_Name
		$this->L_Name = new DbField('esbc_location', 'esbc_location', 'x_L_Name', 'L_Name', '`L_Name`', '`L_Name`', 200, -1, FALSE, '`L_Name`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->L_Name->Nullable = FALSE; // NOT NULL field
		$this->L_Name->Required = TRUE; // Required field
		$this->L_Name->Sortable = TRUE; // Allow sort
		$this->fields['L_Name'] = &$this->L_Name;

		// L_Lat
		$this->L_Lat = new DbField('esbc_location', 'esbc_location', 'x_L_Lat', 'L_Lat', '`L_Lat`', '`L_Lat`', 3, -1, FALSE, '`L_Lat`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->L_Lat->Sortable = TRUE; // Allow sort
		$this->L_Lat->DefaultErrorMessage = $Language->Phrase("IncorrectInteger");
		$this->fields['L_Lat'] = &$this->L_Lat;

		// L_Lon
		$this->L_Lon = new DbField('esbc_location', 'esbc_location', 'x_L_Lon', 'L_Lon', '`L_Lon`', '`L_Lon`', 3, -1, FALSE, '`L_Lon`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->L_Lon->Sortable = TRUE; // Allow sort
		$this->L_Lon->DefaultErrorMessage = $Language->Phrase("IncorrectInteger");
		$this->fields['L_Lon'] = &$this->L_Lon;

		// Create_Date
		$this->Create_Date = new DbField('esbc_location', 'esbc_location', 'x_Create_Date', 'Create_Date', '`Create_Date`', CastDateFieldForLike('`Create_Date`', 1, "DB"), 135, 1, FALSE, '`Create_Date`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Create_Date->Nullable = FALSE; // NOT NULL field
		$this->Create_Date->Required = TRUE; // Required field
		$this->Create_Date->Sortable = TRUE; // Allow sort
		$this->Create_Date->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->Phrase("IncorrectDate"));
		$this->fields['Create_Date'] = &$this->Create_Date;
	}

	// Field Visibility
	public function getFieldVisibility($fldParm)
	{
		global $Security;
		return $this->$fldParm->Visible; // Returns original value
	}

	// Set left column class (must be predefined col-*-* classes of Bootstrap grid system)
	function setLeftColumnClass($class)
	{
		if (preg_match('/^col\-(\w+)\-(\d+)$/', $class, $match)) {
			$this->LeftColumnClass = $class . " col-form-label ew-label";
			$this->RightColumnClass = "col-" . $match[1] . "-" . strval(12 - (int)$match[2]);
			$this->OffsetColumnClass = $this->RightColumnClass . " " . str_replace("col-", "offset-", $class);
			$this->TableLeftColumnClass = preg_replace('/^col-\w+-(\d+)$/', "w-col-$1", $class); // Change to w-col-*
		}
	}

	// Single column sort
	public function updateSort(&$fld)
	{
		if ($this->CurrentOrder == $fld->Name) {
			$sortField = $fld->Expression;
			$lastSort = $fld->getSort();
			if ($this->CurrentOrderType == "ASC" || $this->CurrentOrderType == "DESC") {
				$thisSort = $this->CurrentOrderType;
			} else {
				$thisSort = ($lastSort == "ASC") ? "DESC" : "ASC";
			}
			$fld->setSort($thisSort);
			$this->setSessionOrderBy($sortField . " " . $thisSort); // Save to Session
		} else {
			$fld->setSort("");
		}
	}

	// Table level SQL
	public function getSqlFrom() // From
	{
		return ($this->SqlFrom <> "") ? $this->SqlFrom : "`esbc_location`";
	}
	public function sqlFrom() // For backward compatibility
	{
		return $this->getSqlFrom();
	}
	public function setSqlFrom($v)
	{
		$this->SqlFrom = $v;
	}
	public function getSqlSelect() // Select
	{
		return ($this->SqlSelect <> "") ? $this->SqlSelect : "SELECT * FROM " . $this->getSqlFrom();
	}
	public function sqlSelect() // For backward compatibility
	{
		return $this->getSqlSelect();
	}
	public function setSqlSelect($v)
	{
		$this->SqlSelect = $v;
	}
	public function getSqlWhere() // Where
	{
		$where = ($this->SqlWhere <> "") ? $this->SqlWhere : "";
		$this->TableFilter = "";
		AddFilter($where, $this->TableFilter);
		return $where;
	}
	public function sqlWhere() // For backward compatibility
	{
		return $this->getSqlWhere();
	}
	public function setSqlWhere($v)
	{
		$this->SqlWhere = $v;
	}
	public function getSqlGroupBy() // Group By
	{
		return ($this->SqlGroupBy <> "") ? $this->SqlGroupBy : "";
	}
	public function sqlGroupBy() // For backward compatibility
	{
		return $this->getSqlGroupBy();
	}
	public function setSqlGroupBy($v)
	{
		$this->SqlGroupBy = $v;
	}
	public function getSqlHaving() // Having
	{
		return ($this->SqlHaving <> "") ? $this->SqlHaving : "";
	}
	public function sqlHaving() // For backward compatibility
	{
		return $this->getSqlHaving();
	}
	public function setSqlHaving($v)
	{
		$this->SqlHaving = $v;
	}
	public function getSqlOrderBy() // Order By
	{
		return ($this->SqlOrderBy <> "") ? $this->SqlOrderBy : "";
	}
	public function sqlOrderBy() // For backward compatibility
	{
		return $this->getSqlOrderBy();
	}
	public function setSqlOrderBy($v)
	{
		$this->SqlOrderBy = $v;
	}

	// Apply User ID filters
	public function applyUserIDFilters($filter)
	{
		return $filter;
	}

	// Check if User ID security allows view all
	public function userIDAllow($id = "")
	{
		$allow = USER_ID_ALLOW;
		switch ($id) {
			case "add":
			case "copy":
			case "gridadd":
			case "register":
			case "addopt":
				return (($allow & 1) == 1);
			case "edit":
			case "gridedit":
			case "update":
			case "changepwd":
			case "forgotpwd":
				return (($allow & 4) == 4);
			case "delete":
				return (($allow & 2) == 2);
			case "view":
				return (($allow & 32) == 32);
			case "search":
				return (($allow & 64) == 64);
			default:
				return (($allow & 8) == 8);
		}
	}

	// Get SQL
	public function getSql($where, $orderBy = "")
	{
		return BuildSelectSql($this->getSqlSelect(), $this->getSqlWhere(),
			$this->getSqlGroupBy(), $this->getSqlHaving(), $this->getSqlOrderBy(),
			$where, $orderBy);
	}

	// Table SQL
	public function getCurrentSql()
	{
		$filter = $this->CurrentFilter;
		$filter = $this->applyUserIDFilters($filter);
		$sort = $this->getSessionOrderBy();
		return $this->getSql($filter, $sort);
	}

	// Table SQL with List page filter
	public function getListSql()
	{
		$filter = $this->UseSessionForListSql ? $this->getSessionWhere() : "";
		AddFilter($filter, $this->CurrentFilter);
		$filter = $this->applyUserIDFilters($filter);
		$this->Recordset_Selecting($filter);
		$select = $this->getSqlSelect();
		$sort = $this->UseSessionForListSql ? $this->getSessionOrderBy() : "";
		return BuildSelectSql($select, $this->getSqlWhere(), $this->getSqlGroupBy(),
			$this->getSqlHaving(), $this->getSqlOrderBy(), $filter, $sort);
	}

	// Get ORDER BY clause
	public function getOrderBy()
	{
		$sort = $this->getSessionOrderBy();
		return BuildSelectSql("", "", "", "", $this->getSqlOrderBy(), "", $sort);
	}

	// Get record count
	public function getRecordCount($sql)
	{
		$cnt = -1;
		$rs = NULL;
		$sql = preg_replace('/\/\*BeginOrderBy\*\/[\s\S]+\/\*EndOrderBy\*\//', "", $sql); // Remove ORDER BY clause (MSSQL)
		$pattern = '/^SELECT\s([\s\S]+)\sFROM\s/i';

		// Skip Custom View / SubQuery and SELECT DISTINCT
		if (($this->TableType == 'TABLE' || $this->TableType == 'VIEW' || $this->TableType == 'LINKTABLE') &&
			preg_match($pattern, $sql) && !preg_match('/\(\s*(SELECT[^)]+)\)/i', $sql) && !preg_match('/^\s*select\s+distinct\s+/i', $sql)) {
			$sqlwrk = "SELECT COUNT(*) FROM " . preg_replace($pattern, "", $sql);
		} else {
			$sqlwrk = "SELECT COUNT(*) FROM (" . $sql . ") COUNT_TABLE";
		}
		$conn = &$this->getConnection();
		if ($rs = $conn->execute($sqlwrk)) {
			if (!$rs->EOF && $rs->FieldCount() > 0) {
				$cnt = $rs->fields[0];
				$rs->close();
			}
			return (int)$cnt;
		}

		// Unable to get count, get record count directly
		if ($rs = $conn->execute($sql)) {
			$cnt = $rs->RecordCount();
			$rs->close();
			return (int)$cnt;
		}
		return $cnt;
	}

	// Get record count based on filter (for detail record count in master table pages)
	public function loadRecordCount($filter)
	{
		$origFilter = $this->CurrentFilter;
		$this->CurrentFilter = $filter;
		$this->Recordset_Selecting($this->CurrentFilter);
		$select = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlSelect() : "SELECT * FROM " . $this->getSqlFrom();
		$groupBy = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlGroupBy() : "";
		$having = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlHaving() : "";
		$sql = BuildSelectSql($select, $this->getSqlWhere(), $groupBy, $having, "", $this->CurrentFilter, "");
		$cnt = $this->getRecordCount($sql);
		$this->CurrentFilter = $origFilter;
		return $cnt;
	}

	// Get record count (for current List page)
	public function listRecordCount()
	{
		$filter = $this->getSessionWhere();
		AddFilter($filter, $this->CurrentFilter);
		$filter = $this->applyUserIDFilters($filter);
		$this->Recordset_Selecting($filter);
		$select = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlSelect() : "SELECT * FROM " . $this->getSqlFrom();
		$groupBy = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlGroupBy() : "";
		$having = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlHaving() : "";
		$sql = BuildSelectSql($select, $this->getSqlWhere(), $groupBy, $having, "", $filter, "");
		$cnt = $this->getRecordCount($sql);
		return $cnt;
	}

	// INSERT statement
	protected function insertSql(&$rs)
	{
		$names = "";
		$values = "";
		foreach ($rs as $name => $value) {
			if (!isset($this->fields[$name]) || $this->fields[$name]->IsCustom)
				continue;
			$names .= $this->fields[$name]->Expression . ",";
			$values .= QuotedValue($value, $this->fields[$name]->DataType, $this->Dbid) . ",";
		}
		$names = preg_replace('/,+$/', "", $names);
		$values = preg_replace('/,+$/', "", $values);
		return "INSERT INTO " . $this->UpdateTable . " ($names) VALUES ($values)";
	}

	// Insert
	public function insert(&$rs)
	{
		$conn = &$this->getConnection();
		$success = $conn->execute($this->insertSql($rs));
		if ($success) {

			// Get insert id if necessary
			$this->L_index->setDbValue($conn->insert_ID());
			$rs['L_index'] = $this->L_index->DbValue;
		}
		return $success;
	}

	// UPDATE statement
	protected function updateSql(&$rs, $where = "", $curfilter = TRUE)
	{
		$sql = "UPDATE " . $this->UpdateTable . " SET ";
		foreach ($rs as $name => $value) {
			if (!isset($this->fields[$name]) || $this->fields[$name]->IsCustom || $this->fields[$name]->IsPrimaryKey)
				continue;
			$sql .= $this->fields[$name]->Expression . "=";
			$sql .= QuotedValue($value, $this->fields[$name]->DataType, $this->Dbid) . ",";
		}
		$sql = preg_replace('/,+$/', "", $sql);
		$filter = ($curfilter) ? $this->CurrentFilter : "";
		if (is_array($where))
			$where = $this->arrayToFilter($where);
		AddFilter($filter, $where);
		if ($filter <> "")
			$sql .= " WHERE " . $filter;
		return $sql;
	}

	// Update
	public function update(&$rs, $where = "", $rsold = NULL, $curfilter = TRUE)
	{
		$conn = &$this->getConnection();
		$success = $conn->execute($this->updateSql($rs, $where, $curfilter));
		return $success;
	}

	// DELETE statement
	protected function deleteSql(&$rs, $where = "", $curfilter = TRUE)
	{
		$sql = "DELETE FROM " . $this->UpdateTable . " WHERE ";
		if (is_array($where))
			$where = $this->arrayToFilter($where);
		if ($rs) {
			if (array_key_exists('L_index', $rs))
				AddFilter($where, QuotedName('L_index', $this->Dbid) . '=' . QuotedValue($rs['L_index'], $this->L_index->DataType, $this->Dbid));
		}
		$filter = ($curfilter) ? $this->CurrentFilter : "";
		AddFilter($filter, $where);
		if ($filter <> "")
			$sql .= $filter;
		else
			$sql .= "0=1"; // Avoid delete
		return $sql;
	}

	// Delete
	public function delete(&$rs, $where = "", $curfilter = FALSE)
	{
		$success = TRUE;
		$conn = &$this->getConnection();
		if ($success)
			$success = $conn->execute($this->deleteSql($rs, $where, $curfilter));
		return $success;
	}

	// Load DbValue from recordset or array
	protected function loadDbValues(&$rs)
	{
		if (!$rs || !is_array($rs) && $rs->EOF)
			return;
		$row = is_array($rs) ? $rs : $rs->fields;
		$this->L_index->DbValue = $row['L_index'];
		$this->VPS->DbValue = $row['VPS'];
		$this->VPS_URL->DbValue = $row['VPS_URL'];
		$this->L_Name->DbValue = $row['L_Name'];
		$this->L_Lat->DbValue = $row['L_Lat'];
		$this->L_Lon->DbValue = $row['L_Lon'];
		$this->Create_Date->DbValue = $row['Create_Date'];
	}

	// Delete uploaded files
	public function deleteUploadedFiles($row)
	{
		$this->loadDbValues($row);
	}

	// Record filter WHERE clause
	protected function sqlKeyFilter()
	{
		return "`L_index` = @L_index@";
	}

	// Get record filter
	public function getRecordFilter($row = NULL)
	{
		$keyFilter = $this->sqlKeyFilter();
		$val = is_array($row) ? (array_key_exists('L_index', $row) ? $row['L_index'] : NULL) : $this->L_index->CurrentValue;
		if (!is_numeric($val))
			return "0=1"; // Invalid key
		if ($val == NULL)
			return "0=1"; // Invalid key
		else
			$keyFilter = str_replace("@L_index@", AdjustSql($val, $this->Dbid), $keyFilter); // Replace key value
		return $keyFilter;
	}

	// Return page URL
	public function getReturnUrl()
	{
		$name = PROJECT_NAME . "_" . $this->TableVar . "_" . TABLE_RETURN_URL;

		// Get referer URL automatically
		if (ServerVar("HTTP_REFERER") <> "" && ReferPageName() <> CurrentPageName() && ReferPageName() <> "login.php") // Referer not same page or login page
			$_SESSION[$name] = ServerVar("HTTP_REFERER"); // Save to Session
		if (@$_SESSION[$name] <> "") {
			return $_SESSION[$name];
		} else {
			return "esbc_locationlist.php";
		}
	}
	public function setReturnUrl($v)
	{
		$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . TABLE_RETURN_URL] = $v;
	}

	// Get modal caption
	public function getModalCaption($pageName)
	{
		global $Language;
		if ($pageName == "esbc_locationview.php")
			return $Language->Phrase("View");
		elseif ($pageName == "esbc_locationedit.php")
			return $Language->Phrase("Edit");
		elseif ($pageName == "esbc_locationadd.php")
			return $Language->Phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "esbc_locationlist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm <> "")
			$url = $this->keyUrl("esbc_locationview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("esbc_locationview.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm <> "")
			$url = "esbc_locationadd.php?" . $this->getUrlParm($parm);
		else
			$url = "esbc_locationadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("esbc_locationedit.php", $this->getUrlParm($parm));
		return $this->addMasterUrl($url);
	}

	// Inline edit URL
	public function getInlineEditUrl()
	{
		$url = $this->keyUrl(CurrentPageName(), $this->getUrlParm("action=edit"));
		return $this->addMasterUrl($url);
	}

	// Copy URL
	public function getCopyUrl($parm = "")
	{
		$url = $this->keyUrl("esbc_locationadd.php", $this->getUrlParm($parm));
		return $this->addMasterUrl($url);
	}

	// Inline copy URL
	public function getInlineCopyUrl()
	{
		$url = $this->keyUrl(CurrentPageName(), $this->getUrlParm("action=copy"));
		return $this->addMasterUrl($url);
	}

	// Delete URL
	public function getDeleteUrl()
	{
		return $this->keyUrl("esbc_locationdelete.php", $this->getUrlParm());
	}

	// Add master url
	public function addMasterUrl($url)
	{
		return $url;
	}
	public function keyToJson($htmlEncode = FALSE)
	{
		$json = "";
		$json .= "L_index:" . JsonEncode($this->L_index->CurrentValue, "number");
		$json = "{" . $json . "}";
		if ($htmlEncode)
			$json = HtmlEncode($json);
		return $json;
	}

	// Add key value to URL
	public function keyUrl($url, $parm = "")
	{
		$url = $url . "?";
		if ($parm <> "")
			$url .= $parm . "&";
		if ($this->L_index->CurrentValue != NULL) {
			$url .= "L_index=" . urlencode($this->L_index->CurrentValue);
		} else {
			return "javascript:ew.alert(ew.language.phrase('InvalidRecord'));";
		}
		return $url;
	}

	// Sort URL
	public function sortUrl(&$fld)
	{
		if ($this->CurrentAction || $this->isExport() ||
			in_array($fld->Type, array(128, 204, 205))) { // Unsortable data type
				return "";
		} elseif ($fld->Sortable) {
			$urlParm = $this->getUrlParm("order=" . urlencode($fld->Name) . "&amp;ordertype=" . $fld->reverseSort());
			return $this->addMasterUrl(CurrentPageName() . "?" . $urlParm);
		} else {
			return "";
		}
	}

	// Get record keys from Post/Get/Session
	public function getRecordKeys()
	{
		global $COMPOSITE_KEY_SEPARATOR;
		$arKeys = array();
		$arKey = array();
		if (Param("key_m") !== NULL) {
			$arKeys = Param("key_m");
			$cnt = count($arKeys);
		} else {
			if (Param("L_index") !== NULL)
				$arKeys[] = Param("L_index");
			elseif (IsApi() && Key(0) !== NULL)
				$arKeys[] = Key(0);
			elseif (IsApi() && Route(2) !== NULL)
				$arKeys[] = Route(2);
			else
				$arKeys = NULL; // Do not setup

			//return $arKeys; // Do not return yet, so the values will also be checked by the following code
		}

		// Check keys
		$ar = array();
		if (is_array($arKeys)) {
			foreach ($arKeys as $key) {
				if (!is_numeric($key))
					continue;
				$ar[] = $key;
			}
		}
		return $ar;
	}

	// Get filter from record keys
	public function getFilterFromRecordKeys()
	{
		$arKeys = $this->getRecordKeys();
		$keyFilter = "";
		foreach ($arKeys as $key) {
			if ($keyFilter <> "") $keyFilter .= " OR ";
			$this->L_index->CurrentValue = $key;
			$keyFilter .= "(" . $this->getRecordFilter() . ")";
		}
		return $keyFilter;
	}

	// Load rows based on filter
	public function &loadRs($filter)
	{

		// Set up filter (WHERE Clause)
		$sql = $this->getSql($filter);
		$conn = &$this->getConnection();
		$rs = $conn->execute($sql);
		return $rs;
	}

	// Load row values from recordset
	public function loadListRowValues(&$rs)
	{
		$this->L_index->setDbValue($rs->fields('L_index'));
		$this->VPS->setDbValue($rs->fields('VPS'));
		$this->VPS_URL->setDbValue($rs->fields('VPS_URL'));
		$this->L_Name->setDbValue($rs->fields('L_Name'));
		$this->L_Lat->setDbValue($rs->fields('L_Lat'));
		$this->L_Lon->setDbValue($rs->fields('L_Lon'));
		$this->Create_Date->setDbValue($rs->fields('Create_Date'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

	// Common render codes
		// L_index
		// VPS
		// VPS_URL
		// L_Name
		// L_Lat
		// L_Lon
		// Create_Date
		// L_index

		$this->L_index->ViewValue = $this->L_index->CurrentValue;
		$this->L_index->ViewCustomAttributes = "";

		// VPS
		$this->VPS->ViewValue = $this->VPS->CurrentValue;
		$this->VPS->ViewCustomAttributes = "";

		// VPS_URL
		$this->VPS_URL->ViewValue = $this->VPS_URL->CurrentValue;
		$this->VPS_URL->ViewCustomAttributes = "";

		// L_Name
		$this->L_Name->ViewValue = $this->L_Name->CurrentValue;
		$this->L_Name->ViewCustomAttributes = "";

		// L_Lat
		$this->L_Lat->ViewValue = $this->L_Lat->CurrentValue;
		$this->L_Lat->ViewValue = FormatNumber($this->L_Lat->ViewValue, 0, -2, -2, -2);
		$this->L_Lat->ViewCustomAttributes = "";

		// L_Lon
		$this->L_Lon->ViewValue = $this->L_Lon->CurrentValue;
		$this->L_Lon->ViewValue = FormatNumber($this->L_Lon->ViewValue, 0, -2, -2, -2);
		$this->L_Lon->ViewCustomAttributes = "";

		// Create_Date
		$this->Create_Date->ViewValue = $this->Create_Date->CurrentValue;
		$this->Create_Date->ViewValue = FormatDateTime($this->Create_Date->ViewValue, 1);
		$this->Create_Date->ViewCustomAttributes = "";

		// L_index
		$this->L_index->LinkCustomAttributes = "";
		$this->L_index->HrefValue = "";
		$this->L_index->TooltipValue = "";

		// VPS
		$this->VPS->LinkCustomAttributes = "";
		$this->VPS->HrefValue = "";
		$this->VPS->TooltipValue = "";

		// VPS_URL
		$this->VPS_URL->LinkCustomAttributes = "";
		$this->VPS_URL->HrefValue = "";
		$this->VPS_URL->TooltipValue = "";

		// L_Name
		$this->L_Name->LinkCustomAttributes = "";
		$this->L_Name->HrefValue = "";
		$this->L_Name->TooltipValue = "";

		// L_Lat
		$this->L_Lat->LinkCustomAttributes = "";
		$this->L_Lat->HrefValue = "";
		$this->L_Lat->TooltipValue = "";

		// L_Lon
		$this->L_Lon->LinkCustomAttributes = "";
		$this->L_Lon->HrefValue = "";
		$this->L_Lon->TooltipValue = "";

		// Create_Date
		$this->Create_Date->LinkCustomAttributes = "";
		$this->Create_Date->HrefValue = "";
		$this->Create_Date->TooltipValue = "";

		// Call Row Rendered event
		$this->Row_Rendered();

		// Save data for Custom Template
		$this->Rows[] = $this->customTemplateFieldValues();
	}

	// Render edit row values
	public function renderEditRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// L_index
		$this->L_index->EditAttrs["class"] = "form-control";
		$this->L_index->EditCustomAttributes = "";
		$this->L_index->EditValue = $this->L_index->CurrentValue;
		$this->L_index->ViewCustomAttributes = "";

		// VPS
		$this->VPS->EditAttrs["class"] = "form-control";
		$this->VPS->EditCustomAttributes = "";
		$this->VPS->EditValue = $this->VPS->CurrentValue;
		$this->VPS->PlaceHolder = RemoveHtml($this->VPS->caption());

		// VPS_URL
		$this->VPS_URL->EditAttrs["class"] = "form-control";
		$this->VPS_URL->EditCustomAttributes = "";
		$this->VPS_URL->EditValue = $this->VPS_URL->CurrentValue;
		$this->VPS_URL->PlaceHolder = RemoveHtml($this->VPS_URL->caption());

		// L_Name
		$this->L_Name->EditAttrs["class"] = "form-control";
		$this->L_Name->EditCustomAttributes = "";
		$this->L_Name->EditValue = $this->L_Name->CurrentValue;
		$this->L_Name->PlaceHolder = RemoveHtml($this->L_Name->caption());

		// L_Lat
		$this->L_Lat->EditAttrs["class"] = "form-control";
		$this->L_Lat->EditCustomAttributes = "";
		$this->L_Lat->EditValue = $this->L_Lat->CurrentValue;
		$this->L_Lat->PlaceHolder = RemoveHtml($this->L_Lat->caption());

		// L_Lon
		$this->L_Lon->EditAttrs["class"] = "form-control";
		$this->L_Lon->EditCustomAttributes = "";
		$this->L_Lon->EditValue = $this->L_Lon->CurrentValue;
		$this->L_Lon->PlaceHolder = RemoveHtml($this->L_Lon->caption());

		// Create_Date
		$this->Create_Date->EditAttrs["class"] = "form-control";
		$this->Create_Date->EditCustomAttributes = "";
		$this->Create_Date->EditValue = FormatDateTime($this->Create_Date->CurrentValue, 8);
		$this->Create_Date->PlaceHolder = RemoveHtml($this->Create_Date->caption());

		// Call Row Rendered event
		$this->Row_Rendered();
	}

	// Aggregate list row values
	public function aggregateListRowValues()
	{
	}

	// Aggregate list row (for rendering)
	public function aggregateListRow()
	{

		// Call Row Rendered event
		$this->Row_Rendered();
	}

	// Export data in HTML/CSV/Word/Excel/Email/PDF format
	public function exportDocument($doc, $recordset, $startRec = 1, $stopRec = 1, $exportPageType = "")
	{
		if (!$recordset || !$doc)
			return;
		if (!$doc->ExportCustom) {

			// Write header
			$doc->exportTableHeader();
			if ($doc->Horizontal) { // Horizontal format, write header
				$doc->beginExportRow();
				if ($exportPageType == "view") {
					if ($this->L_index->Exportable)
						$doc->exportCaption($this->L_index);
					if ($this->VPS->Exportable)
						$doc->exportCaption($this->VPS);
					if ($this->VPS_URL->Exportable)
						$doc->exportCaption($this->VPS_URL);
					if ($this->L_Name->Exportable)
						$doc->exportCaption($this->L_Name);
					if ($this->L_Lat->Exportable)
						$doc->exportCaption($this->L_Lat);
					if ($this->L_Lon->Exportable)
						$doc->exportCaption($this->L_Lon);
					if ($this->Create_Date->Exportable)
						$doc->exportCaption($this->Create_Date);
				} else {
					if ($this->L_index->Exportable)
						$doc->exportCaption($this->L_index);
					if ($this->VPS->Exportable)
						$doc->exportCaption($this->VPS);
					if ($this->VPS_URL->Exportable)
						$doc->exportCaption($this->VPS_URL);
					if ($this->L_Name->Exportable)
						$doc->exportCaption($this->L_Name);
					if ($this->L_Lat->Exportable)
						$doc->exportCaption($this->L_Lat);
					if ($this->L_Lon->Exportable)
						$doc->exportCaption($this->L_Lon);
					if ($this->Create_Date->Exportable)
						$doc->exportCaption($this->Create_Date);
				}
				$doc->endExportRow();
			}
		}

		// Move to first record
		$recCnt = $startRec - 1;
		if (!$recordset->EOF) {
			$recordset->moveFirst();
			if ($startRec > 1)
				$recordset->move($startRec - 1);
		}
		while (!$recordset->EOF && $recCnt < $stopRec) {
			$recCnt++;
			if ($recCnt >= $startRec) {
				$rowCnt = $recCnt - $startRec + 1;

				// Page break
				if ($this->ExportPageBreakCount > 0) {
					if ($rowCnt > 1 && ($rowCnt - 1) % $this->ExportPageBreakCount == 0)
						$doc->exportPageBreak();
				}
				$this->loadListRowValues($recordset);

				// Render row
				$this->RowType = ROWTYPE_VIEW; // Render view
				$this->resetAttributes();
				$this->renderListRow();
				if (!$doc->ExportCustom) {
					$doc->beginExportRow($rowCnt); // Allow CSS styles if enabled
					if ($exportPageType == "view") {
						if ($this->L_index->Exportable)
							$doc->exportField($this->L_index);
						if ($this->VPS->Exportable)
							$doc->exportField($this->VPS);
						if ($this->VPS_URL->Exportable)
							$doc->exportField($this->VPS_URL);
						if ($this->L_Name->Exportable)
							$doc->exportField($this->L_Name);
						if ($this->L_Lat->Exportable)
							$doc->exportField($this->L_Lat);
						if ($this->L_Lon->Exportable)
							$doc->exportField($this->L_Lon);
						if ($this->Create_Date->Exportable)
							$doc->exportField($this->Create_Date);
					} else {
						if ($this->L_index->Exportable)
							$doc->exportField($this->L_index);
						if ($this->VPS->Exportable)
							$doc->exportField($this->VPS);
						if ($this->VPS_URL->Exportable)
							$doc->exportField($this->VPS_URL);
						if ($this->L_Name->Exportable)
							$doc->exportField($this->L_Name);
						if ($this->L_Lat->Exportable)
							$doc->exportField($this->L_Lat);
						if ($this->L_Lon->Exportable)
							$doc->exportField($this->L_Lon);
						if ($this->Create_Date->Exportable)
							$doc->exportField($this->Create_Date);
					}
					$doc->endExportRow($rowCnt);
				}
			}

			// Call Row Export server event
			if ($doc->ExportCustom)
				$this->Row_Export($recordset->fields);
			$recordset->moveNext();
		}
		if (!$doc->ExportCustom) {
			$doc->exportTableFooter();
		}
	}

	// Lookup data from table
	public function lookup()
	{
		global $Security, $RequestSecurity;

		// Check token first
		$func = PROJECT_NAMESPACE . "CheckToken";
		$validRequest = FALSE;
		if (is_callable($func) && Post(TOKEN_NAME) !== NULL) {
			$validRequest = $func(Post(TOKEN_NAME), SessionTimeoutTime());
			if ($validRequest) {
				if (!isset($Security)) {
					if (session_status() !== PHP_SESSION_ACTIVE)
						session_start(); // Init session data
					$Security = new AdvancedSecurity();
					$validRequest = $Security->isLoggedIn(); // Logged in
					if ($validRequest) {
						$Security->UserID_Loading();
						$Security->loadUserID();
						$Security->UserID_Loaded();
						if (strval($Security->currentUserID()) == "")
							$validRequest = FALSE;
					}
				}
			}
		} else {

			// User profile
			$UserProfile = new UserProfile();

			// Security
			$Security = new AdvancedSecurity();
			if (is_array($RequestSecurity)) // Login user for API request
				$Security->loginUser(@$RequestSecurity["username"], @$RequestSecurity["userid"], @$RequestSecurity["parentuserid"], @$RequestSecurity["userlevelid"]);
			$validRequest = $Security->isLoggedIn(); // Logged in
		}

		// Reject invalid request
		if (!$validRequest)
			return FALSE;

		// Load lookup parameters
		$distinct = ConvertToBool(Post("distinct"));
		$linkField = Post("linkField");
		$displayFields = Post("displayFields");
		$parentFields = Post("parentFields");
		if (!is_array($parentFields))
			$parentFields = [];
		$childFields = Post("childFields");
		if (!is_array($childFields))
			$childFields = [];
		$filterFields = Post("filterFields");
		if (!is_array($filterFields))
			$filterFields = [];
		$filterOperators = Post("filterOperators");
		if (!is_array($filterOperators))
			$filterOperators = [];
		$autoFillSourceFields = Post("autoFillSourceFields");
		if (!is_array($autoFillSourceFields))
			$autoFillSourceFields = [];
		$formatAutoFill = FALSE;
		$lookupType = Post("ajax", "unknown");
		$pageSize = -1;
		$offset = -1;
		$searchValue = "";
		if (SameText($lookupType, "modal")) {
			$searchValue = Post("sv", "");
			$pageSize = Post("recperpage", 10);
			$offset = Post("start", 0);
		} elseif (SameText($lookupType, "autosuggest")) {
			$searchValue = Get("q", "");
			$pageSize = Param("n", -1);
			$pageSize = is_numeric($pageSize) ? (int)$pageSize : -1;
			if ($pageSize <= 0)
				$pageSize = AUTO_SUGGEST_MAX_ENTRIES;
			$start = Param("start", -1);
			$start = is_numeric($start) ? (int)$start : -1;
			$page = Param("page", -1);
			$page = is_numeric($page) ? (int)$page : -1;
			$offset = $start >= 0 ? $start : ($page > 0 && $pageSize > 0 ? ($page - 1) * $pageSize : 0);
		}
		$userSelect = Decrypt(Post("s", ""));
		$userFilter = Decrypt(Post("f", ""));
		$userOrderBy = Decrypt(Post("o", ""));

		// Create lookup object and output JSON
		$lookup = new Lookup($linkField, $this->TableVar, $distinct, $linkField, $displayFields, $parentFields, $childFields, $filterFields, $autoFillSourceFields);
		foreach ($filterFields as $i => $filterField) { // Set up filter operators
			if (@$filterOperators[$i] <> "")
				$lookup->setFilterOperator($filterField, $filterOperators[$i]);
		}
		$lookup->LookupType = $lookupType; // Lookup type
		$lookup->FilterValues[] = rawurldecode(Post("v0", Post("lookupValue", ""))); // Lookup values
		$cnt = is_array($filterFields) ? count($filterFields) : 0;
		for ($i = 1; $i <= $cnt; $i++)
			$lookup->FilterValues[] = rawurldecode(Post("v" . $i, ""));
		$lookup->SearchValue = $searchValue;
		$lookup->PageSize = $pageSize;
		$lookup->Offset = $offset;
		if ($userSelect <> "")
			$lookup->UserSelect = $userSelect;
		if ($userFilter <> "")
			$lookup->UserFilter = $userFilter;
		if ($userOrderBy <> "")
			$lookup->UserOrderBy = $userOrderBy;
		$lookup->toJson();
	}

	// Get file data
	public function getFileData($fldparm, $key, $resize, $width = THUMBNAIL_DEFAULT_WIDTH, $height = THUMBNAIL_DEFAULT_HEIGHT)
	{

		// No binary fields
		return FALSE;
	}

	// Table level events
	// Recordset Selecting event
	function Recordset_Selecting(&$filter) {

		// Enter your code here
	}

	// Recordset Selected event
	function Recordset_Selected(&$rs) {

		//echo "Recordset Selected";
	}

	// Recordset Search Validated event
	function Recordset_SearchValidated() {

		// Example:
		//$this->MyField1->AdvancedSearch->SearchValue = "your search criteria"; // Search value

	}

	// Recordset Searching event
	function Recordset_Searching(&$filter) {

		// Enter your code here
	}

	// Row_Selecting event
	function Row_Selecting(&$filter) {

		// Enter your code here
	}

	// Row Selected event
	function Row_Selected(&$rs) {

		//echo "Row Selected";
	}

	// Row Inserting event
	function Row_Inserting($rsold, &$rsnew) {

		// Enter your code here
		// To cancel, set return value to FALSE

		return TRUE;
	}

	// Row Inserted event
	function Row_Inserted($rsold, &$rsnew) {

		//echo "Row Inserted"
	}

	// Row Updating event
	function Row_Updating($rsold, &$rsnew) {

		// Enter your code here
		// To cancel, set return value to FALSE

		return TRUE;
	}

	// Row Updated event
	function Row_Updated($rsold, &$rsnew) {

		//echo "Row Updated";
	}

	// Row Update Conflict event
	function Row_UpdateConflict($rsold, &$rsnew) {

		// Enter your code here
		// To ignore conflict, set return value to FALSE

		return TRUE;
	}

	// Grid Inserting event
	function Grid_Inserting() {

		// Enter your code here
		// To reject grid insert, set return value to FALSE

		return TRUE;
	}

	// Grid Inserted event
	function Grid_Inserted($rsnew) {

		//echo "Grid Inserted";
	}

	// Grid Updating event
	function Grid_Updating($rsold) {

		// Enter your code here
		// To reject grid update, set return value to FALSE

		return TRUE;
	}

	// Grid Updated event
	function Grid_Updated($rsold, $rsnew) {

		//echo "Grid Updated";
	}

	// Row Deleting event
	function Row_Deleting(&$rs) {

		// Enter your code here
		// To cancel, set return value to False

		return TRUE;
	}

	// Row Deleted event
	function Row_Deleted(&$rs) {

		//echo "Row Deleted";
	}

	// Email Sending event
	function Email_Sending($email, &$args) {

		//var_dump($email); var_dump($args); exit();
		return TRUE;
	}

	// Lookup Selecting event
	function Lookup_Selecting($fld, &$filter) {

		//var_dump($fld->Name, $fld->Lookup, $filter); // Uncomment to view the filter
		// Enter your code here

	}

	// Row Rendering event
	function Row_Rendering() {

		// Enter your code here
	}

	// Row Rendered event
	function Row_Rendered() {

		// To view properties of field class, use:
		//var_dump($this-><FieldName>);

	}

	// User ID Filtering event
	function UserID_Filtering(&$filter) {

		// Enter your code here
	}
}
?>
