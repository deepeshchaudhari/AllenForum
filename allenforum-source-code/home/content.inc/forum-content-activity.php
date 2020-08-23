<div class="row">
    <div class="col-md-12">
        <!--<div class="box-header with-border">
            <h3 class="box-title">Activity</h3>
            <div class="box-tools pull-right">
                <div class="has-feedback">
                    <input type="text" class="form-control input-sm" placeholder="Search Question">
                    <span class="glyphicon glyphicon-search form-control-feedback"></span>
                </div>
            </div>
        </div>-->
        <div class="box-body no-padding">
           <div class="row">
               <div class="col-md-3 pull-right">
                   <div class="form-group">
                       <select name="searchActivity" id="searchActivity" class="form-control" onchange="getActivityContent();">
                           <option value="ques">My Question</option>
                           <option value="ans">My Answer</option>
                       </select>
                   </div>
               </div>
           </div>
                <div class="table-responsive mailbox-messages">
                    <center>
                        <img src="../home/ownImages/other/loading/small-loader.gif" style="display: none;" id="activityLoader">
                    </center>
                    <div id="activityDiv">

                    </div>
                </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    window.onload = function() {
      getActivityContent();
    };
</script>