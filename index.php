<?php
require_once 'config/global.php';

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
        // case 'employees':
        //     require_once 'controller/employeesController.php';
        //     $controllerObj = new EmployeesController();
        //     break;
        default:
            require_once 'controller/homeController.php';
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