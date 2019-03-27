<?php
session_start();
	include('config.php');
	$jdwid= $_GET['jdwid'];
	$pasienid=$_SESSION['pasienid'];
	$antresql ="SELECT COUNT(`jdwid`) as jumlah FROM `c` WHERE `jdwid`='$jdwid';";
	$antrehasil = mysqli_query($link,$antresql);
	while($row=mysqli_fetch_assoc($antrehasil)){
		$jmlpasien= $row['jumlah'];
	}
	$nomorantre=$jmlpasien+1;

	$sql3="INSERT INTO `c` (`jdwid`, `antri`, `pasienid`, `id`) VALUES ('$jdwid', '$nomorantre', '$pasienid', NULL);";
	$result3=mysqli_query($link,$sql3);

	$sql = "UPDATE `pasien` SET `jdwid` = '$jdwid' WHERE `pasienid` = '$pasienid';";
	$result = mysqli_query($link,$sql);
	$sql4 = "UPDATE `pasien` SET `antri` = '$nomorantre' WHERE `pasienid` = '$pasienid';";
	$result4 = mysqli_query($link,$sql4);
	$sql2 = "UPDATE `b` SET `status` = `status`+1 WHERE `jdwid` = '$jdwid';";
	$result2 = mysqli_query($link,$sql2);
	
	if ($result and $result2 and $result3){
		echo "
	<script>
		window.location.assign('akunpasien.php');
	</script>";	
		
		

	}else
		echo "0";
?>