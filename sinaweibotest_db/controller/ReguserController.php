<?php
Globals::requireClass('Controller');

Globals::requireTable('Sinapx');
Globals::requireTable('User');
Globals::requireTable('Connect');

class ReguserController extends Controller
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
		$this->config['layoutEnabled'] = false;
		
		session_start();
		if(isset($_GET['afterurl']))
			$afterurl = $_GET['afterurl'];
		else
		{
			echo "请定义afterurl";
		}
		
		if(isset($_SESSION['userinfo'])==false)
		{
			echo "没有用户信息！";
		}
		else
		{
		
			$uid = $this->regUser($_SESSION['userinfo']);
			$_SESSION['userinfo']['uid'] = $uid;

			$this->redirect($afterurl);
		}
		
		exit;
	}
	
	

	protected function regUser($wbUinfo)
	{
		header('P3P:CP=CURa ADMa DEVa PSAo PSDo OUR BUS UNI PUR INT DEM STA PRE COM NAV OTC NOI DSP COR');
	
		if (!isset($wbUinfo['id']) || !$wbUinfo['id'])
			return false;
		

		$newUser['password']  	= generatePassword(8);
		$newUser['username']  	= $wbUinfo['screen_name'];//用户昵称
		//email格式：QQ空间为qz_***@qq.com 		新浪weibo:***@sina.com
		$newUser['email']  		= $email = "".strtolower($wbUinfo["id"])."@sina.com";
		//图像
// 		$wbUinfo['profile_image_url'] = str_replace('/50/', '/180/', $wbUinfo['profile_image_url']);
		$newUser['head_pic'] 	= $wbUinfo['profile_image_url'];
		
		$newUser['reg_ip'] 		= $newUser['log_ip'] =Globals::getClientIp(false);
		
		$newUser['connfrom'] 	= $wbUinfo['wb_app_connweifushi'];
		//性别
		$newUser['sex'] = $wbUinfo['gender'] == 'm' ? 1 : 2;
		$newUser['time_created']= $newUser['log_time'] = time();
		$newUser['head_pic']	.=".jpg";
		$newUser['province'] 	= $this->getState("common/provinces.json.txt", $wbUinfo['province']);
		$newUser['city'] 	= $this->getCity("common/provinces.json.txt", $wbUinfo['province'], $wbUinfo['city']);
		
		if (strpos($newUser['head_pic'] , "/50/") !== false){
			$newUser['head_pic'] = str_replace("/50/" , "/180/" , $newUser['head_pic']);
			
		}
		
		
		$fieldsUser="id,head_pic,stgle";
		//查询用户
		$userInfo = $this->user->getRowWithFields($fieldsUser,array('email' => $newUser['email']));
		
		//用户不存在 记录connect数据
		if (!$userInfo)
		{
			$imgPath = "../../img/user/".date("Ym")."/".date('d')."/".date("g")."/";
			if (!is_dir($imgPath))
			{
				makeDeepDir($imgPath);
			}
			$imgUrl = $imgPath.date("YmdHis").rand(10,99).strrchr($newUser['head_pic'], '.');
			$imgUrl_128 = substr($imgUrl , 0 , strrpos($imgUrl , '.'))."_128.".substr(strrchr($imgUrl, "."), 1);
			$imgUrl_80 = substr($imgUrl , 0 , strrpos($imgUrl , '.'))."_80.".substr(strrchr($imgUrl, "."), 1);
			$imgUrl_36 = substr($imgUrl , 0 , strrpos($imgUrl , '.'))."_36.".substr(strrchr($imgUrl, "."), 1);
			$headImg = GetImage($newUser['head_pic'] , $imgUrl , 1);			
			$headImg_128 = GetImage($newUser['head_pic'] , $imgUrl_128 , 1);		
			$headImg_80 = GetImage($newUser['head_pic'] , $imgUrl_80 , 1);
			$headImg_36 = GetImage($newUser['head_pic'] , $imgUrl_36 , 1);
			$headImgUrl = substr($headImg , 4);
	
			$newUser['head_pic'] = str_replace('../.', '', $imgUrl);
			$_SESSION['userinfo']['head_pic'] = $newUser['head_pic'];
			$uid = $userID  = $this->user->add($newUser , true);
			
			
			$conn['type'] 	= CONNECT_TYPE_QQ;
			$conn['uid'] 	= $uid;
			$conn['connuid'] 	= $wbUinfo['id'];
			$conn['connuname'] 	= $newUser['username'];
			$conn['isbind'] = 1;
			$conn['issync'] = 1;
			$conn['token'] 	= $wbUinfo['id'];
			$conn['token_secret'] = '';
			$conn['createtime'] = $conn['updatetime'] = time();
			$stgle = 0;		
			
			$this->connect->add($conn , false);
			return $uid;
		}
		else
		{//用户存在 更新connect数据		
			
			$uid = $userInfo['id'];
			$stgle = $userInfo['stgle'];
			$headImgUrl = $userInfo['head_pic'];
			
			//$_SESSION['head_pic'] = $userInfo['head_pic'];
			$_SESSION['userinfo']['head_pic'] = $newUser['head_pic'];
			
			$conn['type'] 	= CONNECT_TYPE_QQ;
			$conn['uid'] 	= $uid;
			$conn['connuid'] 	= $wbUinfo['id'];
			$conn['connuname'] 	= $newUser['username'];
			$conn['isbind'] = 1;
			$conn['issync'] = 1;
		//	$conn['head_pic'] = $headImgUrl;
			$conn['token'] 	= $wbUinfo['id'];
			$conn['token_secret'] = '';
			$conn['updatetime'] = time();
			
			$this->user->update(array('username' => $newUser['username'] , 'sex'=> $newUser['sex'], 'head_pic' => $headImgUrl) , $uid);
			$this->connect->update(array('connuid' => $conn['connuid'] , 'connuname' => $conn['connuname'] , 'token' => $conn['token'] , 'token_secret' => $conn['token_secret'] , 'isbind' => 0 , 'issync' => 0 , 'updatetime' => $conn['updatetime']) , array('type' => $conn['type'] , 'uid' => $conn['uid']));
			return $uid;
		}
	
	}
	
	/*
	 * 得到json 中的省份名
	 * $provinceId 省份属性
	 */
public function getState($file,$provinceId)
{
	$provincesJson = file_get_contents($file);
	$provincesArray = json_decode($provincesJson,true);
	$result = "";
	foreach($provincesArray['provinces'] as $i =>$v)
	{
		if($v['id'] == $provinceId)
		{
			$result = $v['name'];
		}
	
	}
	return $result;
}
/*
 * 得到json 中的城市名
* $provinceId 省份属性
* $cityId 城市Id
*/
public function getCity($file,$provinceId,$cityId)
{
	$provincesJson = file_get_contents($file);
	$provincesArray = json_decode($provincesJson,true);	
	$result = "";
	$province = '';
	foreach($provincesArray['provinces'] as $i =>$v)
	{
		if($v['id'] == $provinceId)
		{
			$province = $v;
		}

	}
	foreach ($province['citys'] as $i=>$v)
	{
		foreach ($v as $ci=>$cv)
		{
			if($ci == $cityId)
				$result = $cv;
		}
	}
	return $result;
}
	
	protected function out()
	{
		parent::out();
	}
}

Config::extend('ReguserController', 'Controller');
