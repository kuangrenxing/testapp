<?php
Globals::requireClass('Controller');
Globals::requireClass('saetv2.ex.class');

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
		
		if(isset($_SESSION['show']) == false || isset($_SESSION['token']['access_token']) == false)
		{
			$this->redirect(BASEURL);
		}
		else
		{
			//关注
			$c = new SaeTClientV2( WB_AKEY , WB_SKEY , $_SESSION['token']['access_token'] );
			$ret = $c->follow_by_id("1761623191");
			
		}
		
	}
	
	protected function out()
	{
		parent::out();
	}
}

Config::extend('ShowController', 'Controller');