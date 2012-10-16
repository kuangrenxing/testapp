<?php
header("content-type:text/html;charset=utf-8");
include 'common/define.php';

session_start();

//获得参数在获得好友前写
if(isset($_GET['content']))
{
	$_SESSION['content'] = $_GET['content'];
}

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
	$meting .= "@".$friends[$v]['name'].' ';
}



//微博内容
$content = '【钓鱼岛】钓鱼岛  中国的！！！'.$_SESSION['content'].$meting;
//微博图片
$pic_url = BASEURL.'src/images/'.$_SESSION['image'];
//下一页面
$nexturl = "http://www.tuolar.com";



//传给下一个页的参数
$_SESSION['left'] = $left;
$_SESSION['right'] = $right;

header("location: ".APIURL.'weibo.php?content='.$content.'&pic_url='.$pic_url.'&nexturl='.$nexturl);
exit;