<?php session_start();?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Cari Dokter | Rumah Sehat : Berobat Tanpa Antre</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="carousel.css" rel="stylesheet">
  </head>
  <body>
    <?php include('config.php'); ?>
    <?php if(isset($_COOKIE['pasienid']))        $_SESSION['pasienid']=$_COOKIE['pasienid'];
    if(isset($_SESSION['pasienid'])){
      include('header2.php');
    }else{
      echo "
  <script>
    window.location.assign('masuk.php');
  </script>"; 
      
    }?>
    <main role="main">
      <!-- Marketing messaging and featurettes
      ================================================== -->
      <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">
      <br>
      
      <div id='waktu' class="float-right" >
          <?php echo "Waktu Server: ".date("l H:i:s d-m-Y",strtotime("now"));?>
        </div>
      <h1>Konfirmasi </h1>
      <?php 
      
      ?>

      <?php if(isset($_GET['jdwid'])){
        $jdwid=$_GET['jdwid'];
      $sql ="SELECT
              `rs`.`rsname`, `dr`.`drname`, `sp`.`spname`, `b`.`hari`, `b`.`tanggal`, `b`.`wm`, `b`.`ws`
              FROM
              `b` INNER JOIN
              `a` ON `a`.`jdwcode` = `b`.`jdwcode` INNER JOIN
              `sp` ON `sp`.`spcode` = `a`.`spcode` INNER JOIN
              `dr` ON `dr`.`drid` = `a`.`drid` INNER JOIN
              `rs` ON `rs`.`rscode` = `a`.`rscode`
              WHERE
              `b`.`jdwid`='$jdwid';
              ;";
      $result = mysqli_query($link,$sql);
      while ($row=mysqli_fetch_assoc($result)) {
        $hari=$row['hari'];
        $tanggal=$row['tanggal'];
        $wm=$row['wm'];
        $ws=$row['ws'];
        $rsname=$row['rsname'];
        $drname=$row['drname'];
        $spname=$row['spname'];
      }?>
      <h2> <?php echo $rsname;?> | Spesialis <?php echo $spname;?></h2>
      <!-- Three columns of text below the carousel -->
      <div class="row">
          <div class="col-lg-4">
          </div><!-- /.col-lg-4 -->
          <div class="col-lg-4">
            <?php $foto = $drname;
            $sql ="SELECT `drimg` FROM `dr` WHERE `drname`='$foto';";
            $result=mysqli_query($link,$sql);
            while($row=mysqli_fetch_assoc($result)){
              $dbdrimg=base64_encode($row['drimg']);
              //echo '<img class="rounded-circle" src="data:image/jpg;base64,'.$dbdrimg.'" alt="Generic placeholder image" width="140" height="140">';
            }?>
            <h2><?php //echo $drname;?></h2>
          </div><!-- /.col-lg-4 -->
        </div><!-- /.row -->
      <div>
        <p>Apakah Anda yakin akan melakukan konsultasi pada
        <br>
       
        <?php $tgl = strtotime($tanggal)
        ?>
        <table class=" col-md-12 " style="font-size: 20px;">
          <tr>
            <td><?php echo "hari"?></td>
            <td>  <?php echo ": ".$hari.", ".date("d-m-Y",$tgl) ?></td>
          </tr>
          <tr>
            <td><?php echo "waktu"?></td>
            <td><?php echo ": ".$wm."-".$ws ?><br></td>
          </tr>
          <tr>
            <td><?php echo "tempat" ?></td>
            <td><?php echo ": ".$rsname ?></td>
          </tr>
          <tr>
            <td><?php echo "dengan" ?></td>
            <td><?php echo ": ".$drname.", Spesialis ".$spname."."?></td>
          </tr>


        </table>
        
        
        <br>
        <?php
        $wkwk1 = "SELECT `jdwcode` FROM `b` WHERE `jdwid` ='$jdwid';";
        $wkwk2 = mysqli_query($link,$wkwk1);
        while($wkwk3=mysqli_fetch_assoc($wkwk2)){
          $jdwcode=$wkwk3['jdwcode'];
        }
        ?>
          Anda TIDAK BISA mengubah/membatalkan perjanjian.</p>
          <p>Setelah menyetujui perjanjian ini, Anda akan mendapat nomor antrean.</p>
          <div>
            <?php echo '<button><a href="konfirmasibackend.php?jdwid='.$jdwid.'"> YA </a></button>' ?>
            </form>
            <?php echo '<button><a href="jadwaldokter.php?code='.$jdwcode.'"> KEMBALI </a></button>' ?>
          </div> 
      </div>
      <?php }else echo "Silahkan Cari Dokter Terlebih Dahulu";?>
    </div><!-- /.container -->

      <!-- FOOTER -->
      <footer class="container" style="position:relative;bottom:-10px;">
        <br><br><br>
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
     <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){        
        setInterval(function (){
          $('#waktu').load('waktu.php');
        }, 1000);
     });
    </script>
  </body>
</html>

