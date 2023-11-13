<?php

require_once __DIR__ . "/../Controller/commonController.php"; //COMMON CONTOLLER



class adminController extends commonController
{

    public function __construct()
    {
        //init
        require_once __DIR__ . "/../Model/adminModel.php";

        $this->validateResults = []; //init for auto validate looping arr in commonController.php

        //Admin Model

        $this->adminMdl = new adminCtrl();
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
      }else if(hash_equals(hash_hmac($algo,'getCusOrderList',$skey),$req['key'])){
        $this->view("main/productStatusCpanel", array(
            "title" => "Client product contol",
            "data"=>$this->adminMdl->getCusOrderList()
        ));
      }else if(hash_equals(hash_hmac($algo,'getCusById',$skey),$req['key'])){
        $this->view("main/cusInfo", array(
            "title" => "Customer Info",
            "data"=>[1,2,3,4]
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


}


?>