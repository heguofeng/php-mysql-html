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
<link rel="stylesheet" type="text/css" href="css/reset.css" />
<link rel="stylesheet" type="text/css" href="css/backstage.css"/>
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
	当前位置:&nbsp;<a id="first" href="main.php">首页</a>&nbsp;&gt;&nbsp;<a>人事管理</a>&nbsp;&gt;&nbsp;<a href="#" id="third">添加部门</a>
</div>
<h3 class="biaoti">添加员工</h3>
<form id="formEmp" action="doAdminAction.php?act=addEmployee" method="post" enctype="multipart/form-data">
<table class="edittable" width="70%" cellpadding="0" cellspacing="0">
	<tr>
		<td align="right">用户名</td>
		<td><input type="text" name="username" id="username" placeholder="请输入员工用户名"/><p id="checkname" class="fl"></p></td>
	</tr>
	<tr>
		<td align="right">密码</td>
		<td><input type="password" name="password" /></td>
	</tr>
	<tr>
		<td align="right">手机号</td>
		<td><input type="text" name="phone" placeholder="请输入员工手机号"/></td>
	</tr>
	<tr>
		<td align="right">性别</td>
		<td>
			<div class="radio">			
				<input class="fl" type="radio" name="sex" value="1" checked="checked"/><span class="fl">男</span>
				<input class="fl" type="radio" name="sex" value="2" /><span class="fl">女</span>
				<input class="fl" type="radio" name="sex" value="3" /><span class="fl">保密</span>
			</div>
		</td>	
	</tr>
	<tr>
		<td align="right">所属部门</td>
		<td>
			<select name="d_id">
				<?php foreach($rows as $row):?>
				<option value="<?php echo $row['id']; ?>"><?php echo $row['d_name']; ?></option>
				<?php endforeach; ?>
			</select>
		</td>
	</tr>
	<tr>
		<td align="right">头像</td>
		<td><input type="file" name="photo" style="border: 0;"/></td>
	</tr>
	<tr>
		<td colspan="2"><input class="editbtn fr" id="editbtn" type="submit"  value="添加员工"/></td>
	</tr>

</table>
</form>
</body>

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.validate.min.js"></script>
<script>
	$(document).ready(function(){
	$("#username").focus();
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