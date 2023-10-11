<?php



trait userData{
	public function getUserId($id){
			$arr = [
				'tbl_name'=>'cus_log',
				'action'=>'select',
				'data'=>[],
        'condition'=>['manual'=>['uid="'.$id.'"']],
				'query-exc'=>true
			];
			$data = $this->generateQuery($arr);
			if($data['status'] && count($data['data']) !==0){
				return [true,$data['data'][0]['cid']];
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
