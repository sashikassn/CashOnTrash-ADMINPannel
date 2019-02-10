<?php
/**
 * Created by IntelliJ IDEA.
 * User: ranjith-suranga
 * Date: 7/20/18
 * Time: 3:42 PM
 */

require_once __DIR__ . '/../TrashCollector.php';

class TrashCollectorImpl implements TrashCollector
{

    private $connection;

    public function __construct()
    {
        $this->connection = (new DBConnection())->getConnection();
    }

    public function setConnection(mysqli $connection)
    {
        $this->connection = $connection;
    }

    public function saveTrashCollector($user_Id,$name,$telephone)
    {
        $salary = 10000;
        $result = $this->connection->query("INSERT INTO trash_collectors VALUES ('{$user_Id}','{$name}','{$telephone}')");
        echo $this->connection->error;
        return ($result && ($this->connection->affected_rows > 0));
    }

    public function updateTrashCollector($user_Id,$name,$telephone)
    {
        $result = $this->connection->query("UPDATE trash_collectors SET name='{$name}', telephone='{$telephone}' WHERE user_Id='{$user_Id}'");
        echo $this->connection->error;
        return ($result && ($this->connection->affected_rows > 0));
    }

    public function deleteTrashCollector($user_Id)
    {
        $result = $this->connection->query("DELETE FROM trash_collectors WHERE user_Id='{$user_Id}'");
        return ($result && ($this->connection->affected_rows > 0));
    }

    public function findTrashCollector($user_Id)
    {
        $resultset = $this->connection->query("SELECT * FROM trash_collectors WHERE user_Id='{$user_Id}'");
        return $resultset->fetch_assoc();
    }

    public function findAllTrashCollector()
    {
        $resultset = $this->connection->query("SELECT * FROM trash_collectors");
        return $resultset->fetch_all(MYSQLI_ASSOC);
    }

}