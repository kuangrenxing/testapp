<?php
header("content-type:text/html;charset=utf-8;");

include_once './common/define.php';

session_start();

//检查授权
if(!isset($_SESSION["access_token"])){
	header('Location:'.BASEURL);
	exit;
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



//发分享参数
$title = "【读心术】";
$url = BASEURL;
$comment = "哇，真神奇，亲测真的有读心术哦，赶快来试试吧！网址 大家一起来测测吧。".BASEURL."（网址）";
$summary = "一个神奇的测试，不信来测测。";
$images = BASEURL."src/images/weibo/".$image;


//下一页面url
$nexturl = BASEURL."result.php";

//进行分享
header("Location: ".APIURL."share/add_share.php?title=$title&url=$url&comment=$comment&summary=$summary&images=$images&nexturl=$nexturl");
exit;



?>