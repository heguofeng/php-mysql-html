<?php
require_once '../include.php';
checkAdminLogined();
$keywords = $_REQUEST['keywords'] ? $_REQUEST['keywords'] : null;
$where = $keywords ? "where u.u_name like '%{$keywords}%'" : null;
$sql="SELECT u.*, hl.hljb, hy.hyzk, xl.xlzk,b.bed_id,b.room_id,b.floor_id,b.building_id FROM users u LEFT JOIN dic_hljb hl ON hl.id = u.u_hljb LEFT JOIN dic_hyzk hy ON hy.id = u.u_hyzk LEFT JOIN dic_xlzk xl ON xl.id = u.u_xlzk left join bed b on b.user_id=u.id {$where}";
$totalRows = getResultNum($sql);
$pageSize = 5;
$totalPage = ceil($totalRows / $pageSize);
$page = $_REQUEST['page'] ? (int)$_REQUEST['page'] : 1;
if ($page < 1 || $page == null || !is_numeric($page))
	$page = 1;
if ($page > $totalPage)
	$page = $totalPage;
$offset = ($page - 1) * $pageSize;
$sql = "SELECT u.*, hl.hljb, hy.hyzk, xl.xlzk,b.bed_id,b.room_id,b.floor_id,b.building_id,p.pay_status FROM users u LEFT JOIN dic_hljb hl ON hl.id = u.u_hljb LEFT JOIN dic_hyzk hy ON hy.id = u.u_hyzk LEFT JOIN dic_xlzk xl ON xl.id = u.u_xlzk left join bed b on b.user_id=u.id left join pay_records p on u.pay_id=p.id {$where} order by u.id asc limit {$offset},{$pageSize} ";
$rows = fetchAll($sql);
if(!$rows){
	alertMes("查找无效，请重新输入关键词", "listUsers.php");
}
//print_r($rows);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>老人列表</title>
<link rel="stylesheet" type="text/css" href="css/reset.css">
<link rel="stylesheet" type="text/css" href="css/backstage.css">
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
</head>
<body>
<div class="location">
	当前位置:&nbsp;<a id="first" href="main.php">首页</a>&nbsp;&gt;&nbsp;<a>老人管理</a>&nbsp;&gt;&nbsp;<a href="#" id="third">老人列表</a>
</div>
<h3 class="biaoti">老人列表</h3>	
<div class="details">
    <div class="details_operation clearfix">
            <div class="bui_select">
                <input type="button" value="添&nbsp;&nbsp;加" class="btn btn-primary"  onclick="addUsers()">
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
                    <th width="10%">用户账号</th>
                    <th width="10%">用户姓名</th>
                    <th width="5%">用户性别</th>
                    <th width="10%">护理级别</th>
                    <th width="20%">床位信息</th>
                    <th width="10%">是否已缴费</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
             <?php $i=1; foreach($rows as $row):?>
                <tr>
                    <td><label class="label_id"><?php echo $i;?></label></td>
                    <td><?php echo $row['u_username']; ?></td>
                    <td><a href="detialUsers.php?id=<?php echo $row['id']; ?>"><?php echo $row['u_name']; ?></a></td>
                    <td><?php echo $row['u_sex']; ?></td>
                    <td><?php echo $row['hljb']; ?></td>
               		<td><?php if($row['u_bed']!=0): ?>	<?php echo $row['building_id']."幢楼 &nbsp;&nbsp;".$row['floor_id']."层&nbsp;&nbsp;".$row['room_id']."房间&nbsp;&nbsp;".$row['bed_id']."号床"; ?><?php else: ?>暂未居住<?php endif;?></td>
               		<td><?php echo $row['pay_status']==1?"已缴费":"未缴费"; ?></td>
                    <td align="left">
                    	<input type="button" value="详细信息" class="btn btn-info"  onclick="detialUsers(<?php echo $row['id']; ?>)">	
                    	<input type="button" value="修改资料" class="btn btn-success" onclick="editUsers(<?php echo $row['id']; ?>)">
                    	<input type="button" value="删除用户" class="btn btn-danger"  onclick="delUsers(<?php echo $row['id']; ?>)">
                    	<?php if($row['u_bed']==0): ?>	
                    	<input type="button" value="入住" class="btn btn-primary" onclick="checkIn(<?php echo $row['id']; ?>)">
                    		<?php else: ?>
                    	<input type="button" value="换床" class="btn btn-warning" onclick="changeBed(<?php echo $row['id']; ?>)">
                    	<input type="button" value="退房" class="btn btn-danger" onclick="checkOut(<?php echo $row['id']; ?>)">
                    		<?php endif;?>
                    </td>
                </tr>
                <?php $i++;endforeach; ?>
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
function addUsers() {
	window.location = "addUsers.php";
}

function editUsers(id) {
	window.location = "editUsers.php?id=" + id;
}

function delUsers(id) {
	if(window.confirm("您确定要删除吗？,删除用户将会删除一切与其有关的信息！（包括床位信息）")) {
		window.location = "doAdminAction.php?act=delUsers&id=" + id;
	}
}
function detialUsers(id) {
	window.location = "detialUsers.php?id=" + id;
}
function checkIn(id){
	window.location = "checkIn.php?id=" + id;
}
function changeBed(id){
	window.location = "changeBed.php?id=" + id;
}
function checkOut(id){
	if(window.confirm("您确定要退房吗？")) {
		window.location = "doAdminAction.php?act=checkOut&id=" + id;
	}
}
function search(evt) {
	evt = (evt) ? evt : ((window.event) ? window.event : "");
	var key = evt.keyCode ? evt.keyCode : evt.which;
	if(key == 13) {
		var val = document.getElementById("search").value;
		window.location = "listUsers.php?keywords=" + val;
	}
}</script>
</html>