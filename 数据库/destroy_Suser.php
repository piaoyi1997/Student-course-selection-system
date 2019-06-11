<?php
	$Sno =$_REQUEST['id'];

	include('conn.php');

	$sql = "delete from student where Sno='$Sno'";
	mysqli_query($conn,$sql);
	echo json_encode(array('success'=>true));
?>