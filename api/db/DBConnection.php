<?php
/**
 * Created by IntelliJ IDEA.
 * User: ranjith-suranga
 * Date: 7/20/18
 * Time: 3:35 PM
 */

class DBConnection
{
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $port = 3306;
    private $database = "cash_on_trash";

    private $connection;

    public function __construct()
    {
        $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database, $this->port);
        if ($this->connection->connect_errno) {
            echo $this->connection->connect_error;
            die;
        }
    }

    public function getConnection()
    {
        return $this->connection;
    }

}