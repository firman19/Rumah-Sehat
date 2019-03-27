<?php
session_start();
?>
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
    <main role="main">
      
      <!-- Marketing messaging and featurettes
      ================================================== -->
      <!-- Wrap the rest of the page in another container to center all the content. -->

      <div class="container marketing">
        <!-- Three columns of text below the carousel -->
       
        <!-- START THE FEATURETTES -->
        <br><br>
        <?php 
        if(isset($_GET['inputdrid']))
        $_SESSION['inputdrid']=$_GET['inputdrid'];
        $drid=$_SESSION['inputdrid'];
        
        ?>
        <h1>Bantuan | <?php echo "DokterID: ".$drid?></h1>
        <hr class="bg-primary">
        <div id="cekupdate" style="">
		    <?php 
        $sql="SELECT `drid`,`chat`,`admin` FROM `bantuandokter`;";
        $res = mysqli_query($link,$sql);
        if(mysqli_num_rows($res) > 0){
          while($row=mysqli_fetch_assoc($res)){
            $dr = $row['drid'];
            $chat = $row['chat'];
            $admin=$row['admin'];
            if($dr==$drid){
              echo '<div class="row">';
              echo '<div class="col-lg-5"></div>';
              echo '<div class="col-lg-5"></div>';
              echo '<div class="col-lg-5" style="text-align:jusify;">'.$chat.' </div>';
              echo '</div>';
              echo '<hr align="left" class="col-md-5">';
            }elseif ($admin==$drid) {
              echo '<div class="row">';
              echo '<div class="col-lg-5"></div>';
              echo '<div class="col-lg-7" style="text-align:right;">'.$chat.'</div>';
              echo '</div>';
              echo '<hr align="right" class="col-md-5">';
            }
          }          
        }
        ?>
      </div>
        
       
         
       <form action="bantuanadmindokBE.php" method="post">
        <input type="text" name="drid123" value="<?php echo $drid; ?>" style="visibility:hidden;"/>
        <div class="row">
          <div class="col-lg-5">
          </div>
          <div class="col-lg-7">
            <textarea name="chatadmdr" id="chat" class="form-control" cols="" rows="5"></textarea>
          </div>
	       
        </div>
	       <br>
	       	<input type="submit" name="submitchatadmdr" class=" btn btn-primary float-right" value="KIRIM"/>
	       
   		</form>
       <hr class="featurette-divider">
       
        <!-- /END THE FEATURETTES -->

      </div><!-- /.container -->


      <!-- FOOTER -->
      <footer class="container">
        <p class="float-right"><a href="#">Back to top</a></p>
        <p>&copy; 2017 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
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
          
          $('#cekupdate').load('load_bantuanadmindok.php',{
            
          });
        }, 500); 
     });
    </script>
  </body>
</html>
