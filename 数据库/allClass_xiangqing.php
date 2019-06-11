<?php
	include('conn.php');
	#$Ename=isset($_REQUEST['Ename']) ? $_REQUEST['Ename'] : '1111';
	$Ename=$_GET['Ename'];
	//session_start();
	//$_SESSION['ee']=$Ename;
	//$ee=$_SESSION['ee'];
	//echo $Ename;
	//var_dump($_SESSION);
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