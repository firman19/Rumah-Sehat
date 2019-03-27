<?php
session_start();
include('config.php');
$jdwid = $_POST['jdwidSent'];
$nomorantrianpasien = $_POST['xSent'];
$pasienid = $_SESSION['pasienid'];

$sql="SELECT `antri` FROM `c` WHERE `jdwid`='$jdwid' AND `cur`=1 ;";
$res = mysqli_query($link,$sql);
if (mysqli_num_rows($res) > 0)
	while($row=mysqli_fetch_assoc($res))
		$nomor = $row['antri'];
else
	$nomor="-";
$sql99 = "SELECT `jdwid` FROM `c` WHERE `pasienid`='$pasienid' AND `antri`='$nomorantrianpasien';";
$res99 = mysqli_query($link,$sql99);

if (mysqli_num_rows($res99) == 0){
	$sql ="UPDATE `pasien` SET `jdwid`=0 WHERE `pasienid` = '$pasienid';";
	$res = mysqli_query($link,$sql);
	$sql ="UPDATE `pasien` SET `antri`=0 WHERE `pasienid` = '$pasienid';";
	$res = mysqli_query($link,$sql);
	echo '<h4 align="left">'."Nomor antrean saat ini : "."-".'</h4>';
	echo '<h2 align="left">'."Nomor antrean Anda : "."-".'</h2>';
}else{
		$sql2 = "SELECT `antri` FROM `pasien` WHERE `pasienid`='$pasienid';";
		$res2 = mysqli_query($link,$sql2);
		while($row2=mysqli_fetch_assoc($res2)){
			$xyz = $row2['antri'];
		}
		if($xyz==0){
			$xyz="-";
		}
		echo '<h4 align="left">'."Nomor antrean saat ini : ".$nomor.'</h4>';
		echo '<h2 align="left">'."Nomor antrean Anda : ".$xyz.'</h2>';
		if($xyz!=1){
			if($nomor == $xyz-1){
				echo '<h4 align="left">'."Nomor antrean Anda akan segera dipanggil. Harap mempersiapkan diri.".'</h4>';
			}elseif ($nomor==$xyz) {
				echo '<h4 align="left">'."Nomor antrean Anda telah dipanggil. Silahkan menemui dokter / asistennya".'</h4>';
			}elseif($nomor > $xyz){
				echo '<h4 align="left">'."Nomor antrean Anda telah terlewati. Silahkan menunggu hingga waktu praktek berakhir".'</h4>';
			}
		}


}

?>
