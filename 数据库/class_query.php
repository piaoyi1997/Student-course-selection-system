<?php
	include('conn.php');
	session_start();
	$Ename=$_SESSION['Ename'];
	$sql1="select * from t_shenqing where Ename='$Ename' and Status='已通过' or  Ename='$Ename' and Status='待审核'";
	$rs1=mysqli_query($conn,$sql1);
	$row1=mysqli_num_rows($rs1);
	if ($row1!=0) {
		$sql2="select * from t_shenqing where Ename='$Ename'";
		$rs2 = mysqli_query($conn,$sql2);
		$result2 = array();
		while($row2 = mysqli_fetch_object($rs2)){
	    	array_push($result2, $row2);
		}
			echo json_encode($result2);
	}else{
		$sql="SELECT
			t_shenqing.Cno,
			t_shenqing.Course_leibie,
			t_shenqing.Course_name,
			t_shenqing.Course_hour,
			t_shenqing.Course_credit,
			t_shenqing.Ename,
			t_shenqing.Course_number,
			t_shenqing.Status,
			jujue.liyou,
			jujue.admin,
			jujue.time
			FROM t_shenqing,jujue
			WHERE t_shenqing.Course_name=jujue.Course_name";
		$rs = mysqli_query($conn,$sql);
		$result = array();
		while($row = mysqli_fetch_object($rs)){
     		array_push($result, $row);
		}
	 	echo json_encode($result);
	}	
?>