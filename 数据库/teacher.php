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
		input{height: 30px;border-radius: 5px;}
		.fitem{margin-top: 20px;}
		#qr{margin-left: 35px;}
		.fgc{width: 100%;height: 625px;position: absolute;background-color: #eee;z-index: -1;opacity: 0.5;}
	</style>
</head>
<body>
	<div class="fgc"></div>
	<div class="easyui-layout" style="width: 100%;height: 625px;" id="ly">
		<div region="north" style="height: 64px" id="north">
			<img src="1.png">
			<p>
				<?php
					session_start();
					echo $_SESSION['Ename'];
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
		<div region="west" title="教师系统"  data-options="collapsible:false" style="width: 120px">
			<div class="easyui-accordion">
				<div style="width: 120px" title="个人信息管理">
					<a href="#" id="aa" class="easyui-linkbutton" onclick="showTab('个人信息','t_xxquery.php')">个人信息</a>
					<a href="#" id="aa" class="easyui-linkbutton" onclick="showTab('修改密码','t_mm.html')">修改密码</a>
				</div>				
				<div style="width: 120px" title="课程信息管理">
					<a href="#" id="aa" class="easyui-linkbutton" onclick="showTab('开课申请','class_open.html')">开课申请</a>
					<a href="#" id="aa" class="easyui-linkbutton" onclick="showTab('班级查询','class_select.html')">班级查询</a>
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
						<input name="pass3" class="easyui-passwordbox" prompt="Password" required="true id="ip3" iconWidth="28">
						<!-- <span id="span_1">*</span> -->
					</div>
				</form>
			</div>
			<div id="dlg-buttons">
				<a href="#" class="easyui-linkbutton" iconCls="icon-ok" onclick="savemm()" type="submit">保存</a>
				<a href="#" class="easyui-linkbutton" iconCls="icon-cancel" onclick="qx()">取消</a>
			</div>
		<div region="center" style="width: 100%">
			<div class="easyui-tabs" id="tt">
				<div title="首页">
					<iframe scrolling="auto" src="admin_shouye.php" style="width:100%;height:510px;"></iframe>
				</div>
			</div>
		</div>
	</div>
</body>
	<script type="text/javascript">
		function showTab(title,url){
			if ($('#tt').tabs('exists',title)) {
				$('#tt').tabs('select',title);
			}else{
				var content='<iframe scrolling="auto" src="'+url+'" style="width:100%;height:500px;"></iframe>';
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
		$("#dlg").dialog({
			onClose: function () {
				$('.fgc').css('z-index',-1);
			}
		});
		function qx(){
			$('#dlg').dialog('close');
			$('.fgc').css('z-index',-1);
		}
		// $.extend($.fn.passwordbox.defaults.rules, {    
  //   /*必须和某个字段相等*/  
		//     equalTo: {  
		//         validator:function(value,param){  
		//             return $(param[0]).val() == value;  
		//         },  
		//         message:'字段不匹配'  
  //   		}              
		// }); 
	</script>
</html>