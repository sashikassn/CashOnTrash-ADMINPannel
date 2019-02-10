<?php
/**
 * Created by IntelliJ IDEA.
 * User: ranjith-suranga
 * Date: 7/20/18
 * Time: 3:58 PM
 */

require_once __DIR__ . '/../TrashCollectorBO.php';
require_once __DIR__ . '/../../repository/impl/TrashCollectorImpl.php';
require_once __DIR__ . '/../../db/DBConnection.php';

class TrashCollectorBOImpl implements TrashCollectorBO
{

    private $TrashCollectorRepository;

    public function __construct()
    {
        $this->TrashCollectorRepository = new TrashCollectorImpl();
    }

    public function getTrashCollectorCount()
    {
        $connection = (new DBConnection())->getConnection();
        $this->TrashCollectorRepository->setConnection($connection);

        $count =  count($this->TrashCollectorRepository->findAllTrashCollector());

        mysqli_close($connection);

        return $count;
    }

    public function getAllTrashCollector()
    {

        $connection = (new DBConnection())->getConnection();
        $this->TrashCollectorRepository->setConnection($connection);

        $doctors = $this->TrashCollectorRepository->findAllTrashCollector();

        mysqli_close($connection);

        return $doctors;
    }

    public function deleteTrashCollector($user_Id)
    {

        $connection = (new DBConnection())->getConnection();
        $this->TrashCollectorRepository->setConnection($connection);

        $result = $this->TrashCollectorRepository->deleteTrashCollector($user_Id);

        mysqli_close($connection);

        return $result;
    }

    public function saveTrashCollector($user_Id, $name, $telephone)
    {
        $connection = (new DBConnection())->getConnection();
        $this->TrashCollectorRepository->setConnection($connection);

        $result = $this->TrashCollectorRepository->saveTrashCollector($user_Id, $name, $telephone);

        mysqli_close($connection);
        return $result;
    }

    public function updateTrashCollector($user_Id, $name, $telephone)
    {
        $connection = (new DBConnection())->getConnection();
        $this->TrashCollectorRepository->setConnection($connection);

        $result= $this->TrashCollectorRepository->updateTrashCollector($user_Id, $name, $telephone);

        mysqli_close($connection);

        return $result;
    }
}