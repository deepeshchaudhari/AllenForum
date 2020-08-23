
<?php include "../config/session_header.php";?>
<?php include "../config/configuration.php";?>
<?php include_once "../home/functions/common/Common.php"; ?>

<?php
$common = new CommonFunctions();
$courses = $common->getCourses($connection);
$departments = $common->getDepartments($connection);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Create account | Allenforum</title>
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
            <form class="login100-form validate-form" id="registrationForm"  >
					<span class="login100-form-title p-b-26">
						<img src="../home/ownImages/other/allenoverflow.png" height="50">
					</span>
                <div class="wrap-input100 validate-input" data-validate = "Please Enter Email" >
                    <input class="input100" type="text" name="name" id="name" autocomplete="off">
                    <span class="focus-input100" data-placeholder=" Enter your first name"></span>
                </div>


                <div class="wrap-input100 validate-input" data-validate = "Please Enter last name">
                    <input class="input100" type="text" name="lastname" id="lastname" autocomplete="off">
                    <span class="focus-input100" data-placeholder="Enter your last name"></span>
                </div>
                <div class="wrap-input100 validate-input" data-validate = "Please Enter roll number" >
                    <input class="input100" type="number" name="userroll" id="userroll" autocomplete="off">
                    <span class="focus-input100" data-placeholder="Enter your roll number"></span>

                </div>
                <div class="row">
                    <div class="form-group">
                        <!-- <label>Course <span class="field-required">*</span></label>-->
                        <select name="course_program" id="course_program" class="form-control" required="required" onchange="getDepartmentByCourse(this.value,'');">
                            <option value="">Course</option>
                            <?php while ($course = $courses->fetch_object()) {  ?>
                                <option value="<?php echo $course->course_name;?>" ><?php echo $course->course_name;?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <!--   <label>Department <span class="field-required">*</span></label>-->
                        <select name="department_branch" id="department_branch"  class="form-control" required="required">
                            <option value="">Department</option>
                            <?php while ($department = $departments->fetch_object()){ ?>
                                <option value="<?php echo $department->department_name;?>" ><?php echo $department->department_name;?></option>
                            <?php } ?>
                        </select>
                    </div>


                    <div class="form-group">
                        <!--		 <label>Year <span class="field-required">*</span></label>-->
                        <select name="student_year" id="student_year" required class="form-control">
                            <option value="" >Year</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate = "Please Enter Email">
                        <input class="input100" type="email" name="useremail" id="useremail" autocomplete="off">
                        <span class="focus-input100" data-placeholder="Email"></span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="Please Enter Password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
                        <input class="input100" type="password" name="userpassword" id="userpassword" >
                        <span class="focus-input100" data-placeholder="Password"></span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="Re enter your Password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
                        <input class="input100" type="password" name="repassword" id="repassword">
                        <span class="focus-input100" data-placeholder="RE-Password"></span>
                    </div>

                    <p style="color: red;display: none; text-align: center" id="login_error">
                        <i class="fa fa-user" aria-hidden="true"></i>Failed to create account</p>
                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn" type="submit" name="create_accountBtn" id="create_accountBtn">
                                <div class="overlay" id="userloginCaption">
                                    Create Account
                            </button>
                        </div>
                    </div>
            </form>


        </div>
        <form class="login100-form validate-form" id="otpForm"  style="display: none">
					<span class="login100-form-title p-b-26">
						<img src="../home/ownImages/other/allenoverflow.png" height="50">
					</span>
            <div class="wrap-input100 validate-input" data-validate = "Please Enter OTP" >
                <input class="input100" type="text" name="otpField" id="otpField" autocomplete="off">
                <span class="focus-input100" data-placeholder=" Enter OTP"></span>
            </div>
            <div class="wrap-login100-form-btn">
                <div class="login100-form-bgbtn"></div>
                <button class="login100-form-btn" type="submit" name="verifyBtn" id="verifyBtn">
                    <div class="overlay" id="userloginCaption">
                        Verify
                </button>
            </div>
           <center>
               <span onclick="gerateOTP();"><i class="fa fa-refresh"></i> </span>
           </center>
        </form>
          <div class="alert alert-success" id="sucessMessage" style="display: none">
              <p>Your registration is successfull !</p>
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
<script src="js/ajax.js"></script>
<script type="text/javascript">
    $(function() {
        $("#pre_loader").fadeOut(2000, function() {
            $("#allen-login").fadeIn(1000);
        });
    });

</script>
</body>
</html>