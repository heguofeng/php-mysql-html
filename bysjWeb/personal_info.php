<?php
require_once 'include.php';
checkUserLogined();
if (isset($_SESSION['userId'])) {
	$id=$_SESSION['userId'];
} elseif (isset($_COOKIE['userId'])) {
	$id=$_COOKIE['userId' ];
	}
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
<title>个人中心</title>
<link rel="stylesheet" type="text/css" href="css/reset.css"/>
<link rel="stylesheet" type="text/css" href="css/main.css"/>
<script type="text/javascript" src="js/jquery.min.js"></script>
</head>
<body>
	<div class="top">
		<div class="top_content">
			<a href="admin/index.php" class="backstage">进入后台管理系统</a>
			<?php if($_SESSION['userId']):?>
			<ul class="top_content_user">
				<li>
					<span>欢迎您</span>
				</li>	
				<li class="top_content_nav">
					<div id="pic_tx">
						<img alt="我的头像" width="20" height="20" src="upload/<?php echo $userInfo['u_photo']?$userInfo['u_photo']:'/sys/login_no.png'; ?>" />
					</div>
					<a class="user" href="javascript:;"><?php echo $userInfo['u_name']?$userInfo['u_name']: $userInfo['u_username'];?></a>
						<div class="userCard">
							<a href="personal_info.php">个人中心</a>
							<a href="doLogin.php?act=userOut">退出</a>
						</div>
				</li>
			</ul>
			<?php else:?>
			<ul class="top_content_r">
				<li><a href="login.html">请登录</a></li>
				<li><a class="top_zc" href="reg.html">注册</a></li>
			</ul>
			<?php endif;?>
		</div>
	</div>	
	<!--页面顶部top结束-->
	<div class="wrap_logo">
	<div class="logo">
			<div class="logo_left"><a href="#"><img src="images/logo.png"/></a> </div>
			<div class="logo_right"><img src="images/tel.jpg" width="28" height="28" />24小时服务热线：<span class="tel">158-8827-4549</span></div>
	</div>
	</div>
	<!--logo结束-->
	<div class="nav">
		<div class="nav_mid">
				<ul>
					<li><a href="index.php">首页</a></li>
					<li><a href="nav_about.php">关于养老院</a></li>
					<li><a href="#">服务特色</a></li>
					<li><a href="#">保健常识</a></li>
					<li><a href="#">环境设施</a></li>
					<li><a class="charges" href="javascript:;">收费标准</a></li>
					<li><a href="#">人才招聘</a></li>
					<li><a href="personal_info.php">个人中心</a></li>
				</ul>
		</div>
		<!--nav_mid结束-->
	</div>
	  <!--nav结束-->
	<div class="wrap bor">	
	<div><img src="images/diying.jpg" width="100%" height="20px"></div><!--中间小横线-->
	<div class="content">
		<div class="content_l">
			<div class="content_l_list">
				<ul>
					<div class="pic_bigtx">
						<img width="176" height="176" src="upload/<?php echo $userInfo['u_photo']?$userInfo['u_photo']:'/sys/login_no.png'; ?>"/>	
						<a id="editTx" class="ghtx" href="javascript:;">更换头像</a>
					</div>						
					<li><a id="personal" href="personal_info.php">个人中心<span>About Us</span></a></li>
					<li><a id="editmsg" href="javascript:;">修改信息<span>Services</span></a></li>
					<li><a id="editpwd" href="javascript:;">修改密码<span>Knowledge</span></a></li>						
				</ul>
			</div>
		</div>
		<div class="content_right">
			<div class="info_preview">
				<div class="info_title prev_title">
					<h3>个人信息<a class="info_title_txt" href="javascript:;" title="点击修改">修改</a></h3>
				</div>
				<div class="info_list">
					<ul>
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
		</div><!--content_r结束-->	
	</div>
	<!--content结束-->
	</div>
	<!--wrap结束-->
	<div class="footer">
		<div class="footer_a"></div>
		<div class="footer_b">
			<div class="footer_b_text">
				<p>CopyRight © 2017 温州快乐养老院版权所有</p>
			</div>
		</div>
	</div>
</body>
<script type="text/javascript" src="js/content.js"></script>
</html>
