<?php
include('config.php');

$sql="SELECT `drid`,`drname` FROM `dr`;";
$result = mysqli_query($link,$sql);?>


<table border="1">
<?php while($row = mysqli_fetch_assoc($result)){
	$drid = $row['drid'];
	$drname = $row['drname'];
	echo '<tr>';
		echo '<td>'.$drid.'</td>';
		echo '<td><a href="bantuanadmindok.php?inputdrid='.$drid.'">'.$drname.'</td>';
	echo '</tr>';
}
?></table>