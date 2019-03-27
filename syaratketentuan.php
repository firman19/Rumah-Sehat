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
        <h1>Ketentuan Penggunaan</h1>
        
        <hr class="bg-primary">
        <h2>Ketentuan Penggunaan Fitur Situs Web</h2>
        <p style="text-align: justify;">Dengan menggunakan Situs Web Rumah Sehat ("Situs web"), Anda setuju bahwa Anda telah membaca, memahami dan menerima dan menyetujui Ketentuan Penggunaan ini ("Ketentuan Penggunaan"). Ketentuan Penggunaan ini merupakan suatu perjanjian sah antara Anda dan Tim Developer dan Layanan dan Aplikasi (sebagaimana didefinisikan di bawah ini) berlaku pada kunjungan dan penggunaan Anda pada situs web kami di www.rumahsehat.*** ("Situs web").</p>
        <p style="text-align: justify;">Silahkan membatalkan akun Anda (jika Anda telah mendaftar untuk Situs Web) jika Anda tidak setuju atau tidak ingin masuk ke dalam Ketentuan Penggunaan.</p>
        <p style="text-align: justify;">MOHON ANDA MEMERIKSA KETENTUAN PENGGUNAAN DAN KEBIJAKAN PRIVASI KAMI DENGAN SEKSAMA SEBELUM MENGGUNAKAN LAYANAN KAMI UNTUK PERTAMA KALI.</p>
        <ol style="text-align: justify;">
            <li type="1">Tanya Dokter</li>
            <ol>
              <li type="1">Fitur Tanya Dokter ("fitur ini") adalah fitur yang bisa digunakan oleh pasien untuk bertanya/berkonsultasi tentang kesehatan secara singkat kepada dokter.</li>

              <li type="1">Fitur ini ditujukan untuk masalah kesehatan pada umumnya.</li>
              <li>Untuk kenyamanan bersama, gunakanlah Bahasa Indonesia yang sopan dan sesuai dengan EYD.</li>
              <li> Fitur ini kami buat publik agar pasien lain bisa melihat pertanyaan Anda dengan tujuan agar masalah kesehatan umum dapat diketahui oleh umum.</li>
              <li>Jika Anda menginginkan untuk berkonsultasi secara pribadi, silahkan kunjungi dokter secara langsung dengan menggunakan fitur Cari Dokter.</li>
              <li>Admin berhak menghapus pertanyaan Anda dan/atau menghapus akun Anda jika Anda melanggar aturan, dan/atau tidak sesuai dengan masalah kesehatan.</li>
            </ol>
            <li type="1">Live Chat Admin</li>
            <ol>
              <li type="1">Fitus Live Chat Admin ("fitur ini") mengizinkan Anda untuk bertanya secara langsung tentang penggunaan Situs Web kepada Admin.</li>
              <li>Untuk kenyamanan bersama, gunakanlah Bahasa Indonesia yang sopan dan sesuai dengan EYD.</li>
              <li>Admin berhak menghapus akun Anda jika Anda melanggar aturan.</li>
            </ol>
        </ol>
        




          
          


       
        
      
       
       
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
