<?php
require_once 'include.php';
if (isset($_SESSION['userId'])) {
	$id=$_SESSION['userId'];
} elseif (isset($_COOKIE['userId'])) {
	$id=$_COOKIE['userId'];
}
if($id){
	$userInfo=getUserById($id);	
}
$a_id=$_REQUEST['id'];
$sql="select * from article where id = {$a_id}";
$row=fetchOne($sql);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
<title>内容页</title>
<link rel="stylesheet" type="text/css" href="css/reset.css"/>
<link rel="stylesheet" type="text/css" href="css/main.css"/>
<script type="text/javascript" src="js/myfocus-2.0.1.min.js"></script><!--引入myFocus库-->
<script type="text/javascript" src="js/content.js"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript">
myFocus.set({
	id:'boxID',//焦点图盒子ID
	pattern:'mF_kdui',//风格应用的名称
	time:3,//切换时间间隔(秒)
	trigger:'click',//触发切换模式:'click'(点击)/'mouseover'(悬停)
	width:1000,//设置图片区域宽度(像素)
	height:340,//设置图片区域高度(像素)
	txtHeight:'default',//文字层高度设置(像素),'default'为默认高度，0为隐藏
	loadIMGTimeout:0.5 //loading时间
});
</script>
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
					<li><a href="nav_about.php?id=3">关于养老院</a></li>
					<li><a href="nav_about.php?id=4">服务特色</a></li>
					<li><a href="nav_about.php?id=2">保健常识</a></li>
					<li><a href="nav_about.php?id=4">环境设施</a></li>
					<li><a href="nav_about.php?id=10">收费标准</a></li>
					<li><a href="nav_about.php?id=4">人才招聘</a></li>
					<li><a href="personal_info.php">个人中心</a></li>
				</ul>
		</div>
		<!--nav_mid结束-->
	</div>
	  <!--nav结束-->
	 <div class="wrap">
	<div class="ad">
		<div id="boxID"> <!--焦点图盒子-->
			<div class="loading"><img src="images/loading.gif" alt="请稍等..."/></div><!--载入画面-->
			<div class="pic">
				<ul>
					<li><a href="#"><img src="images/pic4.jpg" alt="美丽风貌" text="详细描述1"/></a></li>
					<li><a href="#"><img src="images/pic3.jpg" alt="养生食物" text="详细描述1"/></a></li>
					<li><a href="#"><img src="images/pic2.jpg" alt="美丽风貌" text="详细描述1"/></a></li>
					<li><a href="#"><img src="images/pic1.png" alt="空闲生活" text="详细描述1"/></a></li>
				</ul>
			</div>
		</div>
	</div>  
	<!--ad结束-->
	<div><img src="images/diying.jpg" width="100%" height="20px"></div><!--中间小横线-->
	<div class="pages">
		<ul>
			<li class="pages01">
				<a href="javascript:;" title="生活照料"><img src="images/page01.jpg" alt="生活照料"></a>
			</li>
			<li class="pages02">
				<a href="javascript:;" title="医疗护理"><img src="images/page02.jpg" alt="医疗护理"></a>
			</li>
			<li class="pages03">
				<a href="javascript:;" title="娱乐活动"><img src="images/page03.jpg" alt="娱乐活动"></a>
			</li>
			<li class="pages04">
				<a href="javascript:;" title="健康管理"><img src="images/page04.jpg" alt="健康管理"></a>
			</li>
			<li class="pages05">
				<a href="javascript:;" title="营养膳食"><img src="images/page05.jpg" alt="营养膳食"></a>
			</li>
		</ul>
	</div>
	<!--pages结束-->
	<div class="content">
		<div class="content_l">
			<div class="content_l_list">
				<ul>
					<li><a id="about" href="javascript:;">养老院介绍<span>About Us</span></a></li>
					<li><a id="services" href="javascript:;">服务特色<span>Services</span></a></li>
					<li><a id="knowledge" href="javascript:;">保健常识<span>Knowledge</span></a></li>
					<li><a id="professional" href="javascript:;">专业护理<span>Professional Care</span></a></li>
					<li><a id="environment" href="javascript:;">环境设施<span>Environment</span></a></li>
					<li><a id="charges" href="javascript:;">收费标准<span>Charges</span></a></li>
					<li><a id="contact" href="javascript:;">联系我们<span>Contact Us</span></a></li>
				</ul>
			</div>
		</div>
		<div class="content_right">
			<!--文章标题放这里-->
			<h1 class="a_title"><?php echo $row['title'] ?><span>作者：<?php echo $row['author']; ?></span></h1>
			<div class="a_content">
				<!--文章内容放这里-->
				<?php echo $row['content']; ?>		
			</div>
		</div><!--content_right结束-->
	</div><!--content结束-->
	</div><!--wrap结束-->
	<div class="footer">
		<!--<div class="footer_a"></div>-->
		<div class="footer_b">
			<div class="footer_b_text">
				<p>CopyRight © 2017 温州快乐养老院版权所有</p>
			</div>
		</div>
	</div>
	<script type="text/javascript">

	
	</script>
</body>
</html>
