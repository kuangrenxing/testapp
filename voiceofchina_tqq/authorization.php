<?php
/**
 * 此为PHP-SDK 2.0 的一个使用Demo,用于流程和接口调用演示
 * 请根据自身需求和环境进相应的安全和兼容处理，勿直接用于生产环境
 */
error_reporting(0);
require_once './class/Tencent.php';
require_once './common/config.php';
require_once './common/define.php';

OAuth::init($client_id, $client_secret);
Tencent::$debug = $debug;

//打开session
session_start();
header('Content-Type: text/html; charset=utf-8');

if ($_SESSION['t_access_token'] || ($_SESSION['t_openid'] && $_SESSION['t_openkey'])) {//用户已授权
    
    //获取用户信息
    $r = Tencent::api('user/info');
    $ret = json_decode($r, true);
 
   
    $_SESSION['userinfo']=$ret['data'];    
    $_SESSION['userinfo']['id']=$ret['data']['openid'];
    
    $_SESSION['userinfo']['wb_app_connweifushi'] = WB_APP_CONN_WEIFUSHI;
    //print_r($_SESSION);

    //exit;
    header('Location: '.REGURL."?afterurl=".AFTERAUTHURL);
    	
    /* //收听
     $paramsListener = array(
     		'name' => 'tuolarfashion',
     		'format'=>'json'
     			
    
     );
    $listener = Tencent::api('friends/add',$paramsListener, 'POST'); */
    	
    
//     $uid=$this->regUser($_SESSION['userinfo']);
//     $_SESSION['userinfo']['uid'] = $uid;
    
    
    
   
} else {//未授权
    $callback = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];//回调url
    if ($_GET['code']) {//已获得code
        $code = $_GET['code'];
        $openid = $_GET['openid'];
        $openkey = $_GET['openkey'];
        //获取授权token
        $url = OAuth::getAccessToken($code, $callback);
        $r = Http::request($url);
        parse_str($r, $out);
        //存储授权数据
        if ($out['access_token']) {
            $_SESSION['t_access_token'] = $out['access_token'];
            $_SESSION['t_expire_in'] = $out['expire_in'];
            $_SESSION['t_code'] = $code;
            $_SESSION['t_openid'] = $openid;
            $_SESSION['t_openkey'] = $openkey;
            
            //验证授权
            $r = OAuth::checkOAuthValid();
            if ($r) {
                header('Location: ' . $callback);//刷新页面
            } else {
                exit('<h3>授权失败,请重试</h3>');
            }
        } else {
            exit($r);
        }
    } else {//获取授权code
        if ($_GET['openid'] && $_GET['openkey']){//应用频道
            $_SESSION['t_openid'] = $_GET['openid'];
            $_SESSION['t_openkey'] = $_GET['openkey'];
            //验证授权
            $r = OAuth::checkOAuthValid();
            if ($r) {
                header('Location: ' . $callback);//刷新页面
            } else {
                exit('<h3>授权失败,请重试</h3>');
            }
        } else{
            $url = OAuth::getAuthorizeURL($callback);
            header('Location: ' . $url);
        }
    }
}