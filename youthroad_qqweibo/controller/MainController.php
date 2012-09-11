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
		
		$this->config['layoutEnabled'] = false;
		
		$client_id = CLIENT_ID;
		$client_secret = CLIENT_SECRET;
		$debug = DEBUG;
		OAuth::init($client_id, $client_secret);
		Tencent::$debug = $debug;
		
		//打开session
		session_start();
		header('Content-Type: text/html; charset=utf-8');
		
		if (isset($_SESSION['t_access_token']) || ($_SESSION['t_openid'] && $_SESSION['t_openkey'])) {//用户已授权

			//获取用户信息
			$r = Tencent::api('user/info');
			
			$ret = json_decode($r, true);

			$_SESSION['userinfo']=$ret['data'];
			$_SESSION['userinfo']['id']=$ret['data']['openid'];			
			
			/* //收听
			$paramsListener = array(
					'name' => 'tuolarfashion',
					'format'=>'json'
					
										
			);
			$listener = Tencent::api('friends/add',$paramsListener, 'POST'); */									
			
				
			$uid=$this->regUser($_SESSION['userinfo']);
			$_SESSION['userinfo']['uid'] = $uid;
			//print_r($_SESSION);
			$fansFatmat = array(
					'reqnum'=>'72',
					'startindex'=>'0'
					);
			$fanslistRet = Tencent::api("friends/fanslist");
			$fanslist = json_decode($fanslistRet, true);
			//随机得到听众下标
			$fansCount = count($fanslist['data']['info']);
			$key = rand(0,$fansCount-1);
			
			
// 			print_r($fanslist['data']['info']);
// 			echo "<br><hr>";
			//听众信息
			$randfans = $fanslist['data']['info'][$key];
			
// 			print_r($randfans);
			
			$_SESSION['fanslist'] = $fanslist['data']['info'];
			$_SESSION['randfans'] = $randfans;
			
			//随机得到评语
			$beforeContent = "《北京青年》最近可火了，自从被青春撞了一下腰之后就隐隐作痛，你是否也想重走青春路？";
			$afterContent = "想知道你要怎么重走青春路吗，一起来测测吧";
			
			$result_content=array(
					0=>array(
							'content'=>"一起在高中教室里吃着火锅唱着歌",
							'weiboimage'=>'content_07.jpg',
					),
					1=>array(
							'content'=>'钓鱼岛狂跳最炫民族风，呼唤标哥一起来 ',
							'weiboimage'=>'satuation1.jpg',
					),
					2=>array(
							'content'=>'一起在高中班长面前放个屁',
							'weiboimage'=>'satuation2.jpg',
					),
					3=>array(
							'content'=>'一起去荒野求生，吃虫子，喝河水',
							'weiboimage'=>'satuation3.jpg',
					),
					4=>array(
							'content'=>'一起回到母校，把画好的黑板报擦掉嫁祸给别人',
							'weiboimage'=>'satuation7.jpg',
					),
					5=>array(
							'content'=>'化身美少女战士，代表月亮消灭班里的恶势力 ',
							'weiboimage'=>'satuation4.jpg',
					),
					6=>array(
							'content'=>'一起回到小学二年级，上课的时候光明正大的涂口红',
							'weiboimage'=>'satuation5.jpg',
					),
					7=>array(
							'content'=>'一起回到婴儿时期，啃自己的脚趾',
							'weiboimage'=>'satuation6.jpg',
					),
			);
			
			
			
			
			//随机得到下标
			$a=array_rand($result_content,1);
			//得到内容
			$textcontent=$result_content[$a]['content'];
			//得到标题
			// $newTitle=$result_content[$a]['title'];
			//得到图片
			$imageFile=$result_content[$a]['weiboimage'];
			
			//echo $randfans;
			//发微博	
			$hourPath='src/images';
			$content = "@".$randfans['name'].' '.$beforeContent."就要和".$randfans['nick'].$result_content[$a]['content'].",你就可以重走青春路！".$afterContent.BASEURL;
			$showContent = "和@".$randfans['nick'].$textcontent.",你就可以重走青春路！";
			$params = array(
					'content' => $content,
					'pic_url' => BASEURL.'/'.$hourPath.'/'.$imageFile,
					'showContent' => $showContent
			);
			$add = Tencent::api('t/add_pic_url', $params, 'POST');
			$add = json_decode($add, true);
			$_SESSION['show'] = $params;
			//print_r($_SESSION);			
			
			$_SESSION['add'] = $add;
			
			
			//关注页
			$this->redirect(BASEURL.'attention.php');
			
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
					$_SESSION['t_refresh_token'] = $out['refresh_token'];
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
		
		$newUser['connfrom'] 	= WB_APP_CONN_WEIFUSHI;
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
			$_SESSION['userinfo']['head_pic'] = $newUser['head_pic'];
			
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

Config::extend('MainController', 'Controller');
