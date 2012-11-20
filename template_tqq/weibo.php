<?php
header("content-type:text/html;charset=utf-8;");
include 'common/define.php';
include 'common/config.php';

session_start();

//当传来参数时，进行保存，要在得到收听列表前
// if(isset($_GET['content']))
// 	$_SESSION['content'] = $_GET['content'];

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

//微博内容
$content = "";

$pic_url = BASEURL."";
//下一页面 可不用加http:// 则会自动加BASEURL
$nexturl = "result.php";


//结果参数 传给结果页
$_SESSION['key'] = $key;

		
$url = APIURL."weibo.php?baseurl=".BASEURL."&content=$content&pic_url=$pic_url&nexturl=$nexturl";
header("location: ".$url);
exit;






