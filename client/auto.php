<?php
    $con = mysqli_connect("localhost",  "root", "", "gawija");
    $get_job = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `job` WHERE `idj`='13'"));

    $timezone = "Asia/Makassar";
    date_default_timezone_set($timezone);
    $time = date("H:i a");
    $date = date("Y-m-d");

    $get_job['start'];
    $idj = $get_job['idj'];
     if ($date = $get_job['start']) {
         mysqli_query($con, "UPDATE `job` SET `status`='ongoing' WHERE `idj`='$idj' ");
     }
?>