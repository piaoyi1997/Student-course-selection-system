<?php
	session_start();
	$Course_leibie=$_REQUEST['Course_leibie'];
	$Course_name=$_REQUEST['Course_name'];
	$Course_hour=$_REQUEST['Course_hour'];
	$Course_credit=$_REQUEST['Course_credit'];
	$Course_number=$_REQUEST['Course_number'];
	$Ename=$_SESSION['Ename'];
	$Status='待审核';
	include('conn.php');
	$sql="insert into t_shenqing (Course_leibie,Course_name,Course_hour,Course_credit,Ename,Course_number,Status) values('$Course_leibie','$Course_name','$Course_hour','$Course_credit','$Ename','$Course_number','$Status')";
	mysqli_query($conn,$sql);
	echo "申请成功,等待管理员审核";
?>