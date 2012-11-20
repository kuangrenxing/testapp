<?php
header("content-type:text/html;charset=utf-8;");
include 'common/define.php';
include 'common/config.php';

session_start();

//当传来参数时，进行保存，要在得到收听列表前


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

////
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
$content = "【手机号码凶吉测试】经过专业计算，拥有号码".$_SESSION['number']."的人 原来 [".$result['0'].'-'.$result['1']."],号码就像姓名、风水会影响运势命运的意义是一样的。与您的生活息息相关。赶快测一测吧！".$meting.' '.BASEURL;

$pic_url = $images;
//下一页面 可不用加http:// 则会自动加BASEURL
$nexturl = "result.php";

		
$url = APIURL."weibo.php?baseurl=".BASEURL."&content=$content&pic_url=$pic_url&nexturl=$nexturl";
header("location: ".$url);
exit;






