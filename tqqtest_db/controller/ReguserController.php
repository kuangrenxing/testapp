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
		$newUser['username']  	= $wbUinfo['nick'];
		$newUser['email']  		= $email = "qz_".strtolower($wbUinfo["id"])."@qq.com";
		$newUser['head_pic'] 	= $wbUinfo['head'].'/120';
		$newUser['reg_ip'] 		= $newUser['log_ip'] =Globals::getClientIp(false);
	
		$newUser['connfrom'] 	= $wbUinfo['wb_app_connweifushi'];
		$newUser['sex'] = $wbUinfo['sex'] == 1 ? 1 : 2;
		$newUser['time_created']= $newUser['log_time'] = time();
		$newUser['head_pic']	.=".jpg";
		$newUser['province'] 	= $this->getState("common/LocList.xml", $wbUinfo['province_code']);
		$newUser['city'] 	= "";
	
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
			$conn['connuid'] 	= 0;
			$conn['connuname'] 	= $wbUinfo['nick'];
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
			$_SESSION['userinfo']['head_pic'] = $userInfo['head_pic'];
			
			$conn['type'] 	= CONNECT_TYPE_QQ;
			$conn['uid'] 	= $uid;
			$conn['connuid'] 	= 0;
			$conn['connuname'] 	= $wbUinfo['nick'];;
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
	 * 得到xml 中的省份名Name
	* codeId 省份属性
	*/
	public function getState($file,$codeId)
	{
		$xmlUrl = $file; // XML feed file/URL
		$xmlStr = file_get_contents($xmlUrl);
	
		$xml = simplexml_load_string($xmlStr);
	
		$statesCount = count($xml->CountryRegion[0]->children());//中国多少省
	
		for($i=0;$i<$statesCount;$i++)
		{
			$states = $xml->CountryRegion[0]->State[$i];
		
			foreach($states->attributes() as $attr => $val)
			{
			//得到codeId所在的省对象
				if($attr == 'Code' && $val==$codeId)
				{
				//得到省的Name属性
					foreach($states->attributes() as $a=>$b)
					{
						if($a == 'Name')
						{
							return $b;
						}
					}
				}
			}	
		}
	}
	
	protected function out()
	{
		parent::out();
	}
}

Config::extend('ReguserController', 'Controller');
