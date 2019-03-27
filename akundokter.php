<?php session_start()?>
<?php include('config.php');include('header2dok.php') ;?>
    <?php if(!isset($_SESSION['drid'])){
    	echo "
	<script>
		window.location.assign('masukdokter.php');
	</script>";	
    }?>
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
      <!-- Marketing messaging and featurettes
      ================================================== -->
      <!-- Wrap the rest of the page in another container to center all the content. -->
      <div class="container marketing">
        <br>
        <?php 
          $drid = $_SESSION['drid'];
        ?>

        <div id='waktu' class="float-right" >
          <?php echo "Waktu Server: ".date("l H:i:s d-m-Y",strtotime("now"));?>
        </div>

        <h1>Jadwal Saya</h1>
        <!-- Three columns of text below the carousel -->
        <div class="row">
          <div class="col-lg-4" >
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
          </div><!-- /.col-lg-4 -->
        </div><!-- /.row -->
        <div id="periksa">
          <?php 
              $sql ="SELECT
                      `b`.`hari`, `b`.`tanggal`, `b`.`wm`, `b`.`ws`, `rs`.`rsname`, `b`.`jdwid`,`b`.`status`,`b`.`maks`
                      FROM
                      `a` INNER JOIN
                      `sp` ON `sp`.`spcode` = `a`.`spcode` INNER JOIN
                      `dr` ON `dr`.`drid` = `a`.`drid` INNER JOIN
                      `rs` ON `rs`.`rscode` = `a`.`rscode` INNER JOIN
                      `b` ON `a`.`jdwcode` = `b`.`jdwcode`
                      WHERE
                      `dr`.`drid` ='$drid';";
              $result = mysqli_query($link,$sql);
              $a = array();
              $idx = 0;?>
          <table class="col-lg-10" border="1">
            <tr>
              <td>RS</td>
              <td>HARI</td>
              <td>TANGGAL</td>
              <td>WAKTU</td>
              <td>STATUS</td>
              <td>MAKS</td>
            </tr>
            <!--start looping for doctor's schedule-->
            
              <?php while($row = mysqli_fetch_assoc($result)){
                $hari = $row['hari'];
                $tanggal = $row['tanggal'];
                $wm = $row['wm'];
                $ws = $row['ws'];
                $rsname = $row['rsname'];
                $jdwid = $row['jdwid'];
                $status = $row['status'];
                $maks = $row['maks'];
                $a[$idx]=$rsname;
                echo '<tr>';
                  if ($idx==0){
                    echo '<td>'.$rsname.'</td>';
                    echo '<td><a href="akundokterdetail.php?id='.$jdwid.'">'.$hari.'</a></td>';
                    
                  }else if ($a[$idx] == $a[$idx-1]){
                    echo '<td>'."".'</td>';
                    echo '<td><a href="akundokterdetail.php?id='.$jdwid.'">'.$hari.'</a></td>';
                    
                  }else{
                    echo '<td>'.$rsname.'</td>';
                    echo '<td><a href="akundokterdetail.php?id='.$jdwid.'">'.$hari.'</a></td>';
                  }
                    echo '<td>'.$tanggal.'</td>';
                    echo '<td>'.$wm."-".$ws.'</td>';
                    echo '<td>'.$status.'</td>';
                    echo '<td>'.$maks.'</td>';
                echo '</tr>';
                $idx++;
              }
            ?>
            <!--end looping for doctor's schedule-->          
          </table>
        </div>
      </div><!-- /.container -->
<hr class="featurette-divider">
      <!-- FOOTER -->
      <footer class="container" style="bottom: 0px">
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
          $('#waktu').load('waktu.php');
        }, 1000);
        setInterval(function (){
          $('#periksa').load('akundokterBE.php')        }, 1000);
     });
    </script>
  </body>
</html>

