<?php session_start();?>
<?php include('config.php'); ?>
    <?php if(isset($_SESSION['drid'])){
      echo "
  <script>
    window.location.assign('akundokter.php');
  </script>"; 
      
    }else{
      include('header1dok.php');
    }?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Masuk Dokter | Rumah Sehat : Berobat Tanpa Antre</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="carousel.css" rel="stylesheet">
  </head>
  <body>


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
                  <input type="text" class="form-control" id="exampleDropdownFormEmail1" placeholder="Dokter ID" name="drid">
                </div>
                <br>
                <div class="form-group">
                  <input type="password" class="form-control" id="exampleDropdownFormPassword1" placeholder="Password" name="drpw">
                </div>
                <?php
                  if(isset($_POST['drmasuk'])){
                    $b=$_POST['drid'];
                    $c=$_POST['drpw'];
                    $sql = "SELECT drid,drpw FROM dr WHERE drid='$b' AND drpw='$c'";
                    $result = mysqli_query($link, $sql);
                    if(mysqli_num_rows($result) > 0){
                      while($row = mysqli_fetch_assoc($result)){
                          $_SESSION['drid'] = $row['drid'];
                        if($b === $row['drid'] && $c === $row['drpw']){
                          echo "
  <script>
    window.location.assign('akundokter.php');
  </script>"; 
                          
                        }
                      }
                    }else{
                        echo "DokterID atau Password salah";
                    }
                  }
                ?>
               <div class="form-check"> 
                  <label class="form-check-label float-left" >
                    <input type="checkbox" class="form-check-input">Ingat Saya
                  </label>
                  <a class="float-right" href="#">Lupa password?</a>
                </div>
                <br>
                <br>
                
               <center><input type="submit" class="btn btn-primary col-md-6" name="drmasuk" value="Masuk"></center>
               <br>
               
              </form>
              
          </div>
          <div class="col-lg-4">
          </div>

        </div>
        
        
      </div><!-- /.container -->
<hr class="featurette-divider">
      <!-- FOOTER -->
      <footer class="container" style="bottom:0px;">
          <p align="">&copy; President University &middot; <a href="kebijakanprivasi.php">Privacy</a> &middot; <a href="syaratketentuan.php">Terms</a></p>
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

