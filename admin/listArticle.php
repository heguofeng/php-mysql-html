<?php
require_once '../include.php';
checkAdminLogined();
$keywords=$_REQUEST['keywords']?$_REQUEST['keywords']:null;
$where=$keywords?"where a.category_id like '%{$keywords}%'":"where a.category_id like '%'";
$sql="select a.*,c.category from article as a join art_category c on a.category_id=c.id {$where} order by a.id desc";
$totalRows=getResultNum($sql);
$pageSize=5;
$totalPage=ceil($totalRows/$pageSize);
$page=$_REQUEST['page']?(int)$_REQUEST['page']:1;
if($page<1||$page==null||!is_numeric($page))$page=1;
if($page>=$totalPage)$page=$totalPage;
$offset=($page-1)*$pageSize;
$sql="select a.*,c.category from article as a join art_category c on a.category_id=c.id {$where} order by a.id desc limit {$offset},{$pageSize}";
$rows=fetchAll($sql);
if(!$rows){
	alertMes("Sorry!没有文章，请添加！", "addArticle.php");
	exit;
}
$cates=getAllCate();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title>文章列表</title>
		<!--<script type="text/javascript" src="js/jquery.min.js"></script>-->
		<link rel="stylesheet" type="text/css" href="css/reset.css">
		<link rel="stylesheet" type="text/css" href="css/backstage.css">
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
		<script type="text/javascript" src="../js/jquery.min.js"></script>
		<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	</head>
	<body>
		<div class="location">
			当前位置:&nbsp;<a id="first" href="main.php">首页</a>&nbsp;&gt;&nbsp;<a>新闻管理</a>&nbsp;&gt;&nbsp;<a href="#" id="third">文章列表</a>
		</div>
		<h3 class="biaoti">文章列表</h3>
		<div class="details">
                    <div class="details_operation clearfix">
                        <div class="fl">
                            <input type="button" value="添&nbsp;&nbsp;加" class="btn btn-primary" id="add"  onclick="addArticle()">
                        </div>
                         <div class="fr">
				        	 <div class="text">
				                    <span>部门搜索</span>
				                    <div class="bui_select">
				                        <select id="" class="form-control" onchange="change(this.value)">
				                        	<option value="">-请选择-</option>
				                            <?php foreach($cates as $cate): ?>
				                            	<option value="<?php echo $cate['id']; ?>"<?php echo $cate['id']==$keywords?"selected='selected'":null ?> ><?php echo $cate['category']; ?></option>
				                            <?php endforeach; ?>
				                        </select>
				                    </div>
				                </div>
				        	<div class="text">
				                    <span>文章搜索</span>
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
                                <th width="10%">文章栏目</th>
                                <th width="60%">标题</th>
                                <th width="10%">作者</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $i=1; foreach($rows as $row):?>
                            <tr>
                                <td><label class="label_id"><?php echo $i;?></label></td>
                                <td><?php echo $row['category'];?></td>
                                 <td><?php echo $row['title'];?></td>
                                <td><?php echo $row['author'];?></td>
                                <td align="center"><input type="button" value="修改" class="btn btn-success" id="edit" onclick="editArticle(<?php echo $row['id'];?>)"><input type="button" value="删除" class="btn btn-danger" id="del" onclick="delArticle(<?php echo $row['id'];?>)"></td>
                            </tr>
                            <?php $i++; endforeach;?>
                            <?php if($totalRows>$pageSize):?>
                            <tr>
                            	<td colspan="5"><?php echo showPage($page, $totalPage);?></td>
                            </tr>
                            <?php endif;?>
                        </tbody>
                    </table>
                </div>
		<script type="text/javascript">
			function editArticle(id){
				window.location="editArticle.php?id="+id;
			}
			function delArticle(id){
				if(window.confirm("您确定要删除吗？删除之后不能恢复哦！！！")){
					window.location="doAdminAction.php?act=delArticle&id="+id;
				}
			}
			function addArticle(){
				window.location="addArticle.php";
			}
			//兼容火狐浏览器的keypress写法
			function search(evt){
				evt=(evt)?evt:((window.event)?window.event:"");
				var key=evt.keyCode?evt.keyCode:evt.which;
				if(key==13){
					var val=document.getElementById("search").value;
					window.location="listArticle.php?keywords="+val;
				}
			}
			function change(val){
				window.location="listArticle.php?keywords="+val;
			}
		</script>
	</body>
</html>