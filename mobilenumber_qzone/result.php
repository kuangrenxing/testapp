<?php
header("content-type:text/html;charset=utf-8;");
session_start();

include_once 'common/define.php';

if(isset($_SESSION['content'])==false || isset($_SESSION['minimage'])==false || isset($_SESSION['number'])==false)
{
	header("location: ".BASEURL);
	exit;
}

$content = array();
$content['0'] = mb_substr($_SESSION['content'], 0, 10, 'utf-8');
$content['1'] = mb_substr($_SESSION['content'], 10, 10, 'utf-8');


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
         <div class="main3">
         	     	<p class="pingyu"><?php echo $content['0'];?><br /><?php echo $content['1'];?></p>
                    <img class="small_result1" src="src/images/<?php echo $_SESSION['minimage'];?>"/>
                    <div class="more">
                    	<a class="more_wonderful" href="http://www.tuolar.com" title="拖拉网" target="_blank"><img src="src/images/wonderful.jpg"/></a>
                        <a class="test_again" href="<?php echo BASEURL;?>" title="重新测试" ><img src="src/images/check_again.jpg"></a>
                    </div>
         </div>        
  	</div>
    </div>
  	<div class="ztfooter"><p>Copyright Tuolar.com All Rights Reserved</p></div>	
</div>

</body>
</html>