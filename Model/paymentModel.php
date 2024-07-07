<?php


require_once __DIR__ . '/../Model/customerModel.php';

class rayzorPayMdl extends customer
{
    public $db;
    public $key;
    public $secret;
    public $auth;
    public $mode;
    public $prdMdl;
    public $paysdk;
    public function __construct()
    {
        parent::__construct();

		require __DIR__.'../../pay/rpay/Razorpay.php';

        if (isset($_COOKIE['uid'])) {
            $cflag = $this->getUserId($_COOKIE['uid']);
            if ($cflag[0]) {
                $this->cid = $cflag[1];
                require_once __DIR__ . '/../Model/productModel.php';
                $this->prdMdl = new products();
            }
        } else {
            die('Unauth user please login !.');
        }

        $this->mode = PAYMENT_ENV;//set ENV
        if ($this->mode == 'test') {
            $this->key = 'rzp_test_dLar8Yj5rx9pzZ'; //Your Test Key
            $this->secret = 'PVksEdKHwymDV2QS4L87uaNm'; //Your Test Secret Key
            $this->auth = "Basic " . base64_encode($this->key . ":" . $this->secret);
        } else if ($this->mode == 'prod') {
            $this->key = 'xxxxxxxxxxxxxxxxxxxxxxxx'; //Your Prod Key
            $this->secret = 'xxxxxxxxxxxxxxxxxxxxxxxxxxxx'; //Your Prod Secret Key
            $this->auth = "Basic " . base64_encode($this->key . ":" . $this->secret);
        }

        $this->paysdk = new Razorpay\Api\Api($this->key, $this->secret);

    }

    public function make_payment_info($id, $pay_data = [])
    {
        if (!is_array($pay_data) || count($pay_data) == 0) {
            echo json_encode(['flag' => false, 'res' => 'false', 'data' => [], 'message' => 'pay ini info missing !']);
            exit;
        }

        $info = $this->getUserInfoById($id);
        if ($info['status']) {
            $info = $info['data'][0];
        } else {
            return $info;
        }
        $paymentOption = 'paymentOption';
        $payAmount = $pay_data['payment'] * 100;
        $info['order_id'] = $pay_data['order_id'];
        $note = "Payment of amount Rs. " . $pay_data['payment'];

        $postdata = array(
            "amount" => $payAmount,
            "currency" => "INR",
            "receipt" => $note,
            "notes" => array(
                "notes_key_1" => $note,
                "notes_key_2" => [
                    'oid' => $pay_data['order_id'],
                    'courier_id' => $pay_data['cc_id'],
                    'courier' => $pay_data['cc_label'],
                    'payment' => $pay_data['payment'],
                    'off_price' => $pay_data['off_price'],
                    'cc_price' => $pay_data['cc_price'],
                    'product_price' => $pay_data['product_price'],
                    'online_payment_charge' => $pay_data['online_charge']
                ]
            )
        );

        $this->make_payment_order($postdata, $info);
    }

    public function make_payment_order($postdata, $customer_data)
    {
        $curl = curl_init();
        curl_setopt_array(
            $curl,
            array(
                CURLOPT_URL => 'https://api.razorpay.com/v1/orders',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => json_encode($postdata),
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json',
                    'Authorization:' . $this->auth
                ),
            )
        );

        $response = curl_exec($curl);

        curl_close($curl);

        $orderRes = json_decode($response);
        if (isset($orderRes->id)) {
            $rpay_order_id = $orderRes->id;
            $dataArr = array(
                'amount' => $postdata['amount'],
                'description' => "Pay bill of Rs. " . $postdata['amount'],
                'rpay_order_id' => $rpay_order_id,
                'name' => $customer_data['c_name'],
                'email' => $customer_data['email'],
                'mobile' => $customer_data['ph_num']
            );
            echo json_encode(['flag' => true, 'res' => 'success', 'order_number' => $customer_data['order_id'], 'userData' => $dataArr, 'razorpay_key' => $this->key]);
            exit;
        } else {
            echo json_encode(['flag' => false, 'res' => 'error', 'data' => [], 'order_id' => $customer_data['order_id'], 'message' => 'Error with payment']);
            exit;
        }
    }

    public function capturePaymentDetail()
    {
        if ($this->cid == null) {
            echo json_encode(['status' => false, 'data' => [], 'message' => 'UnAuth user, Please login !']);
            exit;
        } else {
            // Get payment details
            if (isset($_REQUEST['oid']) && isset($_REQUEST['rp_payment_id']) && isset($_REQUEST['rp_signature']) && empty($_REQUEST['rp_signature']) && empty($_REQUEST['rp_payment_id']) && empty($_REQUEST['oid'])) {
                echo json_encode(['status' => false, 'data' => [], 'message' => 'Some params missing ! for IPN']);
                exit;
            } else {
                $paymentId = $_REQUEST['rp_payment_id'];
                $sign = $_REQUEST['rp_signature'];

                $oid = $_REQUEST['oid'];
                // $data = $res->notes->notes_key_2;
                $data = [
                    'oid' => $oid,
                    'courier_id' => 'pf',
                    'courier' => 'Professional courier',
                    'payment' => 1212,
                    'product_price' => 100,
                    'online_payment_charge' => 2
                ];

                $res = $this->paysdk->payment->fetch($paymentId);
                $courier_id = $data['courier_id'];
                $rp_oid = $data['oid'];
                $payment = $data['payment'];
                $courier = $data['courier'];
                $online_payment_charge = $data['online_payment_charge'];
                $product_price = $data['product_price'];
                // print_r($res);exit;
                if ($paymentId == $res->id && $oid == $rp_oid) {
                    $arr = [
                        'tbl_name' => 'payment_info',
                        'action' => 'insert',
                        'data' => ["cid=$this->cid", "order_id=$oid", "courier_id=$courier_id", "courier=$courier", "product_price= $product_price", "saving_price=0", "online_payment_price=$online_payment_charge", "payment=$payment", "payment_id=$paymentId", "payment_signature=$sign", "created_at=" . PHP_TIMESTAMP],
                        'query-exc' => true
                    ];
                    $flag = $this->generateQuery($arr);
                    if ($flag['status'] == 'success') {
                        $cart_date = date('Y-m-d');
                        $checkout_flag = $this->prdMdl->checkout();
                        if ($checkout_flag['status']) {//if all product aval
                            $upPrds_flag = $this->prdMdl->updateCusPrdWTOrPrd($checkout_flag['upt_qnty']);
                            if ($upPrds_flag['status']) {
                                //CREATE NEW ORDER
                                $createOrder = $this->prdMdl->createNewOrder($rp_oid, $paymentId, date('Y-m-d'), $checkout_flag['product_detail']);
                                if ($createOrder['status']) {
                                    //DISABLE CART EDIT OPTION
                                    if ($this->prdMdl->changeCcReqAccess()) {
                                        if ($this->prdMdl->disableCartEdit(implode(',', $checkout_flag['ids']), $cart_date)) {
                                            echo json_encode(['status' => true, 'data' => $createOrder['data'], 'message' => "Your order successfully Pleaced. You will track your order status in "]);
                                            exit;
                                            //END OF CART PROCCESS
                                        } else {
                                            echo json_encode(['status' => false, 'data' => [], 'message' => "Oops, Something went wrong,(Err in final)"]);
                                            exit;
                                        }//END OF CART PROCCESS
                                    } else {
                                        echo json_encode(['status' => false, 'data' => [], 'message' => "Oops, Something went wrong, Update CC req"]);
                                        exit;
                                    }
                                } else {
                                    echo json_encode(['status' => false, 'data' => [], 'message' => 'Oops, Something went wrong, (Err in Create order)']);
                                    exit;
                                }
                                //					CREATE ORDER END
                            } else {
                                echo json_encode($upPrds_flag);
                                exit;//IF FAILED. update QNT with original product
                            }
                        } else {
                            echo json_encode($checkout_flag);
                            exit;
                        }

                    } else {
                        echo json_encode(['status' => false, 'data' => [], 'message' => 'IPN capture failed!']);
                        exit;
                    }
                } else {
                    echo json_encode(['status' => false, 'data' => [], 'message' => 'Invalid params for IPN']);
                    exit;
                }

            }

        }
    }

    public function get_payment_info($payment_id = 0){
        return  $this->paysdk->payment->fetch($payment_id);
    }


}//class END

?>