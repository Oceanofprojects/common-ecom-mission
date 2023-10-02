<?php

require_once __DIR__.'/../core/connect.php';
require_once __DIR__.'/../model/commonModel.php';
require_once __DIR__.'/../model/customer.php';

class products extends commonModel{
	use userData;
	public $db;
	public $cid;
	public function __construct(){
		$connect = new Connect();
		$this->db=$connect->Connection();
		if(isset($_COOKIE['uid'])){
			$cflag = $this->getUserId();
			if($cflag[0]){
				$this->cid = $cflag[1];
			}
		}else{
			$this->cid = null;
		}
	}

	public function get_all(){
    if($this->cid == null){
      $tmptbl = 'products';
      $arr = [
        'tbl_name'=>$tmptbl,
        'action'=>'select',
        'data'=>['manual'=>["p_id,cate,p_img,p_name,price,offer,unit,stock"]],
        'limit'=>10,
        'order'=>['p_id','asc'],
        'query-exc'=>true
      ];
    }else{
      $tmptbl = 'products';
      $arr = [
        'tbl_name'=>$tmptbl,
        'action'=>'join',
        'data'=>['manual'=>["$tmptbl.p_id,$tmptbl.cate,$tmptbl.p_img,$tmptbl.p_name,$tmptbl.price,$tmptbl.offer,$tmptbl.unit,$tmptbl.stock,myfav.cid AS favExistCid"]],
        'join_param'=>[
          ['myfav','left_join','p_id','p_id']
        ],
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
			return ['r'=>1,'status'=>0,'data'=>[$q]];
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
				return ['status'=>1,'flag'=>1,'data'=>[],'message'=>'fav removed. #It\'s takes some time to update.'];
			}else{
				return ['status'=>0,'flag'=>0,'data'=>[],'message'=>'Err in fav remove'];
			}
		}else{//Insert Fav
				$arr = ['tbl_name'=>'myfav','action'=>'insert','data'=>['p_id="'.$p_id.'"','cid="'.$c_id.'"','created_at=current_timestamp','updated_at=now()'],'condition'=>["p_id='".$p_id."'","cid='".$c_id."'"],'query-exc'=>true];
			if($this->generateQuery($arr)['status']){
        return ['status'=>1,'flag'=>1,'data'=>[],'message'=>'fav added. #It\'s takes some time to update.'];
			}else{
				return ['status'=>0,'flag'=>0,'data'=>[],'message'=>'err in insert'];
			}
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
          return ['status'=>true,'data'=>$flag['data'],'message'=>"My Fav fetched"];
      }else{
        return ['status'=>false,'data'=>[],'message'=>"Err in fetch my fav"];
      }
    }

	}

	public function get_product(){
		if(isset($_GET['pid'])){
				$p_id = $_GET['pid'];
				if($this->cid == null){
					$arr = [
						'tbl_name'=>'products',
						'data'=>[],
						'action'=>'select',
						'condition'=>['p_id="'.$p_id.'"'],
						'query-exc'=>true
					];
				}else{
					$arr = [
		        'tbl_name'=>'products',
		        'action'=>'select',
		        'data'=>[],
						'condition'=>['manual'=>['p_id="'.$p_id.'"']],
		        'query-exc'=>true
		      ];
				}
				$flag = $this->generateQuery($arr);
				if($flag['status']){
					return ['status'=>true,'data'=>$flag['data'],'message'=>'Product details fetched'];
				}else{
					return ['status'=>false,'data'=>[],'message'=>'Err in get product details'];
				}
		}else{
			return ['status'=>false,'data'=>[],'message'=>'Something went wrong. please try again.'];
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
				'data'=>["cart_id='$randid'","cid='$uid'","p_id='$p_id'","quantity=$quant","_date='$dt'","created_at=current_timestamp","updated_at=now()"],
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

	public function get_cate_list(){
		$q="select distinct cate,cate_img from products";
		$sql = $this->db->prepare($q);
		if($sql->execute()){
			$res=$sql->fetchAll(PDO::FETCH_ASSOC);
			if(count($res) == 0){
				return ['status'=>true,'data'=>[],'message'=>'Zero fetch'];
			}else{
				return ['status'=>true,'data'=>$res,'message'=>'Successfully fetched'];
			}
		}else{
			return ['status'=>false,'data'=>[],'message'=>'Err in fetching cate list'];
		}
	}

	public function mycart(){
		$uid = $this->cid;
		if($uid == null){
			return ['status'=>false,'data'=>[],'message'=>'Please login to make action !.'];
		}else{
			$oldCart = false;//default - false
			if(isset($_GET['date'])){
				$d=$_GET['date'];
				if($d == date('Y-m-d')){//if current - false
					$oldCart = false;
				}else{
					$oldCart = true;
				}
				$q="SELECT * from products as P right join mycart as F on P.p_id= F.p_id where _date='{$d}' and cid='{$uid}' order by P.s_no asc";
			}else{
				$q="SELECT * from products as P right join mycart as F on P.p_id= F.p_id where _date=date(now()) and cid='{$uid}' order by P.s_no asc";
			}
			$sql = $this->db->prepare($q);
				if($sql->execute()){
					$res=$sql->fetchAll(PDO::FETCH_ASSOC);
					echo json_encode(['status'=>1,'data'=>$res,'old_r'=>$oldCart,'t'=>$q]);
			}
		}
		exit;

	}

}//CLASS END



?>
