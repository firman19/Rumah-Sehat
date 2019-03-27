<?php session_start();?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Rumah Sehat : Berobat Tanpa Antre</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="carousel.css" rel="stylesheet">
  </head>
  <body>

    <?php include('config.php');?>
    <?php if(isset($_COOKIE['pasienid']))        $_SESSION['pasienid']=$_COOKIE['pasienid'];
    if(isset($_SESSION['pasienid'])){
      $pasienid=$_SESSION['pasienid'];
      include ('header2.php');
    }else{
      include('header1.php');
    }?>
    <main role="main">
      
      <!-- Marketing messaging and featurettes
      ================================================== -->
      <!-- Wrap the rest of the page in another container to center all the content. -->

      <div class="container marketing">
        <!-- Three columns of text below the carousel -->
       
        <!-- START THE FEATURETTES -->
        <br><br>
        <h1>Tentang Kami</h1>
        
        <hr class="bg-primary">
        <h2>Tim Developer</h2>
        <br>
        <div class="row">
          <div class="col-lg-4">
            <img class="rounded-circle" src="jer.png" width="140" height="140">
            <h2>Jericho</h2>
            <p>Web designer<br>+6285293251272<br>firman_bjs@ymail.com</p>

            <p>I believe Rumah Sehat is the best solution for our outdated hospital system.</p>
          </div><!-- /.col-lg-4 -->
          <div class="col-lg-4">
            <img class="rounded-circle" src="firman.png" alt="Generic placeholder image" width="140" height="140">
            <h2>Firman</h2>
            <p>Web programmer<br>+6285293251272<br>firman_bjs@ymail.com</p>
            <p>Rumah Sehat is a new breakthrough in hospital system that will become a trendsetter in the next few years. </p>
          </div><!-- /.col-lg-4 -->
          <div class="col-lg-4">
            <img class="rounded-circle" src="mahdi.jpg" alt="Generic placeholder image" width="140" height="140">
            <h2>Mahdi</h2>
            <p>Technical Support<br>+6285293251272<br>firman_bjs@ymail.com</p>
            <p>Saya harap website ini dapat menghilangkan antrean dan memberi kemudahan.</p>
          </div><!-- /.col-lg-4 -->
        </div><!-- /.row -->
        <h2>Kontak</h2>
        <table>
          <tr>
            <td>Nomor telepon</td>
            <td>:</td>
            <td>+6285293251272</td>
          </tr>
            <td>Alamat email</td>
            <td>:</td>
            <td>firman_bjs@ymail.com</td>
          </tr>
        </table>
        <br>
        <h2>Kantor Pusat</h2>
        <p><b>President University</b><br>
  Jl. Ki Hajar Dewantara, Kota Jababeka, Cikarang Baru, Bekasi 17550 - Indonesia
       
        
      
       
       
        <!-- /END THE FEATURETTES -->
<hr class="featurette-divider">
      </div><!-- /.container -->
      <footer class="container" style="bottom: 0px;">
        <p class="float-right"><a href="#">Back to top</a></p>
        <p>&copy; 2017 President University &middot; <a href="kebijakanprivasi.php">Privacy</a> &middot; <a href="syaratketentuan.php">Terms</a></p>
      </footer>

      <!-- FOOTER -->
      

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
    <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript">
    </script>
  </body>
</html>
          <tr>
