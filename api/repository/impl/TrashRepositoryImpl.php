<?php
/**
 * Created by IntelliJ IDEA.
 * User: slash
 * Date: 7/29/18
 * Time: 8:12 AM
 */

require_once __DIR__ . '/../TrashRepository.php';

class TrashRepositoryImpl implements TrashRepository
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

    public function saveTrash($trash_type,$weight,$value)
    {
        $result = $this->connection->query("INSERT INTO trash VALUES ('{$trash_type}','{$weight}','{$value}')");
        echo $this->connection->error;
        return ($result && ($this->connection->affected_rows>0));
    }

    public function updateTrash($trash_type,$weight,$value)
    {
        $result = $this->connection->query("UPDATE trash SET weight='{$weight}', value='{$value}' WHERE trash_type='{$trash_type}'");
            echo $this->connection->error;
            return ($result && ($this->connection->affected_rows>0));
    }

    public function deleteTrash($trash_type)
    {
        $result = $this->connection->query("DELETE FROM trash WHERE trash_type='{$trash_type}'");
        return ($result && ($this->connection->affected_rows>0));

    }

    public function findTrash($trash_type)
    {
       $resultset = $this->connection->query("SELECT * from trash WHERE trash_type='{$trash_type}'");
       return $resultset->fetch_assoc();
    }

    public function findAllTrash()
    {
        $resultset = $this->connection->query("SELECT * FROM trash");
        return $resultset->fetch_all(MYSQLI_ASSOC);
    }
}