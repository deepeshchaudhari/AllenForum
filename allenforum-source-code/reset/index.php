<?php include "../config/session_header.php";?>
<?php include "../config/configuration.php";?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Verify Email | Allenforum</title>
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
            <form class="login100-form validate-form" id="passwordResetForm">
					<span class="login100-form-title p-b-26">
						<img src="../home/ownImages/other/allenoverflow.png" height="50">
					</span>
                <div class="wrap-input100 validate-input" data-validate = "Please Enter Email">
                    <input class="input100" type="text" name="email" id="email">
                    <span class="focus-input100" data-placeholder="Email"></span>
                </div>
                <p style="color: red;display: none; text-align: center" id="message_error"><i class="fa fa-user" aria-hidden="true"></i> Wrong Email</p>
                <div class="container-login100-form-btn">
                    <div class="wrap-login100-form-btn">
                        <div class="login100-form-bgbtn"></div>
                        <button class="login100-form-btn" type="submit" name="emailVerifyBtn" id="emailVerifyBtn">
                            <div class="overlay" id="userPassResetCaption">
                                Next
                            </div>
                        </button>
                    </div>
                </div>

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
    $("form#passwordResetForm").on('submit',function(event){
        event.preventDefault();
        var email = $("#email").val();
        if (email != "") {
            $("#userPassResetCaption").html('<i class="fa fa-spinner fa-spin" style="font-size:24px"></i>');
            $.ajax({
                url: "../home/scripts/common/login/ajax-login-request.php",
                method: "POST",
                data: {reset: 'passwordResetRequest', email: email},
                success: function (response) {
                    var responseData = response.split('^');
                    if (responseData[1] == "success") {
                        var resetUrl = responseData[2];
                        window.location.href = resetUrl;
                    } else if (responseData[1] == "fail") {
                       // alert("This Email does not exists with Allenforum !");
                        $("#emailVerifyBtn").show();
                        $("#loader").hide();
                        $("#message_error").show();
                        $("#message_error").fadeOut(2000);
                        $("#userPassResetCaption").html('Next');
                        $("#emailVerifyBtn").show();
                    }
                }
            });
        }

    });

</script>

</body>
</html>