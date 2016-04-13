<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="../smile.ico">
	<link rel="stylesheet" type="text/css" href="css/layout.css">
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/header.css">
	<link rel="stylesheet" type="text/css" href="css/articles.css">
	<script type="text/javascript" src="js/function.js"></script>
	<script type="text/javascript" src="js/articles.js"></script>
	<title>管理文章</title>
</head>
<body>
<?php require 'html/header.html.php';?>
<div id="types">
	<ul>
<?php if ($article_types !== false) foreach ($article_types as $article_type) {?>
		<li><?php echo $type == $article_type["id"] ? $article_type["name"] : "<a href=articles.php?type=" . $article_type["id"] . ">" . $article_type["name"] . "</a>" ?><a class="edit_article_type" href="control/article_type.control.php?operation=update">编辑</a><a class="delete_article_type" href="control/article_type.control.php?operation=delete&id=<?php echo $article_type["id"]?>">删除</a></li>
<?php }?>
	</ul>
	<form action="control/article_type.control.php?operation=add" method="post">
		<input type="text" name="name">
		<input type="submit" value="添加">
	</form>
</div>
<div id="articles">
	<p>文章总数：<?php echo $article_count?>，<a href="edit_article.php">添加文章</a></p>
	<table>
		<tr>
			<th>ID</th>
			<th>标题</th>
			<th>创建日期</th>
			<th>修改日期</th>
			<th>操作</th>
		</tr>
<?php if ($articles !== false) foreach ( $articles as $article ) {?>
		<tr>
			<td><?php echo $article["id"]?></td>
			<td><?php echo $article["title"]?></td>
			<td><?php echo $article["createtime"]?></td>
			<td><?php echo $article["modifytime"]?></td>
			<td><a class="edit_article" href="edit_article.php?id=<?php echo $article["id"]?>">编辑</a><a class="delete_article" href="control/article.control.php?operation=delete&id=<?php echo $article["id"]?>">删除</a></td>
		</tr>
<?php }?>
	</table>
	<p><?php echo $page > 1 ? "<a href=articles.php?type=".$type."&page=".($page-1).">上一页</a>" : "上一页"; echo "<span>" . $page . "/" . $page_count. "</span>"; echo $page < $page_count ? "<a href=articles.php?type=".$type."&page=".($page+1).">下一页</a>" : "下一页"?></p>
</div>
<?php require 'html/footer.html.php';?>
</body>
</html>
