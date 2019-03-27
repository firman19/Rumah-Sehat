<?php
	include('config.php');
	if(isset($_POST['daftar'])){
		$a=$_POST['namedaftar'];
		$b=$_POST['emaildaftar'];
		$c=$_POST['pwdaftar'];
		$sql = "INSERT INTO pasien VALUES('DEFAULT', '$a', '$b', '$c');";
		$result = mysqli_query($link, $sql);
		echo "
	<script>
		window.location.assign('index.php');
	</script>";	
		
	}else{
		echo "FAILED";
	}
?>