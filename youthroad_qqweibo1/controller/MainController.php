<?php
Globals::requireClass('Controller');
Globals::requireClass('Tencent');

Globals::requireTable('Sinapx');
Globals::requireTable('User');
Globals::requireTable('Connect');





class MainController extends Controller
{
	protected $sinapx;
	protected $user;
	protected $connect;
	
	public static $defaultConfig = array(
		'viewEnabled'	=> true,
		'layoutEnabled'	=> true,
		'title'			=> null
	);
	
	public function __construct($config = null)
	{
		parent::__construct($config);
		$this->sinapx = new SinapxTable($config);
		$this->user				= new UserTable($config);
		$this->connect			= new ConnectTable($config);
	}
	
	public function indexAction()
	{
		header("content-type:text/html;charset=utf-8");
		header('P3P:CP=CURa ADMa DEVa PSAo PSDo OUR BUS UNI PUR INT DEM STA PRE COM NAV OTC NOI DSP COR');
		
		error_reporting(0);
		
		$client_id = CLIENT_ID;
		$client_secret = CLIENT_SECRET;
		$debug = DEBUG;
		OAuth::init($client_id, $client_secret);
		
		OAuth::init($client_id, $client_secret);
		Tencent::$debug = $debug;
		
		//打开session
		session_start();
		header( 'Content-Type: text/html; charset=utf-8' );
		
		if ($_SESSION[ 't_access_token'] || ($_SESSION[ 't_openid'] && $_SESSION['t_openkey' ])) {//用户已授权
		
			//获取用户信息
			$r = Tencent::api( 'user/info');
			$userinfo = json_decode($r, true);
			 
			//print_r($userinfo);
			$_SESSION[ 'userinfo'] = $userinfo[ 'data'];
			print_r($_SESSION);
			// 部分接口的调用示例
			/**
			 * 发表图片微博
			 * pic参数后跟图片的路径,以表单形式上传的为 : $_FILES['pic']['tmp_name']
			 * 服务器 目录下的文件为: dirname(__FILE__).'/logo.png'
			 * /
			 $params = array(
			 'content' => '测试发表一条图片微博'
			 );
			 $multi = array('pic' => dirname(__FILE__).'/logo.png');
			 $r = Tencent::api('t/add_pic', $params, 'POST', $multi);
			 echo $r;
			  
			 /**
			 * 发表图片微博
			 * 如果图片地址为网络上的一个可用链接
			 * 则使用add_pic_url接口
			 * /
			 $params = array(
			 'content' => '以链接形式发表一条图片微博',
			 'pic_url' => 'http://mat1.gtimg.com/www/iskin960/qqcomlogo.png'
			 );
			 $ r = Tencent::api('t/add_pic_url', $params, 'POST');
			 echo $r;
			*/
		} else { //未授权
			$callback = 'http://' . $_SERVER[ 'HTTP_HOST'] . $_SERVER['PHP_SELF' ];//回调url
			if ($_GET[ 'code']) { //已获得code
				$code = $_GET[ 'code'];
				$openid = $_GET[ 'openid'];
				$openkey = $_GET[ 'openkey'];
				//获取授权token
				$url = OAuth::getAccessToken($code, $callback);
				$r = Http::request($url);
				parse_str( $r, $out);
				//存储授权数据
				if ($out[ 'access_token']) {
					$_SESSION[ 't_access_token'] = $out['access_token' ];
					$_SESSION[ 't_refresh_token'] = $out['refresh_token' ];
					$_S ESSION['t_expire_in' ] = $out['expire_in' ];
					$_SESSION[ 't_code'] = $code;
					$_SESSION[ 't_openid'] = $openid;
					$_SESSION[ 't_openkey'] = $openkey;
					 
					//验证授权
					$r = OAuth::checkOAuthValid();
					if ($r) {
						header( 'Location: ' . $callback); //刷新页面
					} else {
						exit( '<h3>授权失败,请重试</h3>' );
					}
				} else {
					exit($r);
				}
			} else { //获取授权code
				if ($_GET[ 'openid'] && $_GET[ 'openkey']){ //应用频道
					$_SESSION[ 't_openid'] = $_GET[ 'openid'];
					$_SESSION[ 't_openkey'] = $_GET[ 'openkey'];
					//验证授权
					$r = OAuth::checkOAuthValid();
					if ($r) {
						header( 'Location: ' . $callback); //刷新页面
					} else {
						exit( '<h3>授权失败,请重试</h3>' );
					}
				} else{
					$url = OAuth::getAuthorizeURL($callback);
					header( 'Location: ' . $url);
				}
			}
		}
		
	}
	
	protected function out()
	{
		parent::out();
	}
}

Config::extend('MainController', 'Controller');
