<?php
header("content-type:text/html;charset=utf-8");
include 'common/define.php';

session_start();

//获得好友列表
if(isset($_SESSION['friends']) == false)
{
	header("Location: ".APIURL.'friends.php?nexturl='.BASEURL.'weibo.php');
	exit;
}

$friends = $_SESSION['friends'];
$friends = $friends['users'];
$friendsKey = array_rand($friends,3);

$meting = "";
foreach($friendsKey as $i=>$v)
{
	$meting .= " @".$friends[$v]['name'];
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
//下一页面
$nexturl = BASEURL."transition.php";

header("location: ".APIURL.'weibo.php?content='.$content.'&pic_url='.$pic_url.'&nexturl='.$nexturl);
exit;