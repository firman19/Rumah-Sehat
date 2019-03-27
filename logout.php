<?php 
//Include GP config file

// set the expiration date to one hour ago
setcookie("pasienid", "", time() - 3600,"/");


//Unset token and user data from session
if(isset($_SESSION['token'])){
	include_once 'gpConfig.php';
unset($_SESSION['token']);
unset($_SESSION['userData']);
$gClient->revokeToken();
}

//Reset OAuth access token

session_start();
session_destroy();
echo "
	<script>
		window.location.assign('index.php');
	</script>";	
?>
