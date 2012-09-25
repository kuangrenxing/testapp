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
$_SESSION['afterurl'] = BASEURL.'choice.php';
$_SESSION['WB_APP_CONN_WEIFUSHI'] = WB_APP_CONN_WEIFUSHI;

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
        <div class="BG1">
        	<div class="head">
            	<div class="head1 left">
                	<a href="http://www.tuolar.com" class="logo"><img title="拖拉网" src="src/images/img_start_03.jpg"/></a>
                    <img title="" class="s1" src="src/images/img_start_06.jpg"/>
                </div>
                <div class="head2 ">
                	<img src="src/images/finger_03.jpg" title="指纹测试"/>
                </div>
            </div>
            <div class="content">
            	<a hidefocus="true"  class="start" href="<?php echo $_SESSION['code_url'];?>"><img src="src/images/finger_07.jpg" title="开始测试"/></a>
            </div>
        </div>            
  	</div>
  	<div class="ztfooter"><p>Copyright Tuolar.com All Rights Reserved</p></div>	
</div>




</body>
</html>