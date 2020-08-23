<?php include "../config/session_header.php";?>
<?php include "../config/configuration.php";?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Sign In | Allenforum</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="../home/ownImages/other/allenlogo.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
<div id="pre_loader">
    <center><img src="../home/ownImages/other/loading/loading1.gif"  /></center>
</div>
	<div class="limiter" id="allen-login" style="display: none;">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" id="forumLogin">
					<span class="login100-form-title p-b-26">
						<img src="../home/ownImages/other/allenoverflow.png" height="50">
					</span>
					<div class="wrap-input100 validate-input" data-validate = "Please Enter Email">
						<input class="input100" type="text" name="useremail" id="useremail" autocomplete="off">
						<span class="focus-input100" data-placeholder="Email"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Please Enter Password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="userpassword" id="userpassword" autocomplete="off">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>

                    <p style="color: red;display: none; text-align: center" id="login_error"><i class="fa fa-user" aria-hidden="true"></i>Login Failed</p>
                    <div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" type="submit" name="userloginBtn">
                                <div class="overlay" id="userloginCaption">
                                    Sign In
                                </div>
                            </button>
                        </div>
                    </div>

					<div class="text-center p-t-115">
						<span class="txt1">
							Forgot Password?
						</span>
						<a class="txt2" href="../reset">
							Click Here
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
    <div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
    <script type="text/javascript">
        $(function() {
            $("#pre_loader").fadeOut(2000, function() {
                $("#allen-login").fadeIn(1000);
            });
        });

        $("form#forumLogin").on('submit',function (e) {
            e.preventDefault();
            $("#login-loader").show();
            var useremail = $("#useremail").val();
            var userpassword = $("#userpassword").val();
            if (useremail !="" && userpassword !="" ) {
                $("#userloginCaption").html('<i class="fa fa-spinner fa-spin" style="font-size:24px"></i>');
                $.ajax({
                    url: '../home/scripts/common/login/ajax-login-request.php',
                    method: 'POST',
                    data: {
                        q: 'login',
                        useremail: useremail,
                        userpassword: userpassword
                    },
                    success: function (response) {
                        var login = response.split("^");
                        if (login[0] == '0') {
                            // alert('failed');
                            $("#login-loader").hide();
                            $("#login_error").show();
                            $("#login_error").fadeOut(2000);
                            $("#userloginCaption").html('Sign In');
                        } else if (login['0'] == '1') {
                            window.location.href = login[1];
                        }
                    }
                });
            }
        });

    </script>
</body>
</html>