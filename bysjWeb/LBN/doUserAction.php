<?php
require_once '../include.php';
$id=$_REQUEST['id'];
$act=$_REQUEST['act'];
if($act=="save_pi"){
	save_pi($id);
}

function save_pi($id){
	$arr=$_POST;
	if (update("lbn_users", $arr, "id={$id}")) {
		$result = '{"success":true,"msg":"保存成功！"}';
	} else {
		$result = '{"success":false,"msg":"保存失败！"}';
	}
	echo $result;
}

?>
