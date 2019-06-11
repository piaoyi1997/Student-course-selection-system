<?php
	$Course_name=$_REQUEST['Course_name'];
	include('conn.php');
	$sql1="select * from t_shenqing where Course_name='$Course_name' and Status='已通过'";
	$rs=mysqli_query($conn,$sql1);
	$row=mysqli_num_rows($rs);
	if ($row==1) {
		echo "你已经审核过了，请勿重复操作";
	}else{
		$sql="update t_shenqing set Status='已通过' where Course_name='$Course_name'";
		mysqli_query($conn,$sql);
		include('class.php');
		echo "审核成功";
	}
?>