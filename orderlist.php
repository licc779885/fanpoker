<?php if($list):?>
<?php foreach ($list as $v):
    $jindou=$v->jindou;
    $content=json_decode($v->content,true);

    $pai=[];
  
    
    $gailv=[];
    $userType=[];
    $nowjindou=[];
    foreach ($content as $key=>$val){
        $pai[]=$val['pai'];
        $gailv[]=isset($val['gailv'])?$val['gailv']:[];
        if(isset($val['type'])&&$val['type']!==''){
            $item=[
	           'type'=>$val['type']
            ];
            $item['name']=$val['type']==0?'大':($val['type']==1?'小':($val['type']==2?'红':'黑'));
            $userType[]=$item;
        }
        if(isset($val['nowjindou'])&&$val['nowjindou']&&$jindou!=$val['nowjindou']){
            $nowjindou[]=$val['nowjindou'];
        }
    }
//     var_dump($pai);
//     var_dump($gailv);
//     var_dump($userType);

?>
<li class="lt">
    <div class="list_top ov">
        <div class="lt_fl fl">
        <div class="time">
        <span class="year"><?=date("Y",$v->add_time)?></span>.<span class="mon"><?=date("m",$v->add_time)?></span>.<span class="day"><?=date("d",$v->add_time)?></span>
        <span class="dat"><?=date("H:i",$v->add_time)?></span></div>
	  	<div class="num">订单编号：<span class="num_text"><?php echo $v['code']?></span></div>
	  	</div>
	  	<div class="lt_fr fr">
	  	<div class="gold">共投<span class="gold_num"><?=$v->jindou;?></span>豆</div>
	  	<?php if($v->win_jindou>0):?>
	  	<div class="state win">共中<span class="state_num"><?=$v->win_jindou;?></span>豆</div>
	  	<?php else:?>
	  	<div class="state">未中奖</div>
	  	<?php endif;?>
	  	</div>
  	</div>
  	<div class="list_dom ov">
        <ul class="dom_list">
        <?php foreach ($content as $key=>$val):?>
        <?php if(isset($userType[$key])):?>
        <li>
            <span class="tit">[<?=$pai[$key]['title']?>]</span>,
            <span class="dx"><?php echo $userType[$key]['name']?></span>，
                            奖励倍数：<span class="bs"><?=$gailv[$key][$userType[$key]['type']]?></span>
            <?php if(isset($nowjindou[$key])): ?>，累计：<span class="bs"><?=$nowjindou[$key]?></span><?php endif;?>
        </li>
        <?php else:?>
         <li>
         <span class="tit">[<?=$pai[$key]['title']?>]</span>,
         <span class="dx"><?=$v->win_jindou>0?'结算':'未中奖';?></span>
         <?php if($v->win_jindou>0):?>
         ,中<?=$v->win_jindou-$v->is_jiajiang?>豆
         <?php endif;?>
         <?php if($v->is_jiajiang>0):?>
         ,嘉奖<?=$v->is_jiajiang?>豆
         <?php endif;?>
         </li>
        <?php endif;?>
        <?php endforeach;?>
        </ul>
  	</div>
</li>
<?php endforeach;?>
<?php endif;?>