<div class="modal fade" id="modalAddCompanyInfo" tabindex="-1" role="dialog" aria-labelledby="modalAddCompanyInfo">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="addComapnyInfo">
            <div class="modal-header bg-primary" >
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="careerCaption"></h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <input type="hidden" id="worktype" name="worktype" value=""/>
                            <input type="hidden" id="companyEditId" name="companyEditId" value=""/>
                            <label for="title" class="control-label">Company Name <span class="field-required">*</span> </label>
                            <input type="text" name="company_name"  id="company_name" placeholder="Compnay Name"   class="form-control" >
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="title" class="control-label">Website Url <span class="field-required">*</span></label>
                            <input type="text" name="company_website"  id="company_website" placeholder="example.com"   class="form-control" >
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="student-position" class="control-label">Category <span class="field-required">*</span></label>
                        <select name="company_category" id="company_category" class="form-control">
                            <option value="">Select</option>
                            <?php
                            while ($departments = $department->fetch_object()){ ?>
                                <option value="<?php echo $departments->id;?>">
                                    <?php
                                    if ($departments->department_name == 'CSE') echo 'Computer Science & Engineering/IT Company';
                                    elseif ($departments->department_name == 'EC') echo 'Electronics Engineering';
                                    elseif ($departments->department_name == 'ME') echo 'Mechanical Engineering';
                                    elseif ($departments->department_name == 'EN') echo 'Electrical & Electronics Engineering';
                                    elseif ($departments->department_name == 'CIVIL') echo 'Civil Engineering';
                                    elseif ($departments->department_name == 'BBA') echo 'Bachelor of Business Administration';
                                    elseif ($departments->department_name == 'BCA') echo 'Bachelor of Computer Application';?>
                                </option>
                            <?php }
                            ?>

                        </select>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="inputname" class=" control-label">Company logo</label>
                            <input type="hidden" name="company_logoHidden" id="company_logoHidden" value=""/>
                            <input type="file" name="company_logo" id="company_logo"  placeholder="Company logo" class="form-control" onchange="validateCompanyLogo();" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="message-text" class="control-label">Company Description</label>
                    <textarea class="form-control" name="company_description" id="company_description" placeholder="Enter Description"   ></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="addComapnyInfo" id="addComapnyInfo" value="addComapnyInfo">
                <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Cancel</button>
                <button type="submit" id="addComapnyInfoBtn" name="addComapnyInfoBtn"  class="btn btn-primary btn-flat">Submit</button>
                <button type="submit" id="addComapnyInfoBtnLoader" name="addComapnyInfoBtnLoader"  class="btn btn-success btn-flat" style="display: none;">
                    <img src="ownImages/other/loading/btn-loading.gif" width="17" height="17">Processing...</button>

            </div>
            </form>
        </div>
    </div>
</div>