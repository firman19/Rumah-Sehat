<?php session_start();?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>Jadwal Dokter | Rumah Sehat : Berobat Tanpa Antre</title>
    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="carousel.css" rel="stylesheet">
  </head>
  <body >
    <?php include('config.php'); ?>
    <?php if(isset($_COOKIE['pasienid']))        $_SESSION['pasienid']=$_COOKIE['pasienid'];
    if(isset($_SESSION['pasienid'])){
      include('header2.php');
      
      $pasienid=$_SESSION['pasienid'];
      $statement = "SELECT `jdwid` FROM `pasien` WHERE `pasienid`='$pasienid';";
                      $st = mysqli_query($link,$statement);
                      while($wtf = mysqli_fetch_assoc($st)){
                        $foo = $wtf['jdwid'];
                      }
    }else{
      include('header1.php');
      
      $foo=0;
    }?>
    <main role="main">
      <!-- Marketing messaging and featurettes
      ================================================== -->
      <!-- Wrap the rest of the page in another container to center all the content. -->
      <div class="container marketing">
        <br>
        <form class="form-inline mt-2 mt-md-0 float-right" action="cari.php" method="post">
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
          <button class="btn btn-lg btn-info" type="submit" role="button">Cari Dokter</button>
        </form>
        <div id='waktu' >
          <?php echo "Waktu Server: ".date("l H:i:s d-m-Y",strtotime("now"));?>
        </div>
        <br>
        <hr>
        <h1>Jadwal Dokter</h1>
      <?php if(isset($_GET['jcode'])){
        //include('config.php');
        $GLOBALS['jcode']=$_GET['jcode'];
        //echo $code;
        $sql="SELECT
          `rs`.`rsname`, `dr`.`drname`, `sp`.`spname`
        FROM
          `b` INNER JOIN
          `a` ON `a`.`jdwcode` = `b`.`jdwcode` INNER JOIN
          `sp` ON `sp`.`spcode` = `a`.`spcode` INNER JOIN
          `dr` ON `dr`.`drid` = `a`.`drid` INNER JOIN
          `rs` ON `rs`.`rscode` = `a`.`rscode`
        WHERE
          `a`.`jdwcode`='$jcode';
         ";
         $result = mysqli_query($link,$sql);
         while($row = mysqli_fetch_assoc($result)){
          $drname = $row['drname'];
          $rsname = $row['rsname'];
          $spname = $row['spname'];

         }
     }
      ?>
  
      <?php if(isset($_GET['jcode'])){?>
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
	              echo '<img class="rounded-circle" src="data:image/jpg;base64,'.$dbdrimg.'" alt="Generic placeholder image" width="140" height="140">';
	            }?>
            	<h2><?php echo $drname;?></h2>
          	</div><!-- /.col-lg-4 -->
        </div><!-- /.row -->
        <div id="load_updates">
         	<table class="col-lg-8" border="1">
	            <tr>
	              <td>HARI</td>
	              <td>TANGGAL</td>
	              <td>WAKTU</td>
	              <td>STATUS</td>
	            </tr>
	            <!--start looping for doctor's schedule-->
	            <?php //THIS MUST BE USING AJAX // done
	            $sql="SELECT
	                  `b`.`hari`, `b`.`tanggal`,`b`.`wm`, `b`.`ws`,`b`.`status`,`b`.`jdwid`,`b`.`maks`
	                  FROM
	                  `a` INNER JOIN
	                  `dr` ON `a`.`drid` = `dr`.`drid` INNER JOIN
	                  `sp` ON `a`.`spcode` = `sp`.`spcode` INNER JOIN
	                  `rs` ON `a`.`rscode` = `rs`.`rscode`INNER JOIN
	                  `b` ON `a`.`jdwcode` = `b`.`jdwcode`
	                  WHERE
	                  `sp`.`spname` = '$spname' AND `rs`.`rsname`='$rsname' AND `dr`.`drname`='$drname';";
	            $result=mysqli_query($link,$sql);
	            if (mysqli_num_rows($result) > 0){
	              while($row=mysqli_fetch_assoc($result)){
	                $dbhari = $row['hari'];
	                $dbtanggal = $row['tanggal'];
	                $dbwm = $row['wm'];
	                $dbws = $row['ws'];
	                $dbstatus = $row['status'];
	                $jdwid = $row['jdwid'];
	                $dbmaks=$row['maks'];
	                $d=strtotime($dbtanggal);
	                $ws = strtotime($dbws);
	                $a = date("d-m-Y",$d);
	                $b =date("H:i",$ws);
	                $c = $b." ".$a;
	                $e = date("d-m-Y H:i",strtotime($c));
	                $validmenit = date("H:i",strtotime("-30 minutes",strtotime($dbws)));
	                $validtanggal = $a;
	                $validstring = $validmenit." ".$validtanggal;
	                
	                $valid = date("d-m-Y H:i",strtotime($validstring));
	                $now = date("d-m-Y H:i",strtotime("now"));
	                
	                echo '<tr>';
	                  echo '<td>'.$dbhari.'</td>';
	                  echo '<td>'.date("d-m-Y",$d).'</td>';
	                  echo '<td>'.$dbwm."-".$dbws.'</td>';
	                  if($dbstatus == $dbmaks && $dbmaks != 0){
	                  	echo '<td>'."Penuh".'</a></td>';
	                  }elseif ($now > $valid){
	                  	echo '<td>'."Pendaftaran Telah Ditutup".'</td>';
	                  }else{
                      
                      if ($foo==0)
                        echo '<td><a href="konfirmasi.php?jdwid='.$jdwid.'">'."Tersedia".'</a></td>';
                      else
                        echo '<td>'."Tersedia".'</td>';
	                  }
	                echo '</tr>';
	              }
	            }?>
	            <!--end looping for doctor's schedule-->
          	</table>
        </div>
    	<?php }else echo "Silahkan Cari Dokter Terlebih Dahulu";?>
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
          var jcode = "<?php echo $jcode ?>";
          $('#load_updates').load('jadwaldokterBE.php',{
            sentCode : jcode
          });
        }, 500); 
        setInterval(function (){
        	
          $('#waktu').load('waktu.php');
        }, 1000);
     });
    </script>
  </body>
</html>
