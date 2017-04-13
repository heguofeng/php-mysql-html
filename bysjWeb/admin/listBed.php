<?php
require_once '../include.php';
//checkAdminLogined();
//checkIsAdmin();

$sql = "select * from bed order by id asc";
$rows = fetchAll($sql);

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>养老院财务明细</title>
<link rel="stylesheet" type="text/css" href="css/reset.css">
<link rel="stylesheet" type="text/css" href="css/backstage.css">
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
<link rel="stylesheet" charset="utf8" href="../plugins/DataTables-1.10.13/media/css/jquery.dataTables.css" />
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script type="text/javascript" charset="utf8" src="../plugins/DataTables-1.10.13/media/js/jquery.dataTables.js" ></script>
</head>
<body>
<div class="location">
	当前位置:&nbsp;<a id="first" href="main.php">首页</a>&nbsp;&gt;&nbsp;<a>床位管理</a>&nbsp;&gt;&nbsp;<a href="#" id="third">床位具体情况</a>
</div>
<h3 class="biaoti">床位具体情况</h3>	
   <div class="details_operation clearfix">
            <div class="bui_select">
                <input type="button" value="添&nbsp;&nbsp;加" class="btn btn-primary"  onclick="addCost()">
            </div>    
    </div>
  <table id="example" class="display" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th width="5%">编号</th>
                    <th width="10%">床号</th>
                    <th width="10%">房间号</th>
                    <th width="10%">楼层</th>
                    <th width="10%">楼栋</th>
                    <th width="10%">床位费</th>
                    <th width="10%">老人</th>
                    <th width="5%">是否使用中</th>
                    <th width="20%">操作</th>
                </tr>
            </thead>
            <tbody>
            <?php $i=1; foreach($rows as $row):?>
                <tr style="text-align: center;">
                    <td><label class="label_id"><?php echo $i;?></label></td>
                    <td><?php echo $row['bed_id']."号床"; ?></td>
                    <td><?php echo $row['room_id']."宿舍"; ?></td>
                    <td><?php echo "第".$row['floor_id']."层"; ?></td>
                    <td><?php echo "第".$row['building_id']."栋"; ?></td>
               		<td><?php echo $row['charge']."元"; ?></td>
               		<td><?php echo $row['user_id']?$row['user_id']:"无"; ?></td>
               		<td><?php echo $row['is_usered']==0?"否":"已使用"; ?></td>
                    <td align="center">
                    	<input type="button" value="修改" class="btn btn-success" onclick="editCost(<?php echo $row['id']; ?>)">
                    	<input type="button" value="删除" class="btn btn-danger"  onclick="delCost(<?php echo $row['id']; ?>)">
                    </td>
                </tr>
                <?php $i++; endforeach; ?>
            </tbody>
        </table>
</body>
<script type="text/javascript">
$(document).ready(function() {
     $('#example').dataTable({
     	"pagingType":   "full_numbers",
     	 "language": {
            "sProcessing": "处理中...",
	        "sLengthMenu": "显示 _MENU_ 项结果",
	        "sZeroRecords": "没有匹配结果",
	        "sInfo": "显示第 _START_ 至 _END_ 项结果，共 _TOTAL_ 项",
	        "sInfoEmpty": "显示第 0 至 0 项结果，共 0 项",
	        "sInfoFiltered": "(由 _MAX_ 项结果过滤)",
	        "sInfoPostFix": "",
	        "sSearch": "搜索:",
	        "sUrl": "",
	        "sEmptyTable": "表中数据为空",
	        "sLoadingRecords": "载入中...",
	        "sInfoThousands": ",",
	        "oPaginate": {
	            "sFirst": "首页",
	            "sPrevious": "上页",
	            "sNext": "下页",
	            "sLast": "末页"
	        },
	        "oAria": {
	            "sSortAscending": ": 以升序排列此列",
	            "sSortDescending": ": 以降序排列此列"
	        }
        }
     });
});
function addCost() {
	window.location = "addBed.php";
}

function editCost(id) {
	window.location = "editCost.php?id=" + id;
}

function delCost(id) {
	if(window.confirm("您确定要删除吗？,删除后已选该级别的用户护理级别将为空！")) {
		window.location = "doAdminAction.php?act=delCost&id=" + id;
	}
}

</script>
</html>