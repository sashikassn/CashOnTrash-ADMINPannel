<?php
/**
 * Created by IntelliJ IDEA.
 * User: slash
 * Date: 7/25/18
 * Time: 8:48 AM
 */

interface ResidentBO
{


    public function getResidentCount();

    public function getAllResident();

    public function deleteResident($user_Id);

    public function saveResident($user_Id,$name,$address,$telephone,$level,$points);

    public function updateResident($user_Id,$name,$address,$telephone,$level,$points);


}