<?php
/**
 * Created by PhpStorm.
 * User: acer
 * Date: 10/3/2017
 * Time: 8:01 PM
 */
include "../../config/config.php";
if (isset($_POST['deleteFacultyBtn'])){
    $countFaculty = count($_POST['facultyDeleteCheckBox']);// how many  checkbox checked for delete
    $i = 0;
    while ($i<$countFaculty){
        $faculty_id  = $_POST['facultyDeleteCheckBox'][$i];

        mysql_query("DELETE from forum_users where id =  '$faculty_id' ")
        or die("could not delete faculty".mysql_error());
        $i++;
    }

    header('Location:../../view-faculties.php?action=delete&status=deleted');
}