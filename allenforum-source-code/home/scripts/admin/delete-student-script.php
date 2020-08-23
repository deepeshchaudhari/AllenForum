<?php
/**
 * Created by PhpStorm.
 * User: acer
 * Date: 10/3/2017
 * Time: 12:48 AM
 * Purpose : To delete multiple student with checkbox
 *
 */
include "../../../config/config.php";
if (isset($_POST['deleteStudentBtn'])){
$coutChecked  =count($_POST['studentDeleteCheckBox']);
$i = 0;
while ( $i<$coutChecked){

    $recordsToDelete = $_POST['studentDeleteCheckBox'][$i];

    $deleteStudents = mysql_query("DELETE FROM forum_users WHERE  user_id = '$recordsToDelete' AND role = 'student' ")
    or die("could not delete the students".mysql_error());

    $i++;

    }
    header('Location:../../view-students.php?action=delete&status=deleted_successfully');
}