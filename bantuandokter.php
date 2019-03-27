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
    <?php if(isset($_SESSION['drid'])){
      include ('header2dok.php');
    }else{
      include('header1dok.php');
    }?>
    <main role="main">
      
      <!-- Marketing messaging and featurettes
      ================================================== -->
      <!-- Wrap the rest of the page in another container to center all the content. -->

      <div class="container marketing">
        <!-- Three columns of text below the carousel -->
       
        <!-- START THE FEATURETTES -->
        <br><br>
        <h1>Bantuan</h1>
        <hr class="bg-primary">
        <div id="res" class="container-fluid">
		      <?php 
          if(isset($_SESSION['drid'])){
          $drid=$_SESSION['drid'];
          $sql="SELECT `drid`,`chat`,`admin` FROM `bantuandokter`;";
          $res = mysqli_query($link,$sql);
          if(mysqli_num_rows($res) > 0){
            while($row=mysqli_fetch_assoc($res)){
              $dr = $row['drid'];
              $chat = $row['chat'];
              $admin = $row['admin'];
              if($dr==$drid){
                echo '<div class="row">';
                echo '<div class="col-lg-5"></div>';
                echo '<div class="col-lg-7" style="text-align:right;">'.$chat.'</div>';
                echo '</div>';
                echo '<hr align="right" class="col-md-5">';
              }elseif ($admin==$drid) {
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
        
       
        
      <form action="bantuandokterBE.php" method="post">
        <div class="row">
        <div class="col-lg-5">
        </div>
        <div class="col-lg-7">
            <textarea name="chatdr" id="chat" class="form-control" cols="" rows="5"></textarea>
          </div>
	       
        </div>
	       <br>
	       <?php if(isset($_SESSION['drid'])){
	       	?>
	       	<input type="submit" name="submitchatdr" class=" btn btn-primary float-right" value="KIRIM"/>
	       <?php }else{?>
	       	<p class="float-right">Untuk bertanya, silahkan <a href ="masukdokter.php">masuk</a> terlebih dahulu.</p>
	       <?php } ?>
   		</form>
       
       
        <!-- /END THE FEATURETTES -->

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
          $('#res').load('load_bantuandokter.php',{
          });
        }, 500); 
     });
    </script>
  </body>
</html>
