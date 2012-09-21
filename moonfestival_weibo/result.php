<?php 
include 'common/define.php';
session_start();
if(isset($_SESSION['nicering']) == false || isset($_SESSION['niceringImg'])== false)
{	
	header("location: ".BASEURL);
	exit;
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href="src/css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" charset="utf-8"    src="http://fusion.qq.com/fusion_loader?appid=<?php echo "100648214";?>&platform=qzone"></script>
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
                	<img src="src/images/img_03.jpg" title="嫦娥测试"/>
                </div>
            </div>
            <div class="content_2">
            	<div class="d2">
                	<p class="p1"><?php echo $_SESSION['title'];?></p>
                    <div class="d3">
                    	<img src="<?php echo $_SESSION['niceringImg'];?>" class="image" />
                        <div class="d4">
                        	<a target="_blank" href="http://www.tuolar.com" class="share"><img src="src/images/image_06.jpg"/> </a>
                            <p class="p2">转发到<?php echo $_SESSION['nicering']?>微博并祝大家中秋快乐，给远方的朋友送去一份祝福</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>            
  	</div>
  	<div class="ztfooter"><p>Copyright Tuolar.com All Rights Reserved</p></div>	
</div>