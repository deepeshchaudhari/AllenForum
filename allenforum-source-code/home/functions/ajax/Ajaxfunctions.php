<?php
/**
 * Created by PhpStorm.
 * User: kc
 * Date: 1/9/2019
 * Time: 1:50 PM
 */

class Ajaxfunctions
{
    public function saveRegistration($connection,$studentName,$roll,$course_program,$department_branch,$student_year,$useremail,$userpassword,$role)
    {
        $query = "INSERT INTO forum_users SET user_email='$useremail',user_pass='$userpassword',user_role='$role' ";
        $result = $connection->query($query) or  die("Errorn in query1".$connection->error);
        $loginId = $connection->insert_id;

        $query2 = "INSERT INTO forum_student SET user_id='$loginId',student_roll='$roll',student_name='$studentName',student_year='$student_year',
student_program='$course_program',student_department='$department_branch' ";

        $result = $connection->query($query2) or  die("Errorn in query2".$connection->error);
        return $result;

    }
}