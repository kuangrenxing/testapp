$(function(){
	$(".J_xz").click(function(){
		var val = $(this).attr("data-val");
		location.href = "auth.php?val="+val;
	});
	
	
	//2012年12月21日就是世界末日
	var interval = 1000; 
	function ShowCountDown(year,month,day,divname) 
	{ 
	var now = new Date(); 
	var endDate = new Date(year, month-1, day); 
	var leftTime=endDate.getTime()-now.getTime(); 
	var leftsecond = parseInt(leftTime/1000); 
	//var day1=parseInt(leftsecond/(24*60*60*6)); 
	var day1=Math.floor(leftsecond/(60*60*24)); 
	var hour=Math.floor((leftsecond-day1*24*60*60)/3600); 
	var minute=Math.floor((leftsecond-day1*24*60*60-hour*3600)/60); 
	var second=Math.floor(leftsecond-day1*24*60*60-hour*3600-minute*60); 
	var cc = document.getElementById(divname); 
	
	var newD = day1.toString().split("");
	var newH = hour.toString().split("");
	var newM = minute.toString().split("");
	var newS = second.toString().split("");
	
	var imgsrc = "<img src='src/images/";
	var imgD = "";
	var imgH = "";
	var imgM = "";
	var imgS = "";
	
	$.each(newD, function(i, v){
		imgD += imgsrc+v+".png'>";
	});
	$.each(newH, function(i, v){
		imgH += imgsrc+v+".png'>";
	});
	$.each(newM, function(i, v){
		imgM += imgsrc+v+".png'>";
	});
	$.each(newS, function(i, v){
		imgS += imgsrc+v+".png'>";
	});	
	
	cc.innerHTML = imgD+"天"+imgH+"小时"+imgM+"分"+imgS+"秒";
	} 
	window.setInterval(function(){ShowCountDown(2012,12,21,'J_countdown');}, interval); 
});




