<?php
/*
 * File Name : admin-ajax-request.php
 * Ajax Request File
 */
include "../../../config/session_header.php";
include "../../../config/configuration.php";
include_once "../mailer/Mailer.php";
include_once "../sms/SendSms.php";
include_once "Admin.php";
$admin  = new Admin();
$mailer = new Mailer();
$sms = new SendSms();

/*
 * Add Students
 */
if (isset($_POST['student']) == 'addStudent'){
    $name = $_POST['name'];
    $email = $_POST['email'];
 //   $password = $_POST['password'];
    $contact = $_POST['contact'];
    $program = $_POST['program'];
    $department = $_POST['department'];
    $roll = $_POST['roll'];
    $year = $_POST['year'];

    $addStudent = $admin->addStudents($connection,$name,$email,$contact,$program,$department,$roll,$year);
    $mailer->confirmationEmailToFacultyStudents($name,$email,$roll);

       /* $mobileNumber= $contact;
        $message="Hi ".$name." You have become the part of Allenforum here are your login details"."<br/>";
        $message .= "Email :".$email;
        $message .= "Password:".$roll;
        $senderId="DEMOOS";
        $serverUrl="msg.msgclub.net";
        $authKey="73f4988241a4ac6cadbe0e2d471879c";
        $route="1";
        @$sms->sendsmsPOST($mobileNumber,$senderId,$route,$message);*/

    if ($addStudent){
        echo 'Student Added !';
    }
}
/*
 * Add Faculty
 */
if (isset($_POST['faculty']) == 'addFaculty'){
    $faculty_name = $_POST['faculty_name'];
    $faculty_email = $_POST['faculty_email'];
    $faculty_pass = $_POST['faculty_pass'];
    $faculty_contact = $_POST['faculty_contact'];
    $course_program = $_POST['course_program'];
    $department_branch = $_POST['department_branch'];

    $addFaculty = $admin->addFaculty($connection,$faculty_name,$faculty_email,$faculty_pass,$faculty_contact,$course_program,$department_branch);
    $mailer->confirmationEmailToFacultyStudents($faculty_name,$faculty_email,$faculty_pass);

    if ($addFaculty){
        echo 'Faculty Added';
    }
}

/*
 * Add Receptionist
 */

if(isset($_POST['addReceptionist']) == 'addReceptionist'){
    $receptionist_name = $_POST['receptionist_name'];
    $receptionist_email = $_POST['receptionist_email'];
    $receptionist_pass = $_POST['receptionist_pass'];
    $receptionist_contact = $_POST['receptionist_contact'];
    $receptionist_department = $_POST['receptionist_department'];
    $saveReceptionist = $admin->addReceptionist($connection,$receptionist_name,$receptionist_email,$receptionist_pass,$receptionist_contact,$receptionist_department);
    $mailer->confirmationEmailToReceptionistLibrarian($receptionist_name,$receptionist_email,$receptionist_pass,'Receptionist');
    if ($saveReceptionist){
        echo 'test^reseptionistadded';
    }
}



/*
 * edit Admin ProfileeditAdmin
 */
if (isset($_POST['editAdmin']) == "EditAdminProfile"){
    $adminId = $_POST['adminId'];
    $adminDetail = $admin->getAdminProfileDetails($connection,$adminId);
    if ($adminDetail->num_rows > 0) {
        $adminDetails = $adminDetail->fetch_object();
        $adminName = $adminDetails->admin_name;
        $adminEmail = $adminDetails->admin_email;
        $adminPassword = $adminDetails->admin_pass;
        $adminContact = $adminDetails->admin_contact;
        $adminProfile = $adminDetails->admin_profile;
        echo 'test^'.$adminName.'^'.$adminEmail.'^'.$adminPassword.'^'.$adminContact.'^'.$adminProfile;
    }
}


/*
 * update finally admin profile
 */

if (isset($_POST['actionUpdateAdminProfile']) == 'actionUpdateAdminProfile'){
  //  echo 'here !'; die();
    $admin_name = $_POST['adminName'];
    $admin_email = $_POST['adminEmail'];
    $admin_password = $_POST['adminNewPassword'];
    $hidden_admin_pass = $_POST['adminPrevHiddenPassword'];
    $admin_contact = $_POST['adminContact'];
    $hidden_admin_profile = $_POST['adminProfileHidden'];
    $newPassword = "";
    $adminProfilePic = "";
    if ($_FILES['admin_profile_pic']['tmp_name']){
        if ($hidden_admin_profile){
            /* remove the exsting logo */
            unlink("../../uploads/profilePic/admin/".$hidden_admin_profile);
        }
        $adminProfileTmp = $_FILES['admin_profile_pic']['tmp_name'];
        $adminProfilePic = $_FILES['admin_profile_pic']['name'];
        $directory = "../../uploads/profilePic/admin/";
        move_uploaded_file($adminProfileTmp,$directory.$adminProfilePic);
    } else{
        $adminProfilePic = $hidden_admin_profile;
    }
    if (isset($admin_password)){
        $newPassword = $_POST['adminNewPassword'];
    } else{
        $newPassword = $hidden_admin_pass;
    }
    $adminId = $_SESSION['userId'];
    $adminLoginId = $_SESSION['loginId'];

    $profileUpdate = $admin->saveAdminProfile($connection,$admin_name,$admin_email,$newPassword,$admin_contact,$adminProfilePic,$adminLoginId,$adminId);
    if ($profileUpdate){
        echo "test^adminProfileUpdated";
    }

}

/*
 * Add Librarian
 */

if (isset($_POST['adminActionAddLibrarian']) == "adminAddsLibrarian"){
    $librarian_name = $_POST['librarian_name'];
    $librarian_email = $_POST['librarian_email'];
    $librarian_pass = $_POST['librarian_pass'];
    $librarian_contact = $_POST['librarian_contact'];
    $librarian_department = $_POST['librarian_department'];
    $manageLibrarianAction = $_POST['manageLibrarianAction'];
    $saveLibrarian = $admin->saveLibrarianDetails($connection,$librarian_name,$librarian_email,$librarian_pass,$librarian_contact,$librarian_department,$manageLibrarianAction);
    $mailer->confirmationEmailToReceptionistLibrarian($librarian_name,$librarian_email,$librarian_pass,'Lirarian');
    if ($saveLibrarian){
        echo "test^librarianAdded";
    }
}

/*
 * Manage Data with Sheet
 */

if (isset($_POST['manageDataWithSheet']) == "manageDataWithSheet"){
    $SheetTypeForUser = $_POST['manageSheetTypeForUser'];
        if($_FILES['manageSheetFile']['name'])   {
            $arrFileName = explode('.',$_FILES['manageSheetFile']['name']);
            if($arrFileName[1] == 'csv')     {
                $handle = fopen($_FILES['manageSheetFile']['tmp_name'], "r");
                 $count = 0;
                while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                    $count++;
                      if ($count == 1) { continue; }
                        if ($SheetTypeForUser == "Student") {
                            $studentRoll = $connection->real_escape_string($data[0]);
                            $studentName = $connection->real_escape_string($data[1]);
                            $studentEmail = $connection->real_escape_string($data[2]);
                            $studentContact = $connection->real_escape_string($data[3]);
                            $studentCourse = $connection->real_escape_string($data[4]);
                            $studentDepartment = $connection->real_escape_string($data[5]);
                            $studentYear = $connection->real_escape_string($data[6]);
                            $SheetUpload = $admin->uploadStudentSheet($connection, $studentRoll, $studentName, $studentEmail, $studentContact, $studentCourse, $studentDepartment, $studentYear);
                            $mailer->confirmationEmailToFacultyStudents($studentName,$studentEmail,$studentRoll);
                        }
                        else if ($SheetTypeForUser == "Faculty") {
                            $facultyName = $connection->real_escape_string($data[0]);
                            $facultyEmail = $connection->real_escape_string($data[1]);
                            $facultyContact = $connection->real_escape_string($data[2]);
                            $facultyCourse = $connection->real_escape_string($data[3]);
                            $facultyDepartment = $connection->real_escape_string($data[4]);
                            $SheetUpload = $admin->uploadFacultySheet($connection,$facultyName, $facultyEmail, $facultyContact, $facultyCourse, $facultyDepartment);
                            $mailer->confirmationEmailToFacultyStudents($facultyName,$facultyEmail,'12345678');

                        }

                }
                if ($SheetUpload){
                    echo "test^uploaded";
                }
            }
        }

       if ($_FILES['manageSheetFile']['tmp_name']){
            $uploadfileName = $_FILES['manageSheetFile']['name'];
            $uploadfileTmpName = $_FILES['manageSheetFile']['tmp_name'];
            $uploadDir = "../../uploads/sheets/";
            $target_file = $uploadDir.$uploadfileName;
            move_uploaded_file($uploadfileTmpName,$target_file) or die("Error in uploading".$connection->error);
        }
}


/*
 * get Admin dashboard Counts
 */

if (isset($_POST['getAdminDashboard']) == "getAdminDashboardCounts"){
    $dashboardCount = $admin->getAdminDahboardCount($connection);
    echo 'test^'.$dashboardCount['studentCount'].'^'.$dashboardCount['facultyCount'].'^'.$dashboardCount['receptionistcount'].'^'.$dashboardCount['librarianCount'];
}

/*
 * Generate Allenforum Reports
 */

if (isset($_POST['getAllenforumReport']) == "getAllenforumReport"){
    $reportType = $_POST['reportType'];
    $report = '';
    $report .= '<table class="table table-striped table-hover">';
    if ($reportType == "discussion_share"){
        $discussShare = $admin->generateDiscussionAndShareReport($connection);
        if ($discussShare->num_rows > 0)
        {
            $report .= '<thead>
                <tr style="background-color: #3F51B5;color: white">
                    <td>Sr.No</td>
                    <td>Student Name</td>
                    <td>Discussion Title</td>
                    <td>Discussion With</td>
                    <td>Department</td>
                    <td>Total Likes</td>
                    <td>Total Shares</td>
                    <td>Discussion Date</td>
                </tr>
            </thead>';
            $report .= '<tbody>';
            $sr = 1;
            while ($reportRows = $discussShare->fetch_object())
            {
                $report .='
                <tr>
                     <td>'.$sr.'</td>
                     <td>'.$reportRows->student_name.'</td>
                     <td>'.$reportRows->discussion_title.'</td>
                     <td>'.$reportRows->to_whome.'</td>
                     <td>'.(($reportRows->department_name == ""||$reportRows->department_name ==null)?"All":$reportRows->department_name).'</td>
                     <td>'.$reportRows->total_like.'</td>
                     <td>'.$reportRows->share_status.'</td>
                     <td>'.date('Y-m-d',strtotime($reportRows->q_date_time)).'</td>
                </tr>';
                $sr++;
            }
            $report .= '</tbody>';
        }
    }
    else if ($reportType == "notes_upload")
    {
        $notesUploadedRepost = $admin->generateTotalNotesUploadedReport($connection);
        if ($notesUploadedRepost->num_rows > 0)
        {
            $report .= '<thead>
                <tr style="background-color: #3F51B5;color: white">
                    <td>Sr.No</td>
                    <td>Notes Title</td>
                    <td>Notes Category</td>
                    <td>Uploaded By</td>
                    <td>Department</td>
                    <td>Course</td>
                    <td>Year</td>
                    <td>Date</td>
                </tr>
            </thead>';
            $report .= '<tbody>';
            $sr = 1;
            while ($reportRows = $notesUploadedRepost->fetch_object())
            {
                $report .='
                <tr>
                     <td>'.$sr.'</td>
                     <td>'.$reportRows->notes_title.'</td>
                     <td>'.$reportRows->notes_category.'</td>
                     <td>'.$reportRows->uploader_name.'</td>
                     <td>'.$reportRows->department_name.'</td>
                     <td>'.$reportRows->course_name.'</td>
                     <td>'.$reportRows->year.'</td>
                     <td>'.date('Y-m-d',strtotime($reportRows->uploaded_on)).'</td>
                </tr>';
                $sr++;
            }
            $report .= '</tbody>';
        }
    }
    else if ($reportType == "contribution_post")
    {
        $contributionPosts = $admin->generateTotalContributionPostReport($connection);
        if ($contributionPosts->num_rows > 0)
        {
            $report .= '<thead>
                <tr style="background-color: #3F51B5;color: white">
                    <td>Sr.No</td>
                    <td>Post Title</td>
                    <td>Posted By User</td>
                    <td>Posted For</td>
                    <td>Posted On</td>
                </tr>
            </thead>';
            $report .= '<tbody>';
            $sr = 1;
            while ($reportRows = $contributionPosts->fetch_object())
            {
                $report .='
                <tr>
                     <td>'.$sr.'</td>
                     <td>'.$reportRows->post_title.'</td>
                     <td>'.$reportRows->postedByUserType.'</td>
                     <td>'.(($reportRows->posted_for == "n")? "All":"").'</td>                    
                     <td>'.date('Y-m-d',strtotime($reportRows->posted_on)).'</td>
                </tr>';
                $sr++;
            }
            $report .= '</tbody>';
        }
    }
    else if ($reportType == "trending")
    {
        $trendingNall = $admin->generateReportofEachData($connection);
        if ($trendingNall->num_rows > 0)
        {
            $report .= '<thead>
                <tr style="background-color: #3F51B5;color: white">
                    <td>Sr.No</td>
                    <td>User ID</td>
                    <td>Student Name</td>
                    <td>Student Year</td>
                    <td>Course </td>
                    <td>Department</td>
                    <td>Total Likes</td>
                    <td>Total Posts</td>
                    <td>Total Followers</td>
                    <td>Total Rating</td>
                    <td>Total Coins</td>
                    <td>Last Updated On</td>
                </tr>
            </thead>';
            $report .= '<tbody>';
            $sr = 1;
            while ($reportRows = $trendingNall->fetch_object())
            {
                $report .='
                <tr>
                     <td>'.$sr.'</td>
                     <td>'.$reportRows->student_roll.'</td>
                     <td>'.$reportRows->student_name.'</td>
                     <td>'.$reportRows->student_year.'</td>
                     <td>'.$reportRows->course_name.'</td>
                     <td>'.$reportRows->department_name.'</td>
                     <td>'.$reportRows->likes.'</td>
                     <td>'.$reportRows->post.'</td>
                     <td>'.$reportRows->follower.'</td> 
                     <td>'.$reportRows->rating.'</td>    
                     <td>'.$reportRows->coins.'</td>               
                     <td>'.$reportRows->datetime.'</td>
                </tr>';
                $sr++;
            }
            $report .= '</tbody>';
        }
    }
    else{
        $report .= '';
    }

    $report .= '</table>';
    echo $report;


}

