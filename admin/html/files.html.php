<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>我的文件</title>
</head>
<?php require 'html/header.html.php';?>
<div>
	<form action="file.control.php?operation=upload" method="post" enctype="multipart/form-data">
		<input type="file" name="file" />
		<input type="submit" value="Upload" />
	</form>
	<table>
		<tr>
			<td>文件名</td>
			<td>上传时间</td>
			<td>文件大小</td>
			<td>操作</td>
		</tr>
<?php foreach ($files as $file){?>
		<tr>
			<td><?php echo "<a href=".$root.$config["upload_dir"]."file/".$current_dir.$file["name"].">".$file["name"]."</a>" ?></td>
			<td><?php echo $file["ctime"]?></td>
			<td><?php echo $file["size"]?></td>
			<td><a href="file.control.php?operation=delete&file=<?php echo $file["name"]?>">删除</a></td>
		</tr>
<?php }?>
	</table>
</div>
<?php require 'html/footer.html.php';?>
</html>