<?php
/**
 * Created by IntelliJ IDEA.
 * User: slash
 * Date: 7/24/18
 * Time: 7:05 AM
 */

interface VehicleBO{

    public function getVehicleCount();

    public function getAllVehicles();

    public function deleteVehicles($vehicle_Id);

    public function saveVehicles($vehicle_Id,$vehicle_no,$type,$location);

    public function updateVehicles($vehicle_Id,$vehicle_no,$type,$location);


}