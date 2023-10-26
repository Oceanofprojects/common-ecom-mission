<?php


$cur_or_data_list[0] = ['p_id'=>'p2','qnty'=>10];
$cur_or_data_list[1] = ['p_id'=>'p1','qnty'=>50];
$cur_or_data_list[3] = ['p_id'=>'p3','qnty'=>100];
$cur_or_data_list[4] = ['p_id'=>'p4','qnty'=>50];

$pro_data_list[0] = ['p_id'=>'p2','qnty'=>80];
$pro_data_list[1] = ['p_id'=>'p1','qnty'=>100];
$pro_data_list[3] = ['p_id'=>'p4','qnty'=>800];
$pro_data_list[4] = ['p_id'=>'p3','qnty'=>0];

sort($cur_or_data_list);
sort($pro_data_list);
for($i=0;$i<count($pro_data_list);$i++){
    $qnty = ($pro_data_list[$i]['qnty']-$cur_or_data_list[$i]['qnty']);
    if($qnty < 0){
//outof stock return
    }else{
        $res[$i] = ['p_id'=>$pro_data_list[$i]['p_id'],'quantity'=>$qnty];
    }
}

print_r($res);
?>