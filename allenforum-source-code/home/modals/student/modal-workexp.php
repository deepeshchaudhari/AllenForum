<div class="modal fade" id="exampleModalAddExp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
           <form id="studentWorkExpForm">
               <div class="modal-header bg-teal">
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                   <h4 class="modal-title" id="exampleModalLabel">Work Progress</h4>
               </div>
               <div class="modal-body">
                   <div class="form-group">
                       <label for="title" class="control-label">Title <span class="field-required">*</span> </label>
                       <input type="text" name="exp_title"  id="exp_title" placeholder="Title"  class="form-control" >
                   </div>
                   <div class="form-group">
                       <label for="student-position" class="control-label">Position <span class="field-required">*</span> </label>
                       <input type="text" name="exp_position"  id="exp_position"  placeholder="Experience in which position"  class="form-control" >
                   </div>
                   <div class="form-group">
                       <label for="message-text" class="control-label">Message <span class="field-required">*</span> </label>
                       <textarea class="form-control" name="exp_description" id="exp_description" placeholder="Descripiton of experience" ></textarea>
                   </div>
               </div>
               <div class="modal-footer">
                   <input type="hidden" id="profileExpAction" name="profileExpAction" value="" />
                   <input type="hidden" id="editExpId" name="editExpId" value="" />
                   <button type="button" class="btn btn-danger btn-flat" data-dismiss="modal">Cancel</button>
                   <button type="submit" name="workExpBtn" id="workExpBtn" class="btn btn-primary btn-flat bg-teal">Submit</button>
               </div>
           </form>
        </div>
    </div>
</div>