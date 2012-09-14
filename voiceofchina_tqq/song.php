<?php 
$songList = array(
		"独上西楼",
		"征服",
		"爱要坦荡荡",
		"被遗忘的时光",
		"我是不是你最疼爱的人",
		"寂寞先生",
		"刀剑如梦",
		"小情歌",
		"不管有多苦",
		"白天不懂夜的黑",
		"Listen",
		"其实你不懂我的心",
		"里约热内卢",
		"我爱你中国",
		"一想到你呀",
		"Price Tag",
		"特别的爱给特别的你",
		"弯弯的月亮",
		"回到拉萨",
		"我和你",
		"我要我们在一起",
		"The Prayer",
		"梦醒时分",
		"天天想你",
		"爱什么稀罕",
		"为爱痴狂",
		"我期待",
		"Someone Like You",
		"你是我心爱的姑娘",
		"无所谓-张赫宣",
		"美",
		"夜夜夜夜",
		"领悟-关",
		"吻别",
		"征服",
		"I Feel Good",
		"爱",
		"白天不懂夜的黑",
		"过火",
		"花房姑娘",
		"天堂",
		"眼色",
		"涛声依旧",
		"小情歌",
		"我要你的爱",
		"会呼吸的痛",
		"别在伤口上撒盐",
		"燃烧",
		"千年之恋",
		"如果没有你",
		"鸿雁",
		"我的心里只有你没有他",
		"你把我灌醉",
		"爱我还是他",
		"冬天来了",
		"如果没有你",
		"暗香",
		"Sexy Music(冬天里的一把火)",
		"美女与野兽",
		"渔光曲",
		"人质",
		"慢慢",
		"星星",
		"我怀念的",
		"At Last",
		"Feeling Good",
		"站在高岗上",
		"苏三说",
		"对你爱不完",
		"爱是你我",
		"一样的月光",
		"Bad Romance",
		"我愿意",
		"眼色",
		"不了情",
		"Come together",
		"美丽笨女人",
		"海阔天空",
		"也许明天",
		"开门见山",
		"无言",
		"三天三夜",
		"传奇",
		"等你爱我",
		"北京 北京",
		"Domino(多米诺)",
		"我是不是你最疼爱的人",
		"Black or Write",
		"花火",
		"Angel",
		"你是我的眼",
		"爱让每个人都心碎"
		);
//6个随机下标
$randKeys = array_rand($songList, 6);
//ABCDEF
$keys = array('A','B','C','D','E','F');


//下一页几个人
function getPeople()
{
	$artist = array(
			1=>'1',//刘欢
			2=>'2',//那英
			3=>'3',//庾澄庆
			4=>'4'//杨坤
	);

	$peopleNum = rand(1,4);//名人个数
	$choicePeopleKey = array_rand($artist,$peopleNum);

	if(is_array($choicePeopleKey))
	{
		$choicePeopleStr = implode(",", $choicePeopleKey);
	}
	else
	{
		$choicePeopleStr = $choicePeopleKey;
	}
	return $choicePeopleStr;
}

function getNextUrl()
{
	//下一个页
	$nextPage = array(
			0=>'joiny',//有转身
			1=>'joinn', //无转身
			2=>'joiny'//有转身 随机机会大
			);
	

	
	$nextUrlKey = array_rand($nextPage,1);
	
	if($nextPage[$nextUrlKey] == "joiny")
	{
		$nextPageUrl = $nextPage[$nextUrlKey].'.php?people='.getPeople();
	}
	else
	{
		$nextPageUrl = $nextPage[$nextUrlKey].'.php';
	}
	return $nextPageUrl;
}

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>歌曲选择 - 中国好声音 - 应用小测试 - 拖拉网</title>
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
            	<div class="banner">
                	<ul>
                	<?php foreach($randKeys as $i=>$v):?>
                	<?php $nextUrl = getNextUrl();?>
                		<li><a href="<?php echo $nextUrl;?><?php if($nextUrl == 'joinn.php'):?>?song=<?php else:?>&song=<?php endif;?><?php echo $songList[$v];?>" target=""><img src="src/images/choice_03.jpg" title="选择"/></a><p class="pp"><?php echo $keys[$i];?>:<?php echo $songList[$v];?></p></li>
                	<?php endforeach;?>
                    	
                    </ul>
                </div>
            </div>
        </div>            
  	</div>
  	<div class="ztfooter"><p>Copyright Tuolar.com All Rights Reserved</p></div>	
</div>

</body>
</html>