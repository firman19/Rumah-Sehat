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
    <?php if(isset($_COOKIE['pasienid']))
      $_SESSION['pasienid']=$_COOKIE['pasienid'];
    if(isset($_SESSION['pasienid'])){
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
        <h1>Tanya Dokter</h1>
        <?php if(!isset($_SESSION['pasienid']))
            echo '<h3 class="float-right">Untuk bertanya, silahkan <a href ="masuk.php">masuk</a> terlebih dahulu.</h3>'           
        ?>
		
        <hr class="featurette-divider">
        <div id="pertakonan">
	        <?php
	        	$sql="SELECT `pasienid`,`q`,`waktu`,`drid`,`a`,`waktudr` FROM `pertanyaan` WHERE `setuju`=1; ";
	        	$res=mysqli_query($link,$sql);
	        	if(mysqli_num_rows($res) > 0){
	        		while($row=mysqli_fetch_assoc($res)){
	        			$pasienid=$row['pasienid'];
	        			$q=$row['q'];
	        			$waktu=$row['waktu'];
                $drid=$row['drid'];
                $a=$row['a'];
                $waktudr=$row['waktudr'];
	        			$ha=mysqli_query($link,"SELECT `pasienname`,`pasienimg` FROM `pasien` WHERE `pasienid`='$pasienid';");
	        			while($baris=mysqli_fetch_assoc($ha)){
	        				$pasienname=$baris['pasienname'];
                  $pasienimg=$baris['pasienimg'];
	        			}
                $hu=mysqli_query($link,"SELECT `drname`,`drimg` FROM `dr` WHERE `drid`='$drid';");
                while($barus=mysqli_fetch_assoc($hu)){
                  $drname=$barus['drname'];
                  $drimg=base64_encode($barus['drimg']);
                }
                echo '<img src="'.$pasienimg.'" width="40px" height="40px" class="float-left rounded-circle">';
	        			?>

	        			
	        			
	        			<h2 class="text-primary">&nbsp<?php echo $pasienname; ?> </h2>
	            		<p class="text-muted"> pada <?php echo $waktu; ?></p>
	        			<div>
	            		<p align="left" class=""><?php echo $q?></p>
	            		</div>
                  <?php
                  if($drid!=0){?>
                    <div align="right">
                      <?php echo '<img  src="data:image/jpg;base64,'.$drimg.'" width="40px" height="40px" class="float-right rounded-circle" />' ?>
                      <h2 class="text-primary"><?php echo $drname; ?> &nbsp</h2>
                      <p class="text-muted"> pada <?php echo $waktudr; ?></p>
                    <div>
                    <p align="right" class=""><?php echo $a?></p>
                    </div>
                    </div>
                    <?php }?>

	            		<div>
	            		
	            		</div>
	        		
	        		<hr class="featurette-divider">
	        		<?php }
	        	}
	        ?>
    	</div>
        
       <form action="tanyadoktersql.php" method="post">
	       
	       <br>
	       <?php if(isset($_SESSION['pasienid'])){
	           echo '<textarea name="z" id="x" class="form-control" cols="100" rows="5" placeholder="Ketik pertanyaan Anda disini"></textarea>';
          
	       	$pasienid=$_SESSION['pasienid'];
	       	?>
          <input type ="checkbox" id="setuju" class="" onclick="check();" name="setuju"/> Saya telah membaca dan menyetujui <a href="syaratketentuan.php">aturan dan ketentuan</a> untuk menggunakan fitur tanya dokter. <br>
          Pertanyaan Anda akan muncul setelah disetujui oleh admin.
	       	<input type="submit" style="visibility: hidden;" id="takon" name="takon" class=" btn btn-primary float-right" value="TANYAKAN"/>
	       	
	       <?php }else{?>
	       	<h3 class="float-right">Untuk bertanya, silahkan <a href ="masuk.php">masuk</a> terlebih dahulu.</h3>
	       <?php } ?>
   		</form>
       <hr class="featurette-divider">
       
        <!-- /END THE FEATURETTES -->

      </div><!-- /.container -->



      <!-- FOOTER -->
      <footer class="container" style="bottom: 0px;">
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
    <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript">
      function check() {
    if(document.getElementById("setuju").checked ==true){
      document.getElementById("takon").style.visibility="visible";
    }else{
      document.getElementById("takon").style.visibility="hidden";
    }
}
    	$(document).ready(function(){        
        setInterval(function (){
          
          $('#pertakonan').load('tanyadokterBE.php',{
            
          });
        }, 500); 
     });
    </script>
  </body>
</html>
