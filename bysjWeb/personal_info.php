<?php
require_once 'include.php';
checkUserLogined();
if (isset($_SESSION['userId'])) {
	$id=$_SESSION['userId'];
} elseif (isset($_COOKIE['userId'])) {
	$id=$_COOKIE['userId' ];
	}
if($id){
	$sql="SELECT u.*, hl.hljb, hy.hyzk, xl.xlzk,b.bed_id,b.room_id,b.floor_id,b.building_id FROM users u LEFT JOIN dic_hljb hl ON hl.id = u.u_hljb LEFT JOIN dic_hyzk hy ON hy.id = u.u_hyzk LEFT JOIN dic_xlzk xl ON xl.id = u.u_xlzk left join bed b on b.user_id=u.id WHERE u.id = {$id}";
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
<link rel="shortcut icon" href="images/favicon.ico"/><!--加图标-->
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/reset.css"/>
<link rel="stylesheet" type="text/css" href="css/main.css"/>
<script type="text/javascript" src="js/jquery.min.js"></script>
</head>
<body>
	<div class="top">
		<div class="top_content">
			<div class="top_content_l">
				<a href="admin/index.php" target="_blank" class="backstage">进入后台管理系统</a>
			</div>
			<?php if($userInfo['id']):?>
			<ul class="top_content_user">
				<li>
					<span>欢迎您</span>
				</li>	
				<li class="top_content_nav">
					<div id="pic_tx">
						<img alt="我的头像" width="20" height="20" src="upload/<?php echo $userInfo['u_photo']?$userInfo['u_photo']:'/sys/login_no.png'; ?>" />
					</div>
					<a class="user" href="javascript:;"><?php echo $userInfo['u_name']?$userInfo['u_name']:$userInfo['u_username'];?><i class="user_ico"></i></a>
						<div class="userCard">
							<a href="personal_info.php">个人中心</a>
							<a href="doUserAction.php?act=userOut">退出</a>
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
			<div class="logo_left"><a href="#"><img src="images/logo.gif"/></a> </div>
			<div class="logo_right"><img src="images/tel.jpg" width="28" height="28" />24小时服务热线：<span class="tel">158-8827-4549</span></div>
	</div>
	</div>
	<!--logo结束-->
	<div class="nav">
		<div class="nav_mid">
				<ul>
					<li><a href="index.php">首页</a></li>
					<li><a href="nav_about.php?id=3">关于养老院</a></li>
					<li><a href="nav_about.php?id=4">服务特色</a></li>
					<li><a href="nav_about.php?id=2">保健常识</a></li>
					<li><a href="nav_about.php?id=12">环境设施</a></li>
					<li><a href="nav_about.php?id=13">收费标准</a></li>
					<li><a href="nav_about.php?id=5">人才招聘</a></li>
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
						<img width="178" height="178" src="upload/<?php echo $userInfo['u_photo']?$userInfo['u_photo']:'/sys/login_no.png'; ?>"/>	
						<a id="editTx" class="ghtx" href="javascript:;">更换头像</a>
					</div>						
					<li><a id="personal" href="personal_info.php">个人中心<span>About Us</span></a></li>
					<li><a id="editmsg" href="javascript:;">修改信息<span>Services</span></a></li>
					<li><a id="editpwd" href="javascript:;">修改密码<span>Knowledge</span></a></li>						
					<li><a id="account" href="javascript:;">我的账户<span>Account</span></a></li>
					<li><a id="pay" href="javascript:;">我的缴费<span>Pay</span></a></li>	
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
						<li><label class="fl">床位号：</label><div class="info_val fl"><?php if($userInfo['u_bed']!=0): ?>	<?php echo $userInfo['building_id']."幢楼 &nbsp;&nbsp;".$userInfo['floor_id']."层&nbsp;&nbsp;".$userInfo['room_id']."房间&nbsp;&nbsp;".$userInfo['bed_id']."号床"; ?><?php else: ?>暂未居住<?php endif;?></div></li>
						<li><label class="fl">入住日期：</label><div class="info_val fl"><?php echo $userInfo['checkIn_date']; ?></div></li>
					</ul>
				</div><!--info_list结束-->
			</div>	<!--info_preview结束-->
		</div><!--content_r结束-->	
	</div>
	<!--content结束-->
	</div>
	<!--wrap结束-->
	<div class="footer">
		<div class="footer_text">
			<a class="github fl" href="https://github.com/heguofeng" target="_blank" title="我的个人GitHUb">我的GitHub</a>
			<span class="copyright fl">CopyRight © 2017 温州温医养老院 Design by <i>HeGuoFeng</i></span>
			<a class="icp fl" href="http://www.miitbeian.gov.cn" target="_blank" title="浙ICP备17016736号">浙ICP备17016736号</a>
	 		<a class="zgwba fl" target="_blank" href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=33078302100239" ><img src="images/备案图标.png" class="fl"/><p class="fl">浙公网安备 33078302100239号</p></a>
		</div>
	</div>
</body>
<script type="text/javascript" src="js/content.js"></script>

</html>
