<?php
include('config.php');
$jdwid = $_POST['sentJdw'];
$antrian = $_POST['counterSent'];
//$pasienid = $_POST['pasienidSent'];
//echo $pasienid;
$abc="SELECT COUNT('jdwid') as `jml` FROM `c` WHERE `jdwid`='$jdwid';";
$def=mysqli_query($link,$abc);
while($baris=mysqli_fetch_assoc($def)){
	$jumlahpasien = $baris['jml'];
}
if($jumlahpasien!=0 AND $antrian > $jumlahpasien){
	$res=mysqli_query($link,"DELETE FROM `c` WHERE `jdwid`='$jdwid';");
	$res=mysqli_query($link,"UPDATE `b` SET `status`=0 WHERE `jdwid`='$jdwid';");
}
if($antrian > $jumlahpasien){
		echo '<h3>'."-".'</h3>';
			$satu="SELECT `tanggal` FROM `b` WHERE `jdwid`='$jdwid';";
			$dua=mysqli_query($link,$satu);
			while($tiga=mysqli_fetch_assoc($dua)){
					$tanggal = $tiga['tanggal'];
				}
			//echo $tanggal;

			$ope=strtotime("+1 week",strtotime($tanggal));
			//echo $ope;
			$newtanggal =date("Y-m-d",$ope);
			//echo $newtanggal;
		$haha=mysqli_query($link,"UPDATE `b` SET `tanggal` = '$newtanggal' WHERE `jdwid` = '$jdwid';");

}else{
	echo '<h3>'.$antrian.'</h3>';
		$sql="UPDATE `c` SET `cur`=0 WHERE `jdwid`='$jdwid' ;";
		$res = mysqli_query($link,$sql);
		$sql="UPDATE `c` SET `cur`=1 WHERE `antri`='$antrian';";
		$res = mysqli_query($link,$sql);
}



?>