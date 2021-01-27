<?php
$idj = $_GET["id-job"];
$data_job = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM job WHERE `idj` = '$idj'"));
$query_job_req = mysqli_query($con, "SELECT * FROM job_req WHERE `idj` = '$idj'");
$query_job_req_value = mysqli_query($con, "SELECT * FROM job_req WHERE `idj` = '$idj' ");

$max_limit = mysqli_fetch_assoc(mysqli_query($con, "SELECT SUM(numtalent) FROM job_req WHERE idj='$idj'"));
$max_lim = implode($max_limit);

$data_job_search = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM job WHERE `idj` = '$idj' "));
$tgl_start_list_job = date_create($data_job_search['start']); //Add in Variable Date Fom SQL
$tgl_start_list_job =  date_format($tgl_start_list_job, "l, d F Y"); // Custom Date And Add to New Variable
$tgl_end_list_job = date_create($data_job_search['end']); //Add in Variable Date Fom SQL
$tgl_end_list_job =  date_format($tgl_end_list_job, "l, d F Y"); // Custom Date And Add to New Variable

if (isset($_POST['terima'])) {
    $talentID = $_POST["talentID"];
    $panjang = count($talentID);
    // echo $panjang;

    for ($i = 0; $i < $panjang; $i++) {
        // echo $i;
        mysqli_query($con, "INSERT INTO job_ongoing (`idjo`, `idj`, `idt`) VALUES (NULL, '$idj', '$talentID[$i]')");
        mysqli_query($con, "UPDATE job SET `status` = 'ongoing' WHERE `idj` = '$idj';");
        echo "<script>window.location ='?p=job-list';</script>";
    }
}

$query_show_ajuan = mysqli_query($con, "SELECT * FROM ajuan WHERE `idj`='$idj'");
$query_show_tawaran = mysqli_query($con, "SELECT * FROM tawaran WHERE `idj`='$idj' AND `status`='accept'");
if (mysqli_num_rows($query_show_ajuan) < 1 && mysqli_num_rows($query_show_tawaran) < 1) {
    $btn_show = 'none';
} else {
    $btn_show = '';
}


?>
<!-- div::content -->
<div class="row d-content">
    <!-- Begin::Card -->
    <div class="col-lg-12 page-content">
        <h2 class="text-center"><?= $data_job['judul'] ?></h2>
        <h4 class="text-center mb-5"><?= $data_job['comp'] ?></h4>

        <!-- Card-Begin::Content -->
        <div class="row">
            <div class="col-12 card-content">
                <div class="row align-items-center">
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
                                <li><i class="material-icons">people</i> &nbsp;Required <?= $data_job_req_value['type']; ?>
                                    : <?= $data_job_req_value['numtalent']; ?></li>
                                <li><i class="material-icons">attach_money</i>&nbsp;Salary
                                    <?= $data_job_req_value['type']; ?> : Rp
                                    <?= number_format($data_job_req_value['salary'], 0, ",", '.') ?> </li>


                            <?php } ?>
                            <li><i class="material-icons">today</i>&nbsp;<span><?= $data_job['workday']; ?> Day</span>
                            </li>
                            <li><i class="material-icons">location_on</i>&nbsp;<span><?= $data_job['city']; ?></span>
                            </li>
                            <li><i class="material-icons">location_city</i>&nbsp;<span><?= $data_job['address']; ?>
                                </span></li>
                        </ul>

                    </div>
                    <div class="col-12 col-lg-11 offset-1">
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-11 offset-lg-1">
                        <p>
                            <?= $data_job['deskripsi'] ?>
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
                    <div class="col-lg-4 col-5 offset-lg-8 text-center mb-3 d-flex justify-content-end">
                        <a href="?p=talent-list&idj=<?=$idj?>" class="btn btn-b4 btnc-br-2">Cari Talent</a> &nbsp;&nbsp;
                        <!-- <a href="#" name="ajukan-diri" class="btn btn-b4 btnc-br-2">Talent Submission</a> -->
                        <!-- <button class="btn btn-b4 btnc-br-2">Cari Talent</button> -->
                        <button style="display: <?= $btn_show ?>;" class="btn btn-b3 btnc-or-2" data-toggle="modal" data-target="#exampleModal">Terima Talent</button>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Apakah Anda yakin</h5>
                                </div>
                                <div class="modal-body">
                                    <p>
                                        Jika anda yakin maka anda sudah menerima syarat dan ketektuan Gawija!!!
                                    </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" form="formPilih" name="terima" class="btn btn-danger">Ya Saya Yakin</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <form id="formPilih" method="POST">
            <div class="row justify-content-center">
                <!-- class high untuk warna orange -->
                <table class="table table-hover" style="display: <?= $dispTawaran ?>;">
                    <thead>
                        <tr align="center">
                            <th colspan="4">
                                <h3>Talent yang menerima tawaran anda</h3>
                            </th>
                        </tr>
                        <tr>
                            <th scope="col">&nbsp; No</th>
                            <th scope="col">Name</th>
                            <th scope="type">Type</th>
                            <th width="100px" scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query_talent_tawaran = mysqli_query($con, "SELECT * FROM tawaran WHERE `idj`='$idj' AND `status`='accept' ");
                        $no = 1;
                        while ($data_talent_tawaran = mysqli_fetch_assoc($query_talent_tawaran)) {
                            $idt_tawaran = $data_talent_tawaran['idt'];
                            $data_talent = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `talent` WHERE `idt` = '$idt_tawaran'"));

                        ?>
                            <tr>
                                <th scope="row"><input type="checkbox" name="talentID[]" value="<?= $data_talent['idt'] ?>"> &nbsp; <?= $no++ ?></th>
                                <td id="nama"><?= $data_talent['name'] ?></td>
                                <td><?= $data_talent['type'] ?></td>
                                <td>
                                    <!-- <button type="button" id="</?= $idt_tawaran ?>" name="detail" class="btn btn-warning detail">Detail</button> -->
                                    <!-- <input type="button" name="Detail" value="Detail" id="</?php echo $data_talent['idt']; ?>" class="btn btn-warning detail-talent" /> -->
                                    <button type="button" id="" class="btn btn-warning detail" data-toggle="modal" data-target="#exampleModal<?= $data_talent['idt']; ?>">
                                        Detail
                                    </button>
                                    <div class="modal fade" id="exampleModal<?= $data_talent['idt']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Detail Talent</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body" id="employee_detail">
                                                    <table class="table table-hover"">
                                                    <tr>
                                                           <td colspan=" 3" align="center">
                                                        <img width="70%" src="../assets/images/avatar/avatar-1.png" alt="">
                                </td>
                            </tr>
                                <tr>
                                    <td width="37%">Name</td>
                                    <td>:</td>
                                    <td><?= $data_talent['name'] ?></td>
                                </tr>
                                <tr>
                                    <td>Gender</td>
                                    <td>:</td>
                                    <td><?= $data_talent['gender'] ?></td>
                                </tr>
                                <tr>
                                    <td>Komunikasi</td>
                                    <td>:</td>
                                    <td><?= $data_talent['kmp_kom'] ?></td>
                                </tr>
                                <tr>
                                    <td>Perusasif</td>
                                    <td>:</td>
                                    <td><?= $data_talent['kmp_persu'] ?></td>
                                </tr>
                                <tr>
                                    <td>Tinggi</td>
                                    <td>:</td>
                                    <td><?= $data_talent['tb'] ?> CM</td>
                                </tr>
                                <tr>
                                    <td>Berat</td>
                                    <td>:</td>
                                    <td><?= $data_talent['bb'] ?> Kg</td>
                                </tr>
                                <tr>
                                    <td>Rambut</td>
                                    <td>:</td>
                                    <td><?= $data_talent['tipe_rambut'] ?></td>
                                </tr>
                                <tr>
                                    <td>Baju</td>
                                    <td>:</td>
                                    <td><?= $data_talent['uk_baju'] ?></td>
                                </tr>
                                <tr>
                                    <td>Sepatu</td>
                                    <td>:</td>
                                    <td><?= $data_talent['uk_sepatu'] ?></td>
                                </tr>
                                <tr>
                                    <td>Menggunakan Seragam Perusahaan</td>
                                    <td>:</td>
                                    <td><?= $data_talent['seragam'] ?></td>
                                </tr>
                                <tr>
                                    <td>Bekerja Malam Hari</td>
                                    <td>:</td>
                                    <td><?= $data_talent['malam'] ?></td>
                                </tr>
                                <tr>
                                    <td>Luar Kota</td>
                                    <td>:</td>
                                    <td><?= $data_talent['luar_kota'] ?></td>
                                </tr>
                                <tr>
                                    <td>Sistem Kontrak</td>
                                    <td>:</td>
                                    <td><?= $data_talent['kontrak'] ?></td>
                                </tr>
                </table>
            </div>
    </div>
</div>
</div>
<?php } ?>
</tbody>
</table>

</div>
<br><br>
<div class="row justify-content-center">
    <!-- class high untuk warna orange -->
    <table class="table table-hover" style="display: <?= $dispAjuan ?>;">
        <thead>
            <tr align="center">
                <th colspan="4">
                    <h3>Talent yang mengajukan diri</h3>
                </th>
            </tr>
            <tr>
                <th scope="col">&nbsp; No</th>
                <th scope="col">Name</th>
                <th scope="type">Type</th>
                <th width="100px" scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query_talent_ajuan = mysqli_query($con, "SELECT * FROM ajuan WHERE `idj`='$idj'");
            $no = 1;
            while ($data_talent_ajuan = mysqli_fetch_assoc($query_talent_ajuan)) {
                $idt_ajuan = $data_talent_ajuan['idt'];
                $data_talent = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `talent` WHERE `idt` = '$idt_ajuan'"));

            ?>
                <tr>
                    <th scope="row"><input type="checkbox" name="talentID[]" value="<?= $data_talent['idt'] ?>"> &nbsp; <?= $no++ ?></th>
                    <td id="nama"><?= $data_talent['name'] ?></td>
                    <td><?= $data_talent['type'] ?></td>
                    <td>
                        <!-- <button type="button" id="</?= $idt_ajuan ?>" name="detail" class="btn btn-warning detail">Detail</button> -->
                        <!-- <input type="button" name="Detail" value="Detail" id="<?php echo $data_talent['idt']; ?>" class="btn btn-warning detail-talent" /> -->
                        <button type="button" id="" class="btn btn-warning detail" data-toggle="modal" data-target="#exampleModal<?= $data_talent['idt']; ?>">
                            Detail
                        </button>
                        <div class="modal fade" id="exampleModal<?= $data_talent['idt']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Detail Talent</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body" id="employee_detail">
                                        <table class="table table-hover"">
                                                    <tr>
                                                        <td colspan=" 3" align="center">
                                            <img width="70%" src="../assets/images/avatar/avatar-1.png" alt="">
                    </td>
                </tr>
                <tr>
                    <td width="37%">Name</td>
                    <td>:</td>
                    <td><?= $data_talent['name'] ?></td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td>:</td>
                    <td><?= $data_talent['gender'] ?></td>
                </tr>
                <tr>
                    <td>Komunikasi</td>
                    <td>:</td>
                    <td><?= $data_talent['kmp_kom'] ?></td>
                </tr>
                <tr>
                    <td>Perusasif</td>
                    <td>:</td>
                    <td><?= $data_talent['kmp_persu'] ?></td>
                </tr>
                <tr>
                    <td>Tinggi</td>
                    <td>:</td>
                    <td><?= $data_talent['tb'] ?> CM</td>
                </tr>
                <tr>
                    <td>Berat</td>
                    <td>:</td>
                    <td><?= $data_talent['bb'] ?> Kg</td>
                </tr>
                <tr>
                    <td>Rambut</td>
                    <td>:</td>
                    <td><?= $data_talent['tipe_rambut'] ?></td>
                </tr>
                <tr>
                    <td>Baju</td>
                    <td>:</td>
                    <td><?= $data_talent['uk_baju'] ?></td>
                </tr>
                <tr>
                    <td>Sepatu</td>
                    <td>:</td>
                    <td><?= $data_talent['uk_sepatu'] ?></td>
                </tr>
                <tr>
                    <td>Menggunakan Seragam Perusahaan</td>
                    <td>:</td>
                    <td><?= $data_talent['seragam'] ?></td>
                </tr>
                <tr>
                    <td>Bekerja Malam Hari</td>
                    <td>:</td>
                    <td><?= $data_talent['malam'] ?></td>
                </tr>
                <tr>
                    <td>Luar Kota</td>
                    <td>:</td>
                    <td><?= $data_talent['luar_kota'] ?></td>
                </tr>
                <tr>
                    <td>Sistem Kontrak</td>
                    <td>:</td>
                    <td><?= $data_talent['kontrak'] ?></td>
                </tr>
    </table>
</div>
<div class="modal-footer">
    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                                                        <button type="button" class="btn btn-primary">Save changes</button> -->
</div>
</div>
</div>
</div>
<?php } ?>
</tbody>
</table>

</div>
</form>
<!-- Card-End::Content -->
</div>


<!-- End::Card -->
</div>

<script>
    var limit = <?= $max_lim ?>;
    $("input:checkbox").click(function() {
        var bol = $("input:checkbox:checked").length >= limit;
        $("input:checkbox").not(":checked").attr("disabled", bol);
        $("#btn-terima").not(":checked").attr("disabled", bol);
    });

    function fokus() {
        document.getElementById("biodata").focus();
    }
</script>