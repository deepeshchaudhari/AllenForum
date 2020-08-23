
<div class="row">
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3 id="totalBooksCount"><i class="fa fa-spinner fa-spin" style="font-size:30px"></i></h3>
                <p><a href="#" style="color: white;">Total Books in Library</a></p>
            </div>
            <div class="icon">
                <i class="fa fa-book"></i>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-green">
            <div class="inner">
                <h3 id="csBookCount"><i class="fa fa-spinner fa-spin" style="font-size:30px"></i></h3>
                <p>Computer Science/IT</p>
            </div>
            <div class="icon">
                <i class="fa fa-code"></i>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3 id="ecBookCount"><i class="fa fa-spinner fa-spin" style="font-size:30px"></i></h3>
                <p>Electronics Engineering</p>
            </div>
            <div class="icon">
                <i class="fa  fa-play"></i>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <h3 id="eeBookCount"><i class="fa fa-spinner fa-spin" style="font-size:30px"></i></h3>
                <p>Electrical Engineering</p>
            </div>
            <div class="icon">
                <i class="fa  fa-plug"></i>
            </div>
        </div>
    </div>

</div>

<div class="row">
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-lime">
            <div class="inner">
                <h3 id="meBookCount"><i class="fa fa-spinner fa-spin" style="font-size:30px"></i></h3>
                <p>Mechanical Engineering</p>
            </div>
            <div class="icon">
                <i class="fa  fa-gears"></i>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-purple">
            <div class="inner">
                <h3 id="ceBookCount"><i class="fa fa-spinner fa-spin" style="font-size:30px"></i></h3>
                <p>Civil Engineering</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-teal">
            <div class="inner">
                <h3 id="appliedBookCount"><i class="fa fa-spinner fa-spin" style="font-size:30px"></i></h3>
                <p>Applied Science</p>
            </div>
            <div class="icon">
                <i class="fa fa-graduation-cap"></i>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-teal">
            <div class="inner">
                <h3 id="managementBookCount"><i class="fa fa-spinner fa-spin" style="font-size:30px"></i></h3>
                <p>Management</p>
            </div>
            <div class="icon">
                <i class="fa fa-graduation-cap"></i>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-green-gradient">
            <div class="inner">
                <h3 id="defaultBookCount"><i class="fa fa-spinner fa-spin" style="font-size:30px"></i></h3>
                <p>Default Category</p>
            </div>
            <div class="icon">
                <i class="fa fa-graduation-cap"></i>
            </div>
        </div>
    </div>

</div>

<script type="text/javascript">
    window.onload = function() {
        getLibraryDasboardData();
    };
</script>