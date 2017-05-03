<?php
require_once '../include.php';
$hljbs=getAllhljb();
$xlzks=getAllxlzk();
$hyzks=getAllhyzk();

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
<title>添加用户</title>
<link rel="stylesheet" type="text/css" href="css/reset.css"/>
<link rel="stylesheet" type="text/css" href="css/backstage.css"/>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.validate.min.js"></script>
<script src="../js/My97DatePickerBeta/My97DatePicker/WdatePicker.js"></script>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
</head>
<body>
	<div class="location">
	当前位置:&nbsp;<a id="first" href="main.php">首页</a>&nbsp;&gt;&nbsp;<a>老人管理</a>&nbsp;&gt;&nbsp;<a href="#" id="third">添加用户</a>
	</div>
	<div class="table_all">
		<div class="info_title">
			<h3>添加用户</h3>
		</div>
		<div class="basicinfo_table">
			<form id="formUsers" name="formUsers" action="#" method="post">
			<table  cellspacing="0" cellpadding="0">	
				<tr><td class="basicinfo_title">账号：</td><td ><input type="text"  name="u_username" id="u_username" class="txtinput fl"/><p id="checkname" class="fl"></p></td></tr>
				<tr><td class="basicinfo_title td_crossline">密码：</td><td class="td_crossline" ><input type="password" name="u_pwd" id="u_pwd" class="txtinput"  /></td></tr>
				<tr><td class="basicinfo_title td_crossline">姓名：</td><td class="td_crossline"><input type="text" name="u_name" id="u_name" class="txtinput"  /></td></tr>
				<tr><td class="basicinfo_title td_crossline">性别：</td>
					<td class="td_crossline">
						<select name="u_sex" id="u_sex" class="select_small txtinput">
							<option value="1" >男</option>
							<option value="2" >女</option>
						</select>
					</td>
				</tr>
				<tr><td class="basicinfo_title td_crossline">生日：</td>
					<td class="td_crossline">
						<input type="text" id="u_birth" class="birth txtinput" name="u_birth"   onclick="WdatePicker({onpicked:changeFlagTrue(),minDate: '1900-01-01',startDate:'1980-01-01' })">
					</td>
				</tr>
				<tr><td class="basicinfo_title td_crossline">民族：</td>
					<td class="td_crossline"><input type="text" class="txtinput" name="u_mz" id="u_mz" /></td>
				</tr>
				<tr><td class="basicinfo_title td_crossline">学历状况：</td>
					<td class="td_crossline">
						<select name="u_xlzk" class="select_small txtinput" id="u_xlzk">
							<?php foreach($xlzks as $xlzk): ?>
							<option value="<?php echo $xlzk['id']; ?>" ><?php echo $xlzk['xlzk']; ?></option>
							<?php endforeach; ?>
						</select>
					</td>
				</tr>
				<tr><td class="basicinfo_title td_crossline">婚烟状况：</td>
					<td class="td_crossline">
						<select name="u_hyzk" class="select_small txtinput" id="u_hyzk">
							<?php foreach($hyzks as $hyzk): ?>
							<option value="<?php echo $hyzk['id']; ?>" ><?php echo $hyzk['hyzk']; ?></option>
							<?php endforeach; ?>
						</select>
					</td>
				</tr>
				<tr><td class="basicinfo_title td_crossline">护理级别：</td>
					<td class="td_crossline">
						<select name="u_hljb" class="select_big txtinput" id="u_hljb">
							<?php foreach($hljbs as $hljb): ?>
							<option value="<?php echo $hljb['id']; ?>"><?php echo $hljb['hljb']; ?></option>
							<?php endforeach; ?>
						</select>
					</td>
				</tr>
				<tr><td class="basicinfo_title td_crossline">手机号码：</td>
					<td class="td_crossline"><input type="text" class="txtinput" name="u_phone" id="u_phone"  /></td>
				</tr>	
			</table>
			</form>
			<button id="btn_add" class="btn btn-primary">添加用户</button>
			
		</div><!--basicinfo_table结束-->	
		<div><p id="createResult_red"></p></div>
		<div><p id="createResult_green"></p></div>
	</div><!--table_all-->		
<script type="text/javascript" src="../plugins/dialog.js"></script>		
<script type="text/javascript">
	var changeFlag=false;//标识文本框值是否改变，为true，标识已变
	function changeFlagTrue(){
		changeFlag=true;
	}
		//当页面刷新或者离开时，警告提示
	window.onbeforeunload = function(event) {
		if (changeFlag==true) {
		    event.returnValue = "我在这写点东西...";
		}
	}
$().ready(function(){
	$("input[type='text']").change(function(){
			changeFlagTrue()
		});
		$("select").change(function(){
			changeFlagTrue()
		});
	$("#btn_add").click(function(){
		changeFlag=false;//更新标识值
		var flag=$("#formUsers").valid();
		if(flag){
			//过渡中的提示框
		    var d1= dialog({
				content:'<span class=\'save_start\'>正在保存您的信息。</span>'
			});
			$(document).ajaxStart(function(){
				d1.show();					 
			});
			$.ajax({
				type:"post",
				url:"doAdminEcho.php?act=addUsers",
				data:{
					u_username:$("#u_username").val(),
					u_pwd:$("#u_pwd").val(),
					u_name:$("#u_name").val(),
					u_sex:$("#u_sex").val(),
					u_birth:$("#u_birth").val(),
					u_mz:$("#u_mz").val(),
					u_xlzk:$("#u_xlzk").val(),
					u_hyzk:$("#u_hyzk").val(),
					u_hljb:$("#u_hljb").val(),
					u_phone:$("#u_phone").val()
				},
				dataType:"json",
				success:function(data){
					if(data.success){
						d1.close().remove();//关闭中间过度动画
						var d= dialog({
							content:'<span class=\'save_success\'>'+data.msg+'</span>'
						});
						d.show();
						setTimeout(function(){
							d.close().remove();
						},2500);
					}
					else{
						d1.close().remove();//关闭中间过度动画
						var d= dialog({
							content:'<span class=\'save_failed\'>'+data.msg+'</span>'
						});
						d.show();
						setTimeout(function(){
							d.close().remove();
						},3000);
					}
				},
				error:function(jqXHR){
					alert("发生错误:"+jqXHR.status);
				}
			});
		}
	});
	$("#formUsers").validate({
			rules:{
				u_username:{
					required:true
				},
				u_pwd:{
					required:true
				}
			},
			messages:{
				u_username:{
					required:'必填项'
				},
				u_pwd:{
					required:'必填项'
				}
			}
		});
		$("#u_username").focus();
		$("#u_username").keyup(function(){
				$.ajax({
					type:"post",
					url:"doAdminEcho.php?act=checkUsers",
					data:{
						u_username:$("#u_username").val()
					},
					dataType:'json',
					success:function(data){
						if(data.d==1){
							$("#checkname").html("已存在该用户名，请更换");
							$("#checkname").css("color","red");
							$("#btn_add").attr("disabled",true);
						}
						if(data.d==2){
							$("#checkname").html("用户名可用");
							$("#checkname").css("color","green");
							$("#btn_add").attr("disabled",false);
						}
					},
					error:function(jqXHR){
						alert("发生错误"+jqXHR.status);
					}
				});
			
	});
	
});
</script>
</body>
</html>
