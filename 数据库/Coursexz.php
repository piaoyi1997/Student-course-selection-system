<?php 
	$Cno=$_REQUEST['Cno'];
	$Sno=$_REQUEST['Sno'];
	include('conn.php');
	$sql3="select * from class where Cno='$Cno';";
	$rs=mysqli_query($conn,$sql3);
	$row=mysqli_fetch_array($rs);
	$yixuan=$row['yixuan'];
	$yixuan=$yixuan+1;
	if ($yixuan<=$row['Course_number']) {
		$sql2="update class set yixuan='$yixuan' where Cno='$Cno'";
		mysqli_query($conn,$sql2);
		$sql="insert into sc (Sno,Cno) values('$Sno','$Cno')";
		mysqli_query($conn, $sql);	
		echo "选课成功";
	}else{
		echo "人数已满，请选其他课程";
	}
	
 ?>