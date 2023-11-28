<?php

require_once __DIR__.'/../core/connect.php';
require_once __DIR__.'/../Model/commonModel.php';
require_once __DIR__.'/../Model/customerModel.php';

class adminCtrl extends commonModel{
	public $db;
	public $cid;
	public function __construct(){
		$connect = new Connect();
		$this->db=$connect->Connection();

        $this->cusMdl = new customer();
        $accessFlag = $this->cusMdl->getUserId((isset($_COOKIE['uid'])?$_COOKIE['uid']:0));//get role
        if(count($accessFlag)!==0){
            if(!in_array('admin',$accessFlag)){
                die($accessFlag[1]);
            }
        }else{
            die('OOPS!, Unauthorized access !');
        }
	}
	
    public function getCusOrderList(){
        $tmptbl = 'myorder';
        $arr = [
            'tbl_name'=>$tmptbl,
            'action'=>'join',
            'data'=>['manual'=>["$tmptbl.cid,$tmptbl.cart_date,customers.role,$tmptbl.payment_proof as pay_proof,$tmptbl.cart_status as status,$tmptbl.order_id,customers.c_name as name"]],
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
public function updateCusFAdmin(){
         $arr = [
            'tbl_name'=>'customers',
            'action'=>'update',
            'data'=>[],
            'condition'=>["cid='".$_GET['cusid']."'"],
            'query-exc'=>true
        ];
        $stage1 = false;
        $stage2 = false;

    if(!empty($_GET['role'])){
        $stage1 = true;
            $arr['data'][] = "role='".$_GET['role']."'";
    }
    if(!empty($_GET['pwd'])){
            $stage2 = true;
            $arr['data'][] = "pwd='".password_hash($_GET['pwd'], PASSWORD_DEFAULT)."'";
    }
    if($stage1 || $stage2){
        $flag = $this->generateQuery($arr);
        if($flag['status'] == 'success'){
            return ['status'=>true,'data'=>[],'message'=>'Data updated successfully.'];
        }else{
            return ['status'=>false,'data'=>[],'message'=>'Err in update customers data'];
        }
    }
    exit;
}

    public function changeOrderStatus(){
        $order_id = $_GET['oid'];
        $status = $_GET['status'];
        $arr = [
            'tbl_name'=>'myorder',
            'data'=>[],
            'action'=>'update',
            'condition'=>['manual'=>['order_id = "'.$_GET['oid'].'"']],
            'query-exc'=>true
        ];
        if($status == 'Arriving'){
            $d = $_GET['Ddate'];
            if(empty($d)){
                return ['status'=>false,'data'=>[],'message'=>'Please enter delivery date for arriving status.'];
            }else{
                $arr['data'] = ["cart_status='$status,$d'"];
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