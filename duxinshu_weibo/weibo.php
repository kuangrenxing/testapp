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

//下一页面
$nexturl = BASEURL."result.php";



header("location: ".APIURL.'weibo.php?content='.$content.'&pic_url='.$pic_url.'&nexturl='.$nexturl);
exit;