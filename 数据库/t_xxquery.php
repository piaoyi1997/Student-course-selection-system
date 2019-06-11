<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="easyui/themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="easyui/themes/icon.css">
	<script type="text/javascript" src="easyui/jquery.min.js">
	</script>
	<script type="text/javascript" src="easyui/jquery.easyui.min.js">
	</script>
	<script type="text/javascript" src="easyui/locale/easyui-lang-zh_CN.js"></script>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
	<?php
		include('conn.php');
		session_start();
		$Ename=$_SESSION['Ename'];
		$sql="select * from teacher where Ename='$Ename'";
		$rs = mysqli_query($conn,$sql);
		$row=mysqli_fetch_array($rs);
	?>
<body>
	<div class="easyui-panel" title="个人信息" style="height: 400px;">
		<form id="ff" method="post">
	    	<div class="form">
				<label for="name">工号:</label>
				<input class="easyui-textbox" type="text" value="<?php echo $row['Eno'];?>"/>
	    	</div>
	    	<div class="form">
				<label for="email">姓名:</label>
				<input class="easyui-textbox" type="text" value="<?php echo $row['Ename'];?>"/>
		    </div>
		    <div class="form">
				<label for="name">性别:</label>
				<input class="easyui-textbox" type="text" value="<?php echo $row['Esex'];?>" id="tb"/>
	    	</div>
	    	<div class="form">
				<label for="name">年龄:</label>
				<input class="easyui-textbox" type="text" value="<?php echo $row['Eage'];?>"/>
	    	</div>
		</form>
	</div>
<!-- 	<script type="text/javascript">
		 $('input').textbox('readonly',true);
	</script> -->
	<style type="text/css">
		.form{
			margin-left: 100px;
			margin-top: 30px;
		}
	</style>	
</body>
</html>