<?php
	session_start();
	$Sno=$_REQUEST['Sno'];
	$Spass=$_REQUEST['Spass'];
	include('conn.php');
	$sql="select*from student where Sno='$Sno' and Spass='$Spass'";
	$rs=mysqli_query($conn,$sql);
	$row2=mysqli_fetch_array($rs);
	$_SESSION['Sname']=$row2['Sname'];
	$_SESSION['Sno']=$row2['Sno'];
	$_SESSION['data']=date('Y-m-d H:i:s');
	$row=mysqli_num_rows($rs);
	if ($row==1) {
		echo "登陆成功";
	}else{
		echo "登陆失败";
	}
?>