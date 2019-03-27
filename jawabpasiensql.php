<?php
include('config.php');
session_start();
$drid=$_SESSION['drid'];

       	if(isset($_POST['njawab'])){
       		$time = date("l H:i m-d-Y",strtotime("now"));
       		$jawaban=$_POST['jawaban'];
                     $qid = $_POST['qid'];
       		if($jawaban!=""){
       			$sql="UPDATE `pertanyaan` SET `drid`='$drid' WHERE `pertanyaan`.`id`='$qid';";
                            $res=mysqli_query($link,$sql);
                            $sql="UPDATE `pertanyaan` SET `a`='$jawaban' WHERE `pertanyaan`.`id`='$qid';";
                            $res=mysqli_query($link,$sql);
                            $sql="UPDATE `pertanyaan` SET `waktudr`='$time' WHERE `pertanyaan`.`id`='$qid';";
                            $res=mysqli_query($link,$sql);
                            echo "
       <script>
              window.location.assign('jawabpasien.php');
       </script>";   
                            
       		}
       	}
       ?>