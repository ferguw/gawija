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

$cari_report = mysqli_query($con, "SELECT * FROM `report` WHERE `idt`='$idt'");



?>

<style>
    #half_td {
        vertical-align: middle;
    }
</style>
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
                </div>

            </div>
        </div>
        <!-- Card-End::Content -->
    </div>

    <!-- End::Card -->


    <!-- Begin::Card -->
    <div class="col-lg-12 page-content">
        <div class="row">
            <div class="col-8 col-lg-2 offset-4 offset-lg-10">
                <a href="?p=report-add&idj=<?=$idj?>" class="btn btn-b1-3"><i class="material-icons iconC">add</i> Add New Report</a>
            </div>
        </div>
    </div>
    <div class="col-lg-12 page-content">
        <h2 class="text-center">My Report</h2>
        <!-- Card-Begin::Content -->
        <div class="row align-items-center justify-content-center">
            <div class="col-10">
                <table class="table table-hover table-responsive-sm">
                    <?php
                    // $no = 1;
                    while ($data_report = mysqli_fetch_assoc($cari_report)) {
                    ?>
                        <tr>
                            <!-- <td></?= $no++ ?></td> -->
                            <td id="half_td" width="20%">
                                <b><?= date("d F Y", strtotime($data_report['tgl'])) ?></b>
                            </td>
                            <td id="half_td">
                                <?php echo substr($data_report['desk_rp'], 0, 100); ?>
                            </td>
                            <td id="half_td" width="5%">
                                <button type="button" class="btn btn-b2" data-toggle="modal" data-target="#exampleModal<?= $data_report['idrp'] ?>">Detail</button>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal<?= $data_report['idrp'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Report Detail</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <?= $data_report['desk_rp'] ?>
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
        <!-- Card-End::Content -->
    </div>

    <!-- End::Card -->
</div>
<!-- div::content -->

<script>
    function ajukan() {
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
                window.location = "?p=ajuan_process&status=616a756b616e&idj=" + idj;
            }
        })
    }
</script>