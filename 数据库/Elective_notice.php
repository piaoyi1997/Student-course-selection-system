<?php 
	$title=$_REQUEST['title'];
	$content=$_REQUEST['content'];
	$release_time=date('Y-m-d H:i:s');
	include('conn.php');
	$sql="insert into public_notice (title,content,release_time) values('$title','$content','$release_time')";
	mysqli_query($conn, $sql);
	echo "发布成功";
 ?>