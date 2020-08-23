<?php include "../config/session_header.php"; ?>
<?php
include "../config/configuration.php";
include_once "functions/common/Common.php";
include_once "functions/library/Library.php";
?>
<?php
$pageTitle = "Upload Library Books| Allenhouse Group of Colleges";
include('header.php');?>

<?php
$activeTabDash = "";
$activeLinkDash = "";
$library = new Library();

if (isset($_POST['uploadBookBtn'])) {
    if($_FILES['book_sheet']['name'])   {
        $arrFileName = explode('.',$_FILES['book_sheet']['name']);
        if($arrFileName[1] == 'csv')     {
            $handle = fopen($_FILES['book_sheet']['tmp_name'], "r");
           // $count = 0;

            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $count++;
                if ($count == 1) { continue; }
                $bookId = $data[0];
                $bookName = $connection->real_escape_string($data[1]);
                $bookAuthor = $connection->real_escape_string($data[2]);
                $bookCategory = $data[3];
                $bookYear = $data[4];

                $bookUpload = $library->uploadLibraryBooks($connection,$bookId,$bookName,$bookAuthor,$bookCategory,$bookYear);

            }
           if ($bookUpload){
               $_SESSION['uploadStatus'] = 1;
           }
        }
    }
}
?>

<?php include('sidebar.php');?>
<div class="content-wrapper">
    <section class="content">
        <div  class="row">
            <div class="col-md-12">
                <div class="nav-tabs-custom">
                    <div class="tab-content" >
                        <div class="box-header">
                            <i class="glyphicon glyphicon-saved"></i>
                            <h3 class="box-title">Add Library Books</h3>
                            <div class="pull-right box-tools">
                               <span>
                                   <img src="ownImages/other/gif_processing.gif" width="30" height="30">
                               </span>
                            </div>
                        </div>  <img src="ownImages/other/line.png" width="100%" height="1"/>
                        <div id="submitAddBookLoading" style="display: none;">
                            <center><img src="ownImages/library/loading1.gif"></center>
                        </div>
                        <form  id="uploadBookSheetForm">
                            <div class="col-md-12">
                                <div class="alert custome-alert-success" id="formSuccessMessage" style="display: none;"><b>Success! Sheet uploaded </b></div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Book Sheet</label>
                                    <input type="file" name="book_sheet" id="book_sheet"  required onchange="validateFileUpload();" class="form-control"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6"><br/>
                                    <input type="hidden" id="uploadSheet" name="uploadSheet" value="bookSheetUpload" />
                                    <button type="submit"  name="uploadBookBtn" id="uploadBookBtn"  class="btn btn-success  btn-flat" ><i class="fa fa-upload"></i> Upload Book</button>
                                </div>
                            </div>
                        </form><br/>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- /.content-wrapper -->

<?php include('footer.php');?>

<script type="text/javascript">
    function validateFileUpload() {
            var fup = document.getElementById('book_sheet');
            var attachment = fup.value;
            var ext = attachment.substring(attachment.lastIndexOf('.') + 1);

            if(ext == "CSV" || ext == "csv"){
                return true;
            }else{
                alert("Only CSV File can be uploaded !!");
                $("#book_sheet").val("");
                $("#book_sheet").focus();
                return false;
            }

    }
</script>




