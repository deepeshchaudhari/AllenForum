
<footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.1.0
    </div>
    <strong>Copyright &copy; 2017-2018 <a href="https://cubersindia.com" target="_blank">Cubers Team</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Right Sidebar -->
    <?php include "sidebar-right.php";?>
  <!-- /.control-sidebar -->



  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>


<script type="text/javascript">
    /* Follow Unfollow */
    function follow_unfollow(user,follower,index) {

                $.ajax({
                    url: 'scripts/follow/follow_unfollow.php',
                    type : 'POST',
                    data : {
                        actionVar : 'action',
                        user_id :user,
                        follower:follower
                    },
                   success:function(data){
                    $("#follow"+index).html(data);
                }
            });
    }



    /* get city by state */
    function getCity() {
        var state_name = document.getElementById("state").value;

        $.ajax({
            url : 'scripts/common/get_city_by_state.php',
            type : 'POST',
            data : {
                state  : state_name
            },
            success : function (save_ans_res) {
                $("#city").html(save_ans_res);
            }
        });
    }
        $(window).on('load',function(){
            $('#studentInFoModal').modal('show');
        });
    // In your Javascript (external .js resource or <script> tag)


</script>






<!-- Other Own Scripts -->
<script type="text/javascript" src="javaScript/student/student-profile.js"></script>
<script type="text/javascript" src="javaScript/common/forum-common.js"></script>
<script type="text/javascript" src="javaScript/common/chage-event.js"></script>
<script type="text/javascript" src="javaScript/library/library.js"></script>
<script type="text/javascript" src="javaScript/admin/admin-work.js"></script>
<script type="text/javascript" src="javaScript/chat/chat.js"></script>
<script type="text/javascript" src="javaScript/validation/file-extension-validation.js"></script>
<script type="text/javascript" src="javaScript/career/career.js"></script>
<script type="text/javascript" src="javaScript/faculty/faculty-scipt.js"></script>
<script type="text/javascript" src="javaScript/common/dynamic-rows.js"></script>




<!-- page script -->
<script>
    $(function () {
        $("#libraryBooks").DataTable();

        $("#studentsRecordTable").DataTable();
        $("#libraryBookByCategory").DataTable();
        $("#tableShareIt").DataTable({
            "lengthMenu": [ [5, 10, 15, -1], [5, 10, 15, "All"] ]
        });
        $("#tableActivity").DataTable();
        oTable = $('#studentsRecordTable').DataTable();   //pay attention to capital D, which is mandatory to retrieve "api" datatables' object, as @Lionel said
        $('#studentSearchBox').keyup(function(){
            oTable.search($(this).val()).draw() ;
        });
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });
        $("#sharedQuestions").DataTable();
        $("#usersBlockUnblockTable").DataTable();
        $("#noticeTable").DataTable();
        $("#savedAnswersTable").DataTable();
    });
</script>





<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="plugins/select2/select2.full.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script src="javaScript/common/footer-script.js"></script>
<script type="text/javascript">
    // bootstrap-ckeditor-modal-fix.js
    // hack to fix ckeditor/bootstrap compatiability bug when ckeditor appears in a bootstrap modal dialog
    //
    // Include this AFTER both bootstrap and ckeditor are loaded.

    $.fn.modal.Constructor.prototype.enforceFocus = function() {
        modal_this = this
        $(document).on('focusin.modal', function (e) {
            if (modal_this.$element[0] !== e.target && !modal_this.$element.has(e.target).length
                && !$(e.target.parentNode).hasClass('cke_dialog_ui_input_select')
                && !$(e.target.parentNode).hasClass('cke_dialog_ui_input_text')) {
                modal_this.$element.focus()
            }
        })
    };
</script>
<script type="text/javascript">
    //Date picker
    $('#noticeDate').datepicker({
        autoclose: true
    });
    $("#cvDob").datepicker({
        autoclose: true
    });
</script>

</body>
</html>
