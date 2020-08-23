<?php
include "../../../config/session_header.php";
include "../../../config/configuration.php";


/* Fetch the schooling and graduation rows ans send it as a response */
$schooling = $connection->query("SELECT *
       FROM forum_profile_student
      WHERE user_id = '".$_SESSION['userId']."' AND label = 'schooling'  ");
$sr = 1;
while ($mySchooling = $schooling->fetch_object()){ ?>
    <div class="col-lg-12">
        <table>
            <tr>
                <td>
                    <img src="ownImages/student/profile/education-icon.png" width="50" height="50">
                </td>
                <td>
                    <p style="vertical-align:text-top;">
                        <span class="lead"><?php echo $mySchooling->title;?></span><br/>
                        <span><?php echo $mySchooling->desciption;?></span><br/>
                        <span><?php echo $mySchooling->position;?>,</span>
                        <b><?php echo $mySchooling->year;?></b><br/>
                    </p>
                </td>
                <div class="exp-col-2-heading">
                    <i class="glyphicon glyphicon-pencil" onclick="editStudentSchooling('<?php echo $mySchooling->id;?>');"></i>
                        <i class="glyphicon glyphicon-remove-circle" style="color: red" onclick="deleteStudentSchooling('<?php echo $mySchooling->id;?>');"> </i>
                </div>
            </tr>
        </table>
        <img src="ownImages/other/line.png" width="100%" height="1"/>
    </div>
<?php $sr++;
}
?>

