<?php
include('config.php');
$now = strtotime("now");
echo "Waktu Server: ".date("l H:i:s d-m-Y",$now);
?>