<?php
	$conn=mysqli_connect("localhost", "root", "", "hbmu2");
	mysqli_set_charset($conn,"utf8");
	// /*连接数据库，5.4的函数不再是mssql_connect了：*/
	// 	$conInfo=array("Database"=>"hbmu", "UID"=>"sa", "PWD"=>"peng1997");
	// 	$conn=sqlsrv_connect("localhost", $conInfo);
	// 	/*判断连接成功与否：*/
	// 	if( $conn == false )
	// 		{
	// 			echo "1";
	// 		}
	// 		else
	// 		{
	// 		}
?>