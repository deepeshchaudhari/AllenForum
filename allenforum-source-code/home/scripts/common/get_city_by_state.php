<?php
include "../../../config/configuration.php";

$state =  $_POST['state'];

$getCity = $connection->query("select city_name from
  forum_city_state WHERE state_name = '$state' ");

if ($getCity->num_rows > 0){

    while ($row = $getCity->fetch_object()){
        echo "<option value='{$row->city_name}'>$row->city_name</option>";
    }
} else{
    echo "<option>City Not Found</option>";
}



?>
