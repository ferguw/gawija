<?php
error_reporting(0);
    if (isset($_POST["login"])) {
        // $_SESSION["id_talent"] = 1; //Contoh
        // header("Location:index");
        $email = mysqli_real_escape_string($con, $_POST["email"]);

        $cek_user = mysqli_query($con, "SELECT * FROM talent WHERE email = '$email' ");
        $data_talent = mysqli_fetch_assoc($cek_user);
        $idt = $data_talent['idt'];
        
        if (mysqli_num_rows($cek_user) < 1) {
            echo "<script>Swal.fire({icon: 'error',title: 'Oops...',text: 'Email yang anda masukkan tidak kami temukan'})</script>";
        }else{
            $string = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456789';
            $shuffle1  = substr(str_shuffle($string), 0, 32);
            $shuffle2  = substr(str_shuffle($string), 0, 32);
            $mix = $shuffle1.$shuffle2;
            mysqli_query($con, "UPDATE talent SET `reset_password` = '$mix' WHERE `idt` = '$idt';");
            
            $to       = 'ferrgun17@gmail.com';
            $from = "admin@gawija.bmt-support.com";    
            $headers = "From:" . $from;    
            $subject  = 'Reset Password';
            $message  = 'Selamat Datang, '.PHP_EOL. ' Password Anda akan direset silahkan klik link ini untuk melanjutkan gawija.test/talent/?log=forgot-password-process&id='.$idt.'&key='.$mix;
            mail($to,$subject,$message, $headers);
            header("Location:index");
            
        }
    }
?>


<div class="container-fluid">
    <div class="row page-login align-items-center">
        <div class="col-12 col-sm-12 col-md-12 col-lg-7 img-login text-center">
            <img src="../assets/images/bg/svg/login.svg" alt="login-bg" width="80%">
            <h2 class=" mt-5">Lorem ipsum dolor sit amet consectetur adipisicing elit.</h2>
            <p class="">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aliquam quae id, vel vero quidem mollitia aperiam obcaecati recusandae eligendi temporibus assumenda deserunt soluta! Veniam quae qui voluptatibus reprehenderit provident magnam harum vitae?</p>
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
                        <h3 class="mt-3">Reset your password</h3>
                        <p class="mt-5">Enter your user account's verified email address and we will send you a password reset link.</p>
                    </div>
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                        </div>
                        <button type="submit" class="btn btn-b2 mt-3" name="login">Submit</button>
                        <small>I have <a href="?log=sign-in">Account</a></small>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>