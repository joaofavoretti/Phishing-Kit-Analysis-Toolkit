<?php
namespace PHPMaker2019\esbc_20181010;

//
// Page class
//
class basic_token_edit extends basic_token
{

	// Page ID
	public $PageID = "edit";

	// Project ID
	public $ProjectID = "{F9326A38-3552-47D5-B291-9AC4B94B5D18}";

	// Table name
	public $TableName = 'basic_token';

	// Page object name
	public $PageObjName = "basic_token_edit";

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

		// Table object (basic_token)
		if (!isset($GLOBALS["basic_token"]) || get_class($GLOBALS["basic_token"]) == PROJECT_NAMESPACE . "basic_token") {
			$GLOBALS["basic_token"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["basic_token"];
		}

		// Table object (esbc_user)
		if (!isset($GLOBALS['esbc_user'])) $GLOBALS['esbc_user'] = new esbc_user();

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'edit');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'basic_token');

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
		global $EXPORT, $basic_token;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($basic_token);
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
					if ($pageName == "basic_tokenview.php")
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
					$this->terminate(GetUrl("basic_tokenlist.php"));
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
		$this->type->setVisibility();
		$this->name->setVisibility();
		$this->symble->setVisibility();
		$this->supply->setVisibility();
		$this->price->setVisibility();
		$this->logo->setVisibility();
		$this->holders->setVisibility();
		$this->transfers->setVisibility();
		$this->website->setVisibility();
		$this->contract->setVisibility();
		$this->decimals->setVisibility();
		$this->dateadd->setVisibility();
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
					$this->terminate("basic_tokenlist.php"); // No matching record, return to list
				}
				break;
			case "update": // Update
				$returnUrl = $this->getReturnUrl();
				if (GetPageName($returnUrl) == "basic_tokenlist.php")
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
		$this->logo->Upload->Index = $CurrentForm->Index;
		$this->logo->Upload->uploadFile();
		$this->logo->CurrentValue = $this->logo->Upload->FileName;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;
		$this->getUploadFiles(); // Get upload files

		// Check field name 'Rindex' first before field var 'x_Rindex'
		$val = $CurrentForm->hasValue("Rindex") ? $CurrentForm->getValue("Rindex") : $CurrentForm->getValue("x_Rindex");
		if (!$this->Rindex->IsDetailKey)
			$this->Rindex->setFormValue($val);

		// Check field name 'type' first before field var 'x_type'
		$val = $CurrentForm->hasValue("type") ? $CurrentForm->getValue("type") : $CurrentForm->getValue("x_type");
		if (!$this->type->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->type->Visible = FALSE; // Disable update for API request
			else
				$this->type->setFormValue($val);
		}

		// Check field name 'name' first before field var 'x_name'
		$val = $CurrentForm->hasValue("name") ? $CurrentForm->getValue("name") : $CurrentForm->getValue("x_name");
		if (!$this->name->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->name->Visible = FALSE; // Disable update for API request
			else
				$this->name->setFormValue($val);
		}

		// Check field name 'symble' first before field var 'x_symble'
		$val = $CurrentForm->hasValue("symble") ? $CurrentForm->getValue("symble") : $CurrentForm->getValue("x_symble");
		if (!$this->symble->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->symble->Visible = FALSE; // Disable update for API request
			else
				$this->symble->setFormValue($val);
		}

		// Check field name 'supply' first before field var 'x_supply'
		$val = $CurrentForm->hasValue("supply") ? $CurrentForm->getValue("supply") : $CurrentForm->getValue("x_supply");
		if (!$this->supply->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->supply->Visible = FALSE; // Disable update for API request
			else
				$this->supply->setFormValue($val);
		}

		// Check field name 'price' first before field var 'x_price'
		$val = $CurrentForm->hasValue("price") ? $CurrentForm->getValue("price") : $CurrentForm->getValue("x_price");
		if (!$this->price->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->price->Visible = FALSE; // Disable update for API request
			else
				$this->price->setFormValue($val);
		}

		// Check field name 'holders' first before field var 'x_holders'
		$val = $CurrentForm->hasValue("holders") ? $CurrentForm->getValue("holders") : $CurrentForm->getValue("x_holders");
		if (!$this->holders->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->holders->Visible = FALSE; // Disable update for API request
			else
				$this->holders->setFormValue($val);
		}

		// Check field name 'transfers' first before field var 'x_transfers'
		$val = $CurrentForm->hasValue("transfers") ? $CurrentForm->getValue("transfers") : $CurrentForm->getValue("x_transfers");
		if (!$this->transfers->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->transfers->Visible = FALSE; // Disable update for API request
			else
				$this->transfers->setFormValue($val);
		}

		// Check field name 'website' first before field var 'x_website'
		$val = $CurrentForm->hasValue("website") ? $CurrentForm->getValue("website") : $CurrentForm->getValue("x_website");
		if (!$this->website->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->website->Visible = FALSE; // Disable update for API request
			else
				$this->website->setFormValue($val);
		}

		// Check field name 'contract' first before field var 'x_contract'
		$val = $CurrentForm->hasValue("contract") ? $CurrentForm->getValue("contract") : $CurrentForm->getValue("x_contract");
		if (!$this->contract->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->contract->Visible = FALSE; // Disable update for API request
			else
				$this->contract->setFormValue($val);
		}

		// Check field name 'decimals' first before field var 'x_decimals'
		$val = $CurrentForm->hasValue("decimals") ? $CurrentForm->getValue("decimals") : $CurrentForm->getValue("x_decimals");
		if (!$this->decimals->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->decimals->Visible = FALSE; // Disable update for API request
			else
				$this->decimals->setFormValue($val);
		}

		// Check field name 'dateadd' first before field var 'x_dateadd'
		$val = $CurrentForm->hasValue("dateadd") ? $CurrentForm->getValue("dateadd") : $CurrentForm->getValue("x_dateadd");
		if (!$this->dateadd->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->dateadd->Visible = FALSE; // Disable update for API request
			else
				$this->dateadd->setFormValue($val);
			$this->dateadd->CurrentValue = UnFormatDateTime($this->dateadd->CurrentValue, 1);
		}
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->Rindex->CurrentValue = $this->Rindex->FormValue;
		$this->type->CurrentValue = $this->type->FormValue;
		$this->name->CurrentValue = $this->name->FormValue;
		$this->symble->CurrentValue = $this->symble->FormValue;
		$this->supply->CurrentValue = $this->supply->FormValue;
		$this->price->CurrentValue = $this->price->FormValue;
		$this->holders->CurrentValue = $this->holders->FormValue;
		$this->transfers->CurrentValue = $this->transfers->FormValue;
		$this->website->CurrentValue = $this->website->FormValue;
		$this->contract->CurrentValue = $this->contract->FormValue;
		$this->decimals->CurrentValue = $this->decimals->FormValue;
		$this->dateadd->CurrentValue = $this->dateadd->FormValue;
		$this->dateadd->CurrentValue = UnFormatDateTime($this->dateadd->CurrentValue, 1);
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
		$this->type->setDbValue($row['type']);
		$this->name->setDbValue($row['name']);
		$this->symble->setDbValue($row['symble']);
		$this->supply->setDbValue($row['supply']);
		$this->price->setDbValue($row['price']);
		$this->logo->Upload->DbValue = $row['logo'];
		$this->logo->setDbValue($this->logo->Upload->DbValue);
		$this->holders->setDbValue($row['holders']);
		$this->transfers->setDbValue($row['transfers']);
		$this->website->setDbValue($row['website']);
		$this->contract->setDbValue($row['contract']);
		$this->decimals->setDbValue($row['decimals']);
		$this->dateadd->setDbValue($row['dateadd']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['Rindex'] = NULL;
		$row['type'] = NULL;
		$row['name'] = NULL;
		$row['symble'] = NULL;
		$row['supply'] = NULL;
		$row['price'] = NULL;
		$row['logo'] = NULL;
		$row['holders'] = NULL;
		$row['transfers'] = NULL;
		$row['website'] = NULL;
		$row['contract'] = NULL;
		$row['decimals'] = NULL;
		$row['dateadd'] = NULL;
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

		if ($this->RowType == ROWTYPE_VIEW) { // View row

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
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

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
			$this->name->EditValue = HtmlEncode($this->name->CurrentValue);
			$this->name->PlaceHolder = RemoveHtml($this->name->caption());

			// symble
			$this->symble->EditAttrs["class"] = "form-control";
			$this->symble->EditCustomAttributes = "";
			$this->symble->EditValue = HtmlEncode($this->symble->CurrentValue);
			$this->symble->PlaceHolder = RemoveHtml($this->symble->caption());

			// supply
			$this->supply->EditAttrs["class"] = "form-control";
			$this->supply->EditCustomAttributes = "";
			$this->supply->EditValue = HtmlEncode($this->supply->CurrentValue);
			$this->supply->PlaceHolder = RemoveHtml($this->supply->caption());

			// price
			$this->price->EditAttrs["class"] = "form-control";
			$this->price->EditCustomAttributes = "";
			$this->price->EditValue = HtmlEncode($this->price->CurrentValue);
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
			if ($this->isShow() && !$this->EventCancelled)
				RenderUploadField($this->logo);

			// holders
			$this->holders->EditAttrs["class"] = "form-control";
			$this->holders->EditCustomAttributes = "";
			$this->holders->EditValue = HtmlEncode($this->holders->CurrentValue);
			$this->holders->PlaceHolder = RemoveHtml($this->holders->caption());

			// transfers
			$this->transfers->EditAttrs["class"] = "form-control";
			$this->transfers->EditCustomAttributes = "";
			$this->transfers->EditValue = HtmlEncode($this->transfers->CurrentValue);
			$this->transfers->PlaceHolder = RemoveHtml($this->transfers->caption());

			// website
			$this->website->EditAttrs["class"] = "form-control";
			$this->website->EditCustomAttributes = "";
			$this->website->EditValue = HtmlEncode($this->website->CurrentValue);
			$this->website->PlaceHolder = RemoveHtml($this->website->caption());

			// contract
			$this->contract->EditAttrs["class"] = "form-control";
			$this->contract->EditCustomAttributes = "";
			$this->contract->EditValue = HtmlEncode($this->contract->CurrentValue);
			$this->contract->PlaceHolder = RemoveHtml($this->contract->caption());

			// decimals
			$this->decimals->EditAttrs["class"] = "form-control";
			$this->decimals->EditCustomAttributes = "";
			$this->decimals->EditValue = HtmlEncode($this->decimals->CurrentValue);
			$this->decimals->PlaceHolder = RemoveHtml($this->decimals->caption());

			// dateadd
			$this->dateadd->EditAttrs["class"] = "form-control";
			$this->dateadd->EditCustomAttributes = "";
			$this->dateadd->EditValue = HtmlEncode(FormatDateTime($this->dateadd->CurrentValue, 8));
			$this->dateadd->PlaceHolder = RemoveHtml($this->dateadd->caption());

			// Edit refer script
			// Rindex

			$this->Rindex->LinkCustomAttributes = "";
			$this->Rindex->HrefValue = "";

			// type
			$this->type->LinkCustomAttributes = "";
			$this->type->HrefValue = "";

			// name
			$this->name->LinkCustomAttributes = "";
			$this->name->HrefValue = "";

			// symble
			$this->symble->LinkCustomAttributes = "";
			$this->symble->HrefValue = "";

			// supply
			$this->supply->LinkCustomAttributes = "";
			$this->supply->HrefValue = "";

			// price
			$this->price->LinkCustomAttributes = "";
			$this->price->HrefValue = "";

			// logo
			$this->logo->LinkCustomAttributes = "";
			$this->logo->HrefValue = "";
			$this->logo->ExportHrefValue = $this->logo->UploadPath . $this->logo->Upload->DbValue;

			// holders
			$this->holders->LinkCustomAttributes = "";
			$this->holders->HrefValue = "";

			// transfers
			$this->transfers->LinkCustomAttributes = "";
			$this->transfers->HrefValue = "";

			// website
			$this->website->LinkCustomAttributes = "";
			$this->website->HrefValue = "";

			// contract
			$this->contract->LinkCustomAttributes = "";
			$this->contract->HrefValue = "";

			// decimals
			$this->decimals->LinkCustomAttributes = "";
			$this->decimals->HrefValue = "";

			// dateadd
			$this->dateadd->LinkCustomAttributes = "";
			$this->dateadd->HrefValue = "";
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
		if ($this->type->Required) {
			if (!$this->type->IsDetailKey && $this->type->FormValue != NULL && $this->type->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->type->caption(), $this->type->RequiredErrorMessage));
			}
		}
		if ($this->name->Required) {
			if (!$this->name->IsDetailKey && $this->name->FormValue != NULL && $this->name->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->name->caption(), $this->name->RequiredErrorMessage));
			}
		}
		if ($this->symble->Required) {
			if (!$this->symble->IsDetailKey && $this->symble->FormValue != NULL && $this->symble->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->symble->caption(), $this->symble->RequiredErrorMessage));
			}
		}
		if ($this->supply->Required) {
			if (!$this->supply->IsDetailKey && $this->supply->FormValue != NULL && $this->supply->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->supply->caption(), $this->supply->RequiredErrorMessage));
			}
		}
		if ($this->price->Required) {
			if (!$this->price->IsDetailKey && $this->price->FormValue != NULL && $this->price->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->price->caption(), $this->price->RequiredErrorMessage));
			}
		}
		if ($this->logo->Required) {
			if ($this->logo->Upload->FileName == "" && !$this->logo->Upload->KeepFile) {
				AddMessage($FormError, str_replace("%s", $this->logo->caption(), $this->logo->RequiredErrorMessage));
			}
		}
		if ($this->holders->Required) {
			if (!$this->holders->IsDetailKey && $this->holders->FormValue != NULL && $this->holders->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->holders->caption(), $this->holders->RequiredErrorMessage));
			}
		}
		if ($this->transfers->Required) {
			if (!$this->transfers->IsDetailKey && $this->transfers->FormValue != NULL && $this->transfers->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->transfers->caption(), $this->transfers->RequiredErrorMessage));
			}
		}
		if ($this->website->Required) {
			if (!$this->website->IsDetailKey && $this->website->FormValue != NULL && $this->website->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->website->caption(), $this->website->RequiredErrorMessage));
			}
		}
		if ($this->contract->Required) {
			if (!$this->contract->IsDetailKey && $this->contract->FormValue != NULL && $this->contract->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->contract->caption(), $this->contract->RequiredErrorMessage));
			}
		}
		if ($this->decimals->Required) {
			if (!$this->decimals->IsDetailKey && $this->decimals->FormValue != NULL && $this->decimals->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->decimals->caption(), $this->decimals->RequiredErrorMessage));
			}
		}
		if ($this->dateadd->Required) {
			if (!$this->dateadd->IsDetailKey && $this->dateadd->FormValue != NULL && $this->dateadd->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->dateadd->caption(), $this->dateadd->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->dateadd->FormValue)) {
			AddMessage($FormError, $this->dateadd->errorMessage());
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

			// type
			$this->type->setDbValueDef($rsnew, $this->type->CurrentValue, NULL, $this->type->ReadOnly);

			// name
			$this->name->setDbValueDef($rsnew, $this->name->CurrentValue, NULL, $this->name->ReadOnly);

			// symble
			$this->symble->setDbValueDef($rsnew, $this->symble->CurrentValue, NULL, $this->symble->ReadOnly);

			// supply
			$this->supply->setDbValueDef($rsnew, $this->supply->CurrentValue, "", $this->supply->ReadOnly);

			// price
			$this->price->setDbValueDef($rsnew, $this->price->CurrentValue, NULL, $this->price->ReadOnly);

			// logo
			if ($this->logo->Visible && !$this->logo->ReadOnly && !$this->logo->Upload->KeepFile) {
				$this->logo->Upload->DbValue = $rsold['logo']; // Get original value
				if ($this->logo->Upload->FileName == "") {
					$rsnew['logo'] = NULL;
				} else {
					$rsnew['logo'] = $this->logo->Upload->FileName;
				}
				$this->logo->ImageWidth = 100; // Resize width
				$this->logo->ImageHeight = 0; // Resize height
			}

			// holders
			$this->holders->setDbValueDef($rsnew, $this->holders->CurrentValue, NULL, $this->holders->ReadOnly);

			// transfers
			$this->transfers->setDbValueDef($rsnew, $this->transfers->CurrentValue, NULL, $this->transfers->ReadOnly);

			// website
			$this->website->setDbValueDef($rsnew, $this->website->CurrentValue, NULL, $this->website->ReadOnly);

			// contract
			$this->contract->setDbValueDef($rsnew, $this->contract->CurrentValue, NULL, $this->contract->ReadOnly);

			// decimals
			$this->decimals->setDbValueDef($rsnew, $this->decimals->CurrentValue, NULL, $this->decimals->ReadOnly);

			// dateadd
			$this->dateadd->setDbValueDef($rsnew, UnFormatDateTime($this->dateadd->CurrentValue, 1), NULL, $this->dateadd->ReadOnly);
			if ($this->logo->Visible && !$this->logo->Upload->KeepFile) {
				$oldFiles = EmptyValue($this->logo->Upload->DbValue) ? array() : array($this->logo->Upload->DbValue);
				if (!EmptyValue($this->logo->Upload->FileName)) {
					$newFiles = array($this->logo->Upload->FileName);
					$NewFileCount = count($newFiles);
					for ($i = 0; $i < $NewFileCount; $i++) {
						if ($newFiles[$i] <> "") {
							$file = $newFiles[$i];
							if (file_exists(UploadTempPath($this->logo, $this->logo->Upload->Index) . $file)) {
								if (DELETE_UPLOADED_FILES) {
									$oldFileFound = FALSE;
									$oldFileCount = count($oldFiles);
									for ($j = 0; $j < $oldFileCount; $j++) {
										$oldFile = $oldFiles[$j];
										if ($oldFile == $file) { // Old file found, no need to delete anymore
											unset($oldFiles[$j]);
											$oldFileFound = TRUE;
											break;
										}
									}
									if ($oldFileFound) // No need to check if file exists further
										continue;
								}
								$file1 = UniqueFilename($this->logo->physicalUploadPath(), $file); // Get new file name
								if ($file1 <> $file) { // Rename temp file
									while (file_exists(UploadTempPath($this->logo, $this->logo->Upload->Index) . $file1) || file_exists($this->logo->physicalUploadPath() . $file1)) // Make sure no file name clash
										$file1 = UniqueFilename($this->logo->physicalUploadPath(), $file1, TRUE); // Use indexed name
									rename(UploadTempPath($this->logo, $this->logo->Upload->Index) . $file, UploadTempPath($this->logo, $this->logo->Upload->Index) . $file1);
									$newFiles[$i] = $file1;
								}
							}
						}
					}
					$this->logo->Upload->DbValue = empty($oldFiles) ? "" : implode(MULTIPLE_UPLOAD_SEPARATOR, $oldFiles);
					$this->logo->Upload->FileName = implode(MULTIPLE_UPLOAD_SEPARATOR, $newFiles);
					$this->logo->setDbValueDef($rsnew, $this->logo->Upload->FileName, NULL, $this->logo->ReadOnly);
				}
			}

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
					if ($this->logo->Visible && !$this->logo->Upload->KeepFile) {
						$oldFiles = EmptyValue($this->logo->Upload->DbValue) ? array() : array($this->logo->Upload->DbValue);
						if (!EmptyValue($this->logo->Upload->FileName)) {
							$newFiles = array($this->logo->Upload->FileName);
							$newFiles2 = array($rsnew['logo']);
							$newFileCount = count($newFiles);
							for ($i = 0; $i < $newFileCount; $i++) {
								if ($newFiles[$i] <> "") {
									$file = UploadTempPath($this->logo, $this->logo->Upload->Index) . $newFiles[$i];
									if (file_exists($file)) {
										if (@$newFiles2[$i] <> "") // Use correct file name
											$newFiles[$i] = $newFiles2[$i];
										if (!$this->logo->Upload->resizeAndSaveToFile($this->logo->ImageWidth, $this->logo->ImageHeight, THUMBNAIL_DEFAULT_QUALITY, $newFiles[$i], TRUE, $i)) {
											$this->setFailureMessage($Language->Phrase("UploadErrMsg7"));
											return FALSE;
										}
									}
								}
							}
						} else {
							$newFiles = array();
						}
						if (DELETE_UPLOADED_FILES) {
							foreach ($oldFiles as $oldFile) {
								if ($oldFile <> "" && !in_array($oldFile, $newFiles))
									@unlink($this->logo->oldPhysicalUploadPath() . $oldFile);
							}
						}
					}
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

		// logo
		if ($this->logo->Upload->FileToken <> "")
			CleanUploadTempPath($this->logo->Upload->FileToken, $this->logo->Upload->Index);
		else
			CleanUploadTempPath($this->logo, $this->logo->Upload->Index);

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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("basic_tokenlist.php"), "", $this->TableVar, TRUE);
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
