<?php


require 'rpay/Razorpay.php';
session_start();
use Razorpay\Api\Api;
$key='rzp_test_dLar8Yj5rx9pzZ'; //Your Test Key
$sec='PVksEdKHwymDV2QS4L87uaNm'; //Your Test Secret Key

// Create order - cURL
// $postdata=array(
//     "amount"=>10*100,
//     "currency"=> "INR",
//     "receipt"=> 'asd',
//     "notes" =>array(
//                   "notes_key_1"=> 'asd',
//                   "notes_key_2"=> ""
//                   )
//     );
//     $curl = curl_init();
    
//     curl_setopt_array($curl, array(
//       CURLOPT_URL => 'https://api.razorpay.com/v1/orders',
//       CURLOPT_RETURNTRANSFER => true,
//       CURLOPT_ENCODING => '',
//       CURLOPT_MAXREDIRS => 10,
//       CURLOPT_TIMEOUT => 0,
//       CURLOPT_FOLLOWLOCATION => true,
//       CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//       CURLOPT_CUSTOMREQUEST => 'POST',
//       CURLOPT_POSTFIELDS =>json_encode($postdata),
//       CURLOPT_HTTPHEADER => array(
//         'Content-Type: application/json',
//         'Authorization: '."Basic ".base64_encode($key.":".$sec)
//       ),
//     ));
    
//     $response = curl_exec($curl);
    
//     curl_close($curl);
    
//     print_r($response);exit;


//Create order -  SDK
// $api = new Api($key, $sec);
// $postdata=array(
//     "amount"=>10*100,
//     "currency"=> "INR",
//     "receipt"=> 'asd',
//     "notes" =>array(
//                   "notes_key_1"=> 'asd',
//                   "notes_key_2"=> ""
//                   )
//     );
// $razorpayOrder = $api->order->create($postdata);
// $razorpayOrderId = $razorpayOrder['id'];
// $_SESSION['razorpay_order_id'] = $razorpayOrderId;
// $displayAmount = $amount = $orderData['amount'];
// echo "<pre>";
// print_r($razorpayOrder);

// Razorpay\Api\Order Object
// (
//     [attributes:protected] => Array
//         (
//             [amount] => 1000
//             [amount_due] => 1000
//             [amount_paid] => 0
//             [attempts] => 0
//             [created_at] => 1719837632
//             [currency] => INR
//             [entity] => order
//             [id] => order_OTN5BxHn8IGTFG
//             [notes] => Razorpay\Api\Order Object
//                 (
//                     [attributes:protected] => Array
//                         (
//                             [notes_key_1] => asd
//                             [notes_key_2] => 
//                         )

//                 )

//             [offer_id] => 
//             [receipt] => asd
//             [status] => created
//         )

// )


// {
//     "razorpay_payment_id": "pay_OTSAAEqrJVVRiW",
//     "razorpay_order_id": "order_OTS7qia2BJbwpl",
//     "razorpay_signature": "f90767f519e149362837c605c13e2c037cf2d36668f8372b7140f5400325b4a8"
// }
// //Get payment details
// $api = new Api($key, $sec);
// $paymentId = 'pay_OSBN9fO62yZcC1';
// $r = $api->payment->fetch($paymentId);
// echo "<pre>";
// print_r($r);

echo "HEL";
