<?php
require_once 'include.php';
$a_id=$_REQUEST['id'];
$sql="select * from article where category_id = {$a_id}";
$rows=fetchAll($sql);
if(!$rows){
	alertMes("目前没有文章，请先浏览其他页面", "index.php");
}

?>
	<h1 class="a_title"><?php echo $a_id==1?"专业护理":"保健常识"; ?></h1>
	<div id="page">
		<ul>
			<?php foreach($rows as $row): ?>
			<li class="page_li">
				<!--文章标题放这里-->
				<h1 class="page_title">
					<a href="article.php?id=<?php echo $row['id']; ?>" class="fl"><?php echo $row['title']; ?></a>
					<span class="fr"><?php echo $row['dateline']; ?></span>	
					<div class="clearfix"></div>
				</h1>
				<p class="fl">
					<!--文章简述放这里-->
					<?php echo $row['description']; ?>		
				</p>
				<!--<div class="clearfix"></div>-->
			</li>
			<?php endforeach; ?>
		</ul>
	</div>
