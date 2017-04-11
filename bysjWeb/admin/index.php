<?php
require_once '../include.php';
checkAdminLogined();
if (isset($_SESSION['adminId'])) {
	$id=$_SESSION['adminId'];
} elseif (isset($_COOKIE['adminId'])) {
	$id=$_COOKIE['adminId'];
}
$sql="select * from employee where id='{$id}'";/*提取头像*/
$row=fetchOne($sql);
//print_r($row);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>养老院后台首页</title>
	<link rel="stylesheet" type="text/css" href="css/reset.css" />
	<link rel="stylesheet" type="text/css" href="css/backstage.css">
</head>
<body>
	<div class="head">
		<a href="../index.php" title="官方首页">
			<div class="logo fl"></div>
		</a>
		<h3 class="head_text fr">快乐养老院后台管理系统</h3>
	</div>
	<div class="top_user clearfix">
		<div class="link fl">
			<p id="clock"></p>
		</div>
		<div class="link fr">
			<p>欢迎您&nbsp;</p>
			<a href="#">
				<div id="pic_tx" >		
		        	<img alt="我的头像" width="20" height="20" src="../admin/uploads/<?php echo $row['photo']; ?>"/>&nbsp;
		        </div>	
				<b><?php echo $row['name'];?> </b>
			</a>&nbsp;&nbsp;&nbsp;
			<a href="main.php" target="mainFrame" class="icon icon_i">
				首页
			</a><span></span>
			<a href="javascript:;" class="icon icon_j" id="goforward">
				前进
			</a><span></span>
			<a href="javascript:;" class="icon icon_t" id="goback">
				后退
			</a><span></span>
			<a href="javascript:;" class="icon icon_n" id="f5">
				刷新
			</a><span></span>
			<a href="doAdminAction.php?act=logout" class="icon icon_e">
				退出
			</a>
		</div>
	</div>
	<div class="content clearfix">
		<div class="main">
			<div class="cont">
				<!--嵌套网页开始-->
				<iframe src="main.php" frameborder="0" name="mainFrame" width="100%" height="792px"></iframe>
				<!--嵌套网页结束-->
			</div>
			<!--右侧内容结束-->
		</div>
		<!--main结束-->
		<div class="menu">
			<div class="cont">
				<div class="title">
					管理员
				</div>
				<ul class="side_menu">
					<li class="menu_item">
						<h3><span>+</span>新闻管理</h3>
						<ul class="menu_item_child none">
							<li>
								<a href="addArticle.php" target="mainFrame">
									发布文章
								</a>
							</li>
							<li>
								<a href="listArticle.php" target="mainFrame">
									文章列表
								</a>
							</li>

						</ul>
					</li>
					<li class="menu_item" style="display: <?php echo $row['isAdmin']=='0'?'none':'block'; ?>;">
						<h3><span>+</span>部门管理</h3>
						<ul class="menu_item_child none">
							<li>
								<a href="listDepartment.php" target="mainFrame">
									部门列表
								</a>
							</li>
							<li>
								<a href="addDepartment.php" target="mainFrame">
									添加部门
								</a>
							</li>
							<li>
								<a href="detialDep.php" target="mainFrame">
									部门详情
								</a>
							</li>
						</ul>
					</li>
					<li class="menu_item">
						<h3><span>+</span>人事管理</h3>
						<ul class="menu_item_child none">
							<li style="display: <?php echo $row['isAdmin']=='0'?'none':'block'; ?>;">
								<a href="listEmployee.php" target="mainFrame" >
									员工列表
								</a>
							</li>
							<li>
								<a href="detialEmployee.php" target="mainFrame">
									员工信息
								</a>
							</li>
							<li style="display: <?php echo $row['isAdmin']=='0'?'none':'block'; ?>;">
								<a href="addEmployee.php" target="mainFrame">
									添加员工
								</a>
							</li>
							<li>
								<a href="addLeave.php" target="mainFrame">
									我要请假
								</a>
							</li>
							<li class="mene_item1" style="display: <?php echo $row['isAdmin']=='0'?'none':'block'; ?>;">
								<a href="listLeave.php" target="mainFrame">
									<span>+</span>请假管理
								</a>
								<ul class="menu_item_grandchild none">
									<li><a href="listLeave.php?status=0" target="mainFrame">未审核</a></li>
									<li><a href="listLeave.php?status=1" target="mainFrame">已审核</a></li>
								</ul>
							</li>
							<li>
								<a href="myLeave.php" target="mainFrame">
									我的请假记录
								</a>
							</li>
						</ul>
					</li>
					<li class="menu_item">
						<h3><span>+</span>老人管理</h3>
						<ul class="menu_item_child none">
							<li>
								<a href="listUsers.php" target="mainFrame">
									老人列表
								</a>
							</li>	
							<li>
								<a href="addUsers.php" target="mainFrame">
									添加新用户
								</a>
							</li>					
							<li>
								<a href="#" target="mainFrame">
									换床
								</a>
							</li>
						</ul>
					</li>
					<li class="menu_item" style="display: <?php echo $row['isAdmin']=='0'?'none':'block'; ?>;">
						<h3><span>+</span>费用管理</h3>
						<ul class="menu_item_child none">
							<li>
								<a href="" target="mainFrame">
									养老院财务状况
								</a>
							</li>
							<li>
								<a href="" target="mainFrame">
									入住老人缴费信息
								</a>
							</li>
							<li>
								<a href="" target="mainFrame">
									欠费信息
								</a>
							</li>
							<li>
								<a href="listCost.php" target="mainFrame">
									养老院护理明细
								</a>
							</li>
						</ul>
					</li>
					<li class="menu_item">
						<h3><span>+</span>接待管理</h3>
						<ul class="menu_item_child none">
							<li>
								<a href="" target="mainFrame">
									来客登记
								</a>
							</li>
							<li>
								<a href="" target="mainFrame">
									接待登记信息
								</a>
							</li>
						</ul>
					</li>
				</ul>
			</div>
			<!--cont结束-->
		</div>
		<!--menu结束-->
	</div>
	<!--content结束-->
	<div class="footer">
		<div class="footer_text">
			<p>
				CopyRight © 2017 温州快乐养老院版权所有
			</p>
		</div>
	</div>
</body>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript">
	/*侧面菜单来回切换*/
	$(".side_menu").on('click', 'li h3', function() {
		var animationSpeed = 300;
		var $this = $(this);
		var checkElement = $this.next();
		//如果菜单为显示
		if(checkElement.is('.menu_item_child') && checkElement.is(':visible')) {
			checkElement.slideUp(animationSpeed);
			$this.find('span').html("+");
		}
		//如果菜单不可见
		else if(checkElement.is('.menu_item_child') && (!checkElement.is('visible'))) {
			checkElement.slideDown(animationSpeed);
			$this.find('span').html("-");
		}
	});
	$(".menu_item_child").on('click', 'li a', function() {
		var animationSpeed = 300;
		var $this = $(this);
		var checkElement = $this.next();
		//如果菜单为显示
		if(checkElement.is('.menu_item_grandchild') && checkElement.is(':visible')) {
			checkElement.slideUp(animationSpeed);
			$this.find('span').html("+");
		}
		//如果菜单不可见
		else if(checkElement.is('.menu_item_grandchild') && (!checkElement.is('visible'))) {
			checkElement.slideDown(animationSpeed);
			$this.find('span').html("-");
		}
	});
	/*前进后退*/
	$("#goback").click(function(){
		window.history.back();
	});
	$("#goforward").click(function(){
		window.history.forward();
	});
	
	function clock(){
		function double(num){
			if(num<10){
				return "0"+num;
			}else{
				return ""+num;
			}
		}
		var date = new Date();
		var weekday = ["星期日", "星期一", "星期二", "星期三", "星期四", "星期五", "星期六"];
		var nowTime=document.getElementById("clock");
		nowTime.innerHTML=(
		date.getFullYear() + "年 " +
		double(date.getMonth()+1) + " 月 " +
		double(date.getDate()) + " 日 " +
		weekday[date.getDay()]+"&nbsp;&nbsp;"+
		double(date.getHours())+"点"+
		double(date.getMinutes())+"分"+
		double(date.getSeconds())+"秒")
		setTimeout("clock()",1000);
	}
    $().ready(function(){
    	 var Lis = document.getElementsByTagName("li");
        for (i = 0; i < Lis.length; i++) {
            Lis[i].onmouseover = function () {
                this.className = "lihover";
            }
            Lis[i].onmouseout = function () {
                this.className = "";
            }
        }
        
        setTimeout("clock()");
    });
	
</script>
</html>