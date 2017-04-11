<?php
/**
 * 检查管理员是否存在
 * @param unknown_type $sql
 * @return Ambigous <multitype:, multitype:>
 */
function checkAdmin($sql) {
	return fetchOne($sql);
}

/**
 * 检测是否有管理员登陆.
 */
function checkAdminLogined() {
	if ($_SESSION['adminId'] == "" && $_COOKIE['adminId'] == "") {
		alertMes("请先登陆", "login.html");
	}
}
/*检测登陆者是否有管理员级别*/
function checkIsAdmin(){
	if (isset($_SESSION['adminId'])) {
		$id=$_SESSION['adminId'];
	} elseif (isset($_COOKIE['adminId'])) {
		$id=$_COOKIE['adminId'];
	}
	$sql="select * from employee where id='{$id}'";/*提取头像*/
	$row=fetchOne($sql);
	if($row['isAdmin']==0){
		alertMes("只有管理员级别才能够访问！", "main.php");
	}	
}
/**
 * 注销管理员
 */
function logout() {
	$_SESSION = array();
	if (isset($_COOKIE[session_name()])) {
		setcookie(session_name(), "", time() - 1);
	}
	if (isset($_COOKIE['adminId'])) {
		setcookie("adminId", "", time() - 1);
	}
	if (isset($_COOKIE['adminName'])) {
		setcookie("adminName", "", time() - 1);
	}
	if (isset($_COOKIE['isAdmin'])) {
		setcookie("isAdmin", "", time() - 1);
	}
	session_destroy();
	header("location:login.html");
}

/*
 * 添加员工
 * */
function addEmployee() {
	$arr = $_POST;
	$arr['password'] = md5($_POST['password']);
	$uploadFile = uploadFile("../admin/uploads");
	if ($uploadFile && is_array($uploadFile)) {
		$arr['photo'] = $uploadFile[0]['name'];
	} else {
		return "添加失败<a href='addEmployee.php'>重新添加</a>";
	}
	if (insert("employee", $arr)) {
		$mes = "添加成功!<br/><a href='addEmployee.php'>继续添加</a>|<a href='listEmployee.php'>查看列表</a>";
	} else {
		$filename = "../admin/uploads/" . $uploadFile[0]['name'];
		if (file_exists($filename)) {
			unlink($filename);
		}
		$mes = "添加失败!<br/><a href='addEmployee.php'>重新添加</a>|<a href='listEmployee.php'>查看列表</a>";
	}
	return $mes;
}

/*
 * 编辑员工
 * */
function editEmployee($id) {
	$arr = $_POST;
	$arr['password'] = md5($_POST['password']);
	if (update("employee", $arr, "id={$id}")) {
		$mes = "编辑成功!<br/><a href='listEmployee.php'>查看用户列表</a>";
	} else {
		$mes = "编辑失败!<br/><a href='listEmployee.php'>请重新修改</a>";
	}
	return $mes;
}

/*删除员工*/
function delEmployee($id) {
	$sql = "select photo from employee where id=".$id;
	$row = fetchOne($sql);
	$photo = $row['photo'];
	$where="e_id=".$id;
	/*删除照片*/
	if (file_exists("../admin/uploads/" . $photo)) {
		unlink("../admin/uploads/" . $photo);
	}
	if (delete("employee", "id=".$id)) {
		if(delete("leavenote",$where)){
			$mes = "删除成功，并且删除了该员工请假条！<br/><a href='listEmployee.php'>查看用户列表</a>";
		}
		else{
			$mes = "删除成功！<br/><a href='listEmployee.php'>查看用户列表</a>";
		}	
	} 
	else {
		$mes = "删除失败！<br/><a href='listEmployee.php'>请重新删除</a>";
	}
	return $mes;
}

/*删除老年人用户*/
function delUsers($id){
	$sql = "select u_photo from users where id=".$id;
	$row=fetchOne($sql);
	$u_photo=$row['u_photo'];
	$where="id=".$id;
	/*删除照片*/
	if (file_exists("../upload/" . $u_photo)) {
		unlink("../upload/" . $u_photo);
	}
	if(delete("users",$where)){
		$mes = "删除成功！<br/><a href='listUsers.php'>查看用户列表</a>";
	}
	else{
		$mes = "删除失败！<br/><a href='listUsers.php'>请重新删除</a>";
	}
	return $mes;
}

/*更换头像*/
function editEmpTx($id){
	$sql="select photo from employee where id={$id}";
	$row=fetchOne($sql);
	if($row['photo']){
		$filename ="../admin/uploads/".$row['photo'];
		if (file_exists($filename)) {
			unlink($filename);
		}
	}
	$arr=$_POST;
	$uploadFile = uploadFile("../admin/uploads");
	if($uploadFile&&is_array($uploadFile)){
		$arr['photo']=$uploadFile[0]['name'];
	}else{
		$mes="操作失败！<br><a href='editEmployeeTx.php?id={$id}'>重新添加</a>|<a href='detialEmployee.php?id={$id}'>查看详情</a>";
	}
	if(update("employee", $arr,"id={$id}")){
		$mes="上传成功！<br><a href='detialEmployee.php?id={$id}'>查看详情</a>";
	}else{
		$filename = "../admin/uploads/" . $uploadFile[0]['name'];
		if (file_exists($filename)) {
			unlink($filename);
		}
		$mes="操作失败！<br><a href='editEmployeeTx.php?id={$id}'>重新添加</a>|<a href='detialEmployee.php?id={$id}'>查看详情</a>";
	}
	return $mes;
}

/*删除护理级别*/
function delCost($id){
	$where="id=".$id;
	if(delete("dic_hljb",$where)){
		$mes = "删除成功！<br/><a href='listCost.php'>查看费用列表</a>";
	}
	else{
		$mes = "删除失败！<br/><a href='listCost.php'>请重新删除</a>";
	}
	return $mes;
}

/*添加老年人用户*/
function addUsers(){
	$arr=$_POST;
	$arr['u_pwd']=md5($arr['u_pwd']);
	if(insert("users", $arr)){
		$res='{"success":true,"msg":"新增用户成功"}';
	}else{
		$res='{"success":false,"msg":"新增用户失败"}';
	}
	echo $res;
}

/*验证老年人用户名是否重复*/
function checkUsersName(){
	$u_username=$_POST['u_username'];
	$sql="select id from users where u_username='{$u_username}'";
	$row=fetchOne($sql);
	if($row){
		$res='{"d":1}';
	}
	else{
		$res='{"d":2}';
	}
	echo $res;
}

/*验证员工用户名是否重复*/
function checkEmpName(){
	$username=$_POST['username'];
	$sql="select id from employee where username='{$username}'";
	$row=fetchOne($sql);
	if($row){
		$res='{"d":1}';
	}
	else{
		$res='{"d":2}';
	}
	echo $res;
}


/*验证部门名字是否重复*/
function checkDepName(){
	$d_name=$_POST['d_name'];
	$sql="select id from department where d_name='{$d_name}'";
	$row=fetchOne($sql);
	if($row){
		$res='{"d":1}';
	}
	else{
		$res='{"d":2}';
	}
	echo $res;
}

/*添加费用类型*/
function addCost(){
	$arr=$_POST;
	if(insert("dic_hljb", $arr)){
		$res='{"success":true,"msg":"新增费用类型成功"}';
	}else{
		$res='{"success":false,"msg":"新增费用类型失败"}';
	}
	echo $res;
}

/*修改费用类型*/
function editCost($id){
	$arr=$_POST;
	$where="id=".$id;
	if(update("dic_hljb", $arr,$where)){
		$res='{"success":true,"msg":"修改费用类型成功"}';
	}else{
		$res='{"success":false,"msg":"修改费用类型失败"}';
	}
	echo $res;
}


/*验证护理级别名字是否重复*/
function checkCost(){
	$hljb=$_POST['hljb'];
	$sql="select id from dic_hljb where hljb='{$hljb}'";
		$row=fetchOne($sql);
	if($row){
		$res='{"d":1}';
	}
	else{
		$res='{"d":2}';
	}
	echo $res;
}
	