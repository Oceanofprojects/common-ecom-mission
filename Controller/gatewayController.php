<?php

require_once __DIR__ . "/../Controller/commonController.php"; //COMMON CONTOLLER



class spacesetting extends commonController
{

    public function __construct()
    {
        $this->validateResults = []; //init for auto validate looping arr in commonController.php
    }


}


?>