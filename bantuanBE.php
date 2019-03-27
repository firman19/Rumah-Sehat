<?php
session_start();
include('config.php');
if(isset($_POST['submitchat'])){
	$pasienid = $_SESSION['pasienid'];
	$pasientanya = $_POST['chat'];
	if($pasientanya!=""){
	$sql="INSERT INTO `bantuan` (`id`, `pasienid`, `chat`,`admin`) VALUES (NULL, '$pasienid', '$pasientanya','0');";
	$res=mysqli_query($link,$sql);}
	echo "
	<script>
		window.location.assign('bantuan.php');
	</script>";	
	

}
?>