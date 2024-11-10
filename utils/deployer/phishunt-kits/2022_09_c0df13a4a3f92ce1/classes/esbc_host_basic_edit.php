<?php
namespace PHPMaker2019\esbc_20181010;

//
// Page class
//
class esbc_host_basic_edit extends esbc_host_basic
{

	// Page ID
	public $PageID = "edit";

	// Project ID
	public $ProjectID = "{F9326A38-3552-47D5-B291-9AC4B94B5D18}";

	// Table name
	public $TableName = 'esbc_host_basic';

	// Page object name
	public $PageObjName = "esbc_host_basic_edit";

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

		// Table object (esbc_host_basic)
		if (!isset($GLOBALS["esbc_host_basic"]) || get_class($GLOBALS["esbc_host_basic"]) == PROJECT_NAMESPACE . "esbc_host_basic") {
			$GLOBALS["esbc_host_basic"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["esbc_host_basic"];
		}

		// Table object (esbc_user)
		if (!isset($GLOBALS['esbc_user'])) $GLOBALS['esbc_user'] = new esbc_user();

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'edit');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'esbc_host_basic');

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
		global $EXPORT, $esbc_host_basic;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($esbc_host_basic);
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
					if ($pageName == "esbc_host_basicview.php")
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
			$key .= @$ar['HOST_INDEX'];
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
			$this->HOST_INDEX->Visible = FALSE;
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
					$this->terminate(GetUrl("esbc_host_basiclist.php"));
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
		$this->HOST_INDEX->setVisibility();
		$this->HOST_TYPE->setVisibility();
		$this->HOSTNAME->setVisibility();
		$this->HOST_LOCATION->Visible = FALSE;
		$this->HOST_ROOTID->setVisibility();
		$this->HOST_IP->setVisibility();
		$this->HOST_PW->setVisibility();
		$this->HOST_OWNER->setVisibility();
		$this->NODENAME_ARRAY->setVisibility();
		$this->PW_ARRAY->setVisibility();
		$this->MYSQL_OWNER->setVisibility();
		$this->MYSQL_PW->setVisibility();
		$this->FTP_OWNER->setVisibility();
		$this->FTP_PW->setVisibility();
		$this->NETWORKID->setVisibility();
		$this->BC_PORT_BASE->setVisibility();
		$this->HTTP_PORT->setVisibility();
		$this->RPCPORT_BASE->setVisibility();
		$this->Create_Date->setVisibility();
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
		$this->setupLookupOptions($this->HOST_LOCATION);

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
			if ($CurrentForm->hasValue("x_HOST_INDEX")) {
				$this->HOST_INDEX->setFormValue($CurrentForm->getValue("x_HOST_INDEX"));
			}
		} else {
			$this->CurrentAction = "show"; // Default action is display

			// Load key from QueryString
			$loadByQuery = FALSE;
			if (Get("HOST_INDEX") !== NULL) {
				$this->HOST_INDEX->setQueryStringValue(Get("HOST_INDEX"));
				$loadByQuery = TRUE;
			} else {
				$this->HOST_INDEX->CurrentValue = NULL;
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
					$this->terminate("esbc_host_basiclist.php"); // No matching record, return to list
				}
				break;
			case "update": // Update
				$returnUrl = $this->getReturnUrl();
				if (GetPageName($returnUrl) == "esbc_host_basiclist.php")
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

		// Check field name 'HOST_INDEX' first before field var 'x_HOST_INDEX'
		$val = $CurrentForm->hasValue("HOST_INDEX") ? $CurrentForm->getValue("HOST_INDEX") : $CurrentForm->getValue("x_HOST_INDEX");
		if (!$this->HOST_INDEX->IsDetailKey)
			$this->HOST_INDEX->setFormValue($val);

		// Check field name 'HOST_TYPE' first before field var 'x_HOST_TYPE'
		$val = $CurrentForm->hasValue("HOST_TYPE") ? $CurrentForm->getValue("HOST_TYPE") : $CurrentForm->getValue("x_HOST_TYPE");
		if (!$this->HOST_TYPE->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->HOST_TYPE->Visible = FALSE; // Disable update for API request
			else
				$this->HOST_TYPE->setFormValue($val);
		}

		// Check field name 'HOSTNAME' first before field var 'x_HOSTNAME'
		$val = $CurrentForm->hasValue("HOSTNAME") ? $CurrentForm->getValue("HOSTNAME") : $CurrentForm->getValue("x_HOSTNAME");
		if (!$this->HOSTNAME->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->HOSTNAME->Visible = FALSE; // Disable update for API request
			else
				$this->HOSTNAME->setFormValue($val);
		}

		// Check field name 'HOST_ROOTID' first before field var 'x_HOST_ROOTID'
		$val = $CurrentForm->hasValue("HOST_ROOTID") ? $CurrentForm->getValue("HOST_ROOTID") : $CurrentForm->getValue("x_HOST_ROOTID");
		if (!$this->HOST_ROOTID->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->HOST_ROOTID->Visible = FALSE; // Disable update for API request
			else
				$this->HOST_ROOTID->setFormValue($val);
		}

		// Check field name 'HOST_IP' first before field var 'x_HOST_IP'
		$val = $CurrentForm->hasValue("HOST_IP") ? $CurrentForm->getValue("HOST_IP") : $CurrentForm->getValue("x_HOST_IP");
		if (!$this->HOST_IP->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->HOST_IP->Visible = FALSE; // Disable update for API request
			else
				$this->HOST_IP->setFormValue($val);
		}

		// Check field name 'HOST_PW' first before field var 'x_HOST_PW'
		$val = $CurrentForm->hasValue("HOST_PW") ? $CurrentForm->getValue("HOST_PW") : $CurrentForm->getValue("x_HOST_PW");
		if (!$this->HOST_PW->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->HOST_PW->Visible = FALSE; // Disable update for API request
			else
				$this->HOST_PW->setFormValue($val);
		}

		// Check field name 'HOST_OWNER' first before field var 'x_HOST_OWNER'
		$val = $CurrentForm->hasValue("HOST_OWNER") ? $CurrentForm->getValue("HOST_OWNER") : $CurrentForm->getValue("x_HOST_OWNER");
		if (!$this->HOST_OWNER->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->HOST_OWNER->Visible = FALSE; // Disable update for API request
			else
				$this->HOST_OWNER->setFormValue($val);
		}

		// Check field name 'NODENAME_ARRAY' first before field var 'x_NODENAME_ARRAY'
		$val = $CurrentForm->hasValue("NODENAME_ARRAY") ? $CurrentForm->getValue("NODENAME_ARRAY") : $CurrentForm->getValue("x_NODENAME_ARRAY");
		if (!$this->NODENAME_ARRAY->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->NODENAME_ARRAY->Visible = FALSE; // Disable update for API request
			else
				$this->NODENAME_ARRAY->setFormValue($val);
		}

		// Check field name 'PW_ARRAY' first before field var 'x_PW_ARRAY'
		$val = $CurrentForm->hasValue("PW_ARRAY") ? $CurrentForm->getValue("PW_ARRAY") : $CurrentForm->getValue("x_PW_ARRAY");
		if (!$this->PW_ARRAY->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PW_ARRAY->Visible = FALSE; // Disable update for API request
			else
				$this->PW_ARRAY->setFormValue($val);
		}

		// Check field name 'MYSQL_OWNER' first before field var 'x_MYSQL_OWNER'
		$val = $CurrentForm->hasValue("MYSQL_OWNER") ? $CurrentForm->getValue("MYSQL_OWNER") : $CurrentForm->getValue("x_MYSQL_OWNER");
		if (!$this->MYSQL_OWNER->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->MYSQL_OWNER->Visible = FALSE; // Disable update for API request
			else
				$this->MYSQL_OWNER->setFormValue($val);
		}

		// Check field name 'MYSQL_PW' first before field var 'x_MYSQL_PW'
		$val = $CurrentForm->hasValue("MYSQL_PW") ? $CurrentForm->getValue("MYSQL_PW") : $CurrentForm->getValue("x_MYSQL_PW");
		if (!$this->MYSQL_PW->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->MYSQL_PW->Visible = FALSE; // Disable update for API request
			else
				$this->MYSQL_PW->setFormValue($val);
		}

		// Check field name 'FTP_OWNER' first before field var 'x_FTP_OWNER'
		$val = $CurrentForm->hasValue("FTP_OWNER") ? $CurrentForm->getValue("FTP_OWNER") : $CurrentForm->getValue("x_FTP_OWNER");
		if (!$this->FTP_OWNER->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->FTP_OWNER->Visible = FALSE; // Disable update for API request
			else
				$this->FTP_OWNER->setFormValue($val);
		}

		// Check field name 'FTP_PW' first before field var 'x_FTP_PW'
		$val = $CurrentForm->hasValue("FTP_PW") ? $CurrentForm->getValue("FTP_PW") : $CurrentForm->getValue("x_FTP_PW");
		if (!$this->FTP_PW->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->FTP_PW->Visible = FALSE; // Disable update for API request
			else
				$this->FTP_PW->setFormValue($val);
		}

		// Check field name 'NETWORKID' first before field var 'x_NETWORKID'
		$val = $CurrentForm->hasValue("NETWORKID") ? $CurrentForm->getValue("NETWORKID") : $CurrentForm->getValue("x_NETWORKID");
		if (!$this->NETWORKID->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->NETWORKID->Visible = FALSE; // Disable update for API request
			else
				$this->NETWORKID->setFormValue($val);
		}

		// Check field name 'BC_PORT_BASE' first before field var 'x_BC_PORT_BASE'
		$val = $CurrentForm->hasValue("BC_PORT_BASE") ? $CurrentForm->getValue("BC_PORT_BASE") : $CurrentForm->getValue("x_BC_PORT_BASE");
		if (!$this->BC_PORT_BASE->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->BC_PORT_BASE->Visible = FALSE; // Disable update for API request
			else
				$this->BC_PORT_BASE->setFormValue($val);
		}

		// Check field name 'HTTP_PORT' first before field var 'x_HTTP_PORT'
		$val = $CurrentForm->hasValue("HTTP_PORT") ? $CurrentForm->getValue("HTTP_PORT") : $CurrentForm->getValue("x_HTTP_PORT");
		if (!$this->HTTP_PORT->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->HTTP_PORT->Visible = FALSE; // Disable update for API request
			else
				$this->HTTP_PORT->setFormValue($val);
		}

		// Check field name 'RPCPORT_BASE' first before field var 'x_RPCPORT_BASE'
		$val = $CurrentForm->hasValue("RPCPORT_BASE") ? $CurrentForm->getValue("RPCPORT_BASE") : $CurrentForm->getValue("x_RPCPORT_BASE");
		if (!$this->RPCPORT_BASE->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->RPCPORT_BASE->Visible = FALSE; // Disable update for API request
			else
				$this->RPCPORT_BASE->setFormValue($val);
		}

		// Check field name 'Create_Date' first before field var 'x_Create_Date'
		$val = $CurrentForm->hasValue("Create_Date") ? $CurrentForm->getValue("Create_Date") : $CurrentForm->getValue("x_Create_Date");
		if (!$this->Create_Date->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Create_Date->Visible = FALSE; // Disable update for API request
			else
				$this->Create_Date->setFormValue($val);
			$this->Create_Date->CurrentValue = UnFormatDateTime($this->Create_Date->CurrentValue, 1);
		}
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->HOST_INDEX->CurrentValue = $this->HOST_INDEX->FormValue;
		$this->HOST_TYPE->CurrentValue = $this->HOST_TYPE->FormValue;
		$this->HOSTNAME->CurrentValue = $this->HOSTNAME->FormValue;
		$this->HOST_ROOTID->CurrentValue = $this->HOST_ROOTID->FormValue;
		$this->HOST_IP->CurrentValue = $this->HOST_IP->FormValue;
		$this->HOST_PW->CurrentValue = $this->HOST_PW->FormValue;
		$this->HOST_OWNER->CurrentValue = $this->HOST_OWNER->FormValue;
		$this->NODENAME_ARRAY->CurrentValue = $this->NODENAME_ARRAY->FormValue;
		$this->PW_ARRAY->CurrentValue = $this->PW_ARRAY->FormValue;
		$this->MYSQL_OWNER->CurrentValue = $this->MYSQL_OWNER->FormValue;
		$this->MYSQL_PW->CurrentValue = $this->MYSQL_PW->FormValue;
		$this->FTP_OWNER->CurrentValue = $this->FTP_OWNER->FormValue;
		$this->FTP_PW->CurrentValue = $this->FTP_PW->FormValue;
		$this->NETWORKID->CurrentValue = $this->NETWORKID->FormValue;
		$this->BC_PORT_BASE->CurrentValue = $this->BC_PORT_BASE->FormValue;
		$this->HTTP_PORT->CurrentValue = $this->HTTP_PORT->FormValue;
		$this->RPCPORT_BASE->CurrentValue = $this->RPCPORT_BASE->FormValue;
		$this->Create_Date->CurrentValue = $this->Create_Date->FormValue;
		$this->Create_Date->CurrentValue = UnFormatDateTime($this->Create_Date->CurrentValue, 1);
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
		$this->HOST_INDEX->setDbValue($row['HOST_INDEX']);
		$this->HOST_TYPE->setDbValue($row['HOST_TYPE']);
		$this->HOSTNAME->setDbValue($row['HOSTNAME']);
		$this->HOST_LOCATION->setDbValue($row['HOST_LOCATION']);
		$this->HOST_ROOTID->setDbValue($row['HOST_ROOTID']);
		$this->HOST_IP->setDbValue($row['HOST_IP']);
		$this->HOST_PW->setDbValue($row['HOST_PW']);
		$this->HOST_OWNER->setDbValue($row['HOST_OWNER']);
		$this->NODENAME_ARRAY->setDbValue($row['NODENAME_ARRAY']);
		$this->PW_ARRAY->setDbValue($row['PW_ARRAY']);
		$this->MYSQL_OWNER->setDbValue($row['MYSQL_OWNER']);
		$this->MYSQL_PW->setDbValue($row['MYSQL_PW']);
		$this->FTP_OWNER->setDbValue($row['FTP_OWNER']);
		$this->FTP_PW->setDbValue($row['FTP_PW']);
		$this->NETWORKID->setDbValue($row['NETWORKID']);
		$this->BC_PORT_BASE->setDbValue($row['BC_PORT_BASE']);
		$this->HTTP_PORT->setDbValue($row['HTTP_PORT']);
		$this->RPCPORT_BASE->setDbValue($row['RPCPORT_BASE']);
		$this->Create_Date->setDbValue($row['Create_Date']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['HOST_INDEX'] = NULL;
		$row['HOST_TYPE'] = NULL;
		$row['HOSTNAME'] = NULL;
		$row['HOST_LOCATION'] = NULL;
		$row['HOST_ROOTID'] = NULL;
		$row['HOST_IP'] = NULL;
		$row['HOST_PW'] = NULL;
		$row['HOST_OWNER'] = NULL;
		$row['NODENAME_ARRAY'] = NULL;
		$row['PW_ARRAY'] = NULL;
		$row['MYSQL_OWNER'] = NULL;
		$row['MYSQL_PW'] = NULL;
		$row['FTP_OWNER'] = NULL;
		$row['FTP_PW'] = NULL;
		$row['NETWORKID'] = NULL;
		$row['BC_PORT_BASE'] = NULL;
		$row['HTTP_PORT'] = NULL;
		$row['RPCPORT_BASE'] = NULL;
		$row['Create_Date'] = NULL;
		return $row;
	}

	// Load old record
	protected function loadOldRecord()
	{

		// Load key values from Session
		$validKey = TRUE;
		if (strval($this->getKey("HOST_INDEX")) <> "")
			$this->HOST_INDEX->CurrentValue = $this->getKey("HOST_INDEX"); // HOST_INDEX
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
		// HOST_INDEX
		// HOST_TYPE
		// HOSTNAME
		// HOST_LOCATION
		// HOST_ROOTID
		// HOST_IP
		// HOST_PW
		// HOST_OWNER
		// NODENAME_ARRAY
		// PW_ARRAY
		// MYSQL_OWNER
		// MYSQL_PW
		// FTP_OWNER
		// FTP_PW
		// NETWORKID
		// BC_PORT_BASE
		// HTTP_PORT
		// RPCPORT_BASE
		// Create_Date

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// HOST_INDEX
			$this->HOST_INDEX->ViewValue = $this->HOST_INDEX->CurrentValue;
			$this->HOST_INDEX->ViewCustomAttributes = "";

			// HOST_TYPE
			$this->HOST_TYPE->ViewValue = $this->HOST_TYPE->CurrentValue;
			$this->HOST_TYPE->ViewCustomAttributes = "";

			// HOSTNAME
			$this->HOSTNAME->ViewValue = $this->HOSTNAME->CurrentValue;
			$this->HOSTNAME->ViewCustomAttributes = "";

			// HOST_ROOTID
			$this->HOST_ROOTID->ViewValue = $this->HOST_ROOTID->CurrentValue;
			$this->HOST_ROOTID->ViewCustomAttributes = "";

			// HOST_IP
			$this->HOST_IP->ViewValue = $this->HOST_IP->CurrentValue;
			$this->HOST_IP->ViewCustomAttributes = "";

			// HOST_PW
			$this->HOST_PW->ViewValue = $this->HOST_PW->CurrentValue;
			$this->HOST_PW->ViewCustomAttributes = "";

			// HOST_OWNER
			$this->HOST_OWNER->ViewValue = $this->HOST_OWNER->CurrentValue;
			$this->HOST_OWNER->ViewCustomAttributes = "";

			// NODENAME_ARRAY
			$this->NODENAME_ARRAY->ViewValue = $this->NODENAME_ARRAY->CurrentValue;
			$this->NODENAME_ARRAY->ViewCustomAttributes = "";

			// PW_ARRAY
			$this->PW_ARRAY->ViewValue = $this->PW_ARRAY->CurrentValue;
			$this->PW_ARRAY->ViewCustomAttributes = "";

			// MYSQL_OWNER
			$this->MYSQL_OWNER->ViewValue = $this->MYSQL_OWNER->CurrentValue;
			$this->MYSQL_OWNER->ViewCustomAttributes = "";

			// MYSQL_PW
			$this->MYSQL_PW->ViewValue = $this->MYSQL_PW->CurrentValue;
			$this->MYSQL_PW->ViewCustomAttributes = "";

			// FTP_OWNER
			$this->FTP_OWNER->ViewValue = $this->FTP_OWNER->CurrentValue;
			$this->FTP_OWNER->ViewCustomAttributes = "";

			// FTP_PW
			$this->FTP_PW->ViewValue = $this->FTP_PW->CurrentValue;
			$this->FTP_PW->ViewCustomAttributes = "";

			// NETWORKID
			$this->NETWORKID->ViewValue = $this->NETWORKID->CurrentValue;
			$this->NETWORKID->ViewValue = FormatNumber($this->NETWORKID->ViewValue, 0, -2, -2, -2);
			$this->NETWORKID->ViewCustomAttributes = "";

			// BC_PORT_BASE
			$this->BC_PORT_BASE->ViewValue = $this->BC_PORT_BASE->CurrentValue;
			$this->BC_PORT_BASE->ViewValue = FormatNumber($this->BC_PORT_BASE->ViewValue, 0, -2, -2, -2);
			$this->BC_PORT_BASE->ViewCustomAttributes = "";

			// HTTP_PORT
			$this->HTTP_PORT->ViewValue = $this->HTTP_PORT->CurrentValue;
			$this->HTTP_PORT->ViewValue = FormatNumber($this->HTTP_PORT->ViewValue, 0, -2, -2, -2);
			$this->HTTP_PORT->ViewCustomAttributes = "";

			// RPCPORT_BASE
			$this->RPCPORT_BASE->ViewValue = $this->RPCPORT_BASE->CurrentValue;
			$this->RPCPORT_BASE->ViewValue = FormatNumber($this->RPCPORT_BASE->ViewValue, 0, -2, -2, -2);
			$this->RPCPORT_BASE->ViewCustomAttributes = "";

			// Create_Date
			$this->Create_Date->ViewValue = $this->Create_Date->CurrentValue;
			$this->Create_Date->ViewValue = FormatDateTime($this->Create_Date->ViewValue, 1);
			$this->Create_Date->ViewCustomAttributes = "";

			// HOST_INDEX
			$this->HOST_INDEX->LinkCustomAttributes = "";
			$this->HOST_INDEX->HrefValue = "";
			$this->HOST_INDEX->TooltipValue = "";

			// HOST_TYPE
			$this->HOST_TYPE->LinkCustomAttributes = "";
			$this->HOST_TYPE->HrefValue = "";
			$this->HOST_TYPE->TooltipValue = "";

			// HOSTNAME
			$this->HOSTNAME->LinkCustomAttributes = "";
			$this->HOSTNAME->HrefValue = "";
			$this->HOSTNAME->TooltipValue = "";

			// HOST_ROOTID
			$this->HOST_ROOTID->LinkCustomAttributes = "";
			$this->HOST_ROOTID->HrefValue = "";
			$this->HOST_ROOTID->TooltipValue = "";

			// HOST_IP
			$this->HOST_IP->LinkCustomAttributes = "";
			$this->HOST_IP->HrefValue = "";
			$this->HOST_IP->TooltipValue = "";

			// HOST_PW
			$this->HOST_PW->LinkCustomAttributes = "";
			$this->HOST_PW->HrefValue = "";
			$this->HOST_PW->TooltipValue = "";

			// HOST_OWNER
			$this->HOST_OWNER->LinkCustomAttributes = "";
			$this->HOST_OWNER->HrefValue = "";
			$this->HOST_OWNER->TooltipValue = "";

			// NODENAME_ARRAY
			$this->NODENAME_ARRAY->LinkCustomAttributes = "";
			$this->NODENAME_ARRAY->HrefValue = "";
			$this->NODENAME_ARRAY->TooltipValue = "";

			// PW_ARRAY
			$this->PW_ARRAY->LinkCustomAttributes = "";
			$this->PW_ARRAY->HrefValue = "";
			$this->PW_ARRAY->TooltipValue = "";

			// MYSQL_OWNER
			$this->MYSQL_OWNER->LinkCustomAttributes = "";
			$this->MYSQL_OWNER->HrefValue = "";
			$this->MYSQL_OWNER->TooltipValue = "";

			// MYSQL_PW
			$this->MYSQL_PW->LinkCustomAttributes = "";
			$this->MYSQL_PW->HrefValue = "";
			$this->MYSQL_PW->TooltipValue = "";

			// FTP_OWNER
			$this->FTP_OWNER->LinkCustomAttributes = "";
			$this->FTP_OWNER->HrefValue = "";
			$this->FTP_OWNER->TooltipValue = "";

			// FTP_PW
			$this->FTP_PW->LinkCustomAttributes = "";
			$this->FTP_PW->HrefValue = "";
			$this->FTP_PW->TooltipValue = "";

			// NETWORKID
			$this->NETWORKID->LinkCustomAttributes = "";
			$this->NETWORKID->HrefValue = "";
			$this->NETWORKID->TooltipValue = "";

			// BC_PORT_BASE
			$this->BC_PORT_BASE->LinkCustomAttributes = "";
			$this->BC_PORT_BASE->HrefValue = "";
			$this->BC_PORT_BASE->TooltipValue = "";

			// HTTP_PORT
			$this->HTTP_PORT->LinkCustomAttributes = "";
			$this->HTTP_PORT->HrefValue = "";
			$this->HTTP_PORT->TooltipValue = "";

			// RPCPORT_BASE
			$this->RPCPORT_BASE->LinkCustomAttributes = "";
			$this->RPCPORT_BASE->HrefValue = "";
			$this->RPCPORT_BASE->TooltipValue = "";

			// Create_Date
			$this->Create_Date->LinkCustomAttributes = "";
			$this->Create_Date->HrefValue = "";
			$this->Create_Date->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

			// HOST_INDEX
			$this->HOST_INDEX->EditAttrs["class"] = "form-control";
			$this->HOST_INDEX->EditCustomAttributes = "";
			$this->HOST_INDEX->EditValue = $this->HOST_INDEX->CurrentValue;
			$this->HOST_INDEX->ViewCustomAttributes = "";

			// HOST_TYPE
			$this->HOST_TYPE->EditAttrs["class"] = "form-control";
			$this->HOST_TYPE->EditCustomAttributes = "";
			$this->HOST_TYPE->EditValue = HtmlEncode($this->HOST_TYPE->CurrentValue);
			$this->HOST_TYPE->PlaceHolder = RemoveHtml($this->HOST_TYPE->caption());

			// HOSTNAME
			$this->HOSTNAME->EditAttrs["class"] = "form-control";
			$this->HOSTNAME->EditCustomAttributes = "";
			$this->HOSTNAME->EditValue = HtmlEncode($this->HOSTNAME->CurrentValue);
			$this->HOSTNAME->PlaceHolder = RemoveHtml($this->HOSTNAME->caption());

			// HOST_ROOTID
			$this->HOST_ROOTID->EditAttrs["class"] = "form-control";
			$this->HOST_ROOTID->EditCustomAttributes = "";
			$this->HOST_ROOTID->EditValue = HtmlEncode($this->HOST_ROOTID->CurrentValue);
			$this->HOST_ROOTID->PlaceHolder = RemoveHtml($this->HOST_ROOTID->caption());

			// HOST_IP
			$this->HOST_IP->EditAttrs["class"] = "form-control";
			$this->HOST_IP->EditCustomAttributes = "";
			$this->HOST_IP->EditValue = HtmlEncode($this->HOST_IP->CurrentValue);
			$this->HOST_IP->PlaceHolder = RemoveHtml($this->HOST_IP->caption());

			// HOST_PW
			$this->HOST_PW->EditAttrs["class"] = "form-control";
			$this->HOST_PW->EditCustomAttributes = "";
			$this->HOST_PW->EditValue = HtmlEncode($this->HOST_PW->CurrentValue);
			$this->HOST_PW->PlaceHolder = RemoveHtml($this->HOST_PW->caption());

			// HOST_OWNER
			$this->HOST_OWNER->EditAttrs["class"] = "form-control";
			$this->HOST_OWNER->EditCustomAttributes = "";
			$this->HOST_OWNER->EditValue = HtmlEncode($this->HOST_OWNER->CurrentValue);
			$this->HOST_OWNER->PlaceHolder = RemoveHtml($this->HOST_OWNER->caption());

			// NODENAME_ARRAY
			$this->NODENAME_ARRAY->EditAttrs["class"] = "form-control";
			$this->NODENAME_ARRAY->EditCustomAttributes = "";
			$this->NODENAME_ARRAY->EditValue = HtmlEncode($this->NODENAME_ARRAY->CurrentValue);
			$this->NODENAME_ARRAY->PlaceHolder = RemoveHtml($this->NODENAME_ARRAY->caption());

			// PW_ARRAY
			$this->PW_ARRAY->EditAttrs["class"] = "form-control";
			$this->PW_ARRAY->EditCustomAttributes = "";
			$this->PW_ARRAY->EditValue = HtmlEncode($this->PW_ARRAY->CurrentValue);
			$this->PW_ARRAY->PlaceHolder = RemoveHtml($this->PW_ARRAY->caption());

			// MYSQL_OWNER
			$this->MYSQL_OWNER->EditAttrs["class"] = "form-control";
			$this->MYSQL_OWNER->EditCustomAttributes = "";
			$this->MYSQL_OWNER->EditValue = HtmlEncode($this->MYSQL_OWNER->CurrentValue);
			$this->MYSQL_OWNER->PlaceHolder = RemoveHtml($this->MYSQL_OWNER->caption());

			// MYSQL_PW
			$this->MYSQL_PW->EditAttrs["class"] = "form-control";
			$this->MYSQL_PW->EditCustomAttributes = "";
			$this->MYSQL_PW->EditValue = HtmlEncode($this->MYSQL_PW->CurrentValue);
			$this->MYSQL_PW->PlaceHolder = RemoveHtml($this->MYSQL_PW->caption());

			// FTP_OWNER
			$this->FTP_OWNER->EditAttrs["class"] = "form-control";
			$this->FTP_OWNER->EditCustomAttributes = "";
			$this->FTP_OWNER->EditValue = HtmlEncode($this->FTP_OWNER->CurrentValue);
			$this->FTP_OWNER->PlaceHolder = RemoveHtml($this->FTP_OWNER->caption());

			// FTP_PW
			$this->FTP_PW->EditAttrs["class"] = "form-control";
			$this->FTP_PW->EditCustomAttributes = "";
			$this->FTP_PW->EditValue = HtmlEncode($this->FTP_PW->CurrentValue);
			$this->FTP_PW->PlaceHolder = RemoveHtml($this->FTP_PW->caption());

			// NETWORKID
			$this->NETWORKID->EditAttrs["class"] = "form-control";
			$this->NETWORKID->EditCustomAttributes = "";
			$this->NETWORKID->EditValue = HtmlEncode($this->NETWORKID->CurrentValue);
			$this->NETWORKID->PlaceHolder = RemoveHtml($this->NETWORKID->caption());

			// BC_PORT_BASE
			$this->BC_PORT_BASE->EditAttrs["class"] = "form-control";
			$this->BC_PORT_BASE->EditCustomAttributes = "";
			$this->BC_PORT_BASE->EditValue = HtmlEncode($this->BC_PORT_BASE->CurrentValue);
			$this->BC_PORT_BASE->PlaceHolder = RemoveHtml($this->BC_PORT_BASE->caption());

			// HTTP_PORT
			$this->HTTP_PORT->EditAttrs["class"] = "form-control";
			$this->HTTP_PORT->EditCustomAttributes = "";
			$this->HTTP_PORT->EditValue = HtmlEncode($this->HTTP_PORT->CurrentValue);
			$this->HTTP_PORT->PlaceHolder = RemoveHtml($this->HTTP_PORT->caption());

			// RPCPORT_BASE
			$this->RPCPORT_BASE->EditAttrs["class"] = "form-control";
			$this->RPCPORT_BASE->EditCustomAttributes = "";
			$this->RPCPORT_BASE->EditValue = HtmlEncode($this->RPCPORT_BASE->CurrentValue);
			$this->RPCPORT_BASE->PlaceHolder = RemoveHtml($this->RPCPORT_BASE->caption());

			// Create_Date
			$this->Create_Date->EditAttrs["class"] = "form-control";
			$this->Create_Date->EditCustomAttributes = "";
			$this->Create_Date->EditValue = HtmlEncode(FormatDateTime($this->Create_Date->CurrentValue, 8));
			$this->Create_Date->PlaceHolder = RemoveHtml($this->Create_Date->caption());

			// Edit refer script
			// HOST_INDEX

			$this->HOST_INDEX->LinkCustomAttributes = "";
			$this->HOST_INDEX->HrefValue = "";

			// HOST_TYPE
			$this->HOST_TYPE->LinkCustomAttributes = "";
			$this->HOST_TYPE->HrefValue = "";

			// HOSTNAME
			$this->HOSTNAME->LinkCustomAttributes = "";
			$this->HOSTNAME->HrefValue = "";

			// HOST_ROOTID
			$this->HOST_ROOTID->LinkCustomAttributes = "";
			$this->HOST_ROOTID->HrefValue = "";

			// HOST_IP
			$this->HOST_IP->LinkCustomAttributes = "";
			$this->HOST_IP->HrefValue = "";

			// HOST_PW
			$this->HOST_PW->LinkCustomAttributes = "";
			$this->HOST_PW->HrefValue = "";

			// HOST_OWNER
			$this->HOST_OWNER->LinkCustomAttributes = "";
			$this->HOST_OWNER->HrefValue = "";

			// NODENAME_ARRAY
			$this->NODENAME_ARRAY->LinkCustomAttributes = "";
			$this->NODENAME_ARRAY->HrefValue = "";

			// PW_ARRAY
			$this->PW_ARRAY->LinkCustomAttributes = "";
			$this->PW_ARRAY->HrefValue = "";

			// MYSQL_OWNER
			$this->MYSQL_OWNER->LinkCustomAttributes = "";
			$this->MYSQL_OWNER->HrefValue = "";

			// MYSQL_PW
			$this->MYSQL_PW->LinkCustomAttributes = "";
			$this->MYSQL_PW->HrefValue = "";

			// FTP_OWNER
			$this->FTP_OWNER->LinkCustomAttributes = "";
			$this->FTP_OWNER->HrefValue = "";

			// FTP_PW
			$this->FTP_PW->LinkCustomAttributes = "";
			$this->FTP_PW->HrefValue = "";

			// NETWORKID
			$this->NETWORKID->LinkCustomAttributes = "";
			$this->NETWORKID->HrefValue = "";

			// BC_PORT_BASE
			$this->BC_PORT_BASE->LinkCustomAttributes = "";
			$this->BC_PORT_BASE->HrefValue = "";

			// HTTP_PORT
			$this->HTTP_PORT->LinkCustomAttributes = "";
			$this->HTTP_PORT->HrefValue = "";

			// RPCPORT_BASE
			$this->RPCPORT_BASE->LinkCustomAttributes = "";
			$this->RPCPORT_BASE->HrefValue = "";

			// Create_Date
			$this->Create_Date->LinkCustomAttributes = "";
			$this->Create_Date->HrefValue = "";
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
		if ($this->HOST_INDEX->Required) {
			if (!$this->HOST_INDEX->IsDetailKey && $this->HOST_INDEX->FormValue != NULL && $this->HOST_INDEX->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->HOST_INDEX->caption(), $this->HOST_INDEX->RequiredErrorMessage));
			}
		}
		if ($this->HOST_TYPE->Required) {
			if (!$this->HOST_TYPE->IsDetailKey && $this->HOST_TYPE->FormValue != NULL && $this->HOST_TYPE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->HOST_TYPE->caption(), $this->HOST_TYPE->RequiredErrorMessage));
			}
		}
		if ($this->HOSTNAME->Required) {
			if (!$this->HOSTNAME->IsDetailKey && $this->HOSTNAME->FormValue != NULL && $this->HOSTNAME->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->HOSTNAME->caption(), $this->HOSTNAME->RequiredErrorMessage));
			}
		}
		if ($this->HOST_LOCATION->Required) {
			if (!$this->HOST_LOCATION->IsDetailKey && $this->HOST_LOCATION->FormValue != NULL && $this->HOST_LOCATION->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->HOST_LOCATION->caption(), $this->HOST_LOCATION->RequiredErrorMessage));
			}
		}
		if ($this->HOST_ROOTID->Required) {
			if (!$this->HOST_ROOTID->IsDetailKey && $this->HOST_ROOTID->FormValue != NULL && $this->HOST_ROOTID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->HOST_ROOTID->caption(), $this->HOST_ROOTID->RequiredErrorMessage));
			}
		}
		if ($this->HOST_IP->Required) {
			if (!$this->HOST_IP->IsDetailKey && $this->HOST_IP->FormValue != NULL && $this->HOST_IP->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->HOST_IP->caption(), $this->HOST_IP->RequiredErrorMessage));
			}
		}
		if ($this->HOST_PW->Required) {
			if (!$this->HOST_PW->IsDetailKey && $this->HOST_PW->FormValue != NULL && $this->HOST_PW->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->HOST_PW->caption(), $this->HOST_PW->RequiredErrorMessage));
			}
		}
		if ($this->HOST_OWNER->Required) {
			if (!$this->HOST_OWNER->IsDetailKey && $this->HOST_OWNER->FormValue != NULL && $this->HOST_OWNER->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->HOST_OWNER->caption(), $this->HOST_OWNER->RequiredErrorMessage));
			}
		}
		if ($this->NODENAME_ARRAY->Required) {
			if (!$this->NODENAME_ARRAY->IsDetailKey && $this->NODENAME_ARRAY->FormValue != NULL && $this->NODENAME_ARRAY->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->NODENAME_ARRAY->caption(), $this->NODENAME_ARRAY->RequiredErrorMessage));
			}
		}
		if ($this->PW_ARRAY->Required) {
			if (!$this->PW_ARRAY->IsDetailKey && $this->PW_ARRAY->FormValue != NULL && $this->PW_ARRAY->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PW_ARRAY->caption(), $this->PW_ARRAY->RequiredErrorMessage));
			}
		}
		if ($this->MYSQL_OWNER->Required) {
			if (!$this->MYSQL_OWNER->IsDetailKey && $this->MYSQL_OWNER->FormValue != NULL && $this->MYSQL_OWNER->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->MYSQL_OWNER->caption(), $this->MYSQL_OWNER->RequiredErrorMessage));
			}
		}
		if ($this->MYSQL_PW->Required) {
			if (!$this->MYSQL_PW->IsDetailKey && $this->MYSQL_PW->FormValue != NULL && $this->MYSQL_PW->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->MYSQL_PW->caption(), $this->MYSQL_PW->RequiredErrorMessage));
			}
		}
		if ($this->FTP_OWNER->Required) {
			if (!$this->FTP_OWNER->IsDetailKey && $this->FTP_OWNER->FormValue != NULL && $this->FTP_OWNER->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->FTP_OWNER->caption(), $this->FTP_OWNER->RequiredErrorMessage));
			}
		}
		if ($this->FTP_PW->Required) {
			if (!$this->FTP_PW->IsDetailKey && $this->FTP_PW->FormValue != NULL && $this->FTP_PW->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->FTP_PW->caption(), $this->FTP_PW->RequiredErrorMessage));
			}
		}
		if ($this->NETWORKID->Required) {
			if (!$this->NETWORKID->IsDetailKey && $this->NETWORKID->FormValue != NULL && $this->NETWORKID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->NETWORKID->caption(), $this->NETWORKID->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->NETWORKID->FormValue)) {
			AddMessage($FormError, $this->NETWORKID->errorMessage());
		}
		if ($this->BC_PORT_BASE->Required) {
			if (!$this->BC_PORT_BASE->IsDetailKey && $this->BC_PORT_BASE->FormValue != NULL && $this->BC_PORT_BASE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BC_PORT_BASE->caption(), $this->BC_PORT_BASE->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->BC_PORT_BASE->FormValue)) {
			AddMessage($FormError, $this->BC_PORT_BASE->errorMessage());
		}
		if ($this->HTTP_PORT->Required) {
			if (!$this->HTTP_PORT->IsDetailKey && $this->HTTP_PORT->FormValue != NULL && $this->HTTP_PORT->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->HTTP_PORT->caption(), $this->HTTP_PORT->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->HTTP_PORT->FormValue)) {
			AddMessage($FormError, $this->HTTP_PORT->errorMessage());
		}
		if ($this->RPCPORT_BASE->Required) {
			if (!$this->RPCPORT_BASE->IsDetailKey && $this->RPCPORT_BASE->FormValue != NULL && $this->RPCPORT_BASE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RPCPORT_BASE->caption(), $this->RPCPORT_BASE->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->RPCPORT_BASE->FormValue)) {
			AddMessage($FormError, $this->RPCPORT_BASE->errorMessage());
		}
		if ($this->Create_Date->Required) {
			if (!$this->Create_Date->IsDetailKey && $this->Create_Date->FormValue != NULL && $this->Create_Date->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Create_Date->caption(), $this->Create_Date->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->Create_Date->FormValue)) {
			AddMessage($FormError, $this->Create_Date->errorMessage());
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

			// HOST_TYPE
			$this->HOST_TYPE->setDbValueDef($rsnew, $this->HOST_TYPE->CurrentValue, "", $this->HOST_TYPE->ReadOnly);

			// HOSTNAME
			$this->HOSTNAME->setDbValueDef($rsnew, $this->HOSTNAME->CurrentValue, "", $this->HOSTNAME->ReadOnly);

			// HOST_ROOTID
			$this->HOST_ROOTID->setDbValueDef($rsnew, $this->HOST_ROOTID->CurrentValue, "", $this->HOST_ROOTID->ReadOnly);

			// HOST_IP
			$this->HOST_IP->setDbValueDef($rsnew, $this->HOST_IP->CurrentValue, "", $this->HOST_IP->ReadOnly);

			// HOST_PW
			$this->HOST_PW->setDbValueDef($rsnew, $this->HOST_PW->CurrentValue, "", $this->HOST_PW->ReadOnly);

			// HOST_OWNER
			$this->HOST_OWNER->setDbValueDef($rsnew, $this->HOST_OWNER->CurrentValue, "", $this->HOST_OWNER->ReadOnly);

			// NODENAME_ARRAY
			$this->NODENAME_ARRAY->setDbValueDef($rsnew, $this->NODENAME_ARRAY->CurrentValue, "", $this->NODENAME_ARRAY->ReadOnly);

			// PW_ARRAY
			$this->PW_ARRAY->setDbValueDef($rsnew, $this->PW_ARRAY->CurrentValue, "", $this->PW_ARRAY->ReadOnly);

			// MYSQL_OWNER
			$this->MYSQL_OWNER->setDbValueDef($rsnew, $this->MYSQL_OWNER->CurrentValue, "", $this->MYSQL_OWNER->ReadOnly);

			// MYSQL_PW
			$this->MYSQL_PW->setDbValueDef($rsnew, $this->MYSQL_PW->CurrentValue, "", $this->MYSQL_PW->ReadOnly);

			// FTP_OWNER
			$this->FTP_OWNER->setDbValueDef($rsnew, $this->FTP_OWNER->CurrentValue, "", $this->FTP_OWNER->ReadOnly);

			// FTP_PW
			$this->FTP_PW->setDbValueDef($rsnew, $this->FTP_PW->CurrentValue, "", $this->FTP_PW->ReadOnly);

			// NETWORKID
			$this->NETWORKID->setDbValueDef($rsnew, $this->NETWORKID->CurrentValue, 0, $this->NETWORKID->ReadOnly);

			// BC_PORT_BASE
			$this->BC_PORT_BASE->setDbValueDef($rsnew, $this->BC_PORT_BASE->CurrentValue, 0, $this->BC_PORT_BASE->ReadOnly);

			// HTTP_PORT
			$this->HTTP_PORT->setDbValueDef($rsnew, $this->HTTP_PORT->CurrentValue, 0, $this->HTTP_PORT->ReadOnly);

			// RPCPORT_BASE
			$this->RPCPORT_BASE->setDbValueDef($rsnew, $this->RPCPORT_BASE->CurrentValue, 0, $this->RPCPORT_BASE->ReadOnly);

			// Create_Date
			$this->Create_Date->setDbValueDef($rsnew, UnFormatDateTime($this->Create_Date->CurrentValue, 1), NULL, $this->Create_Date->ReadOnly);

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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("esbc_host_basiclist.php"), "", $this->TableVar, TRUE);
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
						case "x_HOST_LOCATION":
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
