<?php

require_once __DIR__ . "/../Controller/commonController.php"; //COMMON CONTOLLER



class spacesetting extends commonController
{

    public function __construct()
    {
        $this->validateResults = []; //init for auto validate looping arr in commonController.php
    }

    // public function trigger_whts_notify($id=0){
    //     $update_cc_url = 'https://test.com/index.php?controller=admin&key=f76543c3830696dbcdb775d38ebe9b6a763086d2a86be47c449c7b5a55f8d3e9';
    //     $params=array(
    //         'token' =>'yvvvaffvramlnxn2',
    //         'to' => '+918939068212',
    //         'body' => '*New order from our customer* \n
    //             ID : '.$id.',\n
    //             Update CC Price : '.$update_cc_url.',\n
    //             - Bot '
    //         );
    //     $curl = curl_init();
    //     curl_setopt_array($curl, array(
    //     CURLOPT_URL => "https://api.ultramsg.com/instance71197/messages/chat",
    //     CURLOPT_RETURNTRANSFER => true,
    //     CURLOPT_ENCODING => "",
    //     CURLOPT_MAXREDIRS => 10,
    //     CURLOPT_TIMEOUT => 30,
    //     CURLOPT_SSL_VERIFYHOST => 0,
    //     CURLOPT_SSL_VERIFYPEER => 0,
    //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //     CURLOPT_CUSTOMREQUEST => "POST",
    //     CURLOPT_POSTFIELDS => http_build_query($params),
    //     CURLOPT_HTTPHEADER => array(
    //         "content-type: application/x-www-form-urlencoded"
    //     ),
    //     ));

    //     $response = curl_exec($curl);
    //     $err = curl_error($curl);

    //     curl_close($curl);
    

    //     // if ($err) {
    //     // //  echo "cURL Error #:" . $err;
    //     // } else {
    //     //   $res =json_decode($response,true);
    //     // }
    // }

    public function business_info(){
        return [
      "business"=>[
          "name"=>"Green Garden",
          "slogan"=>"Elysian maker",
          "whatsapp"=>1234567890,
          "phone"=>1234567890,
          "address"=>"Test address 1, sans akns akmns akm skas",
          "city"=>"Chennai",
          "pincode"=>"600044",
          "google_map_location"=>"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3886.7986291841326!2d80.20490457420618!3d13.048486113189687!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a5266c25648d6c5%3A0xf3ce2da2a246c00d!2sForum%20mall%2C%20SH%20113%2C%20Ottagapalayam%2C%20Kannika%20Puram%2C%20Vadapalani%2C%20Chennai%2C%20Tamil%20Nadu%20600026!5e0!3m2!1sen!2sin!4v1696065491315!5m2!1sen!2sin"
      ],
      "social_media"=>[
          "whatsapp"=>1234567890,
          "instagram"=>"#",
          "facebook"=>"#",
          "twitter"=>"#",
          "youtube"=>"#",
          "mail"=>"test@gmail.com"
      ],
      "owner"=>[
          "name"=>"Test name",
          "whatsapp"=>1234567890,
          "phone"=>1234567890
      ]
  ];
  
      }

}


?>