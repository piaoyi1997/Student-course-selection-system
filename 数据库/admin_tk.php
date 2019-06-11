<?php 
	include('conn.php');
	$sql="update classOpan set opan=0";
	mysqli_query($conn,$sql);	
	echo "停止选课成功";
?>