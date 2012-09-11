<?php
Globals::requireClass('Controller');
Globals::requireTable('Sinapx');
Globals::requireTable('Sinauser');
Globals::requireTable('Comment');
Globals::requireTable('Pxstat');

Globals::requireClass('Tencent');

class LastController extends Controller
{
	protected $sinapx;
	protected $sinauser;
	protected $comment;
	protected $pxstat;
	
	public static $defaultConfig = array(
		'viewEnabled'	=> true,
		'layoutEnabled'	=> true,
		'title'			=> null
	);
	
	public function __construct($config = null)
	{
		parent::__construct($config);
		$this->sinapx 	= new SinapxTable($config);
		$this->sinauser = new SinauserTable($config);
		$this->comment	= new CommentTable($config);
		$this->pxstat	= new PxstatTable($config);
	}
	
	public function indexAction()
	{
		$this->config['layoutEnabled'] = false;
		
		$app 	 = $this->getIntParam('appid');
		$pyu 	 = $this->getParam('pyu');//内容
// 		echo 'appid:'.$app;exit;
		$appInfo = $this->sinapx->getRow($app);
		$follow  = $this->getParam('followtl');
		$totl 	 = $this->getParam('totuolar');
		$pic 	 = $this->getParam('pic');//图片
		
		header("content-type:text/html;charset=utf-8");
		header('P3P:CP=CURa ADMa DEVa PSAo PSDo OUR BUS UNI PUR INT DEM STA PRE COM NAV OTC NOI DSP COR');
		
		session_start();
		
		
		$client_id = CLIENT_ID;
		$client_secret = CLIENT_SECRET;
		$debug = DEBUG;
		OAuth::init($client_id, $client_secret);
		Tencent::$debug = $debug;
		

		
		if (isset($_SESSION['t_access_token']) || ($_SESSION['t_openid'] && $_SESSION['t_openkey'])) {//用户已授权
			
			//发QQ微博
			$params = array(
					'content' => $pyu.' 你也来测测吧！http://app.t.qq.com/app/playtest/801231700',
					'pic_url' => $pic
			);
			$r = Tencent::api('t/add_pic_url', $params, 'POST');
			
		}
		else 
		{
			$this->redirectToController("index");
		}
		
// 		if ($totl && $totl == 1)
		if(false)//默认是在tuolar.com中发微博
		{
			
			$post=array();
			
			$post['px_id'] = $appInfo['pxid'];
// 			$post['username'] = $_SESSION['userinfo']['nick'];
			$post['uid'] = $_SESSION['userinfo']['uid'];
// 			$post['head_pic'] = $_SESSION['userinfo']['head'].'/120';
			$post['comment'] = $pyu;
			$post['time_created'] = time();
				//发拖拉微博
			$commID = $this->comment->add($post , true);
				
			if ($commID){
				$this->pxstat->update(array('comment = comment + 1') , array('px_id' => $appInfo['pxid']));
			}
		}

		$this->view->userinfo=$_SESSION['userinfo'];

		
	}
	
	
	protected function out()
	{
		parent::out();
	}
}

Config::extend('LastController', 'Controller');