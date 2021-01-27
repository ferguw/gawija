<?php
$cari_my_job = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `job` WHERE `idc` = '$idc'  "));
$my_job = mysqli_query($con, "SELECT * FROM `job` WHERE `idc` = '$idc'");
$my_list_job_ongoing = mysqli_query($con, "SELECT * FROM `job` WHERE `idc` = '$idc' AND `status` = 'ongoing' LIMIT 1");
$my_list_job_accept = mysqli_query($con, "SELECT * FROM `job` WHERE `idc` = '$idc' AND `status` = 'accept' LIMIT 1");
$my_list_job_pending = mysqli_query($con, "SELECT * FROM `job` WHERE `idc` = '$idc' AND `status` = 'pending' LIMIT 1");

if (mysqli_num_rows($my_list_job_ongoing) < 1) {
    $displayContentongoing = 'none';
} else {
    $idjob = $cari_my_job['idj'];
    $data_ajuan = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM ajuan WHERE `idj` = '$idjob'"));
    $id_talent_ajuan = $data_ajuan['idt'];

    $data_talent = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM talent WHERE `idt` = '$id_talent_ajuan'  "));

    $query_job_requirement = mysqli_query($con, "SELECT * FROM job_req WHERE `idj` = '$idjob' ");
}

if (mysqli_num_rows($my_list_job_accept) < 1) {
    $displayContentaccept = 'none';
} else {
    $idjob = $cari_my_job['idj'];
    $data_ajuan = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM ajuan WHERE `idj` = '$idjob'"));
    $id_talent_ajuan = $data_ajuan['idt'];

    $data_talent = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM talent WHERE `idt` = '$id_talent_ajuan'  "));

    $query_job_requirement = mysqli_query($con, "SELECT * FROM job_req WHERE `idj` = '$idjob' ");
}
if (mysqli_num_rows($my_list_job_pending) < 1) {
    $displayContentpending = 'none';
} else {
    $idjob = $cari_my_job['idj'];
    $data_ajuan = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM ajuan WHERE `idj` = '$idjob'"));
    $id_talent_ajuan = $data_ajuan['idt'];

    $data_talent = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM talent WHERE `idt` = '$id_talent_ajuan'  "));

    $query_job_requirement = mysqli_query($con, "SELECT * FROM job_req WHERE `idj` = '$idjob' ");
}



?>
<!-- div::content -->
<div class="row d-content">
    <!-- Begin::Card -->
    <div class="col-lg-12 page-content">
        <div class="row">
            <div class="col-8 col-lg-2 offset-4 offset-lg-10">
                <a href="?p=job-add" class="btn btn-b1-3"><i class="material-icons iconC">add</i> Add Project</a>
            </div>
        </div>
    </div>
    <!-- Begin::Card -->

    <!-- Begin::Card -->
    <div class="col-lg-12 page-content" style="display:<?= $displayContentongoing ?>">
        <h3 class="text-center">Project Ongoing</h3>
        <?php
        while ($data_list_job = mysqli_fetch_assoc($my_list_job_ongoing)) :
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
                    <div class="row align-items-center justify-content-end">
                        <div class="col-12 col-lg-5 text-center">
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
                        <div class="col-12 col-lg-6 talent-join">
                            <h4 class="text-center">Talent Bergabung</h4>
                            <div class="img-profil-mini">
                                <img src="../assets/images/avatar/avatar-1.png" alt="avatar-user" width="100%">
                            </div>
                            <div class="img-profil-mini">
                                <img src="../assets/images/avatar/avatar-2.png" alt="avatar-user" width="100%">
                            </div>
                            <div class="img-profil-mini">
                                <img src="../assets/images/avatar/avatar-3.png" alt="avatar-user" width="100%">
                            </div>
                            <div class="img-profil-mini">
                                <img src="../assets/images/avatar/avatar-4.png" alt="avatar-user" width="100%">
                            </div>
                            <div class="img-profil-mini">
                                <img src="../assets/images/avatar/avatar-5.png" alt="avatar-user" width="100%">
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center justify-content-center">
                        <div class="col-lg-4 offset-lg-8 text-center mt-3">
                            <a href="?p=job-list-view&idj=<?= $data_list_job['idj'] ?>" class="btn btn-b1">Detail...</a>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Card-End::Content -->
            <hr>
        <?php endwhile; ?>

        <div class="mx-auto col-lg-3 text-center mt-2">
            <a href="?p=job-list-ongoing" class="btn btn-b2">More...</a>
        </div>
    </div>

    <!-- End::Card -->
</div>
<!-- div::content -->

<!-- div::content -->
<div class="row d-content">

    <!-- Begin::Card -->
    <div class="col-lg-12 page-content" style="display:<?= $displayContentaccept ?>">
        <h3 class="text-center">Projects Accept</h3>
        <?php
        while ($data_list_job_acc = mysqli_fetch_assoc($my_list_job_accept)) :
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
                            <h4><?php echo ucwords($data_list_job_acc['judul']); ?></h4>
                            <span><?php echo strtoupper($data_list_job_acc['comp']); ?></span>
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-11 offset-lg-1">
                            <p>
                                <?php echo substr($data_list_job_acc['deskripsi'], 0, 250); ?>
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
                            <a href="?p=job-list-view&idj=<?= $data_list_job_acc['idj'] ?>" class="btn btn-b1">Detail...</a>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Card-End::Content -->
            <hr>
        <?php endwhile; ?>
        <div class="mx-auto col-lg-3 text-center mt-2">
            <a href="?p=job-list-accept" class="btn btn-b2">More...</a>
        </div>

    </div>
    <!-- End::Card -->

</div>
<!-- div::content -->

<div class="row d-content">

    <!-- Begin::Card -->
    <div class="col-lg-12 page-content" style="display:<?= $displayContentpending ?>">
        <h3 class="text-center">Projects Pending Approval</h3>
        <?php
        while ($data_list_job_acc = mysqli_fetch_assoc($my_list_job_pending)) :
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
                            <h4><?php echo ucwords($data_list_job_acc['judul']); ?></h4>
                            <span><?php echo strtoupper($data_list_job_acc['comp']); ?></span>
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-11 offset-lg-1">
                            <p>
                                <?php echo substr($data_list_job_acc['deskripsi'], 0, 250); ?>
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
                            <a href="?p=job-list-view&idj=<?= $data_list_job_acc['idj'] ?>" class="btn btn-b1">Detail...</a>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Card-End::Content -->
            <hr>
        <?php endwhile; ?>
        <div class="mx-auto col-lg-3 text-center mt-2">
            <a href="?p=job-list-pending" class="btn btn-b2">More...</a>
        </div>

    </div>
    <!-- End::Card -->

</div>
<!-- div::content -->