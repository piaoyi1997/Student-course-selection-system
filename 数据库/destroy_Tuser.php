<?php
	$Eno =$_REQUEST['Eno'];

	include('conn.php');

	$sql = "delete from Teacher where Eno='$Eno'";
	mysqli_query($conn,$sql);
	echo json_encode(array('success'=>true));
?>