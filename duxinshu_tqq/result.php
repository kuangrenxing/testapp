<?php
header("content-type:text/html;charset=utf-8;");
session_start();

include_once 'common/define.php';

//必要的参数
if(isset($_SESSION['randPic']) == false)
{
	header("location: ".BASEURL);
	exit;
}

$randPicKey = $_SESSION['randPic'];

$pic = range(1,30);
if($pic[$randPicKey]<10)
{
	$image = '0'.$pic[$randPicKey].'a.png';
}
else
{
	$image = $pic[$randPicKey].'a.png';
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
         	<img class="result_image J_image" src="src/images/<?php echo $image;?>"/>
            <div class="result_box">
            	<a class="a1" href="<?php echo BASEURL;?>"><img src="src/images/onemore.jpg"/></a>
                <a class="a2" href="http://www.tuolar.com"><img src="src/images/morewuderful.jpg"/></a>
            </div>
         </div>        
  	</div>
    </div>
  	<div class="ztfooter"><p>Copyright Tuolar.com All Rights Reserved</p></div>	
</div>
<script src="src/js/jquery-1.8.2.min.js"></script>
<script>
$(function(){
	$(".J_image").fadeIn(2000);
});
</script>
</body>
</html>