<?php

$options = [
    'cost' => 10,
];

if (isset($_POST['signup'])) {

    $nama = $_POST["nama"];
    $email = $_POST["email"];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT, $options);

    $cek_data = mysqli_num_rows(mysqli_query($con, "SELECT * FROM client WHERE `email` = '$email' "));
    if ($cek_data < 1) {
        mysqli_query($con, "INSERT INTO client (`idc`, `name`, `username`, `password`, `email`) VALUES (NULL,'$nama','$email','$password','$email')");

        header("location:index");
    } else {
        echo "<script>Swal.fire({icon: 'error',title: 'Oops...',text: 'Email sudah terdaftar'})</script>";
    }
}
?>
<div class="container-fluid">
    <div class="row page-login align-items-center">
        <div class="col-12 col-sm-12 col-md-12 col-lg-7 img-login text-center">
            <img src="../assets/images/bg/svg/daftar.svg" alt="login-bg" width="80%">
            <h2 class=" mt-5">Rekrut Freelancer terbaik untuk Pekerjaan apa saja, Online</h2>
            <p class="">Jutaan orang menggunakan gawija.com untuk mewujudkan ide mereka menjadi kenyataan </p>
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-5 div-form-login">
            <div class="row">
                <div class="col-12 card-login">
                    <div class="ket-form text-center">
                        <center>
                            <div class="img-logo text-center">
                                <img src="../assets/images/icon/logo/gawija logo.svg" alt="logo" width="100%">
                            </div>
                        </center>
                        <h3 class="mt-3">Sign Up Client</h3>
                    </div>
                    <form method="POST">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Full Name</label>
                            <input type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Remember Me!</label>
                        </div>
                        <small>i have <a href="?log=sign-in-client">Account Client</a></small>
                        <button type="submit" name="signup" class="btn btn-b2 mt-4">Submit</button>
                    </form>
                    <br>
                    <small>Login as <a href="../talent">Talent?</a></small>
                </div>
            </div>
        </div>
    </div>
</div>