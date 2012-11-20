<?php
header("content-type:text/html;charset=utf-8;");
session_start();

include_once 'common/define.php';

$nexturl = BASEURL."weibo.php";

//下一页url
$_SESSION['afterurl'] = BASEURL.'weibo.php';
$_SESSION['WB_APP_CONN_WEIFUSHI'] = WB_APP_CONN_WEIFUSHI;
$code_url = $_SESSION['code_url'];

if(isset($_POST['number']))
{
	$_SESSION['number'] = $_POST['number'];
}
else
{
	header("location: ".BASEURL);
	exit;
}

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
         <!--测试题出题部分-->
         <div class="main2">
         	     	<img src="src/images/big_ji.jpg" id="J_image" class="big_result1 J_image"/>
                    <a href="<?php echo $code_url;?>" class="shareto"><img src="src/images/sina_check.jpg"/></a>
         </div>        
  	</div>
    </div>
  	<div class="ztfooter"><p>Copyright Tuolar.com All Rights Reserved</p></div>	
</div>
<script src="src/js/jquery-1.8.2.min.js"></script>
<script>
$(function(){
	var imgAttr = ['big_ji.jpg','big_ji_dai_xiong.jpg','big_xiong.jpg','big_xiong_dai_ji.jpg'];
	var pos = 0;
	var imglength = imgAttr.length;
	var repeatTime = 150;
	
	setTimeout(repeat,repeatTime);
	function repeat(){
		if(pos == imglength){
			pos = 0;
		}		
		document.getElementById("J_image").src="src/images/"+imgAttr[pos];
		pos++;

		setTimeout(arguments.callee,repeatTime);	
	}
	
});
</script>
</body>
</html>