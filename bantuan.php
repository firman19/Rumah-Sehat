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
        <h1>Live Chat Admin</h1>
        <hr class="bg-primary">
        <div id="res" class="container-fluid">
		      <?php 
          if(isset($_SESSION['pasienid'])){
          $pasienid=$_SESSION['pasienid'];
          $sql="SELECT `pasienid`,`chat`,`admin` FROM `bantuan`;";
          $res = mysqli_query($link,$sql);
          if(mysqli_num_rows($res) > 0){
            while($row=mysqli_fetch_assoc($res)){
              $pasien = $row['pasienid'];
              $chat = $row['chat'];
              $admin = $row['admin'];
              if($pasien==$pasienid){
                echo '<div class="row">';
                echo '<div class="col-lg-5"></div>';
                echo '<div class="col-lg-7" style="text-align:right;">'.$chat.'</div>';
                echo '</div>';
                echo '<hr align="right" class="col-md-5">';
              }elseif ($admin==$pasienid) {
                echo '<div class="row">';
                echo '<div class="col-lg-5"></div>';
                echo '<div class="col-lg-5"></div>';
                echo '<div class="col-lg-5" style="text-align:jusify;">'.$chat.' </div>';
                echo '</div>';
                echo '<hr align="left" class="col-md-5">';
              }
            }
            }
          }
            ?>
      </div>
        
       
        
      <form action="bantuanBE.php" method="post">
        <div class="row">
        <div class="col-lg-5">
        </div>
        <div class="col-lg-7">
            
          </div>
	       
        </div>
	       <br>

	       <?php if(isset($_SESSION['pasienid'])){
	       	?>
	       	<textarea name="chat" id="chat" class="form-control" cols="" rows="5" placeholder="Ketik pertanyaan Anda disini"></textarea>
          <p style="text-align: right;">Pastikan Anda telah membaca <a href="syaratketentuan.php"> ketentuan penggunaan</a> fitur Live Chat Admin</p>
	       	<input type="submit" name="submitchat" class=" btn btn-primary float-right" value="KIRIM"/>
	       <?php }else{?>

	       	<h3 class="float-right">Untuk bertanya, silahkan <a href ="masuk.php">masuk</a> terlebih dahulu.</h3>
	       <?php } ?>
   		</form>
       
       
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
    	$(document).ready(function(){        
        setInterval(function (){
          $('#res').load('load_bantuan.php',{
          });
        }, 500); 
     });
    </script>
  </body>
</html>
