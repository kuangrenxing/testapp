<?php
Globals::requireClass('Controller');

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
		header("content-type:text/html;charset=utf-8");
		header('P3P:CP=CURa ADMa DEVa PSAo PSDo OUR BUS UNI PUR INT DEM STA PRE COM NAV OTC NOI DSP COR');
		
		$this->config['layoutEnabled'] = false;
		
	}
	
	protected function out()
	{
		parent::out();
	}
}

Config::extend('IndexController', 'Controller');
