<?php
require_once '../include.php';
 echo "点击左上角logo可跳转至官网首页，或点击<a href='../index.php' target='_blank' title='前去官网首页' style='color:red;'>官网出口</a>";
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="css/reset.css"/>
		<link rel="stylesheet" type="text/css" href="css/backstage.css"/>
		<style type="text/css">
			.wrap{
				width: 800px;
				height: 200px;
				text-align: center;
				vertical-align: middle;
/*				padding-top: 200px;*/
				position: absolute;
				left: 50%;
				top: 50%;
				margin-left: -400px;
				margin-top: -100px;
			}
			h1{
				font: 60px/80px "楷体";
				font-weight: 900;
				
			}
			h1:hover{
				color: #228B22;
				font-family: "微软雅黑";
			}
			.p1{
				font: 30px/60px "楷体";
				font-weight: 600;
			}
			.p1:hover{
				color: #FF6347;
				font-family: "微软雅黑";
			}
			img{
				animation-name: img-dh;
				-webkit-animation-name: img-dh;/* Safari 与 Chrome: */
				animation-duration: 5s;
				-webkit-animation-duration: 5s;
				animation-delay: 0.25s;
				-webkit-animation-delay: 0.2s;
				transition-timing-function: linear;
				-webkit-transition-timing-function: linear;
			}
			@keyframes img-dh{
				0% {
				    filter:alpha(Opacity=100);-moz-opacity:1;opacity: 1;/*兼容所有浏览器的透明度*/
				    transform: translate3d(0px, 0px, 0px) rotate(0deg) scale(1);
				    -webkit-transform: translate3d(0px, 0px, 0px) rotate(0deg) scale(1);
				}
				10% {
				    opacity: 0.8;
				    transform: translate3d(-100px, 0px, 0px) rotate(10deg) scale(0.7);
				}
				35% {
				    opacity: 0.6;
				    transform: translate3d(100px, 0px, 0px) rotate(30deg) scale(0.4);
				}
				50% {
				    opacity: 0.4;
				    transform: translate3d(0px, 0px, 0px) rotate(360deg) scale(0);
				}
				80% {
				    opacity: 0.2;
				    transform: translate3d(0px, -300px, 0px) rotate(720deg) scale(1);
				}
				90% {
				    opacity: 0.7;
				    transform: translate3d(0px, -200px, 0px) rotate(3600deg) scale(4);
				}
				100% {
				    opacity: 1;
				    transform: translate3d(0px, 0px, 0px) rotate(3600deg) scale(1);
				}
			}
			@keyframes myfirst
				{
				    from {color: #228B22;}
				    to {color: #FF6347;}
				}
			h1{
				-webkit-animation: myfirst 4s;
				animation: myfirst 4s;
				
			}

		</style>
</head> 
<body>   
	<a href="" target=""></a>
   	<div class="wrap">
   		<h1>养老院网站的设计与实现</h1>
   		<h3 class="p1">学生：何国锋&nbsp;&nbsp;导师：张杨</h3>
   		<img src="../images/logo.gif"/>
   	</div>
</body>
</html>