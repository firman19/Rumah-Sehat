<?php
	include_once'config.php';
	if(isset($_POST['masuk'])){
		$b=$_POST['emailmasuk'];
		$c=$_POST['pwmasuk'];
		$sql = "SELECT pasienemail,pasienpw FROM pasien WHERE pasienemail='$b' AND pasienpw='$c'";
		$result = mysqli_query($link, $sql);
		if(mysqli_num_rows($result) > 0){
			while($row = mysqli_fetch_assoc($result)){
				if($b === $row['pasienemail'] && $c === $row['pasienpw']){
					echo "
	<script>
		window.location.assign('akunpasien.php');
	</script>";	
					
				}
			}
		}else{
				echo "wrong email or password";
		}
	}else
	echo "FAILED		";
?>