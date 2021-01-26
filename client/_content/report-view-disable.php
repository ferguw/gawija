<?php
$idj = $_GET["idj"];

$timezone = "Asia/Makassar";
date_default_timezone_set($timezone);
$time = date("H:i a");
$date = date("l, d F Y");
$today = strtotime(date('Y-m-d'));

$data_job = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `job` WHERE `idj` = '$idj' AND `status`='ongoing'"));
$talent_list = mysqli_query($con, "SELECT * FROM job_ongoing WHERE `idj`='$idj' ");

$cari_date = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM job WHERE `idj`='$idj'"));
$start = strtotime($cari_date['start']);
$end = strtotime($cari_date['end']);
$days_between = ceil(abs($end - $start + 1) / 86400);
$jalan = ceil(abs($today - $start + 1) / 86400);
// echo $jalan;
// date('d m Y', ($start = strtotime($cari_date['start'] . ' + 2 days')));

$query_idj = mysqli_query($con, "SELECT * FROM report WHERE `idj`='$idj'");

?>
<style>
    #full_td {
        text-align: center;
        vertical-align: middle;
    }

    #ver-ali {
        vertical-align: middle;
    }
</style>

<!-- div::content -->
<div class="row d-content">
    <!-- Begin::Card -->
    <div class="col-lg-12 page-content">
        <h3 class="text-center">Report</h3>
        <!-- Card-Begin::Content -->
        <div class="row">
            <div class="col-12 card-content">
                <div class="row align-items-center">
                    <div class="col-3 col-lg-1">
                        <div class="img-profil">
                            <a href="#!" onclick="sidebar()"><img src="../assets/images/avatar/avatar-1.png" alt="avatar-user" width="100%"></a>
                        </div>
                    </div>
                    <div class="col-9 col-lg-11">
                        <h4><?php echo ucwords($data_job['judul']); ?></h4>
                        <span><?php echo strtoupper($data_job['comp']); ?></span>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-11 offset-lg-1">
                        <p>
                            <!-- </?php echo substr($data_job['deskripsi'], 0, 250); ?> -->
                            <?php echo $data_job['deskripsi'] ?>
                        </p>
                        <hr>
                    </div>
                </div>
                <div class="row align-items-center justify-content-center">
                    <div class="col-12 col-lg-6 text-center">
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <h5>Start Project</h5>
                                <span><?= date('l d F Y', strtotime($data_job['start'])) ?></span>
                            </div>
                            <div class="col-12 col-lg-6">
                                <h5>End Project</h5>
                                <span><?= date('l d F Y', strtotime($data_job['end'])) ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-12 col-lg-10 offset-lg-1 table-responsive">
                        <?php
                        for ($i = 0; $i < $days_between; $i++) {
                            $hari = date('d F Y', ($start = strtotime($cari_date['start'] . '+' . $i . 'days')));
                            $tiap_tgl = date('Y-m-d', ($start = strtotime($cari_date['start'] . '+' . $i . 'days')));
                            echo $tiap_tgl;
                        ?>
                            <table width="100%" class="table table-hover">
                                <!-- perulangan hari -->
                                <tr>
                                    <td id="ver-ali" colspan="3" align="left">
                                        <h5><?= $hari ?></h5>
                                    </td>
                                </tr>
                                <!-- perulangan report seluruh talent pada 1 hari -->
                                <?php
                                $query_talent_list = mysqli_query($con, "SELECT * FROM `job_ongoing` WHERE `idj`='$idj'");
                                while ($data_talent_list = mysqli_fetch_assoc($query_talent_list)) {
                                    $idt = $data_talent_list['idt'];
                                    $data_talent = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `talent` WHERE `idt`='$idt'"))
                                ?>
                                    <tr>
                                        <td id="ver-ali" width="10%">
                                            <div class="img-profil">
                                                <a href="#!" onclick="sidebar()"><img src="../assets/images/avatar/avatar-1.png" alt="avatar-user" width="100%"></a>
                                            </div>
                                        </td>
                                        <td id="ver-ali" width="10%">
                                            <?= $data_talent['name'] ?>
                                        </td>
                                        <td id="ver-ali" width="80%">
                                            <table width="100%">
                                                <!-- perulangan report harian -->
                                                <?php
                                                // $days = date('Y-m-d', ($start = strtotime($start . '+' . $i . 'days')));
                                                $query_report = mysqli_query($con, "SELECT * FROM report WHERE `idt`='$idt' AND `tgl`='$tiap_tgl'");
                                                while ($data_report = mysqli_fetch_assoc($query_report)) {
                                                ?>
                                                    <tr>
                                                        <td id="ver-ali" width="80%">
                                                            <?php
                                                            if (!$query_report) {
                                                                echo "Talent Belum Menginput Report";
                                                            } else {
                                                                echo substr($data_report['desk_rp'], 0, 50) . '...';
                                                            }
                                                            ?>
                                                        </td>

                                                        <td id="ver-ali">
                                                            <button class="btn btn-b2" data-toggle="modal" data-target="#exampleModal<?= $data_report['idrp'] ?>">Detail</button>
                                                            <!-- Modal -->
                                                            <div class="modal fade" id="exampleModal<?= $data_report['idrp'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-scrollable">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Report</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <table align="center" width="100%">
                                                                                <tr>
                                                                                    <td colspan="3"><?= $hari ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Name</td>
                                                                                    <td>:</td>
                                                                                    <td><?= $data_talent['name'] ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Report Details</td>
                                                                                    <td>:</td>
                                                                                    <td><?= $data_report['desk_rp'] ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Documentation</td>
                                                                                    <td>:</td>
                                                                                    <td><img src="../assets/images/report/<?= $data_report['photo'] ?>" width="150px" alt=""></td>
                                                                                </tr>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>

                                                    </tr>
                                                <?php } ?>
                                            </table>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </table> <br>
                        <?php } ?>
                    </div>
                </div>

            </div>
        </div>
        <!-- Card-End::Content -->
    </div>
    <!-- End::Card -->
</div>
<!-- div::content -->