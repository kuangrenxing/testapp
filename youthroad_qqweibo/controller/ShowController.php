<?php
Globals::requireClass('Controller');
Globals::requireClass('Tencent');

class ShowController extends Controller
{
	public static $defaultConfig = array(
		'viewEnabled'	=> true,
		'layoutEnabled'	=> true,
		'title'			=> null
	);
	
	public function __construct($config = null)
	{
		parent::__construct($config);
	}
	
	public function indexAction()
	{
		session_start();
		$this->config['viewEnabled'] 	= true;
		$this->config['layoutEnabled'] 	= false;

		//新浪微博Oauth
		header('P3P:CP=CURa ADMa DEVa PSAo PSDo OUR BUS UNI PUR INT DEM STA PRE COM NAV OTC NOI DSP COR');
		header("content-type:text/html;charset=utf-8;");
		
	
		
		$client_id = CLIENT_ID;
		$client_secret = CLIENT_SECRET;
		$debug = DEBUG;
		OAuth::init($client_id, $client_secret);
		Tencent::$debug = $debug;
		
		//打开session
		
		header('Content-Type: text/html; charset=utf-8');
		
		if (isset($_SESSION['t_access_token']) || ($_SESSION['t_openid'] && $_SESSION['t_openkey'])) {//用户已授权
		
			//获取用户信息
			$paramsListener = array(
					'name' => 'tuolarfashion',
					'format'=>'json'
					
										
			);
			$listener = Tencent::api('friends/add',$paramsListener, 'POST');
				
			$ret = json_decode($listener, true);
			
		}else
		{
			$this->redirect(BASEURL);
		}
		
	}
	
	protected function out()
	{
		parent::out();
	}
}

Config::extend('ShowController', 'Controller');