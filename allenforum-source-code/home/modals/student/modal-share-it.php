<?php
$student = new Students();
$list = $student->getStudentListToShareQuestion($connection);
?>

<div class="modal fade" id="modalShareQues" tabindex="-1" role="dialog" aria-labelledby="modalShareQues">
    <div class="modal-dialog modal-lg" role="document">
        <form id="quesShareForm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel"><b>Lets Share It</b></h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <input type="hidden" id="questionIdToShare" name="questionIdToShare" value="">
                    <span id="questionIdToShare"></span>
                    <div class="col-lg-12">
                        <div class="table-responsive1">
                            <table class="table table-hover table-striped" id="tableShareIt">
                                <thead>
                                <tr style="background-color: #5ccbdd; color: white;">
                                    <th><input type="checkbox" id="checkShareMaster" name="checkShareMaster" value=""></th>
                                    <th>Sr.No</th>
                                    <th>Profile</th>
                                    <th>Name</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 1;
                                if($list->num_rows > 0){
                                while ($student = $list->fetch_object()) { ?>
                                    <tr>
<!--                                        <td><input type="checkbox" id="checkstudentShareEmail[--><?php //echo $i;?><!--]" name="checkstudentShareEmail[--><?php //echo $i;?><!--]" value="--><?php //echo $student->user_email;?><!--" class="checkstudentShareEmail"></td>-->
                                        <td><input type="checkbox" id="checkstudentShare[<?php echo $i;?>]" name="checkstudentShare[<?php echo $i;?>]" value="<?php echo $student->user_id;?>" class="checkstudentShare"></td>

                                        <td><b><?php echo $i;?></b></td>
                                        <td>
                                            <img src="<?php if ($student->profile_pic){ echo '../'.SPROFILE_BASEURL.$student->profile_pic; } else{ echo DEFAULT_USER_PIC;} ;?>" width="40" height="40" class="img-circle"/>
                                        </td>
                                        <td><?php echo $student->name;?></td>
                                    </tr>
                                <?php $i++; } }?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-sm btn-danger btn-flat" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-sm btn-info btn-flat" id="shareQuesBtn" >Send</button>
                <button type="submit" class="btn btn-sm btn-info btn-flat" id="shareQuesBtnLoading" style="display: none;">
                   <img src="ownImages/other/loading/btn-loading.gif" width="20" height="20"/>Sending...
                </button>
            </div>
        </div>
        </form>
    </div>
</div>

<!-- this submission will be taken by functions/common/common.php and common-ajax-request.php
<!-- and javaScript/common/forum-common.js -->