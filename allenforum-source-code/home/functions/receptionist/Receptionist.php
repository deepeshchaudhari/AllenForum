<?php
/**
 * Created by PhpStorm.
 * User: acer
 * Date: 3/17/2018
 * Time: 11:01 PM
 */
/*
 * File Name : Receptionist.php
 * Class File
 */
class Receptionist
{
    function getReceptionistDetails($connection,$receptionist_id){
        $query = $connection->query("SELECT * FROM forum_users WHERE id = '$receptionist_id' ") or die("Error:".$connection->error);
        return $query;
    }
}