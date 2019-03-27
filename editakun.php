<?php 
header('Cache-Control: no cache'); //no cache
session_cache_limiter('private_no_expire'); // works
session_start();?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Rumah Sehat : Berobat Tanpa Antre</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="carousel.css" rel="stylesheet">
  </head>
  <body>

    <?php include('config.php');?>
    <?php if(isset($_COOKIE['pasienid']))        $_SESSION['pasienid']=$_COOKIE['pasienid'];
     if(isset($_SESSION['pasienid'])){
      $pasienid=$_SESSION['pasienid'];
      include ('header2.php');
    }else{
      echo "
  <script>
    window.location.assign('masuk.php');
  </script>"; 
      
    }?>
    <main role="main">
      
      <!-- Marketing messaging and featurettes
      ================================================== -->
      <!-- Wrap the rest of the page in another container to center all the content. -->

      <div class="container marketing">
        <!-- Three columns of text below the carousel -->
       
        <!-- START THE FEATURETTES -->
        <br><br>
        <h1>Edit Akun</h1>
            <hr class="bg-primary">
            <div class="row">
                <div class="col-md-4">
                    <?php
                        $sql = "SELECT * FROM `pasien` WHERE `pasienid`='$pasienid';";
                        $result = mysqli_query($link,$sql);
                        $row=mysqli_fetch_assoc($result);
                        $verif = $row['verified'];
                        $nik=$row['NIK'];
                        if($row['NIK']=="") $nik="-";
                        if($row['verified']=="") $verif="BELUM";
                        echo '<img src="'.$row['pasienimg'].'" width="150" height="150" class="rounded-circle">';
                        echo '<table>';
                            echo '<tr>';
                             echo '<td>'."Nama".'</td>';
                             echo '<td>'.":".'</td>';
                             echo '<td>'.$row['pasienname'].'</td>';
                            echo '</tr>';
                            echo '<tr>';
                             echo '<td>'."Email".'</td>';
                             echo '<td>'.":".'</td>';
                             echo '<td>'.$row['pasienemail'].'</td>';
                            echo '</tr>';
                            echo '<tr>';
                             echo '<td>'."Password".'</td>';
                             echo '<td>'.":".'</td>';
                             echo '<td><button onclick="ubah();">'."Ubah Password".'</a></td>';
                             echo '<td></td>';
                            echo '</tr>';
                            echo '<tr>';
                             echo '<td>'."NIK".'</td>';
                             echo '<td>'.":".'</td>';
                             echo '<td class="disabled">'.$nik.'</td>';
                            echo '</tr>';
                            echo '<tr>';
                             echo '<td>'."Verifikasi".'</td>';
                             echo '<td>'.":".'</td>';
                             echo '<td>'.$verif.'</td>';
                            echo '</tr>';
                        echo '</table>';
                    ?>
                </div>
                <div class="col-md-8 " align="right" id="editpassword" style="visibility: hidden;">
                    <h4>Ubah password</h4>
                    <form method="post" action="editakun.php">
                        <table>
                            <tr>
                                <td>Masukkan password lama(jika ada)</td>
                                <td><input type="Password" name="a"/></td>
                            </tr>
                            <tr>
                                <td>Masukkan password baru</td>
                                <td><input type="Password" name="b"/></td>
                            </tr>
                            <tr>
                                <td>Masukkan kembali password baru</td>
                                <td><input type="Password" name="c"/></td>
                            </tr>
                            <tr>
                                <td></td>

                                <td style="text-align: right;"><input type="submit" name="d" class="btn btn-default" value="Simpan"/></td>
                            </tr>
                        </table>
                    </form>
            <?php
            ?>
                </div>
                <?php
                $res=mysqli_query($link, "SELECT `pasienpw` FROM `pasien` WHERE `pasienid`='$pasienid';");
            $row=mysqli_fetch_assoc($res);

            if (isset($_POST['d'])){
                if($_POST['a']==$row['pasienpw']){
                    if($_POST['b']=="" or $_POST['c']==""){
                        echo "Harap isi password baru Anda.";
                    }else{
                        if($_POST['b']!=$_POST['c']){
                            echo "Password baru tidak cocok. Harap isi kembali.";
                        }else{
                            $new = $_POST['c'];
                            $ganti=mysqli_query($link,"UPDATE `pasien` SET `pasienpw` = '$new' WHERE `pasienid`='$pasienid';");
                            if(isset($ganti)){
                    echo "Ubah password berhasil.";
                }
                        }
                    }
                }else{
                    echo "Password lama salah." ;
                }
            }
                ?>
            </div>

            
        
    
      
        
        
      
       
       
        <!-- /END THE FEATURETTES -->
        <hr class="featurette-divider">
      </div><!-- /.container -->
<footer class="container" style="bottom: 0px;">
        <p class="float-right"><a href="#">Back to top</a></p>
        <p>&copy; 2017 President University &middot; <a href="kebijakanprivasi.php">Privacy</a> &middot; <a href="syaratketentuan.php">Terms</a></p>
      </footer>

      <!-- FOOTER -->
      

    </main>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="assets/js/vendor/popper.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="assets/js/vendor/holder.min.js"></script>
    <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript">
        function ubah(){
            document.getElementById('editpassword').style.visibility="visible";
        }
        function tutup(){
            document.getElementById('editpassword').style.visibility="hidden";
        }
    </script>
  </body>
</html>
