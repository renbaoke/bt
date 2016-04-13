<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="../smile.ico">
	<link rel="stylesheet" type="text/css" href="css/layout.css">
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/header.css">
	<link rel="stylesheet" type="text/css" href="css/hyperlinks.css">
	<title>管理超链接</title>
</head>
<body>
<?php require 'html/header.html.php';?>
<div id="hyperlinks">
	<form action="control/hyperlink.control.php?operation=add" method="post" enctype="multipart/form-data">
		<input type="text" name="title">
		<input type="text" name="http">
		<input type="submit" value="添加">
	</form>
	<table>
		<tr>
			<th>ID</th>
			<th>标题</th>
			<th>地址</th>
			<th>操作</th>
		</tr>
<?php if ($hyperlinks !== false) foreach ($hyperlinks as $hyperlink){?>
		<tr>
			<td><?php echo $hyperlink["id"]?></td>
			<td><?php echo $hyperlink["title"] ?></td>
			<td><?php echo $hyperlink["http"]?></td>
			<td><a class="edit_hyperlink" href="control/hyperlink.control.php?operation=update">编辑</a><a class="delete_hyperlink" href="control/hyperlink.control.php?operation=delete&id=<?php echo $hyperlink["id"]?>">删除</a></td>
		</tr>
<?php }?>
	</table>
</div>
<?php require 'html/footer.html.php';?>
</body>
</html>