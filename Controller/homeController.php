<?php

require_once __DIR__ . "/../Controller/commonController.php"; //COMMON CONTOLLER



class homeController extends commonController
{

    public function __construct()
    {
        //init
        require_once __DIR__ . "/../Model/productModel.php";

        $this->validateResults = []; //init for auto validate looping arr in commonController.php

        //Product Model

        $this->productMdl = new products();
    }
    /**
     * Execute the corresponding action.
     *
     */
    public function run($action)
    {
      if($action == 'productDetail'){
        $this->productDetail();
        exit;
      }
        $algo = 'sha256';
      $skey = 9050;
      if(isset($_GET['key'])){
        $req['key'] = $_GET['key'];
      }else{
        $req['key'] = '723502982ca5d2790c1f9464af3613117a3bd4e55ee0a68b6c29ab76d23b71b6';
      }

      if(hash_equals(hash_hmac($algo,'get_all',$skey),$req['key'])){
        $this->index();
      }else if(hash_equals(hash_hmac($algo,'addToFav',$skey),$req['key'])){
        echo json_encode($this->productMdl->addToFav());
      }else if(hash_equals(hash_hmac($algo,'getMyFav',$skey),$req['key'])){
        echo json_encode($this->productMdl->myfav());
      }else if(hash_equals(hash_hmac($algo,'addToCart',$skey),$req['key'])){
        echo json_encode($this->productMdl->addToCart());
      }else if(hash_equals(hash_hmac($algo,'myCart',$skey),$req['key'])){
        echo json_encode($this->productMdl->mycart());
      }else if(hash_equals(hash_hmac($algo,'gotoLogin',$skey),$req['key'])){
        header("location:View/login/");
      }else if(hash_equals(hash_hmac($algo,'gotosignup',$skey),$req['key'])){
        header("location:View/signup/");
      }else if(hash_equals(hash_hmac($algo,'cpanel',$skey),$req['key'])){
        $this->view("cpanel/index", array(
            "title" => "Cpanel",
            "data"=>[]
        ));
      }else{
        $this->index();
      }
    }

    public function index()
    {
        $this->view("index", array(
            "title" => "Home",
            "data"=>$this->productMdl->get_all(['from-range'=>0,'to-range'=>2]),
            "cate_list"=>$this->productMdl->get_cate_list(),
        ));
    }

    // public function productDetail(){
    //
    //   $this->view("productDetails/index", array(
    //       "title" => "Product detail",
    //       "data"=>$this->productMdl->get_product()
    //   ));
    // }


}


?>