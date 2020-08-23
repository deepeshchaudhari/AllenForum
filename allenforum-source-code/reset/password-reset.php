<?php
include "../config/session_header.php";
include "../config/configuration.php";
include "../home/functions/common/Common.php";
$common = new CommonFunctions();
 $FLAG = false;

 //$localCheck = false; // for local testing make it true to display the form

   if( isset($_GET['request']) && isset($_GET['tokenid']) ){
       $tokenId = $_GET['tokenid'];
       $email = $_SESSION['VerifiedEmail'];
       $checkValidity = $common->checkPasswordResetLinkValidity($connection,$email,$tokenId);
       if($checkValidity->num_rows > 0){
           $FLAG = true;
          $linkValid = true;
       } else{
           $FLAG = false;
          $linkValid = false;
       }
   }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Reset Password | Allenforum</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="../home/ownImages/other/allenlogo.png"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../login/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../login/fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../login/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../login/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../login/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../login/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../login/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../login/css/util.css">
    <link rel="stylesheet" type="text/css" href="../login/css/main.css">
    <!--===============================================================================================-->
</head>
<body>
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <form class="login100-form validate-form" id="passwordResetForm" action="change-password-script.php" method="post">
					<span class="login100-form-title p-b-26">
						<img src="../home/ownImages/other/allenoverflow.png" height="50">
					</span>
                <?php  if ( ! isset($_GET['tokenid'])) { ?>
                    <p class="text-center text-success">
                        <span class="badge badge-success" style="padding: 8px;">Please Check your email to proceed next</span>
                    </p>
                <?php } else if(isset($_GET['tokenid']) && $FLAG == false) { ?>
                    <p class="text-center text-danger">
                        <span class="badge badge-danger" style="padding: 8px;">Expired or Invalid Link</span>
                    </p>
                <?php } ?>
                <?php if($FLAG == true) {?>
                <div id="resetForm">
                    <div class="wrap-input100 validate-input" data-validate="Please Enter Password">
                             <span class="btn-show-pass">
                                 <i class="zmdi zmdi-eye"></i>
                             </span>
                         <input class="input100" type="password" name="newPass" id="newPass" />
                         <span class="focus-input100" data-placeholder="Password"></span>
                     </div>

                    <div class="wrap-input100 validate-input" data-validate="Please Enter Password">
                             <span class="btn-show-pass">
                                 <i class="zmdi zmdi-eye"></i>
                             </span>
                        <input class="input100" type="password" name="confPass" id="confPass" />
                        <span class="focus-input100" data-placeholder="Confirm Password"></span>
                    </div>
                    <p style="color: red;display: none; text-align: center" id="reset_error"></p>

                    <p style="color: red;display: none; text-align: center" id="message_error"><i class="fa fa-user" aria-hidden="true"></i> Wrong Email</p>
                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <input type="hidden" name = "tokenId"  value ="<?php if($tokenId) echo base64_encode($tokenId); ?>" />

                            <button class="login100-form-btn" type="submit" name="changePassBtn" id="changePassBtn" onclick="return validate();">
                                <div class="overlay" id="userPassResetCaption">
                                    Reset
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
                <?php } ?>


                <div class="text-center p-t-115">
						<span class="txt1">
							Want to Login?
						</span>

                    <a class="txt2" href="../login">
                        Click Here
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>


<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
<script src="../login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="../login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="../login/vendor/bootstrap/js/popper.js"></script>
<script src="../login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="../login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="../login/vendor/daterangepicker/moment.min.js"></script>
<script src="../login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="../login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="../login/js/main.js"></script>
<script type="text/javascript">

    function validate(){
        var newPass = $("#newPass").val();
        var confPass = $("#confPass").val();
        if(newPass == ""){
            $("#reset_error").html("Please Enter Password")
            $("#reset_error").show();
            $("#reset_error").fadeOut(3000);
            $("#newPass").focus();
            return false;
        }
        else if(confPass == ""){
            $("#reset_error").html("Please Enter Confirm Password")
            $("#reset_error").show();
            $("#reset_error").fadeOut(3000);
            $("#confPass").focus();
            return false;
        }
        else if(newPass != confPass){
            $("#reset_error").html("Password and Confirm Password did not matched !");
            $("#reset_error").show();
            $("#reset_error").fadeOut(3000);
            $("#confPass").focus();
            return false;
        } else{
            return true;
        }
    }

</script>

</body>
</html>