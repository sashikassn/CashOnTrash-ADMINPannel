<?php
/**
 * Created by IntelliJ IDEA.
 * User: slash
 * Date: 7/29/18
 * Time: 7:53 AM
 */

require_once 'business/impl/TrashBOImpl.php';
header("Content-Type: application/json");

$method = $_SERVER["REQUEST_METHOD"];

$TrashBO = new TrashBOImpl();

switch ($method) {
    case "GET":
        $action = $_GET["action"];


            switch ($action){
                case "count":
                    echo json_encode($TrashBO->getTrashCount());
                    break;

                case "all":
                    echo json_encode($TrashBO->getAllTrash());
                    break;

                case "findbyid":
                    $trash_type= $_GET["id"];
                    echo json_encode($TrashBO->findTrash($trash_type));
                    break;

            }
            break;


    case "POST":
        $action = $_POST["action"];

        switch ($action){

            case "save":
                $trash_type = $_POST["txttrashtype"];
                $weight = $_POST["txtweight"];
                $value = $_POST["txtvalue"];

                echo json_encode($TrashBO->saveTrash($trash_type,$weight,$value));
                break;


            case "update":
                $trash_type = $_POST["txttrashtype"];
                $weight = $_POST["txtweight"];
                $value = $_POST["txtvalue"];

                echo json_encode($TrashBO->saveTrash($trash_type,$weight,$value));
                break;

        }



    case "DELETE":
        $queryString = $_SERVER["QUERY_STRING"];
        $queryArray = preg_split("/=/",$queryString);

        if (count($queryArray)==2) {
            $trash_type = $queryArray[1];
            echo json_encode($TrashBO->deleteTrash($trash_type));
        }

        break;
}
