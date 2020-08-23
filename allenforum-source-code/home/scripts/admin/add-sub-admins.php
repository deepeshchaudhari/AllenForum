<?php
include "../../../config/session_header.php";
include "../../../config/configuration.php";

if (isset($_POST['addSubAdminsBtn']))
{

    $adminName     = $_POST['admin_name'];
    $adminEmail    = $_POST['admin_email'];
    $adminContact  = $_POST['admin_contact'];
    $adminDept     = $_POST['admin_dept'];
    $adminPass     = $_POST['admin_pass'];
    $adminProfile  = $_FILES['admin_profile']['name'];
    $adminProfileTmp  = $_FILES['admin_profile']['tmp_name'];

    $role =  'admin';

    $queryResult = $connection->query("select * from forum_users where role = '$role' ");
    $rowCountAdmin = $queryResult->num_rows;
    $admin_id = 'admin'.$rowCountAdmin;

    if (empty($adminProfileTmp)){
        $profile_image_path = "";
        $addAdmins = "INSERT INTO forum_users 
        (user_email,user_id,user_pass,name,role,user_program,department,user_contact,profile_pic,block)
        VALUES ('".$adminEmail."','".$admin_id."','".$adminPass."','".$adminName."','".$adminDept."',
        '".$adminDept."','".$adminDept."','".$adminContact."','".$profile_image_path."','1')  ";
    } else{
        // defile directory to move image
        $directory = "../../ownImages/admin/profile/".$adminProfile;
        $image_result =  move_uploaded_file($adminProfileTmp,$directory);
        if (!$image_result){
            die("image cant move to destination".mysql_error());
        }

        // and final accessible path oa image
        $profile_image_path = "ownImages/admin/profile/".$adminProfile;

        $addAdmins = "INSERT INTO forum_users 
        (user_email,user_id,user_pass,name,role,user_program,department,user_contact,profile_pic,block)
        VALUES ('".$adminEmail."','".$admin_id."','".$adminPass."','".$adminName."','".$adminDept."',
        '".$adminDept."','".$adminDept."','".$adminContact."','".$profile_image_path."','1')  ";
    }
    $addAdminsResult = $connection->query($addAdmins);
    if ($addAdminsResult){
        header("Location:../../manage-admins.php?status=admin added successfully");
    } else{
        die("Something error in query execution::".$connection->error);
    }


}