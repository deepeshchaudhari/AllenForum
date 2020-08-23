<?php
include "../../../config/session_header.php";
include "../../../config/configuration.php";
include_once "../../functions/admin/Admin.php";
$admin = new Admin();
if (isset($_GET['reportType']) && $_GET['reportType'] != '')
{
    $reportType = $_GET['reportType'];

    $report = '';
    $report .= '<table class="table table-striped table-hover">';
    if ($reportType == "discussion_share"){
        $discussShare = $admin->generateDiscussionAndShareReport($connection);
        if ($discussShare->num_rows > 0)
        {
            $report .= '<thead>
                <tr>
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
        $fileName = "Report-".date('d-m-Y').'-discussion-share.xls';

    }
    else if ($reportType == "notes_upload") {
        $notesUploadedRepost = $admin->generateTotalNotesUploadedReport($connection);
        if ($notesUploadedRepost->num_rows > 0) {
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
            while ($reportRows = $notesUploadedRepost->fetch_object()) {
                $report .= '
                <tr>
                     <td>' . $sr . '</td>
                     <td>' . $reportRows->notes_title . '</td>
                     <td>' . $reportRows->notes_category . '</td>
                     <td>' . $reportRows->uploader_name . '</td>
                     <td>' . $reportRows->department_name . '</td>
                     <td>' . $reportRows->course_name . '</td>
                     <td>' . $reportRows->year . '</td>
                     <td>' . date('Y-m-d', strtotime($reportRows->uploaded_on)) . '</td>
                </tr>';
                $sr++;
            }
            $report .= '</tbody>';
            $fileName = "Report-".date('d-m-Y').'-notes-uploaded.xls';

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
            $fileName = "Report-".date('d-m-Y').'-contribution-posts.xls';

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
            $fileName = "Report-".date('d-m-Y').'-trending-N-All.xls';

        }
    }

    $report .= '</table>';
    header("Content-type: application/xls");
    header("Content-Disposition: attachment; filename=\"$fileName\" ");
    header("Pragma: no-cache");
    header("Expires: 0");
    echo $report;
}
