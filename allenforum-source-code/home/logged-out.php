<?php include "../config/session_header.php";?>
<?php include "../config/configuration.php" ;?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Logged Out ! | Allenhouse Group of colleges</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="dist/css/radiobutton.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">


    <!-- Full Width Column -->
    <div class="content-wrapper">
        <div class="container">
            <section class="content">
                <div class="row">
                    <div class="col-lg-4"></div>
                    <div class="col-md-4">
                        <div class="box box-widget widget-user">
                            <!-- Add the bg color to the header using any of the bg-* classes -->
                            <div class="widget-user-header bg-teal-active">
                                <h3 class="widget-user-username">Dear User !</h3>
                                <h5 class="widget-user-desc">have succesfully<br/> logged out</h5>
                            </div>
                            <div class="widget-user-image">
                                <img  class="img-circle" src="ownImages/other/allenlogo.png"
                                     alt="allenhouse logo">
                            </div>
                            <div class="box-footer">
                                <div class="row">
                                    <form action="" method="post">
                                      <div class="col-sm-4 border-right">
                                         <div class="description-block">
                                           <!--<h5 class="description-header">
                                            <a href="../login/"> <img src="ownImages/other/back-role.png"
                                                      width="42px" height="40px"/></a>
                                           </h5>
                                           <span class="description-text">Back</span>-->
                                         </div>
                                       </div>
                                     <!--  <div class="col-sm-4 border-right">
                                         <div class="description-block">
                                           <h5 class="description-header">
                                               <input type="radio" name="roleSelected" value="roleSeletcted"/>
                                           </h5>
                                           <span class="description-text">Select</span>
                                         </div>
                                       </div>-->
                                       <div class="col-sm-4">
                                         <div class="description-block">
                                           <h5 class="description-header">
                                               <input type="image"  name="loginAgain" value=">"
                                                      src="ownImages/other/next-role.png"
                                                      width="60px" height="45px"/>
                                           </h5>
                                           <span class="description-text">Login</span>
                                         </div>
                                       </div>
                                    </form>
                                    <?php

                                    $connection->query("UPDATE forum_users SET userLive = '0' WHERE id = '".@$_SESSION['loginId']."'  ");


                                    if (isset($_POST['loginAgain'])){

                                            header('Location:../login/');

                                    }
                                    unset($_SESSION['usersemail']);
                                    unset($_SESSION['userspassword']);
                                    session_destroy();



                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4"></div>
                </div>
            </section>
        </div>
        <!-- /.container --> <br/> <br/> <br/> <br/><br/> <br/> <br/> <br/>
        <br/> <br/> <br/> <br/><br/> <br/>
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
        <div class="container">
            <div class="pull-right hidden-xs">
                <b>Version</b> 2.3.6
            </div>
            <strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
            reserved.
        </div>
        <!-- /.container -->
    </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
</body>
</html>
