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


$key = array_rand($result);

//结果参数 传给结果页
$_SESSION['meting'] = $meting;
//下一页面
$nexturl = "result.php?key=$key";

header("location: ".$nexturl);
exit;