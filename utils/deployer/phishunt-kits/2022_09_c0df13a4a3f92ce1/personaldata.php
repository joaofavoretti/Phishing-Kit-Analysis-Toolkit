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
$personaldata = new personaldata();

// Run the page
$personaldata->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();
?>
<?php include_once "header.php" ?>
<?php
$personaldata->showMessage();
?>
<?php if (SameText(Get("cmd"), "Delete")) { ?>
	<div class="alert alert-warning" role="alert">
		<p>
			<span class="fa fa-exclamation-triangle"></span>
			<strong><?php echo $Language->Phrase("PersonalDataWarning") ?></strong>
		</p>
	</div>
	<?php if (!EmptyString($personaldata->getFailureMessage())) { ?>
	<div class="text-danger">
		<ul>
			<li><?php echo $personaldata->getFailureMessage() ?></li>
		</ul>
	</div>
	<?php } ?>
	<div>
		<form id="delete-user" method="post" class="form-group">
<?php if ($personaldata->CheckToken) { ?>
			<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $personaldata->Token ?>">
<?php } ?>
			<div class="text-danger"></div>
			<div class="form-group">
				<label id="label" class="control-label ewLabel"><?php echo $Language->Phrase("Password") ?></label>
				<input type="password" name="password" id="password" class="form-control ewControl" placeholder="<?php echo $Language->Phrase("Password") ?>">
			</div>
			<button class="btn btn-danger" type="submit"><?php echo $Language->Phrase("CloseAccountBtn") ?></button>
		</form>
	</div>
<?php } else { ?>
	<div class="row">
		<div class="col">
			<p><?php echo $Language->Phrase("PersonalDataContent") ?></p>
			<div class="alert alert-danger d-inline-block">
				<i class="icon fa fa-ban"></i><?php echo $Language->Phrase("PersonalDataWarning") ?>
			</div>
			<p>
				<a id="download" href="<?php echo CurrentPageName() . "?cmd=download" ?>" class="btn btn-default"><?php echo $Language->Phrase("DownloadBtn") ?></a>
				<a id="delete" href="<?php echo CurrentPageName() . "?cmd=delete" ?>" class="btn btn-default"><?php echo $Language->Phrase("DeleteBtn") ?></a>
			</p>
		</div>
	</div>
<?php } ?>
<?php $personaldata->clearFailureMessage(); ?>
<?php include_once "footer.php" ?>
<?php
$personaldata->terminate();
?>
