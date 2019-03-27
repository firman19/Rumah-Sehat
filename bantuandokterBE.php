<?php
session_start();
include('config.php');
if(isset($_POST['submitchatdr'])){
	$drid = $_SESSION['drid'];
	$drtanya = $_POST['chatdr'];

	$sql="INSERT INTO `bantuandokter` (`id`, `drid`, `chat`,`admin`) VALUES (NULL, '$drid', '$drtanya','0');";
	$res=mysqli_query($link,$sql);
	echo "
	<script>
		window.location.assign('bantuandokter.php');
	</script>";	
	

}
?>