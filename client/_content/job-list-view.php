<?php

$idj = $_GET["idj"];
$jumlah = mysqli_num_rows(mysqli_query($con, "SELECT * FROM job_req WHERE idj = '$idj'"));

$max_limit = mysqli_fetch_array(mysqli_query($con, "SELECT idj = '$idj', SUM(numtalent) FROM job_req"));
$limit = $max_limit[1];

$query_tawaran = mysqli_query($con, "SELECT * FROM tawaran WHERE `idj` = '$idj' ");
$query_ajuan = mysqli_query($con, "SELECT * FROM ajuan WHERE `idj` = '$idj'")

?>
<!-- div::content -->
<div class="row d-content">
    <!-- Begin::Card -->
    <div class="col-lg-12 page-content">
        <h2 class="text-center">JUDUL JOB</h2>
        <h4 class="text-center mb-5">comp</h4>

        <!-- Card-Begin::Content -->
        <div class="row">
            <div class="col-12 card-content">
                <div class="row">
                    <div class="col-12 col-lg-11 offset-lg-1">
                        <p>
                            (Deksripsi) Lorem ipsum, dolor sit amet consectetur adipisicing elit. Omnis ut dolorem
                            deleniti porro rem praesentium illum? Laboriosam placeat, repudiandae tenetur consectetur
                            repellat suscipit sequi amet illo vel, fuga beatae iusto!
                        </p>
                        <hr>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-12 col-lg-11 offset-lg-1 detail-job mt-2">
                        <ul>
                            <li><i class="material-icons iconC">person_pin</i> &nbsp;Type, 1, 2, 3</li>
                            <li><i class="material-icons iconC">people</i> &nbsp;Required SPG : 3</li>
                            <li><i class="material-icons iconC">attach_money</i>&nbsp;Salary SPG : Rp
                                <?= number_format('150000', 0, ",", '.') ?> </li>
                            <li><i class="material-icons iconC">people</i> &nbsp;Required SPB : 3</li>
                            <li><i class="material-icons iconC">attach_money</i>&nbsp;Salary SPB : Rp
                                <?= number_format('150000', 0, ",", '.') ?> </li>
                            <li><i class="material-icons iconC">today</i>&nbsp;<span>2 Day</span></li>
                            <li><i class="material-icons iconC">location_on</i>&nbsp;<span>Location(city)</span></li>
                            <li><i class="material-icons iconC">location_city</i>&nbsp;<span>(Alamat) </span></li>
                        </ul>

                    </div>
                    <div class="col-12 col-lg-11 offset-1">
                        <hr>
                    </div>
                </div>
                <div class="row align-items-center justify-content-center">
                    <div class="col-12 col-lg-6 offset-lg-1 text-center">
                        <div class="row">
                            <div class="col-12 col-lg-6 mb-4">
                                <h5>Start Project</h5>
                                <span>Monday, 21 December 2020</span>
                            </div>
                            <div class="col-12 col-lg-6 mb-4">
                                <h5>End Project</h5>
                                <span>Monday, 28 December 2020</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 offset-lg-1 text-center">
                        <a href="?p=job-list-edit&idj=1" class="btn btn-b1"><i class="material-icons iconC">edit</i> Edit</a>
                    </div>
                </div>

            </div>
        </div>
        <!-- Card-End::Content -->
    </div>

    <!-- End::Card -->
</div>
<!-- div::content -->
<!-- div::content -->
<div class="row d-content">
    <!-- Begin::Card -->
    <div class="col-lg-12 page-content">
        <!-- Card-Begin::Content -->
        <div class="row">
            <div class="col-12 card-content">
                <div class="row">
                    <div class="col-lg-2 offset-lg-8 text-center mb-3">
                        <a href="#" name="ajukan-diri" class="btn btn-b4 btnc-or-2">Accept Submissions</a>
                    </div>
                    <div class="col-lg-2 text-center mb-3">
                        <a href="#" name="ajukan-diri" class="btn btn-b4 btnc-br-2">Talent Submission</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-around">
            <!-- class high untuk warna orange -->

            <?php
            while ($data_tawaran = mysqli_fetch_assoc($query_tawaran)) {
                $idt = $data_tawaran['idt'];
                $data_tawaran_talent = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM talent WHERE `idt` = '$idt' "));
            ?>
                <div class="col-lg-3 card-list">
                    <div class="row">
                        <div class="col-12 d-img-list high">
                            <div class="img-list">
                                <img src="../assets/images/avatar/avatar-1.png" class="img-talent" alt="Profil Img" width="100%">
                            </div>
                            <div class="card-ket text-center">
                                <h5><?= $data_tawaran_talent['name'] ?></h5>
                                <span><?= $data_tawaran_talent['type'] ?></span>
                            </div>
                            <div class="card-bottom" align="center">
                                <input type="checkbox" name="check[]" id="">
                                <a href="?p=job-list-view&idj=<?= $idj ?>&idt=<?= $idt ?>" onclick="fokus()" class="btn btn-card btnc-net">View Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <?php
            while ($data_ajuan = mysqli_fetch_assoc($query_ajuan)) {
                $idt = $data_ajuan['idt'];
                $data_ajuan_talent = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM talent WHERE `idt` = '$idt' "));
            ?>
                <!-- tanpa class high yang biasa untuk warna orange -->
                <div class="col-lg-3 card-list">
                    <div class="row">
                        <div class="col-12 d-img-list">
                            <div class="img-list">
                                <img src="../assets/images/avatar/avatar-1.png" class="img-talent" alt="Profil Img" width="100%">
                            </div>
                            <div class="card-ket text-center">
                                <h5><?= $data_ajuan_talent['name'] ?></h5>
                                <span><?= $data_ajuan_talent['type'] ?></span>
                            </div>
                            <div class="card-bottom" align="center">
                                <input type="checkbox" name="check[]" id="">
                                <a href="?p=job-list-view&idj=<?= $idj ?>&idt=<?= $idt ?>" onclick="fokus()" class=" btn btn-card btnc-net">View Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

        </div>
        <!-- Card-End::Content -->
    </div>

    <!-- End::Card -->
</div>
<!-- div::content -->
<script>
    var limit = <?= $limit ?>;
    $("input:checkbox").click(function() {
        var bol = $("input:checkbox:checked").length >= limit;
        $("input:checkbox").not(":checked").attr("disabled", bol);
    });

    function fokus() {
        document.getElementById("biodata").focus();
    }
</script>