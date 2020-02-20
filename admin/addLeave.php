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
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
</head>
<body>
<div class="location">
	当前位置:&nbsp;<a id="first" href="main.php">首页</a>&nbsp;&gt;&nbsp;<a>人事管理</a>&nbsp;&gt;&nbsp;<a href="#" id="third">我要请假</a>
</div>
<div class="info_title">
	<h3>我要请假</h3>
</div>
<div class="basicinfo_table">
<form id="formLeave" name="formLeave" action="doAdminAction.php?act=addLeave&id=<?php echo $id ?>" method="post">
<table width="70%" cellpadding="0" cellspacing="0">
	<tr>
		<td class="basicinfo_title" style="width: 100px;">员工账号</td>
		<td><input type="text" class="txtinput fl" name="username" disabled="true" value="<?php echo $row['username'] ?>"/></td>
	</tr>
	<tr>
		<td class="basicinfo_title td_crossline">员工姓名</td>
		<td class="td_crossline"><input type="text" class="txtinput fl" name="name" disabled="true" value="<?php echo $row['name'] ?>"/></td>
	</tr>
	<tr>
		<td class="basicinfo_title td_crossline">请假开始日期</td>
		<td class="td_crossline">
			<input type="text"  name="startTime" class="date txtinput"  onclick="WdatePicker({onpicked:changeFlagTrue()})">
		</td>
	</tr>
	<tr>
		<td class="basicinfo_title td_crossline">请假结束日期</td>
		<td class="td_crossline">
			<input type="text" name="finishTime" class="date txtinput" onclick="WdatePicker({onpicked:changeFlagTrue()})">
		</td>
	</tr>
	<tr>
		<td class="basicinfo_title td_crossline">请假原因</td>
		<td class="td_crossline"><textarea name="reason" class="txtarea" id="reason" placeholder="为什么请假？"></textarea></td>
	</tr>
	<tr>
		<td colspan="2"><input type="submit" class="btn btn-primary"  value="提交"/> </td>
	</tr>
</table>
</form>
</div>
</body>

<script type="text/javascript" src="js/jquery.validate.min.js"></script>
<script src="../js/My97DatePickerBeta/My97DatePicker/WdatePicker.js"></script>
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
    $(document).ready(function () {
    	$("#reason").focus();
    	$("textarea").change(function(){
			changeFlagTrue()
		});
		$(".btn").click(function(){
			changeFlag=false;//更新标识值
		});
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