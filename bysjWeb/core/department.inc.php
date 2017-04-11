<?php 
  
 /*添加部门*/
function addDepartment() {
	$arr = $_POST;
	if (insert("department", $arr)) {
		$mes = "分类添加成功!<br/><a href='addDepartment.php'>继续添加</a>|<a href='listDepartment.php'>查看分类</a>";
	} else {
		$mes = "分类添加失败!<br/><a href='addDepartment.php'>重新添加</a>|<a href='listDepartment.php'>查看分类</a>";
	}
	return $mes;
}

/*删除部门*/
function delDepartment($id) {
	$res = checkEmpExist($id);
	if (!$res) {
		$where = "id=" . $id;
		if (delete("department", $where)) {
			$mes = "删除成功!<br/><a href='listDepartment.php'>查看部门分类</a>|<a href='addDepartment.php'>添加部门分类</a>";
		} else {
			$mes = "删除失败！<br/><a href='listDepartment.php'>请重新操作</a>";
		}
		return $mes;
	} else {
		alertMes("不能删除部门分类，请先删除该部门里的成员", "listDepartment.php");
	}
}

/*编辑部门*/
function editDepartment($id) {
	$arr = $_POST;
	$where = "id=" . $id;
	if (update("department", $arr, $where)) {
		$mes = "部门修改成功！<br/><a href='listDepartment.php'>查看具体部门</a>";
	} else {
		$mes = "部门修改失败！<br/><a href='listDepartment.php'>重新修改</a>";
	}
	return $mes;
}

/*得到所有的部门分类*/
function getAllDepartment() {
	$sql = "select * from department";
	$rows = fetchAll($sql);
	return $rows;
}

/*根据ID得到指定部门*/
function getDepartmentById($id) {
	$sql = "select id,d_name from department where id={$id}";
	$row = fetchOne($sql);
	return $row;
}
?>
