<?php

$options = [
    'cost' => 10,
];

if (isset($_POST['signup'])) {

    $nama = $_POST["nama"];
    $email = $_POST["email"];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT, $options);

    $cek_data = mysqli_num_rows(mysqli_query($con, "SELECT * FROM talent WHERE `email` = '$email' "));
    if ($cek_data < 1) {
        mysqli_query($con, "INSERT INTO talent (`idt`, `name`, `username`, `password`, `email`) VALUES (NULL,'$nama','$email','$password','$email')");

        header("location:index");
    } else {
        echo "<script>Swal.fire({icon: 'error',title: 'Oops...',text: 'Email sudah terdaftar'})</script>";
    }
}
?>
<div class="container-fluid">
    <div class="row page-login align-items-center">
        <div class="col-12 col-sm-12 col-md-12 col-lg-5 div-form-login">
            <div class="row">
                <div class="col-12 card-login">
                    <div class="ket-form text-center">
                        <center>
                            <div class="img-logo text-center">
                                <img src="../assets/images/icon/logo/gawija logo.svg" alt="logo" width="100%">
                            </div>
                        </center>
                        <h3 class="mt-3 txt-1-judul">SIGN UP TALENT</h3>
                    </div>
                    <form method="POST">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" name="nama" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email Address</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password Account</label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                                required>
                        </div>
                        <small class="txt-2-judul">I already <a href="?log=sign-in" class="txt-1-judul">have an account</a></small>
                        <button type="submit" name="signup" class="btn btn-b2 mt-4">Submit</button>
                    </form>
                    <br>
                    <small class="txt-2-judul">Logged in as <a href="../client" class="txt-1-judul">a client</a></small>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-7 img-login text-center">
            <img src="../assets/images/bg/svg/daftar.svg" alt="login-bg" width="80%">
            <h2 class=" mt-5">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</h2>
            <p class="">Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda voluptatibus deserunt, earum eos unde accusamus dolorum neque corrupti officiis molestiae veniam, commodi fugiat quibusdam soluta possimus corporis blanditiis? Natus mollitia quasi temporibus?</p>
        </div>
    </div>
</div>