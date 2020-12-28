<?php
$idj = $_GET["id-job"];

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

?>




<!-- div::content -->
<div class="row d-content">
    <!-- Begin::Card -->
    <div class="col-lg-12 page-content">
        <h2 class="text-center"><?= ucwords($data_job_search['judul']); ?></h2>
        <h4 class="text-center mb-5"><?= strtoupper($data_job_search['comp']); ?></h4>

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
                        <h4><?= ucwords($data_client_search['name']); ?></h4>
                    </div>
                    <div class="col-12 col-lg-11 offset-lg-1 detail-job mt-4">
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
                    <div class="col-12 col-lg-11 offset-lg-1">
                        <p>
                            <?= ucwords($data_job_search['deskripsi']); ?>
                        </p>
                        <hr>
                    </div>
                </div>
                <div class="row align-items-center justify-content-center">
                    <div class="col-12 col-lg-6 offset-lg-1 text-center">
                        <div class="row">
                            <div class="col-6">
                                <h5>Start Project</h5>
                                <span><?= $tgl_start_list_job ?></span>
                            </div>
                            <div class="col-6">
                                <h5>End Project</h5>
                                <span><?= $tgl_end_list_job ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 offset-lg-1 text-center mt-3">
                        <form method="POST">
                            <!-- <button type="submit" name="terima-pengajuan" class="btn btn-b1">Terima Permintaan</button> -->
                            <?php
                            $cari_job_ajuan_talent = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM tawaran WHERE `idj` = '$idj' AND `idt` = '$idt' "));
                            if ($cari_job_ajuan_talent['status'] == 'pending') {
                                echo '<button type="button" name="terima-pengajuan" onclick="masuk()" class="btn btn-b1">Terima Permintaan </button>';
                            } else {
                                echo '<button class="btn btn-b1">Anda Telah Menerima Permintaan Ini </button>';
                                echo "
                                    <script>
                                        Swal.fire(
                                            'Yey!',
                                            'Anda telah menerima Job ini tunggu sampai permberitahuan selanjutnya.',
                                            'success'
                                        )
                                    </script>
                                ";
                            }
                            ?>
                        </form>
                    </div>
                </div>

            </div>
        </div>
        <!-- Card-End::Content -->
    </div>

    <!-- End::Card -->
</div>
<!-- div::content -->

<script type="text/javascript">
    function masuk() {
        var idj = <?= $idj ?>;
        Swal.fire({
            title: 'Apakah anda yakin?',
            icon: 'warning',
            text: "Jika anda menerima job ini maka anda telah setuju dengan syarat dan ketentuan GAWIJA!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, saya terima!'
        }).then((result) => {
            if (result.value) {
                window.location = "?p=tawaran_process&status=746572696d61&idj=" + idj;
            }
        })
    }

    function sudahAda() {
        Swal.fire(
            'Yey!',
            'Anda telah menerima Job ini tunggu sampai permberitahuan selanjutnya.',
            'success'
        )
    }
</script>