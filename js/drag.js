 $(function(){
 	var ltnum=$(".pc_num li");
 	for(var inum=0;inum<G_touguangList.length;inum++){
 		var tg_text=G_touguangList[inum];
 		 $(ltnum[inum]).attr("title",tg_text+"%");
 	}
 	
	$("#draggable2").draggable({ containment: "#containment-wrapper",axis: "x",snap:true, scroll: false });
	$("#draggable2").on( "dragstop", function() {
		    var mt=$(".pc_num li").position().left;
		    var mw=$(".pc_num li").width();
		    var pw=$(".pc_num").width();
		    var mw=$(this).position().left;
		    var bl=mw/pw;
		    if(bl<0.12){
		    	$(this).stop().animate({left:$(".pc_num li:nth-of-type(1)").position().left},300);
		    	$(".pc_num li").removeClass("on");
		    	$(".pc_num li:nth-of-type(1)").addClass("on");
		    	$(".tongguan h3.num").text($(".pc_num li:nth-of-type(1)").attr("title"));
		    }else if(bl>=0.12&&bl<0.22){
		    	$(this).stop().animate({left:$(".pc_num li:nth-of-type(2)").position().left},300);
		    	$(".pc_num li").removeClass("on");
		    	$(".pc_num li:nth-of-type(2)").addClass("on");
		    	$(".tongguan h3.num").text($(".pc_num li:nth-of-type(2)").attr("title"));
		    }else if(bl>=0.22&&bl<0.40){
		    	$(this).stop().animate({left:$(".pc_num li:nth-of-type(3)").position().left},300);
		    	$(".pc_num li").removeClass("on");
		    	$(".tongguan h3.num").text($(".pc_num li:nth-of-type(3)").attr("title"));
		    	$(".pc_num li:nth-of-type(3)").addClass("on");
		    }else if(bl>=0.40&&bl<0.54){
		    	$(this).stop().animate({left:$(".pc_num li:nth-of-type(4)").position().left},300);
		    	$(".pc_num li").removeClass("on");
		    	$(".pc_num li:nth-of-type(4)").addClass("on");
		    	$(".tongguan h3.num").text($(".pc_num li:nth-of-type(4)").attr("title"));
		    }else if(bl>=0.54&&bl<0.68){
		    	$(this).stop().animate({left:$(".pc_num li:nth-of-type(5)").position().left},300);
		    	$(".pc_num li").removeClass("on");
		    	$(".pc_num li:nth-of-type(5)").addClass("on");
		    	$(".tongguan h3.num").text($(".pc_num li:nth-of-type(5)").attr("title"));
		    }else if(bl>=0.68&&bl<0.80){
		    	$(this).stop().animate({left:$(".pc_num li:nth-of-type(6)").position().left},300);
		    	$(".pc_num li").removeClass("on");
		    	$(".pc_num li:nth-of-type(6)").addClass("on");
		    	$(".tongguan h3.num").text($(".pc_num li:nth-of-type(6)").attr("title"));
		    }else if(bl>=0.80&&bl<0.98){
		    	$(this).stop().animate({left:$(".pc_num li:nth-of-type(7)").position().left},300);
		    	$(".pc_num li").removeClass("on");
		    	$(".pc_num li:nth-of-type(7)").addClass("on");
		    	$(".tongguan h3.num").text($(".pc_num li:nth-of-type(7)").attr("title"));
		    }
	});
})


















