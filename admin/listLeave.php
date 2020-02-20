<?php 
require_once '../include.php';
checkAdminLogined();
checkIsAdmin();
$status=$_REQUEST['status'];
if($status=="0"){
	$condition="status='0'";
}elseif($status=="1"){
	$condition="status='1'";
}
else{
	$condition='1';
}
$keywords=$_REQUEST['keywords']?$_REQUEST['keywords']:null;
$where=$keywords?"name like '%{$keywords}%'":"name like '%'";
$sql="select l.id,e.username,e.name,l.startTime,l.finishTime,l.reason,l.status,l.pass from leavenote as l join employee e on l.e_id=e.id where {$condition} and {$where} ";
$totalRows=getResultNum($sql);
$pageSize=5;
$totalPage=ceil($totalRows/$pageSize);
$page=$_REQUEST['page']?(int)$_REQUEST['page']:1;
if($page<1||$page==null||!is_numeric($page))$page=1;
if($page>$totalPage)$page=$totalPage;
$offset=($page-1)*$pageSize;
$sql="select l.id,e.username,e.name,l.startTime,l.finishTime,l.reason,l.status,l.pass from leavenote as l join employee e on l.e_id=e.id where {$condition} and {$where} order by l.id limit {$offset},{$pageSize} ";
$rows=fetchAll($sql);
if(!$rows){
	alertMes("查找无效，请重新输入关键词", "listLeave.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>所有请假条</title>
<link rel="stylesheet" type="text/css" href="css/reset.css">
<link rel="stylesheet" type="text/css" href="css/backstage.css">
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
</head>
<body>
<div class="location">
	当前位置:&nbsp;<a id="first" href="main.php">首页</a>&nbsp;&gt;&nbsp;<a>人事管理</a>&nbsp;&gt;&nbsp;<a href="#" id="third">假条管理</a>
</div>
<h3 class="biaoti">假条管理</h3>	
<div class="details">
    <div class="details_operation clearfix">
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
                    <th width="10%">开始时间</th>
                    <th width="10%">结束时间</th>
                    <th width="20%">请假原因</th>
                    <th width="10%">审批状态</th>
                    <th width="10%">是否允许</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
             <?php $i=1; foreach($rows as $row):?>
                <tr>
                    <td><label class="label_id"><?php echo $i;?></label></td>
                    <td><?php echo $row['username'];?></td>
                    <td><?php echo $row['name'];?></td>
                    <td><?php echo $row['startTime'];?></td>
                    <td><?php echo $row['finishTime'];?></td>
                    <td><?php echo $row['reason']; ?></td>
                    <td id="status<?php echo $row['id'];?>">
                     		<?php 
                     		echo $row['status']==0?"未审核":"已审核";
                     		?>
                     </td>
                     <td id="pass<?php echo $row['id'];?>">
                     		<?php 
                     		echo $row['pass']==0?"不允许":"允许";
                     		?>
                     </td>
                    <td align="center"><input type="button" value="允许" class="btn btn-success" id="agree<?php echo $row['id'];?>"><input type="button" value="不允许" class="btn btn-danger" id="disagree<?php echo $row['id'];?>"></td>
                </tr>
                <?php endforeach;?>
                <?php if($totalRows>$pageSize):?>
                <tr>
                	<td colspan="9"><?php echo showPage($page, $totalPage,"keywords={$keywords}&status={$status}");?></td>
                </tr>
                <?php endif;?>
            </tbody>
        </table>
    </div>
</body>

<script type="text/javascript">
$().ready(function(){
	<?php foreach($rows as $row):?>	
	/*允许按钮事件*/
	$("#agree<?php echo $row['id'];?>").click(function(){
		$("#status<?php echo $row['id'];?>").addClass("green");
		$.ajax({
			type:"post",
			url:"doLeaveAction.php?act=agreeStatus&id=<?php echo $row['id'];?>",
			dataType:"json",
			success:function(data){
				if(data.success){
					$("#status<?php echo $row['id'];?>").html("已审核");
					$("#pass<?php echo $row['id'];?>").html("允许");
				}
				else{
					alert("修改失败，请稍后重试！");
				}
			},
			error:function(jqXHR){
						alert("发生错误:"+jqXHR.status);
					}
		});
	});
	/*不允许按钮事件*/
	$("#disagree<?php echo $row['id'];?>").click(function(){
		$.ajax({
			type:"post",
			url:"doLeaveAction.php?act=disagreeStatus&id=<?php echo $row['id'];?>",
			dataType:"json",
			success:function(data){
				if(data.success){
					$("#ceshi").html(data.msg);
					$("#status<?php echo $row['id'];?>").html("已审核");
					$("#pass<?php echo $row['id'];?>").html("不允许");
				}
				else{
					$("#ceshi").html(data.msg);
				}
			},
			error:function(jqXHR){
						alert("发生错误:"+jqXHR.status);
					}
		});
	});	
	 <?php endforeach;?>
	 /*搜索框*/	
});
//兼容火狐浏览器的keypress写法
	function search(evt){
		evt=(evt)?evt:((window.event)?window.event:"");
		var key=evt.keyCode?evt.keyCode:evt.which;
		if(key==13){
			var val=document.getElementById("search").value;
			window.location="listLeave.php?keywords="+val;
		}
	}	
</script>
</html>