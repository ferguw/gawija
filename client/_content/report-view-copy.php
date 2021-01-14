<?php
$idj = $_GET["idj"];

$timezone = "Asia/Makassar";
date_default_timezone_set($timezone);
$time = date("H:i a");
$date = date("l, d F Y");
$today = strtotime(date('Y-m-d'));

$my_list_job_ongoing = mysqli_query($con, "SELECT * FROM `job` WHERE `idj` = '$idj' AND `status`='ongoing'");
$talent_list = mysqli_query($con, "SELECT * FROM job_ongoing WHERE `idj`='$idj' ");

        $cari_date = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM job WHERE `idj`='$idj'"));
        $start = strtotime($cari_date['start']);
        $end = strtotime($cari_date['end']);
        $days_between = ceil(abs($end - $start) / 86400);
        $jalan = ceil(abs($today - $start + 1) / 86400);
        echo $jalan;
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
        while ($data_list_job = mysqli_fetch_assoc($my_list_job_ongoing)) :
        ?>
        <!-- Card-Begin::Content -->
        <div class="row">
            <div class="col-12 card-content">
                <div class="row align-items-center">
                    <div class="col-3 col-lg-1">
                        <div class="img-profil">
                            <a href="#!" onclick="sidebar()"><img src="../assets/images/avatar/avatar-1.png"
                                    alt="avatar-user" width="100%"></a>
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
                        <table class="col-12 table-responsive-sm table table-hover">
                            <!-- <table class="col-12 table table-hover" style="outline-style: solid; outline-width: 5px;"> -->
                            <?php
                                    for ($i = 0; $i < $jalan; $i++) {
                                ?>
                            <thead>
                                <tr>
                                    <td colspan="4" align="center">
                                        <h5><?= $hari = date('l, d F Y', ($start = strtotime($cari_date['start'] . '+' . $i . 'days'))); ?>
                                        </h5>
                                    </td>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                    $hari = date('Y-m-d', ($start = strtotime($cari_date['start'] . '+' . $i . 'days')));
                                    // echo $hari;
                                    $query = mysqli_query($con, "SELECT * FROM `report` WHERE `idj`='$idj' AND `tgl`='$hari'");
                                    while ($data = mysqli_fetch_assoc($query)) {
                                        $idt = $data['idt'];
                                        $query_talent = mysqli_query($con, "SELECT * FROM talent WHERE idt='$idt'");
                                        while ($cari_talent = mysqli_fetch_assoc($query_talent)){
                                    ?>
                                <tr>
                                    <td width="7%" id="full_td">
                                        <div class="img-profil">
                                            <a href="#!" onclick="sidebar()"><img
                                                    src="../assets/images/avatar/avatar-1.png" alt="avatar-user"
                                                    width="100%"></a>
                                        </div>
                                    </td>
                                    <td width="20%" id="full_td"><?= $cari_talent['name'] ?></td>
                                    <td id="half_td">
                                        <?php
                                                // $idt = $cari_talent['idt'];
                                                $cari_report = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM report WHERE `idj`='$idj' AND `idt` = '$idt'"));
                                                if (!$cari_report) {
                                                    echo "<b>Talent Belum Memberikan Report</b>";
                                                } else {
                                                    echo substr($cari_report['desk_rp'], 0, 100) . '...';
                                                }
                                                ?>
                                    </td>
                                    <td id="half_td">
                                        <button type="button" class="btn btn btn-b2 align-middle" data-toggle="modal"
                                            data-target="#modal_report<?= $idt ?>">Show</button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="modal_report<?= $idt ?>" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div
                                                class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <table>
                                                            <tr>
                                                                <td id="half_td">
                                                                    <div class="img-profil">
                                                                        <img src="../assets/images/avatar/avatar-1.png"
                                                                            alt="avatar-user" width="100%">
                                                                    </div>
                                                                </td>
                                                                <td id="half_td">
                                                                    <h4 class="modal-title" id="exampleModalLabel">
                                                                        <?= $cari_talent['name'] ?></h4>
                                                                </td>
                                                            </tr>
                                                        </table>

                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <table width="100%">
                                                            <tr>
                                                                <td>
                                                                    <h5>Report :
                                                                        <?php
                                                                                if (!$cari_report) {
                                                                                    echo "<b>Talent Belum Memberikan Report</b>";
                                                                                    $show = 'none';
                                                                                } else {
                                                                                    echo date("d F Y", strtotime($cari_report['date']));
                                                                                    $show = '';
                                                                                }
                                                                                ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="display: <?= $show ?>;">
                                                                    <?= $cari_report['desk_rp'] ?>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <?php }} ?>
                            </tbody>
                            <?php }?>
                        </table>
                    </div>
                </div>

            </div>
        </div>
        <!-- Card-End::Content -->
        <hr>
        <?php endwhile; ?>
    </div>
    <!-- End::Card -->
</div>
<!-- div::content -->