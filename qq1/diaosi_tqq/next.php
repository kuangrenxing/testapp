<?php 
include_once 'common/define.php';
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
         	<p class="diaosi1">下面屌丝十个特征中  你中了几枪？</p>
            <form action="next2.php" id="" method="post" >
            <p class="question"><label><input type="checkbox" name="ck1" class="bingo" /><span><i class="i1">1.</i> <i class="i2">手机：华为，NOKIA5230，5233，金立，天宇，山寨机跑马灯。</i> </span></label></p>
            <p class="question"><label><input type="checkbox" name="ck2" class="bingo" /><span><i class="i1">2.</i> <i class="i2">长相：2分-4分。 </i> </span></label></p>
            <p class="question"><label><input type="checkbox" name="ck3" class="bingo" /><span><i class="i1">3.</i><i class="i2"> 饮料：康师傅系列，脉动，鲜橙多，快活林。 </i></span></label></p>
            <p class="question"><label><input type="checkbox" name="ck4" class="bingo" /><span><i class="i1">4.</i> <i class="i2">食品：康师傅系列，鸡蛋灌饼，豆浆，油条，包子，馒头，牛肉面，回锅肉炒饭。</i></span></label></p>
            <p class="question"><label><input type="checkbox" name="ck5" class="bingo" /><span><i class="i1">5.</i><i class="i2">衣服鞋子：真维斯，李宁，德尔惠，乔丹，361度，地摊货，淘宝便宜货。 </i></span></label></p>
            <input type="submit" class="jixu" value="" />
            </form>
         </div>        
  	</div>
    </div>
  	<div class="ztfooter"><p>Copyright Tuolar.com All Rights Reserved</p></div>	
</div>

</body>
</html>