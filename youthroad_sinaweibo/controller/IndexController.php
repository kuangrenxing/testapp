<?php
Globals::requireClass('Controller');
Globals::requireClass('saetv2.ex.class');

class IndexController extends Controller
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
		
		header("content-type:text/html;charset=utf-8");
		header('P3P:CP=CURa ADMa DEVa PSAo PSDo OUR BUS UNI PUR INT DEM STA PRE COM NAV OTC NOI DSP COR');
		
		$this->config['layoutEnabled'] = false;		
		
		
		$o = new SaeTOAuthV2( WB_AKEY , WB_SKEY );
		
		$code_url = $o->getAuthorizeURL( WB_CALLBACK_URL );
		
		$this->view->code_url = $code_url;
		
	}
	
	protected function out()
	{
		parent::out();
	}
}

Config::extend('IndexController', 'Controller');
