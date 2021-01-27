<?php

   $idj= $_GET["idj"];

if (isset($_POST['tawarkan'])) {
    $jumlah = $_POST["check"];
    $jumlah = count($jumlah);
    $talent = $_POST["check"];
    for ($i = 0; $i < $jumlah; $i++) {
        mysqli_query($con, "INSERT INTO `tawaran`(`idtaw`, `idj`, `idt`, `status`) VALUES (NULL,'$idj','$talent[$i]','pending')");
    }

    echo "<script>window.location.href = '?p=job-tawaran-view&id-job=$idj'</script>";
}

?>

<!-- div::content -->
<div class="row d-content">
    <!-- Begin::Card -->
    <div class="col-lg-12 page-content">
        <h2 class="text-center">Talent List</h2>

        <!-- Card-Begin::Content -->
        <div class="row">
            <div class="col-12 card-content">
                <div class="row align-items-center">
                    <div class="col-12 col-lg-10 offset-lg-1 detail-job mt-4">

                        <form method="post">
                            <table class="table table-hover table-responsive" width="100%">
                                <tr align="center">
                                    <th scope="col" colspan="2">No</th>
                                    <th scope="col" colspan="2">Name</th>
                                    <th scope="type">Type</th>
                                    <th width="100px" scope="col">Action</th>
                                </tr>
                                <?php
                                $no = 1;
                                $query_talent = mysqli_query($con, "SELECT * FROM talenT");
                                while ($data_talent = mysqli_fetch_assoc($query_talent)) {
                                    $idt = $data_talent['idt'];
                                ?>
                                    <tr>
                                        <td width="2%"><input type="checkbox" value="<?= $idt ?>" name="check[]"> &nbsp; </td>
                                        <td scope="col  " width="2%"><?= $no++ ?></td>
                                        <td width="5%">
                                            <div class="img-profil">
                                                <a href="#!" onclick="sidebar()"><img src="../assets/images/avatar/avatar-1.png" alt="avatar-user" width="100%"></a>
                                            </div>
                                        </td>
                                        <td width="15%"><?= $data_talent['name'] ?></td>
                                        <td><?= $data_talent['type'] ?></td>
                                        <td width="5%">
                                            <button type="button" id="" class="btn btn-b2" data-toggle="modal" data-target="#exampleModal<?= $data_talent['idt']; ?>">Detail</button>
                                            <div class="modal fade" id="exampleModal<?= $data_talent['idt']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Talent Details</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <table>
                                                                <tr>
                                                                    <td align="center" colspan="3">
                                                                        <img width="70%" src="../assets/images/avatar/avatar-1.png" alt="">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td scope="col" width="37%">Name</td>
                                                                    <td>:</td>
                                                                    <td><?= $data_talent['name'] ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td scope="col">Gender</td>
                                                                    <td>:</td>
                                                                    <td><?= $data_talent['gender'] ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td scope="col">Komunikasi</td>
                                                                    <td>:</td>
                                                                    <td><?= $data_talent['kmp_kom'] ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td scope="col">Perusasif</td>
                                                                    <td>:</td>
                                                                    <td><?= $data_talent['kmp_persu'] ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td scope="col">Tinggi</td>
                                                                    <td>:</td>
                                                                    <td><?= $data_talent['tb'] ?> CM</td>
                                                                </tr>
                                                                <tr>
                                                                    <td scope="col">Berat</td>
                                                                    <td>:</td>
                                                                    <td><?= $data_talent['bb'] ?> Kg</td>
                                                                </tr>
                                                                <tr>
                                                                    <td scope="col">Rambut</td>
                                                                    <td>:</td>
                                                                    <td><?= $data_talent['tipe_rambut'] ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td scope="col">Baju</td>
                                                                    <td>:</td>
                                                                    <td><?= $data_talent['uk_baju'] ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td scope="col">Sepatu</td>
                                                                    <td>:</td>
                                                                    <td><?= $data_talent['uk_sepatu'] ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td scope="col">Menggunakan Seragam Perusahaan</td>
                                                                    <td>:</td>
                                                                    <td><?= $data_talent['seragam'] ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td scope="col">Bekerja Malam Hari</td>
                                                                    <td>:</td>
                                                                    <td><?= $data_talent['malam'] ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td scope="col">Luar Kota</td>
                                                                    <td>:</td>
                                                                    <td><?= $data_talent['luar_kota'] ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td scope="col">Sistem Kontrak</td>
                                                                    <td>:</td>
                                                                    <td><?= $data_talent['kontrak'] ?></td>
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
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-danger" name="tawarkan">Tawarkan</button>
                            </div>
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