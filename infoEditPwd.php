<?php
require_once 'include.php';
if (isset($_SESSION['userId'])) {
	$id=$_SESSION['userId'];
} elseif (isset($_COOKIE['userId'])) {
	$id=$_COOKIE['userId' ];
	}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
<title>个人中心</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/reset.css"/>
<link rel="stylesheet" type="text/css" href="css/main.css"/>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.validate.min.js"></script>
</head>
<body>
	<div class="table_all">
		<div class="info_title">
			<h3>修改密码</h3>
		</div>	
			<div class="basicinfo_table">
				<form id="formP" name="formP" action="" method="post">	
					<table  cellspacing="0" cellpadding="0">
						<tr><td class="basicinfo_title">原密码：</td><td ><input type="password" name="u_pwd" id="u_pwd" class="txtinput"   /></td></tr>
						<tr><td class="basicinfo_title">新密码：</td><td ><input type="password" name="u_newPwd" id="u_newPwd" class="txtinput"  /></td></tr>				
						<tr><td class="basicinfo_title">确认密码：</td><td ><input type="password" name="u_conPwd" id="u_conPwd" class="txtinput" /></td></tr>
					</table>
				</form>
				<button id="btn_editPwd" class="btn_save">修改</button>
			</div><!--basicinfo_table结束-->	
			<div><p id="createResult_red"></p></div>
			<div><p id="createResult_green"></p></div>
	</div><!--table_all-->		
		
<script type="text/javascript">
$().ready(function(){
	$("#u_pwd").focus();
	$("#btn_editPwd").click(function(){
		var flag=$("#formP").valid();
		if(flag){
			$.ajax({
				type:"post",
				url:"doUserAction.php?act=editPwd&id=<?php echo $id ?>",
				data:{
					u_pwd:$("#u_pwd").val(),
					u_newPwd:$("#u_newPwd").val(),
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
					}else{
						$("#createResult_red").html(data.msg);
						$("#createResult_red").css("display","block");
						$("#createResult_green").css("display","none");
					}
				},
				error:function(jqXHR){
					alert("发生错误"+jqXHR.status);
				}
			});
		}
	});
	$("#formP").validate({
		rules:{
			u_pwd:{
				required:true,
				minlength:2,
				maxlength:20
			},
			u_newPwd:{
				required:true,
				minlength:2,
				maxlength:20
			},
			u_conPwd:{
				required:true,
				minlength:2,
				maxlength:20,
				equalTo:"#u_newPwd"
			}
		},
		messages:{
			u_pwd:{
				required:'请输入密码',
				minlength:"密码不能小于2个字符",
				maxlength:"密码不能多于20个字符"
			},
			u_newPwd:{
				required:'请输入新密码',
				minlength:"新密码不能小于2个字符",
				maxlength:"新密码不能多于20个字符"
			},
			u_conPwd:{
				required:'请输入确认密码',
				minlength:"密码不能小于2个字符",
				maxlength:"密码不能多于20个字符",
				equalTo:"两次输入密码不一致"
			}
		}
	});
	
});
</script>
</body>
</html>
