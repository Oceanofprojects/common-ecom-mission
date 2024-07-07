<?php


class orderMdl
{
    public $db;
    public $cid;

    public function __construct(){

    }
    public function get_courier_fee($net_weight = 0, $cc = [])
    {
        if($net_weight>10000){
				return ['status' => false, "data" => [], "message" => "Courier netweight - Limit reached, Please contact admin !"];
        }
        $tmp_net_weight = $net_weight;
        $net_weight = ($net_weight <= 1000)?1000:$net_weight;
        if($net_weight>=1000 && $net_weight<10000){
            $range = 100;
            $g = 5;//Round 500grams
            $s = $net_weight * 1 /$range;
        }
        for ($i = 5; $i < $s; $i += 5) {
            $c = $i;
        }
        $c += $g;//Adding round grams
        $net_weight =  $c * $range;
        return ['status'=>true,'price'=>($net_weight / 1000) * $cc['PRICE'],'rounded_net_weight'=>$net_weight,'actual_net_weight'=>$tmp_net_weight];
    }

}//class END



?>