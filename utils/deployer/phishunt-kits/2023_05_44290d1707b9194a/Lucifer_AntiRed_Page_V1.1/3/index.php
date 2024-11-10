<?php 
require_once('autoload.php'); 
?>
<html>
<head>
	<title>ANTIBOT</title> 
	<link href="/style.css" rel="stylesheet">	
	<style type="text/css">
    {
        font-family: 'Roboto' , sans-serif;
    }
    .error-template
    {
        padding: 40px 15px;
        text-align: center;
            margin-top: 10%;
    }
    .error-actions
    {
        margin-top: 15px;
        margin-bottom: 15px;
    }
    .error-actions .btn
    {
        margin-right: 10px;
    }
    .message-box h1
    {
        color: #252932;
        font-size: 98px;
        font-weight: 700;
        line-height: 98px;
        text-shadow: rgba(61, 61, 61, 0.3) 1px 1px, rgba(61, 61, 61, 0.2) 2px 2px, rgba(61, 61, 61, 0.3) 3px 3px;
    }
	</style>
</head>
<body>
<div class="container">
	<h1>DASHBOARD (Antibot v.2.6)</h1>
	<small>Real Visitor Detection Manager.</small>
	<hr>
	<div class="row">
        <div class="col-md-3">
        </div>
		<div class="col-md-6">
			<div class="panel panel-default">
			    <div class="panel-body"> 
                       	<center>--[ Check Configuration & STATUS SERVER ]--</center><br>
                        <hr>
                        <?php
							if('7e7f442dde6f43f5021abe94d4231351' == md5(file_get_contents(".htaccess"))){
								echo "<small style=color:white>--[ TRUE ]-- .htaccess</small><br>";
							}else{
								echo "<small style=color:red>--[ FALSE ]-- .htaccess (Pleas Fix)</small><br>";
							}
                            if($config['apikey'] == 'xxxxxxxxxxxxxxxxxxxxxxx'){
                                echo "<small style=color:red>--[ APIKEY ]-- Pleas edit files antibot-config.php and replace 'xxxxxxxxxxxxxxxxxxxxxxx' with your apikey.</small><br>";
                            }else{
                                echo "<small style=color:white>--[ APIKEY ]-- ".substr($config['apikey'], 0,10)."xxxx</small><br>";
                            }
                        ?>
			    </div>
			</div> 
		</div>
         <div class="col-md-3">
        </div>
	</div>
</div>
</body>
</html>

