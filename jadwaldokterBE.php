<?php
include('config.php');
session_start();
if (isset($_SESSION['pasienid'])){
$pasienid=$_SESSION['pasienid'];	
$statement = "SELECT `jdwid` FROM `pasien` WHERE `pasienid`='$pasienid';";
                      $st = mysqli_query($link,$statement);
                      while($wtf = mysqli_fetch_assoc($st)){
                        $foo = $wtf['jdwid'];
                      }
}else $foo=0;

	
	$code = $_POST['sentCode'];
	$sql="SELECT
	  		`rs`.`rsname`, `dr`.`drname`, `sp`.`spname`
			FROM
		  	`b` INNER JOIN
		  	`a` ON `a`.`jdwcode` = `b`.`jdwcode` INNER JOIN
		  	`sp` ON `sp`.`spcode` = `a`.`spcode` INNER JOIN
		  	`dr` ON `dr`.`drid` = `a`.`drid` INNER JOIN
		  	`rs` ON `rs`.`rscode` = `a`.`rscode`
			WHERE
			`a`.`jdwcode`='$code';
		 ";
	 $result = mysqli_query($link,$sql);
	 while($row = mysqli_fetch_assoc($result)){
	 	$drname = $row['drname'];
		$rsname = $row['rsname'];
		$spname = $row['spname'];
	 }
?>

		<table class="col-lg-8" border="1" >
	            <tr>
	              <td>HARI</td>
	              <td>TANGGAL</td>
	              <td>WAKTU</td>
	              <td>STATUS</td>
	            </tr>
	            <!--start looping for doctor's schedule-->
	            <?php //THIS MUST BE USING AJAX
	            
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
	                $th2 = date("Y",$d);
	                //$b =date("H:i",$ws);
	                //$c = $b." ".$a;
	                //$e = date("d-m-Y H:i",strtotime($c));
	                $validmenit = date("H:i",strtotime("-30 minutes",strtotime($dbws)));
	                //$validtanggal = $a;
	                $validstring = $validmenit." ".$a;
	                $nowtahun = date("Y",strtotime("now"));
	                $valid = date("Y-m-d H:i",strtotime($validstring));
	                $now = date("Y-m-d H:i",strtotime("now"));
	                $th1 = date("Y",strtotime("now"));
	                echo '<tr>';
	                  echo '<td>'.$dbhari.'</td>';
	                  echo '<td>'.date("d-m-Y",$d).'</td>';
	                  echo '<td>'.$dbwm."-".$dbws.'</td>';
	                  if($dbstatus == $dbmaks && $dbmaks != 0){
	                  	echo '<td>'."Penuh".'</a></td>';
	                  }elseif ($now > $valid){
	                  		echo '<td>'."Pendaftaran ditutup".'</td>';
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