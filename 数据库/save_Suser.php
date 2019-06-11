<?php
	$Sno = $_REQUEST['Sno'];
	$Sname = $_REQUEST['Sname'];
	$Ssex = $_REQUEST['Ssex'];
	$Sage = $_REQUEST['Sage'];
	$Sdept = $_REQUEST['Sdept'];
	$Spass = $_REQUEST['Spass'];
	include('conn.php');
	$sql = "insert into student(Sno,Sname,Ssex,Sage,Sdept,Spass) values ('$Sno','$Sname','$Ssex','$Sage','$Sdept','$Spass')";
		mysqli_query($conn,$sql);
		echo json_encode(array(
		    'Sno' => $Sno,
		    'Sname' => $Sname,
		    'Ssex' => $Ssex,
		    'Sage' => $Sage,
		    'Sdept' => $Sdept,
		    'Spass' =>$Spass
		));
?>