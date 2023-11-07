<?php

require_once __DIR__.'/../core/connect.php';
require_once __DIR__.'/../Model/commonModel.php';
require_once __DIR__.'/../Model/customerModel.php';

class products extends commonModel{
	use userData;
	public $db;
	public $cid;
	public function __construct(){
		$connect = new Connect();
		$this->db=$connect->Connection();
		if(isset($_COOKIE['uid'])){
			$cflag = $this->getUserId($_COOKIE['uid']);
			if($cflag[0]){
				$this->cid = $cflag[1];
			}
		}else{
			$this->cid = null;
		}
	}

	public function get_all($range=[]){
		if(is_array($range) && count($range)!==0){
			$fromRange = $range['from-range'];
			$toRange = $range['to-range'];
		}
		$tmptbl = 'products';
    if($this->cid == null){
			$arr = [
				'tbl_name'=>$tmptbl,
				'action'=>'join',
				'data'=>['manual'=>["$tmptbl.p_id,$tmptbl.p_img,$tmptbl.p_name,$tmptbl.price,$tmptbl.offer,$tmptbl.unit,$tmptbl.stock,(SELECT cate_name FROM product_category WHERE cate_id=products.cate_id) AS cate"]],
				'join_param'=>[
					['product_category','left_join','cate_id','cate_id']
				],
				'limit'=>$fromRange.','.$toRange,
				'order'=>['s_no','desc'],
       	'query-exc'=>true
			];
    }else{
			$arr = [
				'tbl_name'=>$tmptbl,
				'action'=>'join',
				'data'=>['manual'=>["$tmptbl.p_id,$tmptbl.p_img,$tmptbl.p_name,$tmptbl.price,$tmptbl.offer,$tmptbl.unit,$tmptbl.stock,myfav.cid AS favExistCid ,(SELECT cate_name FROM product_category WHERE cate_id=products.cate_id) AS cate"]],
				'join_param'=>[
					['myfav','left_join','p_id','p_id','AND myfav.cid = '.$this->cid],
					['product_category','left_join','cate_id','cate_id']
				],
				'limit'=>$fromRange.','.$toRange,
				'order'=>['s_no','desc'],
       'query-exc'=>true
			];
    }
    $flag = $this->generateQuery($arr);
	if($flag['status']){
			$res=$flag['data'];
			return ['status'=>1,'data'=>$res,'cartnum'=>$this->get_cate_num(),'range'=>[$fromRange,$toRange]];
		}else{
			return ['status'=>0,'data'=>[],'cartnum'=>0,'range'=>[$fromRange,$toRange]];
		}
	}

	public function get_suggestion($datas){
		$cate = $datas[0];//Get cate
		return "asasasasasasasas";
	}

	public function addToFav(){
		if($this->cid == null){
			echo json_encode(['status'=>0,'flag'=>0,'data'=>'err in Wishlist','message'=>'Please login to make action !']);
			exit;
		}
		$c_id = $this->cid;
		$p_id = $_GET['p_id'];

		$arr = ['tbl_name'=>'myfav','action'=>'select','data'=>[],'condition'=>["p_id='".$p_id."'","cid='".$c_id."'"],'query-exc'=>true];

		if(count($this->generateQuery($arr)['data'])){//Delete FAV
			$arr = ['tbl_name'=>'myfav','action'=>'delete','data'=>[],'condition'=>["p_id='".$p_id."'","cid='".$c_id."'"],'query-exc'=>true];
			if($this->generateQuery($arr)['status']){
				return ['status'=>1,'flag'=>1,'data'=>[],'message'=>'Wishlist updated.','favStatus'=>'removed'];
			}else{
				return ['status'=>0,'flag'=>0,'data'=>[],'message'=>'Err in Wishlist remove'];
			}
		}else{//Insert Fav
				$arr = ['tbl_name'=>'myfav','action'=>'insert','data'=>['p_id="'.$p_id.'"','cid="'.$c_id.'"','created_at=current_timestamp','updated_at=now()'],'condition'=>["p_id='".$p_id."'","cid='".$c_id."'"],'query-exc'=>true];
			if($this->generateQuery($arr)['status']){
        return ['status'=>1,'flag'=>1,'data'=>[],'message'=>'Wishlist updated','favStatus'=>'added'];
			}else{
				return ['status'=>0,'flag'=>0,'data'=>[],'message'=>'err in Wishlist insert'];
			}
		}

	}

	public function getReview($req){
		$cus = 'customers';
		$arr = [
			'tbl_name'=>'review',
			'action'=>'join',
			'data'=>['manual'=>["$cus.profile,$cus.c_name as name,$cus.city as location,review.review,review.rating,review.created_at,review.sno,review.p_id"]],
	    'query-exc'=>true
		];
		if($req['type'] == 'getCateReview'){
			//cate filter
			unset($arr['data']);
			$arr['data']=['manual'=>["$cus.profile,$cus.c_name as name,$cus.city as location,review.review,review.rating,review.created_at,review.sno,review.p_id,(SELECT cate_name FROM product_category WHERE cate_id=products.cate_id) AS cate"]];

			$arr['join_param']=[
				[$cus,'left_join','cid','cid'],
				['products','left_join','p_id','p_id']
			];
			$arr['condition']=['manual'=>['products.cate_id="'.$req['data'].'" ORDER BY review.sno LIMIT '.$req['r-from'].','.$req['r-to'].'']];
		}else if($req['type'] == 'getAllReview'){
			//Normal cate fetch
			$arr['join_param']=[[$cus,'left_join','cid','cid']];
			$arr['condition']=['raw-manual'=>['ORDER BY review.sno LIMIT '.$req['r-from'].','.$req['r-to'].'']];
		}else if($req['type'] == 'getPidReview'){
			//PID cate fillter
			$arr['join_param']=[[$cus,'left_join','cid','cid']];
			$arr['condition']=['manual'=>['review.p_id="'.$req['data'].'" ORDER BY review.sno LIMIT '.$req['r-from'].','.$req['r-to'].'']];
		}
		// (SELECT cate_name FROM product_category WHERE cate_id=products.cate_id) AS cate"]],
		// 'join_param'=>[
		// 	['product_category','left_join','cate_id','cate_id']
		// ],

		$flag = $this->generateQuery($arr);
		//echo $flag;exit;
		if($flag['status']){
			if(count($flag['data']) !== 0){
				return ['status'=>true,'data'=>$flag['data'],'message'=>'Review fetched'];
			}else{
				return ['status'=>false,'data'=>[],'message'=>'Zero Reviews'];
			}
		}else{
			return ['status'=>0,'data'=>[],'message'=>'Err in Review fetched'];
		}
	}

  public function get_cate_num(){
    if($this->cid != null){
      return $this->get_cart_indicate($this->cid);
    }else{return 0;}
  }

  public function get_cart_indicate($uid){
    //GET CART NUMBER
    $arr = ['tbl_name'=>'mycart',
    'action'=>'select',
    'data'=>[],
    'condition'=>["manual"=>["cid='$this->cid' and _date=date(now())"]],
    'query-exc'=>true
    ];
  $flag = $this->generateQuery($arr);
          if($flag['status']){
            $res=$flag['data'];
            if(count($res)){
              $cart_indicate= count($res);
            }else{
              $cart_indicate= 0;
            }
          }
          return $cart_indicate;
  }

  public function myfav(){
    if($this->cid == null){
      return ['status'=>false,'data'=>[],'message'=>'Please login to make action !'];
    }else{
      $arr =[
        'tbl_name'=>'myfav',
        'data'=>[],
        'action'=>'select',
        'condition'=>['cid='.$this->cid],
        'query-exc'=>true
      ];
      $flag=$this->generateQuery($arr);
        if($flag['status']){
          return ['status'=>true,'data'=>$flag['data'],'message'=>"Wishlist fetched"];
      }else{
        return ['status'=>false,'data'=>[],'message'=>"Err in fetch Wishlist"];
      }
    }

	}

	public function myfavExist($pid){
		if($this->cid == null){
			return ['status'=>false,'data'=>'favNotExist','message'=>'Please login to make action !'];
		  }else{
			$arr =[
			  'tbl_name'=>'myfav',
			  'data'=>[],
			  'action'=>'select',
			  'condition'=>['manual'=>["cid='".$this->cid."' AND p_id='".$pid."'"]],
			  'query-exc'=>true
			];
			$flag=$this->generateQuery($arr);
			if($flag['status']){
				if(count($flag['data'])!==0){
					return ['status'=>true,'data'=>'favExist','message'=>"Wishlist fetched"];
				}else{
					return ['status'=>false,'data'=>'favNotExist','message'=>"Wishlist fetched"];
				}
			}else{
			  return ['status'=>false,'data'=>'favNotExist','message'=>"Err in fetch Wishlist"];
			}
		  }
	}

	public function get_product(){
		if(isset($_GET['pid'])){
				$p_id = $_GET['pid'];
//				$q = "SELECT res.* FROM products AS res WHERE res.cate=(SELECT cate FROM products WHERE p_id='".$p_id."') ORDER BY RAND() LIMIT 10";
$q = "SELECT *,pc.cate_name as cate FROM products as p  left join product_category as pc on p.cate_id=pc.cate_id WHERE p_id = '".$p_id."' OR p.cate_id=(SELECT cate_id FROM products WHERE p_id = '".$p_id."') ORDER BY RAND() LIMIT 10";
				$sql = $this->db->prepare($q);
				if($sql->execute()){
					$res = $sql->fetchAll(PDO::FETCH_ASSOC);
					return ['status'=>true,'data'=>$res,'message'=>'Product details fetched','myFavExit'=>$this->myfavExist($p_id)];
				}else{
					return ['status'=>false,'data'=>[],'message'=>'Err in get product details','myFavExit'=>$this->myfavExist($p_id)];
				}
		}else{
			return ['status'=>false,'data'=>[],'message'=>'Something went wrong. please try again.'];
		}
//SELECT * FROM products as p  left join product_category as pc on p.cate_id=pc.cate_id WHERE p_id = '4ZS112' OR p.cate_id=(SELECT cate_id FROM products WHERE p_id = '4ZS112')
	}

	public function addToCart(){
		$uid=$this->cid;
		$p_id=$_GET['p_id'];
		$quant=$_GET['qnt'];
		if($uid == null){
			return ['status'=>false,'data'=>[],'message'=>'Please login to make action !.'];
			exit;
		}

		if($this->cartItemExists($this->cid,$p_id)){
			$arr = [
				'tbl_name'=>'mycart',
				'action'=>'update',
				'data'=>['cart_edit_flag=1','quantity='.$quant,'updated_at=now()'],
				'condition'=>['manual'=>['cid="'.$uid.'" and p_id="'.$p_id.'"']],
				'query-exc'=>true
			];

			$flag = $this->generateQuery($arr);
			if($flag['status']){
				echo json_encode(['status'=>1,'data'=>[],'message'=>'Product Updated','cartnum'=>$this->get_cart_indicate($uid)]);
			}
		}else{
			$randid = $this->genRnd('numeric',5);
			$dt = date('Y-m-d');
			$arr = [
				'tbl_name'=>'mycart',
				'action'=>'insert',
				'data'=>["cart_id='$randid'","cid='$uid'","p_id='$p_id'","quantity=$quant","_date='$dt'","cart_edit_flag=1","created_at=current_timestamp","updated_at=now()"],
				'query-exc'=>true
			];
		$flag = $this->generateQuery($arr);
		if($flag['status']){
				echo json_encode(['status'=>1,'data'=>[],'message'=>'Product added','cartnum'=>$this->get_cart_indicate($uid)]);
			}
		}
		exit;
	}

	public function cartItemExists($uid,$p_id){
		$arr = [
			'tbl_name'=>'mycart',
			'action'=>'select',
			'data'=>[],
			'condition'=>['manual'=>['cid="'.$uid.'" and p_id="'.$p_id.'" and _date=date(now())']],
			'query-exc'=>true
		];
		$flag = $this->generateQuery($arr);
		if($flag['status']){
			if(count($flag['data'])!==0){
				return true;
			}else{
				return false;
			}
		}
	}

	public function getProductById($p_id){
		$arr = [
			'tbl_name'=>'products',
			'action'=>'select',
			'data'=>['p_name'],
			'condition'=>['manual'=>['p_id="'.$p_id.'"']],
			'query-exc'=>true
		];
		$flag = $this->generateQuery($arr);
		if($flag['status']){
			if(count($flag['data'])!==0){
				return [true,$flag['data'][0]['p_name']];
			}else{
				return [false,''];
			}
		}
	}

	public function getProductDetailById($id){
		$arr = [
			'tbl_name'=>'products',
			'action'=>'select',
			'data'=>[],
			'condition'=>['manual'=>['p_id="'.$id.'"']],
			'query-exc'=>true
		];
		$flag = $this->generateQuery($arr);
		if($flag['status']){
			if(count($flag['data'])!==0){
				return ['status'=>true,'data'=>$flag['data'],'message'=>'success'];
			}else{
				return ['status'=>false,'data'=>[],'message'=>'No results found !'];
			}
		}
	}

	public function get_cate_list(){
		$tmptbl = 'product_category';
		$arr = [
			'tbl_name'=>$tmptbl,
			'action'=>'join',
			'data'=>['manual'=>["$tmptbl.cate_name AS cate,$tmptbl.cate_id,$tmptbl.cate_img,MIN(products.price) AS starting_price"]],
			'join_param'=>[
				['products','left_join','cate_id','cate_id']
			],
			'condition'=>['raw-manual'=>["GROUP BY $tmptbl.cate_id"]],
			'query-exc'=>true
		];
		$flag = $this->generateQuery($arr);
		if($flag['status']){
			if(count($flag['data'])!==0){
				return ['status'=>true,'data'=>$flag['data'],'message'=>'Successfully fetched'];
			}else{
				return ['status'=>true,'data'=>[],'message'=>'Zero fetch'];
			}
		}
	}

	public function mycart(){
		$uid = $this->cid;
		if($uid == null){
			echo json_encode(['status'=>false,'data'=>[],'message'=>'Please login to make action !.']);
		}else{
			$oldCart = false;//default - false
			$tmptbl='products';
			$arr = [
				'tbl_name'=>$tmptbl,
				'action'=>'join',
				'data'=>['manual'=>["$tmptbl.p_id,$tmptbl.p_name,$tmptbl.unit,$tmptbl.price,$tmptbl.offer,mycart.quantity,mycart.cart_id,mycart.cart_edit_flag"]],
				'join_param'=>[
					['mycart','right_join','p_id','p_id']
				],
				'order'=>['products.s_no','asc'],
				'query-exc'=>true

			];
			if(isset($_GET['date']) && isset($_GET['type'])){
				$d=$_GET['date'];
				if($d == date('Y-m-d')){//if current - false
					$oldCart = false;
				}else{
					$oldCart = true;
				}

				if($_GET['type'] == 'current'){//if current cart list or Ordered cart based on CART_EDIT_FLAG
					$type = 1;
				}else{
					$type = 0;
				}
				$arr['condition'] = ["_date='{$d}'","cid='{$uid}'","cart_edit_flag=".$type];

			}else if(isset($_GET['date'])){
				$d=$_GET['date'];
				if($d == date('Y-m-d')){//if current - false
					$oldCart = false;
				}else{
					$oldCart = true;
				}
				$arr['condition'] = ["_date='{$d}'","cid='{$uid}'"];
//				$q="SELECT * from products as P right join mycart as F on P.p_id= F.p_id where _date='{$d}' and cid='{$uid}' order by P.s_no asc";
			}else{
				$arr['condition']['manual'] = ["_date=date(now()) AND cid='{$uid}' AND cart_edit_flag=1"];
//				$q="SELECT * from products as P right join mycart as F on P.p_id= F.p_id where _date=date(now()) and cid='{$uid}' order by P.s_no asc";
			}

			// if(isset($_GET['type'])){
			// 	unset($arr['condition']);
			// }

			$flag = $this->generateQuery($arr);
//			echo $flag;exit;
				if($flag['status']){
					if(count($flag['data'])!==0){
						echo json_encode(['status'=>true,'data'=>$flag['data'],'old_r'=>$oldCart]);
					}else{
						echo json_encode(['status'=>false,'data'=>[],'message'=>'Cart list zero','old_r'=>true]);
					}
				}else{
					echo json_encode(['status'=>false,'data'=>[],'message'=>'Err in fetch cart','old_r'=>true]);
				}
		}
		exit;

	}

	public function getProductByCate($cate){
		$tmptbl = 'products';
		if($this->cid == null){
			$arr = [
				'tbl_name'=>$tmptbl,
				'action'=>'join',
				'data'=>['manual'=>["$tmptbl.p_id,$tmptbl.p_img,$tmptbl.p_name,$tmptbl.price,$tmptbl.offer,$tmptbl.unit,$tmptbl.stock,(SELECT cate_name FROM product_category WHERE cate_id=products.cate_id) AS cate"]],
				'join_param'=>[
					['product_category','left_join','cate_id','cate_id']
				],
				'condition'=>['manual'=>['cate_name="'.$cate.'"']],
				'limit'=>10,
				'order'=>['p_id','asc'],
       	'query-exc'=>true
			];
		}else{
			$arr = [
				'tbl_name'=>$tmptbl,
				'action'=>'join',
				'data'=>['manual'=>["$tmptbl.p_id,$tmptbl.p_img,$tmptbl.p_name,$tmptbl.price,$tmptbl.offer,$tmptbl.unit,$tmptbl.stock,myfav.cid AS favExistCid,(SELECT cate_name FROM product_category WHERE cate_id=products.cate_id) AS cate"]],
				'join_param'=>[
					['myfav','left_join','p_id','p_id',' AND myfav.cid = '.$this->cid],
					['product_category','left_join','cate_id','cate_id']
				],
				'condition'=>['manual'=>['cate_name="'.$cate.'"']],
				'limit'=>10,
				'order'=>['p_id','asc'],
				'query-exc'=>true
			];
		}
		$flag = $this->generateQuery($arr);
    if($flag['status']){
			$res=$flag['data'];
			return ['status'=>1,'data'=>$res,'cartnum'=>$this->get_cate_num()];
		}else{
			return ['status'=>0,'data'=>[],'cartnum'=>0];
		}

	}

	public function addProduct(){
		// $cate = explode(',',base64_decode($_POST['cate']));
		// $_POST['cate'] = $cate[0];
		// $_POST['cate_img'] = $cate[1];
		$_POST['p_id']=$this->genRnd('alpha_numeric',6);
		$fileFlag = $this->uploadFile('assets/product_images/','file1');
		if($fileFlag['status']){
			$_POST['p_img'] = $fileFlag['data'];
		}else{
			return ['status'=>false,'data'=>[],'message'=>$fileFlag['status']];
		}
		$arr = [
			'tbl_name'=>'products',
			'action'=>'insert',
			'data'=>$this->genArAssocToColSep($_POST),
			'query-exc'=>true
		];
		$flag = $this->generateQuery($arr);
		if($flag['status']){
			return ['status'=>true,'data'=>[],'message'=>'Product uploaded Successfully'];
		}else{
			return ['status'=>false,'data'=>[],'message'=>'Failed to upload Product'];
		}
	}

	public function uploadFile($path,$fileName){
		$file_ext = pathinfo($_FILES[$fileName]['name'],PATHINFO_EXTENSION);
		$newFileName = $this->genRnd('alpha_numeric',10);

		if(file_exists($path.$newFileName.'.'.$file_ext)){
			//RE-GEN file
			$newFileName = $this->genRnd('alpha_numeric',10);
			if(move_uploaded_file($_FILES[$fileName]['tmp_name'],$path.$newFileName.'.'.$file_ext)){
				$up_file_name = $newFileName.'.'.$file_ext;
				return ['status'=>true,'data'=>$up_file_name,'message'=>'Images uploaded Successfully'];
			}else{
				return ['status'=>false,'data'=>[],'message'=>'Failed to upload image !'];
			}
		}else{
			if(move_uploaded_file($_FILES[$fileName]['tmp_name'],$path.$newFileName.'.'.$file_ext)){
				$up_file_name = $newFileName.'.'.$file_ext;
				return ['status'=>true,'data'=>$up_file_name,'message'=>'Images uploaded Successfully'];
			}else{
				return ['status'=>false,'data'=>[],'message'=>'Failed to upload image !'];
			}
		}
	}

	public function editProduct(){
		$p_id=$_POST['p_id'];
		$old_img_name = $_POST['p_img'];
		unset($_POST['p_img']);
		unset($_POST['p_id']);
		if($_FILES['file1']['size'] == 0 && $_FILES['file1']['name'] == ''){
			//do nothg
		}else{
			if(unlink('assets/product_images/'.$old_img_name)){//Del old img
				$fileFlag = $this->uploadFile('assets/product_images/','file1');
				if($fileFlag['status']){
					$_POST['p_img'] = $fileFlag['data'];
				}else{
					return ['status'=>false,'data'=>[],'message'=>$fileFlag['status']];
				}
			}else{
					return ['status'=>false,'data'=>[],'message'=>'Err in delete prv P img'];
			}
		}
		$arr = [
			'tbl_name'=>'products',
			'action'=>'update',
			'data'=>$this->genArAssocToColSep($_POST),
			'condition'=>["p_id='".$p_id."'"],
			'query-exc'=>true
		];
		$flag = $this->generateQuery($arr);
		if($flag['status']){
			return ['status'=>true,'data'=>[],'message'=>'Product updated Successfully'];
		}else{
			return ['status'=>false,'data'=>[],'message'=>'Failed to update Product'];
		}
	}

	public function removefrommycart($cartid){
		if($this->cid == null){
			return ['status'=>false,'data'=>[],'message'=>'Please login to make changes !'];
		}else{
				$arr = [
					'tbl_name'=>'mycart',
					'action'=>'delete',
					'data'=>[],
					'condition'=>['cart_id='.$cartid,"cid='".$this->cid."'"],
					'query-exc'=>true
				];

				$flag = $this->generateQuery($arr);
				if($flag['status']){
					return ['status'=>true,'data'=>[],'message'=>'Item removed from cart','cartnum'=>$this->get_cart_indicate($this->cid)];
				}else{
					return ['status'=>false,'data'=>'Err in removing item from cart.'];
				}
		}
	}

	public function sendReview($data){
		if($this->cid == null){
			return ['status'=>false,'data'=>[],'message'=>'Please login to add review !'];
		}else{
			$cid = $this->cid;
			$p_id = $data['p_id'];
			$rating = $data['rating'];
			$review = $data['reviewmsg'];
			$arr = [
				'tbl_name' => 'review',
				'action' => 'insert',
				'data' => ["cid='$cid'","p_id='$p_id'","rating='$rating'","review='$review'"],
				'query-exc'=>true
			];
			$flag=$this->generateQuery($arr);
			if($flag['status'] == 'success'){
				return ['status'=>true,'data'=>[],'message'=>'Your review added successfully.'];
			}else{
				return ['status'=>false,'data'=>[],'message'=>$flag['msg']];
			}
		}

	}

	public function checkout(){
										/*
								CALC TWO ARRAY DATA INTO ONE DATA DONE
								UPDATE PRODUCT TBL QNTY
								INSERT NEW ORDER
								UPDATE CART DATA EDIT -> DISABLE
								VIEW DATA INTO AMOUT PAY
								*/
		if($this->cid == null){
			return ['status'=>false,'data'=>[],'message'=>'Please login to add review !'];
		}else{
			$cart_date = date('Y-m-d');
			$arr = [
				'tbl_name' => 'mycart',
				'action' => 'select',
				'data' => [],
				'condition'=>['cid='.$this->cid,"_date='".$cart_date."'","cart_edit_flag=1"],
				'query-exc'=>true
			];
			$flag=$this->generateQuery($arr);
			if($flag['status'] == 'success'){
				if(count($flag['data'])!==0){
					for($i=0;$i<count($flag['data']);$i++){//get customer ordered  product ID and qunty sep
						$cus_or_pr_id_list[] = '"'.$flag['data'][$i]['p_id'].'"';
						$cur_or_data_list[$i] = ['p_id'=>$flag['data'][$i]['p_id'],'qnty'=>$flag['data'][$i]['quantity']];
						$product_detail[$i] = ['p_id'=>$flag['data'][$i]['p_id'],'p_name'=>$this->getProductById($flag['data'][$i]['p_id'])[1],'qnty'=>$flag['data'][$i]['quantity']];
					}
					$arr = [
						'tbl_name' => 'products',
						'action' => 'select',
						'data' => ['p_id','stock'],
						'condition'=>['manual'=>['p_id IN('.implode(',',$cus_or_pr_id_list).')']],
						'query-exc'=>true
					];
					$flag=$this->generateQuery($arr);
					if($flag['status'] == 'success'){
						if(count($flag['data'])!==0){
							$pro_data_list = $flag['data'];
							//IMP SEC CALC PRODUCT QUANTITY AND UPDATE DB
							sort($cur_or_data_list);
							sort($pro_data_list);
							for($i=0;$i<count($pro_data_list);$i++){
								$qnty = ($pro_data_list[$i]['stock']-$cur_or_data_list[$i]['qnty']);
								if($qnty < 0){
									$p_name = $this->getProductById($pro_data_list[$i]['p_id']);
									$outOfStockItems[]=($p_name[0])?$p_name[1]:'';
									//outof stock return
									return ['status'=>false,'data'=>[],'message'=>"Sorry, (".implode(',',$outOfStockItems).") product is OUT OF STOCK, Please remove from cart !."];
								}else{
									$orderRes[$i] = ['p_id'=>$pro_data_list[$i]['p_id'],'quantity'=>$qnty];
								}
							}//CALC ORDE END

							//UPDATE QUNT in DB
							$qntyUpdt = 0;
							for($i=0;$i<count($orderRes);$i++){
								$q = "UPDATE products SET stock=".$orderRes[$i]['quantity']." WHERE p_id='".$orderRes[$i]['p_id']."'";
								$sql = $this->db->prepare($q);
								if ($sql->execute()) {
									$qntyUpdt++;
								}
							}
							if($qntyUpdt !== count($orderRes)){
								return ['status'=>false,'data'=>[],'message'=>"Oops somthing went wrong, Please contact your admin (Err in upQnty)"];
							}
							//UPDATE QUNT in DB END

							//CREATE NEW ORDER
					$createOrder = $this->createNewOrder($cart_date,$product_detail);
					if($createOrder['status']){
						//DISABLE CART EDIT OPTION
						if($this->disableCartEdit(implode(',',$cus_or_pr_id_list),$cart_date)){
							return ['status'=>true,'data'=>$createOrder['data'],'message'=>"Your order successfully Pleaced. You will track your order status in MENU>ACCOUNT>TRACK."];
						//END OF CART PROCCESS
						}else{
							return ['status'=>false,'data'=>[],'message'=>"Oops, Something went wrong, Please contact your admin (Err in final)"];
						}//END OF CART PROCCESS
					}else{
						return ['status'=>false,'data'=>[],'message'=>'Oops, Something went wrong, Please contact your admin (Err in Create order)'];
					}
					//CREATE ORDER END
						}else{
							return ['status'=>false,'data'=>[],'message'=>'Something went wrong contact your admin(Err in customer ordered item not found in prList)'];
						}
					}else{
						return ['status'=>false,'data'=>[],'message'=>'Something went wrong contact your admin(Err in fetch product list)'];
					}

				}else{
				return ['status'=>false,'data'=>[],'message'=>'cart list zero'];
				}
			}else{
				return ['status'=>false,'data'=>[],'message'=>$flag['msg']];
			}
		}
	  }

	  public function disableCartEdit($ids,$cart_date){
		$arr = [
			'tbl_name' => 'mycart',
			'action' => 'UPDATE',
			'data' => ['cart_edit_flag=0'],
			'condition'=>['manual'=>['p_id IN('.$ids.') AND _date="'.$cart_date.'"']],
			'query-exc'=>true
		];
		$flag=$this->generateQuery($arr);
		if($flag['status'] == 'success'){
		return ['status'=>true,'data'=>[],'message'=>"Ids disabled successfully"];
		}else{
		return ['status'=>false,'data'=>[],'message'=>"Oops, Something went wrong, Please contact your admin (Err in diblEit)"];
		}
	  }

	  public function createNewOrder($cart_date,$product_list){
		// $orderExist=$this->orderExist($cart_date);//IF exist it carry status and Order ID
		// if($orderExist['status']){
		// 	return ['status'=>true,'data'=>$orderExist['data'],'message'=>'Already order ID in Pending stage'];
		// }else{
			$order_id = $this->genRnd('alpha_numeric',10);
			$order_status = 'Pending';
			$arr = [
				'tbl_name' => 'myorder',
				'action' => 'insert',
				'data' => ["order_id='".$order_id."'","cid='$this->cid'","product_list='".json_encode($product_list)."'","cart_date='$cart_date'","cart_status='$order_status'"],
				'query-exc'=>true
			];
			$flag=$this->generateQuery($arr);
			if($flag['status'] == 'success'){
				return ['status'=>true,'data'=>$order_id,'message'=>$flag['msg']];
			}else{
				return ['status'=>false,'data'=>[],'message'=>$flag['msg']];
			}
//		}
	  }

	  public function orderExist($cart_date){
		$arr = [
			'tbl_name' => 'myorder',
			'action' => 'select',
			'data' => ['order_id'],
			'condition'=>['manual'=>["cart_date = '".$cart_date."' AND cart_status='Pending' AND cid='$this->cid'"]],
			'query-exc'=>true
		];
		$flag=$this->generateQuery($arr);
		if($flag['status'] == 'success'){
			if(count($flag['data']) !==0){
				return ['status'=>true,'data'=>$flag['data'][0]['order_id'],'message'=>''];
			}else{
				return ['status'=>false,'data'=>'','message'=>''];
			}
		}else{
			return ['status'=>false,'data'=>[],'message'=>$flag['msg']];
		}
	  }

	  public function search($val){
			$tmptbl = 'products';
		if($this->cid == null){
			$arr = [
			  'tbl_name'=>$tmptbl,
			  'action'=>'join',
			  'data'=>['manual'=>["p_id,p_img,p_name,price,offer,unit,stock"]],
				'join_param'=>[
			 		['product_category','left_join','cate_id','cate_id']
			 ],
			  'limit'=>20,
			  'order'=>['p_id','asc'],
			  'condition'=>['manual'=>["p_id LIKE '%$val% 'OR p_name LIKE '%$val%'  OR product_category.cate_name LIKE '%$val%' OR p_desc LIKE '%$val%' OR tags LIKE '%$val%'"]],
			 'query-exc'=>true
			];
		  }else{
				$arr = [
					'tbl_name'=>$tmptbl,
					'action'=>'join',
					'data'=>['manual'=>["$tmptbl.p_id,$tmptbl.p_img,$tmptbl.p_name,$tmptbl.price,$tmptbl.offer,$tmptbl.unit,$tmptbl.stock"]],
					'join_param'=>[
					['myfav','left_join','p_id','p_id','AND myfav.cid = '.$this->cid],
					['product_category','left_join','cate_id','cate_id']
					],
					'limit'=>20,
					'order'=>['p_id','asc'],
					'condition'=>['manual'=>["$tmptbl.p_id LIKE '%$val% 'OR $tmptbl.p_name LIKE '%$val%'  OR product_category.cate_name LIKE '%$val%' OR $tmptbl.p_desc LIKE '%$val%' OR $tmptbl.tags LIKE '%$val%'"]],
				  'query-exc'=>true
				];
		  }
		  $flag = $this->generateQuery($arr);
		  if($flag['status'] == 'success'){
			if(count($flag['data']) !==0){
				return ['status'=>true,'data'=>$flag['data'],'message'=>'Success fetched'];
			}else{
				return ['status'=>false,'data'=>[],'message'=>'No results found !'];
			}
		}else{
			return ['status'=>false,'data'=>[],'message'=>$flag['msg']];
		}

	  }

		public function addSlider(){
				for($i=1;$i<=5;$i++){
					if(isset($_FILES['file'.$i]) && !empty($_FILES['file'.$i]['name'])){
								$fileFlag = $this->uploadFile('assets/testimg/','file'.$i);
								if($fileFlag['status']){
									$addedFiles['main_slide_'.$i]=$fileFlag['data'];
								}
					}
				}
				if(count($addedFiles)!==0){
					$arr = [
						'tbl_name'=>'business_details',
						'action'=>'update',
						'data'=>$this->genArAssocToColSep($addedFiles),
						'condition'=>['sno=1'],
						'query-exc'=>true
					];

					$flag = $this->generateQuery($arr);
					if($flag['status']){
						return ['status'=>true,'data'=>[],'message'=>'Slide images added'];
					}else{
						return ['status'=>false,'data'=>[],'message'=>'Err in upload slides'];
					}
				}
		}

		public function getSlides(){
			$arr = [
				'tbl_name' => 'business_details',
				'action' => 'select',
				'data' => ['main_slide_1','main_slide_2','main_slide_3','main_slide_4','main_slide_5'],
				'condition'=>['sno=1'],
				'query-exc'=>true
			];
			$flag=$this->generateQuery($arr);
			if($flag['status'] == 'success'){
				if(count($flag['data']) !==0){
					return ['status'=>true,'data'=>$flag['data'][0],'message'=>''];
				}else{
					return ['status'=>false,'data'=>'','message'=>'Empty slides'];
				}
			}else{
				return ['status'=>false,'data'=>'','message'=>'Err in get slides'];
			}
		}

		public function addCategory(){
			if(isset($_FILES) && $_FILES['file1']['size'] !==0){
				$fileFlag = $this->uploadFile('assets/category_images/','file1');
				if($fileFlag['status']){
					$upFile=$fileFlag['data'];
				}else{
					return ['status'=>false,'data'=>[],'message'=>'err in up img'];
				}
			}else{
				return ['status'=>false,'data'=>[],'message'=>'Please select category image'];
			}
			$arr = [
				'tbl_name'=>'product_category',
			'action'=>'insert',
			'data'=>['cate_id="'.$this->genRnd('alpha_numeric',8).'"','cate_name="'.$_POST['cate_name'].'"','cate_img="'.$upFile.'"'],
			'query-exc'=>true];
			if($this->generateQuery($arr)['status']){
				return ['status'=>true,'data'=>[],'message'=>'Category added successfully'];
			}else{
				return ['status'=>false,'data'=>[],'message'=>'err in add category'];
			}
		}

		public function editCategory(){
			$arr = [
				'tbl_name'=>'product_category',
			'action'=>'update',
			'data'=>['cate_name="'.$_POST['cate_name'].'"'],
			'condition'=>['cate_id="'.$_POST['cate_id'].'"'],
			'query-exc'=>true];
			if(isset($_FILES) && $_FILES['file1']['size']!==0){
				$fileFlag = $this->uploadFile('assets/category_images/','file1');
				if($fileFlag['status']){
					gc_collect_cycles();
					if(unlink('assets/category_images/'.$_POST['cate_img'])){//Del old img
						$upFile=$fileFlag['data'];
						$arr['data']=['cate_name="'.$_POST['cate_name'].'"','cate_img="'.$upFile.'"'];
					}else{
						return ['status'=>false,'data'=>[],'message'=>'Err in delete old category image'];
					}
				}else{
					return ['status'=>false,'data'=>[],'message'=>'err in up img'];
				}
			}
			if($this->generateQuery($arr)['status']){
				return ['status'=>true,'data'=>[],'message'=>'Category updated successfully'];
			}else{
				return ['status'=>false,'data'=>[],'message'=>'err in update category'];
			}
		}

		public function getCateById($id){
			$arr =[
				'tbl_name'=>'product_category',
				'data'=>['cate_id','cate_name','cate_img'],
				'action'=>'select',
				'condition'=>["cate_id='".$id."'"],
				'query-exc'=>true
			  ];
			  $flag=$this->generateQuery($arr);
				if($flag['status']){
				  return ['status'=>true,'data'=>$flag['data'],'message'=>"Category fetched"];
			  }else{
				return ['status'=>false,'data'=>[],'message'=>"Err in fetch category detail"];
			  }
		}

		public function getOrderList(){
		if($this->cid == null){
			return ['status'=>false,'data'=>[],'message'=>"Please login to make action !"];
		}else{
			$arr =[
				'tbl_name'=>'myorder',
				'data'=>['manual'=>['order_id as id,cart_date as date,to_base64(cart_status) as status']],
				'action'=>'select',
				'condition'=>["cid='".$this->cid."'"],
				'query-exc'=>true
			  ];
			  $flag=$this->generateQuery($arr);
				if($flag['status']){
				  return ['status'=>true,'data'=>$flag['data'],'message'=>"order list fetched"];
			  }else{
				return ['status'=>false,'data'=>[],'message'=>"Err in fetch order list"];
			  }
		}

		}

}//CLASS END



?>