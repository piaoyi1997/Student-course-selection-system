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
		*{margin: 0;padding: 0;}
		#ly{position: relative;}
		#north{display: flex;}
		#aa{width: 116px;height: 29px;}
		p{position: absolute;top: 9px;left: 230px;}
		#xg{position: absolute;bottom: 2px;left: 215px;}
		#zx{position: absolute;bottom: 2px;left: 320px;}
		#sd{position: absolute;bottom: 2px;left: 280px;}
		#time{position: absolute;top: 9px;right: 70px;}
		label{margin-left: 50px;}
		#qr{margin-left: 35px;}
		input{height: 30px;border-radius: 5px;}
		.fitem{margin-top: 20px;}
		.fgc{width: 100%;height: 625px;position: absolute;background-color: #eee;z-index: -1;opacity: 0.5;}
		#ip3{background-color: #f6f6f6;}
	</style>
</head>
<body>
	<div class="fgc"></div>
	<div class="easyui-layout" style="width: 100%;height: 625px;" id="ly">
		<div region="north" style="height: 64px" id="north">
			<img src="1.png">
			<div class="div1">
			<p>
				<?php
					session_start();
					echo $_SESSION['admin'];
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
		</div>
		<div region="west" title="选课管理系统"  data-options="collapsible:false" style="width: 120px">
			<div class="easyui-accordion">
				<div style="width: 120px" title="用户管理">
					<a href="#" id="aa" class="easyui-linkbutton" onclick="showTab('教师管理','t_query.html')">教师管理</a>
					<a href="#" id="aa" class="easyui-linkbutton" onclick="showTab('学生管理','s_query.html')">学生管理</a>
				</div>				
				<div style="width: 120px" title="课程管理">
					<a href="#" id="aa" class="easyui-linkbutton" onclick="showTab('选课审核','Course_shenghe.html')">选课审核</a>
					<a href="#" id="aa" class="easyui-linkbutton" onclick="showTab('选课查询','allClass_select.php')">选课查询</a>
					<!-- <a href="#" id="aa" class="easyui-linkbutton" onclick="showTab('课程排班')">课程排班</a> -->
				</div>
				<div style="width: 120px" title="发布通知">
					<a href="#" id="aa" class="easyui-linkbutton" onclick="showTab('选课和开课通知','Elective_notice_qd.php')">选课开课通知</a>
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
		<div id="dlg" class="easyui-dialog" close:"true" buttons="#dlg-buttons" style="width: 400px;height: 280px;" title="修改密码" data-options='closed:true'>
			<form id="fm" method="post">
				<div class="fitem">
					<label>旧密码：</label>
					<input class="easyui-passwordbox" prompt="Password" iconWidth="28"
                     	name="pass" id="ip1">
				</div>
				<div class="fitem">
					<label>新密码：</label>
					<input name="pass2" class="easyui-passwordbox" prompt="Password" iconWidth="28" required="true" id="ip2" onkeyup="tishi()">
				</div>
				<div class="fitem">
					<label id="qr">确认密码：</label>
					<input name="pass3" type="password" id="ip3" onkeyup="tishi()" style="width: 180px;font-size: 24px;">
					<span id="span_1">*</span>
				</div>
			</form>
		</div>
		<div id="dlg-buttons">
			<a href="#" class="easyui-linkbutton" iconCls="icon-ok" onclick="savemm()" type="submit">保存</a>
			<a href="#" class="easyui-linkbutton" iconCls="icon-cancel" onclick="qx()">取消</a>
		</div>
		<div id="dlg2" class="easyui-dialog" buttons="#dlg-buttons2" style="width: 400px;height: 280px;" title="锁定" data-options='closed:true,closable: false'>
			<form id="fm2" method="post">
				<div class="fitem">
					<label>账户：</label>
					<input name="admin" class="easyui-validatebox" required="true" id="ip4">
				</div>
				<div class="fitem">
					<label>密码：</label>
					<input name="pass" class="easyui-validatebox" required="true" id="ip5">
				</div>
			</form>
		</div>
		<div id="dlg-buttons2">
			<a href="#" class="easyui-linkbutton" iconCls="icon-ok" type="submit">提交</a>
		</div>
	</div>
	<script type="text/javascript">
		function tishi(){
			var p1=$('#ip2').val();
			var p2=$('#ip3').val();
			if (p1!=p2) {
				$('#span_1').html('两次不一致');
				$('#span_1').css('color','red');
			}else{
				$('#span_1').html('两次相同');
				$('#span_1').css('color','black');
			}
		}
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
		$('#xg').click(function(){
			$('#dlg').dialog('open');
			$('.fgc').css('z-index',10);
		});
		$('#sd').click(function(){
			$('#dlg2').dialog('open');
			$('.fgc').css('z-index',10);
		});
		function savemm(){
				$.post("admin_mm.php",
					{
						pass:$('#ip1').val(),
						pass1:$('#ip2').val(),
						pass2:$('#ip3').val()
					},
				function(data,status){
					 alert("Data: " + data);
					 if (data=='密码修改成功') {
					 	$('#dlg').dialog('close');
					 	alert('请重新登录');
					 	window.location.href="dl.html";
					 }
				});
		}
		function qx(){
			$('#dlg').dialog('close');
			$('.fgc').css('z-index',-1);
		}
		$("#dlg").dialog({
			onClose: function () {
				$('.fgc').css('z-index',-1);
			}
		});
	</script>
</body>
</html>