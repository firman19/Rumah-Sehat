<?php
include('config.php');
if(isset($_POST['submitchatadmdr'])){
	$drtanya = $_POST['chatadmdr'];
	$drid = $_POST['drid123'];
	$sql="INSERT INTO `bantuandokter` (`id`, `drid`, `chat`,`admin` ) VALUES (NULL, '0', '$drtanya','$drid');";
	$res=mysqli_query($link,$sql);
	echo "
	<script>
		window.location.assign('bantuanadmindok.php');
	</script>";	
}
?>