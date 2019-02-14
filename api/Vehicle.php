<?php
/**
 * Created by IntelliJ IDEA.
 * User: slash
 * Date: 7/24/18
 * Time: 12:31 PM
 */

require_once 'business/impl/VehicleBOImpl.php';

header("Content-Type: application/json");

$method = $_SERVER["REQUEST_METHOD"];

$VehicleBO= new VehicleBOImpl();

switch ($method) {

    case "GET":
        $action = $_GET["action"];

        switch ($action) {
            case "count":
                echo json_encode($VehicleBO->getVehicleCount());
                break;
            case "all":
                echo json_encode($VehicleBO->getAllVehicles());
                break;

        }

        break;


    case "POST":
        $action = $_POST["action"];
     echo $action;
        switch ($action) {
            case "save" :
                $vehicle_Id = $_POST["txtvehicleID"];
                $vehicle_no = $_POST["txtvehicleNo"];
                $type = $_POST["txtvehicleType"];
                $location = $_POST["txtlocation"];

                echo json_encode($VehicleBO->saveVehicles($vehicle_Id, $vehicle_no, $type, $location));

                break;

            case "update" :

                $vehicle_Id = $_POST["txtvehicleID"];
                $vehicle_no = $_POST["txtvehicleNo"];
                $type = $_POST["txtvehicleType"];
                $location = $_POST["txtlocation"];


                echo json_encode($VehicleBO->updateVehicles($vehicle_Id, $vehicle_no, $type, $location));


                break;
        }

            case "DELETE":
                $queryString = $_SERVER["QUERY_STRING"];
                $queryArray = preg_split("/=/", $queryString);

                if (count($queryArray) == 2) {
                    $id = $queryArray[1];
                    echo json_encode($VehicleBO->deleteVehicles($vehicle_Id));


                }
                break;


        }


