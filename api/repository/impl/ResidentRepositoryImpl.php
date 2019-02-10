<?php
/**
 * Created by IntelliJ IDEA.
 * User: slash
 * Date: 7/26/18
 * Time: 6:12 AM
 */

require_once __DIR__ . '/../ResidentRepository.php';


class ResidentRepositoryImpl implements ResidentRepository
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

    public function saveResident($user_Id,$name,$address,$telephone,$level,$points)
    {
        $result = $this->connection->query("INSERT INTO residents VALUES ('{$user_Id}','{$name}','{$address}','{$telephone}','{$level}','{$points}')");

        echo $this->connection->error;
        return ($result && ($this->connection->affected_rows > 0));
    }

    public function updateResident($user_Id,$name,$address,$telephone,$level,$points)
    {
        $result = $this->connection->query("UPDATE residents set name='{$name}', address='{$address}',telephone='{$telephone}',level='{$level}',points='{$points}' WHERE user_Id='{$user_Id}'");
        echo $this->connection->error;
        return ($result && ($this->connection->affected_rows > 0));

    }

    public function deleteResident($user_Id)
    {
       $result = $this->connection->query("DELETE FROM residents WHERE user_Id='{$user_Id}'");
        return ($result && ($this->connection->affected_rows>0));
    }

    public function findResident($user_Id)
    {
        $resultset = $this->connection->query("SELECT * FROM residents WHERE user_Id='{$user_Id}'");
        return $resultset->fetch_assoc();
    }

    public function findAllResident()
    {
        $resultset = $this->connection->query("SELECT * FROM residents");
        return $resultset->fetch_all(MYSQLI_ASSOC);
    }
}