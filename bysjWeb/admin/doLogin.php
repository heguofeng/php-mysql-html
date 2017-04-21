<?php
require_once '../include.php';
$username = $_GET['username'];
$password = md5($_GET['password']);
$autoFlag = $_GET['autoFlag'];
$result = '{"success":false,"msg":"没有找到账号。"}';
$sql = "select * from employee where username='$username' and password='$password' and isJob=1";
$row = checkAdmin($sql);
if ($row) {
	$result = '{"success":true,"msg":"登录成功!"}';
	/*记住我选项被勾选*/
	if ($autoFlag == "true") {
		setcookie("adminId", $row['id'], time() + 7 * 24 * 3600);
		setcookie("adminName", $row['username'], time() + 7 * 24 * 3600);
		setcookie("isAdmin", $row['isAdmin'], time() + 7 * 24 * 3600);
		setcookie("realName", $row['name'], time() + 7 * 24 * 3600);
	}
	$_SESSION['adminId'] = $row['id'];
	$_SESSION['adminName'] = $row['username'];
	$_SESSION['isAdmin'] = $row['isAdmin'];
	$_SESSION['realName'] = $row['name'];
} else {
	$result = '{"success":false,"msg":"账号或者密码出错,请重新登录！"}';
}
echo $result;

?>