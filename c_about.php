<?php
require_once 'include.php';
$a_id=$_REQUEST['id'];
$sql="select * from article where category_id = {$a_id}";
$row=fetchOne($sql);
if(!$row){
	alertMes("目前没有文章，请先浏览其他页面", "index.php");
}
?>

<!--文章标题放这里-->
<h1 class="a_title"><?php echo $row['title']; ?></h1>
<div class="a_content">
	<!--文章内容放这里-->
	<?php echo $row['content']; ?>		
</div>

