<?php

require_once __DIR__ . "/../Controller/commonController.php"; //COMMON CONTOLLER

class productController extends commonController
{
    public function __construct()
    {
        //init
        require_once __DIR__ . "/../Model/productModel.php";
        $this->validateResults = []; //init for auto validate looping arr in commonController.php
        $this->productMdl = new products();
        // $v = RMW::_sanitize($d,['name','age','class']);

    }
    public function getReviews($data){
      return $this->productMdl->getReview($data);
    }
    /**
     * Execute the corresponding action.
     *
     */
    public function run($action){
    //here no no use for action var
        $algo = 'sha256';
      $skey = 9050;
      if(isset($_GET['key'])){
        $req['key'] = $_GET['key'];
      }else{
        $req['key'] = '723502982ca5d2790c1f9464af3613117a3bd4e55ee0a68b6c29ab76d23b71b6';//default
      }
      if(hash_equals(hash_hmac($algo,'moveToAddProduct',$skey),$req['key'])){
        $this->moveToAddProduct();
      }else if(hash_equals(hash_hmac($algo,'moveToEditProduct',$skey),$req['key'])){
        $this->moveToEditProduct();
      }else if(hash_equals(hash_hmac($algo,'addProduct',$skey),$req['key'])){
        $validateArgs = [
            ['p_name', 'check', 'isNotEmpty'],
            ['p_name', 'check', 'isNotContainSpecialChars_allow_space'],
            ['unit', 'check', 'isNotEmpty'],
            ['unit', 'check', 'isNotContainSpecialChars_allow_space'],
            ['p_desc', 'check', 'isNotEmpty'],
            ['p_desc', 'check', 'isNotContainSpecialChars_allow_space'],
            ['tags', 'check', 'isNotEmpty'],
            ['tags', 'check', 'isNotContainSpecialChars_allow_space'],
            ['', 'auto_remove', 'forLabelMsg']//auto remove ext
        ]; //VALIDATE CONDITIONS ARGS
        $flag = $this->autoValidate($_POST, $validateArgs)[0];
        if($flag['status']){
          echo json_encode($this->productMdl->addProduct());
        }else{
          echo json_encode(['status'=>false,'data'=>[],'message'=>$flag['msg']]);
        }
      }else if(hash_equals(hash_hmac($algo,'editProduct',$skey),$req['key'])){
        if(isset($_POST['product_flow'])){
          //sub product ADD(Same flow so methos reused)
          if(isset($_POST['product_flow']) && $_POST['product_flow'] == 'sub_item'){
              echo json_encode($this->productMdl->addSubProduct());
          }
        }else{
          //product edit
           $validateArgs = [
            ['p_name', 'check', 'isNotEmpty'],
            ['p_name', 'check', 'isNotContainSpecialChars_allow_space'],
            ['unit', 'check', 'isNotEmpty'],
            ['unit', 'check', 'isNotContainSpecialChars_allow_space'],
            ['p_desc', 'check', 'isNotEmpty'],
            ['p_desc', 'check', 'isNotContainSpecialChars_allow_space'],
            ['tags', 'check', 'isNotEmpty'],
            ['tags', 'check', 'isNotContainSpecialChars_allow_space'],
            ['', 'auto_remove', 'forLabelMsg']//auto remove ext
        ]; //VALIDATE CONDITIONS ARGS
        $flag = $this->autoValidate($_POST, $validateArgs)[0];
        if($flag['status']){
          echo json_encode($this->productMdl->editProduct());
        }else{
          echo json_encode(['status'=>false,'data'=>[],'message'=>$flag['msg']]);
        }

        }
      }else if(hash_equals(hash_hmac($algo,'transferSubProductByID',$skey),$req['key'])){
         $validateArgs = [
            ['pid', 'check', 'isNotEmpty'],
            ['cid', 'check', 'isNotEmpty'],
            ['pid', 'check', 'isNotContainSpecialChars_allow_space'],
            ['cid', 'check', 'isNotContainSpecialChars_allow_space'],
        ]; //VALIDATE CONDITIONS ARGS

        $flag = $this->autoValidate($_GET, $validateArgs)[0];

        if($flag['status']){
          echo json_encode($this->productMdl->transferSubProduct($_GET['pid'],$_GET['cid']));
        }else{
          echo json_encode(['status'=>false,'data'=>[],'message'=>$flag['msg']]);
        }
      }else if(hash_equals(hash_hmac($algo,'moveToAddSubProduct',$skey),$req['key'])){
            $this->view("sub_product/addSubProduct", array(
              "title" => "Add Sub-Product",
              "data"=>[]
          ));
      }else if(hash_equals(hash_hmac($algo,'moveToTransferSubProduct',$skey),$req['key'])){
            $this->view("sub_product/transferSubItem", array(
              "title" => "Transfer Sub-Product",
              "data"=>[]
          ));
      }else if(hash_equals(hash_hmac($algo,'addCategory',$skey),$req['key'])){
        echo json_encode($this->productMdl->addCategory());
      }else if(hash_equals(hash_hmac($algo,'viewProduct',$skey),$req['key'])){
        $this->productDetail();
      }else if(hash_equals(hash_hmac($algo,'category',$skey),$req['key'])){
        $this->category();
      }else if(hash_equals(hash_hmac($algo,'removefrommycart',$skey),$req['key'])){
        echo json_encode($this->productMdl->removefrommycart($_GET['cartid']));
      }else if(hash_equals(hash_hmac($algo,'search',$skey),$req['key'])){
        echo json_encode($this->productMdl->search($_GET['search_txt']));
      }else if(hash_equals(hash_hmac($algo,'sendReview',$skey),$req['key'])){
        echo json_encode($this->productMdl->sendReview($_GET));
      }else if(hash_equals(hash_hmac($algo,'checkout',$skey),$req['key'])){
        echo json_encode($this->productMdl->checkout());
      }else if(hash_equals(hash_hmac($algo,'getCateById',$skey),$req['key'])){
        echo json_encode($this->productMdl->getCateById($_GET['cid']));
      }else if(hash_equals(hash_hmac($algo,'editCategory',$skey),$req['key'])){
       echo json_encode($this->productMdl->editCategory());
      }else if(hash_equals(hash_hmac($algo,'getProductDetailById',$skey),$req['key'])){
        echo json_encode($this->productMdl->getProductDetailById($_GET['pid']));
      }else if(hash_equals(hash_hmac($algo,'completedClientOrder',$skey),$req['key'])){
        // $check_dbl_check = $this->productMdl->checkout();
        // print_r($check_dbl_check);
        // $tot_qnt=null;
        // foreach ($check_dbl_check['product_detail'] as $item) {
        //   $tot_qnt += $item['qnty'];
        // }
        // if(is_array($check_dbl_check['product_detail']) && count($check_dbl_check['product_detail'])>0){
        // (!isset($_GET['item']))?die(json_encode(['status'=>false,'data'=>[],'message'=>'item count not exists'])):true;
        //   $sec_item = intval(base64_decode($_GET['item']));
        //   if(($sec_item-9050) == $tot_qnt){
            echo json_encode($this->productMdl->completedClientOrder());
        //   }else{
        //     echo json_encode(['status'=>false,'data'=>[],'message'=>'New product founded. Please wait..','flag'=>'refresh']);
        //   }
        // }
      }else if(hash_equals(hash_hmac($algo,'deleteProduct',$skey),$req['key'])){
        echo json_encode($this->productMdl->deleteProduct());
      }else if(hash_equals(hash_hmac($algo,'deleteCategory',$skey),$req['key'])){
        echo json_encode($this->productMdl->deleteCategory());
      }else if(hash_equals(hash_hmac($algo,'getProductByRange',$skey),$req['key'])){
        $from = $_GET['from'] + $_GET['to'];
        $to = 4;//get four new product
        echo json_encode($this->productMdl->get_all(['from-range'=>$from,'to-range'=>$to]));
      }else if(hash_equals(hash_hmac($algo,'moreCategory',$skey),$req['key'])){
        $this->view("category/moreCate", array(
          "title" => "All category",
          "data"=>$this->productMdl->get_cate_list()
      ));
      }else if(hash_equals(hash_hmac($algo,'productStatusCpanel',$skey),$req['key'])){
        $this->view("main/productStatusCpanel", array(
          "title" => "Client product contol",
          "data"=>[]
      ));
      }else if(hash_equals(hash_hmac($algo,'moveToAddCate',$skey),$req['key'])){
        $this->view("category/addCate", array(
            "title" => "Create category",
            "data"=>[]//$this->productMdl->get_all()
        ));
      }else if(hash_equals(hash_hmac($algo,'moveToEditCate',$skey),$req['key'])){
        $this->view("category/editCate", array(
            "title" => "Edit category",
            "data"=>$this->productMdl->get_cate_list()
        ));
      }else if(hash_equals(hash_hmac($algo,'trackMyOrder',$skey),$req['key'])){
        $this->view("track_order/index", array(
            "title" => "Track Orders",
            "data"=>$this->productMdl->getOrderList()
        ));
      }else if(hash_equals(hash_hmac($algo,'openSearch',$skey),$req['key'])){
        $this->view("search/index", array(
            "title" => "Product Search",
            "data"=>$this->productMdl->search($_GET['search_txt'])
        ));
      }else if(hash_equals(hash_hmac($algo,'checkoutfinal',$skey),$req['key'])){
        $this->view("main/checkout", array(
            "title" => "Checkout Product",
            "data"=>$this->productMdl->checkout()//$this->productMdl->getCartByIdNDate(date('Y-m-d'))
           //$this->productMdl->checkoutFinal()
        ));
      }else if(hash_equals(hash_hmac($algo,'hotlist',$skey),$req['key'])){
        $this->view("product/todayshotlist", array(
            "title" => "Today's Hot List",
            "data"=>[1,1,1,1]
        ));
      }else if(hash_equals(hash_hmac($algo,'addSlider',$skey),$req['key'])){
        echo json_encode($this->productMdl->addSlider());
      }else if(hash_equals(hash_hmac($algo,'getOrderDetailById',$skey),$req['key'])){
        if(isset($_GET['order_id'])){
        echo json_encode($this->productMdl->getOrderDetailById($_GET['order_id']));
        }
      }else if(hash_equals(hash_hmac($algo,'productDelivered',$skey),$req['key'])){
        if(isset($_GET['t_id'])){
        echo json_encode($this->productMdl->productDelivered($_GET['t_id']));
        }
      }else{
        $this->index();
      }
    }


    public function index()
    {
        $this->view("index", array(
            "title" => "Home",
            "data"=>$this->productMdl->get_all(['from-range'=>0,'to-range'=>5]),
            "cate_list"=>$this->productMdl->get_cate_list(),
            "categoryProductSets"=>$this->productMdl->getProductUnderCategory()
        ));
    }

    public function moveToAddProduct(){
      $this->view("product/addProduct", array(
          "title" => "Add Product",
          "data"=>$this->productMdl->get_cate_list()
      ));
    }

    public function moveToEditProduct(){
      $this->view("product/editProduct", array(
          "title" => "Edit Product",
          "data"=>$this->productMdl->get_cate_list()
      ));
    }

    public function category(){
      $this->view("category/index", array(
          "title" => "Category",
          "data"=>$this->productMdl->getProductByCateId($_GET['cate_id'])
      ));
    }
//    addProduct

    public function productDetail(){
      if(isset($_GET['pid'])){
        $pid = $_GET['pid'];
      }else{
        die('P-ID not found');
      }
      $products = $this->productMdl->get_product_wt_suggestion($pid);
      if(count($products['data'])==0){
        die('Oops!..P-ID not found');
      }
//      print_r($products);exit;
      if($products['status']){
        $selected_product['status'] = true;
        $selected_product['message'] = 'Select product fetched successfully';
        $selected_product['myFavExit']=$products['data']['myFavExit'];//$products['myFavExit'];//$this->productMdl->myfavExist($_GET['pid']);
        $suggest_product['status'] = true;
        $suggest_product['message'] = 'Suggestion product fetched for Selected product';
        $suggest_product['data']=[];//default EMPTY

      }
      $products = $products['data'];
      $inc1 = 0;
      $inc2 = 0;
      if(count($products['data'])>0){
        //get four item for suggest
        for($i=0;$i<count($products['data']);$i++){
          if($products['data'][$i]['p_id'] == $pid){
            $selected_product['data'][$inc1] = $products['data'][$i];
            $inc1++;
          }else{
            $suggest_product['data'][$inc2] = $products['data'][$i];
            $inc2++;
          }
        }
      }
      $this->view("product/detailProduct", array(
          "title" => "Product detail",
          "selected_product"=>$selected_product,
          "suggestion"=>$suggest_product,
          "selected_product_subsets"=>$this->productMdl->getSubSetsByPID($selected_product['data'][0]['p_id'])
      ));
    }


}


?>
