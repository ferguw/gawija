<!-- div::content -->
<div class="row d-content">
    <!-- Begin::Card -->
    <div class="col-lg-12 page-content">
        <h2 class="text-center mb-5">TALENT SUBMISSION</h2>
        <h3>Talent Yang Tertarik Dengan Project Anda</h3>
        <p>
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Error vero sit deleniti aspernatur eaque
            unde, accusantium obcaecati alias sunt veritatis minus odit nostrum, excepturi aperiam velit corporis,
            totam laboriosam ut.
        </p>

        <?php
        // $query_tawaran = mysqli_query($con, "SELECT * FROM ajuan WHERE `idt` = '$idc' ");
        $query_tawaran = mysqli_query($con, "SELECT * FROM job WHERE `idc` = '$idc' AND `status`='accept' ");
        while ($data_tawaran = mysqli_fetch_assoc($query_tawaran)) {
            $idj = $data_tawaran['idj'];
            $data_job = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM job WHERE `idj` = '$idj' "));

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
                            <h4><?php echo ucwords($data_job['judul']); ?></h4>
                            <span><?php echo strtoupper($data_job['comp']); ?></span>
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-11 offset-lg-1">
                            <p>
                                <?php echo substr($data_job['deskripsi'], 0, 250); ?>
                            </p>
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
                            <a href="?p=job-tawaran-view&id-job=<?= $data_job['idj'] ?>" class="btn btn-b1">Detail...</a>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Card-End::Content -->
            <hr>
        <?php } ?>

        <!-- Navigasi Detail -->
        <!-- <div class="row justify-content-center">
            <div class="col-lg-3 text-center">
                <a href="#!" class="btn btn-b2">Load More...</a>
            </div>
        </div> -->
        <!-- Navigasi Detail -->
    </div>

    <!-- End::Card -->
</div>
<!-- div::content -->