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
		#aa{width: 116px;height: 29px;}
		p{position: absolute;top: 0px;left: 230px;}
		#xg{position: absolute;bottom: 2px;left: 215px;}
		#zx{position: absolute;bottom: 2px;left: 320px;}
		#sd{position: absolute;bottom: 2px;left: 280px;}
		#time{position: absolute;top: 9px;right: 70px;}
	</style>
</head>
<body class="easyui-layout">
	<div region="north"style="height: 64px">
		<img src="1.png">
		<p>
			<?php
				session_start();
				echo $_SESSION['Sname'];
			?>
		</p>
		<a href="#" id="xg">修改密码</a>
				<a href="#" id="sd">锁定</a>
				<a href="zhuxiao.php" id="zx">注销</a>
				<div id="time">登录时间:
					<?php
						$data=$_SESSION['data'];	
						echo $data;	
					?>
				</div>
	</div>
	<div region="west" title="选课管理系统"  data-options="collapsible:false" style="width: 120px">
		<div class="easyui-accordion">
			<div style="width: 120px" title="信息查询">
				<a href="#" id="aa" class="easyui-linkbutton" onclick="showTab('个人信息','s_xxquery.php')">个人信息</a>
			</div>				
			<div style="width: 120px" title="选课">
				<a href="#" id="aa" class="easyui-linkbutton" onclick="showTab('选课','Course_selection.php')">选课</a>
			</div>
		</div>
	</div>
	<div region="center">
		<div class="easyui-tabs" id="tt">
			<div title="首页">
				<iframe scrolling="auto" src="admin_shouye.php" style="width:100%;height:510px;"></iframe>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		function showTab(title,url){
			if ($('#tt').tabs('exists',title)) {
				$('#tt').tabs('select',title);
			}else{
				var content='<iframe scrolling="auto" src="'+url+'" style="width:100%;height:450px;"></iframe>';
				$('#tt').tabs('add',{
					title:title,
					content:content,
					closable:true
				});
			}
		}
	</script>
</body>
</html>