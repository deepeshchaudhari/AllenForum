<?php
include "../../../config/session_header.php";
include "../../../config/configuration.php";

/* Fetch the Experience&Work */
$myExp = $connection->query("SELECT * FROM forum_profile_student
                            WHERE  user_id = '".$_SESSION['userId']."' AND label = 'work_exp'
                         ")
or die("Error in Exp. Tabs".$connection->error);
$countRecords = $myExp->num_rows;
$sr = 1;
while ($myExpTabs = $myExp->fetch_object()) {
$rowId = $myExpTabs->id;
?>

    <div class="col-lg-12">
        <table>
            <tr>
                <td>
                    <img src="ownImages/student/profile/user-experience-icon.png" width="50"
                         height="70"/>
                </td>
                <td>
                    <p style="vertical-align:text-top">
                        <span class="lead"><?php echo $myExpTabs->title;?></span><br/>
                        <?php echo $myExpTabs->desciption;?>
                        <br/>
                        <b><?php echo $myExpTabs->position;?></b>
                    </p>
                </td>
                <div class="exp-col-2-heading">
                    <i class="glyphicon glyphicon-pencil  fa-1x" onclick="editStudentWorkExp(<?php echo $rowId;?>);"></i>
                    <i class="glyphicon glyphicon-remove-sign" onclick="deleteStudentExp('<?php echo $rowId;?>');"></i>
                </div>
            </tr>
        </table>
        <img src="ownImages/other/line.png" width="100%" height="1"/>
    </div>

    <?php
    $sr++;
}
?>