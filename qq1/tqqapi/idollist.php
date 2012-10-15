<?php
header("content-type:text/html;charset=utf-8;");

error_reporting(0);
require_once './class/Tencent.php';
require_once './common/config.php';
require_once './common/define.php';

OAuth::init($client_id, $client_secret);
Tencent::$debug = $debug;

//打开session
session_start();

if(isset($_GET['nexturl']) == false || isset($_GET['baseurl']) == false)
{
	echo 'nexturl or baseurl is null';
	exit;
}
	

if ($_SESSION['t_access_token'] || ($_SESSION['t_openid'] && $_SESSION['t_openkey'])) {//用户已授权

	//我收听的人列表
	
	$idollist = Tencent::api("friends/idollist",array('reqnum'=>'50','startindex'=>'3'));
	
	$idollist = json_decode($idollist,true);
	

	$_SESSION['idollist'] = $idollist;
	
	header('Location: '.$_GET['baseurl'].$_GET['nexturl']);
	
}
else
{
	
	header('Location: '.$_GET['baseurl']);
}
