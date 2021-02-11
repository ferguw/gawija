<?php
$idj = $_GET["idj"];

$my_list_job_ongoing = mysqli_query($con, "SELECT * FROM `job` WHERE `idj` = '$idj'");
$talent_list = mysqli_query($con, "SELECT * FROM job_ongoing WHERE `idj`='$idj' ");

$cari_date = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM job WHERE `idj`='$idj'"));
$start = strtotime($cari_date['start']);
$end = strtotime($cari_date['end']);
$days_between = ceil(abs($end - $start) / 86400);
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

    #half_td {
        vertical-align: middle;
    }
</style>

<!-- div::content -->
<div class="row d-content">
    <!-- Begin::Card -->
    <div class="col-lg-12 page-content">
        <h3 class="text-center">Report</h3>
        <?php
        $data_list_job = mysqli_fetch_assoc($my_list_job_ongoing)
        ?>
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
                        <h4><?php echo ucwords($data_list_job['judul']); ?></h4>
                        <span><?php echo strtoupper($data_list_job['comp']); ?></span>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-11 offset-lg-1">
                        <p>
                            <?php echo substr($data_list_job['deskripsi'], 0, 250); ?>
                        </p>
                        <hr>
                    </div>
                </div>
                <div class="row align-items-center justify-content-center">
                    <div class="col-12 col-lg-6 text-center">
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <h5>Start Project</h5>
                                <span>Monday, 21 December 2020</span>
                            </div>
                            <div class="col-12 col-lg-6">
                                <h5>End Project</h5>
                                <span>Monday, 28 December 2020</span>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-12 col-lg-10 offset-lg-1">
                        <!-- <table class="col-12 table table-hover" style="outline-style: solid; outline-width: 5px;"> -->
                        <div class="accordion" id="accordionExample">
                            <div class="card">
                                <?php
                                for ($i = 0; $i < $jalan; $i++) {
                                    $hari = date('D, d F Y', (strtotime($cari_date['start'] . '+' . $i . 'days')));
                                ?>

                                    <div class="card-header" id="headingOne">
                                        <h2 class="mb-0">
                                            <button class="btn btn-light btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne<?= $i ?>" aria-expanded="true" aria-controls="collapseOne">
                                                <?php echo $hari ?>
                                            </button>
                                        </h2>
                                    </div>

                                    <div id="collapseOne<?= $i ?>" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <table width="100%" id="half_td" class="table table-hover table-responsive">
                                                <?php
                                                $hari2 = date('Y-m-d', (strtotime($hari)));
                                                // echo $hari2;
                                                $query_cari_report = mysqli_query($con, "SELECT * FROM report WHERE `idj`='$idj' AND `tgl`='$hari2'");
                                                while ($cari_report = mysqli_fetch_assoc($query_cari_report)) {
                                                    $idt = $cari_report['idt'];
                                                    $cari_talent = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `talent` WHERE `idt`='$idt' "));

                                                ?>

                                                    <tr>
                                                        <td width="5%" id="full_td">
                                                            <div class="img-profil">
                                                                <a href="#!" onclick="sidebar()"><img src="../assets/images/avatar/avatar-1.png" alt="avatar-user" width="100%"></a>
                                                            </div>
                                                        </td>
                                                        <td width="25%" id="full_td">
                                                            <h5><?= $cari_talent['name'] ?></h5>
                                                        </td>
                                                        <td width="60%" id="full_td">
                                                            <p><?= substr($cari_report['desk_rp'], 0, 50) . '...'; ?></p>
                                                        </td>
                                                        <td width="10%" id="full_td">

                                                            <button class="btn btn-b2" data-toggle="modal" data-target="#exampleModal<?= $cari_report['idrp'] ?>">Detail</button>
                                                            <!-- Modal -->
                                                            <div class="modal fade" id="exampleModal<?= $cari_report['idrp'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog modal-lg">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Report : <?= $hari ?></h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <table width="100%" style="text-align: left;">
                                                                                <tr>
                                                                                    <td>
                                                                                        <b>
                                                                                            <h5><?= $cari_talent['name'] ?></h5>
                                                                                        </b>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>
                                                                                        <b>
                                                                                            <p>Report Details</p>
                                                                                        </b>
                                                                                        <p><?= $cari_report['desk_rp'] ?></p>
                                                                                    </td>
                                                                                    <td></td>
                                                                                </tr>
                                                                                <tr align="center">
                                                                                    <td><img src="../assets/images/report/<?= $cari_report['photo'] ?>" width="300px" alt=""></td>
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
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- Card-End::Content -->
        <hr>
    </div>
    <!-- End::Card -->
</div>
<!-- div::content -->