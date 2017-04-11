<?php
require_once '../include.php';
$id=$_REQUEST['id'];
if($id){
	$sql="SELECT u.*, hl.hljb, hy.hyzk, xl.xlzk FROM users u LEFT JOIN dic_hljb hl ON hl.id = u.u_hljb LEFT JOIN dic_hyzk hy ON hy.id = u.u_hyzk LEFT JOIN dic_xlzk xl ON xl.id = u.u_xlzk WHERE u.id = {$id}";
	$userInfo=fetchOne($sql);
}	
$hljbs=getAllhljb();
$xlzks=getAllxlzk();
$hyzks=getAllhyzk();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
<title>详细信息</title>
<link rel="stylesheet" type="text/css" href="css/reset.css"/>
<link rel="stylesheet" type="text/css" href="css/backstage.css"/>
</head>
<body>
	<div class="location">
		当前位置:&nbsp;<a id="first" href="main.php">首页</a>&nbsp;&gt;&nbsp;<a>老人管理</a>&nbsp;&gt;&nbsp;<a href="#" id="third">详细信息</a>
	</div>
	<div class="info_preview">
		<div class="info_title prev_title">
			<h3>详细信息<a class="info_title_txt" href="editUsers.php?id=<?php echo $userInfo['id'] ?>" title="点击修改">修改</a></h3>
		</div>
		<div class="info_list">
			<ul>
			<div class="pic_bigtx">
				<img width="176" height="176" src="../upload/<?php echo $userInfo['u_photo']?$userInfo['u_photo']:'/sys/login_no.png'; ?>"/>	
				<a id="editTx" class="ghtx" href="editUsersTx.php?id=<?php echo $userInfo['id'] ?>">更换头像</a>
			</div>	
				<li><label class="fl">姓名：</label><div class="info_val fl"><?php echo $userInfo['u_name']; ?></div></li>
				<li><label class="fl">性别：</label><div class="info_val fl"><?php echo $userInfo['u_sex']; ?></div></li>
				<li><label class="fl">生日：</label><div class="info_val fl"><?php echo $userInfo['u_birth']; ?></div></li>
				<li><label class="fl">民族：</label><div class="info_val fl"><?php echo $userInfo['u_mz']; ?></div></li>
				<li><label class="fl">学历状况：</label><div class="info_val fl"><?php echo $userInfo['xlzk']; ?></div></li>
				<li><label class="fl">婚烟状况：</label><div class="info_val fl"><?php echo $userInfo['hyzk']; ?></div></li>
				<li><label class="fl">护理级别：</label><div class="info_val fl"><?php echo $userInfo['hljb']; ?></div></li>
				<li><label class="fl">手机号码：</label><div class="info_val fl"><?php echo $userInfo['u_phone']; ?></div></li>
			</ul>
		</div><!--info_list结束-->
	</div>	<!--info_preview结束-->
</body>
</html>
