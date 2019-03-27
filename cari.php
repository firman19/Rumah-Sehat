<?php 

session_start();?>
<?php include('config.php'); 
      if(isset($_COOKIE['pasienid']))
        $_SESSION['pasienid']=$_COOKIE['pasienid'];
      if(isset($_SESSION['pasienid'])){
        include('header2.php');
      }else{
        include('header1.php');

      }
      header('Cache-Control: no cache'); //no cache
session_cache_limiter('private_no_expire'); // works?>
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

          <button class="btn btn-lg btn-info" type="submit" name="submit" role="button">Cari Dokter</button>
        </form>
        <div id='waktu' >
          <?php echo "Waktu Server: ".date("l H:i:s d-m-Y",strtotime("now"));?>
        </div>
        <br>
        <hr class="">

        <?php if(isset($_POST['rs'])&&isset($_POST['sp'])){?>
          <h1>Hasil Pencarian</h1>
          <h2><?php echo $_POST['rs']." | Spesialis ".$_POST['sp'];?></h2>
        <?php }else{ 
          echo '<h1>Hasil Pencarian</h1>';
          echo "Silahkan Pilih RS dan Spesialis";}?>
          <br>
        <!-- Three columns of text below the carousel -->
        <!-- SQL for search -->
        <?php 
        if(isset($_POST['rs'])&&isset($_POST['sp'])){
          $x=$_POST['rs'];
          $y=$_POST['sp'];
          $sql1="SELECT 
                  `a`.`jdwcode`, `dr`.`drimg`, `sp`.`spname`, `rs`.`rsname`, `dr`.`drname`,`b`.`hari`, `b`.`tanggal`,`b`.`wm`, `b`.`ws`
                  FROM
                  `a` INNER JOIN
                  `dr` ON `a`.`drid` = `dr`.`drid` INNER JOIN
                  `sp` ON `a`.`spcode` = `sp`.`spcode` INNER JOIN
                  `rs` ON `a`.`rscode` = `rs`.`rscode`INNER JOIN
                  `b` ON `a`.`jdwcode` = `b`.`jdwcode`
                  WHERE
                  `rs`.`rsname` = '$x' AND `sp`.`spname` ='$y'";
          $result = mysqli_query($link,$sql1);
          $arrayrs = array();
          $arraydr = array();
          $arraysp = array();
          if(mysqli_num_rows($result) > 0){
            ?><table border="0" class="col-md-6" style="text-align: right; margin:5px;"><?php
            $a=0;
            while($row = mysqli_fetch_assoc($result)){
              $code = $row['jdwcode'];
              $dbrsname = $row['rsname'];
              $dbspname = $row['spname'];
              $dbdrname = $row['drname'];
              $dbhari = $row['hari'];
              $dbwm = $row['wm'];
              $dbws = $row['ws'];
              $dbdrimg = base64_encode($row['drimg']);
              $arrayrs[$a]=$dbrsname;
              $arraydr[$a]=$dbdrname;
              $arraysp[$a]=$dbspname;
              echo '<tr>';
              if ($a==0){
                echo '<td><a href="jadwaldokter.php?jcode='.$code.'">'.$dbdrname.'</a></td>';
                echo '<td>'.$dbhari.'</td>';
                echo '<td style="text-align: left;">'.$dbwm."-".$dbws.'</td>';
              }else if($arraydr[$a]==$arraydr[$a-1]){
                echo '<td>'."".'</td>';
                echo '<td>'.$dbhari.'</td>';
                echo '<td style="text-align: left;">'.$dbwm."-".$dbws.'</td>';
              }else{
                echo '<td><a href="jadwaldokter.php?jcode='.$code.'">'.$dbdrname.'</a></td>';
                echo '<td>'.$dbhari.'</td>';
                echo '<td style="text-align: left;">'.$dbwm."-".$dbws.'</td>';
              }
              echo '</tr>';
              $a++;
            }
          ?></table><?php
          }else{
    	     echo "Data tidak tersedia";
          } 
        }?>
      </div><!-- /.container -->
      <!-- FOOTER -->
   <div class="row"  >
    <div class="col-md-4">
    </div>
    <div class="col-md-4">
    </div>
    <div class="col-md-4">
    </div>
   </div>
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
