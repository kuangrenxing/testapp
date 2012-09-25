<?php
header("content-type:text/html;charset=utf-8");
session_start();

include 'common/function.php';
include 'common/define.php';

//微博内容
$content = "";
//微博图片
$pic_url = "";
//下一页面
$nexturl = BASEURL."result.php";

//传给结果页的参数
$_SESSION['left'] = $left;
$_SESSION['right'] = $right;

header("location: ".APIURL.'weibo.php?content='.$content.'&pic_url='.$pic_url.'&nexturl='.$nexturl);
exit;