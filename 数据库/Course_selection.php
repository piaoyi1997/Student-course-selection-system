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
<!-- 	<script type="text/javascript" src="jgxLoader.js"></script> -->
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body>
	<?php 
		include('conn.php');
		$sql3="select * from classOpan";
		$rs3=mysqli_query($conn,$sql3);
		$row3= mysqli_fetch_array($rs3);
		if ($row3['opan']==0) {
	?>
			<h1>开课时间还没到，请耐心等待！！！</h1>
	<?php
		}else{
	?>
		<table class="easyui-datagrid" style="width:750px;height: 400px;" pagination="true" rownumbers="true" fitColumus="true" id="dg" singleSelect="true">
			<thead>
				<tr>
					<th field="Cno" width="80">课程号</th>
					<th field="Course_leibie" width="80" align="center">课程类别</th>
					<th field="Course_name" width="110" align="center">课程名</th>
					<th field="Course_hour" width="50" align="center">学时</th>
					<th field="Course_credit" width="50" align="center">学分</th>
					<th field="Ename" width="80" align="center">任课老师</th>
					<th field="yixuan" width="80" align="center">已选人数</th>
					<th field="Course_number" width="80" align="center">限定人数</th>
					<th field="caozuo" width="80" halign="center">选退课</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					session_start();
					$Sno=$_SESSION['Sno'];
					$sql="select * from class";
					$rs=mysqli_query($conn,$sql);
					while($row= mysqli_fetch_array($rs)){
						$sql2="select * from sc where Sno='$Sno' and Cno='".$row['Cno']."'";
						$rs2=mysqli_query($conn,$sql2);
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
				<?php
					if (mysqli_num_rows($rs2)==0) {?>
						<td><a href="#" class="easyui-linkbutton" id="<?php echo $row['Cno']; ?>" name='0'>选课</a></td>
				<?php
					}else{
				?>
					<td><a href="#" class="easyui-linkbutton" id="<?php echo $row['Cno']; ?>" name='1'>退课</a></td>
	            <?php
	        		}
	        	?>
				</tr>
				<?php 
				}?>
			</tbody>		
		</table>
	<?php }?>	
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
		    $('a').bind('click', function(){
				var Cno=$(this).attr('id');
				var Sno='<?php echo $Sno;?>';
				var name=$(this).attr('name');
				if (name==0) {
					$.post("Coursexz.php",
					{
						Cno:$(this).attr('id'),
						Sno:'<?php echo $Sno;?>'
					},
					function(data,status){
						window.location.reload();					
					});		
				}else{
					$.post("Coursetk.php",
					{
						Cno:$(this).attr('id'),
						Sno:'<?php echo $Sno;?>'
					},
					function(data,status){
						// alert("Data: " + data + "\nStatus: " + status);
						window.location.reload();					
					});		
				}
															
			});
		});
		
	</script>
</body>
</html>