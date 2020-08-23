<div class="modal fade" id="addHigherStudiesMaterial" tabindex="-1" role="dialog" aria-labelledby="addHigherStudiesMaterial">
    <div class="modal-dialog modal-lg" role="document">
        <form id="higherStudyMaterialUploadForm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel"><b>Add Study Material</b></h4>
                </div>
                <div class="modal-body">
                   <div class="row">
                       <div class="col-md-2">
                           <input type="hidden" name="higherStudies" id="higherStudies" value="higherStudies"/>
                           <span class="control-label text-bold">Title <b style="color: red">*</b></span>
                       </div>
                       <div class="col-md-6">
                           <div class="form-group">
                               <input type="text" name="higherStubookTitle" id="higherStubookTitle" required placeholder="Enter the Book Title" class="form-control"/>
                           </div>
                       </div>
                       <div class="col-md-2">
                           <div class="form-group">
                               <select name="upload_category" id="upload_category" class="form-control">
                                   <option value="GATE" <?php if ($_GET['type'] == 'GATE') echo 'selected'?>>GATE</option>
                                   <option value="CAT" <?php if ($_GET['type'] == 'CAT') echo 'selected'?>>CAT</option>
                               </select>
                           </div>
                       </div>
                   </div>
                   <div class="row">
                       <div class="col-md-2">
                           <span class="control-label text-bold">Option <b style="color: red">*</b></span>
                       </div>
                       <div class="col-md-2">
                           <div class="form-group">
                               <input type="radio" name="higherStudiesUploadOption" id="higherStudiesUploadOption" value="upload" checked>
                              Upload
                           </div>
                       </div>
                       <div class="col-md-2">
                           <div class="form-group">
                               <input type="radio" name="higherStudiesUploadOption" id="higherStudiesUploadOption" value="link">
                             Link
                           </div>
                       </div>
                   </div>
                    <div class="row" id="fileUpload">
                        <div class="col-md-2">
                            <span class="control-label text-bold">File <b style="color: red">*</b></span>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="file" name="higherStudyUploadFile" id="higherStudyUploadFile" onchange="validateFile();" class="form-control"/>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="fileLink" style="display: none;">
                        <div class="col-md-2">
                            <span class="control-label text-bold">Link <b style="color: red">*</b></span>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <input type="text" name="higherStudyFileLink" id="higherStudyFileLink" placeholder="Enter Your Link" class="form-control"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <span id="file_upload_err" class="pull-left" style="color: red;display: none;"><b>Please Enter the Field with * !</b></span>
                    <button type="submit" class="btn btn-sm btn-danger btn-flat" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-sm btn-info btn-flat" id="higherStudUploadBtn" >Upload</button>
                    <button type="submit" class="btn btn-sm btn-info btn-flat" id="higherStudUploadBtnLoading" style="display: none;">
                        <img src="ownImages/other/loading/btn-loading.gif" width="20" height="20"/>Uploading...
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- this submission will be taken by functions/common/common.php and common-ajax-request.php
<!-- and javaScript/common/forum-common.js -->