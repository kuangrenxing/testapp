<?php 
include 'common/config.php';
include 'common/define.php';
include 'common/function.php';
session_start();

if(isset($_SESSION['left']) == false || isset($_SESSION['right']) == false)
{
	header("location: ".BASEURL);
	exit;
}
$left = $_SESSION['left'];
$right = $_SESSION['right'];

$count = $left+$right;
$luo = array();

$result = getResult($count,$left,$right);

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
            <div class="content_2">
            	<div class="d1">
                	<div class="title1"><p class="p1"><?php echo $result['keywords'];?></p></div>
                    <p class="p2"><?php echo $result['assess'];?></p>
                    <p class="p3">婚恋最佳搭配：<?php echo $result['collocation'];?></p>
                    <a hidefocus="true" class="kankan" href="http://www.tuolar.com" target="_blank"><img src="src/images/img_07.jpg" title="关注去看看"/></a>
                    <a hidefocus="true" class="retest" href="<?php echo BASEURL;?>"><img src="src/images/img_10.jpg" title="再去测一次"/></a>
                 
                </div>
            </div>
        </div>            
  	</div>
  	<div class="ztfooter"><p>Copyright Tuolar.com All Rights Reserved</p></div>	
</div>

</body>
</html>