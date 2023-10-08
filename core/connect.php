<?php
class Connect
{
    private $driver;
    private $host, $user, $pass, $database, $charset;
    public function __construct()
    {
        $db_cfg = require_once __DIR__.'/../Config/database.php'; //EDITED
        $this->driver = DB_DRIVER;
        $this->host = DB_HOST;
        $this->user = DB_USER;
        $this->pass = DB_PASS;
        $this->database = DB_DATABASE;
        $this->charset = DB_CHARSET;
    }
    public function Connection()
    {
        $con = $this->driver . ':host=' . $this->host . ';dbname=' . $this->database . ';charset=' . $this->charset;
        try {
            $connection = new PDO($con, $this->user, $this->pass);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $connection; //return Connection
        } catch (PDOException $e) {
            //We throw the exception
            throw new Exception('Problem establishing the connection.');
        }
    }
}
?>