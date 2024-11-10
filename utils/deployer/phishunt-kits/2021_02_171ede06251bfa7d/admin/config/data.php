<?php
error_reporting(0);

$seckey='adam';  // Here is the admin-access key

$servername = "localhost";  // Host
$username = "revepibn_admin";  // User
$password = '.1#{OS{3GbAq'; // Password
$dbname = "revepibn_db"; // dbname




$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$connp = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

?>