<?php
include "../../../config/session_header.php";
include "../../../config/configuration.php";
include_once "../../functions/common/Common.php";
$common = new CommonFunctions();
$defaultUserImage = "ownImages/other/user.png";
$defaultUserImage2 = "ownImages/other/default-trending.png";
$defaultFacultyImage = "ownImages/faculty/profile/default_faculty.png";
/*
 * File Name : common-ajax-request.php
 * Ajax Request File
 */




/*
 * Forum Share
 */
if (isset($_POST['share']) == 'letsShare'){
    $studentemails = array();
    $students = implode(",",$_POST['students']);// student Id
    $questionId = $_POST['questionId'];
    $userId = $_SESSION['userId'];
    $userrole = $_SESSION['userrole'];
    $message = '';

    $i=0;
    foreach ($_POST['students'] as $studentId){
       $getEmail = $common->getEmailByUserId($connection,$studentId);
        $studentemails[$i] = $getEmail->fetch_object()->user_email;
        $i++;
    }
    $share = $common->questionShareIt($connection,$questionId,$students,$userId,$userrole);
    $studentemailIds = implode(',',$studentemails);
    $to = $studentemailIds;
    $subject = "Something is shared from Allenforum,Please have a Look";
    // Set content-type header for sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    // Additional headers
    $headers .= 'From: Allen Forum<info@allenforum.com>' . "\r\n";
    $headers .= 'Cc: welcome@example.com' . "\r\n";
    $headers .= 'Bcc: welcome2@example.com' . "\r\n";
   // $message = 'This is the demo message from allen forum,Mailer will be designed soon !';
    $message .= '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Share | Allenhouse</title>
  </head>
  <body style="-webkit-text-size-adjust: none; box-sizing: border-box; color: #74787E; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; height: 100%; line-height: 1.4; margin: 0; width: 100% !important;" bgcolor="#F2F4F6"><style type="text/css">
body {
width: 100% !important; height: 100%; margin: 0; line-height: 1.4; background-color: #F2F4F6; color: #74787E; -webkit-text-size-adjust: none;
}
@media only screen and (max-width: 600px) {
  .email-body_inner {
    width: 100% !important;
  }
  .email-footer {
    width: 100% !important;
  }
}
@media only screen and (max-width: 500px) {
  .button {
    width: 100% !important;
  }
}
</style>
    <span class="preheader" style="box-sizing: border-box; display: none !important; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; font-size: 1px; line-height: 1px; max-height: 0; max-width: 0; mso-hide: all; opacity: 0; overflow: hidden; visibility: hidden;">Hi,Allenits We hope you actively participating in Allenforum discussion,to resolve doubts of each other</span>
    <table class="email-wrapper" width="100%" cellpadding="0" cellspacing="0" style="box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; margin: 0; padding: 0; width: 100%;" bgcolor="#F2F4F6">
      <tr>
        <td align="center" style="box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; word-break: break-word;">
          <table class="email-content" width="100%" cellpadding="0" cellspacing="0" style="box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; margin: 0; padding: 0; width: 100%;">
            <tr>
              <td class="email-masthead" style="box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; padding: 25px 0; word-break: break-word;" align="center">
                <a href="http://allenforum.cubersindia.com" class="email-masthead_name" style="box-sizing: border-box; color: #bbbfc3; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; font-size: 16px; font-weight: bold; text-decoration: none; text-shadow: 0 1px 0 white;">
               Post Shared </a>
              </td>
            </tr>
            <tr>
              <td class="email-body" width="100%" cellpadding="0" cellspacing="0" style="-premailer-cellpadding: 0; -premailer-cellspacing: 0; border-bottom-color: #EDEFF2; border-bottom-style: solid; border-bottom-width: 1px; border-top-color: #EDEFF2; border-top-style: solid; border-top-width: 1px; box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; margin: 0; padding: 0; width: 100%; word-break: break-word;" bgcolor="#FFFFFF">
                <table class="email-body_inner" align="center" width="570" cellpadding="0" cellspacing="0" style="box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; margin: 0 auto; padding: 0; width: 570px;" bgcolor="#FFFFFF">
                  <tr>
                    <td class="content-cell" style="box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; padding: 35px; word-break: break-word;">
                      <h1 style="box-sizing: border-box; color: #2F3133; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; font-size: 19px; font-weight: bold; margin-top: 0;" align="left">Hi, Allenits!</h1>
                      <p style="box-sizing: border-box; color: #74787E; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; font-size: 16px; line-height: 1.5em; margin-top: 0;" align="left">Greetings of the Day,<br/>
                        We hope you actively participating in Allenforum discussion,to resolve doubts of each other. We are very happy inform you that an important discussion post is shared with you
                        aims to resolve the query.</p> <p> Hurry up to give the perfact answer and get more followers,ratings that can make you <b>Allenforum Star</b></p>
                      <table class="body-action" align="center" width="100%" cellpadding="0" cellspacing="0" style="box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; margin: 30px auto; padding: 0; text-align: center; width: 100%;">
                        <tr>
                          <td align="center" style="box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; word-break: break-word;">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif;">
                              <tr>
                                <td align="center" style="box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; word-break: break-word;">
                                  <table border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif;">
                                    <tr>
                                      <td style="box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; word-break: break-word;">
                                        <a href="http://allenforum.cubersindia.com" class="button button--" target="_blank" style="-webkit-text-size-adjust: none; background: #3869D4; border-color: #3869d4; border-radius: 3px; border-style: solid; border-width: 10px 18px; box-shadow: 0 2px 3px rgba(0, 0, 0, 0.16); box-sizing: border-box; color: #FFF; display: inline-block; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; text-decoration: none;">Click to See</a>
                                      </td>
                                    </tr>
                                  </table>
                                </td>
                              </tr>
                            </table>
                          </td>
                        </tr>
                      </table>
                      <p style="box-sizing: border-box; color: #74787E; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; font-size: 16px; line-height: 1.5em; margin-top: 0;" align="left">Thanks & Regards
                        <br />Allenforum Team</p>
                      <img src="http://allenforum.cubersindia.com/home/ownImages/other/allenoverflow.png" alt="allenforum" width="200" height="40"/>
                      <table class="body-sub" style="border-top-color: #EDEFF2; border-top-style: solid; border-top-width: 1px; box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; margin-top: 25px; padding-top: 25px;">
                        <tr>
                          <td style="box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; word-break: break-word;">
                            <p class="sub" style="box-sizing: border-box; color: #74787E; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; font-size: 12px; line-height: 1.5em; margin-top: 0;" align="left">Please do not reply to this email</p>
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr>
              <td style="box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; word-break: break-word;">
                <table class="email-footer" align="center" width="570" cellpadding="0" cellspacing="0" style="box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; margin: 0 auto; padding: 0; text-align: center; width: 570px;">
                  <tr>
                    <td class="content-cell" align="center" style="box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; padding: 35px; word-break: break-word;">
                      <p class="sub align-center" style="box-sizing: border-box; color: #AEAEAE; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; font-size: 12px; line-height: 1.5em; margin-top: 0;" align="center">© 2018 Allenforum. All rights reserved.</p>
                      <p class="sub align-center" style="box-sizing: border-box; color: #AEAEAE; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; font-size: 12px; line-height: 1.5em; margin-top: 0;" align="center">
                        <a href="https://cubersindia.com" target="_blank">Cubersindia</a>
                        <br />info@cubersindia.com
                        <br />Kanpur-208021
                      </p>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
  </body>
</html>
';


    // Send email
    @mail($to,$subject,$message,$headers);

    if ($share){
        echo 'done';
    }

}
/*
 *  Answer Rating
 */
if (isset($_POST['rateIt']) == 'rateAnswer'){
    $userId = $_SESSION['userId'];
    $usertype = $_SESSION['userrole'];
    $answerIdToShare = $_POST['answerIdToShare'];
    $starValue = $_POST['starValue'];
    $rateThis = $common->rateThisAnswer($connection,$answerIdToShare,$starValue,$userId,$usertype);
    if ($rateThis){
        echo 'success';
    }
}

/*
 * Higher Studies Upload Options
 */
if (isset($_POST['higherStudies']) == 'higherStudies'){

       $userId = $_SESSION['userId'];
       $higherStubookTitle = $_POST['higherStubookTitle'];
       $upload_category = $_POST['upload_category'];
       if($_FILES['higherStudyUploadFile']['tmp_name']){
           $higherStudyUploadFile = $_FILES['higherStudyUploadFile']['name'];
           $higherStudyUploadFileTmp = $_FILES['higherStudyUploadFile']['tmp_name'];
           /* move the file */
           $moveDirectory = "../../uploads/notes/";
           $moveFile = $moveDirectory.$higherStudyUploadFile;
           $accessDir = "uploads/notes/".$higherStudyUploadFile;
           $move = move_uploaded_file($higherStudyUploadFileTmp,$moveFile);
           $fileUrl = $accessDir;
       } else {
           $fileUrl = $_POST['higherStudyFileLink'];
           // echo $fileUrl; die();
       }
        $upload = $common->uploadHigherStudiesNotes($connection,$higherStubookTitle,$upload_category,$fileUrl,$userId);
       if ($upload){
              echo 'done';
       }
}


/*
 * forum Ask Questions
 */

if (isset($_POST['actionAskQuestion']) == "actionAskQuestion"){
    $towhome        = $_POST['askWithWhome'];
    $course         = $_POST['askWithWhomeCourse'];
    $towhomeDepartment  = $_POST['shareWithdepartment'];
    $towhomeyear  = $_POST['shareWithYear'];
    $title  = $_POST['question_title'];
    $textQuestion   = $_POST['content'];
    $askedby = $_SESSION['userId'];
    $problemsPicName = "";
    if ($_FILES['problem_pics']['tmp_name']){
        $problemsPicTmp = $_FILES['problem_pics']['tmp_name'];
        $problemsPicName = $_FILES['problem_pics']['name'];
        $directory = "../../uploads/problems/";
        $move = move_uploaded_file($problemsPicTmp,$directory.$problemsPicName);
        if (! $move){
            die("Error in problem pic move".$_FILES['problem_pics']['error']);
        }
    }
    $saveProblem = $common->saveForumDiscussion($connection,$title,$textQuestion,$towhome,$towhomeyear,$towhomeDepartment,$askedby,$problemsPicName);
    if ($saveProblem){
        echo "test^saved";
    }

}



/*
 * Forum Give Answer
 */
if (isset($_POST['getQues']) == 'getQuestion'){
    $quesId = $_POST['quesId'];
    $question = $common->getQuestionDetail($connection,$quesId);
    if ($question->num_rows > 0){
        $questionDetails = $question->fetch_object();
        echo $questionDetails->question;
    }
}
if (isset($_POST['giveAns']) == 'giveAnswer'){
    $questionId = $_POST['questionId'];
    $answerText = $_POST['answerText'];
    $userId = $_SESSION['userId'];
    $userRole = $_SESSION['userrole'];

    $post = $common->postAnswerByUserId($connection,$questionId,$answerText,$userId,$userRole);
    echo $post['status'].'^'.$post['ans_type'].'^'.$post['answerId'];
}
if(isset($_POST['ansCount']) == 'getAnswerCount' ){
    $questionId = $_POST['questionId'];
    $questionCount = $common->getAnswerCount($connection,$questionId);
    if ($questionCount->num_rows > 0){
        echo $questionCount->num_rows;
    } else{
        echo '0';
    }
}

/*
 * Save given Answer
 */

if (isset($_POST['saveAnswer']) == "saveMyAnswer"){
    $questionId = $_POST['questionId'];
    $answerIdToSave = $_POST['answerIdToSave'];
    $userId = $_SESSION['userId'];
    $userRole = $_SESSION['userrole'];
    $saveAnswer = $common->saveMyAnswer($connection,$questionId,$answerIdToSave,$userId,$userRole);
    if ($saveAnswer){
        echo 'test^answerSaved';
    }
}

/*
 * Forum like dislike
 */
if (isset($_POST['likeBtn']) == 'likeBtn'){
    $question_id = $_POST['question_id'];
    $userId = $_SESSION['userId'];
    $userrole = $_SESSION['userrole'];
    $prevLike = $common->countLikesByQuesId($connection,$question_id);
    $checkLikes = $common->checkIfUserAlreadyLiked($connection,$question_id,$userId,$userrole);
    $prevLikevalue = $prevLike->fetch_object()->total_like;

    if ($checkLikes->num_rows > 0 ){
        $type='already';
       /* get previous liked value and subtract it by 1 and display */
       if ($prevLikevalue != 0 || $prevLikevalue > 0){
           $newLike = $prevLikevalue-1;
       }
        $update = $common->updateNewLike($connection,$question_id,$newLike,$userId,$type,$userrole);
    } else{
        // perform like
        $type = 'new';
        $newLike = $prevLikevalue+1;
        $update = $common->updateNewLike($connection,$question_id,$newLike,$userId,$type,$userrole);
    }
    if ($update){
        echo $type.'^'.$newLike;
    }
}

/*
 *Forum Activity
 */
if (isset($_POST['searchActivityEven']) == 'selectActivity'){
    $searchActivitytype = $_POST['searchActivitytype'];
    $userId = $_SESSION['userId'];
    $activity = $common->getActivityContent($connection,$searchActivitytype,$userId);
    $data = '';
    $data .= '<table class="table table-hover table-striped" id="tableActivity1">
              <thead>
                <tr>
                    <th>Sr.No</th>
                    <th>Title</th>
                    <th>Activity</th>
                 </tr>
                </thead>';
    $data .= '<tbody>';
    $sr = 1;
    while ($myActivity = $activity->fetch_object()) {
        $data .= '
        <tr>
          <td><b>'.$sr.'</b></td>';
        if (isset($myActivity->title)){
          $data .='<td><a href="read-more-question.php?ques_id='.base64_encode($myActivity->q_id).'&asked_by= '.base64_encode($myActivity->asked_by).' ">'.substr($myActivity->title,0,20).'</a> </td>';
        } else{
           // $data .='<td>'.$myActivity->q_id.'</td>';
            /* find the title answer info */
            $quesDetail = $common->getQuestionTitle($connection,$myActivity->q_id);
            $detail = $quesDetail->fetch_object();
            $data .='<td><a href="read-more-question.php?ques_id='.base64_encode($myActivity->q_id).'&asked_by= '.base64_encode($detail->asked_by).' ">'.substr($detail->title,0,20).'</a> </td>';
           // $data .= '<td>'.$title->fetch_object()->title.'</td>';
        }
        if (isset($myActivity->question)){
                $data .= '<td>'.substr( $myActivity->question,0,30).'</td>';
            } elseif (isset($myActivity->answer)){
                $data .= '<td>'.substr( $myActivity->answer,0,30).'</td>';
            }
       $data .= '</tr> ';
      $sr++;
    }
    $data .= '</tbody></table>';
    echo $data;
}

/*
 * circular/Notice
 */

if (isset($_POST['notice']) == 'loadNoticeData'){
    $userId = $_SESSION['userId'];
    $notice = $common->loadNoticeData($connection);
    $data = '';
    $data .= '<ul class="todo-list">';
    while ($noticeData = $notice->fetch_object()){
        $data .= ' 
        <li>
            <a href="notice-is.php?notice_id='.base64_encode($noticeData->notice_id).'"><span class="text">'.$noticeData->notice_subject.'</span></a>
            <small class="label label-danger pull-right"><i class="fa fa-clock-o"></i>'.$noticeData->date_time.'</small>
        </li>
    ';
    }
    $data .= '</ul>';
    echo $data;

}

/*
 * Block/Unblock Users
 */
if (isset($_POST['blockUser']) == 'userBlock'){
    $userId = $_POST['userId'];
    $blockedBy = $_POST['blockedBy'];
    $type = $_POST['type'];

    $userBlock = $common->blockUnblockUser($connection,$userId,$blockedBy,$type);
    echo 'test'.'^'.$userBlock['status'].'^'.$userBlock['type'];
}

/*
 * Single Discussion
 */

if (isset($_POST['discussionSingle']) == 'singleDiscussion'){
    $discussDepartment = $_POST['discussDepartment'];
    $discussionUserrole = $_POST['discussionUserrole'];
    $discussionNameSearch = $_POST['discussionNameSearch'];
    $userId = $_SESSION['userId'];
    $singleDiscuss = $common->getUsersForSingleDiscussion($connection,$discussDepartment,$discussionUserrole,$discussionNameSearch,$userId);
    $data = '';
    $data .=' 
    <ul class="products-list product-list-in-box">';
    while ($rows = $singleDiscuss->fetch_object()){
        if ($rows->person_department == 'CSE'){
            $userDepartment = 'Computer Science & Engineering';
        } elseif ($rows->person_department == 'EN'){
            $userDepartment = 'Electrical & Electronics Engineering';
        }
        elseif ($rows->person_department == 'EC'){
            $userDepartment = 'Electrical & Communication Engineering';
        }
        elseif ($rows->person_department == 'ME'){
            $userDepartment = 'Mechanical Engineering';
        }
        elseif ($rows->person_department == 'CE'){
            $userDepartment = 'Civil Engineering';
        }
        elseif ($rows->person_department == 'BBA'){
            $userDepartment = 'Bachelor of Business Administration';
        }
        elseif ($rows->person_department == 'BCA'){
            $userDepartment = 'Bachelor of Computer Application';
        }
        $data .= '
        <li class="item">
            <div class="product-img">
                <img src=" '.(($rows->person_profile)?"uploads/profilePic/students/".$rows->person_profile:$defaultUserImage).' " alt="User Image" class="img-circle">
            </div>
            <div class="product-info">
                <a href="forum-chat.php?chatwith='.base64_encode($rows->chatId).'&usertype='.base64_encode($rows->person_role).'&in='.sha1(uniqid()).' ">'.$rows->person_name.'</a>
                <span class="label label-info pull-right">'.$rows->person_role.'</span></a>
                <span class="product-description">
                  '.$userDepartment.'
                </span>
            </div>
        </li> ';
    }
    $data .= '</ul>';
    echo $data;

}

if (isset($_POST['sendSingleDiscussion']) == 'sendSingleDiscussion'){
    $discussionTitle = $_POST['discussionTitle'];
    $discussionMessage = $_POST['discussionMessage'];
    $discussionPersonId = $_POST['discussionPersonId'];
    $userId = $_SESSION['userId'];

    $send = $common->sendSingleDiscussion($connection,$discussionTitle,$discussionMessage,$userId,$discussionPersonId);
    if ($send){
        echo 'test^sent';
    }
}

if (isset($_POST['getSingleDiscussionMessagesList']) == 'getSingleDiscussionMessagesList'){
    $discussionTitle = $_POST['discussionTitle'];
    $userId = $_SESSION['userId'];
    $getMessages = $common->getSingleDiscussionMessages($connection,$discussionTitle,$userId);

    $data = '';
    $data .='<ul class="products-list product-list-in-box">';
    while ($messages = $getMessages->fetch_object()){
        $data .= '
        <li class="item">
            <div class="product-img">
               <img src=" '.(($messages->person_profile)?$messages->person_profile:$defaultUserImage2).' " class="img-circle"/ >
            </div>
            <div class="product-info">
                <a href="#" data-toggle="modal" data-target="#modalViewSingleDiscussion" onclick="getSingleDiscussionDetailById(\''.$messages->discussion_id.'\');" class="product-title">' .ucfirst($messages->discussion_title). '  || <span style="color: #7dd6b9">' .strtoupper($messages->person_name).'</span></a>
                <span class="pull-right" data-toggle="tooltip" data-original-title=" '.(($messages->status) == '1'?'Answered':'Not Answered').' "><i class="fa  fa-circle" style="color:'.(($messages->status) == '1'?'#4FF84A':'#D62C0A').' "></i></span>
                <span class="product-description">
                  '.substr($messages->message,0,100).'
                </span>
            </div>
        </li> ';
    }
    $data .= '</ul>';
    echo $data;
}

if (isset($_POST['viewSingleDiscussion']) == 'viewSingleDiscussion'){
    $discussionId = $_POST['discussionId'];
    $discussionContent = $common->viewSingleDiscussionById($connection,$discussionId);
    $getSingleAnswersByDiscussionId = $common->getSingleAnswersByDiscussionId($connection,$discussionId);
    if ($discussionContent->num_rows > 0){
        $single = $discussionContent->fetch_object();
        $discussionTitle = ucfirst($single->discussion_title);
        $discussionMessage = ucfirst($single->message);
        echo 'test'.'^'.$discussionTitle.'^'.$discussionMessage;
    }
    if ($getSingleAnswersByDiscussionId->num_rows > 0){
//        $answer = $getSingleAnswersByDiscussionId->fetch_object();
//        echo '^'.$answer->message_reply;
        echo 'test^';
        $answersData = '';
        while ($answers = $getSingleAnswersByDiscussionId->fetch_object()){
            $answersData .= '<img src="ownImages/other/line.png" width="100%" height="1" />';
            $answersData .= $answers->message_reply;
        }
        echo $answersData;
    } else{
        echo '^'.'N/A';
    }
}

/*
 * get personal Inbox Messages
 */

if (isset($_POST['getPersonalInboxMessgaes']) == 'getPersonalInboxMessgaes'){
    $inboxMessageSearch = $_POST['inboxMessageSearch'];
//    $discussedMessageSearch = $_POST['discussedMessageSearch'];
    $userId = $_SESSION['userId'];
    $getPersonalInboxMessgaes = $common->getPersonalInboxQueries($connection,$userId,$inboxMessageSearch);
//    $getPersonalDiscussedMessgaes = $common->getPersonalDiscussedQueries($connection,$userId,$discussedMessageSearch);

    $data = '';
    $data .='<div class="box-footer box-comments">';
    if ($getPersonalInboxMessgaes->num_rows > 0){
        while ($inboxMessages = $getPersonalInboxMessgaes->fetch_object()){
        $data .= '<div class="box-comment">
                    <img class="img-circle img-sm" src="'.(($inboxMessages->user_profile)?$inboxMessages->user_profile:$defaultUserImage2).'" alt="User Image">
                    <div class="comment-text">
                      <span class="username">
                       <a href="#" onclick="giveAnswerPersonally(\''.$inboxMessages->discussion_id.'\',\''.$inboxMessages->person_id.'\',event);">'.$inboxMessages->user_name.'</a>
                       <span class="pull-right" data-toggle="tooltip"  onclick=" '.(($inboxMessages->status) == '1'? 'seeGivenAnswer(\''.$inboxMessages->discussion_id.'\');' :'').'  " data-original-title=" '.(($inboxMessages->status) == '1'?'Answered':'Not Answered').' "><i class="fa  fa-circle" style="color:'.(($inboxMessages->status) == '1'?'#4FF84A':'#D62C0A').' "></i></span>
                       <!-- <span class="text-muted pull-right">'. date("F j, Y, g:i A",strtotime($inboxMessages->posted_time)).'</span>-->
                      </span>
                       '.$inboxMessages->message.'
                    </div>
                </div>';
        }
    }
   else{
        $data .= '<p>You dont have any messages</p>';
    }
    $data .='</div>';


//    $data2 = '';
//    $data2 .= '<div class="box-footer box-comments">';
//    if ($getPersonalDiscussedMessgaes->num_rows > 0){
//        while ($discussedMessages = $getPersonalDiscussedMessgaes->fetch_object()){
//            $data2 .= '<div class="box-comment">
//                    <img class="img-circle img-sm" src="'.(($discussedMessages->user_profile)?$discussedMessages->user_profile:$defaultUserImage2).'" alt="User Image">
//                    <div class="comment-text">
//                      <span class="username">
//                       <a href="#" onclick="seeGivenAnswer(\''.$discussedMessages->discussion_id.'\');">'.$discussedMessages->user_name.'</a>
//                        <span class="text-muted pull-right">'. date("F j, Y, g:i A",strtotime($discussedMessages->posted_time)).'</span>
//                      </span>
//                       '.$discussedMessages->message.'
//                    </div>
//                </div>';
//        }
//    }
//    else{
//        $data2 .= '<p>No Records Found</p>';
//    }
    echo $data.'^'.'test';
}

if (isset($_POST['getPersonalDiscussionDetails']) == 'getPersonalDiscussionDetails'){
    $discussion_id = $_POST['discussion_id'];
    $personalDiscussion = $common->getPersonalDiscussionDetailById($connection,$discussion_id);
    if ($personalDiscussion->num_rows > 0){
        $detail = $personalDiscussion->fetch_object();
        echo 'test^'.$detail->discussion_title.'^'.$detail->message;
    }

}

/* save persoanl Answer to database */
if (isset($_POST['givePersonalAnswer']) == 'givePersonalAnswer'){
    $personalDisId = $_POST['personalDisId'];
    $discussionMessage = $_POST['discussionMessage'];
    $replied_by = $_SESSION['userId'];
    $save = $common->savePersonalAnswer($connection,$personalDisId,$discussionMessage,$replied_by);
    if ($save){
        echo 'saved';
    }
}
/* veiw Perosonal Answer */
if (isset($_POST['viewAnswerByDiscussionId']) == 'viewAnswerByDiscussionId'){
    $discussionId = $_POST['discussionId'];
    $message = $common->viewDiscussionAnswerByDiscussionId($connection,$discussionId);
    $row = $message->fetch_object();
    echo 'test^'.$row->discussion_title.'^'.$row->message_reply.'^';
   $seeAnswers = '';
   while ($rows = $message->fetch_object()){
       $seeAnswers .= '<img src="ownImages/other/line.png" width="100%" height="1" />';
       $seeAnswers .= $rows->message_reply;


   }
   echo $seeAnswers.'^test';
}


/**************************masters***********************/

if (isset($_POST['getDepartmentById']) == "getDepartmentById"){
    $courseId = $_POST['courseId'];
    $departmentDropdown = "";
    $departments = $common->getDepartmentByCourse($courseId);
    if ($departments->num_rows > 0){
        while ($row = $departments->fetch_object()){
            $departmentDropdown .= '<option value=" '.$row->id.' "> '.$row->department_name.' </option>';
        }
    }else{
        $departmentDropdown .= '<option value="N/A">N/A</option>';
    }
    echo 'test^'.$departmentDropdown;

}



/*
 * Send Feedback
 */
if (isset($_POST['sendFeedback']) == "sendFeedbackMessage"){
    $department = $_POST['department'];
    $postTitle = $_POST['postTitle'];
    $feedbackMessage = $_POST['feedbackMessage'];
    $user = $_SESSION['userId'];
    $feedback = $common->sendFeedbackMessage($connection,$department,$postTitle,$feedbackMessage,$user);
    if ($feedback){
        echo "test^sendFeedback";
    }
}

/*
 * password reset from panel
 */
if (isset($_POST['changePassword']) == "passwordChange"){
    $currentPassword = $_POST['current_password'];
    $new_password  = $_POST['new_password'];
    $re_new_password = $_POST['re_new_password'];
    $loginId = $_SESSION['loginId'];
    $checkCurrentPassword = $common->checkCurrentPassword($connection,$currentPassword,$loginId);
    if ($checkCurrentPassword->num_rows > 0){
      $changePassword = $common->changedPassword($connection,$re_new_password,$loginId);
      if ($changePassword){
          echo 'test^changed';
      }
    }
    else{
         echo 'test^notmatched';

    }

}


/*
 * send Notices and mail
 */

if (isset($_POST['sendNotice']) == "addNotices"){
    $noticeFor = $_POST['noticeFor'];
    $noticeDate = $_POST['noticeDate'];
    $noticeSubject = $_POST['noticeSubject'];
    $noticeText = $_POST['noticeText'];
    $receptionistId = $_SESSION['userId'];
    $userRole = $_SESSION['userrole'];
    $noticeAction = $_POST['noticeAction'];
    $hiddenNoticeEditId = $_POST['hiddenNoticeEditId'];
    $usersEmail = $common->getEmailsToSendNotice($connection,$noticeFor);
    $userEmailss = implode(",",$usersEmail);
    $saveNotice = $common->saveReceptionistNotices($connection,$noticeFor,$noticeDate,$noticeSubject,$noticeText,$receptionistId,$userRole,$userEmailss,$noticeAction,$hiddenNoticeEditId);
    if ($saveNotice){
        echo "test^noticeSend";
    }
}

/*
 * Create my cv
 */

if (isset($_POST['cvCreate']) == "createCV")  {
    $cvname = $_POST['cvName'];
    $cvFathersName  = $_POST['cvFathersName'];
    $cvEmail = $_POST['cvEmail'];
    $cvContact = $_POST['cvContact'];
    $cvDob = $_POST['cvDob'];
    $cvGender = $_POST['cvGender'];
    $cvNationality = $_POST['cvNationality'];
    $cvLanguages = $_POST['cvLanguages'];
    $cvHobbies  = $_POST['cvHobbies'];
    $cvStrengths = $_POST['cvStrengths'];
    $cvPermanentAddress = $_POST['cvPermanentAddress'];
    $carrierObjective = $_POST['carrierObjective'];

    $extraCarricularData = "";

    $numrows = $_POST['numrows'];// academic qualification
    $numrows1 = $_POST['numrows1']; // treaining & technical skills
    $numrows2 = $_POST['numrows2']; // extra carricular activities
    $numrows3 = $_POST['numrows3']; // academic projects
    for ($k = 1;$k<=$numrows2;$k++)
    {
        $extraCarricular = $_POST['extraCarricular'.$k];
        $extraCarricularData .= $extraCarricular.'/';
    }

    $savedCvId  = $common->saveCVdetails($connection,$cvname,$cvFathersName,$cvEmail,$cvContact,$cvDob,$cvGender,
        $cvNationality,$cvLanguages,$cvHobbies,$cvStrengths,$cvPermanentAddress,$carrierObjective,$extraCarricularData,$_SESSION['userId'],$_SESSION['userrole']);
    for ($i = 1;$i<=$numrows;$i++)
    {
        $cvQualification = $_POST['cvQualification'.$i];
        $cvSchool_college = $_POST['school_college'.$i];
        $cvQualificationPer = $_POST['cvQualificationPer'.$i];
        $cvQualificationBoardUni = $_POST['cvQualificationBoardUni'.$i];

        $qualificationResult = $common->saveCvQualifications($connection,$savedCvId,$cvQualification,$cvSchool_college,$cvQualificationPer,$cvQualificationBoardUni);
    }
    for ($j = 1;$j<=$numrows1;$j++)
    {
        $traningTechTitle = $_POST['traningTechTitle'.$j];
        $traningTechSkill = $_POST['traningTechSkill'.$j];
        $trainingNSkillResult = $common->saveTraningNskills($connection,$savedCvId,$traningTechTitle,$traningTechSkill);
    }


    for ($l  = 1;$l<=$numrows3;$l++)
    {
        $academicProjTitle = $_POST['academicProj'.$l];
        $academicProjDes = $_POST['academicProjDes'.$l];
        $cvProjectResult = $common->saveCvProjectDetails($connection,$savedCvId,$academicProjTitle,$academicProjDes);
    }
    $cvStatus = $common->updateCvDetailStatus($connection,"1",$_SESSION['userId']);

    if ($qualificationResult && $qualificationResult && $cvProjectResult && $cvStatus )
    {
        echo "test^cvDetailsSaved";
    }



}


