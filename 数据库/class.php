<?php
	$sql2="select *from t_shenqing where Course_name='$Course_name' and Status='已通过'";
	$rs1=mysqli_query($conn,$sql2);
	$row1=mysqli_fetch_array($rs1);
	$Cno=$row1['Cno'];
	$Course_leibie=$row1['Course_leibie'];
	$Course_name=$row1['Course_name'];
	$Course_hour=$row1['Course_hour'];
	$Course_credit=$row1['Course_credit'];
	$Ename=$row1['Ename'];
	$yixuan=0;
	$Course_number=$row1['Course_number'];
	$sql3="insert into class (Cno,Course_leibie,Course_name,Course_hour,Course_credit,Ename,yixuan,Course_number) values ('$Cno','$Course_leibie','$Course_name','$Course_hour','$Course_credit','$Ename',$yixuan,'$Course_number')";
		mysqli_query($conn,$sql3);
?>