<?php
header("content-type:text/html;charset=utf-8;");

include_once './common/define.php';
// include_once './common/config.php';
// include 'common/function.php';

require_once('./functions.php');
require_once("../qq/comm/config.php");

//必要的参数
if(isset($_GET['left']) == false || isset($_GET['right']) == false)
{
	header("location: ".BASEURL);
	exit;
}
$left = $_GET['left'];
$right = $_GET['right'];

$count = $left+$right;
$result = getResult($count,$left,$right);

//发分享参数
$result=array(
		"access_token" => $_SESSION["access_token"],
		"appid" => $_SESSION["appid"],
		"openid" => $_SESSION["openid"],
		'title' => '【指纹的秘密】',
		'url' => BASEURL,
		'comment' => "刚刚做了一个超级有趣的测试，指纹竟然也可以测试性格命运，大家一起来测测吧。".BASEURL."（网址）",
		'summary' => '看一个人的性格与命运，我们经常从血型或星座入手，很少从指纹入手。其实指纹与性格、命运也有密切的联系。',
		'images' => BASEURL."src/images/result/".$result['image']
);


//进行分享
$arr = add_share($result);

//下一页面url
$nexturl = BASEURL."result.php?left=".$left."&right=".$right;

header("location: ".$nexturl);
exit;
?>