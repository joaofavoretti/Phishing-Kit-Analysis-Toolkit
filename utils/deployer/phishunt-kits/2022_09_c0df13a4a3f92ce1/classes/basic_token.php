<?php
namespace PHPMaker2019\esbc_20181010;

/**
 * Table class for basic_token
 */
class basic_token extends DbTable
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
	public $Rindex;
	public $type;
	public $name;
	public $symble;
	public $supply;
	public $price;
	public $logo;
	public $holders;
	public $transfers;
	public $website;
	public $contract;
	public $decimals;
	public $dateadd;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'basic_token';
		$this->TableName = 'basic_token';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`basic_token`";
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

		// Rindex
		$this->Rindex = new DbField('basic_token', 'basic_token', 'x_Rindex', 'Rindex', '`Rindex`', '`Rindex`', 20, -1, FALSE, '`Rindex`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->Rindex->IsAutoIncrement = TRUE; // Autoincrement field
		$this->Rindex->IsPrimaryKey = TRUE; // Primary key field
		$this->Rindex->Sortable = TRUE; // Allow sort
		$this->Rindex->DefaultErrorMessage = $Language->Phrase("IncorrectInteger");
		$this->fields['Rindex'] = &$this->Rindex;

		// type
		$this->type = new DbField('basic_token', 'basic_token', 'x_type', 'type', '`type`', '`type`', 200, -1, FALSE, '`type`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->type->Sortable = TRUE; // Allow sort
		$this->type->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->type->PleaseSelectText = $Language->Phrase("PleaseSelect"); // PleaseSelect text
		switch ($CurrentLanguage) {
			case "zh-CN":
				$this->type->Lookup = new Lookup('type', 'basic_token', FALSE, '', ["","","",""], [], [], [], [], [], '', '');
				break;
			case "zh-TW":
				$this->type->Lookup = new Lookup('type', 'basic_token', FALSE, '', ["","","",""], [], [], [], [], [], '', '');
				break;
			case "en":
				$this->type->Lookup = new Lookup('type', 'basic_token', FALSE, '', ["","","",""], [], [], [], [], [], '', '');
				break;
			default:
				$this->type->Lookup = new Lookup('type', 'basic_token', FALSE, '', ["","","",""], [], [], [], [], [], '', '');
				break;
		}
		$this->type->OptionCount = 2;
		$this->fields['type'] = &$this->type;

		// name
		$this->name = new DbField('basic_token', 'basic_token', 'x_name', 'name', '`name`', '`name`', 200, -1, FALSE, '`name`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->name->Sortable = TRUE; // Allow sort
		$this->fields['name'] = &$this->name;

		// symble
		$this->symble = new DbField('basic_token', 'basic_token', 'x_symble', 'symble', '`symble`', '`symble`', 200, -1, FALSE, '`symble`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->symble->Sortable = TRUE; // Allow sort
		$this->fields['symble'] = &$this->symble;

		// supply
		$this->supply = new DbField('basic_token', 'basic_token', 'x_supply', 'supply', '`supply`', '`supply`', 200, -1, FALSE, '`supply`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->supply->Nullable = FALSE; // NOT NULL field
		$this->supply->Required = TRUE; // Required field
		$this->supply->Sortable = TRUE; // Allow sort
		$this->fields['supply'] = &$this->supply;

		// price
		$this->price = new DbField('basic_token', 'basic_token', 'x_price', 'price', '`price`', '`price`', 200, -1, FALSE, '`price`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->price->Sortable = TRUE; // Allow sort
		$this->fields['price'] = &$this->price;

		// logo
		$this->logo = new DbField('basic_token', 'basic_token', 'x_logo', 'logo', '`logo`', '`logo`', 201, -1, TRUE, '`logo`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'FILE');
		$this->logo->Sortable = TRUE; // Allow sort
		$this->fields['logo'] = &$this->logo;

		// holders
		$this->holders = new DbField('basic_token', 'basic_token', 'x_holders', 'holders', '`holders`', '`holders`', 200, -1, FALSE, '`holders`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->holders->Sortable = TRUE; // Allow sort
		$this->fields['holders'] = &$this->holders;

		// transfers
		$this->transfers = new DbField('basic_token', 'basic_token', 'x_transfers', 'transfers', '`transfers`', '`transfers`', 200, -1, FALSE, '`transfers`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->transfers->Sortable = FALSE; // Allow sort
		$this->fields['transfers'] = &$this->transfers;

		// website
		$this->website = new DbField('basic_token', 'basic_token', 'x_website', 'website', '`website`', '`website`', 201, -1, FALSE, '`website`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->website->Sortable = TRUE; // Allow sort
		$this->fields['website'] = &$this->website;

		// contract
		$this->contract = new DbField('basic_token', 'basic_token', 'x_contract', 'contract', '`contract`', '`contract`', 200, -1, FALSE, '`contract`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->contract->Sortable = FALSE; // Allow sort
		$this->fields['contract'] = &$this->contract;

		// decimals
		$this->decimals = new DbField('basic_token', 'basic_token', 'x_decimals', 'decimals', '`decimals`', '`decimals`', 200, -1, FALSE, '`decimals`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->decimals->Sortable = TRUE; // Allow sort
		$this->fields['decimals'] = &$this->decimals;

		// dateadd
		$this->dateadd = new DbField('basic_token', 'basic_token', 'x_dateadd', 'dateadd', '`dateadd`', CastDateFieldForLike('`dateadd`', 1, "DB"), 135, 1, FALSE, '`dateadd`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->dateadd->Sortable = TRUE; // Allow sort
		$this->dateadd->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->Phrase("IncorrectDate"));
		$this->fields['dateadd'] = &$this->dateadd;
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
		return ($this->SqlFrom <> "") ? $this->SqlFrom : "`basic_token`";
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
		return ($this->SqlOrderBy <> "") ? $this->SqlOrderBy : "`dateadd` DESC";
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
			$this->Rindex->setDbValue($conn->insert_ID());
			$rs['Rindex'] = $this->Rindex->DbValue;
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
			if (array_key_exists('Rindex', $rs))
				AddFilter($where, QuotedName('Rindex', $this->Dbid) . '=' . QuotedValue($rs['Rindex'], $this->Rindex->DataType, $this->Dbid));
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
		$this->Rindex->DbValue = $row['Rindex'];
		$this->type->DbValue = $row['type'];
		$this->name->DbValue = $row['name'];
		$this->symble->DbValue = $row['symble'];
		$this->supply->DbValue = $row['supply'];
		$this->price->DbValue = $row['price'];
		$this->logo->Upload->DbValue = $row['logo'];
		$this->holders->DbValue = $row['holders'];
		$this->transfers->DbValue = $row['transfers'];
		$this->website->DbValue = $row['website'];
		$this->contract->DbValue = $row['contract'];
		$this->decimals->DbValue = $row['decimals'];
		$this->dateadd->DbValue = $row['dateadd'];
	}

	// Delete uploaded files
	public function deleteUploadedFiles($row)
	{
		$this->loadDbValues($row);
		$oldFiles = EmptyValue($row['logo']) ? [] : [$row['logo']];
		foreach ($oldFiles as $oldFile) {
			if (file_exists($this->logo->oldPhysicalUploadPath() . $oldFile))
				@unlink($this->logo->oldPhysicalUploadPath() . $oldFile);
		}
	}

	// Record filter WHERE clause
	protected function sqlKeyFilter()
	{
		return "`Rindex` = @Rindex@";
	}

	// Get record filter
	public function getRecordFilter($row = NULL)
	{
		$keyFilter = $this->sqlKeyFilter();
		$val = is_array($row) ? (array_key_exists('Rindex', $row) ? $row['Rindex'] : NULL) : $this->Rindex->CurrentValue;
		if (!is_numeric($val))
			return "0=1"; // Invalid key
		if ($val == NULL)
			return "0=1"; // Invalid key
		else
			$keyFilter = str_replace("@Rindex@", AdjustSql($val, $this->Dbid), $keyFilter); // Replace key value
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
			return "basic_tokenlist.php";
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
		if ($pageName == "basic_tokenview.php")
			return $Language->Phrase("View");
		elseif ($pageName == "basic_tokenedit.php")
			return $Language->Phrase("Edit");
		elseif ($pageName == "basic_tokenadd.php")
			return $Language->Phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "basic_tokenlist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm <> "")
			$url = $this->keyUrl("basic_tokenview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("basic_tokenview.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm <> "")
			$url = "basic_tokenadd.php?" . $this->getUrlParm($parm);
		else
			$url = "basic_tokenadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("basic_tokenedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("basic_tokenadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("basic_tokendelete.php", $this->getUrlParm());
	}

	// Add master url
	public function addMasterUrl($url)
	{
		return $url;
	}
	public function keyToJson($htmlEncode = FALSE)
	{
		$json = "";
		$json .= "Rindex:" . JsonEncode($this->Rindex->CurrentValue, "number");
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
		if ($this->Rindex->CurrentValue != NULL) {
			$url .= "Rindex=" . urlencode($this->Rindex->CurrentValue);
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
			if (Param("Rindex") !== NULL)
				$arKeys[] = Param("Rindex");
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
			$this->Rindex->CurrentValue = $key;
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
		$this->Rindex->setDbValue($rs->fields('Rindex'));
		$this->type->setDbValue($rs->fields('type'));
		$this->name->setDbValue($rs->fields('name'));
		$this->symble->setDbValue($rs->fields('symble'));
		$this->supply->setDbValue($rs->fields('supply'));
		$this->price->setDbValue($rs->fields('price'));
		$this->logo->Upload->DbValue = $rs->fields('logo');
		$this->holders->setDbValue($rs->fields('holders'));
		$this->transfers->setDbValue($rs->fields('transfers'));
		$this->website->setDbValue($rs->fields('website'));
		$this->contract->setDbValue($rs->fields('contract'));
		$this->decimals->setDbValue($rs->fields('decimals'));
		$this->dateadd->setDbValue($rs->fields('dateadd'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

	// Common render codes
		// Rindex
		// type
		// name
		// symble
		// supply
		// price
		// logo
		// holders
		// transfers
		// website
		// contract
		// decimals
		// dateadd
		// Rindex

		$this->Rindex->ViewValue = $this->Rindex->CurrentValue;
		$this->Rindex->ViewCustomAttributes = "";

		// type
		if (strval($this->type->CurrentValue) <> "") {
			$this->type->ViewValue = $this->type->optionCaption($this->type->CurrentValue);
		} else {
			$this->type->ViewValue = NULL;
		}
		$this->type->ViewCustomAttributes = "";

		// name
		$this->name->ViewValue = $this->name->CurrentValue;
		$this->name->ViewCustomAttributes = "";

		// symble
		$this->symble->ViewValue = $this->symble->CurrentValue;
		$this->symble->ViewCustomAttributes = "";

		// supply
		$this->supply->ViewValue = $this->supply->CurrentValue;
		$this->supply->ViewCustomAttributes = "";

		// price
		$this->price->ViewValue = $this->price->CurrentValue;
		$this->price->ViewCustomAttributes = "";

		// logo
		if (!EmptyValue($this->logo->Upload->DbValue)) {
			$this->logo->ViewValue = $this->logo->Upload->DbValue;
		} else {
			$this->logo->ViewValue = "";
		}
		$this->logo->ViewCustomAttributes = "";

		// holders
		$this->holders->ViewValue = $this->holders->CurrentValue;
		$this->holders->ViewCustomAttributes = "";

		// transfers
		$this->transfers->ViewValue = $this->transfers->CurrentValue;
		$this->transfers->ViewCustomAttributes = "";

		// website
		$this->website->ViewValue = $this->website->CurrentValue;
		$this->website->ViewCustomAttributes = "";

		// contract
		$this->contract->ViewValue = $this->contract->CurrentValue;
		$this->contract->ViewCustomAttributes = "";

		// decimals
		$this->decimals->ViewValue = $this->decimals->CurrentValue;
		$this->decimals->ViewCustomAttributes = "";

		// dateadd
		$this->dateadd->ViewValue = $this->dateadd->CurrentValue;
		$this->dateadd->ViewValue = FormatDateTime($this->dateadd->ViewValue, 1);
		$this->dateadd->ViewCustomAttributes = "";

		// Rindex
		$this->Rindex->LinkCustomAttributes = "";
		$this->Rindex->HrefValue = "";
		$this->Rindex->TooltipValue = "";

		// type
		$this->type->LinkCustomAttributes = "";
		$this->type->HrefValue = "";
		$this->type->TooltipValue = "";

		// name
		$this->name->LinkCustomAttributes = "";
		$this->name->HrefValue = "";
		$this->name->TooltipValue = "";

		// symble
		$this->symble->LinkCustomAttributes = "";
		$this->symble->HrefValue = "";
		$this->symble->TooltipValue = "";

		// supply
		$this->supply->LinkCustomAttributes = "";
		$this->supply->HrefValue = "";
		$this->supply->TooltipValue = "";

		// price
		$this->price->LinkCustomAttributes = "";
		$this->price->HrefValue = "";
		$this->price->TooltipValue = "";

		// logo
		$this->logo->LinkCustomAttributes = "";
		$this->logo->HrefValue = "";
		$this->logo->ExportHrefValue = $this->logo->UploadPath . $this->logo->Upload->DbValue;
		$this->logo->TooltipValue = "";

		// holders
		$this->holders->LinkCustomAttributes = "";
		$this->holders->HrefValue = "";
		$this->holders->TooltipValue = "";

		// transfers
		$this->transfers->LinkCustomAttributes = "";
		$this->transfers->HrefValue = "";
		$this->transfers->TooltipValue = "";

		// website
		$this->website->LinkCustomAttributes = "";
		$this->website->HrefValue = "";
		$this->website->TooltipValue = "";

		// contract
		$this->contract->LinkCustomAttributes = "";
		$this->contract->HrefValue = "";
		$this->contract->TooltipValue = "";

		// decimals
		$this->decimals->LinkCustomAttributes = "";
		$this->decimals->HrefValue = "";
		$this->decimals->TooltipValue = "";

		// dateadd
		$this->dateadd->LinkCustomAttributes = "";
		$this->dateadd->HrefValue = "";
		$this->dateadd->TooltipValue = "";

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

		// Rindex
		$this->Rindex->EditAttrs["class"] = "form-control";
		$this->Rindex->EditCustomAttributes = "";
		$this->Rindex->EditValue = $this->Rindex->CurrentValue;
		$this->Rindex->ViewCustomAttributes = "";

		// type
		$this->type->EditCustomAttributes = "";
		$this->type->EditValue = $this->type->options(TRUE);

		// name
		$this->name->EditAttrs["class"] = "form-control";
		$this->name->EditCustomAttributes = "";
		$this->name->EditValue = $this->name->CurrentValue;
		$this->name->PlaceHolder = RemoveHtml($this->name->caption());

		// symble
		$this->symble->EditAttrs["class"] = "form-control";
		$this->symble->EditCustomAttributes = "";
		$this->symble->EditValue = $this->symble->CurrentValue;
		$this->symble->PlaceHolder = RemoveHtml($this->symble->caption());

		// supply
		$this->supply->EditAttrs["class"] = "form-control";
		$this->supply->EditCustomAttributes = "";
		$this->supply->EditValue = $this->supply->CurrentValue;
		$this->supply->PlaceHolder = RemoveHtml($this->supply->caption());

		// price
		$this->price->EditAttrs["class"] = "form-control";
		$this->price->EditCustomAttributes = "";
		$this->price->EditValue = $this->price->CurrentValue;
		$this->price->PlaceHolder = RemoveHtml($this->price->caption());

		// logo
		$this->logo->EditAttrs["class"] = "form-control";
		$this->logo->EditCustomAttributes = "";
		if (!EmptyValue($this->logo->Upload->DbValue)) {
			$this->logo->EditValue = $this->logo->Upload->DbValue;
		} else {
			$this->logo->EditValue = "";
		}
		if (!EmptyValue($this->logo->CurrentValue))
				$this->logo->Upload->FileName = $this->logo->CurrentValue;

		// holders
		$this->holders->EditAttrs["class"] = "form-control";
		$this->holders->EditCustomAttributes = "";
		$this->holders->EditValue = $this->holders->CurrentValue;
		$this->holders->PlaceHolder = RemoveHtml($this->holders->caption());

		// transfers
		$this->transfers->EditAttrs["class"] = "form-control";
		$this->transfers->EditCustomAttributes = "";
		$this->transfers->EditValue = $this->transfers->CurrentValue;
		$this->transfers->PlaceHolder = RemoveHtml($this->transfers->caption());

		// website
		$this->website->EditAttrs["class"] = "form-control";
		$this->website->EditCustomAttributes = "";
		$this->website->EditValue = $this->website->CurrentValue;
		$this->website->PlaceHolder = RemoveHtml($this->website->caption());

		// contract
		$this->contract->EditAttrs["class"] = "form-control";
		$this->contract->EditCustomAttributes = "";
		$this->contract->EditValue = $this->contract->CurrentValue;
		$this->contract->PlaceHolder = RemoveHtml($this->contract->caption());

		// decimals
		$this->decimals->EditAttrs["class"] = "form-control";
		$this->decimals->EditCustomAttributes = "";
		$this->decimals->EditValue = $this->decimals->CurrentValue;
		$this->decimals->PlaceHolder = RemoveHtml($this->decimals->caption());

		// dateadd
		$this->dateadd->EditAttrs["class"] = "form-control";
		$this->dateadd->EditCustomAttributes = "";
		$this->dateadd->EditValue = FormatDateTime($this->dateadd->CurrentValue, 8);
		$this->dateadd->PlaceHolder = RemoveHtml($this->dateadd->caption());

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
					if ($this->Rindex->Exportable)
						$doc->exportCaption($this->Rindex);
					if ($this->type->Exportable)
						$doc->exportCaption($this->type);
					if ($this->name->Exportable)
						$doc->exportCaption($this->name);
					if ($this->symble->Exportable)
						$doc->exportCaption($this->symble);
					if ($this->supply->Exportable)
						$doc->exportCaption($this->supply);
					if ($this->price->Exportable)
						$doc->exportCaption($this->price);
					if ($this->logo->Exportable)
						$doc->exportCaption($this->logo);
					if ($this->holders->Exportable)
						$doc->exportCaption($this->holders);
					if ($this->transfers->Exportable)
						$doc->exportCaption($this->transfers);
					if ($this->website->Exportable)
						$doc->exportCaption($this->website);
					if ($this->contract->Exportable)
						$doc->exportCaption($this->contract);
					if ($this->decimals->Exportable)
						$doc->exportCaption($this->decimals);
					if ($this->dateadd->Exportable)
						$doc->exportCaption($this->dateadd);
				} else {
					if ($this->Rindex->Exportable)
						$doc->exportCaption($this->Rindex);
					if ($this->type->Exportable)
						$doc->exportCaption($this->type);
					if ($this->name->Exportable)
						$doc->exportCaption($this->name);
					if ($this->symble->Exportable)
						$doc->exportCaption($this->symble);
					if ($this->supply->Exportable)
						$doc->exportCaption($this->supply);
					if ($this->price->Exportable)
						$doc->exportCaption($this->price);
					if ($this->holders->Exportable)
						$doc->exportCaption($this->holders);
					if ($this->decimals->Exportable)
						$doc->exportCaption($this->decimals);
					if ($this->dateadd->Exportable)
						$doc->exportCaption($this->dateadd);
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
						if ($this->Rindex->Exportable)
							$doc->exportField($this->Rindex);
						if ($this->type->Exportable)
							$doc->exportField($this->type);
						if ($this->name->Exportable)
							$doc->exportField($this->name);
						if ($this->symble->Exportable)
							$doc->exportField($this->symble);
						if ($this->supply->Exportable)
							$doc->exportField($this->supply);
						if ($this->price->Exportable)
							$doc->exportField($this->price);
						if ($this->logo->Exportable)
							$doc->exportField($this->logo);
						if ($this->holders->Exportable)
							$doc->exportField($this->holders);
						if ($this->transfers->Exportable)
							$doc->exportField($this->transfers);
						if ($this->website->Exportable)
							$doc->exportField($this->website);
						if ($this->contract->Exportable)
							$doc->exportField($this->contract);
						if ($this->decimals->Exportable)
							$doc->exportField($this->decimals);
						if ($this->dateadd->Exportable)
							$doc->exportField($this->dateadd);
					} else {
						if ($this->Rindex->Exportable)
							$doc->exportField($this->Rindex);
						if ($this->type->Exportable)
							$doc->exportField($this->type);
						if ($this->name->Exportable)
							$doc->exportField($this->name);
						if ($this->symble->Exportable)
							$doc->exportField($this->symble);
						if ($this->supply->Exportable)
							$doc->exportField($this->supply);
						if ($this->price->Exportable)
							$doc->exportField($this->price);
						if ($this->holders->Exportable)
							$doc->exportField($this->holders);
						if ($this->decimals->Exportable)
							$doc->exportField($this->decimals);
						if ($this->dateadd->Exportable)
							$doc->exportField($this->dateadd);
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
		global $COMPOSITE_KEY_SEPARATOR;

		// Set up field name / file name field / file type field
		$fldName = "";
		$fileNameFld = "";
		$fileTypeFld = "";
		if ($fldparm == 'logo') {
			$fldName = "logo";
			$fileNameFld = "logo";
		} else {
			return FALSE; // Incorrect field
		}

		// Set up key values
		$ar = explode($COMPOSITE_KEY_SEPARATOR, $key);
		if (count($ar) == 1) {
			$this->Rindex->CurrentValue = $ar[0];
		} else {
			return FALSE; // Incorrect key
		}

		// Set up filter (WHERE Clause)
		$filter = $this->getRecordFilter();
		$this->CurrentFilter = $filter;
		$sql = $this->getCurrentSql();
		$conn = &$this->getConnection();
		$dbtype = GetConnectionType($this->Dbid);
		if (($rs = $conn->execute($sql)) && !$rs->EOF) {
			$val = $rs->fields($fldName);
			if (!EmptyValue($val)) {
				$fld = $this->fields[$fldName];

				// Binary data
				if ($fld->DataType == DATATYPE_BLOB) {
					if ($dbtype <> "MYSQL") {
						if (is_array($val) || is_object($val)) // Byte array
							$val = BytesToString($val);
					}
					if ($resize)
						ResizeBinary($val, $width, $height);

					// Write file type
					if ($fileTypeFld <> "" && !EmptyValue($rs->fields($fileTypeFld))) {
						AddHeader("Content-type", $rs->fields($fileTypeFld));
					} else {
						AddHeader("Content-type", ContentType(substr($val, 0, 11)));
					}

					// Write file name
					if ($fileNameFld <> "" && !EmptyValue($rs->fields($fileNameFld)))
						AddHeader("Content-Disposition", "attachment; filename=\"" . $rs->fields($fileNameFld) . "\"");

					// Write file data
					if (StartsString("PK", $val) && ContainsString($val, "[Content_Types].xml") &&
						ContainsString($val, "_rels") && ContainsString($val, "docProps")) { // Fix Office 2007 documents
						if (!EndsString("\0\0\0\0", $val))
							$val .= "\0\0\0\0";
					}

					// Clear any debug message
					if (ob_get_length())
						ob_end_clean();

					// Write binary data
					Write($val);

				// Upload to folder
				} else {
					if ($fld->UploadMultiple)
						$files = explode(MULTIPLE_UPLOAD_SEPARATOR, $val);
					else
						$files = [$val];
					$data = [];
					$ar = [];
					foreach ($files as $file) {
						if (!EmptyValue($file))
							$ar[$file] = FullUrl($fld->hrefPath() . $file);
					}
					$data[$fld->Param] = $ar;
					WriteJson($data);
				}
			}
			$rs->close();
			return TRUE;
		}
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
