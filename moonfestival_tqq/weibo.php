<?php
header("content-type:text/html;charset=utf-8;");
include 'common/define.php';
include 'common/config.php';
include 'common/function.php';
//打开session
session_start();

if(isset($_SESSION['idollist']) == false)
{
	$getidolisturl = TQQAPIURL."idollist.php?baseurl=".BASEURL."&nexturl=weibo.php";
	header("location: ".$getidolisturl);
}

$idollist = $_SESSION['idollist']['data']['info'];
//我的异性好友
$mynsex =  $_SESSION['userinfo']['sex']==1 ? 2 : 1;
$nsexIdollist = array();// 我异性的好友
foreach($idollist as $i=>$v)
{
	if($v['sex'] == $mynsex)
		$nsexIdollist[] = $v;
}

// print_r(count($nsexIdollist));

$idollistKey = array_rand($nsexIdollist,1);

echo $niceringName = $nsexIdollist[$idollistKey]['name'];
echo $nicering = $nsexIdollist[$idollistKey]['nick'];
$niceringImg = $nsexIdollist[$idollistKey]['head'].'/180';
exit;
if($_SESSION['userinfo']['sex']==1)//男得用背景weibobgwoman.jpg
{
	$waterSBg = "src/watermark/weibobgwoman.jpg";
	$waterbg = "src/watermark/weibobgwoman".$_SESSION['userinfo']['uid'].".jpg";//背景图	
	$_SESSION['title'] = "你朝思暮想的“嫦娥”是".$nicering;
}
else
{
	$waterSBg = "src/watermark/weibobgman.jpg";
	$waterbg = "src/watermark/weibobgman".$_SESSION['userinfo']['uid'].".jpg";//背景图
	$_SESSION['title'] = "你的傻瓜“猪八戒”是".$nicering;
}

$waterImg = "src/watermark/water.jpg";//人像头图名
if(file_exists($waterbg))
{
	unlink($waterbg);
}
// copy($waterSBg, $waterbg);
// if(file_exists($waterImg))
// {
// 	unlink($waterImg);
// }
// GetImage($niceringImg,$waterImg);
// //文字水印
// imageWaterMark($waterbg,10,$waterImg,$nicering,5,"#FF0000");

$_SESSION['nicering'] = $nicering;
$_SESSION['niceringImg'] = $niceringImg;



$content = "刚刚玩了一个非常有趣的测试，原来我朝思暮想的“嫦娥”是 @$niceringName ，大家赶快一起来测测谁是你的嫦娥吧，".BASEURL."（网址），并祝大家中秋快乐。";
$_SESSION['content'] =$content; 

$pic_url = BASEURL.$waterbg;
$nexturl = "result.php";

$_SESSION['weiboimg'] = $pic_url;
// $url = TQQAPIURL."weibo.php?baseurl=".BASEURL."&content=$content&pic_url=$pic_url&nexturl=$nexturl";

$url = BASEURL.'result.php';
//echo "LLLL";exit;
header("location: ".$url);
//print_r($_SESSION['nicering']);
 exit;




