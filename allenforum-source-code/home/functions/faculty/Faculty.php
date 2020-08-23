<?php
/**
 * Created by PhpStorm.
 * User: Porus
 * Date: 28-Apr-18
 * Time: 9:15 AM
 */
/*
 * File Name : Faculty.php
 * Class File
 */
class Faculty
{
    function addOfficialPost($connection,$postedFor,$officialPostTitle,$officialPostText,$userID,$userRole){
        $postedOn = date('Y-m-d H:i:s');
            $query = "INSERT INTO  forum_officials_post SET to_whome='$postedFor',subject='$officialPostTitle',official_post='$officialPostText',posted_by='$userID',date_time='$postedOn',posted_role='$userRole'  ";

        $result = $connection->query($query);
        return $result;
    }
    function editOfficialPost($connection,$postedFor,$officialPostTitle,$officialPostText,$userID,$userRole,$editPostId){
        $postedOn = date('Y-m-d H:i:s');
        $query = "UPDATE forum_officials_post SET to_whome='$postedFor',subject='$officialPostTitle',official_post='$officialPostText',date_time='$postedOn'  WHERE posted_by='$userID' and id='$editPostId' ";
        $result = $connection->query($query) or die ("Error in query".$connection->error);
        return $result;

    }
    function getAllOfficialPosts($connection){
        $post_official = "SELECT fop.*,ff.name,ff.profile FROM forum_officials_post fop LEFT JOIN forum_faculty ff  ON fop.posted_by=ff.id" ;
        $result = $connection->query($post_official);
        return $result;
    }
    function getOfficialPostDetailByPostId($connection,$postId,$postedBy){
        $getPost = $connection->query("SELECT * FROM  forum_officials_post WHERE id = '$postId' AND posted_by = '$postedBy' ")
        or  die("Error in checking".$connection->error);
        return $getPost;
    }
    function getFacultyDetailsToEdit($connection,$userId){
        $query = "SELECT * FROM  forum_faculty WHERE id='$userId'";
        $result = $connection->query($query);
        return $result;
    }
    function saveFacultyProfile($connection,$facultyName,$facultyEmail,$facultyContact,$faculyProfileName,$newPassword,$program,$department,$emailPersmission,$userId,$loginId){
        $query = "UPDATE forum_faculty SET name='$facultyName',contact='$facultyContact',program='$program',department='$department',emailSms='$emailPersmission',profile='$faculyProfileName' WHERE id='$userId'";
        if ($newPassword != ""){
            $newPassword = sha1($newPassword);
            $query2 = "UPDATE  forum_users SET user_pass = '$newPassword' WHERE id='$loginId' AND user_email='$facultyEmail' ";
            $result2 = $connection->query($query2) or die("Error in password updation query".$connection->error);
        }
        $result = $connection->query($query) or die("Error in profile updation query".$connection->error);
        return $result;
    }

    function getFacultyProfileDetails($connection,$facultyId) {
        $query = "SELECT ff.id,ff.name as facultyName, fu.user_email as facultyEmail,ff.contact as facultyContact,ff.profile as facultyProfile,ff.emailSms,fc.course_name AS facultyProgram,
fd.department_name as facultyDepartment FROM forum_faculty ff LEFT JOIN forum_users fu ON ff.user_id=fu.id 
LEFT JOIN forum_courses fc ON ff.program=fc.id LEFT JOIN forum_departments fd ON ff.department=fd.id WHERE ff.id='$facultyId'";
        $result = $connection->query($query);
        return $result;
    }


}