<?php
	include('conn.php');
	session_start();
	$Ename=$_SESSION['Ename'];
	$sql="select Sno,Sname,Ssex,Sage,Sdept
			from student
			where Sno IN
				(select Sno
					from sc
						where Cno IN
							(select Cno
								from class
								where Ename='$Ename'
					)
			)";
	$rs = mysqli_query($conn,$sql);
	$result = array();
	while($row = mysqli_fetch_object($rs)){
    	array_push($result, $row);
	}
		echo json_encode($result);
?>