<?php

require_once __DIR__.'/../core/connect.php';
require_once __DIR__.'/../model/commonModel.php';
session_start();

class EP extends commonModel{
	use userData;
	public $db;
	public $cid;
	public function __construct(){
		$connect = new Connect();
		$this->db=$connect->Connection();
		if(isset($_SESSION['1485fe7c0627c439594baf9c3db3d47ec39e6abab732dec42a662067d7374940'])){
			$cflag = $this->getUserId();
			if($cflag[0]){
				$this->cid = $cflag[1];
			}else{
				echo $cflag[1];exit;
			}
		}else{
			$this->cid = null;
		}
	}

	public function get_all(){

		if(isset($_GET['search']) && !empty($_GET['search'])){
			$s=$_GET['search'];
			$uid=base64_decode($_GET['uid']);
			if(empty($uid)){
				if($s == 'product'){
					$q="SELECT A.p_id,A.cate,A.p_img,A.p_name,A.price,A.offer,A.unit,A.stock,B.cid AS favExistCid FROM products AS A LEFT JOIN myfav AS B ON B.p_id = A.p_id ORDER BY p_id ASC";
				}else{
					$q="SELECT A.p_id,A.cate,A.p_img,A.p_name,A.price,A.offer,A.unit,A.stock,B.cid AS favExistCid FROM products AS A LEFT JOIN myfav AS B ON B.p_id = A.p_id where A.cate='{$s}'";
				}
			}else{
				if($s == 'product'){
					$q="SELECT A.p_id,A.cate,A.p_img,A.p_name,A.price,A.offer,A.unit,A.stock,B.cid AS favExistCid FROM products AS A LEFT JOIN myfav AS B ON B.p_id = A.p_id AND B.cid = {$uid} ORDER BY p_id ASC";
				}else{
					$q="SELECT A.p_id,A.cate,A.p_img,A.p_name,A.price,A.offer,A.unit,A.stock,B.cid AS favExistCid FROM products AS A LEFT JOIN myfav AS B ON B.p_id = A.p_id AND B.cid = {$uid} where A.cate='{$s}' ORDER BY p_id ASC";
				}
			}
		}
		if(isset($_GET['item']) && !empty($_GET['item'])){
			$item=$_GET['item'];
			$q="SELECT A.p_id,A.cate,A.p_img,A.p_name,A.price,A.offer,A.unit,A.stock AS favExistCid FROM products AS A where A.p_name like '%{$item}%'";
		}
		if(isset($_GET['uid']) && !empty($_GET['uid'])){
			$uid = $_GET['uid'];
			$q="SELECT A.p_id,A.p_img,A.p_name,A.price,A.offer,A.unit,A.stock,B.cid AS favExistCid FROM products AS A LEFT JOIN myfav AS B ON B.p_id  = A.p_id AND B.cid = '{$uid}' ORDER BY s_no ASC";
		}
		$q = "select * from products limit 3";
		$sql = $this->db->prepare($q);
		if($sql->execute()){
			$res=$sql->fetchAll(PDO::FETCH_ASSOC);
			echo json_encode(['status'=>1,'data'=>$res,'cartnum'=>$this->get_cate_num()]);
		}else{
			echo json_encode(['r'=>1,'status'=>0,'data'=>[$q]]);
		}
	}
	public function get_cate_num(){
		if(isset($_GET['uid'])){
			return $this->get_cart_indicate($_GET['uid']);
		}else{return 0;}
	}
	public function get_all_product(){
		$sql = $this->db->prepare("select * from products");
		if($sql->execute()){
			$res=$sql->fetchAll(PDO::FETCH_ASSOC);
			echo json_encode(['status'=>1,'data'=>$res]);
		}else{
			echo json_encode(['status'=>0,'data'=>[]]);
		}
	}

	public function validate_id(){
		$q="select * from customers where cid='{$_GET['val']}'";
		$sql = $this->db->prepare($q);
		if($sql->execute()){
			$res=$sql->fetchAll(PDO::FETCH_ASSOC);
			if(count($res)){
			echo json_encode(['flag'=>1]);
			}else{
			echo json_encode(['flag'=>0]);
			}
		}
	}

	public function check_id(){
		$q="select * from customers where cid={$_GET['val']}";
		$sql = $this->db->prepare($q);
		if($sql->execute()){
			$res=$sql->fetchAll(PDO::FETCH_ASSOC);
			if(count($res)){
			echo json_encode(['status'=>1,'data'=>[$res[0]['cid'],'vaildCus']]);
			}else{
			echo json_encode(['status'=>0,'data'=>$res]);
			}
		}
	}
	public function addToCart(){
		if($this->cartItemExists($_GET['uid'],$_GET['p_id'])){
			$quant=$_GET['quantity'];
			$uid=$_GET['uid'];
			$p_id=$_GET['p_id'];
			$q="update mycart set quantity=$quant,updated_at=now() where cid='$uid' and p_id='$p_id'";
			$sql = $this->db->prepare($q);
			if($sql->execute()){
				echo json_encode(['status'=>1,'data'=>'Product Updated','cartnum'=>$this->get_cart_indicate($uid)]);
			}
		}else{
			$randid = rand(11111,99999);
			$dt = date('Y-m-d');
			$uid=$_GET['uid'];
			$p_id=$_GET['p_id'];
			$quant=$_GET['quantity'];
			$price=$_GET['price'];
			$p_name = $_GET['p_name'];

			$q="insert into mycart values(null,'$randid','$uid','$p_id','$p_name',$quant,$price,'$dt',current_timestamp,now())";
			$sql = $this->db->prepare($q);
			if($sql->execute()){
				echo json_encode(['status'=>1,'data'=>'Product added','cartnum'=>$this->get_cart_indicate($uid)]);
			}
		}
	}

	public function get_cart_indicate($uid){
//GET CART NUMBER
				$sql = $this->db->prepare("select * from mycart where cid='$uid' and _date=date(now())");
					if($sql->execute()){
						$res=$sql->fetchAll(PDO::FETCH_ASSOC);
						if(count($res)){
							$cart_indicate= count($res);
						}else{
							$cart_indicate= 0;
						}
					}
					return $cart_indicate;
	}
	public function cartItemExists($uid,$p_id){
		$q="select * from mycart where cid='$uid' and p_id='$p_id'";
		$sql = $this->db->prepare($q);
		if($sql->execute()){
			$res=$sql->fetchAll(PDO::FETCH_ASSOC);
			if(count($res)){
			return true;
			}else{
			return false;
			}
		}
	}
	public function mycart(){
		$uid = $_GET['uid'];
		if(isset($_GET['date'])){
			$d=$_GET['date'];
			$q="SELECT * from products as P right join mycart as F on P.p_id= F.p_id where _date='{$d}' and cid='{$uid}' order by P.s_no asc";
		}else{
			$q="SELECT * from products as P right join mycart as F on P.p_id= F.p_id where _date=date(now()) and cid='{$uid}' order by P.s_no asc";
		}
		$sql = $this->db->prepare($q);
			if($sql->execute()){
				$res=$sql->fetchAll(PDO::FETCH_ASSOC);
				echo json_encode(['status'=>1,'data'=>$res]);
		}
	}

	public function myfav(){
		$uid = $_GET['uid'];
		$sql = $this->db->prepare("select * from myfav where cid='$uid'");
			if($sql->execute()){
				$res=$sql->fetchAll(PDO::FETCH_ASSOC);
				echo json_encode(['status'=>1,'data'=>$res]);
		}
	}
	public function removefrommycart(){
		$cartid = $_GET['cartid'];
		$sql = $this->db->prepare("delete from mycart where cart_id=$cartid");
			if($sql->execute()){
				//$res=$sql->fetchAll(PDO::FETCH_ASSOC);
				echo json_encode(['status'=>1,'data'=>'Item removed from cart']);
			}else{
				echo json_encode(['status'=>0,'data'=>'Err in removing item from cart.']);
			}
	}
	public function get_product(){
		$p_id = $_GET['p_id'];
		$sql = $this->db->prepare("select * from products where p_id='$p_id'");
			if($sql->execute()){
				$res=$sql->fetchAll(PDO::FETCH_ASSOC);
				echo json_encode(['status'=>1,'data'=>$res]);
			}else{
				echo json_encode(['status'=>0,'data'=>'Err in get product']);
			}
	}
	public function addToFav(){
		if($this->cid == null){
			echo json_encode(['status'=>0,'flag'=>0,'data'=>'err in fav','message'=>'Please login to make action !']);
			exit;
		}
		$c_id = $this->cid;
		$p_id = $_GET['p_id'];

		$arr = ['tbl_name'=>'myfav','action'=>'select','data'=>[],'condition'=>["p_id='".$p_id."'","cid='".$c_id."'"],'query-exc'=>true];

		if(count($this->generateQuery($arr)['data'])){//Delete FAV
			$arr = ['tbl_name'=>'myfav','action'=>'delete','data'=>[],'condition'=>["p_id='".$p_id."'","cid='".$c_id."'"],'query-exc'=>true];
			if($this->generateQuery($arr)['status']){
				echo json_encode(['status'=>1,'flag'=>1,'data'=>'fav removed']);
			}else{
				echo json_encode(['status'=>0,'flag'=>0,'data'=>'Err in fav remove']);
			}
		}else{//Insert Fav
				$arr = ['tbl_name'=>'myfav','action'=>'insert','data'=>['p_id="'.$p_id.'"','cid="'.$c_id.'"','created_at=current_timestamp','updated_at=now()'],'condition'=>["p_id='".$p_id."'","cid='".$c_id."'"],'query-exc'=>true];
			if($this->generateQuery($arr)['status']){
				echo json_encode(['status'=>1,'flag'=>1,'data'=>'fav added']);
			}else{
				echo json_encode(['status'=>0,'flag'=>0,'data'=>'err in insert']);
			}
		}

	}

		public function get_cate_list(){
			$q="select distinct cate as cate_name from products";
			$sql = $this->db->prepare($q);
			if($sql->execute()){
				$res=$sql->fetchAll(PDO::FETCH_ASSOC);
				echo json_encode(['status'=>1,'data'=>$res]);
			}else{
				echo json_encode(['status'=>0,'data'=>'Err in get product']);
			}
		}

		public function get_product_list_and_cate_list(){
			$q="select distinct p_name as product_name from products";
			$sql = $this->db->prepare($q);
			if($sql->execute()){
				$pro_list=$sql->fetchAll(PDO::FETCH_ASSOC);
					$q="select distinct cate as cate_list from products";
					$sql = $this->db->prepare($q);
					if($sql->execute()){
						$cate_list=$sql->fetchAll(PDO::FETCH_ASSOC);
						echo json_encode(['status'=>1,'data'=>['product_list'=>$pro_list,'cate_list'=>$cate_list]]);
					}
			}else{
				echo json_encode(['status'=>0,'data'=>'Err in get product list']);
			}
		}

		public function get_for_edit(){
			$q="select * from products where p_name like '%".$_GET['val']."%' limit 1";
			$sql = $this->db->prepare($q);
			if($sql->execute()){
				$res=$sql->fetchAll(PDO::FETCH_ASSOC);
				if(count($res)){
				echo json_encode(['status'=>1,'data'=>$res]);
				}else{
				echo json_encode(['status'=>0,'data'=>$_GET['val'].', Not found !. Zero fetch error.']);
				}
			}else{
				echo json_encode(['status'=>0,'data'=>'Err in get product']);
			}
		}

		public function addproduct(){
			$cate_name = $_POST['cate_name'];
			$p_name = $_POST['p_name'];
			$price = $_POST['price'];
			$offer = $_POST['offer'];
			$unit = $_POST['unit'];
			$stock = $_POST['stock'];
			$rnd_id = $this->gen_file_name();
			$file_ext = pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION);
			if(file_exists('images/product_images/PIC'.$rnd_id.'.'.$file_ext)){
				echo "file_ext err";
			}else{
				if(move_uploaded_file($_FILES['file']['tmp_name'],'images/product_images/PIC'.$rnd_id.'.'.$file_ext)){
					$up_file_name = 'PIC'.$rnd_id.'.'.$file_ext;
				}else{
					$up_file_name = 'PIC'.$rnd_id.'_emp.txt';
				}
			}

			$sql = $this->db->prepare("insert into products value(null,'$rnd_id','$cate_name','$up_file_name','$p_name',$price,$offer,'$unit',$stock,current_timestamp,now())");
			if($sql->execute()){
				echo json_encode(['status'=>1,'data'=>'Item added successfully']);
			}else{
				echo json_encode(['status'=>0,'data'=>'Err in get product']);
			}

		}

		public function updateproduct(){
			//DELETING EXITING IMAGE
			if($_POST['hidden_img_indi']){
				if(unlink('images/product_images/'.$_POST['old_img_name'])){
					$img_removed = true;
					//RE-UPLOAD CODE
					$rnd_id = $this->gen_file_name();
					$file_ext = pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION);
					if(file_exists('images/product_images/PIC'.$rnd_id.'.'.$file_ext)){
						echo "file_ext err";
					}else{
						if(move_uploaded_file($_FILES['file']['tmp_name'],'images/product_images/PIC'.$rnd_id.'.'.$file_ext)){
							$up_file_name = 'PIC'.$rnd_id.'.'.$file_ext;
						}else{
							$up_file_name = 'PIC'.$rnd_id.'_emp.txt';
						}
					}
				}else{
					$img_removed = false;
				}
			}else{
				$img_removed = false;
				$up_file_name =$_POST['old_img_name'];
			}
			$p_id = $_POST['p_id'];
			$cate_name = $_POST['cate_name'];
			$p_name = $_POST['p_name'];
			$price = $_POST['price'];
			$offer = $_POST['offer'];
			$unit = $_POST['unit'];
			$stock = $_POST['stock'];
			$sql = $this->db->prepare("update products set cate='{$cate_name}',p_img='{$up_file_name}',p_name='{$p_name}',price=$price,offer=$offer,unit='$unit',update_at=now() where p_id='{$p_id}'");
			if($sql->execute()){
				echo json_encode(['status'=>1,'data'=>'Item updated successfully','details'=>[$img_removed]]);
			}else{
				echo json_encode(['status'=>0,'data'=>'Err in product update','details'=>[$img_removed]]);
			}


		}

		public function gen_file_name(){
			$a = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];
			$n = [0,1,2,3,4,5,6,7,8,9];
			return $n[rand(0,9)].$a[rand(0,25)].$a[rand(0,25)].$n[rand(0,9)].$n[rand(0,9)].$n[rand(0,9)];
		}

		public function login(){
		$d = $this->userExist($_GET['name'],$_GET['pwd']);
		if($d['status']){
				echo json_encode(['status'=>1,'msg'=>$d['msg'],'data'=>[$d['data']],'row_count'=>1]);
		}else{
			echo json_encode(['status'=>0,'msg'=>$d['msg'],'data'=>[],'row_count'=>0]);
		}
//		$this->userExist($_POST['name'],$_POST['pwd']);
		}
}


trait userData{
	public function getUserId(){
			$arr = [
				'tbl_name'=>'cus_log',
				'action'=>'select',
				'data'=>[],
				'query-exc'=>true,
				'condition'=>['uid="'.$_SESSION['1485fe7c0627c439594baf9c3db3d47ec39e6abab732dec42a662067d7374940'].'"']
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


$obj = new EP();
//print_r($_GET);exit;
// if($_GET['key'] == 'test'){
// 	echo $obj->cartItemExists(1234,'p1');
// }
$algo = 'sha256';
$skey = 9050;

if(hash_equals(hash_hmac($algo,'get_all',$skey),$_REQUEST['key'])){
		$obj->get_all();
}else if($_GET['key'] == 'check_id'){
	$obj->check_id();
}else if($_GET['key'] == 'validate_id'){
	$obj->validate_id();
}else if($_GET['key'] == 'addToCart'){
	$obj->addToCart();
}else if($_GET['key'] == 'mycart'){
	$obj->mycart();
}else if($_GET['key'] == 'myfav'){
	$obj->myfav();
}else if($_GET['key'] == 'removefrommycart'){
	$obj->removefrommycart();
}else if($_GET['key'] == 'get_all_product'){
	$obj->get_all_product();
}else if($_GET['key'] == 'get_product'){
	$obj->get_product();
}else if(hash_equals(hash_hmac($algo,'addToFav',$skey),$_REQUEST['key'])){
	$obj->addToFav();
}else if($_GET['key'] == 'get_cate_list'){
	$obj->get_cate_list();
}else if($_GET['key'] == 'addproduct'){
	$obj->addproduct();
}else if($_GET['key'] == 'updateproduct'){
	$obj->updateproduct();
}else if($_GET['key'] == 'get_for_edit'){
	$obj->get_for_edit();
}else if($_GET['key'] == 'get_product_list_and_cate_list'){
	$obj->get_product_list_and_cate_list();
}else if($_GET['key'] == 'login'){
	$obj->login();
}else{
	echo "EMPTY";
	echo json_encode(['status'=>0,'data'=>[]]);
}

?>
