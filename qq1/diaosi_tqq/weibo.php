<?php
header("content-type:text/html;charset=utf-8;");
include 'common/define.php';
include 'common/config.php';

session_start();


if(isset($_SESSION['idollist']) == false)
{
	//得到我收听的人列表保存$_SESSION['idollist']
	$getidolisturl = APIURL."idollist.php?baseurl=".BASEURL."&nexturl=weibo.php";
	header("location: ".$getidolisturl);
	exit;
}
$idollist = $_SESSION['idollist']['data']['info'];
$idollistKey = array_rand($idollist,3);

$meting = "";
foreach($idollistKey as $i=>$v)
{
	$meting .= " @".$idollist[$v]['name'];
}

$_SESSION['meting'] = $meting;

//下一页面 可不用加http:// 则会自动加BASEURL
$nexturl = "result.php";

$key = array_rand($result);
//结果参数 传给结果页
$_SESSION['key'] = $key;

		
$url = $nexturl."?key=$key";
header("location: ".$url);
exit;






