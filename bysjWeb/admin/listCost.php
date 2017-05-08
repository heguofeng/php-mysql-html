<?php
require_once '../include.php';
checkAdminLogined();
checkIsAdmin();
$keywords = $_REQUEST['keywords'] ? $_REQUEST['keywords'] : null;
$where = $keywords ? "where hljb like '%{$keywords}%'" : null;
$sql="select * from dic_hljb {$where}";
$totalRows = getResultNum($sql);
$pageSize = 5;
$totalPage = ceil($totalRows / $pageSize);
$page = $_REQUEST['page'] ? (int)$_REQUEST['page'] : 1;
if ($page < 1 || $page == null || !is_numeric($page))
	$page = 1;
if ($page > $totalPage)
	$page = $totalPage;
$offset = ($page - 1) * $pageSize;
$sql = "select * from dic_hljb {$where} order by id asc limit {$offset},{$pageSize} ";
$rows = fetchAll($sql);
if(!$rows){
	alertMes("查找无效，请重新输入关键词", "listCost.php");
}
//print_r($rows);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>养老院财务明细</title>
<link rel="stylesheet" type="text/css" href="css/reset.css">
<link rel="stylesheet" type="text/css" href="css/backstage.css">
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
</head>
<body>
<div class="location">
	当前位置:&nbsp;<a id="first" href="main.php">首页</a>&nbsp;&gt;&nbsp;<a>费用管理</a>&nbsp;&gt;&nbsp;<a href="#" id="third">养老院财务明细</a>
</div>
<h3 class="biaoti">养老院财务明细</h3>	
<div class="details">
    <div class="details_operation clearfix">
            <div class="bui_select">
                <input type="button" value="添&nbsp;&nbsp;加" class="btn btn-primary"  onclick="addCost()">
            </div>    
        <div class="fr">
        	<div class="text">
                    <span>姓名搜索</span>
	                <div class="bui_select">
	                	<input type="text" value="" class="form-control"  id="search" onkeypress="search(event)" >
	                </div>
               </div>
        </div>
    </div>   
        <!--表格-->
        <table class="table table-striped" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th width="5%">编号</th>
                    <th width="10%">护理级别</th>
                    <th width="15%">护理标准</th>
                    <th width="10%">伙食费</th>
                    <th width="10%">床位费</th>
                    <th width="10%">护理费</th>
                    <th width="10%">押金</th>
                    <th width="10%">共计</th>
                    <th width="10%">备注</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
            <?php $i=1; foreach($rows as $row):?>
                <tr>
                    <td><label class="label_id"><?php echo $i;?></label></td>
                    <td><?php echo $row['hljb']; ?></td>
                    <td><?php echo $row['hlbz']; ?></td>
                    <td><?php echo $row['hsf']."元"; ?></td>
                    <td><?php echo $row['cwf']."元"; ?></td>
               		<td><?php echo $row['hlf']."元"; ?></td>
               		<td><?php echo $row['deposit']."元"; ?></td>
               		<td><?php echo $row['allCost']."元"; ?></td>
               		<td><?php echo $row['bz']; ?></td>
                    <td align="center">
                    	<input type="button" value="修改" class="btn btn-success" onclick="editCost(<?php echo $row['id']; ?>)">
                    	<input type="button" value="删除" class="btn btn-danger"  onclick="delCost(<?php echo $row['id']; ?>)">
                    </td>
                </tr>
                <?php $i++; endforeach; ?>
                <?php if($totalRows>$pageSize):?>
                <tr>
                	<td colspan="10"><?php echo showPage($page, $totalPage, "keywords={$keywords}&condition={$condition}"); ?></td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
        
    </div>
</body>
<script type="text/javascript">
function addCost() {
	window.location = "addCost.php";
}

function editCost(id) {
	window.location = "editCost.php?id=" + id;
}

function delCost(id) {
	if(window.confirm("您确定要删除吗？,删除后已选该级别的用户护理级别将为空！")) {
		window.location = "doAdminAction.php?act=delCost&id=" + id;
	}
}

function search(evt) {
	evt = (evt) ? evt : ((window.event) ? window.event : "");
	var key = evt.keyCode ? evt.keyCode : evt.which;
	if(key == 13) {
		var val = document.getElementById("search").value;
		window.location = "listCost.php?keywords=" + val;
	}
}</script>
</html>