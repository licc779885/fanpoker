<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0,user-scalable=no">
		<meta name = "format-detection" content="telephone = no" />
		<title>翻扑克</title>
		<link type="text/css" href="css/Xcompany.css" rel="stylesheet" />
		<link type="text/css" href="css/poker.css?=7" rel="stylesheet" />
		<link type="text/css" href="css/jquery-ui.min.css" rel="stylesheet" />
		<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
		<script type="text/javascript" src="js/font.js"></script>
		<script type="text/javascript" src="js/poker.js?=7"></script>
        <script src="/common/js/layer.m/layer.m.js"></script>
        <script type="text/javascript" src="js/jquery-ui.min.js"></script>
        <script type="text/javascript" src="js/drag_model.js"></script>
		<script type="text/javascript" src="js/drag.js"></script>
		<style type="text/css">
			/*订单记录*/
			.poker_order,.poker_rule{overflow-x: hidden;overflow-y: scroll;width:100%;height: 39.0rem;background: #161616;position: fixed;left:0;bottom:-40.0rem;z-index: 99;border-top: 0.25rem solid #4c4f62;color: #a4a4a4;font-size: 1.1rem;
			-webkit-transition: all 400ms ease-in-out;
			transition: all 400ms ease-in-out;
			}
			.rule_box,.orderList,.order_none{position: relative;z-index: 999;}
			.poker_jl li img{
				transform: rotateY(180deg);
				-webkit-transform: rotateY(180deg);
			}
			.poker_lose {display:none}
			.poker_lose .lose{position: fixed;width: 50%;right: 5%;bottom: 12%;color: #67b7ac;text-align: center;z-index:20;}
			.poker_lose .lose a{display: inline-block;width:40%;margin-left: 5px;vertical-align:super;}
			.tuic_text{z-index: 20;}
			.poker_zz{position: fixed;left: 0;top: 0;width: 100%;height: 100%;background: rgba(0,0,0,0);z-index: 9999;display:none;}
		</style>
	</head>
	<body>
	  <div class="poker" id="poker">
	  	<div class="poker_zz"></div>
	  	<div class="poker_bm"><img src="images/pk_beij.jpg"></div>
	  	<!--头部-->
	  	<div class="poker_top">
	  		<div class="pt_fl fl" onclick='javascript:appOen.showRechargeDialog1();'><i class="icon_gold"></i><span class="myGold"><?php echo $gold;?></span><i class="icon_more"></i></div>
	  		<div class="pt_fr fr">
	  			<ul>
	  				<li class="pt_more"><a href="javascript:;"><img src="images/pk_icon3.png"></a>
	  					<div class="pt_fr_list">
	  						<a href="javascript:btn_order_show();" id="btn_order">竞猜记录</a>
	  						<a href="javascript:;" id="btn_rule">玩法介绍</a>
	  						<a href="javascript:gotoHome();">返回首页</a>
	  					</div>
	  				</li>
	  				<li><a href="javascript:;" onclick='javascript:appOen.showGoldenShopDialog();'><img src="images/pk_icon2.png"></a></li>
	  				<li><a href="javascript:;" onclick='javascript:appOen.gameTask(7);'><img src="images/pk_icon1.png"></a></li>
	  			</ul>
	  		</div>
	  	</div>
	  	<!--左边栏-->
	  	<div class="poker_jl">
	  		<ul>
	  			<li></li>
	  			<li></li>
	  			<li></li>
	  			<li></li>
	  			<li></li>
	  			<li></li>
	  			<li></li>
	  			<li></li>
	  			<li></li>
	  			<li></li>
	  			<li></li>
	  			<li></li>
	  		</ul>
	  	</div>
	  	
	  	<!--荷官-->
	  	<div class="poker_dealer">
	  		<div class="dealer_box"><img src="images/pk_img1.png"></div>
	  		<div class="dealer_love"><i class="i1"></i><i class="i2"></i><i class="i3"></i></div>
	  		<!--<div class="dealer_hair"><img src="images/pk_img2.png"></div>-->
	  		<div class="dealer_eye">
	  			<!--<div class="eye_left"><img src="images/pk_img3.png"></div>-->
	  			<div class="eye_right"><img src="images/pk_img4_1.png"></div>
	  		</div>
	  		<div class="dealer_hand"><img src="images/pk_img5.png"></div>
	  		<div class="dealer_dpai"><img src="images/pk_pk.png"></div>
	  		<div class="dealer_pai pok"><img src="images/pk_pk.png"></div>
	  		<!--开奖扑克位置（大）-->
	  		<div class="poker_imt">
		  		<div class="imt_beij"><img src="images/pk_beij2.png"></div>
		  		<div class="imt_img"></div>
		  	</div>
		  	<!--开奖扑克位置（小）-->
		  	<div class="poker_sm"></div>
	  	</div>
	  	
	  	<!--开奖扑克文本-->
	  	<div class="poker_text">
	  		<div class="first" style="display: none;">先投豆，将发一张牌<br>猜下一张牌的大小红黑</div>
	  		<div class="tet" style="display: none;">下一张牌是？</div>
	  		<div class="gold" style="display: none;">恭喜获得<span class="num" style="color: #ffcc00">50金豆</span></div>
	  		<div class="touz" style="display: none;">猜中可得<span class="num"></span>金豆</div>
	  		<div class="windou" style="display: none;">中<span class="num"></span>金豆</div>
	  	</div>
	  	<!--猜错了-->
	  	<div class="poker_lose">
	  		<div class="poker_beij_1"></div>
	  		<div class="lose">猜错了~<a href="javascript:again_play();"><img src="images/pk_btn1.png"></a></div>
	  	</div>
	  	
	  	<!--是否退出-->
	  	<div class="tuic">
	  		<div class="poker_beij"></div>
	  		<div class="tuic_text">
	  			<h3 class="title">你已下单，还没猜哦！</h3>
	  			<div class="btn">
	  				<a href="javascript:gotoHome();" class="btn_out"><img src="images/btn_out.png"></a>
	  				<a href="javascript:closetuic();" class="btn_on"><img src="images/btn_on.png"></a>
	  			</div>
	  		</div>
	  	</div>
	  	
	  	<!--中奖-->
	  	<div class="zhongj">
	  		<div class="poker_beij_1"></div>
	  		<div class="zhongj_gold"></div>
	  		<div class="zhongj_text nsy">
	  			<div class="zt">
	  				<h3 class="title">恭喜中奖</h3>
		  			<div class="zj_num">中<strong class="num">999</strong>豆</div>
		  			<a href="javascript:again_play();"><img src="images/pk_btn1.png"></a>
	  			</div>
	  		</div>
	  	</div>
	  	
	  	<!--通关嘉奖-->
	  	<div class="tongguan">
	  		<img src="images/pk_icon8_1.png">
	  		<h3 class="num"></h3>	
	  	</div>
	  	
	  	<!--新手指导-->
	  	<div class="new"><img src="images/pk_new.png"></div>
	  	<!--提示-->
	  	<div class="tis">
	  		<div class="tis_text"><span class="spn">请选择一个结果</span></div>
	  	</div>
	  	
	  </div>
	  
	  <!--规则-->
  		<div class="poker_rule">
  			<div class="poker_beij"></div>
  			<div class="rule_box">
  				<div class="rule_imt">
  					<img src="images/rule_img.png">
  					<div class="rule_imt_text">
  						<table width="100%" cellpadding="0" cellspacing="0">
  							<tr>
  								<td class="tw1"><span class="rule_title">首投金豆</span></td>
  								<?php foreach ($qitouList as $v):?>
  								  <td class="tw2"><span class="rule_gold"><?=$v;?></span></td>
  								<?php endforeach;?>
  							</tr>
  							<tr>
  								<td class="tw1"><span class="rule_title">额外奖励额度</span></td>
  								<?php foreach ($touguangList as $v):?>
  								<td class="tw2"><span class="rule_num"><?=$v?$v:0?>%</span></td>
  								<?php endforeach;?>
  							</tr>
  						</table>
  					</div>	
  				</div>
	  			<div class="rule_text">
	  				<h3 class="title">详细规则</h3>
	  				<p class="pt">1、每局活动包含1~11轮竞猜，每轮竞猜开始后，用户选择要投入的金豆，系统将发一张基准牌，用户对下一张牌相对基准牌的“大/小”或“红/黑”进行竞猜。</p>
	  				<P class="pt">2、用户当轮竞猜结果正确，可以选择进入当局下一轮竞猜，也可以选择结束当局竞猜。</P>
	  				<P class="pt">3、用户当轮竞猜正确，则可获得投入金豆数n倍（n≥1，如1.2倍）的金豆，具体倍数以用户参与竞猜时页面展示的为准。用户选择继续竞猜投入的金豆数即为上一轮竞猜获胜的金豆数。</P>
	  				<P class="pt">4、用户当轮竞猜结果错误或当局11轮竞猜全部正确，该局活动结束。（注意：①若下一张牌跟这张牌大小一样，则猜大/小均为竞猜失败；②若用户11轮全部竞猜正确，还可额外加奖最高100%；③所有奖励金豆均四舍五入取整计算）</P>
	  				<P class="pt">5、用户竞猜正确的，系统将在1个工作日内把获胜金豆发放至你的账户。</P>
	  				<P class="pt">6、用户投入金豆后24小时内不操作（指对“大/小”或“红/黑”无具体的竞猜操作），系统会自动将用户投入的金豆返还至账户及/或将之前几轮获得的奖励（如有）发放至账户。</P>
	  				<P class="pt">7、除另有说明外，不论用户的竞猜结果如何，用户投入的金豆因参与活动而消耗完毕，不予返还。</P>
	  				<P class="pt">注意事项：</P>
	  				<P>1、欢乐竞猜有权根据活动参与情况，结束或提前结束用户参与活动的竞猜(指某轮活动不再接受用户的竞猜)。</P>
	  				<P>2、如遇到不可抗力或其他客观原因导致活动竞猜无法继续进行，则用户的投入将会全额返还到用户的账户中,欢乐竞猜无需因此而承担任何赔偿或补偿责任。</P>
	  				<P>3、活动期间,如用户存在违规行为(包括但不限于机器作弊),欢乐竞猜将取消用户的竞猜获奖资格,并有权依照欢乐竞猜相关规则进行处理。</P>
	  				<P>4、欢乐竞猜可根据活动举办的实际情况,在法律允许的范围内,对本活动规则进行变动或调整,相关变动或调整将公布在活动页面上。</P>
	  			</div>
  			</div>
  		</div>
  		
	  	<!--订单记录-->
	  	<div class="poker_order">
	  		<div class="poker_beij"></div>
  			<!--无订单-->
  			<div class="order_none" style="display: none;"><img src="images/order_none.png"></div>
  			<!--订单列表-->
  			<div class="orderList">
	  			<ul class="order_list"></ul>
	  			<div class="orderList_btn"><a href="javascript:;" class="btn_info">仅显示最近50条记录</a></div>
	  		</div>
	  	</div>
	  
	   <!--底部-->
	  	<div class="poker_foot" id="poker_foot">
	  		<div class="poker_foot_beij"></div>
	  		<div class="poker_cm ov">
	  			<div class="pc_num fl" id="containment-wrapper">
	  				<em class="icon ui-widget-content draggable" id="draggable2"></em>
	  				<ul class="ov">
	  				<?php foreach ($qitouList as $k=>$v):?>
	  				 <li <?php if($k==0) echo ' class="on"';?>><label></label><strong class="cm_num"><?php echo $v;?></strong></li>
	  				<?php endforeach;?>
	  				</ul>
	  			</div>
	  			<div class="pc_qd fr"><a href="javascript:start_pk();">确定</a></div>
	  		</div>
	  		<div class="poker_touz ov" style="display: none;">
	  			<div class="pf_clearing fl"><a href="javascript:outroom();">结算</a></div>
		  		<div class="pf_cm fl">
		  			<a href="javascript:;" class="active bind"><span class="st">大</span><span class="bs"></span></a>
		  			<a href="javascript:;" class=" bind"><span class="st">小</span><span class="bs"></span></a>
		  			<a href="javascript:;" class=" bind"><span class="st">红</span><span class="bs"></span></a>
		  			<a href="javascript:;" class=" bind"><span class="st">黑</span><span class="bs"></span></a>
		  		</div>
		  		<div class="pf_continue fr"><a class='active' href="javascript:continue_pk();">继续</a></div>
	  		</div>
	  	</div>
	  	<!---->
	  	<div class="poker_zjImgUrl"><img></div>
	  <!--禁止滑动-->
	 <!--<script type="text/javascript">
 		document.getElementById("poker").addEventListener('touchmove', function (event) {
		    event.preventDefault();
		}, false);
 	  </script>-->
 	  <script type="text/javascript">
 		document.getElementById("poker").addEventListener('touchmove', function (event) {
		    event.preventDefault();
		}, false);
		document.getElementById("poker_foot").addEventListener('touchmove', function (event) {
		    event.preventDefault();
		}, false);
 	  </script>
	  <script>
	  var G_ju=0;
	  var G_is_over=0;
	  var G_params={'token':'<?php echo $token?>'};
	  var G_kid;
	  var G_has_last=<?=$last_data?1:0?>;
	  <?php if($last_data):?>
	  var G_last_data=<?php echo json_encode($last_data)?>;
	  <?php else:?>
	  var G_last_data={};
	  <?php endif;?>
	  var G_fapai_clock=false;
	  var G_start_clock=false;
	  var G_touguangList=<?=json_encode($touguangList)?>;
	  var G_qitouList=<?=json_encode($qitouList)?>;
	  var G_is_card=0;

	  
	  $(function(){
		  dijiju();
		  foot_text_show();
		  if(G_has_last==1){
			  var len=G_last_data.info.content.length;
			  
			  console.log(G_last_data);
			  for(var i=0;i<len;i++){
				  if(i==0){
					  one_ju(G_last_data,1,i)
				  }else{
					  tow_ju(G_last_data,1,i)
				  }
				  //最后一张牌
				  if(i==len-1){
					  showLastPai(G_last_data.info.content[i].pai);
				  }
			  }
			  //设置默认嘉奖
			 for(var i in G_qitouList){
				 if(G_last_data.info.jindou==G_qitouList[i]){
					 var tg_text=G_touguangList[i];	
					 $(".tongguan h3.num").text(tg_text+"%");
					 $(".tongguan").show();
					
			     }
		     }
		  }else{
			  var tg_text=G_touguangList[0];
			  $(".tongguan h3.num").text(tg_text+"%");
			  $(".tongguan").show();
		  }
      });

      //底部文字显示
      function foot_text_show(){
          $(".poker_text").find("div").hide();
          if(G_ju==0){
        	  $(".poker_text").find(".first").show();
        	  $(".poker_text .windou").hide();
          }else if(G_is_over==1){
        	  //$(".poker_text").find(".lose").show();
          }else{
              var bs=bs_select();
              if(bs===''){
            	  $(".poker_text").find(".tet").show();
              }
          }        
      }
      
	  //写入第几局；
      function dijiju(){
    	  var poker_jl_li=$(".poker_jl").find('ul li');
		  var poker_jl_li_len=$(poker_jl_li).length;
		  var poker_jl_li_last_index=poker_jl_li_len-1;
		  $(poker_jl_li[poker_jl_li_last_index]).html("<span class='jl_first'>第1局</span>");
      }

	  //找出为空的li
      function find_poker_jl_li_empty(){
    	  var poker_jl_li=$(".poker_jl").find('ul li');
		  var poker_jl_li_len=$(poker_jl_li).length;
		  var len=poker_jl_li_len-1;
		  var has_empty=false;
		  var empty_li_index=0;
		  for(var i=len;i>=0;i--){
			  if($(poker_jl_li[i]).html()=='<span class="jl_first">第1局</span>'){
				  has_empty=true;
				  empty_li_index=i;
				  break;
			  }else if($(poker_jl_li[i]).text()==''){
				  has_empty=true;
				  empty_li_index=i;
				  break;
			  }
		  }
		  if(has_empty==false){
			  $(".poker_jl").find('ul').prepend('<li></li>');
			  return 0;
		  }else{
			  return empty_li_index;
	      }
      }

      //清除筹码选择
      function bs_clear(){
    	  $(".poker_foot .poker_touz .pf_cm").find("a").removeClass('active');
    	  //$(".poker_foot .poker_touz .pf_cm").find("a").removeClass('unbind');
    	  foot_text_show();
      }

      //判断用户选择 大小红黑
      function bs_select(){
    	  var bs_a=$(".poker_foot .poker_touz .pf_cm").find("a");
    	  var len=bs_a.length;
    	  var res='';
    	  for(var i=0;i<len;i++){
        	  if($(bs_a[i]).find(".bs").text()!='不可选'){
        		  if($(bs_a[i]).hasClass('active')){
            		  res=i;
                	  break;
                  }
              }
          }
          return res;
      }

      //第一局
      //ly 来源 刷新页面
      function one_ju(data,ly,ly_i){
    	    console.log(data);
    	    
    	    if(ly==0){
    	    	var content_len=data.info.content.length;
          		var content=data.info.content[content_len-1];
        	}else{
        		var content_len=data.info.content.length;
          		var content=data.info.content[ly_i];
            }
        	var datainfo=data.info;
      		var pai=content.pai;
      		var gailv=content.gailv;
      		var pkjindou=content.nowjindou;
      		G_kid=data.info.id;
      		
			if(ly==0){
				faip();
				setTimeout(function(){
					fpai(pai,1,pkjindou,datainfo);
				},100)
				setTimeout(function(){
					shoup();
				},500);
                if(G_is_card==0){
                	jj_gold(2,data.info.jindou);
                }
				
		    }else{
		    	pai_left_show(pkjindou,pai);
		    	bs_edit(gailv);
		    	$(".poker_cm").hide();
				$(".poker_touz").show();
			}
			G_ju++;
			//清除筹码选择
			bs_clear();  		    
      }

      //第二局
      function tow_ju(data,ly,ly_i){
    	    console.log(data);

    	    if(ly==0){
    	    	var content_len=data.info.content.length;
          		var content=data.info.content[content_len-1];
        	}else{
        		var content_len=data.info.content.length;
          		var content=data.info.content[ly_i];
            }
    	
      		var datainfo=data.info;
      		var pai=content.pai;
      		var gailv=content.gailv;
      		G_kid=data.info.id;

      		if(content.is_win!=='undefined'&&content.is_win==0){ //失败
      	    	var pkjindou=0;
      	    	var is_win=0;
      	    	G_is_over=1;
          	}else{  //胜利
          		var pkjindou=content.nowjindou;
          		var is_win=1;
            }
  	    	
			if(ly==0){
				faip();
				setTimeout(function(){
					fpai(pai,is_win,pkjindou,datainfo);
				},100);
				setTimeout(function(){
					shoup();
				},500);
		    }else{
		    	pai_left_show(pkjindou,pai);
		    	bs_edit(gailv);
			}

			G_ju++;
			bs_clear();
      }
	  
	    //发牌
	    function start_pk(){
		    if(G_start_clock==false){
		    	var params=G_params;//jindou is_card
			    var jindou_on=$(".poker_foot").find('ul li.on .cm_num');
//			    $(".poker_zz").show();
			    if(parseInt($(".pc_num li.on").find(".tiyan_num").text())>0){
					G_is_card=1;
				}else{
					G_is_card=0;
				}
			    params.is_card=G_is_card;
			    params.jindou=$(jindou_on).text();
		    	$.post('/html/games/fpk/start',params,function(data){
		    		
		    		//is_card=data.post.is_card;
		    		//if(data.status=='1'||is_card==1){
	    			if(data.status=='1'){
		    			G_start_clock=true;
		    			one_ju(data,0,0);    
		    			if(G_is_card==1){
		    				tiyNumber-=1;
		    			}
		    			if(tiyNumber<=0){
							$(".poker_cm .pc_num li.w"+tiyGold+"").find($(".st_ty")).hide();
							G_is_card=0;
						}
						$(".tiyan_num").text(tiyNumber);				
			        }else{
			        	error_message(data.info);
				    }
			    },'json');
			}
		}
		
		//继续
		function continue_pk(){
			if(G_fapai_clock==false){
				$(".pf_cm a").addClass("bind");
				var params=G_params;
				params.type=bs_select();
				params.kid=G_kid;
			    if(params.type===''){
				    error_message('请选择一个结果');
				}else{
					 $(".poker_zz").show();
					 $(".poker_foot_beij").hide();
					 $(".pf_cm").find(".bs").hide();
					G_fapai_clock=true;
					$.post('/html/games/fpk/fanpai',params,function(data){
			    		console.log(data);
			    		if(data.status=='1'){
			    			tow_ju(data,0,0);		
				        }else{
					        error_message(data.info);
					    }
				    },'json');
			    }
			}
		}

        //再来一局
		function again_play(){
			$(".poker_jl").find('ul').find('li').text('');
			$(".poker_dealer").find(".dealer_pai").remove();
			$(".poker_dealer").find(".dealer_dpai").after('<div class="dealer_pai pok"><img src="images/pk_pk.png"></div>');
			$(".pf_cm a").addClass("bind");
			$(".poker_jl li").removeClass("lt");
			$(".poker_touz").hide();
			$(".poker_cm").show();
			$(".poker_lose").hide();
			$(".poker_beij_1").hide();
			$(".poker_foot_beij").hide();
	        $(".pf_cm").find(".bs").show();
//	        $(".poker_jl li:first-child:after").show();
	        $(".tongguan").show();
	        $(".poker_jl").find('ul').find('li').removeClass("bup");
//	        $(".tongguan").hide();
//	        $(".tongguan h3.num").text("");
			G_ju=0;
			G_is_over=0;
			G_kid=0;
			G_has_last=0;
			G_last_data={}
			dijiju();
			foot_text_show();
			G_fapai_clock=false;
			G_start_clock=false;
	    }

	    //结算
	    function outroom(){
	    	
		    if(G_ju==0){
			}
		    else if(G_ju==1){
			    $(".tuic .tuic_text").show();
			}
			else{
				var params=G_params;
				params.kid=G_kid;
				$.post('/html/games/fpk/jiesuan',params,function(data){
					winGolds(data.info.win_jindou,0);
				},'json');
				$(".poker_foot_beij").show();
		    }
		}
	    //结算和通关 0结算 1通关
		function winGolds(win_jindou,type){
			if(type==0){
				$(".zhongj").find(".title").text('恭喜中奖');
			}else{
				$(".zhongj").find(".title").text('恭喜通关');
			}
			$(".zhongj").find(".zj_num .num").text(win_jindou);
			golds();
			jj_gold(1,win_jindou);
	    }

	    function gotoHome(){
	    	appOen.home();
		}

	    //关闭退出窗口
		function closetuic(){
			$(".tuic .tuic_text").hide();
	    }

		//显示最近订单
		function btn_order_show(){
			var params=G_params;
			$.post('/html/games/fpk/orderlist',params,function(data){
				if(data.status==1){
					$(".orderList .order_list").html(data.info);
				}else{
					
				}
				$(".poker_order .poker_beij").show();
				$(".poker_order").css("bottom","0");
			},'json');
	    }

		function game_over(){
			 $(".poker_lose,.poker_lose .poker_beij_1").show();
			 $(".poker_zz").hide();
			 
	    }

		//砸眼睛
		function wdaa(){
			 eye()
			 setTimeout(function(){
				$(".dealer_love i").removeClass("ani");
			 },2600)
		}


		//加减金豆
		function jj_gold(type,gold){
			var n=$(".myGold").text();
			if(type==1){
				var t=n*1+gold*1;
			}else{
				var t=n*1-gold*1;
			}
			$(".myGold").text(t);
		}

		//显示最后一张牌
		function showLastPai(pai){
			//$(".dealer_pai.pok img").attr("src",pai.img);
			//$(".dealer_pai.pok").addClass("rollB");
			//$(".dealer_pai").removeClass("pok");
			//$(".dealer_pai").css({"left":"80%",top:"124%","width":"20%"});
			//$('<div class="dealer_pai pok"><img src="images/pk_pk.png"></div>').appendTo($(".poker_dealer"));
			
			$(".poker_dealer").find(".dealer_pai").remove();
			$(".poker_dealer").find(".dealer_dpai").after('<div class="dealer_pai rollB rollR"><img src="'+pai.img+'"></div>');
			$('<div class="dealer_pai pok"><img src="images/pk_pk.png"></div>').appendTo($(".poker_dealer"));
		}
		
	    var ptHeight=$(".poker_top").height();
		var pdHeight=$(".poker_foot").height();
		var pbheight=$("body").height(); 
		var parHeight=pbheight-ptHeight-pdHeight;
		var ltHeight=parHeight/12;
		$(".poker_jl li").css("height",ltHeight-1.0);
	  </script>
     <?=\common\components\widgets\ShareWidget::widget([]);?>
     <?=\common\components\widgets\BoxWidget::widget([]);?>
	</body>
</html>
