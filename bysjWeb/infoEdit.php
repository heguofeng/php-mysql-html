<?php
require_once 'include.php';
$hljbs=getAllhljb();
$xlzks=getAllxlzk();
$hyzks=getAllhyzk();
if (isset($_SESSION['userId'])) {
	$id=$_SESSION['userId'];
} elseif (isset($_COOKIE['userId'])) {
	$id=$_COOKIE['userId' ];
	}
$userInfo=getUserById($id);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
<title>个人中心</title>
<link rel="stylesheet" type="text/css" href="css/reset.css"/>
<link rel="stylesheet" type="text/css" href="css/main.css"/>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script src="js/My97DatePickerBeta/My97DatePicker/WdatePicker.js"></script>
</head>
<body>
	<div class="table_all">
		<div class="info_title">
			<h3>个人信息<a class="info_title_txt" href="personal_info.php" title="点击预览">预览</a></h3>
		</div>
		<div class="basicinfo_table">
			<table  cellspacing="0" cellpadding="0">
				<tr><td class="basicinfo_title">姓名：</td><td ><input type="text" name="u_name" id="u_name" class="txtinput" value="<?php echo $userInfo['u_name'] ?>" /></td></tr>
				<tr><td class="basicinfo_title td_crossline">性别：</td>
					<td class="td_crossline">
						<select name="u_sex" id="u_sex" class="select_small">
							<option value="1" <?php echo $empInfo['u_sex']=="1"?"selected='selected'":null; ?>>男</option>
							<option value="2" <?php echo $empInfo['u_sex']=="2"?"selected='selected'":null; ?>>女</option>
						</select>
					</td>
				</tr>
				<tr><td class="basicinfo_title td_crossline">生日：</td>
					<td class="td_crossline">
						<input type="text" id="u_birth" class="birth" name="u_birth" value="<?php echo $userInfo['u_birth'] ?>" onclick="WdatePicker({minDate: '1900-01-01',startDate:'1980-01-01' })">
					</td>
				</tr>
				<tr><td class="basicinfo_title td_crossline">民族：</td>
					<td class="td_crossline"><input type="text" class="txtinput" name="u_mz" id="u_mz" value="<?php echo $userInfo['u_mz'] ?>"  /></td>
				</tr>
				<tr><td class="basicinfo_title td_crossline">学历状况：</td>
					<td class="td_crossline">
						<select name="u_xlzk" class="select_small" id="u_xlzk">
							<?php foreach($xlzks as $xlzk): ?>
							<option value="<?php echo $xlzk['id']; ?>" <?php echo $xlzk['id']==$userInfo['u_xlzk']?"selected='selected'":null; ?>><?php echo $xlzk['xlzk']; ?></option>
							<?php endforeach; ?>
						</select>
					</td>
				</tr>
				<tr><td class="basicinfo_title td_crossline">婚烟状况：</td>
					<td class="td_crossline">
						<select name="u_hyzk" class="select_small" id="u_hyzk">
							<?php foreach($hyzks as $hyzk): ?>
							<option value="<?php echo $hyzk['id']; ?>" <?php echo $hyzk['id']==$userInfo['u_hyzk']?"selected='selected'":null; ?>><?php echo $hyzk['hyzk']; ?></option>
							<?php endforeach; ?>
						</select>
					</td>
				</tr>
				<tr><td class="basicinfo_title td_crossline">护理级别：</td>
					<td class="td_crossline">
						<select name="u_hljb" class="select_big" id="u_hljb">
							<?php foreach($hljbs as $hljb): ?>
							<option value="<?php echo $hljb['id']; ?>" <?php echo $hyzk['id']==$userInfo['u_hljb']?"selected='selected'":null; ?>><?php echo $hljb['hljb']; ?></option>
							<?php endforeach; ?>
						</select>
					</td>
				</tr>
				<tr><td class="basicinfo_title td_crossline">手机号码：</td>
					<td class="td_crossline"><input type="text" class="txtinput" name="u_phone" id="u_phone" value="<?php echo $userInfo['u_phone']; ?>"  /></td>
				</tr>
			</table>
			<button id="btn_save" class="btn_save">保存</button>
		</div><!--basicinfo_table结束-->	
		<div><p id="createResult_red"></p></div>
		<div><p id="createResult_green"></p></div>
	</div><!--table_all-->		
		
<script type="text/javascript">
$().ready(function(){
	$("#btn_save").click(function(){
		$.ajax({
			type:"post",
			url:"doUserAction.php?act=save&id=<?php echo $id ?>",
			data:{
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
					$("#createResult_green").html(data.msg);
					$("#createResult_green").css("display","block");
					$("#createResult_red").css("display","none");
					setTimeout(function(){
						$("#createResult_green").css("display","none");
					},2000);
				}
				else{
					$("#createResult_red").html(data.msg);
					$("#createResult_red").css("display","block");
					$("#createResult_green").css("display","none");
				}
			},
			error:function(jqXHR){
				alert("发生错误:"+jqXHR.status);
			},
		});
	});
});
</script>
</body>
</html>
