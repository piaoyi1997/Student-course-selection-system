<?php
	$kz=$_REQUEST['Kz'];
	include('conn.php');
	if ($kz=='reg') {
		$Sno=$_REQUEST['Sno'];
		$Sname=$_REQUEST['Sname'];
		$Spass=$Sno;
		$Ssex=$_REQUEST['Ssex'];
		$Sage=$_REQUEST['Sage'];
		$Sdept=$_REQUEST['Sdept'];
		$sql="insert into student values('$Sno','$Sname','$Ssex',$Sage,'$Sdept','$Spass')";
		mysqli_query($conn,$sql);
	}elseif ($kz=='ls') {
		$Eno=$_REQUEST['Eno'];
		$Ename=$_REQUEST['Ename'];
		$Epass=$Eno;
		$Esex=$_REQUEST['Esex'];
		$Eage=$_REQUEST['Eage'];
		$sql="insert into teacher values('$Eno','$Ename','$Esex','$Eage','$Epass')";
		mysqli_query($conn,$sql);
	}elseif ($kz=='sq') {
		$Course_leibie=$_REQUEST['Course_leibie'];
		$Course_name=$_REQUEST['Course_name'];
		$Course_hour=$_REQUEST['Course_hour'];
		$Course_credit=$_REQUEST['Course_credit'];
		$Course_number=$_REQUEST['Course_number'];
		$Eno=$_REQUEST['Eno'];
		$Status='已通过';
		#查询老师
		$sql2="select * from teacher where Eno='$Eno'";
		$rs=mysqli_query($conn,$sql2);
		$row=mysqli_fetch_array($rs);
		$Ename=$row['Ename'];

		$sql="insert into t_shenqing (Course_leibie,Course_name,Course_hour,Course_credit,Ename,Course_number,Status) values('$Course_leibie','$Course_name','$Course_hour','$Course_credit','$Ename','$Course_number','$Status')";
		mysqli_query($conn,$sql);
		include('class.php');
	}
	
	
	
?>