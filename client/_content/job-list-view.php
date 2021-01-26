<?php

$idj = $_GET["idj"];
$jumlah = mysqli_num_rows(mysqli_query($con, "SELECT * FROM job_req WHERE idj = '$idj'"));


// $query_tawaran = mysqli_query($con, "SELECT * FROM tawaran WHERE `idj` = '$idj' ");
$query_ajuan = mysqli_query($con, "SELECT * FROM job_ongoing WHERE `idj` = '$idj'");

//Mencari Job pada tabel job
$data_job_search = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM job WHERE `idj` = '$idj' "));
$tgl_start_list_job = date_create($data_job_search['start']); //Add in Variable Date Fom SQL
$tgl_start_list_job =  date_format($tgl_start_list_job, "l, d F Y"); // Custom Date And Add to New Variable
$tgl_end_list_job = date_create($data_job_search['end']); //Add in Variable Date Fom SQL
$tgl_end_list_job =  date_format($tgl_end_list_job, "l, d F Y"); // Custom Date And Add to New Variable

//mengambil data dri tabel job
$id_client = $data_job_search['idc'];

//Mencari data client
$data_client_search = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM client WHERE `idc` = '$id_client' "));

//Mncari data requirement job (Type)
$query_job_req = mysqli_query($con, "SELECT * FROM job_req WHERE `idj` = '$idj' ");
//Mncari data requirement job (Value Job {jumlah talent, salary})
$query_job_req_value = mysqli_query($con, "SELECT * FROM job_req WHERE `idj` = '$idj' ");

$job_status = $data_job_search['status'];

switch ($job_status) {
    case 'ongoing':
        $displayContent = '';
        break;
    case 'pending':
        $displayContent = 'none';
        break;
    case 'accept':
        $displayContent = 'none';
        break;

    default:
        # code...
        break;
}



?>
<!-- div::content -->
<div class="row d-content">
    <!-- Begin::Card -->
    <div class="col-lg-12 page-content">
        <h2 class="text-center"><?= $data_job_search['judul'] ?></h2>
        <h4 class="text-center mb-5"><?= $data_job_search['comp'] ?></h4>

        <!-- Card-Begin::Content -->
        <div class="row">
            <div class="col-12 card-content">
                <div class="row align-items-center">
                    <div class="col-12 col-lg-10 offset-lg-1 detail-job mt-2">
                        <ul>
                            <li><i class="material-icons">person_pin</i> &nbsp;Type
                                <?php while ($data_job_req = mysqli_fetch_assoc($query_job_req)) {
                                    echo ", " . $data_job_req['type'];
                                } ?>
                            </li>
                            <?php
                            while ($data_job_req_value = mysqli_fetch_assoc($query_job_req_value)) {
                            ?>
                                <li><i class="material-icons">people</i> &nbsp;Required <?= $data_job_req_value['type']; ?> : <?= $data_job_req_value['numtalent']; ?></li>
                                <li><i class="material-icons">attach_money</i>&nbsp;Salary <?= $data_job_req_value['type']; ?> : Rp <?= number_format($data_job_req_value['salary'], 0, ",", '.') ?> </li>


                            <?php } ?>
                            <li><i class="material-icons">today</i>&nbsp;<span><?= $data_job_search['workday']; ?> Day</span></li>
                            <li><i class="material-icons">location_on</i>&nbsp;<span><?= $data_job_search['city']; ?></span></li>
                            <li><i class="material-icons">location_city</i>&nbsp;<span><?= $data_job_search['address']; ?> </span></li>
                        </ul>

                    </div>
                    <div class="col-12 col-lg-11 offset-1">
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-10 offset-lg-1">
                        <p>
                            <?= $data_job_search['deskripsi'] ?>
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
<div class="row d-content" style="display:<?= $displayContent ?>">
    <!-- Begin::Card -->
    <div class="col-lg-12 page-content">
        <!-- Card-Begin::Content -->
        <div class="row">
            <div class="col-12 card-content">
                <h4 class="text-center mb-5">List Talent Pada Project</h4>

            </div>
        </div>
        <form method="post" action="">
            <div class="row justify-content-around">


                <?php
                while ($data_ajuan = mysqli_fetch_assoc($query_ajuan)) {
                    $idt = $data_ajuan['idt'];
                    $data_ajuan_talent = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM talent WHERE `idt` = '$idt' "));
                ?>
                    <!-- tanpa class high yang biasa untuk warna orange -->
                    <div class="col-lg-3 card-list">
                        <div class="row">
                            <div class="col-12 d-img-list high">
                                <div class="img-list">
                                    <img src="../assets/images/avatar/avatar-1.png" class="img-talent" alt="Profil Img" width="100%">
                                </div>
                                <div class="card-ket text-center">
                                    <h5><?= $data_ajuan_talent['name'] ?></h5>
                                    <span><?= $data_ajuan_talent['type'] ?></span>
                                </div>
                                <div class="card-bottom" align="center">
                                    <!-- <a href="?p=job-list-view&idj=</?= $idj ?>&idt=</?= $idt ?>" onclick="fokus()" class=" btn btn-card btnc-net">View Detail</a> -->
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-card btnc-net" data-toggle="modal" data-target="#exampleModal<?= $data_ajuan_talent['idt'] ?>">
                                        View Detail
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal<?= $data_ajuan_talent['idt'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Talent Detail</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <table class="table table-hover">
                                                        <tr>
                                                            <td width="30%">Name</td>
                                                            <td>:</td>
                                                            <td><?= $data_ajuan_talent['name'] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Gender</td>
                                                            <td>:</td>
                                                            <td><?= $data_ajuan_talent['gender'] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Komunikasi</td>
                                                            <td>:</td>
                                                            <td><?= $data_ajuan_talent['kmp_kom'] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Perusasif</td>
                                                            <td>:</td>
                                                            <td><?= $data_ajuan_talent['kmp_persu'] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Tinggi</td>
                                                            <td>:</td>
                                                            <td><?= $data_ajuan_talent['tb'] ?> CM</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Berat</td>
                                                            <td>:</td>
                                                            <td><?= $data_ajuan_talent['bb'] ?> Kg</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Rambut</td>
                                                            <td>:</td>
                                                            <td><?= $data_ajuan_talent['tipe_rambut'] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Baju</td>
                                                            <td>:</td>
                                                            <td><?= $data_ajuan_talent['uk_baju'] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Sepatu</td>
                                                            <td>:</td>
                                                            <td><?= $data_ajuan_talent['uk_sepatu'] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Menggunakan Seragam Perusahaan</td>
                                                            <td>:</td>
                                                            <td><?= $data_ajuan_talent['seragam'] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Bekerja Malam Hari</td>
                                                            <td>:</td>
                                                            <td><?= $data_ajuan_talent['malam'] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Luar Kota</td>
                                                            <td>:</td>
                                                            <td><?= $data_ajuan_talent['luar_kota'] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Sistem Kontrak</td>
                                                            <td>:</td>
                                                            <td><?= $data_ajuan_talent['kontrak'] ?></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </form>
        <!-- Card-End::Content -->
    </div>

    <!-- End::Card -->
</div>
<!-- div::content -->