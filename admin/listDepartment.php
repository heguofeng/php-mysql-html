<?php
require_once '../include.php';
checkAdminLogined();
checkIsAdmin();
$page=$_REQUEST['page']?(int)$_REQUEST['page']:1;
$sql="select * from department";
$totalRows=getResultNum($sql);
$pageSize=5;
$totalPage=ceil($totalRows/$pageSize);
if($page<1||$page==null||!is_numeric($page))$page=1;
if($page>=$totalPage)$page=$totalPage;
$offset=($page-1)*$pageSize;
$sql="select id,d_name from department order by id asc limit {$offset},{$pageSize}";
$rows=fetchAll($sql);
if(!$rows){
	alertMes("Sorry!没有部门，请添加！", "addDepartment.php");
	exit;
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title></title>
		<!--<script type="text/javascript" src="js/jquery.min.js"></script>-->
		<link rel="stylesheet" type="text/css" href="css/reset.css">
		<link rel="stylesheet" type="text/css" href="css/backstage.css">
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
		<script type="text/javascript" src="../js/jquery.min.js"></script>
		<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	</head>
	<body>
		<div class="location">
			当前位置:&nbsp;<a id="first" href="main.php">首页</a>&nbsp;&gt;&nbsp;<a>部门管理</a>&nbsp;&gt;&nbsp;<a href="#" id="third">部门列表</a>
		</div>
		<h3 class="biaoti">部门列表</h3>
		<div class="details">
                    <div class="details_operation clearfix">
                        <div class="bui_select">
                            <input type="button" value="添&nbsp;&nbsp;加" class="btn btn-primary" id="add"  onclick="addDepartment()">
                        </div>
                            
                    </div>
                    <!--表格-->
                    <table class="table table-hover" cellspacing="0" cellpadding="0">
                        <thead>
                            <tr>
                                <th width="15%">编号</th>
                                <th width="25%">部门类别</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $i=1; foreach($rows as $row):?>
			                <tr>
			                    <td><label class="label_id"><?php echo $i;?></label></td>
                                <td><?php echo $row['d_name'];?></td>
                                <td align="center"><input type="button" value="修改" class="btn btn-success" id="edit" onclick="editDepartment(<?php echo $row['id'];?>)"><input type="button" value="删除" class="btn btn-danger" id="del" onclick="delDepartment(<?php echo $row['id'];?>)"></td>
                            </tr>
                            <?php $i++; endforeach;?>
                            <?php if($totalRows>$pageSize):?>
                            <tr>
                            	<td colspan="4"><?php echo showPage($page, $totalPage);?></td>
                            </tr>
                            <?php endif;?>
                        </tbody>
                    </table>
                </div>
<script type="text/javascript">
	function editDepartment(id){
		window.location="editDepartment.php?id="+id;
	}
	function delDepartment(id){
		if(window.confirm("您确定要删除吗？删除之后不能恢复哦！！！")){
			window.location="doAdminAction.php?act=delDepartment&id="+id;
		}
	}
	function addDepartment(){
		window.location="addDepartment.php";
	}
</script>
	</body>
</html>