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
            'order'=>["$tmptbl.s_no",'desc'],
            'query-exc'=>true
        ];
        $flag=$this->generateQuery($arr);
        if($flag['status'] == 'success'){
            return $flag['data'];
        }else{
            return $flag;
        }
    }

    public function changeOrderStatus(){
        $order_id = $_GET['oid'];
        $status = $_GET['status'];
        $arr = [
            'tbl_name'=>'myorder',
            'action'=>'update',
            'condition'=>['manual'=>['order_id = "'.$_GET['oid'].'"']],
            'query-exc'=>true
        ];
        if($status == 'Arriving'){
            $d = $_GET['Ddate'];
            if(empty($d)){
                $arr['data'] = ["cart_status='$status~After two business days.'"];//
                //return ['status'=>false,'data'=>[],'message'=>'Please enter delivery date for arriving status.'];
            }else{
                $arr['data'] = ["cart_status='$status~$d'"];
            }
        }else{
            $arr['data'] = ["cart_status='$status'"];
        }
        $flag=$this->generateQuery($arr);
        if($flag['status'] == 'success'){
            return ['status'=>true,'data'=>[],'message'=>'Order status changed'];
        }else{
            return $flag;
        }
    }

}//class END



?>