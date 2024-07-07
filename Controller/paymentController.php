<?php

// require_once __DIR__ . "/../Controller/commonController.php"; //COMMON CONTOLLER



class paymentController
{
    private $payMdl;
    public function __construct()
    {
        //init
        require_once __DIR__ . "/../Model/paymentModel.php";
        // require_once __DIR__ . "/../Model/customerModel.php";
        // require_once __DIR__ . "/../Model/productModel.php";
        $this->payMdl = new rayzorPayMdl();
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
        die(json_encode(['status'=>false,'data'=>[],'message'=>'Invalid token !']));
      }

      if(hash_equals(hash_hmac($algo,'capturePaymentDetail',$skey),$req['key'])){
        $this->capturePaymentDetail();
      }else{
        die(json_encode(['status'=>false,'data'=>[],'message'=>'Invalid token !']));
      }
    }

    public function capturePaymentDetail()
    {
      // echo 'RUN';exit;
        $this->payMdl->capturePaymentDetail();
    }


}


?>