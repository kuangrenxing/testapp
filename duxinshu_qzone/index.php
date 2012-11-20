<?php
header("content-type:text/html;charset=utf-8;");
session_start();

include_once 'common/define.php';

//下一页面文件
$nextFile = "attention.php";
//授权url
$url = APIURL."?url=".BASEURL.$nextFile."&type=".WB_APP_CONN_WEIFUSHI;
?>


<?php 

$pic = range(1,30);

//每次选一种花
$randPic = array_rand($pic,1);

$_SESSION['randPic'] = $randPic;

//列表数组
$listRand = array();
for($i=0; $i<100; $i++)
{
	$listRandKey[] = array_rand($pic,1);
}
foreach($listRandKey as $i=>$v)
{
	$listRand[] = $pic[$v];
}


//无形中有形
foreach($listRand as $i=>$v)
{
	if($i%9 == 0)
	{
		$listRand[$i] = $pic[$randPic];
	}
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
         <div class="main1">
         	
         		<a class="guess left" href="<?php echo $url;?>"></a>
                <div class="rym_icon left">
                	<div class="rym_icon_lie1">
                	<?php for($i=99;$i>86;$i--):?>                	
                		<?php if($listRand[$i]<10) $pic_img='0'.$listRand[$i]; else $pic_img = $listRand[$i];?>
                		<img class="icon i_99" src="src/images/<?php echo $pic_img;?>.png"/>
                	<?php endfor;?>                    
                    </div>
                    <div class="rym_icon_lie2">
                    <?php for($i=86;$i>73;$i--):?>                	
                		<?php if($listRand[$i]<10) $pic_img='0'.$listRand[$i]; else $pic_img = $listRand[$i];?>
                		<img class="icon i_99" src="src/images/<?php echo $pic_img;?>.png"/>
                	<?php endfor;?>                    
                    </div>
                    <div class="rym_icon_lie3">
                    <?php for($i=73;$i>60;$i--):?>                	
                		<?php if($listRand[$i]<10) $pic_img='0'.$listRand[$i]; else $pic_img = $listRand[$i];?>
                		<img class="icon i_99" src="src/images/<?php echo $pic_img;?>.png"/>
                	<?php endfor;?>
                    
                    </div>
                    <div class="rym_icon_lie4">
                    <?php for($i=60;$i>47;$i--):?>                	
                		<?php if($listRand[$i]<10) $pic_img='0'.$listRand[$i]; else $pic_img = $listRand[$i];?>
                		<img class="icon i_99" src="src/images/<?php echo $pic_img;?>.png"/>
                	<?php endfor;?>
                    
                    </div>
                    <div class="rym_icon_lie5">
                    <?php for($i=47;$i>34;$i--):?>                	
                		<?php if($listRand[$i]<10) $pic_img='0'.$listRand[$i]; else $pic_img = $listRand[$i];?>
                		<img class="icon i_99" src="src/images/<?php echo $pic_img;?>.png"/>
                	<?php endfor;?>
                    
                    </div>
                    <div class="rym_icon_lie6">
                     <?php for($i=34;$i>21;$i--):?>                	
                		<?php if($listRand[$i]<10) $pic_img='0'.$listRand[$i]; else $pic_img = $listRand[$i];?>
                		<img class="icon i_99" src="src/images/<?php echo $pic_img;?>.png"/>
                	<?php endfor;?>
                   
                    </div>
                    <div class="rym_icon_lie7">
                    <?php for($i=21;$i>8;$i--):?>                	
                		<?php if($listRand[$i]<10) $pic_img='0'.$listRand[$i]; else $pic_img = $listRand[$i];?>
                		<img class="icon i_99" src="src/images/<?php echo $pic_img;?>.png"/>
                	<?php endfor;?>
                    
                    </div>
                    <div class="rym_icon_lie8">
                    <?php for($i=8;$i>-1;$i--):?>                	
                		<?php if($listRand[$i]<10) $pic_img='0'.$listRand[$i]; else $pic_img = $listRand[$i];?>
                		<img class="icon i_99" src="src/images/<?php echo $pic_img;?>.png"/>
                	<?php endfor;?>
                   
                    </div>
                </div>
           
         </div>        
  	</div>
    </div>
  	<div class="ztfooter"><p>Copyright Tuolar.com All Rights Reserved</p></div>	
</div>

</body>
</html>
        