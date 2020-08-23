/*
File Name : forum-common.js
 */

/*
forum like dislike
 */

function forumLike(ques_id) {
    var like_data = '';
    var sample = '';
    $.ajax({
        method : 'POST',
        url    : 'functions/common/common-ajax-request.php',
        data   :{
            likeBtn : 'likeBtn',
            question_id : ques_id,
        },
        success : function (response) {
           like_data = response.split('^');

            if (like_data[0] == 'already'){
                $("#likeValue"+ques_id).show();
                $("#likedValue"+ques_id).hide();

                $("#likeValue"+ques_id).html(like_data[1]);

                $( "#likeValue"+ques_id ).attr({
                    title: like_data[1]+"likes"
                });


            } else { // if (like_data[1] == 'new'){
                $("#likeValue"+ques_id).hide();
                $("#likedValue"+ques_id).show();

                $("#likedValue"+ques_id).html(like_data[1]);

                $( "#likedValue"+ques_id ).attr({
                    title: like_data[1]+"likes"
                });
            }
        }
    });
}

function follow_unfollow(userId,userRole) {
    $.post('scripts/follow/follow-unfollow-script.php',{q:'follow',user_id : userId,userRole:userRole},function (res,status) {
        $("#follow"+userId+userRole).html(res);
        //alert(res);
        
    });
}



/*
    Forum Share
 */

$("#checkShareMaster").click(function(){
    $('input:checkbox').not(this).prop('checked', this.checked);
});


function getQuestion(ques_id) {
   var question_id = ques_id;
   $("#questionIdToShare1").html(question_id);
   $("#questionIdToShare").val(question_id);
}

$("form#quesShareForm").on('submit',function (e) {
    e.preventDefault();
    var quesId = $("#questionIdToShare").val();
      var students = []; var studentemails = [];
      $('.checkstudentShare').each(function () {
          if($(this).is(":checked")){
              students.push($(this).val());
          }
      });
      if (students.length == 0){
          alert('Please Select atleast One Student');
      } else{
          $("#shareQuesBtn").hide();
          $("#shareQuesBtnLoading").show();
          $.post('functions/common/common-ajax-request.php', { share:'letsShare',students:students,questionId:quesId},
          function (data) {
              if (data == "done"){
                  $("form#quesShareForm").each(function(){
                      this.reset();
                  });
                  $("#modalShareQues").modal('hide');
              }
              $("#shareQuesBtnLoading").hide();
              $("#shareQuesBtn").show();
              $('#sharedTick'+quesId).show();

          });
      }
});

/*
Anser Rating Scripts goes here
 */
function setAnswerIDToRate(anserId) {
    $("#answerIdToShare").val(anserId);
}
$("form#answerRatingForm").on('submit',function (e) {
    e.preventDefault();
    $("#answerRatingSubmitBtn").hide();
    $("#answerRatingSubmitBtnLoading").show();
    var answerIdToShare = $("#answerIdToShare").val();
    var starValue = $("input[name='star']:checked").val();
    $.post('functions/common/common-ajax-request.php',{rateIt:'rateAnswer',answerIdToShare:answerIdToShare,starValue:starValue},
        function (response) {
        if (response == 'success'){
            $("form#answerRatingForm").each(function(){
                this.reset();
            });
            $("#answerRatingModal").modal('hide');
            $("#answerRatingSubmitBtn").show();
            $("#answerRatingSubmitBtnLoading").hide();
        }
            $("#rateThisAnser"+answerIdToShare).html('<button disabled class="btn btn-default btn-xs" title="You have Already Rated It !"><i class="fa fa-check" style="color: #ffaf2d;font-size: 15px;"></i> Rated</button>');

        });
});


/*
Higher Studies
 */
$(function(){
    $('input:radio').change(function(){
        var uploadPtion = $("input[name='higherStudiesUploadOption']:checked").val();
        if (uploadPtion == 'link'){
            $("#fileLink").show();
            $("#fileUpload").hide();
        } else if (uploadPtion == 'upload'){
            $("#fileLink").hide();
            $("#fileUpload").show();
        }
    });
});
function validateFile() {
    var ext = $('#higherStudyUploadFile').val().split('.').pop().toLowerCase();
    if($.inArray(ext, ['gif','png','jpg','jpeg','doc','docx','pdf']) == -1) {
        alert('Invalid File,Please Upload Correct File !');
        $("#higherStudyUploadFile").val("");
        return false;
    }
}
$("form#higherStudyMaterialUploadForm").on('submit',function (e) {
    e.preventDefault();
    var higherStudyUploadFile = $("#higherStudyUploadFile").val();
    var higherStudyFileLink = $("#higherStudyFileLink").val();
    $("#higherStudUploadBtn").hide();
    $("#higherStudUploadBtnLoading").show();
    if (higherStudyUploadFile != '' || higherStudyFileLink != ''){
        $.ajax({
            type: 'POST',
            url: 'functions/common/common-ajax-request.php',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (response) {
                alert("Thanks For Your Contribution in Allen Forum");
                $("#addHigherStudiesMaterial").modal('hide');
                $("form#higherStudyMaterialUploadForm").each(function(){
                    this.reset();
                });
                window.location.reload();
            },
            complete: function () {
                $("#fileLink").hide();
                $("#fileUpload").show();
                $("#higherStudUploadBtn").show();
                $("#higherStudUploadBtnLoading").hide();
            }
        });
    }
    else {
        $("#higherStudUploadBtn").show();
        $("#higherStudUploadBtnLoading").hide();
        $("#file_upload_err").show();
        setTimeout(function() {
            $('#file_upload_err').fadeOut('fast');
        }, 1000);
        $("#higherStudyUploadFile").focus();
        $("#higherStudyFileLink").focus();
    }
});



/*
Forum Ask Questions
 */

$("form#askquestion_form").on('submit',function (e) {
   e.preventDefault();
  var askWithWhome = $("#askWithWhome").val();
  var askWithWhomeCourse = $("#askWithWhomeCourse").val();
  var department_branch = $("#department_branch").val();
  var shareWithYear = $("#shareWithYear").val();
  var question_title = $("#question_title").val();
  var your_question = CKEDITOR.instances.your_question.getData();

    if (askWithWhome == ""){
      alert("Please Select Authority");
      $("#askWithWhome").focus();
      return false;
  }
  else  if (askWithWhomeCourse == ""){
      alert("Please Select Course");
      $("#askWithWhomeCourse").focus();
      return false;
  }
  else  if (department_branch == ""){
      alert("Please Select a Department");
      $("#department_branch").focus();
      return false;
  }
  else  if (shareWithYear == ""){
      alert("Please Select a Year");
      $("#shareWithYear").focus();
      return false;
  }
  else  if (question_title == ""){
      alert("Please Enter a Title");
      $("#question_title").focus();
      return false;
  }
  else  if (your_question == ""){
      alert("Please Enter your query");
      $("#your_question").focus();
      return false;
  }
  else{
        $("#askQuestionBtn").html('<i class="fa fa-spinner fa-spin" style="font-size:18px"></i>');
        var formdata =  new FormData(this);
        formdata.append('content', CKEDITOR.instances['your_question'].getData());

        $.ajax({
            url: "functions/common/common-ajax-request.php", // Url to which the request is send
            type: "POST",             // Type of request to be send, called as method
            data: formdata, 		// Data sent to server, a set of key/value pairs (i.e. form fields and values)
            contentType: false,       // The content type used when sending data to the server.
            cache: false,             // To unable request pages to be cached
            processData: false,        // To send DOMDocument or non processed data file it is set to false
            success: function (data)   // A function to be called if request succeeds
            {
              //  alert(data);
                var response = data.split('^');
                if (response[1] == "saved") {
                    $("form#askquestion_form").each(function () {
                        this.reset();
                    });
                }
                $("#askQuestionBtn").html('Send <i class="fa fa-arrow-circle-right"></i>');
                CKEDITOR.instances.your_question.setData("");
              window.location.href="forum-dicussion.php?myactivity=active&status=Your Query successfully posted";
            }
        });
  }
});



/*
Forum Give Answer
 */

function setQuestionId(question_id) {
    $("#questionsIdToGetQues").val(question_id);
    var questionId = $("#questionsIdToGetQues").val();
    $.post('functions/common/common-ajax-request.php',{getQues:'getQuestion',quesId:questionId},function (response) {
        $("#question_label").html(response);
    });
}

$("form#forumGiveAnswer").on('submit',function (e) {
    e.preventDefault();
    var questionId = $("#questionsIdToGetQues").val();
    var answerText = CKEDITOR.instances['answerText'].getData();
    if (answerText == "") {
        alert("Please Write the Answer !");
        return false;
    } else {
        $("#sendAnsBtn").hide();
        $("#sendAnsBtnLoading").show();
        $.post('functions/common/common-ajax-request.php', {
                giveAns: 'giveAnswer',
                questionId: questionId,
                answerText: answerText
            },
            function (response) {
           // alert(response);
                var res = response.split('^');
                if (res[0] == 'success') {
                    if (res[1] == '1') {
                        $("#statusNotAns" + questionId).hide();
                        $("#statusAnsGiven" + questionId).show();
                    } else if (res[1] == 'n') {
                        $("#statusAnsGiven" + questionId).show();
                    }
                    $("#answerIdToSave").val(res[2]);// answer id
                    $("#questionsIdToGetQues").val(questionId); //questionid
                    $("#modalGiveAnswer").modal('hide');
                    $("form#forumGiveAnswer").each(function () {
                        this.reset();
                    });
                    CKEDITOR.instances.answerText.setData("");
                    $("#sendAnsBtnLoading").hide();
                    $("#sendAnsBtn").show();
                    getAnswerCountByQuesId(questionId);
                    $("#modalSaveAnswers").modal('show');
                }
            });
    }
});

/*
Save Answer while giving answer to the question
 */

$("form#saveAnswerForm").on("submit",function (e) {
    e.preventDefault();
    saveMyAnswer();
});

function saveMyAnswer() {
    $("#saveAnswerBtn").html('<i class="fa fa-spinner fa-spin" style="font-size:18px"></i> Saving...');
    var questionId = $("#questionsIdToGetQues").val();
    var answerIdToSave = $("#answerIdToSave").val();
    $.post("functions/common/common-ajax-request.php",{saveAnswer:'saveMyAnswer',questionId:questionId,answerIdToSave:answerIdToSave},function (response) {
        var res = response.split('^');
        if (res[1] == "answerSaved"){
          //  alert("Answer Saved");
            $("#saveAnswerMessage").fadeIn("slow");
            $("#saveAnswerMessage").html('<img src="ownImages/other/saved-answer.png" /><h4>Saved</h4>');
            $("#closeNoBtn").hide();
            $("#saveAnswerBtn").html('Ok');
            $("#saveAnswerBtn").attr({
                type:"button",
                "data-dismiss":"modal",
            });
        }
    });

}

function getAnswerCountByQuesId(questionId) {
    $.post('functions/common/common-ajax-request.php',{ansCount:'getAnswerCount',questionId:questionId},
        function (answCount) {
        $("#ansCount"+questionId).html(answCount);
    });
}

function getActivityContent() {
    $("#activityLoader").show();
     var searchActivity = $("#searchActivity").val();
     $.ajax({
         url :'functions/common/common-ajax-request.php',
         data : {searchActivityEven:'selectActivity',searchActivitytype:searchActivity},
         method:'POST',
         success : function (response) {
            $("#activityDiv").html(response);
            $("#activityLoader").hide();
         }
     });
}


/*
Circular/Notice
 */
$(document).ready(function () {
    loadCircularNotice();
});
 /* load the circular/Notice data */
 function loadCircularNotice() {
     $("#notice_loader").show();
     $.post("functions/common/common-ajax-request.php",{notice:'loadNoticeData'},function (notices) {
         $("#notice-data").html(notices);
         $("#notice_loader").hide();
     });
 }

 /*
 Add Notices
  */

 $("form#addNoticeForm").on("submit",function (e) {
     e.preventDefault();
    var noticeFor = $("#noticeFor").val();
    var noticeDate = $("#noticeDate").val();
    var noticeSubject = $("#noticeSubject").val();
    var noticeText =  CKEDITOR.instances.noticeText.getData();
    var noticeAction = $("#noticeAction").val();
    var hiddenNoticeEditId = $("#hiddenNoticeEditId").val();
    if (noticeFor == ""){
        alert("Please Select the Users");
        $("#noticeFor").focus();
        return false;
    } else if (noticeDate == ""){
        alert("Please Select the Date");
        $("#noticeDate").focus();
        return false;
    }
    else if (noticeSubject == ""){
        alert("Please enter the notice subject ");
        $("#noticeSubject").focus();
        return false;
    }
    else if (noticeText == ""){
        alert("Please enter the notice ");
        $("#noticeText").focus();
        return false;
    }else{
        $("#addNoticeBtn").html('<i class="fa fa-spinner fa-spin" style="font-size:18px"></i>');
        $.post("functions/common/common-ajax-request.php",{
            sendNotice:'addNotices',
            noticeFor:noticeFor,
            noticeDate:noticeDate,
            noticeSubject:noticeSubject,
            noticeText:noticeText,
            noticeAction:noticeAction,
            hiddenNoticeEditId:hiddenNoticeEditId
        },function (response) {
            var res = response.split('^');
            if (res[1] == "noticeSend") {
                $("#addNoticeBtn").html('Send <i class="fa fa-arrow-circle-right"></i>');
                window.location.href="view-notice.php";
            }

        });
    }

 });



 /*
 User Block
  */

function blockUserById(userId,blockedBy,type,e) {
  e.preventDefault();
  $("#blockUnblockLoader"+userId).show();
    $.post("functions/common/common-ajax-request.php",{blockUser:'userBlock',userId:userId,blockedBy:blockedBy,type:type},function (response) {
       var blockRes = response.split('^');
        if (blockRes[1] == 'success'){
            if (blockRes[2] == '1'){
                $("#unblockIt"+userId).hide();
                $("#blockIt"+userId).show();
            } else if (blockRes[2] == '0'){
                $("#unblockIt"+userId).show();
                $("#blockIt"+userId).hide();
            }
        }
        $("#blockUnblockLoader"+userId).hide();
    });

}


/*
Single Discussion
 */

$(document).ready(function () {
 getSingleDiscussionData();

});

function getSingleDiscussionData() {
    $("#loadDiscussionList").show();
    var discussDepartment = $("#discussDepartment").val();
    var discussionUserrole = $("#discussionUserrole").val();
    var discussionNameSearch = $("#discussionNameSearch").val();
    // alert(discussionNameSearch);

    $.post("functions/common/common-ajax-request.php",{discussionSingle:'singleDiscussion',discussDepartment:discussDepartment,discussionUserrole:discussionUserrole,discussionNameSearch:discussionNameSearch},function (response) {
       // alert(response);
        $("#discussion-users").html(response);
        $("#loadDiscussionList").hide();

    });
}

function setDiscussionPersonId(personId) {
    $("#discussionPersonId").val(personId);
}

$("form#singleDiscussionForm").on('submit',function (e) {
    e.preventDefault();

    var discussionMessage = CKEDITOR.instances['discussionMessage'].getData();
    var discussionTitle = $("#discussionTitle").val();
    var discussionPersonId = $("#discussionPersonId").val();
   if (discussionTitle == ''){
       alert("Please Enter Discussion Title");
       $("#discussionTitle").focus();
       return false;
   } else if (discussionMessage == ''){
       alert("Please Enter Some Text");
       $("#discussionMessage").focus();
       return false;
   } else{
       $("#sendSingleDiscussion").hide();
       $("#sendSingleDiscussionBtnLoading").show();
       $.post("functions/common/common-ajax-request.php",{sendSingleDiscussion:'sendSingleDiscussion',discussionTitle:discussionTitle,discussionMessage:discussionMessage,discussionPersonId:discussionPersonId},function (response) {
           var res = response.split('^');
           $("form#singleDiscussionForm").each(function(){
               this.reset();
           });
           if (res[1] == 'sent'){
               window.location.href="forum-start-chat.php";
           }
       });
   }
});

function getSingleDiscussionMessages() {
    $("#loadDiscussionList").show();

    var discussionTitle = $("#discussionNameSearch").val();
  //  $("#loadDiscussionList").show();

    $.post("functions/common/common-ajax-request.php",
        {
            getSingleDiscussionMessagesList:'getSingleDiscussionMessagesList',
            discussionTitle:discussionTitle
        },
        function (response) {
        // alert(response);
        $("#discussion-users-content").html(response);
        $("#loadDiscussionList").hide();

    });
}

function getSingleDiscussionDetailById(discussionId) {
    $.post("functions/common/common-ajax-request.php",{viewSingleDiscussion:'viewSingleDiscussion',discussionId:discussionId},function (response) {
       // alert(response);
        var data = response.split('^');
        var title = data[1];
        var message = data[2];
        var answer = data[3];
        $("#single-discussion-title").html(title);
        $("#single-discussion-message").html(message);
        $("#single-discussion-answer").html(answer);

    });
}

/*
get Inbox Messages Personally 
 */

function getSingleDissInboxMessages() {
    $("#messageLoader").show();
    $("#messageLoader2").show();

    var inboxMessageSearch = $("#inboxMessageSearch").val();
   // var discussedMessageSearch = $("#discussedMessageSearch").val();
   $.ajax({
       url : "functions/common/common-ajax-request.php",
       data :{getPersonalInboxMessgaes:'getPersonalInboxMessgaes',inboxMessageSearch:inboxMessageSearch},
       method : 'POST',
       success : function (response) {
           //alert(response);
           var messages = response.split('^');
           $("#personal-msg-list").html(messages[0]);
           // $("#personal-msg-discussed").html(messages[1]);
           $("#messageLoader").hide();
           $("#messageLoader2").hide();

       }
   });
}

function giveAnswerPersonally(discussion_id,person_id,event) {
    event.preventDefault();
     $.post("functions/common/common-ajax-request.php",{getPersonalDiscussionDetails:'getPersonalDiscussionDetails',discussion_id:discussion_id},function (response) {
        //alert(response);
         $("#forumGiveAnswerPersonally").modal('show');
         var res_data = response.split('^');
         $("#question_label").html(res_data[2]);
         $("#personalDisId").val(discussion_id);
     });
}

/* submit the form of givening answer personally */

$("form#forumGiveAnswerPersonally").on('submit',function (e) {
    e.preventDefault();
    var discussionMessage = CKEDITOR.instances['answerText'].getData();
    var personalDisId = $("#personalDisId").val();
    if (discussionMessage == ''){
        alert("Please Write Answer !");
        return false;
    } else{
       $.ajax({
           url : "functions/common/common-ajax-request.php",
           data :{givePersonalAnswer:'givePersonalAnswer',personalDisId:personalDisId,discussionMessage:discussionMessage},
           method : 'POST',
           success : function (response) {
            if (response == "saved"){
                $("#forumGiveAnswerPersonally").modal('hide');
                // window.location.href = "personal-discussion-box.php?tab=discussed_active";
                window.location.reload();
            }
           }
       });
    }

});

/* see given Answer */
function seeGivenAnswer(discussionId) {
   $.post("functions/common/common-ajax-request.php",{viewAnswerByDiscussionId:'viewAnswerByDiscussionId',discussionId:discussionId},function (response) {
       var res = response.split('^');
       $("#forumViewAnswerPersonally").modal('show');
       $("#discussion_title_label").html(res[1]);
       $("#answer_label").html(res[2]);
       $("#answers_list_by_person").html(res[3]);
   });
}


/****************************** Masters Data by On change****************************************
 *  // here onchange functions will be running
 */

function getDepartmentsByCourse(courseId) {
   // alert(courseId);
    $.post("functions/common/common-ajax-request.php",{getDepartmentById:'getDepartmentById',courseId:courseId},function (response) {
        //alert(response);
        var res = response.split('^');
        $("#student_program").html(res[1]);

    });
}



/*
Send Feedack regarding allenforum issue or anything else
 */

$("form#feedbackForm").on("submit",function (e) {
    e.preventDefault();
    var departmemt = $("#departmemt").val();
    var post_title = $("#post_title").val();
    var feedback_text = CKEDITOR.instances.feedback_text.getData();
    if (departmemt == ""){
        alert("Please select the department");
        $("#departmemt").focus();
    } else if (post_title == ""){
        alert("Please enter the feedback title");
        $("#post_title").focus();
    } else if (feedback_text == ""){
        alert("Please enter the feedback");
        $("#feedback_text").focus();
    }else{
        $("#writefeedbackBtn").html('<i class="fa fa-spinner fa-spin" style="font-size:18px"></i>');
        $.ajax({
           url : "functions/common/common-ajax-request.php",
           method: "POST",
           data :{sendFeedback:'sendFeedbackMessage',department:departmemt,postTitle:post_title,feedbackMessage:feedback_text},
           success: function (response) {
            var res = response.split('^');
            if (res[1] == 'sendFeedback'){
                $("#feedbackresponse").show();
                $("#feedbackresponse").fadeOut(2000);
                $("#departmemt").val("");
                $("#post_title").val("");
                CKEDITOR.instances.feedback_text.setData("");
                $("#writefeedbackBtn").html('Send Feedback <i class="glyphicon glyphicon-flag"></i>');
            }
           }
       });
    }
});


/*
Password Reset of Allenforum
 */

$("form#passwordResetForm").on("submit",function (e) {
    e.preventDefault();
   var current_password = $("#current_password").val();
   var new_password = $("#new_password").val();
   var re_new_password = $("#re_new_password").val();
   if (current_password == ""){
       alert("Please enter your current password ");
       $("#current_password").focus();
   }
   else if (new_password == ""){
        alert("Please enter new password ");
        $("#new_password").focus();
    }
   else if (re_new_password == ""){
       alert("Please enter confirm password ");
       $("#re_new_password").focus();
   }
   else if (new_password != re_new_password){
      // alert("Password and confirm password does not matched !");
       $("#passwordResetResponse").show();
       $("#passwordResetResponse").html('<div class="alert bg-red-gradient">Password and confirm password not matched !</div>');
       $("#passwordResetResponse").fadeOut(3000);
   }
   else{
       $("#changePassBtn").html('<i class="fa fa-spinner fa-spin" style="font-size:18px"></i> Processing...');
       $.post("functions/common/common-ajax-request.php",   {
            changePassword:'passwordChange',
            current_password:current_password,
            new_password:new_password,
            re_new_password:re_new_password
            },
            function (response) {
            var res = response.split('^');
            if (res[1] == "notmatched"){
                $("#passwordResetResponse").show();
                $("#passwordResetResponse").html('<div class="alert bg-red-gradient">Your Current password not matched  !</div>');
                $("#passwordResetResponse").fadeOut(3000);
            }
            else  if (res[1] == "changed"){
                $("#passwordResetResponse").show();
                $("#passwordResetResponse").html('<div class="alert bg-green-gradient">Success! Password Changed</div>');
                $("#passwordResetResponse").fadeOut(3000);
                $("#current_password").val("");
                $("#new_password").val("");
                $("#re_new_password").val("");
            }
                $("#changePassBtn").html(' Reset <i class="fa fa-check"></i>');

            });
   }


});


/*
  create your CV
*/

$("form#createCVForm").on("submit",function (e) {
    e.preventDefault();
    var numrows  = $("#numrows").val();
    var numrows1 = $("#numrows1").val();
    var numrows2 = $("#numrows2").val();
    var numrows3 = $("#numrows3").val()


    var cvName = $("#cvName").val();
    var cvFathersName = $("#cvFathersName").val();
    var cvEmail = $("#cvEmail").val();
    var cvContact = $("#cvContact").val();
    var cvDob = $("#cvDob").val();
    var cvGender = $("#cvGender").val();
    var cvNationality = $("#cvNationality").val();
    var cvLanguages = $("#cvLanguages").val();
    var cvHobbies = $("#cvHobbies").val();
    var cvStrengths = $("#cvStrengths").val();
    var cvPermanentAddress = $("#cvPermanentAddress").val();
    var carrierObjective = $("#carrierObjective").val();

    var cvQualification = $("#cvQualification"+numrows).val();
    var school_college = $("#school_college"+numrows).val();
    var cvQualificationPer = $("#cvQualificationPer"+numrows).val();
    var cvQualificationBoardUni = $("#cvQualificationBoardUni"+numrows).val();

    var traningTechTitle = $("#traningTechTitle"+numrows1).val();
    var traningTechSkill = $("#traningTechSkill"+numrows1).val();

    var extraCarricular = $("#extraCarricular"+numrows2).val();

    var academicProj = $("#academicProj"+numrows3).val();
    var academicProjDes = $("#academicProjDes"+numrows3).val();
    var formdata =  new FormData(this);


    if (cvName == ""){
        alert("Please Enter your name");
        $("#cvName").focus();
    }
     else if (cvFathersName == ""){
        alert("Please Enter your fathers name");
        $("#cvFathersName").focus();
    }
    else if (cvEmail == ""){
        alert("Please Enter your email address");
        $("#cvEmail").focus();
    }
    else if (cvContact == ""){
        alert("Please Enter your contact");
        $("#cvContact").focus();
    }
    else if (cvDob == ""){
        alert("Please select your dob");
        $("#cvDob").focus();
    }
    else if (cvGender == ""){
        alert("Please select your gender");
        $("#cvGender").focus();
    }
    else if (cvNationality == ""){
        alert("Please senter your nationality");
        $("#cvNationality").focus();
    }
    else if (cvLanguages == ""){
        alert("enter your languages comma separated");
        $("#cvLanguages").focus();
    }
    else if (cvHobbies == ""){
        alert("enter your hobbies comma separated");
        $("#cvHobbies").focus();
    }
    else if (cvStrengths == ""){
        alert("enter your strengths");
        $("#cvStrengths").focus();
    }
    else if (cvPermanentAddress == ""){
        alert("enter your permanent address");
        $("#cvPermanentAddress").focus();
    }
    else if (carrierObjective == ""){
        alert("Please enter carrier objective");
        $("#carrierObjective").focus();
    }
    else if (cvQualification == ""){
        alert("Please enter qualification");
        $("#cvQualification"+numrows).focus();
    }
    else if (school_college == ""){
        alert("Please enter School/College name");
        $("#school_college"+numrows).focus();
    }
    else if (cvQualificationPer == ""){
        alert("Please enter qualification percentage");
        $("#cvQualificationPer"+numrows).focus();
    }
    else if (cvQualificationBoardUni == ""){
        alert("Please select your board/University");
        $("#cvQualificationBoardUni"+numrows).focus();
    }
    else if (traningTechTitle == ""){
        alert("Please enter title");
        $("#traningTechTitle"+numrows1).focus();
    } else if (traningTechSkill == ""){
        alert("Please enter skill");
        $("#traningTechSkill"+numrows1).focus();
    } else if (extraCarricular == ""){
        alert("Please enter extra carricular activity");
        $("#extraCarricular"+numrows2).focus();
    } else if (academicProj == ""){
        alert("Please enter project title");
        $("#academicProj"+numrows3).focus();
    } else if (academicProjDes == ""){
        alert("Please enter project description");
        $("#academicProjDes"+numrows3).focus();
    } else{
        $("#submitcvbtn").html('<i class="fa fa-spinner fa-spin" style="font-size:18px"></i> Saving...');
        $.ajax({
            url: "functions/common/common-ajax-request.php", // Url to which the request is send
            type: "POST",                  // Type of request to be send, called as method
            data: formdata,                // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            contentType: false,            // The content type used when sending data to the server.
            cache: false,                  // To unable request pages to be cached
            processData: false,            // To send DOMDocument or non processed data file it is set to false
            success: function (response)   // A function to be called if request succeeds
            {
                var res = response.split('^');
                if (res[1] =="cvDetailsSaved")
                {
                    alert("CV Details has been saved successfully !");
                    $("#submitcvbtn").html('Save');
                    window.location.href = "cv/templates/cvTemplate.php";
                }
            }
        });
    }
});























