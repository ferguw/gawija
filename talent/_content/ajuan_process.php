<?php 
    $status = $_GET['status'];
    $idj = $_GET["idj"];
    $value = '616a756b616e';

    $cari_job_ajuan_talent = mysqli_query($con, "SELECT * FROM ajuan WHERE `idj` = '$idj' AND `idt` = '$idt' ");
    if (mysqli_num_rows($cari_job_ajuan_talent) < 1) {
        if ($status === $value) {
            // echo "<script>window.alert('Berhasil')</script>";
            mysqli_query($con, "INSERT INTO `ajuan` (`idaj`, `idj`, `idt`) VALUES (NULL,'$idj','$idt')");
            // echo $status." dan ".$idj;
            echo "<script>window.history.back();</script>";
        }
    } else {
        echo "<script>window.history.back();</script>";
    }

