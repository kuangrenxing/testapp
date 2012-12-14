<?php
include 'common/define.php';
session_start();

if(isset($_SESSION['val']) == false)
{
	header("location: ".BASEURL);
	exit;
}
$result = array(
		'1'=>array(
				'title' => '白羊座',
				'content' => '羊儿压根就觉得世界末日不会来临，一切都是骗人的谎言，是那些预言家们在危言耸听，所以日子照过，完全不会放在心上。若世界末日真在眼前，他也会想，最后不是还有人逃生了么？我这么幸运，肯定也会是其中一个。',		
				'slug' => 'baiyang2.png',
				'sign' => 'baiyang1.png',	
				),
		'2'=>array(
				'title' => '金牛座',
				'content' => '世界末日都来了，那存折上的数字还能有什么意义呢？于是，金牛开始挥霍自己的钱财，首先当然是吃遍天下美食，还要在高档餐厅里点最贵的菜，开一瓶年代最久远的红酒，就算是死也要当个饱死鬼。只是如果预期的末日没有来临，那就悲剧了。',
				'slug' => 'jinniu2.png',
				'sign' => 'jinniu1.png',
		),
		'3'=>array(
				'title' => '双子座',
				'content' => '双子座的两面性在这时发挥无遗。一方面他会担忧世界末日要怎么办，于是开始积极筹备世界末日的逃生应急措施；一方面他又安慰自己和众人，可能世界末日只是一个玩笑，反正大家都要一起死，担心也只是多余的。',
				'slug' => 'shuangzi2.png',
				'sign' => 'shuangzi1.png',
		),
		'4'=>array(
				'title' => '巨蟹座',
				'content' => '比起自己的死亡，巨蟹更加害怕的是面对家人的离去，所以在这之前他会抓紧时间和家人好好相处。灾难来临时，巨蟹是不会自己独自逃生的，因为他无法面对失去亲人、失去朋友，自己独自存活下来的痛。',
				'slug' => 'juxie2.png',
				'sign' => 'juxie1.png',
		),
		'5'=>array(
				'title' => '狮子座',
				'content' => '王者之狮怎么会允许自己因世界末日而感到担忧害怕呢？他是代表着太阳的狮子，拥有着最强大的力量，即使内心有些小忐忑也会强迫自己压制下去。更何况乱世出英雄，这不也正是狮子们挺身而出捍卫地球的好时机。说不定，他就是新世纪的缔造者！',
				'slug' => 'shizi2.png',
				'sign' => 'shizi1.png',
		),
		'6'=>array(
				'title' => '处女座',
				'content' => '处女座追求完美，考虑问题仔细周到，换句话说也就是喜欢想太多。面对这场毁灭性的灾难，处女座当仁不让地思虑最多，是典型的杞人忧天型。很有可能到最后，他要么精神分裂，要么就是被自己吓傻。',
				'slug' => 'chunv2.png',
				'sign' => 'chunv1.png',
		),
		'7'=>array(
				'title' => '天秤座',
				'content' => '世界末日的预言究竟是不是真的呢？应不应该相信呢？是该在末日前放肆一把，把自己想做的事都做完，还是该采取观望态度？如果一直观望，世界末日真的来了，是不是一切都晚啦？好吧，天秤是被自己纠结死的。',
				'slug' => 'tiancheng2.png',
				'sign' => 'tiancheng1.png',
		),
		'8'=>array(
				'title' => '天蝎座',
				'content' => '首先，天蝎对世界末日这个说法就抱持着怀疑的态度，这样的他自然也就不会因为世界末日而感到焦虑。若真到了要面对的时候，理性过头的天蝎也会告诉自己，这不过是自然规律而已，与其忧虑不如先想办法逃生来得重要。',
				'slug' => 'tianxie2.png',
				'sign' => 'tianxie1.png',
		),
		'9'=>array(
				'title' => '射手座',
				'content' => '生性自由乐观的射手，就算明天天会塌下来，也觉得没有什么大不了。只要今天过得开心，不就好了么？所以，射手会更加卖力地过好现在的每一天，至于还没有发生的事，谁管他呢！快乐对他来说才最重要。',
				'slug' => 'sheshou2.png',
				'sign' => 'sheshou1.png',
		),
		'10'=>array(
				'title' => '摩羯座',
				'content' => '摩羯总是在不断地超越别人，超越自我，把自己弄得很累。现在好了，世界末日，大家的终点都一样，这样反而让摩羯大大地松了一口气，放下疲累的心情，开始好好享受生活。摩羯还会想，人皆一死，死前还可以看到世界末日，算是赚到了呢。',
				'slug' => 'mojie2.png',
				'sign' => 'mojie1.png',
		),
		'11'=>array(
				'title' => '水瓶座',
				'content' => '瓶子会担忧世界末日的来临，但他的思维就是那么的天马行空，总会在脑海中展开各种幻想，该是复仇者联盟的英雄们出动的时候了吧，如果有哆啦A梦的任意门可以逃生就好了，有什么方法可以坐上方舟呢……于是也就来不及过度忧伤了。',
				'slug' => 'shuiping2.png',
				'sign' => 'shuiping1.png',
		),
		'12'=>array(
				'title' => '双鱼座',
				'content' => '双鱼已经早早定好计划，一定要在世界末日前谈一场轰轰烈烈的恋爱。这样在末日前一天就可以把爱人约出来，制造两人最后的回忆，然后一起到山顶看日出，可以趴在爱人的怀里哭得稀里哗啦，一起牵手面对世界最后一秒的到来。简直比泰坦尼克还苦情。',
				'slug' => 'shuangyu2.png',
				'sign' => 'shuangyu1.png',
		),
		
		);

$title = $result[$_SESSION['val']]['title'];
$content = $result[$_SESSION['val']]['content'];
$slug = $result[$_SESSION['val']]['slug'];
$sign = $result[$_SESSION['val']]['sign'];

if(isset($_SESSION['t_access_token']) == false)
{
	header("location: ".BASEURL);
	exit;
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
         	<div class="head_logo left"><a target="_blank" class="logo" title="拖拉网" href="http://www.tuolar.com"></a><div class="fashion_more"></div></div>
            <div class="sign right"></div>
         </div>  
         <!--测试题出题部分-->
         <div class="main2">
					<img style=" position:absolute; display:block; top:24px; left:37px;" src="src/images/<?php echo $slug;?>"/>
                    <p class="result">
                    		<img src="src/images/<?php echo $sign;?>"/>
                            <span><?php echo $title;?></span>
                            <i><?php echo $content;?></i>
                    </p>
                    <div class="button">
                    		<!--<a href="" class="goto_1"></a>-->
                            <a target="_blank" href="http://t.qq.com/<?php echo $_SESSION['userinfo']['name'];?>" class="goto_3"></a>
                            <!--<a href="" class="goto_3"></a>-->
                            <a href="<?php echo BASEURL;?>" class="test_friend"></a>
                            <a href="http://www.tuolar.com" target="_blank"  class="more_wonderful"></a>
                    </div>	
         </div>        
  	</div>
    </div>
  	<div class="ztfooter"><p>Copyright &copy Tuolar.com All Rights Reserved</p></div>	
</div>

</body>
</html>