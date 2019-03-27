                  <?php if(isset($_POST['masuk1'])){
                    $cookie=$_POST['cekboks1'];
                    $b=$_POST['emailmasuk'];
                    $c=$_POST['pwmasuk'];
                    $sql = "SELECT pasienid,pasienemail,pasienpw FROM pasien WHERE pasienemail='$b' AND pasienpw='$c'";
                    $result = mysqli_query($link, $sql);

                    if($c=="" or $b ==""){
                    }else{
                      if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_assoc($result)){
                          if($b == $row['pasienemail'] && $c == $row['pasienpw']){
                            $_SESSION['pasienid'] = $row['pasienid'];
                            if($cookie=="yes") {
                              $cookie_name = "pasienid";
                              $cookie_value = $_SESSION['pasienid'];  
                              setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
                            }
                          }
                        }
                      }
                    }
                  }?>
<header>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item ">
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
        <li>
            <div class="dropdown show float-right">
            <button type="button" class="btn btn-primary dropdown-toggle col-lg-12" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Masuk ke Rumah Sehat</button>
            <div class="dropdown-menu dropdown-menu-right">
              <form class="px-4 py-3" method="post" action="">
                <div class="form-group">
                  <label for="exampleDropdownFormEmail1">Alamat Email</label>
                  <input type="email" class="form-control" id="exampleDropdownFormEmail1" placeholder="email@contoh.com" name="emailmasuk">
                </div>
                <div class="form-group">
                  <label for="exampleDropdownFormPassword1">Password</label>
                  <input type="password" class="form-control" id="exampleDropdownFormPassword1" placeholder="Password" name="pwmasuk">
                </div>
                <?php
                  if(isset($_POST['masuk1'])){
                    $b=$_POST['emailmasuk'];
                    $c=$_POST['pwmasuk'];
                    $sql = "SELECT pasienid,pasienemail,pasienpw FROM pasien WHERE pasienemail='$b' AND pasienpw='$c'";
                    $result = mysqli_query($link, $sql);
                    if($c=="" or $b ==""){
                      echo "Harap isi email dan password";
                    }else{
                      if(mysqli_num_rows($result) > 0){
                      while($row = mysqli_fetch_assoc($result)){
                          $_SESSION['pasienid'] = $row['pasienid'];
                        if($b == $row['pasienemail'] && $c == $row['pasienpw']){
                          echo "
  <script>
    window.location.assign('akunpasien.php');
  </script>"; 
                          
                        }
                      }
                      }else{
                          echo "Password atau email salah";
                      }  
                    }
                    
                  }
                ?>
               <div class="form-check">
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="cekboks1" value="yes" id="cekboks">
                   Ingat Saya
                  </label>
                  <a class="float-right" href="#">Lupa password?</a>
                </div>
               <center><input type="submit" class="btn btn-primary col-md-6" name="masuk1" value="Masuk"></center>
              </form>
               <center>atau</center>
               <center>
                <?php include_once 'gpConfig.php';
                      include_once'User.php'; 
                      if(isset($_GET['code'])){
                      $gClient->authenticate($_GET['code']);
                      $_SESSION['token'] = $gClient->getAccessToken();?>
                      
  <script>
    window.location.assign('<?php echo filter_var($redirectURL, FILTER_SANITIZE_URL) ?>');
  </script>
                      //header('Location: ' . filter_var($redirectURL, FILTER_SANITIZE_URL));
                      <?php }
                      if (isset($_SESSION['token'])) {
                        $gClient->setAccessToken($_SESSION['token']);
                      }
                      if ($gClient->getAccessToken()) {
                      //Get user profile data from google
                      $gpUserProfile = $google_oauthV2->userinfo->get();                    
                      //Initialize User class
                      $user = new User();
                      //Insert or update user data to the database
                      $gpUserData = array(
                          'oauth_provider'=> 'google',
                          'oauth_uid'     => $gpUserProfile['id'],
                          'first_name'    => $gpUserProfile['given_name'],
                          'last_name'     => $gpUserProfile['family_name'],
                          'email'         => $gpUserProfile['email'],
                          'locale'        => $gpUserProfile['locale'],
                          'picture'       => $gpUserProfile['picture'],
                          'link'          => $gpUserProfile['link']
                      );
                      $userData = $user->checkUser($gpUserData);
                      //Storing user data into session
                      $_SESSION['pasienid'] = $userData['pasienid'];
                      //Render facebook profile data
                      if(empty($userData)){
                          echo '<h3 style="color:red">Some problem occurred, please try again.</h3>';
                      }
                  } else {
                    $authUrl = $gClient->createAuthUrl();
                    echo'<a href="'.filter_var($authUrl, FILTER_SANITIZE_URL).'"><img src="images/glogin.png" width="250px" height="100px" alt=""/></a>';
                  }
                  ?>
               
            </center>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="daftar.php">Belum punya akun? Daftar disini</a>
            </div>
          </div>
        </li>
      </ul>


    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </nav>
</header>