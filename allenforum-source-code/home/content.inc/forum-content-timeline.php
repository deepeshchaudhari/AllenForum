<?php
if (isset($_GET['timeline']) !='active'){
  /*
   * Show the bydefault content in the timeline related  to
   * logged in person
   */
    $activity = $connection->query("SELECT * FROM forum_users 
    WHERE role = '".$_SESSION['userrole']."' AND 
    user_id    = '" . $_SESSION['userId'] . "' AND 
    department = '".$_SESSION['dept']."'   ");
    if ($activity->num_rows){
        /*
         * now see in the answer table.. what all the things done related to the user
         * logged in
         */
        $findInAnsTable = $connection->query("SELECT * FROM forum_answers ")
        or die("Something error".$connection->error);
    }
    echo "<h4>Default Time Line Goes here.</h4>";
} else {

    /*
     * Display the question information
     */
    if (isset($_GET['ques_id']) && isset($_GET['asked_by'])) {
        $questionId = $_GET['ques_id'];
        $askedBy = $_GET['asked_by']; // roll number

        $questionDetails = $connection->query("SELECT * FROM forum_questions 
        WHERE q_id = '$questionId' AND asked_by = '$askedBy'  ");
        if ($questionDetails->num_rows) {
            $questioninfo = $questionDetails->fetch_object();
            $questionis = $questioninfo->question;
            $questionAskerName = $questioninfo->asked_by;

            /*
             * Fins the name of the question asker
             */
            $nameOfQuestionAsker = $connection->query("SELECT * FROM forum_users WHERE user_id = '$questionAskerName' ")->fetch_object();

        } else {
            $questionis = 'N/A';
        }

        /*
         * List at the top of my given answer
         */
        $mygivenAnswer = $connection->query("SELECT * FROM forum_answers 
        WHERE answered_by = '" . $_SESSION['userId'] . "' AND q_id = '$questionId'   ");
        if ($mygivenAnswer->num_rows) {
            $answeris = $mygivenAnswer->fetch_object()->answer;
        } else {
            $answeris = 'none';
        }


        /*
          * Find the rest of asnwers not given by me or given by others
          */
        $othersGivenAnswers = $connection->query("SELECT * FROM forum_answers 
    WHERE q_id = '$questionId' AND answered_by != '" . $_SESSION['userId'] . "'  ");


        ?>


        <div class="row">
            <div class="col-md-12">
                <ul class="timeline">
                    <li class="time-label">
                  <span class="bg-red">
                    10 Feb. 2014
                  </span>
                    </li>

                    <li>
                        <i class="fa fa-user bg-blue"></i>
                        <div class="timeline-item">
                            <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                            <h3 class="timeline-header" style="background-color: #EAEDED; ">
                                <a href="#"><?php echo $nameOfQuestionAsker->name; ?></a>
                                Asked a Question
                            </h3>

                            <div class="timeline-body">
                                <?php echo $questionis; ?>
                                <img src="../home/ownImages/other/line.png" width="100%" height="1"
                                     alt="separator line"/>
                                <?php if ($answeris == 'none') { ?>
                                    <ul class="list-inline">
                                        <li>
                                            <a href="give-your-answer.php?ques_id=<?php echo base64_encode($questionId)."&askedby=".base64_encode($askedBy);?>" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> Reply</a>
                                        </li>
                                    </ul>
                                <?php } else {
                                    /*
                                     * print the Answer and give an option to modify it
                                     */
                                    echo $answeris; ?>
                                    <ul class="list-inline">
                                        <li>
                                            <a href="" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i>
                                                Modify</a>
                                        </li>
                                    </ul>
                                <?php } ?>
                            </div>

                        </div>
                    </li>
                    <?php
                    /*
                     * Others Ansers List given by
                     */
                    while ($othersActivity = $othersGivenAnswers->fetch_object()) {
                        $otherPerson = $othersActivity->answered_by; // id
                        $otherPersonInfo = $connection->query("SELECT * FROM forum_users WHERE user_id = '$otherPerson' ")->fetch_object();
                        ?>

                        <li>
                            <i class="fa fa-user bg-blue"></i>
                            <div class="timeline-item">
                                <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>
                                <h3 class="timeline-header" style="background-color: #EAEDED; ">
                                    <a href="#" style="color: #e07b2f"><?php echo $otherPersonInfo->name; ?> </a>
                                    also given answer
                                </h3>

                                <div class="timeline-body">
                                    <p>
                                        <?php echo $othersActivity->answer; ?>
                                    </p>
                                    <ul class="list-inline">
                                        <li>
                                            <a href="" class="btn btn-info btn-xs"><i class="fa fa-comment"></i>
                                                Reply</a>
                                        </li>
                                        <li>
                                            <button type="button" class="btn btn-default btn-xs"><i
                                                    class="fa fa-thumbs-o-up"></i> Share
                                            </button>
                                        </li>
                                        <li>
                                            <button type="button" class="btn btn-default btn-xs"><i
                                                    class="fa fa-share"></i> Share
                                            </button>
                                        </li>
                                    </ul>
                                </div>


                            </div>
                        </li>

                    <?php }
                    ?>
                    <li>
                        <i class="fa fa-clock-o bg-gray"></i>
                    </li>
                </ul>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    <?php }
}
?>

