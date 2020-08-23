<div class="row">
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3 id="totalFaculyCount"><i class="fa fa-spinner fa-spin" style="font-size:30px"></i></h3>
                <p>Total Faculty </p>
            </div>
            <div class="icon">
                <i class="fa  fa-group"></i>
            </div>
            <a href="faculties-details.php?action=view" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-green">
            <div class="inner">
                <h3 id="totalStudentCount"><i class="fa fa-spinner fa-spin" style="font-size:30px"></i></h3>
                <p>Total Students</p>
            </div>
            <div class="icon">
                <i class="fa  fa-graduation-cap"></i>
            </div>
            <a href="students-details.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-purple">
            <div class="inner">
                <h3 id="totalReceptionist"><i class="fa fa-spinner fa-spin" style="font-size:30px"></i></h3>
                <p>Receptionist</p>
            </div>
            <div class="icon">
                <i class="fa fa-phone"></i>
            </div>
            <a href="receptionist-details.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-purple">
            <div class="inner">
                <h3 id="totalLibrarian"><i class="fa fa-spinner fa-spin" style="font-size:30px"></i></h3>
                <p>Librarian</p>
            </div>
            <div class="icon">
                <i class="fa fa-phone"></i>
            </div>
            <a href="librarian-details.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>

<script type="text/javascript">
    window.onload = function() {
        getAdminDasboardData();
    };
</script>