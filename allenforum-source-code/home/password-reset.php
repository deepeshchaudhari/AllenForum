<?php include "../config/session_header.php"; ?>
<?php
$pageTitle = "Change Password";
include('header.php');
?>


<?php
$activeTabDash = "";
$activeLinkDash = "";
include('sidebar.php');
?>

  <div class="content-wrapper">
      <section class="content">
            <div class="register-box">
                <div class="register-box-body">
                    <p class="login-box-msg"><b>Change Your Password</b></p>
                    <div id="passwordResetResponse" style="display: none;"></div>
                      <form id="passwordResetForm">
                        <div class="form-group has-feedback">
                          <input type="password" name="current_password" id="current_password"  placeholder="Current Password" class="form-control" />
                          <span class="fa fa-unlock form-control-feedback"></span>
                        </div>
                          <div class="form-group has-feedback">
                              <input type="password" name="new_password" id="new_password"  placeholder="Enter New Password" class="form-control" />
                              <span class="fa fa-unlock form-control-feedback"></span>
                          </div>
                          <div class="form-group has-feedback">
                              <input type="password" name="re_new_password" id="re_new_password"  placeholder="Re- Enter New Password" class="form-control"/>
                              <span class="fa fa-unlock form-control-feedback"></span>
                          </div>
                        <div class="row">
                          <div class="col-xs-4">
                            <button type="submit" name="changePassBtn" id="changePassBtn" class="btn btn-primary  btn-flat">
                                Reset   <i class="fa fa-check"></i>
                            </button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
           </section>
       </div>
  <?php include('footer.php');?>

