<?php
/**
 * Created by IntelliJ IDEA.
 * User: slash
 * Date: 7/26/18
 * Time: 6:07 AM
 */

interface ResidentRepository
{
    public function setConnection(mysqli $connection);

    public function saveResident($user_Id,$name,$address,$telephone,$level,$points);

    public function updateResident($user_Id,$name,$address,$telephone,$level,$points);

    public function deleteResident($user_Id);

    public function findResident($user_Id);

    public function findAllResident();

}