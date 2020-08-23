<?php
/*
 * File Name : Students.php
 * Class File
 */
class Students{
    function getStudentProfileDetails($connection,$userId){

        $query = $connection->query("SELECT fs.id as userId,fs.student_roll,fu.user_email as student_email,
fs.student_name ,fs.student_contact ,fc.course_name,fd.department_name , fs.student_profile,fs.student_year,fs.about_me,fs.my_college as current_college FROM forum_users fu left join forum_student 
 fs on fu.id=fs.user_id LEFT JOIN forum_courses fc ON fs.student_program=fc.id LEFT JOIN forum_departments
  fd on fs.student_department=fd.id WHERE fs.id = '$userId' ") or die("Error:".$connection->error);
        return $query;
    }

    function updateStudentProfile($connection,$name,$college,$course,$department,$year,$description,$profilePicName,$contact,$userId){
        $query = "UPDATE  forum_student SET student_name='$name',student_year='$year',student_program='$course',student_department='$department',student_contact='$contact',student_profile='$profilePicName',about_me='$description',my_college='$college' WHERE id='$userId' ";
        $result = $connection->query($query);
        return $result;
    }
    function getStudentListToShareQuestion($connection){
        $students = $connection->query("SELECT DISTINCT fu.id as user_id,fs.student_name as name,fu.user_email,fs.student_profile as profile_pic FROM forum_questions fq LEFT JOIN forum_student fs on fq.asked_by=fs.id LEFT JOIN forum_users fu on fs.user_id=fu.id ");
        if ($students->num_rows > 0){
            return $students;
        } else{
            return $connection->error;
        }
    }


    /*
     * Student Profile Experiences Add/Edit/delete
     */
    function addEditStudentExperience($connection,$title,$position,$description,$userId,$profileExpAction,$editExpId){
        if ($profileExpAction == 'add'){
            $query = "INSERT INTO  forum_student_proexp SET user_id='$userId',title='$title',description='$description',position='$position' ";
        }
        else if ($profileExpAction == 'edit'){
           if ($editExpId){
               $query = "UPDATE forum_student_proexp SET title='$title',description='$description',position='$position' WHERE  user_id='$userId' AND id='$editExpId' ";
           }
        }
        $result = $connection->query($query);
        return $result;
    }

    function getStudentExperienceListByUserId($connection,$userId){
        $query = "SELECT * FROM forum_student_proexp WHERE user_id='$userId' ";
        $result = $connection->query($query);
        return $result;
    }
    function getStudentExpDetailsByExpId($connection,$experienceId,$userId){
        $query = "SELECT * FROM forum_student_proexp WHERE id='$experienceId' AND user_id='$userId' ";
        $result = $connection->query($query);
        return $result;

    }

    /*
     * delete student Experience from allenforum
     */
    function deleteStudentExperience($connection,$experienceId,$userId){
        $query = "DELETE FROM forum_student_proexp WHERE id='$experienceId' AND user_id='$userId' ";
        $result = $connection->query($query);
        return $result;
    }




    /*
     * about student Education/Schooling  Add/Edit/delete
     */

    function saveStudentSchooling($connection,$userId,$collegeName,$qualification,$startYear,$completionYear,$collegeAddress,$workAction,$editSchoolingId){
        if ($workAction == "add"){
            $query = "INSERT INTO  forum_student_pro_edu SET userId='$userId',collegeName='$collegeName',qualification='$qualification',startYear='$startYear',completionYear='$completionYear',collegeAddress='$collegeAddress'  ";
        } else if ($workAction == "edit"){
            if ($editSchoolingId){
                $query = "UPDATE forum_student_pro_edu SET collegeName='$collegeName',qualification='$qualification',startYear='$startYear',completionYear='$completionYear',collegeAddress='$collegeAddress' WHERE userId='$userId' AND id='$editSchoolingId' ";
            }
        }
        $result = $connection->query($query);
        return $result;
    }

    function getStudentSchoolingListByUserId($connection,$userId){
        $query = "SELECT * FROM forum_student_pro_edu WHERE userId='$userId' ";
        $result = $connection->query($query);
        return $result;
    }

    function getSchoolingDetailBySchId($connection,$schoolingId,$userId){
        $query = "SELECT * FROM forum_student_pro_edu WHERE id='$schoolingId' AND userId='$userId' ";
        $result = $connection->query($query);
        return $result;
    }

    function deleteStudentSchooling($connection,$schoolingId,$userId){
        $query = "DELETE FROM forum_student_pro_edu WHERE id='$schoolingId' AND userId='$userId' ";
        $result = $connection->query($query);
        return $result;
    }




}// class