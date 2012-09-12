<?php
Globals::requireClass('Controller');

class AttentionController extends Controller
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
		$this->config['viewEnabled'] 	= true;
		$this->config['layoutEnabled'] 	= false;

		//新浪微博Oauth
		header('P3P:CP=CURa ADMa DEVa PSAo PSDo OUR BUS UNI PUR INT DEM STA PRE COM NAV OTC NOI DSP COR');
		session_start();
		
		if(isset($_SESSION['friends']) == false || isset($_SESSION['userinfo']) == false)
		{
			$this->redirect(BASEURL);
		}
	}
	
	protected function out()
	{
		parent::out();
	}
}

Config::extend('AttentionController', 'Controller');