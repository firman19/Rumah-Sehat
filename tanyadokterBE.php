
	        <?php
	        include('config.php');
	        	$sql="SELECT `pasienid`,`q`,`waktu`,`drid`,`a`,`waktudr` FROM `pertanyaan` WHERE `setuju` = 1; ";
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