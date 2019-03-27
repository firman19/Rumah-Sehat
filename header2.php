<?php include ('config.php');
if(isset($_COOKIE['pasienid']))        $_SESSION['pasienid']=$_COOKIE['pasienid'];
    if(isset($_SESSION['pasienid']))
      $pasienid=$_SESSION['pasienid'];?>

<header>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="navbar-brand" href="index.php">RUMAH SEHAT</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php">BERANDA</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cari.php">CARI DOKTER</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="tanyadokter.php">TANYA DOKTER</a>
        </li>
        <li class="nav-item">
            <div class="dropdown show ">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" style="cursor:pointer">BANTUAN APPS</a>
            <div class="dropdown-menu ">
              <a class="dropdown-item" href="faq.php">FAQ</a>
              <a class="dropdown-item" href="syaratketentuan.php">Syarat dan Ketentuan</a>
              <a class="dropdown-item" href="kebijakanprivasi.php">Kebijakan Privasi</a>
              <a class="dropdown-item" href="bantuan.php">Live Chat Admin</a>
              <div class="px-3 dropdown-divider"></div>
              <a class="dropdown-item" href="tentangkami.php">Tentang Kami</a>
            </div>
          </div>
        </li>
      </ul>
          
    </div>
    <ul class="navbar-nav mr-auto float-right">
      <?php
      $sql = "SELECT `pasienname`,`pasienimg` FROM `pasien` WHERE `pasienid`='$pasienid';";
      $res = mysqli_query($link,$sql);
      $row = mysqli_fetch_assoc($res);
      $pasienname = $row['pasienname'];
      $pasienimg = $row['pasienimg'];
      ?>
      <div class="dropdown show">
        <img src="<?php echo $pasienimg;?>" width="40px" height="40px" class="rounded-circle">
            <a class="btn btn-primary dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <?php echo $pasienname;?> </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
              <a class="dropdown-item" href="akunpasien.php">Jadwal Konsultasi Saya</a>
              <a class="dropdown-item" href="editakun.php">Sunting Akun</a>
              <a class="dropdown-item" href="logout.php">Keluar</a>
            </div>
          </div>
    </ul>
    
      
  


<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </nav>
</header>