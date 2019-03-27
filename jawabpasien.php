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
        <h1>JAWAB PASIEN</h1>
		
        <hr class="featurette-divider">
        <div id="pertakonan">
	        <?php
	        	$sql="SELECT `id`,`pasienid`,`q`,`drid`,`a`,`waktu`,`waktudr` FROM `pertanyaan` WHERE `setuju`= 1; ";
	        	$res=mysqli_query($link,$sql);
	        	if(mysqli_num_rows($res) > 0){
	        		while($row=mysqli_fetch_assoc($res)){
                $qid=$row['id'];
	        			$pasienid=$row['pasienid'];
	        			$q=$row['q'];
	        			$waktu=$row['waktu'];
                $drid=$row['drid'];
                $a=$row['a'];
                $waktudr=$row['waktudr'];
	        			$ha=mysqli_query($link,"SELECT `pasienname`,`pasienimg` FROM `pasien` WHERE `pasienid`='$pasienid';");
	        			while($baris=mysqli_fetch_assoc($ha)){
	        				$pasienname=$baris['pasienname'];
                  $pasienimg = $baris['pasienimg'];
	        			}
                $hu=mysqli_query($link,"SELECT `drname`,`drimg` FROM `dr` WHERE `drid`='$drid';");
                while($barus=mysqli_fetch_assoc($hu)){
                  $drname=$barus['drname'];
                  $drimg=base64_encode($barus['drimg']);
                }
                echo '<img src="'.$pasienimg.'" width="40px" height="40px" class="float-left rounded-circle">';
	        			?>
	        			
	        			
	        			<h2 class="text-primary">&nbsp<?php echo $pasienname;?> </h2>
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
                    <?php }else{?>
                                        <div>
                    <form action="jawabpasiensql.php" method="post">
                      <input type="text" style="visibility: hidden;" name="qid" value="<?php echo $qid; ?>"></div>
                      <textarea name="jawaban" class="form-control" cols="100" rows="5" placeholder="Ketik jawaban Anda disini"></textarea>
                      <br>
                      <?php if(isset($_SESSION['drid'])){
                        $drid=$_SESSION['drid'];
                      ?>

                      <input type="submit" name="njawab" class=" btn btn-primary float-right" value="JAWAB"/>
                      <?php }else{?>
                      <p class="float-right">Untuk menjawab, silahkan <a href ="masukdokter.php">masuk</a> terlebih dahulu.</p>
                      <?php } ?>
                    </form>
                  </div>
                    <?php } ?>
                  

	        		
	        		<hr class="featurette-divider">
	        		<?php }
	        	}
	        ?>
    	</div>
        
       
       
       
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

    </script>
  </body>
</html>
