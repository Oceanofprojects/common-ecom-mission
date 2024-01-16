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
				'data'=>['manual'=>["$tmptbl.p_id,$tmptbl.p_img,$tmptbl.p_name,$tmptbl.price,$tmptbl.offer,$tmptbl.unit,$tmptbl.stock,myfav.sno AS favExistCid ,(SELECT cate_name FROM product_category WHERE cate_id=products.cate_id) AS cate"]],
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


	public function getallProducts(){
			$arr = [
				'tbl_name'=>'products',
				'action'=>'select',
				'data'=>[],
				'order'=>['s_no','desc'],
       	'query-exc'=>true
			];    
    $flag = $this->generateQuery($arr);
	if($flag['status'] == 'success'){
			$res=$flag['data'];
			return ['status'=>true,'data'=>$res,'message'=>'Products fetched successfully'];
		}else{
			return ['status'=>false,'data'=>[],'message'=>'Products fetch Failed'];
		}
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
			$arr['condition']=['manual'=>['products.cate_id="'.$req['data'].'" ORDER BY RAND() LIMIT '.$req['r-from'].','.$req['r-to'].'']];
		}else if($req['type'] == 'getAllReview'){
			//Normal cate fetch
			$arr['join_param']=[[$cus,'left_join','cid','cid']];
			$arr['condition']=['raw-manual'=>['ORDER BY RAND() LIMIT '.$req['r-from'].','.$req['r-to'].'']];
		}else if($req['type'] == 'getPidReview'){
			//PID cate fillter
			$arr['join_param']=[[$cus,'left_join','cid','cid']];
			$arr['condition']=['manual'=>['review.p_id="'.$req['data'].'" ORDER BY RAND() LIMIT '.$req['r-from'].','.$req['r-to'].'']];
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
    'condition'=>["manual"=>["cid='$uid' AND cart_edit_flag = 1"]],
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

	public function get_product_wt_suggestion($pid){
		$arr = [
				'tbl_name'=>'products',
				'action'=>'select',
				'data'=>[],
				'condition'=>['manual'=>["p_id='".$pid."'"]],
				'limit'=>1,
       	'query-exc'=>true
			];    
    $product = $this->generateQuery($arr);
    if($product['status'] == 'success'){
				if(isset($product['data'][0]['cate_id']) && !empty($product['data'][0]['cate_id'])){
//					$product['data'][0]['myFavExit']=$this->myfavExist($pid);
					$arr = [
						'tbl_name'=>'products',
						'action'=>'select',
						'data'=>[],
						'condition'=>['raw-manual'=>["WHERE cate_id='".$product['data'][0]['cate_id']."' AND p_id!='".$pid."' ORDER BY RAND() LIMIT 4"]],
		       	'query-exc'=>true
					];    
			    $suggest = $this->generateQuery($arr);
			    if($suggest['status'] == 'success'){
			    	$suggest['myFavExit']=$this->myfavExist($pid);
			    	array_push($suggest['data'],$product['data'][0]);
						return ['status'=>true,'data'=>$suggest,'message'=>'Products fetched successfully'];
					}else{
						return ['status'=>false,'data'=>[],'message'=>'Products fetch Failed'];
					}
			}else{
				return ['status'=>false,'data'=>[],'message'=>'Cate ID not found for this product'];
			}
		}else{
			return ['status'=>false,'data'=>[],'message'=>'Products suggestion fetch Failed'];
		}

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
				'data'=>['quantity='.$quant,'updated_at=now()'],
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
			'condition'=>['manual'=>['cid="'.$uid.'" and p_id="'.$p_id.'" and cart_edit_flag=1']],
			'query-exc'=>true
		];
		$flag = $this->generateQuery($arr);
		if($flag['status'] =='success'){
			if(count($flag['data'])!==0){
				return true;
			}else{
				return false;
			}
		}else{
				return false;
		}
	}


	public function getProductUnderCategory(){
		$tmptbl = 'products';
if($this->cid == null){
			$arr = [
				'tbl_name'=>$tmptbl,
				'action'=>'join',
				'data'=>['manual'=>["$tmptbl.s_no,concat(product_category.cate_name,'{CATE_SEP}',SUBSTRING_INDEX(GROUP_CONCAT('p_id=',$tmptbl.p_id,'{DATA_SEP}p_img=',$tmptbl.p_img,'{DATA_SEP}p_name=',$tmptbl.p_name,'{DATA_SEP}price=',$tmptbl.price,'{DATA_SEP}offer=',$tmptbl.offer,'{DATA_SEP}unit=',$tmptbl.unit,'{DATA_SEP}stock=',$tmptbl.stock,'{DATA_SEP}cate_id=',product_category.cate_id SEPARATOR '{ROW_SEP}'),'{ROW_SEP}',4)) as catesets"]],
				'join_param'=>[
					['product_category','left_join','cate_id','cate_id']
				],
				'condition'=>['raw-manual'=>["GROUP BY $tmptbl.cate_id ORDER BY RAND()"]],
				'limit'=>4,
    	'query-exc'=>true
			];
    }else{
			$arr = [
				'tbl_name'=>$tmptbl,
				'action'=>'join',
				'data'=>['manual'=>["$tmptbl.s_no,concat(product_category.cate_name,'{CATE_SEP}',SUBSTRING_INDEX(GROUP_CONCAT('p_id=',$tmptbl.p_id,'{DATA_SEP}p_img=',$tmptbl.p_img,'{DATA_SEP}p_name=',$tmptbl.p_name,'{DATA_SEP}price=',$tmptbl.price,'{DATA_SEP}offer=',$tmptbl.offer,'{DATA_SEP}unit=',$tmptbl.unit,'{DATA_SEP}stock=',$tmptbl.stock,'{DATA_SEP}cate_id=',product_category.cate_id,'{DATA_SEP}favExistCid=',(select if(count(myfav.p_id)=0,'',myfav.p_id) from myfav where myfav.p_id = products.p_id AND myfav.cid = '".$this->cid."') SEPARATOR '{ROW_SEP}'),'{ROW_SEP}',5)) as catesets"]],
				'join_param'=>[
					['product_category','left_join','cate_id','cate_id']
				],
				'condition'=>['raw-manual'=>["GROUP BY $tmptbl.cate_id ORDER BY RAND()"]],
				'limit'=>4,
   	'query-exc'=>true
			];
    }
		$flag = $this->generateQuery($arr);
		if($flag['status'] == 'success'){
				return ['status'=>true,'data'=>$flag['data'],'message'=>'fetched successfully'];
		}else{
				return ['status'=>false,'data'=>[],'message'=>'Err getting category & products sets'];
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
		if($flag['status'] == 'success'){
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
		
		$limit = "LIMIT 5";

		if(isset($_GET['cate_flow'])){
			if(base64_decode($_GET['cate_flow']) == 'listing'){
				$limit = "";
			}
		}

		$arr = [
			'tbl_name'=>$tmptbl,
			'action'=>'join',
			'data'=>['manual'=>["$tmptbl.cate_name AS cate,$tmptbl.cate_id,$tmptbl.cate_img,MIN(products.price) AS starting_price"]],
			'join_param'=>[
				['products','left_join','cate_id','cate_id']
			],
			'condition'=>['raw-manual'=>["GROUP BY $tmptbl.cate_id ORDER BY RAND() ".$limit]],
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

	public function mycart($defid = ''){
		//default ID for admin changes
		if(empty($defid)){
			$uid = $this->cid;			
		}else{
			$uid = $defid;
		}
		if($uid == null){
			return ['status'=>false,'data'=>[],'message'=>'Please login to make action !.'];
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
			}else{
				$arr['condition']['manual'] = ["cid='{$uid}' AND cart_edit_flag=1"];
			}


			$flag = $this->generateQuery($arr);
				if($flag['status']){
					if(count($flag['data'])!==0){
						return ['status'=>true,'data'=>$flag['data'],'old_r'=>$oldCart];
					}else{
						return ['status'=>false,'data'=>[],'message'=>'Cart list zero','old_r'=>true];
					}
				}else{
					return ['status'=>false,'data'=>[],'message'=>'Err in fetch cart','old_r'=>true];
				}
		}
		// exit;

	}

	public function getProductByCateId($id){
		$tmptbl = 'products';
		if($this->cid == null){
			$arr = [
				'tbl_name'=>$tmptbl,
				'action'=>'join',
				'data'=>['manual'=>["$tmptbl.p_id,$tmptbl.p_img,$tmptbl.p_name,$tmptbl.price,$tmptbl.offer,$tmptbl.unit,$tmptbl.stock,product_category.cate_img as img,(SELECT cate_name FROM product_category WHERE cate_id=products.cate_id) AS cate"]],
				'join_param'=>[
					['product_category','left_join','cate_id','cate_id']
				],
				'condition'=>['manual'=>['product_category.cate_id="'.$id.'"']],
				'limit'=>10,
				'order'=>['p_id','asc'],
       	'query-exc'=>true
			];
		}else{
			$arr = [
				'tbl_name'=>$tmptbl,
				'action'=>'join',
				'data'=>['manual'=>["$tmptbl.p_id,$tmptbl.p_img,$tmptbl.p_name,$tmptbl.price,$tmptbl.offer,$tmptbl.unit,$tmptbl.stock,myfav.cid AS favExistCid,product_category.cate_img as img,(SELECT cate_name FROM product_category WHERE cate_id=products.cate_id) AS cate"]],
				'join_param'=>[
					['myfav','left_join','p_id','p_id',' AND myfav.cid = '.$this->cid],
					['product_category','left_join','cate_id','cate_id']
				],
				'condition'=>['manual'=>['product_category.cate_id="'.$id.'"']],
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

	public function getProductAvailability($pid){
		$id  = $pid;
		$q = "SELECT CONCAT((SELECT count(*) FROM myorder WHERE product_list like  '%$pid%' and  cart_status <> \"Completed\" and cart_status <> \"Cancel\"),'-myorder_count,',(SELECT count(*) FROM products WHERE p_id = '$pid'),'-myproduct_count, ',(SELECT count(*) FROM mycart  WHERE p_id = '$pid' and cart_edit_flag=1),'-mycart_count, ',(SELECT count(*) FROM myfav  WHERE p_id = '$pid'),'-myfav_count') AS product_availability_list";
		$sql = $this->db->prepare($q);
		if($sql->execute()){
			return ['status'=>true,'data'=>$sql->fetchAll(PDO::FETCH_ASSOC)[0]['product_availability_list'],'message'=>'list fetched'];
		}else{
			return ['status'=>false,'data'=>[],'message'=>'Err in get product availability list'];
		}
	}

	public function productAvailabilityStrToArr($str){
		$list = explode(',',$str);
		for($i=0;$i<count($list);$i++){
			$resList = explode('-',$list[$i]);
			$availability_list[$resList[1]] = $resList[0];
		}
		return $availability_list;
	}

	public function deleteProduct(){
		$pid = $_GET['pid'];
			$getProductAvailabilityFlag = $this->getProductAvailability($pid);
			if($getProductAvailabilityFlag['status']){
				$availability_list = $this->productAvailabilityStrToArr($getProductAvailabilityFlag['data']);//Availability res str to arr
				if($availability_list['myorder_count'] == 0){
					return $this->changeProductAvailability($pid);
				}else{
					return ['status'=>false,'data'=>$availability_list,'message'=>'Delete access denied, Because '.$availability_list['myorder_count'].' product available in order table(Its maybe Pending, Comfirmed,Arriving status). Please check that product!'];
				}
			}else{
				return $getProductAvailabilityFlag;
			}

	}

	public function changeProductAvailability($pid){
		$q = "DELETE FROM mycart WHERE p_id='$pid' and cart_edit_flag<>0";
				$sql = $this->db->prepare($q);
				if($sql->execute()){//stage1
					$q = "DELETE FROM myfav WHERE p_id='$pid'";
					$sql = $this->db->prepare($q);
					if($sql->execute()){//stage2
						$q = "DELETE FROM products WHERE p_id='$pid'";
						$sql = $this->db->prepare($q);
						if($sql->execute()){//stage3
							$q = "DELETE FROM review WHERE p_id='$pid'";
							$sql = $this->db->prepare($q);
							if($sql->execute()){//stage4
								return ['status'=>true,'data'=>[],'message'=>'Product deleted successfully.'];
							}else{
								return ['status'=>false,'data'=>[],'message'=>'Err in delete product stage 4'];
							}
						}else{
							return ['status'=>false,'data'=>[],'message'=>'Err in delete product stage 3'];
						}
					}else{
						return ['status'=>false,'data'=>[],'message'=>'Err in delete product stage 2'];
					}
				}else{
					return ['status'=>false,'data'=>[],'message'=>'Err in delete product stage 1'];
				}
	}

	public function addProduct(){
		$_POST['p_id']=$this->genRnd('alpha_numeric',6);
		$fileFlag = $this->uploadFile('assets/product_images/','file1');
		if($fileFlag['status']){
			$_POST['p_img'] = $fileFlag['data'];
		}else{
			return ['status'=>false,'data'=>[],'message'=>$fileFlag['status']];
		}
		if(preg_match('/[\"\']/', $_POST['p_desc'])){
			return ['status'=>false,"data"=>[],'message'=>'Sepcial chars found in product name !, Please remove it.'];
		}else if(preg_match('/[\"\']/', $_POST['tags'])){
			return ['status'=>false,"data"=>[],'message'=>'Sepcial chars found in tags!, Please remove it.'];
		}else{
			$_POST['p_desc'] = htmlspecialchars($_POST['p_desc']);
			$_POST['tags'] = htmlspecialchars($_POST['tags']);
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
		$_POST['p_desc'] = htmlspecialchars($_POST['p_desc']);
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
		// echo $flag;exit;
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
      if(preg_match('/[^a-zA-Z0-9\s]/', $review)){
		return ['status'=>false,"data"=>[],'message'=>'Sepcial chars found!, Please remove it.'];
	  }else{
		$review = htmlspecialchars($review);
	  }
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
public function getCartByIdNDate(){
	if($this->cid == null){
			return ['status'=>false,'data'=>[],'message'=>'Please login !'];
		}else{
			$arr = [
						'tbl_name' => 'mycart',
						'action' => 'select',
						'data' => ['p_id','quantity'],
						'condition'=>['cid='.$this->cid,"cart_edit_flag=1"],
						'query-exc'=>true
					];
					$flag=$this->generateQuery($arr);
					if($flag['status'] == 'success'){
						return $flag['data'];
					}else{
						return $flag;
					}
		}
}
	public function checkout(){
		if($this->cid == null){
			return ['status'=>false,'data'=>[],'message'=>'Please login !'];
		}else{
			// $cart_date = date('Y-m-d');
			$mycart_data = $this->getCartByIdNDate();

				if(count($mycart_data)!==0){
					for($i=0;$i<count($mycart_data);$i++){//get customer ordered  product ID and qunty sep
						$cus_or_pr_id_list[] = '"'.$mycart_data[$i]['p_id'].'"';
						$cur_or_data_list[$i] = ['p_id'=>$mycart_data[$i]['p_id'],'qnty'=>$mycart_data[$i]['quantity']];
						$product_detail[$i] = ['p_id'=>$mycart_data[$i]['p_id'],'p_name'=>$this->getProductById($mycart_data[$i]['p_id'])[1],'qnty'=>$mycart_data[$i]['quantity']];
					}

							$pro_data_list_flag = $this->getProductOriginalQntyForCheckout($cus_or_pr_id_list);

							if($pro_data_list_flag['status']){
								$pro_data_list = $pro_data_list_flag['data'];
							}else{
								return $pro_data_list_flag;
							}
							//IMP SEC CALC PRODUCT QUANTITY AND UPDATE DB
							
							return $this->cQtyWToQty($cur_or_data_list,$pro_data_list,$product_detail,$cus_or_pr_id_list);//product_detail & cus_or_pr_id_list is var used for checkoutfinal()
							
				}else{
				return ['status'=>false,'data'=>[],'message'=>'cart list zero'];
				}
		}
	  }

	  public function cQtyWToQty($cur_or_data_list,$pro_data_list,$product_detail,$cus_or_pr_id_list){
		$total = 0;
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
									$total+= $this->calcOffer($pro_data_list[$i]['price'],$pro_data_list[$i]['offer'],$cur_or_data_list[$i]['qnty']);
									$orderRes[$i] = ['p_id'=>$pro_data_list[$i]['p_id'],'quantity'=>$qnty];
								}
							}//CALC ORDE END

		return ['status'=>true,'data'=>[],'message'=>"All products available.","upt_qnty"=>$orderRes,"product_detail"=>$product_detail,'ids'=>$cus_or_pr_id_list,'total_cost'=>$total];

			}

public function calcOffer($price,$off,$qnty){
	$offer = ($price * $off)/100;
	$or_price = $price-$offer;
	return $or_price*$qnty; 
}

public function changeCcReqAccess(){
	if($this->cid == null){
						return ['status'=>false,'data'=>[],'message'=>"Please login to make action !"];
			}else{
					$arr = [
						'tbl_name'=>'cc_request',
						'action'=>'update',
						'data'=>['req_status=0'],
						'condition'=>["cid='".$this->cid."'"],
						'query-exc'=>true];
						$flag=$this->generateQuery($arr);
					if($flag['status'] == 'success'){
						return true;
					}else{
						return false;
					}
				}

}


public function checkoutFinal(){
	$cart_date = date('Y-m-d');
	$checkout_flag = $this->checkout();
	if($checkout_flag['status']){//if all product aval
		$upPrds_flag = $this->updateCusPrdWTOrPrd($checkout_flag['upt_qnty']);
		if($upPrds_flag['status']){
			//CREATE NEW ORDER
					$createOrder = $this->createNewOrder($cart_date,$checkout_flag['product_detail']);
					if($createOrder['status']){
						//DISABLE CART EDIT OPTION

						if($this->changeCcReqAccess()){
							if($this->disableCartEdit(implode(',',$checkout_flag['ids']),$cart_date)){
								return ['status'=>true,'data'=>$createOrder['data'],'message'=>"Your order successfully Pleaced. You will track your order status in "];
							//END OF CART PROCCESS
							}else{
								return ['status'=>false,'data'=>[],'message'=>"Oops, Something went wrong,(Err in final)"];
							}//END OF CART PROCCESS
						}else{
								return ['status'=>false,'data'=>[],'message'=>"Oops, Something went wrong, Update CC req"];
						}
					}else{
						return ['status'=>false,'data'=>[],'message'=>'Oops, Something went wrong, (Err in Create order)'];
					}
//					CREATE ORDER END
		}else{
			return $upPrds_flag;//IF FAILED. update QNT with original product
		}

	}else{
		return $checkout_flag;
	}
		
}

public function updateCusPrdWTOrPrd($orderRes){
	//UPDATE CUS LIST QTY WT ORIGINAL QUANTITY
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
							}else{
								return ['status'=>true,'data'=>[],'message'=>"Products updated successfully."];
							}
							//UPDATE QUNT in DB END
}
			public function getProductOriginalQntyForCheckout($cus_or_pr_id_list){
				$arr = [
						'tbl_name' => 'products',
						'action' => 'select',
						'data' => ['p_id','stock','price','offer'],
						'condition'=>['manual'=>['p_id IN('.implode(',',$cus_or_pr_id_list).')']],
						'query-exc'=>true
					];
					$flag=$this->generateQuery($arr);
					if($flag['status'] == 'success'){
						if(count($flag['data'])!==0){
							return ['status'=>true,'data'=>$flag['data']];
						}else{
							return ['status'=>false,'data'=>[],'message'=>'Something went wrong contact your admin(Err in customer ordered item not found in prList)'];
						}
					}else{
						return ['status'=>false,'data'=>[],'message'=>'Something went wrong contact your admin(Err in fetch product list)'];
					}
			}

	  public function disableCartEdit($ids,$cart_date){
		$arr = [
			'tbl_name' => 'mycart',
			'action' => 'UPDATE',
			'data' => ['cart_edit_flag=0'],
			'condition'=>['manual'=>['p_id IN('.$ids.')']],
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
			$fileFlag = $this->uploadFile('assets/payment_proof_images/','file1');
			if($fileFlag['status']){
				$fname = $fileFlag['data'];
			}else{
				return ['status'=>false,'data'=>[],'message'=>"Err in store payment proof image"];
			}
			$order_id = $this->genRnd('alpha_numeric',10);
			$order_status = 'Pending';
			$arr = [
				'tbl_name' => 'myorder',
				'action' => 'insert',
				'data' => ["order_id='".$order_id."'","payment_proof='".$fname."'","cid='$this->cid'","product_list='".json_encode($product_list)."'","cart_date='$cart_date'","cart_status='$order_status'"],
				'query-exc'=>true
			];
			$flag=$this->generateQuery($arr);
			if($flag['status'] == 'success'){
				return ['status'=>true,'data'=>$order_id,'message'=>$flag['msg']];
			}else{
				return ['status'=>false,'data'=>[],'message'=>$flag['msg']];
			}
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

		public function deleteCategory(){
			$cate_id = $_GET['cate_id'];
		$q = "SELECT p_id FROM products  WHERE cate_id = '$cate_id'";
		echo $q;exit;
		$sql = $this->db->prepare($q);
		if($sql->execute()){
			$res = $sql->fetchAll(PDO::FETCH_ASSOC);
			if(count($res)!==0){
				for($i=0;$i<count($res);$i++){
					$getProductAvailabilityFlag = $this->getProductAvailability($res[$i]['p_id']);
					if($getProductAvailabilityFlag['status']){
							$availability_list = $this->productAvailabilityStrToArr($getProductAvailabilityFlag['data']);//Availability res str to arr
							$ids[] = $res[$i]['p_id'];
							$p_name=$this->getProductById($res[$i]['p_id']);
							if($availability_list['myorder_count'] > 0){
								return ['status'=>false,'data'=>$availability_list,'message'=>'Delete access denied, Because '.$availability_list['myorder_count'].' '.$p_name[1].' product available in order table(Its maybe Pending, Comfirmed,Arriving status). Please check that product!'];
							}
					}else{
						return $getProductAvailabilityFlag;
					}
				}
				//DELETE/CHANGE PRODUCT AVAILABILITY
				for($i=0;$i<count($ids);$i++){
					$deletAllProductUnderCategory =$this->changeProductAvailability($ids[$i]);
					if(!$deletAllProductUnderCategory['status']){
						return $deletAllProductUnderCategory;
					}
				}
				
			}//END IF
			$q = "DELETE FROM product_category WHERE cate_id='$cate_id'";
				$sql = $this->db->prepare($q);
				if($sql->execute()){//last stage Deleting catagory
					return $deletAllProductUnderCategory;//Exit
				}else{
					return ['status'=>false,'data'=>[],'message'=>'Err in delete product last stage'];
				}
			// else{
			// 	return ['status'=>false,'data'=>[],'message'=>'Zero cate list to delete'];
			// }

//			$list = explode(',',$res);

			// if($availability_list['myorder_count'] == 0){
			// 	return $this->changeProductAvailability($pid);
			// }else{
			// 	return ['status'=>false,'data'=>$availability_list,'message'=>'Delete access denied, Because '.$availability_list['myorder_count'].' product available in order table(Its maybe Pending, Comfirmed,Arriving status). Please check that product!'];
			// }
		}else{
			return ['status'=>false,'data'=>[],'message'=>'Err in get product availability list'];
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
				'data'=>['manual'=>['order_id as id,cart_date as date']],
				'action'=>'select',
				'condition'=>["cid='".$this->cid."'"],
				'order'=>['s_no','desc'],
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

		public function getOrderDetailById($order_id){
			if($this->cid == null){
				return ['status'=>false,'data'=>[],'message'=>"Please login to make action !"];
			}else{
				$arr =[
					'tbl_name'=>'myorder',
//					'data'=>['manual'=>['order_id as id,cart_date as date,to_base64(cart_status) as status']],
					'data'=>['manual'=>['cart_date as date ,cart_status as status,order_id as id,product_list as list']],
					'action'=>'select',
					'condition'=>["cid='".$this->cid."'","order_id='".$order_id."'"],
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

			public function productDelivered($id){
				if($this->cid == null){
					return ['status'=>false,'data'=>[],'message'=>"Please login to make action !"];
				}else{
				$arr =[
					'tbl_name'=>'myorder',
					'data'=>["cart_status='Completed'"],
					'action'=>'update',
					'condition'=>["manual"=>["cid='".$this->cid."' AND order_id='".$id."' AND cart_status LIKE '%Arriving%'"]],
					'query-exc'=>true
				  ];
				  $flag=$this->generateQuery($arr);
					if($flag['status']){
					  return ['status'=>true,'data'=>$flag['data'],'message'=>"Thankyou for your response !",'t_status'=>'Completed'];
				  }else{
					return ['status'=>false,'data'=>[],'message'=>"Err in status order complt status"];
				  }
				}
			}

			public function completedClientOrder(){
				if($this->cid == null){
					return ['status'=>false,'data'=>[],'message'=>"Please login to make action !"];
				}else{
				if(isset($_FILES['file1'])){
					if($_FILES['file1']['size'] !==0){
						return $this->checkoutFinal();//Client final checkout	
					}else{
						return ['status'=>false,'data'=>[],'message'=>"Please select payment proof image"];
					}
				}
			}
		}

		public function getCcReqFromInv(){
			return $this->generateQuery([
						'tbl_name'=>'cc_request',
						'action'=>'select',
						'data'=>[],
						'condition'=>['manual'=>["cid='".$this->cid."'"]],
						'order'=>['cc_req_id','desc'],
						'limit'=>1,
						'query-exc'=>true]);;
		}

		public function getCcReq($defid = ''){
			$arr = [
						'tbl_name'=>'cc_request',
						'action'=>'select',
						'data'=>[],
						'query-exc'=>true];
			if(!empty($defid)){
				$arr['condition']=["cid='".$defid."'","req_status=1"];
				$arr['order'] = ['cc_req_id','desc'];
				$arr['limit'] = 1; 
			}else{
				$arr['condition']=["req_status=1"];
				$arr['order'] = ['cc_req_id','asc']; 
			}
						$flag=$this->generateQuery($arr);
					if($flag['status'] == 'success'){
						if(count($flag['data'])>0){
							return ['status'=>true,'data'=>$flag['data'],'message'=>"CC reqst"];
						}else{
						return ['status'=>false,'data'=>[],'message'=>"Needs to raise CC req"];							
						}
					}
		}

		public function compare_my_assoc($arr1,$arr2){
			
				for($i=0;$i<count($arr2);$i++){
					for($j=0;$j<count($arr1);$j++) {
						if($arr2[$i]['p_id'] == $arr1[$j]['p_id']){
							if($arr2[$i]['qnty'] == $arr1[$j]['qnty']){
								return true;
							}else{
								return false;							
							}
						}else{
							if(($j+1)==count($arr1)){
								return false;
							}
						}
					}
				}

			
		}

		public function is_any_new_product_in_cart($id,$product_list){
			$arr = [
						'tbl_name'=>'cc_request',
						'action'=>'select',
						'condition'=>['manual'=>["cid='".$id."'","req_status=1"]],
						'order'=>['cc_req_id','desc'],
						'limit'=>1, 
						'data'=>[],
						'query-exc'=>true
					];

						$flag=$this->generateQuery($arr);
					if($flag['status'] == 'success'){
						if(count($flag['data'])>0){
							$db_product = json_decode($flag['data'][0]['total_product'],true);

							if(count($db_product) !== count($product_list)){
								return ['status'=>false,'data'=>[],'message'=>'Changes in cart items'];
							}
							if($this->compare_my_assoc($db_product,$product_list)){
								return ['status'=>true,'data'=>[],'message'=>'No changes, Good to go and cc req already exists.'];
							}else{
								return ['status'=>false,'data'=>[],'message'=>'Changes in cart items'];
							}
						}else{
						return ['status'=>false,'data'=>[],'message'=>"Needs to raise CC req"];							
						}
					}
		}

		public function raiseCcReq($data){
			//$data contains product id and qnty
			if($this->cid == null){
						return ['status'=>false,'data'=>[],'message'=>"Please login to make action !"];
			}else{
				$cc_info = $this->getCcReq($this->cid);
				if($cc_info['status']){
					$check_cart_item = $this->is_any_new_product_in_cart($this->cid,$data);
					if($check_cart_item['status']){
						if(count($cc_info)>0){
							return ['status'=>true,'data'=>$cc_info['data'][0]['cc_price'],'message'=>'Cc price'];	
						}
					}	
				}



				//UPDATE REQ to 0
				$this->generateQuery([
						'tbl_name'=>'cc_request',
						'action'=>'update',
						'data'=>["req_status=0"],
						'condition'=>['manual'=>["cid='".$this->cid."'"]],
						'query-exc'=>true]);
	
					$arr = [
						'tbl_name'=>'cc_request',
						'action'=>'insert',
						'data'=>["cid='".$this->cid."'","cc_price='TBD'","total_product='".json_encode($data)."'","req_status=1","req_date=CURRENT_DATE"],
						'query-exc'=>true];
					if($this->generateQuery($arr)['status'] == 'success'){


									/**notification
				 * optional
				 * 
				 * */
$update_cc_url = 'https://test.com/index.php?controller=admin&key=f76543c3830696dbcdb775d38ebe9b6a763086d2a86be47c449c7b5a55f8d3e9';
				$params=array(
'token' =>'yvvvaffvramlnxn2',
'to' => '+918939068212',
'body' => '*New order from our customer* \n
	ID : '.$this->cid.',\n
	Update CC Price : '.$update_cc_url.',\n
	- Bot 
	');
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.ultramsg.com/instance71197/messages/chat",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER => 0,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => http_build_query($params),
  CURLOPT_HTTPHEADER => array(
    "content-type: application/x-www-form-urlencoded"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

// if ($err) {
// //  echo "cURL Error #:" . $err;
// } else {
//   $res =json_decode($response,true);
// }
						return ['status'=>true,'data'=>[],'message'=>'Request sent successfully'];
					}else{
						return ['status'=>false,'data'=>[],'message'=>'err in raise cc req'];
					}
			}	
		}

		public function upCcPrice($id,$price){
			$arr =[
					'tbl_name'=>'cc_request',
					'data'=>["cc_price=$price"],
					'action'=>'update',
					'condition'=>["manual"=>["cid='".base64_decode($id)."' AND req_status=1"]],
					'query-exc'=>true
				  ];
				  $flag=$this->generateQuery($arr);
					if($flag['status']){
					  return ['status'=>true,'data'=>$flag['data'],'message'=>"CC price updated!."];
				  }else{
					return ['status'=>false,'data'=>[],'message'=>"Err in update CC price"];
				  }
		}

		

}//CLASS END



?>