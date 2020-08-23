<?php include "../config/session_header.php";?>
<?php include "../config/configuration.php";?>

<!DOCTYPE HTML>
<html lang="en">
<head>
<title>Login :: Allenhouse Group of colleges</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Server Login Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>

<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
<link rel="stylesheet" href="css/font-awesome.css">
<link href="//fonts.googleapis.com/css?family=Muli:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext,vietnamese" rel="stylesheet">
</head>
<body>
 <div id="pre_loader">
     <center><img src="../home/ownImages/other/loading/loading1.gif"  /></center>
 </div>

<div id="allen-login" style="display: none;">
<div class="w3ls-header">
    <h1></h1>
    <div class="header-main">
<!--        <h2>login with <a href="#">AllenForum</a> <span>Account</span> </h2>-->
        <img src="../home/ownImages/other/allenoverflow.png">
            <div class="header-bottom">
                <div class="header-right w3agile">
                    <div class="header-left-bottom agileinfo">
                        <form  id="forumLogin">
                            <div class="icon1">
                                <input type="email" name="useremail" id="useremail" placeholder="user@allenforum.com" required=""/>
                            </div>
                            <div class="icon1">
                                <input type="password" name="userpassword" id="userpassword" placeholder="Password" required=""/>
                            </div>
<!--                            <p><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a> : login with google-plus</p>-->
                            <p style="color: red;display: none;" id="login_error"><i class="fa fa-user" aria-hidden="true"></i>Login Failed</p>

                            <div class="login-check">
                                <label class="checkbox">
                                    <a href="../reset">Forgot Password?</a>
                                </label>
                            </div>
                            <div class="bottom">
<!--                                <button type="submit" name="userloginBtn">-->
<!--                                   <img src="../home/ownImages/other/loading/btn-loading.gif" width="15" height="15"/> Logging...-->
<!--                                </button>-->
                                <input type="submit" name="userloginBtn" value="Log in" />
                                <img src="../home/ownImages/other/loading/btn-loading.gif" width="20" height="20" id="login-loader" style="display: none;"/>
                            </div>
                       </form>
                    </div>
                </div>
            </div>
    </div>
</div>
<!--header end here-->
<!-- copyright start here -->
<div class="copyright">
    <p>© 2018 AllenForum. All rights reserved | Design & Developed by  <a href="https://cubersindia.com/" target="_blank">  Cubers Team </a></p>
</div>
<!--copyright end here-->
    <script type="text/javascript" src="../home/plugins/jQuery/jquery-2.2.3.min.js"></script>
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
           $.ajax({
               url : '../home/scripts/common/login/ajax-login-request.php',
               method : 'POST',
               data :{q:'login',
                   useremail:useremail,
                   userpassword:userpassword},
               success : function (response) {
                   var login = response.split("^");
                  if (login[0] == '0'){
                     // alert('failed');
                      $("#login-loader").hide();
                      $("#login_error").show();
                  } else if (login['0'] == '1'){
                      window.location.href=login[1];
                  }

               }
           });
        });
    </script>
</div>
</body>
</html>
