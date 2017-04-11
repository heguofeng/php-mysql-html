<?php
require_once '../include.php';
if($_REQUEST['id']){
	$id=$_REQUEST['id'];
}
else{
	if(isset($_SESSION['adminId'])){
		$id=$_SESSION['adminId'];
	} elseif (isset($_COOKIE['adminId'])) {
		$id=$_COOKIE['adminId'];
	}
}
$empInfo=getEmpById($id);
//$sql="select e.*,d.d_name from employee e left join department d on d.id=e.d_id where e.id={$id}";
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
<title>个人中心</title>
<link rel="stylesheet" type="text/css" href="css/reset.css"/>
<link rel="stylesheet" type="text/css" href="css/backstage.css"/>
</head>
<body>
	<div class="location">
	当前位置:&nbsp;<a id="first" href="main.php">首页</a>&nbsp;&gt;&nbsp;<a>人事管理</a>&nbsp;&gt;&nbsp;<a href="#" id="third">员工信息</a>
</div>
	<div class="info_preview">
		<div class="info_title prev_title">
			<h3>个人信息<a class="info_title_txt" href="editEmployee.php?id=<?php echo $empInfo['id'] ?>" title="点击修改">修改</a></h3>
		</div>
		<div class="info_list">
			<ul>
			<div class="pic_bigtx">
				<img width="176" height="176" src="../admin/uploads/<?php echo $empInfo['photo']?$empInfo['photo']:'../admin/uploads/sys/login_no.png'; ?>"/>	
				<a id="editTx" class="ghtx" href="editEmployeeTx.php?id=<?php echo $empInfo['id'] ?>">更换头像</a>
			</div>	
				<li><label class="fl">用户名：</label><div class="info_val fl"><?php echo $empInfo['username']; ?></div></li>
				<li><label class="fl">姓名：</label><div class="info_val fl"><?php echo $empInfo['name']; ?></div></li>
				<li><label class="fl">手机号：</label><div class="info_val fl"><?php echo $empInfo['phone']; ?></div></li>
				<li><label class="fl">性别：</label><div class="info_val fl"><?php echo $empInfo['sex']; ?></div></li>
				<li><label class="fl">所属部门：</label><div class="info_val fl"><?php echo $empInfo['d_name']; ?></div></li>
				<li><label class="fl">在职情况：</label><div class="info_val fl"><?php echo $empInfo['isJob']=='1'?"在职":"离职"; ?></div></li>
				<li><label class="fl">权限级别：</label><div class="info_val fl"><?php if($empInfo['isAdmin']=="0"){ echo  '<span> 普通员工 </span>'; }elseif($empInfo['isAdmin']=="1"){ echo '<span style="color:red;"> 系统管理员 </span>'; }elseif($empInfo['isAdmin']=="2"){ echo '<span style="color:#228b22;"> 超级管理员 </span>'; } ?></div></li>
			</ul>
		</div><!--info_list结束-->
	</div>	<!--info_preview结束-->
</body>
</html>
