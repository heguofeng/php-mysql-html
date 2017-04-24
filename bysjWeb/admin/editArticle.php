<?php
require_once '../include.php';
$id=$_REQUEST['id'];
$row=getArticleById($id);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
<title>编辑文章</title>
<link rel="stylesheet" type="text/css" href="css/reset.css"/>
<link rel="stylesheet" type="text/css" href="css/backstage.css"/>
</head>
<body>
	<div class="location">
	当前位置:&nbsp;<a id="first" href="main.php">首页</a>&nbsp;&gt;&nbsp;<a>新闻管理</a>&nbsp;&gt;&nbsp;<a href="#" id="third">编辑文章</a>
	</div>
	<div class="table_all">
		<div class="info_title">
			<h3>编辑文章</h3>
		</div>
		<div class="basicinfo_table">
			<form id="formArticle" name="formArticle" action="doAdminAction.php?act=editArticle&id=<?php echo $id ?>" method="post">
			<table  cellspacing="0" cellpadding="0">	
				<tr><td class="basicinfo_title">标题：</td><td ><input type="text"  name="title" id="title" class="txtinput fl" style="width: 320px;" value="<?php echo $row['title']; ?>"/><p id="checkname" class="fl"></p></td></tr>
				<tr><td class="basicinfo_title td_crossline">作者：</td><td class="td_crossline" ><input type="text" name="author" id="author" class="txtinput" value="<?php echo $row['author']; ?>" /></td></tr>
				<tr><td class="basicinfo_title td_crossline">简介：</td><td class="td_crossline"><textarea name="description" id="description" class="txtarea"><?php echo $row['description']; ?></textarea></td></tr>	
				<tr><td class="basicinfo_title td_crossline">内容：</td><td class="td_crossline"><textarea id="content" name="content" style="width: 80%;height: 200px;"><?php echo $row['content']; ?></textarea></td></tr>				
			</table>
			<button id="btn_add" class="btn_save">修改文章</button>	
			</form>
			
		</div><!--basicinfo_table结束-->	
		<div><p id="createResult_red"></p></div>
		<div><p id="createResult_green"></p></div>
	</div><!--table_all-->		
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.validate.min.js"></script>
<script type="text/javascript" charset="utf-8" src="../plugins/kindeditor/kindeditor.js"></script>	
<script type="text/javascript" charset="utf-8" src="../plugins/kindeditor/lang/zh_CN.js"></script>	
<script type="text/javascript">
$().ready(function(){
	$("#formArticle").validate({
			rules:{
				title:{
					required:true
				}
				
			},
			messages:{
				title:{
					required:'必填项'
				}
			}
		});
		$("#title").focus();
	
});
//调用编辑器
KindEditor.ready(function(K){
	window.editor=K.create('#content');
});
</script>
</body>
</html>
