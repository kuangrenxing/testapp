<?php
header("content-type:text/html;charset=utf-8;");
include 'common/define.php';
include 'common/config.php';

session_start();

if(isset($_SESSION['idollist']) == false)
{
	//得到我收听的人列表保存$_SESSION['idollist']
	$getidolisturl = TQQAPIURL."idollist.php?baseurl=".BASEURL."&nexturl=weibo.php";
	header("location: ".$getidolisturl);
	exit;
}
$idollist = $_SESSION['idollist']['data']['info'];



$content = "";

$pic_url = BASEURL."";
//下一页文件 不用加http://
$nexturl = "result.php";

//结果参数 传给结果页
$_SESSION['key'] = $key;

		
$url = APIURL."weibo.php?baseurl=".BASEURL."&content=$content&pic_url=$pic_url&nexturl=$nexturl";
header("location: ".$url);
exit;






