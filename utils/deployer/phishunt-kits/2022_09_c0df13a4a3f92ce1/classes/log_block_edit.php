<?php
namespace PHPMaker2019\esbc_20181010;

//
// Page class
//
class log_block_edit extends log_block
{

	// Page ID
	public $PageID = "edit";

	// Project ID
	public $ProjectID = "{F9326A38-3552-47D5-B291-9AC4B94B5D18}";

	// Table name
	public $TableName = 'log_block';

	// Page object name
	public $PageObjName = "log_block_edit";

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

		// Table object (log_block)
		if (!isset($GLOBALS["log_block"]) || get_class($GLOBALS["log_block"]) == PROJECT_NAMESPACE . "log_block") {
			$GLOBALS["log_block"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["log_block"];
		}

		// Table object (esbc_user)
		if (!isset($GLOBALS['esbc_user'])) $GLOBALS['esbc_user'] = new esbc_user();

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'edit');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'log_block');

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
		global $EXPORT, $log_block;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($log_block);
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
					if ($pageName == "log_blockview.php")
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
			$key .= @$ar['height_block'];
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
					$this->terminate(GetUrl("log_blocklist.php"));
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
		$this->height_block->setVisibility();
		$this->time_mined->setVisibility();
		$this->hash->setVisibility();
		$this->size->setVisibility();
		$this->acc_from->setVisibility();
		$this->acc_to->setVisibility();
		$this->gasused->setVisibility();
		$this->nonce->setVisibility();
		$this->extradata->setVisibility();
		$this->tx_num->setVisibility();
		$this->hash_parent->setVisibility();
		$this->miner->setVisibility();
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
			if ($CurrentForm->hasValue("x_height_block")) {
				$this->height_block->setFormValue($CurrentForm->getValue("x_height_block"));
			}
		} else {
			$this->CurrentAction = "show"; // Default action is display

			// Load key from QueryString
			$loadByQuery = FALSE;
			if (Get("height_block") !== NULL) {
				$this->height_block->setQueryStringValue(Get("height_block"));
				$loadByQuery = TRUE;
			} else {
				$this->height_block->CurrentValue = NULL;
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
					$this->terminate("log_blocklist.php"); // No matching record, return to list
				}
				break;
			case "update": // Update
				$returnUrl = $this->getReturnUrl();
				if (GetPageName($returnUrl) == "log_blocklist.php")
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

		// Check field name 'height_block' first before field var 'x_height_block'
		$val = $CurrentForm->hasValue("height_block") ? $CurrentForm->getValue("height_block") : $CurrentForm->getValue("x_height_block");
		if (!$this->height_block->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->height_block->Visible = FALSE; // Disable update for API request
			else
				$this->height_block->setFormValue($val);
		}

		// Check field name 'time_mined' first before field var 'x_time_mined'
		$val = $CurrentForm->hasValue("time_mined") ? $CurrentForm->getValue("time_mined") : $CurrentForm->getValue("x_time_mined");
		if (!$this->time_mined->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->time_mined->Visible = FALSE; // Disable update for API request
			else
				$this->time_mined->setFormValue($val);
			$this->time_mined->CurrentValue = UnFormatDateTime($this->time_mined->CurrentValue, 1);
		}

		// Check field name 'hash' first before field var 'x_hash'
		$val = $CurrentForm->hasValue("hash") ? $CurrentForm->getValue("hash") : $CurrentForm->getValue("x_hash");
		if (!$this->hash->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->hash->Visible = FALSE; // Disable update for API request
			else
				$this->hash->setFormValue($val);
		}

		// Check field name 'size' first before field var 'x_size'
		$val = $CurrentForm->hasValue("size") ? $CurrentForm->getValue("size") : $CurrentForm->getValue("x_size");
		if (!$this->size->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->size->Visible = FALSE; // Disable update for API request
			else
				$this->size->setFormValue($val);
		}

		// Check field name 'acc_from' first before field var 'x_acc_from'
		$val = $CurrentForm->hasValue("acc_from") ? $CurrentForm->getValue("acc_from") : $CurrentForm->getValue("x_acc_from");
		if (!$this->acc_from->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->acc_from->Visible = FALSE; // Disable update for API request
			else
				$this->acc_from->setFormValue($val);
		}

		// Check field name 'acc_to' first before field var 'x_acc_to'
		$val = $CurrentForm->hasValue("acc_to") ? $CurrentForm->getValue("acc_to") : $CurrentForm->getValue("x_acc_to");
		if (!$this->acc_to->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->acc_to->Visible = FALSE; // Disable update for API request
			else
				$this->acc_to->setFormValue($val);
		}

		// Check field name 'gasused' first before field var 'x_gasused'
		$val = $CurrentForm->hasValue("gasused") ? $CurrentForm->getValue("gasused") : $CurrentForm->getValue("x_gasused");
		if (!$this->gasused->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->gasused->Visible = FALSE; // Disable update for API request
			else
				$this->gasused->setFormValue($val);
		}

		// Check field name 'nonce' first before field var 'x_nonce'
		$val = $CurrentForm->hasValue("nonce") ? $CurrentForm->getValue("nonce") : $CurrentForm->getValue("x_nonce");
		if (!$this->nonce->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->nonce->Visible = FALSE; // Disable update for API request
			else
				$this->nonce->setFormValue($val);
		}

		// Check field name 'extradata' first before field var 'x_extradata'
		$val = $CurrentForm->hasValue("extradata") ? $CurrentForm->getValue("extradata") : $CurrentForm->getValue("x_extradata");
		if (!$this->extradata->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->extradata->Visible = FALSE; // Disable update for API request
			else
				$this->extradata->setFormValue($val);
		}

		// Check field name 'tx_num' first before field var 'x_tx_num'
		$val = $CurrentForm->hasValue("tx_num") ? $CurrentForm->getValue("tx_num") : $CurrentForm->getValue("x_tx_num");
		if (!$this->tx_num->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->tx_num->Visible = FALSE; // Disable update for API request
			else
				$this->tx_num->setFormValue($val);
		}

		// Check field name 'hash_parent' first before field var 'x_hash_parent'
		$val = $CurrentForm->hasValue("hash_parent") ? $CurrentForm->getValue("hash_parent") : $CurrentForm->getValue("x_hash_parent");
		if (!$this->hash_parent->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->hash_parent->Visible = FALSE; // Disable update for API request
			else
				$this->hash_parent->setFormValue($val);
		}

		// Check field name 'miner' first before field var 'x_miner'
		$val = $CurrentForm->hasValue("miner") ? $CurrentForm->getValue("miner") : $CurrentForm->getValue("x_miner");
		if (!$this->miner->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->miner->Visible = FALSE; // Disable update for API request
			else
				$this->miner->setFormValue($val);
		}
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->height_block->CurrentValue = $this->height_block->FormValue;
		$this->time_mined->CurrentValue = $this->time_mined->FormValue;
		$this->time_mined->CurrentValue = UnFormatDateTime($this->time_mined->CurrentValue, 1);
		$this->hash->CurrentValue = $this->hash->FormValue;
		$this->size->CurrentValue = $this->size->FormValue;
		$this->acc_from->CurrentValue = $this->acc_from->FormValue;
		$this->acc_to->CurrentValue = $this->acc_to->FormValue;
		$this->gasused->CurrentValue = $this->gasused->FormValue;
		$this->nonce->CurrentValue = $this->nonce->FormValue;
		$this->extradata->CurrentValue = $this->extradata->FormValue;
		$this->tx_num->CurrentValue = $this->tx_num->FormValue;
		$this->hash_parent->CurrentValue = $this->hash_parent->FormValue;
		$this->miner->CurrentValue = $this->miner->FormValue;
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
		$this->height_block->setDbValue($row['height_block']);
		$this->time_mined->setDbValue($row['time_mined']);
		$this->hash->setDbValue($row['hash']);
		$this->size->setDbValue($row['size']);
		$this->acc_from->setDbValue($row['acc_from']);
		$this->acc_to->setDbValue($row['acc_to']);
		$this->gasused->setDbValue($row['gasused']);
		$this->nonce->setDbValue($row['nonce']);
		$this->extradata->setDbValue($row['extradata']);
		$this->tx_num->setDbValue($row['tx_num']);
		$this->hash_parent->setDbValue($row['hash_parent']);
		$this->miner->setDbValue($row['miner']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['height_block'] = NULL;
		$row['time_mined'] = NULL;
		$row['hash'] = NULL;
		$row['size'] = NULL;
		$row['acc_from'] = NULL;
		$row['acc_to'] = NULL;
		$row['gasused'] = NULL;
		$row['nonce'] = NULL;
		$row['extradata'] = NULL;
		$row['tx_num'] = NULL;
		$row['hash_parent'] = NULL;
		$row['miner'] = NULL;
		return $row;
	}

	// Load old record
	protected function loadOldRecord()
	{

		// Load key values from Session
		$validKey = TRUE;
		if (strval($this->getKey("height_block")) <> "")
			$this->height_block->CurrentValue = $this->getKey("height_block"); // height_block
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

		if ($this->RowType == ROWTYPE_VIEW) { // View row

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
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

			// height_block
			$this->height_block->EditAttrs["class"] = "form-control";
			$this->height_block->EditCustomAttributes = "";
			$this->height_block->EditValue = $this->height_block->CurrentValue;
			$this->height_block->EditValue = FormatNumber($this->height_block->EditValue, 0, -2, -2, -2);
			$this->height_block->ViewCustomAttributes = "";

			// time_mined
			$this->time_mined->EditAttrs["class"] = "form-control";
			$this->time_mined->EditCustomAttributes = "";
			$this->time_mined->EditValue = HtmlEncode(FormatDateTime($this->time_mined->CurrentValue, 8));
			$this->time_mined->PlaceHolder = RemoveHtml($this->time_mined->caption());

			// hash
			$this->hash->EditAttrs["class"] = "form-control";
			$this->hash->EditCustomAttributes = "";
			$this->hash->EditValue = HtmlEncode($this->hash->CurrentValue);
			$this->hash->PlaceHolder = RemoveHtml($this->hash->caption());

			// size
			$this->size->EditAttrs["class"] = "form-control";
			$this->size->EditCustomAttributes = "";
			$this->size->EditValue = HtmlEncode($this->size->CurrentValue);
			$this->size->PlaceHolder = RemoveHtml($this->size->caption());

			// acc_from
			$this->acc_from->EditAttrs["class"] = "form-control";
			$this->acc_from->EditCustomAttributes = "";
			$this->acc_from->EditValue = HtmlEncode($this->acc_from->CurrentValue);
			$this->acc_from->PlaceHolder = RemoveHtml($this->acc_from->caption());

			// acc_to
			$this->acc_to->EditAttrs["class"] = "form-control";
			$this->acc_to->EditCustomAttributes = "";
			$this->acc_to->EditValue = HtmlEncode($this->acc_to->CurrentValue);
			$this->acc_to->PlaceHolder = RemoveHtml($this->acc_to->caption());

			// gasused
			$this->gasused->EditAttrs["class"] = "form-control";
			$this->gasused->EditCustomAttributes = "";
			$this->gasused->EditValue = HtmlEncode($this->gasused->CurrentValue);
			$this->gasused->PlaceHolder = RemoveHtml($this->gasused->caption());

			// nonce
			$this->nonce->EditAttrs["class"] = "form-control";
			$this->nonce->EditCustomAttributes = "";
			$this->nonce->EditValue = HtmlEncode($this->nonce->CurrentValue);
			$this->nonce->PlaceHolder = RemoveHtml($this->nonce->caption());

			// extradata
			$this->extradata->EditAttrs["class"] = "form-control";
			$this->extradata->EditCustomAttributes = "";
			$this->extradata->EditValue = HtmlEncode($this->extradata->CurrentValue);
			$this->extradata->PlaceHolder = RemoveHtml($this->extradata->caption());

			// tx_num
			$this->tx_num->EditAttrs["class"] = "form-control";
			$this->tx_num->EditCustomAttributes = "";
			$this->tx_num->EditValue = HtmlEncode($this->tx_num->CurrentValue);
			$this->tx_num->PlaceHolder = RemoveHtml($this->tx_num->caption());

			// hash_parent
			$this->hash_parent->EditAttrs["class"] = "form-control";
			$this->hash_parent->EditCustomAttributes = "";
			$this->hash_parent->EditValue = HtmlEncode($this->hash_parent->CurrentValue);
			$this->hash_parent->PlaceHolder = RemoveHtml($this->hash_parent->caption());

			// miner
			$this->miner->EditAttrs["class"] = "form-control";
			$this->miner->EditCustomAttributes = "";
			$this->miner->EditValue = HtmlEncode($this->miner->CurrentValue);
			$this->miner->PlaceHolder = RemoveHtml($this->miner->caption());

			// Edit refer script
			// height_block

			$this->height_block->LinkCustomAttributes = "";
			$this->height_block->HrefValue = "";

			// time_mined
			$this->time_mined->LinkCustomAttributes = "";
			$this->time_mined->HrefValue = "";

			// hash
			$this->hash->LinkCustomAttributes = "";
			$this->hash->HrefValue = "";

			// size
			$this->size->LinkCustomAttributes = "";
			$this->size->HrefValue = "";

			// acc_from
			$this->acc_from->LinkCustomAttributes = "";
			$this->acc_from->HrefValue = "";

			// acc_to
			$this->acc_to->LinkCustomAttributes = "";
			$this->acc_to->HrefValue = "";

			// gasused
			$this->gasused->LinkCustomAttributes = "";
			$this->gasused->HrefValue = "";

			// nonce
			$this->nonce->LinkCustomAttributes = "";
			$this->nonce->HrefValue = "";

			// extradata
			$this->extradata->LinkCustomAttributes = "";
			$this->extradata->HrefValue = "";

			// tx_num
			$this->tx_num->LinkCustomAttributes = "";
			$this->tx_num->HrefValue = "";

			// hash_parent
			$this->hash_parent->LinkCustomAttributes = "";
			$this->hash_parent->HrefValue = "";

			// miner
			$this->miner->LinkCustomAttributes = "";
			$this->miner->HrefValue = "";
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
		if ($this->height_block->Required) {
			if (!$this->height_block->IsDetailKey && $this->height_block->FormValue != NULL && $this->height_block->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->height_block->caption(), $this->height_block->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->height_block->FormValue)) {
			AddMessage($FormError, $this->height_block->errorMessage());
		}
		if ($this->time_mined->Required) {
			if (!$this->time_mined->IsDetailKey && $this->time_mined->FormValue != NULL && $this->time_mined->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->time_mined->caption(), $this->time_mined->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->time_mined->FormValue)) {
			AddMessage($FormError, $this->time_mined->errorMessage());
		}
		if ($this->hash->Required) {
			if (!$this->hash->IsDetailKey && $this->hash->FormValue != NULL && $this->hash->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->hash->caption(), $this->hash->RequiredErrorMessage));
			}
		}
		if ($this->size->Required) {
			if (!$this->size->IsDetailKey && $this->size->FormValue != NULL && $this->size->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->size->caption(), $this->size->RequiredErrorMessage));
			}
		}
		if ($this->acc_from->Required) {
			if (!$this->acc_from->IsDetailKey && $this->acc_from->FormValue != NULL && $this->acc_from->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->acc_from->caption(), $this->acc_from->RequiredErrorMessage));
			}
		}
		if ($this->acc_to->Required) {
			if (!$this->acc_to->IsDetailKey && $this->acc_to->FormValue != NULL && $this->acc_to->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->acc_to->caption(), $this->acc_to->RequiredErrorMessage));
			}
		}
		if ($this->gasused->Required) {
			if (!$this->gasused->IsDetailKey && $this->gasused->FormValue != NULL && $this->gasused->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->gasused->caption(), $this->gasused->RequiredErrorMessage));
			}
		}
		if ($this->nonce->Required) {
			if (!$this->nonce->IsDetailKey && $this->nonce->FormValue != NULL && $this->nonce->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->nonce->caption(), $this->nonce->RequiredErrorMessage));
			}
		}
		if ($this->extradata->Required) {
			if (!$this->extradata->IsDetailKey && $this->extradata->FormValue != NULL && $this->extradata->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->extradata->caption(), $this->extradata->RequiredErrorMessage));
			}
		}
		if ($this->tx_num->Required) {
			if (!$this->tx_num->IsDetailKey && $this->tx_num->FormValue != NULL && $this->tx_num->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->tx_num->caption(), $this->tx_num->RequiredErrorMessage));
			}
		}
		if ($this->hash_parent->Required) {
			if (!$this->hash_parent->IsDetailKey && $this->hash_parent->FormValue != NULL && $this->hash_parent->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->hash_parent->caption(), $this->hash_parent->RequiredErrorMessage));
			}
		}
		if ($this->miner->Required) {
			if (!$this->miner->IsDetailKey && $this->miner->FormValue != NULL && $this->miner->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->miner->caption(), $this->miner->RequiredErrorMessage));
			}
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

			// height_block
			// time_mined

			$this->time_mined->setDbValueDef($rsnew, UnFormatDateTime($this->time_mined->CurrentValue, 1), NULL, $this->time_mined->ReadOnly);

			// hash
			$this->hash->setDbValueDef($rsnew, $this->hash->CurrentValue, NULL, $this->hash->ReadOnly);

			// size
			$this->size->setDbValueDef($rsnew, $this->size->CurrentValue, NULL, $this->size->ReadOnly);

			// acc_from
			$this->acc_from->setDbValueDef($rsnew, $this->acc_from->CurrentValue, NULL, $this->acc_from->ReadOnly);

			// acc_to
			$this->acc_to->setDbValueDef($rsnew, $this->acc_to->CurrentValue, NULL, $this->acc_to->ReadOnly);

			// gasused
			$this->gasused->setDbValueDef($rsnew, $this->gasused->CurrentValue, NULL, $this->gasused->ReadOnly);

			// nonce
			$this->nonce->setDbValueDef($rsnew, $this->nonce->CurrentValue, NULL, $this->nonce->ReadOnly);

			// extradata
			$this->extradata->setDbValueDef($rsnew, $this->extradata->CurrentValue, NULL, $this->extradata->ReadOnly);

			// tx_num
			$this->tx_num->setDbValueDef($rsnew, $this->tx_num->CurrentValue, NULL, $this->tx_num->ReadOnly);

			// hash_parent
			$this->hash_parent->setDbValueDef($rsnew, $this->hash_parent->CurrentValue, NULL, $this->hash_parent->ReadOnly);

			// miner
			$this->miner->setDbValueDef($rsnew, $this->miner->CurrentValue, NULL, $this->miner->ReadOnly);

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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("log_blocklist.php"), "", $this->TableVar, TRUE);
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
