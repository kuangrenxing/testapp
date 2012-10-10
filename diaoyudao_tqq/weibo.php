<?php
header("content-type:text/html;charset=utf-8;");
include 'common/define.php';
include 'common/config.php';

session_start();

if(isset($_GET['content']))
$_SESSION['content'] = $_GET['content'];

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
	$meting .= "@".$idollist[$v]['name'].' ';
}


$content = "【钓鱼岛】钓鱼岛  中国的！！！".$_SESSION['content'].$meting;

$pic_url = BASEURL.'src/images/'.$_SESSION['image'];


//下一页面 可不用加http:// 则会自动加BASEURL
$nexturl = "http://www.tuolar.com";
		
$url = APIURL."weibo.php?baseurl=".BASEURL."&content=$content&pic_url=$pic_url&nexturl=$nexturl";

header("location: ".$url);
exit;






