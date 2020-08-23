<div class="modal fade" id="forumGiveAnswerPersonally" tabindex="-1" role="dialog" aria-labelledby="forumGiveAnswerPersonally">
    <div class="modal-dialog modal-lg" role="document">
        <form id="forumGiveAnswerPersonally">
            <div class="modal-content">
                <div class="modal-header">
                    <input type="hidden" id="personalDisId" name="personalDisId" value=""/>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel"><b>Give Answer</b></h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <span class="control-label text-bold">Question <b style="color: red">*</b>
                            </span>
                            <p id="question_label">
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <textarea name="answerText" id="answerText"></textarea>
                            <script>
                                CKEDITOR.replace( 'answerText');
                            </script>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <span id="answer_give_err" class="pull-left" style="color: red;display: none;"><b>Please Enter the Field with * !</b></span>
                    <button type="submit" class="btn btn-sm btn-danger btn-flat" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-sm btn-success btn-flat" id="sendAnsBtn" >Send</button>
                    <button type="submit" class="btn btn-sm btn-success btn-flat" id="sendAnsBtnLoading" style="display: none;">
                        <img src="ownImages/other/loading/btn-loading.gif" width="20" height="20"/>Sending...
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>



<!-- this submission will be taken by functions/common/common.php and common-ajax-request.php
<!-- and javaScript/common/forum-common.js -->