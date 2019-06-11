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
	<style type="text/css">
		#a{margin-left:170px;width: 100px;}
		#esbtn{margin-left: 290px;}
		table{
			margin-left: 10px;
		}
	</style>
<body>
	<div class="easyui-panel" title="发布选课通知" style="height: 400px;width: 550px;" id="pp">
		<form id="fm">
			<label>标题:</label>
			<input type="text" name="title" id="i1"><br>
			<label>内容:</label><br>
			<textarea name="content" style="width: 400px;height: 150px;" id="i2"></textarea><br>
			<a href="#" class="easyui-linkbutton" id="a">发布</a>
		</form>
		<?php
			include('conn.php');
			$sql="select * from classOpan";
			$rs=mysqli_query($conn,$sql);
			$row= mysqli_fetch_array($rs);
			if ($row['opan']==0) {
		?>	
				<label id="esbtn">点击进行开课:</label>
				<a id="btn" href="#" class="easyui-linkbutton" onclick="kk()">开课</a>
		<?php		
			}else{
		?>
			<label id="esbtn">点击关闭选课:</label>
				<a id="btn" href="#" class="easyui-linkbutton" onclick="tk()">关闭选课</a>
		<?php
			}
		?>
	</div>
</body>
	<script type="text/javascript">
		$('#a').click(function(){
			$.post("Elective_notice.php",
				{
				title:$("#i1").val(),
				content:$("#i2").val()
			},
			function(data,status){
				 alert("Data: " + data + "\nStatus: " + status);
				 $("#i1").val("");
				 $("#i2").val("");
			});
		});
		function kk(){
				$.get("admin_kk.php",function(data,status){
	    		alert("数据: " + data + "\n状态: " + status);
	    		$("#pp").load(location.href+" #pp");//局部刷新div
  			});
		}
		function tk(){
				$.get("admin_tk.php",function(data,status){
	    		alert("数据: " + data + "\n状态: " + status);
	    		$("#pp").load(location.href+" #pp");//局部刷新div
  			});
		}
</script>
</html>