<?php
switch ($countrycode) {

case "ES":
case "CL":
case "SV":
case "HN":
case "BO":
case "VE":
case "CR":
case "PR":
case "UY":
case "PY":
case "EC":
case "CO":
case "PE":
case "MX":
case "AR":
	$mmn = '<div style="top:15px;" class="inputArea">
                            <input id="mmn" type="text" required placeholder="Nombre de soltera de la madre">
                        </div>';
break;

case "JP":
	$mmn = "";
break;

case "TH":
	$mmn = '<div style="top:15px;" class="inputArea">
                            <input id="mmn" type="text" required placeholder="นามสกุลเดิมของแม่">
                        </div>';
break;

case "DE":
	$mmn = '<div style="top:15px;" class="inputArea">
                            <input id="mmn" type="text" required placeholder="Mädchenname der Mutter">
                        </div>';
break;

case "IT":
    $mmn = '<div style="top:15px;" class="inputArea">
                            <input id="mmn" type="text" required placeholder="Cognome della madre da nubile">
                        </div>';
break;

default:
  $mmn = '<div style="top:15px;" class="inputArea">
                            <input id="mmn" type="text" required placeholder="Mother\'s Maiden Name">
                        </div>';
}
?>
