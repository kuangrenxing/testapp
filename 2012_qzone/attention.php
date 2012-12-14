<?php
include 'common/define.php';
session_start();

//检查授权
if(!isset($_SESSION["access_token"])){
	header('Location:'.BASEURL);
	exit;
}

//去关注页
$nexturl = BASEURL."result.php";
header("Location: ".APIURL.'guanzhu.php?nexturl='.$nexturl);


