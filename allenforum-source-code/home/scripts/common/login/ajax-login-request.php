<?php
include "../../../../config/session_header.php";
include "../../../../config/configuration.php";
include_once "../../../functions/common/Common.php";
include_once "../../../functions/mailer/Mailer.php";

$common = new CommonFunctions();
$mailer = new Mailer();

if (isset($_POST['q']) == 'login'){
    $userEmail = trim($connection->real_escape_string($_POST['useremail']));
    $userPass = sha1(trim($connection->real_escape_string($_POST['userpassword'])));

    $login = $connection->query("select * from forum_users
      where user_email = '$userEmail' AND user_pass = '$userPass' ")
    or die("Login failed".$connection->error);

    if ($login->num_rows > 0){

        $_SESSION['user_modal_popup'] = 'yes';
        $user = $login->fetch_assoc();
        if ($user['user_role'] == 'admin') {
            $_SESSION['loginId'] = $user['id'];
            $_SESSION['userrole'] = $user['user_role'];
            $urlToRedirect = "../home/dashboard.php?opensFor= ".$_SESSION['userrole']." &title=dashboard & userid=".md5(uniqid());
        }
       else if ($user['user_role'] == 'student' || $user['user_role'] == 'faculty') {
            $_SESSION['loginId'] = $user['id'];
            $_SESSION['userrole'] = $user['user_role'];
           if ($user['user_status'] == "0"){
               $urlToRedirect = "../login/blocked/?user= ".$user['user_role']." &title=blocked&reason=unexpected activity&userid=".md5(uniqid());

           } else {
               $urlToRedirect = "../home/forum-dicussion.php?home=active&opensFor= " . $_SESSION['userrole'] . " &title=dashboard & userid=" . md5(uniqid());
           }
       }
       else  if ($user['user_role'] == 'receptionist') {
           $_SESSION['loginId'] = $user['id'];
           $_SESSION['userrole'] = $user['user_role'];
           $urlToRedirect = "../home/dashboard.php?opensFor= ".$_SESSION['userrole']." &title=dashboard & userid=".md5(uniqid());
       }
       else  if ($user['user_role'] == 'librarian') {
           $_SESSION['loginId'] = $user['id'];
           $_SESSION['userrole'] = $user['user_role'];
           $urlToRedirect = "../home/dashboard.php?opensFor= ".$_SESSION['userrole']." &title=dashboard & userid=".md5(uniqid());
       }
        $connection->query("UPDATE forum_users SET userLive = '1' WHERE id = '".@$_SESSION['loginId']."'  ");

        $status=1;
        echo $status."^".$urlToRedirect;
       // echo $_SESSION['loginId'].':'.$_SESSION['userrole'];
        //die();
    }

    else{
        $status=0;
        if (isset($_SESSION['attempt'])){
            $_SESSION['attempt'] = $_SESSION['attempt']+1;
        }else{
            $_SESSION['attempt'] = 1;
        }
        if ($_SESSION['attempt'] >= 3){
            $mailer->sendSecurityAlertMessage($userEmail);
        }
        echo $status.'^'.$_SESSION['attempt'];

    }
}


if (isset($_POST['reset']) == 'passwordResetRequest'){
        $deviceName = "";
	    $userEmail = trim($connection->real_escape_string($_POST['email']));
		$verify = $common->verifyEmail($connection,$userEmail);
		if($verify){
			$tokenId = $common->generateRandomString();
			$_SESSION['tokenId'] = $tokenId;
			$_SESSION['emailVerified'] = true;
			$_SESSION['VerifiedEmail'] = $userEmail;
            $_SESSION['checkStatus'] = 'check_mail';

			$storeTocken = $common->keepPasswordResetDetails($connection,$userEmail,$tokenId);
            $useragent=$_SERVER['HTTP_USER_AGENT'];
			$sendDetails = $common->sentPasswordResetDetailsToEmail($userEmail,$tokenId);
			// $resetLink = '../reset/password-reset.php?request=password_reset&tokenid='.$tokenId; // for local testing
            $resetLink = '../reset/password-reset.php?request=password_reset&status=sent&reset='.base64_encode($userEmail);
			echo 'test^success^'.$resetLink;
		} else{
			echo 'test^fail';
		}

}