<?php

interface VehicleRepository{
    public function setConnection(mysqli $connection);

    public function saveVehicle($vehicle_Id,$vehicle_no,$type,$location);

    public function updateVehicle($vehicle_Id,$vehicle_no,$type,$location);

    public function deleteVehicle($vehicle_Id);

    public function findVehicle($vehicle_Id);

    public function findAllVehicle();
}