<?php

require_once __DIR__ . "/../Controller/commonController.php"; //COMMON CONTOLLER

class homeController extends commonController
{

    public function __construct()
    {
        //init
    }
    /**
     * Execute the corresponding action.
     *
     */
    public function run($action)
    {
        switch ($action) {
            case "index":
                $this->index(); //DONE
                break;
            default:
                $this->index(); //DONE
                break;
        }
    }

    public function index()
    {
        $this->view("index", array(
            "title" => "Employees"
        ));
    }


}


?>