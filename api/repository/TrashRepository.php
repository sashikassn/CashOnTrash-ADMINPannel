<?php
/**
 * Created by IntelliJ IDEA.
 * User: slash
 * Date: 7/29/18
 * Time: 8:11 AM
 */

interface TrashRepository
{
    public function setConnection(mysqli $connection);

    public function saveTrash($trash_type,$weight,$value);

    public function updateTrash($trash_type,$weight,$value);

    public function deleteTrash($trash_type);

    public function findTrash($trash_type);

    public function findAllTrash();
}