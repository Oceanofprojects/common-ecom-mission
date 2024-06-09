<?php

require_once __DIR__ . "/../Controller/commonController.php"; //COMMON CONTOLLER

require('Lib/form/class.form_plate.php');      


class homeController extends commonController
{

  public $form_plate;

    public function __construct()
    {
        //init
        require_once __DIR__ . "/../Model/productModel.php";
        require_once __DIR__.'/../Controller/spacesettingController.php';
        $this->form_plate = new form();

        $this->validateResults = []; //init for auto validate looping arr in commonController.php

        //Product Model
        $this->bis_info = new spacesetting();
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
        // header("location:View/login/");
        $this->form_plate->form_type = 'login_form';
        $this->view("login/index", array(
          "title" => "User Login :: Login to your account",
          "data"=>[
            'form'=>$this->form_plate->getForm()
          ]
      ));
      }else if(hash_equals(hash_hmac($algo,'gotosignup',$skey),$req['key'])){
        // header("location:View/signup/");
        $this->form_plate->form_type = 'signin_form';
        $this->view("signup/index", array(
          "title" => "Customer register :: Register your account",
          "data"=>[
            'form'=>$this->form_plate->getForm()
          ]
      ));

      }else if(hash_equals(hash_hmac($algo,'cpanel',$skey),$req['key'])){
        $this->view("cpanel/index", array(
            "title" => "Cpanel",
            "data"=>[]
        ));
      }else if(hash_equals(hash_hmac($algo,'shippingpolicy',$skey),$req['key'])){
        $business_info = $this->bis_info->business_info();
        $b_name = "";
        if(count($business_info)>0){
          $b_name = $business_info['business']['name']." ";
        }
        $this->view("policy/shipping_policy", array(
            "title" => $b_name."shipping policy",
            "data"=>['info'=>$business_info]
        ));
      }else if(hash_equals(hash_hmac($algo,'refundpolicy',$skey),$req['key'])){
        $business_info = $this->bis_info->business_info();
        $b_name = "";
        if(count($business_info)>0){
          $b_name = $business_info['business']['name']." ";
        }
        $this->view("policy/refund_policy", array(
            "title" => $b_name."refund policy",
            "data"=>['info'=>$business_info]
        ));
      }else if(hash_equals(hash_hmac($algo,'replacementpolicy',$skey),$req['key'])){
        $business_info = $this->bis_info->business_info();
        $b_name = "";
        if(count($business_info)>0){
          $b_name = $business_info['business']['name']." ";
        }
        $this->view("policy/replacement_policy", array(
            "title" => $b_name."replacement policy",
            "data"=>['info'=>$business_info]
        ));
      }else{
        $this->index();
      }
    }

    public function index()
    {
        $this->view("index",array(
            "title" => "Home",
            "data"=>$this->productMdl->get_all(['from-range'=>0,'to-range'=>4]),
            "cate_list"=>$this->productMdl->get_cate_list(),
            "categoryProductSets"=>$this->productMdl->getProductUnderCategory()
        ));
    }


}


?>