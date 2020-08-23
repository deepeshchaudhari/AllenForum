<?php include "../config/session_header.php"; ?>
<?php include_once "functions/common/Common.php";?>
<?php
$pageTitle = "Questions Asked  | Allenhouse Group of Colleges";
include('header.php');
?>

<?php
$activeTabDash = "";
$activeLinkDash = "";
?>
<?php
if (isset($_GET['type']) && $_GET['type'] == 'GATE'){
    $label = "GATE Study Material";

} elseif (isset($_GET['type']) && $_GET['type'] == 'CAT'){
    $label = "CAT Study Material";
}
 else{
    header("Location:404.php");
}
?>
<?php include('sidebar.php');?>
<div class="content-wrapper">
    <section class="content">
        <div  class="row">
            <div class="col-md-12">
                <div class="nav-tabs-custom">
                    <div class="tab-content">
                        <div class="box-header">
                            <i class="glyphicon glyphicon-saved"></i>
                            <h3 class="box-title"><?php echo $label;?>
                                <a href="#" data-toggle="modal" data-target="#addHigherStudiesMaterial">
                                    <i class="fa fa-plus-circle" data-toggle="tooltip" title="Add Study Material"></i>
                                </a>
                            </h3>
                            <div class="pull-right box-tools">
                               <span>
                                   <img src="ownImages/other/gif_processing.gif" width="30" height="30">
                               </span>
                            </div>
                        </div> <hr/>
                        <div class=" ">
                            <table  id="libraryBooks" class="table table-hover table-striped">
                                <thead>
                                <tr style="color: white; background-color: #00BFA5;">
                                    <th>Sr.</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Download</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $sr = 1;
                                $common = new CommonFunctions();
                                $studyMaterial = $common->getHigherStudyMaterial($connection,$_GET['type']);
                                while ($material = $studyMaterial->fetch_object()){ ?>
                                    <tr>
                                        <td><?php echo $sr;?></td>
                                        <td><?php echo $material->file_title;?></td>
                                        <td><?php echo $material->category;?></td>
                                        <td>
                                            <a href="<?php echo $material->file_name;?>"><i class="fa fa-download"></i> </a>
                                        </td>
                                    </tr>
                               <?php $sr++; }
                                ?>
                                </tbody>
                                <tfoot>
                                <tr style="color: white; background-color: #00BFA5;">
                                    <th>Sr.</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Download</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php include "modals/common/forum-add-higher-studies-material.php";?>
<?php include('footer.php');?>




