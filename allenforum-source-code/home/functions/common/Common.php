<?php
/*
 * File Name : Common.php
 * Class File
 */
 class CommonFunctions {

     /*
      * Get loggedin user details
      */

    function getLoggedInUserDetails($connection,$loginId,$userrole){
        if($userrole == 'admin'){
              $query = $connection->query("SELECT fa.id as userId,fu.user_email as login_email,fa.name AS login_name,
fa.contact as login_contact,fa.profile as login_profile,fa.department as login_department FROM forum_users fu
 left join forum_admin fa on fu.id=fa.user_id WHERE fu.id = '$loginId' ") or die("Error admin query:".$connection->error);
        }
        else if($userrole == 'student'){
                $query = $connection->query("SELECT fs.id as userId,fs.student_roll,fu.user_email as login_email,
fs.student_name AS login_name,fs.student_contact as login_contact,fc.course_name,fd.department_name as
 login_department,fd.id as department_id,fs.student_profile as login_profile FROM forum_users fu left join forum_student 
 fs on fu.id=fs.user_id LEFT JOIN forum_courses fc ON fs.student_program=fc.id LEFT JOIN forum_departments
  fd on fs.student_department=fd.id WHERE fu.id = '$loginId' AND fu.user_role='$userrole'") or die("Error student query:".$connection->error);
            }
        else if($userrole == 'faculty'){
            $query = $connection->query("SELECT ff.id as userId,fu.user_email as login_email,
ff.name AS login_name,ff.contact as login_contact,fc.course_name,fd.department_name as
 login_department, ff.profile as login_profile,fd.id as department_id FROM forum_users fu left join forum_faculty 
 ff on fu.id=ff.user_id LEFT JOIN forum_courses fc ON ff.program=fc.id LEFT JOIN forum_departments
  fd on ff.department=fd.id WHERE fu.id = '$loginId' AND fu.user_role='$userrole'") or die("Error faculty query:".$connection->error);
        }
        else if($userrole == 'receptionist'){
            $query = $connection->query("SELECT fr.id as userId,fu.user_email as login_email,fr.name AS login_name,
 fr.contact as login_contact,fr.profile as login_profile,fr.department as login_department FROM forum_users fu 
 left join forum_receptionist fr on fu.id=fr.user_id WHERE fu.id = '$loginId' AND fu.user_role='$userrole'
") or die("Error in receptionist query:".$connection->error);
        }
        else if($userrole == 'librarian'){
            $query = $connection->query("SELECT fl.id as userId,fu.user_email as login_email,fl.name AS login_name, 
fl.contact as login_contact,fl.profile as login_profile,fl.department as login_department FROM forum_users fu 
left join forum_librarian fl on fu.id=fl.user_id WHERE fu.id = '$loginId' AND fu.user_role='$userrole'
") or die("Error in librarian query:".$connection->error);
        }
        return $query;

    }

    /*
     * Get all active users,live users
     */
    public function getActiveUsers($connection,$loginId){
       $query = "SELECT * FROM forum_users WHERE userLive = '1' AND id != '$loginId' ";
      // echo $query; die();
       $result1 = $connection->query($query);
       return $result1;
    }

    /*
     * Forum Follow Section
     */

    function  checkFollowing($connection,$user_id,$userRole,$follower,$followedByRole){

        $userTobeFollowed = $user_id.$userRole;
        $userFollowingToPerson = $follower.$followedByRole;

        $query2 = "SELECT * FROM forum_follow WHERE follower = '$userFollowingToPerson' AND following_to = '$userTobeFollowed' ";
        $result2 = $connection->query($query2) or die("Error to check follow".$connection->error);
         if ($result2->num_rows > 0){
             /* delete also if clicks again */
             $connection->query("DELETE FROM forum_follow WHERE follower = '$userFollowingToPerson' AND following_to = '$userTobeFollowed'") or die("Error in deleting follow follow again".$connection->error);;
             return true;
         } else{
             return false;
         }
    }
    function getFollowStatus($connection,$followingPersonId,$answerGiverRole,$followerId,$followerRole){
        $userTobeFollowed = $followingPersonId.$answerGiverRole;
        $userFollowingToPerson = $followerId.$followerRole;
        $query2 = "SELECT * FROM forum_follow WHERE follower = '$userFollowingToPerson' AND following_to = '$userTobeFollowed' ";
        $result2 = $connection->query($query2);
        if ($result2->num_rows > 0){
            return true;
        } else{
            return false;
        }
    }
    function addFollow($connection,$user_id,$userRole,$follower,$followedByRole){
        $userTobeFollowed = $user_id.$userRole;
        $userFollowingToPerson = $follower.$followedByRole;
        $query = "INSERT INTO forum_follow SET follower = '$userFollowingToPerson', following_to = '$userTobeFollowed',since=now()";
       // echo $query; die();
        $addFollow = $connection->query($query);
        if ($addFollow){
            return true;
        }
    }

    /*
     * Masters Things
     */
    function  getCourses($connection){
        $courses = $connection->query("SELECT * FROM  forum_courses");
        return $courses;
    }
    function getDepartments($connection){
        $departments = $connection->query("SELECT * FROM forum_departments");
        return $departments;
    }
    function getDepartmentByCourse($connection,$courseId){
        $query = "SELECT * FROM  forum_departments ";
        if ($courseId){
            $query  .= "WHERE course_id = '$courseId'";
        }
       // echo $query; die();
        $departments = $connection->query($query);

        return $departments;
    }

    /*
     * Forum Share Questions
     */

    function questionShareIt($connection,$questionId,$shared_with,$shared_by,$sharedByUserType){
        $share = $connection->query("INSERT INTO forum_ques_share SET q_id='$questionId',shared_with='$shared_with',shared_by='$shared_by',sharedByUserType='$sharedByUserType',shared_time=now() ");

        $getShareStatus = $connection->query("SELECT share_status as total_shares FROM forum_questions WHERE q_id='$questionId' ")  or die("Eror in updation new Shared".$connection->error);
        $shares = $getShareStatus->fetch_object()->total_shares;
        $newShareCount = $shares+1;
        $updateNewShare = $connection->query("UPDATE forum_questions SET share_status='$newShareCount' WHERE q_id='$questionId'") or die("Eror in updation new Shared".$connection->error);

        return $share;
    }
    function getQuesSharedListByUserId($connection,$userId,$userrole){
        $query = "SELECT fqs.*,fq.title AS questionTitle FROM forum_ques_share fqs LEFT JOIN forum_questions fq ON fqs.q_id=fq.q_id WHERE fqs.shared_by='$userId' AND fqs.sharedByUserType='$userrole'";
        $list = $connection->query($query);
        return $list;
    }
    function getEmailByUserId($connection,$userId){
        $query = "SELECT  user_email FROM  forum_users WHERE id = '$userId' ";
       // echo $query;
        $email = $connection->query($query);
        return $email;
    }
    /*function sendMail($studentemails){
        $to = $studentemails;
        echo $to; die();
        $subject = "Something is shared from Allenforum,Please have a Look";

        $message = 'This is the demo message from allen forum,Mailer will be designed soon !';

        // Set content-type header for sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // Additional headers
        $headers .= 'From: Allen Forum<info@allenforum.com>' . "\r\n";
        $headers .= 'Cc: welcome@example.com' . "\r\n";
        $headers .= 'Bcc: welcome2@example.com' . "\r\n";

        // Send email
        @mail($to,$subject,$message,$headers);

    }*/


    /*
     * Save forum Discussion
     */

    function saveForumDiscussion($connection,$title,$textQuestion,$towhome,$towhomeyear,$towhomeDepartment,$askedby,$problemPic){
        $queryDate = date('Y-m-d H:i:s');
        $query = "INSERT INTO forum_questions SET title='$title',question='".$textQuestion."',to_whome='$towhome',year='$towhomeyear',department='$towhomeDepartment',asked_by='$askedby',screen_shot='$problemPic',q_date_time='$queryDate'  ";
        $result = $connection->query($query);
        return $result;
    }


     /*
      * Tranding Functions of self
      */


     function getContributionPost($connection,$userId){
         $query = $connection->query("SELECT * FROM  forum_contribution_post WHERE posted_by = '$userId' ");
         return $query;
     }

     function getFollowerByUser($connection,$userId){
         $follower = $connection->query("SELECT * FROM  forum_follow WHERE user_id = '$userId' ");
         return $follower;
     }
     function getTotalLikeOnQuesByUserId($connection,$userId){
         $query = "SELECT SUM(total_like)  AS total_likes FROM forum_questions fq WHERE fq.asked_by='$userId' ";
         $result = $connection->query($query);
         return $result;
     }

    function getTotalRatesOfAnwersByUserId($connection,$userId){
         $query = "SELECT SUM(ans_rate) AS  total_rate FROM  forum_answer_rating far LEFT JOIN forum_answers fa on fa.id=far.ans_id WHERE fa.answered_by='$userId'";
         $count = $connection->query($query);
         return $count;
    }



     /*
      * Rating the Answers
      */
     function rateThisAnswer($connection,$answerIdToShare,$starValue,$userId,$usertype){
         $ratedOn = date('Y-m-d H:i:s');
         $query = "INSERT INTO forum_answer_rating SET ans_id='$answerIdToShare',ans_rate='$starValue',rated_by='$userId',usertype='$usertype',rated_on='$ratedOn' ";
         $rated = $connection->query($query);
         return $rated;
     }

     function checkRatedByUserIdAndQuesId($connection,$answerId,$userId,$usertype){
         $check = $connection->query("SELECT * FROM forum_answer_rating WHERE ans_id='$answerId' AND rated_by='$userId' AND usertype='$usertype' ");
         if ($check->num_rows > 0){
             return true;
         }
     }

     /*
      * Higher Studies Upload option
      */

     function uploadHigherStudiesNotes($connection,$notesTitle,$upload_category,$fileUpload,$userId){
         $today = date('Y-m-d H:i:s');
         $query = "INSERT INTO  forum_study_material SET file_title ='$notesTitle',category='$upload_category',file_name = '$fileUpload',user_id='$userId',uploaded_on='$today' ";
         $result = $connection->query($query);
         if ($result){
             return true;
         }
     }

     function getHigherStudyMaterial($connection,$category){
        $query = "SELECT * FROM forum_study_material WHERE category = '$category' ";
        $result = $connection->query($query);
        return $result;
     }

     /*
      * Forum Give Answers
      */
     function getQuestionDetail($connection,$questionId){
         $query = "SELECT * FROM forum_questions WHERE q_id='$questionId'";
         $question = $connection->query($query);
         return $question;

     }
    function postAnswerByUserId($connection,$quesId,$answer,$userId,$userRole){
         $return = array();
         $return['status'] = 'success';
         $today = date('Y-m-d H:i:s');
         /*check */
         $cgheck = "SELECT * FROM  forum_answers WHERE q_id='$quesId' AND  answered_by='$userId' ";
         $result1 = $connection->query($cgheck);
         if ($result1->num_rows > 0){
             $query = "INSERT INTO forum_answers SET q_id='$quesId',answer='$answer',answered_by='$userId',anweredByRole='$userRole',date_time='$today'  ";
             $return['ans_type'] ='n';
         } else{
             $query = "INSERT INTO forum_answers SET q_id='$quesId',answer='$answer',answered_by='$userId',anweredByRole='$userRole',date_time='$today'  ";
             $return['ans_type'] ='1';
         }
         $result = $connection->query($query);
         $answerId = $connection->insert_id;
         $return['answerId'] = $answerId;
         if ($result){
             return $return;
         }
    }
    function getAnswerCount($connection,$quesId){
        $query = "SELECT fa.* ,fq.q_id AS ques_id FROM forum_answers fa LEFT JOIN forum_questions fq ON fa.q_id = fq.q_id WHERE fa.q_id='$quesId' ";
        $ansCount = $connection->query($query);
        return $ansCount;
    }
    function getTotalAnswerCount($connection,$discussionId){
         $query = "SELECT COUNT(fa.q_id) as total_answers FROM forum_answers fa WHERE q_id='$discussionId' GROUP BY q_id";
         $result = $connection->query($query);
         if ($result){
             return $result->fetch_object()->total_answers;
         }
    }

    function checkAnswerGivenToThisQuestion($connection,$questionId,$userID,$userRole){
        $checkAnsGiven = "SELECT * FROM forum_answers 
                     WHERE q_id = '$questionId' AND answered_by = '$userID' AND anweredByRole='$userRole'  " ;
        $check = $connection->query($checkAnsGiven);
        return $check;
    }

    /*
     * Save Answer while giving answer
     */

    function saveMyAnswer($connection,$questionId,$answerIdToSave,$userId,$userRole){
        $query = "INSERT INTO forum_answer_saves SET q_id='$questionId',ansId='$answerIdToSave', saved_by='$userId',savedByUser='$userRole',date_time=now()";
        $saveAnswer = $connection->query($query) or die("Error in saveing:".$connection->error);
        if ($saveAnswer){
            return $saveAnswer;
        }
    }

    /*
     * get my Saved Answers
     */

    function getSavedAnswersByUserId($connection,$userId,$userRole){
        $query = "SELECT fas.q_id,fas.ansId,fq.title as questionTitle,fq.question as askedQuestion,
fa.answer as savedAnswer,fas.date_time as savedTime FROM forum_answer_saves fas LEFT JOIN forum_answers fa 
ON fas.ansId=fa.id LEFT JOIN forum_questions fq ON fa.q_id=fq.q_id WHERE fas.saved_by='$userId' AND fas.savedByUser='$userRole'";
        $result = $connection->query($query);
        if ($result){
            return $result;
        }
    }

    /*
     * Forum Like Dislike
     */
    function checkIfUserAlreadyLiked($connection,$questionId,$userId,$userrole){
        $query = " SELECT * FROM  forum_like_details WHERE q_id='$questionId' AND liked_by='$userId' AND  usertype='$userrole'";
        $check = $connection->query($query);
        return $check;
    }
    function countLikesByQuesId($connection,$questionId){
        $query = "SELECT * FROM forum_questions WHERE q_id = '$questionId' ";
        $likeCount = $connection->query($query);
        return $likeCount;
    }
    function updateNewLike($connection,$question_id,$newLike,$userId,$type,$userrole){
        $today = date('Y-m-d H:i:s');
        $query = "UPDATE forum_questions SET total_like='$newLike' WHERE q_id='$question_id' ";
        $update = $connection->query($query);
        if ($type == 'new'){
            $query2 = "INSERT INTO  forum_like_details SET q_id='$question_id',liked_by='$userId',date_time='$today',usertype='$userrole' ";
            $result2 = $connection->query($query2);
        } elseif ($type == 'already'){
            $query = "DELETE FROM forum_like_details WHERE q_id ='$question_id' AND liked_by='$userId' and usertype='$userrole'";
            $delete = $connection->query($query);
        }
        if ($update){
            return true;
        }
    }

    function getActivityContent($connection,$activityType,$userId){
       if ($activityType == 'ques'){
           $query = "SELECT * FROM forum_questions WHERE asked_by = '$userId' ORDER BY q_id DESC  ";
       } else{
           // answer
           $query = "SELECT q_id,answer,answered_by FROM forum_answers WHERE answered_by='$userId' ORDER BY q_id DESC ";
       }
       $result = $connection->query($query);
       return $result;
    }
    function getQuestionTitle($connection,$questionId){
        $title = $connection->query("SELECT * FROM forum_questions WHERE q_id ='$questionId' ");
        return $title;
    }

    /*
     * Trending functions of all students
     */

    function getAllStudentCount($connection){
        $query = "SELECT fs.*,fu.user_role FROM forum_student fs LEFT JOIN forum_users fu ON fs.user_id=fu.id WHERE fu.user_role='student'";
       $count =  $connection->query($query);
       return $count;
    }
     function getTotalLikeOnQuesByAllUserId($connection,$userId){
         $query = "SELECT SUM(total_like)  AS total_likes FROM forum_questions fq WHERE fq.asked_by='$userId' ";
         $result = $connection->query($query);
         return $result;
     }

     function getAllContributionPostByUsersId($connection,$userId,$studentRole){
         $query = $connection->query("SELECT * FROM  forum_contribution_post WHERE posted_by = '$userId' AND postedByUserType='$studentRole'");
         return $query;
     }

     function getAllFollowerByUsersId($connection,$userId,$studentRole){
        $myFollowingId = $userId.$studentRole;
         $follower = $connection->query("SELECT * FROM  forum_follow WHERE following_to = '$myFollowingId' ");
         return $follower;
     }

     function getTotalRatesOfAnwersByAllUsersId($connection,$userId,$studentRole){
         $query = "SELECT SUM(ans_rate) AS  total_rate FROM  forum_answer_rating far LEFT JOIN forum_answers fa on fa.id=far.ans_id WHERE fa.answered_by='$userId' AND fa.anweredByRole='$studentRole'";
         $count = $connection->query($query);
         return $count;
     }

     function saveTrendingData($connection,$studentId,$totalLikesCount,$postCount,$followerCount,$total_rate,$totalCoins){
         $date = date('Y-m-d:H:i:s');
        // $queryTrending = "INSERT INTO forum_trending SET user_id='$studentId'  ";

         $queryTrending = "UPDATE forum_trending SET likes='$totalLikesCount',post='$postCount',follower='$followerCount',rating='$total_rate',coins='$totalCoins',datetime='$date' WHERE user_id ='$studentId' ";
         $resultTrending = $connection->query($queryTrending);
         return $resultTrending;
     }

     function getTopTrending($connection){
//         $query = "SELECT ft.*,fu.name,fu.profile_pic FROM forum_trending ft LEFT JOIN forum_users fu on fu.user_id=ft.user_id ORDER BY coins DESC LIMIT 10";
         $query = "SELECT ft.*,fs.student_name AS trendingName,fs.student_profile AS trendingProfile FROM forum_trending ft LEFT JOIN forum_student fs on ft.user_id=fs.id ORDER BY coins DESC LIMIT 10";
         //echo $query;
         $result = $connection->query($query);
         return $result;
     }

     /*
      * Circular/Notice
      */

     function loadNoticeData($connection){
         $query = "SELECT * FROM forum_notices ORDER BY date_time DESC LIMIT 5";
         $notice = $connection->query($query);
         return $notice;
     }

     /*
      * Blocl/Unblock Users
      */

     function blockUnblockUser($connection,$userId,$blockedBy,$type){
         if ($type == 'block'){
             $blockStatus = '0';
             $blockedBy = $blockedBy;
         } else if($type == 'unblock'){
             $blockStatus = '1';
             $blockedBy = '';
         }
         $query = "UPDATE forum_users  SET user_status = '$blockStatus',status_by = '$blockedBy' WHERE id = '$userId' ";
     //    echo $query; die();
         $result = $connection->query($query);
         if ($result){
             return array('status' => 'success','type' => $blockStatus);
         }
     }

     /*
      * Start Single Discussion by users
      */

     function getUsersForSingleDiscussion($connection,$department,$userType,$discussionNameSearch,$userId){
         if ($userType == 'student'){
             $query = "SELECT fs.id as person_id,fu.id as chatId,fs.student_name as person_name,fs.student_profile as person_profile,
fd.department_name as person_department,fu.user_role as person_role
FROM forum_users fu LEFT JOIN forum_student fs ON fu.id=fs.user_id left join forum_departments fd on fs.student_department=fd.id 
WHERE fu.user_role='student' AND fs.id !='$userId' ";
             if ($department){
                 $query .= "AND fd.id = '$department'  ";
             }
             if ($discussionNameSearch){
                 $query .= "AND fs.student_name LIKE '%{$discussionNameSearch}%' ";
             }
         }
        else  if ($userType == 'faculty'){
             $query = "SELECT ff.id as person_id,fu.id as chatId,ff.name as person_name,ff.profile AS person_profile,
fd.department_name AS person_department,fu.user_role as person_role FROM forum_users fu LEFT JOIN forum_faculty ff ON fu.id=ff.user_id 
left join forum_departments fd on ff.department=fd.id WHERE fu.user_role='faculty' AND ff.id !='$userId'";
            if ($department){
                $query .= "AND ff.department = '$department'  ";
            }
             if ($discussionNameSearch){
                 $query .= "AND ff.name LIKE '%{$discussionNameSearch}%' ";
             }
         }
       // echo $query; die();

         $result = $connection->query($query);
         if ($result){
             return $result;
         }
     }

     function sendSingleDiscussion($connection,$discussionTitle,$discussionMessage,$userId,$discussionPersonId){
         $now = date('Y-m-d H:i:s');
         $query = "INSERT INTO  forum_personal_discussion SET user_id='$userId',person_id='$discussionPersonId',discussion_title='$discussionTitle',message='$discussionMessage',datetime='$now' ";
         $result = $connection->query($query);
         if ($result){
             return $result;
         }
     }

     function getSingleDiscussionMessages($connection,$discussionNameSearch,$userId){

         $query = "SELECT fpd.*,fu.name  AS person_name,fu.profile_pic as person_profile FROM forum_personal_discussion fpd LEFT JOIN forum_users fu ON fpd.person_id=fu.user_id WHERE fpd.user_id='$userId' ";
         if ($discussionNameSearch){
             $query .= "AND ( fpd.discussion_title LIKE '%{$discussionNameSearch}%' OR fpd.message LIKE '%{$discussionNameSearch}%' OR fu.name LIKE '%{$discussionNameSearch}%') ";
         }
         $query .= '  ORDER BY datetime DESC';
        // echo $query; die();
         $result = $connection->query($query);
         if ($result){
             return $result;
         }
     }
     function viewSingleDiscussionById($connection,$discussionId){
         $query = "SELECT * FROM forum_personal_discussion WHERE discussion_id = '$discussionId' ";
         $result = $connection->query($query);
         return $result;
     }

     function getPersonalInboxQueries($connection,$userId,$inboxMessageSearch){
//         $query = "SELECT fpd.*,fu.name AS user_name,fu.profile_pic AS user_profile,fpd.datetime as posted_time FROM forum_personal_discussion fpd LEFT JOIN forum_users fu on fu.user_id=fpd.user_id WHERE fpd.person_id='$userId' AND fpd.status=0";
         $query = "SELECT fpd.*,fu.name AS user_name,fu.profile_pic AS user_profile,fpd.datetime as posted_time FROM forum_personal_discussion fpd LEFT JOIN forum_users fu on fu.user_id=fpd.user_id WHERE fpd.person_id='$userId' ";

       //  echo $query;
         if ($inboxMessageSearch){
             $query .= "  AND ( fpd.discussion_title LIKE '%{$inboxMessageSearch}%' OR fpd.message LIKE '%{$inboxMessageSearch}%' OR fu.name LIKE '%{$inboxMessageSearch}%') ";
         }
         $query .= '  ORDER BY datetime DESC';
         $result = $connection->query($query);
         return $result;
     }

     function getPersonalDiscussedQueries($connection,$userId,$discussedMessageSearch){
        $query ="SELECT fpd.*,fpr.message_reply,fu.name as user_name,fu.profile_pic as user_profile,fpd.datetime AS posted_time FROM forum_personal_discussion fpd LEFT JOIN forum_personal_reply fpr ON fpd.discussion_id=fpr.discuss_id LEFT JOIN forum_users fu on fu.user_id=fpd.user_id WHERE person_id='$userId' AND fpd.status=1";
        if ($discussedMessageSearch){
            $query .= "  AND ( fpd.discussion_title LIKE '%{$discussedMessageSearch}%' OR fpd.message LIKE '%{$discussedMessageSearch}%' OR fu.name LIKE '%{$discussedMessageSearch}%') ";
        }
         $query .= '  ORDER BY datetime DESC';
         $result = $connection->query($query);
        return $result;
     }

     function getPersonalDiscussionDetailById($connection,$discussion_id){
         $query = "SELECT * FROM forum_personal_discussion WHERE discussion_id='$discussion_id' ";
         $detail = $connection->query($query);
         return $detail;
     }

     function savePersonalAnswer($connection,$discussionId,$discussionMessage,$replied_by){
         $currentTime = date('Y-m-d:H i s');
         $connection->query("UPDATE forum_personal_discussion SET status = '1' WHERE discussion_id='$discussionId' ");
         $query = "INSERT INTO  forum_personal_reply SET discuss_id='$discussionId',message_reply='$discussionMessage',replied_by='$replied_by',replied_time='$currentTime' " ;
         $result = $connection->query($query);
         return $result;
     }

     /* view Discussion Message/reply */

     function viewDiscussionAnswerByDiscussionId($connection,$discussionId){
         $query = "SELECT fpr.*,fpd.discussion_title FROM forum_personal_reply fpr LEFT JOIN forum_personal_discussion fpd on fpr.discuss_id=fpd.discussion_id WHERE fpr.discuss_id='$discussionId' ";
         $result = $connection->query($query);
         return $result;
     }
     /* get answers by discussion Id */
     function getSingleAnswersByDiscussionId($connection,$discussionId){
         $query = "SELECT * FROM forum_personal_reply WHERE discuss_id='$discussionId' ";
         $result = $connection->query($query);
         return $result;
     }
	 
	 
	 /* password reset */
	 
	 function verifyEmail($connection,$userEmail){
		  $query = "SELECT * FROM forum_users WHERE user_email='$userEmail' ";
         $result = $connection->query($query);
		 if($result->num_rows > 0){
			return true;
		 }
	 }
	 
	 
	function generateRandomString($length = 20) {
			$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			 $charactersLength = strlen($characters);
			$randomString = '';
			for ($i = 0; $i < $length; $i++){
				$randomString .= $characters[rand(0, $charactersLength - 1)];
			}
			return md5($randomString);
	}
	
	function keepPasswordResetDetails($connection,$userEmail,$tokenId){
		$query = "INSERT INTO forum_password_rest SET token_id='$tokenId',user_email='$userEmail',status='0' ";
		$result = $connection->query($query);
		return $result;
	}
	
	function sentPasswordResetDetailsToEmail($userEmail,$tokenId){
			$to = "cs.ankitprajapati@gmail.com,".$userEmail;
            $subject = "Password Reset";
            // Set content-type header for sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
           // $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        // Additional headers
            $headers .= 'From: Allen Forum<info@allenforum.com>' . "\r\n";
            $headers .= 'Cc: welcome@example.com' . "\r\n";
            $headers .= 'Bcc: welcome2@example.com' . "\r\n";
            $passwordResetLink = "http://allenforum.cubersindia.com/reset/password-reset.php?request=password_reset&tokenid='.$tokenId.' ";
            $message = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Set up a new password for Allenforum</title>
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
    <span class="preheader" style="box-sizing: border-box; display: none !important; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; font-size: 1px; line-height: 1px; max-height: 0; max-width: 0; mso-hide: all; opacity: 0; overflow: hidden; visibility: hidden;">Use this link to reset your password. The link is only valid for 24 hours.</span>
    <table class="email-wrapper" width="100%" cellpadding="0" cellspacing="0" style="box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; margin: 0; padding: 0; width: 100%;" bgcolor="#F2F4F6">
      <tr>
        <td align="center" style="box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; word-break: break-word;">
          <table class="email-content" width="100%" cellpadding="0" cellspacing="0" style="box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; margin: 0; padding: 0; width: 100%;">
            <tr>
              <td class="email-masthead" style="box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; padding: 25px 0; word-break: break-word;" align="center">
                <a href="https://example.com" class="email-masthead_name" style="box-sizing: border-box; color: #bbbfc3; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; font-size: 16px; font-weight: bold; text-decoration: none; text-shadow: 0 1px 0 white;">
                 AllenFORUM
              </a>
              </td>
            </tr>
            <tr>
              <td class="email-body" width="100%" cellpadding="0" cellspacing="0" style="-premailer-cellpadding: 0; -premailer-cellspacing: 0; border-bottom-color: #EDEFF2; border-bottom-style: solid; border-bottom-width: 1px; border-top-color: #EDEFF2; border-top-style: solid; border-top-width: 1px; box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; margin: 0; padding: 0; width: 100%; word-break: break-word;" bgcolor="#FFFFFF">
                <table class="email-body_inner" align="center" width="570" cellpadding="0" cellspacing="0" style="box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; margin: 0 auto; padding: 0; width: 570px;" bgcolor="#FFFFFF">
                  
                  <tr>
                    <td class="content-cell" style="box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; padding: 35px; word-break: break-word;">
                      <h1 style="box-sizing: border-box; color: #2F3133; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; font-size: 19px; font-weight: bold; margin-top: 0;" align="left">Hi User,</h1>
                      <p style="box-sizing: border-box; color: #74787E; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; font-size: 16px; line-height: 1.5em; margin-top: 0;" align="left">You recently requested to reset your password for your Allenforum account. Use the button below to reset it. <strong style="box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif;">This password reset link is only valid for first time.</strong></p>
                      
                      <table class="body-action" align="center" width="100%" cellpadding="0" cellspacing="0" style="box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; margin: 30px auto; padding: 0; text-align: center; width: 100%;">
                        <tr>
                          <td align="center" style="box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; word-break: break-word;">
                            
                            <table width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif;">
                              <tr>
                                <td align="center" style="box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; word-break: break-word;">
                                  <table border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif;">
                                    <tr>
                                      <td style="box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; word-break: break-word;">
                                        <a href="http://allenforum.cubersindia.com/reset/password-reset.php?request=password_reset&tokenid='.$tokenId.'" class="button button--green" target="_blank" style="-webkit-text-size-adjust: none; background: #22BC66; border-color: #22bc66; border-radius: 3px; border-style: solid; border-width: 10px 18px; box-shadow: 0 2px 3px rgba(0, 0, 0, 0.16); box-sizing: border-box; color: #FFF; display: inline-block; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; text-decoration: none;">Reset your password</a>
                                      </td>
                                    </tr>
                                  </table>
                                </td>
                              </tr>
                            </table>
                          </td>
                        </tr>
                      </table>
                      <p style="box-sizing: border-box; color: #74787E; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; font-size: 16px; line-height: 1.5em; margin-top: 0;" align="left">For security, this request was received from. If you did not request a password reset, please ignore this email or <a href="#" style="box-sizing: border-box; color: #3869D4; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif;">contact support</a> if you have questions.</p>
                      <p style="box-sizing: border-box; color: #74787E; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; font-size: 16px; line-height: 1.5em; margin-top: 0;" align="left">Thanks & Regards
                        <br />Allenforum Team</p>
                      <img src="http://allenforum.cubersindia.com/home/ownImages/other/allenoverflow.png" alt="allenforum" width="200" height="40"/>
                      
                      <table class="body-sub" style="border-top-color: #EDEFF2; border-top-style: solid; border-top-width: 1px; box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; margin-top: 25px; padding-top: 25px;">
                        <tr>
                          <td style="box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; word-break: break-word;">
                            <p class="sub" style="box-sizing: border-box; color: #74787E; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; font-size: 12px; line-height: 1.5em; margin-top: 0;" align="left">If you’re having trouble with the button above, copy and paste the URL below into your web browser.</p>
                            <p class="sub" style="box-sizing: border-box; color: #74787E; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; font-size: 12px; line-height: 1.5em; margin-top: 0;" align="left">http://allenforum.cubersindia.com/reset/password-reset.php?request=password_reset&tokenid='.$tokenId.'</p>
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

	}
	
	function checkPasswordResetLinkValidity($connection,$email,$tokenId){
		$query = "SELECT * FROM forum_password_rest WHERE token_id='$tokenId' AND user_email='$email' AND status='0' ";

		$result = $connection->query($query);
		return $result;
	}


	/*
	 * Contribution post section
	 */

	function getAllContributionPostsByUserId($connection,$userId){
	    $query = "SELECT fcp.id AS post_id,fcp.post_title,fcp.post_text,fcp.posted_on AS posted_date,fs.student_name as post_author,fd.department_name as postedfor FROM forum_contribution_post fcp LEFT JOIN forum_student fs ON fcp.posted_by=fs.id LEFT JOIN forum_departments fd on fcp.posted_for=fd.id WHERE fcp.posted_by='$userId' ";
	    $result = $connection->query($query);
	    return $result;
    }
     function getContributionPostAndAuthorDetails($connection,$postId){
         $query = "SELECT fcp.id AS post_id,fcp.post_title,fcp.post_text,fcp.posted_on AS posted_date,fs.student_name as post_author,fd.department_name as postedfor FROM forum_contribution_post fcp LEFT JOIN forum_student fs ON fcp.posted_by=fs.id LEFT JOIN forum_departments fd on fcp.posted_for=fd.id WHERE  fcp.id='$postId' ";
         $result = $connection->query($query);
         return $result;
     }


     /*
      * Send feedback message
      */
     function sendFeedbackMessage($connection,$department,$feedbackTitle,$feedbackMessage,$userId){
         $feedbackDate = date('Y-m-d H:i:s');
         $query = "INSERT INTO forum_feedback SET userId='$userId',feedback_title='$feedbackTitle',feedback='$feedbackMessage',department='$department',feedback_time='$feedbackDate' ";
         $result = $connection->query($query);
         if ($result){
             return $result;
         }
     }

     /*
      * Password reset of allenforum
      */

     function checkCurrentPassword($connection,$currentPassword,$loginId){
         $currentPassword = sha1($currentPassword);
         $query = "SELECT * FROM forum_users WHERE user_pass='$currentPassword' AND id='$loginId' ";
         $result = $connection->query($query);
         return $result;
     }
     function changedPassword($connection,$re_new_password,$loginId){
         $re_new_password = sha1($re_new_password);
         $query = "UPDATE forum_users SET user_pass='$re_new_password' WHERE id='$loginId' ";
         $result = $connection->query($query);
         return $result;
     }

     function getAllDiscussionPosts($connection,$department,$userrole,$userId){

         $query = "SELECT fq.*,fs.student_name AS asking_name,fs.student_profile AS asking_profile FROM forum_questions fq 
LEFT JOIN forum_student fs ON fq.asked_by=fs.id WHERE (fq.department = '$department' OR fq.department = 'n') AND 
(fq.to_whome = '$userrole' OR fq.to_whome = 'all') AND(fq.status=1) OR (fq.asked_by='$userId') ORDER BY fq.q_id DESC
";
        // echo $query; die();

            $result = $connection->query($query);
        return $result;


     }

     /*
      * Send Receptionist Notices
      */

     function saveReceptionistNotices($connection,$noticeFor,$noticeDate,$noticeSubject,$noticeText,$receptionistId,$userRole,$userEmailss,$noticeAction,$hiddenNoticeEditId){
         $noticeDate = date('Y-m-d',strtotime($noticeDate));
         if ($noticeAction == "add") {

             /*
              * Send emails also
              */
             $to = "cs.ankitprajapati@gmail.com," . $userEmailss;
             $subject = "Notice Board";
             // Set content-type header for sending HTML email
             $headers = "MIME-Version: 1.0" . "\r\n";
             $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
             // Additional headers
             $headers .= 'From: Allen Forum<info@allenforum.com>' . "\r\n";
             $headers .= 'Cc: welcome@example.com' . "\r\n";
             $headers .= 'Bcc: welcome2@example.com' . "\r\n";
             $message = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Receptionist | Allenhouse</title>
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
    <span class="preheader" style="box-sizing: border-box; display: none !important; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; font-size: 1px; line-height: 1px; max-height: 0; max-width: 0; mso-hide: all; opacity: 0; overflow: hidden; visibility: hidden;">Reception,Allenhouse Institute of Technology informs you that a new Notice shared with you.</span>
    <table class="email-wrapper" width="100%" cellpadding="0" cellspacing="0" style="box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; margin: 0; padding: 0; width: 100%;" bgcolor="#F2F4F6">
      <tr>
        <td align="center" style="box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; word-break: break-word;">
          <table class="email-content" width="100%" cellpadding="0" cellspacing="0" style="box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; margin: 0; padding: 0; width: 100%;">
            <tr>
              <td class="email-masthead" style="box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; padding: 25px 0; word-break: break-word;" align="center">
                <a href="http://allenforum.cubersindia.com" class="email-masthead_name" style="box-sizing: border-box; color: #bbbfc3; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; font-size: 16px; font-weight: bold; text-decoration: none; text-shadow: 0 1px 0 white;">
               Notice Board </a>
              </td>
            </tr>
            <tr>
              <td class="email-body" width="100%" cellpadding="0" cellspacing="0" style="-premailer-cellpadding: 0; -premailer-cellspacing: 0; border-bottom-color: #EDEFF2; border-bottom-style: solid; border-bottom-width: 1px; border-top-color: #EDEFF2; border-top-style: solid; border-top-width: 1px; box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; margin: 0; padding: 0; width: 100%; word-break: break-word;" bgcolor="#FFFFFF">
                <table class="email-body_inner" align="center" width="570" cellpadding="0" cellspacing="0" style="box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; margin: 0 auto; padding: 0; width: 570px;" bgcolor="#FFFFFF">
                  <tr>
                    <td class="content-cell" style="box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; padding: 35px; word-break: break-word;">
                      <h1 style="box-sizing: border-box; color: #2F3133; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; font-size: 19px; font-weight: bold; margin-top: 0;" align="left">Hi, Allenits!</h1>
                      <p style="box-sizing: border-box; color: #74787E; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; font-size: 16px; line-height: 1.5em; margin-top: 0;" align="left">Greetings of the Day,<br/>
                        We hope you actively participating in Allenforum discussion,to resolve doubts of each other. Its a duty to inform you that an important ntoice has been  shared with you
                        </p> <p>for checking about it login to your  <b>Allenforum accunt</b></p>
                      <table class="body-action" align="center" width="100%" cellpadding="0" cellspacing="0" style="box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; margin: 30px auto; padding: 0; text-align: center; width: 100%;">
                        <tr>
                          <td align="center" style="box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; word-break: break-word;">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif;">
                              <tr>
                                <td align="center" style="box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; word-break: break-word;">
                                  <table border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif;">
                                    <tr>
                                      <td style="box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; word-break: break-word;">
                                        <a href="http://allenforum.cubersindia.com" class="button button--" target="_blank" style="-webkit-text-size-adjust: none; background: #ee5d42; border-color: #ee5d42; border-radius: 3px; border-style: solid; border-width: 10px 18px; box-shadow: 0 2px 3px rgba(0, 0, 0, 0.16); box-sizing: border-box; color: #FFF; display: inline-block; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; text-decoration: none;">Check</a>
                                      </td>
                                    </tr>
                                  </table>
                                </td>
                              </tr>
                            </table>
                          </td>
                        </tr>
                      </table>
                      <p style="box-sizing: border-box; color: #74787E; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; font-size: 16px; line-height: 1.5em; margin-top: 0;" align="left">Regards
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
             @mail($to, $subject, $message, $headers);
             $query = "INSERT INTO forum_notices SET notice_subject='$noticeSubject',notice='$noticeText',permission='$noticeFor',postedBy='$receptionistId',postedByUserType='$userRole',date_time='$noticeDate' ";
         } else if ($noticeAction == "edit"){
             if ($hiddenNoticeEditId) {
                 $query = "UPDATE forum_notices SET notice_subject='$noticeSubject',notice='$noticeText',permission='$noticeFor',postedBy='$receptionistId',postedByUserType='$userRole',date_time='$noticeDate' WHERE notice_id='$hiddenNoticeEditId'";
             }

         }

         $result = $connection->query($query);
         return $result;
     }

     function getEmailsToSendNotice($connection,$usertype){
         $emailsArr = array();
         if ($usertype == "all"){
             $getStudentEmails = $connection->query("SELECT fs.student_name,fu.user_email FROM forum_student fs LEFT JOIN forum_users fu ON fs.user_id=fu.id WHERE fu.user_role='student' AND fs.emailSms='1' ");
             $getFacultyEmails = $connection->query("SELECT ff.name,fu.user_email FROM forum_faculty ff LEFT JOIN forum_users fu on ff.user_id=fu.id WHERE fu.user_role='faculty' AND ff.emailSms='1'");

             if ($getStudentEmails->num_rows > 0) {
                 while ($emails = $getStudentEmails->fetch_object()) {
                     $emailsArr[] = $emails->user_email;
                 }
             }
             if ($getFacultyEmails->num_rows > 0) {
                 while ($emails2 = $getFacultyEmails->fetch_object()) {
                     $emailsArr[] = $emails2->user_email;
                 }
             }

         } else if ($usertype == "students"){
             $getEmails = $connection->query("SELECT fs.student_name,fu.user_email FROM forum_student fs LEFT JOIN forum_users fu ON fs.user_id=fu.id WHERE fu.user_role='student' AND fs.emailSms='1' ");
         }
         else if ($usertype == "faculties"){
             $getEmails = $connection->query("SELECT ff.name,fu.user_email FROM forum_faculty ff LEFT JOIN forum_users fu on ff.user_id=fu.id WHERE fu.user_role='faculty' AND ff.emailSms='1'");
         }
         if (@$getEmails->num_rows > 0) {
             while ($emails = $getEmails->fetch_object()) {
                 $emailsArr[] = $emails->user_email;
             }
         }
         return $emailsArr;
     }

     /*
      * function get get Greetings !
      */
     function getGreetings(){
         /* This sets the $time variable to the current hour in the 24 hour clock format */
         $time = date("H");
         /* Set the $timezone variable to become the current timezone */
         $timezone = date("e");
         /* If the time is less than 1200 hours, show good morning */
         if ($time < "12") {
             return "GM";
         }
         /* If the time is grater than or equal to 1200 hours, but less than 1700 hours, so good afternoon */
         else if ($time >= "12" && $time < "17") {

             return "GA";
             }
         /* Should the time be between or equal to 1700 and 1900 hours, show good evening */
         else  if ($time >= "17" && $time < "19") {
             return "GE";
         }
         /* Finally, show good night if the time is greater than or equal to 1900 hours */

         else if ($time >= "19") {
             return "GN";
         }
     }

     /*
      * save CV Details
      */

     function saveCVdetails($connection,$cvname,$cvFathersName,$cvEmail,$cvContact,$cvDob,$cvGender,
                            $cvNationality,$cvLanguages,$cvHobbies,$cvStrengths,$cvPermanentAddress,$carrierObjective,$extraCarricularData,$userId,$userRole) {

         $querySaveCV = "INSERT INTO forum_cv SET name='$cvname',fathersName='$cvFathersName',email='$cvEmail',
contact='$cvContact',dob='$cvDob',gender='$cvGender',nationality='$cvNationality',languages='$cvLanguages',hobbies='$cvHobbies',
strengths='$cvStrengths',address='$cvPermanentAddress',carrierObj='$carrierObjective',extraCarricular='$extraCarricularData',userId='$userId',userRole='$userRole' ";
         $cvResult = $connection->query($querySaveCV) or die("Error in insert id query:".$connection->error);
         if ($cvResult)
         {
             return $connection->insert_id;
         }

     }

     function saveCvQualifications($connection,$savedCvId,$cvQualification,$cvSchool_college,$cvQualificationPer,$cvQualificationBoardUni)
     {
         $query = "INSERT INTO forum_cv_qualifications SET cvId='$savedCvId',qualification='$cvQualification',
          percentage='$cvQualificationPer',boardUniversity='$cvQualificationBoardUni',schoolCollege='$cvSchool_college' ";
         $result  = $connection->query($query) or die("Error to insert qualification".$connection->error);
         if ($result){
             return $result;
         }

     }

     function saveTraningNskills($connection,$savedCvId,$traningTechTitle,$traningTechSkill)
     {
         $query ="INSERT INTO forum_cv_skills SET cvId='$savedCvId', skillTitle='$traningTechTitle',skillName='$traningTechSkill'";
         $result = $connection->query($query) or die("Error to insert traningNskills".$connection->error);
         if ($result){
             return $result;
         }
     }

     function saveCvProjectDetails($connection,$savedCvId,$academicProjTitle,$academicProjDes)
     {
         $query = "INSERT INTO forum_cv_projects SET cvId='$savedCvId',projectTitle='$academicProjTitle',projectDescription='$academicProjDes' ";
         $result = $connection->query($query) or die("Error to insert cv projects".$connection->error);
         if ($result){
             return $result;
         }

     }

     function getCvDetails($connection,$userId,$userRole)
     {
         $query = "SELECT * FROM forum_cv WHERE userId='$userId' AND userRole='$userRole'";
         $result = $connection->query($query);
         if ($result)
         {
             return $result;
         }
     }

     function getCvEducationDetails($connection,$cvId){
         $query = "SELECT * FROM forum_cv_qualifications WHERE cvId = '$cvId'" ;
         $result = $connection->query($query) or die("Error in getting education details".$connection->error);
         if ($result)
         {
             return $result;
         }
     }

     function getCvAcademicProjects($connection,$cvId)
     {
         $query = "SELECT * FROM forum_cv_projects WHERE cvId = '$cvId'" ;
         $result = $connection->query($query) or die("Error in gettting project details".$connection->error);
         if ($result)
         {
             return $result;
         }
     }

     function getcvTrainingnSkills($connection,$cvId)
     {
         $query = "SELECT * FROM forum_cv_skills WHERE cvId = '$cvId'" ;
         $result = $connection->query($query) or die("Error in gettting traing and skills details".$connection->error);
         if ($result)
         {
             return $result;
         }
     }

     function isCvDetailsCompleted($connection,$userId,$userrole)
     {
         $query = "SELECT * FROM forum_student WHERE cvDetails='1' AND id='$userId' ";
         $result = $connection->query($query) or die("Error in checking cv details".$connection->error);
         if ($result)
         {
             return $result;
         }
     }

     function updateCvDetailStatus($connection,$cvStatus,$userId)
     {
         $query = "UPDATE forum_student SET cvDetails='$cvStatus' WHERE id='$userId' ";
         $result = $connection->query($query) or die("Error in updateing cv status".$connection->error);
         if ($result)
         {
             return $result;
         }
     }














 } //class