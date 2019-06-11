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
	<meta charset="utf-8">
	<style type="text/css">
		#p1{font-size: 24px;}
		#p2{margin-left: 300px;margin-top: -23px;}
		#p3{margin-top: 10px;}
	</style>
</head>
<body>
	<?php
		include('conn.php');
		$sql="select *from public_notice";
		$rs=mysqli_query($conn,$sql);
		while ($row=mysqli_fetch_array($rs)) {
	?>
		<div class="easyui-panel" title="公告" style="width: 100%;height: 150px;" id="panel">
			<div>
				<div id="p1">标题：<?php echo $row['title']; ?></div>
				<div id="p2">时间：<?php echo $row['release_time']; ?></div>
			</div>
			<div id="p3">内容：<?php echo $row['content']; ?></div>
		</div>
	<?php		
		}		
	?>

</body>
</html>