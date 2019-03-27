<?php
session_start();
include('config.php');
$pasienemail =$_GET['pasienemail'];
$sql = "SELECT `pasienid` FROM `pasien` WHERE `pasienemail`='$pasienemail';";
$res = mysqli_query($link,$sql);
while($row=mysqli_fetch_assoc($res)){
	$pasienid=$row['pasienid'];
	$_SESSION['pasienid'] = $row['pasienid'];
}
echo "Berhasil.";
echo "
	<script>
		window.location.assign('masuk.php');
	</script>";	
	
?>