<?php
	include("config.php");
	session_start();
	$drid = $_SESSION['drid'];
?>
<?php 
	$sql ="SELECT
		`b`.`hari`, `b`.`tanggal`, `b`.`wm`, `b`.`ws`, `rs`.`rsname`, `b`.`jdwid`,`b`.`status`,`b`.`maks`
        FROM
        `a` INNER JOIN
        `sp` ON `sp`.`spcode` = `a`.`spcode` INNER JOIN
        `dr` ON `dr`.`drid` = `a`.`drid` INNER JOIN
        `rs` ON `rs`.`rscode` = `a`.`rscode` INNER JOIN
        `b` ON `a`.`jdwcode` = `b`.`jdwcode`
        WHERE
        `dr`.`drid` ='$drid';";
	$result = mysqli_query($link,$sql);
    $a = array();
    $idx = 0;
?>
		<table class="col-lg-10" border="1">
            <tr>
              <!-- THIS MUST BE USING AJAX-->
              <td>RS</td>
              <td>HARI</td>
              <td>TANGGAL</td>
              <td>WAKTU</td>
              <td>STATUS</td>
              <td>MAKS</td>
            </tr>
            <!--start looping for doctor's schedule-->

              <?php while($row = mysqli_fetch_assoc($result)){
                $hari = $row['hari'];
                $tanggal = $row['tanggal'];
                $wm = $row['wm'];
                $ws = $row['ws'];
                $rsname = $row['rsname'];
                $jdwid = $row['jdwid'];
                $status = $row['status'];
                $maks = $row['maks'];
                $a[$idx]=$rsname;
                echo '<tr>';
                  if ($idx==0){
                    echo '<td>'.$rsname.'</td>';
                    echo '<td><a href="akundokterdetail.php?id='.$jdwid.'">'.$hari.'</a></td>';
                    
                  }else if ($a[$idx] == $a[$idx-1]){
                    echo '<td>'."".'</td>';
                    echo '<td><a href="akundokterdetail.php?id='.$jdwid.'">'.$hari.'</a></td>';
                    
                  }else{
                    echo '<td>'.$rsname.'</td>';
                    echo '<td><a href="akundokterdetail.php?id='.$jdwid.'">'.$hari.'</a></td>';
                  }
                    echo '<td>'.$tanggal.'</td>';
                    echo '<td>'.$wm."-".$ws.'</td>';
                    echo '<td>'.$status.'</td>';
                    echo '<td>'.$maks.'</td>';
                echo '</tr>';
                $idx++;
              }
            ?>
            <!--end looping for doctor's schedule-->          
          </table>