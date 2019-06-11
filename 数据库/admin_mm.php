<?php
	session_start();
	$admin=$_SESSION['admin'];
	$pass=$_REQUEST['pass'];
	$pass1=$_REQUEST['pass1'];
	include('conn.php');
	$sql="select*from admin where admin='$admin'";
	$rs=mysqli_query($conn,$sql);
	$row=mysqli_num_rows($rs);
	$row2=mysqli_fetch_array($rs);
	if ($row2['pass']!=$pass) {
		echo "旧密码错误";
		exit;
	}
	if ($row==1) {
		$sql2="update admin set pass='$pass1' where admin='$admin'";
		mysqli_query($conn,$sql2);
		echo "密码修改成功";
	}
?>