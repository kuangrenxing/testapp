<?php 
//图片在该应用的路径
$hourPath='src/images';

$result_content=array(
		0=>array(
				'title'=>'胡一菲',
				'content'=>'娄艺潇 双面御姐,大学教师,女博士,喜欢曾小贤',
				'image'=>'renwu4.jpg',
				'weiboimage'=>'trenwu4.jpg',
				'sex'=>'0',
		),
		1=>array(
				'title'=>'曾小贤',
				'content'=>'陈赫 新好男人,冷门节目《你的月亮我的心》主持人,喜欢胡一菲 ',
				'image'=>'renwu1.jpg',
				'weiboimage'=>'trenwu1.jpg',
				'sex'=>'1',
		),
		2=>array(
				'title'=>'唐悠悠',
				'content'=>'邓家佳 百变戏痴,关谷神奇的女朋友 ',
				'image'=>'renwu8.jpg',
				'weiboimage'=>'trenwu8.jpg',
				'sex'=>'0',
		),
		3=>array(
				'title'=>'关谷神奇',
				'content'=>'王传君 优质型男,日本漫画家,唐悠悠的男朋友',
				'image'=>'renwu3.jpg',
				'weiboimage'=>'trenwu3.jpg',
				'sex'=>'1',
		),
		4=>array(
				'title'=>'吕子乔',
				'content'=>'孙艺洲 风流雅痞,四分之一高丽血统,陈美嘉的男朋友',
				'image'=>'renwu7.jpg',
				'weiboimage'=>'trenwu7.jpg',
				'sex'=>'1',
		),
		5=>array(
				'title'=>'陆展博',
				'content'=>'金世佳 单细胞宅男,计算机专业的“海归,林宛瑜的男朋友 ',
				'image'=>'renwu6.jpg',
				'weiboimage'=>'trenwu6.jpg',
				'sex'=>'1',
		),
		6=>array(
				'title'=>'陈美嘉',
				'content'=>'李金铭 多情腐女,吕子乔的女朋友',
				'image'=>'renwu2.jpg',
				'weiboimage'=>'trenwu2.jpg',
				'sex'=>'0',
		),
		7=>array(
				'title'=>'林宛瑜',
				'content'=>'赵霁 优雅千金,林氏银行继承人,陆展博现任女朋友',
				'image'=>'renwu5.jpg',
				'weiboimage'=>'trenwu5.jpg',
				'sex'=>'0',
		),
);

$a = $_REQUEST['access'];
$textcontent=$result_content[$a]['content'];
$newTitle=$result_content[$a]['title'];
$image=$result_content[$a]['image'];

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
<link href="src/css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript"> 
window.onload=function(){ 
for(var ii=0; ii<document.links.length; ii++) document.links[ii].onfocus=function(){this.blur()} 
} 
</script>

<style type="text/css">


</style>
</head>
 
<body id="ztBodyBg">
<div id="ztcontainer">
    <div id="ztcontent">
       <div class="top">
       	<a href="http://www.tuolar.com" target="_blank"><img class="logo1" src="src/images/logoo_03.jpg"/></a>
        <img class="logo2" src="src/images/logoo_06.jpg" />
        <div class="sign"><img src="src/images/img1.jpg"/></div>
        </div>
        <div class="main2">
        	<div class="inner">
            	<img class="renwu" src="<?php echo $hourPath.'/'.$image;?>" />
                <div class="inner_txt">
                	<h1><?php echo $newTitle;?></h1>
                    <p class="p1"><?php echo $textcontent;?></p>
                    <img class="img4" src="src/images/img4.jpg" />
                    <a href="http://www.tuolar.com"><img class="img5" src="src/images/img5.jpg"/></a>
                </div>
            </div>
        </div>
       </div>             
                    
                    
                    
  	</div>
  	<div class="ztfooter"><p>Copyright Tuolar.com All Rights Reserved</p></div>	
</div>

</body>
</html>