<?php include "../config/session_header.php"; ?>
<?php
$pageTitle = "CV  | Allenhouse Group of Colleges";
include('header.php');
$activeTabDash = "";
$activeLinkDash = "";
include('sidebar.php');
// check cv detail is completed or not
$common = new CommonFunctions();
$checkDetail = $common->isCvDetailsCompleted($connection,$_SESSION['userId'],$_SESSION['userrole']);
if ($checkDetail->num_rows > 0)
{
    header("Location:user-profile.php");
}
?>
<div class="content-wrapper">
    <section class="content">
        <div  class="row">
            <div class="col-md-12">
                <div class="nav-tabs-custom">
                    <div class="tab-content">
                        <div class="box-header">
                            <i class="glyphicon glyphicon-user"></i>
                            <h3 class="box-title">CV</h3>
                            <div class="pull-right box-tools">
                                <span><img src="ownImages/other/gif_processing.gif" width="30" height="30"></span>
                            </div>
                        </div><hr/>
                        <form id="createCVForm">
                            <h4>Basic Information<img src="ownImages/other/line.png" width="100%" height="1"></h4>
                            <input type="hidden" name="cvCreate" id="cvCreate" value="createCV"/>
                            <div class="row" id="form1">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="text" name="cvName" id="cvName" class="form-control" placeholder="Name" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="text" name="cvFathersName" id="cvFathersName" class="form-control" placeholder="Father's Name" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="text" name="cvEmail" id="cvEmail" class="form-control" placeholder="Email " />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="text" name="cvContact" id="cvContact" class="form-control" placeholder="Contact" />
                                    </div>
                                </div>
                            </div>
                            <div class="row" id="form1">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="text" name="cvDob" id="cvDob" class="form-control" readonly placeholder="Date of Birth" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <select name="cvGender" id="cvGender" class="form-control">
                                            <option value="">Gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Femail">Femail</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="text" name="cvNationality" id="cvNationality" class="form-control" placeholder="Nationality" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="text" name="cvLanguages" id="cvLanguages" class="form-control" placeholder="Languages" />
                                    </div>
                                </div>
                            </div>
                            <div class="row" id="form1">

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="text" name="cvHobbies" id="cvHobbies" class="form-control" placeholder="Hobbies" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="text" name="cvStrengths" id="cvStrengths" class="form-control" placeholder="Strengths " />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <textarea name="cvPermanentAddress" id="cvPermanentAddress" class="form-control" placeholder="Permanent Address"></textarea>
                                    </div>
                                </div>
                            </div>


                            <h4>Career Information<img src="ownImages/other/line.png" width="100%" height="1"></h4>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea name="carrierObjective" cols="12"  id="carrierObjective" class="form-control" placeholder="Carrier Objective"></textarea>
                                    </div>
                                </div>
                            </div>

                            <h4>Academic Qualification <a href="javascript:void(0);" id="addmore"><i class="fa fa-plus-circle"></i> </a>
                                <a href="javascript:void(0);"  id="lessmore" style="display:none;"><i class="fa fa-minus-circle" style="color: red"></i></a>
                                <img src="ownImages/other/line.png" width="100%" height="1"></h4>
                            <table class="table">
                                <tbody id="dynamicdiv">
                                <tr class="remove">
                                    <td>
                                        <div class="form-group">
                                            <select name="cvQualification1" id="cvQualification1" class="form-control" >
                                                <option value="">Qualification</option>
                                                <option value="B.Tech">B.Tech</option>
                                                <option value="BBA">BBA</option>
                                                <option value="BCA">BCA</option>
                                                <option value="High School">High School</option>
                                                <option value="Intermediat">Intermediat</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input type="text" name="school_college1" id="school_college1" class="form-control" placeholder="School/College "/>
                                        </div>
                                    </td>
                                    <td width="15%">
                                        <div class="form-group">
                                            <input type="text" name="cvQualificationPer1" id="cvQualificationPer1" class="form-control" placeholder="Percentage " />
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <select name="cvQualificationBoardUni1" id="cvQualificationBoardUni1" class="form-control"  >
                                                <option value="">Board/University</option>
                                                <option value="ATKU">AKTU</option>
                                                <option value="UP Board">UP Board</option>
                                                <option value="UP Board">CBSE Board</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <h4>Training & Technical Skills <a href="javascript:void(0);" id="addmore1"><i class="fa fa-plus-circle"></i> </a>
                                <a href="javascript:void(0);"  id="lessmore1" style="display:none;"><i class="fa fa-minus-circle" style="color: red"></i></a>
                                <img src="ownImages/other/line.png" width="100%" height="1"></h4>
                            <table class="table">
                                <tbody id="dynamicdiv1">
                                <tr class="remove1">
                                    <td width="20%">
                                        <div class="form-group">
                                            <select name="traningTechTitle1" id="traningTechTitle1" class="form-control" >
                                                <option value="">Title</option>
                                                <option value="Languages">Languages</option>
                                                <option value="Web Technologies">Web Technologies</option>
                                                <option value="Database">Database</option>
                                                <option value="Framework">Framework</option>
                                                <option value="Graphics Tools">Graphics Tools</option>
                                                <option value="Packages">Packages</option>
                                                <option value="Operating System">Operating System</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input type="text" name="traningTechSkill1" id="traningTechSkill1" class="form-control" placeholder="Skill1,Skill2 " />
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <h4>Extra Curricular Activities
                                <a href="javascript:void(0);" id="addmore2"><i class="fa fa-plus-circle"></i> </a>
                                <a href="javascript:void(0);"  id="lessmore2" style="display:none;"><i class="fa fa-minus-circle" style="color: red"></i></a>
                                <img src="ownImages/other/line.png" width="100%" height="1"></h4>
                            <table class="table">
                                <tbody id="dynamicdiv2">
                                <tr class="remove2">
                                    <td>
                                        <div class="form-group">
                                            <input type="text" name="extraCarricular1" id="extraCarricular1" class="form-control" placeholder="Extra Carricular Activities " />
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>

                            <h4>Academic Projects
                                <a href="javascript:void(0);" id="addmore3"><i class="fa fa-plus-circle"></i> </a>
                                <a href="javascript:void(0);"  id="lessmore3" style="display:none;"><i class="fa fa-minus-circle" style="color: red"></i></a>
                                <img src="ownImages/other/line.png" width="100%" height="1"></h4>
                            <table class="table table-bordered">
                                <tbody id="dynamicdiv3">
                                <tr class="remove3">
                                    <td>
                                        <input type="text" name="academicProj1" id="academicProj1" class="form-control" placeholder="Project Titlte" />
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <textarea name="academicProjDes1" id="academicProjDes1" class="form-control" placeholder="Project Description "></textarea>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <input type="hidden" name="numrows" id="numrows" value="1">
                            <input type="hidden" name="numrows1" id="numrows1" value="1">
                            <input type="hidden" name="numrows2" id="numrows2" value="1">
                            <input type="hidden" name="numrows3" id="numrows3" value="1">



                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" name="submitcvbtn" id="submitcvbtn" class="btn btn-success btn-flat pull-right " >Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php include('footer.php');?>




