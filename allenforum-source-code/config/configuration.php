<?php
/*
 * This is the configuration file
 * that will need the username and password of server
 * and database name
 * hostname = 'localhost'
 * root = 'username'
 * then pasword,
 * and then database name
 */
 
 //error_reporting(0);

global $connection;
//$connection = new mysqli("localhost","meraproj_allen","allenforum@meraproject","meraproj_allenforum");
$connection = new mysqli("localhost","root","","allenforum");
if (!$connection){
    die("some error in connection establishment,Error : ".$connection->connect_error);
}
date_default_timezone_set('Asia/Kolkata');

set_time_limit(1000); //

