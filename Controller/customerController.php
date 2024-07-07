<?php

require_once __DIR__ . "/../Controller/commonController.php"; //COMMON CONTOLLER
require ('Lib/form/class.form_plate.php');



class customerController extends commonController
{

  public $form_plate;

  public $validateResults;
  public function __construct()
  {
    //init
    require_once __DIR__ . "/../Model/customerModel.php";

    //Form object
    $this->form_plate = new form();


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
    if (isset($_GET['key'])) {
      $req['key'] = $_GET['key'];
    } else {
      die('Invalid token');
    }

    if (hash_equals(hash_hmac($algo, 'signup', $skey), $req['key'])) {
      if (isset($_GET)) {
        $this->form_plate->form_type = 'signin_form';
        $plate_list = $this->form_plate->validate_form_field($_GET);
        if (is_array($plate_list)) {
          $this->signup($plate_list);
        } else {
          echo json_encode(['status' => false, 'data' => [], 'msg' => $plate_list]);
        }
      }
    } else if (hash_equals(hash_hmac($algo, 'updateSetting', $skey), $req['key'])) {
      echo json_encode($this->editAccount());
    } else if (hash_equals(hash_hmac($algo, 'userlogin', $skey), $req['key'])) {
      if (isset($_GET)) {
        $this->form_plate->form_type = 'login_form';
        $plate_list = $this->form_plate->validate_form_field($_GET);
        if (is_array($plate_list)) {
          $this->login($plate_list['cus_idnty'], $plate_list['pwd']);
        } else {
          echo json_encode(['status' => false, 'data' => [], 'msg' => $plate_list]);
        }
      }
    } else if (hash_equals(hash_hmac($algo, 'openSetting', $skey), $req['key'])) {
      $this->view("main/setting", array(
        "title" => "Customers Registration Form",
        "data" => $this->cusMdl->getUserInfoById()
      )
      );
    } else if (hash_equals(hash_hmac($algo, 'logout', $skey), $req['key'])) {
      if (setcookie('uid', '', time() - 3600, "/")) {
        echo json_encode(['status' => true, 'data' => [], 'message' => 'Logged out successfully']);
      } else {
        echo json_encode(['status' => false, 'data' => [], 'message' => 'Err in logout']);
      }
    } else {
      //invalid tokenuserlogin
    }
  }

  public function signup($signin_param)
  {
    $validateArgs = [
      ['c_name', 'check', 'isStr'],
      ['c_name', 'check', 'isNotEmpty'],
      ['ph_num', 'check', 'isNotEmpty'],
      ['ph_num', 'checkLengthMust', 10],
      ['email', 'check', 'isEmail'],
      ['address_1', 'check', 'isNotEmpty'],
      ['city', 'check', 'isNotEmpty'],
      ['state', 'check', 'isNotEmpty'],
      ['pin_code', 'check', 'isNotEmpty'],
      ['pwd', 'check', 'isConPwd'],
      ['pwd', 'check', 'isPwd'],
      ['remove', 'auto_remove']
    ]; //VALIDATE CONDITIONS ARGS

    $flag = $this->autoValidate($signin_param, $validateArgs)[0];
    if ($flag['status']) {
      $userState = $this->cusMdl->saveCustomer($signin_param);
      if ($userState['status'] == 'success') {
        $this->checkNmakeLog($userState['cid']);
      } else {
        echo json_encode(['status' => false, 'data' => [], 'msg' => $userState['msg']]);
      }
    } else {
      echo json_encode($flag);
    }
  }

  public function editAccount()
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
      ['city', 'check', 'isNotEmpty']
    ]; //VALIDATE CONDITIONS ARGS

    $flag = $this->autoValidate($_GET, $validateArgs)[0];
    if ($flag['status']) {
      return $this->cusMdl->editAccount($_GET);
    } else {
      return $flag;
    }
  }

  public function login($idnty, $pwd)
  {
    $loginURL = 'index.php?key=f01f773c6da80db08b2b3150fe2f0dcdb68ab5d8c0caa5fa9517e75b7896fdc3&controller=home';
    $flag = $this->cusMdl->getCusListByIdnty($idnty);//getting user info
    if ($flag['status'] == 'success') {
      if (count($flag['data']) !== 0) {
        $pwds = $flag['data'];
        $loop = 0;
        for ($i = 0; $i < count($pwds); $i++) {
          if (password_verify($pwd, $pwds[$i]['pwd'])) {
            if ($pwds[$i]['role'] != 'block') {
              $this->checkNmakeLog($pwds[$i]['cid']);
            } else {
              $err_msg = 'Oops!, This account blocked by admin.';
              //Redirecting with error message.
              header("Location:$loginURL&err_msg=$err_msg");
            }
          } else {
            $loop++;
          }
        }
        if ($loop == $i) {
        $err_msg = 'Invalid credentials';
        //Redirecting with error message.
        header("Location:$loginURL&err_msg=$err_msg");
        } else {
        $err_msg = 'Something went wrong, Contact Admin !';
        //Redirecting with error message.
        header("Location:$loginURL&err_msg=$err_msg");
        }
        exit;
      } else {
        $err_msg = 'Name or Email or Mobile or CID not found';
        //Redirecting with error message.
      header("Location:$loginURL&err_msg=$err_msg");
      }
    } else {
      $err_msg = 'Error found customer !';
      //Redirecting with error message.
      header("Location:$loginURL&err_msg=$err_msg");
    }
  }

  public function checkNmakeLog($cid)
  {
    $addLog = $this->cusMdl->addCustomerLog($cid);
   
    if ($addLog['status'] == 'success') {
      $dd = PHP_CURRENTDATE;
      $arr = [
        'tbl_name' => 'cus_log',
        'action' => 'select',
        'data' => [],
        'condition' => ['manual' => ["uid='$addLog[uid]' AND _date='$dd'"]],
        'query-exc' => true
      ];
      $data = $this->cusMdl->generateQuery($arr);
      if ($data['status'] && count($data['data']) !== 0) {
          setcookie('uid', $addLog['uid'], time() + (86400 * 30), "/");
          $_SESSION['user-data'][$addLog['uid']] = $data['data'][0]['cid'];
          header('Location:index.php?controller=home&key=723502982ca5d2790c1f9464af3613117a3bd4e55ee0a68b6c29ab76d23b71b6');
      } else {
        echo json_encode(['status' => false, 'data' => [], 'msg' => 'UnAnth User. Please login.']);
      }
    } else {
      echo json_encode(['status' => false, 'data' => [], 'msg' => 'Err in making log']);
    }
    exit;//FLOW END
  }

}


?>