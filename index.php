<?php




require_once __DIR__.'/Config/global.php';

session_start();


if(DEBUG){
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(1);
}
if (isset($_GET["controller"])) {
    $controllerObj = loadController($_GET["controller"]);
    launchAction($controllerObj);
} else {
    $controllerObj = loadController(CONTROLLER_DEFAULT);
    launchAction($controllerObj);
}

function loadController($controller)
{
    switch ($controller) {
        case 'product':
            require_once __DIR__.'/Controller/productController.php';
            $controllerObj = new productController();
            break;
        case 'customer':
            require_once __DIR__.'/Controller/customerController.php';
            $controllerObj = new customerController();
            break; 
        case 'admin':
            require_once __DIR__.'/Controller/adminController.php';
            $controllerObj = new adminController();
            break;      
        case 'payment':
            require_once __DIR__.'/Controller/paymentController.php';
            $controllerObj = new paymentController();
            break;             
        case 'home':
            // require_once __DIR__.'/Controller/homeController.php';
            // $controllerObj = new homeController();
            // break;      
        default:
            require_once __DIR__.'/Controller/homeController.php';
            $controllerObj = new homeController();
            break;
    }
    return $controllerObj;
}


function launchAction($controllerObj)
{
    if (isset($_GET["action"])) {
        $controllerObj->run($_GET["action"]);
    } else {
        $controllerObj->run(DEFAULT_ACTION);
    }
}



?>
