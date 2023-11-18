<?php

require_once __DIR__ . "/../Controller/commonController.php"; //COMMON CONTOLLER



class customerController extends commonController
{

    public function __construct()
    {
        //init
        require_once __DIR__ . "/../Model/customerModel.php";

        $this->validateResults = []; //init for auto validate looping arr in commonController.php

        //Customer Model

        $this->cusMdl = new customer();
    }
    /**
     * Execute the corresponding action.
     *
     */
    public function run($action)
    {
    $algo = 'sha256';
      $skey = 9050;
      if(isset($_GET) && count($_GET)){
        $req['key'] = $_GET['key'];
      }else{
        die('Invalid token');
      }

      if(hash_equals(hash_hmac($algo,'signup',$skey),$req['key'])){
        $this->signup();
      }else if(hash_equals(hash_hmac($algo,'userlogin',$skey),$req['key'])){
        $this->login($_GET['cus_idnty'],$_GET['pwd']);
      }else if(hash_equals(hash_hmac($algo,'openSetting',$skey),$req['key'])){
        $this->view("main/setting", array(
          "title" => "Customers Registration Form",
          "data"=>$this->cusMdl->getUserInfoById()
      ));
      }else if(hash_equals(hash_hmac($algo,'logout',$skey),$req['key'])){
        if(setcookie('uid','',time() - 3600,"/")){
          echo json_encode(['status'=>true,'data'=>[],'message'=> 'Logged out successfully']);
        }else{
          echo json_encode(['status'=>false,'data'=>[],'message'=> 'Err in logout']);
        }
      }else{
        //invalid tokenuserlogin
      }
    }

    public function signup()
    {
        $validateArgs = [
            ['c_name', 'check', 'isStr'],
            ['c_name', 'check', 'isNotEmpty'],
            ['ph_num', 'check', 'isNotEmpty'],
            ['ph_num', 'checkLengthMust', 10],
            ['whatsapp_num', 'check', 'isNotEmpty'],
            ['whatsapp_num', 'checkLengthMust', 10],
            ['email', 'check', 'isEmail'],
            ['address_1', 'check', 'isNotEmpty'],
            ['address_2', 'check', 'isNotEmpty'],
            ['city', 'check', 'isNotEmpty'],
            ['pwd', 'check', 'isConPwd'],
            ['pwd', 'check', 'isPwd']
        ]; //VALIDATE CONDITIONS ARGS

        $flag = $this->autoValidate($_GET, $validateArgs)[0];
        if($flag['status']){
            //{"status":true,"msg":"Condition Passed for :C NAME","validateFlag":true}
            $userState = $this->cusMdl->saveCustomer($_GET);
            if($userState['status'] == 'success'){
              $this->checkNmakeLog($userState['cid']);
//                echo json_encode(['status'=>$flag['status'],'validateFlag'=>$flag['validateFlag'],'data'=>[],'msg'=>'New Customer added successfully']);
            }else{
                echo json_encode(['status'=>false,'data'=>[],'msg'=>$userState['msg']]);
            }
        }else{
            echo json_encode($flag);
        }
    }

    public function login($idnty,$pwd){
      $flag = $this->cusMdl->getCusListByIdnty($idnty);//getting user info
      if($flag['status'] == 'success'){
        if(count($flag['data']) !==0){
          $pwds = $flag['data'];
          $loop = 0;
          for($i=0;$i<count($pwds);$i++){
            if(password_verify($pwd,$pwds[$i]['pwd'])){
              $this->checkNmakeLog($pwds[$i]['cid']);
            }else{
              $loop++;
            }
          }
          if($loop == $i){
            echo json_encode(['status'=>false,'data'=>[],'msg'=>'invalid credentials']);
          }else{
            echo json_encode(['status'=>false,'data'=>[],'msg'=>'Something went wrong, Contact Admin !']);
          }
          exit;
        }else{
          echo json_encode(['status'=>false,'data'=>[],'msg'=>'Name or Email or Mobile or CID not found']);
        }
      }else{
        echo json_encode(['status'=>false,'data'=>[],'msg'=>$flag['msg']]);
      }
    }

    public function checkNmakeLog($cid){
      $addLog = $this->cusMdl->addCustomerLog($cid);
      if($addLog['status'] == 'success'){
        if(isset($_COOKIE['uid'])){
          setcookie('uid','',time() - 3600,"/");
          setcookie('uid',$addLog['uid'],time() + (86400 * 30),"/");
         }else{
          setcookie('uid',$addLog['uid'],time() + (86400 * 30),"/");
         }
         echo json_encode(['status'=>true,'data'=>[],'msg'=>'Successfully logged in.']);
      }else{
        echo json_encode(['status'=>false,'data'=>[],'msg'=>'Err in making log']);
      }
      exit;//FLOW END
    }

}


?>