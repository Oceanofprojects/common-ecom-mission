<?php

require_once __DIR__ . "/../Controller/commonController.php"; //COMMON CONTOLLER



class spacesetting extends commonController
{

    public function __construct()
    {
        $this->validateResults = []; //init for auto validate looping arr in commonController.php
    }

    public function business_info(){
        return [
      "business"=>[
          "name"=>"Blossomcorner",
          "slogan"=>"Show your love for nature",
          "whatsapp"=>9042580928,
          "phone"=>9042580928,
          "address"=>"No 48, Hospital street, Ramanathapuram, Thondamanatham post",
          "city"=>"Puducherry",
          "pincode"=>"605502",
          "google_map_location"=>"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3886.7986291841326!2d80.20490457420618!3d13.048486113189687!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a5266c25648d6c5%3A0xf3ce2da2a246c00d!2sForum%20mall%2C%20SH%20113%2C%20Ottagapalayam%2C%20Kannika%20Puram%2C%20Vadapalani%2C%20Chennai%2C%20Tamil%20Nadu%20600026!5e0!3m2!1sen!2sin!4v1696065491315!5m2!1sen!2sin"
      ],
      "social_media"=>[
          "whatsapp"=>9042580928,
          "instagram"=>"#",
          "facebook"=>"#",
          "twitter"=>"#",
          "youtube"=>"#",
          "mail"=>"blossomcorner3609@gmail.com"
      ],
      "owner"=>[
          "name"=>"Shyamala",
          "whatsapp"=>9042580928,
          "phone"=>9042580928
      ]
  ];
  
      }

}


?>