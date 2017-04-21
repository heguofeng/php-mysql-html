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
/*专业护理*/
$sql="select * from article where category_id=1 order by id desc limit 3";
$zyhls=fetchAll($sql);
/*保健常识*/
$sql="select * from article where category_id=2 order by id desc limit 5";
$bjcss=fetchAll($sql);
/*最后一条保健常识*/
$sql="select * from article where category_id=2 order by id desc limit 1";
$last_bjcs=fetchOne($sql);
//以下是生活照料、医疗护理、等五个子导航
$sql="select * from article where category_id=6";
$shzl=fetchOne($sql);
$sql="select * from article where category_id=7";
$ylhl=fetchOne($sql);
$sql="select * from article where category_id=8";
$ylhd=fetchOne($sql);
$sql="select * from article where category_id=9";
$jkgl=fetchOne($sql);
$sql="select * from article where category_id=10";
$yyss=fetchOne($sql);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
<title>温医养老院</title>
<link rel="stylesheet" type="text/css" href="css/reset.css"/>
<link rel="stylesheet" type="text/css" href="css/main.css"/>
<script type="text/javascript" src="js/myfocus-2.0.1.min.js"></script><!--引入myFocus库-->
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
	loadIMGTimeout:1 //loading时间
});
</script>
</head>
<body>
	<div class="top">
		<div class="top_content">
			<div class="top_content_l">
				<a href="admin/index.php" target="_blank" title="进入后台管理系统" class="backstage">进入后台管理系统</a>
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
	 <div class="wrap">
	<div class="ad">
		<div id="boxID"> <!--焦点图盒子-->
			<div class="loading"><img src="images/loading.gif" alt="请稍等..."/></div><!--载入画面-->
			<div class="pic">
				<ul>
					<li><a href="#"><img src="images/pic4.jpg" alt="美丽风貌" text="美丽的山庄景色，适合养生"/></a></li>
					<li><a href="#"><img src="images/pic3.jpg" alt="养生食物" text="空心泡，草莓，车厘子"/></a></li>
					<li><a href="#"><img src="images/pic2.jpg" alt="来一杯" text="不如坐下喝一杯"/></a></li>
					<li><a href="#"><img src="images/pic1.png" alt="空闲生活" text="去海边看看"/></a></li>
				</ul>
			</div>
		</div>
	</div>  
	<!--ad结束-->
	<div><img src="images/diying.jpg" width="100%" height="20px"></div><!--中间小横线-->
		<div class="itemBg">
			<div class="item">
				<ul>
					<li class="special01">
						<i></i>
						<a href="article.php?id=<?php echo $shzl['id']; ?>" title="生活照料"><em></em><span><strong>生活照料</strong>Life Care</span></a>
					</li>
					<li class="special02">
						<i></i>
						<a href="article.php?id=<?php echo $ylhl['id']; ?>" title="医疗护理"><em></em><span><strong>医疗护理</strong>Medical Care</span></a>
					</li>
					<li class="special03">
						<i></i>
						<a href="article.php?id=<?php echo $ylhd['id']; ?>" title="娱乐活动"><em></em><span><strong>娱乐活动</strong>Activities</span></a>
					</li>
					<li class="special04">
						<i></i>
						<a href="article.php?id=<?php echo $jkgl['id']; ?>" title="健康管理"><em></em><span><strong>健康管理</strong>Management</span></a>
					</li>
					<li class="special05">
						<i></i>
						<a href="article.php?id=<?php echo $yyss['id']; ?>" title="营养膳食"><em></em><span><strong>营养膳食</strong>Dietary</span></a>
					</li>
				</ul>
			</div>
		</div>
		<!--itemBgj结束-->
		<div class="new">
			<div class="new_left">
				<h3 class="title"><a href="#" title="专业护理"><span>专业护理</span>/Professional Care</a></h3>
				<div class="HLlist">
					<dl>
						<dt>
							<a href="#" title="【糖尿病】老人糖尿病如何护理"><img src="images/img01.jpg" width="260" height="100" alt="【糖尿病】老人糖尿病如何护理"></a>
						</dt>
						<?php foreach ($zyhls as $zyhl): ?>
							<dd><a href="article.php?id=<?php echo $zyhl['id']; ?>" title="<?php echo $zyhl['title']; ?>"><?php echo $zyhl['title']; ?></a></dd>
						<?php endforeach; ?>
					</dl>
				</div>
			</div>
			<div class="new_mid">
				<div class="titleBox">
					<h3 class="title"><a href="nav_about.php?id=2" title="保健常识"><span>保健常识</span>/Knowledge</a></h3>
				</div>
				<div class="CHlist">
					<dl>
						<dt>
							<a href="article.php?id=<?php echo $last_bjcs['id']; ?>" title="<?php echo $last_bjcs['title']; ?>"><img src="images/201701120924527862.jpg" width="100" height="80" alt="<?php echo $last_bjcs['title']; ?>"></a>
							<h2><a href="article.php?id=<?php echo $last_bjcs['id']; ?>"><?php echo $last_bjcs['title']; ?></a></h2>
							<div id="description">
								<p><?php echo $last_bjcs['description']; ?></p>
								<a href="article.php?id=<?php echo $last_bjcs['id']; ?>">[&gt;&gt;查看详细&lt;&lt;]</a>
							</div>
						</dt>
						<div id="scrollBox">
							<ul>
								<?php foreach ($bjcss as $bjcs):?>
									<li><a href="article.php?id=<?php echo $bjcs['id']; ?>" title="<?php echo $bjcs['title']; ?>"><?php echo $bjcs['title']; ?></a></li>
								<?php endforeach;?>
							</ul>
						</div>
					</dl>
				</div>
			</div>
			<div class="new_right">
				<div class="titleBox">
					<h3 class="title"><a href="#" title="营养膳食"><span>营养膳食</span>/Dietary</a></h3>
				</div>
					<div class="bd">
					<div id="boxID2"> <!--焦点图盒子-->
						<!--<div class="loading"><img src="images/loading.gif" alt="请稍等..."/></div>--><!--载入画面-->
						<div class="pic">
							<ul>
								<li><a href="#"><img src="images/yyss01.jpg" alt="蔬菜搭配" /></a></li>
								<li><a href="#"><img src="images/yyss02.jpg" alt="五谷杂粮" /></a></li>
								<li><a href="#"><img src="images/yyss03.jpg" alt="早餐学问" /></a></li>
								<li><a href="#"><img src="images/yyss04.jpg" alt="必要蛋白质补充" /></a></li>
							</ul>
						</div>
					</div>
				</div>
		
			</div>
		</div>
		<!--new结束-->
		<div class="zzfc">
			<h3 class="title"><a href="#" title="长者风采"><span>长者风采</span>/Old style</a></h3>
			<div class="zzfc_box">
				<div id="scrollPic">
					<ul>
						<table border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td id="scrollPic1">
									<table border="0" cellspacing="0" cellpadding="0">
										<tr>
											<td><li><img src="images/intu1.jpg"/><a class="pic_name">温馨</a></li></td>
											<td><li><img src="images/intu2.jpg"/><a class="pic_name">一家人</a></li></td>
											<td><li><img src="images/intu3.jpg"/><a class="pic_name">休闲时光</a></li></td>
											<td><li><img src="images/intu4.jpg"/><a class="pic_name">快乐一家人</a></li></td>
											<td><li><img src="images/intu5.jpg"/><a class="pic_name">看书阅读</a></li></td>
											<td><li><img src="images/intu6.jpg"/><a class="pic_name">甜蜜恩爱</a></li></td>
											<td><li><img src="images/intu7.jpg"/><a class="pic_name">熟悉彼此</a></li></td>
											<td><li><img src="images/intu8.jpg"/><a class="pic_name">一家人</a></li></td>
										</tr>
									</table>
								</td>
								<td id="scrollPic2"></td>
							</tr>
						</table>
					</ul>
				</div>
			</div>
		</div>
		<!--zzfc长者风采结束-->
		<div class="environment">
			<ul>
				<li class="environment01"><a href="#"><span>环境设施</span>Environment</a></li>
				<li class="environment02">
					<a href="#">
						<img src="images/environment01.jpg" >
						<div class="img_cover"></div>
					</a>
					<p><a class="henfan" href="#">养老院院景</a></p>
				</li>
				<li class="environment03">
					<a href="#">
						<img src="images/environment02.jpg" alt="养老院院景" />	
						<div class="img_cover"></div>
					</a>
					<p><a class="henfan"  href="#">养老院院景</a></p>
				</li>
				<li class="environment04">
					<a href="#">
						<img src="images/environment03.jpg" alt="养老院院景" />		
						<div class="img_cover"></div>			
					</a>
					<p><a class="henfan" href="#">养老院院景</a></p>
				</li>
				<li class="environment05">
					<a href="#">
						<img src="images/environment04.jpg" alt="养老院院景">
							<div class="img_cover"></div>
					</a>
					<p><a class="henfan"  href="#">养老院院景</a></p>
				</li>
				<li class="environment06">
					<a href="#">
						<img src="images/environment05.jpg" alt="养老院院景" />	
						<div class="img_cover"></div>
					</a>
					<p><a class="henfan"  href="#">养老院院景</a></p>
				</li>
				<li class="environment07">
					<a href="#">
						<img src="images/environment06.jpg" alt="养老院院景" />
						<div class="img_cover"></div>
						
					</a>
					<p><a class="henfan"  href="#">养老院院景</a></p>
				</li>
				<li class="environment08">
					<a href="#">查看更多&gt;&gt;</a>
				</li>
			</ul>
		</div>
		<!--environment环境设施结束-->
		<div class="history">
			<h4>科学理性养老&nbsp;&nbsp;所以我们更专业</h4>
			<div class="history_pic">
				<ul>
					<li class="history_pic01">
						<span></span>
						<em>专业养老院<br>
							专业护理院
						</em>
					</li>
						<li class="history_pic02">
						<span></span>
						<em>建筑面积<br>
							2000平方米
						</em>
					</li>
						<li class="history_pic03">
						<span></span>
						<em>大小独立套房<br>
							共计100余间
						</em>
					</li>
						<li class="history_pic04">
						<span></span>
						<em>员工<br>
							50余人
						</em>
					</li>
				</ul>
			</div>
			<!--history_pic结束-->
			<div class="history_text">
			<p >
				温医养老院位于浙江省温州市温州医科大学茶山校区边的快乐小镇上，优越的地理位置，秀丽的田园风光，温馨的居住环境，便捷的交通，观青山苍翠，神清气爽，无不洋溢着浓郁的生活风情。
				更有星级单人间房、温馨双人房、功能齐全的多人医疗护理房等为您的入住提供不同的选择。
			</p>
			</div>
		</div>
		<!--history结束-->
	</div>
	<!--wrap结束-->
	<a id="to_top" href="javascript:;" title="回到顶部"></a>
	<div class="footer">
		<!--<div class="footer_a"></div>-->
		<div class="footer_b">
			<div class="footer_b_text">
				<p>CopyRight © 2017 温州温医养老院版权所有</p>
			</div>
		</div>
	</div>
</body>

<script type="text/javascript" src="js/main.js"></script><!--自己写的js文件要放在最后面-->
<script type="text/javascript">

</script>
</html>
