<?php
$salaryD = $_GET["salaryD"];
$jumlah = count($salaryD);
$amountT = $_GET["amountT"];
$talentT = $_GET["talentType"];

for ($i = 0; $i < $jumlah; $i++) {
    $salary[$i] = $amountT[$i] * $salaryD[$i];
}

$totalSalary = $_GET["workD"] * array_sum($salary);
$feeGawija = $totalSalary * 0.1;
$ppn = $totalSalary * 0.05;
$grandT = $totalSalary + $feeGawija + $ppn;

if (isset($_POST['add-pro'])) {
    $projN = $_GET["projN"];
    $address = $_GET["address"];
    $cek_job = mysqli_query($con, "SELECT * FROM job WHERE `judul` = '$projN' AND `idc` = '$idc' AND `address` = '$address'");

    if (mysqli_num_rows($cek_job) < 1) {
        $comp = $data_client['comp'];
        $projD = $_GET['projD'];
        $city = $_GET["city"];
        $workD = $_GET['workD'];
        $date =  explode("-", $_GET['date-proj']);
        $dateStart = date("yy-m-d", strtotime($date[0]));
        $dateEnd = date("yy-m-d", strtotime($date[1]));

        mysqli_query($con, "INSERT INTO `job`(`idj`, `idc`, `comp`, `judul`, `deskripsi`, `start`, `end`, `address`, `city`, `workday`, `total_salary`, `fee_gawiae`, `grandtotal`, `pajak`, `status`) VALUES (NULL, '$idc', '$comp','$projN', '$projD', '$dateStart', '$dateEnd', '$address', '$city', '$workD', '$totalSalary', '$feeGawija', '$grandT', '$ppn', 'pending')");

        for ($i = 0; $i < $jumlah; $i++) {
            $data_idj = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM job WHERE idc = '$idc' AND judul = '$projN' "));
            $idj = $data_idj['idj'];
            mysqli_query($con, "INSERT INTO job_req (`idjr`, `idj`, `numtalent`, `salary`, `type`) VALUES (NULL, '$idj', '$amountT[$i]', '$salaryD[$i]', '$talentT[$i]')");
            echo "<script>window.location.href='?p=job-list'</script>";
        }
    } else {
        echo "<script>Swal.fire({icon: 'error',title: 'Oops...',text: 'Data tersebut sudah anda inputkan'})</script>";
        // echo "<script>window.location.href='?p=job-list'</script>";
    }
}

?>
<link rel="stylesheet" href="../assets/css/form-wizard.css">

<!-- Air DatePicker -->
<link rel="stylesheet" href="../assets/css/datepicker.min.css" type="text/css">
<!-- Air DatePicker -->

<div class="row d-content">
    <div class="col-lg-12 page-content">
        <h3 class="text-center mb-4">Project <?= ucwords($_GET["projN"]) ?> </h3>
        <form id="regForm" action="" method="POST">
            <!-- Nilai Tampungan -->
            <input type="text" hidden value="<?= $_GET["projN"] ?>" name="projN">
            <input type="text" hidden value="<?= $_GET["projD"] ?>" name="projD">
            <input type="text" hidden value="<?= $_GET["city"] ?>" name="city">
            <input type="text" hidden value="<?= $_GET["address"] ?>" name="address">
            <input type="text" hidden value="<?= $_GET["workD"] ?>" name="workD">


            <div class="tab">

                <label for="date-proj">Periode Project</label>
                <input type="text" data-range="true" disabled placeholder="Start - End" data-multiple-dates-separator=" - " data-language="en" class="datepicker-here form-control" name="date-proj" value="<?= $_GET['date-proj'] ?>" />

                <label for="totalSalary">Total Salary</label>
                <input type="text" placeholder="Total Salary " disabled id="totalSalary" oninput="this.className = ''" name="totalSalary" value=" <?= number_format($totalSalary, 0, ",", '.') ?>">

                <label for="feeGawija">Fee Gawija</label>
                <input type="text" placeholder="Fee Gawija " disabled id="feeGawija" oninput="this.className = ''" name="feeGawija" value="<?= number_format($feeGawija, 0, ",", '.') ?> ">

                <label for="ppn">PPN 5%</label>
                <input type="text" placeholder="PPN " disabled id="ppn" oninput="this.className = ''" name="ppn" value="<?= number_format($ppn, 0, ",", '.') ?> ">

                <label for="grandT">Grand Total</label>
                <input type="text" placeholder="Grand Total " disabled id="grandT" oninput="this.className = ''" name="grandT" value="<?= number_format($grandT, 0, ",", '.') ?> ">


            </div>

            <div style="overflow:auto;">
                <div id="BtnSend" style="float:right;">
                    <button type="submit" id="nextBtn" name="add-pro">Submit</button>
                </div>
            </div>

        </form>
    </div>
</div>


</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
</script>
<!-- End Bootstrap -->
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>
<script src="../assets/js/form-wizard.js"></script>
<!-- Air DatePicker -->
<script src="../assets/js/date-picker/datepicker.min.js"></script>
<!-- Include English language -->
<script src="../assets/js/date-picker/i18n/datepicker.en.js"></script>
<!-- Air DatePicker -->
<script> </script>