<?php

require_once __DIR__ . "/../Controller/commonController.php"; //COMMON CONTOLLER
require_once __DIR__.'/../Model/customerModel.php';


class adminController extends commonController
{

    public function __construct()
    {
        //Admin Model
        require_once __DIR__ . "/../Model/adminModel.php";


        $this->adminMdl = new adminCtrl();
        $this->cusMdl = new customer();

        require_once __DIR__ . "/../Controller/productController.php";
        $this->productCtrl = new productController();

        $algo = 'sha256';
        $skey = 9050;

      if(isset($_GET['key'])){
        $req['key'] = $_GET['key'];
      }else{
        $req['key'] = '723502982ca5d2790c1f9464af3613117a3bd4e55ee0a68b6c29ab76d23b71b6';//default
      }

        $accessFlag = $this->cusMdl->getUserId((isset($_COOKIE['uid'])?$_COOKIE['uid']:0));//get role
        if(count($accessFlag)!==0){
            if($accessFlag[2] == 'customer'){
                die('Unauth access !');
            }
        }
    

        //init
    
        $this->validateResults = []; //init for auto validate looping arr in commonController.php


    }
    /**
     * Execute the corresponding action.
     *
     */
    public function run($action)
    {
        $algo = 'sha256';
      $skey = 9050;
      if(isset($_GET['key'])){
        $req['key'] = $_GET['key'];
      }else{
        $req['key'] = '723502982ca5d2790c1f9464af3613117a3bd4e55ee0a68b6c29ab76d23b71b6';
      }

      if(hash_equals(hash_hmac($algo,'get_all',$skey),$req['key'])){
        $this->index();
      }else if(hash_equals(hash_hmac($algo,'changeOrderStatus',$skey),$req['key'])){
            echo json_encode($this->adminMdl->changeOrderStatus());
      }else if(hash_equals(hash_hmac($algo,'moveToAddProduct',$skey),$req['key'])){
        $this->productCtrl->moveToAddProduct();
      }else if(hash_equals(hash_hmac($algo,'moveToEditProduct',$skey),$req['key'])){
        $this->productCtrl->moveToEditProduct();
      }else if(hash_equals(hash_hmac($algo,'moveToAddCate',$skey),$req['key'])){
        $this->view("category/addCate", array(
            "title" => "Create category",
            "data"=>[]
        ));
      }else if(hash_equals(hash_hmac($algo,'moveToEditCate',$skey),$req['key'])){
        $this->view("category/editCate", array(
            "title" => "Edit category",
            "data"=>$this->productCtrl->productMdl->get_cate_list()
        ));
      }else if(hash_equals(hash_hmac($algo,'moveToproductStatusCpanel',$skey),$req['key'])){
        $this->view("main/productStatusCpanel", array(
          "title" => "Client product contol",
          "data"=>$this->adminMdl->getCusOrderList()
      ));
      }

      // else if(hash_equals(hash_hmac($algo,'getCusOrderList',$skey),$req['key'])){
      //   echo "MANI";exit;
      //   $this->view("main/productStatusCpanel", array(
      //       "title" => "Client product contol",
      //       "data"=>$this->adminMdl->getCusOrderList()
      //   ));
      // }
      else{
//        $this->index();
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


}


?>