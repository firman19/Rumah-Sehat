<?php session_start();
include('config.php'); 
include 'gpConfig.php';
include 'User.php'; ?>
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
    <?php if(isset($_COOKIE['pasienid']))        $_SESSION['pasienid']=$_COOKIE['pasienid'];
    if(isset($_SESSION['pasienid'])){
      include ('header2.php');
    }else{
      include ('header1.php');
    }?>
    <main role="main">
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="first-slide" src="background.jpg" alt="First slide">
            <div class="container">
              <div class="carousel-caption text-left">
                <h1>Berobat Tanpa Perlu Mengantre</h1>
                <p>Buat perjanjian konsultasi seminggu sebelumnya.</p>
                <form class="form-inline mt-2 mt-md-0" action="cari.php" method="post">
                  <select name="rs" class="form-control col-lg-4">
                    <!--LOOPING HERE-->
                    <?php $sql ="SELECT rsname FROM rs";  $result = mysqli_query($link, $sql);
                      while($row = mysqli_fetch_assoc($result)){
                        $dbrsname = $row['rsname'];?>
                        <option value="<?php echo $dbrsname; ?>"> <?php echo $dbrsname; ?> </option>
                      <?php }?>
                  </select>
                  <select name="sp" class="form-control col-lg-3">
                    <!--LOOPING HERE-->
                    <?php   $sql ="SELECT spname FROM sp";  $result = mysqli_query($link, $sql);
                    while($row = mysqli_fetch_assoc($result)){
                      $dbspname = $row['spname'];?>
                      <option value="<?php echo $dbspname; ?>"> <?php echo $dbspname; ?> </option>
                    <?php }?>
                  </select>    
                  <input type="submit" name="submit" class="btn btn-lg btn-primary col-md-2"  role="button" value="Cari Dokter">
                </form>          
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <img class="second-slide" src="background1.jpg" alt="Second slide">
            <div class="container">
              <div class="carousel-caption">
                <h1>Ketahui Gejala Penyakit Anda</h1>
                <p>Pasien bertanya, dokter menjawab.</p>
                <p><a class="btn btn-lg btn-primary col-md-2" href="tanyadokter.php" role="button" >Tanya Dokter</a></p>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <img class="third-slide" src="background2.jpg" alt="Third slide">
            <div class="container">
              <div class="carousel-caption text-right">
                <h1>Kami Siap Melayani</h1>
                <p>Punya pertanyaan terkait aplikasi ini?</p>
                <p><a class="btn btn-lg btn-primary col-md-3" href="bantuan.php" role="button">Live Chat Admin</a></p>
              </div>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
      <!-- Marketing messaging and featurettes
      ================================================== -->
      <!-- Wrap the rest of the page in another container to center all the content. -->

      <div class="container marketing">
        <!-- Three columns of text below the carousel -->
        <div class="row">
          <div class="col-lg-4">
            <img class="rounded-circle" src="jer.png" width="140" height="140">
            <h2>Jericho</h2>
            <p>Web designer</p>
            <p>I believe Rumah Sehat is the best solution for our outdated hospital system.</p>
          </div><!-- /.col-lg-4 -->
          <div class="col-lg-4">
            <img class="rounded-circle" src="firman.png" alt="Generic placeholder image" width="140" height="140">
            <h2>Firman</h2>
            <p>Web programmer</p>
            <p>Rumah Sehat is a new breakthrough in hospital system that will become a trendsetter in the next few years. </p>
          </div><!-- /.col-lg-4 -->
          <div class="col-lg-4">
            <img class="rounded-circle" src="mahdi.jpg" alt="Generic placeholder image" width="140" height="140">
            <h2>Mahdi</h2>
            <p>Technical Support</p>
            <p>Saya harap website ini dapat menghilangkan antrean dan memberi kemudahan.</p>
          </div><!-- /.col-lg-4 -->
        </div><!-- /.row -->

        <!-- START THE FEATURETTES -->

        <hr class="featurette-divider">

        <div class="row featurette">
          <div class="col-md-7">
            <h2 class="featurette-heading">Rumah Sehat <span class="text-muted">| Tanya Dokter</span></h2>
              <p class="lead">Dengan Rumah Sehat, Anda tidak perlu pergi ke Rumah Sakit untuk bisa berkonsultasi. Langsung mengobrol melalui live chat.</p>
            </div>
          <div class="col-md-4">
            <img src="imgc.jpg" width="340px" height="300px">
          </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
          <div class="col-md-5 ">
            <img src="imgb.jpg" width="340px" height="310px">
          </div>
          <div class="col-md-6 ">
            <h2 class="featurette-heading">Rumah Sehat <span class="text-muted">| Pilih Rumah Sakit</span></h2>
            <p class="lead">Dengan Rumah Sehat Anda memiliki beragam pilihan Rumah Sakit yang sesuai dengan kebutuhan Anda.</p>
            
          </div>
        </div>

        <hr class="featurette-divider ">

        <div class="row featurette">
          <div class="col-md-7">
            <h2 class="featurette-heading">Rumah Sehat <span class="text-muted">| Lihat Jadwal Dokter</span></h2>
            <p class="lead">Dengan Rumah Sehat, Anda bisa memantau jadwal dokter dan memilih waktu kunjungan yang sesuai dengan waktu Anda.</p>
          </div>
          <div class="col-md-4">
            <img src="imga.jpg" width="340px" height="310px" >
          </div>
        </div>

        <hr class="featurette-divider bg-primary">

        <!-- /END THE FEATURETTES -->

      </div><!-- /.container -->


      <!-- FOOTER -->
      <footer class="container">
        <p class="float-right"><a href="#">Back to top</a></p>
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
