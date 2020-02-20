<?php 
require_once '../include.php';
checkAdminLogined();
checkIsAdmin();
$keywords=$_REQUEST['keywords']?$_REQUEST['keywords']:null;
$where=$keywords?"where d.d_name like '%{$keywords}%'":"where d.d_name like '%'";
$sql="select d.id,d.d_name,e.username,e.name,e.id as eid from department as d join employee e on d.id=e.d_id {$where} order by d.id ASC ";
$totalRows=getResultNum($sql);
$pageSize=5;
$totalPage=ceil($totalRows/$pageSize);
$page=$_REQUEST['page']?(int)$_REQUEST['page']:1;
if($page<1||$page==null||!is_numeric($page))$page=1;
if($page>$totalPage)$page=$totalPage;
$offset=($page-1)*$pageSize;
$sql="select d.id,d.d_name,e.username,e.name,e.id as eid  from department as d join employee e on d.id=e.d_id {$where} order by d.id ASC limit {$offset},{$pageSize} ";
$rows=fetchAll($sql);
$sql_select="select * from department ";//选择框内容
$rows_select=fetchAll($sql_select);
if(!$rows){
	alertMes("查找无效，请重新输入关键词", "detialDep.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>部门详情</title>
<link rel="stylesheet" type="text/css" href="css/reset.css">
<link rel="stylesheet" type="text/css" href="css/backstage.css">
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
</head>
<body>
<div class="location">
	当前位置:&nbsp;<a id="first" href="main.php">首页</a>&nbsp;&gt;&nbsp;<a>部门管理</a>&nbsp;&gt;&nbsp;<a href="#" id="third">部门详情</a>
</div>
<h3 class="biaoti">部门详情</h3>
<div class="details">
    <div class="details_operation clearfix">
        <div class="fr">
        	 <div class="text">
                    <span>部门搜索</span>
                    <div class="bui_select">
                        <select id="" class="form-control" onchange="change(this.value)">
                        	<option value="">-请选择-</option>
                            <?php foreach($rows_select as $row_select): ?>
                            	<option value="<?php echo $row_select['d_name']; ?>"<?php echo $row_select['d_name']==$keywords?"selected='selected'":null ?> ><?php echo $row_select['d_name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
        	<div class="text">
                    <span>部门搜索</span>
                     <div class="bui_select">
                    	<input type="text" value="" class="form-control"  id="search" onkeypress="search(event)" >
                    </div>
            </div>
        </div>
    </div>   
        <!--表格-->
        <table class="table table-hover" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th width="5%">编号</th>
                    <th width="10%">部门名称</th>
                    <th width="10%">员工账号</th>
                    <th width="10%">员工姓名</th>
                </tr>
            </thead>
            <tbody>
            <?php $i=1; foreach($rows as $row):?>
                <tr>
                    <td><label class="label_id"><?php echo $i;?></label></td>
                    <td><?php echo $row['d_name'];?></td>
                    <td><?php echo $row['username'];?></td>
                    <td><a href="detialEmployee.php?id=<?php echo $row['eid'];?>"><?php echo $row['name'];?></a></td>
                </tr>
                <?php $i++; endforeach;?>
                <?php if($totalRows>$pageSize):?>
                <tr>
                	<td colspan="7"><?php echo showPage($page, $totalPage,"keywords={$keywords}&condition={$condition}");?></td>
                </tr>
                <?php endif;?>
            </tbody>
        </table>
    </div>
</body>
<script type="text/javascript">
	//兼容火狐浏览器的keypress写法
	function search(evt){
		evt=(evt)?evt:((window.event)?window.event:"");
		var key=evt.keyCode?evt.keyCode:evt.which;
		if(key==13){
			var val=document.getElementById("search").value;
			window.location="detialDep.php?keywords="+val;
		}
	}
	function change(val){
		window.location="detialDep.php?keywords="+val;
	}
</script>
</html>