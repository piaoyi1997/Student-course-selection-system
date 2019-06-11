<?php 
	include('conn.php');
	$sql="update classOpan set opan=1";
	mysqli_query($conn,$sql);	
	echo "开启选课成功";
?>