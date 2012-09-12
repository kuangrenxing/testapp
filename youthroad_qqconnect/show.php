<?php 
//图片在该应用的路径
$hourPath='src/images';

$result_content=array(
		0=>array(				
				'content'=>"一起在高中教室里吃着火锅唱着歌",				
				'weiboimage'=>'content_07.jpg',				
		),	
		1=>array(				
				'content'=>'钓鱼岛狂跳最炫民族风，呼唤标哥一起来 ',				
				'weiboimage'=>'satuation1.jpg',				
		),
		2=>array(			
				'content'=>'一起在高中班长面前放个屁',				
				'weiboimage'=>'satuation2.jpg',				
		),	
		3=>array(				
				'content'=>'一起去荒野求生，吃虫子，喝河水',				
				'weiboimage'=>'satuation3.jpg',				
		),
		4=>array(				
				'content'=>'一起回到母校，把画好的黑板报擦掉嫁祸给别人',				
				'weiboimage'=>'satuation7.jpg',				
		),
		5=>array(				
				'content'=>'化身美少女战士，代表月亮消灭班里的恶势力 ',				
				'weiboimage'=>'satuation4.jpg',				
		),
		6=>array(				
				'content'=>'一起回到小学二年级，上课的时候光明正大的涂口红',				
				'weiboimage'=>'satuation5.jpg',				
		),
		7=>array(				
				'content'=>'一起回到婴儿时期，啃自己的脚趾',				
				'weiboimage'=>'satuation6.jpg',				
		),		
);

$a = $_REQUEST['access'];
$textcontent=$result_content[$a]['content'];

$image=$result_content[$a]['weiboimage'];

if(isset($_SESSION["result_id"])){
	unset($_SESSION["result_id"]);
}
if(isset($_SESSION["SFZ"]))
{
	unset($_SESSION["SFZ"]);
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
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
            	<a class="logo" href="" target="_blank"><img src="src/images/haha_03.jpg"/></a>
                <p class="p1"><a href="http://tuolar.com" target="_blank" title="拖拉网">更多精彩内容>></a></p>
            </div>
            <div class="content">
            	<img class="m1" src="src/images/<?php echo $image;?>"/>
                <p class="p2">和@xx<?php echo $textcontent;?></p>
            </div>
        </div>           
  	</div>
  	<div class="ztfooter"><p>Copyright Tuolar.com All Rights Reserved</p></div>	
</div>

</body>
</html>