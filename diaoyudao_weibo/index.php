<?php
session_start();
include_once 'common/define.php';

if(isset($_SESSION['code_url']) == false)
{
	// 生成授权url $_SESSION['code_url'];
	header("Location: ".APIURL."?WB_CALLBACK_URL=".WB_CALLBACK_URL."&nexturl=".BASEURL);
	exit;
}


//下一页url
$_SESSION['afterurl'] = BASEURL.'choice1.php';
$_SESSION['WB_APP_CONN_WEIFUSHI'] = WB_APP_CONN_WEIFUSHI;

$code_url = $_SESSION['code_url'];
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
         	<a href="<?php echo $code_url; ?>" class="kaishi"><img src="src/images/kaishiceshi.jpg"/></a>
         </div>        
  	</div>
    </div>
  	<div class="ztfooter"><p>Copyright Tuolar.com All Rights Reserved</p></div>	
</div>

</body>
</html>






