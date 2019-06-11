<?php
	include('conn.php');
	$sql="select * from Teacher";
	$rs=mysqli_query($conn,$sql);
	while($row = mysqli_fetch_array($rs)) {
		echo $row['Eno'];
	}
?>