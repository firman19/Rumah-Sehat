<?php
	$a = "localhost";
	$b = "id4021347_root2";
	$c = "wlanc4214f";
	$database = "id4021347_ssip2";
	$link = mysqli_connect($a,$b,$c);
	mysqli_select_db($link,$database);
	$visitor = 0;
	date_default_timezone_set('Asia/Jakarta');
	
	
?>