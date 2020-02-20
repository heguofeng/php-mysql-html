<?php

/*添加文章*/
function addArticle(){
	$arr=$_POST;
	if(insert("article", $arr)){
			$mes = "分类添加成功!<br/><a href='addArticle.php'>继续发布</a>|<a href='listArticle.php'>查看文章列表</a>";
	}else{
			$mes = "分类添加失败!<br/><a href='addArticle.php'>继续发布</a>|<a href='listArticle.php'>查看文章列表</a>";
	}
	return $mes;
}

/*根据ID获得文章*/
function getArticleById($id){
	$sql="select * from article where id={$id}";
	$row=fetchOne($sql);
	return $row;
}

/*修改文章*/
function editArticle($id){
	$arr=$_POST;
	if (update("article", $arr, "id={$id}")) {
		$mes = "修改成功!<br/><a href='listArticle.php'>查看文章列表</a>";
	} else {
		$mes = "修改失败!<br/><a href='listArticle.php'>请重新修改</a>";
	}
	return $mes;
}

/*删除文章*/
function delArticle($id){
	if(delete("article","id={$id}")){
		$mes="删除文章成功！<br><a href='listArticle.php'>查看文章列表</a>";
	}else{
		$mes="删除文章失败！<br><a href='listArticle.php'>请重新删除</a>";
	}
	return $mes;
}

/*获取所有的文章类别*/
function getAllCate(){
	$sql="select * from art_category";
	$rows=fetchAll($sql);
	return $rows;
}

