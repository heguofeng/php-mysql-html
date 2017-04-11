<?php
require_once '../include.php';
$id=$_REQUEST['id'];
$act=$_REQUEST['act'];
if($act=="logout"){
	logout();
}
elseif($act=="addEmployee"){
	$mes=addEmployee();
}
elseif($act=="listEmployee"){
	$mes=listEmployee();
}
elseif($act=="editEmployee"){
	$mes=editEmployee($id);
}
elseif($act=="delEmployee"){
	$mes=delEmployee($id);
}
elseif($act=="addDepartment"){
	$mes=addDepartment();
}
elseif($act=="listDepartment"){
	$mes=listDepartment($id);
}
elseif($act=="editDepartment"){
	$mes=editDepartment($id);
}
elseif($act=="delDepartment"){
	$mes=delDepartment($id);
}
elseif($act=="addLeave"){
	$mes=addLeave($id);
}
elseif($act=="editLeave"){
	$mes=editLeave($id);
}
elseif($act=="delLeave"){
	$mes=delLeave($id);
}
elseif($act=="delUsers"){
	$mes=delUsers($id);
}
elseif($act=="editEmpTx"){
	$mes=editEmpTx($id);
}elseif($act=="delCost"){
	$mes=delCost($id);
}elseif($act=="addArticle"){
	$mes=addArticle();
}elseif($act=="editArticle"){
	$mes=editArticle($id);
}elseif($act=="delArticle"){
	$mes=delArticle($id);
}




?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
</head>
<body>
<?php 
	if($mes){
		echo $mes;
	}
?>
</body>
</html>