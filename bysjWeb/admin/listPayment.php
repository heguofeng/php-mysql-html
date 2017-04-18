<?php
require_once '../include.php';
//checkAdminLogined();
//checkIsAdmin();

$sql="select p.*,u.u_name,u.u_bed from pay_records as p left join users u on p.user_id=u.id";
$rows = fetchAll($sql);
$sql1="select count(*) as nums,sum(pay_money) as money from pay_records";
$nums=fetchOne($sql1);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>入住老人缴费信息</title>
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
	当前位置:&nbsp;<a id="first" href="main.php">首页</a>&nbsp;&gt;&nbsp;<a>费用管理</a>&nbsp;&gt;&nbsp;<a href="listBed.php" id="third">入住老人缴费信息</a>
</div>
<h3 class="biaoti">入住老人缴费信息</h3>	
<table  cellspacing="0" cellpadding="0">
		<tr style="line-height: 21px;">
			<td class="td_crossline" style="width: 150px;"><p class="fl pay_nums">已缴费人数：</p><p class="current_balance"><?php echo $nums['nums'];?><i>人</i></p></td> 
			<td class="td_crossline" ><p class="fl pay_nums">目前养老院财务状况：</p><p class="current_balance"><?php echo $nums['money'];?><i>.00元</i></p></td> 
		</tr>
</table>		
  <table id="example" class="display" cellspacing="0" width="100%" style="text-align: center;">
            <thead>
                <tr>
                	<td width="5%">序号</td>
                    <td width="5%">缴费订单号</td>
					<td width="15%">缴费时间</td>
					<td width="5%">缴费金额</td>
					<td width="10%">缴费者</td>
					<td width="5%">床位号</td>
					<td width="5%">是否已缴费</td>
                </tr>
            </thead>
            <tbody>
            <?php $i=1; foreach($rows as $row):?>
                <tr >
                    <td><label class="label_id"><?php echo $i;?></label></td>
                   <td><?php echo $row['id'];?></td>
					<td><?php echo $row['pay_time'];?></td>
					<td><?php echo $row['pay_money'].".00 元";?></td>
					<td><?php echo $row['u_name'];?></td>
					<td><?php echo $row['u_bed']."号";?></td>
					<td><?php echo $row['pay_status']==1?"已缴费":"未缴费";?></td>
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

</script>
</html>