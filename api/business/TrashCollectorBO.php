<?php
/**
 * Created by IntelliJ IDEA.
 * User: ranjith-suranga
 * Date: 7/20/18
 * Time: 3:58 PM
 */

interface TrashCollectorBO
{

    public function getTrashCollectorCount();

    public function getAllTrashCollector();

    public function deleteTrashCollector($user_Id);

    public function saveTrashCollector($user_id,$name,$telephone);

    public function updateTrashCollector($user_id,$name,$telephone);

}