<!-- Begin::header-menu -->
<?php
$idc = $_SESSION["id_client"];
$data_client = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM client WHERE `idc` = '$idc' "));
?>
<div class="row header">
  <div class="col-lg-12">
    <div class="row">
      <div class="col-sm-12 nav-mobile" id="menu-top-mobile">
        <div class="row align-items-center">
          <div class="col-10">
            <div class="row align-items-center justify-content-start">
              <div class="col-3 text-left">
                <div class="img-profil">
                  <a href="?p=profil"><img src="../assets/images/avatar/avatar-1.png" alt="avatar-user" width="100%"></a>
                </div>
              </div>
              <div class="col-9 text-left" id="username">
                <a href="?p=profil"><?php echo $data_client['email']; ?></a>
              </div>
            </div>
          </div>
          <div class="col-2">
            <button class="menu-sidebar" onclick="sidebar()">
              <li class="material-icons">menu</li>
            </button>
          </div>
        </div>
      </div>
      <div class="col-sm-12 col-md-12 col-lg-9 top-menu">
        <a href="?p=home" hidden><span class="ket-menu">HOME</span></a>
        <a href="?p=job-list" hidden><span class="ket-menu">MY PROJECT</span></a>
        <a href="?p=talent-tawaran!" hidden><span class="ket-menu">TALENT SUBMISSION</span></a>
        <!-- <a href="#!"><span class="ket-menu">UPDATE</span></a> -->
      </div>
      <div class="col-sm-12 col-md-12 col-lg-9 bottom-menu fixed-bottom">
        <div class="row">
          <div class="col-3">
            <a href="?p=home" class="material-icons icon-menu active">home</a>
          </div>
          <div class="col-3">
            <a href="?p=job-list" class="material-icons icon-menu">work</a>
          </div>
          <div class="col-3">
            <a href="?p=talent-tawaran" class="material-icons icon-menu">group</a>
          </div>
          <div class="col-3">
            <a href="?p=profil" class="material-icons icon-menu">person</a>
          </div>
        </div>
      </div>
      <div class="col-sm-12 col-md-12 col-lg-3">
        <!-- profil -->
        <div class="row d-diri">
          <div class="col-lg-12 text-right">
            <div class="row align-items-center justify-content-end">
              <div class="col-9 text-right">
                <a href="?p=profil"><?php echo $data_client['email']; ?></a>
              </div>
              <div class="col-3 text-right">
                <div class="img-profil">
                  <a href="?p=profil" onclick="sidebar()"><img src="../assets/images/avatar/avatar-1.png" alt="avatar-user" width="100%"></a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- profil -->
      </div>
    </div>
  </div>
</div>
<!-- End::header-menu -->