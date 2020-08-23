<?php
 $myNotices = $connection->query("SELECT * FROM forum_notices WHERE 
  permission = 'students' OR permission = 'all' ")
 or die("Somehting erorr".$connection->error);
?>
<div class="post">
    <div class="user-block">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Sr.No</th>
                    <th>Title</th>
                    <th>Date</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $sr = 1;
                while ($notices = $myNotices->fetch_object()){ ?>
                   <tr>
                       <td><?php echo $sr;?></td>
                      <td> <a href="notice-is.php?notice_id=<?php echo base64_encode($notices->notice_id); ?> ">
                              <?php echo $notices->notice_subject; ?>
                          </a></td>
                       <td><?php echo $notices->date_time;?></td>
                   </tr>

             <?php  $sr++;
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>