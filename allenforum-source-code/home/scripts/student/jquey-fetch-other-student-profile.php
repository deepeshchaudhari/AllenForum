<?php
include "../../../config/session_header.php";
include "../../../config/configuration.php";
if (isset($_POST['id'])){
    $userId =  base64_decode($_POST['id']);

}

/* Fetch the schooling and graduation rows ans send it as a response */
$schooling = $connection->query("SELECT *
       FROM forum_profile_student
      WHERE user_id = '$userId' AND label = 'schooling'  ");

if ($schooling->num_rows > 0 ) {

    $output1 = '';
    while ($mySchooling = $schooling->fetch_object()) {
        $output1 .=
            '<div class="col-lg-12">
               <table>
                <tr>
                    <td>
                        <img src="ownImages/student/profile/education-icon.png" width="50" height="50">
                    </td>
                    <td>
                        <p style="vertical-align:text-top;">
                            <span class="lead">'.$mySchooling->title.'</span><br/>
                            <span>'.$mySchooling->desciption.'</span><br/>
                            <span>'.$mySchooling->position.'</span>
                            <b>'.$mySchooling->year.'</b><br/>
                        </p>
                    </td>
                </tr>
              </table>
        <img src="ownImages/other/line.png" width="100%" height="1"/>
    </div>';
    }
    echo $output1.'^';
} else{
   // echo 'N/A';
}
?>

<?php

$output2 = '';
    /* Fetch the Experience&Work */
    $myExp = $connection->query("SELECT * FROM forum_profile_student
    WHERE  user_id = '$userId' AND label = 'work_exp'
    ")
    or die("Error in Exp. Tabs".$connection->error);
    $countRecords = $myExp->num_rows;
    $sr = 1;
    while ($myExpTabs = $myExp->fetch_object()) {
    $rowId = $myExpTabs->id;
    $output2 .= '
       <div class="col-lg-12">
        <table>
            <tr>
                <td>
                    <img src="ownImages/student/profile/user-experience-icon.png" width="50"
                         height="70"/>
                </td>
                <td>
                    <p style="vertical-align:text-top">
                        <span class="lead">'.$myExpTabs->title.'</span><br/>'.$myExpTabs->desciption.'<br/>
                        <b>'.$myExpTabs->position.'</b>
                    </p>
                </td>
            </tr>
        </table>
        <img src="ownImages/other/line.png" width="100%" height="1"/>
    </div>';
    }
    echo $output2;
    ?>


