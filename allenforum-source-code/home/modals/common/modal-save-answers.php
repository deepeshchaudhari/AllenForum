
<div class="modal fade" id="modalSaveAnswers" tabindex="-1" role="dialog" aria-labelledby="modalSaveAnswers">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header bg-maroon">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel"><b>Save Answer</b></h4>
            </div>
            <form id="saveAnswerForm">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <input type="hidden" name="answerIdToSave" id="answerIdToSave" value=""/>
                            <input type="hidden" name="questionsIdToGetQues" id="questionsIdToGetQues" value="" />
                            <div id="saveAnswerMessage" class="text-center">
                                <h3 class="widget-user-username" id="saveTextMessage">Would you like to save your answer ?</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-danger btn-flat" data-dismiss="modal" id="closeNoBtn">No</button>
                    <button type="submit" name="saveAnswerBtn" id="saveAnswerBtn" class="btn btn-sm btn-info btn-flat bg-green" >Yes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- this rating submittions will call the js script
    javaScript/common/forum-common.js-->