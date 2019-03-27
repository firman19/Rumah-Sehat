<?php 
  session_start();
  if(!isset($_SESSION['drid'])){
    echo "
  <script>
    window.location.assign('masukdokter.php');
  </script>"; 
    
  }
  include('config.php');
  include('header2dok.php')
?>
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

    <main role="main">
      
      <div class="container marketing">
        <br>
        <div id='wkt' class="float-right" >
          <?php echo "Waktu Server: ".date("l H:i:s d-m-Y",strtotime("now"));?>
        </div>
        <?php 
          $jdwid=$_GET['id'];
          
          $sql = "SELECT
                  `b`.`hari`, `b`.`tanggal`, `b`.`wm`, `b`.`ws`, `rs`.`rsname`, `b`.`status`,
                  `b`.`maks`
                  FROM
                  `b` INNER JOIN
                  `a` ON `a`.`jdwcode` = `b`.`jdwcode` INNER JOIN
                  `rs` ON `rs`.`rscode` = `a`.`rscode`
                  WHERE `b`.`jdwid`='$jdwid';";
          $result = mysqli_query($link,$sql);
          while($row = mysqli_fetch_assoc($result)){
            $rsname = $row['rsname'];
            $hari = $row['hari'];
            $tanggal = $row['tanggal'];
            $wm = $row['wm'];
            $ws = $row['ws'];
            $status = $row['status'];
            $maks = $row['maks'];
          }
        ?>
        <h1>Jadwal Saya</h1>
        <!-- Three columns of text below the carousel -->
        <div class="row">
          <div class="col-lg-4">
            <?php
              $drid = $_SESSION['drid'];
              $sql = "SELECT drname,drimg FROM dr WHERE drid='$drid';      ";
              $res = mysqli_query($link,$sql);
              while($row=mysqli_fetch_assoc($res)){
                $drname=$row['drname'];
                $drimg=base64_encode($row['drimg']);
              }
            ?>
            <?php echo '<img class="rounded-circle" src="data:image/jpg;base64,'.$drimg.'" alt="Generic placeholder image" width="140" height="140" align="left">'; ?>
            <br><br>
            <br><br>
            <br><br>
            <h2 align="left"><?php echo $drname ?></h2>

            
          </div><!-- /.col-lg-4 -->

          <div class="col-lg-4"></div><!-- /.col-lg-4 -->

          <div class="col-lg-4" >
            <?php $curr=0; ?>
            <h3 class="float-left">NO ANTRIAN SAAT INI : </h3>
            <h3 id="antrian">
              <?php
                $sql="SELECT `antri` FROM `c` WHERE `jdwid`='$jdwid' AND `cur`=1 ;";
                $res = mysqli_query($link,$sql);
                if (mysqli_num_rows($res) > 0)
                  while($row=mysqli_fetch_assoc($res))
                    $nomor = $row['antri'];
                else
                  $nomor="0";
                echo $nomor;
            ?>
            </h3>


            <button>MULAI/SELANJUTNYA</button>
            

          </div><!-- /.col-lg-4 -->
        </div><!-- /.row -->
        
        <div id="cek">
        <h3 align="left"><?php echo $rsname." | ".$hari.", ".$tanggal." ".$wm."-".$ws ?></h3>
        <p><?php echo "Jumlah Pasien: ".$status."/".$maks ?></p>
          <?php 
            $sql ="SELECT
                  `c`.`antri`, `pasien`.`pasienname`,`pasien`.`pasienid`
                  FROM
                  `pasien` INNER JOIN
                  `c` ON `c`.`pasienid` = `pasien`.`pasienid`
                  WHERE `c`.`jdwid` ='$jdwid'
                  ORDER BY `c`.`antri`;";
            $res = mysqli_query($link,$sql);
            if(mysqli_num_rows($res) > 0){
            	echo '<table border="1" class="col-md-3">';
            	echo '<tr>';
            	 echo '<td>'."Nomor Antrian".'</td>';
            	 echo '<td>'."Nama Pasien".'</td>';
              echo '</tr>';
              while($row = mysqli_fetch_assoc($res)){
          		  $num = $row['antri'];
          		  $nama = $row['pasienname'];
                
            		echo '<tr>';
            			echo '<td>'.$num.'</td>';
            			echo '<td>'.$nama.'</td>';
                
            		echo '</tr>';
              }
          	echo '</table>';
            }else{
          	 echo "No data";
            }
          ?>
        </div>
      </div><!-- /.container -->
        <?php
          $sql ="SELECT `pasienid` FROM `c` WHERE `cur`=1 AND `jdwid`='$jdwid';";
          $res =mysqli_query($link,$sql);
          if(mysqli_num_rows($res)> 0){
              while($row=mysqli_fetch_assoc($res)){
                $pasienid=$row['pasienid'];
              }
          }else{

          }
        ?>
      <!-- FOOTER -->
      <hr class="featurette-divider">
      <footer class="container" style="position: fixed;bottom: 0px">
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
    <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){        
        setInterval(function (){
          $('#wkt').load('waktu.php');
        }, 1000);
        var jdw = "<?php echo $jdwid ?>";
        var status = "<?php echo $status ?>";
        var maks = "<?php echo $maks ?>";

        setInterval(function (){
          $('#cek').load('akundokterdetailBE.php',{
            sentJdw : jdw,
            sentStatus : status,
            sentMaks : maks 
          });
        }, 1000);
        
        var counter = parseInt("<?php echo $nomor ?>");
        //var pasienid = "<?php //echo $pasienid ?>";
        $("button").click(function(){
          counter +=1;
          $("#antrian").load("antriandok.php",{
             sentJdw : jdw,
            counterSent : counter
          });
        });

     });
    </script>
  </body>
</html>