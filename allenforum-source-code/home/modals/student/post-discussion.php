<div class="modal fade" id="postDiscussion" tabindex="-1" role="dialog" aria-labelledby="postDiscussion">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form  name="askquestion_form" id="askquestion_form" enctype="multipart/form-data">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel"><b>Discuss</b></h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <select name="askWithWhome" id="askWithWhome" class="form-control" >
                                <option value="" >Select Authority</option>
                                <option value="student">Student</option>
                                <option value="faculty">Faculty</option>
                                <option value="all">All</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-3" id="courseDiv">
                        <div class="form-group">
                            <select name="askWithWhomeCourse" id="askWithWhomeCourse" class="form-control"  onchange="getDepartmentByCourse(this.value,'discussion');">
                                <option value="" >Select Course</option>
                                <?php while ($course = $courses->fetch_object()) {  ?>
                                    <option value="<?php echo $course->id.'^'.$course->course_name;?>" ><?php echo $course->course_name;?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <select name="shareWithdepartment" id="department_branch" class="form-control">
                                <option value="" selected disabled>Select Department</option>
                                <?php while ($department = $departments->fetch_object()){ ?>
                                    <option value="<?php echo $department->id;?>" ><?php echo $department->department_name;?></option>
                                <?php } ?>
                                <option value="n">All</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-3" id="yearDiv">
                        <div class="form-group">
                            <select name="shareWithYear" id="shareWithYear" class="form-control" >
                                <option value="">Select Year</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="n">All</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <input type="text" name="question_title" id="question_title"  placeholder="Enter Query Title"  class="form-control"/>
                        </div>
                    </div>
                </div>
                <div class="box-body pad">
                    <textarea name="your_question"  id="your_question"></textarea>
                    <script>
                        CKEDITOR.replace( 'your_question' );
                    </script>
                </div>
            </div>
            <div class="box-footer">
                <div class="pull-right">
                    <input type="hidden" id="actionAskQuestion" name="actionAskQuestion" value="actionAskQuestion">
                    <button type="submit" name="askQuestionBtn" id="askQuestionBtn" class="btn btn-primary btn-flat"> Send <i class="fa fa-arrow-circle-right"></i> </button>
                </div>
                <div class="btn btn-default btn-file btn-flat">
                    <i class="fa fa-paperclip"></i> Problem Pic <input type="file" name="problem_pics"  id="attachment" onChange="checkAttachment();">
                </div>
                <p class="help-block">100KB</p>
            </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">

    function checkAttachment(){
        var editor = CKEDITOR.instances.quesText.getData();

        if (editor == '') {
            alert('Notice Field can not be empty ! ') ;
            return false ;
        }
        var fup = document.getElementById('attachment');
        var attachment = fup.value;
        var ext = attachment.substring(attachment.lastIndexOf('.') + 1);

        if(ext == "png" || ext =="PNG" || ext == "jpg" || ext =="JPG" || ext == "jpeg" || ext =="JPEG" ||ext == "gif" || ext == "GIF" ||
            ext == 'pdf' || ext == "PDF" || ext == 'docx'){
            document.career.attachment.style.border="";
            document.career.attachment.style.borderColor="";
            return true;

            var div = document.createElement('div');
            var img = document.createElement('img');
            img.src = 'ownImages/library/loading1.gif';
            div.innerHTML = "Processing...<br />";
            div.style.cssText = 'position: fixed; top: 15%; left: 40%; z-index: 5000; width: 422px; text-align: center; ';
            div.appendChild(img);
            document.body.appendChild(div);
            return true;
            // These 2 lines cancel form submission, so only use if needed.
            //window.event.cancelBubble = true;
            //e.stopPropagation();
        }else{
            alert("Only png,jpg,jpeg are Supported");
            document.askquestion_form.attachment.style.border="1px solid";
            document.askquestion_form.attachment.style.borderColor="red";
            document.askquestion_form.attachment.focus();
            document.getElementById("attachment").value = "";
            //attachment.focus();
            return false;
        }
    }
</script>