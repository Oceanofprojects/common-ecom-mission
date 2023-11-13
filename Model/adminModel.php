<?php

require_once __DIR__.'/../core/connect.php';
require_once __DIR__.'/../Model/commonModel.php';

class adminCtrl extends commonModel{
	public $db;
	public $cid;
	public function __construct(){
		$connect = new Connect();
		$this->db=$connect->Connection();
	}
	
    public function getCusOrderList(){
        $tmptbl = 'myorder';
        $arr = [
            'tbl_name'=>$tmptbl,
            'action'=>'join',
            'data'=>['manual'=>["$tmptbl.cid,$tmptbl.cart_date,$tmptbl.payment_proof as pay_proof,$tmptbl.cart_status as status,$tmptbl.order_id,customers.c_name as name"]],
            'join_param'=>[
                ['customers','left_join','cid','cid'],
            ],
            'query-exc'=>true
        ];
        $flag=$this->generateQuery($arr);
        if($flag['status'] == 'success'){
            return $flag['data'];
        }else{
            return $flag;
        }
    }

}//class END



?>