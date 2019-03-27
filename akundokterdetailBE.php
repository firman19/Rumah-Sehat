<?php 
          include('config.php');
          $jdwid=$_POST['sentJdw'];
          $status=$_POST['sentStatus'];
          $maks=$_POST['sentMaks'];

$string ="SELECT
  `rs`.`rsname`, `b`.`hari`, `b`.`tanggal`, `b`.`ws`, `b`.`wm`
FROM
  `b` INNER JOIN
  `a` ON `a`.`jdwcode` = `b`.`jdwcode` INNER JOIN
  `rs` ON `rs`.`rscode` = `a`.`rscode`
  WHERE `jdwid`='$jdwid';";
$proses=mysqli_query($link,$string);
while($fresh=mysqli_fetch_assoc($proses)){
  $rsname=$fresh['rsname'];
  $hari = $fresh['hari'];
  $tanggal = $fresh['tanggal'];
  $wm=$fresh['wm'];
  $ws=$fresh['ws'];
}

echo '<h3 align="left">'.$rsname." | ".$hari.", ".$tanggal." ".$wm."-".$ws.'</h3>';

          echo '<p>'."Jumlah Pasien: ".$status."/".$maks.'</p>';
          $sql ="SELECT
                `c`.`antri`, `pasien`.`pasienname`
                FROM
                `pasien` INNER JOIN
                `c` ON `c`.`pasienid` = `pasien`.`pasienid`
                WHERE `c`.`jdwid` ='$jdwid'
                ORDER BY `c`.`antri`;";
          $res = mysqli_query($link,$sql);
          if(mysqli_num_rows($res) > 0){
          	echo '<table border="1" class="col-md-3">';
          	echo '<tr>';
          	 echo '<td>'."Nomor Antrian".'</td>';
          	 echo '<td>'."Nama Pasien".'</td>';
            echo '</tr>';
            while($row = mysqli_fetch_assoc($res)){
        		  $num = $row['antri'];
        		  $nama = $row['pasienname'];
          		echo '<tr>';
          			echo '<td>'.$num.'</td>';
          			echo '<td>'.$nama.'</td>';
          		echo '</tr>';
            }
        	echo '</table>';
          }else{
        	 echo "No data";
          }
        ?>