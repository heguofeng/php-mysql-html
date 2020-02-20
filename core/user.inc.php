<?php

/*得到所有学历*/
function getAllxlzk(){
	$sql="select * from dic_xlzk order by id asc";
	$rows=fetchAll($sql);
	return $rows;
}
/*得到所有婚烟状况*/
function getAllhyzk(){
	$sql="select * from dic_hyzk order by id asc";
	$rows=fetchAll($sql);
	return $rows;
}
/*得到所有护理级别*/
function getAllhljb(){
	$sql="select * from dic_hljb order by id asc";
	$rows=fetchAll($sql);
	return $rows;
}

/**
 * 检查用户是否存在
 * @param unknown_type $sql
 * @return Ambigous <multitype:, multitype:>
 */
function checkUser($sql){
	return fetchOne($sql);
}
/**
 * 检测是否有用户登陆.
 */
function checkUserLogined(){
	if($_SESSION['userId']==""&&$_COOKIE['userId']==""){
		alertMes("当前没有用户登录，请先登陆。","login.html");
	}
}

/*根据ID获得用户所有信息*/
function getUserById($id) {
	$sql = "select * from users where id={$id}";
	$row = fetchOne($sql);
	return $row;
}