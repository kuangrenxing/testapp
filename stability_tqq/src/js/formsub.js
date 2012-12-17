$(function(){
	$("#form1 :input").click(function(){
		$("#form1").submit();
		});
	
	$(".J_back").click(function(event){
		event.preventDefault();
		history.go(-1);
	});
});