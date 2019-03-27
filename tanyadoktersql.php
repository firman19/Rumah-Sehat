<?php
include('config.php');
session_start();
$pasienid=$_SESSION['pasienid'];
       	if(isset($_POST['takon'])){
       		$time = date("l H:i m-d-Y",strtotime("now"));
       		$pertanyaan=$_POST['z'];
       		if($pertanyaan!=""){
       			$sql="INSERT INTO `pertanyaan` (`id`, `pasienid`, `q`, `drid`, `waktu`) VALUES (NULL, '$pasienid', '$pertanyaan', '', '$time');";
       		$res=mysqli_query($link,$sql);

          }
          echo "
  <script>
    window.location.assign('tanyadokter.php');
  </script>"; 
       		
       	}
       ?>