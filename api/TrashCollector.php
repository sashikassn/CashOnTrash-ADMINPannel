<?php
/**
 * Created by IntelliJ IDEA.
 * User: ranjith-suranga
 * Date: 7/20/18
 * Time: 3:08 PM
 */

require_once 'business/impl/TrashCollectorBOImpl.php';

header("Content-Type: application/json");

$method = $_SERVER["REQUEST_METHOD"];

$TrashCollectorBO = new TrashCollectorBOImpl();

switch ($method) {
    case "GET":
        $action = $_GET["action"];

        switch ($action) {
            case "count":
                echo json_encode($TrashCollectorBO->getTrashCollectorCount());
                break;
            case "all":
                echo json_encode($TrashCollectorBO->getAllTrashCollector());
                break;
        }

        break;
    case "POST":
        $action = $_POST["action"];
//       echo $action;
        switch ($action) {
            case "save" :
                $userid = $_POST["txtId"];
                $name = $_POST["txtName"];
                $telephone = $_POST["txtTelephone"];
                echo json_encode($TrashCollectorBO->saveTrashCollector($userid, $name, $telephone));
                break;

            case "update" :

                $userid = $_POST["txtId"];
                $name = $_POST["txtName"];
                $telephone = $_POST["txtTelephone"];

                echo json_encode($TrashCollectorBO->updateTrashCollector($userid, $name, $telephone));


                break;
        }
    case "DELETE":
        $queryString = $_SERVER["QUERY_STRING"];
        $queryArray = preg_split("/=/", $queryString);
        if (count($queryArray) === 2) {
            $id = $queryArray[1];
            echo json_encode($TrashCollectorBO->deleteTrashCollector($userid));
        }
        break;
}