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
<body>
	<table class="easyui-datagrid" style="width:715px;height: 400px;" pagination="true" rownumbers="true" fitColumus="true" id="dg" singleSelect="true">
		<thead>
			<tr>
				<th field="Cno" width="70">课程号</th>
				<th field="Course_leibie" width="80" align="center">课程类别</th>
				<th field="Course_name" width="110" align="center">课程名</th>
				<th field="Course_hour" width="50" align="center">学时</th>
				<th field="Course_credit" width="50" align="center">学分</th>
				<th field="Ename" width="80" align="center">任课老师</th>
				<th field="yixuan" width="80" align="center">已选人数</th>
				<th field="Course_number" width="80" align="center">限定人数</th>
				<th field="caozuo" width="70" halign="center">选退课</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				include('conn.php');
				session_start();
				$sql="select * from class";
				$rs=mysqli_query($conn,$sql);
				while($row= mysqli_fetch_array($rs)){
			?>
				<tr>
					<td><?php echo $row['Cno']; ?></td>
					<td><?php echo $row['Course_leibie']; ?></td>
					<td><?php echo $row['Course_name']; ?></td>
					<td><?php echo $row['Course_hour']; ?></td>
					<td><?php echo $row['Course_credit']; ?></td>
					<td><?php echo $row['Ename']; ?></td>
					<td><?php echo $row['yixuan']; ?></td>
					<td><?php echo $row['Course_number']; ?></td>
					<td><a href="#" class="easyui-linkbutton" id="<?php echo $row['Ename']; ?>">详情</a></td>
				</tr>	
			<?php 
			}?>
		</tbody>		
	</table>
	<div class="easyui-panel" id="p" data-options='closed:true,collapsible:true'>
		<!--  data-options='closed:true' -->
		<!-- <iframe src="allClass_xiangqing.html" style="width:450px;"></iframe> -->
		<table class="easyui-datagrid" pagination="true" rownumbers="true" fitColumus="true" id="dg2" singleSelect="true" style="height: 400px;">
			<thead>
				<tr>
					<th field="Sno" width="120" align="center">学号</th>
					<th field="Sname" width="60" align="center">姓名</th>
					<th field="Ssex" width="60" align="center">性别</th>
					<th field="Sage" width="60" align="center">年龄</th>
					<th field="Sdept" width="80" align="center">专业</th>
				</tr>
			</thead>		
		</table>
	</div>	
	<style type="text/css">
		a{
			display: block;
			width: 60px;
			height: 28px;
			line-height: 28px;
		}
	</style>
	<script type="text/javascript">
		$(function(){
		    $('#p').panel({
		        title:'班级详情',
		        width:500,
		        left:725,
		        top:8
		   });
		   $('#p').panel('panel').css('position','absolute');
		}); 	
		$(function(){
		    $('a').bind('click', function(){
				var Ename=$(this).attr('id');
				// alert(Ename);
				// $('#p').panel('open');
				// var aaa = $.post("allClass_xiangqing.php",
				// 	{
				// 		Ename:$(this).attr('id')
				// 	},
				// 	function(data,status){
				// 	 	alert("Data: " + data);
				// 	});
				$('#p').panel('open');
				$('#dg2').datagrid(
					'load',
					url="allClass_xiangqing.php?Ename="+Ename
				);
			});
			// $("#p").load(location.href+" #p");局部刷新div
		});	
	</script>
</body>
</html>