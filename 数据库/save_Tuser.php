<?php
	$Eno = $_REQUEST['Eno'];
	$Ename = $_REQUEST['Ename'];
	$Esex = $_REQUEST['Esex'];
	$Eage = $_REQUEST['Eage'];
	$Epass = $_REQUEST['Epass'];
	include('conn.php');

	 $sql = "insert into Teacher(Eno,Ename,Esex,Eage,Epass) values ('$Eno','$Ename','$Esex','$Eage','$Epass')";
		mysqli_query($conn,$sql);
		echo json_encode(array(
		    'Eno' => $Eno,
		    'Ename' => $Ename,
		    'Esex' => $Esex,
		    'Eage' => $Eage,
		    'Epass' => $Epass
		));
?>