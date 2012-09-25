<?php
include_once 'common/define.php';
include_once 'class/saetv2.ex.class.php';

//打开session
session_start();

header("content-type:text/html;charset=utf-8");


$o = new SaeTOAuthV2( WB_AKEY , WB_SKEY );

if (isset($_REQUEST['code'])) {
	$keys = array();
	$keys['code'] = $_REQUEST['code'];
	$keys['redirect_uri'] = $_SESSION['WB_CALLBACK_URL'];
	try {
		$token = $o->getAccessToken( 'code', $keys ) ;
	} catch (OAuthException $e) {
	}
}

if ($token) {//授权OK
	$_SESSION['token'] = $token;
	setcookie( 'weibojs_'.$o->client_id, http_build_query($token) );
		
		
	$c = new SaeTClientV2( WB_AKEY , WB_SKEY , $_SESSION['token']['access_token'] );
	$uid_get = $c->get_uid();
	$uid = $uid_get['uid'];
	$user_message = $c->show_user_by_id( $uid);//根据ID获取用户等基本信息
		
 	$_SESSION['userinfo'] = $user_message;	
 	$_SESSION['userinfo']['wb_app_connweifushi'] = $_SESSION['WB_APP_CONN_WEIFUSHI'];
		
	//用户信息写入数据库
 	if(isset($_SESSION['afterurl']))
 	{
 		//进行注册
 		header('Location: '.REGURL."?afterurl=".$_SESSION['afterurl']);
 	}
 	else
 	{
 		echo "变量afterurl已经失效，请返回";
 		exit;
 	}
 	
 	
 	
 	
}else{
			echo "授权失败";
		}
