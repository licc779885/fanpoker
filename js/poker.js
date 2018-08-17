var tiyData,tiyDataData,tiyNumber,tiyStatus,tiyHtml,tiyGold,is_card;
$(function(){
	//头部下拉菜单显示隐藏
	$(".pt_more").click(function(event){
		if($(".pt_fr_list").is(":visible")){
			$(".pt_fr_list").hide()
		}else{
			$(".pt_fr_list").show()
		}
		event.stopPropagation(); 
	});
	$("body").bind("click",function(){
		$(".pt_fr_list").hide();
	});
	$("body").bind("touchmove",function(){
		$(".pt_fr_list").hide();
	});
	//选择对应金额筹码
	$(".pc_num li").bind("touchstart",function(){
		var tg_text=$(this).attr("title");
		var mt=$(this).position().left;
		$(".tongguan").show();
		$(this).addClass("on").siblings().removeClass("on");
		$(".pc_num em.icon").stop().animate({left:mt},300);
		var index=$(this).index();
		var tg_text=G_touguangList[index];		
		$(".tongguan h3.num").text(tg_text+"%");
	});

	//选择投注的项
	$(".pf_cm a.bind").live("click",function(){
		if($(this).hasClass("unbind")){
			$(this).removeClass("bind");
		}else{
			$(this).addClass("bind");
			$(this).addClass("active").siblings().removeClass("active");
			var cmNumber=$(this).find(".bs").text();
	        var ltNumber=parseInt($(".poker_jl li.lt:first").find(".jl_num").text());
			var zjNumber=Math.round(cmNumber*ltNumber);
//			if(zjNumber>99){
//				zjNumber="99+";
//			}else{
//				zjNumber=zjNumber;
//			}
			$(".poker_text .tet").hide();
			$(".poker_text .touz").show();
			$(".poker_text .touz").text("猜中可得"+zjNumber+"金豆");
			$(".pf_cm a").addClass("bind");
		}
		
	});
	
	//规则
	$("#btn_rule").click(function(){
		$(".poker_rule .poker_beij").show();
		$(".poker_rule").css("bottom","0");
	});
	$(".poker_beij").click(function(){
		$(this).hide();
		$(this).parent().css("bottom","-40.0rem");
	});
	
	$(".zhongj_text a,.zhongj .poker_beij").click(function(){
		$(".zhongj .poker_beij").hide();
		$(".zhongj_text").addClass("sxy");
		setTimeout(function(){
			$(".zhongj_text").addClass("nsy");
			$(".zhongj_text").removeClass("sxy");
			$(".zhongj_text .zt").hide();
		},600)
	});
	var numL=$(".pc_num li");
	for(var dl=0;dl<numL.length;dl++){
		var num=[];
		var numText=parseInt($(numL[dl]).find(".cm_num").text());
		$(numL[dl]).attr("class","w"+numText);
		$(".pc_num li:first-child").addClass("on");
//		$(".st_cm a:first-child").addClass("active");
	}
	
	//获取体验卡
	$.post("/app/game/cardlist",{game_id:7,token:G_params},function(data){
		tiyData=data;
		console.log(tiyData);
		tiyDataData=tiyData.data;
		tiyStatus=parseInt(tiyData.status);
		if(tiyDataData==null){
			return false;
		}
		for(var ty=0;ty<tiyDataData.length;ty++){
			tiyNumber=parseInt(tiyDataData[ty].number);
			tiyGold=parseInt(tiyDataData[ty].gold);
            setTimeout(function(){
            	$(".poker_cm .pc_num li.w"+tiyGold+"").append('<div class="st_ty"><span class="st_ty_text">免x<em class="tiyan_num">'+tiyNumber+'</em></span></div>')
            },200)
		}
		
	},"json");
	
})

//发牌（手动作）
function faip(){
	$(".dealer_hand img").attr("src","images/pk_img6.png");
	$(".dealer_hand").addClass("roll");
}
//发牌（手收回动作）
function shoup(){
	setTimeout(function(){
		$(".dealer_hand img").attr("src","images/pk_img5.png");
	},450)
	$(".dealer_hand").removeClass("roll");
}
//发牌（牌动作）
/**
 * 
 * pai 牌数据
 * is_win 是否胜利
 * pkjindou 赢得豆数
 * 
 */
function fpai(pai,is_win,pkjindou,datainfo){
	$(".poker_zjImgUrl img").attr("src",pai.img);
	var zjImgUrl=$(".poker_zjImgUrl img").attr("src");
//	$(".dealer_pai.pok").css({"left":"42.3%",top:"113.6%"});
	$(".dealer_pai.pok").addClass("roll");
	$(".dealer_pai.pok").addClass("rollS");
	$(".poker_foot_beij").show();
	$(".pf_cm").find(".bs").hide();
	setTimeout(function(){
		$(".dealer_pai.pok").addClass("rollZ");
		
	},800);
	setTimeout(function(){
		$(".dealer_pai.pok img").attr("src",zjImgUrl);
	},1490);
	if(is_win==1){
		setTimeout(function(){
			$(".dealer_pai.pok").removeClass("roll");
			$(".dealer_pai.pok").removeClass("rollZ");
			$(".dealer_pai.pok").removeClass("rollS");
			$(".dealer_pai.pok").addClass("rollB");
			$(".dealer_pai.pok").addClass("rollR");
			$(".dealer_pai").removeClass("pok");
//			$(".dealer_pai").css({"left":"80%",top:"124%","width":"20%"});
			$('<div class="dealer_pai pok"><img src="images/pk_pk.png"></div>').appendTo($(".poker_dealer"));
			
			pai_left_show(pkjindou,pai);
			
			if(datainfo.is_jiajiang!=='undefined'&&datainfo.is_jiajiang>0){//通关
				winGolds(datainfo.win_jindou,1);
//				$(".poker_jl li:first-child:after").hide();
                $(".tongguan").hide();
			}else{
				G_fapai_clock=false;
			}
			var content_len=datainfo.content.length;
      		var content=datainfo.content[content_len-1];
      		var windou=parseInt($(".poker_jl li.lt:first").find(".jl_num").text());
			bs_edit(content.gailv);
			wdaa();
			if(G_ju!=1){
				$(".poker_text .windou").show();
			}
			
			$(".poker_text .windou").find(".num").text(windou);
			$(".poker_text .tet").hide();
			setTimeout(function(){
				$(".poker_text .windou").hide();
				$(".poker_text .tet").show();
				$(".poker_zz").hide();
				$(".poker_foot_beij").hide();
	            $(".pf_cm").find(".bs").show();
			},1000)
			
		},2000);
		$(".poker_cm").hide();
		$(".poker_touz").show();
	}else{
		setTimeout(function(){
			game_over();
//			$(".poker_foot_beij").hide();
	        $(".pf_cm").find(".bs").hide();
		},2000);
	}
}

//牌 移动到左侧
function pai_left_show(pkjindou,pai){
	    var li_ju='<span class="jl_text"><em class="jl_name"></em><em class="jl_num">'+pkjindou+'</em>豆</span><img src="'+pai.img+'">';
		var li_index=find_poker_jl_li_empty();
		$(".poker_jl").find('ul').find('li').eq(li_index).html(li_ju);
		$(".poker_jl").find('ul').find('li').eq(li_index).addClass("lt");
		$(".poker_jl").find('ul').find('li').removeClass("bup");
		$(".poker_jl").find('ul').find('li').eq(li_index).prev().addClass("bup");
		$(".poker_jl li.lt").find(".jl_name").text("猜中");
		$(".poker_jl li.lt:first").find(".jl_name").text("当前");
		$(".poker_jl li.lt:last").find(".jl_name").text("起投");
		var lt_length=$(".poker_jl li.lt").length;
		if(lt_length==12){
			$(".poker_jl li.lt").find(".jl_name").text("猜中");
		}
}

//眨眼睛
function eye(){
	$(".dealer_eye .eye_right").show();
	setTimeout(function(){
		$(".dealer_love i").addClass("ani");
	},200)
	setTimeout(function(){
		$(".dealer_eye .eye_right").hide()
	},800)
}
//中奖撒金豆效果
function golds(){
	var gHtml="";
	$(".zhongj .poker_beij_1").show();
	$(".zhongj_text").removeClass("nsy");
	$(".zhongj_text").addClass("sy");
	setTimeout(function(){
		$(".zhongj_text .zt").show()
	},800);
	for(var i=0;i<30;i++){
		var gWidth=parseFloat(4*Math.random()).toFixed(2);
	    var gHeight=gWidth*0.85;
	    var gLeft=parseInt(100*Math.random())+"%";
	    var gTop=parseInt(-100*Math.random())+"%";
		gHtml+="<i style='width:"+gWidth+"rem"+";height:"+gHeight+"rem"+";left:"+gLeft+";top:"+gTop+"'></i>";
	}
	$(".zhongj_gold").html(gHtml);
}

//关闭遮罩
$(".zhongj_text a,.zhongj .poker_beij").click(function(){
	$(".zhongj .poker_beij").hide();
	$(".zhongj_text").addClass("sxy");
	setTimeout(function(){
		$(".zhongj_text").addClass("nsy");
		$(".zhongj_text").removeClass("sxy");
		$(".zhongj_text .zt").hide();
	},1600)
});

//修改投注倍率
function bs_edit(gailv){
	console.log(gailv);
    if(gailv){
  	  var bs=$(".poker_foot .poker_touz .pf_cm").find(".bs");
  	  var len=gailv.length;
  	  for(var i=0;i<len;i++){
      	  if(gailv[i]==0){
      		  $(bs).eq(i).text('不可选');
      		  $(bs).eq(i).parent("a").addClass("unbind");
//    	  	  $(bs).eq(i).parent("a").unbind();
           }else{	
              var t=toDecimal2(gailv[i]);
          	  $(bs).eq(i).text(t);
          	  $(bs).eq(i).parent("a").removeClass("unbind");
            }
        }
    }
}


//制保留2位小数，如：2，会在2后面补上00.即2.00 
function toDecimal2(x) { 
  var f = parseFloat(x); 
  if (isNaN(f)) { 
    return false; 
  } 
  var f = Math.round(x*100)/100; 
  var s = f.toString(); 
  var rs = s.indexOf('.'); 
  if (rs < 0) { 
    rs = s.length; 
    s += '.'; 
  } 
  while (s.length <= rs + 2) { 
    s += '0'; 
  } 
  return s; 
} 

(function(window){
	var error=function(){
		var self=this;
		this.className=".tis";
		this.clock=false;
		this.alert=function(msg){
			if(self.clock==true)return false;
			self.clock=true;
			$(self.className).find('.spn').text(msg);
			$(self.className).addClass('top');
			setTimeout(self.clear,2000);
		}
		this.clear=function(){
			$(self.className).removeClass('top');
			self.clock=false;
		}
	}
	window.errorObj=new error();
})(window);
function error_message(msg){
	window.errorObj.alert(msg);
}
