<?php
Globals::requireClass('Controller');
Globals::requireClass('saetv2.ex.class');

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
		//打开session
		session_start();
		
		header("content-type:text/html;charset=utf-8");
		header('P3P:CP=CURa ADMa DEVa PSAo PSDo OUR BUS UNI PUR INT DEM STA PRE COM NAV OTC NOI DSP COR');
		
		$this->config['layoutEnabled'] = false;
		
		$o = new SaeTOAuthV2( WB_AKEY , WB_SKEY );
		
		if (isset($_REQUEST['code'])) {
			$keys = array();
			$keys['code'] = $_REQUEST['code'];
			$keys['redirect_uri'] = WB_CALLBACK_URL;
			try {
				$token = $o->getAccessToken( 'code', $keys ) ;
			} catch (OAuthException $e) {
			}
		}
		
		if ($token) {//授权OK	
			$_SESSION['token'] = $token;
			setcookie( 'weibojs_'.$o->client_id, http_build_query($token) );		
			
			
			$c = new SaeTClientV2( WB_AKEY , WB_SKEY , $_SESSION['token']['access_token'] );
			$uid_get = $c->get_uid();
			$uid = $uid_get['uid'];
			$user_message = $c->show_user_by_id( $uid);//根据ID获取用户等基本信息
			
			$_SESSION['userinfo'] = $user_message;
			//print_r($user_message);
			
			//用户信息写入数据库
			$userid=$this->regUser($_SESSION['userinfo']);
			$_SESSION['userinfo']['uid'] = $userid;
			
			//得到关注人列表			
			$friends = $c->friends_by_id($uid);
			
			$_SESSION['friends'] = $friends['users'];
			
			$friendsCount = count($friends['users']);
			$rand = rand(0, ($friendsCount-1));
			//随机关注人信息
			$randFriend = $friends['users'][$rand];
// 			print_r($rand);
// 			print_r($randFriend);	

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
			//发微博内容
			$hourPath='src/images';
			$content = "@".$randFriend['screen_name'].' '.$beforeContent."就要和".$randFriend['screen_name'].$result_content[$a]['content'].",你就可以重走青春路！".$afterContent.BASEURL;
			$showContent = "和@".$randFriend['screen_name'].' '.$textcontent.",你就可以重走青春路！";

			$pic_url = BASEURL.'/'.$hourPath.'/'.$imageFile; 
			print_r($content);
			print_r($pic_url);
			$upload = $c->upload($content, $pic_url);
			
			//用户查看信息
			$_SESSION['show']['showContent'] = $showContent;
			$_SESSION['show']['pic_url'] = $pic_url;
			
			//print_r($upload);
			//关注页
			$this->redirect(BASEURL.'attention.php');
		
		}else{
			echo "授权失败";
		}
		
		
		
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
		
		$newUser['connfrom'] 	= WB_APP_CONN_WEIFUSHI;
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

Config::extend('MainController', 'Controller');
