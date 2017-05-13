<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);//抑制Notice错误报告
header("content-type:text/html;charset=utf-8");
date_default_timezone_set("PRC");//中国时区
session_start();
define("ROOT",dirname(__FILE__));
set_include_path(".".PATH_SEPARATOR.ROOT."/lib".PATH_SEPARATOR.ROOT."/core".PATH_SEPARATOR.ROOT."/plugins/PHPMailer".PATH_SEPARATOR.ROOT."/configs".PATH_SEPARATOR.get_include_path());
require_once 'configs.php';
require_once 'mysql.php';
require_once 'common.php';
require_once 'admin.inc.php';
require_once 'upload.func.php';
require_once 'string.func.php';
require_once 'page.func.php';
require_once 'department.inc.php';
require_once 'employee.inc.php';
require_once 'user.inc.php';
require_once 'article.inc.php';
require_once 'Ucpaas.class.php';
require_once "all_function.php";
connect();
