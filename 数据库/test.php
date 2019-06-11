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
	<table class="easyui-datagrid" style="width:400px;height:250px"
    data-options="url:'allClass_xiangqing.php?Ename=周老师',fitColumns:true,singleSelect:true">
	    <thead>
			<tr>
				<th field="Sno" width="100" align="center">学号</th>
					<th field="Sname" width="60" align="center">姓名</th>
					<th field="Ssex" width="60" align="center">性别</th>
					<th field="Sage" width="60" align="center">年龄</th>
					<th field="Sdept" width="80" align="center">专业</th>
			</tr>
	    </thead>
	</table>

	<script type="text/javascript">
		$('#dg').datagrid('load');
		//$('#dg').datagrid('reload');
	</script>
</body>
</html>