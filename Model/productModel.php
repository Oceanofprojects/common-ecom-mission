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


}//CLASS END





//$obj = new products();
//print_r($_GET);exit;
// if($_GET['key'] == 'test'){
// 	echo $obj->cartItemExists(1234,'p1');
// }
// $algo = 'sha256';
// $skey = 9050;
//
// if(hash_equals(hash_hmac($algo,'get_all',$skey),$Req['key'])){
// 		$obj->get_all();
// }else if(hash_equals(hash_hmac($algo,'addToFav',$skey),$_REQUEST['key'])){
// 	$obj->addToFav();
// }else{
// 	echo "EMPTY";
// 	echo json_encode(['status'=>0,'data'=>[]]);
// }

?>
