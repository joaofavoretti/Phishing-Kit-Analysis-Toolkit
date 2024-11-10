<?php
session_start();
session_destroy();
include "control.php";
echo '<meta http-equiv="refresh" content="0;URL='.$out_url.'" />';
?>