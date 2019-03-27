<?php 
session_start();
include('config.php');
if(isset($_SESSION['drid'])){
$drid=$_SESSION['drid'];
        $sql="SELECT `drid`,`chat`,`admin` FROM `bantuandokter`;";
          $res = mysqli_query($link,$sql);
          if(mysqli_num_rows($res) > 0){
            while($row=mysqli_fetch_assoc($res)){
              $dr = $row['drid'];
              $chat = $row['chat'];
              $admin = $row['admin'];
              if($dr==$drid){
                echo '<div class="row">';
                echo '<div class="col-lg-5"></div>';
                echo '<div class="col-lg-7" style="text-align:right;">'.$chat.'</div>';
                echo '</div>';
                echo '<hr align="right" class="col-md-5">';
              }elseif ($admin==$drid) {
                echo '<div class="row">';
                echo '<div class="col-lg-5"></div>';
                echo '<div class="col-lg-5"></div>';
                echo '<div class="col-lg-5" style="text-align:jusify;">'.$chat.' </div>';
                echo '</div>';
                echo '<hr align="left" class="col-md-5">';
              }
            }
            }
          }
        ?>