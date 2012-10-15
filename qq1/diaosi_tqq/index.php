<?php
session_start();
include_once 'common/define.php';

$nexturl = BASEURL."next.php";
$code_url = APIURL."authorization.php?afterurl=".$nexturl."&wb_app_conn_weifushi=".WB_APP_CONN_WEIFUSHI;

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo TITLE;?></title>
<link href="../../assets_testapp/diaosi/css/style.css" rel="stylesheet" type="text/css" />

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
         	<p class="diaosi">我是屌丝，我怕谁，真屌丝，不做表面功夫！测一测你是属于哪种屌丝吧。</p>
         	<a class="kaishi"><img src="../../assets_testapp/diaosi/images/244x58.jpg"/></a>
         </div>        
  	</div>
    </div>
  	<div class="ztfooter"><p>Copyright Tuolar.com All Rights Reserved</p></div>	
</div>

</body>
</html>






