<?php 
	$Cno=$_REQUEST['Cno'];
	$Sno=$_REQUEST['Sno'];
	include('conn.php');
	$sql3="select * from class where Cno='$Cno';";
	$rs=mysqli_query($conn,$sql3);
	$row=mysqli_fetch_array($rs);
	$yixuan=$row['yixuan'];
	$yixuan=$yixuan-1;
	$sql2="update class set yixuan='$yixuan' where Cno='$Cno'";
	mysqli_query($conn,$sql2);
	$sql="delete from sc where Cno='$Cno' and Sno='$Sno'";
	mysqli_query($conn,$sql);	
	echo "取消成功";
	echo $Cno;
 ?>