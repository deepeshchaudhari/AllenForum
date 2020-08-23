<?php
include "../../../config/session_header.php";
include "../../../config/configuration.php";
if (isset($_POST['addSubAdminsBtn'])){
    $adminId = base64_decode($_POST['adminId']);
    $admin_name = $_POST['admin_name'];
    $admin_email = $_POST['admin_email'];
    $admin_dept = $_POST['admin_dept'];
    $admin_contact = $_POST['admin_contact'];
    $admin_pass = $_POST['admin_pass'];
    $admin_profile_hidden = '';
    $admin_profile_hidden = $_POST['admin_profile_hidden'];
    $admin_profile_tmp = $_FILES['admin_profile']['tmp_name'];
    $admin_profile_name = $_FILES['admin_profile']['name'];
    $moveDirectory = "../../ownImages/admin/profile/";
    $condition = '';

        $profilePicPrev = $admin_profile_hidden;
        if (empty($_FILES['admin_profile']['tmp_name'])){
            $condition = $profilePicPrev;
        } else{
            /* delete old */
            @unlink('../../'.$profilePicPrev);
            move_uploaded_file($admin_profile_tmp,$moveDirectory.$admin_profile_name);
            $profile_image_path = "ownImages/admin/profile/".$admin_profile_name;
            $condition = $profile_image_path;
        }

        $updateQuery="UPDATE forum_users SET name='$admin_name',user_email='$admin_email',
            user_pass='$admin_pass',user_program='$admin_dept',department='$admin_dept',
            user_contact='$admin_contact',profile_pic='$condition' WHERE id=$adminId  ";

        echo $updateQuery;//die();
        $update = $connection->query($updateQuery) or die("Error:".$connection->error);
        $_SESSION['updateStatus'] = 'updated';
        $_SESSION['profile'] = $condition;

      header("Location:../../manage-admins.php?status=admin updated successfully");



}