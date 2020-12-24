<?php
session_start();

//Database
$con = mysqli_connect("localhost",  "root", "", "gawija");
// $con = mysqli_connect("45.130.231.51", "u1066805_gawija", "Uu4eZ6dsPp5E", "u1066805_gawija");

if (isset($_GET['act'])) {
  if ($_GET['act'] == 'logout') {
    session_destroy();
    header("location:index");
  }
}

if (!isset($_GET['p'])) {
  $p = 'home';
} else {
  $p = $_GET['p'];
}

if (isset($_GET['log'])) {
  $log = $_GET['log'];
} else {
  $log = 'sign-in';
}


?>
<!doctype html>
<html lang="en">
<!-- Head -->
<?php require_once("_body/head.php") ?>
<!-- Memanggil Tag Head -->
<!-- Head -->

<body>
  <?php if (!isset($_SESSION['id_talent'])) {
    require_once("_content/$log.php");
  } else { ?>
    <!-- Jika Tidak Login, Tampilkan Login, Jika False, Tampilkan Beranda -->
    <div class="container-fluid">
      <div class="row">
        <!-- Begin::SideBar -->
        <?php require_once("_body/sidebar.php") ?>
        <!-- Memanggil Sidebar Menu -->
        <!-- End::SideBar -->
        <!-- Begin::Content -->
        <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-11 col-xl-11" id="content">
          <!-- Begin::header-menu -->
          <?php require_once("_body/header-menu.php") ?>
          <!-- Memanggil Header Menu -->
          <!-- End::header-menu -->
          <!-- Begin::isi -->
          <div class="row">
            <!-- Begin::Content -->
            <div class="col-lg-9 content-utama">
              <!-- Banner -->
              <div class="row d-banner align-items-center">
                <div class="col-lg-12 top-banner align-self-center">
                  <h1>Hallo <?php echo ucwords($data_talent['name']); ?></h1>
                  <h3>Selamat Datang!</h3>
                </div>
              </div>
              <!-- Banner -->

              <!-- Panggil -->
              <?php require("_content/$p.php"); ?>
              <!-- Memanggil Content -->
              <!-- Panggil -->

            </div>
            <!-- End::Content -->

            <!-- Begin::QuickAccses -->
            <div class="col-lg-3">
              <div class="row sticky-top">
                <div class="col-12">
                  <?php require_once("_body/quick-info.php"); ?>
                  <!-- Memanggil Quick Info -->
                </div>
              </div>
            </div>
            <!-- End::QuickAccses -->
          </div>
          <!-- End::isi -->
        </div>
        <!-- End::Content -->
      </div>
    </div>


    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS -->
    <?php require_once("_body/footer.php") ?>

  <?php } ?>
  <!-- tutup kondisi IF Login -->
</body>

</html>