<?php
require_once '../include.php';
$act=$_REQUEST['act'];
$id=$_REQUEST['id'];
if($act=="agreeStatus"){
	agreeStatus($id);
}elseif($act=="disagreeStatus"){
	disagreeStatus($id);
}
/*修改请假条状态*/
function agreeStatus($id){
	$sql="update leavenote set status=1,pass=1 where id={$id}";
	$row=mysql_query($sql);
	if($row){
		$res='{"success":true,"msg":"成功"}';
	}
	else{
		$res='{"success":false,"msg":"失败！"}';
	}
	echo $res;
}
function disagreeStatus($id){
	$sql="update leavenote set status=1,pass=0 where id={$id}";
	$row=mysql_query($sql);
	if($row){
		$res='{"success":true,"msg":"成功"}';
	}
	else{
		$res='{"success":false,"msg":"失败！"}';
	}
	echo $res;
}
?>