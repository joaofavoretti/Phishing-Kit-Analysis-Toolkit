<?php
session_start();
if(!isset($_SESSION["bbpan"]))
{
    echo "";
    exit;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="windows-1252">
        <title>LISTA GENERAL</title>
    </head>
    <body onload="listar()">

    <p style="font-size: 30px;" >LISTADO GENERAL</p>

    <div id="cuerpo1">        
    </div>
        
    </body>
</html>
<script type="text/javascript">
    var timer11;
    function nuevo_hxr()
    {
        var xmlhttp;
        if (window.XMLHttpRequest) 
        {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();        
        } else 
        {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");        
        }

        return xmlhttp;
    }    
    function listar()
    {        
        var xmlhttp=nuevo_hxr();       
        var fd=new FormData();
        fd.append("op","listar");        
        xmlhttp.onreadystatechange = function() 
        {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
            {
                document.getElementById("cuerpo1").innerHTML = xmlhttp.responseText;
            }
        
        };        
        xmlhttp.open("POST","Ajax1.php",true);
        xmlhttp.send(fd);        
    }    
    timer11 = window.setInterval(listar,3000);    
</script>