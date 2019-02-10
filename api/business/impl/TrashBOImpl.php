<?php
/**
 * Created by IntelliJ IDEA.
 * User: slash
 * Date: 7/29/18
 * Time: 8:06 AM
 */

require_once __DIR__ . '/../TrashBO.php';
require_once __DIR__ . '/../../repository/impl/TrashRepositoryImpl.php';
require_once __DIR__ . '/../../db/DBConnection.php';


class TrashBOImpl implements TrashBO
{
        private $TrashRepository;

        public function __construct()
        {
            $this->TrashRepository = new TrashRepositoryImpl();
        }

    public function getTrashCount()
    {
      $connection = (new DBConnection())->getConnection();
      $this->TrashRepository->setConnection($connection);

      $count = count($this->TrashRepository->findAllTrash());
      mysqli_close($connection);
      return $count;
    }

    public function getAllTrash()
    {
        $connection = (new DBConnection())->getConnection();
        $this->TrashRepository->setConnection($connection);

        $reports = $this->TrashRepository->findAllTrash();

        mysqli_close($connection);
        return $reports;
    }

    public function deleteTrash($trash_type)
    {
        $connection = (new DBConnection())->getConnection();
        $this->TrashRepository->setConnection($connection);

        $result = $this->TrashRepository->deleteTrash($trash_type);
        mysqli_close($connection);
        return $result;
    }

    public function saveTrash($trash_type,$weight,$value)
    {
        $connection = (new DBConnection())->getConnection();
        $this->TrashRepository->setConnection($connection);

        $result = $this->TrashRepository->saveTrash($trash_type,$weight,$value);
        mysqli_close($connection);
        return $result;

    }

    public function updateTrash($trash_type,$weight,$value)
    {
        $connection = (new DBConnection())->getConnection();
        $this->TrashRepository->setConnection($connection);

        $result = $this->TrashRepository->updateTrash($trash_type,$weight,$value);
        mysqli_close($connection);
        return $result;

    }

    public function findTrash($trash_type)
    {
        $connection = (new DBConnection())->getConnection();
        $this->TrashRepository->setConnection($connection);

        $result = $this->TrashRepository->findTrash($trash_type);
        mysqli_close($connection);
        return $result;

    }
}