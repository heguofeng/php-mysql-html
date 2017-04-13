<?php
require_once '../include.php';
checkAdminLogined();
checkIsAdmin();
$keywords = $_REQUEST['keywords'] ? $_REQUEST['keywords'] : null;
$where = $keywords ? "where e.name like '%{$keywords}%'" : null;
$sql = "select e.id,e.username,e.name,e.sex,e.isJob,e.isAdmin,e.d_id,d.d_name from employee as e join department d on e.d_id=d.id {$where} ";
$totalRows = getResultNum($sql);
$pageSize = 5;
$totalPage = ceil($totalRows / $pageSize);
$page = $_REQUEST['page'] ? (int)$_REQUEST['page'] : 1;
if ($page < 1 || $page == null || !is_numeric($page))
	$page = 1;
if ($page > $totalPage)
	$page = $totalPage;
$offset = ($page - 1) * $pageSize;
$sql = "select e.*,d.d_name from employee as e join department d on e.d_id=d.id {$where} order by e.id asc limit {$offset},{$pageSize} ";
$rows = fetchAll($sql);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>员工列表</title>
<link rel="stylesheet" type="text/css" href="css/reset.css">
<link rel="stylesheet" type="text/css" href="css/backstage.css">
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
</head>
<body>
<div class="location">
	当前位置:&nbsp;<a id="first" href="main.php">首页</a>&nbsp;&gt;&nbsp;<a>人事管理</a>&nbsp;&gt;&nbsp;<a href="#" id="third">员工列表</a>
</div>
<h3 class="biaoti">员工列表</h3>	
<div class="details">
    <div class="details_operation clearfix">
            <div class="bui_select">
                <input type="button" value="添&nbsp;&nbsp;加" class="btn btn-primary"  onclick="addEmployee()">
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
                    <th width="10%">员工账号</th>
                    <th width="10%">员工姓名</th>
                    <th width="10%">员工性别</th>
                    <th width="15%">所属部门</th>
                    <th width="10%">在职情况</th>
                    <th width="10%">权限级别</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
            <?php $i=1; foreach($rows as $row):?>
                <tr>
                    <td><label class="label_id"><?php echo $i;?></label></td>
                    <td><?php echo $row['username']; ?></td>
                    <td><a href="detialEmployee.php?id=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a></td>
                    <td><?php echo $row['sex']; ?></td>
                    <td><?php echo $row['d_name']; ?></td>
                     <td>
                     		<?php
								echo $row['isJob'] == 2 ? "离职" : "在职";
                     		?>
                     </td>
                     <td>
                     	<?php if($row['isAdmin']=="0"){
		                     	echo  '<span> 普通员工 </span>';
		                     }elseif($row['isAdmin']=="1"){
		                     	echo '<span style="color:red;"> 系统管理员 </span>';
		                     }elseif($row['isAdmin']=="2"){
		                     	echo '<span style="color:#228b22;"> 超级管理员 </span>';
		                     } 
		                 ?>
                     </td>
                    <td align="center">
                    	<input type="button" value="修改" class="btn btn-success" onclick="editEmployee(<?php echo $row['id']; ?>)">
                    	<input type="button" value="删除" class="btn btn-danger"  onclick="delEmployee(<?php echo $row['id']; ?>)">
                    	<input type="button" value="详细信息" class="btn btn-info"  onclick="detialEmployee(<?php echo $row['id']; ?>)">
                    </td>
                </tr>
                <?php $i++; endforeach; ?>
                <?php if($totalRows>$pageSize):?>
                <tr>
                	<td colspan="8"><?php echo showPage($page, $totalPage, "keywords={$keywords}&condition={$condition}"); ?></td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
        
    </div>
</body>
<script type="text/javascript">
function addEmployee() {
	window.location = "addEmployee.php";
}

function editEmployee(id) {
	window.location = "editEmployee.php?id=" + id;
}

function delEmployee(id) {
	if(window.confirm("您确定要删除吗？,删除员工将会删除一切与其有关的信息（包括请假条）！")) {
		window.location = "doAdminAction.php?act=delEmployee&id=" + id;
	}
}
function detialEmployee(id) {
	window.location = "detialEmployee.php?id=" + id;
}

function search(evt) {
	evt = (evt) ? evt : ((window.event) ? window.event : "");
	var key = evt.keyCode ? evt.keyCode : evt.which;
	if(key == 13) {
		var val = document.getElementById("search").value;
		window.location = "listEmployee.php?keywords=" + val;
	}
}</script>
</html>