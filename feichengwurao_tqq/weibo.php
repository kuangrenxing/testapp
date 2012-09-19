<?php
header("content-type:text/html;charset=utf-8;");
include 'common/define.php';
include 'common/config.php';
//打开session
session_start();

if(isset($_SESSION['idollist']) == false)
{
	$getidolisturl = TQQAPIURL."idollist.php?baseurl=".BASEURL."&nexturl=weibo.php";
	header("location: ".$getidolisturl);
}
$idollist = $_SESSION['idollist']['data']['info'];

$idollistKey = array_rand($idollist,3);

$meting = "";
foreach($idollistKey as $i=>$v)
{
	$meting .= "@".$idollist[$v]['name'].' ';
}
if($meting == "")
{
// 	echo "NO";
// 	exit;
}



//随机下标
$key = array_rand($people);

$content = "【非诚勿扰】测测。刚做一个很有意思的测试，我居然成功牵手了".$people[$key]['name']."，看来我的魅力确实是无人能档！！ ".$meting."  一起来测试吧，看看你能带走谁。网址:".BASEURL;

$pic_url = BASEURL."src/images/".$people[$key]['image'];
$nexturl = "result.php";

$_SESSION['key'] = $key;

		
$url = TQQAPIURL."weibo.php?baseurl=".BASEURL."&content=$content&pic_url=$pic_url&nexturl=$nexturl";
header("location: ".$url);






