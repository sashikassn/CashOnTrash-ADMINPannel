<?php
/**
 * Created by IntelliJ IDEA.
 * User: slash
 * Date: 7/24/18
 * Time: 7:07 AM
 */

require_once __DIR__ . '/../VehicleBO.php';
require_once __DIR__ . '/../../repository/impl/VehicleRepositoryImpl.php';
require_once  __DIR__ . '/../../db/DBConnection.php';


Class VehicleBOImpl implements VehicleBO {

    private $VehicleRepository;

    public function __construct()
    {

        $this->VehicleRepository = new VehicleRepositoryImpl();

    }


    public function getVehicleCount()
    {
        $connection = (new DBConnection())->getConnection();
        $this->VehicleRepository->setConnection($connection);

        $count = count($this->VehicleRepository->findAllVehicle());

        mysqli_close($connection);
        return $count;

    }

    public function getAllVehicles()
    {
    $connection = (new DBConnection())->getConnection();
    $this->VehicleRepository->setConnection($connection);

    $patients = $this->VehicleRepository->findAllVehicle();

    mysqli_close($connection);
    return $patients;
    }

    public function deleteVehicles($vehicle_Id)
    {
       $connection = (new DBConnection())->getConnection();
       $this->VehicleRepository->setConnection($connection);

       $result = $this->VehicleRepository->deleteVehicle($vehicle_Id);
       mysqli_close($connection);
       return $result;
    }

    public function saveVehicles($vehicle_Id,$vehicle_no,$type,$location)
    {
        $connection = (new DBConnection())->getConnection();
        $this->VehicleRepository->setConnection($connection);

        $result = $this->VehicleRepository->saveVehicle($vehicle_Id,$vehicle_no,$type,$location);
        mysqli_close($connection);
        return $result;

    }

    public function updateVehicles($vehicle_Id,$vehicle_no,$type,$location)
    {
        $connection = (new DBConnection())->getConnection();
        $this->VehicleRepository->setConnection($connection);

        $result = $this->VehicleRepository->updateVehicle($vehicle_Id,$vehicle_no,$type,$location);
        mysqli_close($connection);
        return $result;
    }
}