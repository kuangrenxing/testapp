<?php
header("content-type:text/html;charset=utf-8;");

require_once("../qq/comm/config.php");
include_once './functions.php';

//关注


$artist = $_GET['artist'];
if($artist == 0)
{
	header('Location: http://user.qzone.qq.com/622001561');
}
else
{
	header('Location: result.php?artist='.$artist);
}