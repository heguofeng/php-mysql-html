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
}elseif($act=="select_floor"){
	select_floor();
}elseif($act=="select_room"){
	select_room();
}elseif($act=="add_bed"){
	add_bed();
}
elseif($act=="change_bed"){
	change_bed($id);
}



