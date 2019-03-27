<?php
include('config.php');

$sql="SELECT `pasienid`,`pasienname`,`pasienemail` FROM `pasien`;";
$result = mysqli_query($link,$sql);?>


<table border="1">
<?php while($row = mysqli_fetch_assoc($result)){
	$pasienid = $row['pasienid'];
	$pasienname = $row['pasienname'];
	$pasienemail = $row['pasienemail'];
	echo '<tr>';
		echo '<td>'.$pasienid.'</td>';
		echo '<td><a href="bantuanadmin.php?inputpasienid='.$pasienid.'">'.$pasienname.'</td>';
		echo '<td>'.$pasienemail.'</td>';
	echo '</tr>';
}
?></table>