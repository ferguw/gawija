<?php
error_reporting(0);
$page = $_GET["s"];

if ($page == 'edit') {
    $btn_edit = '';
    $picture = 'none';
}else {
    $btn_edit = 'none';
    $picture = '';
}


$timezone = "Asia/Makassar";
date_default_timezone_set($timezone);
$time = date("Hi");
$date = date("dmy");
$date2 = date("Y-m-d");

function compress($source, $destination, $quality)
{
    $info = getimagesize($source);
    if ($info['mime'] == 'image/jpeg') $image = imagecreatefromjpeg($source);
    elseif ($info['mime'] == 'image/gif') $image = imagecreatefromgif($source);
    elseif ($info['mime'] == 'image/png') $image = imagecreatefrompng($source);
    imagejpeg($image, $destination, $quality);
    return $destination;
}

    if (isset($_POST['submit'])) {
        $username = $_POST["username"];
        $nama = $_POST["nama"];
        $ktp = $_POST["no_ktp"];
        $tpt_lahir = $_POST["tpt_lahir"];
        $tgl_lahir = $_POST['tgl_lahir'];
        $alamat = $_POST["alamat"];
        $gender = $_POST["gender"];
        $tipe_rambut = $_POST["tipe_rambut"];
        $tb = $_POST["tb"];
        $bb = $_POST["bb"];
        $ukb = $_POST["ukb"];
        $uks = $_POST["uks"];
        
        $hp = $_POST["hp"];
        $wa = $_POST["wa"];
        $email = $_POST["email"];
        $instagram = $_POST["instagram"];
        $tiktok = $_POST["tiktok"];
        $facebook =$_POST["facebook"];

        $kem_kom = $_POST["kem_kom"];
        $kem_per = $_POST["kem_persu"];
        $pend = $_POST["pendidikan"];
        $sts_pend = $_POST["sts_pendidikan"];
        $b_seragam = $_POST["seragam"];
        $b_malam = $_POST["malam"];
        $b_kota = $_POST["kota"];
        $b_kontrak = $_POST["kontrak"];

        $bank = $_POST["bank"];
        $no_rek = $_POST["no_rek"];
        $an_rek = $_POST["atas_nama"];

        $closeup = $_FILES["closeup"]["name"];
        $pasfoto = $_FILES["pasfoto"]["name"];
        $fullbody = $_FILES["fullbody"]["name"];

        //target file
        $tempdir = "../assets/images/talent/";
        
        $target_path_closeup = $tempdir . basename($_FILES['closeup']['name']);
        $source_img_closeup = $_FILES['closeup']['tmp_name'];
        $filename_closeup = $_FILES['closeup']['name'];
        $filetype_closeup = pathinfo($_FILES['closeup']['name']);
        $filetype_closeup = $filetype_closeup['extension'];

        $target_path_pasfoto = $tempdir . basename($_FILES['pasfoto']['name']);
        $source_img_pasfoto = $_FILES['pasfoto']['tmp_name'];
        $filename_pasfoto = $_FILES['pasfoto']['name'];
        $filetype_pasfoto = pathinfo($_FILES['pasfoto']['name']);
        $filetype_pasfoto = $filetype_pasfoto['extension'];

        $target_path_fullbody = $tempdir . basename($_FILES['fullbody']['name']);
        $source_img_fullbody = $_FILES['fullbody']['tmp_name'];
        $filename_fullbody = $_FILES['fullbody']['name'];
        $filetype_fullbody = pathinfo($_FILES['fullbody']['name']);
        $filetype_fullbody = $filetype_fullbody['extension'];

        //panggil fungsi compress,
        compress($source_img_closeup, $target_path_closeup, 65);
        compress($source_img_pasfoto, $target_path_pasfoto, 65);
        compress($source_img_fullbody, $target_path_fullbody, 65);

        //Rename File
        $newname_closeup = 'closeup-' . $idt . '-' . $time . '-' . $date . '.' . $filetype_closeup;
        $newname_pasfoto = 'pasfoto-' . $idt . '-' . $time . '-' . $date . '.' . $filetype_pasfoto;
        $newname_fullbody = 'fullbody-' . $idt . '-' . $time . '-' . $date . '.' . $filetype_fullbody;

        rename($tempdir . $filename_closeup, $tempdir . $newname_closeup);
        rename($tempdir . $filename_pasfoto, $tempdir . $newname_pasfoto);
        rename($tempdir . $filename_fullbody, $tempdir . $newname_fullbody);

        mysqli_query($con, "UPDATE `talent` SET `name`='$nama',`username`='$username',`email`='$email',`no_ktp`='$ktp',`tpt_lahir`='$tpt_lahir',`tgl_lahir`='$tgl_lahir',`alamat`='$alamat',`phone`='$hp',`whatsapp`='$wa',`instagram`='$instagram',`tiktok`='$tiktok',`facebook`='$facebook',`kmp_kom`='$kem_kom',`kmp_persu`='$kem_per',`pendidikan`='$pend',`sts_pendidikan`='$sts_pend',`seragam`='$b_seragam',`malam`='$b_malam',`luar_kota`='$b_kota',`kontrak`='$b_kontrak',`nama_bank`='$bank',`no_rek`='$no_rek',`an_rek`='$an_rek',`closeup`='$newname_closeup',`pas_photo`='$newname_pasfoto',`full_body`='$newname_fullbody',`gender`='$gender',`tb`='$tb',`bb`='$bb',`tipe_rambut`='$tipe_rambut',`uk_baju`='$ukb',`uk_sepatu`='$uks' WHERE `idt`='$idt'");

        echo "<script>window.location = '?p=profil';</script>";
    }
?>
<!-- div::content -->
<div class="row d-content">
    <!-- Begin::Card -->
    <div class="col-lg-12 page-content">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <h1>Profile</h1>
                </div>
            </div>
            <div class="row offset-md-1">
                <form method="POST" disabled enctype="multipart/form-data">
                    <!-- <div class="col-lg-2 mt-2">
                    <div class="text-center mb-4">
                        <h4>Username</h4>
                    </div>
                    ​<picture>
                        <source srcset="https://e-ga.com.au/cms/wp-content/uploads/2014/03/josh-profile-img1.jpg" type="image/svg+xml">
                        <img src="https://e-ga.com.au/cms/wp-content/uploads/2014/03/josh-profile-img1.jpg" class="img-fluid img-thumbnail text-decoration-none" alt="...">
                    </picture>
                    <div class="col-3 mb-2">
                        <input type="file">
                    </div>
                </div> -->
                    <div class="col-lg-12 mt-4">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                    aria-controls="home" aria-selected="true">Profil</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                                    id="contact-1" aria-controls="contact" aria-selected="false">Contact & Social
                                    Media</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="ability-tab" data-toggle="tab" href="#ability" role="tab"
                                    aria-controls="ability" aria-selected="false">Ability & Experience</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="bank-tab" data-toggle="tab" href="#bank" role="tab"
                                    aria-controls="bank" aria-selected="false">Bank Account</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="picture-tab" data-toggle="tab" href="#picture" role="tab"
                                    aria-controls="picture" aria-selected="false">Upload Picture</a>
                            </li>
                        </ul>
                        <!-- tab 1 start -->
                        <div class="tab-content col-12 mt-3 mb-3" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                                <div class="form-group">
                                    <label for="inputUsername">Username</label>
                                    <input type="text" name="username" class="form-control" id="inputUsername"
                                        value="<?= $data_talent['username']?>">
                                </div>
                                <div class="form-group">
                                    <label for="inputNama">Nama</label>
                                    <input type="text" name="nama" class="form-control" id="inputNama"
                                        value="<?= $data_talent['name']?>">
                                </div>
                                <div class="form-group">
                                    <label for="inputKTP">Nomor KTP</label>
                                    <input type="text" name="no_ktp" class="form-control" id="inputKTP"
                                        value="<?= $data_talent['no_ktp']?>">
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="tempatLahir">Tempat Lahir</label>
                                        <input type="text" name="tpt_lahir" class="form-control"
                                            value="<?= $data_talent['tpt_lahir']?>" id="tempatLahir">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="tanggalLahir">Tanggal Lahir</label>
                                        <input type="date" name="tgl_lahir" class="form-control"
                                            value="<?= $data_talent['tgl_lahir']?>" id="tanggalLahir">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress2">Alamat</label>
                                    <input type="text" name="alamat" class="form-control" id="inputAddress2"
                                        value="<?= $data_talent['alamat']?>">
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inpgender">Gender</label>
                                        <select class="custom-select" name="gender" id="inpgender">
                                            <?php 
                                                $gender = $data_talent['gender'];
                                                if ($gender == NULL) {
                                                    echo "<option value=''></option>
                                                          <option value='Pria'>Pria</option>
                                                          <option value='Wanita'>Wanita</option>";
                                                }elseif($gender == 'Wanita'){
                                                    echo "<option value='$gender'>$gender</option>
                                                          <option value='Pria'>Pria</option>";
                                                }elseif ($gender == 'Pria') {
                                                    echo "<option value='$gender'>$gender</option>
                                                          <option value='Wanita'>Wanita</option>";
                                                }else {
                                                    echo "<option value=''>None</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="rambut">Tipe Rambut</label>
                                        <select class="custom-select" name="tipe_rambut" id="rambut">
                                            <?php 
                                                $tipe_rambut = $data_talent['tipe_rambut'];
                                                if ($tipe_rambut == NULL) {
                                                    echo "<option value=''></option>
                                                          <option value='Pendek'>Pendek</option>
                                                          <option value='Sedang'>Sedang</option>
                                                          <option value='Panjang'>Panjang</option>";
                                                }elseif ($tipe_rambut == 'Pendek'){
                                                    echo "<option value='$tipe_rambut'>$tipe_rambut</option>
                                                          <option value='Sedang'>Sedang</option>
                                                          <option value='Panjang'>Panjang</option>";
                                                }elseif ($tipe_rambut == 'Sedang') {
                                                    echo "<option value='$tipe_rambut'>$tipe_rambut</option>
                                                          <option value='Pendek'>Pendek</option>
                                                          <option value='Panjang'>Panjang</option>";
                                                }elseif ($tipe_rambut == 'Panjang') {
                                                    echo "<option value='$tipe_rambut'>$tipe_rambut</option>
                                                          <option value='Pendek'>Pendek</option>
                                                          <option value='Sedang'>Sedang</option>>";
                                                }else{
                                                    echo "<option value=''></option>
                                                          <option value='Pendek'>Pendek</option>
                                                          <option value='Sedang'>Sedang</option>
                                                          <option value='Panjang'>Panjang</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="tinggi">Tinggi Badan</label>
                                        <div class="input-group mb-3">
                                            <input type="text" name="tb" class="form-control"
                                                value="<?= $data_talent['tb'] ?>" id="tinggi"
                                                aria-describedby="basic-addon3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon3">CM</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="berat">Berat Badan</label>
                                        <div class="input-group mb-3">
                                            <input type="text" name="bb" class="form-control"
                                                value="<?= $data_talent['bb'] ?>" id="berat"
                                                aria-describedby="basic-addon3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon3">KG</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inpbaju">Ukuran Baju</label>
                                        <select class="custom-select" name="ukb" id="inpbaju">
                                            <?php 
                                                $ukb = $data_talent['uk_baju'];
                                                if ($ukb == NULL) {
                                                    echo "<option value=''></option>
                                                    <option value='S'>S</option>
                                                    <option value='M'>M</option>
                                                    <option value='L'>L</option>
                                                    <option value='XL'>XL</option>
                                                    <option value='XXL'>XXL</option>";
                                                }elseif ($ukb == 'S') {
                                                    echo "<option value='$ukb'>$ukb</option>
                                                    <option value='M'>M</option>
                                                    <option value='L'>L</option>
                                                    <option value='XL'>XL</option>
                                                    <option value='XXL'>XXL</option>";
                                                }elseif ($ukb == 'M') {
                                                    echo "<option value='$ukb'>$ukb</option>
                                                    <option value='S'>S</option>
                                                    <option value='L'>L</option>
                                                    <option value='XL'>XL</option>
                                                    <option value='XXL'>XXL</option>";
                                                }elseif ($ukb == 'L') {
                                                    echo "<option value='$ukb'>$ukb</option>
                                                    <option value='S'>S</option>
                                                    <option value='M'>M</option>
                                                    <option value='XL'>XL</option>
                                                    <option value='XXL'>XXL</option>";
                                                }elseif ($ukb == 'XL') {
                                                    echo "<option value='$ukb'>$ukb</option>
                                                    <option value='S'>S</option>
                                                    <option value='M'>M</option>
                                                    <option value='L'>L</option>
                                                    <option value='XXL'>XXL</option>";
                                                }elseif ($ukb == 'XXL') {
                                                    echo "<option value='$ukb'>$ukb</option>
                                                    <option value='S'>S</option>
                                                    <option value='M'>M</option>
                                                    <option value='L'>L</option>
                                                    <option value='XL'>XL</option>";
                                                }else {
                                                    echo "<option value=''></option>
                                                    <option value='S'>S</option>
                                                    <option value='M'>M</option>
                                                    <option value='L'>L</option>
                                                    <option value='XL'>XL</option>
                                                    <option value='XXL'>XXL</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inpsepatu">Ukuran Sepatu</label>
                                        <input type="number" class="form-control" name="uks" id="inpsepatu"
                                            value="<?= $data_talent['uk_sepatu']?>">
                                    </div>
                                </div>
                                <!-- <button type="submit" name="submit-1"  class="btn btn-b2 mt-3 col-2 offset-md-10">Save</button> -->
                                <a style="display:<?= $btn_edit?>" class="btn btn-b2 mt-3 col-2 offset-md-10 nav-link"
                                    id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                                    aria-controls="contact" aria-selected="false">Next</a>

                            </div>
                            <!-- tab 1 end -->

                            <!-- tab 2 start -->
                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">

                                <div class="form-group">
                                    <label for="hp">Nomor Handphone</label>
                                    <input type="text" name="hp" class="form-control" id="hp"
                                        value="<?= $data_talent['phone']?>">
                                </div>
                                <div class="form-group">
                                    <label for="hp">Nomor Whatsapp</label>
                                    <input type="text" name="wa" class="form-control" id="hp"
                                        value="<?= $data_talent['whatsapp']?>">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control" id="email"
                                        value="<?= $data_talent['email']?>">
                                </div>
                                <div class="form-group">
                                    <label for="instagram">Instagram</label>
                                    <input type="text" name="instagram" class="form-control" id="instagram"
                                        value="<?= $data_talent['instagram']?>">
                                </div>
                                <div class="form-group">
                                    <label for="tiktok">Tiktok</label>
                                    <input type="text" name="tiktok" class="form-control" id="tiktok"
                                        value="<?= $data_talent['tiktok']?>">
                                </div>
                                <div class="form-group">
                                    <label for="facebook">Facebook</label>
                                    <input type="text" name="facebook" class="form-control" id="facebook"
                                        value="<?= $data_talent['facebook']?>">
                                </div>
                                <!-- <button type="submit" name="submit" class="btn btn-b2 mt-3 col-2 offset-md-10">Save</button> -->
                                <a style="display:<?= $btn_edit?>" class="btn btn-b2 mt-3 col-2 offset-md-10 nav-link"
                                    id="ability-tab" data-toggle="tab" href="#ability" role="tab"
                                    aria-controls="ability" aria-selected="false">Next</a>

                            </div>
                            <!-- tab 2 end -->

                            <!-- tab 3 start -->
                            <div class="tab-pane fade" id="ability" role="tabpanel" aria-labelledby="ability-tab">

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="kem_kom">Kemampuan Komunikasi</label>
                                        <select class="custom-select" name="kem_kom" id="kem_kom">
                                            <?php 
                                            $kk = $data_talent['kmp_kom'];
                                            if ($kk == NULL) {
                                                echo "<option value=''></option>
                                                <option value='1'>1</option>
                                                <option value='2'>2</option>
                                                <option value='3'>3</option>
                                                <option value='4'>4</option>
                                                <option value='5'>5</option>";
                                            }elseif ($kk == '1') {
                                                echo "<option value='$kk'>$kk</option>
                                                <option value='2'>2</option>
                                                <option value='3'>3</option>
                                                <option value='4'>4</option>
                                                <option value='5'>5</option>";
                                            }elseif ($kk == '2') {
                                                echo "<option value='$kk'>$kk</option>
                                                <option value='1'>1</option>
                                                <option value='3'>3</option>
                                                <option value='4'>4</option>
                                                <option value='5'>5</option>";
                                            }elseif ($kk == '3') {
                                                echo "<option value='$kk'>$kk</option>
                                                <option value='1'>1</option>
                                                <option value='2'>2</option>
                                                <option value='4'>4</option>
                                                <option value='5'>5</option>";
                                            }elseif ($kk == '4') {
                                                echo "<option value='$kk'>$kk</option>
                                                <option value='1'>1</option>
                                                <option value='2'>2</option>
                                                <option value='3'>3</option>
                                                <option value='5'>5</option>";
                                            }elseif ($kk == '5') {
                                                echo "<option value='$kk'>$kk</option>
                                                <option value='1'>1</option>
                                                <option value='2'>2</option>
                                                <option value='3'>3</option>
                                                <option value='4'>4</option>";
                                            }else {
                                                echo "<option value=''></option>
                                                <option value='1'>1</option>
                                                <option value='2'>2</option>
                                                <option value='3'>3</option>
                                                <option value='4'>4</option>
                                                <option value='5'>5</option>";
                                            }
                                        ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="kem_persu">Kemampuan Persuasif</label>
                                        <select class="custom-select" name="kem_persu" id="kem_persu">
                                            <?php 
                                                $kp = $data_talent['kmp_persu'];
                                                if ($kp == NULL) {
                                                    echo "<option value=''></option>
                                                    <option value='Kurang'>Kurang</option>
                                                    <option value='Baik'>Baik</option>
                                                    <option value='Sedang'>Sedang</option>
                                                    <option value='Sangat Baik'>Sangat Baik</option>";
                                                }elseif ($kp == 'Kurang') {
                                                    echo "<option value='$kp'>$kp</option>
                                                    <option value='Baik'>Baik</option>
                                                    <option value='Sedang'>Sedang</option>
                                                    <option value='Sangat Baik'>Sangat Baik</option>";
                                                }elseif ($kp == 'Baik') {
                                                    echo "<option value='$kp'>$kp</option>
                                                    <option value='Kurang'>Kurang</option>
                                                    <option value='Sedang'>Sedang</option>
                                                    <option value='Sangat Baik'>Sangat Baik</option>";
                                                }elseif ($kp == 'Sedang') {
                                                    echo "<option value='$kp'>$kp</option>
                                                    <option value='Kurang'>Kurang</option>
                                                    <option value='Baik'>Baik</option>
                                                    <option value='Sangat Baik'>Sangat Baik</option>";
                                                }elseif ($kp == 'Sangat Baik') {
                                                    echo "<option value='$kp'>$kp</option>
                                                    <option value='Kurang'>Kurang</option>
                                                    <option value='Baik'>Baik</option>
                                                    <option value='Sedang'>Sedang</option>";
                                                }else {
                                                    echo "<option value=''></option>
                                                    <option value='Kurang'>Kurang</option>
                                                    <option value='Baik'>Baik</option>
                                                    <option value='Sedang'>Sedang</option>
                                                    <option value='Sangat Baik'>Sangat Baik</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="pendidikan">Pendidikan Terkahir</label>
                                        <select class="custom-select" name="pendidikan" id="pendidikan">
                                            <?php 
                                                $pendidikan = $data_talent['pendidikan'];
                                                if ($pendidikan == NULL) {
                                                    echo "<option value=''></option>
                                                    <option value='SD'>SD</option>
                                                    <option value='SMP'>SMP</option>
                                                    <option value='SMA'>SMA</option>
                                                    <option value='Diploma'>Diploma</option>
                                                    <option value='S1'>S1</option>
                                                    <option value='S2'>S2</option>";
                                                }elseif ($pendidikan == 'SD') {
                                                    echo "<option value='$pendidikan'>$pendidikan</option>
                                                    <option value='SMP'>SMP</option>
                                                    <option value='SMA'>SMA</option>
                                                    <option value='Diploma'>Diploma</option>
                                                    <option value='S1'>S1</option>
                                                    <option value='S2'>S2</option>";
                                                }elseif ($pendidikan == 'SMP') {
                                                    echo "<option value='$pendidikan'>$pendidikan</option>
                                                    <option value='SD'>SD</option>
                                                    <option value='SMA'>SMA</option>
                                                    <option value='Diploma'>Diploma</option>
                                                    <option value='S1'>S1</option>
                                                    <option value='S2'>S2</option>";
                                                }elseif ($pendidikan == 'SMA') {
                                                    echo "<option value='$pendidikan'>$pendidikan</option>
                                                    <option value='SD'>SD</option>
                                                    <option value='SMP'>SMP</option>
                                                    <option value='Diploma'>Diploma</option>
                                                    <option value='S1'>S1</option>
                                                    <option value='S2'>S2</option>";
                                                }elseif ($pendidikan == 'Diploma') {
                                                    echo "<option value='$pendidikan'>$pendidikan</option>
                                                    <option value='SD'>SD</option>
                                                    <option value='SMP'>SMP</option>
                                                    <option value='SMA'>SMA</option>
                                                    <option value='S1'>S1</option>
                                                    <option value='S2'>S2</option>";
                                                }elseif ($pendidikan == 'S1') {
                                                    echo "<option value='$pendidikan'>$pendidikan</option>
                                                    <option value='SD'>SD</option>
                                                    <option value='SMP'>SMP</option>
                                                    <option value='SMA'>SMA</option>
                                                    <option value='Diploma'>Diploma</option>
                                                    <option value='S2'>S2</option>";
                                                }elseif ($pendidikan == 'S2') {
                                                    echo "<option value='$pendidikan'>$pendidikan</option>
                                                    <option value='SD'>SD</option>
                                                    <option value='SMP'>SMP</option>
                                                    <option value='SMA'>SMA</option>
                                                    <option value='Diploma'>Diploma</option>
                                                    <option value='S1'>S1</option>";
                                                }else {
                                                    echo "<option value=''></option>
                                                    <option value='SD'>SD</option>
                                                    <option value='SMP'>SMP</option>
                                                    <option value='SMA'>SMA</option>
                                                    <option value='Diploma'>Diploma</option>
                                                    <option value='S1'>S1</option>
                                                    <option value='S2'>S2</option>";
                                                }

                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="sts_pendidikan">Status Pendidikan Saat ini</label>
                                        <select class="custom-select" name="sts_pendidikan" id="sts_pendidikan">
                                            <?php 
                                                $sts_pen = $data_talent['sts_pendidikan'];
                                                if ($sts_pen == NULL) {
                                                    echo "<option value=''></option>
                                                    <option value='Aktif'>Aktif</option>
                                                    <option value='Non-Aktif'>Non-Aktif</option>";
                                                }elseif ($sts_pen == 'Aktif') {
                                                    echo "<option value='$sts_pen'>$sts_pen</option>
                                                    <option value='Non-Aktif'>Non-Aktif</option>";
                                                }elseif ($sts_pen == 'Non-Aktif') {
                                                    echo "<option value='$sts_pen'>$sts_pen</option>
                                                    <option value='Aktif'>Aktif</option>";
                                                }else {
                                                    echo "<option value=''></option>
                                                    <option value='Aktif'>Aktif</option>
                                                    <option value='Non-Aktif'>Non-Aktif</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="seragam_peru">Bersedia menggunakan seragam perusahaan</label>
                                    <select class="custom-select" name="seragam" id="seragam">
                                        <?php 
                                                $seragam = $data_talent['seragam'];
                                                if ($seragam == NULL) {
                                                    echo "<option value=''></option>
                                                    <option value='Ya'>Ya</option>
                                                    <option value='Non-'>Non-</option>";
                                                }elseif ($seragam == 'Ya') {
                                                    echo "<option value='$seragam'>$seragam</option>
                                                    <option value='Tidak'>Tidak</option>";
                                                }elseif ($seragam == 'Tidak') {
                                                    echo "<option value='$seragam'>$seragam</option>
                                                    <option value='Ya'>Ya</option>";
                                                }else {
                                                    echo "<option value=''></option>
                                                    <option value='Ya'>Ya</option>
                                                    <option value='Non-'>Non-</option>";
                                                }
                                            ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="malam">Bersedia bekerja hingga malam hari</label>
                                    <input class="custom-select" list="malam_hari"
                                        placeholder="Ya/Tidak/Ketik Keterangan" value="<?=$data_talent['malam']?>"
                                        name="malam" id="malam">
                                    <datalist id="malam_hari">
                                        <option value="Ya">
                                        <option value="Tidak">
                                    </datalist>
                                </div>
                                <div class="form-group">
                                    <label for="kota">Bersedia bekerja diluar kota</label>
                                    <input class="custom-select" list="luar_kota"
                                        placeholder="Ya/Tidak/Ketik Keterangan" value="<?=$data_talent['luar_kota']?>"
                                        name="kota" id="kota">
                                    <datalist id="luar_kota">
                                        <option value="Ya">
                                        <option value="Tidak">
                                    </datalist>
                                </div>
                                <div class="form-group">
                                    <label for="kontrak">Bersedia dikontrak untuk periode tertentu ?</label>
                                    <input class="custom-select" list="list_kontrak"
                                        placeholder="Ya/Tidak/Ketik Keterangan" value="<?=$data_talent['kontrak']?>"
                                        name="kontrak" id="kontrak">
                                    <datalist id="list_kontrak">
                                        <option value="Ya">
                                        <option value="Tidak">
                                    </datalist>
                                </div>
                                <!-- <button type="submit" name="submit-3" class="btn btn-b2 mt-3 col-2 offset-md-10">Save</button> -->
                                <a style="display:<?= $btn_edit?>" class="btn btn-b2 mt-3 col-2 offset-md-10 nav-link"
                                    id="bank-tab" data-toggle="tab" href="#bank" role="tab" aria-controls="bank"
                                    aria-selected="false">Next</a>

                            </div>
                            <!-- tab 3 end -->

                            <!-- tab 4 start -->
                            <div class="tab-pane fade" id="bank" role="tabpanel" aria-labelledby="bank-tab">

                                <div class="form-group">
                                    <label for="bank_name">Nama Bank</label>
                                    <input type="text" value="<?=$data_talent['nama_bank']?>" name="bank"
                                        class="form-control" id="bank_name" value="">
                                </div>
                                <div class="form-group">
                                    <label for="no_rek">Nomor Rekening</label>
                                    <input type="text" value="<?=$data_talent['no_rek']?>" name="no_rek"
                                        class="form-control" id="no_rek" value="">
                                </div>
                                <div class="form-group">
                                    <label for="atas_nama">Atas Nama</label>
                                    <input type="text" value="<?=$data_talent['an_rek']?>" name="atas_nama"
                                        class="form-control" id="atas_nama" value="">
                                </div>
                                <!-- <button type="submit" name="submit-4" class="btn btn-b2 mt-3 col-2 offset-md-10">Save</button> -->
                                <a style="display:<?= $btn_edit?>" class="btn btn-b2 mt-3 col-2 offset-md-10 nav-link"
                                    id="picture-tab" data-toggle="tab" href="#picture" role="tab"
                                    aria-controls="picture" aria-selected="false">Next</a>

                            </div>
                            <!-- tab 4 end -->

                            <!-- tab 5 start -->
                            <div class="tab-pane fade" id="picture" role="tabpanel" aria-labelledby="picture-tab">

                            <div id="carouselExampleInterval" style="display:<?= $picture?>" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active" data-interval="1000">
                                    <img src="../assets/images/talent/<?= $data_talent['closeup'] ?>" class="d-block w-100" alt="Close-Up">
                                    </div>
                                    <div class="carousel-item" data-interval="1000">
                                    <img src="../assets/images/talent/<?= $data_talent['pas_photo'] ?>" class="d-block w-100" alt="Pas Photo">
                                    </div>
                                    <div class="carousel-item" data-interval="1000">
                                    <img src="../assets/images/talent/<?= $data_talent['full_body'] ?>" class="d-block w-100" alt="Full Body">
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                                
                                <div style="display:<?= $btn_edit?>">
                                    <div class="input-group mb-3">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="closeup"
                                                id="inputGroupFile01" value="<?= $data_talent['closeup'] ?>" aria-describedby="inputGroupFileAddon01">
                                            <label class="custom-file-label" for="inputGroupFile01">Close Up</label>
                                        </div>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="pasfoto"
                                                id="inputGroupFile02" value="<?= $data_talent['pas_photo'] ?>" aria-describedby="inputGroupFileAddon02">
                                            <label class="custom-file-label" for="inputGroupFile02">Pas Photo</label>
                                        </div>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="fullbody"
                                                id="inputGroupFile03" <?= $data_talent['full_body'] ?> aria-describedby="inputGroupFileAddon03">
                                            <label class="custom-file-label" for="inputGroupFile03">Full body</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <a href="?p=profil" class="btn btn-b1 mt-3 col-3" style="display: <?= $btn_edit ?>;">Cancel</a>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <button type="submit" name="submit" style="display:<?= $btn_edit?>"
                                        class="btn btn-b2 mt-3 col-3 offset-md-9">Save</button>
                                    </div>
                                </div>
                            </div>
                                <a href="?p=profil&s=edit" class="btn btn-b2 mt-3 col-2" style="display: <?= $picture ?>;">Edit</a>
                            <!-- tab 5 end -->
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- End::Card -->
</div>
<!-- div::content -->