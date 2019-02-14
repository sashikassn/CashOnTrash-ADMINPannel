<?php
/**
 * Created by IntelliJ IDEA.
 * User: slash
 * Date: 7/24/18
 * Time: 7:34 AM
 */
require_once __DIR__ . '/../VehicleRepository.php';

class VehicleRepositoryImpl implements VehicleRepository

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

    public function saveVehicle($vehicle_Id,$vehicle_no,$type,$location)
    {
      $result = $this->connection->query("INSERT INTO vehicle VALUES ('{$vehicle_Id}','{$vehicle_no}','{$type}','{$location}'");
      echo $this->connection->error;
      return ($result && ($this->connection->affected_rows>0));
    }

    public function updateVehicle($vehicle_Id,$vehicle_no,$type,$location)
    {
        $result = $this->connection->query("UPDATE vehicle SET vehicle_no='{$vehicle_no}',type='{$type}',location='{$location}' WHERE vehicle_Id='{$vehicle_Id}'");
        echo $this->connection->error;
        return ($result && ($this->connection->affected_rows>0));
    }

    public function deleteVehicle($vehicle_Id)
    {
        $result = $this->connection->query("DELETE from vehicle WHERE vehicle_Id='{$vehicle_Id}'");
        return ($result && ($this->connection->affected_rows>0));
    }

    public function findVehicle($vehicle_Id)
    {
       $resultset = $this->connection->query("SELECT * FROM vehicle WHERE vehicle_Id='{$vehicle_Id}'");
       return $resultset->fetch_assoc();
    }

    public function findAllVehicle()
    {
       $resultset = $this->connection->query("SELECT * FROM vehicle");
       return $resultset->fetch_all(MYSQLI_ASSOC);

    }
}


