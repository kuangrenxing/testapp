<?php
header("content-type:text/html;charset=utf-8");
include 'common/define.php';
include 'common/config.php';

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
if(isset($_SESSION['number']) == false)
{
	header("location: ".BASEURL);
	exit;
}

$number = $_SESSION['number'];
$resultKey = substr($number, -4)%80+1;

$result = $resultAttr[$resultKey];



if($result['1'] == "吉")
{
	$result['image'] = "1.jpg";
	$result['minimage'] = "ji.jpg";
}
elseif($result['1'] == "吉带凶")
{
	$result['image'] = "2.jpg";
	$result['minimage'] = "ji_dai_xiong.jpg";
}
elseif($result['1'] == "凶")
{
	$result['image'] = "3.jpg";
	$result['minimage'] = "xiong.jpg";
}
else
{
	$result['image'] = "4.jpg";
	$result['minimage'] = "xiong_dai_ji.jpg";
}

$images = BASEURL."src/images/weibo/".$result['image'];

$_SESSION['content'] = $result['0'];
$_SESSION['ret'] = $result['1'];
$_SESSION['image'] = $result['image'];
$_SESSION['minimage'] = $result['minimage'];

//微博内容
$content = "【手机号码凶吉测试】经过专业计算，拥有号码".substr($_SESSION['number'], 0, 3)."****".substr($_SESSION['number'], -3)."的人 原来 [".$result['0'].'-'.$result['1']."],号码就像姓名、风水会影响运势命运的意义是一样的。与您的生活息息相关。赶快测一测吧！".$meting.' '.BASEURL;

$pic_url = $images;
//下一页面 可不用加http:// 则会自动加BASEURL
$nexturl = BASEURL."result.php";

header("location: ".APIURL.'weibo.php?content='.$content.'&pic_url='.$pic_url.'&nexturl='.$nexturl);
exit;