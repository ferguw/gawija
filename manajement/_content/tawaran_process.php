<?php 
    $status = $_GET['status'];
    $idj = $_GET["idj"];
    $value = '746572696d61';
    if ($status === $value) {
        mysqli_query($con, "UPDATE `tawaran` SET `status` = 'accept' WHERE `idj` = '$idj' AND `idt` = '$idt' ;");
        echo "<script>window.history.back();</script>";
    }

?>