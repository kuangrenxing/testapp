<?php
header("content-type:text/html;charset=utf-8;");

include_once './common/define.php';
include_once './common/config.php';

session_start();

//检查授权
if(!isset($_SESSION["access_token"])){
	header('Location:'.BASEURL);
	exit;
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
//substr($_POST['number'], -4)

//发分享参数
$title = "【手机号码凶吉测试】";
$url = BASEURL;
$comment = "经过专业计算，拥有号码".substr($_SESSION['number'], 0, 3)."****".substr($_SESSION['number'], -3)."的人 原来 [".$result['0'].'-'.$result['1']."] ，赶快测一测手机号码的凶吉吧！！".BASEURL;
$summary = "号码就像姓名、风水会影响运势命运的意义是一样的。虽然这只是一个号码，但是它与您的生活息息相关，也是您与很多人沟通的桥梁！所以『吉』与『凶』关系非常大，的确不可轻忽！";

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


//下一页面url
$nexturl = BASEURL."result.php";

//进行分享
header("Location: ".APIURL."share/add_share.php?title=$title&url=$url&comment=$comment&summary=$summary&images=$images&nexturl=$nexturl");
exit;



?>