<?php
require_once '../include.php';	
if(isset($_SESSION['adminId'])){
	$id= $_SESSION['adminId'];
}elseif(isset($_COOKIE['adminId'])){
	$id= $_COOKIE['adminId'];
} 
$row=getEmpById($id);
//print_r($row);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<title>我要请假</title>
<link rel="stylesheet" type="text/css" href="css/reset.css" />
<link rel="stylesheet" type="text/css" href="css/backstage.css"/>
</head>
<body>
<div class="location">
	当前位置:&nbsp;<a id="first" href="main.php">首页</a>&nbsp;&gt;&nbsp;<a>人事管理</a>&nbsp;&gt;&nbsp;<a href="#" id="third">我要请假</a>
</div>
<h3 class="biaoti">我要请假</h3>
<form id="formLeave" name="formLeave" action="doAdminAction.php?act=addLeave&id=<?php echo $id ?>" method="post">
<table class="edittable" width="70%" cellpadding="0" cellspacing="0">
	<tr>
		<td align="right">员工账号</td>
		<td><input type="text" name="username" disabled="true" value="<?php echo $row['username'] ?>"/></td>
	</tr>
	<tr>
		<td align="right">员工姓名</td>
		<td><input type="text" name="name" disabled="true" value="<?php echo $row['name'] ?>"/></td>
	</tr>
	<tr>
		<td align="right">请假开始日期</td>
		<td>
			<input type="text" name="startTime" class="date" onclick="WdatePicker()">
		</td>
	</tr>
	<tr>
		<td align="right">请假结束日期</td>
		<td>
			<input type="text" name="finishTime" class="date" onclick="WdatePicker()">
		</td>
	</tr>
	<tr>
		<td align="right">请假原因</td>
		<td><textarea name="reason" class="reason" id="reason" placeholder="为什么请假？"></textarea></td>
	</tr>
	<tr>
		<td colspan="2"><input type="submit" class="editbtn fr"  value="提交"/> </td>
	</tr>
</table>
</form>
</body>

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.validate.min.js"></script>
<script src="../js/My97DatePickerBeta/My97DatePicker/WdatePicker.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
    	$("#reason").focus();
       $("#formLeave").validate({
            rules: {
                username: {
                    required: true
                },
				name: {
				    required: true
			    },
			    startTime:{
			    	required:true
			    },
			    finishTime:{
			    	required:true
			    },
			    reason:{
			    	required:true
			    }
			 
            },
            messages: {
                username: {
                    required: "请输入用户名"
                },
				name: {
				    required: '请输入名字'
			   },
			    startTime:{
			    	required:'请选择开始日期'
			    },
			    finishTime:{
			    	required:'请选择结束日期'
			    },
			    reason:{
			    	required:'请假原因不可少'
			    }
            }
        });
    });
</script>
</html>