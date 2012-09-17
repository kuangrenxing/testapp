<?php
session_start();
require_once './common/config.php';
require_once './common/define.php';


if(isset($_SESSION['song']) == false)
{
	header('Location: '.BASEURL);
}



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>测试结果 - 中国好声音 - 应用小测试 - 拖拉网</title>
<link href="src/css/style1.css" rel="stylesheet" type="text/css" />
<script type="text/javascript"> 
window.onload=function(){ 
for(var ii=0; ii<document.links.length; ii++) document.links[ii].onfocus=function(){this.blur()} 
} 
</script>
</head>
 
<body id="ztBodyBg">
<div id="ztcontainer">
    <div id="ztcontent">
        <div class="BG2">
        	<div class="head">
            	<a class="logo" href="http://www.tuolar.com" target="_blank"><img title="拖拉网" src="src/images/haha_03.jpg"/></a>
                <a class="p1" target="_blank" href="http://www.tuolar.com"><img src="src/images/test_06.jpg" /></a>
            </div>
            <div class="content">
            	<h1>这首《<?php echo $_SESSION['song']; ?>》</span><?php if($_GET['artist']):?>得到了导师的认可，最后加入了<?php else:?> 由于竞争太激烈了，很遗憾地没有入选。 <?php endif;?></h1>
            	<div class="d5">
            	<img title="" class="m1" src="<?php if($_GET['artist']) echo $artist[$_GET['artist']]['img']; else echo "src/images/test2_03.jpg";?>"/>
                <div class="d6">
                <h1><?php if($_GET['artist']):?><?php echo $artist[$_GET['artist']]['name'];?>老师<?php else:?>没有入选<?php endif;?></h1>
                <p class="p2"><?php if($_GET['artist']):?><?php echo $artist[$_GET['artist']]['content'];?><?php else:?>加多宝中国好声音由凉茶领导者加多宝冠名播出，加多宝凉茶，正宗好凉茶<?php endif;?></p>
                <a class="restart" href="<?php echo BASEURL;?>" target=""><img src="src/images/resetbegin.jpg"/></a>
                </div>
                </div>
            </div>
        </div>           
  	</div>
  	<div class="ztfooter"><p>Copyright Tuolar.com All Rights Reserved</p></div>	
</div>

</body>
</html>