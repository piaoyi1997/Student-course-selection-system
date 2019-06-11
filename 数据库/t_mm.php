<?php
	session_start();
	$Ename=$_SESSION['Ename'];
	$Epass=$_REQUEST['Epass'];
	$Epass1=$_REQUEST['Epass1'];
	include('conn.php');
	$sql="select*from teacher where Ename='$Ename'";
	$rs=mysqli_query($conn,$sql);
	$row=mysqli_num_rows($rs);
	$row2=mysqli_fetch_array($rs);
	if ($row2['Epass']!=$Epass) {
		echo "旧密码错误";
		exit;
	}
	if ($row==1) {
		$sql2="update teacher set Epass='$Epass1' where Ename='$Ename'";
		mysqli_query($conn,$sql2);
		echo "密码修改成功";
	}
?>