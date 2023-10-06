<?php

require_once __DIR__ . "/../controller/commonController.php"; //COMMON CONTOLLER



class productController extends commonController
{

    public function __construct()
    {
        //init
        require_once __DIR__ . "/../model/productModel.php";

        $this->validateResults = []; //init for auto validate looping arr in commonController.php

        //Product Model

        $this->productMdl = new products();
    }
    /**
     * Execute the corresponding action.
     *
     */
    public function run($action){
    //here no no use for action var
        $algo = 'sha256';
      $skey = 9050;
      if(isset($_GET) && count($_GET)){
        $req['key'] = $_GET['key'];
      }else{
        $req['key'] = '723502982ca5d2790c1f9464af3613117a3bd4e55ee0a68b6c29ab76d23b71b6';//default
      }
      if(hash_equals(hash_hmac($algo,'moveToAddProduct',$skey),$req['key'])){
        $this->moveToAddProduct();
      }else if(hash_equals(hash_hmac($algo,'addProduct',$skey),$req['key'])){
        print_r($_GET);
      }else if(hash_equals(hash_hmac($algo,'viewProduct',$skey),$req['key'])){
        $this->productDetail();
      }else if(hash_equals(hash_hmac($algo,'category',$skey),$req['key'])){
        $this->category();
      }else{
        $this->index();
      }
    }

    public function index()
    {
        $this->view("index", array(
            "title" => "Home",
            "data"=>$this->productMdl->get_all()
        ));
    }

    public function moveToAddProduct(){
      $this->view("product/addProduct", array(
          "title" => "Add Product",
          "data"=>$this->productMdl->get_cate_list()
      ));
    }

    public function category(){
      $this->view("category/index", array(
          "title" => "Category",
          "data"=>$this->productMdl->getProductByCate($_GET['cate'])
      ));
    }
//    addProduct

    public function productDetail(){
      $this->view("product/detailProduct", array(
          "title" => "Product detail",
          "data"=>$this->productMdl->get_product()
      ));
    }


}


?>
