<?php session_start();?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Daftar | Rumah Sehat : Berobat Tanpa Antre</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="carousel.css" rel="stylesheet">
  </head>
  <body>
    <?php include('config.php'); ?>
    <?php if(isset($_COOKIE['pasienid']))        $_SESSION['pasienid']=$_COOKIE['pasienid']; if(isset($_SESSION['pasienid'])){
      echo "
  <script>
    window.location.assign('index.php');
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
        <?php /*?>
          <form class="form-inline mt-2 mt-md-0" action="cari.php" method="post">
            <select name="rs" class="form-control mr-sm-2">
              <!--LOOPING HERE-->
              <?php $sql ="SELECT rsname FROM rs";  $result = mysqli_query($link, $sql);
              while($row = mysqli_fetch_assoc($result)){
                $dbrsname = $row['rsname'];?>
                <option value="<?php echo $dbrsname; ?>"> <?php echo $dbrsname; ?> </option>
              <?php }?>
              </select>

            <select name="sp" class="form-control mr-sm-2">
              <!--LOOPING HERE-->
              <?php   $sql ="SELECT spname FROM sp";  $result = mysqli_query($link, $sql);
              while($row = mysqli_fetch_assoc($result)){
                $dbspname = $row['spname'];?>
                <option value="<?php echo $dbspname; ?>"> <?php echo $dbspname; ?> </option>
              <?php }?>
            </select>    
            <button class=class="btn btn-lg btn-primary" type="submit" name="submit" role="button">Cari Dokter</button>
          </form> 
        */?>
        <br>
        <h1 align="center">Buat Akun Baru</h1>
        <br>
        <br>
        <center>
        <form action="" method="post">
          <input type="text" id="a" placeholder="Nama" name="namadaftar" class="form-control col-md-4"/>
          <br><br>
          <input type="email" id="b" placeholder="Email" name="emaildaftar" class="form-control col-md-4"/>
          <br><br>
          <input type="password" id="c" placeholder="Password" name="pwdaftar" class="form-control col-md-4"/>
          
          <?php
            if(isset($_POST['daftar'])){
              if ($_POST['namadaftar']=="" or $_POST['emaildaftar']=="" or $_POST['pwdaftar']==""){
                echo "Harap isi semau bidang";
              }else{
                $a=$_POST['namadaftar'];
                $b=$_POST['emaildaftar'];
                $c=$_POST['pwdaftar'];
                $sql11 = "SELECT `pasienemail` FROM `pasien` WHERE `pasienemail`='$b';";
                $result11 = mysqli_query($link,$sql11);
                if(mysqli_num_rows($result11) > 0){
                  echo "Email sudah dipakai";
                }else{
                  $sql = "INSERT INTO `pasien` (`pasienid`, `pasienname`, `pasienemail`, `pasienpw`, `jdwid`, `antri`,`pasienimg`) VALUES (NULL, '$a', '$b', '$c', '', '','default.png');";
                  $result = mysqli_query($link, $sql);
                  echo "
                  <script>
                    window.location.assign('daftar-masuk.php?pasienemail=".$b."&pasienpw=".$c."');
                  </script>"; 
                }
                
              }
            }
          ?>
          <br>
          <br>
          <input  type="submit" value="DAFTAR" name="daftar" class="btn btn-primary col-md-2"/>
        </form>
        <br>
        <p>Sudah punya akun Rumah Sehat? <a href="masuk.php">Masuk disini</a></p>
        </center>
      </div><!-- /.container -->
      <br>
     
      
      <!-- FOOTER -->
      <footer class="container" style="">
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
