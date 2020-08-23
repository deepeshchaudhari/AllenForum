
<div class="modal fade" id="answerRatingModal" tabindex="-1" role="dialog" aria-labelledby="answerRatingModal">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel"><b>Rating</b></h4>
            </div>
            <form id="answerRatingForm">
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <input type="hidden" name="answerIdToShare" id="answerIdToShare" value=""/>
                        <div class="stars text-center">
                            <input class="star star-5" id="star-5" type="radio" name="star" value="5" required/>
                            <label class="star star-5" for="star-5"></label>
                            <input class="star star-4" id="star-4" type="radio" name="star" value="4"/>
                            <label class="star star-4" for="star-4"></label>
                            <input class="star star-3" id="star-3" type="radio" name="star" value="3"/>
                            <label class="star star-3" for="star-3"></label>
                            <input class="star star-2" id="star-2" type="radio" name="star" value="2"/>
                            <label class="star star-2" for="star-2"></label>
                            <input class="star star-1" id="star-1" type="radio" name="star" value="1"/>
                            <label class="star star-1" for="star-1"></label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-sm btn-danger btn-flat" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-sm btn-info btn-flat" id="answerRatingSubmitBtn" >Rate This</button>
                <button type="submit" class="btn btn-sm btn-info btn-flat" id="answerRatingSubmitBtnLoading" style="display: none;">
                    <img src="ownImages/other/loading/btn-loading.gif" width="20" height="20"/>Rating...
                </button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- this rating submittions will call the js script
    javaScript/common/forum-common.js-->