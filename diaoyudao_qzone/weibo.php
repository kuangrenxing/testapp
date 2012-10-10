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
if(isset($_SESSION['image']) == false || isset($_GET['content']) == false)
{
	header("location: ".BASEURL);
	exit;
}
$image = $_SESSION['image'];
$_SESSION['content'] = $_GET['content'];
$content = $_GET['content'];



//发分享参数
$title = "【钓鱼岛】";
$url = BASEURL;
$comment = "钓鱼岛  中国的！！！ ，$content ";
$summary = "大家都来测一测自己内心深处对钓鱼岛事件的态度吧！";
$images = BASEURL."src/images/".$image;


//下一页面url
$nexturl = "http://www.tuolar.com";

//进行分享
header("Location: ".APIURL."share/add_share.php?title=$title&url=$url&comment=$comment&summary=$summary&images=$images&nexturl=$nexturl");
exit;



?>