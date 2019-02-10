<?php
/**
 * Created by IntelliJ IDEA.
 * User: slash
 * Date: 7/25/18
 * Time: 8:50 AM
 */

require_once __DIR__ . '/../ResidentBO.php';
require_once __DIR__ . '/../../repository/impl/ResidentRepositoryImpl.php';
require_once  __DIR__ . '/../../db/DBConnection.php';



class ResidentBOImpl implements ResidentBO
{
    private $ResidentRepository;

    public function __construct()
    {

        $this->ResidentRepository = new ResidentRepositoryImpl();

    }

    public function getResidentCount()
    {
        $connection = (new DBConnection())->getConnection();
        $this->ResidentRepository->setConnection($connection);

        $count = count($this->ResidentRepository->findAllResident());

        mysqli_close($connection);
        return $count;
    }

    public function getAllResident()
    {
        $connection = (new DBConnection())->getConnection();
        $this->ResidentRepository->setConnection($connection);

        $appointments = $this->ResidentRepository->findAllResident();

        mysqli_close($connection);
        return $appointments;
    }

    public function deleteResident($user_Id)
    {
        $connection = (new DBConnection())->getConnection();
        $this->ResidentRepository->setConnection($connection);

        $result = $this->ResidentRepository->deleteResident($user_Id);
        mysqli_close($connection);
        return $result;
    }

    public function saveResident($user_Id,$name,$address,$telephone,$level,$points)
    {
        $connection = (new DBConnection())->getConnection();
        $this->ResidentRepository->setConnection($connection);

        $result = $this->ResidentRepository->saveResident($user_Id,$name,$address,$telephone,$level,$points);
        mysqli_close($connection);
        return $result;
    }

    public function updateResident($user_Id,$name,$address,$telephone,$level,$points)
    {
        $connection = (new DBConnection())->getConnection();
        $this->ResidentRepository->setConnection($connection);

        $result = $this->ResidentRepository->updateResident($user_Id,$name,$address,$telephone,$level,$points);
        mysqli_close($connection);
        return $result;
    }
}