<?php session_start();?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>Akun Saya | Rumah Sehat : Berobat Tanpa Antre</title>
    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="carousel.css" rel="stylesheet">
  </head>
  <body>
    <?php include('config.php'); ?>
    <?php if(isset($_COOKIE['pasienid']))        $_SESSION['pasienid']=$_COOKIE['pasienid'];
    if(isset($_SESSION['pasienid'])){
      include ('header2.php');
      $pasienid=$_SESSION['pasienid'];
    }else{
      echo "
  <script>
    window.location.assign('masuk.php');
  </script>"; 
      
    }?>
    <?php
    	$sql="SELECT `jdwid` FROM `pasien` WHERE `pasienid`='$pasienid';";
    	$res=mysqli_query($link,$sql);
    	while($row=mysqli_fetch_assoc($res)){
    		$jdwid=$row['jdwid'];
    	}
    ?>
    <main role="main">
      <!-- Marketing messaging and featurettes
      ================================================== -->
      <!-- Wrap the rest of the page in another container to center all the content. -->
      <div class="container marketing">
        <br>
        <form class="form-inline mt-2 mt-md-0 float-right" action="cari.php" method="post" style="">
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

          <button class="btn btn-lg btn-info" type="submit" name="submit" role="button">Cari Dokter</button>
        </form><div id='waktu' >
          <?php echo "Waktu Server: ".date("l H:i:s d-m-Y",strtotime("now"));?>
        </div>
        <br>
        <hr>
        <h1>Jadwal Konsultasi Saya</h1>
        <!-- Three columns of text below the carousel -->
        <div class="row">
          <div class="col-lg-4">
            <?php
            $pasienid = $_SESSION['pasienid'];
            $sql = "SELECT pasienname,pasienemail,pasienimg FROM pasien WHERE pasienid='$pasienid';      ";
            $res = mysqli_query($link,$sql);
            while($row=mysqli_fetch_assoc($res)){
              $pasienname=$row['pasienname'];
              $pasienemail=$row['pasienemail'];
              $pasienimg=$row['pasienimg'];
            }
             echo '<img src="'.$pasienimg.'" width="140" height="140" class="rounded-circle" align="left">';
            ?>

            <br><br><br><br><br><br>
            <h2 align="left"><?php echo $pasienname ?></h2>
            
          </div><!-- /.col-lg-4 -->

          <div class="col-lg-4">
          </div><!-- /.col-lg-4 -->
          <?php
            $sql = "SELECT
                      `b`.`hari`, `b`.`tanggal`, `b`.`wm`, `b`.`ws`, `rs`.`rsname`, `sp`.`spname`,
                      `dr`.`drname`, `pasien`.`antri`
                      FROM
                      `b` INNER JOIN
                      `a` ON `a`.`jdwcode` = `b`.`jdwcode` INNER JOIN
                      `dr` ON `dr`.`drid` = `a`.`drid` INNER JOIN
                      `rs` ON `rs`.`rscode` = `a`.`rscode` INNER JOIN
                      `sp` ON `a`.`spcode` = `sp`.`spcode` INNER JOIN
                      `pasien` ON `pasien`.`jdwid` = `b`.`jdwid`
                      WHERE
                      `b`.`jdwid`='$jdwid' AND `pasien`.`pasienid`='$pasienid';
                      ";
            $result=mysqli_query($link,$sql);
            while($row=mysqli_fetch_assoc($result)){
              $no_antrian = $row['antri'];
            }
            if(isset($no_antrian))
            $x=$no_antrian;
          else
            $x=0;
            ?>
          <div class="col-lg-4" >
            <!-- THIS MUST BE USING AJAX-->
            <div id="wow">
            <h4 align="left">Nomor antrean saat ini : -</h4>
            <h2 align="left">Nomor antrean Anda : <?php if (isset($no_antrian))echo $no_antrian; else echo "-";?></h2>
          </div>

          </div><!-- /.col-lg-4 -->
        </div><!-- /.row -->
        <div id="cek">
        <?php if($jdwid!=0){?>

            
            <?php
            $sql = "SELECT
                      `b`.`hari`, `b`.`tanggal`, `b`.`wm`, `b`.`ws`, `rs`.`rsname`, `sp`.`spname`,
                      `dr`.`drname`, `pasien`.`antri`
                      FROM
                      `b` INNER JOIN
                      `a` ON `a`.`jdwcode` = `b`.`jdwcode` INNER JOIN
                      `dr` ON `dr`.`drid` = `a`.`drid` INNER JOIN
                      `rs` ON `rs`.`rscode` = `a`.`rscode` INNER JOIN
                      `sp` ON `a`.`spcode` = `sp`.`spcode` INNER JOIN
                      `pasien` ON `pasien`.`jdwid` = `b`.`jdwid`
                      WHERE
                      `b`.`jdwid`='$jdwid' AND `pasien`.`pasienid`='$pasienid';
                      ";
            $result=mysqli_query($link,$sql);
            $row=mysqli_fetch_assoc($result);
            echo '<table class="col-md-12">';
            echo '<tr>';
              echo '<td>HARI</td>';
              echo '<td>:</td>';
              echo '<td>'.$row['hari'].'</td>';
            echo '</tr>';
            echo '<tr>';
              echo '<td>TANGGAL</td>';
              echo '<td>:</td>';
              echo '<td>'.$row['tanggal'].'</td>';
            echo '</tr>';
            echo '<tr>';
              echo '<td>WAKTU</td>';
              echo '<td>:</td>';
              echo '<td>'.$row['wm']."-".$row['ws'].'</td>';
            echo '</tr>';
            echo '<tr>';
              echo '<td>RS</td>';
              echo '<td>:</td>';
              echo '<td>'.$row['rsname'].'</td>';
            echo '</tr>';
            echo '<tr>';
              echo '<td>DOKTER</td>';
              echo '<td>:</td>';
              echo '<td>'.$row['drname'].'</td>';
            echo '</tr>';
            echo '<tr>';
              echo '<td>SPESIALIS</td>';
              echo '<td>:</td>';
              echo '<td>'.$row['spname'].'</td>';
            echo '</tr>';
            
            
            ?>
            
          </table>
        <?php }else
          echo 'Anda tidak memiliki jadwal. Cobalah untuk menggunakan fitur <a href="cari.php">Cari Dokter</a>';
        ?>
        </div>
      </div><!-- /.container -->

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
      $(document).ready(function(){        
        setInterval(function (){
          $('#waktu').load('waktu.php');
        }, 1000);
        setInterval(function (){
          $('#cek').load('akunpasienBE.php');
        }, 500);
        var jdwid = "<?php echo $jdwid ?>";
        var x = "<?php echo $x ?>";


        setInterval(function (){
          $('#wow').load('loadantrianpasien.php',{
              jdwidSent : jdwid,
              xSent : x
          });
        }, 500);
     });
    </script>
  </body>
</html>