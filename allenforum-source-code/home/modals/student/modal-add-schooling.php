<div class="modal fade" id="exampleModalAddEditSchooling" tabindex="-1" role="dialog" aria-labelledby="exampleModalAddEditSchooling">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-teal">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel"><b>Schooling/Education</b></h4>
            </div>
            <form id="studentSchoolingAddEditForm">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="title" class="control-label">College Name <span class="field-required">*</span></label>
                            <input type="text" name="college_name"  id="college_name" placeholder="College Name"   class="form-control" >
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label for="student-position" class="control-label">Qualification <span class="field-required">*</span></label>
                        <select name="qualification" id="qualification" class="form-control">
                            <option value="">Qualification</option>
                            <option value="B.Tech">B.Tech</option>
                            <option value="BBA">BBA</option>
                            <option value="BCA">BCA</option>
                            <option value="12th">12th</option>
                            <option value="10th">10th</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="student-position" class="control-label">Start Date <span class="field-required">*</span> </label>
                            <select name="start_year"  id="start_year"   class="form-control" >
                                <option value="" >Starting Year</option>
                                <option value="2005">2005</option>
                                <option value="2006">2006</option>
                                <option value="2007">2007</option>
                                <option value="2008">2008</option>
                                <option value="2009">2009</option>
                                <option value="2010">2010</option>
                                <option value="2011">2011</option>
                                <option value="2012">2012</option>
                                <option value="2013">2013</option>
                                <option value="2014">2014</option>
                                <option value="2015">2015</option>
                                <option value="2016">2016</option>
                                <option value="2017">2017</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="student-position" class="control-label">Complete Date <span class="field-required">*</span></label>
                            <select name="completing_year"  id="completing_year"   class="form-control" >
                                <option value="">Completion Year</option>
                                <option value="2006">2006</option>
                                <option value="2007">2007</option>
                                <option value="2008">2008</option>
                                <option value="2009">2009</option>
                                <option value="2010">2010</option>
                                <option value="2011">2011</option>
                                <option value="2012">2012</option>
                                <option value="2013">2013</option>
                                <option value="2014">2014</option>
                                <option value="2015">2015</option>
                                <option value="2016">2016</option>
                                <option value="2017">2017</option>
                                <option value="2018">2018</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="message-text" class="control-label">College Address <span class="field-required">*</span></label>
                    <textarea class="form-control" name="schooling_des" id="schooling_des" placeholder="Enter City, State of College"   ></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="studentProfileSchoolingAction" id="studentProfileSchoolingAction" value="" />
                <input type="hidden" id="editSchoolingId" name="editSchoolingId" value="" />
                <button type="button" class="btn btn-danger btn-flat" data-dismiss="modal">Close</button>
                <button type="submit" id="studentAddsSchoolingBtn" name="studentAddsSchoolingBtn"  class="btn btn-primary btn-flat bg-teal">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>