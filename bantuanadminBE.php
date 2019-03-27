<?php
include('config.php');
if(isset($_POST['submitchatadm'])){
	$pasientanya = $_POST['chatadm'];
	$pasienid = $_POST['pasienid123'];
	if ($pasientanya!=""){
	$sql="INSERT INTO `bantuan` (`id`, `pasienid`, `chat`,`admin` ) VALUES (NULL, '0', '$pasientanya','$pasienid');";
	$res=mysqli_query($link,$sql);
	}
	echo "
	<script>
		window.location.assign('bantuanadmin.php');
	</script>";	
	
}
?>