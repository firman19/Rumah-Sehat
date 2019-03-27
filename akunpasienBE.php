<?php
session_start();
include('config.php');
$pasienid=$_SESSION['pasienid'];
$sqlquery = "SELECT `jdwid` FROM `pasien` WHERE `pasienid` = '$pasienid';";
$hasil = mysqli_query($link,$sqlquery);
while($baris = mysqli_fetch_assoc($hasil)){
	$jdwid = $baris['jdwid'];
}


	if($jdwid != 0){
		$sql = "SELECT `tanggal` FROM `b` WHERE `jdwid`='$jdwid'";
		$res = mysqli_query($link,$sql);
		while($row=mysqli_fetch_assoc($res)){
			$tanggal = $row['tanggal'];
	}
	$tanggal = date("d-m-Y", strtotime($tanggal));
	$now = date("d-m-Y", strtotime("today"));
	if ($now>$tanggal){
		//$sql="UPDATE `b` SET `status`=0 WHERE `jdwid`='$jdwid';";
		//$result = mysqli_query($link,$sql);
		//$sql="DELETE FROM `c` WHERE `jdwid`='$jdwid';";
		//$result = mysqli_query($link,$sql);
		//$sql="UPDATE `pasien` SET `jdwid`=0 WHERE `pasienid`='$pasienid';";
		//$result = mysqli_query($link,$sql);
		//$sql="UPDATE `pasien` SET `antri`=0 WHERE `pasienid`='$pasienid';";
		//$result = mysqli_query($link,$sql);
	}

	$sql="SELECT `jdwid` FROM `pasien` WHERE `pasienid`='$pasienid';";
	    	$res=mysqli_query($link,$sql);
	    	while($row=mysqli_fetch_assoc($res)){
	    		$jdwid=$row['jdwid'];
	    	}
	}

if($jdwid!=0){
            $sql = "SELECT
                      `b`.`hari`, `b`.`tanggal`, `b`.`wm`, `b`.`ws`, `rs`.`rsname`, `sp`.`spname`,
                      `dr`.`drname`, `pasien`.`antri`
                      FROM
                      `b` INNER JOIN
                      `a` ON `a`.`jdwcode` = `b`.`jdwcode` INNER JOIN
                      `dr` ON `dr`.`drid` = `a`.`drid` INNER JOIN
                      `rs` ON `rs`.`rscode` = `a`.`rscode` INNER JOIN
                      `sp` ON `a`.`spcode` = `sp`.`spcode` INNER JOIN
                      `pasien` ON `pasien`.`jdwid` = `b`.`jdwid`
                      WHERE
                      `b`.`jdwid`='$jdwid' AND `pasien`.`pasienid`='$pasienid';
                      ";
            $result=mysqli_query($link,$sql);
            $row=mysqli_fetch_assoc($result);
            echo '<table class="col-md-12">';
            echo '<tr>';
              echo '<td>HARI</td>';
              echo '<td>:</td>';
              echo '<td>'.$row['hari'].'</td>';
            echo '</tr>';
            echo '<tr>';
              echo '<td>TANGGAL</td>';
              echo '<td>:</td>';
              echo '<td>'.$row['tanggal'].'</td>';
            echo '</tr>';
            echo '<tr>';
              echo '<td>WAKTU</td>';
              echo '<td>:</td>';
              echo '<td>'.$row['wm']."-".$row['ws'].'</td>';
            echo '</tr>';
            echo '<tr>';
              echo '<td>RS</td>';
              echo '<td>:</td>';
              echo '<td>'.$row['rsname'].'</td>';
            echo '</tr>';
            echo '<tr>';
              echo '<td>DOKTER</td>';
              echo '<td>:</td>';
              echo '<td>'.$row['drname'].'</td>';
            echo '</tr>';
            echo '<tr>';
              echo '<td>SPESIALIS</td>';
              echo '<td>:</td>';
              echo '<td>'.$row['spname'].'</td>';
            echo '</tr>';
            
            
            ?>
            
          </table>
<?php }else
    echo 'Anda tidak memiliki jadwal. Cobalah untuk menggunakan fitur <a href="cari.php">Cari Dokter.</a>';
?>


