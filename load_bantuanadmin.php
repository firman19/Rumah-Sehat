<?php 
include('config.php');
session_start();
        $pasienid=$_SESSION['inputpasienid'];
        $sql="SELECT `pasienid`,`chat`,`admin` FROM `bantuan`;";
        $res = mysqli_query($link,$sql);
        if(mysqli_num_rows($res) > 0){
          while($row=mysqli_fetch_assoc($res)){
            $pasien = $row['pasienid'];
            $chat = $row['chat'];
            $admin = $row['admin'];
            if($pasien==$pasienid){
              echo '<div class="row">';
              echo '<div class="col-lg-5"></div>';
              echo '<div class="col-lg-5"></div>';
              echo '<div class="col-lg-5" style="text-align:jusify;">'.$chat.' </div>';
              echo '</div>';
              echo '<hr align="left" class="col-md-5">';
            }elseif ($admin==$pasienid) {
              echo '<div class="row">';
              echo '<div class="col-lg-5"></div>';
              echo '<div class="col-lg-7" style="text-align:right;">'.$chat.'</div>';
              echo '</div>';
              echo '<hr align="right" class="col-md-5">';
            }
          }
          
        }

        ?>