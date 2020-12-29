<?php
$idt = $_GET["idt"];
$data_talent_profile = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM talent WHERE `idt` = '$idt'"));
?>
<!-- Info -->
<div class="row d-info">
    <div class="col-lg-12 card-list-info">
        <div class="head d-img-list-big">
            <div class="img-list-big">
                <img src="../assets/images/avatar/avatar-1.png" class="img-talent" alt="Profil Img" width="100%">
            </div>
        </div>
        <div class="body">
            <div class="data-diri">
                <table border="0px">
                    <tr>
                        <td>Username</td>
                        <td>:</td>
                        <td><?= $data_talent_profile['username'] ?></td>
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td>:</td>
                        <td><?= $data_talent_profile['name'] ?></td>
                    </tr>
                    <tr>
                        <td>Gender</td>
                        <td>:</td>
                        <td><?= $data_talent_profile['gender'] ?></td>
                    </tr>
                    <tr>
                        <td>Komunikasi</td>
                        <td>:</td>
                        <td><?= $data_talent_profile['kmp_kom'] ?></td>
                    </tr>
                    <tr>
                        <td>Perusasif</td>
                        <td>:</td>
                        <td><?= $data_talent_profile['kmp_persu'] ?></td>
                    </tr>
                    <tr>
                        <td>Tinggi</td>
                        <td>:</td>
                        <td><?= $data_talent_profile['tb'] ?> CM</td>
                    </tr>
                    <tr>
                        <td>Berat</td>
                        <td>:</td>
                        <td><?= $data_talent_profile['bb'] ?> Kg</td>
                    </tr>
                    <tr>
                        <td>Rambut</td>
                        <td>:</td>
                        <td><?= $data_talent_profile['tipe_rambut'] ?></td>
                    </tr>
                    <tr>
                        <td>Baju</td>
                        <td>:</td>
                        <td><?= $data_talent_profile['uk_baju'] ?></td>
                    </tr>
                    <tr>
                        <td>Sepatu</td>
                        <td>:</td>
                        <td><?= $data_talent_profile['uk_sepatu'] ?></td>
                    </tr>
                    <tr>
                        <td>Menggunakan Seragam Perusahaan</td>
                        <td>:</td>
                        <td><?= $data_talent_profile['seragam'] ?></td>
                    </tr>
                    <tr>
                        <td>Bekerja Malam Hari</td>
                        <td>:</td>
                        <td><?= $data_talent_profile['malam'] ?></td>
                    </tr>
                    <tr>
                        <td>Luar Kota</td>
                        <td>:</td>
                        <td><?= $data_talent_profile['luar_kota'] ?></td>
                    </tr>
                    <tr>
                        <td>Sistem Kontrak</td>
                        <td>:</td>
                        <td><?= $data_talent_profile['kontrak'] ?></td>
                    </tr>

                </table>
            </div>
        </div>
    </div>
</div>
<!-- Info -->
<div class="row jarak-bottom-menu">
    <div class="col-12">&nbsp;</div>
</div>