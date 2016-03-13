<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>我的文章</title>
</head>
<?php require 'html/header.html.php';?>
<div id="types">
	<ul>
<?php foreach ($article_types as $article_type) {?>
		<li><?php echo $type == $article_type["id"] ? $article_type["name"] : "<a href=articles.php?type=" . $article_type["id"] . ">" . $article_type["name"] . "</a>" ?></li>
<?php }?>
	</ul>
</div>
<div id="articles">
<p>文章总数：<?php echo $article_count?>，<a href="edit_article.php">添加文章</a></p>
<table>
	<tr>
		<td>ID</td>
		<td>标题</td>
		<td>创建日期</td>
		<td>修改日期</td>
		<td>操作</td>
	</tr>
<?php foreach ( $articles as $article ) {?>
	<tr>
		<td><?php echo $article["id"]?></td>
		<td><?php echo $article["title"]?></td>
		<td><?php echo $article["createtime"]?></td>
		<td><?php echo $article["modifytime"]?></td>
		<td><a href="article.control.php?operation=delete&id=<?php echo $article["id"]?>">删除</a>
			<a href="edit_article.php?id=<?php echo $article["id"]?>">编辑</a></td>
	</tr>
<?php }?>
</table>
<p>
<?php echo $page > 1 ? "<a href=articles.php?type=".$type."&page=".($page-1).">上一页</a>" : "上一页" ?>
<?php echo $page . "/" . $page_count?>
<?php echo $page < $page_count ? "<a href=articles.php?type=".$type."&page=".($page+1).">下一页</a>" : "下一页" ?>
</p>
</div>
<?php require 'html/footer.html.php';?>
</html>