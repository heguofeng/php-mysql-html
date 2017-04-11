<?php
require_once 'include.php';
$a_id=$_REQUEST['id']?$_REQUEST['id']:3;
$sql="select * from article where category_id = {$a_id}";
$row=fetchOne($sql);

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
<title>个人中心</title>
<link rel="stylesheet" type="text/css" href="css/reset.css"/>
<link rel="stylesheet" type="text/css" href="css/main.css"/>
<script type="text/javascript" src="js/jquery.min.js"></script>

</head>
<body>
	<!--文章标题放这里-->
	<h1 class="a_title"><?php echo $row['title']; ?></h1>
	<div class="a_content">
		<!--文章内容放这里-->
		<?php echo $row['content']; ?>		
	</div>
</script>
</body>
</html>
