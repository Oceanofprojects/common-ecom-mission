<?php
define("CONTROLLER_DEFAULT", "home");
define("DEFAULT_ACTION", "index");

define('PHP_TIMESTAMP', date('Y-m-d H:i:s'));
define('PHP_CURRENTDATE', date('Y-m-d'));


// Dsiplay Error 
define('DEBUG',true);



define('CC_GLOBAL_SERIVE_KEY',[/*'pf',*/ 'st','dtdc','indp']);
//Courier details
define('COURIER', [
    'ST_CC' => [
        'SERVICE' => 'ST_CC',
        'PRICE' => 70,
        'LABEL' => 'ST Couriers'
    ],
    'PROFESSIONAL_CC' => [
        'SERVICE' => 'PROFESSIONAL_CC',
        'PRICE' => 100,
        'LABEL' => 'Professional Couriers'
    ],
    'DTDC' => [
        'SERVICE' => 'DTDC',
        'PRICE' => 80,
        'LABEL' => 'Dtdc'
    ],
    'INDIA_POST' => [
        'SERVICE' => 'INDIA_POST',
        'PRICE' => 70,
        'LABEL' => 'India post'
    ]
]);//Default service
define('DEFAULT_COURIER_SERVICE', 'ST_CC');//Default charge


//Payment options
define('ONLINE_PAYMENT_CHARGE',1);
define('PAYMENT_ENV','test');

?>