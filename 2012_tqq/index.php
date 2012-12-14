<?php
session_start();
include_once 'common/define.php';

$nexturl = BASEURL."weibo.php";
$code_url = APIURL."authorization.php?afterurl=".$nexturl."&wb_app_conn_weifushi=".WB_APP_CONN_WEIFUSHI;

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo TITLE;?></title>
<link href="src/css/style.css" rel="stylesheet" type="text/css" />
</head>
<body id="ztBodyBg">
<div id="ztcontainer">
    <div id="ztcontent">
    	<div class="box1">
         <div class="haed">
         	<div class="head_logo left"><a class="logo" title="拖拉网" href="http://www.tuolar.com"></a><div class="fashion_more"></div></div>
            <div class="sign right"></div>
         </div>  
         <div class="main1">
         		<p class="time">
                	<span>现在距离玛雅人预言的世界末日还有<span id="J_countdown"></span></span>
                </p>	
                <div id="divdown1"></div>
                <div class="constellation J_constellation">
                		<p class="xz J_xz" data-val="1"><span class="baiyang"></span><i>白羊座</i></p>
                        <p class="xz J_xz" data-val="2"><span class="jinniu"></span><i>金牛座</i></p>
                        <p class="xz J_xz" data-val="3"><span class="shuangzi"></span><i>双子座</i></p>
                        <p class="xz J_xz" data-val="4"><span class="juxie"></span><i>巨蟹座</i></p>
                        <p class="xz J_xz" data-val="5"><span class="shizi"></span><i>狮子座</i></p>
                        <p class="xz J_xz" data-val="6"><span class="chunv"></span><i>处女座</i></p>
                        
                        <p class="xz J_xz" data-val="7"><span class="tiancheng"></span><i>天秤座</i></p>
                        <p class="xz J_xz" data-val="8"><span class="tianxie"></span><i>天蝎座</i></p>
                        <p class="xz J_xz" data-val="9"><span class="sheshou"></span><i>射手座</i></p>
                        <p class="xz J_xz" data-val="10"><span class="mojie"></span><i>摩羯座</i></p>
                        <p class="xz J_xz" data-val="11"><span class="shuiping"></span><i>水瓶座</i></p>
                        <p class="xz J_xz" data-val="12"><span class="shuangyu"></span><i>双鱼座</i></p>
                </div>  
         </div>        
  	</div>
    </div>
  	<div class="ztfooter"><p>Copyright &copy Tuolar.com All Rights Reserved</p></div>	
</div>
<script src="src/js/jquery.min.js"></script>
<script src="src/js/countdown.js"></script>
</body>
</html>
        






