<?php
require_once '../include.php';	
checkAdminLogined();
checkIsAdmin();
$rows=getAllDepartment();
if(!$rows){
	alertMes("没有部门分类，请先添加部门！", "addDepartment.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<title>添加员工</title>
<link rel="stylesheet" type="text/css" href="css/reset.css"/>
<link rel="stylesheet" type="text/css" href="css/backstage.css"/>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<style type="text/css">
	#username,#createResult{
		float: left;
	}
	#createResult{
		margin-left: 10px;
	}
</style>
</head>
<body>
	<div class="location">
		当前位置:&nbsp;<a id="first" href="main.php">首页</a>&nbsp;&gt;&nbsp;<a>人事管理</a>&nbsp;&gt;&nbsp;<a href="#" id="third">添加员工</a>
	</div>
	<div class="info_title">
		<h3>添加员工</h3>
	</div>
	<div class="basicinfo_table">
	<form id="formEmp" action="doAdminAction.php?act=addEmployee" method="post" enctype="multipart/form-data">
	<table width="70%" cellpadding="0" cellspacing="0">
		<tr>
			<td class="basicinfo_title">用户名</td>
			<td><input type="text" class="txtinput fl" name="username" id="username" placeholder="请输入员工用户名"/><p id="checkname" class="fl"></p></td>
		</tr>
		<tr>
			<td class="basicinfo_title td_crossline">密码</td>
			<td class="td_crossline" ><input type="password" class="txtinput fl" name="password" /></td>
		</tr>
		<tr>
			<td class="basicinfo_title td_crossline">手机号</td>
			<td class="td_crossline" ><input type="text" class="txtinput fl" name="phone" placeholder="请输入员工手机号"/></td>
		</tr>
		<tr>
			<td class="basicinfo_title td_crossline">性别</td>
			<td class="td_crossline" >
				<div >			
					<input class="fl" type="radio" name="sex" value="1" checked="checked"/><span class="fl">男</span>
					<input class="fl" type="radio" name="sex" value="2" /><span class="fl">女</span>
					<input class="fl" type="radio" name="sex" value="3" /><span class="fl">保密</span>
				</div>
			</td>	
		</tr>
		<tr>
			<td class="basicinfo_title td_crossline">所属部门</td>
			<td class="td_crossline" >
				<select name="d_id" class="txtinput point">
					<?php foreach($rows as $row):?>
					<option value="<?php echo $row['id']; ?>"><?php echo $row['d_name']; ?></option>
					<?php endforeach; ?>
				</select>
			</td>
		</tr>
		<tr>
			<td class="basicinfo_title td_crossline">头像</td>
			<td class="td_crossline" ><input type="file" class="txtinput fl" name="photo" style="border: 0;"/></td>
		</tr>
		<tr>
			<td colspan="2"><input class="btn btn-primary" id="editbtn" type="submit"  value="添加员工"/></td>
		</tr>
	
	</table>
	</form>
	</div>
</body>

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.validate.min.js"></script>
<script>
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
	$(document).ready(function(){
		$("#username").focus();
		$("input[type='text']").change(function(){
			changeFlagTrue()
		});
		$("select").change(function(){
			changeFlagTrue()
		});
		$("textarea").change(function(){
			changeFlagTrue()
		});
		$("#editbtn").click(function(){
			changeFlag=false;//更新标识值
		});
		$("#username").keyup(function(){
				$.ajax({
					type:"post",
					url:"doAdminEcho.php?act=checkEmp",
					data:{
						username:$("#username").val()
					},
					dataType:'json',
					success:function(data){
						if(data.d==1){
							$("#checkname").html("已存在该用户名，请更换");
							$("#checkname").css("color","red");
							$("#editbtn").attr("disabled",true);
						}
						if(data.d==2){
							$("#checkname").html("用户名可用");
							$("#checkname").css("color","green");
							$("#editbtn").attr("disabled",false);
						}
					},
					error:function(jqXHR){
						alert("发生错误"+jqXHR.status);
					}
				});
			
		});
			
		$("#formEmp").validate({
			rules:{
				username:{
					required:true
				},
				password:{
					required:true
				},
				phone:{
					required:true
				}
			},
			messages:{
				username:{
					required:'必填项'
				},
				password:{
					required:'必填项'
				},
				phone:{
					required:'必填项'
				}
			}
		});
	});
</script>
</html>