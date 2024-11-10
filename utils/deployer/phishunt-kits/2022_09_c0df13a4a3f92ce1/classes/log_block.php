<?php
namespace PHPMaker2019\esbc_20181010;

/**
 * Table class for log_block
 */
class log_block extends DbTable
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
	public $height_block;
	public $time_mined;
	public $hash;
	public $size;
	public $acc_from;
	public $acc_to;
	public $gasused;
	public $nonce;
	public $extradata;
	public $tx_num;
	public $hash_parent;
	public $miner;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'log_block';
		$this->TableName = 'log_block';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`log_block`";
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

		// height_block
		$this->height_block = new DbField('log_block', 'log_block', 'x_height_block', 'height_block', '`height_block`', '`height_block`', 20, -1, FALSE, '`height_block`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->height_block->IsPrimaryKey = TRUE; // Primary key field
		$this->height_block->Nullable = FALSE; // NOT NULL field
		$this->height_block->Required = TRUE; // Required field
		$this->height_block->Sortable = TRUE; // Allow sort
		$this->height_block->DefaultErrorMessage = $Language->Phrase("IncorrectInteger");
		$this->fields['height_block'] = &$this->height_block;

		// time_mined
		$this->time_mined = new DbField('log_block', 'log_block', 'x_time_mined', 'time_mined', '`time_mined`', CastDateFieldForLike('`time_mined`', 1, "DB"), 135, 1, FALSE, '`time_mined`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->time_mined->Sortable = TRUE; // Allow sort
		$this->time_mined->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->Phrase("IncorrectDate"));
		$this->fields['time_mined'] = &$this->time_mined;

		// hash
		$this->hash = new DbField('log_block', 'log_block', 'x_hash', 'hash', '`hash`', '`hash`', 201, -1, FALSE, '`hash`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->hash->Sortable = TRUE; // Allow sort
		$this->fields['hash'] = &$this->hash;

		// size
		$this->size = new DbField('log_block', 'log_block', 'x_size', 'size', '`size`', '`size`', 200, -1, FALSE, '`size`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->size->Sortable = TRUE; // Allow sort
		$this->fields['size'] = &$this->size;

		// acc_from
		$this->acc_from = new DbField('log_block', 'log_block', 'x_acc_from', 'acc_from', '`acc_from`', '`acc_from`', 200, -1, FALSE, '`acc_from`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->acc_from->Sortable = FALSE; // Allow sort
		$this->fields['acc_from'] = &$this->acc_from;

		// acc_to
		$this->acc_to = new DbField('log_block', 'log_block', 'x_acc_to', 'acc_to', '`acc_to`', '`acc_to`', 200, -1, FALSE, '`acc_to`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->acc_to->Sortable = FALSE; // Allow sort
		$this->fields['acc_to'] = &$this->acc_to;

		// gasused
		$this->gasused = new DbField('log_block', 'log_block', 'x_gasused', 'gasused', '`gasused`', '`gasused`', 200, -1, FALSE, '`gasused`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->gasused->Sortable = TRUE; // Allow sort
		$this->fields['gasused'] = &$this->gasused;

		// nonce
		$this->nonce = new DbField('log_block', 'log_block', 'x_nonce', 'nonce', '`nonce`', '`nonce`', 200, -1, FALSE, '`nonce`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->nonce->Sortable = TRUE; // Allow sort
		$this->fields['nonce'] = &$this->nonce;

		// extradata
		$this->extradata = new DbField('log_block', 'log_block', 'x_extradata', 'extradata', '`extradata`', '`extradata`', 201, -1, FALSE, '`extradata`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->extradata->Sortable = TRUE; // Allow sort
		$this->fields['extradata'] = &$this->extradata;

		// tx_num
		$this->tx_num = new DbField('log_block', 'log_block', 'x_tx_num', 'tx_num', '`tx_num`', '`tx_num`', 200, -1, FALSE, '`tx_num`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->tx_num->Sortable = TRUE; // Allow sort
		$this->fields['tx_num'] = &$this->tx_num;

		// hash_parent
		$this->hash_parent = new DbField('log_block', 'log_block', 'x_hash_parent', 'hash_parent', '`hash_parent`', '`hash_parent`', 200, -1, FALSE, '`hash_parent`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->hash_parent->Sortable = TRUE; // Allow sort
		$this->fields['hash_parent'] = &$this->hash_parent;

		// miner
		$this->miner = new DbField('log_block', 'log_block', 'x_miner', 'miner', '`miner`', '`miner`', 200, -1, FALSE, '`miner`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->miner->Sortable = TRUE; // Allow sort
		$this->fields['miner'] = &$this->miner;
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
		return ($this->SqlFrom <> "") ? $this->SqlFrom : "`log_block`";
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
			if (array_key_exists('height_block', $rs))
				AddFilter($where, QuotedName('height_block', $this->Dbid) . '=' . QuotedValue($rs['height_block'], $this->height_block->DataType, $this->Dbid));
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
		$this->height_block->DbValue = $row['height_block'];
		$this->time_mined->DbValue = $row['time_mined'];
		$this->hash->DbValue = $row['hash'];
		$this->size->DbValue = $row['size'];
		$this->acc_from->DbValue = $row['acc_from'];
		$this->acc_to->DbValue = $row['acc_to'];
		$this->gasused->DbValue = $row['gasused'];
		$this->nonce->DbValue = $row['nonce'];
		$this->extradata->DbValue = $row['extradata'];
		$this->tx_num->DbValue = $row['tx_num'];
		$this->hash_parent->DbValue = $row['hash_parent'];
		$this->miner->DbValue = $row['miner'];
	}

	// Delete uploaded files
	public function deleteUploadedFiles($row)
	{
		$this->loadDbValues($row);
	}

	// Record filter WHERE clause
	protected function sqlKeyFilter()
	{
		return "`height_block` = @height_block@";
	}

	// Get record filter
	public function getRecordFilter($row = NULL)
	{
		$keyFilter = $this->sqlKeyFilter();
		$val = is_array($row) ? (array_key_exists('height_block', $row) ? $row['height_block'] : NULL) : $this->height_block->CurrentValue;
		if (!is_numeric($val))
			return "0=1"; // Invalid key
		if ($val == NULL)
			return "0=1"; // Invalid key
		else
			$keyFilter = str_replace("@height_block@", AdjustSql($val, $this->Dbid), $keyFilter); // Replace key value
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
			return "log_blocklist.php";
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
		if ($pageName == "log_blockview.php")
			return $Language->Phrase("View");
		elseif ($pageName == "log_blockedit.php")
			return $Language->Phrase("Edit");
		elseif ($pageName == "log_blockadd.php")
			return $Language->Phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "log_blocklist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm <> "")
			$url = $this->keyUrl("log_blockview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("log_blockview.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm <> "")
			$url = "log_blockadd.php?" . $this->getUrlParm($parm);
		else
			$url = "log_blockadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("log_blockedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("log_blockadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("log_blockdelete.php", $this->getUrlParm());
	}

	// Add master url
	public function addMasterUrl($url)
	{
		return $url;
	}
	public function keyToJson($htmlEncode = FALSE)
	{
		$json = "";
		$json .= "height_block:" . JsonEncode($this->height_block->CurrentValue, "number");
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
		if ($this->height_block->CurrentValue != NULL) {
			$url .= "height_block=" . urlencode($this->height_block->CurrentValue);
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
			if (Param("height_block") !== NULL)
				$arKeys[] = Param("height_block");
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
			$this->height_block->CurrentValue = $key;
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
		$this->height_block->setDbValue($rs->fields('height_block'));
		$this->time_mined->setDbValue($rs->fields('time_mined'));
		$this->hash->setDbValue($rs->fields('hash'));
		$this->size->setDbValue($rs->fields('size'));
		$this->acc_from->setDbValue($rs->fields('acc_from'));
		$this->acc_to->setDbValue($rs->fields('acc_to'));
		$this->gasused->setDbValue($rs->fields('gasused'));
		$this->nonce->setDbValue($rs->fields('nonce'));
		$this->extradata->setDbValue($rs->fields('extradata'));
		$this->tx_num->setDbValue($rs->fields('tx_num'));
		$this->hash_parent->setDbValue($rs->fields('hash_parent'));
		$this->miner->setDbValue($rs->fields('miner'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

	// Common render codes
		// height_block
		// time_mined
		// hash
		// size
		// acc_from
		// acc_to
		// gasused
		// nonce
		// extradata
		// tx_num
		// hash_parent
		// miner
		// height_block

		$this->height_block->ViewValue = $this->height_block->CurrentValue;
		$this->height_block->ViewValue = FormatNumber($this->height_block->ViewValue, 0, -2, -2, -2);
		$this->height_block->ViewCustomAttributes = "";

		// time_mined
		$this->time_mined->ViewValue = $this->time_mined->CurrentValue;
		$this->time_mined->ViewValue = FormatDateTime($this->time_mined->ViewValue, 1);
		$this->time_mined->ViewCustomAttributes = "";

		// hash
		$this->hash->ViewValue = $this->hash->CurrentValue;
		$this->hash->ViewCustomAttributes = "";

		// size
		$this->size->ViewValue = $this->size->CurrentValue;
		$this->size->ViewCustomAttributes = "";

		// acc_from
		$this->acc_from->ViewValue = $this->acc_from->CurrentValue;
		$this->acc_from->ViewCustomAttributes = "";

		// acc_to
		$this->acc_to->ViewValue = $this->acc_to->CurrentValue;
		$this->acc_to->ViewCustomAttributes = "";

		// gasused
		$this->gasused->ViewValue = $this->gasused->CurrentValue;
		$this->gasused->ViewCustomAttributes = "";

		// nonce
		$this->nonce->ViewValue = $this->nonce->CurrentValue;
		$this->nonce->ViewCustomAttributes = "";

		// extradata
		$this->extradata->ViewValue = $this->extradata->CurrentValue;
		$this->extradata->ViewCustomAttributes = "";

		// tx_num
		$this->tx_num->ViewValue = $this->tx_num->CurrentValue;
		$this->tx_num->ViewCustomAttributes = "";

		// hash_parent
		$this->hash_parent->ViewValue = $this->hash_parent->CurrentValue;
		$this->hash_parent->ViewCustomAttributes = "";

		// miner
		$this->miner->ViewValue = $this->miner->CurrentValue;
		$this->miner->ViewCustomAttributes = "";

		// height_block
		$this->height_block->LinkCustomAttributes = "";
		$this->height_block->HrefValue = "";
		$this->height_block->TooltipValue = "";

		// time_mined
		$this->time_mined->LinkCustomAttributes = "";
		$this->time_mined->HrefValue = "";
		$this->time_mined->TooltipValue = "";

		// hash
		$this->hash->LinkCustomAttributes = "";
		$this->hash->HrefValue = "";
		$this->hash->TooltipValue = "";

		// size
		$this->size->LinkCustomAttributes = "";
		$this->size->HrefValue = "";
		$this->size->TooltipValue = "";

		// acc_from
		$this->acc_from->LinkCustomAttributes = "";
		$this->acc_from->HrefValue = "";
		$this->acc_from->TooltipValue = "";

		// acc_to
		$this->acc_to->LinkCustomAttributes = "";
		$this->acc_to->HrefValue = "";
		$this->acc_to->TooltipValue = "";

		// gasused
		$this->gasused->LinkCustomAttributes = "";
		$this->gasused->HrefValue = "";
		$this->gasused->TooltipValue = "";

		// nonce
		$this->nonce->LinkCustomAttributes = "";
		$this->nonce->HrefValue = "";
		$this->nonce->TooltipValue = "";

		// extradata
		$this->extradata->LinkCustomAttributes = "";
		$this->extradata->HrefValue = "";
		$this->extradata->TooltipValue = "";

		// tx_num
		$this->tx_num->LinkCustomAttributes = "";
		$this->tx_num->HrefValue = "";
		$this->tx_num->TooltipValue = "";

		// hash_parent
		$this->hash_parent->LinkCustomAttributes = "";
		$this->hash_parent->HrefValue = "";
		$this->hash_parent->TooltipValue = "";

		// miner
		$this->miner->LinkCustomAttributes = "";
		$this->miner->HrefValue = "";
		$this->miner->TooltipValue = "";

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

		// height_block
		$this->height_block->EditAttrs["class"] = "form-control";
		$this->height_block->EditCustomAttributes = "";
		$this->height_block->EditValue = $this->height_block->CurrentValue;
		$this->height_block->EditValue = FormatNumber($this->height_block->EditValue, 0, -2, -2, -2);
		$this->height_block->ViewCustomAttributes = "";

		// time_mined
		$this->time_mined->EditAttrs["class"] = "form-control";
		$this->time_mined->EditCustomAttributes = "";
		$this->time_mined->EditValue = FormatDateTime($this->time_mined->CurrentValue, 8);
		$this->time_mined->PlaceHolder = RemoveHtml($this->time_mined->caption());

		// hash
		$this->hash->EditAttrs["class"] = "form-control";
		$this->hash->EditCustomAttributes = "";
		$this->hash->EditValue = $this->hash->CurrentValue;
		$this->hash->PlaceHolder = RemoveHtml($this->hash->caption());

		// size
		$this->size->EditAttrs["class"] = "form-control";
		$this->size->EditCustomAttributes = "";
		$this->size->EditValue = $this->size->CurrentValue;
		$this->size->PlaceHolder = RemoveHtml($this->size->caption());

		// acc_from
		$this->acc_from->EditAttrs["class"] = "form-control";
		$this->acc_from->EditCustomAttributes = "";
		$this->acc_from->EditValue = $this->acc_from->CurrentValue;
		$this->acc_from->PlaceHolder = RemoveHtml($this->acc_from->caption());

		// acc_to
		$this->acc_to->EditAttrs["class"] = "form-control";
		$this->acc_to->EditCustomAttributes = "";
		$this->acc_to->EditValue = $this->acc_to->CurrentValue;
		$this->acc_to->PlaceHolder = RemoveHtml($this->acc_to->caption());

		// gasused
		$this->gasused->EditAttrs["class"] = "form-control";
		$this->gasused->EditCustomAttributes = "";
		$this->gasused->EditValue = $this->gasused->CurrentValue;
		$this->gasused->PlaceHolder = RemoveHtml($this->gasused->caption());

		// nonce
		$this->nonce->EditAttrs["class"] = "form-control";
		$this->nonce->EditCustomAttributes = "";
		$this->nonce->EditValue = $this->nonce->CurrentValue;
		$this->nonce->PlaceHolder = RemoveHtml($this->nonce->caption());

		// extradata
		$this->extradata->EditAttrs["class"] = "form-control";
		$this->extradata->EditCustomAttributes = "";
		$this->extradata->EditValue = $this->extradata->CurrentValue;
		$this->extradata->PlaceHolder = RemoveHtml($this->extradata->caption());

		// tx_num
		$this->tx_num->EditAttrs["class"] = "form-control";
		$this->tx_num->EditCustomAttributes = "";
		$this->tx_num->EditValue = $this->tx_num->CurrentValue;
		$this->tx_num->PlaceHolder = RemoveHtml($this->tx_num->caption());

		// hash_parent
		$this->hash_parent->EditAttrs["class"] = "form-control";
		$this->hash_parent->EditCustomAttributes = "";
		$this->hash_parent->EditValue = $this->hash_parent->CurrentValue;
		$this->hash_parent->PlaceHolder = RemoveHtml($this->hash_parent->caption());

		// miner
		$this->miner->EditAttrs["class"] = "form-control";
		$this->miner->EditCustomAttributes = "";
		$this->miner->EditValue = $this->miner->CurrentValue;
		$this->miner->PlaceHolder = RemoveHtml($this->miner->caption());

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
					if ($this->height_block->Exportable)
						$doc->exportCaption($this->height_block);
					if ($this->time_mined->Exportable)
						$doc->exportCaption($this->time_mined);
					if ($this->hash->Exportable)
						$doc->exportCaption($this->hash);
					if ($this->size->Exportable)
						$doc->exportCaption($this->size);
					if ($this->acc_from->Exportable)
						$doc->exportCaption($this->acc_from);
					if ($this->acc_to->Exportable)
						$doc->exportCaption($this->acc_to);
					if ($this->gasused->Exportable)
						$doc->exportCaption($this->gasused);
					if ($this->nonce->Exportable)
						$doc->exportCaption($this->nonce);
					if ($this->extradata->Exportable)
						$doc->exportCaption($this->extradata);
					if ($this->tx_num->Exportable)
						$doc->exportCaption($this->tx_num);
					if ($this->hash_parent->Exportable)
						$doc->exportCaption($this->hash_parent);
					if ($this->miner->Exportable)
						$doc->exportCaption($this->miner);
				} else {
					if ($this->height_block->Exportable)
						$doc->exportCaption($this->height_block);
					if ($this->time_mined->Exportable)
						$doc->exportCaption($this->time_mined);
					if ($this->size->Exportable)
						$doc->exportCaption($this->size);
					if ($this->gasused->Exportable)
						$doc->exportCaption($this->gasused);
					if ($this->nonce->Exportable)
						$doc->exportCaption($this->nonce);
					if ($this->tx_num->Exportable)
						$doc->exportCaption($this->tx_num);
					if ($this->hash_parent->Exportable)
						$doc->exportCaption($this->hash_parent);
					if ($this->miner->Exportable)
						$doc->exportCaption($this->miner);
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
						if ($this->height_block->Exportable)
							$doc->exportField($this->height_block);
						if ($this->time_mined->Exportable)
							$doc->exportField($this->time_mined);
						if ($this->hash->Exportable)
							$doc->exportField($this->hash);
						if ($this->size->Exportable)
							$doc->exportField($this->size);
						if ($this->acc_from->Exportable)
							$doc->exportField($this->acc_from);
						if ($this->acc_to->Exportable)
							$doc->exportField($this->acc_to);
						if ($this->gasused->Exportable)
							$doc->exportField($this->gasused);
						if ($this->nonce->Exportable)
							$doc->exportField($this->nonce);
						if ($this->extradata->Exportable)
							$doc->exportField($this->extradata);
						if ($this->tx_num->Exportable)
							$doc->exportField($this->tx_num);
						if ($this->hash_parent->Exportable)
							$doc->exportField($this->hash_parent);
						if ($this->miner->Exportable)
							$doc->exportField($this->miner);
					} else {
						if ($this->height_block->Exportable)
							$doc->exportField($this->height_block);
						if ($this->time_mined->Exportable)
							$doc->exportField($this->time_mined);
						if ($this->size->Exportable)
							$doc->exportField($this->size);
						if ($this->gasused->Exportable)
							$doc->exportField($this->gasused);
						if ($this->nonce->Exportable)
							$doc->exportField($this->nonce);
						if ($this->tx_num->Exportable)
							$doc->exportField($this->tx_num);
						if ($this->hash_parent->Exportable)
							$doc->exportField($this->hash_parent);
						if ($this->miner->Exportable)
							$doc->exportField($this->miner);
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
