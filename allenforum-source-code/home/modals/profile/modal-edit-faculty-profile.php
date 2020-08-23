<div class="modal fade" id="modalEditFacultyProfile" tabindex="-1" role="dialog" aria-labelledby="modalEditFacultyProfile">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="updateFacultyProfile">
                <div class="modal-header bg-primary" >
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="modalTitle">Update  Profile</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="form-group">
                                <label for="title" class="control-label">Email <span class="field-required">*</span> </label>
                                <input type="text" name="email"  id="email" placeholder="Email" readonly   class="form-control" >
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="title" class="control-label">New Password  </label>
                                <input type="text" name="newPassword"  id="newPassword" placeholder="New Password"   class="form-control" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="title" class="control-label">Name <span class="field-required">*</span></label>
                                <input type="text" name="facultyName"  id="facultyName" placeholder="Name"   class="form-control" >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="faculty-position" class="control-label">Contact <span class="field-required">*</span></label>
                            <input type="text" name="facultyContact"  id="facultyContact" placeholder="Contact" maxlength="10"   class="form-control" >
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
                            <label for="faculty-position" class="control-label">Course <span class="field-required">*</span></label>
                            <select name="course_program" id="course_program" class="form-control"  onchange="getDepartmentByCourse(this.value,'');">
                                <option value="">Course</option>
                                <?php while ($course = $courses->fetch_object()) {  ?>
                                    <option value="<?php echo $course->id;?>" ><?php echo $course->course_name;?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="faculty-position" class="control-label">Department <span class="field-required">*</span></label>
                            <select name="department_branch" id="department_branch"  class="form-control">
                                <option value="">Department</option>
                                <?php while ($department = $departments->fetch_object()){ ?>
                                    <option value="<?php echo $department->id;?>" ><?php echo $department->department_name;?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div><br/>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inputname" class=" control-label">Profile</label>
                                <input type="hidden" name="faculyProfileHidden" id="faculyProfileHidden" />
                                <input type="file" name="faculyProfile" id="faculyProfile" class="form-control" onchange="validateCompanyLogo();" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="actionUpdateFacultyProfile" id="actionUpdateFacultyProfile" value="actionUpdateFacultyProfile" />
                    <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Cancel</button>
                    <button type="submit" id="updateFacultyProfileBtn" name="updateFacultyProfileBtn"  class="btn btn-primary btn-flat">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>