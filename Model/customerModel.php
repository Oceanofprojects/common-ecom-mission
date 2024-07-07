<?php

require_once __DIR__ . '/../core/connect.php';
require_once __DIR__ . '/../Model/commonModel.php';

class customer extends commonModel
{
	use userData;
	public $cid;
	public function __construct()
	{
		$connect = new Connect();
		$this->db = $connect->Connection();
	}
	public function saveCustomer($data)
	{
		unset($data['key']);
		unset($data['controller']);
		unset($data['con_pwd']);
		$data['cid'] = $this->genRnd('numeric', 8);
		$tmpPwd = password_hash($data['pwd'], PASSWORD_DEFAULT);
		$data['pwd'] = $tmpPwd;
		$data['role'] = 'customer';

		$arr = [
			'pre_condition' => ['isDuplicate' => [
			    ["email=$data[email]"],
			    ["ph_num=$data[ph_num]"],
			    ["whatsapp_num=$data[whatsapp_num]"]
			]],
			'tbl_name' => 'customers',
			'action' => 'INSERT',
			'data' => $this->genArAssocToColSep($data),
			'query-exc' => true
		];
		$res = $this->generateQuery($arr);
		$res['cid'] = $data['cid'];
		return $res;
	}

	public function editAccount($data)
	{
		unset($data['key']);
		unset($data['controller']);


		$arr = [
			'tbl_name' => 'customers',
			'action' => 'select',
			'data' => ['manual' => ['count(cid) as resC']],
			'condition' => ["email=$data[email]", "ph_num=$data[ph_num]", "whatsapp_num=$data[whatsapp_num]"],
			'conditionCombineOpt' => 'OR',
			'query-exc' => true
		];
		$dupFlag = $this->generateQuery($arr);
		if ($dupFlag['status'] == 'success') {
			if ($dupFlag['data'][0]['resC'] > 1) {
				return ['status' => false, "data" => [], "msg" => "Oops!, Duplicate record founded !, Please change Email Or Phone number/Whatsapp_num"];
			} else {
				if (isset($_COOKIE['uid'])) {
					$cflag = $this->getUserId($_COOKIE['uid']);
					//	$updatas = $this->genArAssocToColSep($data);
					if ($cflag[0]) {
						$arr = [
							'tbl_name' => 'customers',
							'action' => 'update',
							'data' => $this->genArAssocToColSep($data),
							'condition' => ["cid=" . $cflag[1]],
							'query-exc' => true
						];
						$uptSetting = $this->generateQuery($arr);
						//echo $uptSetting;exit;
						if ($uptSetting['status'] == 'success') {
							return ['status' => true, "data" => [], "msg" => "Account updated successfully."];
						} else {
							return $uptSetting;
						}
					} else {
						return ['status' => false, "data" => [], "msg" => "Please login!"];
					}
				} else {
					return ['status' => false, "data" => [], "msg" => "Please login!"];
				}
			}
		} else {
			return $dupFlag;
		}
		//		return $this->genArAssocToColSep($data);
	}

	public function getCusListByIdnty($idnty)
	{
		$arr = [
			'tbl_name' => 'customers',
			'action' => 'select',
			'data' => ['cid', 'pwd', 'role'],
			'condition' => ["c_name=$idnty", "email=$idnty", "cid=$idnty", "ph_num=$idnty", "whatsapp_num=$idnty"],
			'conditionCombineOpt' => 'OR',
			'query-exc' => true
		];
		return $this->generateQuery($arr);
	}

	public function addCustomerLog($cid)
	{
		$uid = $this->genRnd('alpha_numeric', 20);
		$ip = '0000:00:00:00';
		$arr = [
			'tbl_name' => 'cus_log',
			'action' => 'insert',
			'data' => ["uid=$uid", "cid=$cid", "ip_ad=$ip", "_date=" . PHP_CURRENTDATE],
			'query-exc' => true
		];
		$res = $this->generateQuery($arr);
		$res['uid'] = $uid;
		return $res;
	}

}//class END

trait userData
{

	public function getUserRoleById($id)
	{
		$arr = [
			'tbl_name' => 'customers',
			'action' => 'select',
			'data' => ['role'],
			'condition' => ['manual' => ["cid='$id'"]],
			'query-exc' => true
		];
		$res = $this->generateQuery($arr);
		if (count($res['data']) > 0) {
			return ($res['data'][0]['role'] !== null) ? $res['data'][0]['role'] : '';
		}
	}
	public function getUserId($id)
	{
		if (isset($_SESSION['user-data'][$id])) {
			return [true, $_SESSION['user-data'][$id], $this->getUserRoleById($_SESSION['user-data'][$id])];
		} else {
			return [false, 'UnAnth User. Please login.'];
		}
	}

	public function getUserInfoById($defid = '')
	{
		//default ID for admin changes
		if (empty($defid)) {
			if (isset($_COOKIE['uid'])) {
				$cflag = $this->getUserId($_COOKIE['uid']);
				if ($cflag[0]) {
					$cid = $cflag[1];
				} else {
					return ['status' => false, 'data' => [], 'message' => 'Please login'];
				}
			} else {
				return ['status' => false, 'data' => [], 'message' => 'Please login'];
			}
		} else {
			$cid = $defid;//admin defined CID
		}

		$arr = [
			'tbl_name' => 'customers',
			'action' => 'select',
			'data' => ['role', 'c_name', 'profile', 'address_1', 'email', 'c_gender', 'address_2', 'country', 'state', 'city', 'pin_code', 'ph_num', 'whatsapp_num'],
			'condition' => ['manual' => ["cid='$cid'"]],
			'query-exc' => true
		];
		$data = $this->generateQuery($arr);
		if ($data['status'] == 'success') {
			return ['status' => true, 'data' => $data['data'], 'message' => []];
		} else {
			return $data;
		}
	}

	public function getCustomersList()
	{
		$arr = [
			'tbl_name' => 'customers',
			'action' => 'select',
			'data' => ['cid', 'role', 'c_name', 'profile', 'address_1', 'email', 'c_gender', 'address_2', 'country', 'state', 'city', 'pin_code', 'ph_num', 'whatsapp_num'],
			'query-exc' => true
		];
		$data = $this->generateQuery($arr);
		if ($data['status'] == 'success') {
			return ['status' => true, 'data' => $data['data'], 'message' => []];
		} else {
			return $data;
		}
	}



}//class END

?>