<?php
	session_start();
	$admin=$_REQUEST['admin'];
	$pass=$_REQUEST['pass'];
	include('conn.php');
	$sql="select*from admin where admin='$admin' and pass='$pass'";
	$rs=mysqli_query($conn,$sql);
	$row2=mysqli_fetch_array($rs);
	$_SESSION['admin']=$row2['admin'];
	$_SESSION['data']=date('Y-m-d H:i:s');
	$row=mysqli_num_rows($rs);
	if ($row==1) {
		echo "登陆成功";
	}else{
		echo "登陆失败";
	}
?>