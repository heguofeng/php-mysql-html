<?php
require_once '../include.php';
if (isset($_SESSION['adminName'])) {
	$username = $_SESSION['adminName'];
} elseif (isset($_COOKIE['adminName'])) {
	$username = $_COOKIE['adminName'];
}
$sql = "select l.id,e.username,e.name,l.startTime,l.finishTime,l.reason,l.status,l.pass from leavenote as l join employee e on l.e_id=e.id where e.username='{$username}' ";
$totalRows = getResultNum($sql);
$pageSize = 5;
$totalPage = ceil($totalRows / $pageSize);
$page = $_REQUEST['page'] ? (int)$_REQUEST['page'] : 1;
if ($page < 1 || $page == null || !is_numeric($page))
	$page = 1;
if ($page > $totalPage)
	$page = $totalPage;
$offset = ($page - 1) * $pageSize;
$sql = "select l.id,e.username,e.name,l.startTime,l.finishTime,l.reason,l.status,l.pass from leavenote as l join employee e on l.e_id=e.id where e.username='{$username}' limit {$offset},{$pageSize} ";
$rows = fetchAll($sql);
//print_r($rows);
if(!$rows){
	alertMes("您的请假条空空如也！先去请假吧！", "addLeave.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>我的请假条</title>
<link rel="stylesheet" type="text/css" href="css/reset.css">
<link rel="stylesheet" type="text/css" href="css/backstage.css">
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
</head>
<body>
<div class="location">
	当前位置:&nbsp;<a id="first" href="main.php">首页</a>&nbsp;&gt;&nbsp;<a>人事管理</a>&nbsp;&gt;&nbsp;<a href="#" id="third">我的请假条</a>
</div>
<h3 class="biaoti">我的请假条</h3>	
<div class="details">  
        <!--表格-->
        <table class="table table-hover" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th width="5%">编号</th>
                    <th width="10%">员工账号</th>
                    <th width="10%">员工姓名</th>
                    <th width="10%">开始时间</th>
                    <th width="15%">结束时间</th>
                    <th width="10%">请假原因</th>
                    <th width="10%">审批状态</th>
                    <th width="10%">是否允许</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
             <?php $i=1; foreach($rows as $row):?>
                <tr>
                    <td><label class="label_id"><?php echo $i;?></label></td>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['startTime']; ?></td>
                    <td><?php echo $row['finishTime']; ?></td>
                    <td><?php echo $row['reason']; ?></td>
                    <td id="status<?php echo $row['id']; ?>">
                     		<?php
						echo $row['status'] == 0 ? "未审核" : "已审核";
                     		?>
                     </td>
                     <td id="pass<?php echo $row['id']; ?>">
                     		<?php
						echo $row['pass'] == 0 ? "不允许" : "允许";
                     		?>
                     </td>
                    <td align="center">
                    	<input type="button" value="修改" <?php echo $row['status']==1?"disabled='disabled'":null ?> class="btn btn-success" onclick="editLeave(<?php echo $row['id']; ?>)">
                    	<input type="button" value="删除" <?php echo $row['status']==1?"disabled='disabled'":null ?> class="btn btn-danger" onclick="delLeave(<?php echo $row['id']; ?>)">
                    </td>
                </tr>
                <?php $i++; endforeach; ?>
                <?php if($totalRows>$pageSize):?>
                <tr>
                	<td colspan="9"><?php echo showPage($page, $totalPage, "keywords={$keywords}&condition={$condition}"); ?></td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript">
	function editLeave(id){
		window.location="editLeave.php?id="+id;
	}
	function delLeave(id) {
	if(window.confirm("您确定要删除吗？")) {
		window.location = "doAdminAction.php?act=delLeave&id=" + id;
	}
}
</script>
</html>