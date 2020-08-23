<?php
include "../../../config/configuration.php";
include "../../../config/session_header.php";
if (isset($_POST['addReceptionistBtn'])){


    $receptionist_name = $_POST['receptionist_name'];
    $receptionist_email =  $_POST['receptionist_email'];
    $receptionist_pass  =  $_POST['receptionist_pass'];
    $receptionist_contact = $_POST['receptionist_contact'];
    $receptionist_dept = $_POST['receptionist_department'];
    $role = "receptionist";

    /*
     * Generate the ID of faculty
     */
    $queryResult = $connection->query("select * from forum_users where role = '$role' ");
    $rowCountreceptionist = $queryResult->num_rows;
    $receptionist_id = 're'.$rowCountreceptionist;

    $receptionist_profile     = $_FILES['receptionist_profile']['name'];
    $receptionist_profileTmp  = $_FILES['receptionist_profile']['tmp_name'];


    if (empty($receptionist_profile)){
        $defaultImage = "ownImages/reception/profile/receptionist.png"; /* this path of image will send to database if
         profile pic is not availble*/
        $add_receptionist = "insert into forum_users(name,user_email,user_id,user_pass,user_contact,department,role,profile_pic)
        VALUES ('".$receptionist_name."','".$receptionist_email."','".$receptionist_id."',
        '".$receptionist_pass."','".$receptionist_contact."','".$receptionist_dept."',
        '".$role."','".$defaultImage."')";

    }
    else{
        // defile directory to move image
        $directory = "../../ownImages/reception/profile/".$receptionist_profile;
        $image_result =  move_uploaded_file($receptionist_profileTmp,$directory);
        if (!$image_result){
            die("image cant move to destination".mysql_error());
        }

        // and final accessible path oa image
        $profile_image_path = "ownImages/reception/profile/".$receptionist_profile;


        $add_receptionist = "insert into forum_users(name,user_email,user_id,user_pass,user_contact,department,role,profile_pic)
     VALUES ('".$receptionist_name."','".$receptionist_email."','".$receptionist_id."',
     '".$receptionist_pass."','".$receptionist_contact."','".$receptionist_dept."',
     '".$role."','".$profile_image_path."')";

    }
    $run = $connection->query($add_receptionist) or die(" Receptionist could not be added ".mysql_error());
    if ($run){
        header('Location:../../add-receptionist.php?action=receptionist-added-successfully&status=success');
    }

}