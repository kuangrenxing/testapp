<?php
include_once './common/config.php';
include_once './common/define.php';

$key = $_GET['key'];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>恭喜你，牵手成功了! -非诚勿扰-测试小应用-拖拉网</title>
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
<img src="src/images/img_03.jpg" title="非诚勿扰"/>
</div>
</div>
<div class="content_2">
<h1 class="welldone">恭喜你，牵手成功了</h1>
<div style="clear:both; width:370px; height:215px; margin-top:40px; margin-left:208px;">
<img style="float:left;" src="src/images/<?php echo $people[$key]['avatar'];?>" title="<?php echo $people[$key]['name'];?>"/>
<div class="d6">
<a target="_blank" href="http://www.tuolar.com"><img src="src/images/welldone_06.jpg"/></a>
<a href="<?php echo BASEURL;?>"><img src="src/images/welldone_09.jpg"/></a>
</div>
</div>

</div>
</div>
</div>
<div class="ztfooter"><p>Copyright Tuolar.com All Rights Reserved</p></div>
</div>

</body>
</html>
