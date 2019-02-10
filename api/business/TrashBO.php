<?php
/**
 * Created by IntelliJ IDEA.
 * User: slash
 * Date: 7/29/18
 * Time: 7:54 AM
 */

interface TrashBO
{
    public function getTrashCount();

    public function getAllTrash();

    public function deleteTrash($trash_type);

    public function saveTrash($trash_type,$weight,$value);

    public function updateTrash($trash_type,$weight,$value);

    public function findTrash($trash_type);
}