<?php
	session_start();
	$liyou=$_REQUEST['liyou'];
	$Course_name=$_SESSION['Course_name'];
	$admin=$_SESSION['admin'];
	$time=date('Y-m-d H:i:s');
	include('conn.php');
	$sql="insert into jujue (Course_name,liyou,admin,time) values('$Course_name','$liyou','$admin','$time')";
	mysqli_query($conn, $sql);
	echo "理由已发送";
?>