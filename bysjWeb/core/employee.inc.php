<?php
/*根据ID或得员工所有信息*/
function getEmpById($id) {
	$sql = "select e.*,d.d_name from employee as e join department d on e.d_id=d.id where e.id={$id}";
	$row = fetchOne($sql);
	return $row;
}

/*得到所有员工信息*/
function getAllEmp() {
	$sql = "select e.id,e.username,e.name,e.sex,e.phone,e.photo,e.isJob,e.d_id,d.d_name from employee as e join department d on e.d_id=d.id";
	$rows = fetchAll($sql);
	return $rows;
}

/*检查部门下面是否有员工*/
function checkEmpExist($d_id) {
	$sql = "select * from employee where d_id = {$d_id}";
	$rows = fetchAll($sql);
	return $rows;
}

/*增加请假条*/
function addLeave($id) {
	$arr = $_POST;
	$arr['e_id'] = $id;
	//	$username=$arr['username'];
	//	$name=$arr['name'];
	//	$startTime=$arr['startTime'];
	//	$finishTime=$arr['finishTime'];
	//	$reason=$arr['reason'];
	//	$sql="insert into leavenote(username,name,startTime,finishTime,reason) values('$username','$name','$startTime','$finishTime','$reason')";
	//	if(mysql_query($sql)){
	if (insert("leavenote", $arr)) {
		$mes = "提交成功！<br/><a href='addLeave.php'>继续添加</a>|<a href='myLeave.php'>查看我的请假条</a>";
	} else {
		$mes = "提交失败！<br/><a href='addLeave.php'>继续添加</a>";
	}
	return $mes;
}

/*修改请假条*/
function editLeave($id) {
	$arr = $_POST;
	$where = "id='{$id}'";
	if (update("leavenote", $arr, $where)) {
		$mes = "修改成功！<br/><a href='myLeave.php'>查看我的请假条</a>";
	} else {
		$mes = "修改失败！<br/><a href='editLeave.php'>继续添加</a>";
	}
	return $mes;
}

/*删除请假条*/
function delLeave($id) {
	$where = "id=" . $id;
	if (delete("leavenote", $where)) {
		$mes = "删除成功！<br/><a href='myLeave.php'>查看我的请假单</a>|<a href='addLeave.php'>新增请假条</a>";
	} else {
		$mes = "删除失败！<br/><a href='myLeave.php'>请重新操作</a>";
	}
	return $mes;
}
