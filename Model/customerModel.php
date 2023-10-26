<?php

require_once __DIR__.'/../core/connect.php';
require_once __DIR__.'/../Model/commonModel.php';

class customer extends commonModel{
	use userData;
	public $db;
	public $cid;
	public function __construct(){
		$connect = new Connect();
		$this->db=$connect->Connection();
	}
	public function saveCustomer($data){
		unset($data['key']);
		unset($data['controller']);
		unset($data['con_pwd']);
		$data['cid']=$this->genRnd('numeric',8);
		$tmpPwd =  password_hash($data['pwd'], PASSWORD_DEFAULT);
		$data['pwd'] = $tmpPwd;
		$data['role'] = 'customer';
		$arr = [
            'pre_condition' => ['isDuplicate' => [
                ['email', "'" . $data['email'] . "'"],
                ['ph_num', "'" . $data['ph_num'] . "'"],
                ['whatsapp_num', "'" . $data['whatsapp_num'] . "'"]
                ]],
            'tbl_name' => 'customers',
            'action' => 'INSERT',
            'data' => $this->genArAssocToColSep($data),
			'query-exc'=>true
        ];
        $res = $this->generateQuery($arr);
		$res['cid'] = $data['cid'];
		return $res;
	}

	public function getCusListByIdnty($idnty){
		$arr = [
            'tbl_name' => 'customers',
            'action' => 'select',
            'data' => ['cid','pwd'],
			'condition'=>["c_name='".$idnty."'","email='".$idnty."'","cid='".$idnty."'","ph_num='".$idnty."'","whatsapp_num='".$idnty."'"],
			'conditionCombineOpt'=>'OR',
			'query-exc'=>true
        ];
		return $this->generateQuery($arr);
    }

	public function addCustomerLog($cid){
		$uid = $this->genRnd('alpha_numeric',20);
		$ip = '0000:00:00:00';
		$arr = [
            'tbl_name' => 'cus_log',
            'action' => 'insert',
            'data' => ["uid='$uid'","cid='$cid'","ip_ad='$ip'","_date=CURRENT_DATE"],
			'query-exc'=>true
        ];
		$res = $this->generateQuery($arr);
		$res['uid']=$uid;
		return $res;
	}

}//class END

trait userData{

	public function getUserRoleById($id){
		$arr = [
			'tbl_name'=>'customers',
			'action'=>'select',
			'data'=>['role'],
			'condition'=>['manual'=>['cid="'.$id.'"']],
					'query-exc'=>true
		];
		$res=$this->generateQuery($arr);
		return ($res['data'][0]['role'] !== null)?$res['data'][0]['role']:'';
	} 
	public function getUserId($id){
			$arr = [
				'tbl_name'=>'cus_log',
				'action'=>'select',
				'data'=>[],
        'condition'=>['manual'=>['uid="'.$id.'" AND _date=CURRENT_DATE']],
				'query-exc'=>true
			];
			$data = $this->generateQuery($arr);
			if($data['status'] && count($data['data']) !==0){
				return [true,$data['data'][0]['cid'],$this->getUserRoleById($data['data'][0]['cid'])];
			}else{
				return [false,'UnAnth Token. Please login.'];
			}
	}

	public function userExist($name,$pwd){
		$q = "Select * from customers where cid='{$name}' or c_fname='{$name}' or email='{$name}' or ph_num='{$name}'";
		$sql = $this->db->prepare($q);
		if($sql->execute()){
			$res = $sql->fetchAll(PDO::FETCH_ASSOC);
			if(count($res) !== 0){
				for($i=0;$i<count($res);$i++){
					if(password_verify($_GET['pwd'],$res[$i]['pwd'])){
						return ['status'=>1,'data'=>['UID'=>base64_encode($res[$i]['cid'])],'msg'=>'User Exist'];
						exit;
					}
				}
				return ['status'=>0,'data'=>[],'msg'=>'User not exist, Try again.'];
			}else{
				return ['status'=>0,'data'=>[],'msg'=>'UserData zero fetch'];
			}
		}
	}
}

?>
