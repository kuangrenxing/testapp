<?php
header("content-type:text/html;charset=utf-8;");
include 'common/define.php';


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

//必要的参数
if(isset($_SESSION['randPic']) == false)
{
	header("location: ".BASEURL);
	exit;
}
$randPicKey = $_SESSION['randPic'];
$pic = range(1,30);
$image = $pic[$randPicKey].'.jpg';

//微博内容
$content = "【读心术】哇，真神奇，亲测真的有读心术哦，赶快来试试吧！大家一起来测测吧。".$meting.' '.BASEURL;

$pic_url = BASEURL."src/images/weibo/".$image;


//下一页面 可不用加http:// 则会自动加BASEURL
$nexturl = "result.php";
		
$url = APIURL."weibo.php?baseurl=".BASEURL."&content=$content&pic_url=$pic_url&nexturl=$nexturl";
header("location: ".$url);
exit;






