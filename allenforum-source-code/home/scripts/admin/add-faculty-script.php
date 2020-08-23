<?php
/**
 * Created by PhpStorm.
 * User: acer
 * Date: 10/3/2017
 * Time: 8:01 PM
 * Purpose: To add single faculty at one time
 */
include "../../config/config.php";

if (isset($_POST['addFaculyBtn'])){


    $faculty_name = $_POST['faculty_name'];
    $faculty_email =  $_POST['faculty_email'];// this is also user_id
    $faculty_pass  =  $_POST['faculty_pass'];
    $faculty_contact = $_POST['faculty_contact'];
    $faculty_dept = $_POST['faculty_department'];
    $role = "faculty";

    /*
     * Generate the ID of faculty
     */
    $rowCountFaculty = mysql_num_rows(mysql_query("select * from forum_users where role = '$role' "));
    $faculty_id = 'f'.$rowCountFaculty;

    $faculty_profile     = $_FILES['faculty_profile']['name'];
    $faculty_profileTmp  = $_FILES['faculty_profile']['tmp_name'];


    if (empty($faculty_profile)){
         $defaultImage = "ownImages/faculty/profile/faculty.png"; /* this path of image will send to database if
         profile pic is not availble*/
        $add_faculty = "insert into forum_users(name,user_email,user_id,user_pass,user_contact,department,role,profile_pic)
        VALUES ('".$faculty_name."','".$faculty_email."','".$faculty_id."',
        '".$faculty_pass."','".$faculty_contact."','".$faculty_dept."','".$role."','".$defaultImage."')";

    }
    else{
        // defile directory to move image
        $directory = "../../ownImages/faculty/profile/".$faculty_profile;
       $image_result =  move_uploaded_file($faculty_profileTmp,$directory);
       if (!$image_result){
           die("image cant move to destination".mysql_error());
       }

        // and final accessible path oa image
        $profile_image_path = "ownImages/faculty/profile/".$faculty_profile;


        $add_faculty = "insert into forum_users(name,user_email,user_id,user_pass,user_contact,department,role,profile_pic)
     VALUES ('".$faculty_name."','".$faculty_email."','".$faculty_id."',
     '".$faculty_pass."','".$faculty_contact."','".$faculty_dept."','".$role."','".$profile_image_path."')";

    }
    $run = mysql_query($add_faculty) or die(" faculty not added ".mysql_error());
    if ($run){
        header('Location:../../view-faculties.php?action=faculty-added-successfully');
    }

}

/*------------------------------upload facuty sheet with excel---------------------------------------*/
if (isset($_POST['addFacultyWithCSVBtn'])){

    $faculty_excel_sheet = $_FILES['facultySheet']['name'];
    $file_sheet_tmpname  = $_FILES['facultySheet']['tmp_name'];


    $getExtensionOfFile = pathinfo($faculty_excel_sheet,PATHINFO_EXTENSION); // i.e .CSV we have
    $allowedType = array('csv');
    if (!in_array($getExtensionOfFile, $allowedType)) {
        echo "File is not valid";

    }else
    {
        $handle = fopen($file_sheet_tmpname,'r');
        while (($facultyData = fgetcsv($handle,'1000',',')) !== false)
        {

            $faculty_name    = $facultyData[0];
            $faculty_email   = $facultyData[1];
            $faculty_pass    = $facultyData[2];
            $faculty_contact = $facultyData[3];
            $faculty_dept    = $facultyData[4];
            $faculty_id      = $faculty_email;
            $faculty_profile = "ownImages/faculty/profile/faculty.png"; // by default
            $role = "faculty";

            $add_faculty_with_sheet = "insert into forum_users(name,user_email,user_id,user_pass,
            user_contact,department,role,profile_pic) VALUES ('".$faculty_name."','".$faculty_email."','".$faculty_id."',
            '".$faculty_pass."','".$faculty_contact."','".$faculty_dept."','".$role."','".$faculty_profile."')";

            mysql_query($add_faculty_with_sheet) or die("failed to insert".mysql_error());

        }
        header('Location:../../view-faculties.php?action=faculty-added-successfully');

    }
}

?>