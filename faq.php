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
    <?php if(isset($_COOKIE['pasienid']))        $_SESSION['pasienid']=$_COOKIE['pasienid'];if(isset($_SESSION['pasienid'])){
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
        <h1>Frequently Asked Question</h1>
        <h2 class="">Pertanyaan yang Sering Diajukan</h2>
        <hr class="bg-primary">
        <ul style="text-align: justify;">
          <li><b>Saya telah melakukan registrasi konsultasi, kenapa saya tidak bisa registrasi dengan dokter lain?</b></li>
          <p>Setiap pasien hanya bisa melakukan satu konsultasi. Ketika Anda sudah melakukan konfirmasi konsultasi, maka akun Anda tidak dapat digunakan untuk registrasi lagi hingga waktu praktek dokter Anda berakhir.Akun Anda akan di-reset setelah waktu prakter dokter berakhir dan Anda bisa melakukan registrasi konsultasi di jadwal lain.</p>
          <li><b>Apa yang harus lakukan jika saya tidak datang saat dipanggil dann nomor antrean saya terlewati?</b></li>
          <p>Untuk saat ini, jika Anda melewatkan nomor antrean Anda -baik datang ataupun tidak- maka Anda tidak bisa registrasi lagi hingga waktu konsultasi pendaftaran Anda berakhir. Maka dari itu, kami harap Anda datang tepat waktu.</p>
          <li><b>Bisakah saya membatalkan jadwal konsultasi saya?</b></li>
          <p>Untuk saat ini, Anda tidak dapat mengubah/membatalkan jadwal konsultasi Anda.  Jika Anda tidak bisa datang maka Anda tidak perlu melakukan pembatalan. Akun Anda akan di-reset setelah waktu prakter dokter berakhir dan Anda bisa melakukan registrasi konsultasi di jadwal lain.</p>
        </ul>
        <p>Untuk informasi lebih lanjut, Anda bisa menggunakan fitur <a href="bantuan.php">Live Chat Admin</a></p>
        
        
      
       
       
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
