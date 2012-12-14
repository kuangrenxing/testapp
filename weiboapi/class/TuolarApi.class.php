<?php
//拖拉 api  by zz
class TLYuanDan
{
	public $http_code;

	public $url;

	public $host = "http://apptest.tuolar.com/yuandan/";

	public $timeout = 30;

	public $connecttimeout = 30;

	public $ssl_verifypeer = FALSE;

	public $format = 'json';

	public $decode_json = TRUE;

	public $http_info;

	public $useragent = 'Tuolar Api 1.0';

	public $debug = false;

	public static $boundary = '';

	function __construct() {

	}

	function base64decode($str) {
		return base64_decode(strtr($str.str_repeat('=', (4 - strlen($str) % 4)), '-_', '+/'));
	}

	function get($url, $parameters = array()) {
		$response = $this->tlRequest($url, 'GET', $parameters);
		if ($this->format === 'json' && $this->decode_json) {
			return json_decode($response, true);
		}
		return $response;
	}

	function post($url, $parameters = array(), $multi = false) {
		$response = $this->tlRequest($url, 'POST', $parameters, $multi );
		
		if ($this->format === 'json' && $this->decode_json) {
			return json_decode($response, true);
		}
		return $response;
	}

	function delete($url, $parameters = array()) {
		$response = $this->tlRequest($url, 'DELETE', $parameters);
		if ($this->format === 'json' && $this->decode_json) {
			return json_decode($response, true);
		}
		return $response;
	}

	function tlRequest($url, $method, $parameters, $multi = false) {

		if (strrpos($url, 'http://') !== 0 && strrpos($url, 'https://') !== 0) {
			$url = "{$this->host}{$url}";
		}
		
		switch ($method) {
			case 'GET':
				$url = $url . '?' . http_build_query($parameters);
				return $this->http($url, 'GET');
			default:
				$headers = array();
				if (!$multi && (is_array($parameters) || is_object($parameters)) ) {
					$body = http_build_query($parameters);
				} else {
					$body = self::build_http_query_multi($parameters);
					$headers[] = "Content-Type: multipart/form-data; boundary=" . self::$boundary;
				}
				
				return $this->http($url, $method, $body, $headers);
		}
	}

	function http($url, $method, $postfields = NULL, $headers = array()) {
		$this->http_info = array();
		$ci = curl_init();
		/* Curl settings */
		curl_setopt($ci, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);
		curl_setopt($ci, CURLOPT_USERAGENT, $this->useragent);
		curl_setopt($ci, CURLOPT_CONNECTTIMEOUT, $this->connecttimeout);
		curl_setopt($ci, CURLOPT_TIMEOUT, $this->timeout);
		curl_setopt($ci, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ci, CURLOPT_ENCODING, "");
		curl_setopt($ci, CURLOPT_SSL_VERIFYPEER, $this->ssl_verifypeer);
		curl_setopt($ci, CURLOPT_HEADERFUNCTION, array($this, 'getHeader'));
		curl_setopt($ci, CURLOPT_HEADER, FALSE);

		switch ($method) {
			case 'POST':
				curl_setopt($ci, CURLOPT_POST, TRUE);
				if (!empty($postfields)) {
					curl_setopt($ci, CURLOPT_POSTFIELDS, $postfields);
					$this->postdata = $postfields;
				}
				break;
			case 'DELETE':
				curl_setopt($ci, CURLOPT_CUSTOMREQUEST, 'DELETE');
				if (!empty($postfields)) {
					$url = "{$url}?{$postfields}";
				}
		}

		$headers[] = "API-RemoteIP: " . $_SERVER['REMOTE_ADDR'];
		curl_setopt($ci, CURLOPT_URL, $url );
		curl_setopt($ci, CURLOPT_HTTPHEADER, $headers );
		curl_setopt($ci, CURLINFO_HEADER_OUT, TRUE );

		$response = curl_exec($ci);
		$this->http_code = curl_getinfo($ci, CURLINFO_HTTP_CODE);
		$this->http_info = array_merge($this->http_info, curl_getinfo($ci));
		$this->url = $url;

		if ($this->debug) {
			echo "=====post data======\r\n";
			var_dump($postfields);

			echo '=====info====='."\r\n";
			print_r( curl_getinfo($ci) );

			echo '=====$response====='."\r\n";
			print_r( $response );
		}
		curl_close ($ci);
		return $response;
	}

	function getHeader($ch, $header) {
		$i = strpos($header, ':');
		if (!empty($i)) {
			$key = str_replace('-', '_', strtolower(substr($header, 0, $i)));
			$value = trim(substr($header, $i + 2));
			$this->http_header[$key] = $value;
		}
		return strlen($header);
	}

	public static function build_http_query_multi($params) {
		if (!$params) return '';

		uksort($params, 'strcmp');

		$pairs = array();

		self::$boundary = $boundary = uniqid('------------------');
		$MPboundary = '--'.$boundary;
		$endMPboundary = $MPboundary. '--';
		$multipartbody = '';

		foreach ($params as $parameter => $value) {
			$multipartbody .= $MPboundary . "\r\n";
			$multipartbody .= 'content-disposition: form-data; name="' . $parameter . "\"\r\n\r\n";
			$multipartbody .= $value."\r\n";
		}

		$multipartbody .= $endMPboundary;
		return $multipartbody;
	}
}

//拖拉网api部分
class TuolarApi
{

	function __construct()
	{
		$this->tuolarApi = new TLYuanDan();
	}
	
	/**
	 * 更新、注册用户数据
	 *
	 * @param array $userinfo 需数据：email,username,head_pic,sex,reg_ip,province,city
	 * @param int $sns
	 * @param int $connfrom
	 * @param array $authinfo 需数据：connuid,connuname,token,token_secret,expiretime
	 * @return json 数据：用户id,用户名,用户头像
	 */
	
	/**
	 * demo
	 * 
	  $userinfo	= array(
			'email'		=> '',//必需
			'username'	=> '',//必需
			'head_pic'	=> '',//必需
			'sex'		=> '',
			'reg_ip'	=> '',//必需
			'province'	=> '',
			'city'		=> '',
		);
		
		$sns		= '';//必需
		$connfrom	= '';//必需
		$authinfo	= array(
			'connuid' 		=> '',//必需
			'connuname' 	=> '',
			'token' 		=> '',//必需
			'token_secret' 	=> '',
			'expiretime'	=> ''
		);
		require_once("../TuolarApi.class.php");
		$tuolarApi 	= new TuolarApi();
		$userdata	= $tuolarApi->update_user($userinfo , $sns , $connfrom , $authinfo);
		$userid		= isset($userdata['uid']) ? $userdata['uid'] : 0;
		$username	= isset($userdata['username']) ? $userdata['username'] : '';
		$userhead	= isset($userdata['head_pic']) ? $userdata['head_pic'] : '';
	 *
	 */
	public function update_user($userinfo , $sns = 0 , $connfrom = 0 , $authinfo = NULL)
	{
		$params = array();
		$params['user'] 	= $userinfo;
		$params['sns'] 		= $sns;
		$params['connfrom'] = $connfrom;
		$params['auth'] 	= $authinfo;
		
		return $this->tuolarApi->post( '?m=user', $params);		
	}
}
?>