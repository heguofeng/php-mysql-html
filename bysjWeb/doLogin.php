<?php
require_once 'include.php';
$act=$_REQUEST['act'];
if($act=="reg"){
	reg();
}elseif($act=="login"){
	login();
}elseif($act=="userOut"){
	userOut();
}
elseif($act=="check"){
	checkUsername();
}
/*登录*/
function login(){
	if(!isset($_GET["username"])||empty($_GET["username"])){
		echo '{"success":false,"msg":"参数错误"}';
		return;
	}
	$username=$_GET['username'];
	$password=md5($_GET['password']);
	$autoFlag=$_GET['autoFlag'];
	$result='{"success":false,"msg":"没有找到账号。"}';
	$sql="select * from users where u_username='$username' and u_pwd='$password'";
	$row=checkUser($sql);
	if($row){
		$result	='{"success":true,"msg":"登录成功!"}';
		/*记住我选项被勾选*/
		if($autoFlag=="true"){
			setcookie("userId",$row['id'],time()+7*24*3600);
			setcookie("userName",$row['u_username'],time()+7*24*3600);
		}
		$_SESSION['userId']=$row['id'];
		$_SESSION['userName']=$row['u_username'];
	}
	else{
		$result	='{"success":false,"msg":"账号或者密码出错,请重新登录！"}';
	}
	echo $result;
	
}

/*注册*/
function reg(){
		if(!isset($_POST["username"])||empty($_POST["username"])){
		echo '{"success":false,"msg":"参数错误"}';
		return;
	}
		$username=$_POST['username'];
		$email=$_POST['email'];
		$password=md5($_POST['password']);
//		$confirm_password=md5($_POST['confirm_password']);
		$autoFlag=$_POST['autoFlag'];
		$result='{"success":false,"msg":"注册失败。"}';
		$sql="INSERT INTO users( `u_username`, `u_email`, `u_pwd`) VALUES ('$username','$email','$password')";
		if($autoFlag=="true"){
			if(mysql_query($sql)){
					$result='{"success":true,"msg":"注册成功！3秒后跳回登录页面..."}';
			}
			else{
					$result='{"success":false,"msg":"注册失败!"}';
			}
		}
		else{
			$result='{"success":false,"msg":"请勾选同意协议！"}';
		}
	echo $result;
}
/*function userOut(){
	$_SESSION=array();
	if(isset($_COOKIE[session_name()])){
		setcookie(session_name(),"",time()-1);
	}

	session_destroy();
	header("location:index.php");
}*/
function userOut(){
	$_SESSION=array();
	if(isset($_COOKIE[session_name()])){
		setcookie(session_name(),"",time()-1);
	}
	if(isset($_COOKIE['userId'])){
		setcookie("userId","",time()-1);
	}
	if(isset($_COOKIE['userName'])){
		setcookie("userName","",time()-1);
	}
	session_destroy();
	header("location:index.php");
}

/*验证用户名是否重复*/
function checkUsername(){
	$username=$_GET['username'];
	$sql="select id from users where u_username='{$username}'";
	$row=fetchOne($sql);
	if($row){
		$res='{"d":1}';
	}
	else{
	$res='{"d":2}';
	}
	echo $res;
}

?>
