<?php
header("content-type:text/html;charset=utf-8;");

include_once './common/define.php';
// include_once './common/function.php';

session_start();

//检查授权
if(!isset($_SESSION["access_token"])){
	header('Location:'.BASEURL);
	exit;
}

//必要的参数
if(isset($_SESSION['left']) == false || isset($_SESSION['right']) == false)
{
	header("location: ".BASEURL);
	exit;
}
$left = $_SESSION['left'];
$right = $_SESSION['right'];

$count = $left+$right;
$result = getResult($count,$left,$right);

//发分享参数
$title = "指纹的秘密";
$url = BASEURL;
$comment = "刚刚做了一个超级有趣的测试，指纹竟然也可以测试性格命运，大家一起来测测吧。".BASEURL;
$summary = "看一个人的性格与命运，我们经常从血型或星座入手，很少从指纹入手。其实指纹与性格、命运也有密切的联系。";
$images = BASEURL."src/images/result/".$result['image'];


//下一页面url
$nexturl = BASEURL."attention.php";

//进行分享
header("Location: ".APIURL."share/add_share.php?title=$title&url=$url&comment=$comment&summary=$summary&images=$images&nexturl=$nexturl");
exit;



?>