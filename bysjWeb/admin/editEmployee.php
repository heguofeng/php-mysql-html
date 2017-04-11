<?php 
require_once '../include.php';
$id=$_REQUEST['id'];
$rows=getAllDepartment();
if(!$rows){
	alertMes("没有相应的部门分类，请先添加！", "addDepartment.php");
}
$empInfo=getEmpById($id);
//print_r($empInfo);
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>编辑员工</title>
<link rel="stylesheet" type="text/css" href="css/reset.css"/>
<link rel="stylesheet" type="text/css" href="css/backstage.css"/>
</head>
<body>
<div class="location">
	当前位置:&nbsp;<a id="first" href="main.php">首页</a>&nbsp;&gt;&nbsp;<a>人事管理</a>&nbsp;&gt;&nbsp;<a href="#" id="third">编辑员工</a>
</div>
<h3 class="biaoti">编辑员工</h3>
<form id="formEmp" action="doAdminAction.php?act=editEmployee&id=<?php echo $id;?>" method="post" enctype="multipart/form-data">
<table class="edittable" width="70%" cellpadding="0" cellspacing="0" >
	<tr>
		<td align="right">员工用户名</td>
		<td><input type="text" name="username" id="username" value="<?php echo $empInfo['username'];?>" placeholder="<?php echo $empInfo['username'];?>"/></td>
	</tr>
	<tr>
		<td align="right">密码</td>
		<td><input type="password" name="password"/></td>
	</tr>
	<tr>
		<td align="right">姓名</td>
		<td><input type="text" name="name" value="<?php echo $empInfo['name'];?>" placeholder="<?php echo $empInfo['name'];?>"/></td>
	</tr>
	<tr>
		<td align="right">手机号</td>
		<td><input type="text" name="phone" value="<?php echo $empInfo['phone'];?>" placeholder="<?php echo $empInfo['phone'];?>"/></td>
		
	</tr>
	<tr>
		<td align="right">性别</td>
		<td>
			<div class="radio">	
				<input type="radio" class="fl" name="sex" value="1"  <?php echo $empInfo['sex']=="男"?"checked='checked'":null;?>/><span class="fl">男</span>
				<input type="radio" class="fl" name="sex" value="2" <?php echo $empInfo['sex']=="女"?"checked='checked'":null;?>/><span class="fl">女</span>
				<input type="radio" class="fl" name="sex" value="3" <?php echo $empInfo['sex']=="保密"?"checked='checked'":null;?>/><span class="fl">保密</span>
			</div>
		</td>
	</tr>
	<tr>
		<td align="right">所属部门</td>
		<td>
			<select name="d_id">
				<?php foreach($rows as $row):?>
				<option value="<?php echo $row['id'];?>" <?php echo $row['id']==$empInfo['d_id']?"selected='selected'":null;?>><?php echo $row['d_name'];?></option>
				<?php endforeach; ?>
			</select>
		</td>
	</tr>
	<tr>
		<td align="right">在职情况</td>
		<td>
			<div class="radio">	
				<input type="radio" class="fl" name="isJob" value="1"  <?php echo $empInfo['isJob']=="1"?"checked='checked'":null;?>/><span class="fl">在职</span>
				<input type="radio" class="fl" name="isJob" value="2"  <?php echo $empInfo['isJob']=="2"?"checked='checked'":null;?>/><span class="fl">离职</span>
			</div>
		</td>
	</tr>
	<tr>
		<td colspan="2"><input type="submit" class="editbtn fr" value="编辑"/></td>
	</tr>

</table>
</form>
</body>

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.validate.min.js"></script>
<script>
	$(document).ready(function(){
		$("#username").focus();
		$("#formEmp").validate({
			rules:{
				username:{
					required:true
				},
				password:{
					required:true
				},
				name:{
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
				name:{
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