<?php

function generatePassword( $length = 12, $special_chars = true, $extra_special_chars = false ) {
	$chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
	if ( $special_chars )
		$chars .= '!@#$%^&*()';
	if ( $extra_special_chars )
		$chars .= '-_ []{}<>~`+=,.;:/?|';

	$password = '';
	for ( $i = 0; $i < $length; $i++ ) {
		$password .= substr($chars, rand(0, strlen($chars) - 1), 1);
	}

	return $password;
}

function getClientIP()
{
	if (isset ( $_SERVER )) {
            if (isset ( $_SERVER ['HTTP_X_FORWARDED_FOR'] )) {
                $aIps = explode ( ',', $_SERVER ['HTTP_X_FORWARDED_FOR'] );
                foreach ( $aIps as $sIp ) {
                    $sIp = trim ( $sIp );
                    if ($sIp != 'unknown') {
                        $sRealIp = $sIp;
                        break;
                    }
                }
            } elseif (isset ( $_SERVER ['HTTP_CLIENT_IP'] )) {
                $sRealIp = $_SERVER ['HTTP_CLIENT_IP'];
            } else {
                if (isset ( $_SERVER ['REMOTE_ADDR'] )) {
                    $sRealIp = $_SERVER ['REMOTE_ADDR'];
                } else {
                    $sRealIp = '0.0.0.0';
                }
            }
        } else {
            if (getenv ( 'HTTP_X_FORWARDED_FOR' )) {
                $sRealIp = getenv ( 'HTTP_X_FORWARDED_FOR' );
            } elseif (getenv ( 'HTTP_CLIENT_IP' )) {
                $sRealIp = getenv ( 'HTTP_CLIENT_IP' );
            } else {
                $sRealIp = getenv ( 'REMOTE_ADDR' );
            }
        }
        return $sRealIp;
}

//针对QQ 设置type = 1
function GetImage($url, $filename = "" , $type = 0){ 
    if ($url == "") { 
        return false;
    } 
    if ($filename == ""){ 
        $ext = strrchr ( $url, "." ); 
        if ($ext != ".gif" && $ext != ".jpg"){
            return false; 
        } 
        $filename = time () . $ext;
    }

    //文件 保存路径 
    if ($type){
		$ch = curl_init();
		$timeout = 5;
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
		$img = curl_exec($ch);
		curl_close($ch);
    }else{
	    ob_start (); 
	    readfile ( $url ); 
	    $img = ob_get_contents (); 
	    ob_end_clean (); 
    }
    $size = strlen ( $img ); 
    //文件大小 
    $fp2 = @fopen ( $filename, "a" ); 
    fwrite ( $fp2, $img ); 
    fclose ( $fp2 ); 
    return $filename;
} 

function makeDeepDir($path)
{
	$dirs = explode("/" , $path);
	$root = $dirs[0]."/";
	for ($i =1; $i < count($dirs); $i ++)
	{
		$root .= $dirs[$i]."/";
		if (!is_dir($root))
		mkdir($root);
	}
}

function check_fans($result){
    $get_user_info = "https://graph.qq.com/user/check_page_fans?"
        . "access_token=" . $result["access_token"]
        . "&oauth_consumer_key=" . $result["appid"]
        . "&openid=" . $result["openid"]
        . "&format=json"
		. "&page_id=622001561";
    $info = get_url_contents($get_user_info);
    $arr = json_decode($info, true);

    return $arr;
}
function get_url_contents($url){
    if (ini_get("allow_url_fopen") == "1")
        return file_get_contents($url);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_URL, $url);
    $result =  curl_exec($ch);
    curl_close($ch);

    return $result;
}
function sendshuoshuo($result){
//	require_once("./qq/comm/config.php");
	$url='https://graph.qq.com/shuoshuo/add_topic';
	$data = array(
		"access_token" => $result['access_token'],
		"oauth_consumer_key" => $result['appid'],
		"openid" => $result['openid'],
		"richtype" => 1,
		"richval"=>'url='.$result["img"].'&width=438&height=572',
		"con" => $result['con'],
		"format" => 'json',
		"third_source"=>$result['third_source']
	);
    $info = get_url_contents_add($url,$data);
    $arr = json_decode($info, true);

    return $arr;
}
function get_url_contents_add($url,$data){
    $ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    //curl_setopt($ch, CURLOPT_URL, $url);
    $result =  curl_exec($ch);
    curl_close($ch);

    return $result;
}
function add_share($result){
//	require_once("./qq/comm/config.php");
	$url = 'https://graph.qq.com/share/add_share';
	$data = array(
		"access_token" => $result['access_token'],
		"oauth_consumer_key" => $result['appid'],
		"openid" => $result['openid'],
		"title" => $result['title'],
		"url" => $result['url'],
		"comment" => $result['comment'],
		"summary" => $result['summary'],
		"images" => $result['images'],
		"format" => 'json',
		"source" => '1',
		"type" => '4',
		"playurl" => '',
		"site" => 'http://www.tuolar.com/'
	);
	$info = get_url_contents_add($url,$data);
//	$info = post_url_contents_add($url,$data);
    $arr = json_decode($info, true);

    return $arr;
}

function add_pic_t($result){
	$url = 'https://graph.qq.com/t/add_pic_t';
	$data = array(
		"access_token" => $result["access_token"],
		"oauth_consumer_key" => $result["appid"],
		"openid" => $result["openid"],
		"format" => 'json',
		"content" => $result['content'],
		"clientip" => getClientIP(),
		"pic" => $result['pic'],
		"syncflag" => 0
	);
	$info = get_url_contents_add($url,$data);
    $arr = json_decode($info, true);

    return $arr;
}

function upload($result){
	$sUrl = "https://graph.qq.com/t/add_pic_t";
	$aPOSTParam = array(
		"access_token" => $result["access_token"],
		"oauth_consumer_key" => $result["appid"],
		"openid" => $result["openid"],
		"format" => "json",
		"content" => $result['content'],
		"clientip" => getClientIP(),
		"syncflag" => 0
	);
	$aFileParam = array(
		"pic" => $result['pic']
	);
	
    set_time_limit(0);
    $oCurl = curl_init();
    if(stripos($sUrl,"https://")!==FALSE){
        curl_setopt($oCurl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($oCurl, CURLOPT_SSL_VERIFYHOST, false);
    }
    $aPOSTField = array();
    foreach($aPOSTParam as $key=>$val){
        if(preg_match("/^@/i",$val)>0){
            $aPOSTField[$key] = " ".$val;
        }else{
            $aPOSTField[$key]= $val;
        }
    }
    foreach($aFileParam as $key=>$val){
        $aPOSTField[$key] = "@".$val; //此处对应的是文件的绝对地址
    }
    curl_setopt($oCurl, CURLOPT_URL, $sUrl);
    curl_setopt($oCurl, CURLOPT_POST, true);
    curl_setopt($oCurl, CURLOPT_RETURNTRANSFER, 1 );
    curl_setopt($oCurl, CURLOPT_POSTFIELDS, $aPOSTField);
    $sContent = curl_exec($oCurl);
    $aStatus = curl_getinfo($oCurl);
    curl_close($oCurl);
    return $sContent;
}

function get($sUrl,$aGetParam){
//    global $aConfig;
    $oCurl = curl_init();
    if(stripos($sUrl,"https://")!==FALSE){
        curl_setopt($oCurl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($oCurl, CURLOPT_SSL_VERIFYHOST, FALSE);
    }
    $aGet = array();
    foreach($aGetParam as $key=>$val){
        $aGet[] = $key."=".urlencode($val);
    }
    curl_setopt($oCurl, CURLOPT_URL, $sUrl."?".join("&",$aGet));
    curl_setopt($oCurl, CURLOPT_RETURNTRANSFER, 1 );
    $sContent = curl_exec($oCurl);
    $aStatus = curl_getinfo($oCurl);
    curl_close($oCurl);
    return $sContent;
//    if(intval($aConfig["debug"])===1){
//        echo "<tr><td class='narrow-label'>请求地址:</td><td><pre>".$sUrl."</pre></td></tr>";
//        echo "<tr><td class='narrow-label'>GET参数:</td><td><pre>".var_export($aGetParam,true)."</pre></td></tr>";
//        echo "<tr><td class='narrow-label'>请求信息:</td><td><pre>".var_export($aStatus,true)."</pre></td></tr>";
//        if(intval($aStatus["http_code"])==200){
//            echo "<tr><td class='narrow-label'>返回结果:</td><td><pre>".$sContent."</pre></td></tr>";
//            if((@$aResult = json_decode($sContent,true))){
//                echo "<tr><td class='narrow-label'>结果集合解析:</td><td><pre>".var_export($aResult,true)."</pre></td></tr>";
//            }
//        }
//    }
//    if(intval($aStatus["http_code"])==200){
//        return $sContent;
//    }else{
//        echo "<tr><td class='narrow-label'>返回出错:</td><td><pre>".$aStatus["http_code"].",请检查参数或者确实是腾讯服务器出错咯。</pre></td></tr>";
//        return FALSE;
//    }
}

/*
 * POST 请求
 */
function post($sUrl,$aPOSTParam){
//    global $aConfig;
    $oCurl = curl_init();
    if(stripos($sUrl,"https://")!==FALSE){
        curl_setopt($oCurl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($oCurl, CURLOPT_SSL_VERIFYHOST, false);
    }
    $aPOST = array();
    foreach($aPOSTParam as $key=>$val){
        $aPOST[] = $key."=".urlencode($val);
    }
    curl_setopt($oCurl, CURLOPT_URL, $sUrl);
    curl_setopt($oCurl, CURLOPT_RETURNTRANSFER, 1 );
    curl_setopt($oCurl, CURLOPT_POST,true);
    curl_setopt($oCurl, CURLOPT_POSTFIELDS, join("&", $aPOST));
    $sContent = curl_exec($oCurl);
    $aStatus = curl_getinfo($oCurl);
    curl_close($oCurl);
    return $sContent;
//    if(intval($aConfig["debug"])===1){
//        echo "<tr><td class='narrow-label'>请求地址:</td><td><pre>".$sUrl."</pre></td></tr>";
//        echo "<tr><td class='narrow-label'>POST参数:</td><td><pre>".var_export($aPOSTParam,true)."</pre></td></tr>";
//        echo "<tr><td class='narrow-label'>请求信息:</td><td><pre>".var_export($aStatus,true)."</pre></td></tr>";
//        if(intval($aStatus["http_code"])==200){
//            echo "<tr><td class='narrow-label'>返回结果:</td><td><pre>".$sContent."</pre></td></tr>";
//            if((@$aResult = json_decode($sContent,true))){
//                echo "<tr><td class='narrow-label'>结果集合解析:</td><td><pre>".var_export($aResult,true)."</pre></td></tr>";
//            }
//        }
//    }
//    if(intval($aStatus["http_code"])==200){
//        return $sContent;
//    }else{
//        echo "<tr><td class='narrow-label'>返回出错:</td><td><pre>".$aStatus["http_code"].",请检查参数或者确实是腾讯服务器出错咯。</pre></td></tr>";
//        return FALSE;
//    }
}

function upload_add_weibo($sUrl,$aPOSTParam,$aFileParam){
    //防止请求超时
//    global $aConfig;
    set_time_limit(0);
    $oCurl = curl_init();
    if(stripos($sUrl,"https://")!==FALSE){
        curl_setopt($oCurl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($oCurl, CURLOPT_SSL_VERIFYHOST, false);
    }
    $aPOSTField = array();
    foreach($aPOSTParam as $key=>$val){
        if(preg_match("/^@/i",$val)>0){
            $aPOSTField[$key] = " ".$val;
        }else{
            $aPOSTField[$key]= $val;
        }
    }
    foreach($aFileParam as $key=>$val){
        $aPOSTField[$key] = "@".$val; //此处对应的是文件的绝对地址
    }
    curl_setopt($oCurl, CURLOPT_URL, $sUrl);
    curl_setopt($oCurl, CURLOPT_POST, true);
    curl_setopt($oCurl, CURLOPT_RETURNTRANSFER, 1 );
    curl_setopt($oCurl, CURLOPT_POSTFIELDS, $aPOSTField);
    $sContent = curl_exec($oCurl);
    $aStatus = curl_getinfo($oCurl);
    curl_close($oCurl);
    return $sContent;
//    if(intval($aConfig["debug"])===1){
//        echo "<tr><td class='narrow-label'>请求地址:</td><td><pre>".$sUrl."</pre></td></tr>";
//        echo "<tr><td class='narrow-label'>POST参数:</td><td><pre>".var_export($aPOSTParam,true)."</pre></td></tr>";
//        echo "<tr><td class='narrow-label'>文件参数:</td><td><pre>".var_export($aFileParam,true)."</pre></td></tr>";
//        echo "<tr><td class='narrow-label'>请求信息:</td><td><pre>".var_export($aStatus,true)."</pre></td></tr>";
//        if(intval($aStatus["http_code"])==200){
//            echo "<tr><td class='narrow-label'>返回结果:</td><td><pre>".$sContent."</pre></td></tr>";
//            if((@$aResult = json_decode($sContent,true))){
//                echo "<tr><td class='narrow-label'>结果集合解析:</td><td><pre>".var_export($aResult,true)."</pre></td></tr>";
//            }
//        }
//    }
//    if(intval($aStatus["http_code"])==200){
//        return $sContent;
//    }else{
//        echo "<tr><td class='narrow-label'>返回出错:</td><td><pre>".$aStatus["http_code"].",请检查参数或者确实是腾讯服务器出错咯。</pre></td></tr>";
//        return FALSE;
//    }
}

function download($sUrl,$sFileName){
    $oCurl = curl_init();
    global $aConfig;
    set_time_limit(0);
    $oCurl = curl_init();
    if(stripos($sUrl,"https://")!==FALSE){
        curl_setopt($oCurl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($oCurl, CURLOPT_SSL_VERIFYHOST, false);
    }
    curl_setopt($oCurl, CURLOPT_USERAGENT, $_SERVER["HTTP_USER_AGENT"] ? $_SERVER["HTTP_USER_AGENT"] : "Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.2.7) Gecko/20100625 Firefox/3.6.7");
    curl_setopt($oCurl, CURLOPT_URL, $sUrl);
    curl_setopt($oCurl, CURLOPT_REFERER, $sUrl);
    curl_setopt($oCurl, CURLOPT_AUTOREFERER, true);
    curl_setopt($oCurl, CURLOPT_RETURNTRANSFER, 1 );
    $sContent = curl_exec($oCurl);
    $aStatus = curl_getinfo($oCurl);
    curl_close($oCurl);
    file_put_contents($sFileName,$sContent);
    if(intval($aConfig["debug"])===1){
        echo "<tr><td class='narrow-label'>请求地址:</td><td><pre>".$sUrl."</pre></td></tr>";
        echo "<tr><td class='narrow-label'>请求信息:</td><td><pre>".var_export($aStatus,true)."</pre></td></tr>";
    }
    return(intval($aStatus["http_code"])==200);
}

?>