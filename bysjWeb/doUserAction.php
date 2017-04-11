<?php
require_once 'include.php';
$act=$_REQUEST['act'];
$id=$_REQUEST['id'];
if($act=="save"){
	save($id);
}elseif($act=="editPwd"){
	editPwd($id);
}
elseif($act=="editTx"){
	editTx($id);
}

/*保存用户信息*/
function save($id){
	$arr=$_POST;
	$result='{"success":false,"msg":"保存失败。"}';
	if(update("users", $arr, "id={$id}")){
		$result	='{"success":true,"msg":"保存成功!"}';
	}else{		
		$result	='{"success":false,"msg":"保存失败"}';
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
			$result	='{"success":false,"msg":"修改密码失败"}';
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
