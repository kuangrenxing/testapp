<?php
header("content-type:text/html;charset=utf-8;");
include 'common/define.php';


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

//微博内容
$content = "【十二星座怎么度过世界末日】不论信与不信，世界末日最后终究会不会来，2012的预言都是让我们学会更加珍惜眼前人，珍惜所过的每一天。".$meting.' '.BASEURL;


//必要的参数
if(isset($_SESSION['val']) == false)
{
	header("location: ".BASEURL);
	exit;
}
$val = $_SESSION['val'];
$pic_url = BASEURL."src/images/".$val.".jpg";

//下一页面 可不用加http:// 则会自动加BASEURL
$nexturl = "transition.php";
		
$url = APIURL."weibo.php?baseurl=".BASEURL."&content=$content&pic_url=$pic_url&nexturl=$nexturl";
header("location: ".$url);
exit;






