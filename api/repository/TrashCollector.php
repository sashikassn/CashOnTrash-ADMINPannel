<?php
/**
 * Created by IntelliJ IDEA.
 * User: ranjith-suranga
 * Date: 7/20/18
 * Time: 3:41 PM
 */

interface TrashCollector
{

    public function setConnection(mysqli $connection);

    public function saveTrashCollector($user_Id,$name,$telephone);

    public function updateTrashCollector($user_Id,$name,$telephone);

    public function deleteTrashCollector($user_Id);

    public function findTrashCollector($user_Id);

    public function findAllTrashCollector();

}