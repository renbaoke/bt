<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="shortcut icon" href="../smile.ico">
<link rel="stylesheet" type="text/css" href="css/articles.css">
<title>我的文章</title>
</head>
<?php require 'html/header.html.php';?>
<div>
	<form action="control/hyperlink.control.php?operation=add" method="post" enctype="multipart/form-data">
		<input type="text" name="title" />
		<input type="text" name="http" />
		<input type="submit" value="添加" />
	</form>
	<table>
		<tr>
			<td>标题</td>
			<td>地址</td>
			<td>操作</td>
		</tr>
<?php if ($hyperlinks !== false) foreach ($hyperlinks as $hyperlink){?>
		<tr>
			<td><?php echo $hyperlink["title"] ?></td>
			<td><?php echo $hyperlink["http"]?></td>
			<td>
				<a href="control/hyperlink.control.php?operation=delete&id=<?php echo $hyperlink["id"]?>">删除</a>
			</td>
		</tr>
<?php }?>
	</table>
</div>
<?php require 'html/footer.html.php';?>
</html>