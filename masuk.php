
<?php session_start();
include('config.php'); 
    include 'gpConfig.php';
    include 'User.php'; ?>
                  <?php if(isset($_POST['masuk99'])){
                    $cookie=$_POST['cekboks'];
                    $b=$_POST['emailmasuk99'];
                    $c=$_POST['pwmasuk99'];
                    $sql = "SELECT pasienid, pasienemail, pasienpw FROM pasien WHERE pasienemail='$b' AND pasienpw='$c'";
                    $result = mysqli_query($link, $sql);

                    if($b=="" or $c==""){                    
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
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Masuk | Rumah Sehat : Berobat Tanpa Antre</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="carousel.css" rel="stylesheet">
  </head>
  <body>
    <?php if(isset($_COOKIE['pasienid']))
        $_SESSION['pasienid']=$_COOKIE['pasienid'];
    if(isset($_SESSION['pasienid'])){
      echo "
  <script>
    window.location.assign('akunpasien.php');
  </script>"; 
      
    }else{
      include('headerkhusus.php');
    }?>

    <main role="main">
      <!-- Marketing messaging and featurettes
      ================================================== -->
      <!-- Wrap the rest of the page in another container to center all the content. -->
      <div class="container marketing">
        <br>
        <h1 align="center">Masuk ke Rumah Sehat</h1>
        <br>
        <div class="row">
          <div class="col-lg-4">
          </div>
          <div class="col-lg-4">
              <form class="px-4 py-3" method="post" action="">
                <div class="form-group">
                  <input type="email" class="form-control" id="emailmasuk99" placeholder="Email" name="emailmasuk99">
                </div>
                <br>
                <div class="form-group">
                  <input type="password" class="form-control" id="pwmasuk99" placeholder="Password" name="pwmasuk99">
                </div>
                <?php if(isset($_POST['masuk99'])){
                    $cookie=$_POST['cekboks'];
                    $b=$_POST['emailmasuk99'];
                    $c=$_POST['pwmasuk99'];
                    $sql = "SELECT pasienid, pasienemail, pasienpw FROM pasien WHERE pasienemail='$b' AND pasienpw='$c'";
                    $result = mysqli_query($link, $sql);

                    if($b=="" or $c==""){
                      echo "Harap isi email dan password";
                    }else{
                      
                      if(mysqli_num_rows($result) > 0){
                      while($row = mysqli_fetch_assoc($result)){
                        if($b == $row['pasienemail'] && $c == $row['pasienpw']){
                          $_SESSION['pasienid'] = $row['pasienid'];

                          //echo "<script>window.location.assign('akunpasien.php');</script>"; 
                          }
                        }
                      }else{
                          echo "Password atau email salah";
                      }
                    }
                  }?>
                <div class="form-check"> 
                  <label class="form-check-label float-left" >
                    <input type="checkbox" class="form-check-input" value="yes" name="cekboks" id="cekboks">Ingat Saya
                  </label>
                  <a class="float-right" href="#">Lupa password?</a>
                </div>
                <br>
                <br>
               <center><input type="submit" class="btn btn-primary col-md-6" name="masuk99" value="Masuk"></center>
               <br>
              </form>
               <center>atau</center>
              <div>
                <?php if(isset($_GET['code'])){
                    $gClient->authenticate($_GET['code']);
                    $_SESSION['token'] = $gClient->getAccessToken(); ?>
                            
  <script>
    window.location.assign('<?php echo filter_var($redirectURL, FILTER_SANITIZE_URL) ?>');
  </script>
                    <?php
                  }

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
              </div>




             <br>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="daftar.php">Belum punya akun? Daftar disini</a>
            
          </div>
          <div class="col-lg-4">
          </div>

        </div>
        
        
      </div><!-- /.container -->

      <!-- FOOTER -->
      <footer class="container" style="bottom:0px;">
        <hr class="bg-primary" >
          <p>&copy; 2017 President University &middot; <a href="kebijakanprivasi.php">Privacy</a> &middot; <a href="syaratketentuan.php">Terms</a></p>
      </footer>
    </main>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="assets/js/vendor/popper.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="assets/js/vendor/holder.min.js"></script>
  </body>
</html>

