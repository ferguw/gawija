<?php 
    $id = $_GET['id'];
    $key = $_GET["key"];

    $cek_key = mysqli_query($con, "SELECT * FROM talent WHERE `idt`='$id' AND `reset_password`='$key'");
    if (mysqli_num_rows($cek_key) < 1) {
        echo "<script>Swal.fire({icon: 'error',title: 'Oops...',text: 'Something Error, please contact admin'})</script>";
        // echo "<META HTTP-EQUIV='refresh' CONTENT='5;URL=index'>";
    }

    $options = [
        'cost' => 10,
    ];

    if (isset($_POST['reset'])) {
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT, $options);
        mysqli_query($con, "UPDATE `talent` SET `password`='$password', `reset_password` = NULL WHERE `idt` = '$id';
        ");
        header("Location:index");
    }
?>


<div class="container-fluid">
    <div class="row page-login align-items-center">
        <div class="col-12 col-sm-12 col-md-12 col-lg-7 img-login text-center">
            <img src="../assets/images/bg/svg/login.svg" alt="login-bg" width="80%">
            <h2 class=" mt-5">Jadi Freelancer yang terbaik untuk Pekerjaan apa saja, Online</h2>
            <p class="">Jutaan orang menggunakan Platform Gawija untuk mewujudkan Impian mereka menjadi kenyataan </p>
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
                        <h3 class="mt-3">Reset Password</h3>
                    </div>
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="exampleInputPassword1">New Password</label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                        </div>
                        <button type="submit" class="btn btn-b2 mt-2" name="reset">Submit</button>
                    </form>
                    <br>
                    <small>Don't have <a href="?log=sign-up">Account Talent?</a></small>
                    <br>
                    <small>Login as <a href="../client">Client</a></small>
                </div>
            </div>
        </div>
    </div>
</div>