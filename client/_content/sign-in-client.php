<?php
error_reporting(0);
    if (isset($_POST["login"])) {
        // $_SESSION["id_talent"] = 1; //Contoh
        // header("Location:index");
        $email = mysqli_real_escape_string($con, $_POST["email"]);
        $password = mysqli_real_escape_string($con, $_POST["password"]);

        $cek_user = mysqli_query($con, "SELECT * FROM talent WHERE email = '$email' ");
        $data_user = mysqli_fetch_assoc($cek_user);
        
        if ($data_user['email'] === $email AND password_verify($password, $data_user['password'])) {
            $_SESSION["id_talent"] = $data_user['idt'];
            header("Location:index");
        }else {
            
            echo "<script>Swal.fire({icon: 'error',title: 'Oops...',text: 'Data yang anda masukkan tidak kami temukan'})</script>";
        }
    }
?>


<div class="container-fluid">
    <div class="row page-login align-items-center">
        <div class="col-12 col-sm-12 col-md-12 col-lg-7 img-login text-center">
            <img src="../assets/images/bg/svg/login.svg" alt="login-bg" width="80%">
            <h2 class=" mt-5">Rekrut Freelancer yang terbaik untuk Pekerjaan apa saja, Online</h2>
            <p class="">Jutaan orang menggunakan Platform Gawija untuk mewujudkan Impian mereka menjadi kenyataan </p>
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-5 div-form-login">
            <div class="row justify-content-center">
                <div class="col-12 card-login">
                    <div class="ket-form text-center">
                        <center>
                            <div class="img-logo text-center">
                                <img src="../assets/images/icon/logo/gawija logo.svg" alt="logo" width="100%">
                            </div>
                        </center>
                        <h3 class="mt-3">Sign In Client</h3>
                    </div>
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Remember Me!</label>
                        </div>
                        <small>Don't have <a href="?log=sign-up-client">Account Client?</a></small>
                        <br>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-b3 mt-4" name="login">Submit</button>
                        </div>
                    </form>
                    <br>
                    <small>Login as <a href="../talent">Talent</a></small>
                </div>
            </div>
        </div>
    </div>
</div>