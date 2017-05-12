<?php
require_once '../include.php';
$id=$_REQUEST['id'];
$act=$_REQUEST['act'];
if($act=="save_pi"){
	$mes=save_pi($id);
}

function save_pi($id){
	$arr=$_POST;
	if (update("lbn_users", $arr, "id={$id}")) {
		$mes = "修改成功!<br/><a href='listArticle.php'>查看文章列表</a>";
	} else {
		$mes = "修改失败!<br/><a href='listArticle.php'>请重新修改</a>";
	}
	return $mes;
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>中转页面</title>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<style>
	.redd{
		font-size: 22px;
		margin: 14px;
	}
</style>
</head>
<body>
<?php 
	if($mes){
		echo "<div class='redd'>".$mes."</div>";
//		echo "<script>window.location='addBed.php';</script>";
	}
?>
</body>
</html>