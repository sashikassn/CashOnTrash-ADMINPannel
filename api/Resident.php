<?php
/**
 * Created by IntelliJ IDEA.
 * User: slash
 * Date: 7/26/18
 * Time: 7:05 AM
 */


require_once 'business/impl/ResidentBOImpl.php';
header("Content-Type: application/json");

$method = $_SERVER["REQUEST_METHOD"];


$ResidentBO = new ResidentBOImpl();

switch ($method) {
    case "GET":
        $action = $_GET["action"];



        switch ($action){
            case "count":
                echo json_encode($ResidentBO->getResidentCount());
                break;

            case "all":
                echo json_encode($ResidentBO->getAllResident());
                break;

        }

        break;


    case "POST":
        $action = $_POST["action"];
        switch ($action){

            case "save":
                $user_Id = $_POST["txtuserid"];
                $name = $_POST["txtname"];
                $address = $_POST["txtaddress"];
                $telephone = $_POST["txttelephone"];
                $level = $_POST["txtlevel"];
                $points = $_POST["txtpoint"];

                echo json_encode($ResidentBO->saveResident($user_Id,$name,$address,$telephone,$level,$points));
                break;

            case "update":
                $user_Id = $_POST["txtuserid"];
                $name = $_POST["txtname"];
                $address = $_POST["txtaddress"];
                $telephone = $_POST["txttelephone"];
                $level = $_POST["txtlevel"];
                $points = $_POST["txtpoint"];

                echo json_encode($ResidentBO->updateResident($user_Id,$name,$address,$telephone,$level,$points));
                break;

        }

    case "DELETE":
        $queryString = $_SERVER["QUERY_STRING"];
        $queryArray = preg_split("/=/",$queryString);

        if (count($queryArray)==2){
            $user_Id =$queryArray[1];
            echo json_encode($ResidentBO->deleteResident($user_Id));


        }
        break;
}