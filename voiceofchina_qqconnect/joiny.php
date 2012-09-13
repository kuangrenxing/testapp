<?php 
include_once './common/config.php';
$artistKey = explode(",", $_GET['people']);
//老师列表
$choiceArtist = "";

foreach ($artistKey as  $i=>$v)
{
	$artistKey[$v] = $v;	
}
unset($artistKey[0]);

//求老师列表
foreach($artistKey as $i=>$v)
{
	$choiceArtistArr[]=$artist[$v]['name'];
}
//老师列表
$choiceArtist = implode(',', $choiceArtistArr);

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
                	<img src="src/images/img_08.jpg" title="中国好声音"/>
                </div>
            </div>
            <div class="content_2">
            	<div class="banner2">
                	<h1>
                	
                	<?php if(count($artistKey) == 1):?>
                		恭喜你， <?php echo $choiceArtist;?>，为你转身，你没得选择了，只能进入<?php echo $choiceArtist;?>组
                	<?php elseif (count($artistKey) == 2 ):?>
                		不错哦  ，<?php echo $choiceArtist;?>，为你转身，请选择一位进入他的小组 
                	<?php elseif (count($artistKey) == 3):?>
                		很厉害哦，<?php echo $choiceArtist;?>，为你转身，请选择一位进入他的小组 
                	<?php elseif (count($artistKey) == 4):?>
                		你太强了！！<?php echo $choiceArtist;?>，都被你折服，只等你钦点一位进入该组
                	<?php endif;?>
                	</h1>
                    <div class="d1">
                    <?php foreach($artist as $i=>$v):?>                   
                    	<?php if(array_key_exists($i, $artistKey)):?>                    	
                    	<div class="box">
                        	<div class="d2"><img src="<?php echo $v['avatar'];?>"/>
                            	 <a href="attention.php?artist=<?php echo $i;?>" target="_blank"><img src="src/images/images_11.jpg"/></a>		
                            </div>
                            <p><?php echo $v['content'];?></p>
                        </div>
                        <?php endif;?>
                     <?php endforeach;?>
            
                    </div>
                </div>
            </div>
        </div>            
  	</div>
  	<div class="ztfooter"><p>Copyright Tuolar.com All Rights Reserved</p></div>	
</div>

</body>
</html>