<?php
require_once '../include.php';
$id=$_REQUEST['id'];
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
<title>个人中心</title>
<link rel="stylesheet" type="text/css" href="css/reset.css"/>
<link rel="stylesheet" type="text/css" href="css/backstage.css"/>
<script type="text/javascript" src="js/jquery.min.js"></script>
<style>
	#rfFrame{
		border: 0;
	}
</style>
</head>
<body>
	<div class="location">
		当前位置:&nbsp;<a id="first" href="main.php">首页</a>&nbsp;&gt;&nbsp;<a>老人管理</a>&nbsp;&gt;&nbsp;<a href="#" id="third">更换头像</a>
	</div>
	<div class="table_all">
		<div class="info_title">
			<h3>修改头像<a class="info_title_txt" href="detialUsers.php?id=<?php echo $id ?>" title="点击预览">预览</a></h3>
		</div>	
			<div class="basicinfo_table">
				<form id="formP" name="formP" action="../doUserAction.php?act=editTx&id=<?php echo $id ?>" method="post" enctype="multipart/form-data">
				<table  cellspacing="0" cellpadding="0">
					<tr><td class="basicinfo_title">新头像：</td><td ><input type="file" name="u_photo" id="u_photo" /></td></tr>					
				</table>
				<input type="submit" id="btn_editTx" class="btn_save" value="修改" />				
				</form>			
				　<iframe id="rfFrame" name="rfFrame" src="about:blank" ></iframe> 	
			</div><!--basicinfo_table结束-->	
	</div><!--table_all-->		
			
<script type="text/javascript">
$().ready(function(){
	$("#formP").attr("target","rfFrame");
});
</script>
</body>
</html>
