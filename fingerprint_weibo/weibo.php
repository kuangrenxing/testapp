<?php
header("content-type:text/html;charset=utf-8");
session_start();

include 'common/function.php';
include 'common/define.php';

$left = $_GET['left'];
$right = $_GET['right'];

$count = $left+$right;
$luo = array();

$result = getResult($count,$left,$right);
$content = "刚刚做了一个超级有趣的测试，指纹竟然也可以测试性格命运，大家一起来测测吧。".BASEURL."（网址）";
$pic_url =  BASEURL."src/images/result/".$result['image'];
$nexturl = BASEURL."result.php";
$_SESSION['left'] = $left;
$_SESSION['right'] = $right;

header("location: ".APIURL.'weibo.php?content='.$content.'&pic_url='.$pic_url.'&nexturl='.$nexturl);
exit;