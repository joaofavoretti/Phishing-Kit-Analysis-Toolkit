<?php
namespace PHPMaker2019\esbc_20181010;

//
// Page class
//
class geth_cmd_edit extends geth_cmd
{

	// Page ID
	public $PageID = "edit";

	// Project ID
	public $ProjectID = "{F9326A38-3552-47D5-B291-9AC4B94B5D18}";

	// Table name
	public $TableName = 'geth_cmd';

	// Page object name
	public $PageObjName = "geth_cmd_edit";

	// Page headings
	public $Heading = "";
	public $Subheading = "";
	public $PageHeader;
	public $PageFooter;
	public $Token = "";
	public $TokenTimeout = 0;
	public $CheckToken = CHECK_TOKEN;
	public $CheckTokenFn = PROJECT_NAMESPACE . "CheckToken";
	public $CreateTokenFn = PROJECT_NAMESPACE . "CreateToken";

	// Page heading
	public function pageHeading()
	{
		global $Language;
		if ($this->Heading <> "")
			return $this->Heading;
		if (method_exists($this, "tableCaption"))
			return $this->tableCaption();
		return "";
	}

	// Page subheading
	public function pageSubheading()
	{
		global $Language;
		if ($this->Subheading <> "")
			return $this->Subheading;
		if ($this->TableName)
			return $Language->Phrase($this->PageID);
		return "";
	}

	// Page name
	public function pageName()
	{
		return CurrentPageName();
	}

	// Page URL
	public function pageUrl()
	{
		$url = CurrentPageName() . "?";
		if ($this->UseTokenInUrl)
			$url .= "t=" . $this->TableVar . "&"; // Add page token
		return $url;
	}

	// Message
	public function getMessage()
	{
		return @$_SESSION[SESSION_MESSAGE];
	}
	public function setMessage($v)
	{
		AddMessage($_SESSION[SESSION_MESSAGE], $v);
	}
	public function getFailureMessage()
	{
		return @$_SESSION[SESSION_FAILURE_MESSAGE];
	}
	public function setFailureMessage($v)
	{
		AddMessage($_SESSION[SESSION_FAILURE_MESSAGE], $v);
	}
	public function getSuccessMessage()
	{
		return @$_SESSION[SESSION_SUCCESS_MESSAGE];
	}
	public function setSuccessMessage($v)
	{
		AddMessage($_SESSION[SESSION_SUCCESS_MESSAGE], $v);
	}
	public function getWarningMessage()
	{
		return @$_SESSION[SESSION_WARNING_MESSAGE];
	}
	public function setWarningMessage($v)
	{
		AddMessage($_SESSION[SESSION_WARNING_MESSAGE], $v);
	}

	// Methods to clear message
	public function clearMessage()
	{
		$_SESSION[SESSION_MESSAGE] = "";
	}
	public function clearFailureMessage()
	{
		$_SESSION[SESSION_FAILURE_MESSAGE] = "";
	}
	public function clearSuccessMessage()
	{
		$_SESSION[SESSION_SUCCESS_MESSAGE] = "";
	}
	public function clearWarningMessage()
	{
		$_SESSION[SESSION_WARNING_MESSAGE] = "";
	}
	public function clearMessages()
	{
		$_SESSION[SESSION_MESSAGE] = "";
		$_SESSION[SESSION_FAILURE_MESSAGE] = "";
		$_SESSION[SESSION_SUCCESS_MESSAGE] = "";
		$_SESSION[SESSION_WARNING_MESSAGE] = "";
	}

	// Show message
	public function showMessage()
	{
		$hidden = FALSE;
		$html = "";

		// Message
		$message = $this->getMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($message, "");
		if ($message <> "") { // Message in Session, display
			if (!$hidden)
				$message = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $message;
			$html .= '<div class="alert alert-info alert-dismissible ew-info"><i class="icon fa fa-info"></i>' . $message . '</div>';
			$_SESSION[SESSION_MESSAGE] = ""; // Clear message in Session
		}

		// Warning message
		$warningMessage = $this->getWarningMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($warningMessage, "warning");
		if ($warningMessage <> "") { // Message in Session, display
			if (!$hidden)
				$warningMessage = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $warningMessage;
			$html .= '<div class="alert alert-warning alert-dismissible ew-warning"><i class="icon fa fa-warning"></i>' . $warningMessage . '</div>';
			$_SESSION[SESSION_WARNING_MESSAGE] = ""; // Clear message in Session
		}

		// Success message
		$successMessage = $this->getSuccessMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($successMessage, "success");
		if ($successMessage <> "") { // Message in Session, display
			if (!$hidden)
				$successMessage = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $successMessage;
			$html .= '<div class="alert alert-success alert-dismissible ew-success"><i class="icon fa fa-check"></i>' . $successMessage . '</div>';
			$_SESSION[SESSION_SUCCESS_MESSAGE] = ""; // Clear message in Session
		}

		// Failure message
		$errorMessage = $this->getFailureMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($errorMessage, "failure");
		if ($errorMessage <> "") { // Message in Session, display
			if (!$hidden)
				$errorMessage = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $errorMessage;
			$html .= '<div class="alert alert-danger alert-dismissible ew-error"><i class="icon fa fa-ban"></i>' . $errorMessage . '</div>';
			$_SESSION[SESSION_FAILURE_MESSAGE] = ""; // Clear message in Session
		}
		echo '<div class="ew-message-dialog' . (($hidden) ? ' d-none' : "") . '">' . $html . '</div>';
	}

	// Get message as array
	public function getMessageAsArray()
	{
		$ar = array();

		// Message
		$message = $this->getMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($message, "");

		if ($message <> "") { // Message in Session, display
			$ar["message"] = $message;
			$_SESSION[SESSION_MESSAGE] = ""; // Clear message in Session
		}

		// Warning message
		$warningMessage = $this->getWarningMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($warningMessage, "warning");

		if ($warningMessage <> "") { // Message in Session, display
			$ar["warningMessage"] = $warningMessage;
			$_SESSION[SESSION_WARNING_MESSAGE] = ""; // Clear message in Session
		}

		// Success message
		$successMessage = $this->getSuccessMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($successMessage, "success");

		if ($successMessage <> "") { // Message in Session, display
			$ar["successMessage"] = $successMessage;
			$_SESSION[SESSION_SUCCESS_MESSAGE] = ""; // Clear message in Session
		}

		// Failure message
		$failureMessage = $this->getFailureMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($failureMessage, "failure");

		if ($failureMessage <> "") { // Message in Session, display
			$ar["failureMessage"] = $failureMessage;
			$_SESSION[SESSION_FAILURE_MESSAGE] = ""; // Clear message in Session
		}
		return $ar;
	}

	// Show Page Header
	public function showPageHeader()
	{
		$header = $this->PageHeader;
		$this->Page_DataRendering($header);
		if ($header <> "") { // Header exists, display
			echo '<p id="ew-page-header">' . $header . '</p>';
		}
	}

	// Show Page Footer
	public function showPageFooter()
	{
		$footer = $this->PageFooter;
		$this->Page_DataRendered($footer);
		if ($footer <> "") { // Footer exists, display
			echo '<p id="ew-page-footer">' . $footer . '</p>';
		}
	}

	// Validate page request
	protected function isPageRequest()
	{
		global $CurrentForm;
		if ($this->UseTokenInUrl) {
			if ($CurrentForm)
				return ($this->TableVar == $CurrentForm->getValue("t"));
			if (Get("t") <> "")
				return ($this->TableVar == Get("t"));
		} else {
			return TRUE;
		}
	}

	// Valid Post
	protected function validPost()
	{
		if (!$this->CheckToken || !IsPost() || IsApi())
			return TRUE;
		if (Post(TOKEN_NAME) === NULL)
			return FALSE;
		$fn = $this->CheckTokenFn;
		if (is_callable($fn))
			return $fn(Post(TOKEN_NAME), $this->TokenTimeout);
		return FALSE;
	}

	// Create Token
	public function createToken()
	{
		global $CurrentToken;

		//if ($this->CheckToken) { // Always create token, required by API file/lookup request
			$fn = $this->CreateTokenFn;
			if ($this->Token == "" && is_callable($fn)) // Create token
				$this->Token = $fn();
			$CurrentToken = $this->Token; // Save to global variable

		//}
	}

	//
	// Page class constructor
	//

	public function __construct()
	{
		global $Conn, $Language, $COMPOSITE_KEY_SEPARATOR;
		global $UserTable, $UserTableConn;

		// Initialize
		$GLOBALS["Page"] = &$this;
		$this->TokenTimeout = SessionTimeoutTime();

		// Language object
		if (!isset($Language))
			$Language = new Language();

		// Parent constuctor
		parent::__construct();

		// Table object (geth_cmd)
		if (!isset($GLOBALS["geth_cmd"]) || get_class($GLOBALS["geth_cmd"]) == PROJECT_NAMESPACE . "geth_cmd") {
			$GLOBALS["geth_cmd"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["geth_cmd"];
		}

		// Table object (esbc_user)
		if (!isset($GLOBALS['esbc_user'])) $GLOBALS['esbc_user'] = new esbc_user();

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'edit');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'geth_cmd');

		// Start timer
		if (!isset($GLOBALS["DebugTimer"]))
			$GLOBALS["DebugTimer"] = new Timer();

		// Debug message
		LoadDebugMessage();

		// Open connection
		if (!isset($Conn))
			$Conn = GetConnection($this->Dbid);

		// User table object (esbc_user)
		if (!isset($UserTable)) {
			$UserTable = new esbc_user();
			$UserTableConn = Conn($UserTable->Dbid);
		}
	}

	//
	// Terminate page
	//

	public function terminate($url = "")
	{
		global $ExportFileName, $TempImages;

		// Page Unload event
		$this->Page_Unload();

		// Global Page Unloaded event (in userfn*.php)
		Page_Unloaded();

		// Export
		global $EXPORT, $geth_cmd;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($geth_cmd);
				$doc->Text = @$content;
				if ($this->isExport("email"))
					echo $this->exportEmail($doc->Text);
				else
					$doc->export();
				DeleteTempImages(); // Delete temp images
				exit();
			}
		}
		if (!IsApi())
			$this->Page_Redirecting($url);

		// Close connection
		CloseConnections();

		// Return for API
		if (IsApi()) {
			$res = $url === TRUE;
			if (!$res) // Show error
				WriteJson(array_merge(["success" => FALSE], $this->getMessageAsArray()));
			exit();
		}

		// Go to URL if specified
		if ($url <> "") {
			if (!DEBUG_ENABLED && ob_get_length())
				ob_end_clean();

			// Handle modal response
			if ($this->IsModal) { // Show as modal
				$row = array("url" => $url, "modal" => "1");
				$pageName = GetPageName($url);
				if ($pageName != $this->getListUrl()) { // Not List page
					$row["caption"] = $this->getModalCaption($pageName);
					if ($pageName == "geth_cmdview.php")
						$row["view"] = "1";
				} else { // List page should not be shown as modal => error
					$row["error"] = $this->getFailureMessage();
					$this->clearFailureMessage();
				}
				WriteJson([$row]);
			} else {
				SaveDebugMessage();
				AddHeader("Location", $url);
			}
		}
		exit();
	}

	// Get records from recordset
	protected function getRecordsFromRecordset($rs, $current = FALSE)
	{
		$rows = array();
		if (is_object($rs)) { // Recordset
			while ($rs && !$rs->EOF) {
				$this->loadRowValues($rs); // Set up DbValue/CurrentValue
				$row = $this->getRecordFromArray($rs->fields);
				if ($current)
					return $row;
				else
					$rows[] = $row;
				$rs->moveNext();
			}
		} elseif (is_array($rs)) {
			foreach ($rs as $ar) {
				$row = $this->getRecordFromArray($ar);
				if ($current)
					return $row;
				else
					$rows[] = $row;
			}
		}
		return $rows;
	}

	// Get record from array
	protected function getRecordFromArray($ar)
	{
		$row = array();
		if (is_array($ar)) {
			foreach ($ar as $fldname => $val) {
				if (array_key_exists($fldname, $this->fields) && ($this->fields[$fldname]->Visible || $this->fields[$fldname]->IsPrimaryKey)) { // Primary key or Visible
					$fld = &$this->fields[$fldname];
					if ($fld->HtmlTag == "FILE") { // Upload field
						if (EmptyValue($val)) {
							$row[$fldname] = NULL;
						} else {
							if ($fld->DataType == DATATYPE_BLOB) {

								//$url = FullUrl($fld->TableVar . "/" . API_FILE_ACTION . "/" . $fld->Param . "/" . rawurlencode($this->getRecordKeyValue($ar))); // URL rewrite format
								$url = FullUrl(GetPageName(API_URL) . "?" . API_OBJECT_NAME . "=" . $fld->TableVar . "&" . API_ACTION_NAME . "=" . API_FILE_ACTION . "&" . API_FIELD_NAME . "=" . $fld->Param . "&" . API_KEY_NAME . "=" . rawurlencode($this->getRecordKeyValue($ar))); // Query string format
								$row[$fldname] = ["mimeType" => ContentType(substr($val, 0, 11)), "url" => $url];
							} elseif (!$fld->UploadMultiple || !ContainsString($val, MULTIPLE_UPLOAD_SEPARATOR)) { // Single file
								$row[$fldname] = ["mimeType" => ContentType("", $val), "url" => FullUrl($fld->hrefPath() . $val)];
							} else { // Multiple files
								$files = explode(MULTIPLE_UPLOAD_SEPARATOR, $val);
								$ar = [];
								foreach ($files as $file) {
									if (!EmptyValue($file))
										$ar[] = ["type" => ContentType("", $val), "url" => FullUrl($fld->hrefPath() . $file)];
								}
								$row[$fldname] = $ar;
							}
						}
					} else {
						$row[$fldname] = $val;
					}
				}
			}
		}
		return $row;
	}

	// Get record key value from array
	protected function getRecordKeyValue($ar)
	{
		global $COMPOSITE_KEY_SEPARATOR;
		$key = "";
		if (is_array($ar)) {
			$key .= @$ar['Rindex'];
		}
		return $key;
	}

	/**
	 * Hide fields for add/edit
	 *
	 * @return void
	 */
	protected function hideFieldsForAddEdit()
	{
		if ($this->isAdd() || $this->isCopy() || $this->isGridAdd())
			$this->Rindex->Visible = FALSE;
	}
	public $FormClassName = "ew-horizontal ew-form ew-edit-form";
	public $IsModal = FALSE;
	public $IsMobileOrModal = FALSE;
	public $DbMasterFilter;
	public $DbDetailFilter;

	//
	// Page run
	//

	public function run()
	{
		global $ExportType, $CustomExportType, $ExportFileName, $UserProfile, $Language, $Security, $RequestSecurity, $CurrentForm,
			$FormError, $SkipHeaderFooter;

		// Init Session data for API request if token found
		if (IsApi() && session_status() !== PHP_SESSION_ACTIVE) {
			$func = PROJECT_NAMESPACE . "CheckToken";
			if (is_callable($func) && Param(TOKEN_NAME) !== NULL && $func(Param(TOKEN_NAME), SessionTimeoutTime()))
				session_start();
		}

		// Is modal
		$this->IsModal = (Param("modal") == "1");

		// User profile
		$UserProfile = new UserProfile();

		// Security
		$Security = new AdvancedSecurity();
		$validRequest = FALSE;

		// Check security for API request
		If (IsApi()) {

			// Check token first
			$func = PROJECT_NAMESPACE . "CheckToken";
			if (is_callable($func) && Post(TOKEN_NAME) !== NULL)
				$validRequest = $func(Post(TOKEN_NAME), SessionTimeoutTime());
			elseif (is_array($RequestSecurity) && @$RequestSecurity["username"] <> "") // Login user for API request
				$Security->loginUser(@$RequestSecurity["username"], @$RequestSecurity["userid"], @$RequestSecurity["parentuserid"], @$RequestSecurity["userlevelid"]);
		}
		if (!$validRequest) {
			if (!$Security->isLoggedIn()) $Security->autoLogin();
			if ($Security->isLoggedIn()) $Security->TablePermission_Loading();
			$Security->loadCurrentUserLevel($this->ProjectID . $this->TableName);
			if ($Security->isLoggedIn()) $Security->TablePermission_Loaded();
			if (!$Security->canEdit()) {
				$Security->saveLastUrl();
				$this->setFailureMessage(DeniedMessage()); // Set no permission
				if ($Security->canList())
					$this->terminate(GetUrl("geth_cmdlist.php"));
				else
					$this->terminate(GetUrl("login.php"));
			}
			if ($Security->isLoggedIn()) {
				$Security->UserID_Loading();
				$Security->loadUserID();
				$Security->UserID_Loaded();
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->Rindex->setVisibility();
		$this->HOST_INDEX->setVisibility();
		$this->HUB_INDEX->setVisibility();
		$this->NODE_INDEX->setVisibility();
		$this->GETH_PAR_INDEX->setVisibility();
		$this->host_type->setVisibility();
		$this->geth_path->setVisibility();
		$this->node_root->setVisibility();
		$this->node_acc40->setVisibility();
		$this->node_port->setVisibility();
		$this->hostip->setVisibility();
		$this->node_rpcport->setVisibility();
		$this->bootnode_enode->setVisibility();
		$this->bootnode_ip->setVisibility();
		$this->bootnode_port->setVisibility();
		$this->date_add->setVisibility();
		$this->hideFieldsForAddEdit();

		// Do not use lookup cache
		$this->setUseLookupCache(FALSE);

		// Global Page Loading event (in userfn*.php)
		Page_Loading();

		// Page Load event
		$this->Page_Load();

		// Check token
		if (!$this->validPost()) {
			Write($Language->Phrase("InvalidPostRequest"));
			$this->terminate();
		}

		// Create Token
		$this->createToken();

		// Set up lookup cache
		$this->setupLookupOptions($this->HOST_INDEX);
		$this->setupLookupOptions($this->HUB_INDEX);
		$this->setupLookupOptions($this->NODE_INDEX);
		$this->setupLookupOptions($this->GETH_PAR_INDEX);

		// Check modal
		if ($this->IsModal)
			$SkipHeaderFooter = TRUE;
		$this->IsMobileOrModal = IsMobile() || $this->IsModal;
		$this->FormClassName = "ew-form ew-edit-form ew-horizontal";
		$returnUrl = "";
		$loaded = FALSE;
		$postBack = FALSE;

		// Set up current action and primary key
		if (IsApi()) {
			$this->CurrentAction = "update"; // Update record directly
			$postBack = TRUE;
		} elseif (Post("action") !== NULL) {
			$this->CurrentAction = Post("action"); // Get action code
			if (!$this->isShow()) // Not reload record, handle as postback
				$postBack = TRUE;

			// Load key from Form
			if ($CurrentForm->hasValue("x_Rindex")) {
				$this->Rindex->setFormValue($CurrentForm->getValue("x_Rindex"));
			}
		} else {
			$this->CurrentAction = "show"; // Default action is display

			// Load key from QueryString
			$loadByQuery = FALSE;
			if (Get("Rindex") !== NULL) {
				$this->Rindex->setQueryStringValue(Get("Rindex"));
				$loadByQuery = TRUE;
			} else {
				$this->Rindex->CurrentValue = NULL;
			}
		}

		// Load current record
		$loaded = $this->loadRow();

		// Process form if post back
		if ($postBack) {
			$this->loadFormValues(); // Get form values
		}

		// Validate form if post back
		if ($postBack) {
			if (!$this->validateForm()) {
				$this->setFailureMessage($FormError);
				$this->EventCancelled = TRUE; // Event cancelled
				$this->restoreFormValues();
				if (IsApi())
					$this->terminate();
				else
					$this->CurrentAction = ""; // Form error, reset action
			}
		}

		// Perform current action
		switch ($this->CurrentAction) {
			case "show": // Get a record to display
				if (!$loaded) { // Load record based on key
					if ($this->getFailureMessage() == "")
						$this->setFailureMessage($Language->Phrase("NoRecord")); // No record found
					$this->terminate("geth_cmdlist.php"); // No matching record, return to list
				}
				break;
			case "update": // Update
				$returnUrl = $this->getReturnUrl();
				if (GetPageName($returnUrl) == "geth_cmdlist.php")
					$returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
				$this->SendEmail = TRUE; // Send email on update success
				if ($this->editRow()) { // Update record based on key
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->Phrase("UpdateSuccess")); // Update success
					if (IsApi())
						$this->terminate(TRUE);
					else
						$this->terminate($returnUrl); // Return to caller
				} elseif (IsApi()) { // API request, return
					$this->terminate();
				} elseif ($this->getFailureMessage() == $Language->Phrase("NoRecord")) {
					$this->terminate($returnUrl); // Return to caller
				} else {
					$this->EventCancelled = TRUE; // Event cancelled
					$this->restoreFormValues(); // Restore form values if update failed
				}
		}

		// Set up Breadcrumb
		$this->setupBreadcrumb();

		// Render the record
		$this->RowType = ROWTYPE_EDIT; // Render as Edit
		$this->resetAttributes();
		$this->renderRow();
	}

	// Set up starting record parameters
	public function setupStartRec()
	{
		if ($this->DisplayRecs == 0)
			return;
		if ($this->isPageRequest()) { // Validate request
			if (Get(TABLE_START_REC) !== NULL) { // Check for "start" parameter
				$this->StartRec = Get(TABLE_START_REC);
				$this->setStartRecordNumber($this->StartRec);
			} elseif (Get(TABLE_PAGE_NO) !== NULL) {
				$pageNo = Get(TABLE_PAGE_NO);
				if (is_numeric($pageNo)) {
					$this->StartRec = ($pageNo - 1) * $this->DisplayRecs + 1;
					if ($this->StartRec <= 0) {
						$this->StartRec = 1;
					} elseif ($this->StartRec >= (int)(($this->TotalRecs - 1)/$this->DisplayRecs) * $this->DisplayRecs + 1) {
						$this->StartRec = (int)(($this->TotalRecs - 1)/$this->DisplayRecs) * $this->DisplayRecs + 1;
					}
					$this->setStartRecordNumber($this->StartRec);
				}
			}
		}
		$this->StartRec = $this->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->StartRec) || $this->StartRec == "") { // Avoid invalid start record counter
			$this->StartRec = 1; // Reset start record counter
			$this->setStartRecordNumber($this->StartRec);
		} elseif ($this->StartRec > $this->TotalRecs) { // Avoid starting record > total records
			$this->StartRec = (int)(($this->TotalRecs - 1)/$this->DisplayRecs) * $this->DisplayRecs + 1; // Point to last page first record
			$this->setStartRecordNumber($this->StartRec);
		} elseif (($this->StartRec - 1) % $this->DisplayRecs <> 0) {
			$this->StartRec = (int)(($this->StartRec - 1)/$this->DisplayRecs) * $this->DisplayRecs + 1; // Point to page boundary
			$this->setStartRecordNumber($this->StartRec);
		}
	}

	// Get upload files
	protected function getUploadFiles()
	{
		global $CurrentForm, $Language;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;

		// Check field name 'Rindex' first before field var 'x_Rindex'
		$val = $CurrentForm->hasValue("Rindex") ? $CurrentForm->getValue("Rindex") : $CurrentForm->getValue("x_Rindex");
		if (!$this->Rindex->IsDetailKey)
			$this->Rindex->setFormValue($val);

		// Check field name 'HOST_INDEX' first before field var 'x_HOST_INDEX'
		$val = $CurrentForm->hasValue("HOST_INDEX") ? $CurrentForm->getValue("HOST_INDEX") : $CurrentForm->getValue("x_HOST_INDEX");
		if (!$this->HOST_INDEX->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->HOST_INDEX->Visible = FALSE; // Disable update for API request
			else
				$this->HOST_INDEX->setFormValue($val);
		}

		// Check field name 'HUB_INDEX' first before field var 'x_HUB_INDEX'
		$val = $CurrentForm->hasValue("HUB_INDEX") ? $CurrentForm->getValue("HUB_INDEX") : $CurrentForm->getValue("x_HUB_INDEX");
		if (!$this->HUB_INDEX->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->HUB_INDEX->Visible = FALSE; // Disable update for API request
			else
				$this->HUB_INDEX->setFormValue($val);
		}

		// Check field name 'NODE_INDEX' first before field var 'x_NODE_INDEX'
		$val = $CurrentForm->hasValue("NODE_INDEX") ? $CurrentForm->getValue("NODE_INDEX") : $CurrentForm->getValue("x_NODE_INDEX");
		if (!$this->NODE_INDEX->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->NODE_INDEX->Visible = FALSE; // Disable update for API request
			else
				$this->NODE_INDEX->setFormValue($val);
		}

		// Check field name 'GETH_PAR_INDEX' first before field var 'x_GETH_PAR_INDEX'
		$val = $CurrentForm->hasValue("GETH_PAR_INDEX") ? $CurrentForm->getValue("GETH_PAR_INDEX") : $CurrentForm->getValue("x_GETH_PAR_INDEX");
		if (!$this->GETH_PAR_INDEX->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->GETH_PAR_INDEX->Visible = FALSE; // Disable update for API request
			else
				$this->GETH_PAR_INDEX->setFormValue($val);
		}

		// Check field name 'host_type' first before field var 'x_host_type'
		$val = $CurrentForm->hasValue("host_type") ? $CurrentForm->getValue("host_type") : $CurrentForm->getValue("x_host_type");
		if (!$this->host_type->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->host_type->Visible = FALSE; // Disable update for API request
			else
				$this->host_type->setFormValue($val);
		}

		// Check field name 'geth_path' first before field var 'x_geth_path'
		$val = $CurrentForm->hasValue("geth_path") ? $CurrentForm->getValue("geth_path") : $CurrentForm->getValue("x_geth_path");
		if (!$this->geth_path->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->geth_path->Visible = FALSE; // Disable update for API request
			else
				$this->geth_path->setFormValue($val);
		}

		// Check field name 'node_root' first before field var 'x_node_root'
		$val = $CurrentForm->hasValue("node_root") ? $CurrentForm->getValue("node_root") : $CurrentForm->getValue("x_node_root");
		if (!$this->node_root->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->node_root->Visible = FALSE; // Disable update for API request
			else
				$this->node_root->setFormValue($val);
		}

		// Check field name 'node_acc40' first before field var 'x_node_acc40'
		$val = $CurrentForm->hasValue("node_acc40") ? $CurrentForm->getValue("node_acc40") : $CurrentForm->getValue("x_node_acc40");
		if (!$this->node_acc40->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->node_acc40->Visible = FALSE; // Disable update for API request
			else
				$this->node_acc40->setFormValue($val);
		}

		// Check field name 'node_port' first before field var 'x_node_port'
		$val = $CurrentForm->hasValue("node_port") ? $CurrentForm->getValue("node_port") : $CurrentForm->getValue("x_node_port");
		if (!$this->node_port->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->node_port->Visible = FALSE; // Disable update for API request
			else
				$this->node_port->setFormValue($val);
		}

		// Check field name 'hostip' first before field var 'x_hostip'
		$val = $CurrentForm->hasValue("hostip") ? $CurrentForm->getValue("hostip") : $CurrentForm->getValue("x_hostip");
		if (!$this->hostip->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->hostip->Visible = FALSE; // Disable update for API request
			else
				$this->hostip->setFormValue($val);
		}

		// Check field name 'node_rpcport' first before field var 'x_node_rpcport'
		$val = $CurrentForm->hasValue("node_rpcport") ? $CurrentForm->getValue("node_rpcport") : $CurrentForm->getValue("x_node_rpcport");
		if (!$this->node_rpcport->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->node_rpcport->Visible = FALSE; // Disable update for API request
			else
				$this->node_rpcport->setFormValue($val);
		}

		// Check field name 'bootnode_enode' first before field var 'x_bootnode_enode'
		$val = $CurrentForm->hasValue("bootnode_enode") ? $CurrentForm->getValue("bootnode_enode") : $CurrentForm->getValue("x_bootnode_enode");
		if (!$this->bootnode_enode->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->bootnode_enode->Visible = FALSE; // Disable update for API request
			else
				$this->bootnode_enode->setFormValue($val);
		}

		// Check field name 'bootnode_ip' first before field var 'x_bootnode_ip'
		$val = $CurrentForm->hasValue("bootnode_ip") ? $CurrentForm->getValue("bootnode_ip") : $CurrentForm->getValue("x_bootnode_ip");
		if (!$this->bootnode_ip->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->bootnode_ip->Visible = FALSE; // Disable update for API request
			else
				$this->bootnode_ip->setFormValue($val);
		}

		// Check field name 'bootnode_port' first before field var 'x_bootnode_port'
		$val = $CurrentForm->hasValue("bootnode_port") ? $CurrentForm->getValue("bootnode_port") : $CurrentForm->getValue("x_bootnode_port");
		if (!$this->bootnode_port->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->bootnode_port->Visible = FALSE; // Disable update for API request
			else
				$this->bootnode_port->setFormValue($val);
		}

		// Check field name 'date_add' first before field var 'x_date_add'
		$val = $CurrentForm->hasValue("date_add") ? $CurrentForm->getValue("date_add") : $CurrentForm->getValue("x_date_add");
		if (!$this->date_add->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->date_add->Visible = FALSE; // Disable update for API request
			else
				$this->date_add->setFormValue($val);
			$this->date_add->CurrentValue = UnFormatDateTime($this->date_add->CurrentValue, 0);
		}
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->Rindex->CurrentValue = $this->Rindex->FormValue;
		$this->HOST_INDEX->CurrentValue = $this->HOST_INDEX->FormValue;
		$this->HUB_INDEX->CurrentValue = $this->HUB_INDEX->FormValue;
		$this->NODE_INDEX->CurrentValue = $this->NODE_INDEX->FormValue;
		$this->GETH_PAR_INDEX->CurrentValue = $this->GETH_PAR_INDEX->FormValue;
		$this->host_type->CurrentValue = $this->host_type->FormValue;
		$this->geth_path->CurrentValue = $this->geth_path->FormValue;
		$this->node_root->CurrentValue = $this->node_root->FormValue;
		$this->node_acc40->CurrentValue = $this->node_acc40->FormValue;
		$this->node_port->CurrentValue = $this->node_port->FormValue;
		$this->hostip->CurrentValue = $this->hostip->FormValue;
		$this->node_rpcport->CurrentValue = $this->node_rpcport->FormValue;
		$this->bootnode_enode->CurrentValue = $this->bootnode_enode->FormValue;
		$this->bootnode_ip->CurrentValue = $this->bootnode_ip->FormValue;
		$this->bootnode_port->CurrentValue = $this->bootnode_port->FormValue;
		$this->date_add->CurrentValue = $this->date_add->FormValue;
		$this->date_add->CurrentValue = UnFormatDateTime($this->date_add->CurrentValue, 0);
	}

	// Load row based on key values
	public function loadRow()
	{
		global $Security, $Language;
		$filter = $this->getRecordFilter();

		// Call Row Selecting event
		$this->Row_Selecting($filter);

		// Load SQL based on filter
		$this->CurrentFilter = $filter;
		$sql = $this->getCurrentSql();
		$conn = &$this->getConnection();
		$res = FALSE;
		$rs = LoadRecordset($sql, $conn);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->loadRowValues($rs); // Load row values
			$rs->close();
		}
		return $res;
	}

	// Load row values from recordset
	public function loadRowValues($rs = NULL)
	{
		if ($rs && !$rs->EOF)
			$row = $rs->fields;
		else
			$row = $this->newRow();

		// Call Row Selected event
		$this->Row_Selected($row);
		if (!$rs || $rs->EOF)
			return;
		$this->Rindex->setDbValue($row['Rindex']);
		$this->HOST_INDEX->setDbValue($row['HOST_INDEX']);
		$this->HUB_INDEX->setDbValue($row['HUB_INDEX']);
		$this->NODE_INDEX->setDbValue($row['NODE_INDEX']);
		$this->GETH_PAR_INDEX->setDbValue($row['GETH_PAR_INDEX']);
		$this->host_type->setDbValue($row['host_type']);
		$this->geth_path->setDbValue($row['geth_path']);
		$this->node_root->setDbValue($row['node_root']);
		$this->node_acc40->setDbValue($row['node_acc40']);
		$this->node_port->setDbValue($row['node_port']);
		$this->hostip->setDbValue($row['hostip']);
		$this->node_rpcport->setDbValue($row['node_rpcport']);
		$this->bootnode_enode->setDbValue($row['bootnode_enode']);
		$this->bootnode_ip->setDbValue($row['bootnode_ip']);
		$this->bootnode_port->setDbValue($row['bootnode_port']);
		$this->date_add->setDbValue($row['date_add']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['Rindex'] = NULL;
		$row['HOST_INDEX'] = NULL;
		$row['HUB_INDEX'] = NULL;
		$row['NODE_INDEX'] = NULL;
		$row['GETH_PAR_INDEX'] = NULL;
		$row['host_type'] = NULL;
		$row['geth_path'] = NULL;
		$row['node_root'] = NULL;
		$row['node_acc40'] = NULL;
		$row['node_port'] = NULL;
		$row['hostip'] = NULL;
		$row['node_rpcport'] = NULL;
		$row['bootnode_enode'] = NULL;
		$row['bootnode_ip'] = NULL;
		$row['bootnode_port'] = NULL;
		$row['date_add'] = NULL;
		return $row;
	}

	// Load old record
	protected function loadOldRecord()
	{

		// Load key values from Session
		$validKey = TRUE;
		if (strval($this->getKey("Rindex")) <> "")
			$this->Rindex->CurrentValue = $this->getKey("Rindex"); // Rindex
		else
			$validKey = FALSE;

		// Load old record
		$this->OldRecordset = NULL;
		if ($validKey) {
			$this->CurrentFilter = $this->getRecordFilter();
			$sql = $this->getCurrentSql();
			$conn = &$this->getConnection();
			$this->OldRecordset = LoadRecordset($sql, $conn);
		}
		$this->loadRowValues($this->OldRecordset); // Load row values
		return $validKey;
	}

	// Render row values based on field settings
	public function renderRow()
	{
		global $Security, $Language, $CurrentLanguage;

		// Initialize URLs
		// Call Row_Rendering event

		$this->Row_Rendering();

		// Common render codes for all row types
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

		if ($this->RowType == ROWTYPE_VIEW) { // View row

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
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

			// Rindex
			$this->Rindex->EditAttrs["class"] = "form-control";
			$this->Rindex->EditCustomAttributes = "";
			$this->Rindex->EditValue = $this->Rindex->CurrentValue;
			$this->Rindex->ViewCustomAttributes = "";

			// HOST_INDEX
			$this->HOST_INDEX->EditAttrs["class"] = "form-control";
			$this->HOST_INDEX->EditCustomAttributes = "";
			$curVal = trim(strval($this->HOST_INDEX->CurrentValue));
			if ($curVal <> "")
				$this->HOST_INDEX->ViewValue = $this->HOST_INDEX->lookupCacheOption($curVal);
			else
				$this->HOST_INDEX->ViewValue = $this->HOST_INDEX->Lookup !== NULL && is_array($this->HOST_INDEX->Lookup->Options) ? $curVal : NULL;
			if ($this->HOST_INDEX->ViewValue !== NULL) { // Load from cache
				$this->HOST_INDEX->EditValue = array_values($this->HOST_INDEX->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`HOST_INDEX`" . SearchString("=", $this->HOST_INDEX->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->HOST_INDEX->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$rowcnt = count($arwrk);
				for ($i = 0; $i < $rowcnt; $i++) {
					$arwrk[$i][2] = FormatNumber($arwrk[$i][2], 0, -2, -2, -2);
				}
				$this->HOST_INDEX->EditValue = $arwrk;
			}

			// HUB_INDEX
			$this->HUB_INDEX->EditAttrs["class"] = "form-control";
			$this->HUB_INDEX->EditCustomAttributes = "";
			$curVal = trim(strval($this->HUB_INDEX->CurrentValue));
			if ($curVal <> "")
				$this->HUB_INDEX->ViewValue = $this->HUB_INDEX->lookupCacheOption($curVal);
			else
				$this->HUB_INDEX->ViewValue = $this->HUB_INDEX->Lookup !== NULL && is_array($this->HUB_INDEX->Lookup->Options) ? $curVal : NULL;
			if ($this->HUB_INDEX->ViewValue !== NULL) { // Load from cache
				$this->HUB_INDEX->EditValue = array_values($this->HUB_INDEX->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`HUB_INDEX`" . SearchString("=", $this->HUB_INDEX->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->HUB_INDEX->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->HUB_INDEX->EditValue = $arwrk;
			}

			// NODE_INDEX
			$this->NODE_INDEX->EditAttrs["class"] = "form-control";
			$this->NODE_INDEX->EditCustomAttributes = "";
			$curVal = trim(strval($this->NODE_INDEX->CurrentValue));
			if ($curVal <> "")
				$this->NODE_INDEX->ViewValue = $this->NODE_INDEX->lookupCacheOption($curVal);
			else
				$this->NODE_INDEX->ViewValue = $this->NODE_INDEX->Lookup !== NULL && is_array($this->NODE_INDEX->Lookup->Options) ? $curVal : NULL;
			if ($this->NODE_INDEX->ViewValue !== NULL) { // Load from cache
				$this->NODE_INDEX->EditValue = array_values($this->NODE_INDEX->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`NODE_INDEX`" . SearchString("=", $this->NODE_INDEX->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->NODE_INDEX->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->NODE_INDEX->EditValue = $arwrk;
			}

			// GETH_PAR_INDEX
			$this->GETH_PAR_INDEX->EditAttrs["class"] = "form-control";
			$this->GETH_PAR_INDEX->EditCustomAttributes = "";
			$curVal = trim(strval($this->GETH_PAR_INDEX->CurrentValue));
			if ($curVal <> "")
				$this->GETH_PAR_INDEX->ViewValue = $this->GETH_PAR_INDEX->lookupCacheOption($curVal);
			else
				$this->GETH_PAR_INDEX->ViewValue = $this->GETH_PAR_INDEX->Lookup !== NULL && is_array($this->GETH_PAR_INDEX->Lookup->Options) ? $curVal : NULL;
			if ($this->GETH_PAR_INDEX->ViewValue !== NULL) { // Load from cache
				$this->GETH_PAR_INDEX->EditValue = array_values($this->GETH_PAR_INDEX->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`GETH_INDEX`" . SearchString("=", $this->GETH_PAR_INDEX->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->GETH_PAR_INDEX->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->GETH_PAR_INDEX->EditValue = $arwrk;
			}

			// host_type
			$this->host_type->EditAttrs["class"] = "form-control";
			$this->host_type->EditCustomAttributes = "";
			$this->host_type->EditValue = HtmlEncode($this->host_type->CurrentValue);
			$this->host_type->PlaceHolder = RemoveHtml($this->host_type->caption());

			// geth_path
			$this->geth_path->EditAttrs["class"] = "form-control";
			$this->geth_path->EditCustomAttributes = "";
			$this->geth_path->EditValue = HtmlEncode($this->geth_path->CurrentValue);
			$this->geth_path->PlaceHolder = RemoveHtml($this->geth_path->caption());

			// node_root
			$this->node_root->EditAttrs["class"] = "form-control";
			$this->node_root->EditCustomAttributes = "";
			$this->node_root->EditValue = HtmlEncode($this->node_root->CurrentValue);
			$this->node_root->PlaceHolder = RemoveHtml($this->node_root->caption());

			// node_acc40
			$this->node_acc40->EditAttrs["class"] = "form-control";
			$this->node_acc40->EditCustomAttributes = "";
			$this->node_acc40->EditValue = HtmlEncode($this->node_acc40->CurrentValue);
			$this->node_acc40->PlaceHolder = RemoveHtml($this->node_acc40->caption());

			// node_port
			$this->node_port->EditAttrs["class"] = "form-control";
			$this->node_port->EditCustomAttributes = "";
			$this->node_port->EditValue = HtmlEncode($this->node_port->CurrentValue);
			$this->node_port->PlaceHolder = RemoveHtml($this->node_port->caption());

			// hostip
			$this->hostip->EditAttrs["class"] = "form-control";
			$this->hostip->EditCustomAttributes = "";
			$this->hostip->EditValue = HtmlEncode($this->hostip->CurrentValue);
			$this->hostip->PlaceHolder = RemoveHtml($this->hostip->caption());

			// node_rpcport
			$this->node_rpcport->EditAttrs["class"] = "form-control";
			$this->node_rpcport->EditCustomAttributes = "";
			$this->node_rpcport->EditValue = HtmlEncode($this->node_rpcport->CurrentValue);
			$this->node_rpcport->PlaceHolder = RemoveHtml($this->node_rpcport->caption());

			// bootnode_enode
			$this->bootnode_enode->EditAttrs["class"] = "form-control";
			$this->bootnode_enode->EditCustomAttributes = "";
			$this->bootnode_enode->EditValue = HtmlEncode($this->bootnode_enode->CurrentValue);
			$this->bootnode_enode->PlaceHolder = RemoveHtml($this->bootnode_enode->caption());

			// bootnode_ip
			$this->bootnode_ip->EditAttrs["class"] = "form-control";
			$this->bootnode_ip->EditCustomAttributes = "";
			$this->bootnode_ip->EditValue = HtmlEncode($this->bootnode_ip->CurrentValue);
			$this->bootnode_ip->PlaceHolder = RemoveHtml($this->bootnode_ip->caption());

			// bootnode_port
			$this->bootnode_port->EditAttrs["class"] = "form-control";
			$this->bootnode_port->EditCustomAttributes = "";
			$this->bootnode_port->EditValue = HtmlEncode($this->bootnode_port->CurrentValue);
			$this->bootnode_port->PlaceHolder = RemoveHtml($this->bootnode_port->caption());

			// date_add
			$this->date_add->EditAttrs["class"] = "form-control";
			$this->date_add->EditCustomAttributes = "";
			$this->date_add->EditValue = HtmlEncode(FormatDateTime($this->date_add->CurrentValue, 8));
			$this->date_add->PlaceHolder = RemoveHtml($this->date_add->caption());

			// Edit refer script
			// Rindex

			$this->Rindex->LinkCustomAttributes = "";
			$this->Rindex->HrefValue = "";

			// HOST_INDEX
			$this->HOST_INDEX->LinkCustomAttributes = "";
			$this->HOST_INDEX->HrefValue = "";

			// HUB_INDEX
			$this->HUB_INDEX->LinkCustomAttributes = "";
			$this->HUB_INDEX->HrefValue = "";

			// NODE_INDEX
			$this->NODE_INDEX->LinkCustomAttributes = "";
			$this->NODE_INDEX->HrefValue = "";

			// GETH_PAR_INDEX
			$this->GETH_PAR_INDEX->LinkCustomAttributes = "";
			$this->GETH_PAR_INDEX->HrefValue = "";

			// host_type
			$this->host_type->LinkCustomAttributes = "";
			$this->host_type->HrefValue = "";

			// geth_path
			$this->geth_path->LinkCustomAttributes = "";
			$this->geth_path->HrefValue = "";

			// node_root
			$this->node_root->LinkCustomAttributes = "";
			$this->node_root->HrefValue = "";

			// node_acc40
			$this->node_acc40->LinkCustomAttributes = "";
			$this->node_acc40->HrefValue = "";

			// node_port
			$this->node_port->LinkCustomAttributes = "";
			$this->node_port->HrefValue = "";

			// hostip
			$this->hostip->LinkCustomAttributes = "";
			$this->hostip->HrefValue = "";

			// node_rpcport
			$this->node_rpcport->LinkCustomAttributes = "";
			$this->node_rpcport->HrefValue = "";

			// bootnode_enode
			$this->bootnode_enode->LinkCustomAttributes = "";
			$this->bootnode_enode->HrefValue = "";

			// bootnode_ip
			$this->bootnode_ip->LinkCustomAttributes = "";
			$this->bootnode_ip->HrefValue = "";

			// bootnode_port
			$this->bootnode_port->LinkCustomAttributes = "";
			$this->bootnode_port->HrefValue = "";

			// date_add
			$this->date_add->LinkCustomAttributes = "";
			$this->date_add->HrefValue = "";
		}
		if ($this->RowType == ROWTYPE_ADD || $this->RowType == ROWTYPE_EDIT || $this->RowType == ROWTYPE_SEARCH) // Add/Edit/Search row
			$this->setupFieldTitles();

		// Call Row Rendered event
		if ($this->RowType <> ROWTYPE_AGGREGATEINIT)
			$this->Row_Rendered();
	}

	// Validate form
	protected function validateForm()
	{
		global $Language, $FormError;

		// Initialize form error message
		$FormError = "";

		// Check if validation required
		if (!SERVER_VALIDATE)
			return ($FormError == "");
		if ($this->Rindex->Required) {
			if (!$this->Rindex->IsDetailKey && $this->Rindex->FormValue != NULL && $this->Rindex->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Rindex->caption(), $this->Rindex->RequiredErrorMessage));
			}
		}
		if ($this->HOST_INDEX->Required) {
			if (!$this->HOST_INDEX->IsDetailKey && $this->HOST_INDEX->FormValue != NULL && $this->HOST_INDEX->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->HOST_INDEX->caption(), $this->HOST_INDEX->RequiredErrorMessage));
			}
		}
		if ($this->HUB_INDEX->Required) {
			if (!$this->HUB_INDEX->IsDetailKey && $this->HUB_INDEX->FormValue != NULL && $this->HUB_INDEX->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->HUB_INDEX->caption(), $this->HUB_INDEX->RequiredErrorMessage));
			}
		}
		if ($this->NODE_INDEX->Required) {
			if (!$this->NODE_INDEX->IsDetailKey && $this->NODE_INDEX->FormValue != NULL && $this->NODE_INDEX->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->NODE_INDEX->caption(), $this->NODE_INDEX->RequiredErrorMessage));
			}
		}
		if ($this->GETH_PAR_INDEX->Required) {
			if (!$this->GETH_PAR_INDEX->IsDetailKey && $this->GETH_PAR_INDEX->FormValue != NULL && $this->GETH_PAR_INDEX->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->GETH_PAR_INDEX->caption(), $this->GETH_PAR_INDEX->RequiredErrorMessage));
			}
		}
		if ($this->host_type->Required) {
			if (!$this->host_type->IsDetailKey && $this->host_type->FormValue != NULL && $this->host_type->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->host_type->caption(), $this->host_type->RequiredErrorMessage));
			}
		}
		if ($this->geth_path->Required) {
			if (!$this->geth_path->IsDetailKey && $this->geth_path->FormValue != NULL && $this->geth_path->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->geth_path->caption(), $this->geth_path->RequiredErrorMessage));
			}
		}
		if ($this->node_root->Required) {
			if (!$this->node_root->IsDetailKey && $this->node_root->FormValue != NULL && $this->node_root->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->node_root->caption(), $this->node_root->RequiredErrorMessage));
			}
		}
		if ($this->node_acc40->Required) {
			if (!$this->node_acc40->IsDetailKey && $this->node_acc40->FormValue != NULL && $this->node_acc40->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->node_acc40->caption(), $this->node_acc40->RequiredErrorMessage));
			}
		}
		if ($this->node_port->Required) {
			if (!$this->node_port->IsDetailKey && $this->node_port->FormValue != NULL && $this->node_port->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->node_port->caption(), $this->node_port->RequiredErrorMessage));
			}
		}
		if ($this->hostip->Required) {
			if (!$this->hostip->IsDetailKey && $this->hostip->FormValue != NULL && $this->hostip->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->hostip->caption(), $this->hostip->RequiredErrorMessage));
			}
		}
		if ($this->node_rpcport->Required) {
			if (!$this->node_rpcport->IsDetailKey && $this->node_rpcport->FormValue != NULL && $this->node_rpcport->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->node_rpcport->caption(), $this->node_rpcport->RequiredErrorMessage));
			}
		}
		if ($this->bootnode_enode->Required) {
			if (!$this->bootnode_enode->IsDetailKey && $this->bootnode_enode->FormValue != NULL && $this->bootnode_enode->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->bootnode_enode->caption(), $this->bootnode_enode->RequiredErrorMessage));
			}
		}
		if ($this->bootnode_ip->Required) {
			if (!$this->bootnode_ip->IsDetailKey && $this->bootnode_ip->FormValue != NULL && $this->bootnode_ip->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->bootnode_ip->caption(), $this->bootnode_ip->RequiredErrorMessage));
			}
		}
		if ($this->bootnode_port->Required) {
			if (!$this->bootnode_port->IsDetailKey && $this->bootnode_port->FormValue != NULL && $this->bootnode_port->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->bootnode_port->caption(), $this->bootnode_port->RequiredErrorMessage));
			}
		}
		if ($this->date_add->Required) {
			if (!$this->date_add->IsDetailKey && $this->date_add->FormValue != NULL && $this->date_add->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->date_add->caption(), $this->date_add->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->date_add->FormValue)) {
			AddMessage($FormError, $this->date_add->errorMessage());
		}

		// Return validate result
		$validateForm = ($FormError == "");

		// Call Form_CustomValidate event
		$formCustomError = "";
		$validateForm = $validateForm && $this->Form_CustomValidate($formCustomError);
		if ($formCustomError <> "") {
			AddMessage($FormError, $formCustomError);
		}
		return $validateForm;
	}

	// Update record based on key values
	protected function editRow()
	{
		global $Security, $Language;
		$filter = $this->getRecordFilter();
		$filter = $this->applyUserIDFilters($filter);
		$conn = &$this->getConnection();
		$this->CurrentFilter = $filter;
		$sql = $this->getCurrentSql();
		$conn->raiseErrorFn = $GLOBALS["ERROR_FUNC"];
		$rs = $conn->execute($sql);
		$conn->raiseErrorFn = '';
		if ($rs === FALSE)
			return FALSE;
		if ($rs->EOF) {
			$this->setFailureMessage($Language->Phrase("NoRecord")); // Set no record message
			$editRow = FALSE; // Update Failed
		} else {

			// Save old values
			$rsold = &$rs->fields;
			$this->loadDbValues($rsold);
			$rsnew = [];

			// HOST_INDEX
			$this->HOST_INDEX->setDbValueDef($rsnew, $this->HOST_INDEX->CurrentValue, 0, $this->HOST_INDEX->ReadOnly);

			// HUB_INDEX
			$this->HUB_INDEX->setDbValueDef($rsnew, $this->HUB_INDEX->CurrentValue, 0, $this->HUB_INDEX->ReadOnly);

			// NODE_INDEX
			$this->NODE_INDEX->setDbValueDef($rsnew, $this->NODE_INDEX->CurrentValue, 0, $this->NODE_INDEX->ReadOnly);

			// GETH_PAR_INDEX
			$this->GETH_PAR_INDEX->setDbValueDef($rsnew, $this->GETH_PAR_INDEX->CurrentValue, 0, $this->GETH_PAR_INDEX->ReadOnly);

			// host_type
			$this->host_type->setDbValueDef($rsnew, $this->host_type->CurrentValue, NULL, $this->host_type->ReadOnly);

			// geth_path
			$this->geth_path->setDbValueDef($rsnew, $this->geth_path->CurrentValue, "", $this->geth_path->ReadOnly);

			// node_root
			$this->node_root->setDbValueDef($rsnew, $this->node_root->CurrentValue, NULL, $this->node_root->ReadOnly);

			// node_acc40
			$this->node_acc40->setDbValueDef($rsnew, $this->node_acc40->CurrentValue, NULL, $this->node_acc40->ReadOnly);

			// node_port
			$this->node_port->setDbValueDef($rsnew, $this->node_port->CurrentValue, NULL, $this->node_port->ReadOnly);

			// hostip
			$this->hostip->setDbValueDef($rsnew, $this->hostip->CurrentValue, NULL, $this->hostip->ReadOnly);

			// node_rpcport
			$this->node_rpcport->setDbValueDef($rsnew, $this->node_rpcport->CurrentValue, NULL, $this->node_rpcport->ReadOnly);

			// bootnode_enode
			$this->bootnode_enode->setDbValueDef($rsnew, $this->bootnode_enode->CurrentValue, NULL, $this->bootnode_enode->ReadOnly);

			// bootnode_ip
			$this->bootnode_ip->setDbValueDef($rsnew, $this->bootnode_ip->CurrentValue, NULL, $this->bootnode_ip->ReadOnly);

			// bootnode_port
			$this->bootnode_port->setDbValueDef($rsnew, $this->bootnode_port->CurrentValue, NULL, $this->bootnode_port->ReadOnly);

			// date_add
			$this->date_add->setDbValueDef($rsnew, UnFormatDateTime($this->date_add->CurrentValue, 0), NULL, $this->date_add->ReadOnly);

			// Call Row Updating event
			$updateRow = $this->Row_Updating($rsold, $rsnew);
			if ($updateRow) {
				$conn->raiseErrorFn = $GLOBALS["ERROR_FUNC"];
				if (count($rsnew) > 0)
					$editRow = $this->update($rsnew, "", $rsold);
				else
					$editRow = TRUE; // No field to update
				$conn->raiseErrorFn = '';
				if ($editRow) {
				}
			} else {
				if ($this->getSuccessMessage() <> "" || $this->getFailureMessage() <> "") {

					// Use the message, do nothing
				} elseif ($this->CancelMessage <> "") {
					$this->setFailureMessage($this->CancelMessage);
					$this->CancelMessage = "";
				} else {
					$this->setFailureMessage($Language->Phrase("UpdateCancelled"));
				}
				$editRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($editRow)
			$this->Row_Updated($rsold, $rsnew);
		$rs->close();

		// Write JSON for API request
		if (IsApi() && $editRow) {
			$row = $this->getRecordsFromRecordset([$rsnew], TRUE);
			WriteJson(["success" => TRUE, $this->TableVar => $row]);
		}
		return $editRow;
	}

	// Set up Breadcrumb
	protected function setupBreadcrumb()
	{
		global $Breadcrumb, $Language;
		$Breadcrumb = new Breadcrumb();
		$url = substr(CurrentUrl(), strrpos(CurrentUrl(), "/")+1);
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("geth_cmdlist.php"), "", $this->TableVar, TRUE);
		$pageId = "edit";
		$Breadcrumb->add("edit", $pageId, $url);
	}

	// Setup lookup options
	public function setupLookupOptions($fld)
	{
		if ($fld->Lookup !== NULL && $fld->Lookup->Options === NULL) {

			// No need to check any more
			$fld->Lookup->Options = [];

			// Set up lookup SQL
			switch ($fld->FieldVar) {
				default:
					$lookupFilter = "";
					break;
			}

			// Always call to Lookup->getSql so that user can setup Lookup->Options in Lookup_Selecting server event
			$sql = $fld->Lookup->getSql(FALSE, "", $lookupFilter, $this);

			// Set up lookup cache
			if ($fld->UseLookupCache && $sql <> "" && count($fld->Lookup->Options) == 0) {
				$conn = &$this->getConnection();
				$totalCnt = $this->getRecordCount($sql);
				if ($totalCnt > $fld->LookupCacheCount) // Total count > cache count, do not cache
					return;
				$rs = $conn->execute($sql);
				$ar = [];
				while ($rs && !$rs->EOF) {
					$row = &$rs->fields;

					// Format the field values
					switch ($fld->FieldVar) {
						case "x_HOST_INDEX":
							$row[2] = FormatNumber($row[2], 0, -2, -2, -2);
							$row['df2'] = $row[2];
							break;
						case "x_HUB_INDEX":
							break;
						case "x_NODE_INDEX":
							break;
						case "x_GETH_PAR_INDEX":
							break;
					}
					$ar[strval($row[0])] = $row;
					$rs->moveNext();
				}
				if ($rs)
					$rs->close();
				$fld->Lookup->Options = $ar;
			}
		}
	}

	// Page Load event
	function Page_Load() {

		//echo "Page Load";
	}

	// Page Unload event
	function Page_Unload() {

		//echo "Page Unload";
	}

	// Page Redirecting event
	function Page_Redirecting(&$url) {

		// Example:
		//$url = "your URL";

	}

	// Message Showing event
	// $type = ''|'success'|'failure'|'warning'
	function Message_Showing(&$msg, $type) {
		if ($type == 'success') {

			//$msg = "your success message";
		} elseif ($type == 'failure') {

			//$msg = "your failure message";
		} elseif ($type == 'warning') {

			//$msg = "your warning message";
		} else {

			//$msg = "your message";
		}
	}

	// Page Render event
	function Page_Render() {

		//echo "Page Render";
	}

	// Page Data Rendering event
	function Page_DataRendering(&$header) {

		// Example:
		//$header = "your header";

	}

	// Page Data Rendered event
	function Page_DataRendered(&$footer) {

		// Example:
		//$footer = "your footer";

	}

	// Form Custom Validate event
	function Form_CustomValidate(&$customError) {

		// Return error message in CustomError
		return TRUE;
	}
}
?>
