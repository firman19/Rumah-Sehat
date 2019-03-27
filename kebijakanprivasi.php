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
        <h1>Kebijakan Privasi</h1>
        
        <hr class="bg-primary">
        <p style="text-align: justify;">Kebijakan Privasi berikut ini menjelaskan bagaimana kami mengumpulkan, menggunakan, memindahkan, mengungkapkan dan melindungi informasi pribadi anda yang dapat diidentifikasi yang diperoleh melalui Aplikasi kami (sebagaimana didefinisikan di bawah). Mohon anda membaca Kebijakan Privasi ini dengan seksama untuk memastikan bahwa anda memahami bagaimana ketentuan Kebijakan Privasi ini kami berlakukan. Kebijakan Privasi ini disertakan sebagai bagian dari Ketentuan Penggunaan kami. Kebijakan Privasi ini mencakup hal-hal sebagai berikut:</p>
        
        <ol style="text-align: justify;">
            <li type="1">Informasi yang kami kumpulkan</li>
            <ol>
              <li type="1">Ketika Anda mendaftar, kami akan meminta nama dan email Anda.</li>
              <li type="1">Ketika Anda masuk melalui facebook atau google, kami akan meminta nama,foto dan email Anda sesuai dengan akun facebook atau google yang Anda gunakan.</li>
            </ol>
            <li type="1">Cara untuk menghubungi kami</li>
            <p>Jika Anda memiliki pertanyaan lebih lanjut tentang privasi dan keamanan informasi Anda dan ingin memperbarui atau menghapus data Anda maka silakan hubungi kami di nomor telepon: +6285293251272</p>
<p><b>President University</b><br>
  Jl. Ki Hajar Dewantara, Kota Jababeka, Cikarang Baru, Bekasi 17550 - Indonesia


            </p>
              
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
