<div class="modal fade" id="modalEditAdminProfile" tabindex="-1" role="dialog" aria-labelledby="modalEditAdminProfile">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="updateAdminProfile">
                <div class="modal-header bg-primary" >
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="modalTitle">Update  Profile</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="form-group">
                                <label for="title" class="control-label">Email <span class="field-required">*</span> </label>
                                <input type="text" name="adminEmail"  id="adminEmail" placeholder="Email" readonly   class="form-control" >
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="title" class="control-label">New Password  </label>
                                <input type="text" name="adminNewPassword"  id="adminNewPassword" placeholder="New Password"   class="form-control" >
                                <input type="hidden" name="adminPrevHiddenPassword"  id="adminPrevHiddenPassword" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="title" class="control-label">Name <span class="field-required">*</span></label>
                                <input type="text" name="adminName"  id="adminName" placeholder="Name"   class="form-control" >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="faculty-position" class="control-label">Contact <span class="field-required">*</span></label>
                            <input type="text" name="adminContact"  id="adminContact" placeholder="Contact" maxlength="10"   class="form-control" >
                        </div>
                        <div class="col-md-4">
                            <label for="faculty-position" class="control-label">Allow Email <span class="field-required">*</span></label>
                            <select name="emailPersmission" id="emailPersmission" class="form-control" >
                                <option value="1">YES</option>
                                <option value="0">NO</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label for="faculty-position" class="control-label">Department <span class="field-required">*</span></label>
                            <select name="department_branch" id="department_branch"  class="form-control" readonly>
                                <option value="admin" selected>Admin</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inputname" class=" control-label">Profile</label>
                                <input type="hidden" name="adminProfileHidden" id="adminProfileHidden" />
                                <input type="file" name="admin_profile_pic" id="admin_profile_pic" class="form-control" onchange="validateAdminProfile();" />
                            </div>
                        </div>
                    </div><br/>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="actionUpdateAdminProfile" id="actionUpdateAdminProfile" value="actionUpdateAdminProfile" />
                    <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Cancel</button>
                    <button type="submit" id="updateAdminProfileBtn" name="updateAdminProfileBtn"  class="btn btn-primary btn-flat">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>