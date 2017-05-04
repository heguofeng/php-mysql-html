<?php
require_once 'include.php';
$act=$_REQUEST['act'];
$id=$_REQUEST['id'];
if($act=="save"){
	save($id);
}elseif($act=="editPwd"){
	editPwd($id);
}elseif($act=="editTx"){
	editTx($id);
}elseif($act=="addBalance"){
	addBalance($id);
}elseif($act=="shuaxin"){
	shuaxin($id);
}elseif($act=="hljb_select"){
	hljb_select();
}elseif($act=="pay"){
	pay();
}elseif($act=="reg"){
	reg();
}elseif($act=="login"){
	login();
}elseif($act=="userOut"){
	userOut();
}
elseif($act=="check"){
	checkUsername();
}

/*保存用户信息*/
function save($id){
	$arr=$_POST;
	$result='{"success":false,"msg":"保存失败。"}';
	if(update("users", $arr, "id={$id}")){
		$result	='{"success":true,"msg":"保存成功!"}';
	}else{		
		$result	='{"success":false,"msg":"保存失败,可能是您未修改任何资料。"}';
	}
	echo $result;
}

/*更换密码*/
function editPwd($id){
	$arr=$_POST;
	$u_pwd=md5($arr['u_pwd']);
	$u_newPwd=md5($arr['u_newPwd']);
	$result='{"success":false,"msg":"修改失败。"}';
	$sql="select u_pwd from users where id={$id}";
	$sql1="update users set u_pwd='{$u_newPwd}' where id={$id}";
	$row=fetchOne($sql);
	if($row['u_pwd']==$u_pwd){
		if(mysql_query($sql1)){
			$result	='{"success":true,"msg":"修改密码成功!"}';
		}
		else{
			$result	='{"success":false,"msg":"修改密码失败。"}';
		}
	}
	else{
		$result='{"success":false,"msg":"原密码错误。"}';
	}
	echo $result;
}

/*更换头像*/
function editTx($id){
	$sql="select u_photo from users where id={$id}";
	$row=fetchOne($sql);
	if($row['u_photo']){
		$filename ="upload/".$row['u_photo'];
		if (file_exists($filename)) {
			unlink($filename);
		}
	}
	$arr=$_POST;
	$uploadFile = uploadFile("upload");
	if($uploadFile&&is_array($uploadFile)){
		$arr['u_photo']=$uploadFile[0]['name'];
	}else{
		$result="操作失败！";
	}
	if(update("users", $arr,"id={$id}")){
		$result="上传成功！";
	}else{
		$filename = "upload/" . $uploadFile[0]['name'];
		if (file_exists($filename)) {
			unlink($filename);
		}
		$result="操作失败！";
	}
echo $result;
}
//充值账户
function addBalance($id){
	$arr=$_POST;
	$sql="select balance from users where id={$id}";
	$row=fetchOne($sql);
	$new_balance=$row['balance']+$arr['balance'];
	$sql="update users set balance= '{$new_balance}' where id={$id}";
	$array=array(
		'success'=>true,
		'msg'=>'充值成功',
		'banalce'=>$arr['balance']
	);
	//数组转换成json格式
	$result=json_encode($array);
	if(mysql_query($sql)){
		$result=json_encode($array);;
	}else{
		$result	='{"success":false,"msg":"充值失败"}';
	}
	echo $result;
}
//刷新金额
function shuaxin($id){
	$sql="select balance from users where id={$id}";
	$row=fetchOne($sql);
	$result="{$row['balance']}";
	echo $result;
}
//下拉框选项
function hljb_select(){
	$arr=$_GET;
	$id=$arr['u_hljb'];
	$sql="select * from dic_hljb where id={$id}";
	$row=fetchOne($sql);
	$array=array(
		'success'=>true,
		'hljb'=>$row['hljb'],
		'hsf'=>$row['hsf'],
		'cwf'=>$row['cwf'],
		'hlf'=>$row['hlf'],
		'deposit'=>$row['deposit'],
		'allCost'=>$row['allCost']
	);
	//数组转换成json格式
	$result=json_encode($array);	
	echo $result;
}
//缴费按钮
function pay(){
	$arr=$_POST;
	$pay_status=1;
	$pay_time =date('Y-m-d H:i:s');
	//查询余额
	$sql="select balance from users where id={$arr['user_id']}";
	$row=fetchOne($sql);
	$sql5="select id from pay_records where user_id={$arr['user_id']}";
	//验证是否已缴费
	if(fetchOne($sql5)){
		$result	='{"res_id":5,"msg":"请勿调皮重复充值！"}';
		}else{
		//如果余额不够
		if($arr['pay_money']<=$row['balance']){
			$new_balance=$row['balance']-$arr['pay_money'];
			//更新余额
			$sql1="update users set balance={$new_balance} where id={$arr['user_id']}";
			if(mysql_query($sql1)){
				//进行记录缴费信息
				$sql="insert into pay_records(pay_status,user_id,pay_time,pay_money) values('{$pay_status}','{$arr['user_id']}','{$pay_time}','{$arr['pay_money']}')";
				if(mysql_query($sql)){
					//获取当前的缴费合同号
					$sql="select id from pay_records where user_id={$arr['user_id']}";
					$row=fetchOne($sql);
					//更新护理级别与缴费合同号
					$sql="update users set u_hljb={$arr['u_hljb']},pay_id={$row['id']} where id={$arr['user_id']}";
					mysql_query($sql);
					$result	='{"res_id":1,"msg":"缴费成功,扣款成功,护理级别更新成功"}';
				}
				else{
					$result	='{"res_id":2,"msg":"缴费失败,扣款成功,即将退款"}';
					$sql="select balance from users where id={$arr['user_id']}";
					$row=fetchOne($sql);
					$new_balance=$row['balance']+$arr['pay_money'];
					//更新余额
					$sql1="update users set balance={$new_balance} where id={$arr['user_id']}";
					mysql_query($sql1);
				}
			}else{
				$result	='{"res_id":3,"msg":"扣款失败"}';
			}
		}else{
			$result	='{"res_id":4,"msg":"余额不够,请充值"}';
		}
	}
echo $result;
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
		if($autoFlag=="true"){
			//检测是否有重复ID
			$sql="select id from users where u_username='{$username}'";
			$row=fetchOne($sql);
			if(!$row){
				//执行注册操作
				$sql="INSERT INTO users( `u_username`, `u_email`, `u_pwd`) VALUES ('$username','$email','$password')";
				if(mysql_query($sql)){
						$result='{"success":true,"msg":"注册成功！3秒后跳回登录页面..."}';
				}
				else{
						$result='{"success":false,"msg":"注册失败!"}';
				}
			}else{
				$result='{"success":false,"msg":"该账户已被注册，请注册其他账号"}';
			}
			}
		else{
			$result='{"success":false,"msg":"请勾选同意协议！"}';
		}
	echo $result;
}
//注销
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
