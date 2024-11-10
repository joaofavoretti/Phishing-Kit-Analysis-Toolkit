<?php
namespace PHPMaker2019\esbc_20181010;

/**
 * Table class for geth_cmd
 */
class geth_cmd extends DbTable
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
	public $HOST_INDEX;
	public $HUB_INDEX;
	public $NODE_INDEX;
	public $GETH_PAR_INDEX;
	public $host_type;
	public $geth_path;
	public $node_root;
	public $node_acc40;
	public $node_port;
	public $hostip;
	public $node_rpcport;
	public $bootnode_enode;
	public $bootnode_ip;
	public $bootnode_port;
	public $date_add;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'geth_cmd';
		$this->TableName = 'geth_cmd';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`geth_cmd`";
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
		$this->Rindex = new DbField('geth_cmd', 'geth_cmd', 'x_Rindex', 'Rindex', '`Rindex`', '`Rindex`', 20, -1, FALSE, '`Rindex`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->Rindex->IsAutoIncrement = TRUE; // Autoincrement field
		$this->Rindex->IsPrimaryKey = TRUE; // Primary key field
		$this->Rindex->Sortable = TRUE; // Allow sort
		$this->Rindex->DefaultErrorMessage = $Language->Phrase("IncorrectInteger");
		$this->fields['Rindex'] = &$this->Rindex;

		// HOST_INDEX
		$this->HOST_INDEX = new DbField('geth_cmd', 'geth_cmd', 'x_HOST_INDEX', 'HOST_INDEX', '`HOST_INDEX`', '`HOST_INDEX`', 3, -1, FALSE, '`HOST_INDEX`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->HOST_INDEX->Nullable = FALSE; // NOT NULL field
		$this->HOST_INDEX->Required = TRUE; // Required field
		$this->HOST_INDEX->Sortable = TRUE; // Allow sort
		$this->HOST_INDEX->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->HOST_INDEX->PleaseSelectText = $Language->Phrase("PleaseSelect"); // PleaseSelect text
		switch ($CurrentLanguage) {
			case "zh-CN":
				$this->HOST_INDEX->Lookup = new Lookup('HOST_INDEX', 'esbc_host_basic', FALSE, 'HOST_INDEX', ["HOSTNAME","HOST_LOCATION","",""], [], [], [], [], [], '', '');
				break;
			case "zh-TW":
				$this->HOST_INDEX->Lookup = new Lookup('HOST_INDEX', 'esbc_host_basic', FALSE, 'HOST_INDEX', ["HOSTNAME","HOST_LOCATION","",""], [], [], [], [], [], '', '');
				break;
			case "en":
				$this->HOST_INDEX->Lookup = new Lookup('HOST_INDEX', 'esbc_host_basic', FALSE, 'HOST_INDEX', ["HOSTNAME","HOST_LOCATION","",""], [], [], [], [], [], '', '');
				break;
			default:
				$this->HOST_INDEX->Lookup = new Lookup('HOST_INDEX', 'esbc_host_basic', FALSE, 'HOST_INDEX', ["HOSTNAME","HOST_LOCATION","",""], [], [], [], [], [], '', '');
				break;
		}
		$this->HOST_INDEX->DefaultErrorMessage = $Language->Phrase("IncorrectInteger");
		$this->fields['HOST_INDEX'] = &$this->HOST_INDEX;

		// HUB_INDEX
		$this->HUB_INDEX = new DbField('geth_cmd', 'geth_cmd', 'x_HUB_INDEX', 'HUB_INDEX', '`HUB_INDEX`', '`HUB_INDEX`', 3, -1, FALSE, '`HUB_INDEX`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->HUB_INDEX->Nullable = FALSE; // NOT NULL field
		$this->HUB_INDEX->Required = TRUE; // Required field
		$this->HUB_INDEX->Sortable = TRUE; // Allow sort
		$this->HUB_INDEX->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->HUB_INDEX->PleaseSelectText = $Language->Phrase("PleaseSelect"); // PleaseSelect text
		switch ($CurrentLanguage) {
			case "zh-CN":
				$this->HUB_INDEX->Lookup = new Lookup('HUB_INDEX', 'esbc_hub_basic', FALSE, 'HUB_INDEX', ["HUB_NAME","","",""], [], [], [], [], [], '', '');
				break;
			case "zh-TW":
				$this->HUB_INDEX->Lookup = new Lookup('HUB_INDEX', 'esbc_hub_basic', FALSE, 'HUB_INDEX', ["HUB_NAME","","",""], [], [], [], [], [], '', '');
				break;
			case "en":
				$this->HUB_INDEX->Lookup = new Lookup('HUB_INDEX', 'esbc_hub_basic', FALSE, 'HUB_INDEX', ["HUB_NAME","","",""], [], [], [], [], [], '', '');
				break;
			default:
				$this->HUB_INDEX->Lookup = new Lookup('HUB_INDEX', 'esbc_hub_basic', FALSE, 'HUB_INDEX', ["HUB_NAME","","",""], [], [], [], [], [], '', '');
				break;
		}
		$this->HUB_INDEX->DefaultErrorMessage = $Language->Phrase("IncorrectInteger");
		$this->fields['HUB_INDEX'] = &$this->HUB_INDEX;

		// NODE_INDEX
		$this->NODE_INDEX = new DbField('geth_cmd', 'geth_cmd', 'x_NODE_INDEX', 'NODE_INDEX', '`NODE_INDEX`', '`NODE_INDEX`', 3, -1, FALSE, '`NODE_INDEX`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->NODE_INDEX->Nullable = FALSE; // NOT NULL field
		$this->NODE_INDEX->Required = TRUE; // Required field
		$this->NODE_INDEX->Sortable = TRUE; // Allow sort
		$this->NODE_INDEX->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->NODE_INDEX->PleaseSelectText = $Language->Phrase("PleaseSelect"); // PleaseSelect text
		switch ($CurrentLanguage) {
			case "zh-CN":
				$this->NODE_INDEX->Lookup = new Lookup('NODE_INDEX', 'esbc_node_basic', FALSE, 'NODE_INDEX', ["NODE_NAME","","",""], [], [], [], [], [], '', '');
				break;
			case "zh-TW":
				$this->NODE_INDEX->Lookup = new Lookup('NODE_INDEX', 'esbc_node_basic', FALSE, 'NODE_INDEX', ["NODE_NAME","","",""], [], [], [], [], [], '', '');
				break;
			case "en":
				$this->NODE_INDEX->Lookup = new Lookup('NODE_INDEX', 'esbc_node_basic', FALSE, 'NODE_INDEX', ["NODE_NAME","","",""], [], [], [], [], [], '', '');
				break;
			default:
				$this->NODE_INDEX->Lookup = new Lookup('NODE_INDEX', 'esbc_node_basic', FALSE, 'NODE_INDEX', ["NODE_NAME","","",""], [], [], [], [], [], '', '');
				break;
		}
		$this->NODE_INDEX->DefaultErrorMessage = $Language->Phrase("IncorrectInteger");
		$this->fields['NODE_INDEX'] = &$this->NODE_INDEX;

		// GETH_PAR_INDEX
		$this->GETH_PAR_INDEX = new DbField('geth_cmd', 'geth_cmd', 'x_GETH_PAR_INDEX', 'GETH_PAR_INDEX', '`GETH_PAR_INDEX`', '`GETH_PAR_INDEX`', 3, -1, FALSE, '`GETH_PAR_INDEX`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->GETH_PAR_INDEX->Nullable = FALSE; // NOT NULL field
		$this->GETH_PAR_INDEX->Required = TRUE; // Required field
		$this->GETH_PAR_INDEX->Sortable = TRUE; // Allow sort
		$this->GETH_PAR_INDEX->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->GETH_PAR_INDEX->PleaseSelectText = $Language->Phrase("PleaseSelect"); // PleaseSelect text
		switch ($CurrentLanguage) {
			case "zh-CN":
				$this->GETH_PAR_INDEX->Lookup = new Lookup('GETH_PAR_INDEX', 'esbc_geth_par', FALSE, 'GETH_INDEX', ["HOST_TYPE","GETH_PATH","",""], [], [], [], [], [], '', '');
				break;
			case "zh-TW":
				$this->GETH_PAR_INDEX->Lookup = new Lookup('GETH_PAR_INDEX', 'esbc_geth_par', FALSE, 'GETH_INDEX', ["HOST_TYPE","GETH_PATH","",""], [], [], [], [], [], '', '');
				break;
			case "en":
				$this->GETH_PAR_INDEX->Lookup = new Lookup('GETH_PAR_INDEX', 'esbc_geth_par', FALSE, 'GETH_INDEX', ["HOST_TYPE","GETH_PATH","",""], [], [], [], [], [], '', '');
				break;
			default:
				$this->GETH_PAR_INDEX->Lookup = new Lookup('GETH_PAR_INDEX', 'esbc_geth_par', FALSE, 'GETH_INDEX', ["HOST_TYPE","GETH_PATH","",""], [], [], [], [], [], '', '');
				break;
		}
		$this->GETH_PAR_INDEX->DefaultErrorMessage = $Language->Phrase("IncorrectInteger");
		$this->fields['GETH_PAR_INDEX'] = &$this->GETH_PAR_INDEX;

		// host_type
		$this->host_type = new DbField('geth_cmd', 'geth_cmd', 'x_host_type', 'host_type', '`host_type`', '`host_type`', 200, -1, FALSE, '`host_type`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->host_type->Sortable = TRUE; // Allow sort
		$this->fields['host_type'] = &$this->host_type;

		// geth_path
		$this->geth_path = new DbField('geth_cmd', 'geth_cmd', 'x_geth_path', 'geth_path', '`geth_path`', '`geth_path`', 200, -1, FALSE, '`geth_path`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->geth_path->Nullable = FALSE; // NOT NULL field
		$this->geth_path->Required = TRUE; // Required field
		$this->geth_path->Sortable = TRUE; // Allow sort
		$this->fields['geth_path'] = &$this->geth_path;

		// node_root
		$this->node_root = new DbField('geth_cmd', 'geth_cmd', 'x_node_root', 'node_root', '`node_root`', '`node_root`', 201, -1, FALSE, '`node_root`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->node_root->Sortable = TRUE; // Allow sort
		$this->fields['node_root'] = &$this->node_root;

		// node_acc40
		$this->node_acc40 = new DbField('geth_cmd', 'geth_cmd', 'x_node_acc40', 'node_acc40', '`node_acc40`', '`node_acc40`', 200, -1, FALSE, '`node_acc40`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->node_acc40->Sortable = TRUE; // Allow sort
		$this->fields['node_acc40'] = &$this->node_acc40;

		// node_port
		$this->node_port = new DbField('geth_cmd', 'geth_cmd', 'x_node_port', 'node_port', '`node_port`', '`node_port`', 200, -1, FALSE, '`node_port`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->node_port->Sortable = TRUE; // Allow sort
		$this->fields['node_port'] = &$this->node_port;

		// hostip
		$this->hostip = new DbField('geth_cmd', 'geth_cmd', 'x_hostip', 'hostip', '`hostip`', '`hostip`', 200, -1, FALSE, '`hostip`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->hostip->Sortable = TRUE; // Allow sort
		$this->fields['hostip'] = &$this->hostip;

		// node_rpcport
		$this->node_rpcport = new DbField('geth_cmd', 'geth_cmd', 'x_node_rpcport', 'node_rpcport', '`node_rpcport`', '`node_rpcport`', 200, -1, FALSE, '`node_rpcport`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->node_rpcport->Sortable = TRUE; // Allow sort
		$this->fields['node_rpcport'] = &$this->node_rpcport;

		// bootnode_enode
		$this->bootnode_enode = new DbField('geth_cmd', 'geth_cmd', 'x_bootnode_enode', 'bootnode_enode', '`bootnode_enode`', '`bootnode_enode`', 201, -1, FALSE, '`bootnode_enode`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->bootnode_enode->Sortable = TRUE; // Allow sort
		$this->fields['bootnode_enode'] = &$this->bootnode_enode;

		// bootnode_ip
		$this->bootnode_ip = new DbField('geth_cmd', 'geth_cmd', 'x_bootnode_ip', 'bootnode_ip', '`bootnode_ip`', '`bootnode_ip`', 200, -1, FALSE, '`bootnode_ip`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->bootnode_ip->Sortable = TRUE; // Allow sort
		$this->fields['bootnode_ip'] = &$this->bootnode_ip;

		// bootnode_port
		$this->bootnode_port = new DbField('geth_cmd', 'geth_cmd', 'x_bootnode_port', 'bootnode_port', '`bootnode_port`', '`bootnode_port`', 200, -1, FALSE, '`bootnode_port`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->bootnode_port->Sortable = TRUE; // Allow sort
		$this->fields['bootnode_port'] = &$this->bootnode_port;

		// date_add
		$this->date_add = new DbField('geth_cmd', 'geth_cmd', 'x_date_add', 'date_add', '`date_add`', CastDateFieldForLike('`date_add`', 0, "DB"), 135, 0, FALSE, '`date_add`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->date_add->Sortable = TRUE; // Allow sort
		$this->date_add->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->Phrase("IncorrectDate"));
		$this->fields['date_add'] = &$this->date_add;
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
		return ($this->SqlFrom <> "") ? $this->SqlFrom : "`geth_cmd`";
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
		$this->HOST_INDEX->DbValue = $row['HOST_INDEX'];
		$this->HUB_INDEX->DbValue = $row['HUB_INDEX'];
		$this->NODE_INDEX->DbValue = $row['NODE_INDEX'];
		$this->GETH_PAR_INDEX->DbValue = $row['GETH_PAR_INDEX'];
		$this->host_type->DbValue = $row['host_type'];
		$this->geth_path->DbValue = $row['geth_path'];
		$this->node_root->DbValue = $row['node_root'];
		$this->node_acc40->DbValue = $row['node_acc40'];
		$this->node_port->DbValue = $row['node_port'];
		$this->hostip->DbValue = $row['hostip'];
		$this->node_rpcport->DbValue = $row['node_rpcport'];
		$this->bootnode_enode->DbValue = $row['bootnode_enode'];
		$this->bootnode_ip->DbValue = $row['bootnode_ip'];
		$this->bootnode_port->DbValue = $row['bootnode_port'];
		$this->date_add->DbValue = $row['date_add'];
	}

	// Delete uploaded files
	public function deleteUploadedFiles($row)
	{
		$this->loadDbValues($row);
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
			return "geth_cmdlist.php";
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
		if ($pageName == "geth_cmdview.php")
			return $Language->Phrase("View");
		elseif ($pageName == "geth_cmdedit.php")
			return $Language->Phrase("Edit");
		elseif ($pageName == "geth_cmdadd.php")
			return $Language->Phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "geth_cmdlist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm <> "")
			$url = $this->keyUrl("geth_cmdview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("geth_cmdview.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm <> "")
			$url = "geth_cmdadd.php?" . $this->getUrlParm($parm);
		else
			$url = "geth_cmdadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("geth_cmdedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("geth_cmdadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("geth_cmddelete.php", $this->getUrlParm());
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
		$this->HOST_INDEX->setDbValue($rs->fields('HOST_INDEX'));
		$this->HUB_INDEX->setDbValue($rs->fields('HUB_INDEX'));
		$this->NODE_INDEX->setDbValue($rs->fields('NODE_INDEX'));
		$this->GETH_PAR_INDEX->setDbValue($rs->fields('GETH_PAR_INDEX'));
		$this->host_type->setDbValue($rs->fields('host_type'));
		$this->geth_path->setDbValue($rs->fields('geth_path'));
		$this->node_root->setDbValue($rs->fields('node_root'));
		$this->node_acc40->setDbValue($rs->fields('node_acc40'));
		$this->node_port->setDbValue($rs->fields('node_port'));
		$this->hostip->setDbValue($rs->fields('hostip'));
		$this->node_rpcport->setDbValue($rs->fields('node_rpcport'));
		$this->bootnode_enode->setDbValue($rs->fields('bootnode_enode'));
		$this->bootnode_ip->setDbValue($rs->fields('bootnode_ip'));
		$this->bootnode_port->setDbValue($rs->fields('bootnode_port'));
		$this->date_add->setDbValue($rs->fields('date_add'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

	// Common render codes
		// Rindex
		// HOST_INDEX
		// HUB_INDEX
		// NODE_INDEX
		// GETH_PAR_INDEX
		// host_type
		// geth_path
		// node_root
		// node_acc40
		// node_port
		// hostip
		// node_rpcport
		// bootnode_enode
		// bootnode_ip
		// bootnode_port
		// date_add
		// Rindex

		$this->Rindex->ViewValue = $this->Rindex->CurrentValue;
		$this->Rindex->ViewCustomAttributes = "";

		// HOST_INDEX
		$curVal = strval($this->HOST_INDEX->CurrentValue);
		if ($curVal <> "") {
			$this->HOST_INDEX->ViewValue = $this->HOST_INDEX->lookupCacheOption($curVal);
			if ($this->HOST_INDEX->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`HOST_INDEX`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->HOST_INDEX->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = $rswrk->fields('df');
					$arwrk[2] = FormatNumber($rswrk->fields('df2'), 0, -2, -2, -2);
					$this->HOST_INDEX->ViewValue = $this->HOST_INDEX->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->HOST_INDEX->ViewValue = $this->HOST_INDEX->CurrentValue;
				}
			}
		} else {
			$this->HOST_INDEX->ViewValue = NULL;
		}
		$this->HOST_INDEX->ViewCustomAttributes = "";

		// HUB_INDEX
		$curVal = strval($this->HUB_INDEX->CurrentValue);
		if ($curVal <> "") {
			$this->HUB_INDEX->ViewValue = $this->HUB_INDEX->lookupCacheOption($curVal);
			if ($this->HUB_INDEX->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`HUB_INDEX`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->HUB_INDEX->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = $rswrk->fields('df');
					$this->HUB_INDEX->ViewValue = $this->HUB_INDEX->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->HUB_INDEX->ViewValue = $this->HUB_INDEX->CurrentValue;
				}
			}
		} else {
			$this->HUB_INDEX->ViewValue = NULL;
		}
		$this->HUB_INDEX->ViewCustomAttributes = "";

		// NODE_INDEX
		$curVal = strval($this->NODE_INDEX->CurrentValue);
		if ($curVal <> "") {
			$this->NODE_INDEX->ViewValue = $this->NODE_INDEX->lookupCacheOption($curVal);
			if ($this->NODE_INDEX->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`NODE_INDEX`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->NODE_INDEX->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = $rswrk->fields('df');
					$this->NODE_INDEX->ViewValue = $this->NODE_INDEX->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->NODE_INDEX->ViewValue = $this->NODE_INDEX->CurrentValue;
				}
			}
		} else {
			$this->NODE_INDEX->ViewValue = NULL;
		}
		$this->NODE_INDEX->ViewCustomAttributes = "";

		// GETH_PAR_INDEX
		$curVal = strval($this->GETH_PAR_INDEX->CurrentValue);
		if ($curVal <> "") {
			$this->GETH_PAR_INDEX->ViewValue = $this->GETH_PAR_INDEX->lookupCacheOption($curVal);
			if ($this->GETH_PAR_INDEX->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`GETH_INDEX`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->GETH_PAR_INDEX->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = $rswrk->fields('df');
					$arwrk[2] = $rswrk->fields('df2');
					$this->GETH_PAR_INDEX->ViewValue = $this->GETH_PAR_INDEX->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->GETH_PAR_INDEX->ViewValue = $this->GETH_PAR_INDEX->CurrentValue;
				}
			}
		} else {
			$this->GETH_PAR_INDEX->ViewValue = NULL;
		}
		$this->GETH_PAR_INDEX->ViewCustomAttributes = "";

		// host_type
		$this->host_type->ViewValue = $this->host_type->CurrentValue;
		$this->host_type->ViewCustomAttributes = "";

		// geth_path
		$this->geth_path->ViewValue = $this->geth_path->CurrentValue;
		$this->geth_path->ViewCustomAttributes = "";

		// node_root
		$this->node_root->ViewValue = $this->node_root->CurrentValue;
		$this->node_root->ViewCustomAttributes = "";

		// node_acc40
		$this->node_acc40->ViewValue = $this->node_acc40->CurrentValue;
		$this->node_acc40->ViewCustomAttributes = "";

		// node_port
		$this->node_port->ViewValue = $this->node_port->CurrentValue;
		$this->node_port->ViewCustomAttributes = "";

		// hostip
		$this->hostip->ViewValue = $this->hostip->CurrentValue;
		$this->hostip->ViewCustomAttributes = "";

		// node_rpcport
		$this->node_rpcport->ViewValue = $this->node_rpcport->CurrentValue;
		$this->node_rpcport->ViewCustomAttributes = "";

		// bootnode_enode
		$this->bootnode_enode->ViewValue = $this->bootnode_enode->CurrentValue;
		$this->bootnode_enode->ViewCustomAttributes = "";

		// bootnode_ip
		$this->bootnode_ip->ViewValue = $this->bootnode_ip->CurrentValue;
		$this->bootnode_ip->ViewCustomAttributes = "";

		// bootnode_port
		$this->bootnode_port->ViewValue = $this->bootnode_port->CurrentValue;
		$this->bootnode_port->ViewCustomAttributes = "";

		// date_add
		$this->date_add->ViewValue = $this->date_add->CurrentValue;
		$this->date_add->ViewValue = FormatDateTime($this->date_add->ViewValue, 0);
		$this->date_add->ViewCustomAttributes = "";

		// Rindex
		$this->Rindex->LinkCustomAttributes = "";
		$this->Rindex->HrefValue = "";
		$this->Rindex->TooltipValue = "";

		// HOST_INDEX
		$this->HOST_INDEX->LinkCustomAttributes = "";
		$this->HOST_INDEX->HrefValue = "";
		$this->HOST_INDEX->TooltipValue = "";

		// HUB_INDEX
		$this->HUB_INDEX->LinkCustomAttributes = "";
		$this->HUB_INDEX->HrefValue = "";
		$this->HUB_INDEX->TooltipValue = "";

		// NODE_INDEX
		$this->NODE_INDEX->LinkCustomAttributes = "";
		$this->NODE_INDEX->HrefValue = "";
		$this->NODE_INDEX->TooltipValue = "";

		// GETH_PAR_INDEX
		$this->GETH_PAR_INDEX->LinkCustomAttributes = "";
		$this->GETH_PAR_INDEX->HrefValue = "";
		$this->GETH_PAR_INDEX->TooltipValue = "";

		// host_type
		$this->host_type->LinkCustomAttributes = "";
		$this->host_type->HrefValue = "";
		$this->host_type->TooltipValue = "";

		// geth_path
		$this->geth_path->LinkCustomAttributes = "";
		$this->geth_path->HrefValue = "";
		$this->geth_path->TooltipValue = "";

		// node_root
		$this->node_root->LinkCustomAttributes = "";
		$this->node_root->HrefValue = "";
		$this->node_root->TooltipValue = "";

		// node_acc40
		$this->node_acc40->LinkCustomAttributes = "";
		$this->node_acc40->HrefValue = "";
		$this->node_acc40->TooltipValue = "";

		// node_port
		$this->node_port->LinkCustomAttributes = "";
		$this->node_port->HrefValue = "";
		$this->node_port->TooltipValue = "";

		// hostip
		$this->hostip->LinkCustomAttributes = "";
		$this->hostip->HrefValue = "";
		$this->hostip->TooltipValue = "";

		// node_rpcport
		$this->node_rpcport->LinkCustomAttributes = "";
		$this->node_rpcport->HrefValue = "";
		$this->node_rpcport->TooltipValue = "";

		// bootnode_enode
		$this->bootnode_enode->LinkCustomAttributes = "";
		$this->bootnode_enode->HrefValue = "";
		$this->bootnode_enode->TooltipValue = "";

		// bootnode_ip
		$this->bootnode_ip->LinkCustomAttributes = "";
		$this->bootnode_ip->HrefValue = "";
		$this->bootnode_ip->TooltipValue = "";

		// bootnode_port
		$this->bootnode_port->LinkCustomAttributes = "";
		$this->bootnode_port->HrefValue = "";
		$this->bootnode_port->TooltipValue = "";

		// date_add
		$this->date_add->LinkCustomAttributes = "";
		$this->date_add->HrefValue = "";
		$this->date_add->TooltipValue = "";

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

		// HOST_INDEX
		$this->HOST_INDEX->EditAttrs["class"] = "form-control";
		$this->HOST_INDEX->EditCustomAttributes = "";

		// HUB_INDEX
		$this->HUB_INDEX->EditAttrs["class"] = "form-control";
		$this->HUB_INDEX->EditCustomAttributes = "";

		// NODE_INDEX
		$this->NODE_INDEX->EditAttrs["class"] = "form-control";
		$this->NODE_INDEX->EditCustomAttributes = "";

		// GETH_PAR_INDEX
		$this->GETH_PAR_INDEX->EditAttrs["class"] = "form-control";
		$this->GETH_PAR_INDEX->EditCustomAttributes = "";

		// host_type
		$this->host_type->EditAttrs["class"] = "form-control";
		$this->host_type->EditCustomAttributes = "";
		$this->host_type->EditValue = $this->host_type->CurrentValue;
		$this->host_type->PlaceHolder = RemoveHtml($this->host_type->caption());

		// geth_path
		$this->geth_path->EditAttrs["class"] = "form-control";
		$this->geth_path->EditCustomAttributes = "";
		$this->geth_path->EditValue = $this->geth_path->CurrentValue;
		$this->geth_path->PlaceHolder = RemoveHtml($this->geth_path->caption());

		// node_root
		$this->node_root->EditAttrs["class"] = "form-control";
		$this->node_root->EditCustomAttributes = "";
		$this->node_root->EditValue = $this->node_root->CurrentValue;
		$this->node_root->PlaceHolder = RemoveHtml($this->node_root->caption());

		// node_acc40
		$this->node_acc40->EditAttrs["class"] = "form-control";
		$this->node_acc40->EditCustomAttributes = "";
		$this->node_acc40->EditValue = $this->node_acc40->CurrentValue;
		$this->node_acc40->PlaceHolder = RemoveHtml($this->node_acc40->caption());

		// node_port
		$this->node_port->EditAttrs["class"] = "form-control";
		$this->node_port->EditCustomAttributes = "";
		$this->node_port->EditValue = $this->node_port->CurrentValue;
		$this->node_port->PlaceHolder = RemoveHtml($this->node_port->caption());

		// hostip
		$this->hostip->EditAttrs["class"] = "form-control";
		$this->hostip->EditCustomAttributes = "";
		$this->hostip->EditValue = $this->hostip->CurrentValue;
		$this->hostip->PlaceHolder = RemoveHtml($this->hostip->caption());

		// node_rpcport
		$this->node_rpcport->EditAttrs["class"] = "form-control";
		$this->node_rpcport->EditCustomAttributes = "";
		$this->node_rpcport->EditValue = $this->node_rpcport->CurrentValue;
		$this->node_rpcport->PlaceHolder = RemoveHtml($this->node_rpcport->caption());

		// bootnode_enode
		$this->bootnode_enode->EditAttrs["class"] = "form-control";
		$this->bootnode_enode->EditCustomAttributes = "";
		$this->bootnode_enode->EditValue = $this->bootnode_enode->CurrentValue;
		$this->bootnode_enode->PlaceHolder = RemoveHtml($this->bootnode_enode->caption());

		// bootnode_ip
		$this->bootnode_ip->EditAttrs["class"] = "form-control";
		$this->bootnode_ip->EditCustomAttributes = "";
		$this->bootnode_ip->EditValue = $this->bootnode_ip->CurrentValue;
		$this->bootnode_ip->PlaceHolder = RemoveHtml($this->bootnode_ip->caption());

		// bootnode_port
		$this->bootnode_port->EditAttrs["class"] = "form-control";
		$this->bootnode_port->EditCustomAttributes = "";
		$this->bootnode_port->EditValue = $this->bootnode_port->CurrentValue;
		$this->bootnode_port->PlaceHolder = RemoveHtml($this->bootnode_port->caption());

		// date_add
		$this->date_add->EditAttrs["class"] = "form-control";
		$this->date_add->EditCustomAttributes = "";
		$this->date_add->EditValue = FormatDateTime($this->date_add->CurrentValue, 8);
		$this->date_add->PlaceHolder = RemoveHtml($this->date_add->caption());

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
					if ($this->HOST_INDEX->Exportable)
						$doc->exportCaption($this->HOST_INDEX);
					if ($this->HUB_INDEX->Exportable)
						$doc->exportCaption($this->HUB_INDEX);
					if ($this->NODE_INDEX->Exportable)
						$doc->exportCaption($this->NODE_INDEX);
					if ($this->GETH_PAR_INDEX->Exportable)
						$doc->exportCaption($this->GETH_PAR_INDEX);
					if ($this->host_type->Exportable)
						$doc->exportCaption($this->host_type);
					if ($this->geth_path->Exportable)
						$doc->exportCaption($this->geth_path);
					if ($this->node_root->Exportable)
						$doc->exportCaption($this->node_root);
					if ($this->node_acc40->Exportable)
						$doc->exportCaption($this->node_acc40);
					if ($this->node_port->Exportable)
						$doc->exportCaption($this->node_port);
					if ($this->hostip->Exportable)
						$doc->exportCaption($this->hostip);
					if ($this->node_rpcport->Exportable)
						$doc->exportCaption($this->node_rpcport);
					if ($this->bootnode_enode->Exportable)
						$doc->exportCaption($this->bootnode_enode);
					if ($this->bootnode_ip->Exportable)
						$doc->exportCaption($this->bootnode_ip);
					if ($this->bootnode_port->Exportable)
						$doc->exportCaption($this->bootnode_port);
					if ($this->date_add->Exportable)
						$doc->exportCaption($this->date_add);
				} else {
					if ($this->Rindex->Exportable)
						$doc->exportCaption($this->Rindex);
					if ($this->HOST_INDEX->Exportable)
						$doc->exportCaption($this->HOST_INDEX);
					if ($this->HUB_INDEX->Exportable)
						$doc->exportCaption($this->HUB_INDEX);
					if ($this->NODE_INDEX->Exportable)
						$doc->exportCaption($this->NODE_INDEX);
					if ($this->GETH_PAR_INDEX->Exportable)
						$doc->exportCaption($this->GETH_PAR_INDEX);
					if ($this->host_type->Exportable)
						$doc->exportCaption($this->host_type);
					if ($this->node_acc40->Exportable)
						$doc->exportCaption($this->node_acc40);
					if ($this->node_port->Exportable)
						$doc->exportCaption($this->node_port);
					if ($this->hostip->Exportable)
						$doc->exportCaption($this->hostip);
					if ($this->node_rpcport->Exportable)
						$doc->exportCaption($this->node_rpcport);
					if ($this->bootnode_ip->Exportable)
						$doc->exportCaption($this->bootnode_ip);
					if ($this->bootnode_port->Exportable)
						$doc->exportCaption($this->bootnode_port);
					if ($this->date_add->Exportable)
						$doc->exportCaption($this->date_add);
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
						if ($this->HOST_INDEX->Exportable)
							$doc->exportField($this->HOST_INDEX);
						if ($this->HUB_INDEX->Exportable)
							$doc->exportField($this->HUB_INDEX);
						if ($this->NODE_INDEX->Exportable)
							$doc->exportField($this->NODE_INDEX);
						if ($this->GETH_PAR_INDEX->Exportable)
							$doc->exportField($this->GETH_PAR_INDEX);
						if ($this->host_type->Exportable)
							$doc->exportField($this->host_type);
						if ($this->geth_path->Exportable)
							$doc->exportField($this->geth_path);
						if ($this->node_root->Exportable)
							$doc->exportField($this->node_root);
						if ($this->node_acc40->Exportable)
							$doc->exportField($this->node_acc40);
						if ($this->node_port->Exportable)
							$doc->exportField($this->node_port);
						if ($this->hostip->Exportable)
							$doc->exportField($this->hostip);
						if ($this->node_rpcport->Exportable)
							$doc->exportField($this->node_rpcport);
						if ($this->bootnode_enode->Exportable)
							$doc->exportField($this->bootnode_enode);
						if ($this->bootnode_ip->Exportable)
							$doc->exportField($this->bootnode_ip);
						if ($this->bootnode_port->Exportable)
							$doc->exportField($this->bootnode_port);
						if ($this->date_add->Exportable)
							$doc->exportField($this->date_add);
					} else {
						if ($this->Rindex->Exportable)
							$doc->exportField($this->Rindex);
						if ($this->HOST_INDEX->Exportable)
							$doc->exportField($this->HOST_INDEX);
						if ($this->HUB_INDEX->Exportable)
							$doc->exportField($this->HUB_INDEX);
						if ($this->NODE_INDEX->Exportable)
							$doc->exportField($this->NODE_INDEX);
						if ($this->GETH_PAR_INDEX->Exportable)
							$doc->exportField($this->GETH_PAR_INDEX);
						if ($this->host_type->Exportable)
							$doc->exportField($this->host_type);
						if ($this->node_acc40->Exportable)
							$doc->exportField($this->node_acc40);
						if ($this->node_port->Exportable)
							$doc->exportField($this->node_port);
						if ($this->hostip->Exportable)
							$doc->exportField($this->hostip);
						if ($this->node_rpcport->Exportable)
							$doc->exportField($this->node_rpcport);
						if ($this->bootnode_ip->Exportable)
							$doc->exportField($this->bootnode_ip);
						if ($this->bootnode_port->Exportable)
							$doc->exportField($this->bootnode_port);
						if ($this->date_add->Exportable)
							$doc->exportField($this->date_add);
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
