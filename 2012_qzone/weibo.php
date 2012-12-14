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
if(isset($_SESSION['val']) == false)
{
	header("location: ".BASEURL);
	exit;
}
$val = $_SESSION['val'];



//发分享参数
$title = "2012世界末日  十二星座怎么过";
$url = BASEURL;
$comment = "刚刚做了一个超级有趣的测试，2012世界末日  十二星座怎么过，大家一起来测测吧。".BASEURL;
$summary = "不论信与不信，世界末日最后终究会不会来，2012的预言都是让我们学会更加珍惜眼前人，珍惜所过的每一天";
$images = BASEURL."src/images/".$val.".jpg";


//下一页面url
$nexturl = BASEURL."checkfollow.php";

//进行分享
header("Location: ".APIURL."share/add_share.php?title=$title&url=$url&comment=$comment&summary=$summary&images=$images&nexturl=$nexturl");
exit;



?>