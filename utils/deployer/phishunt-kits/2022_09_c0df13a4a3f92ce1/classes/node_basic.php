<?php
namespace PHPMaker2019\esbc_20181010;

/**
 * Table class for node_basic
 */
class node_basic extends DbTable
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
	public $NODE_INDEX;
	public $ESBC_INDEX;
	public $NODE_NAME;
	public $NODE_PW;
	public $NODE_ENODE;
	public $NODE_ACCOUNT_ID;
	public $NODE_SIGNER;
	public $Create_Date;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'node_basic';
		$this->TableName = 'node_basic';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`node_basic`";
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

		// NODE_INDEX
		$this->NODE_INDEX = new DbField('node_basic', 'node_basic', 'x_NODE_INDEX', 'NODE_INDEX', '`NODE_INDEX`', '`NODE_INDEX`', 3, -1, FALSE, '`NODE_INDEX`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->NODE_INDEX->IsAutoIncrement = TRUE; // Autoincrement field
		$this->NODE_INDEX->IsPrimaryKey = TRUE; // Primary key field
		$this->NODE_INDEX->Sortable = TRUE; // Allow sort
		$this->NODE_INDEX->DefaultErrorMessage = $Language->Phrase("IncorrectInteger");
		$this->fields['NODE_INDEX'] = &$this->NODE_INDEX;

		// ESBC_INDEX
		$this->ESBC_INDEX = new DbField('node_basic', 'node_basic', 'x_ESBC_INDEX', 'ESBC_INDEX', '`ESBC_INDEX`', '`ESBC_INDEX`', 3, -1, FALSE, '`ESBC_INDEX`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ESBC_INDEX->Nullable = FALSE; // NOT NULL field
		$this->ESBC_INDEX->Required = TRUE; // Required field
		$this->ESBC_INDEX->Sortable = TRUE; // Allow sort
		$this->ESBC_INDEX->DefaultErrorMessage = $Language->Phrase("IncorrectInteger");
		$this->fields['ESBC_INDEX'] = &$this->ESBC_INDEX;

		// NODE_NAME
		$this->NODE_NAME = new DbField('node_basic', 'node_basic', 'x_NODE_NAME', 'NODE_NAME', '`NODE_NAME`', '`NODE_NAME`', 200, -1, FALSE, '`NODE_NAME`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->NODE_NAME->Nullable = FALSE; // NOT NULL field
		$this->NODE_NAME->Required = TRUE; // Required field
		$this->NODE_NAME->Sortable = TRUE; // Allow sort
		$this->fields['NODE_NAME'] = &$this->NODE_NAME;

		// NODE_PW
		$this->NODE_PW = new DbField('node_basic', 'node_basic', 'x_NODE_PW', 'NODE_PW', '`NODE_PW`', '`NODE_PW`', 200, -1, FALSE, '`NODE_PW`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->NODE_PW->Nullable = FALSE; // NOT NULL field
		$this->NODE_PW->Required = TRUE; // Required field
		$this->NODE_PW->Sortable = TRUE; // Allow sort
		$this->fields['NODE_PW'] = &$this->NODE_PW;

		// NODE_ENODE
		$this->NODE_ENODE = new DbField('node_basic', 'node_basic', 'x_NODE_ENODE', 'NODE_ENODE', '`NODE_ENODE`', '`NODE_ENODE`', 200, -1, FALSE, '`NODE_ENODE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->NODE_ENODE->Nullable = FALSE; // NOT NULL field
		$this->NODE_ENODE->Required = TRUE; // Required field
		$this->NODE_ENODE->Sortable = TRUE; // Allow sort
		$this->fields['NODE_ENODE'] = &$this->NODE_ENODE;

		// NODE_ACCOUNT_ID
		$this->NODE_ACCOUNT_ID = new DbField('node_basic', 'node_basic', 'x_NODE_ACCOUNT_ID', 'NODE_ACCOUNT_ID', '`NODE_ACCOUNT_ID`', '`NODE_ACCOUNT_ID`', 200, -1, FALSE, '`NODE_ACCOUNT_ID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->NODE_ACCOUNT_ID->Nullable = FALSE; // NOT NULL field
		$this->NODE_ACCOUNT_ID->Required = TRUE; // Required field
		$this->NODE_ACCOUNT_ID->Sortable = TRUE; // Allow sort
		$this->fields['NODE_ACCOUNT_ID'] = &$this->NODE_ACCOUNT_ID;

		// NODE_SIGNER
		$this->NODE_SIGNER = new DbField('node_basic', 'node_basic', 'x_NODE_SIGNER', 'NODE_SIGNER', '`NODE_SIGNER`', '`NODE_SIGNER`', 16, -1, FALSE, '`NODE_SIGNER`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->NODE_SIGNER->Nullable = FALSE; // NOT NULL field
		$this->NODE_SIGNER->Required = TRUE; // Required field
		$this->NODE_SIGNER->Sortable = TRUE; // Allow sort
		$this->NODE_SIGNER->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->NODE_SIGNER->PleaseSelectText = $Language->Phrase("PleaseSelect"); // PleaseSelect text
		switch ($CurrentLanguage) {
			case "zh-CN":
				$this->NODE_SIGNER->Lookup = new Lookup('NODE_SIGNER', 'node_basic', FALSE, '', ["","","",""], [], [], [], [], [], '', '');
				break;
			case "zh-TW":
				$this->NODE_SIGNER->Lookup = new Lookup('NODE_SIGNER', 'node_basic', FALSE, '', ["","","",""], [], [], [], [], [], '', '');
				break;
			case "en":
				$this->NODE_SIGNER->Lookup = new Lookup('NODE_SIGNER', 'node_basic', FALSE, '', ["","","",""], [], [], [], [], [], '', '');
				break;
			default:
				$this->NODE_SIGNER->Lookup = new Lookup('NODE_SIGNER', 'node_basic', FALSE, '', ["","","",""], [], [], [], [], [], '', '');
				break;
		}
		$this->NODE_SIGNER->OptionCount = 2;
		$this->NODE_SIGNER->DefaultErrorMessage = $Language->Phrase("IncorrectInteger");
		$this->fields['NODE_SIGNER'] = &$this->NODE_SIGNER;

		// Create_Date
		$this->Create_Date = new DbField('node_basic', 'node_basic', 'x_Create_Date', 'Create_Date', '`Create_Date`', CastDateFieldForLike('`Create_Date`', 1, "DB"), 135, 1, FALSE, '`Create_Date`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
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
		return ($this->SqlFrom <> "") ? $this->SqlFrom : "`node_basic`";
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
			$this->NODE_INDEX->setDbValue($conn->insert_ID());
			$rs['NODE_INDEX'] = $this->NODE_INDEX->DbValue;
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
			if (array_key_exists('NODE_INDEX', $rs))
				AddFilter($where, QuotedName('NODE_INDEX', $this->Dbid) . '=' . QuotedValue($rs['NODE_INDEX'], $this->NODE_INDEX->DataType, $this->Dbid));
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
		$this->NODE_INDEX->DbValue = $row['NODE_INDEX'];
		$this->ESBC_INDEX->DbValue = $row['ESBC_INDEX'];
		$this->NODE_NAME->DbValue = $row['NODE_NAME'];
		$this->NODE_PW->DbValue = $row['NODE_PW'];
		$this->NODE_ENODE->DbValue = $row['NODE_ENODE'];
		$this->NODE_ACCOUNT_ID->DbValue = $row['NODE_ACCOUNT_ID'];
		$this->NODE_SIGNER->DbValue = $row['NODE_SIGNER'];
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
		return "`NODE_INDEX` = @NODE_INDEX@";
	}

	// Get record filter
	public function getRecordFilter($row = NULL)
	{
		$keyFilter = $this->sqlKeyFilter();
		$val = is_array($row) ? (array_key_exists('NODE_INDEX', $row) ? $row['NODE_INDEX'] : NULL) : $this->NODE_INDEX->CurrentValue;
		if (!is_numeric($val))
			return "0=1"; // Invalid key
		if ($val == NULL)
			return "0=1"; // Invalid key
		else
			$keyFilter = str_replace("@NODE_INDEX@", AdjustSql($val, $this->Dbid), $keyFilter); // Replace key value
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
			return "node_basiclist.php";
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
		if ($pageName == "node_basicview.php")
			return $Language->Phrase("View");
		elseif ($pageName == "node_basicedit.php")
			return $Language->Phrase("Edit");
		elseif ($pageName == "node_basicadd.php")
			return $Language->Phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "node_basiclist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm <> "")
			$url = $this->keyUrl("node_basicview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("node_basicview.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm <> "")
			$url = "node_basicadd.php?" . $this->getUrlParm($parm);
		else
			$url = "node_basicadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("node_basicedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("node_basicadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("node_basicdelete.php", $this->getUrlParm());
	}

	// Add master url
	public function addMasterUrl($url)
	{
		return $url;
	}
	public function keyToJson($htmlEncode = FALSE)
	{
		$json = "";
		$json .= "NODE_INDEX:" . JsonEncode($this->NODE_INDEX->CurrentValue, "number");
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
		if ($this->NODE_INDEX->CurrentValue != NULL) {
			$url .= "NODE_INDEX=" . urlencode($this->NODE_INDEX->CurrentValue);
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
			if (Param("NODE_INDEX") !== NULL)
				$arKeys[] = Param("NODE_INDEX");
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
			$this->NODE_INDEX->CurrentValue = $key;
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
		$this->NODE_INDEX->setDbValue($rs->fields('NODE_INDEX'));
		$this->ESBC_INDEX->setDbValue($rs->fields('ESBC_INDEX'));
		$this->NODE_NAME->setDbValue($rs->fields('NODE_NAME'));
		$this->NODE_PW->setDbValue($rs->fields('NODE_PW'));
		$this->NODE_ENODE->setDbValue($rs->fields('NODE_ENODE'));
		$this->NODE_ACCOUNT_ID->setDbValue($rs->fields('NODE_ACCOUNT_ID'));
		$this->NODE_SIGNER->setDbValue($rs->fields('NODE_SIGNER'));
		$this->Create_Date->setDbValue($rs->fields('Create_Date'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

	// Common render codes
		// NODE_INDEX
		// ESBC_INDEX
		// NODE_NAME
		// NODE_PW
		// NODE_ENODE
		// NODE_ACCOUNT_ID
		// NODE_SIGNER
		// Create_Date
		// NODE_INDEX

		$this->NODE_INDEX->ViewValue = $this->NODE_INDEX->CurrentValue;
		$this->NODE_INDEX->ViewCustomAttributes = "";

		// ESBC_INDEX
		$this->ESBC_INDEX->ViewValue = $this->ESBC_INDEX->CurrentValue;
		$this->ESBC_INDEX->ViewValue = FormatNumber($this->ESBC_INDEX->ViewValue, 0, -2, -2, -2);
		$this->ESBC_INDEX->ViewCustomAttributes = "";

		// NODE_NAME
		$this->NODE_NAME->ViewValue = $this->NODE_NAME->CurrentValue;
		$this->NODE_NAME->ViewCustomAttributes = "";

		// NODE_PW
		$this->NODE_PW->ViewValue = $this->NODE_PW->CurrentValue;
		$this->NODE_PW->ViewCustomAttributes = "";

		// NODE_ENODE
		$this->NODE_ENODE->ViewValue = $this->NODE_ENODE->CurrentValue;
		$this->NODE_ENODE->ViewCustomAttributes = "";

		// NODE_ACCOUNT_ID
		$this->NODE_ACCOUNT_ID->ViewValue = $this->NODE_ACCOUNT_ID->CurrentValue;
		$this->NODE_ACCOUNT_ID->ViewCustomAttributes = "";

		// NODE_SIGNER
		if (strval($this->NODE_SIGNER->CurrentValue) <> "") {
			$this->NODE_SIGNER->ViewValue = $this->NODE_SIGNER->optionCaption($this->NODE_SIGNER->CurrentValue);
		} else {
			$this->NODE_SIGNER->ViewValue = NULL;
		}
		$this->NODE_SIGNER->ViewCustomAttributes = "";

		// Create_Date
		$this->Create_Date->ViewValue = $this->Create_Date->CurrentValue;
		$this->Create_Date->ViewValue = FormatDateTime($this->Create_Date->ViewValue, 1);
		$this->Create_Date->ViewCustomAttributes = "";

		// NODE_INDEX
		$this->NODE_INDEX->LinkCustomAttributes = "";
		$this->NODE_INDEX->HrefValue = "";
		$this->NODE_INDEX->TooltipValue = "";

		// ESBC_INDEX
		$this->ESBC_INDEX->LinkCustomAttributes = "";
		$this->ESBC_INDEX->HrefValue = "";
		$this->ESBC_INDEX->TooltipValue = "";

		// NODE_NAME
		$this->NODE_NAME->LinkCustomAttributes = "";
		$this->NODE_NAME->HrefValue = "";
		$this->NODE_NAME->TooltipValue = "";

		// NODE_PW
		$this->NODE_PW->LinkCustomAttributes = "";
		$this->NODE_PW->HrefValue = "";
		$this->NODE_PW->TooltipValue = "";

		// NODE_ENODE
		$this->NODE_ENODE->LinkCustomAttributes = "";
		$this->NODE_ENODE->HrefValue = "";
		$this->NODE_ENODE->TooltipValue = "";

		// NODE_ACCOUNT_ID
		$this->NODE_ACCOUNT_ID->LinkCustomAttributes = "";
		$this->NODE_ACCOUNT_ID->HrefValue = "";
		$this->NODE_ACCOUNT_ID->TooltipValue = "";

		// NODE_SIGNER
		$this->NODE_SIGNER->LinkCustomAttributes = "";
		$this->NODE_SIGNER->HrefValue = "";
		$this->NODE_SIGNER->TooltipValue = "";

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

		// NODE_INDEX
		$this->NODE_INDEX->EditAttrs["class"] = "form-control";
		$this->NODE_INDEX->EditCustomAttributes = "";
		$this->NODE_INDEX->EditValue = $this->NODE_INDEX->CurrentValue;
		$this->NODE_INDEX->ViewCustomAttributes = "";

		// ESBC_INDEX
		$this->ESBC_INDEX->EditAttrs["class"] = "form-control";
		$this->ESBC_INDEX->EditCustomAttributes = "";
		$this->ESBC_INDEX->EditValue = $this->ESBC_INDEX->CurrentValue;
		$this->ESBC_INDEX->PlaceHolder = RemoveHtml($this->ESBC_INDEX->caption());

		// NODE_NAME
		$this->NODE_NAME->EditAttrs["class"] = "form-control";
		$this->NODE_NAME->EditCustomAttributes = "";
		$this->NODE_NAME->EditValue = $this->NODE_NAME->CurrentValue;
		$this->NODE_NAME->PlaceHolder = RemoveHtml($this->NODE_NAME->caption());

		// NODE_PW
		$this->NODE_PW->EditAttrs["class"] = "form-control";
		$this->NODE_PW->EditCustomAttributes = "";
		$this->NODE_PW->EditValue = $this->NODE_PW->CurrentValue;
		$this->NODE_PW->PlaceHolder = RemoveHtml($this->NODE_PW->caption());

		// NODE_ENODE
		$this->NODE_ENODE->EditAttrs["class"] = "form-control";
		$this->NODE_ENODE->EditCustomAttributes = "";
		$this->NODE_ENODE->EditValue = $this->NODE_ENODE->CurrentValue;
		$this->NODE_ENODE->PlaceHolder = RemoveHtml($this->NODE_ENODE->caption());

		// NODE_ACCOUNT_ID
		$this->NODE_ACCOUNT_ID->EditAttrs["class"] = "form-control";
		$this->NODE_ACCOUNT_ID->EditCustomAttributes = "";
		$this->NODE_ACCOUNT_ID->EditValue = $this->NODE_ACCOUNT_ID->CurrentValue;
		$this->NODE_ACCOUNT_ID->PlaceHolder = RemoveHtml($this->NODE_ACCOUNT_ID->caption());

		// NODE_SIGNER
		$this->NODE_SIGNER->EditAttrs["class"] = "form-control";
		$this->NODE_SIGNER->EditCustomAttributes = "";
		$this->NODE_SIGNER->EditValue = $this->NODE_SIGNER->options(TRUE);

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
					if ($this->NODE_INDEX->Exportable)
						$doc->exportCaption($this->NODE_INDEX);
					if ($this->ESBC_INDEX->Exportable)
						$doc->exportCaption($this->ESBC_INDEX);
					if ($this->NODE_NAME->Exportable)
						$doc->exportCaption($this->NODE_NAME);
					if ($this->NODE_PW->Exportable)
						$doc->exportCaption($this->NODE_PW);
					if ($this->NODE_ENODE->Exportable)
						$doc->exportCaption($this->NODE_ENODE);
					if ($this->NODE_ACCOUNT_ID->Exportable)
						$doc->exportCaption($this->NODE_ACCOUNT_ID);
					if ($this->NODE_SIGNER->Exportable)
						$doc->exportCaption($this->NODE_SIGNER);
					if ($this->Create_Date->Exportable)
						$doc->exportCaption($this->Create_Date);
				} else {
					if ($this->NODE_INDEX->Exportable)
						$doc->exportCaption($this->NODE_INDEX);
					if ($this->ESBC_INDEX->Exportable)
						$doc->exportCaption($this->ESBC_INDEX);
					if ($this->NODE_NAME->Exportable)
						$doc->exportCaption($this->NODE_NAME);
					if ($this->NODE_PW->Exportable)
						$doc->exportCaption($this->NODE_PW);
					if ($this->NODE_ENODE->Exportable)
						$doc->exportCaption($this->NODE_ENODE);
					if ($this->NODE_ACCOUNT_ID->Exportable)
						$doc->exportCaption($this->NODE_ACCOUNT_ID);
					if ($this->NODE_SIGNER->Exportable)
						$doc->exportCaption($this->NODE_SIGNER);
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
						if ($this->NODE_INDEX->Exportable)
							$doc->exportField($this->NODE_INDEX);
						if ($this->ESBC_INDEX->Exportable)
							$doc->exportField($this->ESBC_INDEX);
						if ($this->NODE_NAME->Exportable)
							$doc->exportField($this->NODE_NAME);
						if ($this->NODE_PW->Exportable)
							$doc->exportField($this->NODE_PW);
						if ($this->NODE_ENODE->Exportable)
							$doc->exportField($this->NODE_ENODE);
						if ($this->NODE_ACCOUNT_ID->Exportable)
							$doc->exportField($this->NODE_ACCOUNT_ID);
						if ($this->NODE_SIGNER->Exportable)
							$doc->exportField($this->NODE_SIGNER);
						if ($this->Create_Date->Exportable)
							$doc->exportField($this->Create_Date);
					} else {
						if ($this->NODE_INDEX->Exportable)
							$doc->exportField($this->NODE_INDEX);
						if ($this->ESBC_INDEX->Exportable)
							$doc->exportField($this->ESBC_INDEX);
						if ($this->NODE_NAME->Exportable)
							$doc->exportField($this->NODE_NAME);
						if ($this->NODE_PW->Exportable)
							$doc->exportField($this->NODE_PW);
						if ($this->NODE_ENODE->Exportable)
							$doc->exportField($this->NODE_ENODE);
						if ($this->NODE_ACCOUNT_ID->Exportable)
							$doc->exportField($this->NODE_ACCOUNT_ID);
						if ($this->NODE_SIGNER->Exportable)
							$doc->exportField($this->NODE_SIGNER);
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
