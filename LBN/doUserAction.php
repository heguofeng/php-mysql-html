<?php
require_once '../include.php';
$id=$_REQUEST['id'];
$act=$_REQUEST['act'];
if($act=="save_pi"){
	save_pi($id);
}elseif($act=="reg"){
	reg();
}elseif($act=="code"){
	code();
}elseif($act=="login"){
	login();
}

//保存基本信息
function save_pi($id){
	$arr=$_POST;
	if (update("lbn_users", $arr, "id={$id}")) {
		$result = '{"success":true,"msg":"保存成功！"}';
	} else {
		$result = '{"success":false,"msg":"保存失败！"}';
	}
	echo $result;
}

//注册
function reg(){
	$username=$_POST['username'];
	$password=$_POST['password'];
	$security_code=$_POST['security_code'];
	$sql="select id from lbn_users where username = '{$username}'";
	$row=fetchOne($sql);
	if($security_code==$_SESSION['param']){
		if(!$row){
			$sql="insert into lbn_users(username,password) values('$username','$password')";
			if(mysql_query($sql)){
				$res='{"success":true,"msg":"恭喜，注册成功！"}';
			}else{
				$res='{"success":false,"msg":"注册失败!"}';
			}
		}else{
			$res='{"success":false,"msg":"该账户已被注册，请注册其他账号"}';
		}
	}else{
		$res='{"success":false,"msg":"验证码错误!"}';
	}
	echo $res;
}

//获取手机验证码
function code(){//初始化必填
		$username=$_POST['username'];
		$options['accountsid']='4d34aed70a30405c8aba9a0d89330798';
		$options['token']='471416c20b89d075cdc90a30e0a74d9b';
		
		//初始化 $options必填
		$ucpass = new Ucpaas($options);
		//短信验证码（模板短信）,默认以65个汉字（同65个英文）为一条（可容纳字数受您应用名称占用字符影响），超过长度短信平台将会自动分割为多条发送。分割后的多条短信将按照具体占用条数计费。
		$appId = "82376abb35ee46e3938f84477ec06e9d";
		$to = $username;
		$templateId = "48675";
		$param=rand(1000,9999);
		$ucpass->templateSMS($appId,$to,$templateId,$param);
		$_SESSION['param']=$param;
		$sql="update lbn_users set security_code='{$param}' where username='{$username}'";
		if(mysql_query($sql)){
			$result='{"success":true}';
		}else{
			$result='{"success":false}';
		}
	echo $result;
}

//登录
function login(){
	$username=$_POST['username'];
	$password=$_POST['password'];
	$autoFlag=$_POST['autoFlag'];
	$sql="select id from lbn_users where username='{$username}' and password='{$password}'";
	$row=fetchOne($sql);
	if($row){
		$res='{"success":true,"msg":"登录成功！"}';
		if($autoFlag=="1"){
			setcookie("userName",$username,time()+7*24*3600);
		}
		$_SESSION['userName']=$username;
	}else{
		$res='{"success":false,"msg":"账号或者密码出错,请重新登录！"}';
	}
	echo $res;
}
