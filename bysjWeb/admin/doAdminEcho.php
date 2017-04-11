<?php
//该文件用于基于ajax操作的动作合集

require_once '../include.php';
$act=$_REQUEST['act'];
$id=$_REQUEST['id'];

if($act=="checkEmp"){
	checkEmpName();
}elseif($act=="addUsers"){
	addUsers();
}elseif($act=="checkUsers"){
	checkUsersName();
}elseif($act=="checkDep"){
	checkDepName();
}elseif($act=="addCost"){
	addCost();
}elseif($act=="checkCost"){
	checkCost();
}elseif($act=="editCost"){
	editCost($id);
}


