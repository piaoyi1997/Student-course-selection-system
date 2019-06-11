<?php
	session_start();
	$Eno=$_REQUEST['Eno'];
	$Epass=$_REQUEST['Epass'];
	include('conn.php');
	$sql="select*from teacher where Eno='$Eno' and Epass='$Epass'";
	$rs=mysqli_query($conn,$sql);
	$row2=mysqli_fetch_array($rs);
	$_SESSION['Ename']=$row2['Ename'];
	$_SESSION['data']=date('Y-m-d H:i:s');
	$row=mysqli_num_rows($rs);
	if ($row==1) {
		echo "登陆成功";
	}else{
		echo "登陆失败";
	}


	// session_start();
	// //  这种方法是将原来注册的某个变量销毁
	// unset($_SESSION['admin']);
	// //  这种方法是销毁整个 Session 文件
	// session_destroy();

?>
