<?php

require_once __DIR__.'/Config/global.php';
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
