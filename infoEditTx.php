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
<link rel="stylesheet" type="text/css" href="css/reset.css"/>
<link rel="stylesheet" type="text/css" href="css/main.css"/>
<script type="text/javascript" src="js/jquery.min.js"></script>
<style>
	#rfFrame{
		border: 0;
	}
</style>
</head>
<body>
	<div class="table_all">
		<div class="info_title">
			<h3>修改头像</h3>
		</div>	
			<div class="basicinfo_table">
				<form id="formP" name="formP" action="doUserAction.php?act=editTx&id=<?php echo $id ?>" method="post" enctype="multipart/form-data">
				<table  cellspacing="0" cellpadding="0">
					<tr><td class="basicinfo_title">新头像：</td><td ><input type="file" name="u_photo" id="u_photo" /></td></tr>					
				</table>
				<input type="submit" id="btn_editTx" class="btn_save" value="修改" />				
				</form>			
				　<iframe id="rfFrame" name="rfFrame" src="about:blank" >
				</iframe> 	
			</div><!--basicinfo_table结束-->	
			
	</div><!--table_all-->		
			
<script type="text/javascript">
$().ready(function(){
	$("#formP").attr("target","rfFrame");
});
</script>
</body>
</html>
