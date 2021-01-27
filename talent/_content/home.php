<?php
$idt  = $_SESSION["id_talent"];
$query_tawaran = mysqli_query($con, "SELECT * FROM tawaran WHERE `idt` = '$idt' LIMIT 1");
$query_list_job = mysqli_query($con, "SELECT * FROM job WHERE `status` = 'accept' LIMIT 2");
?>

<!-- div::content -->
<div class="row d-content">
    <!-- Begin::Card -->
    <div class="col-lg-12 page-content">
        <h3 class="text-center mb-5">Tawaran Project dari Klien yang Tertarik Dengan Anda</h3>
        <!-- <p>
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Error vero sit deleniti aspernatur eaque
            unde, accusantium obcaecati alias sunt veritatis minus odit nostrum, excepturi aperiam velit corporis,
            totam laboriosam ut.
        </p> -->

        <?php
        while ($data_tawaran = mysqli_fetch_assoc($query_tawaran)) :
            $idj = $data_tawaran['idj'];
            $data_tawaran_job = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM job WHERE idj = '$idj' "));

            $tgl_start_tawaran = date_create($data_tawaran_job['start']); //Add in Variable Date Fom SQL
            $tgl_start_custom =  date_format($tgl_start_tawaran, "l, d F Y"); // Custom Date And Add to New Variable

            $tgl_end_tawaran = date_create($data_tawaran_job['end']); //Add in Variable Date Fom SQL
            $tgl_end_custom =  date_format($tgl_end_tawaran, "l, d F Y"); // Custom Date And Add to New Variable
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
                            <h4><?php echo ucwords($data_tawaran_job['judul']); ?></h4>
                            <span><?php echo strtoupper($data_tawaran_job['comp']); ?></span>
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-11 offset-lg-1">
                            <p>
                                <?php echo substr($data_tawaran_job['deskripsi'], 0, 250); ?>
                            </p>
                            <hr>
                        </div>
                    </div>
                    <div class="row align-items-center justify-content-center">
                        <div class="col-12 col-lg-4 text-center">
                            <h5>Start Project</h5>
                            <span><?= $tgl_start_custom; ?></span>
                            <br>&nbsp;
                            <h5>End Project</h5>
                            <span><?= $tgl_end_custom; ?></span>
                        </div>
                        <div class="col-lg-4 offset-lg-4 text-center mt-3">
                            <a href="?p=job-tawaran-view&id-job=<?= $data_tawaran_job['idj'] ?>" class="btn btn-b1">Detail...</a>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Card-End::Content -->
            <hr>
        <?php endwhile; ?>
        <!-- Navigasi Detail -->
        <div class="row justify-content-center">
            <div class="col-lg-3 text-center">
                <a href="?p=job-tawaran" class="btn btn-b2">Load More...</a>
            </div>
        </div>
        <!-- Navigasi Detail -->
    </div>

    <!-- End::Card -->
</div>
<!-- div::content -->
<!-- div::content -->
<div class="row d-content">
    <!-- Begin::Card -->
    <div class="col-lg-12 page-content">
        <h3 class="text-center mb-5">Ajukan Dirimu Sebagai Talent</h3>
        <!-- <p>
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Error vero sit deleniti aspernatur eaque
            unde, accusantium obcaecati alias sunt veritatis minus odit nostrum, excepturi aperiam velit corporis,
            totam laboriosam ut.
        </p> -->
        <?php
        while ($data_list_job = mysqli_fetch_assoc($query_list_job)) {
            $tgl_start_list_job = date_create($data_list_job['start']); //Add in Variable Date Fom SQL
            $tgl_start_list_job =  date_format($tgl_start_list_job, "l, d F Y"); // Custom Date And Add to New Variable

            $tgl_end_list_job = date_create($data_list_job['end']); //Add in Variable Date Fom SQL
            $tgl_end_list_job =  date_format($tgl_end_list_job, "l, d F Y"); // Custom Date And Add to New Variable
        ?>
            <!-- Card-Begin::Content -->
            <div class="row">
                <div class="col-12 card-content">
                    <div class="row align-items-center">
                        <div class="col-3 col-lg-1">
                            <div class="img-profil">
                                <a href="?p=job-list-view&idj=<?= $data_list_job['idj'] ?>" onclick="sidebar()"><img src="../assets/images/avatar/avatar-1.png" alt="avatar-user" width="100%"></a>
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
                        <div class="col-12 col-lg-4 text-center">
                            <h5>Start Project</h5>
                            <span><?= $tgl_start_list_job; ?></span>
                            <br>&nbsp;
                            <h5>End Project</h5>
                            <span><?= $tgl_end_list_job ?></span>
                        </div>
                        <div class="col-lg-4 offset-lg-4 text-center mt-3">
                            <a href="?p=job-list-view&id-job=<?= $data_list_job['idj'] ?>" class="btn btn-b1">Detail...</a>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Card-End::Content -->
            <hr>
        <?php } ?>

        <!-- Navigasi Detail -->
        <div class="row justify-content-center">
            <div class="col-lg-3 text-center">
                <a href="?p=job-list" class="btn btn-b2">Load More...</a>
            </div>
        </div>
        <!-- Navigasi Detail -->
    </div>

    <!-- End::Card -->
</div>
<!-- div::content -->