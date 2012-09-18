<?php
session_start();
include_once 'common/config.php';
include_once 'common/define.php';
require_once('./functions.php');
require_once("../qq/comm/config.php");

if(isset($_SESSION['song']) == false || $_GET['artist'] == false || isset($_SESSION["access_token"]) == false || isset($_SESSION["appid"]) == false || isset($_SESSION["openid"]) == false)
{
	header('Location: '.BASEURL);
}

$result=array(
		"access_token" => $_SESSION["access_token"],
		"appid" => $_SESSION["appid"],
		"openid" => $_SESSION["openid"],
		'title' => '《中国好声音》 恐怕火星人都知道了，想知道哪位老师会为你转身，为你心动? 一起来测试吧',
		'url' => BASEURL,
		'comment' => "我得到".$artist[$_GET['artist']]['name']."导师认可：I WANT U ".$artist[$_GET['artist']]['content']."网址:".BASEURL,
		'summary' => '如果想实现音乐梦想，玩转中国好声音，马上行动吧',
		'images' => BASEURL.$artist[$_GET['artist']]['img']
);



$arr = array();
$arr = add_share($result);
//$aResult = json_decode($arr,true);


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>测试结果 - 中国好声音 - 应用小测试 - 拖拉网</title>
<link href="src/css/style1.css" rel="stylesheet" type="text/css" />
<script type="text/javascript"> 
window.onload=function(){ 
for(var ii=0; ii<document.links.length; ii++) document.links[ii].onfocus=function(){this.blur()} 
} 
</script>
</head>
 
<body id="ztBodyBg">
<div id="ztcontainer">
    <div id="ztcontent">
        <div class="BG2">
        	<div class="head">
            	<a class="logo" href="" target="_blank"><img title="拖拉网" src="src/images/haha_03.jpg"/></a>
                <a class="p1" target="_blank" href="http://tuolar.com"><img src="src/images/test_06.jpg" /></a>
            </div>
            <div class="content">
            	<h1>这首《<?php echo $_SESSION['song']; ?>》</span>得到了导师的认可，最后加入了</h1>
            	<div class="d5">
            	<img title="" class="m1" src="<?php echo $artist[$_GET['artist']]['img'];?>"/>
                <div class="d6">
                <h1><?php echo $artist[$_GET['artist']]['name'];?>老师</h1>
                <p class="p2"><?php echo $artist[$_GET['artist']]['content'];?></p>
                <a class="restart" href="<?php echo BASEURL;?>" target=""><img src="src/images/resetbegin.jpg"/></a>
                </div>
                </div>
            </div>
        </div>           
  	</div>
  	<div class="ztfooter"><p>Copyright Tuolar.com All Rights Reserved</p></div>	
</div>

</body>
</html>