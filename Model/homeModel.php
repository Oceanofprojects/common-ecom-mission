<?php

require_once __DIR__ . "/../Model/commonModel.php"; //COMMON CONTOLLER
require_once __DIR__ . "/../Connection/dbConnection.php";

class Employee extends commonModel
{
    private $table = "`employee_details`";
    public $connection;

    public function __construct()
    {
        $this->connect = new connect();
        $this->connection = $this->connect->connection();
    }
}
?>