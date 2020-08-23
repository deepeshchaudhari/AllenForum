<?php
/*
 * File Name : Admin.php
 * Class File
 */
class Admin
{
    /*
     * Add Students
     */
    function addStudents($connection,$name,$email,$contact,$program,$department,$roll,$year){
        $password = sha1($roll);
        $query = "INSERT INTO forum_users SET user_email='$email',user_pass='$password', user_role='student' ";
        $result = $connection->query($query);
        $studentLoginId = $connection->insert_id;

        $details = $connection->query("INSERT INTO forum_student SET user_id ='$studentLoginId',student_roll='$roll', student_name='$name',student_contact='$contact',student_program='$program',student_department='$department',student_year='$year' ");
        $studentId = $connection->insert_id;
        $connection->query("INSERT INTO  forum_trending SET user_id ='$studentId' ");
        if (! $details){
            echo "Erro:".$connection->error; die();
        }


        if ($query){
            return $result;
        }
    }
    /*
     * Add Faculty
     */
    function addFaculty($connection,$faculty_name,$faculty_email,$faculty_pass,$faculty_contact,$course_program,$department_branch){
        $faculty_pass = sha1($faculty_pass);

        $query = "INSERT INTO forum_users SET user_email='$faculty_email',user_pass='$faculty_pass', user_role='faculty' ";
        $insert = $connection->query($query);
        $facultyId = $connection->insert_id;
        $faculty = $connection->query("INSERT INTO forum_faculty SET user_id='$facultyId',name='$faculty_name',contact='$faculty_contact',program='$course_program',department='$department_branch' ");
        return $faculty;
    }

    /*
     * Add Receptionist
     */
    function addReceptionist($connection,$name,$email,$password,$contact,$dept){
        $password = sha1($password);
        $queryMain = $connection->query("INSERT INTO forum_users SET user_email='$email',user_pass='$password',user_role='receptionist' ");
        $userId = $connection->insert_id;

        $queryDetail = $connection->query("INSERT INTO forum_receptionist set user_id='$userId',name='$name',contact='$contact',department='$dept' ");
        return $queryDetail;
    }


    function getAdminDetails($connection,$admin_id){
        $query = $connection->query("SELECT fu.user_email,fa.name,fa.contact,fa.profile FROM forum_users fu left join forum_admin fa on fu.id=fa.user_id WHERE fu.id = '$admin_id' ") or die("Error:".$connection->error);
        return $query;
    }
    function getAdminProfileDetails($connection,$adminId){
        $query = $connection->query("SELECT fa.name as admin_name,fa.contact as admin_contact,fa.profile,fu.user_email as admin_email,fu.user_pass as admin_pass,fa.profile as admin_profile FROM forum_admin fa LEFT JOIN forum_users fu ON fa.user_id=fu.id WHERE fu.id='$adminId'");
        return $query;
    }

    /*
     * Add Librarian
     */
    function saveLibrarianDetails($connection,$librarian_name,$librarian_email,$librarian_pass,$librarian_contact,$librarian_department,$manageLibrarianAction){
        $librarian_pass = sha1($librarian_pass);
        if ($manageLibrarianAction == "add"){
            $queryMain = $connection->query("INSERT INTO forum_users SET user_email='$librarian_email',user_pass='$librarian_pass',user_role='librarian' ");
            $userId = $connection->insert_id;
            $queryDetails = "INSERT INTO  forum_librarian SET user_id='$userId',name='$librarian_name',contact='$librarian_contact',department='$librarian_department' ";
            $queryDetailResult = $connection->query($queryDetails);

        }

        return $queryDetailResult;
    }

    /*
     * Upload Students With Sheet
     */

    function uploadStudentSheet($connection,$studentRoll,$studentName,$studentEmail,$studentContact,$studentCourse,$studentDepartment,$studentYear){
        $studentPassword = sha1($studentRoll);
        $role = "student";
        $mainQuery = "INSERT INTO  forum_users SET user_email='$studentEmail',user_pass='$studentPassword',user_role='$role'";
        $result1 = $connection->query($mainQuery) or die("Error in main Query".$connection->error);
        $studentLoginId = $connection->insert_id;

        $details = "INSERT INTO forum_student SET user_id='$studentLoginId',student_roll='$studentRoll',student_name='$studentName',student_program='$studentCourse',student_department='$studentDepartment',student_contact='$studentContact',student_year='$studentYear' ";
        $result2 = $connection->query($details)  or die("Error in details Query".$connection->error);
        $studentId  = $connection->insert_id;

        $queryTrending = "INSERT INTO forum_trending SET user_id='$studentId' ";
        $result3 = $connection->query($queryTrending);
        if ($result3){
            return $result3;
        }
    }

    /*
     * Upload Faculty Sheets
     */

    function uploadFacultySheet($connection,$facultyName, $facultyEmail, $facultyContact, $facultyCourse, $facultyDepartment){
        $facultyPassword = sha1("12345678");
        $role = "faculty";
        $mainQuery = "INSERT INTO  forum_users SET user_email='$facultyEmail',user_pass='$facultyPassword',user_role='$role'";
        $result1 = $connection->query($mainQuery) or die("Error in main Query".$connection->error);
        $facultyLoginId = $connection->insert_id;

        $details = "INSERT INTO  forum_faculty SET user_id='$facultyLoginId',name='$facultyName',program='$facultyCourse',department='$facultyDepartment',contact='$facultyContact' ";
        $result2 = $connection->query($details)  or die("Error in details Query".$connection->error);
        if ($result2){
            return $result2;
        }

    }

    /*
     * get Admin dashboard counts
     */

    function getAdminDahboardCount($connection){
        $students = 0;
        $faculties = 0;
        $receptionist = 0;
        $librarian=0;
        $studentQuery = $connection->query("SELECT COUNT(*) as totalStudents FROM forum_student fs LEFT JOIN forum_users fu ON fs.user_id=fu.id WHERE fu.user_role='student'");
        if($studentQuery->num_rows > 0){
            $students = $studentQuery->fetch_object()->totalStudents;
        }
        $facultyQuery = $connection->query("SELECT COUNT(*) as totalFaculties FROM  forum_faculty ff LEFT JOIN forum_users fu ON ff.user_id=fu.id WHERE fu.user_role='faculty'");
        if($facultyQuery->num_rows > 0){
            $faculties = $facultyQuery->fetch_object()->totalFaculties;
        }
        $receptionistQuery = $connection->query("SELECT COUNT(*) as totalReceptionist FROM  forum_receptionist fr LEFT JOIN forum_users fu ON fr.user_id=fu.id WHERE fu.user_role='receptionist'");
        if($receptionistQuery->num_rows > 0){
            $receptionist = $receptionistQuery->fetch_object()->totalReceptionist;
        }
        $librarianQuery = $connection->query("SELECT COUNT(*) as totalLibrarian FROM  forum_librarian fl LEFT JOIN forum_users fu ON fl.user_id=fu.id WHERE fu.user_role='librarian'");
        if($librarianQuery->num_rows > 0){
            $librarian = $librarianQuery->fetch_object()->totalLibrarian;
        }

        return array(
            'studentCount'      => $students,
            'facultyCount'      => $faculties,
            'receptionistcount' => $receptionist,
            'librarianCount'    => $librarian,
        );
    }

    /*
     * update admin profile
     */

    function saveAdminProfile($connection,$admin_name,$admin_email,$newPassword,$admin_contact,$adminProfilePic,$adminLoginId,$adminId)
    {
        $query = "UPDATE forum_admin SET name='$admin_name',contact='$admin_contact',profile='$adminProfilePic',department='admin' WHERE id='$adminId'";
        if ($newPassword != ""){
            $newPassword = sha1($newPassword);
            $query2 = "UPDATE  forum_users SET user_pass = '$newPassword', user_email='$admin_email' WHERE id='$adminLoginId' ";
            $result2 = $connection->query($query2) or die("Error in password updation query".$connection->error);
        }
        $result = $connection->query($query) or die("Error in profile updation query".$connection->error);
        return $result;
    }

    /*
     * generate Allenforum reports
     */

    /* get total discussion post */
    function generateDiscussionAndShareReport($connection)
    {
        $query = "SELECT fs.student_name,fq.title as discussion_title,fq.to_whome,fd.department_name,
fq.total_like,fq.share_status,fq.q_date_time FROM forum_questions fq LEFT JOIN forum_student 
fs ON fq.asked_by=fs.id LEFT JOIN forum_departments fd ON fq.department=fd.id";
       // echo $query;
        $result = $connection->query($query);
        if ($result){
            return $result;
        }
    }

    /* get total notes uploaded */

    function generateTotalNotesUploadedReport($connection)
    {
        $query = "SELECT fnu.notes_title,fnu.notes_category,fs.student_name as uploader_name,fd.department_name,fc.course_name,fs.student_year as year,fnu.uploaded_on FROM forum_notes_upload fnu LEFT JOIN forum_student fs ON fnu.uploaded_by=fs.user_id LEFT JOIN forum_departments fd ON fs.student_department=fd.id LEFT JOIN forum_courses fc ON fs.student_program = fc.id";
        $result = $connection->query($query);
        if ($result){
            return $result;
        }
    }

    /* get total contribution post */
    function generateTotalContributionPostReport($connection)
    {
        $query = "SELECT fcp.post_title,fcp.postedByUserType,fcp.posted_for,fcp.posted_on FROM forum_contribution_post fcp";
        $result = $connection->query($query);
        if ($result)
        {
            return $result;
        }
    }

    /* get everything including trending */
    function generateReportofEachData($connection)
    {
        $query = "SELECT fs.student_roll,fs.student_name,fs.student_year,fc.course_name,fd.department_name, ft.* FROM forum_trending ft LEFT JOIN forum_student fs ON ft.user_id=fs.id LEFT JOIN forum_courses fc ON fs.student_program=fc.id LEFT JOIN forum_departments fd ON fs.student_department=fd.id";
        $result = $connection->query($query);
        if ($result)
        {
            return $result;
        }
    }






}// class