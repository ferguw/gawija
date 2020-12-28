<!-- Info -->
<?php
    $job_count = mysqli_fetch_row(mysqli_query($con, "SELECT count(*) FROM job WHERE `idc` = '$idc'"));
    $job_count = array_sum($job_count);
    $job_prog = mysqli_fetch_row(mysqli_query($con, "SELECT count(*) FROM job WHERE `idc` = '$idc' AND `status`='accept' "));
    $job_prog = array_sum($job_prog);
    $job_sub = mysqli_fetch_row(mysqli_query($con, "SELECT count(*) FROM job WHERE `idc` = '$idc' AND `status`='pending' "));
    $job_sub = array_sum($job_sub);
?>
<div class="row d-info">
     <div class="col-lg-12 card-info">
         <h6>Anggaran</h6>
         <h5>Rpxxx.xxxx</h5>
         <h6>Job Proggress</h6>
         <h5><?= $job_prog ?></h5>
         <h6>Job Submmision</h6>
         <h5><?= $job_sub ?></h5>
         <h6>My Project</h6>
         <h5><?= $job_count ?></h5>
     </div>
 </div>
 <!-- Info -->
<div class="row jarak-bottom-menu"><div class="col-12">&nbsp;</div></div>